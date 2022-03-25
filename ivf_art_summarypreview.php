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
$ivf_art_summary_preview = new ivf_art_summary_preview();

// Run the page
$ivf_art_summary_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_art_summary_preview->Page_Render();
?>
<?php $ivf_art_summary_preview->showPageHeader(); ?>
<div class="card ew-grid ivf_art_summary"><!-- .card -->
<?php if ($ivf_art_summary_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$ivf_art_summary_preview->renderListOptions();

// Render list options (header, left)
$ivf_art_summary_preview->ListOptions->render("header", "left");
?>
<?php if ($ivf_art_summary->id->Visible) { // id ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->id) == "") { ?>
		<th class="<?php echo $ivf_art_summary->id->headerCellClass() ?>"><?php echo $ivf_art_summary->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->id->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->id->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->id->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->ARTCycle->Visible) { // ARTCycle ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->ARTCycle) == "") { ?>
		<th class="<?php echo $ivf_art_summary->ARTCycle->headerCellClass() ?>"><?php echo $ivf_art_summary->ARTCycle->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->ARTCycle->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->ARTCycle->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->ARTCycle->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->ARTCycle->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->ARTCycle->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Spermorigin->Visible) { // Spermorigin ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->Spermorigin) == "") { ?>
		<th class="<?php echo $ivf_art_summary->Spermorigin->headerCellClass() ?>"><?php echo $ivf_art_summary->Spermorigin->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->Spermorigin->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->Spermorigin->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->Spermorigin->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->Spermorigin->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->Spermorigin->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->IndicationforART->Visible) { // IndicationforART ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->IndicationforART) == "") { ?>
		<th class="<?php echo $ivf_art_summary->IndicationforART->headerCellClass() ?>"><?php echo $ivf_art_summary->IndicationforART->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->IndicationforART->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->IndicationforART->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->IndicationforART->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->IndicationforART->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->IndicationforART->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->DateofICSI->Visible) { // DateofICSI ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->DateofICSI) == "") { ?>
		<th class="<?php echo $ivf_art_summary->DateofICSI->headerCellClass() ?>"><?php echo $ivf_art_summary->DateofICSI->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->DateofICSI->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->DateofICSI->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->DateofICSI->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->DateofICSI->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->DateofICSI->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Origin->Visible) { // Origin ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->Origin) == "") { ?>
		<th class="<?php echo $ivf_art_summary->Origin->headerCellClass() ?>"><?php echo $ivf_art_summary->Origin->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->Origin->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->Origin->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->Origin->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->Origin->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->Origin->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Status->Visible) { // Status ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->Status) == "") { ?>
		<th class="<?php echo $ivf_art_summary->Status->headerCellClass() ?>"><?php echo $ivf_art_summary->Status->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->Status->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->Status->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->Status->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->Status->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->Status->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Method->Visible) { // Method ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->Method) == "") { ?>
		<th class="<?php echo $ivf_art_summary->Method->headerCellClass() ?>"><?php echo $ivf_art_summary->Method->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->Method->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->Method->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->Method->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->Method->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->Method->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->pre_Concentration->Visible) { // pre_Concentration ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->pre_Concentration) == "") { ?>
		<th class="<?php echo $ivf_art_summary->pre_Concentration->headerCellClass() ?>"><?php echo $ivf_art_summary->pre_Concentration->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->pre_Concentration->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->pre_Concentration->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->pre_Concentration->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->pre_Concentration->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->pre_Concentration->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->pre_Motility->Visible) { // pre_Motility ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->pre_Motility) == "") { ?>
		<th class="<?php echo $ivf_art_summary->pre_Motility->headerCellClass() ?>"><?php echo $ivf_art_summary->pre_Motility->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->pre_Motility->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->pre_Motility->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->pre_Motility->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->pre_Motility->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->pre_Motility->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->pre_Morphology->Visible) { // pre_Morphology ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->pre_Morphology) == "") { ?>
		<th class="<?php echo $ivf_art_summary->pre_Morphology->headerCellClass() ?>"><?php echo $ivf_art_summary->pre_Morphology->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->pre_Morphology->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->pre_Morphology->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->pre_Morphology->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->pre_Morphology->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->pre_Morphology->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->post_Concentration->Visible) { // post_Concentration ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->post_Concentration) == "") { ?>
		<th class="<?php echo $ivf_art_summary->post_Concentration->headerCellClass() ?>"><?php echo $ivf_art_summary->post_Concentration->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->post_Concentration->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->post_Concentration->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->post_Concentration->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->post_Concentration->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->post_Concentration->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->post_Motility->Visible) { // post_Motility ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->post_Motility) == "") { ?>
		<th class="<?php echo $ivf_art_summary->post_Motility->headerCellClass() ?>"><?php echo $ivf_art_summary->post_Motility->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->post_Motility->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->post_Motility->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->post_Motility->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->post_Motility->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->post_Motility->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->post_Morphology->Visible) { // post_Morphology ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->post_Morphology) == "") { ?>
		<th class="<?php echo $ivf_art_summary->post_Morphology->headerCellClass() ?>"><?php echo $ivf_art_summary->post_Morphology->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->post_Morphology->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->post_Morphology->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->post_Morphology->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->post_Morphology->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->post_Morphology->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->NumberofEmbryostransferred->Visible) { // NumberofEmbryostransferred ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->NumberofEmbryostransferred) == "") { ?>
		<th class="<?php echo $ivf_art_summary->NumberofEmbryostransferred->headerCellClass() ?>"><?php echo $ivf_art_summary->NumberofEmbryostransferred->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->NumberofEmbryostransferred->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->NumberofEmbryostransferred->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->NumberofEmbryostransferred->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->NumberofEmbryostransferred->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->NumberofEmbryostransferred->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Embryosunderobservation->Visible) { // Embryosunderobservation ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->Embryosunderobservation) == "") { ?>
		<th class="<?php echo $ivf_art_summary->Embryosunderobservation->headerCellClass() ?>"><?php echo $ivf_art_summary->Embryosunderobservation->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->Embryosunderobservation->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->Embryosunderobservation->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->Embryosunderobservation->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->Embryosunderobservation->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->Embryosunderobservation->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->EmbryoDevelopmentSummary->Visible) { // EmbryoDevelopmentSummary ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->EmbryoDevelopmentSummary) == "") { ?>
		<th class="<?php echo $ivf_art_summary->EmbryoDevelopmentSummary->headerCellClass() ?>"><?php echo $ivf_art_summary->EmbryoDevelopmentSummary->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->EmbryoDevelopmentSummary->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->EmbryoDevelopmentSummary->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->EmbryoDevelopmentSummary->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->EmbryoDevelopmentSummary->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->EmbryoDevelopmentSummary->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->EmbryologistSignature->Visible) { // EmbryologistSignature ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->EmbryologistSignature) == "") { ?>
		<th class="<?php echo $ivf_art_summary->EmbryologistSignature->headerCellClass() ?>"><?php echo $ivf_art_summary->EmbryologistSignature->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->EmbryologistSignature->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->EmbryologistSignature->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->EmbryologistSignature->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->EmbryologistSignature->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->EmbryologistSignature->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->IVFRegistrationID->Visible) { // IVFRegistrationID ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->IVFRegistrationID) == "") { ?>
		<th class="<?php echo $ivf_art_summary->IVFRegistrationID->headerCellClass() ?>"><?php echo $ivf_art_summary->IVFRegistrationID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->IVFRegistrationID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->IVFRegistrationID->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->IVFRegistrationID->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->IVFRegistrationID->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->IVFRegistrationID->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->InseminatinTechnique) == "") { ?>
		<th class="<?php echo $ivf_art_summary->InseminatinTechnique->headerCellClass() ?>"><?php echo $ivf_art_summary->InseminatinTechnique->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->InseminatinTechnique->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->InseminatinTechnique->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->InseminatinTechnique->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->InseminatinTechnique->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->InseminatinTechnique->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->ICSIDetails->Visible) { // ICSIDetails ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->ICSIDetails) == "") { ?>
		<th class="<?php echo $ivf_art_summary->ICSIDetails->headerCellClass() ?>"><?php echo $ivf_art_summary->ICSIDetails->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->ICSIDetails->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->ICSIDetails->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->ICSIDetails->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->ICSIDetails->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->ICSIDetails->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->DateofET->Visible) { // DateofET ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->DateofET) == "") { ?>
		<th class="<?php echo $ivf_art_summary->DateofET->headerCellClass() ?>"><?php echo $ivf_art_summary->DateofET->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->DateofET->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->DateofET->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->DateofET->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->DateofET->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->DateofET->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Reasonfornotranfer->Visible) { // Reasonfornotranfer ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->Reasonfornotranfer) == "") { ?>
		<th class="<?php echo $ivf_art_summary->Reasonfornotranfer->headerCellClass() ?>"><?php echo $ivf_art_summary->Reasonfornotranfer->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->Reasonfornotranfer->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->Reasonfornotranfer->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->Reasonfornotranfer->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->Reasonfornotranfer->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->Reasonfornotranfer->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->EmbryosCryopreserved->Visible) { // EmbryosCryopreserved ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->EmbryosCryopreserved) == "") { ?>
		<th class="<?php echo $ivf_art_summary->EmbryosCryopreserved->headerCellClass() ?>"><?php echo $ivf_art_summary->EmbryosCryopreserved->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->EmbryosCryopreserved->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->EmbryosCryopreserved->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->EmbryosCryopreserved->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->EmbryosCryopreserved->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->EmbryosCryopreserved->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->LegendCellStage->Visible) { // LegendCellStage ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->LegendCellStage) == "") { ?>
		<th class="<?php echo $ivf_art_summary->LegendCellStage->headerCellClass() ?>"><?php echo $ivf_art_summary->LegendCellStage->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->LegendCellStage->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->LegendCellStage->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->LegendCellStage->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->LegendCellStage->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->LegendCellStage->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->ConsultantsSignature->Visible) { // ConsultantsSignature ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->ConsultantsSignature) == "") { ?>
		<th class="<?php echo $ivf_art_summary->ConsultantsSignature->headerCellClass() ?>"><?php echo $ivf_art_summary->ConsultantsSignature->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->ConsultantsSignature->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->ConsultantsSignature->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->ConsultantsSignature->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->ConsultantsSignature->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->ConsultantsSignature->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Name->Visible) { // Name ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->Name) == "") { ?>
		<th class="<?php echo $ivf_art_summary->Name->headerCellClass() ?>"><?php echo $ivf_art_summary->Name->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->Name->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->Name->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->Name->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->Name->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->Name->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->M2->Visible) { // M2 ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->M2) == "") { ?>
		<th class="<?php echo $ivf_art_summary->M2->headerCellClass() ?>"><?php echo $ivf_art_summary->M2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->M2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->M2->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->M2->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->M2->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->M2->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Mi2->Visible) { // Mi2 ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->Mi2) == "") { ?>
		<th class="<?php echo $ivf_art_summary->Mi2->headerCellClass() ?>"><?php echo $ivf_art_summary->Mi2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->Mi2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->Mi2->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->Mi2->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->Mi2->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->Mi2->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->ICSI->Visible) { // ICSI ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->ICSI) == "") { ?>
		<th class="<?php echo $ivf_art_summary->ICSI->headerCellClass() ?>"><?php echo $ivf_art_summary->ICSI->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->ICSI->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->ICSI->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->ICSI->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->ICSI->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->ICSI->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->IVF->Visible) { // IVF ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->IVF) == "") { ?>
		<th class="<?php echo $ivf_art_summary->IVF->headerCellClass() ?>"><?php echo $ivf_art_summary->IVF->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->IVF->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->IVF->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->IVF->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->IVF->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->IVF->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->M1->Visible) { // M1 ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->M1) == "") { ?>
		<th class="<?php echo $ivf_art_summary->M1->headerCellClass() ?>"><?php echo $ivf_art_summary->M1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->M1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->M1->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->M1->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->M1->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->M1->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->GV->Visible) { // GV ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->GV) == "") { ?>
		<th class="<?php echo $ivf_art_summary->GV->headerCellClass() ?>"><?php echo $ivf_art_summary->GV->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->GV->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->GV->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->GV->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->GV->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->GV->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Others->Visible) { // Others ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->Others) == "") { ?>
		<th class="<?php echo $ivf_art_summary->Others->headerCellClass() ?>"><?php echo $ivf_art_summary->Others->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->Others->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->Others->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->Others->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->Others->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->Others->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Normal2PN->Visible) { // Normal2PN ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->Normal2PN) == "") { ?>
		<th class="<?php echo $ivf_art_summary->Normal2PN->headerCellClass() ?>"><?php echo $ivf_art_summary->Normal2PN->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->Normal2PN->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->Normal2PN->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->Normal2PN->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->Normal2PN->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->Normal2PN->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Abnormalfertilisation1N->Visible) { // Abnormalfertilisation1N ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->Abnormalfertilisation1N) == "") { ?>
		<th class="<?php echo $ivf_art_summary->Abnormalfertilisation1N->headerCellClass() ?>"><?php echo $ivf_art_summary->Abnormalfertilisation1N->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->Abnormalfertilisation1N->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->Abnormalfertilisation1N->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->Abnormalfertilisation1N->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->Abnormalfertilisation1N->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->Abnormalfertilisation1N->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Abnormalfertilisation3N->Visible) { // Abnormalfertilisation3N ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->Abnormalfertilisation3N) == "") { ?>
		<th class="<?php echo $ivf_art_summary->Abnormalfertilisation3N->headerCellClass() ?>"><?php echo $ivf_art_summary->Abnormalfertilisation3N->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->Abnormalfertilisation3N->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->Abnormalfertilisation3N->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->Abnormalfertilisation3N->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->Abnormalfertilisation3N->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->Abnormalfertilisation3N->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->NotFertilized->Visible) { // NotFertilized ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->NotFertilized) == "") { ?>
		<th class="<?php echo $ivf_art_summary->NotFertilized->headerCellClass() ?>"><?php echo $ivf_art_summary->NotFertilized->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->NotFertilized->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->NotFertilized->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->NotFertilized->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->NotFertilized->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->NotFertilized->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Degenerated->Visible) { // Degenerated ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->Degenerated) == "") { ?>
		<th class="<?php echo $ivf_art_summary->Degenerated->headerCellClass() ?>"><?php echo $ivf_art_summary->Degenerated->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->Degenerated->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->Degenerated->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->Degenerated->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->Degenerated->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->Degenerated->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->SpermDate->Visible) { // SpermDate ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->SpermDate) == "") { ?>
		<th class="<?php echo $ivf_art_summary->SpermDate->headerCellClass() ?>"><?php echo $ivf_art_summary->SpermDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->SpermDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->SpermDate->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->SpermDate->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->SpermDate->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->SpermDate->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Code1->Visible) { // Code1 ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->Code1) == "") { ?>
		<th class="<?php echo $ivf_art_summary->Code1->headerCellClass() ?>"><?php echo $ivf_art_summary->Code1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->Code1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->Code1->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->Code1->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->Code1->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->Code1->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Day1->Visible) { // Day1 ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->Day1) == "") { ?>
		<th class="<?php echo $ivf_art_summary->Day1->headerCellClass() ?>"><?php echo $ivf_art_summary->Day1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->Day1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->Day1->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->Day1->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->Day1->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->Day1->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->CellStage1->Visible) { // CellStage1 ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->CellStage1) == "") { ?>
		<th class="<?php echo $ivf_art_summary->CellStage1->headerCellClass() ?>"><?php echo $ivf_art_summary->CellStage1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->CellStage1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->CellStage1->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->CellStage1->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->CellStage1->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->CellStage1->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Grade1->Visible) { // Grade1 ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->Grade1) == "") { ?>
		<th class="<?php echo $ivf_art_summary->Grade1->headerCellClass() ?>"><?php echo $ivf_art_summary->Grade1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->Grade1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->Grade1->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->Grade1->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->Grade1->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->Grade1->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->State1->Visible) { // State1 ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->State1) == "") { ?>
		<th class="<?php echo $ivf_art_summary->State1->headerCellClass() ?>"><?php echo $ivf_art_summary->State1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->State1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->State1->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->State1->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->State1->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->State1->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Code2->Visible) { // Code2 ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->Code2) == "") { ?>
		<th class="<?php echo $ivf_art_summary->Code2->headerCellClass() ?>"><?php echo $ivf_art_summary->Code2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->Code2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->Code2->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->Code2->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->Code2->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->Code2->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Day2->Visible) { // Day2 ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->Day2) == "") { ?>
		<th class="<?php echo $ivf_art_summary->Day2->headerCellClass() ?>"><?php echo $ivf_art_summary->Day2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->Day2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->Day2->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->Day2->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->Day2->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->Day2->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->CellStage2->Visible) { // CellStage2 ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->CellStage2) == "") { ?>
		<th class="<?php echo $ivf_art_summary->CellStage2->headerCellClass() ?>"><?php echo $ivf_art_summary->CellStage2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->CellStage2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->CellStage2->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->CellStage2->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->CellStage2->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->CellStage2->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Grade2->Visible) { // Grade2 ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->Grade2) == "") { ?>
		<th class="<?php echo $ivf_art_summary->Grade2->headerCellClass() ?>"><?php echo $ivf_art_summary->Grade2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->Grade2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->Grade2->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->Grade2->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->Grade2->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->Grade2->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->State2->Visible) { // State2 ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->State2) == "") { ?>
		<th class="<?php echo $ivf_art_summary->State2->headerCellClass() ?>"><?php echo $ivf_art_summary->State2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->State2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->State2->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->State2->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->State2->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->State2->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Code3->Visible) { // Code3 ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->Code3) == "") { ?>
		<th class="<?php echo $ivf_art_summary->Code3->headerCellClass() ?>"><?php echo $ivf_art_summary->Code3->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->Code3->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->Code3->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->Code3->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->Code3->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->Code3->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Day3->Visible) { // Day3 ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->Day3) == "") { ?>
		<th class="<?php echo $ivf_art_summary->Day3->headerCellClass() ?>"><?php echo $ivf_art_summary->Day3->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->Day3->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->Day3->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->Day3->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->Day3->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->Day3->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->CellStage3->Visible) { // CellStage3 ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->CellStage3) == "") { ?>
		<th class="<?php echo $ivf_art_summary->CellStage3->headerCellClass() ?>"><?php echo $ivf_art_summary->CellStage3->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->CellStage3->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->CellStage3->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->CellStage3->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->CellStage3->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->CellStage3->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Grade3->Visible) { // Grade3 ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->Grade3) == "") { ?>
		<th class="<?php echo $ivf_art_summary->Grade3->headerCellClass() ?>"><?php echo $ivf_art_summary->Grade3->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->Grade3->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->Grade3->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->Grade3->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->Grade3->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->Grade3->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->State3->Visible) { // State3 ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->State3) == "") { ?>
		<th class="<?php echo $ivf_art_summary->State3->headerCellClass() ?>"><?php echo $ivf_art_summary->State3->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->State3->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->State3->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->State3->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->State3->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->State3->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Code4->Visible) { // Code4 ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->Code4) == "") { ?>
		<th class="<?php echo $ivf_art_summary->Code4->headerCellClass() ?>"><?php echo $ivf_art_summary->Code4->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->Code4->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->Code4->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->Code4->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->Code4->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->Code4->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Day4->Visible) { // Day4 ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->Day4) == "") { ?>
		<th class="<?php echo $ivf_art_summary->Day4->headerCellClass() ?>"><?php echo $ivf_art_summary->Day4->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->Day4->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->Day4->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->Day4->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->Day4->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->Day4->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->CellStage4->Visible) { // CellStage4 ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->CellStage4) == "") { ?>
		<th class="<?php echo $ivf_art_summary->CellStage4->headerCellClass() ?>"><?php echo $ivf_art_summary->CellStage4->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->CellStage4->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->CellStage4->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->CellStage4->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->CellStage4->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->CellStage4->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Grade4->Visible) { // Grade4 ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->Grade4) == "") { ?>
		<th class="<?php echo $ivf_art_summary->Grade4->headerCellClass() ?>"><?php echo $ivf_art_summary->Grade4->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->Grade4->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->Grade4->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->Grade4->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->Grade4->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->Grade4->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->State4->Visible) { // State4 ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->State4) == "") { ?>
		<th class="<?php echo $ivf_art_summary->State4->headerCellClass() ?>"><?php echo $ivf_art_summary->State4->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->State4->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->State4->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->State4->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->State4->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->State4->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Code5->Visible) { // Code5 ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->Code5) == "") { ?>
		<th class="<?php echo $ivf_art_summary->Code5->headerCellClass() ?>"><?php echo $ivf_art_summary->Code5->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->Code5->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->Code5->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->Code5->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->Code5->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->Code5->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Day5->Visible) { // Day5 ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->Day5) == "") { ?>
		<th class="<?php echo $ivf_art_summary->Day5->headerCellClass() ?>"><?php echo $ivf_art_summary->Day5->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->Day5->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->Day5->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->Day5->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->Day5->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->Day5->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->CellStage5->Visible) { // CellStage5 ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->CellStage5) == "") { ?>
		<th class="<?php echo $ivf_art_summary->CellStage5->headerCellClass() ?>"><?php echo $ivf_art_summary->CellStage5->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->CellStage5->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->CellStage5->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->CellStage5->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->CellStage5->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->CellStage5->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Grade5->Visible) { // Grade5 ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->Grade5) == "") { ?>
		<th class="<?php echo $ivf_art_summary->Grade5->headerCellClass() ?>"><?php echo $ivf_art_summary->Grade5->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->Grade5->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->Grade5->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->Grade5->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->Grade5->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->Grade5->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->State5->Visible) { // State5 ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->State5) == "") { ?>
		<th class="<?php echo $ivf_art_summary->State5->headerCellClass() ?>"><?php echo $ivf_art_summary->State5->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->State5->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->State5->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->State5->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->State5->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->State5->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->TidNo->Visible) { // TidNo ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->TidNo) == "") { ?>
		<th class="<?php echo $ivf_art_summary->TidNo->headerCellClass() ?>"><?php echo $ivf_art_summary->TidNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->TidNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->TidNo->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->TidNo->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->TidNo->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->TidNo->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->RIDNo->Visible) { // RIDNo ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->RIDNo) == "") { ?>
		<th class="<?php echo $ivf_art_summary->RIDNo->headerCellClass() ?>"><?php echo $ivf_art_summary->RIDNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->RIDNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->RIDNo->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->RIDNo->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->RIDNo->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->RIDNo->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Volume->Visible) { // Volume ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->Volume) == "") { ?>
		<th class="<?php echo $ivf_art_summary->Volume->headerCellClass() ?>"><?php echo $ivf_art_summary->Volume->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->Volume->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->Volume->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->Volume->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->Volume->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->Volume->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Volume1->Visible) { // Volume1 ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->Volume1) == "") { ?>
		<th class="<?php echo $ivf_art_summary->Volume1->headerCellClass() ?>"><?php echo $ivf_art_summary->Volume1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->Volume1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->Volume1->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->Volume1->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->Volume1->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->Volume1->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Volume2->Visible) { // Volume2 ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->Volume2) == "") { ?>
		<th class="<?php echo $ivf_art_summary->Volume2->headerCellClass() ?>"><?php echo $ivf_art_summary->Volume2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->Volume2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->Volume2->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->Volume2->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->Volume2->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->Volume2->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Concentration2->Visible) { // Concentration2 ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->Concentration2) == "") { ?>
		<th class="<?php echo $ivf_art_summary->Concentration2->headerCellClass() ?>"><?php echo $ivf_art_summary->Concentration2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->Concentration2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->Concentration2->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->Concentration2->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->Concentration2->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->Concentration2->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Total->Visible) { // Total ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->Total) == "") { ?>
		<th class="<?php echo $ivf_art_summary->Total->headerCellClass() ?>"><?php echo $ivf_art_summary->Total->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->Total->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->Total->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->Total->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->Total->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->Total->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Total1->Visible) { // Total1 ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->Total1) == "") { ?>
		<th class="<?php echo $ivf_art_summary->Total1->headerCellClass() ?>"><?php echo $ivf_art_summary->Total1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->Total1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->Total1->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->Total1->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->Total1->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->Total1->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Total2->Visible) { // Total2 ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->Total2) == "") { ?>
		<th class="<?php echo $ivf_art_summary->Total2->headerCellClass() ?>"><?php echo $ivf_art_summary->Total2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->Total2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->Total2->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->Total2->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->Total2->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->Total2->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Progressive->Visible) { // Progressive ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->Progressive) == "") { ?>
		<th class="<?php echo $ivf_art_summary->Progressive->headerCellClass() ?>"><?php echo $ivf_art_summary->Progressive->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->Progressive->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->Progressive->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->Progressive->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->Progressive->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->Progressive->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Progressive1->Visible) { // Progressive1 ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->Progressive1) == "") { ?>
		<th class="<?php echo $ivf_art_summary->Progressive1->headerCellClass() ?>"><?php echo $ivf_art_summary->Progressive1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->Progressive1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->Progressive1->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->Progressive1->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->Progressive1->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->Progressive1->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Progressive2->Visible) { // Progressive2 ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->Progressive2) == "") { ?>
		<th class="<?php echo $ivf_art_summary->Progressive2->headerCellClass() ?>"><?php echo $ivf_art_summary->Progressive2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->Progressive2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->Progressive2->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->Progressive2->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->Progressive2->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->Progressive2->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->NotProgressive->Visible) { // NotProgressive ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->NotProgressive) == "") { ?>
		<th class="<?php echo $ivf_art_summary->NotProgressive->headerCellClass() ?>"><?php echo $ivf_art_summary->NotProgressive->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->NotProgressive->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->NotProgressive->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->NotProgressive->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->NotProgressive->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->NotProgressive->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->NotProgressive1->Visible) { // NotProgressive1 ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->NotProgressive1) == "") { ?>
		<th class="<?php echo $ivf_art_summary->NotProgressive1->headerCellClass() ?>"><?php echo $ivf_art_summary->NotProgressive1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->NotProgressive1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->NotProgressive1->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->NotProgressive1->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->NotProgressive1->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->NotProgressive1->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->NotProgressive2->Visible) { // NotProgressive2 ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->NotProgressive2) == "") { ?>
		<th class="<?php echo $ivf_art_summary->NotProgressive2->headerCellClass() ?>"><?php echo $ivf_art_summary->NotProgressive2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->NotProgressive2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->NotProgressive2->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->NotProgressive2->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->NotProgressive2->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->NotProgressive2->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Motility2->Visible) { // Motility2 ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->Motility2) == "") { ?>
		<th class="<?php echo $ivf_art_summary->Motility2->headerCellClass() ?>"><?php echo $ivf_art_summary->Motility2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->Motility2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->Motility2->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->Motility2->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->Motility2->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->Motility2->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Morphology2->Visible) { // Morphology2 ?>
	<?php if ($ivf_art_summary->SortUrl($ivf_art_summary->Morphology2) == "") { ?>
		<th class="<?php echo $ivf_art_summary->Morphology2->headerCellClass() ?>"><?php echo $ivf_art_summary->Morphology2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_art_summary->Morphology2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_art_summary->Morphology2->Name ?>" data-sort-order="<?php echo $ivf_art_summary_preview->SortField == $ivf_art_summary->Morphology2->Name && $ivf_art_summary_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_art_summary->Morphology2->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_art_summary_preview->SortField == $ivf_art_summary->Morphology2->Name) { ?><?php if ($ivf_art_summary_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_art_summary_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$ivf_art_summary_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$ivf_art_summary_preview->RecCount = 0;
$ivf_art_summary_preview->RowCnt = 0;
while ($ivf_art_summary_preview->Recordset && !$ivf_art_summary_preview->Recordset->EOF) {

	// Init row class and style
	$ivf_art_summary_preview->RecCount++;
	$ivf_art_summary_preview->RowCnt++;
	$ivf_art_summary_preview->CssStyle = "";
	$ivf_art_summary_preview->loadListRowValues($ivf_art_summary_preview->Recordset);

	// Render row
	$ivf_art_summary_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$ivf_art_summary_preview->resetAttributes();
	$ivf_art_summary_preview->renderListRow();

	// Render list options
	$ivf_art_summary_preview->renderListOptions();
?>
	<tr<?php echo $ivf_art_summary_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_art_summary_preview->ListOptions->render("body", "left", $ivf_art_summary_preview->RowCnt);
?>
<?php if ($ivf_art_summary->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $ivf_art_summary->id->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->id->viewAttributes() ?>>
<?php echo $ivf_art_summary->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->ARTCycle->Visible) { // ARTCycle ?>
		<!-- ARTCycle -->
		<td<?php echo $ivf_art_summary->ARTCycle->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->ARTCycle->viewAttributes() ?>>
<?php echo $ivf_art_summary->ARTCycle->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Spermorigin->Visible) { // Spermorigin ?>
		<!-- Spermorigin -->
		<td<?php echo $ivf_art_summary->Spermorigin->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->Spermorigin->viewAttributes() ?>>
<?php echo $ivf_art_summary->Spermorigin->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->IndicationforART->Visible) { // IndicationforART ?>
		<!-- IndicationforART -->
		<td<?php echo $ivf_art_summary->IndicationforART->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->IndicationforART->viewAttributes() ?>>
<?php echo $ivf_art_summary->IndicationforART->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->DateofICSI->Visible) { // DateofICSI ?>
		<!-- DateofICSI -->
		<td<?php echo $ivf_art_summary->DateofICSI->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->DateofICSI->viewAttributes() ?>>
<?php echo $ivf_art_summary->DateofICSI->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Origin->Visible) { // Origin ?>
		<!-- Origin -->
		<td<?php echo $ivf_art_summary->Origin->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->Origin->viewAttributes() ?>>
<?php echo $ivf_art_summary->Origin->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Status->Visible) { // Status ?>
		<!-- Status -->
		<td<?php echo $ivf_art_summary->Status->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->Status->viewAttributes() ?>>
<?php echo $ivf_art_summary->Status->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Method->Visible) { // Method ?>
		<!-- Method -->
		<td<?php echo $ivf_art_summary->Method->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->Method->viewAttributes() ?>>
<?php echo $ivf_art_summary->Method->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->pre_Concentration->Visible) { // pre_Concentration ?>
		<!-- pre_Concentration -->
		<td<?php echo $ivf_art_summary->pre_Concentration->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->pre_Concentration->viewAttributes() ?>>
<?php echo $ivf_art_summary->pre_Concentration->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->pre_Motility->Visible) { // pre_Motility ?>
		<!-- pre_Motility -->
		<td<?php echo $ivf_art_summary->pre_Motility->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->pre_Motility->viewAttributes() ?>>
<?php echo $ivf_art_summary->pre_Motility->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->pre_Morphology->Visible) { // pre_Morphology ?>
		<!-- pre_Morphology -->
		<td<?php echo $ivf_art_summary->pre_Morphology->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->pre_Morphology->viewAttributes() ?>>
<?php echo $ivf_art_summary->pre_Morphology->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->post_Concentration->Visible) { // post_Concentration ?>
		<!-- post_Concentration -->
		<td<?php echo $ivf_art_summary->post_Concentration->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->post_Concentration->viewAttributes() ?>>
<?php echo $ivf_art_summary->post_Concentration->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->post_Motility->Visible) { // post_Motility ?>
		<!-- post_Motility -->
		<td<?php echo $ivf_art_summary->post_Motility->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->post_Motility->viewAttributes() ?>>
<?php echo $ivf_art_summary->post_Motility->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->post_Morphology->Visible) { // post_Morphology ?>
		<!-- post_Morphology -->
		<td<?php echo $ivf_art_summary->post_Morphology->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->post_Morphology->viewAttributes() ?>>
<?php echo $ivf_art_summary->post_Morphology->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->NumberofEmbryostransferred->Visible) { // NumberofEmbryostransferred ?>
		<!-- NumberofEmbryostransferred -->
		<td<?php echo $ivf_art_summary->NumberofEmbryostransferred->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->NumberofEmbryostransferred->viewAttributes() ?>>
<?php echo $ivf_art_summary->NumberofEmbryostransferred->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Embryosunderobservation->Visible) { // Embryosunderobservation ?>
		<!-- Embryosunderobservation -->
		<td<?php echo $ivf_art_summary->Embryosunderobservation->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->Embryosunderobservation->viewAttributes() ?>>
<?php echo $ivf_art_summary->Embryosunderobservation->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->EmbryoDevelopmentSummary->Visible) { // EmbryoDevelopmentSummary ?>
		<!-- EmbryoDevelopmentSummary -->
		<td<?php echo $ivf_art_summary->EmbryoDevelopmentSummary->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->EmbryoDevelopmentSummary->viewAttributes() ?>>
<?php echo $ivf_art_summary->EmbryoDevelopmentSummary->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->EmbryologistSignature->Visible) { // EmbryologistSignature ?>
		<!-- EmbryologistSignature -->
		<td<?php echo $ivf_art_summary->EmbryologistSignature->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->EmbryologistSignature->viewAttributes() ?>>
<?php echo $ivf_art_summary->EmbryologistSignature->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->IVFRegistrationID->Visible) { // IVFRegistrationID ?>
		<!-- IVFRegistrationID -->
		<td<?php echo $ivf_art_summary->IVFRegistrationID->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->IVFRegistrationID->viewAttributes() ?>>
<?php echo $ivf_art_summary->IVFRegistrationID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
		<!-- InseminatinTechnique -->
		<td<?php echo $ivf_art_summary->InseminatinTechnique->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->InseminatinTechnique->viewAttributes() ?>>
<?php echo $ivf_art_summary->InseminatinTechnique->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->ICSIDetails->Visible) { // ICSIDetails ?>
		<!-- ICSIDetails -->
		<td<?php echo $ivf_art_summary->ICSIDetails->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->ICSIDetails->viewAttributes() ?>>
<?php echo $ivf_art_summary->ICSIDetails->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->DateofET->Visible) { // DateofET ?>
		<!-- DateofET -->
		<td<?php echo $ivf_art_summary->DateofET->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->DateofET->viewAttributes() ?>>
<?php echo $ivf_art_summary->DateofET->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Reasonfornotranfer->Visible) { // Reasonfornotranfer ?>
		<!-- Reasonfornotranfer -->
		<td<?php echo $ivf_art_summary->Reasonfornotranfer->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->Reasonfornotranfer->viewAttributes() ?>>
<?php echo $ivf_art_summary->Reasonfornotranfer->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->EmbryosCryopreserved->Visible) { // EmbryosCryopreserved ?>
		<!-- EmbryosCryopreserved -->
		<td<?php echo $ivf_art_summary->EmbryosCryopreserved->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->EmbryosCryopreserved->viewAttributes() ?>>
<?php echo $ivf_art_summary->EmbryosCryopreserved->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->LegendCellStage->Visible) { // LegendCellStage ?>
		<!-- LegendCellStage -->
		<td<?php echo $ivf_art_summary->LegendCellStage->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->LegendCellStage->viewAttributes() ?>>
<?php echo $ivf_art_summary->LegendCellStage->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->ConsultantsSignature->Visible) { // ConsultantsSignature ?>
		<!-- ConsultantsSignature -->
		<td<?php echo $ivf_art_summary->ConsultantsSignature->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->ConsultantsSignature->viewAttributes() ?>>
<?php echo $ivf_art_summary->ConsultantsSignature->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Name->Visible) { // Name ?>
		<!-- Name -->
		<td<?php echo $ivf_art_summary->Name->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->Name->viewAttributes() ?>>
<?php echo $ivf_art_summary->Name->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->M2->Visible) { // M2 ?>
		<!-- M2 -->
		<td<?php echo $ivf_art_summary->M2->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->M2->viewAttributes() ?>>
<?php echo $ivf_art_summary->M2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Mi2->Visible) { // Mi2 ?>
		<!-- Mi2 -->
		<td<?php echo $ivf_art_summary->Mi2->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->Mi2->viewAttributes() ?>>
<?php echo $ivf_art_summary->Mi2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->ICSI->Visible) { // ICSI ?>
		<!-- ICSI -->
		<td<?php echo $ivf_art_summary->ICSI->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->ICSI->viewAttributes() ?>>
<?php echo $ivf_art_summary->ICSI->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->IVF->Visible) { // IVF ?>
		<!-- IVF -->
		<td<?php echo $ivf_art_summary->IVF->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->IVF->viewAttributes() ?>>
<?php echo $ivf_art_summary->IVF->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->M1->Visible) { // M1 ?>
		<!-- M1 -->
		<td<?php echo $ivf_art_summary->M1->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->M1->viewAttributes() ?>>
<?php echo $ivf_art_summary->M1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->GV->Visible) { // GV ?>
		<!-- GV -->
		<td<?php echo $ivf_art_summary->GV->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->GV->viewAttributes() ?>>
<?php echo $ivf_art_summary->GV->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Others->Visible) { // Others ?>
		<!-- Others -->
		<td<?php echo $ivf_art_summary->Others->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->Others->viewAttributes() ?>>
<?php echo $ivf_art_summary->Others->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Normal2PN->Visible) { // Normal2PN ?>
		<!-- Normal2PN -->
		<td<?php echo $ivf_art_summary->Normal2PN->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->Normal2PN->viewAttributes() ?>>
<?php echo $ivf_art_summary->Normal2PN->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Abnormalfertilisation1N->Visible) { // Abnormalfertilisation1N ?>
		<!-- Abnormalfertilisation1N -->
		<td<?php echo $ivf_art_summary->Abnormalfertilisation1N->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->Abnormalfertilisation1N->viewAttributes() ?>>
<?php echo $ivf_art_summary->Abnormalfertilisation1N->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Abnormalfertilisation3N->Visible) { // Abnormalfertilisation3N ?>
		<!-- Abnormalfertilisation3N -->
		<td<?php echo $ivf_art_summary->Abnormalfertilisation3N->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->Abnormalfertilisation3N->viewAttributes() ?>>
<?php echo $ivf_art_summary->Abnormalfertilisation3N->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->NotFertilized->Visible) { // NotFertilized ?>
		<!-- NotFertilized -->
		<td<?php echo $ivf_art_summary->NotFertilized->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->NotFertilized->viewAttributes() ?>>
<?php echo $ivf_art_summary->NotFertilized->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Degenerated->Visible) { // Degenerated ?>
		<!-- Degenerated -->
		<td<?php echo $ivf_art_summary->Degenerated->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->Degenerated->viewAttributes() ?>>
<?php echo $ivf_art_summary->Degenerated->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->SpermDate->Visible) { // SpermDate ?>
		<!-- SpermDate -->
		<td<?php echo $ivf_art_summary->SpermDate->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->SpermDate->viewAttributes() ?>>
<?php echo $ivf_art_summary->SpermDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Code1->Visible) { // Code1 ?>
		<!-- Code1 -->
		<td<?php echo $ivf_art_summary->Code1->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->Code1->viewAttributes() ?>>
<?php echo $ivf_art_summary->Code1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Day1->Visible) { // Day1 ?>
		<!-- Day1 -->
		<td<?php echo $ivf_art_summary->Day1->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->Day1->viewAttributes() ?>>
<?php echo $ivf_art_summary->Day1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->CellStage1->Visible) { // CellStage1 ?>
		<!-- CellStage1 -->
		<td<?php echo $ivf_art_summary->CellStage1->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->CellStage1->viewAttributes() ?>>
<?php echo $ivf_art_summary->CellStage1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Grade1->Visible) { // Grade1 ?>
		<!-- Grade1 -->
		<td<?php echo $ivf_art_summary->Grade1->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->Grade1->viewAttributes() ?>>
<?php echo $ivf_art_summary->Grade1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->State1->Visible) { // State1 ?>
		<!-- State1 -->
		<td<?php echo $ivf_art_summary->State1->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->State1->viewAttributes() ?>>
<?php echo $ivf_art_summary->State1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Code2->Visible) { // Code2 ?>
		<!-- Code2 -->
		<td<?php echo $ivf_art_summary->Code2->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->Code2->viewAttributes() ?>>
<?php echo $ivf_art_summary->Code2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Day2->Visible) { // Day2 ?>
		<!-- Day2 -->
		<td<?php echo $ivf_art_summary->Day2->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->Day2->viewAttributes() ?>>
<?php echo $ivf_art_summary->Day2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->CellStage2->Visible) { // CellStage2 ?>
		<!-- CellStage2 -->
		<td<?php echo $ivf_art_summary->CellStage2->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->CellStage2->viewAttributes() ?>>
<?php echo $ivf_art_summary->CellStage2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Grade2->Visible) { // Grade2 ?>
		<!-- Grade2 -->
		<td<?php echo $ivf_art_summary->Grade2->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->Grade2->viewAttributes() ?>>
<?php echo $ivf_art_summary->Grade2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->State2->Visible) { // State2 ?>
		<!-- State2 -->
		<td<?php echo $ivf_art_summary->State2->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->State2->viewAttributes() ?>>
<?php echo $ivf_art_summary->State2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Code3->Visible) { // Code3 ?>
		<!-- Code3 -->
		<td<?php echo $ivf_art_summary->Code3->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->Code3->viewAttributes() ?>>
<?php echo $ivf_art_summary->Code3->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Day3->Visible) { // Day3 ?>
		<!-- Day3 -->
		<td<?php echo $ivf_art_summary->Day3->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->Day3->viewAttributes() ?>>
<?php echo $ivf_art_summary->Day3->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->CellStage3->Visible) { // CellStage3 ?>
		<!-- CellStage3 -->
		<td<?php echo $ivf_art_summary->CellStage3->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->CellStage3->viewAttributes() ?>>
<?php echo $ivf_art_summary->CellStage3->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Grade3->Visible) { // Grade3 ?>
		<!-- Grade3 -->
		<td<?php echo $ivf_art_summary->Grade3->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->Grade3->viewAttributes() ?>>
<?php echo $ivf_art_summary->Grade3->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->State3->Visible) { // State3 ?>
		<!-- State3 -->
		<td<?php echo $ivf_art_summary->State3->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->State3->viewAttributes() ?>>
<?php echo $ivf_art_summary->State3->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Code4->Visible) { // Code4 ?>
		<!-- Code4 -->
		<td<?php echo $ivf_art_summary->Code4->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->Code4->viewAttributes() ?>>
<?php echo $ivf_art_summary->Code4->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Day4->Visible) { // Day4 ?>
		<!-- Day4 -->
		<td<?php echo $ivf_art_summary->Day4->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->Day4->viewAttributes() ?>>
<?php echo $ivf_art_summary->Day4->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->CellStage4->Visible) { // CellStage4 ?>
		<!-- CellStage4 -->
		<td<?php echo $ivf_art_summary->CellStage4->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->CellStage4->viewAttributes() ?>>
<?php echo $ivf_art_summary->CellStage4->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Grade4->Visible) { // Grade4 ?>
		<!-- Grade4 -->
		<td<?php echo $ivf_art_summary->Grade4->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->Grade4->viewAttributes() ?>>
<?php echo $ivf_art_summary->Grade4->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->State4->Visible) { // State4 ?>
		<!-- State4 -->
		<td<?php echo $ivf_art_summary->State4->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->State4->viewAttributes() ?>>
<?php echo $ivf_art_summary->State4->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Code5->Visible) { // Code5 ?>
		<!-- Code5 -->
		<td<?php echo $ivf_art_summary->Code5->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->Code5->viewAttributes() ?>>
<?php echo $ivf_art_summary->Code5->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Day5->Visible) { // Day5 ?>
		<!-- Day5 -->
		<td<?php echo $ivf_art_summary->Day5->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->Day5->viewAttributes() ?>>
<?php echo $ivf_art_summary->Day5->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->CellStage5->Visible) { // CellStage5 ?>
		<!-- CellStage5 -->
		<td<?php echo $ivf_art_summary->CellStage5->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->CellStage5->viewAttributes() ?>>
<?php echo $ivf_art_summary->CellStage5->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Grade5->Visible) { // Grade5 ?>
		<!-- Grade5 -->
		<td<?php echo $ivf_art_summary->Grade5->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->Grade5->viewAttributes() ?>>
<?php echo $ivf_art_summary->Grade5->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->State5->Visible) { // State5 ?>
		<!-- State5 -->
		<td<?php echo $ivf_art_summary->State5->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->State5->viewAttributes() ?>>
<?php echo $ivf_art_summary->State5->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->TidNo->Visible) { // TidNo ?>
		<!-- TidNo -->
		<td<?php echo $ivf_art_summary->TidNo->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->TidNo->viewAttributes() ?>>
<?php echo $ivf_art_summary->TidNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->RIDNo->Visible) { // RIDNo ?>
		<!-- RIDNo -->
		<td<?php echo $ivf_art_summary->RIDNo->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->RIDNo->viewAttributes() ?>>
<?php echo $ivf_art_summary->RIDNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Volume->Visible) { // Volume ?>
		<!-- Volume -->
		<td<?php echo $ivf_art_summary->Volume->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->Volume->viewAttributes() ?>>
<?php echo $ivf_art_summary->Volume->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Volume1->Visible) { // Volume1 ?>
		<!-- Volume1 -->
		<td<?php echo $ivf_art_summary->Volume1->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->Volume1->viewAttributes() ?>>
<?php echo $ivf_art_summary->Volume1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Volume2->Visible) { // Volume2 ?>
		<!-- Volume2 -->
		<td<?php echo $ivf_art_summary->Volume2->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->Volume2->viewAttributes() ?>>
<?php echo $ivf_art_summary->Volume2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Concentration2->Visible) { // Concentration2 ?>
		<!-- Concentration2 -->
		<td<?php echo $ivf_art_summary->Concentration2->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->Concentration2->viewAttributes() ?>>
<?php echo $ivf_art_summary->Concentration2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Total->Visible) { // Total ?>
		<!-- Total -->
		<td<?php echo $ivf_art_summary->Total->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->Total->viewAttributes() ?>>
<?php echo $ivf_art_summary->Total->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Total1->Visible) { // Total1 ?>
		<!-- Total1 -->
		<td<?php echo $ivf_art_summary->Total1->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->Total1->viewAttributes() ?>>
<?php echo $ivf_art_summary->Total1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Total2->Visible) { // Total2 ?>
		<!-- Total2 -->
		<td<?php echo $ivf_art_summary->Total2->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->Total2->viewAttributes() ?>>
<?php echo $ivf_art_summary->Total2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Progressive->Visible) { // Progressive ?>
		<!-- Progressive -->
		<td<?php echo $ivf_art_summary->Progressive->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->Progressive->viewAttributes() ?>>
<?php echo $ivf_art_summary->Progressive->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Progressive1->Visible) { // Progressive1 ?>
		<!-- Progressive1 -->
		<td<?php echo $ivf_art_summary->Progressive1->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->Progressive1->viewAttributes() ?>>
<?php echo $ivf_art_summary->Progressive1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Progressive2->Visible) { // Progressive2 ?>
		<!-- Progressive2 -->
		<td<?php echo $ivf_art_summary->Progressive2->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->Progressive2->viewAttributes() ?>>
<?php echo $ivf_art_summary->Progressive2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->NotProgressive->Visible) { // NotProgressive ?>
		<!-- NotProgressive -->
		<td<?php echo $ivf_art_summary->NotProgressive->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->NotProgressive->viewAttributes() ?>>
<?php echo $ivf_art_summary->NotProgressive->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->NotProgressive1->Visible) { // NotProgressive1 ?>
		<!-- NotProgressive1 -->
		<td<?php echo $ivf_art_summary->NotProgressive1->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->NotProgressive1->viewAttributes() ?>>
<?php echo $ivf_art_summary->NotProgressive1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->NotProgressive2->Visible) { // NotProgressive2 ?>
		<!-- NotProgressive2 -->
		<td<?php echo $ivf_art_summary->NotProgressive2->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->NotProgressive2->viewAttributes() ?>>
<?php echo $ivf_art_summary->NotProgressive2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Motility2->Visible) { // Motility2 ?>
		<!-- Motility2 -->
		<td<?php echo $ivf_art_summary->Motility2->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->Motility2->viewAttributes() ?>>
<?php echo $ivf_art_summary->Motility2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Morphology2->Visible) { // Morphology2 ?>
		<!-- Morphology2 -->
		<td<?php echo $ivf_art_summary->Morphology2->cellAttributes() ?>>
<span<?php echo $ivf_art_summary->Morphology2->viewAttributes() ?>>
<?php echo $ivf_art_summary->Morphology2->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$ivf_art_summary_preview->ListOptions->render("body", "right", $ivf_art_summary_preview->RowCnt);
?>
	</tr>
<?php
	$ivf_art_summary_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($ivf_art_summary_preview->TotalRecs > 0) { ?>
<?php if (!isset($ivf_art_summary_preview->Pager)) $ivf_art_summary_preview->Pager = new PrevNextPager($ivf_art_summary_preview->StartRec, $ivf_art_summary_preview->DisplayRecs, $ivf_art_summary_preview->TotalRecs) ?>
<?php if ($ivf_art_summary_preview->Pager->RecordCount > 0 && $ivf_art_summary_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($ivf_art_summary_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $ivf_art_summary_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($ivf_art_summary_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $ivf_art_summary_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($ivf_art_summary_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $ivf_art_summary_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($ivf_art_summary_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $ivf_art_summary_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $ivf_art_summary_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $ivf_art_summary_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $ivf_art_summary_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($ivf_art_summary_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$ivf_art_summary_preview->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php
if ($ivf_art_summary_preview->Recordset)
	$ivf_art_summary_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$ivf_art_summary_preview->terminate();
?>
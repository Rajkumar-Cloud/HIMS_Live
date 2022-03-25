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
$ivf_oocytedenudation_preview = new ivf_oocytedenudation_preview();

// Run the page
$ivf_oocytedenudation_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_oocytedenudation_preview->Page_Render();
?>
<?php $ivf_oocytedenudation_preview->showPageHeader(); ?>
<?php if ($ivf_oocytedenudation_preview->TotalRecords > 0) { ?>
<div class="card ew-grid ivf_oocytedenudation"><!-- .card -->
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel ew-preview-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$ivf_oocytedenudation_preview->renderListOptions();

// Render list options (header, left)
$ivf_oocytedenudation_preview->ListOptions->render("header", "left");
?>
<?php if ($ivf_oocytedenudation_preview->id->Visible) { // id ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation_preview->id) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->id->headerCellClass() ?>"><?php echo $ivf_oocytedenudation_preview->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_oocytedenudation_preview->id->Name) ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->id->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_preview->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->id->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->RIDNo->Visible) { // RIDNo ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation_preview->RIDNo) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->RIDNo->headerCellClass() ?>"><?php echo $ivf_oocytedenudation_preview->RIDNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->RIDNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_oocytedenudation_preview->RIDNo->Name) ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->RIDNo->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_preview->RIDNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->RIDNo->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->Name->Visible) { // Name ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation_preview->Name) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->Name->headerCellClass() ?>"><?php echo $ivf_oocytedenudation_preview->Name->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->Name->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_oocytedenudation_preview->Name->Name) ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->Name->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_preview->Name->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->Name->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->ResultDate->Visible) { // ResultDate ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation_preview->ResultDate) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->ResultDate->headerCellClass() ?>"><?php echo $ivf_oocytedenudation_preview->ResultDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->ResultDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_oocytedenudation_preview->ResultDate->Name) ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->ResultDate->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_preview->ResultDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->ResultDate->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->Surgeon->Visible) { // Surgeon ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation_preview->Surgeon) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->Surgeon->headerCellClass() ?>"><?php echo $ivf_oocytedenudation_preview->Surgeon->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->Surgeon->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_oocytedenudation_preview->Surgeon->Name) ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->Surgeon->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_preview->Surgeon->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->Surgeon->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->AsstSurgeon->Visible) { // AsstSurgeon ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation_preview->AsstSurgeon) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->AsstSurgeon->headerCellClass() ?>"><?php echo $ivf_oocytedenudation_preview->AsstSurgeon->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->AsstSurgeon->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_oocytedenudation_preview->AsstSurgeon->Name) ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->AsstSurgeon->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_preview->AsstSurgeon->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->AsstSurgeon->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->Anaesthetist->Visible) { // Anaesthetist ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation_preview->Anaesthetist) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->Anaesthetist->headerCellClass() ?>"><?php echo $ivf_oocytedenudation_preview->Anaesthetist->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->Anaesthetist->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_oocytedenudation_preview->Anaesthetist->Name) ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->Anaesthetist->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_preview->Anaesthetist->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->Anaesthetist->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->AnaestheiaType->Visible) { // AnaestheiaType ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation_preview->AnaestheiaType) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->AnaestheiaType->headerCellClass() ?>"><?php echo $ivf_oocytedenudation_preview->AnaestheiaType->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->AnaestheiaType->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_oocytedenudation_preview->AnaestheiaType->Name) ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->AnaestheiaType->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_preview->AnaestheiaType->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->AnaestheiaType->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->PrimaryEmbryologist->Visible) { // PrimaryEmbryologist ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation_preview->PrimaryEmbryologist) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->PrimaryEmbryologist->headerCellClass() ?>"><?php echo $ivf_oocytedenudation_preview->PrimaryEmbryologist->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->PrimaryEmbryologist->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_oocytedenudation_preview->PrimaryEmbryologist->Name) ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->PrimaryEmbryologist->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_preview->PrimaryEmbryologist->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->PrimaryEmbryologist->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->SecondaryEmbryologist->Visible) { // SecondaryEmbryologist ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation_preview->SecondaryEmbryologist) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->SecondaryEmbryologist->headerCellClass() ?>"><?php echo $ivf_oocytedenudation_preview->SecondaryEmbryologist->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->SecondaryEmbryologist->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_oocytedenudation_preview->SecondaryEmbryologist->Name) ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->SecondaryEmbryologist->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_preview->SecondaryEmbryologist->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->SecondaryEmbryologist->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->NoOfFolliclesRight->Visible) { // NoOfFolliclesRight ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation_preview->NoOfFolliclesRight) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->NoOfFolliclesRight->headerCellClass() ?>"><?php echo $ivf_oocytedenudation_preview->NoOfFolliclesRight->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->NoOfFolliclesRight->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_oocytedenudation_preview->NoOfFolliclesRight->Name) ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->NoOfFolliclesRight->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_preview->NoOfFolliclesRight->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->NoOfFolliclesRight->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->NoOfFolliclesLeft->Visible) { // NoOfFolliclesLeft ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation_preview->NoOfFolliclesLeft) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->NoOfFolliclesLeft->headerCellClass() ?>"><?php echo $ivf_oocytedenudation_preview->NoOfFolliclesLeft->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->NoOfFolliclesLeft->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_oocytedenudation_preview->NoOfFolliclesLeft->Name) ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->NoOfFolliclesLeft->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_preview->NoOfFolliclesLeft->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->NoOfFolliclesLeft->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->NoOfOocytes->Visible) { // NoOfOocytes ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation_preview->NoOfOocytes) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->NoOfOocytes->headerCellClass() ?>"><?php echo $ivf_oocytedenudation_preview->NoOfOocytes->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->NoOfOocytes->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_oocytedenudation_preview->NoOfOocytes->Name) ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->NoOfOocytes->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_preview->NoOfOocytes->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->NoOfOocytes->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->RecordOocyteDenudation->Visible) { // RecordOocyteDenudation ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation_preview->RecordOocyteDenudation) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->RecordOocyteDenudation->headerCellClass() ?>"><?php echo $ivf_oocytedenudation_preview->RecordOocyteDenudation->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->RecordOocyteDenudation->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_oocytedenudation_preview->RecordOocyteDenudation->Name) ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->RecordOocyteDenudation->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_preview->RecordOocyteDenudation->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->RecordOocyteDenudation->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->DateOfDenudation->Visible) { // DateOfDenudation ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation_preview->DateOfDenudation) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->DateOfDenudation->headerCellClass() ?>"><?php echo $ivf_oocytedenudation_preview->DateOfDenudation->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->DateOfDenudation->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_oocytedenudation_preview->DateOfDenudation->Name) ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->DateOfDenudation->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_preview->DateOfDenudation->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->DateOfDenudation->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->DenudationDoneBy->Visible) { // DenudationDoneBy ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation_preview->DenudationDoneBy) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->DenudationDoneBy->headerCellClass() ?>"><?php echo $ivf_oocytedenudation_preview->DenudationDoneBy->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->DenudationDoneBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_oocytedenudation_preview->DenudationDoneBy->Name) ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->DenudationDoneBy->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_preview->DenudationDoneBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->DenudationDoneBy->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->status->Visible) { // status ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation_preview->status) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->status->headerCellClass() ?>"><?php echo $ivf_oocytedenudation_preview->status->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->status->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_oocytedenudation_preview->status->Name) ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->status->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_preview->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->status->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->createdby->Visible) { // createdby ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation_preview->createdby) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->createdby->headerCellClass() ?>"><?php echo $ivf_oocytedenudation_preview->createdby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->createdby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_oocytedenudation_preview->createdby->Name) ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->createdby->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_preview->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->createdby->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->createddatetime->Visible) { // createddatetime ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation_preview->createddatetime) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->createddatetime->headerCellClass() ?>"><?php echo $ivf_oocytedenudation_preview->createddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->createddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_oocytedenudation_preview->createddatetime->Name) ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->createddatetime->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_preview->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->createddatetime->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->modifiedby->Visible) { // modifiedby ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation_preview->modifiedby) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->modifiedby->headerCellClass() ?>"><?php echo $ivf_oocytedenudation_preview->modifiedby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->modifiedby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_oocytedenudation_preview->modifiedby->Name) ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->modifiedby->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_preview->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->modifiedby->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation_preview->modifieddatetime) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->modifieddatetime->headerCellClass() ?>"><?php echo $ivf_oocytedenudation_preview->modifieddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_oocytedenudation_preview->modifieddatetime->Name) ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->modifieddatetime->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_preview->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->modifieddatetime->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->TidNo->Visible) { // TidNo ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation_preview->TidNo) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->TidNo->headerCellClass() ?>"><?php echo $ivf_oocytedenudation_preview->TidNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->TidNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_oocytedenudation_preview->TidNo->Name) ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->TidNo->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_preview->TidNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->TidNo->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->ExpFollicles->Visible) { // ExpFollicles ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation_preview->ExpFollicles) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->ExpFollicles->headerCellClass() ?>"><?php echo $ivf_oocytedenudation_preview->ExpFollicles->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->ExpFollicles->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_oocytedenudation_preview->ExpFollicles->Name) ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->ExpFollicles->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_preview->ExpFollicles->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->ExpFollicles->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->SecondaryDenudationDoneBy->Visible) { // SecondaryDenudationDoneBy ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation_preview->SecondaryDenudationDoneBy) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->SecondaryDenudationDoneBy->headerCellClass() ?>"><?php echo $ivf_oocytedenudation_preview->SecondaryDenudationDoneBy->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->SecondaryDenudationDoneBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_oocytedenudation_preview->SecondaryDenudationDoneBy->Name) ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->SecondaryDenudationDoneBy->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_preview->SecondaryDenudationDoneBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->SecondaryDenudationDoneBy->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->OocyteOrgin->Visible) { // OocyteOrgin ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation_preview->OocyteOrgin) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->OocyteOrgin->headerCellClass() ?>"><?php echo $ivf_oocytedenudation_preview->OocyteOrgin->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->OocyteOrgin->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_oocytedenudation_preview->OocyteOrgin->Name) ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->OocyteOrgin->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_preview->OocyteOrgin->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->OocyteOrgin->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->patient1->Visible) { // patient1 ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation_preview->patient1) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->patient1->headerCellClass() ?>"><?php echo $ivf_oocytedenudation_preview->patient1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->patient1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_oocytedenudation_preview->patient1->Name) ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->patient1->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_preview->patient1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->patient1->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->OocyteType->Visible) { // OocyteType ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation_preview->OocyteType) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->OocyteType->headerCellClass() ?>"><?php echo $ivf_oocytedenudation_preview->OocyteType->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->OocyteType->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_oocytedenudation_preview->OocyteType->Name) ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->OocyteType->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_preview->OocyteType->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->OocyteType->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->MIOocytesDonate1->Visible) { // MIOocytesDonate1 ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation_preview->MIOocytesDonate1) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->MIOocytesDonate1->headerCellClass() ?>"><?php echo $ivf_oocytedenudation_preview->MIOocytesDonate1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->MIOocytesDonate1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_oocytedenudation_preview->MIOocytesDonate1->Name) ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->MIOocytesDonate1->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_preview->MIOocytesDonate1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->MIOocytesDonate1->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->MIOocytesDonate2->Visible) { // MIOocytesDonate2 ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation_preview->MIOocytesDonate2) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->MIOocytesDonate2->headerCellClass() ?>"><?php echo $ivf_oocytedenudation_preview->MIOocytesDonate2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->MIOocytesDonate2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_oocytedenudation_preview->MIOocytesDonate2->Name) ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->MIOocytesDonate2->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_preview->MIOocytesDonate2->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->MIOocytesDonate2->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->SelfMI->Visible) { // SelfMI ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation_preview->SelfMI) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->SelfMI->headerCellClass() ?>"><?php echo $ivf_oocytedenudation_preview->SelfMI->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->SelfMI->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_oocytedenudation_preview->SelfMI->Name) ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->SelfMI->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_preview->SelfMI->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->SelfMI->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->SelfMII->Visible) { // SelfMII ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation_preview->SelfMII) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->SelfMII->headerCellClass() ?>"><?php echo $ivf_oocytedenudation_preview->SelfMII->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->SelfMII->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_oocytedenudation_preview->SelfMII->Name) ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->SelfMII->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_preview->SelfMII->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->SelfMII->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->patient3->Visible) { // patient3 ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation_preview->patient3) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->patient3->headerCellClass() ?>"><?php echo $ivf_oocytedenudation_preview->patient3->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->patient3->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_oocytedenudation_preview->patient3->Name) ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->patient3->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_preview->patient3->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->patient3->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->patient4->Visible) { // patient4 ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation_preview->patient4) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->patient4->headerCellClass() ?>"><?php echo $ivf_oocytedenudation_preview->patient4->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->patient4->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_oocytedenudation_preview->patient4->Name) ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->patient4->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_preview->patient4->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->patient4->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->OocytesDonate3->Visible) { // OocytesDonate3 ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation_preview->OocytesDonate3) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->OocytesDonate3->headerCellClass() ?>"><?php echo $ivf_oocytedenudation_preview->OocytesDonate3->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->OocytesDonate3->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_oocytedenudation_preview->OocytesDonate3->Name) ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->OocytesDonate3->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_preview->OocytesDonate3->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->OocytesDonate3->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->OocytesDonate4->Visible) { // OocytesDonate4 ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation_preview->OocytesDonate4) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->OocytesDonate4->headerCellClass() ?>"><?php echo $ivf_oocytedenudation_preview->OocytesDonate4->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->OocytesDonate4->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_oocytedenudation_preview->OocytesDonate4->Name) ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->OocytesDonate4->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_preview->OocytesDonate4->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->OocytesDonate4->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->MIOocytesDonate3->Visible) { // MIOocytesDonate3 ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation_preview->MIOocytesDonate3) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->MIOocytesDonate3->headerCellClass() ?>"><?php echo $ivf_oocytedenudation_preview->MIOocytesDonate3->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->MIOocytesDonate3->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_oocytedenudation_preview->MIOocytesDonate3->Name) ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->MIOocytesDonate3->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_preview->MIOocytesDonate3->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->MIOocytesDonate3->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->MIOocytesDonate4->Visible) { // MIOocytesDonate4 ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation_preview->MIOocytesDonate4) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->MIOocytesDonate4->headerCellClass() ?>"><?php echo $ivf_oocytedenudation_preview->MIOocytesDonate4->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->MIOocytesDonate4->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_oocytedenudation_preview->MIOocytesDonate4->Name) ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->MIOocytesDonate4->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_preview->MIOocytesDonate4->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->MIOocytesDonate4->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->SelfOocytesMI->Visible) { // SelfOocytesMI ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation_preview->SelfOocytesMI) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->SelfOocytesMI->headerCellClass() ?>"><?php echo $ivf_oocytedenudation_preview->SelfOocytesMI->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->SelfOocytesMI->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_oocytedenudation_preview->SelfOocytesMI->Name) ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->SelfOocytesMI->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_preview->SelfOocytesMI->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->SelfOocytesMI->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->SelfOocytesMII->Visible) { // SelfOocytesMII ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation_preview->SelfOocytesMII) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->SelfOocytesMII->headerCellClass() ?>"><?php echo $ivf_oocytedenudation_preview->SelfOocytesMII->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation_preview->SelfOocytesMII->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_oocytedenudation_preview->SelfOocytesMII->Name) ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->SelfOocytesMII->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_preview->SelfOocytesMII->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation_preview->SelfOocytesMII->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$ivf_oocytedenudation_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$ivf_oocytedenudation_preview->RecCount = 0;
$ivf_oocytedenudation_preview->RowCount = 0;
while ($ivf_oocytedenudation_preview->Recordset && !$ivf_oocytedenudation_preview->Recordset->EOF) {

	// Init row class and style
	$ivf_oocytedenudation_preview->RecCount++;
	$ivf_oocytedenudation_preview->RowCount++;
	$ivf_oocytedenudation_preview->CssStyle = "";
	$ivf_oocytedenudation_preview->loadListRowValues($ivf_oocytedenudation_preview->Recordset);

	// Render row
	$ivf_oocytedenudation->RowType = ROWTYPE_PREVIEW; // Preview record
	$ivf_oocytedenudation_preview->resetAttributes();
	$ivf_oocytedenudation_preview->renderListRow();

	// Render list options
	$ivf_oocytedenudation_preview->renderListOptions();
?>
	<tr <?php echo $ivf_oocytedenudation->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_oocytedenudation_preview->ListOptions->render("body", "left", $ivf_oocytedenudation_preview->RowCount);
?>
<?php if ($ivf_oocytedenudation_preview->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $ivf_oocytedenudation_preview->id->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation_preview->id->viewAttributes() ?>><?php echo $ivf_oocytedenudation_preview->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->RIDNo->Visible) { // RIDNo ?>
		<!-- RIDNo -->
		<td<?php echo $ivf_oocytedenudation_preview->RIDNo->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation_preview->RIDNo->viewAttributes() ?>><?php echo $ivf_oocytedenudation_preview->RIDNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->Name->Visible) { // Name ?>
		<!-- Name -->
		<td<?php echo $ivf_oocytedenudation_preview->Name->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation_preview->Name->viewAttributes() ?>><?php echo $ivf_oocytedenudation_preview->Name->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->ResultDate->Visible) { // ResultDate ?>
		<!-- ResultDate -->
		<td<?php echo $ivf_oocytedenudation_preview->ResultDate->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation_preview->ResultDate->viewAttributes() ?>><?php echo $ivf_oocytedenudation_preview->ResultDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->Surgeon->Visible) { // Surgeon ?>
		<!-- Surgeon -->
		<td<?php echo $ivf_oocytedenudation_preview->Surgeon->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation_preview->Surgeon->viewAttributes() ?>><?php echo $ivf_oocytedenudation_preview->Surgeon->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->AsstSurgeon->Visible) { // AsstSurgeon ?>
		<!-- AsstSurgeon -->
		<td<?php echo $ivf_oocytedenudation_preview->AsstSurgeon->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation_preview->AsstSurgeon->viewAttributes() ?>><?php echo $ivf_oocytedenudation_preview->AsstSurgeon->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->Anaesthetist->Visible) { // Anaesthetist ?>
		<!-- Anaesthetist -->
		<td<?php echo $ivf_oocytedenudation_preview->Anaesthetist->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation_preview->Anaesthetist->viewAttributes() ?>><?php echo $ivf_oocytedenudation_preview->Anaesthetist->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->AnaestheiaType->Visible) { // AnaestheiaType ?>
		<!-- AnaestheiaType -->
		<td<?php echo $ivf_oocytedenudation_preview->AnaestheiaType->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation_preview->AnaestheiaType->viewAttributes() ?>><?php echo $ivf_oocytedenudation_preview->AnaestheiaType->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->PrimaryEmbryologist->Visible) { // PrimaryEmbryologist ?>
		<!-- PrimaryEmbryologist -->
		<td<?php echo $ivf_oocytedenudation_preview->PrimaryEmbryologist->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation_preview->PrimaryEmbryologist->viewAttributes() ?>><?php echo $ivf_oocytedenudation_preview->PrimaryEmbryologist->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->SecondaryEmbryologist->Visible) { // SecondaryEmbryologist ?>
		<!-- SecondaryEmbryologist -->
		<td<?php echo $ivf_oocytedenudation_preview->SecondaryEmbryologist->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation_preview->SecondaryEmbryologist->viewAttributes() ?>><?php echo $ivf_oocytedenudation_preview->SecondaryEmbryologist->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->NoOfFolliclesRight->Visible) { // NoOfFolliclesRight ?>
		<!-- NoOfFolliclesRight -->
		<td<?php echo $ivf_oocytedenudation_preview->NoOfFolliclesRight->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation_preview->NoOfFolliclesRight->viewAttributes() ?>><?php echo $ivf_oocytedenudation_preview->NoOfFolliclesRight->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->NoOfFolliclesLeft->Visible) { // NoOfFolliclesLeft ?>
		<!-- NoOfFolliclesLeft -->
		<td<?php echo $ivf_oocytedenudation_preview->NoOfFolliclesLeft->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation_preview->NoOfFolliclesLeft->viewAttributes() ?>><?php echo $ivf_oocytedenudation_preview->NoOfFolliclesLeft->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->NoOfOocytes->Visible) { // NoOfOocytes ?>
		<!-- NoOfOocytes -->
		<td<?php echo $ivf_oocytedenudation_preview->NoOfOocytes->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation_preview->NoOfOocytes->viewAttributes() ?>><?php echo $ivf_oocytedenudation_preview->NoOfOocytes->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->RecordOocyteDenudation->Visible) { // RecordOocyteDenudation ?>
		<!-- RecordOocyteDenudation -->
		<td<?php echo $ivf_oocytedenudation_preview->RecordOocyteDenudation->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation_preview->RecordOocyteDenudation->viewAttributes() ?>><?php echo $ivf_oocytedenudation_preview->RecordOocyteDenudation->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->DateOfDenudation->Visible) { // DateOfDenudation ?>
		<!-- DateOfDenudation -->
		<td<?php echo $ivf_oocytedenudation_preview->DateOfDenudation->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation_preview->DateOfDenudation->viewAttributes() ?>><?php echo $ivf_oocytedenudation_preview->DateOfDenudation->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->DenudationDoneBy->Visible) { // DenudationDoneBy ?>
		<!-- DenudationDoneBy -->
		<td<?php echo $ivf_oocytedenudation_preview->DenudationDoneBy->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation_preview->DenudationDoneBy->viewAttributes() ?>><?php echo $ivf_oocytedenudation_preview->DenudationDoneBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->status->Visible) { // status ?>
		<!-- status -->
		<td<?php echo $ivf_oocytedenudation_preview->status->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation_preview->status->viewAttributes() ?>><?php echo $ivf_oocytedenudation_preview->status->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->createdby->Visible) { // createdby ?>
		<!-- createdby -->
		<td<?php echo $ivf_oocytedenudation_preview->createdby->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation_preview->createdby->viewAttributes() ?>><?php echo $ivf_oocytedenudation_preview->createdby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->createddatetime->Visible) { // createddatetime ?>
		<!-- createddatetime -->
		<td<?php echo $ivf_oocytedenudation_preview->createddatetime->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation_preview->createddatetime->viewAttributes() ?>><?php echo $ivf_oocytedenudation_preview->createddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->modifiedby->Visible) { // modifiedby ?>
		<!-- modifiedby -->
		<td<?php echo $ivf_oocytedenudation_preview->modifiedby->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation_preview->modifiedby->viewAttributes() ?>><?php echo $ivf_oocytedenudation_preview->modifiedby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->modifieddatetime->Visible) { // modifieddatetime ?>
		<!-- modifieddatetime -->
		<td<?php echo $ivf_oocytedenudation_preview->modifieddatetime->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation_preview->modifieddatetime->viewAttributes() ?>><?php echo $ivf_oocytedenudation_preview->modifieddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->TidNo->Visible) { // TidNo ?>
		<!-- TidNo -->
		<td<?php echo $ivf_oocytedenudation_preview->TidNo->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation_preview->TidNo->viewAttributes() ?>><?php echo $ivf_oocytedenudation_preview->TidNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->ExpFollicles->Visible) { // ExpFollicles ?>
		<!-- ExpFollicles -->
		<td<?php echo $ivf_oocytedenudation_preview->ExpFollicles->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation_preview->ExpFollicles->viewAttributes() ?>><?php echo $ivf_oocytedenudation_preview->ExpFollicles->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->SecondaryDenudationDoneBy->Visible) { // SecondaryDenudationDoneBy ?>
		<!-- SecondaryDenudationDoneBy -->
		<td<?php echo $ivf_oocytedenudation_preview->SecondaryDenudationDoneBy->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation_preview->SecondaryDenudationDoneBy->viewAttributes() ?>><?php echo $ivf_oocytedenudation_preview->SecondaryDenudationDoneBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->OocyteOrgin->Visible) { // OocyteOrgin ?>
		<!-- OocyteOrgin -->
		<td<?php echo $ivf_oocytedenudation_preview->OocyteOrgin->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation_preview->OocyteOrgin->viewAttributes() ?>><?php echo $ivf_oocytedenudation_preview->OocyteOrgin->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->patient1->Visible) { // patient1 ?>
		<!-- patient1 -->
		<td<?php echo $ivf_oocytedenudation_preview->patient1->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation_preview->patient1->viewAttributes() ?>><?php echo $ivf_oocytedenudation_preview->patient1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->OocyteType->Visible) { // OocyteType ?>
		<!-- OocyteType -->
		<td<?php echo $ivf_oocytedenudation_preview->OocyteType->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation_preview->OocyteType->viewAttributes() ?>><?php echo $ivf_oocytedenudation_preview->OocyteType->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->MIOocytesDonate1->Visible) { // MIOocytesDonate1 ?>
		<!-- MIOocytesDonate1 -->
		<td<?php echo $ivf_oocytedenudation_preview->MIOocytesDonate1->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation_preview->MIOocytesDonate1->viewAttributes() ?>><?php echo $ivf_oocytedenudation_preview->MIOocytesDonate1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->MIOocytesDonate2->Visible) { // MIOocytesDonate2 ?>
		<!-- MIOocytesDonate2 -->
		<td<?php echo $ivf_oocytedenudation_preview->MIOocytesDonate2->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation_preview->MIOocytesDonate2->viewAttributes() ?>><?php echo $ivf_oocytedenudation_preview->MIOocytesDonate2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->SelfMI->Visible) { // SelfMI ?>
		<!-- SelfMI -->
		<td<?php echo $ivf_oocytedenudation_preview->SelfMI->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation_preview->SelfMI->viewAttributes() ?>><?php echo $ivf_oocytedenudation_preview->SelfMI->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->SelfMII->Visible) { // SelfMII ?>
		<!-- SelfMII -->
		<td<?php echo $ivf_oocytedenudation_preview->SelfMII->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation_preview->SelfMII->viewAttributes() ?>><?php echo $ivf_oocytedenudation_preview->SelfMII->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->patient3->Visible) { // patient3 ?>
		<!-- patient3 -->
		<td<?php echo $ivf_oocytedenudation_preview->patient3->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation_preview->patient3->viewAttributes() ?>><?php echo $ivf_oocytedenudation_preview->patient3->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->patient4->Visible) { // patient4 ?>
		<!-- patient4 -->
		<td<?php echo $ivf_oocytedenudation_preview->patient4->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation_preview->patient4->viewAttributes() ?>><?php echo $ivf_oocytedenudation_preview->patient4->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->OocytesDonate3->Visible) { // OocytesDonate3 ?>
		<!-- OocytesDonate3 -->
		<td<?php echo $ivf_oocytedenudation_preview->OocytesDonate3->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation_preview->OocytesDonate3->viewAttributes() ?>><?php echo $ivf_oocytedenudation_preview->OocytesDonate3->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->OocytesDonate4->Visible) { // OocytesDonate4 ?>
		<!-- OocytesDonate4 -->
		<td<?php echo $ivf_oocytedenudation_preview->OocytesDonate4->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation_preview->OocytesDonate4->viewAttributes() ?>><?php echo $ivf_oocytedenudation_preview->OocytesDonate4->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->MIOocytesDonate3->Visible) { // MIOocytesDonate3 ?>
		<!-- MIOocytesDonate3 -->
		<td<?php echo $ivf_oocytedenudation_preview->MIOocytesDonate3->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation_preview->MIOocytesDonate3->viewAttributes() ?>><?php echo $ivf_oocytedenudation_preview->MIOocytesDonate3->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->MIOocytesDonate4->Visible) { // MIOocytesDonate4 ?>
		<!-- MIOocytesDonate4 -->
		<td<?php echo $ivf_oocytedenudation_preview->MIOocytesDonate4->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation_preview->MIOocytesDonate4->viewAttributes() ?>><?php echo $ivf_oocytedenudation_preview->MIOocytesDonate4->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->SelfOocytesMI->Visible) { // SelfOocytesMI ?>
		<!-- SelfOocytesMI -->
		<td<?php echo $ivf_oocytedenudation_preview->SelfOocytesMI->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation_preview->SelfOocytesMI->viewAttributes() ?>><?php echo $ivf_oocytedenudation_preview->SelfOocytesMI->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation_preview->SelfOocytesMII->Visible) { // SelfOocytesMII ?>
		<!-- SelfOocytesMII -->
		<td<?php echo $ivf_oocytedenudation_preview->SelfOocytesMII->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation_preview->SelfOocytesMII->viewAttributes() ?>><?php echo $ivf_oocytedenudation_preview->SelfOocytesMII->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$ivf_oocytedenudation_preview->ListOptions->render("body", "right", $ivf_oocytedenudation_preview->RowCount);
?>
	</tr>
<?php
	$ivf_oocytedenudation_preview->Recordset->MoveNext();
} // while
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php echo $ivf_oocytedenudation_preview->Pager->render() ?>
<?php } else { // No record ?>
<div class="card no-border">
<div class="ew-detail-count"><?php echo $Language->phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($ivf_oocytedenudation_preview->OtherOptions as $option)
		$option->render("body");
?>
</div>
<?php if ($ivf_oocytedenudation_preview->TotalRecords > 0) { ?>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
<?php } ?>
</div><!-- /.card -->
<?php
$ivf_oocytedenudation_preview->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php
if ($ivf_oocytedenudation_preview->Recordset)
	$ivf_oocytedenudation_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$ivf_oocytedenudation_preview->terminate();
?>
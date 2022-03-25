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
<div class="card ew-grid ivf_oocytedenudation"><!-- .card -->
<?php if ($ivf_oocytedenudation_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$ivf_oocytedenudation_preview->renderListOptions();

// Render list options (header, left)
$ivf_oocytedenudation_preview->ListOptions->render("header", "left");
?>
<?php if ($ivf_oocytedenudation->id->Visible) { // id ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->id) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation->id->headerCellClass() ?>"><?php echo $ivf_oocytedenudation->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_oocytedenudation->id->Name ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->id->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->id->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->RIDNo->Visible) { // RIDNo ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->RIDNo) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation->RIDNo->headerCellClass() ?>"><?php echo $ivf_oocytedenudation->RIDNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation->RIDNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_oocytedenudation->RIDNo->Name ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->RIDNo->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->RIDNo->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->RIDNo->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->Name->Visible) { // Name ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->Name) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation->Name->headerCellClass() ?>"><?php echo $ivf_oocytedenudation->Name->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation->Name->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_oocytedenudation->Name->Name ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->Name->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->Name->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->Name->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->ResultDate->Visible) { // ResultDate ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->ResultDate) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation->ResultDate->headerCellClass() ?>"><?php echo $ivf_oocytedenudation->ResultDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation->ResultDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_oocytedenudation->ResultDate->Name ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->ResultDate->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->ResultDate->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->ResultDate->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->Surgeon->Visible) { // Surgeon ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->Surgeon) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation->Surgeon->headerCellClass() ?>"><?php echo $ivf_oocytedenudation->Surgeon->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation->Surgeon->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_oocytedenudation->Surgeon->Name ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->Surgeon->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->Surgeon->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->Surgeon->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->AsstSurgeon->Visible) { // AsstSurgeon ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->AsstSurgeon) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation->AsstSurgeon->headerCellClass() ?>"><?php echo $ivf_oocytedenudation->AsstSurgeon->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation->AsstSurgeon->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_oocytedenudation->AsstSurgeon->Name ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->AsstSurgeon->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->AsstSurgeon->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->AsstSurgeon->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->Anaesthetist->Visible) { // Anaesthetist ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->Anaesthetist) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation->Anaesthetist->headerCellClass() ?>"><?php echo $ivf_oocytedenudation->Anaesthetist->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation->Anaesthetist->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_oocytedenudation->Anaesthetist->Name ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->Anaesthetist->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->Anaesthetist->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->Anaesthetist->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->AnaestheiaType->Visible) { // AnaestheiaType ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->AnaestheiaType) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation->AnaestheiaType->headerCellClass() ?>"><?php echo $ivf_oocytedenudation->AnaestheiaType->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation->AnaestheiaType->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_oocytedenudation->AnaestheiaType->Name ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->AnaestheiaType->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->AnaestheiaType->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->AnaestheiaType->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->PrimaryEmbryologist->Visible) { // PrimaryEmbryologist ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->PrimaryEmbryologist) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation->PrimaryEmbryologist->headerCellClass() ?>"><?php echo $ivf_oocytedenudation->PrimaryEmbryologist->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation->PrimaryEmbryologist->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_oocytedenudation->PrimaryEmbryologist->Name ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->PrimaryEmbryologist->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->PrimaryEmbryologist->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->PrimaryEmbryologist->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->SecondaryEmbryologist->Visible) { // SecondaryEmbryologist ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->SecondaryEmbryologist) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation->SecondaryEmbryologist->headerCellClass() ?>"><?php echo $ivf_oocytedenudation->SecondaryEmbryologist->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation->SecondaryEmbryologist->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_oocytedenudation->SecondaryEmbryologist->Name ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->SecondaryEmbryologist->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->SecondaryEmbryologist->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->SecondaryEmbryologist->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->NoOfFolliclesRight->Visible) { // NoOfFolliclesRight ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->NoOfFolliclesRight) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation->NoOfFolliclesRight->headerCellClass() ?>"><?php echo $ivf_oocytedenudation->NoOfFolliclesRight->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation->NoOfFolliclesRight->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_oocytedenudation->NoOfFolliclesRight->Name ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->NoOfFolliclesRight->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->NoOfFolliclesRight->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->NoOfFolliclesRight->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->NoOfFolliclesLeft->Visible) { // NoOfFolliclesLeft ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->NoOfFolliclesLeft) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation->NoOfFolliclesLeft->headerCellClass() ?>"><?php echo $ivf_oocytedenudation->NoOfFolliclesLeft->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation->NoOfFolliclesLeft->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_oocytedenudation->NoOfFolliclesLeft->Name ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->NoOfFolliclesLeft->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->NoOfFolliclesLeft->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->NoOfFolliclesLeft->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->NoOfOocytes->Visible) { // NoOfOocytes ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->NoOfOocytes) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation->NoOfOocytes->headerCellClass() ?>"><?php echo $ivf_oocytedenudation->NoOfOocytes->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation->NoOfOocytes->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_oocytedenudation->NoOfOocytes->Name ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->NoOfOocytes->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->NoOfOocytes->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->NoOfOocytes->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->RecordOocyteDenudation->Visible) { // RecordOocyteDenudation ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->RecordOocyteDenudation) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation->RecordOocyteDenudation->headerCellClass() ?>"><?php echo $ivf_oocytedenudation->RecordOocyteDenudation->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation->RecordOocyteDenudation->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_oocytedenudation->RecordOocyteDenudation->Name ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->RecordOocyteDenudation->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->RecordOocyteDenudation->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->RecordOocyteDenudation->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->DateOfDenudation->Visible) { // DateOfDenudation ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->DateOfDenudation) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation->DateOfDenudation->headerCellClass() ?>"><?php echo $ivf_oocytedenudation->DateOfDenudation->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation->DateOfDenudation->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_oocytedenudation->DateOfDenudation->Name ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->DateOfDenudation->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->DateOfDenudation->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->DateOfDenudation->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->DenudationDoneBy->Visible) { // DenudationDoneBy ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->DenudationDoneBy) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation->DenudationDoneBy->headerCellClass() ?>"><?php echo $ivf_oocytedenudation->DenudationDoneBy->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation->DenudationDoneBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_oocytedenudation->DenudationDoneBy->Name ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->DenudationDoneBy->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->DenudationDoneBy->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->DenudationDoneBy->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->status->Visible) { // status ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->status) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation->status->headerCellClass() ?>"><?php echo $ivf_oocytedenudation->status->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation->status->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_oocytedenudation->status->Name ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->status->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->status->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->status->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->createdby->Visible) { // createdby ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->createdby) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation->createdby->headerCellClass() ?>"><?php echo $ivf_oocytedenudation->createdby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation->createdby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_oocytedenudation->createdby->Name ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->createdby->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->createdby->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->createdby->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->createddatetime->Visible) { // createddatetime ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->createddatetime) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation->createddatetime->headerCellClass() ?>"><?php echo $ivf_oocytedenudation->createddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation->createddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_oocytedenudation->createddatetime->Name ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->createddatetime->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->createddatetime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->createddatetime->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->modifiedby->Visible) { // modifiedby ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->modifiedby) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation->modifiedby->headerCellClass() ?>"><?php echo $ivf_oocytedenudation->modifiedby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation->modifiedby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_oocytedenudation->modifiedby->Name ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->modifiedby->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->modifiedby->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->modifiedby->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->modifieddatetime) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation->modifieddatetime->headerCellClass() ?>"><?php echo $ivf_oocytedenudation->modifieddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_oocytedenudation->modifieddatetime->Name ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->modifieddatetime->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->modifieddatetime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->modifieddatetime->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->TidNo->Visible) { // TidNo ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->TidNo) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation->TidNo->headerCellClass() ?>"><?php echo $ivf_oocytedenudation->TidNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation->TidNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_oocytedenudation->TidNo->Name ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->TidNo->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->TidNo->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->TidNo->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->ExpFollicles->Visible) { // ExpFollicles ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->ExpFollicles) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation->ExpFollicles->headerCellClass() ?>"><?php echo $ivf_oocytedenudation->ExpFollicles->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation->ExpFollicles->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_oocytedenudation->ExpFollicles->Name ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->ExpFollicles->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->ExpFollicles->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->ExpFollicles->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->SecondaryDenudationDoneBy->Visible) { // SecondaryDenudationDoneBy ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->SecondaryDenudationDoneBy) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation->SecondaryDenudationDoneBy->headerCellClass() ?>"><?php echo $ivf_oocytedenudation->SecondaryDenudationDoneBy->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation->SecondaryDenudationDoneBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_oocytedenudation->SecondaryDenudationDoneBy->Name ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->SecondaryDenudationDoneBy->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->SecondaryDenudationDoneBy->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->SecondaryDenudationDoneBy->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->OocyteOrgin->Visible) { // OocyteOrgin ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->OocyteOrgin) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation->OocyteOrgin->headerCellClass() ?>"><?php echo $ivf_oocytedenudation->OocyteOrgin->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation->OocyteOrgin->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_oocytedenudation->OocyteOrgin->Name ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->OocyteOrgin->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->OocyteOrgin->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->OocyteOrgin->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->patient1->Visible) { // patient1 ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->patient1) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation->patient1->headerCellClass() ?>"><?php echo $ivf_oocytedenudation->patient1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation->patient1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_oocytedenudation->patient1->Name ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->patient1->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->patient1->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->patient1->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->OocyteType->Visible) { // OocyteType ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->OocyteType) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation->OocyteType->headerCellClass() ?>"><?php echo $ivf_oocytedenudation->OocyteType->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation->OocyteType->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_oocytedenudation->OocyteType->Name ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->OocyteType->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->OocyteType->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->OocyteType->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->MIOocytesDonate1->Visible) { // MIOocytesDonate1 ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->MIOocytesDonate1) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation->MIOocytesDonate1->headerCellClass() ?>"><?php echo $ivf_oocytedenudation->MIOocytesDonate1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation->MIOocytesDonate1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_oocytedenudation->MIOocytesDonate1->Name ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->MIOocytesDonate1->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->MIOocytesDonate1->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->MIOocytesDonate1->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->MIOocytesDonate2->Visible) { // MIOocytesDonate2 ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->MIOocytesDonate2) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation->MIOocytesDonate2->headerCellClass() ?>"><?php echo $ivf_oocytedenudation->MIOocytesDonate2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation->MIOocytesDonate2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_oocytedenudation->MIOocytesDonate2->Name ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->MIOocytesDonate2->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->MIOocytesDonate2->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->MIOocytesDonate2->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->SelfMI->Visible) { // SelfMI ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->SelfMI) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation->SelfMI->headerCellClass() ?>"><?php echo $ivf_oocytedenudation->SelfMI->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation->SelfMI->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_oocytedenudation->SelfMI->Name ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->SelfMI->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->SelfMI->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->SelfMI->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->SelfMII->Visible) { // SelfMII ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->SelfMII) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation->SelfMII->headerCellClass() ?>"><?php echo $ivf_oocytedenudation->SelfMII->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation->SelfMII->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_oocytedenudation->SelfMII->Name ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->SelfMII->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->SelfMII->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->SelfMII->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->patient3->Visible) { // patient3 ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->patient3) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation->patient3->headerCellClass() ?>"><?php echo $ivf_oocytedenudation->patient3->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation->patient3->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_oocytedenudation->patient3->Name ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->patient3->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->patient3->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->patient3->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->patient4->Visible) { // patient4 ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->patient4) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation->patient4->headerCellClass() ?>"><?php echo $ivf_oocytedenudation->patient4->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation->patient4->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_oocytedenudation->patient4->Name ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->patient4->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->patient4->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->patient4->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->OocytesDonate3->Visible) { // OocytesDonate3 ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->OocytesDonate3) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation->OocytesDonate3->headerCellClass() ?>"><?php echo $ivf_oocytedenudation->OocytesDonate3->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation->OocytesDonate3->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_oocytedenudation->OocytesDonate3->Name ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->OocytesDonate3->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->OocytesDonate3->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->OocytesDonate3->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->OocytesDonate4->Visible) { // OocytesDonate4 ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->OocytesDonate4) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation->OocytesDonate4->headerCellClass() ?>"><?php echo $ivf_oocytedenudation->OocytesDonate4->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation->OocytesDonate4->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_oocytedenudation->OocytesDonate4->Name ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->OocytesDonate4->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->OocytesDonate4->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->OocytesDonate4->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->MIOocytesDonate3->Visible) { // MIOocytesDonate3 ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->MIOocytesDonate3) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation->MIOocytesDonate3->headerCellClass() ?>"><?php echo $ivf_oocytedenudation->MIOocytesDonate3->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation->MIOocytesDonate3->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_oocytedenudation->MIOocytesDonate3->Name ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->MIOocytesDonate3->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->MIOocytesDonate3->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->MIOocytesDonate3->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->MIOocytesDonate4->Visible) { // MIOocytesDonate4 ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->MIOocytesDonate4) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation->MIOocytesDonate4->headerCellClass() ?>"><?php echo $ivf_oocytedenudation->MIOocytesDonate4->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation->MIOocytesDonate4->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_oocytedenudation->MIOocytesDonate4->Name ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->MIOocytesDonate4->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->MIOocytesDonate4->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->MIOocytesDonate4->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->SelfOocytesMI->Visible) { // SelfOocytesMI ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->SelfOocytesMI) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation->SelfOocytesMI->headerCellClass() ?>"><?php echo $ivf_oocytedenudation->SelfOocytesMI->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation->SelfOocytesMI->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_oocytedenudation->SelfOocytesMI->Name ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->SelfOocytesMI->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->SelfOocytesMI->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->SelfOocytesMI->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->SelfOocytesMII->Visible) { // SelfOocytesMII ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->SelfOocytesMII) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation->SelfOocytesMII->headerCellClass() ?>"><?php echo $ivf_oocytedenudation->SelfOocytesMII->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation->SelfOocytesMII->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_oocytedenudation->SelfOocytesMII->Name ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->SelfOocytesMII->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->SelfOocytesMII->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->SelfOocytesMII->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->donor->Visible) { // donor ?>
	<?php if ($ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->donor) == "") { ?>
		<th class="<?php echo $ivf_oocytedenudation->donor->headerCellClass() ?>"><?php echo $ivf_oocytedenudation->donor->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_oocytedenudation->donor->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_oocytedenudation->donor->Name ?>" data-sort-order="<?php echo $ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->donor->Name && $ivf_oocytedenudation_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->donor->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_preview->SortField == $ivf_oocytedenudation->donor->Name) { ?><?php if ($ivf_oocytedenudation_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_oocytedenudation_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
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
$ivf_oocytedenudation_preview->RowCnt = 0;
while ($ivf_oocytedenudation_preview->Recordset && !$ivf_oocytedenudation_preview->Recordset->EOF) {

	// Init row class and style
	$ivf_oocytedenudation_preview->RecCount++;
	$ivf_oocytedenudation_preview->RowCnt++;
	$ivf_oocytedenudation_preview->CssStyle = "";
	$ivf_oocytedenudation_preview->loadListRowValues($ivf_oocytedenudation_preview->Recordset);

	// Render row
	$ivf_oocytedenudation_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$ivf_oocytedenudation_preview->resetAttributes();
	$ivf_oocytedenudation_preview->renderListRow();

	// Render list options
	$ivf_oocytedenudation_preview->renderListOptions();
?>
	<tr<?php echo $ivf_oocytedenudation_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_oocytedenudation_preview->ListOptions->render("body", "left", $ivf_oocytedenudation_preview->RowCnt);
?>
<?php if ($ivf_oocytedenudation->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $ivf_oocytedenudation->id->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation->id->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->RIDNo->Visible) { // RIDNo ?>
		<!-- RIDNo -->
		<td<?php echo $ivf_oocytedenudation->RIDNo->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation->RIDNo->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->RIDNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->Name->Visible) { // Name ?>
		<!-- Name -->
		<td<?php echo $ivf_oocytedenudation->Name->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation->Name->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->Name->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->ResultDate->Visible) { // ResultDate ?>
		<!-- ResultDate -->
		<td<?php echo $ivf_oocytedenudation->ResultDate->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation->ResultDate->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->ResultDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->Surgeon->Visible) { // Surgeon ?>
		<!-- Surgeon -->
		<td<?php echo $ivf_oocytedenudation->Surgeon->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation->Surgeon->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->Surgeon->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->AsstSurgeon->Visible) { // AsstSurgeon ?>
		<!-- AsstSurgeon -->
		<td<?php echo $ivf_oocytedenudation->AsstSurgeon->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation->AsstSurgeon->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->AsstSurgeon->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->Anaesthetist->Visible) { // Anaesthetist ?>
		<!-- Anaesthetist -->
		<td<?php echo $ivf_oocytedenudation->Anaesthetist->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation->Anaesthetist->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->Anaesthetist->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->AnaestheiaType->Visible) { // AnaestheiaType ?>
		<!-- AnaestheiaType -->
		<td<?php echo $ivf_oocytedenudation->AnaestheiaType->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation->AnaestheiaType->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->AnaestheiaType->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->PrimaryEmbryologist->Visible) { // PrimaryEmbryologist ?>
		<!-- PrimaryEmbryologist -->
		<td<?php echo $ivf_oocytedenudation->PrimaryEmbryologist->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation->PrimaryEmbryologist->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->PrimaryEmbryologist->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->SecondaryEmbryologist->Visible) { // SecondaryEmbryologist ?>
		<!-- SecondaryEmbryologist -->
		<td<?php echo $ivf_oocytedenudation->SecondaryEmbryologist->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation->SecondaryEmbryologist->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->SecondaryEmbryologist->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->NoOfFolliclesRight->Visible) { // NoOfFolliclesRight ?>
		<!-- NoOfFolliclesRight -->
		<td<?php echo $ivf_oocytedenudation->NoOfFolliclesRight->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation->NoOfFolliclesRight->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->NoOfFolliclesRight->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->NoOfFolliclesLeft->Visible) { // NoOfFolliclesLeft ?>
		<!-- NoOfFolliclesLeft -->
		<td<?php echo $ivf_oocytedenudation->NoOfFolliclesLeft->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation->NoOfFolliclesLeft->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->NoOfFolliclesLeft->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->NoOfOocytes->Visible) { // NoOfOocytes ?>
		<!-- NoOfOocytes -->
		<td<?php echo $ivf_oocytedenudation->NoOfOocytes->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation->NoOfOocytes->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->NoOfOocytes->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->RecordOocyteDenudation->Visible) { // RecordOocyteDenudation ?>
		<!-- RecordOocyteDenudation -->
		<td<?php echo $ivf_oocytedenudation->RecordOocyteDenudation->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation->RecordOocyteDenudation->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->RecordOocyteDenudation->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->DateOfDenudation->Visible) { // DateOfDenudation ?>
		<!-- DateOfDenudation -->
		<td<?php echo $ivf_oocytedenudation->DateOfDenudation->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation->DateOfDenudation->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->DateOfDenudation->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->DenudationDoneBy->Visible) { // DenudationDoneBy ?>
		<!-- DenudationDoneBy -->
		<td<?php echo $ivf_oocytedenudation->DenudationDoneBy->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation->DenudationDoneBy->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->DenudationDoneBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->status->Visible) { // status ?>
		<!-- status -->
		<td<?php echo $ivf_oocytedenudation->status->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation->status->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->status->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->createdby->Visible) { // createdby ?>
		<!-- createdby -->
		<td<?php echo $ivf_oocytedenudation->createdby->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation->createdby->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->createdby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->createddatetime->Visible) { // createddatetime ?>
		<!-- createddatetime -->
		<td<?php echo $ivf_oocytedenudation->createddatetime->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation->createddatetime->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->createddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->modifiedby->Visible) { // modifiedby ?>
		<!-- modifiedby -->
		<td<?php echo $ivf_oocytedenudation->modifiedby->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation->modifiedby->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->modifiedby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->modifieddatetime->Visible) { // modifieddatetime ?>
		<!-- modifieddatetime -->
		<td<?php echo $ivf_oocytedenudation->modifieddatetime->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation->modifieddatetime->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->modifieddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->TidNo->Visible) { // TidNo ?>
		<!-- TidNo -->
		<td<?php echo $ivf_oocytedenudation->TidNo->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation->TidNo->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->TidNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->ExpFollicles->Visible) { // ExpFollicles ?>
		<!-- ExpFollicles -->
		<td<?php echo $ivf_oocytedenudation->ExpFollicles->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation->ExpFollicles->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->ExpFollicles->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->SecondaryDenudationDoneBy->Visible) { // SecondaryDenudationDoneBy ?>
		<!-- SecondaryDenudationDoneBy -->
		<td<?php echo $ivf_oocytedenudation->SecondaryDenudationDoneBy->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation->SecondaryDenudationDoneBy->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->SecondaryDenudationDoneBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->OocyteOrgin->Visible) { // OocyteOrgin ?>
		<!-- OocyteOrgin -->
		<td<?php echo $ivf_oocytedenudation->OocyteOrgin->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation->OocyteOrgin->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->OocyteOrgin->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->patient1->Visible) { // patient1 ?>
		<!-- patient1 -->
		<td<?php echo $ivf_oocytedenudation->patient1->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation->patient1->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->patient1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->OocyteType->Visible) { // OocyteType ?>
		<!-- OocyteType -->
		<td<?php echo $ivf_oocytedenudation->OocyteType->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation->OocyteType->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->OocyteType->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->MIOocytesDonate1->Visible) { // MIOocytesDonate1 ?>
		<!-- MIOocytesDonate1 -->
		<td<?php echo $ivf_oocytedenudation->MIOocytesDonate1->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation->MIOocytesDonate1->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->MIOocytesDonate1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->MIOocytesDonate2->Visible) { // MIOocytesDonate2 ?>
		<!-- MIOocytesDonate2 -->
		<td<?php echo $ivf_oocytedenudation->MIOocytesDonate2->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation->MIOocytesDonate2->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->MIOocytesDonate2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->SelfMI->Visible) { // SelfMI ?>
		<!-- SelfMI -->
		<td<?php echo $ivf_oocytedenudation->SelfMI->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation->SelfMI->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->SelfMI->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->SelfMII->Visible) { // SelfMII ?>
		<!-- SelfMII -->
		<td<?php echo $ivf_oocytedenudation->SelfMII->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation->SelfMII->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->SelfMII->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->patient3->Visible) { // patient3 ?>
		<!-- patient3 -->
		<td<?php echo $ivf_oocytedenudation->patient3->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation->patient3->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->patient3->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->patient4->Visible) { // patient4 ?>
		<!-- patient4 -->
		<td<?php echo $ivf_oocytedenudation->patient4->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation->patient4->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->patient4->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->OocytesDonate3->Visible) { // OocytesDonate3 ?>
		<!-- OocytesDonate3 -->
		<td<?php echo $ivf_oocytedenudation->OocytesDonate3->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation->OocytesDonate3->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->OocytesDonate3->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->OocytesDonate4->Visible) { // OocytesDonate4 ?>
		<!-- OocytesDonate4 -->
		<td<?php echo $ivf_oocytedenudation->OocytesDonate4->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation->OocytesDonate4->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->OocytesDonate4->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->MIOocytesDonate3->Visible) { // MIOocytesDonate3 ?>
		<!-- MIOocytesDonate3 -->
		<td<?php echo $ivf_oocytedenudation->MIOocytesDonate3->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation->MIOocytesDonate3->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->MIOocytesDonate3->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->MIOocytesDonate4->Visible) { // MIOocytesDonate4 ?>
		<!-- MIOocytesDonate4 -->
		<td<?php echo $ivf_oocytedenudation->MIOocytesDonate4->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation->MIOocytesDonate4->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->MIOocytesDonate4->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->SelfOocytesMI->Visible) { // SelfOocytesMI ?>
		<!-- SelfOocytesMI -->
		<td<?php echo $ivf_oocytedenudation->SelfOocytesMI->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation->SelfOocytesMI->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->SelfOocytesMI->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->SelfOocytesMII->Visible) { // SelfOocytesMII ?>
		<!-- SelfOocytesMII -->
		<td<?php echo $ivf_oocytedenudation->SelfOocytesMII->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation->SelfOocytesMII->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->SelfOocytesMII->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->donor->Visible) { // donor ?>
		<!-- donor -->
		<td<?php echo $ivf_oocytedenudation->donor->cellAttributes() ?>>
<span<?php echo $ivf_oocytedenudation->donor->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->donor->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$ivf_oocytedenudation_preview->ListOptions->render("body", "right", $ivf_oocytedenudation_preview->RowCnt);
?>
	</tr>
<?php
	$ivf_oocytedenudation_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($ivf_oocytedenudation_preview->TotalRecs > 0) { ?>
<?php if (!isset($ivf_oocytedenudation_preview->Pager)) $ivf_oocytedenudation_preview->Pager = new PrevNextPager($ivf_oocytedenudation_preview->StartRec, $ivf_oocytedenudation_preview->DisplayRecs, $ivf_oocytedenudation_preview->TotalRecs) ?>
<?php if ($ivf_oocytedenudation_preview->Pager->RecordCount > 0 && $ivf_oocytedenudation_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($ivf_oocytedenudation_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $ivf_oocytedenudation_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($ivf_oocytedenudation_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $ivf_oocytedenudation_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($ivf_oocytedenudation_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $ivf_oocytedenudation_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($ivf_oocytedenudation_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $ivf_oocytedenudation_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $ivf_oocytedenudation_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $ivf_oocytedenudation_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $ivf_oocytedenudation_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($ivf_oocytedenudation_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$ivf_oocytedenudation_preview->showPageFooter();
if (DEBUG_ENABLED)
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
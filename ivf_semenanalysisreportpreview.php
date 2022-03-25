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
$ivf_semenanalysisreport_preview = new ivf_semenanalysisreport_preview();

// Run the page
$ivf_semenanalysisreport_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_semenanalysisreport_preview->Page_Render();
?>
<?php $ivf_semenanalysisreport_preview->showPageHeader(); ?>
<div class="card ew-grid ivf_semenanalysisreport"><!-- .card -->
<?php if ($ivf_semenanalysisreport_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$ivf_semenanalysisreport_preview->renderListOptions();

// Render list options (header, left)
$ivf_semenanalysisreport_preview->ListOptions->render("header", "left");
?>
<?php if ($ivf_semenanalysisreport->id->Visible) { // id ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->id) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->id->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->id->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->id->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->id->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RIDNo->Visible) { // RIDNo ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->RIDNo) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->RIDNo->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->RIDNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->RIDNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->RIDNo->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->RIDNo->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->RIDNo->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->RIDNo->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->PatientName->Visible) { // PatientName ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->PatientName) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->PatientName->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->PatientName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->PatientName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->PatientName->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->PatientName->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->PatientName->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->PatientName->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->HusbandName->Visible) { // HusbandName ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->HusbandName) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->HusbandName->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->HusbandName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->HusbandName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->HusbandName->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->HusbandName->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->HusbandName->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->HusbandName->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RequestDr->Visible) { // RequestDr ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->RequestDr) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->RequestDr->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->RequestDr->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->RequestDr->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->RequestDr->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->RequestDr->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->RequestDr->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->RequestDr->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->CollectionDate->Visible) { // CollectionDate ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->CollectionDate) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->CollectionDate->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->CollectionDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->CollectionDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->CollectionDate->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->CollectionDate->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->CollectionDate->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->CollectionDate->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->ResultDate->Visible) { // ResultDate ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->ResultDate) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->ResultDate->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->ResultDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->ResultDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->ResultDate->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->ResultDate->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->ResultDate->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->ResultDate->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RequestSample->Visible) { // RequestSample ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->RequestSample) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->RequestSample->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->RequestSample->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->RequestSample->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->RequestSample->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->RequestSample->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->RequestSample->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->RequestSample->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->CollectionType->Visible) { // CollectionType ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->CollectionType) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->CollectionType->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->CollectionType->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->CollectionType->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->CollectionType->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->CollectionType->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->CollectionType->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->CollectionType->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->CollectionMethod->Visible) { // CollectionMethod ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->CollectionMethod) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->CollectionMethod->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->CollectionMethod->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->CollectionMethod->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->CollectionMethod->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->CollectionMethod->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->CollectionMethod->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->CollectionMethod->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Medicationused->Visible) { // Medicationused ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Medicationused) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Medicationused->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->Medicationused->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Medicationused->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->Medicationused->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Medicationused->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Medicationused->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Medicationused->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->DifficultiesinCollection->Visible) { // DifficultiesinCollection ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->DifficultiesinCollection) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->DifficultiesinCollection->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->DifficultiesinCollection->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->DifficultiesinCollection->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->DifficultiesinCollection->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->DifficultiesinCollection->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->DifficultiesinCollection->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->DifficultiesinCollection->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->pH->Visible) { // pH ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->pH) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->pH->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->pH->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->pH->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->pH->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->pH->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->pH->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->pH->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Timeofcollection->Visible) { // Timeofcollection ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Timeofcollection) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Timeofcollection->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->Timeofcollection->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Timeofcollection->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->Timeofcollection->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Timeofcollection->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Timeofcollection->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Timeofcollection->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Timeofexamination->Visible) { // Timeofexamination ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Timeofexamination) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Timeofexamination->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->Timeofexamination->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Timeofexamination->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->Timeofexamination->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Timeofexamination->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Timeofexamination->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Timeofexamination->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Volume->Visible) { // Volume ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Volume) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Volume->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->Volume->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Volume->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->Volume->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Volume->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Volume->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Volume->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Concentration->Visible) { // Concentration ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Concentration) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Concentration->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->Concentration->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Concentration->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->Concentration->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Concentration->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Concentration->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Concentration->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Total->Visible) { // Total ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Total) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Total->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->Total->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Total->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->Total->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Total->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Total->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Total->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->ProgressiveMotility->Visible) { // ProgressiveMotility ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->ProgressiveMotility) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->ProgressiveMotility->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->ProgressiveMotility->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->ProgressiveMotility->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->ProgressiveMotility->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->ProgressiveMotility->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->ProgressiveMotility->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->ProgressiveMotility->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->NonProgrssiveMotile->Visible) { // NonProgrssiveMotile ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->NonProgrssiveMotile) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->NonProgrssiveMotile->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->NonProgrssiveMotile->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->NonProgrssiveMotile->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->NonProgrssiveMotile->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Immotile->Visible) { // Immotile ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Immotile) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Immotile->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->Immotile->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Immotile->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->Immotile->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Immotile->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Immotile->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Immotile->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->TotalProgrssiveMotile->Visible) { // TotalProgrssiveMotile ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->TotalProgrssiveMotile) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->TotalProgrssiveMotile->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->TotalProgrssiveMotile->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Appearance->Visible) { // Appearance ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Appearance) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Appearance->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->Appearance->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Appearance->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->Appearance->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Appearance->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Appearance->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Appearance->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Homogenosity->Visible) { // Homogenosity ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Homogenosity) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Homogenosity->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->Homogenosity->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Homogenosity->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->Homogenosity->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Homogenosity->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Homogenosity->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Homogenosity->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->CompleteSample->Visible) { // CompleteSample ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->CompleteSample) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->CompleteSample->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->CompleteSample->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->CompleteSample->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->CompleteSample->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->CompleteSample->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->CompleteSample->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->CompleteSample->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Liquefactiontime->Visible) { // Liquefactiontime ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Liquefactiontime) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Liquefactiontime->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->Liquefactiontime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Liquefactiontime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->Liquefactiontime->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Liquefactiontime->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Liquefactiontime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Liquefactiontime->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Normal->Visible) { // Normal ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Normal) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Normal->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->Normal->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Normal->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->Normal->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Normal->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Normal->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Normal->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Abnormal->Visible) { // Abnormal ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Abnormal) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Abnormal->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->Abnormal->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Abnormal->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->Abnormal->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Abnormal->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Abnormal->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Abnormal->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Headdefects->Visible) { // Headdefects ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Headdefects) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Headdefects->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->Headdefects->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Headdefects->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->Headdefects->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Headdefects->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Headdefects->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Headdefects->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->MidpieceDefects->Visible) { // MidpieceDefects ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->MidpieceDefects) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->MidpieceDefects->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->MidpieceDefects->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->MidpieceDefects->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->MidpieceDefects->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->MidpieceDefects->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->MidpieceDefects->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->MidpieceDefects->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->TailDefects->Visible) { // TailDefects ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->TailDefects) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->TailDefects->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->TailDefects->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->TailDefects->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->TailDefects->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->TailDefects->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->TailDefects->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->TailDefects->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->NormalProgMotile->Visible) { // NormalProgMotile ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->NormalProgMotile) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->NormalProgMotile->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->NormalProgMotile->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->NormalProgMotile->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->NormalProgMotile->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->NormalProgMotile->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->NormalProgMotile->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->NormalProgMotile->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->ImmatureForms->Visible) { // ImmatureForms ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->ImmatureForms) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->ImmatureForms->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->ImmatureForms->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->ImmatureForms->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->ImmatureForms->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->ImmatureForms->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->ImmatureForms->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->ImmatureForms->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Leucocytes->Visible) { // Leucocytes ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Leucocytes) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Leucocytes->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->Leucocytes->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Leucocytes->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->Leucocytes->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Leucocytes->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Leucocytes->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Leucocytes->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Agglutination->Visible) { // Agglutination ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Agglutination) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Agglutination->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->Agglutination->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Agglutination->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->Agglutination->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Agglutination->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Agglutination->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Agglutination->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Debris->Visible) { // Debris ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Debris) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Debris->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->Debris->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Debris->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->Debris->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Debris->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Debris->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Debris->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Diagnosis->Visible) { // Diagnosis ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Diagnosis) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Diagnosis->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->Diagnosis->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Diagnosis->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->Diagnosis->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Diagnosis->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Diagnosis->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Diagnosis->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Observations->Visible) { // Observations ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Observations) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Observations->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->Observations->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Observations->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->Observations->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Observations->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Observations->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Observations->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Signature->Visible) { // Signature ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Signature) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Signature->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->Signature->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Signature->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->Signature->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Signature->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Signature->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Signature->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->SemenOrgin->Visible) { // SemenOrgin ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->SemenOrgin) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->SemenOrgin->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->SemenOrgin->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->SemenOrgin->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->SemenOrgin->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->SemenOrgin->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->SemenOrgin->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->SemenOrgin->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Donor->Visible) { // Donor ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Donor) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Donor->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->Donor->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Donor->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->Donor->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Donor->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Donor->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Donor->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->DonorBloodgroup->Visible) { // DonorBloodgroup ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->DonorBloodgroup) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->DonorBloodgroup->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->DonorBloodgroup->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->DonorBloodgroup->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->DonorBloodgroup->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->DonorBloodgroup->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->DonorBloodgroup->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->DonorBloodgroup->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Tank->Visible) { // Tank ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Tank) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Tank->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->Tank->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Tank->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->Tank->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Tank->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Tank->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Tank->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Location->Visible) { // Location ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Location) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Location->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->Location->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Location->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->Location->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Location->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Location->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Location->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Volume1->Visible) { // Volume1 ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Volume1) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Volume1->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->Volume1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Volume1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->Volume1->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Volume1->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Volume1->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Volume1->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Concentration1->Visible) { // Concentration1 ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Concentration1) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Concentration1->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->Concentration1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Concentration1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->Concentration1->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Concentration1->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Concentration1->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Concentration1->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Total1->Visible) { // Total1 ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Total1) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Total1->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->Total1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Total1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->Total1->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Total1->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Total1->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Total1->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->ProgressiveMotility1->Visible) { // ProgressiveMotility1 ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->ProgressiveMotility1) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->ProgressiveMotility1->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->ProgressiveMotility1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->ProgressiveMotility1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->ProgressiveMotility1->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->ProgressiveMotility1->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->ProgressiveMotility1->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->ProgressiveMotility1->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->NonProgrssiveMotile1->Visible) { // NonProgrssiveMotile1 ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->NonProgrssiveMotile1) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile1->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->NonProgrssiveMotile1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile1->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->NonProgrssiveMotile1->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->NonProgrssiveMotile1->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->NonProgrssiveMotile1->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Immotile1->Visible) { // Immotile1 ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Immotile1) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Immotile1->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->Immotile1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Immotile1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->Immotile1->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Immotile1->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Immotile1->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Immotile1->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->TotalProgrssiveMotile1->Visible) { // TotalProgrssiveMotile1 ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->TotalProgrssiveMotile1) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile1->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile1->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->TotalProgrssiveMotile1->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile1->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->TotalProgrssiveMotile1->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->TidNo->Visible) { // TidNo ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->TidNo) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->TidNo->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->TidNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->TidNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->TidNo->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->TidNo->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->TidNo->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->TidNo->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Color->Visible) { // Color ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Color) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Color->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->Color->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Color->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->Color->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Color->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Color->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Color->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->DoneBy->Visible) { // DoneBy ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->DoneBy) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->DoneBy->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->DoneBy->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->DoneBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->DoneBy->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->DoneBy->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->DoneBy->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->DoneBy->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Method->Visible) { // Method ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Method) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Method->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->Method->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Method->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->Method->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Method->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Method->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Method->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Abstinence->Visible) { // Abstinence ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Abstinence) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Abstinence->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->Abstinence->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Abstinence->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->Abstinence->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Abstinence->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Abstinence->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Abstinence->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->ProcessedBy->Visible) { // ProcessedBy ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->ProcessedBy) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->ProcessedBy->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->ProcessedBy->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->ProcessedBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->ProcessedBy->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->ProcessedBy->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->ProcessedBy->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->ProcessedBy->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->InseminationTime->Visible) { // InseminationTime ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->InseminationTime) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->InseminationTime->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->InseminationTime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->InseminationTime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->InseminationTime->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->InseminationTime->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->InseminationTime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->InseminationTime->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->InseminationBy->Visible) { // InseminationBy ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->InseminationBy) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->InseminationBy->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->InseminationBy->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->InseminationBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->InseminationBy->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->InseminationBy->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->InseminationBy->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->InseminationBy->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Big->Visible) { // Big ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Big) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Big->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->Big->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Big->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->Big->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Big->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Big->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Big->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Medium->Visible) { // Medium ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Medium) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Medium->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->Medium->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Medium->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->Medium->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Medium->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Medium->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Medium->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Small->Visible) { // Small ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Small) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Small->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->Small->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Small->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->Small->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Small->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Small->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Small->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->NoHalo->Visible) { // NoHalo ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->NoHalo) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->NoHalo->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->NoHalo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->NoHalo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->NoHalo->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->NoHalo->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->NoHalo->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->NoHalo->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Fragmented->Visible) { // Fragmented ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Fragmented) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Fragmented->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->Fragmented->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Fragmented->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->Fragmented->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Fragmented->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Fragmented->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Fragmented->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->NonFragmented->Visible) { // NonFragmented ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->NonFragmented) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->NonFragmented->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->NonFragmented->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->NonFragmented->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->NonFragmented->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->NonFragmented->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->NonFragmented->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->NonFragmented->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->DFI->Visible) { // DFI ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->DFI) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->DFI->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->DFI->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->DFI->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->DFI->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->DFI->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->DFI->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->DFI->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->IsueBy->Visible) { // IsueBy ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->IsueBy) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->IsueBy->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->IsueBy->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->IsueBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->IsueBy->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->IsueBy->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->IsueBy->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->IsueBy->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Volume2->Visible) { // Volume2 ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Volume2) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Volume2->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->Volume2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Volume2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->Volume2->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Volume2->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Volume2->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Volume2->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Concentration2->Visible) { // Concentration2 ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Concentration2) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Concentration2->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->Concentration2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Concentration2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->Concentration2->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Concentration2->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Concentration2->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Concentration2->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Total2->Visible) { // Total2 ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Total2) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Total2->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->Total2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Total2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->Total2->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Total2->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Total2->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Total2->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->ProgressiveMotility2->Visible) { // ProgressiveMotility2 ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->ProgressiveMotility2) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->ProgressiveMotility2->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->ProgressiveMotility2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->ProgressiveMotility2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->ProgressiveMotility2->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->ProgressiveMotility2->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->ProgressiveMotility2->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->ProgressiveMotility2->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->NonProgrssiveMotile2->Visible) { // NonProgrssiveMotile2 ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->NonProgrssiveMotile2) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile2->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->NonProgrssiveMotile2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile2->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->NonProgrssiveMotile2->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->NonProgrssiveMotile2->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->NonProgrssiveMotile2->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Immotile2->Visible) { // Immotile2 ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Immotile2) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Immotile2->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->Immotile2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->Immotile2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->Immotile2->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Immotile2->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Immotile2->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->Immotile2->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->TotalProgrssiveMotile2->Visible) { // TotalProgrssiveMotile2 ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->TotalProgrssiveMotile2) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile2->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile2->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->TotalProgrssiveMotile2->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile2->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->TotalProgrssiveMotile2->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->IssuedBy->Visible) { // IssuedBy ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->IssuedBy) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->IssuedBy->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->IssuedBy->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->IssuedBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->IssuedBy->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->IssuedBy->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->IssuedBy->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->IssuedBy->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->IssuedTo->Visible) { // IssuedTo ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->IssuedTo) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->IssuedTo->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->IssuedTo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->IssuedTo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->IssuedTo->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->IssuedTo->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->IssuedTo->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->IssuedTo->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->PaID->Visible) { // PaID ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->PaID) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->PaID->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->PaID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->PaID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->PaID->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->PaID->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->PaID->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->PaID->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->PaName->Visible) { // PaName ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->PaName) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->PaName->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->PaName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->PaName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->PaName->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->PaName->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->PaName->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->PaName->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->PaMobile->Visible) { // PaMobile ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->PaMobile) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->PaMobile->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->PaMobile->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->PaMobile->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->PaMobile->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->PaMobile->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->PaMobile->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->PaMobile->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->PartnerID->Visible) { // PartnerID ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->PartnerID) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->PartnerID->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->PartnerID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->PartnerID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->PartnerID->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->PartnerID->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->PartnerID->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->PartnerID->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->PartnerName->Visible) { // PartnerName ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->PartnerName) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->PartnerName->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->PartnerName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->PartnerName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->PartnerName->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->PartnerName->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->PartnerName->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->PartnerName->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->PartnerMobile->Visible) { // PartnerMobile ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->PartnerMobile) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->PartnerMobile->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->PartnerMobile->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->PartnerMobile->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->PartnerMobile->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->PartnerMobile->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->PartnerMobile->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->PartnerMobile->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->PREG_TEST_DATE->Visible) { // PREG_TEST_DATE ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->PREG_TEST_DATE) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->PREG_TEST_DATE->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->PREG_TEST_DATE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->PREG_TEST_DATE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->PREG_TEST_DATE->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->PREG_TEST_DATE->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->PREG_TEST_DATE->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->PREG_TEST_DATE->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->SPECIFIC_PROBLEMS->Visible) { // SPECIFIC_PROBLEMS ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->SPECIFIC_PROBLEMS) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->SPECIFIC_PROBLEMS->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->SPECIFIC_PROBLEMS->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->SPECIFIC_PROBLEMS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->SPECIFIC_PROBLEMS->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->SPECIFIC_PROBLEMS->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->SPECIFIC_PROBLEMS->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->SPECIFIC_PROBLEMS->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->IMSC_1->Visible) { // IMSC_1 ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->IMSC_1) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->IMSC_1->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->IMSC_1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->IMSC_1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->IMSC_1->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->IMSC_1->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->IMSC_1->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->IMSC_1->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->IMSC_2->Visible) { // IMSC_2 ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->IMSC_2) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->IMSC_2->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->IMSC_2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->IMSC_2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->IMSC_2->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->IMSC_2->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->IMSC_2->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->IMSC_2->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->LIQUIFACTION_STORAGE->Visible) { // LIQUIFACTION_STORAGE ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->LIQUIFACTION_STORAGE) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->LIQUIFACTION_STORAGE->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->LIQUIFACTION_STORAGE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->LIQUIFACTION_STORAGE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->LIQUIFACTION_STORAGE->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->LIQUIFACTION_STORAGE->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->LIQUIFACTION_STORAGE->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->LIQUIFACTION_STORAGE->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->IUI_PREP_METHOD->Visible) { // IUI_PREP_METHOD ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->IUI_PREP_METHOD) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->IUI_PREP_METHOD->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->IUI_PREP_METHOD->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->IUI_PREP_METHOD->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->IUI_PREP_METHOD->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->IUI_PREP_METHOD->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->IUI_PREP_METHOD->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->IUI_PREP_METHOD->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->TIME_FROM_TRIGGER->Visible) { // TIME_FROM_TRIGGER ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->TIME_FROM_TRIGGER) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->TIME_FROM_TRIGGER->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->TIME_FROM_TRIGGER->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->TIME_FROM_TRIGGER->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->TIME_FROM_TRIGGER->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->TIME_FROM_TRIGGER->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->TIME_FROM_TRIGGER->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->TIME_FROM_TRIGGER->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->COLLECTION_TO_PREPARATION->Visible) { // COLLECTION_TO_PREPARATION ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->COLLECTION_TO_PREPARATION) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->COLLECTION_TO_PREPARATION->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->COLLECTION_TO_PREPARATION->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->COLLECTION_TO_PREPARATION->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->COLLECTION_TO_PREPARATION->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->COLLECTION_TO_PREPARATION->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->COLLECTION_TO_PREPARATION->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->COLLECTION_TO_PREPARATION->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->TIME_FROM_PREP_TO_INSEM->Visible) { // TIME_FROM_PREP_TO_INSEM ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->TIME_FROM_PREP_TO_INSEM) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport->TIME_FROM_PREP_TO_INSEM->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport->TIME_FROM_PREP_TO_INSEM->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport->TIME_FROM_PREP_TO_INSEM->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $ivf_semenanalysisreport->TIME_FROM_PREP_TO_INSEM->Name ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->TIME_FROM_PREP_TO_INSEM->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->TIME_FROM_PREP_TO_INSEM->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport->TIME_FROM_PREP_TO_INSEM->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$ivf_semenanalysisreport_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$ivf_semenanalysisreport_preview->RecCount = 0;
$ivf_semenanalysisreport_preview->RowCnt = 0;
while ($ivf_semenanalysisreport_preview->Recordset && !$ivf_semenanalysisreport_preview->Recordset->EOF) {

	// Init row class and style
	$ivf_semenanalysisreport_preview->RecCount++;
	$ivf_semenanalysisreport_preview->RowCnt++;
	$ivf_semenanalysisreport_preview->CssStyle = "";
	$ivf_semenanalysisreport_preview->loadListRowValues($ivf_semenanalysisreport_preview->Recordset);

	// Render row
	$ivf_semenanalysisreport_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$ivf_semenanalysisreport_preview->resetAttributes();
	$ivf_semenanalysisreport_preview->renderListRow();

	// Render list options
	$ivf_semenanalysisreport_preview->renderListOptions();
?>
	<tr<?php echo $ivf_semenanalysisreport_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_semenanalysisreport_preview->ListOptions->render("body", "left", $ivf_semenanalysisreport_preview->RowCnt);
?>
<?php if ($ivf_semenanalysisreport->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $ivf_semenanalysisreport->id->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->id->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RIDNo->Visible) { // RIDNo ?>
		<!-- RIDNo -->
		<td<?php echo $ivf_semenanalysisreport->RIDNo->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->RIDNo->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->RIDNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->PatientName->Visible) { // PatientName ?>
		<!-- PatientName -->
		<td<?php echo $ivf_semenanalysisreport->PatientName->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->PatientName->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->PatientName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->HusbandName->Visible) { // HusbandName ?>
		<!-- HusbandName -->
		<td<?php echo $ivf_semenanalysisreport->HusbandName->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->HusbandName->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->HusbandName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RequestDr->Visible) { // RequestDr ?>
		<!-- RequestDr -->
		<td<?php echo $ivf_semenanalysisreport->RequestDr->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->RequestDr->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->RequestDr->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->CollectionDate->Visible) { // CollectionDate ?>
		<!-- CollectionDate -->
		<td<?php echo $ivf_semenanalysisreport->CollectionDate->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->CollectionDate->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->CollectionDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->ResultDate->Visible) { // ResultDate ?>
		<!-- ResultDate -->
		<td<?php echo $ivf_semenanalysisreport->ResultDate->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->ResultDate->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->ResultDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RequestSample->Visible) { // RequestSample ?>
		<!-- RequestSample -->
		<td<?php echo $ivf_semenanalysisreport->RequestSample->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->RequestSample->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->RequestSample->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->CollectionType->Visible) { // CollectionType ?>
		<!-- CollectionType -->
		<td<?php echo $ivf_semenanalysisreport->CollectionType->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->CollectionType->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->CollectionType->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->CollectionMethod->Visible) { // CollectionMethod ?>
		<!-- CollectionMethod -->
		<td<?php echo $ivf_semenanalysisreport->CollectionMethod->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->CollectionMethod->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->CollectionMethod->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Medicationused->Visible) { // Medicationused ?>
		<!-- Medicationused -->
		<td<?php echo $ivf_semenanalysisreport->Medicationused->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->Medicationused->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Medicationused->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->DifficultiesinCollection->Visible) { // DifficultiesinCollection ?>
		<!-- DifficultiesinCollection -->
		<td<?php echo $ivf_semenanalysisreport->DifficultiesinCollection->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->DifficultiesinCollection->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->DifficultiesinCollection->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->pH->Visible) { // pH ?>
		<!-- pH -->
		<td<?php echo $ivf_semenanalysisreport->pH->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->pH->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->pH->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Timeofcollection->Visible) { // Timeofcollection ?>
		<!-- Timeofcollection -->
		<td<?php echo $ivf_semenanalysisreport->Timeofcollection->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->Timeofcollection->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Timeofcollection->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Timeofexamination->Visible) { // Timeofexamination ?>
		<!-- Timeofexamination -->
		<td<?php echo $ivf_semenanalysisreport->Timeofexamination->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->Timeofexamination->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Timeofexamination->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Volume->Visible) { // Volume ?>
		<!-- Volume -->
		<td<?php echo $ivf_semenanalysisreport->Volume->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->Volume->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Volume->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Concentration->Visible) { // Concentration ?>
		<!-- Concentration -->
		<td<?php echo $ivf_semenanalysisreport->Concentration->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->Concentration->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Concentration->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Total->Visible) { // Total ?>
		<!-- Total -->
		<td<?php echo $ivf_semenanalysisreport->Total->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->Total->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Total->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->ProgressiveMotility->Visible) { // ProgressiveMotility ?>
		<!-- ProgressiveMotility -->
		<td<?php echo $ivf_semenanalysisreport->ProgressiveMotility->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->ProgressiveMotility->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->ProgressiveMotility->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->NonProgrssiveMotile->Visible) { // NonProgrssiveMotile ?>
		<!-- NonProgrssiveMotile -->
		<td<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Immotile->Visible) { // Immotile ?>
		<!-- Immotile -->
		<td<?php echo $ivf_semenanalysisreport->Immotile->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->Immotile->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Immotile->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->TotalProgrssiveMotile->Visible) { // TotalProgrssiveMotile ?>
		<!-- TotalProgrssiveMotile -->
		<td<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Appearance->Visible) { // Appearance ?>
		<!-- Appearance -->
		<td<?php echo $ivf_semenanalysisreport->Appearance->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->Appearance->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Appearance->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Homogenosity->Visible) { // Homogenosity ?>
		<!-- Homogenosity -->
		<td<?php echo $ivf_semenanalysisreport->Homogenosity->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->Homogenosity->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Homogenosity->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->CompleteSample->Visible) { // CompleteSample ?>
		<!-- CompleteSample -->
		<td<?php echo $ivf_semenanalysisreport->CompleteSample->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->CompleteSample->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->CompleteSample->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Liquefactiontime->Visible) { // Liquefactiontime ?>
		<!-- Liquefactiontime -->
		<td<?php echo $ivf_semenanalysisreport->Liquefactiontime->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->Liquefactiontime->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Liquefactiontime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Normal->Visible) { // Normal ?>
		<!-- Normal -->
		<td<?php echo $ivf_semenanalysisreport->Normal->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->Normal->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Normal->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Abnormal->Visible) { // Abnormal ?>
		<!-- Abnormal -->
		<td<?php echo $ivf_semenanalysisreport->Abnormal->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->Abnormal->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Abnormal->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Headdefects->Visible) { // Headdefects ?>
		<!-- Headdefects -->
		<td<?php echo $ivf_semenanalysisreport->Headdefects->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->Headdefects->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Headdefects->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->MidpieceDefects->Visible) { // MidpieceDefects ?>
		<!-- MidpieceDefects -->
		<td<?php echo $ivf_semenanalysisreport->MidpieceDefects->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->MidpieceDefects->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->MidpieceDefects->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->TailDefects->Visible) { // TailDefects ?>
		<!-- TailDefects -->
		<td<?php echo $ivf_semenanalysisreport->TailDefects->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->TailDefects->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->TailDefects->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->NormalProgMotile->Visible) { // NormalProgMotile ?>
		<!-- NormalProgMotile -->
		<td<?php echo $ivf_semenanalysisreport->NormalProgMotile->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->NormalProgMotile->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->NormalProgMotile->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->ImmatureForms->Visible) { // ImmatureForms ?>
		<!-- ImmatureForms -->
		<td<?php echo $ivf_semenanalysisreport->ImmatureForms->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->ImmatureForms->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->ImmatureForms->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Leucocytes->Visible) { // Leucocytes ?>
		<!-- Leucocytes -->
		<td<?php echo $ivf_semenanalysisreport->Leucocytes->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->Leucocytes->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Leucocytes->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Agglutination->Visible) { // Agglutination ?>
		<!-- Agglutination -->
		<td<?php echo $ivf_semenanalysisreport->Agglutination->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->Agglutination->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Agglutination->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Debris->Visible) { // Debris ?>
		<!-- Debris -->
		<td<?php echo $ivf_semenanalysisreport->Debris->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->Debris->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Debris->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Diagnosis->Visible) { // Diagnosis ?>
		<!-- Diagnosis -->
		<td<?php echo $ivf_semenanalysisreport->Diagnosis->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->Diagnosis->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Diagnosis->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Observations->Visible) { // Observations ?>
		<!-- Observations -->
		<td<?php echo $ivf_semenanalysisreport->Observations->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->Observations->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Observations->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Signature->Visible) { // Signature ?>
		<!-- Signature -->
		<td<?php echo $ivf_semenanalysisreport->Signature->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->Signature->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Signature->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->SemenOrgin->Visible) { // SemenOrgin ?>
		<!-- SemenOrgin -->
		<td<?php echo $ivf_semenanalysisreport->SemenOrgin->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->SemenOrgin->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->SemenOrgin->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Donor->Visible) { // Donor ?>
		<!-- Donor -->
		<td<?php echo $ivf_semenanalysisreport->Donor->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->Donor->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Donor->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->DonorBloodgroup->Visible) { // DonorBloodgroup ?>
		<!-- DonorBloodgroup -->
		<td<?php echo $ivf_semenanalysisreport->DonorBloodgroup->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->DonorBloodgroup->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->DonorBloodgroup->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Tank->Visible) { // Tank ?>
		<!-- Tank -->
		<td<?php echo $ivf_semenanalysisreport->Tank->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->Tank->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Tank->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Location->Visible) { // Location ?>
		<!-- Location -->
		<td<?php echo $ivf_semenanalysisreport->Location->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->Location->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Location->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Volume1->Visible) { // Volume1 ?>
		<!-- Volume1 -->
		<td<?php echo $ivf_semenanalysisreport->Volume1->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->Volume1->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Volume1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Concentration1->Visible) { // Concentration1 ?>
		<!-- Concentration1 -->
		<td<?php echo $ivf_semenanalysisreport->Concentration1->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->Concentration1->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Concentration1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Total1->Visible) { // Total1 ?>
		<!-- Total1 -->
		<td<?php echo $ivf_semenanalysisreport->Total1->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->Total1->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Total1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->ProgressiveMotility1->Visible) { // ProgressiveMotility1 ?>
		<!-- ProgressiveMotility1 -->
		<td<?php echo $ivf_semenanalysisreport->ProgressiveMotility1->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->ProgressiveMotility1->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->ProgressiveMotility1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->NonProgrssiveMotile1->Visible) { // NonProgrssiveMotile1 ?>
		<!-- NonProgrssiveMotile1 -->
		<td<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile1->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile1->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Immotile1->Visible) { // Immotile1 ?>
		<!-- Immotile1 -->
		<td<?php echo $ivf_semenanalysisreport->Immotile1->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->Immotile1->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Immotile1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->TotalProgrssiveMotile1->Visible) { // TotalProgrssiveMotile1 ?>
		<!-- TotalProgrssiveMotile1 -->
		<td<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile1->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile1->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->TidNo->Visible) { // TidNo ?>
		<!-- TidNo -->
		<td<?php echo $ivf_semenanalysisreport->TidNo->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->TidNo->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->TidNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Color->Visible) { // Color ?>
		<!-- Color -->
		<td<?php echo $ivf_semenanalysisreport->Color->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->Color->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Color->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->DoneBy->Visible) { // DoneBy ?>
		<!-- DoneBy -->
		<td<?php echo $ivf_semenanalysisreport->DoneBy->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->DoneBy->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->DoneBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Method->Visible) { // Method ?>
		<!-- Method -->
		<td<?php echo $ivf_semenanalysisreport->Method->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->Method->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Method->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Abstinence->Visible) { // Abstinence ?>
		<!-- Abstinence -->
		<td<?php echo $ivf_semenanalysisreport->Abstinence->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->Abstinence->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Abstinence->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->ProcessedBy->Visible) { // ProcessedBy ?>
		<!-- ProcessedBy -->
		<td<?php echo $ivf_semenanalysisreport->ProcessedBy->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->ProcessedBy->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->ProcessedBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->InseminationTime->Visible) { // InseminationTime ?>
		<!-- InseminationTime -->
		<td<?php echo $ivf_semenanalysisreport->InseminationTime->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->InseminationTime->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->InseminationTime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->InseminationBy->Visible) { // InseminationBy ?>
		<!-- InseminationBy -->
		<td<?php echo $ivf_semenanalysisreport->InseminationBy->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->InseminationBy->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->InseminationBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Big->Visible) { // Big ?>
		<!-- Big -->
		<td<?php echo $ivf_semenanalysisreport->Big->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->Big->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Big->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Medium->Visible) { // Medium ?>
		<!-- Medium -->
		<td<?php echo $ivf_semenanalysisreport->Medium->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->Medium->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Medium->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Small->Visible) { // Small ?>
		<!-- Small -->
		<td<?php echo $ivf_semenanalysisreport->Small->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->Small->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Small->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->NoHalo->Visible) { // NoHalo ?>
		<!-- NoHalo -->
		<td<?php echo $ivf_semenanalysisreport->NoHalo->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->NoHalo->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->NoHalo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Fragmented->Visible) { // Fragmented ?>
		<!-- Fragmented -->
		<td<?php echo $ivf_semenanalysisreport->Fragmented->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->Fragmented->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Fragmented->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->NonFragmented->Visible) { // NonFragmented ?>
		<!-- NonFragmented -->
		<td<?php echo $ivf_semenanalysisreport->NonFragmented->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->NonFragmented->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->NonFragmented->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->DFI->Visible) { // DFI ?>
		<!-- DFI -->
		<td<?php echo $ivf_semenanalysisreport->DFI->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->DFI->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->DFI->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->IsueBy->Visible) { // IsueBy ?>
		<!-- IsueBy -->
		<td<?php echo $ivf_semenanalysisreport->IsueBy->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->IsueBy->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->IsueBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Volume2->Visible) { // Volume2 ?>
		<!-- Volume2 -->
		<td<?php echo $ivf_semenanalysisreport->Volume2->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->Volume2->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Volume2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Concentration2->Visible) { // Concentration2 ?>
		<!-- Concentration2 -->
		<td<?php echo $ivf_semenanalysisreport->Concentration2->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->Concentration2->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Concentration2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Total2->Visible) { // Total2 ?>
		<!-- Total2 -->
		<td<?php echo $ivf_semenanalysisreport->Total2->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->Total2->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Total2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->ProgressiveMotility2->Visible) { // ProgressiveMotility2 ?>
		<!-- ProgressiveMotility2 -->
		<td<?php echo $ivf_semenanalysisreport->ProgressiveMotility2->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->ProgressiveMotility2->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->ProgressiveMotility2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->NonProgrssiveMotile2->Visible) { // NonProgrssiveMotile2 ?>
		<!-- NonProgrssiveMotile2 -->
		<td<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile2->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile2->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Immotile2->Visible) { // Immotile2 ?>
		<!-- Immotile2 -->
		<td<?php echo $ivf_semenanalysisreport->Immotile2->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->Immotile2->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Immotile2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->TotalProgrssiveMotile2->Visible) { // TotalProgrssiveMotile2 ?>
		<!-- TotalProgrssiveMotile2 -->
		<td<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile2->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile2->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->IssuedBy->Visible) { // IssuedBy ?>
		<!-- IssuedBy -->
		<td<?php echo $ivf_semenanalysisreport->IssuedBy->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->IssuedBy->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->IssuedBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->IssuedTo->Visible) { // IssuedTo ?>
		<!-- IssuedTo -->
		<td<?php echo $ivf_semenanalysisreport->IssuedTo->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->IssuedTo->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->IssuedTo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->PaID->Visible) { // PaID ?>
		<!-- PaID -->
		<td<?php echo $ivf_semenanalysisreport->PaID->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->PaID->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->PaID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->PaName->Visible) { // PaName ?>
		<!-- PaName -->
		<td<?php echo $ivf_semenanalysisreport->PaName->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->PaName->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->PaName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->PaMobile->Visible) { // PaMobile ?>
		<!-- PaMobile -->
		<td<?php echo $ivf_semenanalysisreport->PaMobile->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->PaMobile->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->PaMobile->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->PartnerID->Visible) { // PartnerID ?>
		<!-- PartnerID -->
		<td<?php echo $ivf_semenanalysisreport->PartnerID->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->PartnerID->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->PartnerID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->PartnerName->Visible) { // PartnerName ?>
		<!-- PartnerName -->
		<td<?php echo $ivf_semenanalysisreport->PartnerName->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->PartnerName->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->PartnerName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->PartnerMobile->Visible) { // PartnerMobile ?>
		<!-- PartnerMobile -->
		<td<?php echo $ivf_semenanalysisreport->PartnerMobile->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->PartnerMobile->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->PartnerMobile->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->PREG_TEST_DATE->Visible) { // PREG_TEST_DATE ?>
		<!-- PREG_TEST_DATE -->
		<td<?php echo $ivf_semenanalysisreport->PREG_TEST_DATE->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->PREG_TEST_DATE->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->PREG_TEST_DATE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->SPECIFIC_PROBLEMS->Visible) { // SPECIFIC_PROBLEMS ?>
		<!-- SPECIFIC_PROBLEMS -->
		<td<?php echo $ivf_semenanalysisreport->SPECIFIC_PROBLEMS->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->SPECIFIC_PROBLEMS->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->SPECIFIC_PROBLEMS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->IMSC_1->Visible) { // IMSC_1 ?>
		<!-- IMSC_1 -->
		<td<?php echo $ivf_semenanalysisreport->IMSC_1->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->IMSC_1->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->IMSC_1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->IMSC_2->Visible) { // IMSC_2 ?>
		<!-- IMSC_2 -->
		<td<?php echo $ivf_semenanalysisreport->IMSC_2->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->IMSC_2->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->IMSC_2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->LIQUIFACTION_STORAGE->Visible) { // LIQUIFACTION_STORAGE ?>
		<!-- LIQUIFACTION_STORAGE -->
		<td<?php echo $ivf_semenanalysisreport->LIQUIFACTION_STORAGE->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->LIQUIFACTION_STORAGE->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->LIQUIFACTION_STORAGE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->IUI_PREP_METHOD->Visible) { // IUI_PREP_METHOD ?>
		<!-- IUI_PREP_METHOD -->
		<td<?php echo $ivf_semenanalysisreport->IUI_PREP_METHOD->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->IUI_PREP_METHOD->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->IUI_PREP_METHOD->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->TIME_FROM_TRIGGER->Visible) { // TIME_FROM_TRIGGER ?>
		<!-- TIME_FROM_TRIGGER -->
		<td<?php echo $ivf_semenanalysisreport->TIME_FROM_TRIGGER->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->TIME_FROM_TRIGGER->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->TIME_FROM_TRIGGER->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->COLLECTION_TO_PREPARATION->Visible) { // COLLECTION_TO_PREPARATION ?>
		<!-- COLLECTION_TO_PREPARATION -->
		<td<?php echo $ivf_semenanalysisreport->COLLECTION_TO_PREPARATION->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->COLLECTION_TO_PREPARATION->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->COLLECTION_TO_PREPARATION->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->TIME_FROM_PREP_TO_INSEM->Visible) { // TIME_FROM_PREP_TO_INSEM ?>
		<!-- TIME_FROM_PREP_TO_INSEM -->
		<td<?php echo $ivf_semenanalysisreport->TIME_FROM_PREP_TO_INSEM->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport->TIME_FROM_PREP_TO_INSEM->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->TIME_FROM_PREP_TO_INSEM->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$ivf_semenanalysisreport_preview->ListOptions->render("body", "right", $ivf_semenanalysisreport_preview->RowCnt);
?>
	</tr>
<?php
	$ivf_semenanalysisreport_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($ivf_semenanalysisreport_preview->TotalRecs > 0) { ?>
<?php if (!isset($ivf_semenanalysisreport_preview->Pager)) $ivf_semenanalysisreport_preview->Pager = new PrevNextPager($ivf_semenanalysisreport_preview->StartRec, $ivf_semenanalysisreport_preview->DisplayRecs, $ivf_semenanalysisreport_preview->TotalRecs) ?>
<?php if ($ivf_semenanalysisreport_preview->Pager->RecordCount > 0 && $ivf_semenanalysisreport_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($ivf_semenanalysisreport_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $ivf_semenanalysisreport_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($ivf_semenanalysisreport_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $ivf_semenanalysisreport_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($ivf_semenanalysisreport_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $ivf_semenanalysisreport_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($ivf_semenanalysisreport_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $ivf_semenanalysisreport_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $ivf_semenanalysisreport_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $ivf_semenanalysisreport_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $ivf_semenanalysisreport_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($ivf_semenanalysisreport_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$ivf_semenanalysisreport_preview->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php
if ($ivf_semenanalysisreport_preview->Recordset)
	$ivf_semenanalysisreport_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$ivf_semenanalysisreport_preview->terminate();
?>
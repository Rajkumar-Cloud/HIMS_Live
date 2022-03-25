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
<?php if ($ivf_semenanalysisreport_preview->TotalRecords > 0) { ?>
<div class="card ew-grid ivf_semenanalysisreport"><!-- .card -->
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel ew-preview-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$ivf_semenanalysisreport_preview->renderListOptions();

// Render list options (header, left)
$ivf_semenanalysisreport_preview->ListOptions->render("header", "left");
?>
<?php if ($ivf_semenanalysisreport_preview->id->Visible) { // id ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->id) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->id->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->id->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->id->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->id->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->RIDNo->Visible) { // RIDNo ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->RIDNo) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->RIDNo->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->RIDNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->RIDNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->RIDNo->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->RIDNo->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->RIDNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->RIDNo->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->PatientName->Visible) { // PatientName ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->PatientName) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->PatientName->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->PatientName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->PatientName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->PatientName->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->PatientName->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->PatientName->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->PatientName->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->HusbandName->Visible) { // HusbandName ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->HusbandName) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->HusbandName->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->HusbandName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->HusbandName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->HusbandName->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->HusbandName->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->HusbandName->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->HusbandName->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->RequestDr->Visible) { // RequestDr ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->RequestDr) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->RequestDr->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->RequestDr->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->RequestDr->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->RequestDr->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->RequestDr->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->RequestDr->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->RequestDr->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->CollectionDate->Visible) { // CollectionDate ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->CollectionDate) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->CollectionDate->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->CollectionDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->CollectionDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->CollectionDate->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->CollectionDate->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->CollectionDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->CollectionDate->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->ResultDate->Visible) { // ResultDate ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->ResultDate) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->ResultDate->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->ResultDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->ResultDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->ResultDate->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->ResultDate->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->ResultDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->ResultDate->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->RequestSample->Visible) { // RequestSample ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->RequestSample) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->RequestSample->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->RequestSample->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->RequestSample->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->RequestSample->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->RequestSample->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->RequestSample->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->RequestSample->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->CollectionType->Visible) { // CollectionType ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->CollectionType) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->CollectionType->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->CollectionType->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->CollectionType->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->CollectionType->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->CollectionType->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->CollectionType->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->CollectionType->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->CollectionMethod->Visible) { // CollectionMethod ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->CollectionMethod) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->CollectionMethod->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->CollectionMethod->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->CollectionMethod->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->CollectionMethod->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->CollectionMethod->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->CollectionMethod->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->CollectionMethod->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Medicationused->Visible) { // Medicationused ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->Medicationused) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Medicationused->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->Medicationused->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Medicationused->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->Medicationused->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Medicationused->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->Medicationused->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Medicationused->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->DifficultiesinCollection->Visible) { // DifficultiesinCollection ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->DifficultiesinCollection) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->DifficultiesinCollection->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->DifficultiesinCollection->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->DifficultiesinCollection->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->DifficultiesinCollection->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->DifficultiesinCollection->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->DifficultiesinCollection->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->DifficultiesinCollection->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->pH->Visible) { // pH ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->pH) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->pH->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->pH->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->pH->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->pH->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->pH->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->pH->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->pH->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Timeofcollection->Visible) { // Timeofcollection ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->Timeofcollection) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Timeofcollection->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->Timeofcollection->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Timeofcollection->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->Timeofcollection->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Timeofcollection->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->Timeofcollection->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Timeofcollection->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Timeofexamination->Visible) { // Timeofexamination ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->Timeofexamination) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Timeofexamination->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->Timeofexamination->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Timeofexamination->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->Timeofexamination->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Timeofexamination->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->Timeofexamination->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Timeofexamination->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Volume->Visible) { // Volume ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->Volume) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Volume->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->Volume->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Volume->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->Volume->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Volume->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->Volume->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Volume->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Concentration->Visible) { // Concentration ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->Concentration) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Concentration->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->Concentration->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Concentration->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->Concentration->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Concentration->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->Concentration->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Concentration->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Total->Visible) { // Total ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->Total) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Total->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->Total->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Total->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->Total->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Total->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->Total->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Total->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->ProgressiveMotility->Visible) { // ProgressiveMotility ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->ProgressiveMotility) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->ProgressiveMotility->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->ProgressiveMotility->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->ProgressiveMotility->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->ProgressiveMotility->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->ProgressiveMotility->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->ProgressiveMotility->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->ProgressiveMotility->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->NonProgrssiveMotile->Visible) { // NonProgrssiveMotile ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->NonProgrssiveMotile) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->NonProgrssiveMotile->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->NonProgrssiveMotile->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->NonProgrssiveMotile->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->NonProgrssiveMotile->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->NonProgrssiveMotile->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->NonProgrssiveMotile->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->NonProgrssiveMotile->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Immotile->Visible) { // Immotile ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->Immotile) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Immotile->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->Immotile->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Immotile->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->Immotile->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Immotile->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->Immotile->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Immotile->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->TotalProgrssiveMotile->Visible) { // TotalProgrssiveMotile ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->TotalProgrssiveMotile) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->TotalProgrssiveMotile->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->TotalProgrssiveMotile->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->TotalProgrssiveMotile->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->TotalProgrssiveMotile->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->TotalProgrssiveMotile->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->TotalProgrssiveMotile->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->TotalProgrssiveMotile->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Appearance->Visible) { // Appearance ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->Appearance) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Appearance->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->Appearance->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Appearance->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->Appearance->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Appearance->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->Appearance->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Appearance->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Homogenosity->Visible) { // Homogenosity ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->Homogenosity) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Homogenosity->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->Homogenosity->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Homogenosity->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->Homogenosity->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Homogenosity->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->Homogenosity->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Homogenosity->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->CompleteSample->Visible) { // CompleteSample ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->CompleteSample) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->CompleteSample->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->CompleteSample->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->CompleteSample->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->CompleteSample->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->CompleteSample->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->CompleteSample->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->CompleteSample->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Liquefactiontime->Visible) { // Liquefactiontime ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->Liquefactiontime) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Liquefactiontime->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->Liquefactiontime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Liquefactiontime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->Liquefactiontime->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Liquefactiontime->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->Liquefactiontime->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Liquefactiontime->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Normal->Visible) { // Normal ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->Normal) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Normal->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->Normal->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Normal->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->Normal->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Normal->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->Normal->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Normal->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Abnormal->Visible) { // Abnormal ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->Abnormal) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Abnormal->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->Abnormal->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Abnormal->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->Abnormal->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Abnormal->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->Abnormal->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Abnormal->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Headdefects->Visible) { // Headdefects ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->Headdefects) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Headdefects->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->Headdefects->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Headdefects->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->Headdefects->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Headdefects->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->Headdefects->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Headdefects->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->MidpieceDefects->Visible) { // MidpieceDefects ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->MidpieceDefects) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->MidpieceDefects->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->MidpieceDefects->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->MidpieceDefects->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->MidpieceDefects->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->MidpieceDefects->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->MidpieceDefects->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->MidpieceDefects->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->TailDefects->Visible) { // TailDefects ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->TailDefects) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->TailDefects->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->TailDefects->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->TailDefects->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->TailDefects->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->TailDefects->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->TailDefects->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->TailDefects->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->NormalProgMotile->Visible) { // NormalProgMotile ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->NormalProgMotile) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->NormalProgMotile->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->NormalProgMotile->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->NormalProgMotile->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->NormalProgMotile->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->NormalProgMotile->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->NormalProgMotile->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->NormalProgMotile->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->ImmatureForms->Visible) { // ImmatureForms ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->ImmatureForms) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->ImmatureForms->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->ImmatureForms->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->ImmatureForms->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->ImmatureForms->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->ImmatureForms->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->ImmatureForms->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->ImmatureForms->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Leucocytes->Visible) { // Leucocytes ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->Leucocytes) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Leucocytes->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->Leucocytes->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Leucocytes->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->Leucocytes->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Leucocytes->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->Leucocytes->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Leucocytes->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Agglutination->Visible) { // Agglutination ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->Agglutination) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Agglutination->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->Agglutination->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Agglutination->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->Agglutination->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Agglutination->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->Agglutination->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Agglutination->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Debris->Visible) { // Debris ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->Debris) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Debris->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->Debris->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Debris->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->Debris->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Debris->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->Debris->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Debris->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Diagnosis->Visible) { // Diagnosis ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->Diagnosis) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Diagnosis->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->Diagnosis->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Diagnosis->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->Diagnosis->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Diagnosis->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->Diagnosis->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Diagnosis->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Observations->Visible) { // Observations ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->Observations) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Observations->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->Observations->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Observations->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->Observations->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Observations->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->Observations->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Observations->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Signature->Visible) { // Signature ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->Signature) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Signature->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->Signature->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Signature->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->Signature->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Signature->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->Signature->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Signature->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->SemenOrgin->Visible) { // SemenOrgin ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->SemenOrgin) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->SemenOrgin->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->SemenOrgin->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->SemenOrgin->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->SemenOrgin->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->SemenOrgin->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->SemenOrgin->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->SemenOrgin->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Donor->Visible) { // Donor ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->Donor) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Donor->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->Donor->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Donor->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->Donor->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Donor->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->Donor->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Donor->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->DonorBloodgroup->Visible) { // DonorBloodgroup ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->DonorBloodgroup) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->DonorBloodgroup->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->DonorBloodgroup->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->DonorBloodgroup->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->DonorBloodgroup->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->DonorBloodgroup->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->DonorBloodgroup->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->DonorBloodgroup->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Tank->Visible) { // Tank ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->Tank) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Tank->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->Tank->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Tank->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->Tank->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Tank->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->Tank->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Tank->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Location->Visible) { // Location ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->Location) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Location->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->Location->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Location->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->Location->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Location->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->Location->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Location->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Volume1->Visible) { // Volume1 ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->Volume1) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Volume1->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->Volume1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Volume1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->Volume1->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Volume1->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->Volume1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Volume1->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Concentration1->Visible) { // Concentration1 ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->Concentration1) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Concentration1->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->Concentration1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Concentration1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->Concentration1->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Concentration1->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->Concentration1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Concentration1->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Total1->Visible) { // Total1 ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->Total1) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Total1->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->Total1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Total1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->Total1->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Total1->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->Total1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Total1->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->ProgressiveMotility1->Visible) { // ProgressiveMotility1 ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->ProgressiveMotility1) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->ProgressiveMotility1->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->ProgressiveMotility1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->ProgressiveMotility1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->ProgressiveMotility1->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->ProgressiveMotility1->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->ProgressiveMotility1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->ProgressiveMotility1->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->NonProgrssiveMotile1->Visible) { // NonProgrssiveMotile1 ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->NonProgrssiveMotile1) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->NonProgrssiveMotile1->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->NonProgrssiveMotile1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->NonProgrssiveMotile1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->NonProgrssiveMotile1->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->NonProgrssiveMotile1->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->NonProgrssiveMotile1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->NonProgrssiveMotile1->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Immotile1->Visible) { // Immotile1 ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->Immotile1) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Immotile1->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->Immotile1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Immotile1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->Immotile1->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Immotile1->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->Immotile1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Immotile1->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->TotalProgrssiveMotile1->Visible) { // TotalProgrssiveMotile1 ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->TotalProgrssiveMotile1) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->TotalProgrssiveMotile1->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->TotalProgrssiveMotile1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->TotalProgrssiveMotile1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->TotalProgrssiveMotile1->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->TotalProgrssiveMotile1->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->TotalProgrssiveMotile1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->TotalProgrssiveMotile1->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->TidNo->Visible) { // TidNo ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->TidNo) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->TidNo->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->TidNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->TidNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->TidNo->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->TidNo->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->TidNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->TidNo->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Color->Visible) { // Color ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->Color) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Color->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->Color->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Color->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->Color->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Color->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->Color->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Color->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->DoneBy->Visible) { // DoneBy ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->DoneBy) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->DoneBy->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->DoneBy->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->DoneBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->DoneBy->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->DoneBy->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->DoneBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->DoneBy->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Method->Visible) { // Method ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->Method) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Method->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->Method->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Method->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->Method->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Method->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->Method->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Method->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Abstinence->Visible) { // Abstinence ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->Abstinence) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Abstinence->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->Abstinence->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Abstinence->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->Abstinence->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Abstinence->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->Abstinence->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Abstinence->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->ProcessedBy->Visible) { // ProcessedBy ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->ProcessedBy) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->ProcessedBy->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->ProcessedBy->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->ProcessedBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->ProcessedBy->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->ProcessedBy->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->ProcessedBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->ProcessedBy->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->InseminationTime->Visible) { // InseminationTime ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->InseminationTime) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->InseminationTime->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->InseminationTime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->InseminationTime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->InseminationTime->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->InseminationTime->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->InseminationTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->InseminationTime->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->InseminationBy->Visible) { // InseminationBy ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->InseminationBy) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->InseminationBy->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->InseminationBy->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->InseminationBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->InseminationBy->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->InseminationBy->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->InseminationBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->InseminationBy->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Big->Visible) { // Big ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->Big) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Big->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->Big->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Big->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->Big->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Big->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->Big->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Big->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Medium->Visible) { // Medium ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->Medium) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Medium->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->Medium->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Medium->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->Medium->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Medium->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->Medium->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Medium->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Small->Visible) { // Small ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->Small) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Small->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->Small->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Small->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->Small->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Small->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->Small->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Small->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->NoHalo->Visible) { // NoHalo ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->NoHalo) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->NoHalo->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->NoHalo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->NoHalo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->NoHalo->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->NoHalo->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->NoHalo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->NoHalo->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Fragmented->Visible) { // Fragmented ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->Fragmented) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Fragmented->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->Fragmented->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Fragmented->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->Fragmented->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Fragmented->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->Fragmented->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Fragmented->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->NonFragmented->Visible) { // NonFragmented ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->NonFragmented) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->NonFragmented->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->NonFragmented->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->NonFragmented->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->NonFragmented->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->NonFragmented->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->NonFragmented->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->NonFragmented->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->DFI->Visible) { // DFI ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->DFI) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->DFI->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->DFI->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->DFI->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->DFI->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->DFI->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->DFI->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->DFI->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->IsueBy->Visible) { // IsueBy ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->IsueBy) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->IsueBy->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->IsueBy->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->IsueBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->IsueBy->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->IsueBy->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->IsueBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->IsueBy->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Volume2->Visible) { // Volume2 ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->Volume2) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Volume2->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->Volume2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Volume2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->Volume2->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Volume2->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->Volume2->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Volume2->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Concentration2->Visible) { // Concentration2 ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->Concentration2) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Concentration2->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->Concentration2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Concentration2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->Concentration2->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Concentration2->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->Concentration2->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Concentration2->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Total2->Visible) { // Total2 ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->Total2) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Total2->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->Total2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Total2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->Total2->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Total2->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->Total2->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Total2->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->ProgressiveMotility2->Visible) { // ProgressiveMotility2 ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->ProgressiveMotility2) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->ProgressiveMotility2->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->ProgressiveMotility2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->ProgressiveMotility2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->ProgressiveMotility2->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->ProgressiveMotility2->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->ProgressiveMotility2->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->ProgressiveMotility2->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->NonProgrssiveMotile2->Visible) { // NonProgrssiveMotile2 ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->NonProgrssiveMotile2) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->NonProgrssiveMotile2->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->NonProgrssiveMotile2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->NonProgrssiveMotile2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->NonProgrssiveMotile2->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->NonProgrssiveMotile2->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->NonProgrssiveMotile2->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->NonProgrssiveMotile2->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Immotile2->Visible) { // Immotile2 ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->Immotile2) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Immotile2->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->Immotile2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->Immotile2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->Immotile2->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Immotile2->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->Immotile2->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->Immotile2->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->TotalProgrssiveMotile2->Visible) { // TotalProgrssiveMotile2 ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->TotalProgrssiveMotile2) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->TotalProgrssiveMotile2->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->TotalProgrssiveMotile2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->TotalProgrssiveMotile2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->TotalProgrssiveMotile2->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->TotalProgrssiveMotile2->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->TotalProgrssiveMotile2->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->TotalProgrssiveMotile2->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->IssuedBy->Visible) { // IssuedBy ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->IssuedBy) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->IssuedBy->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->IssuedBy->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->IssuedBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->IssuedBy->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->IssuedBy->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->IssuedBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->IssuedBy->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->IssuedTo->Visible) { // IssuedTo ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->IssuedTo) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->IssuedTo->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->IssuedTo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->IssuedTo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->IssuedTo->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->IssuedTo->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->IssuedTo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->IssuedTo->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->PaID->Visible) { // PaID ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->PaID) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->PaID->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->PaID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->PaID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->PaID->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->PaID->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->PaID->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->PaID->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->PaName->Visible) { // PaName ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->PaName) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->PaName->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->PaName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->PaName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->PaName->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->PaName->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->PaName->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->PaName->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->PaMobile->Visible) { // PaMobile ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->PaMobile) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->PaMobile->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->PaMobile->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->PaMobile->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->PaMobile->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->PaMobile->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->PaMobile->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->PaMobile->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->PartnerID->Visible) { // PartnerID ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->PartnerID) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->PartnerID->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->PartnerID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->PartnerID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->PartnerID->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->PartnerID->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->PartnerID->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->PartnerID->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->PartnerName->Visible) { // PartnerName ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->PartnerName) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->PartnerName->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->PartnerName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->PartnerName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->PartnerName->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->PartnerName->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->PartnerName->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->PartnerName->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->PartnerMobile->Visible) { // PartnerMobile ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->PartnerMobile) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->PartnerMobile->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->PartnerMobile->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->PartnerMobile->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->PartnerMobile->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->PartnerMobile->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->PartnerMobile->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->PartnerMobile->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->PREG_TEST_DATE->Visible) { // PREG_TEST_DATE ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->PREG_TEST_DATE) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->PREG_TEST_DATE->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->PREG_TEST_DATE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->PREG_TEST_DATE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->PREG_TEST_DATE->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->PREG_TEST_DATE->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->PREG_TEST_DATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->PREG_TEST_DATE->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->SPECIFIC_PROBLEMS->Visible) { // SPECIFIC_PROBLEMS ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->SPECIFIC_PROBLEMS) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->SPECIFIC_PROBLEMS->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->SPECIFIC_PROBLEMS->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->SPECIFIC_PROBLEMS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->SPECIFIC_PROBLEMS->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->SPECIFIC_PROBLEMS->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->SPECIFIC_PROBLEMS->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->SPECIFIC_PROBLEMS->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->IMSC_1->Visible) { // IMSC_1 ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->IMSC_1) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->IMSC_1->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->IMSC_1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->IMSC_1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->IMSC_1->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->IMSC_1->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->IMSC_1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->IMSC_1->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->IMSC_2->Visible) { // IMSC_2 ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->IMSC_2) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->IMSC_2->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->IMSC_2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->IMSC_2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->IMSC_2->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->IMSC_2->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->IMSC_2->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->IMSC_2->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->LIQUIFACTION_STORAGE->Visible) { // LIQUIFACTION_STORAGE ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->LIQUIFACTION_STORAGE) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->LIQUIFACTION_STORAGE->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->LIQUIFACTION_STORAGE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->LIQUIFACTION_STORAGE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->LIQUIFACTION_STORAGE->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->LIQUIFACTION_STORAGE->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->LIQUIFACTION_STORAGE->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->LIQUIFACTION_STORAGE->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->IUI_PREP_METHOD->Visible) { // IUI_PREP_METHOD ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->IUI_PREP_METHOD) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->IUI_PREP_METHOD->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->IUI_PREP_METHOD->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->IUI_PREP_METHOD->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->IUI_PREP_METHOD->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->IUI_PREP_METHOD->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->IUI_PREP_METHOD->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->IUI_PREP_METHOD->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->TIME_FROM_TRIGGER->Visible) { // TIME_FROM_TRIGGER ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->TIME_FROM_TRIGGER) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->TIME_FROM_TRIGGER->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->TIME_FROM_TRIGGER->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->TIME_FROM_TRIGGER->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->TIME_FROM_TRIGGER->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->TIME_FROM_TRIGGER->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->TIME_FROM_TRIGGER->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->TIME_FROM_TRIGGER->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->COLLECTION_TO_PREPARATION->Visible) { // COLLECTION_TO_PREPARATION ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->COLLECTION_TO_PREPARATION) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->COLLECTION_TO_PREPARATION->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->COLLECTION_TO_PREPARATION->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->COLLECTION_TO_PREPARATION->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->COLLECTION_TO_PREPARATION->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->COLLECTION_TO_PREPARATION->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->COLLECTION_TO_PREPARATION->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->COLLECTION_TO_PREPARATION->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->TIME_FROM_PREP_TO_INSEM->Visible) { // TIME_FROM_PREP_TO_INSEM ?>
	<?php if ($ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport_preview->TIME_FROM_PREP_TO_INSEM) == "") { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->TIME_FROM_PREP_TO_INSEM->headerCellClass() ?>"><?php echo $ivf_semenanalysisreport_preview->TIME_FROM_PREP_TO_INSEM->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $ivf_semenanalysisreport_preview->TIME_FROM_PREP_TO_INSEM->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($ivf_semenanalysisreport_preview->TIME_FROM_PREP_TO_INSEM->Name) ?>" data-sort-order="<?php echo $ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->TIME_FROM_PREP_TO_INSEM->Name && $ivf_semenanalysisreport_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_preview->TIME_FROM_PREP_TO_INSEM->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_preview->SortField == $ivf_semenanalysisreport_preview->TIME_FROM_PREP_TO_INSEM->Name) { ?><?php if ($ivf_semenanalysisreport_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
$ivf_semenanalysisreport_preview->RowCount = 0;
while ($ivf_semenanalysisreport_preview->Recordset && !$ivf_semenanalysisreport_preview->Recordset->EOF) {

	// Init row class and style
	$ivf_semenanalysisreport_preview->RecCount++;
	$ivf_semenanalysisreport_preview->RowCount++;
	$ivf_semenanalysisreport_preview->CssStyle = "";
	$ivf_semenanalysisreport_preview->loadListRowValues($ivf_semenanalysisreport_preview->Recordset);

	// Render row
	$ivf_semenanalysisreport->RowType = ROWTYPE_PREVIEW; // Preview record
	$ivf_semenanalysisreport_preview->resetAttributes();
	$ivf_semenanalysisreport_preview->renderListRow();

	// Render list options
	$ivf_semenanalysisreport_preview->renderListOptions();
?>
	<tr <?php echo $ivf_semenanalysisreport->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_semenanalysisreport_preview->ListOptions->render("body", "left", $ivf_semenanalysisreport_preview->RowCount);
?>
<?php if ($ivf_semenanalysisreport_preview->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $ivf_semenanalysisreport_preview->id->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->id->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->RIDNo->Visible) { // RIDNo ?>
		<!-- RIDNo -->
		<td<?php echo $ivf_semenanalysisreport_preview->RIDNo->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->RIDNo->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->RIDNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->PatientName->Visible) { // PatientName ?>
		<!-- PatientName -->
		<td<?php echo $ivf_semenanalysisreport_preview->PatientName->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->PatientName->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->PatientName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->HusbandName->Visible) { // HusbandName ?>
		<!-- HusbandName -->
		<td<?php echo $ivf_semenanalysisreport_preview->HusbandName->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->HusbandName->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->HusbandName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->RequestDr->Visible) { // RequestDr ?>
		<!-- RequestDr -->
		<td<?php echo $ivf_semenanalysisreport_preview->RequestDr->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->RequestDr->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->RequestDr->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->CollectionDate->Visible) { // CollectionDate ?>
		<!-- CollectionDate -->
		<td<?php echo $ivf_semenanalysisreport_preview->CollectionDate->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->CollectionDate->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->CollectionDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->ResultDate->Visible) { // ResultDate ?>
		<!-- ResultDate -->
		<td<?php echo $ivf_semenanalysisreport_preview->ResultDate->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->ResultDate->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->ResultDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->RequestSample->Visible) { // RequestSample ?>
		<!-- RequestSample -->
		<td<?php echo $ivf_semenanalysisreport_preview->RequestSample->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->RequestSample->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->RequestSample->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->CollectionType->Visible) { // CollectionType ?>
		<!-- CollectionType -->
		<td<?php echo $ivf_semenanalysisreport_preview->CollectionType->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->CollectionType->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->CollectionType->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->CollectionMethod->Visible) { // CollectionMethod ?>
		<!-- CollectionMethod -->
		<td<?php echo $ivf_semenanalysisreport_preview->CollectionMethod->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->CollectionMethod->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->CollectionMethod->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Medicationused->Visible) { // Medicationused ?>
		<!-- Medicationused -->
		<td<?php echo $ivf_semenanalysisreport_preview->Medicationused->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->Medicationused->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->Medicationused->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->DifficultiesinCollection->Visible) { // DifficultiesinCollection ?>
		<!-- DifficultiesinCollection -->
		<td<?php echo $ivf_semenanalysisreport_preview->DifficultiesinCollection->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->DifficultiesinCollection->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->DifficultiesinCollection->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->pH->Visible) { // pH ?>
		<!-- pH -->
		<td<?php echo $ivf_semenanalysisreport_preview->pH->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->pH->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->pH->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Timeofcollection->Visible) { // Timeofcollection ?>
		<!-- Timeofcollection -->
		<td<?php echo $ivf_semenanalysisreport_preview->Timeofcollection->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->Timeofcollection->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->Timeofcollection->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Timeofexamination->Visible) { // Timeofexamination ?>
		<!-- Timeofexamination -->
		<td<?php echo $ivf_semenanalysisreport_preview->Timeofexamination->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->Timeofexamination->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->Timeofexamination->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Volume->Visible) { // Volume ?>
		<!-- Volume -->
		<td<?php echo $ivf_semenanalysisreport_preview->Volume->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->Volume->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->Volume->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Concentration->Visible) { // Concentration ?>
		<!-- Concentration -->
		<td<?php echo $ivf_semenanalysisreport_preview->Concentration->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->Concentration->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->Concentration->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Total->Visible) { // Total ?>
		<!-- Total -->
		<td<?php echo $ivf_semenanalysisreport_preview->Total->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->Total->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->Total->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->ProgressiveMotility->Visible) { // ProgressiveMotility ?>
		<!-- ProgressiveMotility -->
		<td<?php echo $ivf_semenanalysisreport_preview->ProgressiveMotility->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->ProgressiveMotility->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->ProgressiveMotility->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->NonProgrssiveMotile->Visible) { // NonProgrssiveMotile ?>
		<!-- NonProgrssiveMotile -->
		<td<?php echo $ivf_semenanalysisreport_preview->NonProgrssiveMotile->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->NonProgrssiveMotile->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->NonProgrssiveMotile->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Immotile->Visible) { // Immotile ?>
		<!-- Immotile -->
		<td<?php echo $ivf_semenanalysisreport_preview->Immotile->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->Immotile->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->Immotile->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->TotalProgrssiveMotile->Visible) { // TotalProgrssiveMotile ?>
		<!-- TotalProgrssiveMotile -->
		<td<?php echo $ivf_semenanalysisreport_preview->TotalProgrssiveMotile->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->TotalProgrssiveMotile->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->TotalProgrssiveMotile->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Appearance->Visible) { // Appearance ?>
		<!-- Appearance -->
		<td<?php echo $ivf_semenanalysisreport_preview->Appearance->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->Appearance->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->Appearance->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Homogenosity->Visible) { // Homogenosity ?>
		<!-- Homogenosity -->
		<td<?php echo $ivf_semenanalysisreport_preview->Homogenosity->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->Homogenosity->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->Homogenosity->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->CompleteSample->Visible) { // CompleteSample ?>
		<!-- CompleteSample -->
		<td<?php echo $ivf_semenanalysisreport_preview->CompleteSample->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->CompleteSample->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->CompleteSample->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Liquefactiontime->Visible) { // Liquefactiontime ?>
		<!-- Liquefactiontime -->
		<td<?php echo $ivf_semenanalysisreport_preview->Liquefactiontime->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->Liquefactiontime->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->Liquefactiontime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Normal->Visible) { // Normal ?>
		<!-- Normal -->
		<td<?php echo $ivf_semenanalysisreport_preview->Normal->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->Normal->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->Normal->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Abnormal->Visible) { // Abnormal ?>
		<!-- Abnormal -->
		<td<?php echo $ivf_semenanalysisreport_preview->Abnormal->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->Abnormal->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->Abnormal->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Headdefects->Visible) { // Headdefects ?>
		<!-- Headdefects -->
		<td<?php echo $ivf_semenanalysisreport_preview->Headdefects->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->Headdefects->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->Headdefects->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->MidpieceDefects->Visible) { // MidpieceDefects ?>
		<!-- MidpieceDefects -->
		<td<?php echo $ivf_semenanalysisreport_preview->MidpieceDefects->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->MidpieceDefects->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->MidpieceDefects->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->TailDefects->Visible) { // TailDefects ?>
		<!-- TailDefects -->
		<td<?php echo $ivf_semenanalysisreport_preview->TailDefects->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->TailDefects->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->TailDefects->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->NormalProgMotile->Visible) { // NormalProgMotile ?>
		<!-- NormalProgMotile -->
		<td<?php echo $ivf_semenanalysisreport_preview->NormalProgMotile->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->NormalProgMotile->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->NormalProgMotile->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->ImmatureForms->Visible) { // ImmatureForms ?>
		<!-- ImmatureForms -->
		<td<?php echo $ivf_semenanalysisreport_preview->ImmatureForms->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->ImmatureForms->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->ImmatureForms->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Leucocytes->Visible) { // Leucocytes ?>
		<!-- Leucocytes -->
		<td<?php echo $ivf_semenanalysisreport_preview->Leucocytes->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->Leucocytes->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->Leucocytes->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Agglutination->Visible) { // Agglutination ?>
		<!-- Agglutination -->
		<td<?php echo $ivf_semenanalysisreport_preview->Agglutination->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->Agglutination->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->Agglutination->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Debris->Visible) { // Debris ?>
		<!-- Debris -->
		<td<?php echo $ivf_semenanalysisreport_preview->Debris->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->Debris->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->Debris->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Diagnosis->Visible) { // Diagnosis ?>
		<!-- Diagnosis -->
		<td<?php echo $ivf_semenanalysisreport_preview->Diagnosis->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->Diagnosis->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->Diagnosis->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Observations->Visible) { // Observations ?>
		<!-- Observations -->
		<td<?php echo $ivf_semenanalysisreport_preview->Observations->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->Observations->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->Observations->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Signature->Visible) { // Signature ?>
		<!-- Signature -->
		<td<?php echo $ivf_semenanalysisreport_preview->Signature->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->Signature->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->Signature->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->SemenOrgin->Visible) { // SemenOrgin ?>
		<!-- SemenOrgin -->
		<td<?php echo $ivf_semenanalysisreport_preview->SemenOrgin->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->SemenOrgin->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->SemenOrgin->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Donor->Visible) { // Donor ?>
		<!-- Donor -->
		<td<?php echo $ivf_semenanalysisreport_preview->Donor->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->Donor->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->Donor->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->DonorBloodgroup->Visible) { // DonorBloodgroup ?>
		<!-- DonorBloodgroup -->
		<td<?php echo $ivf_semenanalysisreport_preview->DonorBloodgroup->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->DonorBloodgroup->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->DonorBloodgroup->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Tank->Visible) { // Tank ?>
		<!-- Tank -->
		<td<?php echo $ivf_semenanalysisreport_preview->Tank->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->Tank->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->Tank->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Location->Visible) { // Location ?>
		<!-- Location -->
		<td<?php echo $ivf_semenanalysisreport_preview->Location->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->Location->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->Location->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Volume1->Visible) { // Volume1 ?>
		<!-- Volume1 -->
		<td<?php echo $ivf_semenanalysisreport_preview->Volume1->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->Volume1->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->Volume1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Concentration1->Visible) { // Concentration1 ?>
		<!-- Concentration1 -->
		<td<?php echo $ivf_semenanalysisreport_preview->Concentration1->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->Concentration1->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->Concentration1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Total1->Visible) { // Total1 ?>
		<!-- Total1 -->
		<td<?php echo $ivf_semenanalysisreport_preview->Total1->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->Total1->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->Total1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->ProgressiveMotility1->Visible) { // ProgressiveMotility1 ?>
		<!-- ProgressiveMotility1 -->
		<td<?php echo $ivf_semenanalysisreport_preview->ProgressiveMotility1->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->ProgressiveMotility1->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->ProgressiveMotility1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->NonProgrssiveMotile1->Visible) { // NonProgrssiveMotile1 ?>
		<!-- NonProgrssiveMotile1 -->
		<td<?php echo $ivf_semenanalysisreport_preview->NonProgrssiveMotile1->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->NonProgrssiveMotile1->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->NonProgrssiveMotile1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Immotile1->Visible) { // Immotile1 ?>
		<!-- Immotile1 -->
		<td<?php echo $ivf_semenanalysisreport_preview->Immotile1->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->Immotile1->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->Immotile1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->TotalProgrssiveMotile1->Visible) { // TotalProgrssiveMotile1 ?>
		<!-- TotalProgrssiveMotile1 -->
		<td<?php echo $ivf_semenanalysisreport_preview->TotalProgrssiveMotile1->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->TotalProgrssiveMotile1->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->TotalProgrssiveMotile1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->TidNo->Visible) { // TidNo ?>
		<!-- TidNo -->
		<td<?php echo $ivf_semenanalysisreport_preview->TidNo->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->TidNo->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->TidNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Color->Visible) { // Color ?>
		<!-- Color -->
		<td<?php echo $ivf_semenanalysisreport_preview->Color->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->Color->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->Color->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->DoneBy->Visible) { // DoneBy ?>
		<!-- DoneBy -->
		<td<?php echo $ivf_semenanalysisreport_preview->DoneBy->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->DoneBy->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->DoneBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Method->Visible) { // Method ?>
		<!-- Method -->
		<td<?php echo $ivf_semenanalysisreport_preview->Method->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->Method->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->Method->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Abstinence->Visible) { // Abstinence ?>
		<!-- Abstinence -->
		<td<?php echo $ivf_semenanalysisreport_preview->Abstinence->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->Abstinence->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->Abstinence->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->ProcessedBy->Visible) { // ProcessedBy ?>
		<!-- ProcessedBy -->
		<td<?php echo $ivf_semenanalysisreport_preview->ProcessedBy->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->ProcessedBy->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->ProcessedBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->InseminationTime->Visible) { // InseminationTime ?>
		<!-- InseminationTime -->
		<td<?php echo $ivf_semenanalysisreport_preview->InseminationTime->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->InseminationTime->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->InseminationTime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->InseminationBy->Visible) { // InseminationBy ?>
		<!-- InseminationBy -->
		<td<?php echo $ivf_semenanalysisreport_preview->InseminationBy->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->InseminationBy->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->InseminationBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Big->Visible) { // Big ?>
		<!-- Big -->
		<td<?php echo $ivf_semenanalysisreport_preview->Big->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->Big->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->Big->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Medium->Visible) { // Medium ?>
		<!-- Medium -->
		<td<?php echo $ivf_semenanalysisreport_preview->Medium->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->Medium->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->Medium->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Small->Visible) { // Small ?>
		<!-- Small -->
		<td<?php echo $ivf_semenanalysisreport_preview->Small->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->Small->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->Small->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->NoHalo->Visible) { // NoHalo ?>
		<!-- NoHalo -->
		<td<?php echo $ivf_semenanalysisreport_preview->NoHalo->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->NoHalo->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->NoHalo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Fragmented->Visible) { // Fragmented ?>
		<!-- Fragmented -->
		<td<?php echo $ivf_semenanalysisreport_preview->Fragmented->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->Fragmented->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->Fragmented->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->NonFragmented->Visible) { // NonFragmented ?>
		<!-- NonFragmented -->
		<td<?php echo $ivf_semenanalysisreport_preview->NonFragmented->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->NonFragmented->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->NonFragmented->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->DFI->Visible) { // DFI ?>
		<!-- DFI -->
		<td<?php echo $ivf_semenanalysisreport_preview->DFI->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->DFI->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->DFI->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->IsueBy->Visible) { // IsueBy ?>
		<!-- IsueBy -->
		<td<?php echo $ivf_semenanalysisreport_preview->IsueBy->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->IsueBy->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->IsueBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Volume2->Visible) { // Volume2 ?>
		<!-- Volume2 -->
		<td<?php echo $ivf_semenanalysisreport_preview->Volume2->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->Volume2->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->Volume2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Concentration2->Visible) { // Concentration2 ?>
		<!-- Concentration2 -->
		<td<?php echo $ivf_semenanalysisreport_preview->Concentration2->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->Concentration2->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->Concentration2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Total2->Visible) { // Total2 ?>
		<!-- Total2 -->
		<td<?php echo $ivf_semenanalysisreport_preview->Total2->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->Total2->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->Total2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->ProgressiveMotility2->Visible) { // ProgressiveMotility2 ?>
		<!-- ProgressiveMotility2 -->
		<td<?php echo $ivf_semenanalysisreport_preview->ProgressiveMotility2->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->ProgressiveMotility2->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->ProgressiveMotility2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->NonProgrssiveMotile2->Visible) { // NonProgrssiveMotile2 ?>
		<!-- NonProgrssiveMotile2 -->
		<td<?php echo $ivf_semenanalysisreport_preview->NonProgrssiveMotile2->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->NonProgrssiveMotile2->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->NonProgrssiveMotile2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->Immotile2->Visible) { // Immotile2 ?>
		<!-- Immotile2 -->
		<td<?php echo $ivf_semenanalysisreport_preview->Immotile2->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->Immotile2->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->Immotile2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->TotalProgrssiveMotile2->Visible) { // TotalProgrssiveMotile2 ?>
		<!-- TotalProgrssiveMotile2 -->
		<td<?php echo $ivf_semenanalysisreport_preview->TotalProgrssiveMotile2->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->TotalProgrssiveMotile2->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->TotalProgrssiveMotile2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->IssuedBy->Visible) { // IssuedBy ?>
		<!-- IssuedBy -->
		<td<?php echo $ivf_semenanalysisreport_preview->IssuedBy->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->IssuedBy->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->IssuedBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->IssuedTo->Visible) { // IssuedTo ?>
		<!-- IssuedTo -->
		<td<?php echo $ivf_semenanalysisreport_preview->IssuedTo->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->IssuedTo->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->IssuedTo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->PaID->Visible) { // PaID ?>
		<!-- PaID -->
		<td<?php echo $ivf_semenanalysisreport_preview->PaID->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->PaID->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->PaID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->PaName->Visible) { // PaName ?>
		<!-- PaName -->
		<td<?php echo $ivf_semenanalysisreport_preview->PaName->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->PaName->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->PaName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->PaMobile->Visible) { // PaMobile ?>
		<!-- PaMobile -->
		<td<?php echo $ivf_semenanalysisreport_preview->PaMobile->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->PaMobile->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->PaMobile->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->PartnerID->Visible) { // PartnerID ?>
		<!-- PartnerID -->
		<td<?php echo $ivf_semenanalysisreport_preview->PartnerID->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->PartnerID->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->PartnerID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->PartnerName->Visible) { // PartnerName ?>
		<!-- PartnerName -->
		<td<?php echo $ivf_semenanalysisreport_preview->PartnerName->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->PartnerName->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->PartnerName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->PartnerMobile->Visible) { // PartnerMobile ?>
		<!-- PartnerMobile -->
		<td<?php echo $ivf_semenanalysisreport_preview->PartnerMobile->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->PartnerMobile->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->PartnerMobile->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->PREG_TEST_DATE->Visible) { // PREG_TEST_DATE ?>
		<!-- PREG_TEST_DATE -->
		<td<?php echo $ivf_semenanalysisreport_preview->PREG_TEST_DATE->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->PREG_TEST_DATE->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->PREG_TEST_DATE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->SPECIFIC_PROBLEMS->Visible) { // SPECIFIC_PROBLEMS ?>
		<!-- SPECIFIC_PROBLEMS -->
		<td<?php echo $ivf_semenanalysisreport_preview->SPECIFIC_PROBLEMS->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->SPECIFIC_PROBLEMS->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->SPECIFIC_PROBLEMS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->IMSC_1->Visible) { // IMSC_1 ?>
		<!-- IMSC_1 -->
		<td<?php echo $ivf_semenanalysisreport_preview->IMSC_1->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->IMSC_1->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->IMSC_1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->IMSC_2->Visible) { // IMSC_2 ?>
		<!-- IMSC_2 -->
		<td<?php echo $ivf_semenanalysisreport_preview->IMSC_2->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->IMSC_2->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->IMSC_2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->LIQUIFACTION_STORAGE->Visible) { // LIQUIFACTION_STORAGE ?>
		<!-- LIQUIFACTION_STORAGE -->
		<td<?php echo $ivf_semenanalysisreport_preview->LIQUIFACTION_STORAGE->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->LIQUIFACTION_STORAGE->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->LIQUIFACTION_STORAGE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->IUI_PREP_METHOD->Visible) { // IUI_PREP_METHOD ?>
		<!-- IUI_PREP_METHOD -->
		<td<?php echo $ivf_semenanalysisreport_preview->IUI_PREP_METHOD->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->IUI_PREP_METHOD->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->IUI_PREP_METHOD->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->TIME_FROM_TRIGGER->Visible) { // TIME_FROM_TRIGGER ?>
		<!-- TIME_FROM_TRIGGER -->
		<td<?php echo $ivf_semenanalysisreport_preview->TIME_FROM_TRIGGER->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->TIME_FROM_TRIGGER->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->TIME_FROM_TRIGGER->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->COLLECTION_TO_PREPARATION->Visible) { // COLLECTION_TO_PREPARATION ?>
		<!-- COLLECTION_TO_PREPARATION -->
		<td<?php echo $ivf_semenanalysisreport_preview->COLLECTION_TO_PREPARATION->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->COLLECTION_TO_PREPARATION->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->COLLECTION_TO_PREPARATION->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_preview->TIME_FROM_PREP_TO_INSEM->Visible) { // TIME_FROM_PREP_TO_INSEM ?>
		<!-- TIME_FROM_PREP_TO_INSEM -->
		<td<?php echo $ivf_semenanalysisreport_preview->TIME_FROM_PREP_TO_INSEM->cellAttributes() ?>>
<span<?php echo $ivf_semenanalysisreport_preview->TIME_FROM_PREP_TO_INSEM->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_preview->TIME_FROM_PREP_TO_INSEM->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$ivf_semenanalysisreport_preview->ListOptions->render("body", "right", $ivf_semenanalysisreport_preview->RowCount);
?>
	</tr>
<?php
	$ivf_semenanalysisreport_preview->Recordset->MoveNext();
} // while
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php echo $ivf_semenanalysisreport_preview->Pager->render() ?>
<?php } else { // No record ?>
<div class="card no-border">
<div class="ew-detail-count"><?php echo $Language->phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($ivf_semenanalysisreport_preview->OtherOptions as $option)
		$option->render("body");
?>
</div>
<?php if ($ivf_semenanalysisreport_preview->TotalRecords > 0) { ?>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
<?php } ?>
</div><!-- /.card -->
<?php
$ivf_semenanalysisreport_preview->showPageFooter();
if (Config("DEBUG"))
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
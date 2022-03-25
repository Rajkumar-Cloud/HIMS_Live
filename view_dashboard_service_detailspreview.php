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
$view_dashboard_service_details_preview = new view_dashboard_service_details_preview();

// Run the page
$view_dashboard_service_details_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_dashboard_service_details_preview->Page_Render();
?>
<?php $view_dashboard_service_details_preview->showPageHeader(); ?>
<div class="card ew-grid view_dashboard_service_details"><!-- .card -->
<?php if ($view_dashboard_service_details_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$view_dashboard_service_details_preview->renderListOptions();

// Render list options (header, left)
$view_dashboard_service_details_preview->ListOptions->render("header", "left");
?>
<?php if ($view_dashboard_service_details->PatientId->Visible) { // PatientId ?>
	<?php if ($view_dashboard_service_details->SortUrl($view_dashboard_service_details->PatientId) == "") { ?>
		<th class="<?php echo $view_dashboard_service_details->PatientId->headerCellClass() ?>"><?php echo $view_dashboard_service_details->PatientId->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_service_details->PatientId->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_dashboard_service_details->PatientId->Name ?>" data-sort-order="<?php echo $view_dashboard_service_details_preview->SortField == $view_dashboard_service_details->PatientId->Name && $view_dashboard_service_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_dashboard_service_details->PatientId->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_dashboard_service_details_preview->SortField == $view_dashboard_service_details->PatientId->Name) { ?><?php if ($view_dashboard_service_details_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_dashboard_service_details_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details->PatientName->Visible) { // PatientName ?>
	<?php if ($view_dashboard_service_details->SortUrl($view_dashboard_service_details->PatientName) == "") { ?>
		<th class="<?php echo $view_dashboard_service_details->PatientName->headerCellClass() ?>"><?php echo $view_dashboard_service_details->PatientName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_service_details->PatientName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_dashboard_service_details->PatientName->Name ?>" data-sort-order="<?php echo $view_dashboard_service_details_preview->SortField == $view_dashboard_service_details->PatientName->Name && $view_dashboard_service_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_dashboard_service_details->PatientName->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_dashboard_service_details_preview->SortField == $view_dashboard_service_details->PatientName->Name) { ?><?php if ($view_dashboard_service_details_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_dashboard_service_details_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details->Services->Visible) { // Services ?>
	<?php if ($view_dashboard_service_details->SortUrl($view_dashboard_service_details->Services) == "") { ?>
		<th class="<?php echo $view_dashboard_service_details->Services->headerCellClass() ?>"><?php echo $view_dashboard_service_details->Services->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_service_details->Services->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_dashboard_service_details->Services->Name ?>" data-sort-order="<?php echo $view_dashboard_service_details_preview->SortField == $view_dashboard_service_details->Services->Name && $view_dashboard_service_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_dashboard_service_details->Services->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_dashboard_service_details_preview->SortField == $view_dashboard_service_details->Services->Name) { ?><?php if ($view_dashboard_service_details_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_dashboard_service_details_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details->amount->Visible) { // amount ?>
	<?php if ($view_dashboard_service_details->SortUrl($view_dashboard_service_details->amount) == "") { ?>
		<th class="<?php echo $view_dashboard_service_details->amount->headerCellClass() ?>"><?php echo $view_dashboard_service_details->amount->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_service_details->amount->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_dashboard_service_details->amount->Name ?>" data-sort-order="<?php echo $view_dashboard_service_details_preview->SortField == $view_dashboard_service_details->amount->Name && $view_dashboard_service_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_dashboard_service_details->amount->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_dashboard_service_details_preview->SortField == $view_dashboard_service_details->amount->Name) { ?><?php if ($view_dashboard_service_details_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_dashboard_service_details_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details->SubTotal->Visible) { // SubTotal ?>
	<?php if ($view_dashboard_service_details->SortUrl($view_dashboard_service_details->SubTotal) == "") { ?>
		<th class="<?php echo $view_dashboard_service_details->SubTotal->headerCellClass() ?>"><?php echo $view_dashboard_service_details->SubTotal->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_service_details->SubTotal->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_dashboard_service_details->SubTotal->Name ?>" data-sort-order="<?php echo $view_dashboard_service_details_preview->SortField == $view_dashboard_service_details->SubTotal->Name && $view_dashboard_service_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_dashboard_service_details->SubTotal->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_dashboard_service_details_preview->SortField == $view_dashboard_service_details->SubTotal->Name) { ?><?php if ($view_dashboard_service_details_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_dashboard_service_details_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details->createdby->Visible) { // createdby ?>
	<?php if ($view_dashboard_service_details->SortUrl($view_dashboard_service_details->createdby) == "") { ?>
		<th class="<?php echo $view_dashboard_service_details->createdby->headerCellClass() ?>"><?php echo $view_dashboard_service_details->createdby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_service_details->createdby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_dashboard_service_details->createdby->Name ?>" data-sort-order="<?php echo $view_dashboard_service_details_preview->SortField == $view_dashboard_service_details->createdby->Name && $view_dashboard_service_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_dashboard_service_details->createdby->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_dashboard_service_details_preview->SortField == $view_dashboard_service_details->createdby->Name) { ?><?php if ($view_dashboard_service_details_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_dashboard_service_details_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_dashboard_service_details->SortUrl($view_dashboard_service_details->createddatetime) == "") { ?>
		<th class="<?php echo $view_dashboard_service_details->createddatetime->headerCellClass() ?>"><?php echo $view_dashboard_service_details->createddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_service_details->createddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_dashboard_service_details->createddatetime->Name ?>" data-sort-order="<?php echo $view_dashboard_service_details_preview->SortField == $view_dashboard_service_details->createddatetime->Name && $view_dashboard_service_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_dashboard_service_details->createddatetime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_dashboard_service_details_preview->SortField == $view_dashboard_service_details->createddatetime->Name) { ?><?php if ($view_dashboard_service_details_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_dashboard_service_details_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details->createdDate->Visible) { // createdDate ?>
	<?php if ($view_dashboard_service_details->SortUrl($view_dashboard_service_details->createdDate) == "") { ?>
		<th class="<?php echo $view_dashboard_service_details->createdDate->headerCellClass() ?>"><?php echo $view_dashboard_service_details->createdDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_service_details->createdDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_dashboard_service_details->createdDate->Name ?>" data-sort-order="<?php echo $view_dashboard_service_details_preview->SortField == $view_dashboard_service_details->createdDate->Name && $view_dashboard_service_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_dashboard_service_details->createdDate->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_dashboard_service_details_preview->SortField == $view_dashboard_service_details->createdDate->Name) { ?><?php if ($view_dashboard_service_details_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_dashboard_service_details_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details->DrName->Visible) { // DrName ?>
	<?php if ($view_dashboard_service_details->SortUrl($view_dashboard_service_details->DrName) == "") { ?>
		<th class="<?php echo $view_dashboard_service_details->DrName->headerCellClass() ?>"><?php echo $view_dashboard_service_details->DrName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_service_details->DrName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_dashboard_service_details->DrName->Name ?>" data-sort-order="<?php echo $view_dashboard_service_details_preview->SortField == $view_dashboard_service_details->DrName->Name && $view_dashboard_service_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_dashboard_service_details->DrName->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_dashboard_service_details_preview->SortField == $view_dashboard_service_details->DrName->Name) { ?><?php if ($view_dashboard_service_details_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_dashboard_service_details_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details->DRDepartment->Visible) { // DRDepartment ?>
	<?php if ($view_dashboard_service_details->SortUrl($view_dashboard_service_details->DRDepartment) == "") { ?>
		<th class="<?php echo $view_dashboard_service_details->DRDepartment->headerCellClass() ?>"><?php echo $view_dashboard_service_details->DRDepartment->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_service_details->DRDepartment->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_dashboard_service_details->DRDepartment->Name ?>" data-sort-order="<?php echo $view_dashboard_service_details_preview->SortField == $view_dashboard_service_details->DRDepartment->Name && $view_dashboard_service_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_dashboard_service_details->DRDepartment->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_dashboard_service_details_preview->SortField == $view_dashboard_service_details->DRDepartment->Name) { ?><?php if ($view_dashboard_service_details_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_dashboard_service_details_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details->ItemCode->Visible) { // ItemCode ?>
	<?php if ($view_dashboard_service_details->SortUrl($view_dashboard_service_details->ItemCode) == "") { ?>
		<th class="<?php echo $view_dashboard_service_details->ItemCode->headerCellClass() ?>"><?php echo $view_dashboard_service_details->ItemCode->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_service_details->ItemCode->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_dashboard_service_details->ItemCode->Name ?>" data-sort-order="<?php echo $view_dashboard_service_details_preview->SortField == $view_dashboard_service_details->ItemCode->Name && $view_dashboard_service_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_dashboard_service_details->ItemCode->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_dashboard_service_details_preview->SortField == $view_dashboard_service_details->ItemCode->Name) { ?><?php if ($view_dashboard_service_details_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_dashboard_service_details_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details->DEptCd->Visible) { // DEptCd ?>
	<?php if ($view_dashboard_service_details->SortUrl($view_dashboard_service_details->DEptCd) == "") { ?>
		<th class="<?php echo $view_dashboard_service_details->DEptCd->headerCellClass() ?>"><?php echo $view_dashboard_service_details->DEptCd->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_service_details->DEptCd->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_dashboard_service_details->DEptCd->Name ?>" data-sort-order="<?php echo $view_dashboard_service_details_preview->SortField == $view_dashboard_service_details->DEptCd->Name && $view_dashboard_service_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_dashboard_service_details->DEptCd->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_dashboard_service_details_preview->SortField == $view_dashboard_service_details->DEptCd->Name) { ?><?php if ($view_dashboard_service_details_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_dashboard_service_details_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details->CODE->Visible) { // CODE ?>
	<?php if ($view_dashboard_service_details->SortUrl($view_dashboard_service_details->CODE) == "") { ?>
		<th class="<?php echo $view_dashboard_service_details->CODE->headerCellClass() ?>"><?php echo $view_dashboard_service_details->CODE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_service_details->CODE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_dashboard_service_details->CODE->Name ?>" data-sort-order="<?php echo $view_dashboard_service_details_preview->SortField == $view_dashboard_service_details->CODE->Name && $view_dashboard_service_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_dashboard_service_details->CODE->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_dashboard_service_details_preview->SortField == $view_dashboard_service_details->CODE->Name) { ?><?php if ($view_dashboard_service_details_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_dashboard_service_details_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details->SERVICE->Visible) { // SERVICE ?>
	<?php if ($view_dashboard_service_details->SortUrl($view_dashboard_service_details->SERVICE) == "") { ?>
		<th class="<?php echo $view_dashboard_service_details->SERVICE->headerCellClass() ?>"><?php echo $view_dashboard_service_details->SERVICE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_service_details->SERVICE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_dashboard_service_details->SERVICE->Name ?>" data-sort-order="<?php echo $view_dashboard_service_details_preview->SortField == $view_dashboard_service_details->SERVICE->Name && $view_dashboard_service_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_dashboard_service_details->SERVICE->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_dashboard_service_details_preview->SortField == $view_dashboard_service_details->SERVICE->Name) { ?><?php if ($view_dashboard_service_details_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_dashboard_service_details_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
	<?php if ($view_dashboard_service_details->SortUrl($view_dashboard_service_details->SERVICE_TYPE) == "") { ?>
		<th class="<?php echo $view_dashboard_service_details->SERVICE_TYPE->headerCellClass() ?>"><?php echo $view_dashboard_service_details->SERVICE_TYPE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_service_details->SERVICE_TYPE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_dashboard_service_details->SERVICE_TYPE->Name ?>" data-sort-order="<?php echo $view_dashboard_service_details_preview->SortField == $view_dashboard_service_details->SERVICE_TYPE->Name && $view_dashboard_service_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_dashboard_service_details->SERVICE_TYPE->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_dashboard_service_details_preview->SortField == $view_dashboard_service_details->SERVICE_TYPE->Name) { ?><?php if ($view_dashboard_service_details_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_dashboard_service_details_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details->DEPARTMENT->Visible) { // DEPARTMENT ?>
	<?php if ($view_dashboard_service_details->SortUrl($view_dashboard_service_details->DEPARTMENT) == "") { ?>
		<th class="<?php echo $view_dashboard_service_details->DEPARTMENT->headerCellClass() ?>"><?php echo $view_dashboard_service_details->DEPARTMENT->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_service_details->DEPARTMENT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_dashboard_service_details->DEPARTMENT->Name ?>" data-sort-order="<?php echo $view_dashboard_service_details_preview->SortField == $view_dashboard_service_details->DEPARTMENT->Name && $view_dashboard_service_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_dashboard_service_details->DEPARTMENT->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_dashboard_service_details_preview->SortField == $view_dashboard_service_details->DEPARTMENT->Name) { ?><?php if ($view_dashboard_service_details_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_dashboard_service_details_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details->HospID->Visible) { // HospID ?>
	<?php if ($view_dashboard_service_details->SortUrl($view_dashboard_service_details->HospID) == "") { ?>
		<th class="<?php echo $view_dashboard_service_details->HospID->headerCellClass() ?>"><?php echo $view_dashboard_service_details->HospID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_service_details->HospID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_dashboard_service_details->HospID->Name ?>" data-sort-order="<?php echo $view_dashboard_service_details_preview->SortField == $view_dashboard_service_details->HospID->Name && $view_dashboard_service_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_dashboard_service_details->HospID->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_dashboard_service_details_preview->SortField == $view_dashboard_service_details->HospID->Name) { ?><?php if ($view_dashboard_service_details_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_dashboard_service_details_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details->vid->Visible) { // vid ?>
	<?php if ($view_dashboard_service_details->SortUrl($view_dashboard_service_details->vid) == "") { ?>
		<th class="<?php echo $view_dashboard_service_details->vid->headerCellClass() ?>"><?php echo $view_dashboard_service_details->vid->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_service_details->vid->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_dashboard_service_details->vid->Name ?>" data-sort-order="<?php echo $view_dashboard_service_details_preview->SortField == $view_dashboard_service_details->vid->Name && $view_dashboard_service_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_dashboard_service_details->vid->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_dashboard_service_details_preview->SortField == $view_dashboard_service_details->vid->Name) { ?><?php if ($view_dashboard_service_details_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_dashboard_service_details_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_dashboard_service_details_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$view_dashboard_service_details_preview->RecCount = 0;
$view_dashboard_service_details_preview->RowCnt = 0;
while ($view_dashboard_service_details_preview->Recordset && !$view_dashboard_service_details_preview->Recordset->EOF) {

	// Init row class and style
	$view_dashboard_service_details_preview->RecCount++;
	$view_dashboard_service_details_preview->RowCnt++;
	$view_dashboard_service_details_preview->CssStyle = "";
	$view_dashboard_service_details_preview->loadListRowValues($view_dashboard_service_details_preview->Recordset);
	$view_dashboard_service_details_preview->aggregateListRowValues(); // Aggregate row values

	// Render row
	$view_dashboard_service_details_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$view_dashboard_service_details_preview->resetAttributes();
	$view_dashboard_service_details_preview->renderListRow();

	// Render list options
	$view_dashboard_service_details_preview->renderListOptions();
?>
	<tr<?php echo $view_dashboard_service_details_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_dashboard_service_details_preview->ListOptions->render("body", "left", $view_dashboard_service_details_preview->RowCnt);
?>
<?php if ($view_dashboard_service_details->PatientId->Visible) { // PatientId ?>
		<!-- PatientId -->
		<td<?php echo $view_dashboard_service_details->PatientId->cellAttributes() ?>>
<span<?php echo $view_dashboard_service_details->PatientId->viewAttributes() ?>>
<?php echo $view_dashboard_service_details->PatientId->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_service_details->PatientName->Visible) { // PatientName ?>
		<!-- PatientName -->
		<td<?php echo $view_dashboard_service_details->PatientName->cellAttributes() ?>>
<span<?php echo $view_dashboard_service_details->PatientName->viewAttributes() ?>>
<?php echo $view_dashboard_service_details->PatientName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_service_details->Services->Visible) { // Services ?>
		<!-- Services -->
		<td<?php echo $view_dashboard_service_details->Services->cellAttributes() ?>>
<span<?php echo $view_dashboard_service_details->Services->viewAttributes() ?>>
<?php echo $view_dashboard_service_details->Services->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_service_details->amount->Visible) { // amount ?>
		<!-- amount -->
		<td<?php echo $view_dashboard_service_details->amount->cellAttributes() ?>>
<span<?php echo $view_dashboard_service_details->amount->viewAttributes() ?>>
<?php echo $view_dashboard_service_details->amount->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_service_details->SubTotal->Visible) { // SubTotal ?>
		<!-- SubTotal -->
		<td<?php echo $view_dashboard_service_details->SubTotal->cellAttributes() ?>>
<span<?php echo $view_dashboard_service_details->SubTotal->viewAttributes() ?>>
<?php echo $view_dashboard_service_details->SubTotal->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_service_details->createdby->Visible) { // createdby ?>
		<!-- createdby -->
		<td<?php echo $view_dashboard_service_details->createdby->cellAttributes() ?>>
<span<?php echo $view_dashboard_service_details->createdby->viewAttributes() ?>>
<?php echo $view_dashboard_service_details->createdby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_service_details->createddatetime->Visible) { // createddatetime ?>
		<!-- createddatetime -->
		<td<?php echo $view_dashboard_service_details->createddatetime->cellAttributes() ?>>
<span<?php echo $view_dashboard_service_details->createddatetime->viewAttributes() ?>>
<?php echo $view_dashboard_service_details->createddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_service_details->createdDate->Visible) { // createdDate ?>
		<!-- createdDate -->
		<td<?php echo $view_dashboard_service_details->createdDate->cellAttributes() ?>>
<span<?php echo $view_dashboard_service_details->createdDate->viewAttributes() ?>>
<?php echo $view_dashboard_service_details->createdDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_service_details->DrName->Visible) { // DrName ?>
		<!-- DrName -->
		<td<?php echo $view_dashboard_service_details->DrName->cellAttributes() ?>>
<span<?php echo $view_dashboard_service_details->DrName->viewAttributes() ?>>
<?php echo $view_dashboard_service_details->DrName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_service_details->DRDepartment->Visible) { // DRDepartment ?>
		<!-- DRDepartment -->
		<td<?php echo $view_dashboard_service_details->DRDepartment->cellAttributes() ?>>
<span<?php echo $view_dashboard_service_details->DRDepartment->viewAttributes() ?>>
<?php echo $view_dashboard_service_details->DRDepartment->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_service_details->ItemCode->Visible) { // ItemCode ?>
		<!-- ItemCode -->
		<td<?php echo $view_dashboard_service_details->ItemCode->cellAttributes() ?>>
<span<?php echo $view_dashboard_service_details->ItemCode->viewAttributes() ?>>
<?php echo $view_dashboard_service_details->ItemCode->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_service_details->DEptCd->Visible) { // DEptCd ?>
		<!-- DEptCd -->
		<td<?php echo $view_dashboard_service_details->DEptCd->cellAttributes() ?>>
<span<?php echo $view_dashboard_service_details->DEptCd->viewAttributes() ?>>
<?php echo $view_dashboard_service_details->DEptCd->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_service_details->CODE->Visible) { // CODE ?>
		<!-- CODE -->
		<td<?php echo $view_dashboard_service_details->CODE->cellAttributes() ?>>
<span<?php echo $view_dashboard_service_details->CODE->viewAttributes() ?>>
<?php echo $view_dashboard_service_details->CODE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_service_details->SERVICE->Visible) { // SERVICE ?>
		<!-- SERVICE -->
		<td<?php echo $view_dashboard_service_details->SERVICE->cellAttributes() ?>>
<span<?php echo $view_dashboard_service_details->SERVICE->viewAttributes() ?>>
<?php echo $view_dashboard_service_details->SERVICE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_service_details->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
		<!-- SERVICE_TYPE -->
		<td<?php echo $view_dashboard_service_details->SERVICE_TYPE->cellAttributes() ?>>
<span<?php echo $view_dashboard_service_details->SERVICE_TYPE->viewAttributes() ?>>
<?php echo $view_dashboard_service_details->SERVICE_TYPE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_service_details->DEPARTMENT->Visible) { // DEPARTMENT ?>
		<!-- DEPARTMENT -->
		<td<?php echo $view_dashboard_service_details->DEPARTMENT->cellAttributes() ?>>
<span<?php echo $view_dashboard_service_details->DEPARTMENT->viewAttributes() ?>>
<?php echo $view_dashboard_service_details->DEPARTMENT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_service_details->HospID->Visible) { // HospID ?>
		<!-- HospID -->
		<td<?php echo $view_dashboard_service_details->HospID->cellAttributes() ?>>
<span<?php echo $view_dashboard_service_details->HospID->viewAttributes() ?>>
<?php echo $view_dashboard_service_details->HospID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_service_details->vid->Visible) { // vid ?>
		<!-- vid -->
		<td<?php echo $view_dashboard_service_details->vid->cellAttributes() ?>>
<span<?php echo $view_dashboard_service_details->vid->viewAttributes() ?>>
<?php echo $view_dashboard_service_details->vid->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$view_dashboard_service_details_preview->ListOptions->render("body", "right", $view_dashboard_service_details_preview->RowCnt);
?>
	</tr>
<?php
	$view_dashboard_service_details_preview->Recordset->MoveNext();
}
?>
	</tbody>
<?php

	// Render aggregate row
	$view_dashboard_service_details_preview->aggregateListRow(); // Prepare aggregate row

	// Render list options
	$view_dashboard_service_details_preview->renderListOptions();
?>
	<tfoot><!-- Table footer -->
	<tr class="ew-table-footer">
<?php

// Render list options (footer, left)
$view_dashboard_service_details_preview->ListOptions->render("footer", "left");
?>
<?php if ($view_dashboard_service_details->PatientId->Visible) { // PatientId ?>
		<!-- PatientId -->
		<td class="<?php echo $view_dashboard_service_details->PatientId->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_service_details->PatientName->Visible) { // PatientName ?>
		<!-- PatientName -->
		<td class="<?php echo $view_dashboard_service_details->PatientName->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_service_details->Services->Visible) { // Services ?>
		<!-- Services -->
		<td class="<?php echo $view_dashboard_service_details->Services->footerCellClass() ?>">
		<span class="ew-aggregate"><?php echo $Language->phrase("COUNT") ?></span><span class="ew-aggregate-value">
		<?php echo $view_dashboard_service_details->Services->ViewValue ?></span>
		</td>
<?php } ?>
<?php if ($view_dashboard_service_details->amount->Visible) { // amount ?>
		<!-- amount -->
		<td class="<?php echo $view_dashboard_service_details->amount->footerCellClass() ?>">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_dashboard_service_details->amount->ViewValue ?></span>
		</td>
<?php } ?>
<?php if ($view_dashboard_service_details->SubTotal->Visible) { // SubTotal ?>
		<!-- SubTotal -->
		<td class="<?php echo $view_dashboard_service_details->SubTotal->footerCellClass() ?>">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_dashboard_service_details->SubTotal->ViewValue ?></span>
		</td>
<?php } ?>
<?php if ($view_dashboard_service_details->createdby->Visible) { // createdby ?>
		<!-- createdby -->
		<td class="<?php echo $view_dashboard_service_details->createdby->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_service_details->createddatetime->Visible) { // createddatetime ?>
		<!-- createddatetime -->
		<td class="<?php echo $view_dashboard_service_details->createddatetime->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_service_details->createdDate->Visible) { // createdDate ?>
		<!-- createdDate -->
		<td class="<?php echo $view_dashboard_service_details->createdDate->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_service_details->DrName->Visible) { // DrName ?>
		<!-- DrName -->
		<td class="<?php echo $view_dashboard_service_details->DrName->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_service_details->DRDepartment->Visible) { // DRDepartment ?>
		<!-- DRDepartment -->
		<td class="<?php echo $view_dashboard_service_details->DRDepartment->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_service_details->ItemCode->Visible) { // ItemCode ?>
		<!-- ItemCode -->
		<td class="<?php echo $view_dashboard_service_details->ItemCode->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_service_details->DEptCd->Visible) { // DEptCd ?>
		<!-- DEptCd -->
		<td class="<?php echo $view_dashboard_service_details->DEptCd->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_service_details->CODE->Visible) { // CODE ?>
		<!-- CODE -->
		<td class="<?php echo $view_dashboard_service_details->CODE->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_service_details->SERVICE->Visible) { // SERVICE ?>
		<!-- SERVICE -->
		<td class="<?php echo $view_dashboard_service_details->SERVICE->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_service_details->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
		<!-- SERVICE_TYPE -->
		<td class="<?php echo $view_dashboard_service_details->SERVICE_TYPE->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_service_details->DEPARTMENT->Visible) { // DEPARTMENT ?>
		<!-- DEPARTMENT -->
		<td class="<?php echo $view_dashboard_service_details->DEPARTMENT->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_service_details->HospID->Visible) { // HospID ?>
		<!-- HospID -->
		<td class="<?php echo $view_dashboard_service_details->HospID->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_service_details->vid->Visible) { // vid ?>
		<!-- vid -->
		<td class="<?php echo $view_dashboard_service_details->vid->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php

// Render list options (footer, right)
$view_dashboard_service_details_preview->ListOptions->render("footer", "right");
?>
	</tr>
	</tfoot>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($view_dashboard_service_details_preview->TotalRecs > 0) { ?>
<?php if (!isset($view_dashboard_service_details_preview->Pager)) $view_dashboard_service_details_preview->Pager = new PrevNextPager($view_dashboard_service_details_preview->StartRec, $view_dashboard_service_details_preview->DisplayRecs, $view_dashboard_service_details_preview->TotalRecs) ?>
<?php if ($view_dashboard_service_details_preview->Pager->RecordCount > 0 && $view_dashboard_service_details_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($view_dashboard_service_details_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $view_dashboard_service_details_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($view_dashboard_service_details_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $view_dashboard_service_details_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($view_dashboard_service_details_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $view_dashboard_service_details_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($view_dashboard_service_details_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $view_dashboard_service_details_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_dashboard_service_details_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_dashboard_service_details_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_dashboard_service_details_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($view_dashboard_service_details_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$view_dashboard_service_details_preview->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php
if ($view_dashboard_service_details_preview->Recordset)
	$view_dashboard_service_details_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$view_dashboard_service_details_preview->terminate();
?>
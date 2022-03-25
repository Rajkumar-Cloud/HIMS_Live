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
<?php if ($view_dashboard_service_details_preview->TotalRecords > 0) { ?>
<div class="card ew-grid view_dashboard_service_details"><!-- .card -->
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel ew-preview-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$view_dashboard_service_details_preview->renderListOptions();

// Render list options (header, left)
$view_dashboard_service_details_preview->ListOptions->render("header", "left");
?>
<?php if ($view_dashboard_service_details_preview->PatientId->Visible) { // PatientId ?>
	<?php if ($view_dashboard_service_details->SortUrl($view_dashboard_service_details_preview->PatientId) == "") { ?>
		<th class="<?php echo $view_dashboard_service_details_preview->PatientId->headerCellClass() ?>"><?php echo $view_dashboard_service_details_preview->PatientId->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_service_details_preview->PatientId->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_dashboard_service_details_preview->PatientId->Name) ?>" data-sort-order="<?php echo $view_dashboard_service_details_preview->SortField == $view_dashboard_service_details_preview->PatientId->Name && $view_dashboard_service_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details_preview->PatientId->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details_preview->SortField == $view_dashboard_service_details_preview->PatientId->Name) { ?><?php if ($view_dashboard_service_details_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_service_details_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details_preview->PatientName->Visible) { // PatientName ?>
	<?php if ($view_dashboard_service_details->SortUrl($view_dashboard_service_details_preview->PatientName) == "") { ?>
		<th class="<?php echo $view_dashboard_service_details_preview->PatientName->headerCellClass() ?>"><?php echo $view_dashboard_service_details_preview->PatientName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_service_details_preview->PatientName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_dashboard_service_details_preview->PatientName->Name) ?>" data-sort-order="<?php echo $view_dashboard_service_details_preview->SortField == $view_dashboard_service_details_preview->PatientName->Name && $view_dashboard_service_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details_preview->PatientName->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details_preview->SortField == $view_dashboard_service_details_preview->PatientName->Name) { ?><?php if ($view_dashboard_service_details_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_service_details_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details_preview->Services->Visible) { // Services ?>
	<?php if ($view_dashboard_service_details->SortUrl($view_dashboard_service_details_preview->Services) == "") { ?>
		<th class="<?php echo $view_dashboard_service_details_preview->Services->headerCellClass() ?>"><?php echo $view_dashboard_service_details_preview->Services->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_service_details_preview->Services->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_dashboard_service_details_preview->Services->Name) ?>" data-sort-order="<?php echo $view_dashboard_service_details_preview->SortField == $view_dashboard_service_details_preview->Services->Name && $view_dashboard_service_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details_preview->Services->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details_preview->SortField == $view_dashboard_service_details_preview->Services->Name) { ?><?php if ($view_dashboard_service_details_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_service_details_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details_preview->amount->Visible) { // amount ?>
	<?php if ($view_dashboard_service_details->SortUrl($view_dashboard_service_details_preview->amount) == "") { ?>
		<th class="<?php echo $view_dashboard_service_details_preview->amount->headerCellClass() ?>"><?php echo $view_dashboard_service_details_preview->amount->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_service_details_preview->amount->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_dashboard_service_details_preview->amount->Name) ?>" data-sort-order="<?php echo $view_dashboard_service_details_preview->SortField == $view_dashboard_service_details_preview->amount->Name && $view_dashboard_service_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details_preview->amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details_preview->SortField == $view_dashboard_service_details_preview->amount->Name) { ?><?php if ($view_dashboard_service_details_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_service_details_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details_preview->SubTotal->Visible) { // SubTotal ?>
	<?php if ($view_dashboard_service_details->SortUrl($view_dashboard_service_details_preview->SubTotal) == "") { ?>
		<th class="<?php echo $view_dashboard_service_details_preview->SubTotal->headerCellClass() ?>"><?php echo $view_dashboard_service_details_preview->SubTotal->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_service_details_preview->SubTotal->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_dashboard_service_details_preview->SubTotal->Name) ?>" data-sort-order="<?php echo $view_dashboard_service_details_preview->SortField == $view_dashboard_service_details_preview->SubTotal->Name && $view_dashboard_service_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details_preview->SubTotal->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details_preview->SortField == $view_dashboard_service_details_preview->SubTotal->Name) { ?><?php if ($view_dashboard_service_details_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_service_details_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details_preview->createdby->Visible) { // createdby ?>
	<?php if ($view_dashboard_service_details->SortUrl($view_dashboard_service_details_preview->createdby) == "") { ?>
		<th class="<?php echo $view_dashboard_service_details_preview->createdby->headerCellClass() ?>"><?php echo $view_dashboard_service_details_preview->createdby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_service_details_preview->createdby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_dashboard_service_details_preview->createdby->Name) ?>" data-sort-order="<?php echo $view_dashboard_service_details_preview->SortField == $view_dashboard_service_details_preview->createdby->Name && $view_dashboard_service_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details_preview->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details_preview->SortField == $view_dashboard_service_details_preview->createdby->Name) { ?><?php if ($view_dashboard_service_details_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_service_details_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details_preview->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_dashboard_service_details->SortUrl($view_dashboard_service_details_preview->createddatetime) == "") { ?>
		<th class="<?php echo $view_dashboard_service_details_preview->createddatetime->headerCellClass() ?>"><?php echo $view_dashboard_service_details_preview->createddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_service_details_preview->createddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_dashboard_service_details_preview->createddatetime->Name) ?>" data-sort-order="<?php echo $view_dashboard_service_details_preview->SortField == $view_dashboard_service_details_preview->createddatetime->Name && $view_dashboard_service_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details_preview->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details_preview->SortField == $view_dashboard_service_details_preview->createddatetime->Name) { ?><?php if ($view_dashboard_service_details_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_service_details_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details_preview->createdDate->Visible) { // createdDate ?>
	<?php if ($view_dashboard_service_details->SortUrl($view_dashboard_service_details_preview->createdDate) == "") { ?>
		<th class="<?php echo $view_dashboard_service_details_preview->createdDate->headerCellClass() ?>"><?php echo $view_dashboard_service_details_preview->createdDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_service_details_preview->createdDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_dashboard_service_details_preview->createdDate->Name) ?>" data-sort-order="<?php echo $view_dashboard_service_details_preview->SortField == $view_dashboard_service_details_preview->createdDate->Name && $view_dashboard_service_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details_preview->createdDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details_preview->SortField == $view_dashboard_service_details_preview->createdDate->Name) { ?><?php if ($view_dashboard_service_details_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_service_details_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details_preview->DrName->Visible) { // DrName ?>
	<?php if ($view_dashboard_service_details->SortUrl($view_dashboard_service_details_preview->DrName) == "") { ?>
		<th class="<?php echo $view_dashboard_service_details_preview->DrName->headerCellClass() ?>"><?php echo $view_dashboard_service_details_preview->DrName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_service_details_preview->DrName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_dashboard_service_details_preview->DrName->Name) ?>" data-sort-order="<?php echo $view_dashboard_service_details_preview->SortField == $view_dashboard_service_details_preview->DrName->Name && $view_dashboard_service_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details_preview->DrName->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details_preview->SortField == $view_dashboard_service_details_preview->DrName->Name) { ?><?php if ($view_dashboard_service_details_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_service_details_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details_preview->DRDepartment->Visible) { // DRDepartment ?>
	<?php if ($view_dashboard_service_details->SortUrl($view_dashboard_service_details_preview->DRDepartment) == "") { ?>
		<th class="<?php echo $view_dashboard_service_details_preview->DRDepartment->headerCellClass() ?>"><?php echo $view_dashboard_service_details_preview->DRDepartment->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_service_details_preview->DRDepartment->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_dashboard_service_details_preview->DRDepartment->Name) ?>" data-sort-order="<?php echo $view_dashboard_service_details_preview->SortField == $view_dashboard_service_details_preview->DRDepartment->Name && $view_dashboard_service_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details_preview->DRDepartment->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details_preview->SortField == $view_dashboard_service_details_preview->DRDepartment->Name) { ?><?php if ($view_dashboard_service_details_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_service_details_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details_preview->ItemCode->Visible) { // ItemCode ?>
	<?php if ($view_dashboard_service_details->SortUrl($view_dashboard_service_details_preview->ItemCode) == "") { ?>
		<th class="<?php echo $view_dashboard_service_details_preview->ItemCode->headerCellClass() ?>"><?php echo $view_dashboard_service_details_preview->ItemCode->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_service_details_preview->ItemCode->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_dashboard_service_details_preview->ItemCode->Name) ?>" data-sort-order="<?php echo $view_dashboard_service_details_preview->SortField == $view_dashboard_service_details_preview->ItemCode->Name && $view_dashboard_service_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details_preview->ItemCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details_preview->SortField == $view_dashboard_service_details_preview->ItemCode->Name) { ?><?php if ($view_dashboard_service_details_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_service_details_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details_preview->DEptCd->Visible) { // DEptCd ?>
	<?php if ($view_dashboard_service_details->SortUrl($view_dashboard_service_details_preview->DEptCd) == "") { ?>
		<th class="<?php echo $view_dashboard_service_details_preview->DEptCd->headerCellClass() ?>"><?php echo $view_dashboard_service_details_preview->DEptCd->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_service_details_preview->DEptCd->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_dashboard_service_details_preview->DEptCd->Name) ?>" data-sort-order="<?php echo $view_dashboard_service_details_preview->SortField == $view_dashboard_service_details_preview->DEptCd->Name && $view_dashboard_service_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details_preview->DEptCd->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details_preview->SortField == $view_dashboard_service_details_preview->DEptCd->Name) { ?><?php if ($view_dashboard_service_details_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_service_details_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details_preview->CODE->Visible) { // CODE ?>
	<?php if ($view_dashboard_service_details->SortUrl($view_dashboard_service_details_preview->CODE) == "") { ?>
		<th class="<?php echo $view_dashboard_service_details_preview->CODE->headerCellClass() ?>"><?php echo $view_dashboard_service_details_preview->CODE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_service_details_preview->CODE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_dashboard_service_details_preview->CODE->Name) ?>" data-sort-order="<?php echo $view_dashboard_service_details_preview->SortField == $view_dashboard_service_details_preview->CODE->Name && $view_dashboard_service_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details_preview->CODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details_preview->SortField == $view_dashboard_service_details_preview->CODE->Name) { ?><?php if ($view_dashboard_service_details_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_service_details_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details_preview->SERVICE->Visible) { // SERVICE ?>
	<?php if ($view_dashboard_service_details->SortUrl($view_dashboard_service_details_preview->SERVICE) == "") { ?>
		<th class="<?php echo $view_dashboard_service_details_preview->SERVICE->headerCellClass() ?>"><?php echo $view_dashboard_service_details_preview->SERVICE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_service_details_preview->SERVICE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_dashboard_service_details_preview->SERVICE->Name) ?>" data-sort-order="<?php echo $view_dashboard_service_details_preview->SortField == $view_dashboard_service_details_preview->SERVICE->Name && $view_dashboard_service_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details_preview->SERVICE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details_preview->SortField == $view_dashboard_service_details_preview->SERVICE->Name) { ?><?php if ($view_dashboard_service_details_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_service_details_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details_preview->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
	<?php if ($view_dashboard_service_details->SortUrl($view_dashboard_service_details_preview->SERVICE_TYPE) == "") { ?>
		<th class="<?php echo $view_dashboard_service_details_preview->SERVICE_TYPE->headerCellClass() ?>"><?php echo $view_dashboard_service_details_preview->SERVICE_TYPE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_service_details_preview->SERVICE_TYPE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_dashboard_service_details_preview->SERVICE_TYPE->Name) ?>" data-sort-order="<?php echo $view_dashboard_service_details_preview->SortField == $view_dashboard_service_details_preview->SERVICE_TYPE->Name && $view_dashboard_service_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details_preview->SERVICE_TYPE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details_preview->SortField == $view_dashboard_service_details_preview->SERVICE_TYPE->Name) { ?><?php if ($view_dashboard_service_details_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_service_details_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details_preview->DEPARTMENT->Visible) { // DEPARTMENT ?>
	<?php if ($view_dashboard_service_details->SortUrl($view_dashboard_service_details_preview->DEPARTMENT) == "") { ?>
		<th class="<?php echo $view_dashboard_service_details_preview->DEPARTMENT->headerCellClass() ?>"><?php echo $view_dashboard_service_details_preview->DEPARTMENT->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_service_details_preview->DEPARTMENT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_dashboard_service_details_preview->DEPARTMENT->Name) ?>" data-sort-order="<?php echo $view_dashboard_service_details_preview->SortField == $view_dashboard_service_details_preview->DEPARTMENT->Name && $view_dashboard_service_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details_preview->DEPARTMENT->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details_preview->SortField == $view_dashboard_service_details_preview->DEPARTMENT->Name) { ?><?php if ($view_dashboard_service_details_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_service_details_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details_preview->HospID->Visible) { // HospID ?>
	<?php if ($view_dashboard_service_details->SortUrl($view_dashboard_service_details_preview->HospID) == "") { ?>
		<th class="<?php echo $view_dashboard_service_details_preview->HospID->headerCellClass() ?>"><?php echo $view_dashboard_service_details_preview->HospID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_service_details_preview->HospID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_dashboard_service_details_preview->HospID->Name) ?>" data-sort-order="<?php echo $view_dashboard_service_details_preview->SortField == $view_dashboard_service_details_preview->HospID->Name && $view_dashboard_service_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details_preview->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details_preview->SortField == $view_dashboard_service_details_preview->HospID->Name) { ?><?php if ($view_dashboard_service_details_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_service_details_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details_preview->vid->Visible) { // vid ?>
	<?php if ($view_dashboard_service_details->SortUrl($view_dashboard_service_details_preview->vid) == "") { ?>
		<th class="<?php echo $view_dashboard_service_details_preview->vid->headerCellClass() ?>"><?php echo $view_dashboard_service_details_preview->vid->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_service_details_preview->vid->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_dashboard_service_details_preview->vid->Name) ?>" data-sort-order="<?php echo $view_dashboard_service_details_preview->SortField == $view_dashboard_service_details_preview->vid->Name && $view_dashboard_service_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details_preview->vid->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details_preview->SortField == $view_dashboard_service_details_preview->vid->Name) { ?><?php if ($view_dashboard_service_details_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_service_details_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
$view_dashboard_service_details_preview->RowCount = 0;
while ($view_dashboard_service_details_preview->Recordset && !$view_dashboard_service_details_preview->Recordset->EOF) {

	// Init row class and style
	$view_dashboard_service_details_preview->RecCount++;
	$view_dashboard_service_details_preview->RowCount++;
	$view_dashboard_service_details_preview->CssStyle = "";
	$view_dashboard_service_details_preview->loadListRowValues($view_dashboard_service_details_preview->Recordset);
	$view_dashboard_service_details_preview->aggregateListRowValues(); // Aggregate row values

	// Render row
	$view_dashboard_service_details->RowType = ROWTYPE_PREVIEW; // Preview record
	$view_dashboard_service_details_preview->resetAttributes();
	$view_dashboard_service_details_preview->renderListRow();

	// Render list options
	$view_dashboard_service_details_preview->renderListOptions();
?>
	<tr <?php echo $view_dashboard_service_details->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_dashboard_service_details_preview->ListOptions->render("body", "left", $view_dashboard_service_details_preview->RowCount);
?>
<?php if ($view_dashboard_service_details_preview->PatientId->Visible) { // PatientId ?>
		<!-- PatientId -->
		<td<?php echo $view_dashboard_service_details_preview->PatientId->cellAttributes() ?>>
<span<?php echo $view_dashboard_service_details_preview->PatientId->viewAttributes() ?>><?php echo $view_dashboard_service_details_preview->PatientId->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_service_details_preview->PatientName->Visible) { // PatientName ?>
		<!-- PatientName -->
		<td<?php echo $view_dashboard_service_details_preview->PatientName->cellAttributes() ?>>
<span<?php echo $view_dashboard_service_details_preview->PatientName->viewAttributes() ?>><?php echo $view_dashboard_service_details_preview->PatientName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_service_details_preview->Services->Visible) { // Services ?>
		<!-- Services -->
		<td<?php echo $view_dashboard_service_details_preview->Services->cellAttributes() ?>>
<span<?php echo $view_dashboard_service_details_preview->Services->viewAttributes() ?>><?php echo $view_dashboard_service_details_preview->Services->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_service_details_preview->amount->Visible) { // amount ?>
		<!-- amount -->
		<td<?php echo $view_dashboard_service_details_preview->amount->cellAttributes() ?>>
<span<?php echo $view_dashboard_service_details_preview->amount->viewAttributes() ?>><?php echo $view_dashboard_service_details_preview->amount->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_service_details_preview->SubTotal->Visible) { // SubTotal ?>
		<!-- SubTotal -->
		<td<?php echo $view_dashboard_service_details_preview->SubTotal->cellAttributes() ?>>
<span<?php echo $view_dashboard_service_details_preview->SubTotal->viewAttributes() ?>><?php echo $view_dashboard_service_details_preview->SubTotal->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_service_details_preview->createdby->Visible) { // createdby ?>
		<!-- createdby -->
		<td<?php echo $view_dashboard_service_details_preview->createdby->cellAttributes() ?>>
<span<?php echo $view_dashboard_service_details_preview->createdby->viewAttributes() ?>><?php echo $view_dashboard_service_details_preview->createdby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_service_details_preview->createddatetime->Visible) { // createddatetime ?>
		<!-- createddatetime -->
		<td<?php echo $view_dashboard_service_details_preview->createddatetime->cellAttributes() ?>>
<span<?php echo $view_dashboard_service_details_preview->createddatetime->viewAttributes() ?>><?php echo $view_dashboard_service_details_preview->createddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_service_details_preview->createdDate->Visible) { // createdDate ?>
		<!-- createdDate -->
		<td<?php echo $view_dashboard_service_details_preview->createdDate->cellAttributes() ?>>
<span<?php echo $view_dashboard_service_details_preview->createdDate->viewAttributes() ?>><?php echo $view_dashboard_service_details_preview->createdDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_service_details_preview->DrName->Visible) { // DrName ?>
		<!-- DrName -->
		<td<?php echo $view_dashboard_service_details_preview->DrName->cellAttributes() ?>>
<span<?php echo $view_dashboard_service_details_preview->DrName->viewAttributes() ?>><?php echo $view_dashboard_service_details_preview->DrName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_service_details_preview->DRDepartment->Visible) { // DRDepartment ?>
		<!-- DRDepartment -->
		<td<?php echo $view_dashboard_service_details_preview->DRDepartment->cellAttributes() ?>>
<span<?php echo $view_dashboard_service_details_preview->DRDepartment->viewAttributes() ?>><?php echo $view_dashboard_service_details_preview->DRDepartment->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_service_details_preview->ItemCode->Visible) { // ItemCode ?>
		<!-- ItemCode -->
		<td<?php echo $view_dashboard_service_details_preview->ItemCode->cellAttributes() ?>>
<span<?php echo $view_dashboard_service_details_preview->ItemCode->viewAttributes() ?>><?php echo $view_dashboard_service_details_preview->ItemCode->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_service_details_preview->DEptCd->Visible) { // DEptCd ?>
		<!-- DEptCd -->
		<td<?php echo $view_dashboard_service_details_preview->DEptCd->cellAttributes() ?>>
<span<?php echo $view_dashboard_service_details_preview->DEptCd->viewAttributes() ?>><?php echo $view_dashboard_service_details_preview->DEptCd->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_service_details_preview->CODE->Visible) { // CODE ?>
		<!-- CODE -->
		<td<?php echo $view_dashboard_service_details_preview->CODE->cellAttributes() ?>>
<span<?php echo $view_dashboard_service_details_preview->CODE->viewAttributes() ?>><?php echo $view_dashboard_service_details_preview->CODE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_service_details_preview->SERVICE->Visible) { // SERVICE ?>
		<!-- SERVICE -->
		<td<?php echo $view_dashboard_service_details_preview->SERVICE->cellAttributes() ?>>
<span<?php echo $view_dashboard_service_details_preview->SERVICE->viewAttributes() ?>><?php echo $view_dashboard_service_details_preview->SERVICE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_service_details_preview->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
		<!-- SERVICE_TYPE -->
		<td<?php echo $view_dashboard_service_details_preview->SERVICE_TYPE->cellAttributes() ?>>
<span<?php echo $view_dashboard_service_details_preview->SERVICE_TYPE->viewAttributes() ?>><?php echo $view_dashboard_service_details_preview->SERVICE_TYPE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_service_details_preview->DEPARTMENT->Visible) { // DEPARTMENT ?>
		<!-- DEPARTMENT -->
		<td<?php echo $view_dashboard_service_details_preview->DEPARTMENT->cellAttributes() ?>>
<span<?php echo $view_dashboard_service_details_preview->DEPARTMENT->viewAttributes() ?>><?php echo $view_dashboard_service_details_preview->DEPARTMENT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_service_details_preview->HospID->Visible) { // HospID ?>
		<!-- HospID -->
		<td<?php echo $view_dashboard_service_details_preview->HospID->cellAttributes() ?>>
<span<?php echo $view_dashboard_service_details_preview->HospID->viewAttributes() ?>><?php echo $view_dashboard_service_details_preview->HospID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_service_details_preview->vid->Visible) { // vid ?>
		<!-- vid -->
		<td<?php echo $view_dashboard_service_details_preview->vid->cellAttributes() ?>>
<span<?php echo $view_dashboard_service_details_preview->vid->viewAttributes() ?>><?php echo $view_dashboard_service_details_preview->vid->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$view_dashboard_service_details_preview->ListOptions->render("body", "right", $view_dashboard_service_details_preview->RowCount);
?>
	</tr>
<?php
	$view_dashboard_service_details_preview->Recordset->MoveNext();
} // while
?>
	</tbody>
<?php

	// Render aggregate row
	$view_dashboard_service_details->RowType = ROWTYPE_AGGREGATE; // Aggregate
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
<?php if ($view_dashboard_service_details_preview->PatientId->Visible) { // PatientId ?>
		<!-- PatientId -->
		<td class="<?php echo $view_dashboard_service_details_preview->PatientId->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_service_details_preview->PatientName->Visible) { // PatientName ?>
		<!-- PatientName -->
		<td class="<?php echo $view_dashboard_service_details_preview->PatientName->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_service_details_preview->Services->Visible) { // Services ?>
		<!-- Services -->
		<td class="<?php echo $view_dashboard_service_details_preview->Services->footerCellClass() ?>">
		<span class="ew-aggregate"><?php echo $Language->phrase("COUNT") ?></span><span class="ew-aggregate-value">
		<?php echo $view_dashboard_service_details_preview->Services->ViewValue ?></span>
		</td>
<?php } ?>
<?php if ($view_dashboard_service_details_preview->amount->Visible) { // amount ?>
		<!-- amount -->
		<td class="<?php echo $view_dashboard_service_details_preview->amount->footerCellClass() ?>">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_dashboard_service_details_preview->amount->ViewValue ?></span>
		</td>
<?php } ?>
<?php if ($view_dashboard_service_details_preview->SubTotal->Visible) { // SubTotal ?>
		<!-- SubTotal -->
		<td class="<?php echo $view_dashboard_service_details_preview->SubTotal->footerCellClass() ?>">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_dashboard_service_details_preview->SubTotal->ViewValue ?></span>
		</td>
<?php } ?>
<?php if ($view_dashboard_service_details_preview->createdby->Visible) { // createdby ?>
		<!-- createdby -->
		<td class="<?php echo $view_dashboard_service_details_preview->createdby->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_service_details_preview->createddatetime->Visible) { // createddatetime ?>
		<!-- createddatetime -->
		<td class="<?php echo $view_dashboard_service_details_preview->createddatetime->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_service_details_preview->createdDate->Visible) { // createdDate ?>
		<!-- createdDate -->
		<td class="<?php echo $view_dashboard_service_details_preview->createdDate->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_service_details_preview->DrName->Visible) { // DrName ?>
		<!-- DrName -->
		<td class="<?php echo $view_dashboard_service_details_preview->DrName->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_service_details_preview->DRDepartment->Visible) { // DRDepartment ?>
		<!-- DRDepartment -->
		<td class="<?php echo $view_dashboard_service_details_preview->DRDepartment->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_service_details_preview->ItemCode->Visible) { // ItemCode ?>
		<!-- ItemCode -->
		<td class="<?php echo $view_dashboard_service_details_preview->ItemCode->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_service_details_preview->DEptCd->Visible) { // DEptCd ?>
		<!-- DEptCd -->
		<td class="<?php echo $view_dashboard_service_details_preview->DEptCd->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_service_details_preview->CODE->Visible) { // CODE ?>
		<!-- CODE -->
		<td class="<?php echo $view_dashboard_service_details_preview->CODE->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_service_details_preview->SERVICE->Visible) { // SERVICE ?>
		<!-- SERVICE -->
		<td class="<?php echo $view_dashboard_service_details_preview->SERVICE->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_service_details_preview->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
		<!-- SERVICE_TYPE -->
		<td class="<?php echo $view_dashboard_service_details_preview->SERVICE_TYPE->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_service_details_preview->DEPARTMENT->Visible) { // DEPARTMENT ?>
		<!-- DEPARTMENT -->
		<td class="<?php echo $view_dashboard_service_details_preview->DEPARTMENT->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_service_details_preview->HospID->Visible) { // HospID ?>
		<!-- HospID -->
		<td class="<?php echo $view_dashboard_service_details_preview->HospID->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_service_details_preview->vid->Visible) { // vid ?>
		<!-- vid -->
		<td class="<?php echo $view_dashboard_service_details_preview->vid->footerCellClass() ?>">
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
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php echo $view_dashboard_service_details_preview->Pager->render() ?>
<?php } else { // No record ?>
<div class="card no-border">
<div class="ew-detail-count"><?php echo $Language->phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($view_dashboard_service_details_preview->OtherOptions as $option)
		$option->render("body");
?>
</div>
<?php if ($view_dashboard_service_details_preview->TotalRecords > 0) { ?>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
<?php } ?>
</div><!-- /.card -->
<?php
$view_dashboard_service_details_preview->showPageFooter();
if (Config("DEBUG"))
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
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
$view_patient_services_preview = new view_patient_services_preview();

// Run the page
$view_patient_services_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_patient_services_preview->Page_Render();
?>
<?php $view_patient_services_preview->showPageHeader(); ?>
<?php if ($view_patient_services_preview->TotalRecords > 0) { ?>
<div class="card ew-grid view_patient_services"><!-- .card -->
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel ew-preview-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$view_patient_services_preview->renderListOptions();

// Render list options (header, left)
$view_patient_services_preview->ListOptions->render("header", "left");
?>
<?php if ($view_patient_services_preview->id->Visible) { // id ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->id) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->id->headerCellClass() ?>"><?php echo $view_patient_services_preview->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->id->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->id->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->id->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->Reception->Visible) { // Reception ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->Reception) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->Reception->headerCellClass() ?>"><?php echo $view_patient_services_preview->Reception->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->Reception->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->Reception->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->Reception->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->Reception->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->Reception->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->mrnno->Visible) { // mrnno ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->mrnno) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->mrnno->headerCellClass() ?>"><?php echo $view_patient_services_preview->mrnno->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->mrnno->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->mrnno->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->mrnno->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->mrnno->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->mrnno->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->PatientName->Visible) { // PatientName ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->PatientName) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->PatientName->headerCellClass() ?>"><?php echo $view_patient_services_preview->PatientName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->PatientName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->PatientName->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->PatientName->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->PatientName->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->PatientName->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->Age->Visible) { // Age ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->Age) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->Age->headerCellClass() ?>"><?php echo $view_patient_services_preview->Age->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->Age->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->Age->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->Age->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->Age->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->Age->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->Gender->Visible) { // Gender ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->Gender) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->Gender->headerCellClass() ?>"><?php echo $view_patient_services_preview->Gender->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->Gender->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->Gender->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->Gender->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->Gender->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->Gender->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->profilePic->Visible) { // profilePic ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->profilePic) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->profilePic->headerCellClass() ?>"><?php echo $view_patient_services_preview->profilePic->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->profilePic->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->profilePic->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->profilePic->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->profilePic->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->profilePic->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->Services->Visible) { // Services ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->Services) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->Services->headerCellClass() ?>"><?php echo $view_patient_services_preview->Services->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->Services->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->Services->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->Services->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->Services->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->Services->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->Unit->Visible) { // Unit ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->Unit) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->Unit->headerCellClass() ?>"><?php echo $view_patient_services_preview->Unit->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->Unit->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->Unit->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->Unit->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->Unit->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->Unit->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->amount->Visible) { // amount ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->amount) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->amount->headerCellClass() ?>"><?php echo $view_patient_services_preview->amount->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->amount->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->amount->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->amount->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->amount->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->Quantity->Visible) { // Quantity ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->Quantity) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->Quantity->headerCellClass() ?>"><?php echo $view_patient_services_preview->Quantity->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->Quantity->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->Quantity->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->Quantity->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->Quantity->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->Quantity->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->DiscountCategory->Visible) { // DiscountCategory ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->DiscountCategory) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->DiscountCategory->headerCellClass() ?>"><?php echo $view_patient_services_preview->DiscountCategory->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->DiscountCategory->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->DiscountCategory->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->DiscountCategory->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->DiscountCategory->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->DiscountCategory->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->Discount->Visible) { // Discount ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->Discount) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->Discount->headerCellClass() ?>"><?php echo $view_patient_services_preview->Discount->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->Discount->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->Discount->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->Discount->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->Discount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->Discount->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->SubTotal->Visible) { // SubTotal ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->SubTotal) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->SubTotal->headerCellClass() ?>"><?php echo $view_patient_services_preview->SubTotal->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->SubTotal->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->SubTotal->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->SubTotal->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->SubTotal->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->SubTotal->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->description->Visible) { // description ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->description) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->description->headerCellClass() ?>"><?php echo $view_patient_services_preview->description->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->description->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->description->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->description->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->description->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->description->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->patient_type->Visible) { // patient_type ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->patient_type) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->patient_type->headerCellClass() ?>"><?php echo $view_patient_services_preview->patient_type->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->patient_type->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->patient_type->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->patient_type->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->patient_type->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->patient_type->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->charged_date->Visible) { // charged_date ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->charged_date) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->charged_date->headerCellClass() ?>"><?php echo $view_patient_services_preview->charged_date->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->charged_date->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->charged_date->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->charged_date->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->charged_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->charged_date->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->status->Visible) { // status ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->status) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->status->headerCellClass() ?>"><?php echo $view_patient_services_preview->status->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->status->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->status->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->status->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->status->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->createdby->Visible) { // createdby ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->createdby) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->createdby->headerCellClass() ?>"><?php echo $view_patient_services_preview->createdby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->createdby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->createdby->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->createdby->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->createdby->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->createddatetime) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->createddatetime->headerCellClass() ?>"><?php echo $view_patient_services_preview->createddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->createddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->createddatetime->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->createddatetime->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->createddatetime->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->modifiedby->Visible) { // modifiedby ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->modifiedby) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->modifiedby->headerCellClass() ?>"><?php echo $view_patient_services_preview->modifiedby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->modifiedby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->modifiedby->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->modifiedby->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->modifiedby->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->modifieddatetime) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->modifieddatetime->headerCellClass() ?>"><?php echo $view_patient_services_preview->modifieddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->modifieddatetime->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->modifieddatetime->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->modifieddatetime->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->Aid->Visible) { // Aid ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->Aid) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->Aid->headerCellClass() ?>"><?php echo $view_patient_services_preview->Aid->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->Aid->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->Aid->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->Aid->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->Aid->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->Aid->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->Vid->Visible) { // Vid ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->Vid) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->Vid->headerCellClass() ?>"><?php echo $view_patient_services_preview->Vid->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->Vid->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->Vid->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->Vid->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->Vid->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->Vid->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->DrID->Visible) { // DrID ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->DrID) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->DrID->headerCellClass() ?>"><?php echo $view_patient_services_preview->DrID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->DrID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->DrID->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->DrID->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->DrID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->DrID->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->DrCODE->Visible) { // DrCODE ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->DrCODE) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->DrCODE->headerCellClass() ?>"><?php echo $view_patient_services_preview->DrCODE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->DrCODE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->DrCODE->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->DrCODE->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->DrCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->DrCODE->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->DrName->Visible) { // DrName ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->DrName) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->DrName->headerCellClass() ?>"><?php echo $view_patient_services_preview->DrName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->DrName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->DrName->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->DrName->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->DrName->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->DrName->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->Department->Visible) { // Department ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->Department) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->Department->headerCellClass() ?>"><?php echo $view_patient_services_preview->Department->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->Department->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->Department->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->Department->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->Department->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->Department->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->DrSharePres->Visible) { // DrSharePres ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->DrSharePres) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->DrSharePres->headerCellClass() ?>"><?php echo $view_patient_services_preview->DrSharePres->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->DrSharePres->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->DrSharePres->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->DrSharePres->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->DrSharePres->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->DrSharePres->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->HospSharePres->Visible) { // HospSharePres ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->HospSharePres) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->HospSharePres->headerCellClass() ?>"><?php echo $view_patient_services_preview->HospSharePres->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->HospSharePres->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->HospSharePres->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->HospSharePres->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->HospSharePres->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->HospSharePres->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->DrShareAmount->Visible) { // DrShareAmount ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->DrShareAmount) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->DrShareAmount->headerCellClass() ?>"><?php echo $view_patient_services_preview->DrShareAmount->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->DrShareAmount->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->DrShareAmount->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->DrShareAmount->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->DrShareAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->DrShareAmount->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->HospShareAmount->Visible) { // HospShareAmount ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->HospShareAmount) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->HospShareAmount->headerCellClass() ?>"><?php echo $view_patient_services_preview->HospShareAmount->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->HospShareAmount->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->HospShareAmount->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->HospShareAmount->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->HospShareAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->HospShareAmount->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->DrShareSettiledAmount->Visible) { // DrShareSettiledAmount ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->DrShareSettiledAmount) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->DrShareSettiledAmount->headerCellClass() ?>"><?php echo $view_patient_services_preview->DrShareSettiledAmount->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->DrShareSettiledAmount->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->DrShareSettiledAmount->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->DrShareSettiledAmount->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->DrShareSettiledAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->DrShareSettiledAmount->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->DrShareSettledId->Visible) { // DrShareSettledId ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->DrShareSettledId) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->DrShareSettledId->headerCellClass() ?>"><?php echo $view_patient_services_preview->DrShareSettledId->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->DrShareSettledId->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->DrShareSettledId->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->DrShareSettledId->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->DrShareSettledId->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->DrShareSettledId->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->DrShareSettiledStatus->Visible) { // DrShareSettiledStatus ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->DrShareSettiledStatus) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->DrShareSettiledStatus->headerCellClass() ?>"><?php echo $view_patient_services_preview->DrShareSettiledStatus->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->DrShareSettiledStatus->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->DrShareSettiledStatus->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->DrShareSettiledStatus->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->DrShareSettiledStatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->DrShareSettiledStatus->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->invoiceId->Visible) { // invoiceId ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->invoiceId) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->invoiceId->headerCellClass() ?>"><?php echo $view_patient_services_preview->invoiceId->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->invoiceId->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->invoiceId->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->invoiceId->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->invoiceId->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->invoiceId->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->invoiceAmount->Visible) { // invoiceAmount ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->invoiceAmount) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->invoiceAmount->headerCellClass() ?>"><?php echo $view_patient_services_preview->invoiceAmount->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->invoiceAmount->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->invoiceAmount->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->invoiceAmount->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->invoiceAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->invoiceAmount->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->invoiceStatus->Visible) { // invoiceStatus ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->invoiceStatus) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->invoiceStatus->headerCellClass() ?>"><?php echo $view_patient_services_preview->invoiceStatus->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->invoiceStatus->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->invoiceStatus->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->invoiceStatus->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->invoiceStatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->invoiceStatus->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->modeOfPayment->Visible) { // modeOfPayment ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->modeOfPayment) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->modeOfPayment->headerCellClass() ?>"><?php echo $view_patient_services_preview->modeOfPayment->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->modeOfPayment->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->modeOfPayment->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->modeOfPayment->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->modeOfPayment->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->modeOfPayment->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->HospID->Visible) { // HospID ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->HospID) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->HospID->headerCellClass() ?>"><?php echo $view_patient_services_preview->HospID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->HospID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->HospID->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->HospID->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->HospID->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->RIDNO->Visible) { // RIDNO ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->RIDNO) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->RIDNO->headerCellClass() ?>"><?php echo $view_patient_services_preview->RIDNO->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->RIDNO->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->RIDNO->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->RIDNO->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->RIDNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->RIDNO->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->ItemCode->Visible) { // ItemCode ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->ItemCode) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->ItemCode->headerCellClass() ?>"><?php echo $view_patient_services_preview->ItemCode->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->ItemCode->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->ItemCode->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->ItemCode->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->ItemCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->ItemCode->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->TidNo->Visible) { // TidNo ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->TidNo) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->TidNo->headerCellClass() ?>"><?php echo $view_patient_services_preview->TidNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->TidNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->TidNo->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->TidNo->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->TidNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->TidNo->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->sid->Visible) { // sid ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->sid) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->sid->headerCellClass() ?>"><?php echo $view_patient_services_preview->sid->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->sid->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->sid->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->sid->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->sid->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->sid->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->TestSubCd->Visible) { // TestSubCd ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->TestSubCd) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->TestSubCd->headerCellClass() ?>"><?php echo $view_patient_services_preview->TestSubCd->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->TestSubCd->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->TestSubCd->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->TestSubCd->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->TestSubCd->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->TestSubCd->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->DEptCd->Visible) { // DEptCd ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->DEptCd) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->DEptCd->headerCellClass() ?>"><?php echo $view_patient_services_preview->DEptCd->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->DEptCd->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->DEptCd->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->DEptCd->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->DEptCd->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->DEptCd->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->ProfCd->Visible) { // ProfCd ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->ProfCd) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->ProfCd->headerCellClass() ?>"><?php echo $view_patient_services_preview->ProfCd->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->ProfCd->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->ProfCd->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->ProfCd->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->ProfCd->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->ProfCd->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->Comments->Visible) { // Comments ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->Comments) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->Comments->headerCellClass() ?>"><?php echo $view_patient_services_preview->Comments->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->Comments->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->Comments->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->Comments->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->Comments->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->Comments->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->Method->Visible) { // Method ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->Method) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->Method->headerCellClass() ?>"><?php echo $view_patient_services_preview->Method->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->Method->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->Method->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->Method->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->Method->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->Method->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->Specimen->Visible) { // Specimen ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->Specimen) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->Specimen->headerCellClass() ?>"><?php echo $view_patient_services_preview->Specimen->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->Specimen->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->Specimen->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->Specimen->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->Specimen->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->Specimen->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->Abnormal->Visible) { // Abnormal ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->Abnormal) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->Abnormal->headerCellClass() ?>"><?php echo $view_patient_services_preview->Abnormal->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->Abnormal->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->Abnormal->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->Abnormal->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->Abnormal->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->Abnormal->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->TestUnit->Visible) { // TestUnit ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->TestUnit) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->TestUnit->headerCellClass() ?>"><?php echo $view_patient_services_preview->TestUnit->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->TestUnit->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->TestUnit->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->TestUnit->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->TestUnit->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->TestUnit->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->LOWHIGH->Visible) { // LOWHIGH ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->LOWHIGH) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->LOWHIGH->headerCellClass() ?>"><?php echo $view_patient_services_preview->LOWHIGH->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->LOWHIGH->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->LOWHIGH->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->LOWHIGH->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->LOWHIGH->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->LOWHIGH->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->Branch->Visible) { // Branch ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->Branch) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->Branch->headerCellClass() ?>"><?php echo $view_patient_services_preview->Branch->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->Branch->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->Branch->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->Branch->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->Branch->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->Branch->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->Dispatch->Visible) { // Dispatch ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->Dispatch) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->Dispatch->headerCellClass() ?>"><?php echo $view_patient_services_preview->Dispatch->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->Dispatch->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->Dispatch->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->Dispatch->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->Dispatch->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->Dispatch->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->Pic1->Visible) { // Pic1 ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->Pic1) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->Pic1->headerCellClass() ?>"><?php echo $view_patient_services_preview->Pic1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->Pic1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->Pic1->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->Pic1->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->Pic1->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->Pic1->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->Pic2->Visible) { // Pic2 ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->Pic2) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->Pic2->headerCellClass() ?>"><?php echo $view_patient_services_preview->Pic2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->Pic2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->Pic2->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->Pic2->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->Pic2->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->Pic2->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->GraphPath->Visible) { // GraphPath ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->GraphPath) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->GraphPath->headerCellClass() ?>"><?php echo $view_patient_services_preview->GraphPath->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->GraphPath->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->GraphPath->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->GraphPath->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->GraphPath->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->GraphPath->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->MachineCD->Visible) { // MachineCD ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->MachineCD) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->MachineCD->headerCellClass() ?>"><?php echo $view_patient_services_preview->MachineCD->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->MachineCD->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->MachineCD->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->MachineCD->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->MachineCD->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->MachineCD->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->TestCancel->Visible) { // TestCancel ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->TestCancel) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->TestCancel->headerCellClass() ?>"><?php echo $view_patient_services_preview->TestCancel->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->TestCancel->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->TestCancel->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->TestCancel->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->TestCancel->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->TestCancel->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->OutSource->Visible) { // OutSource ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->OutSource) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->OutSource->headerCellClass() ?>"><?php echo $view_patient_services_preview->OutSource->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->OutSource->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->OutSource->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->OutSource->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->OutSource->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->OutSource->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->Printed->Visible) { // Printed ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->Printed) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->Printed->headerCellClass() ?>"><?php echo $view_patient_services_preview->Printed->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->Printed->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->Printed->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->Printed->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->Printed->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->Printed->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->PrintBy->Visible) { // PrintBy ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->PrintBy) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->PrintBy->headerCellClass() ?>"><?php echo $view_patient_services_preview->PrintBy->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->PrintBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->PrintBy->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->PrintBy->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->PrintBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->PrintBy->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->PrintDate->Visible) { // PrintDate ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->PrintDate) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->PrintDate->headerCellClass() ?>"><?php echo $view_patient_services_preview->PrintDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->PrintDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->PrintDate->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->PrintDate->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->PrintDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->PrintDate->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->BillingDate->Visible) { // BillingDate ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->BillingDate) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->BillingDate->headerCellClass() ?>"><?php echo $view_patient_services_preview->BillingDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->BillingDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->BillingDate->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->BillingDate->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->BillingDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->BillingDate->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->BilledBy->Visible) { // BilledBy ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->BilledBy) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->BilledBy->headerCellClass() ?>"><?php echo $view_patient_services_preview->BilledBy->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->BilledBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->BilledBy->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->BilledBy->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->BilledBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->BilledBy->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->Resulted->Visible) { // Resulted ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->Resulted) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->Resulted->headerCellClass() ?>"><?php echo $view_patient_services_preview->Resulted->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->Resulted->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->Resulted->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->Resulted->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->Resulted->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->Resulted->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->ResultDate->Visible) { // ResultDate ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->ResultDate) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->ResultDate->headerCellClass() ?>"><?php echo $view_patient_services_preview->ResultDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->ResultDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->ResultDate->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->ResultDate->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->ResultDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->ResultDate->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->ResultedBy->Visible) { // ResultedBy ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->ResultedBy) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->ResultedBy->headerCellClass() ?>"><?php echo $view_patient_services_preview->ResultedBy->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->ResultedBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->ResultedBy->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->ResultedBy->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->ResultedBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->ResultedBy->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->SampleDate->Visible) { // SampleDate ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->SampleDate) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->SampleDate->headerCellClass() ?>"><?php echo $view_patient_services_preview->SampleDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->SampleDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->SampleDate->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->SampleDate->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->SampleDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->SampleDate->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->SampleUser->Visible) { // SampleUser ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->SampleUser) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->SampleUser->headerCellClass() ?>"><?php echo $view_patient_services_preview->SampleUser->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->SampleUser->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->SampleUser->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->SampleUser->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->SampleUser->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->SampleUser->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->Sampled->Visible) { // Sampled ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->Sampled) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->Sampled->headerCellClass() ?>"><?php echo $view_patient_services_preview->Sampled->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->Sampled->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->Sampled->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->Sampled->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->Sampled->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->Sampled->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->ReceivedDate->Visible) { // ReceivedDate ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->ReceivedDate) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->ReceivedDate->headerCellClass() ?>"><?php echo $view_patient_services_preview->ReceivedDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->ReceivedDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->ReceivedDate->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->ReceivedDate->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->ReceivedDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->ReceivedDate->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->ReceivedUser->Visible) { // ReceivedUser ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->ReceivedUser) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->ReceivedUser->headerCellClass() ?>"><?php echo $view_patient_services_preview->ReceivedUser->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->ReceivedUser->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->ReceivedUser->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->ReceivedUser->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->ReceivedUser->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->ReceivedUser->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->Recevied->Visible) { // Recevied ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->Recevied) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->Recevied->headerCellClass() ?>"><?php echo $view_patient_services_preview->Recevied->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->Recevied->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->Recevied->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->Recevied->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->Recevied->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->Recevied->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->DeptRecvDate->Visible) { // DeptRecvDate ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->DeptRecvDate) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->DeptRecvDate->headerCellClass() ?>"><?php echo $view_patient_services_preview->DeptRecvDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->DeptRecvDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->DeptRecvDate->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->DeptRecvDate->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->DeptRecvDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->DeptRecvDate->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->DeptRecvUser->Visible) { // DeptRecvUser ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->DeptRecvUser) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->DeptRecvUser->headerCellClass() ?>"><?php echo $view_patient_services_preview->DeptRecvUser->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->DeptRecvUser->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->DeptRecvUser->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->DeptRecvUser->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->DeptRecvUser->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->DeptRecvUser->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->DeptRecived->Visible) { // DeptRecived ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->DeptRecived) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->DeptRecived->headerCellClass() ?>"><?php echo $view_patient_services_preview->DeptRecived->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->DeptRecived->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->DeptRecived->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->DeptRecived->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->DeptRecived->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->DeptRecived->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->SAuthDate->Visible) { // SAuthDate ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->SAuthDate) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->SAuthDate->headerCellClass() ?>"><?php echo $view_patient_services_preview->SAuthDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->SAuthDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->SAuthDate->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->SAuthDate->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->SAuthDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->SAuthDate->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->SAuthBy->Visible) { // SAuthBy ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->SAuthBy) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->SAuthBy->headerCellClass() ?>"><?php echo $view_patient_services_preview->SAuthBy->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->SAuthBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->SAuthBy->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->SAuthBy->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->SAuthBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->SAuthBy->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->SAuthendicate->Visible) { // SAuthendicate ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->SAuthendicate) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->SAuthendicate->headerCellClass() ?>"><?php echo $view_patient_services_preview->SAuthendicate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->SAuthendicate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->SAuthendicate->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->SAuthendicate->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->SAuthendicate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->SAuthendicate->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->AuthDate->Visible) { // AuthDate ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->AuthDate) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->AuthDate->headerCellClass() ?>"><?php echo $view_patient_services_preview->AuthDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->AuthDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->AuthDate->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->AuthDate->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->AuthDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->AuthDate->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->AuthBy->Visible) { // AuthBy ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->AuthBy) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->AuthBy->headerCellClass() ?>"><?php echo $view_patient_services_preview->AuthBy->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->AuthBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->AuthBy->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->AuthBy->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->AuthBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->AuthBy->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->Authencate->Visible) { // Authencate ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->Authencate) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->Authencate->headerCellClass() ?>"><?php echo $view_patient_services_preview->Authencate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->Authencate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->Authencate->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->Authencate->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->Authencate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->Authencate->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->EditDate->Visible) { // EditDate ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->EditDate) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->EditDate->headerCellClass() ?>"><?php echo $view_patient_services_preview->EditDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->EditDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->EditDate->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->EditDate->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->EditDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->EditDate->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->EditBy->Visible) { // EditBy ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->EditBy) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->EditBy->headerCellClass() ?>"><?php echo $view_patient_services_preview->EditBy->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->EditBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->EditBy->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->EditBy->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->EditBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->EditBy->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->Editted->Visible) { // Editted ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->Editted) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->Editted->headerCellClass() ?>"><?php echo $view_patient_services_preview->Editted->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->Editted->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->Editted->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->Editted->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->Editted->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->Editted->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->PatID->Visible) { // PatID ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->PatID) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->PatID->headerCellClass() ?>"><?php echo $view_patient_services_preview->PatID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->PatID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->PatID->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->PatID->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->PatID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->PatID->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->PatientId->Visible) { // PatientId ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->PatientId) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->PatientId->headerCellClass() ?>"><?php echo $view_patient_services_preview->PatientId->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->PatientId->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->PatientId->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->PatientId->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->PatientId->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->PatientId->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->Mobile->Visible) { // Mobile ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->Mobile) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->Mobile->headerCellClass() ?>"><?php echo $view_patient_services_preview->Mobile->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->Mobile->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->Mobile->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->Mobile->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->Mobile->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->Mobile->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->CId->Visible) { // CId ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->CId) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->CId->headerCellClass() ?>"><?php echo $view_patient_services_preview->CId->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->CId->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->CId->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->CId->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->CId->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->CId->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->Order->Visible) { // Order ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->Order) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->Order->headerCellClass() ?>"><?php echo $view_patient_services_preview->Order->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->Order->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->Order->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->Order->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->Order->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->Order->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->ResType->Visible) { // ResType ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->ResType) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->ResType->headerCellClass() ?>"><?php echo $view_patient_services_preview->ResType->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->ResType->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->ResType->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->ResType->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->ResType->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->ResType->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->Sample->Visible) { // Sample ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->Sample) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->Sample->headerCellClass() ?>"><?php echo $view_patient_services_preview->Sample->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->Sample->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->Sample->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->Sample->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->Sample->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->Sample->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->NoD->Visible) { // NoD ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->NoD) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->NoD->headerCellClass() ?>"><?php echo $view_patient_services_preview->NoD->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->NoD->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->NoD->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->NoD->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->NoD->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->NoD->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->BillOrder->Visible) { // BillOrder ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->BillOrder) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->BillOrder->headerCellClass() ?>"><?php echo $view_patient_services_preview->BillOrder->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->BillOrder->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->BillOrder->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->BillOrder->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->BillOrder->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->BillOrder->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->Inactive->Visible) { // Inactive ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->Inactive) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->Inactive->headerCellClass() ?>"><?php echo $view_patient_services_preview->Inactive->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->Inactive->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->Inactive->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->Inactive->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->Inactive->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->Inactive->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->CollSample->Visible) { // CollSample ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->CollSample) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->CollSample->headerCellClass() ?>"><?php echo $view_patient_services_preview->CollSample->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->CollSample->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->CollSample->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->CollSample->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->CollSample->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->CollSample->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->TestType->Visible) { // TestType ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->TestType) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->TestType->headerCellClass() ?>"><?php echo $view_patient_services_preview->TestType->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->TestType->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->TestType->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->TestType->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->TestType->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->TestType->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->Repeated->Visible) { // Repeated ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->Repeated) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->Repeated->headerCellClass() ?>"><?php echo $view_patient_services_preview->Repeated->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->Repeated->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->Repeated->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->Repeated->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->Repeated->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->Repeated->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->RepeatedBy->Visible) { // RepeatedBy ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->RepeatedBy) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->RepeatedBy->headerCellClass() ?>"><?php echo $view_patient_services_preview->RepeatedBy->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->RepeatedBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->RepeatedBy->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->RepeatedBy->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->RepeatedBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->RepeatedBy->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->RepeatedDate->Visible) { // RepeatedDate ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->RepeatedDate) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->RepeatedDate->headerCellClass() ?>"><?php echo $view_patient_services_preview->RepeatedDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->RepeatedDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->RepeatedDate->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->RepeatedDate->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->RepeatedDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->RepeatedDate->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->serviceID->Visible) { // serviceID ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->serviceID) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->serviceID->headerCellClass() ?>"><?php echo $view_patient_services_preview->serviceID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->serviceID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->serviceID->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->serviceID->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->serviceID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->serviceID->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->Service_Type->Visible) { // Service_Type ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->Service_Type) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->Service_Type->headerCellClass() ?>"><?php echo $view_patient_services_preview->Service_Type->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->Service_Type->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->Service_Type->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->Service_Type->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->Service_Type->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->Service_Type->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->Service_Department->Visible) { // Service_Department ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->Service_Department) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->Service_Department->headerCellClass() ?>"><?php echo $view_patient_services_preview->Service_Department->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->Service_Department->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->Service_Department->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->Service_Department->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->Service_Department->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->Service_Department->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_preview->RequestNo->Visible) { // RequestNo ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services_preview->RequestNo) == "") { ?>
		<th class="<?php echo $view_patient_services_preview->RequestNo->headerCellClass() ?>"><?php echo $view_patient_services_preview->RequestNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services_preview->RequestNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_patient_services_preview->RequestNo->Name) ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services_preview->RequestNo->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_preview->RequestNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services_preview->RequestNo->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_patient_services_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$view_patient_services_preview->RecCount = 0;
$view_patient_services_preview->RowCount = 0;
while ($view_patient_services_preview->Recordset && !$view_patient_services_preview->Recordset->EOF) {

	// Init row class and style
	$view_patient_services_preview->RecCount++;
	$view_patient_services_preview->RowCount++;
	$view_patient_services_preview->CssStyle = "";
	$view_patient_services_preview->loadListRowValues($view_patient_services_preview->Recordset);
	$view_patient_services_preview->aggregateListRowValues(); // Aggregate row values

	// Render row
	$view_patient_services->RowType = ROWTYPE_PREVIEW; // Preview record
	$view_patient_services_preview->resetAttributes();
	$view_patient_services_preview->renderListRow();

	// Render list options
	$view_patient_services_preview->renderListOptions();
?>
	<tr <?php echo $view_patient_services->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_patient_services_preview->ListOptions->render("body", "left", $view_patient_services_preview->RowCount);
?>
<?php if ($view_patient_services_preview->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $view_patient_services_preview->id->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->id->viewAttributes() ?>><?php echo $view_patient_services_preview->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->Reception->Visible) { // Reception ?>
		<!-- Reception -->
		<td<?php echo $view_patient_services_preview->Reception->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->Reception->viewAttributes() ?>><?php echo $view_patient_services_preview->Reception->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->mrnno->Visible) { // mrnno ?>
		<!-- mrnno -->
		<td<?php echo $view_patient_services_preview->mrnno->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->mrnno->viewAttributes() ?>><?php echo $view_patient_services_preview->mrnno->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->PatientName->Visible) { // PatientName ?>
		<!-- PatientName -->
		<td<?php echo $view_patient_services_preview->PatientName->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->PatientName->viewAttributes() ?>><?php echo $view_patient_services_preview->PatientName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->Age->Visible) { // Age ?>
		<!-- Age -->
		<td<?php echo $view_patient_services_preview->Age->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->Age->viewAttributes() ?>><?php echo $view_patient_services_preview->Age->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->Gender->Visible) { // Gender ?>
		<!-- Gender -->
		<td<?php echo $view_patient_services_preview->Gender->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->Gender->viewAttributes() ?>><?php echo $view_patient_services_preview->Gender->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->profilePic->Visible) { // profilePic ?>
		<!-- profilePic -->
		<td<?php echo $view_patient_services_preview->profilePic->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->profilePic->viewAttributes() ?>><?php echo $view_patient_services_preview->profilePic->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->Services->Visible) { // Services ?>
		<!-- Services -->
		<td<?php echo $view_patient_services_preview->Services->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->Services->viewAttributes() ?>><?php echo $view_patient_services_preview->Services->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->Unit->Visible) { // Unit ?>
		<!-- Unit -->
		<td<?php echo $view_patient_services_preview->Unit->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->Unit->viewAttributes() ?>><?php echo $view_patient_services_preview->Unit->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->amount->Visible) { // amount ?>
		<!-- amount -->
		<td<?php echo $view_patient_services_preview->amount->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->amount->viewAttributes() ?>><?php echo $view_patient_services_preview->amount->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->Quantity->Visible) { // Quantity ?>
		<!-- Quantity -->
		<td<?php echo $view_patient_services_preview->Quantity->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->Quantity->viewAttributes() ?>><?php echo $view_patient_services_preview->Quantity->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->DiscountCategory->Visible) { // DiscountCategory ?>
		<!-- DiscountCategory -->
		<td<?php echo $view_patient_services_preview->DiscountCategory->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->DiscountCategory->viewAttributes() ?>><?php echo $view_patient_services_preview->DiscountCategory->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->Discount->Visible) { // Discount ?>
		<!-- Discount -->
		<td<?php echo $view_patient_services_preview->Discount->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->Discount->viewAttributes() ?>><?php echo $view_patient_services_preview->Discount->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->SubTotal->Visible) { // SubTotal ?>
		<!-- SubTotal -->
		<td<?php echo $view_patient_services_preview->SubTotal->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->SubTotal->viewAttributes() ?>><?php echo $view_patient_services_preview->SubTotal->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->description->Visible) { // description ?>
		<!-- description -->
		<td<?php echo $view_patient_services_preview->description->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->description->viewAttributes() ?>><?php echo $view_patient_services_preview->description->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->patient_type->Visible) { // patient_type ?>
		<!-- patient_type -->
		<td<?php echo $view_patient_services_preview->patient_type->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->patient_type->viewAttributes() ?>><?php echo $view_patient_services_preview->patient_type->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->charged_date->Visible) { // charged_date ?>
		<!-- charged_date -->
		<td<?php echo $view_patient_services_preview->charged_date->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->charged_date->viewAttributes() ?>><?php echo $view_patient_services_preview->charged_date->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->status->Visible) { // status ?>
		<!-- status -->
		<td<?php echo $view_patient_services_preview->status->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->status->viewAttributes() ?>><?php echo $view_patient_services_preview->status->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->createdby->Visible) { // createdby ?>
		<!-- createdby -->
		<td<?php echo $view_patient_services_preview->createdby->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->createdby->viewAttributes() ?>><?php echo $view_patient_services_preview->createdby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->createddatetime->Visible) { // createddatetime ?>
		<!-- createddatetime -->
		<td<?php echo $view_patient_services_preview->createddatetime->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->createddatetime->viewAttributes() ?>><?php echo $view_patient_services_preview->createddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->modifiedby->Visible) { // modifiedby ?>
		<!-- modifiedby -->
		<td<?php echo $view_patient_services_preview->modifiedby->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->modifiedby->viewAttributes() ?>><?php echo $view_patient_services_preview->modifiedby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->modifieddatetime->Visible) { // modifieddatetime ?>
		<!-- modifieddatetime -->
		<td<?php echo $view_patient_services_preview->modifieddatetime->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->modifieddatetime->viewAttributes() ?>><?php echo $view_patient_services_preview->modifieddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->Aid->Visible) { // Aid ?>
		<!-- Aid -->
		<td<?php echo $view_patient_services_preview->Aid->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->Aid->viewAttributes() ?>><?php echo $view_patient_services_preview->Aid->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->Vid->Visible) { // Vid ?>
		<!-- Vid -->
		<td<?php echo $view_patient_services_preview->Vid->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->Vid->viewAttributes() ?>><?php echo $view_patient_services_preview->Vid->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->DrID->Visible) { // DrID ?>
		<!-- DrID -->
		<td<?php echo $view_patient_services_preview->DrID->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->DrID->viewAttributes() ?>><?php echo $view_patient_services_preview->DrID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->DrCODE->Visible) { // DrCODE ?>
		<!-- DrCODE -->
		<td<?php echo $view_patient_services_preview->DrCODE->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->DrCODE->viewAttributes() ?>><?php echo $view_patient_services_preview->DrCODE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->DrName->Visible) { // DrName ?>
		<!-- DrName -->
		<td<?php echo $view_patient_services_preview->DrName->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->DrName->viewAttributes() ?>><?php echo $view_patient_services_preview->DrName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->Department->Visible) { // Department ?>
		<!-- Department -->
		<td<?php echo $view_patient_services_preview->Department->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->Department->viewAttributes() ?>><?php echo $view_patient_services_preview->Department->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->DrSharePres->Visible) { // DrSharePres ?>
		<!-- DrSharePres -->
		<td<?php echo $view_patient_services_preview->DrSharePres->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->DrSharePres->viewAttributes() ?>><?php echo $view_patient_services_preview->DrSharePres->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->HospSharePres->Visible) { // HospSharePres ?>
		<!-- HospSharePres -->
		<td<?php echo $view_patient_services_preview->HospSharePres->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->HospSharePres->viewAttributes() ?>><?php echo $view_patient_services_preview->HospSharePres->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->DrShareAmount->Visible) { // DrShareAmount ?>
		<!-- DrShareAmount -->
		<td<?php echo $view_patient_services_preview->DrShareAmount->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->DrShareAmount->viewAttributes() ?>><?php echo $view_patient_services_preview->DrShareAmount->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->HospShareAmount->Visible) { // HospShareAmount ?>
		<!-- HospShareAmount -->
		<td<?php echo $view_patient_services_preview->HospShareAmount->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->HospShareAmount->viewAttributes() ?>><?php echo $view_patient_services_preview->HospShareAmount->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->DrShareSettiledAmount->Visible) { // DrShareSettiledAmount ?>
		<!-- DrShareSettiledAmount -->
		<td<?php echo $view_patient_services_preview->DrShareSettiledAmount->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->DrShareSettiledAmount->viewAttributes() ?>><?php echo $view_patient_services_preview->DrShareSettiledAmount->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->DrShareSettledId->Visible) { // DrShareSettledId ?>
		<!-- DrShareSettledId -->
		<td<?php echo $view_patient_services_preview->DrShareSettledId->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->DrShareSettledId->viewAttributes() ?>><?php echo $view_patient_services_preview->DrShareSettledId->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->DrShareSettiledStatus->Visible) { // DrShareSettiledStatus ?>
		<!-- DrShareSettiledStatus -->
		<td<?php echo $view_patient_services_preview->DrShareSettiledStatus->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->DrShareSettiledStatus->viewAttributes() ?>><?php echo $view_patient_services_preview->DrShareSettiledStatus->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->invoiceId->Visible) { // invoiceId ?>
		<!-- invoiceId -->
		<td<?php echo $view_patient_services_preview->invoiceId->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->invoiceId->viewAttributes() ?>><?php echo $view_patient_services_preview->invoiceId->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->invoiceAmount->Visible) { // invoiceAmount ?>
		<!-- invoiceAmount -->
		<td<?php echo $view_patient_services_preview->invoiceAmount->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->invoiceAmount->viewAttributes() ?>><?php echo $view_patient_services_preview->invoiceAmount->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->invoiceStatus->Visible) { // invoiceStatus ?>
		<!-- invoiceStatus -->
		<td<?php echo $view_patient_services_preview->invoiceStatus->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->invoiceStatus->viewAttributes() ?>><?php echo $view_patient_services_preview->invoiceStatus->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->modeOfPayment->Visible) { // modeOfPayment ?>
		<!-- modeOfPayment -->
		<td<?php echo $view_patient_services_preview->modeOfPayment->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->modeOfPayment->viewAttributes() ?>><?php echo $view_patient_services_preview->modeOfPayment->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->HospID->Visible) { // HospID ?>
		<!-- HospID -->
		<td<?php echo $view_patient_services_preview->HospID->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->HospID->viewAttributes() ?>><?php echo $view_patient_services_preview->HospID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->RIDNO->Visible) { // RIDNO ?>
		<!-- RIDNO -->
		<td<?php echo $view_patient_services_preview->RIDNO->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->RIDNO->viewAttributes() ?>><?php echo $view_patient_services_preview->RIDNO->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->ItemCode->Visible) { // ItemCode ?>
		<!-- ItemCode -->
		<td<?php echo $view_patient_services_preview->ItemCode->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->ItemCode->viewAttributes() ?>><?php echo $view_patient_services_preview->ItemCode->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->TidNo->Visible) { // TidNo ?>
		<!-- TidNo -->
		<td<?php echo $view_patient_services_preview->TidNo->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->TidNo->viewAttributes() ?>><?php echo $view_patient_services_preview->TidNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->sid->Visible) { // sid ?>
		<!-- sid -->
		<td<?php echo $view_patient_services_preview->sid->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->sid->viewAttributes() ?>><?php echo $view_patient_services_preview->sid->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->TestSubCd->Visible) { // TestSubCd ?>
		<!-- TestSubCd -->
		<td<?php echo $view_patient_services_preview->TestSubCd->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->TestSubCd->viewAttributes() ?>><?php echo $view_patient_services_preview->TestSubCd->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->DEptCd->Visible) { // DEptCd ?>
		<!-- DEptCd -->
		<td<?php echo $view_patient_services_preview->DEptCd->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->DEptCd->viewAttributes() ?>><?php echo $view_patient_services_preview->DEptCd->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->ProfCd->Visible) { // ProfCd ?>
		<!-- ProfCd -->
		<td<?php echo $view_patient_services_preview->ProfCd->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->ProfCd->viewAttributes() ?>><?php echo $view_patient_services_preview->ProfCd->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->Comments->Visible) { // Comments ?>
		<!-- Comments -->
		<td<?php echo $view_patient_services_preview->Comments->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->Comments->viewAttributes() ?>><?php echo $view_patient_services_preview->Comments->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->Method->Visible) { // Method ?>
		<!-- Method -->
		<td<?php echo $view_patient_services_preview->Method->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->Method->viewAttributes() ?>><?php echo $view_patient_services_preview->Method->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->Specimen->Visible) { // Specimen ?>
		<!-- Specimen -->
		<td<?php echo $view_patient_services_preview->Specimen->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->Specimen->viewAttributes() ?>><?php echo $view_patient_services_preview->Specimen->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->Abnormal->Visible) { // Abnormal ?>
		<!-- Abnormal -->
		<td<?php echo $view_patient_services_preview->Abnormal->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->Abnormal->viewAttributes() ?>><?php echo $view_patient_services_preview->Abnormal->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->TestUnit->Visible) { // TestUnit ?>
		<!-- TestUnit -->
		<td<?php echo $view_patient_services_preview->TestUnit->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->TestUnit->viewAttributes() ?>><?php echo $view_patient_services_preview->TestUnit->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->LOWHIGH->Visible) { // LOWHIGH ?>
		<!-- LOWHIGH -->
		<td<?php echo $view_patient_services_preview->LOWHIGH->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->LOWHIGH->viewAttributes() ?>><?php echo $view_patient_services_preview->LOWHIGH->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->Branch->Visible) { // Branch ?>
		<!-- Branch -->
		<td<?php echo $view_patient_services_preview->Branch->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->Branch->viewAttributes() ?>><?php echo $view_patient_services_preview->Branch->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->Dispatch->Visible) { // Dispatch ?>
		<!-- Dispatch -->
		<td<?php echo $view_patient_services_preview->Dispatch->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->Dispatch->viewAttributes() ?>><?php echo $view_patient_services_preview->Dispatch->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->Pic1->Visible) { // Pic1 ?>
		<!-- Pic1 -->
		<td<?php echo $view_patient_services_preview->Pic1->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->Pic1->viewAttributes() ?>><?php echo $view_patient_services_preview->Pic1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->Pic2->Visible) { // Pic2 ?>
		<!-- Pic2 -->
		<td<?php echo $view_patient_services_preview->Pic2->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->Pic2->viewAttributes() ?>><?php echo $view_patient_services_preview->Pic2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->GraphPath->Visible) { // GraphPath ?>
		<!-- GraphPath -->
		<td<?php echo $view_patient_services_preview->GraphPath->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->GraphPath->viewAttributes() ?>><?php echo $view_patient_services_preview->GraphPath->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->MachineCD->Visible) { // MachineCD ?>
		<!-- MachineCD -->
		<td<?php echo $view_patient_services_preview->MachineCD->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->MachineCD->viewAttributes() ?>><?php echo $view_patient_services_preview->MachineCD->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->TestCancel->Visible) { // TestCancel ?>
		<!-- TestCancel -->
		<td<?php echo $view_patient_services_preview->TestCancel->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->TestCancel->viewAttributes() ?>><?php echo $view_patient_services_preview->TestCancel->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->OutSource->Visible) { // OutSource ?>
		<!-- OutSource -->
		<td<?php echo $view_patient_services_preview->OutSource->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->OutSource->viewAttributes() ?>><?php echo $view_patient_services_preview->OutSource->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->Printed->Visible) { // Printed ?>
		<!-- Printed -->
		<td<?php echo $view_patient_services_preview->Printed->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->Printed->viewAttributes() ?>><?php echo $view_patient_services_preview->Printed->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->PrintBy->Visible) { // PrintBy ?>
		<!-- PrintBy -->
		<td<?php echo $view_patient_services_preview->PrintBy->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->PrintBy->viewAttributes() ?>><?php echo $view_patient_services_preview->PrintBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->PrintDate->Visible) { // PrintDate ?>
		<!-- PrintDate -->
		<td<?php echo $view_patient_services_preview->PrintDate->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->PrintDate->viewAttributes() ?>><?php echo $view_patient_services_preview->PrintDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->BillingDate->Visible) { // BillingDate ?>
		<!-- BillingDate -->
		<td<?php echo $view_patient_services_preview->BillingDate->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->BillingDate->viewAttributes() ?>><?php echo $view_patient_services_preview->BillingDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->BilledBy->Visible) { // BilledBy ?>
		<!-- BilledBy -->
		<td<?php echo $view_patient_services_preview->BilledBy->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->BilledBy->viewAttributes() ?>><?php echo $view_patient_services_preview->BilledBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->Resulted->Visible) { // Resulted ?>
		<!-- Resulted -->
		<td<?php echo $view_patient_services_preview->Resulted->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->Resulted->viewAttributes() ?>><?php echo $view_patient_services_preview->Resulted->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->ResultDate->Visible) { // ResultDate ?>
		<!-- ResultDate -->
		<td<?php echo $view_patient_services_preview->ResultDate->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->ResultDate->viewAttributes() ?>><?php echo $view_patient_services_preview->ResultDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->ResultedBy->Visible) { // ResultedBy ?>
		<!-- ResultedBy -->
		<td<?php echo $view_patient_services_preview->ResultedBy->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->ResultedBy->viewAttributes() ?>><?php echo $view_patient_services_preview->ResultedBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->SampleDate->Visible) { // SampleDate ?>
		<!-- SampleDate -->
		<td<?php echo $view_patient_services_preview->SampleDate->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->SampleDate->viewAttributes() ?>><?php echo $view_patient_services_preview->SampleDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->SampleUser->Visible) { // SampleUser ?>
		<!-- SampleUser -->
		<td<?php echo $view_patient_services_preview->SampleUser->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->SampleUser->viewAttributes() ?>><?php echo $view_patient_services_preview->SampleUser->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->Sampled->Visible) { // Sampled ?>
		<!-- Sampled -->
		<td<?php echo $view_patient_services_preview->Sampled->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->Sampled->viewAttributes() ?>><?php echo $view_patient_services_preview->Sampled->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->ReceivedDate->Visible) { // ReceivedDate ?>
		<!-- ReceivedDate -->
		<td<?php echo $view_patient_services_preview->ReceivedDate->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->ReceivedDate->viewAttributes() ?>><?php echo $view_patient_services_preview->ReceivedDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->ReceivedUser->Visible) { // ReceivedUser ?>
		<!-- ReceivedUser -->
		<td<?php echo $view_patient_services_preview->ReceivedUser->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->ReceivedUser->viewAttributes() ?>><?php echo $view_patient_services_preview->ReceivedUser->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->Recevied->Visible) { // Recevied ?>
		<!-- Recevied -->
		<td<?php echo $view_patient_services_preview->Recevied->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->Recevied->viewAttributes() ?>><?php echo $view_patient_services_preview->Recevied->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->DeptRecvDate->Visible) { // DeptRecvDate ?>
		<!-- DeptRecvDate -->
		<td<?php echo $view_patient_services_preview->DeptRecvDate->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->DeptRecvDate->viewAttributes() ?>><?php echo $view_patient_services_preview->DeptRecvDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->DeptRecvUser->Visible) { // DeptRecvUser ?>
		<!-- DeptRecvUser -->
		<td<?php echo $view_patient_services_preview->DeptRecvUser->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->DeptRecvUser->viewAttributes() ?>><?php echo $view_patient_services_preview->DeptRecvUser->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->DeptRecived->Visible) { // DeptRecived ?>
		<!-- DeptRecived -->
		<td<?php echo $view_patient_services_preview->DeptRecived->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->DeptRecived->viewAttributes() ?>><?php echo $view_patient_services_preview->DeptRecived->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->SAuthDate->Visible) { // SAuthDate ?>
		<!-- SAuthDate -->
		<td<?php echo $view_patient_services_preview->SAuthDate->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->SAuthDate->viewAttributes() ?>><?php echo $view_patient_services_preview->SAuthDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->SAuthBy->Visible) { // SAuthBy ?>
		<!-- SAuthBy -->
		<td<?php echo $view_patient_services_preview->SAuthBy->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->SAuthBy->viewAttributes() ?>><?php echo $view_patient_services_preview->SAuthBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->SAuthendicate->Visible) { // SAuthendicate ?>
		<!-- SAuthendicate -->
		<td<?php echo $view_patient_services_preview->SAuthendicate->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->SAuthendicate->viewAttributes() ?>><?php echo $view_patient_services_preview->SAuthendicate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->AuthDate->Visible) { // AuthDate ?>
		<!-- AuthDate -->
		<td<?php echo $view_patient_services_preview->AuthDate->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->AuthDate->viewAttributes() ?>><?php echo $view_patient_services_preview->AuthDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->AuthBy->Visible) { // AuthBy ?>
		<!-- AuthBy -->
		<td<?php echo $view_patient_services_preview->AuthBy->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->AuthBy->viewAttributes() ?>><?php echo $view_patient_services_preview->AuthBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->Authencate->Visible) { // Authencate ?>
		<!-- Authencate -->
		<td<?php echo $view_patient_services_preview->Authencate->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->Authencate->viewAttributes() ?>><?php echo $view_patient_services_preview->Authencate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->EditDate->Visible) { // EditDate ?>
		<!-- EditDate -->
		<td<?php echo $view_patient_services_preview->EditDate->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->EditDate->viewAttributes() ?>><?php echo $view_patient_services_preview->EditDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->EditBy->Visible) { // EditBy ?>
		<!-- EditBy -->
		<td<?php echo $view_patient_services_preview->EditBy->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->EditBy->viewAttributes() ?>><?php echo $view_patient_services_preview->EditBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->Editted->Visible) { // Editted ?>
		<!-- Editted -->
		<td<?php echo $view_patient_services_preview->Editted->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->Editted->viewAttributes() ?>><?php echo $view_patient_services_preview->Editted->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->PatID->Visible) { // PatID ?>
		<!-- PatID -->
		<td<?php echo $view_patient_services_preview->PatID->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->PatID->viewAttributes() ?>><?php echo $view_patient_services_preview->PatID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->PatientId->Visible) { // PatientId ?>
		<!-- PatientId -->
		<td<?php echo $view_patient_services_preview->PatientId->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->PatientId->viewAttributes() ?>><?php echo $view_patient_services_preview->PatientId->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->Mobile->Visible) { // Mobile ?>
		<!-- Mobile -->
		<td<?php echo $view_patient_services_preview->Mobile->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->Mobile->viewAttributes() ?>><?php echo $view_patient_services_preview->Mobile->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->CId->Visible) { // CId ?>
		<!-- CId -->
		<td<?php echo $view_patient_services_preview->CId->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->CId->viewAttributes() ?>><?php echo $view_patient_services_preview->CId->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->Order->Visible) { // Order ?>
		<!-- Order -->
		<td<?php echo $view_patient_services_preview->Order->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->Order->viewAttributes() ?>><?php echo $view_patient_services_preview->Order->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->ResType->Visible) { // ResType ?>
		<!-- ResType -->
		<td<?php echo $view_patient_services_preview->ResType->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->ResType->viewAttributes() ?>><?php echo $view_patient_services_preview->ResType->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->Sample->Visible) { // Sample ?>
		<!-- Sample -->
		<td<?php echo $view_patient_services_preview->Sample->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->Sample->viewAttributes() ?>><?php echo $view_patient_services_preview->Sample->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->NoD->Visible) { // NoD ?>
		<!-- NoD -->
		<td<?php echo $view_patient_services_preview->NoD->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->NoD->viewAttributes() ?>><?php echo $view_patient_services_preview->NoD->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->BillOrder->Visible) { // BillOrder ?>
		<!-- BillOrder -->
		<td<?php echo $view_patient_services_preview->BillOrder->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->BillOrder->viewAttributes() ?>><?php echo $view_patient_services_preview->BillOrder->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->Inactive->Visible) { // Inactive ?>
		<!-- Inactive -->
		<td<?php echo $view_patient_services_preview->Inactive->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->Inactive->viewAttributes() ?>><?php echo $view_patient_services_preview->Inactive->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->CollSample->Visible) { // CollSample ?>
		<!-- CollSample -->
		<td<?php echo $view_patient_services_preview->CollSample->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->CollSample->viewAttributes() ?>><?php echo $view_patient_services_preview->CollSample->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->TestType->Visible) { // TestType ?>
		<!-- TestType -->
		<td<?php echo $view_patient_services_preview->TestType->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->TestType->viewAttributes() ?>><?php echo $view_patient_services_preview->TestType->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->Repeated->Visible) { // Repeated ?>
		<!-- Repeated -->
		<td<?php echo $view_patient_services_preview->Repeated->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->Repeated->viewAttributes() ?>><?php echo $view_patient_services_preview->Repeated->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->RepeatedBy->Visible) { // RepeatedBy ?>
		<!-- RepeatedBy -->
		<td<?php echo $view_patient_services_preview->RepeatedBy->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->RepeatedBy->viewAttributes() ?>><?php echo $view_patient_services_preview->RepeatedBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->RepeatedDate->Visible) { // RepeatedDate ?>
		<!-- RepeatedDate -->
		<td<?php echo $view_patient_services_preview->RepeatedDate->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->RepeatedDate->viewAttributes() ?>><?php echo $view_patient_services_preview->RepeatedDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->serviceID->Visible) { // serviceID ?>
		<!-- serviceID -->
		<td<?php echo $view_patient_services_preview->serviceID->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->serviceID->viewAttributes() ?>><?php echo $view_patient_services_preview->serviceID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->Service_Type->Visible) { // Service_Type ?>
		<!-- Service_Type -->
		<td<?php echo $view_patient_services_preview->Service_Type->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->Service_Type->viewAttributes() ?>><?php echo $view_patient_services_preview->Service_Type->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->Service_Department->Visible) { // Service_Department ?>
		<!-- Service_Department -->
		<td<?php echo $view_patient_services_preview->Service_Department->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->Service_Department->viewAttributes() ?>><?php echo $view_patient_services_preview->Service_Department->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services_preview->RequestNo->Visible) { // RequestNo ?>
		<!-- RequestNo -->
		<td<?php echo $view_patient_services_preview->RequestNo->cellAttributes() ?>>
<span<?php echo $view_patient_services_preview->RequestNo->viewAttributes() ?>><?php echo $view_patient_services_preview->RequestNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$view_patient_services_preview->ListOptions->render("body", "right", $view_patient_services_preview->RowCount);
?>
	</tr>
<?php
	$view_patient_services_preview->Recordset->MoveNext();
} // while
?>
	</tbody>
<?php

	// Render aggregate row
	$view_patient_services->RowType = ROWTYPE_AGGREGATE; // Aggregate
	$view_patient_services_preview->aggregateListRow(); // Prepare aggregate row

	// Render list options
	$view_patient_services_preview->renderListOptions();
?>
	<tfoot><!-- Table footer -->
	<tr class="ew-table-footer">
<?php

// Render list options (footer, left)
$view_patient_services_preview->ListOptions->render("footer", "left");
?>
<?php if ($view_patient_services_preview->id->Visible) { // id ?>
		<!-- id -->
		<td class="<?php echo $view_patient_services_preview->id->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->Reception->Visible) { // Reception ?>
		<!-- Reception -->
		<td class="<?php echo $view_patient_services_preview->Reception->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->mrnno->Visible) { // mrnno ?>
		<!-- mrnno -->
		<td class="<?php echo $view_patient_services_preview->mrnno->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->PatientName->Visible) { // PatientName ?>
		<!-- PatientName -->
		<td class="<?php echo $view_patient_services_preview->PatientName->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->Age->Visible) { // Age ?>
		<!-- Age -->
		<td class="<?php echo $view_patient_services_preview->Age->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->Gender->Visible) { // Gender ?>
		<!-- Gender -->
		<td class="<?php echo $view_patient_services_preview->Gender->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->profilePic->Visible) { // profilePic ?>
		<!-- profilePic -->
		<td class="<?php echo $view_patient_services_preview->profilePic->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->Services->Visible) { // Services ?>
		<!-- Services -->
		<td class="<?php echo $view_patient_services_preview->Services->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->Unit->Visible) { // Unit ?>
		<!-- Unit -->
		<td class="<?php echo $view_patient_services_preview->Unit->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->amount->Visible) { // amount ?>
		<!-- amount -->
		<td class="<?php echo $view_patient_services_preview->amount->footerCellClass() ?>">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_patient_services_preview->amount->ViewValue ?></span>
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->Quantity->Visible) { // Quantity ?>
		<!-- Quantity -->
		<td class="<?php echo $view_patient_services_preview->Quantity->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->DiscountCategory->Visible) { // DiscountCategory ?>
		<!-- DiscountCategory -->
		<td class="<?php echo $view_patient_services_preview->DiscountCategory->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->Discount->Visible) { // Discount ?>
		<!-- Discount -->
		<td class="<?php echo $view_patient_services_preview->Discount->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->SubTotal->Visible) { // SubTotal ?>
		<!-- SubTotal -->
		<td class="<?php echo $view_patient_services_preview->SubTotal->footerCellClass() ?>">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_patient_services_preview->SubTotal->ViewValue ?></span>
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->description->Visible) { // description ?>
		<!-- description -->
		<td class="<?php echo $view_patient_services_preview->description->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->patient_type->Visible) { // patient_type ?>
		<!-- patient_type -->
		<td class="<?php echo $view_patient_services_preview->patient_type->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->charged_date->Visible) { // charged_date ?>
		<!-- charged_date -->
		<td class="<?php echo $view_patient_services_preview->charged_date->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->status->Visible) { // status ?>
		<!-- status -->
		<td class="<?php echo $view_patient_services_preview->status->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->createdby->Visible) { // createdby ?>
		<!-- createdby -->
		<td class="<?php echo $view_patient_services_preview->createdby->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->createddatetime->Visible) { // createddatetime ?>
		<!-- createddatetime -->
		<td class="<?php echo $view_patient_services_preview->createddatetime->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->modifiedby->Visible) { // modifiedby ?>
		<!-- modifiedby -->
		<td class="<?php echo $view_patient_services_preview->modifiedby->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->modifieddatetime->Visible) { // modifieddatetime ?>
		<!-- modifieddatetime -->
		<td class="<?php echo $view_patient_services_preview->modifieddatetime->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->Aid->Visible) { // Aid ?>
		<!-- Aid -->
		<td class="<?php echo $view_patient_services_preview->Aid->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->Vid->Visible) { // Vid ?>
		<!-- Vid -->
		<td class="<?php echo $view_patient_services_preview->Vid->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->DrID->Visible) { // DrID ?>
		<!-- DrID -->
		<td class="<?php echo $view_patient_services_preview->DrID->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->DrCODE->Visible) { // DrCODE ?>
		<!-- DrCODE -->
		<td class="<?php echo $view_patient_services_preview->DrCODE->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->DrName->Visible) { // DrName ?>
		<!-- DrName -->
		<td class="<?php echo $view_patient_services_preview->DrName->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->Department->Visible) { // Department ?>
		<!-- Department -->
		<td class="<?php echo $view_patient_services_preview->Department->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->DrSharePres->Visible) { // DrSharePres ?>
		<!-- DrSharePres -->
		<td class="<?php echo $view_patient_services_preview->DrSharePres->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->HospSharePres->Visible) { // HospSharePres ?>
		<!-- HospSharePres -->
		<td class="<?php echo $view_patient_services_preview->HospSharePres->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->DrShareAmount->Visible) { // DrShareAmount ?>
		<!-- DrShareAmount -->
		<td class="<?php echo $view_patient_services_preview->DrShareAmount->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->HospShareAmount->Visible) { // HospShareAmount ?>
		<!-- HospShareAmount -->
		<td class="<?php echo $view_patient_services_preview->HospShareAmount->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->DrShareSettiledAmount->Visible) { // DrShareSettiledAmount ?>
		<!-- DrShareSettiledAmount -->
		<td class="<?php echo $view_patient_services_preview->DrShareSettiledAmount->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->DrShareSettledId->Visible) { // DrShareSettledId ?>
		<!-- DrShareSettledId -->
		<td class="<?php echo $view_patient_services_preview->DrShareSettledId->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->DrShareSettiledStatus->Visible) { // DrShareSettiledStatus ?>
		<!-- DrShareSettiledStatus -->
		<td class="<?php echo $view_patient_services_preview->DrShareSettiledStatus->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->invoiceId->Visible) { // invoiceId ?>
		<!-- invoiceId -->
		<td class="<?php echo $view_patient_services_preview->invoiceId->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->invoiceAmount->Visible) { // invoiceAmount ?>
		<!-- invoiceAmount -->
		<td class="<?php echo $view_patient_services_preview->invoiceAmount->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->invoiceStatus->Visible) { // invoiceStatus ?>
		<!-- invoiceStatus -->
		<td class="<?php echo $view_patient_services_preview->invoiceStatus->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->modeOfPayment->Visible) { // modeOfPayment ?>
		<!-- modeOfPayment -->
		<td class="<?php echo $view_patient_services_preview->modeOfPayment->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->HospID->Visible) { // HospID ?>
		<!-- HospID -->
		<td class="<?php echo $view_patient_services_preview->HospID->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->RIDNO->Visible) { // RIDNO ?>
		<!-- RIDNO -->
		<td class="<?php echo $view_patient_services_preview->RIDNO->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->ItemCode->Visible) { // ItemCode ?>
		<!-- ItemCode -->
		<td class="<?php echo $view_patient_services_preview->ItemCode->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->TidNo->Visible) { // TidNo ?>
		<!-- TidNo -->
		<td class="<?php echo $view_patient_services_preview->TidNo->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->sid->Visible) { // sid ?>
		<!-- sid -->
		<td class="<?php echo $view_patient_services_preview->sid->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->TestSubCd->Visible) { // TestSubCd ?>
		<!-- TestSubCd -->
		<td class="<?php echo $view_patient_services_preview->TestSubCd->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->DEptCd->Visible) { // DEptCd ?>
		<!-- DEptCd -->
		<td class="<?php echo $view_patient_services_preview->DEptCd->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->ProfCd->Visible) { // ProfCd ?>
		<!-- ProfCd -->
		<td class="<?php echo $view_patient_services_preview->ProfCd->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->Comments->Visible) { // Comments ?>
		<!-- Comments -->
		<td class="<?php echo $view_patient_services_preview->Comments->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->Method->Visible) { // Method ?>
		<!-- Method -->
		<td class="<?php echo $view_patient_services_preview->Method->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->Specimen->Visible) { // Specimen ?>
		<!-- Specimen -->
		<td class="<?php echo $view_patient_services_preview->Specimen->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->Abnormal->Visible) { // Abnormal ?>
		<!-- Abnormal -->
		<td class="<?php echo $view_patient_services_preview->Abnormal->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->TestUnit->Visible) { // TestUnit ?>
		<!-- TestUnit -->
		<td class="<?php echo $view_patient_services_preview->TestUnit->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->LOWHIGH->Visible) { // LOWHIGH ?>
		<!-- LOWHIGH -->
		<td class="<?php echo $view_patient_services_preview->LOWHIGH->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->Branch->Visible) { // Branch ?>
		<!-- Branch -->
		<td class="<?php echo $view_patient_services_preview->Branch->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->Dispatch->Visible) { // Dispatch ?>
		<!-- Dispatch -->
		<td class="<?php echo $view_patient_services_preview->Dispatch->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->Pic1->Visible) { // Pic1 ?>
		<!-- Pic1 -->
		<td class="<?php echo $view_patient_services_preview->Pic1->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->Pic2->Visible) { // Pic2 ?>
		<!-- Pic2 -->
		<td class="<?php echo $view_patient_services_preview->Pic2->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->GraphPath->Visible) { // GraphPath ?>
		<!-- GraphPath -->
		<td class="<?php echo $view_patient_services_preview->GraphPath->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->MachineCD->Visible) { // MachineCD ?>
		<!-- MachineCD -->
		<td class="<?php echo $view_patient_services_preview->MachineCD->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->TestCancel->Visible) { // TestCancel ?>
		<!-- TestCancel -->
		<td class="<?php echo $view_patient_services_preview->TestCancel->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->OutSource->Visible) { // OutSource ?>
		<!-- OutSource -->
		<td class="<?php echo $view_patient_services_preview->OutSource->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->Printed->Visible) { // Printed ?>
		<!-- Printed -->
		<td class="<?php echo $view_patient_services_preview->Printed->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->PrintBy->Visible) { // PrintBy ?>
		<!-- PrintBy -->
		<td class="<?php echo $view_patient_services_preview->PrintBy->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->PrintDate->Visible) { // PrintDate ?>
		<!-- PrintDate -->
		<td class="<?php echo $view_patient_services_preview->PrintDate->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->BillingDate->Visible) { // BillingDate ?>
		<!-- BillingDate -->
		<td class="<?php echo $view_patient_services_preview->BillingDate->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->BilledBy->Visible) { // BilledBy ?>
		<!-- BilledBy -->
		<td class="<?php echo $view_patient_services_preview->BilledBy->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->Resulted->Visible) { // Resulted ?>
		<!-- Resulted -->
		<td class="<?php echo $view_patient_services_preview->Resulted->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->ResultDate->Visible) { // ResultDate ?>
		<!-- ResultDate -->
		<td class="<?php echo $view_patient_services_preview->ResultDate->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->ResultedBy->Visible) { // ResultedBy ?>
		<!-- ResultedBy -->
		<td class="<?php echo $view_patient_services_preview->ResultedBy->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->SampleDate->Visible) { // SampleDate ?>
		<!-- SampleDate -->
		<td class="<?php echo $view_patient_services_preview->SampleDate->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->SampleUser->Visible) { // SampleUser ?>
		<!-- SampleUser -->
		<td class="<?php echo $view_patient_services_preview->SampleUser->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->Sampled->Visible) { // Sampled ?>
		<!-- Sampled -->
		<td class="<?php echo $view_patient_services_preview->Sampled->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->ReceivedDate->Visible) { // ReceivedDate ?>
		<!-- ReceivedDate -->
		<td class="<?php echo $view_patient_services_preview->ReceivedDate->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->ReceivedUser->Visible) { // ReceivedUser ?>
		<!-- ReceivedUser -->
		<td class="<?php echo $view_patient_services_preview->ReceivedUser->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->Recevied->Visible) { // Recevied ?>
		<!-- Recevied -->
		<td class="<?php echo $view_patient_services_preview->Recevied->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->DeptRecvDate->Visible) { // DeptRecvDate ?>
		<!-- DeptRecvDate -->
		<td class="<?php echo $view_patient_services_preview->DeptRecvDate->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->DeptRecvUser->Visible) { // DeptRecvUser ?>
		<!-- DeptRecvUser -->
		<td class="<?php echo $view_patient_services_preview->DeptRecvUser->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->DeptRecived->Visible) { // DeptRecived ?>
		<!-- DeptRecived -->
		<td class="<?php echo $view_patient_services_preview->DeptRecived->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->SAuthDate->Visible) { // SAuthDate ?>
		<!-- SAuthDate -->
		<td class="<?php echo $view_patient_services_preview->SAuthDate->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->SAuthBy->Visible) { // SAuthBy ?>
		<!-- SAuthBy -->
		<td class="<?php echo $view_patient_services_preview->SAuthBy->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->SAuthendicate->Visible) { // SAuthendicate ?>
		<!-- SAuthendicate -->
		<td class="<?php echo $view_patient_services_preview->SAuthendicate->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->AuthDate->Visible) { // AuthDate ?>
		<!-- AuthDate -->
		<td class="<?php echo $view_patient_services_preview->AuthDate->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->AuthBy->Visible) { // AuthBy ?>
		<!-- AuthBy -->
		<td class="<?php echo $view_patient_services_preview->AuthBy->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->Authencate->Visible) { // Authencate ?>
		<!-- Authencate -->
		<td class="<?php echo $view_patient_services_preview->Authencate->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->EditDate->Visible) { // EditDate ?>
		<!-- EditDate -->
		<td class="<?php echo $view_patient_services_preview->EditDate->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->EditBy->Visible) { // EditBy ?>
		<!-- EditBy -->
		<td class="<?php echo $view_patient_services_preview->EditBy->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->Editted->Visible) { // Editted ?>
		<!-- Editted -->
		<td class="<?php echo $view_patient_services_preview->Editted->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->PatID->Visible) { // PatID ?>
		<!-- PatID -->
		<td class="<?php echo $view_patient_services_preview->PatID->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->PatientId->Visible) { // PatientId ?>
		<!-- PatientId -->
		<td class="<?php echo $view_patient_services_preview->PatientId->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->Mobile->Visible) { // Mobile ?>
		<!-- Mobile -->
		<td class="<?php echo $view_patient_services_preview->Mobile->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->CId->Visible) { // CId ?>
		<!-- CId -->
		<td class="<?php echo $view_patient_services_preview->CId->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->Order->Visible) { // Order ?>
		<!-- Order -->
		<td class="<?php echo $view_patient_services_preview->Order->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->ResType->Visible) { // ResType ?>
		<!-- ResType -->
		<td class="<?php echo $view_patient_services_preview->ResType->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->Sample->Visible) { // Sample ?>
		<!-- Sample -->
		<td class="<?php echo $view_patient_services_preview->Sample->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->NoD->Visible) { // NoD ?>
		<!-- NoD -->
		<td class="<?php echo $view_patient_services_preview->NoD->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->BillOrder->Visible) { // BillOrder ?>
		<!-- BillOrder -->
		<td class="<?php echo $view_patient_services_preview->BillOrder->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->Inactive->Visible) { // Inactive ?>
		<!-- Inactive -->
		<td class="<?php echo $view_patient_services_preview->Inactive->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->CollSample->Visible) { // CollSample ?>
		<!-- CollSample -->
		<td class="<?php echo $view_patient_services_preview->CollSample->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->TestType->Visible) { // TestType ?>
		<!-- TestType -->
		<td class="<?php echo $view_patient_services_preview->TestType->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->Repeated->Visible) { // Repeated ?>
		<!-- Repeated -->
		<td class="<?php echo $view_patient_services_preview->Repeated->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->RepeatedBy->Visible) { // RepeatedBy ?>
		<!-- RepeatedBy -->
		<td class="<?php echo $view_patient_services_preview->RepeatedBy->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->RepeatedDate->Visible) { // RepeatedDate ?>
		<!-- RepeatedDate -->
		<td class="<?php echo $view_patient_services_preview->RepeatedDate->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->serviceID->Visible) { // serviceID ?>
		<!-- serviceID -->
		<td class="<?php echo $view_patient_services_preview->serviceID->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->Service_Type->Visible) { // Service_Type ?>
		<!-- Service_Type -->
		<td class="<?php echo $view_patient_services_preview->Service_Type->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->Service_Department->Visible) { // Service_Department ?>
		<!-- Service_Department -->
		<td class="<?php echo $view_patient_services_preview->Service_Department->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services_preview->RequestNo->Visible) { // RequestNo ?>
		<!-- RequestNo -->
		<td class="<?php echo $view_patient_services_preview->RequestNo->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php

// Render list options (footer, right)
$view_patient_services_preview->ListOptions->render("footer", "right");
?>
	</tr>
	</tfoot>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php echo $view_patient_services_preview->Pager->render() ?>
<?php } else { // No record ?>
<div class="card no-border">
<div class="ew-detail-count"><?php echo $Language->phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($view_patient_services_preview->OtherOptions as $option)
		$option->render("body");
?>
</div>
<?php if ($view_patient_services_preview->TotalRecords > 0) { ?>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
<?php } ?>
</div><!-- /.card -->
<?php
$view_patient_services_preview->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php
if ($view_patient_services_preview->Recordset)
	$view_patient_services_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$view_patient_services_preview->terminate();
?>
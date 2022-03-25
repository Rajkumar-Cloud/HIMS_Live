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
<div class="card ew-grid view_patient_services"><!-- .card -->
<?php if ($view_patient_services_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$view_patient_services_preview->renderListOptions();

// Render list options (header, left)
$view_patient_services_preview->ListOptions->render("header", "left");
?>
<?php if ($view_patient_services->id->Visible) { // id ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->id) == "") { ?>
		<th class="<?php echo $view_patient_services->id->headerCellClass() ?>"><?php echo $view_patient_services->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->id->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->id->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->id->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Reception->Visible) { // Reception ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->Reception) == "") { ?>
		<th class="<?php echo $view_patient_services->Reception->headerCellClass() ?>"><?php echo $view_patient_services->Reception->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->Reception->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->Reception->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->Reception->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->Reception->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->Reception->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->mrnno->Visible) { // mrnno ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->mrnno) == "") { ?>
		<th class="<?php echo $view_patient_services->mrnno->headerCellClass() ?>"><?php echo $view_patient_services->mrnno->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->mrnno->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->mrnno->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->mrnno->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->mrnno->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->mrnno->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->PatientName->Visible) { // PatientName ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->PatientName) == "") { ?>
		<th class="<?php echo $view_patient_services->PatientName->headerCellClass() ?>"><?php echo $view_patient_services->PatientName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->PatientName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->PatientName->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->PatientName->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->PatientName->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->PatientName->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Age->Visible) { // Age ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->Age) == "") { ?>
		<th class="<?php echo $view_patient_services->Age->headerCellClass() ?>"><?php echo $view_patient_services->Age->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->Age->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->Age->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->Age->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->Age->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->Age->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Gender->Visible) { // Gender ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->Gender) == "") { ?>
		<th class="<?php echo $view_patient_services->Gender->headerCellClass() ?>"><?php echo $view_patient_services->Gender->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->Gender->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->Gender->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->Gender->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->Gender->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->Gender->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->profilePic->Visible) { // profilePic ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->profilePic) == "") { ?>
		<th class="<?php echo $view_patient_services->profilePic->headerCellClass() ?>"><?php echo $view_patient_services->profilePic->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->profilePic->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->profilePic->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->profilePic->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->profilePic->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->profilePic->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Services->Visible) { // Services ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->Services) == "") { ?>
		<th class="<?php echo $view_patient_services->Services->headerCellClass() ?>"><?php echo $view_patient_services->Services->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->Services->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->Services->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->Services->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->Services->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->Services->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Unit->Visible) { // Unit ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->Unit) == "") { ?>
		<th class="<?php echo $view_patient_services->Unit->headerCellClass() ?>"><?php echo $view_patient_services->Unit->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->Unit->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->Unit->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->Unit->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->Unit->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->Unit->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->amount->Visible) { // amount ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->amount) == "") { ?>
		<th class="<?php echo $view_patient_services->amount->headerCellClass() ?>"><?php echo $view_patient_services->amount->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->amount->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->amount->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->amount->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->amount->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->amount->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Quantity->Visible) { // Quantity ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->Quantity) == "") { ?>
		<th class="<?php echo $view_patient_services->Quantity->headerCellClass() ?>"><?php echo $view_patient_services->Quantity->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->Quantity->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->Quantity->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->Quantity->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->Quantity->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->Quantity->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->DiscountCategory->Visible) { // DiscountCategory ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->DiscountCategory) == "") { ?>
		<th class="<?php echo $view_patient_services->DiscountCategory->headerCellClass() ?>"><?php echo $view_patient_services->DiscountCategory->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->DiscountCategory->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->DiscountCategory->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->DiscountCategory->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->DiscountCategory->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->DiscountCategory->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Discount->Visible) { // Discount ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->Discount) == "") { ?>
		<th class="<?php echo $view_patient_services->Discount->headerCellClass() ?>"><?php echo $view_patient_services->Discount->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->Discount->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->Discount->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->Discount->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->Discount->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->Discount->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->SubTotal->Visible) { // SubTotal ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->SubTotal) == "") { ?>
		<th class="<?php echo $view_patient_services->SubTotal->headerCellClass() ?>"><?php echo $view_patient_services->SubTotal->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->SubTotal->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->SubTotal->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->SubTotal->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->SubTotal->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->SubTotal->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->description->Visible) { // description ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->description) == "") { ?>
		<th class="<?php echo $view_patient_services->description->headerCellClass() ?>"><?php echo $view_patient_services->description->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->description->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->description->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->description->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->description->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->description->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->patient_type->Visible) { // patient_type ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->patient_type) == "") { ?>
		<th class="<?php echo $view_patient_services->patient_type->headerCellClass() ?>"><?php echo $view_patient_services->patient_type->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->patient_type->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->patient_type->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->patient_type->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->patient_type->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->patient_type->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->charged_date->Visible) { // charged_date ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->charged_date) == "") { ?>
		<th class="<?php echo $view_patient_services->charged_date->headerCellClass() ?>"><?php echo $view_patient_services->charged_date->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->charged_date->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->charged_date->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->charged_date->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->charged_date->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->charged_date->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->status->Visible) { // status ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->status) == "") { ?>
		<th class="<?php echo $view_patient_services->status->headerCellClass() ?>"><?php echo $view_patient_services->status->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->status->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->status->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->status->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->status->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->status->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->createdby->Visible) { // createdby ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->createdby) == "") { ?>
		<th class="<?php echo $view_patient_services->createdby->headerCellClass() ?>"><?php echo $view_patient_services->createdby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->createdby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->createdby->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->createdby->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->createdby->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->createdby->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->createddatetime) == "") { ?>
		<th class="<?php echo $view_patient_services->createddatetime->headerCellClass() ?>"><?php echo $view_patient_services->createddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->createddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->createddatetime->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->createddatetime->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->createddatetime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->createddatetime->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->modifiedby->Visible) { // modifiedby ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->modifiedby) == "") { ?>
		<th class="<?php echo $view_patient_services->modifiedby->headerCellClass() ?>"><?php echo $view_patient_services->modifiedby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->modifiedby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->modifiedby->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->modifiedby->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->modifiedby->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->modifiedby->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->modifieddatetime) == "") { ?>
		<th class="<?php echo $view_patient_services->modifieddatetime->headerCellClass() ?>"><?php echo $view_patient_services->modifieddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->modifieddatetime->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->modifieddatetime->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->modifieddatetime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->modifieddatetime->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Aid->Visible) { // Aid ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->Aid) == "") { ?>
		<th class="<?php echo $view_patient_services->Aid->headerCellClass() ?>"><?php echo $view_patient_services->Aid->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->Aid->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->Aid->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->Aid->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->Aid->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->Aid->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Vid->Visible) { // Vid ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->Vid) == "") { ?>
		<th class="<?php echo $view_patient_services->Vid->headerCellClass() ?>"><?php echo $view_patient_services->Vid->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->Vid->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->Vid->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->Vid->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->Vid->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->Vid->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->DrID->Visible) { // DrID ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->DrID) == "") { ?>
		<th class="<?php echo $view_patient_services->DrID->headerCellClass() ?>"><?php echo $view_patient_services->DrID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->DrID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->DrID->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->DrID->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->DrID->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->DrID->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->DrCODE->Visible) { // DrCODE ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->DrCODE) == "") { ?>
		<th class="<?php echo $view_patient_services->DrCODE->headerCellClass() ?>"><?php echo $view_patient_services->DrCODE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->DrCODE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->DrCODE->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->DrCODE->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->DrCODE->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->DrCODE->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->DrName->Visible) { // DrName ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->DrName) == "") { ?>
		<th class="<?php echo $view_patient_services->DrName->headerCellClass() ?>"><?php echo $view_patient_services->DrName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->DrName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->DrName->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->DrName->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->DrName->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->DrName->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Department->Visible) { // Department ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->Department) == "") { ?>
		<th class="<?php echo $view_patient_services->Department->headerCellClass() ?>"><?php echo $view_patient_services->Department->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->Department->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->Department->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->Department->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->Department->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->Department->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->DrSharePres->Visible) { // DrSharePres ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->DrSharePres) == "") { ?>
		<th class="<?php echo $view_patient_services->DrSharePres->headerCellClass() ?>"><?php echo $view_patient_services->DrSharePres->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->DrSharePres->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->DrSharePres->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->DrSharePres->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->DrSharePres->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->DrSharePres->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->HospSharePres->Visible) { // HospSharePres ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->HospSharePres) == "") { ?>
		<th class="<?php echo $view_patient_services->HospSharePres->headerCellClass() ?>"><?php echo $view_patient_services->HospSharePres->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->HospSharePres->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->HospSharePres->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->HospSharePres->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->HospSharePres->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->HospSharePres->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->DrShareAmount->Visible) { // DrShareAmount ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->DrShareAmount) == "") { ?>
		<th class="<?php echo $view_patient_services->DrShareAmount->headerCellClass() ?>"><?php echo $view_patient_services->DrShareAmount->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->DrShareAmount->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->DrShareAmount->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->DrShareAmount->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->DrShareAmount->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->DrShareAmount->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->HospShareAmount->Visible) { // HospShareAmount ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->HospShareAmount) == "") { ?>
		<th class="<?php echo $view_patient_services->HospShareAmount->headerCellClass() ?>"><?php echo $view_patient_services->HospShareAmount->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->HospShareAmount->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->HospShareAmount->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->HospShareAmount->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->HospShareAmount->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->HospShareAmount->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->DrShareSettiledAmount->Visible) { // DrShareSettiledAmount ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->DrShareSettiledAmount) == "") { ?>
		<th class="<?php echo $view_patient_services->DrShareSettiledAmount->headerCellClass() ?>"><?php echo $view_patient_services->DrShareSettiledAmount->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->DrShareSettiledAmount->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->DrShareSettiledAmount->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->DrShareSettiledAmount->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->DrShareSettiledAmount->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->DrShareSettiledAmount->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->DrShareSettledId->Visible) { // DrShareSettledId ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->DrShareSettledId) == "") { ?>
		<th class="<?php echo $view_patient_services->DrShareSettledId->headerCellClass() ?>"><?php echo $view_patient_services->DrShareSettledId->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->DrShareSettledId->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->DrShareSettledId->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->DrShareSettledId->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->DrShareSettledId->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->DrShareSettledId->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->DrShareSettiledStatus->Visible) { // DrShareSettiledStatus ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->DrShareSettiledStatus) == "") { ?>
		<th class="<?php echo $view_patient_services->DrShareSettiledStatus->headerCellClass() ?>"><?php echo $view_patient_services->DrShareSettiledStatus->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->DrShareSettiledStatus->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->DrShareSettiledStatus->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->DrShareSettiledStatus->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->DrShareSettiledStatus->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->DrShareSettiledStatus->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->invoiceId->Visible) { // invoiceId ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->invoiceId) == "") { ?>
		<th class="<?php echo $view_patient_services->invoiceId->headerCellClass() ?>"><?php echo $view_patient_services->invoiceId->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->invoiceId->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->invoiceId->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->invoiceId->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->invoiceId->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->invoiceId->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->invoiceAmount->Visible) { // invoiceAmount ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->invoiceAmount) == "") { ?>
		<th class="<?php echo $view_patient_services->invoiceAmount->headerCellClass() ?>"><?php echo $view_patient_services->invoiceAmount->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->invoiceAmount->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->invoiceAmount->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->invoiceAmount->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->invoiceAmount->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->invoiceAmount->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->invoiceStatus->Visible) { // invoiceStatus ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->invoiceStatus) == "") { ?>
		<th class="<?php echo $view_patient_services->invoiceStatus->headerCellClass() ?>"><?php echo $view_patient_services->invoiceStatus->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->invoiceStatus->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->invoiceStatus->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->invoiceStatus->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->invoiceStatus->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->invoiceStatus->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->modeOfPayment->Visible) { // modeOfPayment ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->modeOfPayment) == "") { ?>
		<th class="<?php echo $view_patient_services->modeOfPayment->headerCellClass() ?>"><?php echo $view_patient_services->modeOfPayment->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->modeOfPayment->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->modeOfPayment->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->modeOfPayment->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->modeOfPayment->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->modeOfPayment->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->HospID->Visible) { // HospID ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->HospID) == "") { ?>
		<th class="<?php echo $view_patient_services->HospID->headerCellClass() ?>"><?php echo $view_patient_services->HospID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->HospID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->HospID->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->HospID->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->HospID->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->HospID->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->RIDNO->Visible) { // RIDNO ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->RIDNO) == "") { ?>
		<th class="<?php echo $view_patient_services->RIDNO->headerCellClass() ?>"><?php echo $view_patient_services->RIDNO->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->RIDNO->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->RIDNO->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->RIDNO->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->RIDNO->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->RIDNO->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->ItemCode->Visible) { // ItemCode ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->ItemCode) == "") { ?>
		<th class="<?php echo $view_patient_services->ItemCode->headerCellClass() ?>"><?php echo $view_patient_services->ItemCode->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->ItemCode->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->ItemCode->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->ItemCode->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->ItemCode->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->ItemCode->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->TidNo->Visible) { // TidNo ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->TidNo) == "") { ?>
		<th class="<?php echo $view_patient_services->TidNo->headerCellClass() ?>"><?php echo $view_patient_services->TidNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->TidNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->TidNo->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->TidNo->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->TidNo->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->TidNo->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->sid->Visible) { // sid ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->sid) == "") { ?>
		<th class="<?php echo $view_patient_services->sid->headerCellClass() ?>"><?php echo $view_patient_services->sid->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->sid->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->sid->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->sid->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->sid->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->sid->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->TestSubCd->Visible) { // TestSubCd ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->TestSubCd) == "") { ?>
		<th class="<?php echo $view_patient_services->TestSubCd->headerCellClass() ?>"><?php echo $view_patient_services->TestSubCd->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->TestSubCd->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->TestSubCd->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->TestSubCd->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->TestSubCd->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->TestSubCd->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->DEptCd->Visible) { // DEptCd ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->DEptCd) == "") { ?>
		<th class="<?php echo $view_patient_services->DEptCd->headerCellClass() ?>"><?php echo $view_patient_services->DEptCd->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->DEptCd->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->DEptCd->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->DEptCd->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->DEptCd->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->DEptCd->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->ProfCd->Visible) { // ProfCd ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->ProfCd) == "") { ?>
		<th class="<?php echo $view_patient_services->ProfCd->headerCellClass() ?>"><?php echo $view_patient_services->ProfCd->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->ProfCd->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->ProfCd->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->ProfCd->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->ProfCd->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->ProfCd->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Comments->Visible) { // Comments ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->Comments) == "") { ?>
		<th class="<?php echo $view_patient_services->Comments->headerCellClass() ?>"><?php echo $view_patient_services->Comments->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->Comments->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->Comments->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->Comments->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->Comments->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->Comments->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Method->Visible) { // Method ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->Method) == "") { ?>
		<th class="<?php echo $view_patient_services->Method->headerCellClass() ?>"><?php echo $view_patient_services->Method->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->Method->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->Method->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->Method->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->Method->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->Method->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Specimen->Visible) { // Specimen ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->Specimen) == "") { ?>
		<th class="<?php echo $view_patient_services->Specimen->headerCellClass() ?>"><?php echo $view_patient_services->Specimen->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->Specimen->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->Specimen->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->Specimen->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->Specimen->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->Specimen->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Abnormal->Visible) { // Abnormal ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->Abnormal) == "") { ?>
		<th class="<?php echo $view_patient_services->Abnormal->headerCellClass() ?>"><?php echo $view_patient_services->Abnormal->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->Abnormal->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->Abnormal->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->Abnormal->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->Abnormal->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->Abnormal->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->TestUnit->Visible) { // TestUnit ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->TestUnit) == "") { ?>
		<th class="<?php echo $view_patient_services->TestUnit->headerCellClass() ?>"><?php echo $view_patient_services->TestUnit->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->TestUnit->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->TestUnit->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->TestUnit->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->TestUnit->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->TestUnit->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->LOWHIGH->Visible) { // LOWHIGH ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->LOWHIGH) == "") { ?>
		<th class="<?php echo $view_patient_services->LOWHIGH->headerCellClass() ?>"><?php echo $view_patient_services->LOWHIGH->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->LOWHIGH->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->LOWHIGH->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->LOWHIGH->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->LOWHIGH->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->LOWHIGH->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Branch->Visible) { // Branch ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->Branch) == "") { ?>
		<th class="<?php echo $view_patient_services->Branch->headerCellClass() ?>"><?php echo $view_patient_services->Branch->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->Branch->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->Branch->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->Branch->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->Branch->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->Branch->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Dispatch->Visible) { // Dispatch ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->Dispatch) == "") { ?>
		<th class="<?php echo $view_patient_services->Dispatch->headerCellClass() ?>"><?php echo $view_patient_services->Dispatch->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->Dispatch->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->Dispatch->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->Dispatch->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->Dispatch->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->Dispatch->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Pic1->Visible) { // Pic1 ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->Pic1) == "") { ?>
		<th class="<?php echo $view_patient_services->Pic1->headerCellClass() ?>"><?php echo $view_patient_services->Pic1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->Pic1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->Pic1->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->Pic1->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->Pic1->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->Pic1->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Pic2->Visible) { // Pic2 ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->Pic2) == "") { ?>
		<th class="<?php echo $view_patient_services->Pic2->headerCellClass() ?>"><?php echo $view_patient_services->Pic2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->Pic2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->Pic2->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->Pic2->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->Pic2->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->Pic2->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->GraphPath->Visible) { // GraphPath ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->GraphPath) == "") { ?>
		<th class="<?php echo $view_patient_services->GraphPath->headerCellClass() ?>"><?php echo $view_patient_services->GraphPath->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->GraphPath->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->GraphPath->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->GraphPath->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->GraphPath->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->GraphPath->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->MachineCD->Visible) { // MachineCD ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->MachineCD) == "") { ?>
		<th class="<?php echo $view_patient_services->MachineCD->headerCellClass() ?>"><?php echo $view_patient_services->MachineCD->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->MachineCD->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->MachineCD->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->MachineCD->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->MachineCD->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->MachineCD->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->TestCancel->Visible) { // TestCancel ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->TestCancel) == "") { ?>
		<th class="<?php echo $view_patient_services->TestCancel->headerCellClass() ?>"><?php echo $view_patient_services->TestCancel->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->TestCancel->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->TestCancel->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->TestCancel->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->TestCancel->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->TestCancel->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->OutSource->Visible) { // OutSource ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->OutSource) == "") { ?>
		<th class="<?php echo $view_patient_services->OutSource->headerCellClass() ?>"><?php echo $view_patient_services->OutSource->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->OutSource->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->OutSource->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->OutSource->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->OutSource->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->OutSource->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Printed->Visible) { // Printed ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->Printed) == "") { ?>
		<th class="<?php echo $view_patient_services->Printed->headerCellClass() ?>"><?php echo $view_patient_services->Printed->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->Printed->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->Printed->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->Printed->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->Printed->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->Printed->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->PrintBy->Visible) { // PrintBy ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->PrintBy) == "") { ?>
		<th class="<?php echo $view_patient_services->PrintBy->headerCellClass() ?>"><?php echo $view_patient_services->PrintBy->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->PrintBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->PrintBy->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->PrintBy->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->PrintBy->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->PrintBy->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->PrintDate->Visible) { // PrintDate ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->PrintDate) == "") { ?>
		<th class="<?php echo $view_patient_services->PrintDate->headerCellClass() ?>"><?php echo $view_patient_services->PrintDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->PrintDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->PrintDate->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->PrintDate->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->PrintDate->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->PrintDate->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->BillingDate->Visible) { // BillingDate ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->BillingDate) == "") { ?>
		<th class="<?php echo $view_patient_services->BillingDate->headerCellClass() ?>"><?php echo $view_patient_services->BillingDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->BillingDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->BillingDate->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->BillingDate->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->BillingDate->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->BillingDate->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->BilledBy->Visible) { // BilledBy ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->BilledBy) == "") { ?>
		<th class="<?php echo $view_patient_services->BilledBy->headerCellClass() ?>"><?php echo $view_patient_services->BilledBy->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->BilledBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->BilledBy->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->BilledBy->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->BilledBy->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->BilledBy->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Resulted->Visible) { // Resulted ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->Resulted) == "") { ?>
		<th class="<?php echo $view_patient_services->Resulted->headerCellClass() ?>"><?php echo $view_patient_services->Resulted->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->Resulted->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->Resulted->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->Resulted->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->Resulted->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->Resulted->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->ResultDate->Visible) { // ResultDate ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->ResultDate) == "") { ?>
		<th class="<?php echo $view_patient_services->ResultDate->headerCellClass() ?>"><?php echo $view_patient_services->ResultDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->ResultDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->ResultDate->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->ResultDate->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->ResultDate->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->ResultDate->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->ResultedBy->Visible) { // ResultedBy ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->ResultedBy) == "") { ?>
		<th class="<?php echo $view_patient_services->ResultedBy->headerCellClass() ?>"><?php echo $view_patient_services->ResultedBy->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->ResultedBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->ResultedBy->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->ResultedBy->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->ResultedBy->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->ResultedBy->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->SampleDate->Visible) { // SampleDate ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->SampleDate) == "") { ?>
		<th class="<?php echo $view_patient_services->SampleDate->headerCellClass() ?>"><?php echo $view_patient_services->SampleDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->SampleDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->SampleDate->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->SampleDate->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->SampleDate->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->SampleDate->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->SampleUser->Visible) { // SampleUser ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->SampleUser) == "") { ?>
		<th class="<?php echo $view_patient_services->SampleUser->headerCellClass() ?>"><?php echo $view_patient_services->SampleUser->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->SampleUser->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->SampleUser->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->SampleUser->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->SampleUser->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->SampleUser->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Sampled->Visible) { // Sampled ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->Sampled) == "") { ?>
		<th class="<?php echo $view_patient_services->Sampled->headerCellClass() ?>"><?php echo $view_patient_services->Sampled->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->Sampled->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->Sampled->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->Sampled->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->Sampled->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->Sampled->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->ReceivedDate->Visible) { // ReceivedDate ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->ReceivedDate) == "") { ?>
		<th class="<?php echo $view_patient_services->ReceivedDate->headerCellClass() ?>"><?php echo $view_patient_services->ReceivedDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->ReceivedDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->ReceivedDate->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->ReceivedDate->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->ReceivedDate->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->ReceivedDate->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->ReceivedUser->Visible) { // ReceivedUser ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->ReceivedUser) == "") { ?>
		<th class="<?php echo $view_patient_services->ReceivedUser->headerCellClass() ?>"><?php echo $view_patient_services->ReceivedUser->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->ReceivedUser->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->ReceivedUser->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->ReceivedUser->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->ReceivedUser->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->ReceivedUser->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Recevied->Visible) { // Recevied ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->Recevied) == "") { ?>
		<th class="<?php echo $view_patient_services->Recevied->headerCellClass() ?>"><?php echo $view_patient_services->Recevied->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->Recevied->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->Recevied->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->Recevied->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->Recevied->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->Recevied->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->DeptRecvDate->Visible) { // DeptRecvDate ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->DeptRecvDate) == "") { ?>
		<th class="<?php echo $view_patient_services->DeptRecvDate->headerCellClass() ?>"><?php echo $view_patient_services->DeptRecvDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->DeptRecvDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->DeptRecvDate->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->DeptRecvDate->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->DeptRecvDate->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->DeptRecvDate->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->DeptRecvUser->Visible) { // DeptRecvUser ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->DeptRecvUser) == "") { ?>
		<th class="<?php echo $view_patient_services->DeptRecvUser->headerCellClass() ?>"><?php echo $view_patient_services->DeptRecvUser->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->DeptRecvUser->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->DeptRecvUser->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->DeptRecvUser->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->DeptRecvUser->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->DeptRecvUser->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->DeptRecived->Visible) { // DeptRecived ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->DeptRecived) == "") { ?>
		<th class="<?php echo $view_patient_services->DeptRecived->headerCellClass() ?>"><?php echo $view_patient_services->DeptRecived->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->DeptRecived->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->DeptRecived->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->DeptRecived->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->DeptRecived->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->DeptRecived->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->SAuthDate->Visible) { // SAuthDate ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->SAuthDate) == "") { ?>
		<th class="<?php echo $view_patient_services->SAuthDate->headerCellClass() ?>"><?php echo $view_patient_services->SAuthDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->SAuthDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->SAuthDate->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->SAuthDate->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->SAuthDate->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->SAuthDate->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->SAuthBy->Visible) { // SAuthBy ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->SAuthBy) == "") { ?>
		<th class="<?php echo $view_patient_services->SAuthBy->headerCellClass() ?>"><?php echo $view_patient_services->SAuthBy->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->SAuthBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->SAuthBy->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->SAuthBy->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->SAuthBy->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->SAuthBy->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->SAuthendicate->Visible) { // SAuthendicate ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->SAuthendicate) == "") { ?>
		<th class="<?php echo $view_patient_services->SAuthendicate->headerCellClass() ?>"><?php echo $view_patient_services->SAuthendicate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->SAuthendicate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->SAuthendicate->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->SAuthendicate->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->SAuthendicate->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->SAuthendicate->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->AuthDate->Visible) { // AuthDate ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->AuthDate) == "") { ?>
		<th class="<?php echo $view_patient_services->AuthDate->headerCellClass() ?>"><?php echo $view_patient_services->AuthDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->AuthDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->AuthDate->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->AuthDate->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->AuthDate->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->AuthDate->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->AuthBy->Visible) { // AuthBy ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->AuthBy) == "") { ?>
		<th class="<?php echo $view_patient_services->AuthBy->headerCellClass() ?>"><?php echo $view_patient_services->AuthBy->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->AuthBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->AuthBy->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->AuthBy->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->AuthBy->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->AuthBy->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Authencate->Visible) { // Authencate ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->Authencate) == "") { ?>
		<th class="<?php echo $view_patient_services->Authencate->headerCellClass() ?>"><?php echo $view_patient_services->Authencate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->Authencate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->Authencate->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->Authencate->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->Authencate->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->Authencate->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->EditDate->Visible) { // EditDate ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->EditDate) == "") { ?>
		<th class="<?php echo $view_patient_services->EditDate->headerCellClass() ?>"><?php echo $view_patient_services->EditDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->EditDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->EditDate->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->EditDate->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->EditDate->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->EditDate->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->EditBy->Visible) { // EditBy ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->EditBy) == "") { ?>
		<th class="<?php echo $view_patient_services->EditBy->headerCellClass() ?>"><?php echo $view_patient_services->EditBy->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->EditBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->EditBy->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->EditBy->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->EditBy->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->EditBy->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Editted->Visible) { // Editted ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->Editted) == "") { ?>
		<th class="<?php echo $view_patient_services->Editted->headerCellClass() ?>"><?php echo $view_patient_services->Editted->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->Editted->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->Editted->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->Editted->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->Editted->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->Editted->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->PatID->Visible) { // PatID ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->PatID) == "") { ?>
		<th class="<?php echo $view_patient_services->PatID->headerCellClass() ?>"><?php echo $view_patient_services->PatID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->PatID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->PatID->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->PatID->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->PatID->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->PatID->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->PatientId->Visible) { // PatientId ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->PatientId) == "") { ?>
		<th class="<?php echo $view_patient_services->PatientId->headerCellClass() ?>"><?php echo $view_patient_services->PatientId->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->PatientId->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->PatientId->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->PatientId->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->PatientId->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->PatientId->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Mobile->Visible) { // Mobile ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->Mobile) == "") { ?>
		<th class="<?php echo $view_patient_services->Mobile->headerCellClass() ?>"><?php echo $view_patient_services->Mobile->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->Mobile->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->Mobile->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->Mobile->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->Mobile->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->Mobile->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->CId->Visible) { // CId ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->CId) == "") { ?>
		<th class="<?php echo $view_patient_services->CId->headerCellClass() ?>"><?php echo $view_patient_services->CId->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->CId->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->CId->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->CId->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->CId->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->CId->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Order->Visible) { // Order ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->Order) == "") { ?>
		<th class="<?php echo $view_patient_services->Order->headerCellClass() ?>"><?php echo $view_patient_services->Order->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->Order->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->Order->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->Order->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->Order->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->Order->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->ResType->Visible) { // ResType ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->ResType) == "") { ?>
		<th class="<?php echo $view_patient_services->ResType->headerCellClass() ?>"><?php echo $view_patient_services->ResType->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->ResType->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->ResType->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->ResType->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->ResType->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->ResType->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Sample->Visible) { // Sample ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->Sample) == "") { ?>
		<th class="<?php echo $view_patient_services->Sample->headerCellClass() ?>"><?php echo $view_patient_services->Sample->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->Sample->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->Sample->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->Sample->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->Sample->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->Sample->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->NoD->Visible) { // NoD ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->NoD) == "") { ?>
		<th class="<?php echo $view_patient_services->NoD->headerCellClass() ?>"><?php echo $view_patient_services->NoD->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->NoD->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->NoD->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->NoD->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->NoD->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->NoD->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->BillOrder->Visible) { // BillOrder ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->BillOrder) == "") { ?>
		<th class="<?php echo $view_patient_services->BillOrder->headerCellClass() ?>"><?php echo $view_patient_services->BillOrder->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->BillOrder->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->BillOrder->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->BillOrder->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->BillOrder->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->BillOrder->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Inactive->Visible) { // Inactive ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->Inactive) == "") { ?>
		<th class="<?php echo $view_patient_services->Inactive->headerCellClass() ?>"><?php echo $view_patient_services->Inactive->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->Inactive->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->Inactive->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->Inactive->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->Inactive->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->Inactive->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->CollSample->Visible) { // CollSample ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->CollSample) == "") { ?>
		<th class="<?php echo $view_patient_services->CollSample->headerCellClass() ?>"><?php echo $view_patient_services->CollSample->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->CollSample->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->CollSample->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->CollSample->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->CollSample->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->CollSample->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->TestType->Visible) { // TestType ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->TestType) == "") { ?>
		<th class="<?php echo $view_patient_services->TestType->headerCellClass() ?>"><?php echo $view_patient_services->TestType->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->TestType->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->TestType->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->TestType->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->TestType->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->TestType->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Repeated->Visible) { // Repeated ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->Repeated) == "") { ?>
		<th class="<?php echo $view_patient_services->Repeated->headerCellClass() ?>"><?php echo $view_patient_services->Repeated->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->Repeated->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->Repeated->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->Repeated->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->Repeated->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->Repeated->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->RepeatedBy->Visible) { // RepeatedBy ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->RepeatedBy) == "") { ?>
		<th class="<?php echo $view_patient_services->RepeatedBy->headerCellClass() ?>"><?php echo $view_patient_services->RepeatedBy->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->RepeatedBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->RepeatedBy->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->RepeatedBy->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->RepeatedBy->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->RepeatedBy->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->RepeatedDate->Visible) { // RepeatedDate ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->RepeatedDate) == "") { ?>
		<th class="<?php echo $view_patient_services->RepeatedDate->headerCellClass() ?>"><?php echo $view_patient_services->RepeatedDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->RepeatedDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->RepeatedDate->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->RepeatedDate->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->RepeatedDate->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->RepeatedDate->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->serviceID->Visible) { // serviceID ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->serviceID) == "") { ?>
		<th class="<?php echo $view_patient_services->serviceID->headerCellClass() ?>"><?php echo $view_patient_services->serviceID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->serviceID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->serviceID->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->serviceID->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->serviceID->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->serviceID->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Service_Type->Visible) { // Service_Type ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->Service_Type) == "") { ?>
		<th class="<?php echo $view_patient_services->Service_Type->headerCellClass() ?>"><?php echo $view_patient_services->Service_Type->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->Service_Type->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->Service_Type->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->Service_Type->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->Service_Type->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->Service_Type->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Service_Department->Visible) { // Service_Department ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->Service_Department) == "") { ?>
		<th class="<?php echo $view_patient_services->Service_Department->headerCellClass() ?>"><?php echo $view_patient_services->Service_Department->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->Service_Department->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->Service_Department->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->Service_Department->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->Service_Department->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->Service_Department->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->RequestNo->Visible) { // RequestNo ?>
	<?php if ($view_patient_services->SortUrl($view_patient_services->RequestNo) == "") { ?>
		<th class="<?php echo $view_patient_services->RequestNo->headerCellClass() ?>"><?php echo $view_patient_services->RequestNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_patient_services->RequestNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_patient_services->RequestNo->Name ?>" data-sort-order="<?php echo $view_patient_services_preview->SortField == $view_patient_services->RequestNo->Name && $view_patient_services_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_patient_services->RequestNo->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_patient_services_preview->SortField == $view_patient_services->RequestNo->Name) { ?><?php if ($view_patient_services_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_patient_services_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
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
$view_patient_services_preview->RowCnt = 0;
while ($view_patient_services_preview->Recordset && !$view_patient_services_preview->Recordset->EOF) {

	// Init row class and style
	$view_patient_services_preview->RecCount++;
	$view_patient_services_preview->RowCnt++;
	$view_patient_services_preview->CssStyle = "";
	$view_patient_services_preview->loadListRowValues($view_patient_services_preview->Recordset);
	$view_patient_services_preview->aggregateListRowValues(); // Aggregate row values

	// Render row
	$view_patient_services_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$view_patient_services_preview->resetAttributes();
	$view_patient_services_preview->renderListRow();

	// Render list options
	$view_patient_services_preview->renderListOptions();
?>
	<tr<?php echo $view_patient_services_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_patient_services_preview->ListOptions->render("body", "left", $view_patient_services_preview->RowCnt);
?>
<?php if ($view_patient_services->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $view_patient_services->id->cellAttributes() ?>>
<span<?php echo $view_patient_services->id->viewAttributes() ?>>
<?php echo $view_patient_services->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->Reception->Visible) { // Reception ?>
		<!-- Reception -->
		<td<?php echo $view_patient_services->Reception->cellAttributes() ?>>
<span<?php echo $view_patient_services->Reception->viewAttributes() ?>>
<?php echo $view_patient_services->Reception->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->mrnno->Visible) { // mrnno ?>
		<!-- mrnno -->
		<td<?php echo $view_patient_services->mrnno->cellAttributes() ?>>
<span<?php echo $view_patient_services->mrnno->viewAttributes() ?>>
<?php echo $view_patient_services->mrnno->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->PatientName->Visible) { // PatientName ?>
		<!-- PatientName -->
		<td<?php echo $view_patient_services->PatientName->cellAttributes() ?>>
<span<?php echo $view_patient_services->PatientName->viewAttributes() ?>>
<?php echo $view_patient_services->PatientName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->Age->Visible) { // Age ?>
		<!-- Age -->
		<td<?php echo $view_patient_services->Age->cellAttributes() ?>>
<span<?php echo $view_patient_services->Age->viewAttributes() ?>>
<?php echo $view_patient_services->Age->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->Gender->Visible) { // Gender ?>
		<!-- Gender -->
		<td<?php echo $view_patient_services->Gender->cellAttributes() ?>>
<span<?php echo $view_patient_services->Gender->viewAttributes() ?>>
<?php echo $view_patient_services->Gender->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->profilePic->Visible) { // profilePic ?>
		<!-- profilePic -->
		<td<?php echo $view_patient_services->profilePic->cellAttributes() ?>>
<span<?php echo $view_patient_services->profilePic->viewAttributes() ?>>
<?php echo $view_patient_services->profilePic->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->Services->Visible) { // Services ?>
		<!-- Services -->
		<td<?php echo $view_patient_services->Services->cellAttributes() ?>>
<span<?php echo $view_patient_services->Services->viewAttributes() ?>>
<?php echo $view_patient_services->Services->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->Unit->Visible) { // Unit ?>
		<!-- Unit -->
		<td<?php echo $view_patient_services->Unit->cellAttributes() ?>>
<span<?php echo $view_patient_services->Unit->viewAttributes() ?>>
<?php echo $view_patient_services->Unit->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->amount->Visible) { // amount ?>
		<!-- amount -->
		<td<?php echo $view_patient_services->amount->cellAttributes() ?>>
<span<?php echo $view_patient_services->amount->viewAttributes() ?>>
<?php echo $view_patient_services->amount->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->Quantity->Visible) { // Quantity ?>
		<!-- Quantity -->
		<td<?php echo $view_patient_services->Quantity->cellAttributes() ?>>
<span<?php echo $view_patient_services->Quantity->viewAttributes() ?>>
<?php echo $view_patient_services->Quantity->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->DiscountCategory->Visible) { // DiscountCategory ?>
		<!-- DiscountCategory -->
		<td<?php echo $view_patient_services->DiscountCategory->cellAttributes() ?>>
<span<?php echo $view_patient_services->DiscountCategory->viewAttributes() ?>>
<?php echo $view_patient_services->DiscountCategory->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->Discount->Visible) { // Discount ?>
		<!-- Discount -->
		<td<?php echo $view_patient_services->Discount->cellAttributes() ?>>
<span<?php echo $view_patient_services->Discount->viewAttributes() ?>>
<?php echo $view_patient_services->Discount->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->SubTotal->Visible) { // SubTotal ?>
		<!-- SubTotal -->
		<td<?php echo $view_patient_services->SubTotal->cellAttributes() ?>>
<span<?php echo $view_patient_services->SubTotal->viewAttributes() ?>>
<?php echo $view_patient_services->SubTotal->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->description->Visible) { // description ?>
		<!-- description -->
		<td<?php echo $view_patient_services->description->cellAttributes() ?>>
<span<?php echo $view_patient_services->description->viewAttributes() ?>>
<?php echo $view_patient_services->description->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->patient_type->Visible) { // patient_type ?>
		<!-- patient_type -->
		<td<?php echo $view_patient_services->patient_type->cellAttributes() ?>>
<span<?php echo $view_patient_services->patient_type->viewAttributes() ?>>
<?php echo $view_patient_services->patient_type->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->charged_date->Visible) { // charged_date ?>
		<!-- charged_date -->
		<td<?php echo $view_patient_services->charged_date->cellAttributes() ?>>
<span<?php echo $view_patient_services->charged_date->viewAttributes() ?>>
<?php echo $view_patient_services->charged_date->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->status->Visible) { // status ?>
		<!-- status -->
		<td<?php echo $view_patient_services->status->cellAttributes() ?>>
<span<?php echo $view_patient_services->status->viewAttributes() ?>>
<?php echo $view_patient_services->status->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->createdby->Visible) { // createdby ?>
		<!-- createdby -->
		<td<?php echo $view_patient_services->createdby->cellAttributes() ?>>
<span<?php echo $view_patient_services->createdby->viewAttributes() ?>>
<?php echo $view_patient_services->createdby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->createddatetime->Visible) { // createddatetime ?>
		<!-- createddatetime -->
		<td<?php echo $view_patient_services->createddatetime->cellAttributes() ?>>
<span<?php echo $view_patient_services->createddatetime->viewAttributes() ?>>
<?php echo $view_patient_services->createddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->modifiedby->Visible) { // modifiedby ?>
		<!-- modifiedby -->
		<td<?php echo $view_patient_services->modifiedby->cellAttributes() ?>>
<span<?php echo $view_patient_services->modifiedby->viewAttributes() ?>>
<?php echo $view_patient_services->modifiedby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->modifieddatetime->Visible) { // modifieddatetime ?>
		<!-- modifieddatetime -->
		<td<?php echo $view_patient_services->modifieddatetime->cellAttributes() ?>>
<span<?php echo $view_patient_services->modifieddatetime->viewAttributes() ?>>
<?php echo $view_patient_services->modifieddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->Aid->Visible) { // Aid ?>
		<!-- Aid -->
		<td<?php echo $view_patient_services->Aid->cellAttributes() ?>>
<span<?php echo $view_patient_services->Aid->viewAttributes() ?>>
<?php echo $view_patient_services->Aid->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->Vid->Visible) { // Vid ?>
		<!-- Vid -->
		<td<?php echo $view_patient_services->Vid->cellAttributes() ?>>
<span<?php echo $view_patient_services->Vid->viewAttributes() ?>>
<?php echo $view_patient_services->Vid->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->DrID->Visible) { // DrID ?>
		<!-- DrID -->
		<td<?php echo $view_patient_services->DrID->cellAttributes() ?>>
<span<?php echo $view_patient_services->DrID->viewAttributes() ?>>
<?php echo $view_patient_services->DrID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->DrCODE->Visible) { // DrCODE ?>
		<!-- DrCODE -->
		<td<?php echo $view_patient_services->DrCODE->cellAttributes() ?>>
<span<?php echo $view_patient_services->DrCODE->viewAttributes() ?>>
<?php echo $view_patient_services->DrCODE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->DrName->Visible) { // DrName ?>
		<!-- DrName -->
		<td<?php echo $view_patient_services->DrName->cellAttributes() ?>>
<span<?php echo $view_patient_services->DrName->viewAttributes() ?>>
<?php echo $view_patient_services->DrName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->Department->Visible) { // Department ?>
		<!-- Department -->
		<td<?php echo $view_patient_services->Department->cellAttributes() ?>>
<span<?php echo $view_patient_services->Department->viewAttributes() ?>>
<?php echo $view_patient_services->Department->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->DrSharePres->Visible) { // DrSharePres ?>
		<!-- DrSharePres -->
		<td<?php echo $view_patient_services->DrSharePres->cellAttributes() ?>>
<span<?php echo $view_patient_services->DrSharePres->viewAttributes() ?>>
<?php echo $view_patient_services->DrSharePres->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->HospSharePres->Visible) { // HospSharePres ?>
		<!-- HospSharePres -->
		<td<?php echo $view_patient_services->HospSharePres->cellAttributes() ?>>
<span<?php echo $view_patient_services->HospSharePres->viewAttributes() ?>>
<?php echo $view_patient_services->HospSharePres->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->DrShareAmount->Visible) { // DrShareAmount ?>
		<!-- DrShareAmount -->
		<td<?php echo $view_patient_services->DrShareAmount->cellAttributes() ?>>
<span<?php echo $view_patient_services->DrShareAmount->viewAttributes() ?>>
<?php echo $view_patient_services->DrShareAmount->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->HospShareAmount->Visible) { // HospShareAmount ?>
		<!-- HospShareAmount -->
		<td<?php echo $view_patient_services->HospShareAmount->cellAttributes() ?>>
<span<?php echo $view_patient_services->HospShareAmount->viewAttributes() ?>>
<?php echo $view_patient_services->HospShareAmount->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->DrShareSettiledAmount->Visible) { // DrShareSettiledAmount ?>
		<!-- DrShareSettiledAmount -->
		<td<?php echo $view_patient_services->DrShareSettiledAmount->cellAttributes() ?>>
<span<?php echo $view_patient_services->DrShareSettiledAmount->viewAttributes() ?>>
<?php echo $view_patient_services->DrShareSettiledAmount->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->DrShareSettledId->Visible) { // DrShareSettledId ?>
		<!-- DrShareSettledId -->
		<td<?php echo $view_patient_services->DrShareSettledId->cellAttributes() ?>>
<span<?php echo $view_patient_services->DrShareSettledId->viewAttributes() ?>>
<?php echo $view_patient_services->DrShareSettledId->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->DrShareSettiledStatus->Visible) { // DrShareSettiledStatus ?>
		<!-- DrShareSettiledStatus -->
		<td<?php echo $view_patient_services->DrShareSettiledStatus->cellAttributes() ?>>
<span<?php echo $view_patient_services->DrShareSettiledStatus->viewAttributes() ?>>
<?php echo $view_patient_services->DrShareSettiledStatus->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->invoiceId->Visible) { // invoiceId ?>
		<!-- invoiceId -->
		<td<?php echo $view_patient_services->invoiceId->cellAttributes() ?>>
<span<?php echo $view_patient_services->invoiceId->viewAttributes() ?>>
<?php echo $view_patient_services->invoiceId->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->invoiceAmount->Visible) { // invoiceAmount ?>
		<!-- invoiceAmount -->
		<td<?php echo $view_patient_services->invoiceAmount->cellAttributes() ?>>
<span<?php echo $view_patient_services->invoiceAmount->viewAttributes() ?>>
<?php echo $view_patient_services->invoiceAmount->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->invoiceStatus->Visible) { // invoiceStatus ?>
		<!-- invoiceStatus -->
		<td<?php echo $view_patient_services->invoiceStatus->cellAttributes() ?>>
<span<?php echo $view_patient_services->invoiceStatus->viewAttributes() ?>>
<?php echo $view_patient_services->invoiceStatus->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->modeOfPayment->Visible) { // modeOfPayment ?>
		<!-- modeOfPayment -->
		<td<?php echo $view_patient_services->modeOfPayment->cellAttributes() ?>>
<span<?php echo $view_patient_services->modeOfPayment->viewAttributes() ?>>
<?php echo $view_patient_services->modeOfPayment->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->HospID->Visible) { // HospID ?>
		<!-- HospID -->
		<td<?php echo $view_patient_services->HospID->cellAttributes() ?>>
<span<?php echo $view_patient_services->HospID->viewAttributes() ?>>
<?php echo $view_patient_services->HospID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->RIDNO->Visible) { // RIDNO ?>
		<!-- RIDNO -->
		<td<?php echo $view_patient_services->RIDNO->cellAttributes() ?>>
<span<?php echo $view_patient_services->RIDNO->viewAttributes() ?>>
<?php echo $view_patient_services->RIDNO->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->ItemCode->Visible) { // ItemCode ?>
		<!-- ItemCode -->
		<td<?php echo $view_patient_services->ItemCode->cellAttributes() ?>>
<span<?php echo $view_patient_services->ItemCode->viewAttributes() ?>>
<?php echo $view_patient_services->ItemCode->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->TidNo->Visible) { // TidNo ?>
		<!-- TidNo -->
		<td<?php echo $view_patient_services->TidNo->cellAttributes() ?>>
<span<?php echo $view_patient_services->TidNo->viewAttributes() ?>>
<?php echo $view_patient_services->TidNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->sid->Visible) { // sid ?>
		<!-- sid -->
		<td<?php echo $view_patient_services->sid->cellAttributes() ?>>
<span<?php echo $view_patient_services->sid->viewAttributes() ?>>
<?php echo $view_patient_services->sid->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->TestSubCd->Visible) { // TestSubCd ?>
		<!-- TestSubCd -->
		<td<?php echo $view_patient_services->TestSubCd->cellAttributes() ?>>
<span<?php echo $view_patient_services->TestSubCd->viewAttributes() ?>>
<?php echo $view_patient_services->TestSubCd->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->DEptCd->Visible) { // DEptCd ?>
		<!-- DEptCd -->
		<td<?php echo $view_patient_services->DEptCd->cellAttributes() ?>>
<span<?php echo $view_patient_services->DEptCd->viewAttributes() ?>>
<?php echo $view_patient_services->DEptCd->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->ProfCd->Visible) { // ProfCd ?>
		<!-- ProfCd -->
		<td<?php echo $view_patient_services->ProfCd->cellAttributes() ?>>
<span<?php echo $view_patient_services->ProfCd->viewAttributes() ?>>
<?php echo $view_patient_services->ProfCd->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->Comments->Visible) { // Comments ?>
		<!-- Comments -->
		<td<?php echo $view_patient_services->Comments->cellAttributes() ?>>
<span<?php echo $view_patient_services->Comments->viewAttributes() ?>>
<?php echo $view_patient_services->Comments->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->Method->Visible) { // Method ?>
		<!-- Method -->
		<td<?php echo $view_patient_services->Method->cellAttributes() ?>>
<span<?php echo $view_patient_services->Method->viewAttributes() ?>>
<?php echo $view_patient_services->Method->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->Specimen->Visible) { // Specimen ?>
		<!-- Specimen -->
		<td<?php echo $view_patient_services->Specimen->cellAttributes() ?>>
<span<?php echo $view_patient_services->Specimen->viewAttributes() ?>>
<?php echo $view_patient_services->Specimen->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->Abnormal->Visible) { // Abnormal ?>
		<!-- Abnormal -->
		<td<?php echo $view_patient_services->Abnormal->cellAttributes() ?>>
<span<?php echo $view_patient_services->Abnormal->viewAttributes() ?>>
<?php echo $view_patient_services->Abnormal->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->TestUnit->Visible) { // TestUnit ?>
		<!-- TestUnit -->
		<td<?php echo $view_patient_services->TestUnit->cellAttributes() ?>>
<span<?php echo $view_patient_services->TestUnit->viewAttributes() ?>>
<?php echo $view_patient_services->TestUnit->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->LOWHIGH->Visible) { // LOWHIGH ?>
		<!-- LOWHIGH -->
		<td<?php echo $view_patient_services->LOWHIGH->cellAttributes() ?>>
<span<?php echo $view_patient_services->LOWHIGH->viewAttributes() ?>>
<?php echo $view_patient_services->LOWHIGH->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->Branch->Visible) { // Branch ?>
		<!-- Branch -->
		<td<?php echo $view_patient_services->Branch->cellAttributes() ?>>
<span<?php echo $view_patient_services->Branch->viewAttributes() ?>>
<?php echo $view_patient_services->Branch->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->Dispatch->Visible) { // Dispatch ?>
		<!-- Dispatch -->
		<td<?php echo $view_patient_services->Dispatch->cellAttributes() ?>>
<span<?php echo $view_patient_services->Dispatch->viewAttributes() ?>>
<?php echo $view_patient_services->Dispatch->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->Pic1->Visible) { // Pic1 ?>
		<!-- Pic1 -->
		<td<?php echo $view_patient_services->Pic1->cellAttributes() ?>>
<span<?php echo $view_patient_services->Pic1->viewAttributes() ?>>
<?php echo $view_patient_services->Pic1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->Pic2->Visible) { // Pic2 ?>
		<!-- Pic2 -->
		<td<?php echo $view_patient_services->Pic2->cellAttributes() ?>>
<span<?php echo $view_patient_services->Pic2->viewAttributes() ?>>
<?php echo $view_patient_services->Pic2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->GraphPath->Visible) { // GraphPath ?>
		<!-- GraphPath -->
		<td<?php echo $view_patient_services->GraphPath->cellAttributes() ?>>
<span<?php echo $view_patient_services->GraphPath->viewAttributes() ?>>
<?php echo $view_patient_services->GraphPath->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->MachineCD->Visible) { // MachineCD ?>
		<!-- MachineCD -->
		<td<?php echo $view_patient_services->MachineCD->cellAttributes() ?>>
<span<?php echo $view_patient_services->MachineCD->viewAttributes() ?>>
<?php echo $view_patient_services->MachineCD->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->TestCancel->Visible) { // TestCancel ?>
		<!-- TestCancel -->
		<td<?php echo $view_patient_services->TestCancel->cellAttributes() ?>>
<span<?php echo $view_patient_services->TestCancel->viewAttributes() ?>>
<?php echo $view_patient_services->TestCancel->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->OutSource->Visible) { // OutSource ?>
		<!-- OutSource -->
		<td<?php echo $view_patient_services->OutSource->cellAttributes() ?>>
<span<?php echo $view_patient_services->OutSource->viewAttributes() ?>>
<?php echo $view_patient_services->OutSource->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->Printed->Visible) { // Printed ?>
		<!-- Printed -->
		<td<?php echo $view_patient_services->Printed->cellAttributes() ?>>
<span<?php echo $view_patient_services->Printed->viewAttributes() ?>>
<?php echo $view_patient_services->Printed->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->PrintBy->Visible) { // PrintBy ?>
		<!-- PrintBy -->
		<td<?php echo $view_patient_services->PrintBy->cellAttributes() ?>>
<span<?php echo $view_patient_services->PrintBy->viewAttributes() ?>>
<?php echo $view_patient_services->PrintBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->PrintDate->Visible) { // PrintDate ?>
		<!-- PrintDate -->
		<td<?php echo $view_patient_services->PrintDate->cellAttributes() ?>>
<span<?php echo $view_patient_services->PrintDate->viewAttributes() ?>>
<?php echo $view_patient_services->PrintDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->BillingDate->Visible) { // BillingDate ?>
		<!-- BillingDate -->
		<td<?php echo $view_patient_services->BillingDate->cellAttributes() ?>>
<span<?php echo $view_patient_services->BillingDate->viewAttributes() ?>>
<?php echo $view_patient_services->BillingDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->BilledBy->Visible) { // BilledBy ?>
		<!-- BilledBy -->
		<td<?php echo $view_patient_services->BilledBy->cellAttributes() ?>>
<span<?php echo $view_patient_services->BilledBy->viewAttributes() ?>>
<?php echo $view_patient_services->BilledBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->Resulted->Visible) { // Resulted ?>
		<!-- Resulted -->
		<td<?php echo $view_patient_services->Resulted->cellAttributes() ?>>
<span<?php echo $view_patient_services->Resulted->viewAttributes() ?>>
<?php echo $view_patient_services->Resulted->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->ResultDate->Visible) { // ResultDate ?>
		<!-- ResultDate -->
		<td<?php echo $view_patient_services->ResultDate->cellAttributes() ?>>
<span<?php echo $view_patient_services->ResultDate->viewAttributes() ?>>
<?php echo $view_patient_services->ResultDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->ResultedBy->Visible) { // ResultedBy ?>
		<!-- ResultedBy -->
		<td<?php echo $view_patient_services->ResultedBy->cellAttributes() ?>>
<span<?php echo $view_patient_services->ResultedBy->viewAttributes() ?>>
<?php echo $view_patient_services->ResultedBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->SampleDate->Visible) { // SampleDate ?>
		<!-- SampleDate -->
		<td<?php echo $view_patient_services->SampleDate->cellAttributes() ?>>
<span<?php echo $view_patient_services->SampleDate->viewAttributes() ?>>
<?php echo $view_patient_services->SampleDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->SampleUser->Visible) { // SampleUser ?>
		<!-- SampleUser -->
		<td<?php echo $view_patient_services->SampleUser->cellAttributes() ?>>
<span<?php echo $view_patient_services->SampleUser->viewAttributes() ?>>
<?php echo $view_patient_services->SampleUser->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->Sampled->Visible) { // Sampled ?>
		<!-- Sampled -->
		<td<?php echo $view_patient_services->Sampled->cellAttributes() ?>>
<span<?php echo $view_patient_services->Sampled->viewAttributes() ?>>
<?php echo $view_patient_services->Sampled->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->ReceivedDate->Visible) { // ReceivedDate ?>
		<!-- ReceivedDate -->
		<td<?php echo $view_patient_services->ReceivedDate->cellAttributes() ?>>
<span<?php echo $view_patient_services->ReceivedDate->viewAttributes() ?>>
<?php echo $view_patient_services->ReceivedDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->ReceivedUser->Visible) { // ReceivedUser ?>
		<!-- ReceivedUser -->
		<td<?php echo $view_patient_services->ReceivedUser->cellAttributes() ?>>
<span<?php echo $view_patient_services->ReceivedUser->viewAttributes() ?>>
<?php echo $view_patient_services->ReceivedUser->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->Recevied->Visible) { // Recevied ?>
		<!-- Recevied -->
		<td<?php echo $view_patient_services->Recevied->cellAttributes() ?>>
<span<?php echo $view_patient_services->Recevied->viewAttributes() ?>>
<?php echo $view_patient_services->Recevied->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->DeptRecvDate->Visible) { // DeptRecvDate ?>
		<!-- DeptRecvDate -->
		<td<?php echo $view_patient_services->DeptRecvDate->cellAttributes() ?>>
<span<?php echo $view_patient_services->DeptRecvDate->viewAttributes() ?>>
<?php echo $view_patient_services->DeptRecvDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->DeptRecvUser->Visible) { // DeptRecvUser ?>
		<!-- DeptRecvUser -->
		<td<?php echo $view_patient_services->DeptRecvUser->cellAttributes() ?>>
<span<?php echo $view_patient_services->DeptRecvUser->viewAttributes() ?>>
<?php echo $view_patient_services->DeptRecvUser->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->DeptRecived->Visible) { // DeptRecived ?>
		<!-- DeptRecived -->
		<td<?php echo $view_patient_services->DeptRecived->cellAttributes() ?>>
<span<?php echo $view_patient_services->DeptRecived->viewAttributes() ?>>
<?php echo $view_patient_services->DeptRecived->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->SAuthDate->Visible) { // SAuthDate ?>
		<!-- SAuthDate -->
		<td<?php echo $view_patient_services->SAuthDate->cellAttributes() ?>>
<span<?php echo $view_patient_services->SAuthDate->viewAttributes() ?>>
<?php echo $view_patient_services->SAuthDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->SAuthBy->Visible) { // SAuthBy ?>
		<!-- SAuthBy -->
		<td<?php echo $view_patient_services->SAuthBy->cellAttributes() ?>>
<span<?php echo $view_patient_services->SAuthBy->viewAttributes() ?>>
<?php echo $view_patient_services->SAuthBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->SAuthendicate->Visible) { // SAuthendicate ?>
		<!-- SAuthendicate -->
		<td<?php echo $view_patient_services->SAuthendicate->cellAttributes() ?>>
<span<?php echo $view_patient_services->SAuthendicate->viewAttributes() ?>>
<?php echo $view_patient_services->SAuthendicate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->AuthDate->Visible) { // AuthDate ?>
		<!-- AuthDate -->
		<td<?php echo $view_patient_services->AuthDate->cellAttributes() ?>>
<span<?php echo $view_patient_services->AuthDate->viewAttributes() ?>>
<?php echo $view_patient_services->AuthDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->AuthBy->Visible) { // AuthBy ?>
		<!-- AuthBy -->
		<td<?php echo $view_patient_services->AuthBy->cellAttributes() ?>>
<span<?php echo $view_patient_services->AuthBy->viewAttributes() ?>>
<?php echo $view_patient_services->AuthBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->Authencate->Visible) { // Authencate ?>
		<!-- Authencate -->
		<td<?php echo $view_patient_services->Authencate->cellAttributes() ?>>
<span<?php echo $view_patient_services->Authencate->viewAttributes() ?>>
<?php echo $view_patient_services->Authencate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->EditDate->Visible) { // EditDate ?>
		<!-- EditDate -->
		<td<?php echo $view_patient_services->EditDate->cellAttributes() ?>>
<span<?php echo $view_patient_services->EditDate->viewAttributes() ?>>
<?php echo $view_patient_services->EditDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->EditBy->Visible) { // EditBy ?>
		<!-- EditBy -->
		<td<?php echo $view_patient_services->EditBy->cellAttributes() ?>>
<span<?php echo $view_patient_services->EditBy->viewAttributes() ?>>
<?php echo $view_patient_services->EditBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->Editted->Visible) { // Editted ?>
		<!-- Editted -->
		<td<?php echo $view_patient_services->Editted->cellAttributes() ?>>
<span<?php echo $view_patient_services->Editted->viewAttributes() ?>>
<?php echo $view_patient_services->Editted->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->PatID->Visible) { // PatID ?>
		<!-- PatID -->
		<td<?php echo $view_patient_services->PatID->cellAttributes() ?>>
<span<?php echo $view_patient_services->PatID->viewAttributes() ?>>
<?php echo $view_patient_services->PatID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->PatientId->Visible) { // PatientId ?>
		<!-- PatientId -->
		<td<?php echo $view_patient_services->PatientId->cellAttributes() ?>>
<span<?php echo $view_patient_services->PatientId->viewAttributes() ?>>
<?php echo $view_patient_services->PatientId->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->Mobile->Visible) { // Mobile ?>
		<!-- Mobile -->
		<td<?php echo $view_patient_services->Mobile->cellAttributes() ?>>
<span<?php echo $view_patient_services->Mobile->viewAttributes() ?>>
<?php echo $view_patient_services->Mobile->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->CId->Visible) { // CId ?>
		<!-- CId -->
		<td<?php echo $view_patient_services->CId->cellAttributes() ?>>
<span<?php echo $view_patient_services->CId->viewAttributes() ?>>
<?php echo $view_patient_services->CId->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->Order->Visible) { // Order ?>
		<!-- Order -->
		<td<?php echo $view_patient_services->Order->cellAttributes() ?>>
<span<?php echo $view_patient_services->Order->viewAttributes() ?>>
<?php echo $view_patient_services->Order->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->ResType->Visible) { // ResType ?>
		<!-- ResType -->
		<td<?php echo $view_patient_services->ResType->cellAttributes() ?>>
<span<?php echo $view_patient_services->ResType->viewAttributes() ?>>
<?php echo $view_patient_services->ResType->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->Sample->Visible) { // Sample ?>
		<!-- Sample -->
		<td<?php echo $view_patient_services->Sample->cellAttributes() ?>>
<span<?php echo $view_patient_services->Sample->viewAttributes() ?>>
<?php echo $view_patient_services->Sample->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->NoD->Visible) { // NoD ?>
		<!-- NoD -->
		<td<?php echo $view_patient_services->NoD->cellAttributes() ?>>
<span<?php echo $view_patient_services->NoD->viewAttributes() ?>>
<?php echo $view_patient_services->NoD->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->BillOrder->Visible) { // BillOrder ?>
		<!-- BillOrder -->
		<td<?php echo $view_patient_services->BillOrder->cellAttributes() ?>>
<span<?php echo $view_patient_services->BillOrder->viewAttributes() ?>>
<?php echo $view_patient_services->BillOrder->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->Inactive->Visible) { // Inactive ?>
		<!-- Inactive -->
		<td<?php echo $view_patient_services->Inactive->cellAttributes() ?>>
<span<?php echo $view_patient_services->Inactive->viewAttributes() ?>>
<?php echo $view_patient_services->Inactive->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->CollSample->Visible) { // CollSample ?>
		<!-- CollSample -->
		<td<?php echo $view_patient_services->CollSample->cellAttributes() ?>>
<span<?php echo $view_patient_services->CollSample->viewAttributes() ?>>
<?php echo $view_patient_services->CollSample->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->TestType->Visible) { // TestType ?>
		<!-- TestType -->
		<td<?php echo $view_patient_services->TestType->cellAttributes() ?>>
<span<?php echo $view_patient_services->TestType->viewAttributes() ?>>
<?php echo $view_patient_services->TestType->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->Repeated->Visible) { // Repeated ?>
		<!-- Repeated -->
		<td<?php echo $view_patient_services->Repeated->cellAttributes() ?>>
<span<?php echo $view_patient_services->Repeated->viewAttributes() ?>>
<?php echo $view_patient_services->Repeated->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->RepeatedBy->Visible) { // RepeatedBy ?>
		<!-- RepeatedBy -->
		<td<?php echo $view_patient_services->RepeatedBy->cellAttributes() ?>>
<span<?php echo $view_patient_services->RepeatedBy->viewAttributes() ?>>
<?php echo $view_patient_services->RepeatedBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->RepeatedDate->Visible) { // RepeatedDate ?>
		<!-- RepeatedDate -->
		<td<?php echo $view_patient_services->RepeatedDate->cellAttributes() ?>>
<span<?php echo $view_patient_services->RepeatedDate->viewAttributes() ?>>
<?php echo $view_patient_services->RepeatedDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->serviceID->Visible) { // serviceID ?>
		<!-- serviceID -->
		<td<?php echo $view_patient_services->serviceID->cellAttributes() ?>>
<span<?php echo $view_patient_services->serviceID->viewAttributes() ?>>
<?php echo $view_patient_services->serviceID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->Service_Type->Visible) { // Service_Type ?>
		<!-- Service_Type -->
		<td<?php echo $view_patient_services->Service_Type->cellAttributes() ?>>
<span<?php echo $view_patient_services->Service_Type->viewAttributes() ?>>
<?php echo $view_patient_services->Service_Type->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->Service_Department->Visible) { // Service_Department ?>
		<!-- Service_Department -->
		<td<?php echo $view_patient_services->Service_Department->cellAttributes() ?>>
<span<?php echo $view_patient_services->Service_Department->viewAttributes() ?>>
<?php echo $view_patient_services->Service_Department->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_patient_services->RequestNo->Visible) { // RequestNo ?>
		<!-- RequestNo -->
		<td<?php echo $view_patient_services->RequestNo->cellAttributes() ?>>
<span<?php echo $view_patient_services->RequestNo->viewAttributes() ?>>
<?php echo $view_patient_services->RequestNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$view_patient_services_preview->ListOptions->render("body", "right", $view_patient_services_preview->RowCnt);
?>
	</tr>
<?php
	$view_patient_services_preview->Recordset->MoveNext();
}
?>
	</tbody>
<?php

	// Render aggregate row
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
<?php if ($view_patient_services->id->Visible) { // id ?>
		<!-- id -->
		<td class="<?php echo $view_patient_services->id->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->Reception->Visible) { // Reception ?>
		<!-- Reception -->
		<td class="<?php echo $view_patient_services->Reception->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->mrnno->Visible) { // mrnno ?>
		<!-- mrnno -->
		<td class="<?php echo $view_patient_services->mrnno->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->PatientName->Visible) { // PatientName ?>
		<!-- PatientName -->
		<td class="<?php echo $view_patient_services->PatientName->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->Age->Visible) { // Age ?>
		<!-- Age -->
		<td class="<?php echo $view_patient_services->Age->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->Gender->Visible) { // Gender ?>
		<!-- Gender -->
		<td class="<?php echo $view_patient_services->Gender->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->profilePic->Visible) { // profilePic ?>
		<!-- profilePic -->
		<td class="<?php echo $view_patient_services->profilePic->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->Services->Visible) { // Services ?>
		<!-- Services -->
		<td class="<?php echo $view_patient_services->Services->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->Unit->Visible) { // Unit ?>
		<!-- Unit -->
		<td class="<?php echo $view_patient_services->Unit->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->amount->Visible) { // amount ?>
		<!-- amount -->
		<td class="<?php echo $view_patient_services->amount->footerCellClass() ?>">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_patient_services->amount->ViewValue ?></span>
		</td>
<?php } ?>
<?php if ($view_patient_services->Quantity->Visible) { // Quantity ?>
		<!-- Quantity -->
		<td class="<?php echo $view_patient_services->Quantity->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->DiscountCategory->Visible) { // DiscountCategory ?>
		<!-- DiscountCategory -->
		<td class="<?php echo $view_patient_services->DiscountCategory->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->Discount->Visible) { // Discount ?>
		<!-- Discount -->
		<td class="<?php echo $view_patient_services->Discount->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->SubTotal->Visible) { // SubTotal ?>
		<!-- SubTotal -->
		<td class="<?php echo $view_patient_services->SubTotal->footerCellClass() ?>">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_patient_services->SubTotal->ViewValue ?></span>
		</td>
<?php } ?>
<?php if ($view_patient_services->description->Visible) { // description ?>
		<!-- description -->
		<td class="<?php echo $view_patient_services->description->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->patient_type->Visible) { // patient_type ?>
		<!-- patient_type -->
		<td class="<?php echo $view_patient_services->patient_type->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->charged_date->Visible) { // charged_date ?>
		<!-- charged_date -->
		<td class="<?php echo $view_patient_services->charged_date->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->status->Visible) { // status ?>
		<!-- status -->
		<td class="<?php echo $view_patient_services->status->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->createdby->Visible) { // createdby ?>
		<!-- createdby -->
		<td class="<?php echo $view_patient_services->createdby->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->createddatetime->Visible) { // createddatetime ?>
		<!-- createddatetime -->
		<td class="<?php echo $view_patient_services->createddatetime->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->modifiedby->Visible) { // modifiedby ?>
		<!-- modifiedby -->
		<td class="<?php echo $view_patient_services->modifiedby->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->modifieddatetime->Visible) { // modifieddatetime ?>
		<!-- modifieddatetime -->
		<td class="<?php echo $view_patient_services->modifieddatetime->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->Aid->Visible) { // Aid ?>
		<!-- Aid -->
		<td class="<?php echo $view_patient_services->Aid->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->Vid->Visible) { // Vid ?>
		<!-- Vid -->
		<td class="<?php echo $view_patient_services->Vid->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->DrID->Visible) { // DrID ?>
		<!-- DrID -->
		<td class="<?php echo $view_patient_services->DrID->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->DrCODE->Visible) { // DrCODE ?>
		<!-- DrCODE -->
		<td class="<?php echo $view_patient_services->DrCODE->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->DrName->Visible) { // DrName ?>
		<!-- DrName -->
		<td class="<?php echo $view_patient_services->DrName->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->Department->Visible) { // Department ?>
		<!-- Department -->
		<td class="<?php echo $view_patient_services->Department->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->DrSharePres->Visible) { // DrSharePres ?>
		<!-- DrSharePres -->
		<td class="<?php echo $view_patient_services->DrSharePres->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->HospSharePres->Visible) { // HospSharePres ?>
		<!-- HospSharePres -->
		<td class="<?php echo $view_patient_services->HospSharePres->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->DrShareAmount->Visible) { // DrShareAmount ?>
		<!-- DrShareAmount -->
		<td class="<?php echo $view_patient_services->DrShareAmount->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->HospShareAmount->Visible) { // HospShareAmount ?>
		<!-- HospShareAmount -->
		<td class="<?php echo $view_patient_services->HospShareAmount->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->DrShareSettiledAmount->Visible) { // DrShareSettiledAmount ?>
		<!-- DrShareSettiledAmount -->
		<td class="<?php echo $view_patient_services->DrShareSettiledAmount->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->DrShareSettledId->Visible) { // DrShareSettledId ?>
		<!-- DrShareSettledId -->
		<td class="<?php echo $view_patient_services->DrShareSettledId->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->DrShareSettiledStatus->Visible) { // DrShareSettiledStatus ?>
		<!-- DrShareSettiledStatus -->
		<td class="<?php echo $view_patient_services->DrShareSettiledStatus->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->invoiceId->Visible) { // invoiceId ?>
		<!-- invoiceId -->
		<td class="<?php echo $view_patient_services->invoiceId->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->invoiceAmount->Visible) { // invoiceAmount ?>
		<!-- invoiceAmount -->
		<td class="<?php echo $view_patient_services->invoiceAmount->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->invoiceStatus->Visible) { // invoiceStatus ?>
		<!-- invoiceStatus -->
		<td class="<?php echo $view_patient_services->invoiceStatus->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->modeOfPayment->Visible) { // modeOfPayment ?>
		<!-- modeOfPayment -->
		<td class="<?php echo $view_patient_services->modeOfPayment->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->HospID->Visible) { // HospID ?>
		<!-- HospID -->
		<td class="<?php echo $view_patient_services->HospID->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->RIDNO->Visible) { // RIDNO ?>
		<!-- RIDNO -->
		<td class="<?php echo $view_patient_services->RIDNO->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->ItemCode->Visible) { // ItemCode ?>
		<!-- ItemCode -->
		<td class="<?php echo $view_patient_services->ItemCode->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->TidNo->Visible) { // TidNo ?>
		<!-- TidNo -->
		<td class="<?php echo $view_patient_services->TidNo->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->sid->Visible) { // sid ?>
		<!-- sid -->
		<td class="<?php echo $view_patient_services->sid->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->TestSubCd->Visible) { // TestSubCd ?>
		<!-- TestSubCd -->
		<td class="<?php echo $view_patient_services->TestSubCd->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->DEptCd->Visible) { // DEptCd ?>
		<!-- DEptCd -->
		<td class="<?php echo $view_patient_services->DEptCd->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->ProfCd->Visible) { // ProfCd ?>
		<!-- ProfCd -->
		<td class="<?php echo $view_patient_services->ProfCd->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->Comments->Visible) { // Comments ?>
		<!-- Comments -->
		<td class="<?php echo $view_patient_services->Comments->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->Method->Visible) { // Method ?>
		<!-- Method -->
		<td class="<?php echo $view_patient_services->Method->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->Specimen->Visible) { // Specimen ?>
		<!-- Specimen -->
		<td class="<?php echo $view_patient_services->Specimen->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->Abnormal->Visible) { // Abnormal ?>
		<!-- Abnormal -->
		<td class="<?php echo $view_patient_services->Abnormal->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->TestUnit->Visible) { // TestUnit ?>
		<!-- TestUnit -->
		<td class="<?php echo $view_patient_services->TestUnit->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->LOWHIGH->Visible) { // LOWHIGH ?>
		<!-- LOWHIGH -->
		<td class="<?php echo $view_patient_services->LOWHIGH->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->Branch->Visible) { // Branch ?>
		<!-- Branch -->
		<td class="<?php echo $view_patient_services->Branch->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->Dispatch->Visible) { // Dispatch ?>
		<!-- Dispatch -->
		<td class="<?php echo $view_patient_services->Dispatch->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->Pic1->Visible) { // Pic1 ?>
		<!-- Pic1 -->
		<td class="<?php echo $view_patient_services->Pic1->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->Pic2->Visible) { // Pic2 ?>
		<!-- Pic2 -->
		<td class="<?php echo $view_patient_services->Pic2->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->GraphPath->Visible) { // GraphPath ?>
		<!-- GraphPath -->
		<td class="<?php echo $view_patient_services->GraphPath->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->MachineCD->Visible) { // MachineCD ?>
		<!-- MachineCD -->
		<td class="<?php echo $view_patient_services->MachineCD->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->TestCancel->Visible) { // TestCancel ?>
		<!-- TestCancel -->
		<td class="<?php echo $view_patient_services->TestCancel->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->OutSource->Visible) { // OutSource ?>
		<!-- OutSource -->
		<td class="<?php echo $view_patient_services->OutSource->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->Printed->Visible) { // Printed ?>
		<!-- Printed -->
		<td class="<?php echo $view_patient_services->Printed->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->PrintBy->Visible) { // PrintBy ?>
		<!-- PrintBy -->
		<td class="<?php echo $view_patient_services->PrintBy->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->PrintDate->Visible) { // PrintDate ?>
		<!-- PrintDate -->
		<td class="<?php echo $view_patient_services->PrintDate->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->BillingDate->Visible) { // BillingDate ?>
		<!-- BillingDate -->
		<td class="<?php echo $view_patient_services->BillingDate->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->BilledBy->Visible) { // BilledBy ?>
		<!-- BilledBy -->
		<td class="<?php echo $view_patient_services->BilledBy->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->Resulted->Visible) { // Resulted ?>
		<!-- Resulted -->
		<td class="<?php echo $view_patient_services->Resulted->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->ResultDate->Visible) { // ResultDate ?>
		<!-- ResultDate -->
		<td class="<?php echo $view_patient_services->ResultDate->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->ResultedBy->Visible) { // ResultedBy ?>
		<!-- ResultedBy -->
		<td class="<?php echo $view_patient_services->ResultedBy->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->SampleDate->Visible) { // SampleDate ?>
		<!-- SampleDate -->
		<td class="<?php echo $view_patient_services->SampleDate->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->SampleUser->Visible) { // SampleUser ?>
		<!-- SampleUser -->
		<td class="<?php echo $view_patient_services->SampleUser->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->Sampled->Visible) { // Sampled ?>
		<!-- Sampled -->
		<td class="<?php echo $view_patient_services->Sampled->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->ReceivedDate->Visible) { // ReceivedDate ?>
		<!-- ReceivedDate -->
		<td class="<?php echo $view_patient_services->ReceivedDate->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->ReceivedUser->Visible) { // ReceivedUser ?>
		<!-- ReceivedUser -->
		<td class="<?php echo $view_patient_services->ReceivedUser->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->Recevied->Visible) { // Recevied ?>
		<!-- Recevied -->
		<td class="<?php echo $view_patient_services->Recevied->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->DeptRecvDate->Visible) { // DeptRecvDate ?>
		<!-- DeptRecvDate -->
		<td class="<?php echo $view_patient_services->DeptRecvDate->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->DeptRecvUser->Visible) { // DeptRecvUser ?>
		<!-- DeptRecvUser -->
		<td class="<?php echo $view_patient_services->DeptRecvUser->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->DeptRecived->Visible) { // DeptRecived ?>
		<!-- DeptRecived -->
		<td class="<?php echo $view_patient_services->DeptRecived->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->SAuthDate->Visible) { // SAuthDate ?>
		<!-- SAuthDate -->
		<td class="<?php echo $view_patient_services->SAuthDate->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->SAuthBy->Visible) { // SAuthBy ?>
		<!-- SAuthBy -->
		<td class="<?php echo $view_patient_services->SAuthBy->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->SAuthendicate->Visible) { // SAuthendicate ?>
		<!-- SAuthendicate -->
		<td class="<?php echo $view_patient_services->SAuthendicate->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->AuthDate->Visible) { // AuthDate ?>
		<!-- AuthDate -->
		<td class="<?php echo $view_patient_services->AuthDate->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->AuthBy->Visible) { // AuthBy ?>
		<!-- AuthBy -->
		<td class="<?php echo $view_patient_services->AuthBy->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->Authencate->Visible) { // Authencate ?>
		<!-- Authencate -->
		<td class="<?php echo $view_patient_services->Authencate->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->EditDate->Visible) { // EditDate ?>
		<!-- EditDate -->
		<td class="<?php echo $view_patient_services->EditDate->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->EditBy->Visible) { // EditBy ?>
		<!-- EditBy -->
		<td class="<?php echo $view_patient_services->EditBy->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->Editted->Visible) { // Editted ?>
		<!-- Editted -->
		<td class="<?php echo $view_patient_services->Editted->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->PatID->Visible) { // PatID ?>
		<!-- PatID -->
		<td class="<?php echo $view_patient_services->PatID->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->PatientId->Visible) { // PatientId ?>
		<!-- PatientId -->
		<td class="<?php echo $view_patient_services->PatientId->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->Mobile->Visible) { // Mobile ?>
		<!-- Mobile -->
		<td class="<?php echo $view_patient_services->Mobile->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->CId->Visible) { // CId ?>
		<!-- CId -->
		<td class="<?php echo $view_patient_services->CId->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->Order->Visible) { // Order ?>
		<!-- Order -->
		<td class="<?php echo $view_patient_services->Order->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->ResType->Visible) { // ResType ?>
		<!-- ResType -->
		<td class="<?php echo $view_patient_services->ResType->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->Sample->Visible) { // Sample ?>
		<!-- Sample -->
		<td class="<?php echo $view_patient_services->Sample->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->NoD->Visible) { // NoD ?>
		<!-- NoD -->
		<td class="<?php echo $view_patient_services->NoD->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->BillOrder->Visible) { // BillOrder ?>
		<!-- BillOrder -->
		<td class="<?php echo $view_patient_services->BillOrder->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->Inactive->Visible) { // Inactive ?>
		<!-- Inactive -->
		<td class="<?php echo $view_patient_services->Inactive->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->CollSample->Visible) { // CollSample ?>
		<!-- CollSample -->
		<td class="<?php echo $view_patient_services->CollSample->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->TestType->Visible) { // TestType ?>
		<!-- TestType -->
		<td class="<?php echo $view_patient_services->TestType->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->Repeated->Visible) { // Repeated ?>
		<!-- Repeated -->
		<td class="<?php echo $view_patient_services->Repeated->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->RepeatedBy->Visible) { // RepeatedBy ?>
		<!-- RepeatedBy -->
		<td class="<?php echo $view_patient_services->RepeatedBy->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->RepeatedDate->Visible) { // RepeatedDate ?>
		<!-- RepeatedDate -->
		<td class="<?php echo $view_patient_services->RepeatedDate->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->serviceID->Visible) { // serviceID ?>
		<!-- serviceID -->
		<td class="<?php echo $view_patient_services->serviceID->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->Service_Type->Visible) { // Service_Type ?>
		<!-- Service_Type -->
		<td class="<?php echo $view_patient_services->Service_Type->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->Service_Department->Visible) { // Service_Department ?>
		<!-- Service_Department -->
		<td class="<?php echo $view_patient_services->Service_Department->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_patient_services->RequestNo->Visible) { // RequestNo ?>
		<!-- RequestNo -->
		<td class="<?php echo $view_patient_services->RequestNo->footerCellClass() ?>">
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
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($view_patient_services_preview->TotalRecs > 0) { ?>
<?php if (!isset($view_patient_services_preview->Pager)) $view_patient_services_preview->Pager = new PrevNextPager($view_patient_services_preview->StartRec, $view_patient_services_preview->DisplayRecs, $view_patient_services_preview->TotalRecs) ?>
<?php if ($view_patient_services_preview->Pager->RecordCount > 0 && $view_patient_services_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($view_patient_services_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $view_patient_services_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($view_patient_services_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $view_patient_services_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($view_patient_services_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $view_patient_services_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($view_patient_services_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $view_patient_services_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_patient_services_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_patient_services_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_patient_services_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($view_patient_services_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$view_patient_services_preview->showPageFooter();
if (DEBUG_ENABLED)
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
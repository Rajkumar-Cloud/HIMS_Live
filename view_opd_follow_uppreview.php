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
$view_opd_follow_up_preview = new view_opd_follow_up_preview();

// Run the page
$view_opd_follow_up_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_opd_follow_up_preview->Page_Render();
?>
<?php $view_opd_follow_up_preview->showPageHeader(); ?>
<div class="card ew-grid view_opd_follow_up"><!-- .card -->
<?php if ($view_opd_follow_up_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$view_opd_follow_up_preview->renderListOptions();

// Render list options (header, left)
$view_opd_follow_up_preview->ListOptions->render("header", "left");
?>
<?php if ($view_opd_follow_up->id->Visible) { // id ?>
	<?php if ($view_opd_follow_up->SortUrl($view_opd_follow_up->id) == "") { ?>
		<th class="<?php echo $view_opd_follow_up->id->headerCellClass() ?>"><?php echo $view_opd_follow_up->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_opd_follow_up->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_opd_follow_up->id->Name ?>" data-sort-order="<?php echo $view_opd_follow_up_preview->SortField == $view_opd_follow_up->id->Name && $view_opd_follow_up_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_opd_follow_up->id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_opd_follow_up_preview->SortField == $view_opd_follow_up->id->Name) { ?><?php if ($view_opd_follow_up_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_opd_follow_up_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_opd_follow_up->Reception->Visible) { // Reception ?>
	<?php if ($view_opd_follow_up->SortUrl($view_opd_follow_up->Reception) == "") { ?>
		<th class="<?php echo $view_opd_follow_up->Reception->headerCellClass() ?>"><?php echo $view_opd_follow_up->Reception->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_opd_follow_up->Reception->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_opd_follow_up->Reception->Name ?>" data-sort-order="<?php echo $view_opd_follow_up_preview->SortField == $view_opd_follow_up->Reception->Name && $view_opd_follow_up_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_opd_follow_up->Reception->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_opd_follow_up_preview->SortField == $view_opd_follow_up->Reception->Name) { ?><?php if ($view_opd_follow_up_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_opd_follow_up_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_opd_follow_up->PatientId->Visible) { // PatientId ?>
	<?php if ($view_opd_follow_up->SortUrl($view_opd_follow_up->PatientId) == "") { ?>
		<th class="<?php echo $view_opd_follow_up->PatientId->headerCellClass() ?>"><?php echo $view_opd_follow_up->PatientId->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_opd_follow_up->PatientId->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_opd_follow_up->PatientId->Name ?>" data-sort-order="<?php echo $view_opd_follow_up_preview->SortField == $view_opd_follow_up->PatientId->Name && $view_opd_follow_up_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_opd_follow_up->PatientId->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_opd_follow_up_preview->SortField == $view_opd_follow_up->PatientId->Name) { ?><?php if ($view_opd_follow_up_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_opd_follow_up_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_opd_follow_up->mrnno->Visible) { // mrnno ?>
	<?php if ($view_opd_follow_up->SortUrl($view_opd_follow_up->mrnno) == "") { ?>
		<th class="<?php echo $view_opd_follow_up->mrnno->headerCellClass() ?>"><?php echo $view_opd_follow_up->mrnno->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_opd_follow_up->mrnno->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_opd_follow_up->mrnno->Name ?>" data-sort-order="<?php echo $view_opd_follow_up_preview->SortField == $view_opd_follow_up->mrnno->Name && $view_opd_follow_up_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_opd_follow_up->mrnno->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_opd_follow_up_preview->SortField == $view_opd_follow_up->mrnno->Name) { ?><?php if ($view_opd_follow_up_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_opd_follow_up_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_opd_follow_up->PatientName->Visible) { // PatientName ?>
	<?php if ($view_opd_follow_up->SortUrl($view_opd_follow_up->PatientName) == "") { ?>
		<th class="<?php echo $view_opd_follow_up->PatientName->headerCellClass() ?>"><?php echo $view_opd_follow_up->PatientName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_opd_follow_up->PatientName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_opd_follow_up->PatientName->Name ?>" data-sort-order="<?php echo $view_opd_follow_up_preview->SortField == $view_opd_follow_up->PatientName->Name && $view_opd_follow_up_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_opd_follow_up->PatientName->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_opd_follow_up_preview->SortField == $view_opd_follow_up->PatientName->Name) { ?><?php if ($view_opd_follow_up_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_opd_follow_up_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_opd_follow_up->Telephone->Visible) { // Telephone ?>
	<?php if ($view_opd_follow_up->SortUrl($view_opd_follow_up->Telephone) == "") { ?>
		<th class="<?php echo $view_opd_follow_up->Telephone->headerCellClass() ?>"><?php echo $view_opd_follow_up->Telephone->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_opd_follow_up->Telephone->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_opd_follow_up->Telephone->Name ?>" data-sort-order="<?php echo $view_opd_follow_up_preview->SortField == $view_opd_follow_up->Telephone->Name && $view_opd_follow_up_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_opd_follow_up->Telephone->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_opd_follow_up_preview->SortField == $view_opd_follow_up->Telephone->Name) { ?><?php if ($view_opd_follow_up_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_opd_follow_up_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_opd_follow_up->Age->Visible) { // Age ?>
	<?php if ($view_opd_follow_up->SortUrl($view_opd_follow_up->Age) == "") { ?>
		<th class="<?php echo $view_opd_follow_up->Age->headerCellClass() ?>"><?php echo $view_opd_follow_up->Age->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_opd_follow_up->Age->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_opd_follow_up->Age->Name ?>" data-sort-order="<?php echo $view_opd_follow_up_preview->SortField == $view_opd_follow_up->Age->Name && $view_opd_follow_up_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_opd_follow_up->Age->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_opd_follow_up_preview->SortField == $view_opd_follow_up->Age->Name) { ?><?php if ($view_opd_follow_up_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_opd_follow_up_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_opd_follow_up->Gender->Visible) { // Gender ?>
	<?php if ($view_opd_follow_up->SortUrl($view_opd_follow_up->Gender) == "") { ?>
		<th class="<?php echo $view_opd_follow_up->Gender->headerCellClass() ?>"><?php echo $view_opd_follow_up->Gender->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_opd_follow_up->Gender->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_opd_follow_up->Gender->Name ?>" data-sort-order="<?php echo $view_opd_follow_up_preview->SortField == $view_opd_follow_up->Gender->Name && $view_opd_follow_up_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_opd_follow_up->Gender->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_opd_follow_up_preview->SortField == $view_opd_follow_up->Gender->Name) { ?><?php if ($view_opd_follow_up_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_opd_follow_up_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_opd_follow_up->NextReviewDate->Visible) { // NextReviewDate ?>
	<?php if ($view_opd_follow_up->SortUrl($view_opd_follow_up->NextReviewDate) == "") { ?>
		<th class="<?php echo $view_opd_follow_up->NextReviewDate->headerCellClass() ?>"><?php echo $view_opd_follow_up->NextReviewDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_opd_follow_up->NextReviewDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_opd_follow_up->NextReviewDate->Name ?>" data-sort-order="<?php echo $view_opd_follow_up_preview->SortField == $view_opd_follow_up->NextReviewDate->Name && $view_opd_follow_up_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_opd_follow_up->NextReviewDate->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_opd_follow_up_preview->SortField == $view_opd_follow_up->NextReviewDate->Name) { ?><?php if ($view_opd_follow_up_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_opd_follow_up_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_opd_follow_up->ICSIAdvised->Visible) { // ICSIAdvised ?>
	<?php if ($view_opd_follow_up->SortUrl($view_opd_follow_up->ICSIAdvised) == "") { ?>
		<th class="<?php echo $view_opd_follow_up->ICSIAdvised->headerCellClass() ?>"><?php echo $view_opd_follow_up->ICSIAdvised->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_opd_follow_up->ICSIAdvised->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_opd_follow_up->ICSIAdvised->Name ?>" data-sort-order="<?php echo $view_opd_follow_up_preview->SortField == $view_opd_follow_up->ICSIAdvised->Name && $view_opd_follow_up_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_opd_follow_up->ICSIAdvised->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_opd_follow_up_preview->SortField == $view_opd_follow_up->ICSIAdvised->Name) { ?><?php if ($view_opd_follow_up_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_opd_follow_up_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_opd_follow_up->DeliveryRegistered->Visible) { // DeliveryRegistered ?>
	<?php if ($view_opd_follow_up->SortUrl($view_opd_follow_up->DeliveryRegistered) == "") { ?>
		<th class="<?php echo $view_opd_follow_up->DeliveryRegistered->headerCellClass() ?>"><?php echo $view_opd_follow_up->DeliveryRegistered->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_opd_follow_up->DeliveryRegistered->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_opd_follow_up->DeliveryRegistered->Name ?>" data-sort-order="<?php echo $view_opd_follow_up_preview->SortField == $view_opd_follow_up->DeliveryRegistered->Name && $view_opd_follow_up_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_opd_follow_up->DeliveryRegistered->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_opd_follow_up_preview->SortField == $view_opd_follow_up->DeliveryRegistered->Name) { ?><?php if ($view_opd_follow_up_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_opd_follow_up_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_opd_follow_up->EDD->Visible) { // EDD ?>
	<?php if ($view_opd_follow_up->SortUrl($view_opd_follow_up->EDD) == "") { ?>
		<th class="<?php echo $view_opd_follow_up->EDD->headerCellClass() ?>"><?php echo $view_opd_follow_up->EDD->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_opd_follow_up->EDD->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_opd_follow_up->EDD->Name ?>" data-sort-order="<?php echo $view_opd_follow_up_preview->SortField == $view_opd_follow_up->EDD->Name && $view_opd_follow_up_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_opd_follow_up->EDD->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_opd_follow_up_preview->SortField == $view_opd_follow_up->EDD->Name) { ?><?php if ($view_opd_follow_up_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_opd_follow_up_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_opd_follow_up->SerologyPositive->Visible) { // SerologyPositive ?>
	<?php if ($view_opd_follow_up->SortUrl($view_opd_follow_up->SerologyPositive) == "") { ?>
		<th class="<?php echo $view_opd_follow_up->SerologyPositive->headerCellClass() ?>"><?php echo $view_opd_follow_up->SerologyPositive->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_opd_follow_up->SerologyPositive->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_opd_follow_up->SerologyPositive->Name ?>" data-sort-order="<?php echo $view_opd_follow_up_preview->SortField == $view_opd_follow_up->SerologyPositive->Name && $view_opd_follow_up_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_opd_follow_up->SerologyPositive->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_opd_follow_up_preview->SortField == $view_opd_follow_up->SerologyPositive->Name) { ?><?php if ($view_opd_follow_up_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_opd_follow_up_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_opd_follow_up->Allergy->Visible) { // Allergy ?>
	<?php if ($view_opd_follow_up->SortUrl($view_opd_follow_up->Allergy) == "") { ?>
		<th class="<?php echo $view_opd_follow_up->Allergy->headerCellClass() ?>"><?php echo $view_opd_follow_up->Allergy->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_opd_follow_up->Allergy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_opd_follow_up->Allergy->Name ?>" data-sort-order="<?php echo $view_opd_follow_up_preview->SortField == $view_opd_follow_up->Allergy->Name && $view_opd_follow_up_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_opd_follow_up->Allergy->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_opd_follow_up_preview->SortField == $view_opd_follow_up->Allergy->Name) { ?><?php if ($view_opd_follow_up_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_opd_follow_up_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_opd_follow_up->status->Visible) { // status ?>
	<?php if ($view_opd_follow_up->SortUrl($view_opd_follow_up->status) == "") { ?>
		<th class="<?php echo $view_opd_follow_up->status->headerCellClass() ?>"><?php echo $view_opd_follow_up->status->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_opd_follow_up->status->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_opd_follow_up->status->Name ?>" data-sort-order="<?php echo $view_opd_follow_up_preview->SortField == $view_opd_follow_up->status->Name && $view_opd_follow_up_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_opd_follow_up->status->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_opd_follow_up_preview->SortField == $view_opd_follow_up->status->Name) { ?><?php if ($view_opd_follow_up_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_opd_follow_up_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_opd_follow_up->createdby->Visible) { // createdby ?>
	<?php if ($view_opd_follow_up->SortUrl($view_opd_follow_up->createdby) == "") { ?>
		<th class="<?php echo $view_opd_follow_up->createdby->headerCellClass() ?>"><?php echo $view_opd_follow_up->createdby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_opd_follow_up->createdby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_opd_follow_up->createdby->Name ?>" data-sort-order="<?php echo $view_opd_follow_up_preview->SortField == $view_opd_follow_up->createdby->Name && $view_opd_follow_up_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_opd_follow_up->createdby->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_opd_follow_up_preview->SortField == $view_opd_follow_up->createdby->Name) { ?><?php if ($view_opd_follow_up_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_opd_follow_up_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_opd_follow_up->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_opd_follow_up->SortUrl($view_opd_follow_up->createddatetime) == "") { ?>
		<th class="<?php echo $view_opd_follow_up->createddatetime->headerCellClass() ?>"><?php echo $view_opd_follow_up->createddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_opd_follow_up->createddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_opd_follow_up->createddatetime->Name ?>" data-sort-order="<?php echo $view_opd_follow_up_preview->SortField == $view_opd_follow_up->createddatetime->Name && $view_opd_follow_up_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_opd_follow_up->createddatetime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_opd_follow_up_preview->SortField == $view_opd_follow_up->createddatetime->Name) { ?><?php if ($view_opd_follow_up_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_opd_follow_up_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_opd_follow_up->modifiedby->Visible) { // modifiedby ?>
	<?php if ($view_opd_follow_up->SortUrl($view_opd_follow_up->modifiedby) == "") { ?>
		<th class="<?php echo $view_opd_follow_up->modifiedby->headerCellClass() ?>"><?php echo $view_opd_follow_up->modifiedby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_opd_follow_up->modifiedby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_opd_follow_up->modifiedby->Name ?>" data-sort-order="<?php echo $view_opd_follow_up_preview->SortField == $view_opd_follow_up->modifiedby->Name && $view_opd_follow_up_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_opd_follow_up->modifiedby->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_opd_follow_up_preview->SortField == $view_opd_follow_up->modifiedby->Name) { ?><?php if ($view_opd_follow_up_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_opd_follow_up_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_opd_follow_up->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($view_opd_follow_up->SortUrl($view_opd_follow_up->modifieddatetime) == "") { ?>
		<th class="<?php echo $view_opd_follow_up->modifieddatetime->headerCellClass() ?>"><?php echo $view_opd_follow_up->modifieddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_opd_follow_up->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_opd_follow_up->modifieddatetime->Name ?>" data-sort-order="<?php echo $view_opd_follow_up_preview->SortField == $view_opd_follow_up->modifieddatetime->Name && $view_opd_follow_up_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_opd_follow_up->modifieddatetime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_opd_follow_up_preview->SortField == $view_opd_follow_up->modifieddatetime->Name) { ?><?php if ($view_opd_follow_up_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_opd_follow_up_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_opd_follow_up->LMP->Visible) { // LMP ?>
	<?php if ($view_opd_follow_up->SortUrl($view_opd_follow_up->LMP) == "") { ?>
		<th class="<?php echo $view_opd_follow_up->LMP->headerCellClass() ?>"><?php echo $view_opd_follow_up->LMP->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_opd_follow_up->LMP->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_opd_follow_up->LMP->Name ?>" data-sort-order="<?php echo $view_opd_follow_up_preview->SortField == $view_opd_follow_up->LMP->Name && $view_opd_follow_up_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_opd_follow_up->LMP->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_opd_follow_up_preview->SortField == $view_opd_follow_up->LMP->Name) { ?><?php if ($view_opd_follow_up_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_opd_follow_up_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_opd_follow_up->ProcedureDateTime->Visible) { // ProcedureDateTime ?>
	<?php if ($view_opd_follow_up->SortUrl($view_opd_follow_up->ProcedureDateTime) == "") { ?>
		<th class="<?php echo $view_opd_follow_up->ProcedureDateTime->headerCellClass() ?>"><?php echo $view_opd_follow_up->ProcedureDateTime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_opd_follow_up->ProcedureDateTime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_opd_follow_up->ProcedureDateTime->Name ?>" data-sort-order="<?php echo $view_opd_follow_up_preview->SortField == $view_opd_follow_up->ProcedureDateTime->Name && $view_opd_follow_up_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_opd_follow_up->ProcedureDateTime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_opd_follow_up_preview->SortField == $view_opd_follow_up->ProcedureDateTime->Name) { ?><?php if ($view_opd_follow_up_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_opd_follow_up_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_opd_follow_up->ICSIDate->Visible) { // ICSIDate ?>
	<?php if ($view_opd_follow_up->SortUrl($view_opd_follow_up->ICSIDate) == "") { ?>
		<th class="<?php echo $view_opd_follow_up->ICSIDate->headerCellClass() ?>"><?php echo $view_opd_follow_up->ICSIDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_opd_follow_up->ICSIDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_opd_follow_up->ICSIDate->Name ?>" data-sort-order="<?php echo $view_opd_follow_up_preview->SortField == $view_opd_follow_up->ICSIDate->Name && $view_opd_follow_up_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_opd_follow_up->ICSIDate->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_opd_follow_up_preview->SortField == $view_opd_follow_up->ICSIDate->Name) { ?><?php if ($view_opd_follow_up_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_opd_follow_up_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_opd_follow_up_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$view_opd_follow_up_preview->RecCount = 0;
$view_opd_follow_up_preview->RowCnt = 0;
while ($view_opd_follow_up_preview->Recordset && !$view_opd_follow_up_preview->Recordset->EOF) {

	// Init row class and style
	$view_opd_follow_up_preview->RecCount++;
	$view_opd_follow_up_preview->RowCnt++;
	$view_opd_follow_up_preview->CssStyle = "";
	$view_opd_follow_up_preview->loadListRowValues($view_opd_follow_up_preview->Recordset);

	// Render row
	$view_opd_follow_up_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$view_opd_follow_up_preview->resetAttributes();
	$view_opd_follow_up_preview->renderListRow();

	// Render list options
	$view_opd_follow_up_preview->renderListOptions();
?>
	<tr<?php echo $view_opd_follow_up_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_opd_follow_up_preview->ListOptions->render("body", "left", $view_opd_follow_up_preview->RowCnt);
?>
<?php if ($view_opd_follow_up->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $view_opd_follow_up->id->cellAttributes() ?>>
<span<?php echo $view_opd_follow_up->id->viewAttributes() ?>>
<?php echo $view_opd_follow_up->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_opd_follow_up->Reception->Visible) { // Reception ?>
		<!-- Reception -->
		<td<?php echo $view_opd_follow_up->Reception->cellAttributes() ?>>
<span<?php echo $view_opd_follow_up->Reception->viewAttributes() ?>>
<?php echo $view_opd_follow_up->Reception->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_opd_follow_up->PatientId->Visible) { // PatientId ?>
		<!-- PatientId -->
		<td<?php echo $view_opd_follow_up->PatientId->cellAttributes() ?>>
<span<?php echo $view_opd_follow_up->PatientId->viewAttributes() ?>>
<?php echo $view_opd_follow_up->PatientId->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_opd_follow_up->mrnno->Visible) { // mrnno ?>
		<!-- mrnno -->
		<td<?php echo $view_opd_follow_up->mrnno->cellAttributes() ?>>
<span<?php echo $view_opd_follow_up->mrnno->viewAttributes() ?>>
<?php echo $view_opd_follow_up->mrnno->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_opd_follow_up->PatientName->Visible) { // PatientName ?>
		<!-- PatientName -->
		<td<?php echo $view_opd_follow_up->PatientName->cellAttributes() ?>>
<span<?php echo $view_opd_follow_up->PatientName->viewAttributes() ?>>
<?php echo $view_opd_follow_up->PatientName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_opd_follow_up->Telephone->Visible) { // Telephone ?>
		<!-- Telephone -->
		<td<?php echo $view_opd_follow_up->Telephone->cellAttributes() ?>>
<span<?php echo $view_opd_follow_up->Telephone->viewAttributes() ?>>
<?php echo $view_opd_follow_up->Telephone->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_opd_follow_up->Age->Visible) { // Age ?>
		<!-- Age -->
		<td<?php echo $view_opd_follow_up->Age->cellAttributes() ?>>
<span<?php echo $view_opd_follow_up->Age->viewAttributes() ?>>
<?php echo $view_opd_follow_up->Age->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_opd_follow_up->Gender->Visible) { // Gender ?>
		<!-- Gender -->
		<td<?php echo $view_opd_follow_up->Gender->cellAttributes() ?>>
<span<?php echo $view_opd_follow_up->Gender->viewAttributes() ?>>
<?php echo $view_opd_follow_up->Gender->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_opd_follow_up->NextReviewDate->Visible) { // NextReviewDate ?>
		<!-- NextReviewDate -->
		<td<?php echo $view_opd_follow_up->NextReviewDate->cellAttributes() ?>>
<span<?php echo $view_opd_follow_up->NextReviewDate->viewAttributes() ?>>
<?php echo $view_opd_follow_up->NextReviewDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_opd_follow_up->ICSIAdvised->Visible) { // ICSIAdvised ?>
		<!-- ICSIAdvised -->
		<td<?php echo $view_opd_follow_up->ICSIAdvised->cellAttributes() ?>>
<span<?php echo $view_opd_follow_up->ICSIAdvised->viewAttributes() ?>>
<?php echo $view_opd_follow_up->ICSIAdvised->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_opd_follow_up->DeliveryRegistered->Visible) { // DeliveryRegistered ?>
		<!-- DeliveryRegistered -->
		<td<?php echo $view_opd_follow_up->DeliveryRegistered->cellAttributes() ?>>
<span<?php echo $view_opd_follow_up->DeliveryRegistered->viewAttributes() ?>>
<?php echo $view_opd_follow_up->DeliveryRegistered->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_opd_follow_up->EDD->Visible) { // EDD ?>
		<!-- EDD -->
		<td<?php echo $view_opd_follow_up->EDD->cellAttributes() ?>>
<span<?php echo $view_opd_follow_up->EDD->viewAttributes() ?>>
<?php echo $view_opd_follow_up->EDD->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_opd_follow_up->SerologyPositive->Visible) { // SerologyPositive ?>
		<!-- SerologyPositive -->
		<td<?php echo $view_opd_follow_up->SerologyPositive->cellAttributes() ?>>
<span<?php echo $view_opd_follow_up->SerologyPositive->viewAttributes() ?>>
<?php echo $view_opd_follow_up->SerologyPositive->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_opd_follow_up->Allergy->Visible) { // Allergy ?>
		<!-- Allergy -->
		<td<?php echo $view_opd_follow_up->Allergy->cellAttributes() ?>>
<span<?php echo $view_opd_follow_up->Allergy->viewAttributes() ?>>
<?php echo $view_opd_follow_up->Allergy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_opd_follow_up->status->Visible) { // status ?>
		<!-- status -->
		<td<?php echo $view_opd_follow_up->status->cellAttributes() ?>>
<span<?php echo $view_opd_follow_up->status->viewAttributes() ?>>
<?php echo $view_opd_follow_up->status->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_opd_follow_up->createdby->Visible) { // createdby ?>
		<!-- createdby -->
		<td<?php echo $view_opd_follow_up->createdby->cellAttributes() ?>>
<span<?php echo $view_opd_follow_up->createdby->viewAttributes() ?>>
<?php echo $view_opd_follow_up->createdby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_opd_follow_up->createddatetime->Visible) { // createddatetime ?>
		<!-- createddatetime -->
		<td<?php echo $view_opd_follow_up->createddatetime->cellAttributes() ?>>
<span<?php echo $view_opd_follow_up->createddatetime->viewAttributes() ?>>
<?php echo $view_opd_follow_up->createddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_opd_follow_up->modifiedby->Visible) { // modifiedby ?>
		<!-- modifiedby -->
		<td<?php echo $view_opd_follow_up->modifiedby->cellAttributes() ?>>
<span<?php echo $view_opd_follow_up->modifiedby->viewAttributes() ?>>
<?php echo $view_opd_follow_up->modifiedby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_opd_follow_up->modifieddatetime->Visible) { // modifieddatetime ?>
		<!-- modifieddatetime -->
		<td<?php echo $view_opd_follow_up->modifieddatetime->cellAttributes() ?>>
<span<?php echo $view_opd_follow_up->modifieddatetime->viewAttributes() ?>>
<?php echo $view_opd_follow_up->modifieddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_opd_follow_up->LMP->Visible) { // LMP ?>
		<!-- LMP -->
		<td<?php echo $view_opd_follow_up->LMP->cellAttributes() ?>>
<span<?php echo $view_opd_follow_up->LMP->viewAttributes() ?>>
<?php echo $view_opd_follow_up->LMP->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_opd_follow_up->ProcedureDateTime->Visible) { // ProcedureDateTime ?>
		<!-- ProcedureDateTime -->
		<td<?php echo $view_opd_follow_up->ProcedureDateTime->cellAttributes() ?>>
<span<?php echo $view_opd_follow_up->ProcedureDateTime->viewAttributes() ?>>
<?php echo $view_opd_follow_up->ProcedureDateTime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_opd_follow_up->ICSIDate->Visible) { // ICSIDate ?>
		<!-- ICSIDate -->
		<td<?php echo $view_opd_follow_up->ICSIDate->cellAttributes() ?>>
<span<?php echo $view_opd_follow_up->ICSIDate->viewAttributes() ?>>
<?php echo $view_opd_follow_up->ICSIDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$view_opd_follow_up_preview->ListOptions->render("body", "right", $view_opd_follow_up_preview->RowCnt);
?>
	</tr>
<?php
	$view_opd_follow_up_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($view_opd_follow_up_preview->TotalRecs > 0) { ?>
<?php if (!isset($view_opd_follow_up_preview->Pager)) $view_opd_follow_up_preview->Pager = new PrevNextPager($view_opd_follow_up_preview->StartRec, $view_opd_follow_up_preview->DisplayRecs, $view_opd_follow_up_preview->TotalRecs) ?>
<?php if ($view_opd_follow_up_preview->Pager->RecordCount > 0 && $view_opd_follow_up_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($view_opd_follow_up_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $view_opd_follow_up_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($view_opd_follow_up_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $view_opd_follow_up_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($view_opd_follow_up_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $view_opd_follow_up_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($view_opd_follow_up_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $view_opd_follow_up_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_opd_follow_up_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_opd_follow_up_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_opd_follow_up_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($view_opd_follow_up_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$view_opd_follow_up_preview->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php
if ($view_opd_follow_up_preview->Recordset)
	$view_opd_follow_up_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$view_opd_follow_up_preview->terminate();
?>
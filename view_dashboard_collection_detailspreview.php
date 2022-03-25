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
$view_dashboard_collection_details_preview = new view_dashboard_collection_details_preview();

// Run the page
$view_dashboard_collection_details_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_dashboard_collection_details_preview->Page_Render();
?>
<?php $view_dashboard_collection_details_preview->showPageHeader(); ?>
<div class="card ew-grid view_dashboard_collection_details"><!-- .card -->
<?php if ($view_dashboard_collection_details_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$view_dashboard_collection_details_preview->renderListOptions();

// Render list options (header, left)
$view_dashboard_collection_details_preview->ListOptions->render("header", "left");
?>
<?php if ($view_dashboard_collection_details->id->Visible) { // id ?>
	<?php if ($view_dashboard_collection_details->SortUrl($view_dashboard_collection_details->id) == "") { ?>
		<th class="<?php echo $view_dashboard_collection_details->id->headerCellClass() ?>"><?php echo $view_dashboard_collection_details->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_collection_details->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_dashboard_collection_details->id->Name ?>" data-sort-order="<?php echo $view_dashboard_collection_details_preview->SortField == $view_dashboard_collection_details->id->Name && $view_dashboard_collection_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details->id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details_preview->SortField == $view_dashboard_collection_details->id->Name) { ?><?php if ($view_dashboard_collection_details_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_dashboard_collection_details_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details->createddate->Visible) { // createddate ?>
	<?php if ($view_dashboard_collection_details->SortUrl($view_dashboard_collection_details->createddate) == "") { ?>
		<th class="<?php echo $view_dashboard_collection_details->createddate->headerCellClass() ?>"><?php echo $view_dashboard_collection_details->createddate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_collection_details->createddate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_dashboard_collection_details->createddate->Name ?>" data-sort-order="<?php echo $view_dashboard_collection_details_preview->SortField == $view_dashboard_collection_details->createddate->Name && $view_dashboard_collection_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details->createddate->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details_preview->SortField == $view_dashboard_collection_details->createddate->Name) { ?><?php if ($view_dashboard_collection_details_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_dashboard_collection_details_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details->UserName->Visible) { // UserName ?>
	<?php if ($view_dashboard_collection_details->SortUrl($view_dashboard_collection_details->UserName) == "") { ?>
		<th class="<?php echo $view_dashboard_collection_details->UserName->headerCellClass() ?>"><?php echo $view_dashboard_collection_details->UserName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_collection_details->UserName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_dashboard_collection_details->UserName->Name ?>" data-sort-order="<?php echo $view_dashboard_collection_details_preview->SortField == $view_dashboard_collection_details->UserName->Name && $view_dashboard_collection_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details->UserName->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details_preview->SortField == $view_dashboard_collection_details->UserName->Name) { ?><?php if ($view_dashboard_collection_details_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_dashboard_collection_details_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details->BillNumber->Visible) { // BillNumber ?>
	<?php if ($view_dashboard_collection_details->SortUrl($view_dashboard_collection_details->BillNumber) == "") { ?>
		<th class="<?php echo $view_dashboard_collection_details->BillNumber->headerCellClass() ?>"><?php echo $view_dashboard_collection_details->BillNumber->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_collection_details->BillNumber->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_dashboard_collection_details->BillNumber->Name ?>" data-sort-order="<?php echo $view_dashboard_collection_details_preview->SortField == $view_dashboard_collection_details->BillNumber->Name && $view_dashboard_collection_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details->BillNumber->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details_preview->SortField == $view_dashboard_collection_details->BillNumber->Name) { ?><?php if ($view_dashboard_collection_details_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_dashboard_collection_details_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details->PatientID->Visible) { // PatientID ?>
	<?php if ($view_dashboard_collection_details->SortUrl($view_dashboard_collection_details->PatientID) == "") { ?>
		<th class="<?php echo $view_dashboard_collection_details->PatientID->headerCellClass() ?>"><?php echo $view_dashboard_collection_details->PatientID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_collection_details->PatientID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_dashboard_collection_details->PatientID->Name ?>" data-sort-order="<?php echo $view_dashboard_collection_details_preview->SortField == $view_dashboard_collection_details->PatientID->Name && $view_dashboard_collection_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details->PatientID->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details_preview->SortField == $view_dashboard_collection_details->PatientID->Name) { ?><?php if ($view_dashboard_collection_details_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_dashboard_collection_details_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details->PatientName->Visible) { // PatientName ?>
	<?php if ($view_dashboard_collection_details->SortUrl($view_dashboard_collection_details->PatientName) == "") { ?>
		<th class="<?php echo $view_dashboard_collection_details->PatientName->headerCellClass() ?>"><?php echo $view_dashboard_collection_details->PatientName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_collection_details->PatientName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_dashboard_collection_details->PatientName->Name ?>" data-sort-order="<?php echo $view_dashboard_collection_details_preview->SortField == $view_dashboard_collection_details->PatientName->Name && $view_dashboard_collection_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details->PatientName->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details_preview->SortField == $view_dashboard_collection_details->PatientName->Name) { ?><?php if ($view_dashboard_collection_details_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_dashboard_collection_details_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details->Mobile->Visible) { // Mobile ?>
	<?php if ($view_dashboard_collection_details->SortUrl($view_dashboard_collection_details->Mobile) == "") { ?>
		<th class="<?php echo $view_dashboard_collection_details->Mobile->headerCellClass() ?>"><?php echo $view_dashboard_collection_details->Mobile->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_collection_details->Mobile->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_dashboard_collection_details->Mobile->Name ?>" data-sort-order="<?php echo $view_dashboard_collection_details_preview->SortField == $view_dashboard_collection_details->Mobile->Name && $view_dashboard_collection_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details->Mobile->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details_preview->SortField == $view_dashboard_collection_details->Mobile->Name) { ?><?php if ($view_dashboard_collection_details_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_dashboard_collection_details_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details->voucher_type->Visible) { // voucher_type ?>
	<?php if ($view_dashboard_collection_details->SortUrl($view_dashboard_collection_details->voucher_type) == "") { ?>
		<th class="<?php echo $view_dashboard_collection_details->voucher_type->headerCellClass() ?>"><?php echo $view_dashboard_collection_details->voucher_type->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_collection_details->voucher_type->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_dashboard_collection_details->voucher_type->Name ?>" data-sort-order="<?php echo $view_dashboard_collection_details_preview->SortField == $view_dashboard_collection_details->voucher_type->Name && $view_dashboard_collection_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details->voucher_type->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details_preview->SortField == $view_dashboard_collection_details->voucher_type->Name) { ?><?php if ($view_dashboard_collection_details_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_dashboard_collection_details_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details->Details->Visible) { // Details ?>
	<?php if ($view_dashboard_collection_details->SortUrl($view_dashboard_collection_details->Details) == "") { ?>
		<th class="<?php echo $view_dashboard_collection_details->Details->headerCellClass() ?>"><?php echo $view_dashboard_collection_details->Details->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_collection_details->Details->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_dashboard_collection_details->Details->Name ?>" data-sort-order="<?php echo $view_dashboard_collection_details_preview->SortField == $view_dashboard_collection_details->Details->Name && $view_dashboard_collection_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details->Details->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details_preview->SortField == $view_dashboard_collection_details->Details->Name) { ?><?php if ($view_dashboard_collection_details_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_dashboard_collection_details_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details->ModeofPayment->Visible) { // ModeofPayment ?>
	<?php if ($view_dashboard_collection_details->SortUrl($view_dashboard_collection_details->ModeofPayment) == "") { ?>
		<th class="<?php echo $view_dashboard_collection_details->ModeofPayment->headerCellClass() ?>"><?php echo $view_dashboard_collection_details->ModeofPayment->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_collection_details->ModeofPayment->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_dashboard_collection_details->ModeofPayment->Name ?>" data-sort-order="<?php echo $view_dashboard_collection_details_preview->SortField == $view_dashboard_collection_details->ModeofPayment->Name && $view_dashboard_collection_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details->ModeofPayment->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details_preview->SortField == $view_dashboard_collection_details->ModeofPayment->Name) { ?><?php if ($view_dashboard_collection_details_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_dashboard_collection_details_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details->Amount->Visible) { // Amount ?>
	<?php if ($view_dashboard_collection_details->SortUrl($view_dashboard_collection_details->Amount) == "") { ?>
		<th class="<?php echo $view_dashboard_collection_details->Amount->headerCellClass() ?>"><?php echo $view_dashboard_collection_details->Amount->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_collection_details->Amount->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_dashboard_collection_details->Amount->Name ?>" data-sort-order="<?php echo $view_dashboard_collection_details_preview->SortField == $view_dashboard_collection_details->Amount->Name && $view_dashboard_collection_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details->Amount->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details_preview->SortField == $view_dashboard_collection_details->Amount->Name) { ?><?php if ($view_dashboard_collection_details_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_dashboard_collection_details_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details->AnyDues->Visible) { // AnyDues ?>
	<?php if ($view_dashboard_collection_details->SortUrl($view_dashboard_collection_details->AnyDues) == "") { ?>
		<th class="<?php echo $view_dashboard_collection_details->AnyDues->headerCellClass() ?>"><?php echo $view_dashboard_collection_details->AnyDues->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_collection_details->AnyDues->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_dashboard_collection_details->AnyDues->Name ?>" data-sort-order="<?php echo $view_dashboard_collection_details_preview->SortField == $view_dashboard_collection_details->AnyDues->Name && $view_dashboard_collection_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details->AnyDues->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details_preview->SortField == $view_dashboard_collection_details->AnyDues->Name) { ?><?php if ($view_dashboard_collection_details_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_dashboard_collection_details_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details->createdby->Visible) { // createdby ?>
	<?php if ($view_dashboard_collection_details->SortUrl($view_dashboard_collection_details->createdby) == "") { ?>
		<th class="<?php echo $view_dashboard_collection_details->createdby->headerCellClass() ?>"><?php echo $view_dashboard_collection_details->createdby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_collection_details->createdby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_dashboard_collection_details->createdby->Name ?>" data-sort-order="<?php echo $view_dashboard_collection_details_preview->SortField == $view_dashboard_collection_details->createdby->Name && $view_dashboard_collection_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details->createdby->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details_preview->SortField == $view_dashboard_collection_details->createdby->Name) { ?><?php if ($view_dashboard_collection_details_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_dashboard_collection_details_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_dashboard_collection_details->SortUrl($view_dashboard_collection_details->createddatetime) == "") { ?>
		<th class="<?php echo $view_dashboard_collection_details->createddatetime->headerCellClass() ?>"><?php echo $view_dashboard_collection_details->createddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_collection_details->createddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_dashboard_collection_details->createddatetime->Name ?>" data-sort-order="<?php echo $view_dashboard_collection_details_preview->SortField == $view_dashboard_collection_details->createddatetime->Name && $view_dashboard_collection_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details->createddatetime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details_preview->SortField == $view_dashboard_collection_details->createddatetime->Name) { ?><?php if ($view_dashboard_collection_details_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_dashboard_collection_details_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details->modifiedby->Visible) { // modifiedby ?>
	<?php if ($view_dashboard_collection_details->SortUrl($view_dashboard_collection_details->modifiedby) == "") { ?>
		<th class="<?php echo $view_dashboard_collection_details->modifiedby->headerCellClass() ?>"><?php echo $view_dashboard_collection_details->modifiedby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_collection_details->modifiedby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_dashboard_collection_details->modifiedby->Name ?>" data-sort-order="<?php echo $view_dashboard_collection_details_preview->SortField == $view_dashboard_collection_details->modifiedby->Name && $view_dashboard_collection_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details->modifiedby->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details_preview->SortField == $view_dashboard_collection_details->modifiedby->Name) { ?><?php if ($view_dashboard_collection_details_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_dashboard_collection_details_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($view_dashboard_collection_details->SortUrl($view_dashboard_collection_details->modifieddatetime) == "") { ?>
		<th class="<?php echo $view_dashboard_collection_details->modifieddatetime->headerCellClass() ?>"><?php echo $view_dashboard_collection_details->modifieddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_collection_details->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_dashboard_collection_details->modifieddatetime->Name ?>" data-sort-order="<?php echo $view_dashboard_collection_details_preview->SortField == $view_dashboard_collection_details->modifieddatetime->Name && $view_dashboard_collection_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details->modifieddatetime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details_preview->SortField == $view_dashboard_collection_details->modifieddatetime->Name) { ?><?php if ($view_dashboard_collection_details_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_dashboard_collection_details_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details->BillType->Visible) { // BillType ?>
	<?php if ($view_dashboard_collection_details->SortUrl($view_dashboard_collection_details->BillType) == "") { ?>
		<th class="<?php echo $view_dashboard_collection_details->BillType->headerCellClass() ?>"><?php echo $view_dashboard_collection_details->BillType->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_collection_details->BillType->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_dashboard_collection_details->BillType->Name ?>" data-sort-order="<?php echo $view_dashboard_collection_details_preview->SortField == $view_dashboard_collection_details->BillType->Name && $view_dashboard_collection_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details->BillType->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details_preview->SortField == $view_dashboard_collection_details->BillType->Name) { ?><?php if ($view_dashboard_collection_details_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_dashboard_collection_details_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details->HospID->Visible) { // HospID ?>
	<?php if ($view_dashboard_collection_details->SortUrl($view_dashboard_collection_details->HospID) == "") { ?>
		<th class="<?php echo $view_dashboard_collection_details->HospID->headerCellClass() ?>"><?php echo $view_dashboard_collection_details->HospID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_collection_details->HospID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_dashboard_collection_details->HospID->Name ?>" data-sort-order="<?php echo $view_dashboard_collection_details_preview->SortField == $view_dashboard_collection_details->HospID->Name && $view_dashboard_collection_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details->HospID->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details_preview->SortField == $view_dashboard_collection_details->HospID->Name) { ?><?php if ($view_dashboard_collection_details_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_dashboard_collection_details_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_dashboard_collection_details_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$view_dashboard_collection_details_preview->RecCount = 0;
$view_dashboard_collection_details_preview->RowCnt = 0;
while ($view_dashboard_collection_details_preview->Recordset && !$view_dashboard_collection_details_preview->Recordset->EOF) {

	// Init row class and style
	$view_dashboard_collection_details_preview->RecCount++;
	$view_dashboard_collection_details_preview->RowCnt++;
	$view_dashboard_collection_details_preview->CssStyle = "";
	$view_dashboard_collection_details_preview->loadListRowValues($view_dashboard_collection_details_preview->Recordset);
	$view_dashboard_collection_details_preview->aggregateListRowValues(); // Aggregate row values

	// Render row
	$view_dashboard_collection_details_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$view_dashboard_collection_details_preview->resetAttributes();
	$view_dashboard_collection_details_preview->renderListRow();

	// Render list options
	$view_dashboard_collection_details_preview->renderListOptions();
?>
	<tr<?php echo $view_dashboard_collection_details_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_dashboard_collection_details_preview->ListOptions->render("body", "left", $view_dashboard_collection_details_preview->RowCnt);
?>
<?php if ($view_dashboard_collection_details->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $view_dashboard_collection_details->id->cellAttributes() ?>>
<span<?php echo $view_dashboard_collection_details->id->viewAttributes() ?>>
<?php echo $view_dashboard_collection_details->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_collection_details->createddate->Visible) { // createddate ?>
		<!-- createddate -->
		<td<?php echo $view_dashboard_collection_details->createddate->cellAttributes() ?>>
<span<?php echo $view_dashboard_collection_details->createddate->viewAttributes() ?>>
<?php echo $view_dashboard_collection_details->createddate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_collection_details->UserName->Visible) { // UserName ?>
		<!-- UserName -->
		<td<?php echo $view_dashboard_collection_details->UserName->cellAttributes() ?>>
<span<?php echo $view_dashboard_collection_details->UserName->viewAttributes() ?>>
<?php echo $view_dashboard_collection_details->UserName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_collection_details->BillNumber->Visible) { // BillNumber ?>
		<!-- BillNumber -->
		<td<?php echo $view_dashboard_collection_details->BillNumber->cellAttributes() ?>>
<span<?php echo $view_dashboard_collection_details->BillNumber->viewAttributes() ?>>
<?php echo $view_dashboard_collection_details->BillNumber->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_collection_details->PatientID->Visible) { // PatientID ?>
		<!-- PatientID -->
		<td<?php echo $view_dashboard_collection_details->PatientID->cellAttributes() ?>>
<span<?php echo $view_dashboard_collection_details->PatientID->viewAttributes() ?>>
<?php echo $view_dashboard_collection_details->PatientID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_collection_details->PatientName->Visible) { // PatientName ?>
		<!-- PatientName -->
		<td<?php echo $view_dashboard_collection_details->PatientName->cellAttributes() ?>>
<span<?php echo $view_dashboard_collection_details->PatientName->viewAttributes() ?>>
<?php echo $view_dashboard_collection_details->PatientName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_collection_details->Mobile->Visible) { // Mobile ?>
		<!-- Mobile -->
		<td<?php echo $view_dashboard_collection_details->Mobile->cellAttributes() ?>>
<span<?php echo $view_dashboard_collection_details->Mobile->viewAttributes() ?>>
<?php echo $view_dashboard_collection_details->Mobile->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_collection_details->voucher_type->Visible) { // voucher_type ?>
		<!-- voucher_type -->
		<td<?php echo $view_dashboard_collection_details->voucher_type->cellAttributes() ?>>
<span<?php echo $view_dashboard_collection_details->voucher_type->viewAttributes() ?>>
<?php echo $view_dashboard_collection_details->voucher_type->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_collection_details->Details->Visible) { // Details ?>
		<!-- Details -->
		<td<?php echo $view_dashboard_collection_details->Details->cellAttributes() ?>>
<span<?php echo $view_dashboard_collection_details->Details->viewAttributes() ?>>
<?php echo $view_dashboard_collection_details->Details->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_collection_details->ModeofPayment->Visible) { // ModeofPayment ?>
		<!-- ModeofPayment -->
		<td<?php echo $view_dashboard_collection_details->ModeofPayment->cellAttributes() ?>>
<span<?php echo $view_dashboard_collection_details->ModeofPayment->viewAttributes() ?>>
<?php echo $view_dashboard_collection_details->ModeofPayment->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_collection_details->Amount->Visible) { // Amount ?>
		<!-- Amount -->
		<td<?php echo $view_dashboard_collection_details->Amount->cellAttributes() ?>>
<span<?php echo $view_dashboard_collection_details->Amount->viewAttributes() ?>>
<?php echo $view_dashboard_collection_details->Amount->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_collection_details->AnyDues->Visible) { // AnyDues ?>
		<!-- AnyDues -->
		<td<?php echo $view_dashboard_collection_details->AnyDues->cellAttributes() ?>>
<span<?php echo $view_dashboard_collection_details->AnyDues->viewAttributes() ?>>
<?php echo $view_dashboard_collection_details->AnyDues->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_collection_details->createdby->Visible) { // createdby ?>
		<!-- createdby -->
		<td<?php echo $view_dashboard_collection_details->createdby->cellAttributes() ?>>
<span<?php echo $view_dashboard_collection_details->createdby->viewAttributes() ?>>
<?php echo $view_dashboard_collection_details->createdby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_collection_details->createddatetime->Visible) { // createddatetime ?>
		<!-- createddatetime -->
		<td<?php echo $view_dashboard_collection_details->createddatetime->cellAttributes() ?>>
<span<?php echo $view_dashboard_collection_details->createddatetime->viewAttributes() ?>>
<?php echo $view_dashboard_collection_details->createddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_collection_details->modifiedby->Visible) { // modifiedby ?>
		<!-- modifiedby -->
		<td<?php echo $view_dashboard_collection_details->modifiedby->cellAttributes() ?>>
<span<?php echo $view_dashboard_collection_details->modifiedby->viewAttributes() ?>>
<?php echo $view_dashboard_collection_details->modifiedby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_collection_details->modifieddatetime->Visible) { // modifieddatetime ?>
		<!-- modifieddatetime -->
		<td<?php echo $view_dashboard_collection_details->modifieddatetime->cellAttributes() ?>>
<span<?php echo $view_dashboard_collection_details->modifieddatetime->viewAttributes() ?>>
<?php echo $view_dashboard_collection_details->modifieddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_collection_details->BillType->Visible) { // BillType ?>
		<!-- BillType -->
		<td<?php echo $view_dashboard_collection_details->BillType->cellAttributes() ?>>
<span<?php echo $view_dashboard_collection_details->BillType->viewAttributes() ?>>
<?php echo $view_dashboard_collection_details->BillType->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_collection_details->HospID->Visible) { // HospID ?>
		<!-- HospID -->
		<td<?php echo $view_dashboard_collection_details->HospID->cellAttributes() ?>>
<span<?php echo $view_dashboard_collection_details->HospID->viewAttributes() ?>>
<?php echo $view_dashboard_collection_details->HospID->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$view_dashboard_collection_details_preview->ListOptions->render("body", "right", $view_dashboard_collection_details_preview->RowCnt);
?>
	</tr>
<?php
	$view_dashboard_collection_details_preview->Recordset->MoveNext();
}
?>
	</tbody>
<?php

	// Render aggregate row
	$view_dashboard_collection_details_preview->aggregateListRow(); // Prepare aggregate row

	// Render list options
	$view_dashboard_collection_details_preview->renderListOptions();
?>
	<tfoot><!-- Table footer -->
	<tr class="ew-table-footer">
<?php

// Render list options (footer, left)
$view_dashboard_collection_details_preview->ListOptions->render("footer", "left");
?>
<?php if ($view_dashboard_collection_details->id->Visible) { // id ?>
		<!-- id -->
		<td class="<?php echo $view_dashboard_collection_details->id->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_collection_details->createddate->Visible) { // createddate ?>
		<!-- createddate -->
		<td class="<?php echo $view_dashboard_collection_details->createddate->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_collection_details->UserName->Visible) { // UserName ?>
		<!-- UserName -->
		<td class="<?php echo $view_dashboard_collection_details->UserName->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_collection_details->BillNumber->Visible) { // BillNumber ?>
		<!-- BillNumber -->
		<td class="<?php echo $view_dashboard_collection_details->BillNumber->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_collection_details->PatientID->Visible) { // PatientID ?>
		<!-- PatientID -->
		<td class="<?php echo $view_dashboard_collection_details->PatientID->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_collection_details->PatientName->Visible) { // PatientName ?>
		<!-- PatientName -->
		<td class="<?php echo $view_dashboard_collection_details->PatientName->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_collection_details->Mobile->Visible) { // Mobile ?>
		<!-- Mobile -->
		<td class="<?php echo $view_dashboard_collection_details->Mobile->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_collection_details->voucher_type->Visible) { // voucher_type ?>
		<!-- voucher_type -->
		<td class="<?php echo $view_dashboard_collection_details->voucher_type->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_collection_details->Details->Visible) { // Details ?>
		<!-- Details -->
		<td class="<?php echo $view_dashboard_collection_details->Details->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_collection_details->ModeofPayment->Visible) { // ModeofPayment ?>
		<!-- ModeofPayment -->
		<td class="<?php echo $view_dashboard_collection_details->ModeofPayment->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_collection_details->Amount->Visible) { // Amount ?>
		<!-- Amount -->
		<td class="<?php echo $view_dashboard_collection_details->Amount->footerCellClass() ?>">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_dashboard_collection_details->Amount->ViewValue ?></span>
		</td>
<?php } ?>
<?php if ($view_dashboard_collection_details->AnyDues->Visible) { // AnyDues ?>
		<!-- AnyDues -->
		<td class="<?php echo $view_dashboard_collection_details->AnyDues->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_collection_details->createdby->Visible) { // createdby ?>
		<!-- createdby -->
		<td class="<?php echo $view_dashboard_collection_details->createdby->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_collection_details->createddatetime->Visible) { // createddatetime ?>
		<!-- createddatetime -->
		<td class="<?php echo $view_dashboard_collection_details->createddatetime->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_collection_details->modifiedby->Visible) { // modifiedby ?>
		<!-- modifiedby -->
		<td class="<?php echo $view_dashboard_collection_details->modifiedby->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_collection_details->modifieddatetime->Visible) { // modifieddatetime ?>
		<!-- modifieddatetime -->
		<td class="<?php echo $view_dashboard_collection_details->modifieddatetime->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_collection_details->BillType->Visible) { // BillType ?>
		<!-- BillType -->
		<td class="<?php echo $view_dashboard_collection_details->BillType->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_collection_details->HospID->Visible) { // HospID ?>
		<!-- HospID -->
		<td class="<?php echo $view_dashboard_collection_details->HospID->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php

// Render list options (footer, right)
$view_dashboard_collection_details_preview->ListOptions->render("footer", "right");
?>
	</tr>
	</tfoot>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($view_dashboard_collection_details_preview->TotalRecs > 0) { ?>
<?php if (!isset($view_dashboard_collection_details_preview->Pager)) $view_dashboard_collection_details_preview->Pager = new PrevNextPager($view_dashboard_collection_details_preview->StartRec, $view_dashboard_collection_details_preview->DisplayRecs, $view_dashboard_collection_details_preview->TotalRecs) ?>
<?php if ($view_dashboard_collection_details_preview->Pager->RecordCount > 0 && $view_dashboard_collection_details_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($view_dashboard_collection_details_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $view_dashboard_collection_details_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($view_dashboard_collection_details_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $view_dashboard_collection_details_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($view_dashboard_collection_details_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $view_dashboard_collection_details_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($view_dashboard_collection_details_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $view_dashboard_collection_details_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_dashboard_collection_details_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_dashboard_collection_details_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_dashboard_collection_details_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($view_dashboard_collection_details_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$view_dashboard_collection_details_preview->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php
if ($view_dashboard_collection_details_preview->Recordset)
	$view_dashboard_collection_details_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$view_dashboard_collection_details_preview->terminate();
?>
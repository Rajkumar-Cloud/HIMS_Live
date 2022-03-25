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
<?php if ($view_dashboard_collection_details_preview->TotalRecords > 0) { ?>
<div class="card ew-grid view_dashboard_collection_details"><!-- .card -->
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel ew-preview-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$view_dashboard_collection_details_preview->renderListOptions();

// Render list options (header, left)
$view_dashboard_collection_details_preview->ListOptions->render("header", "left");
?>
<?php if ($view_dashboard_collection_details_preview->id->Visible) { // id ?>
	<?php if ($view_dashboard_collection_details->SortUrl($view_dashboard_collection_details_preview->id) == "") { ?>
		<th class="<?php echo $view_dashboard_collection_details_preview->id->headerCellClass() ?>"><?php echo $view_dashboard_collection_details_preview->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_collection_details_preview->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_dashboard_collection_details_preview->id->Name) ?>" data-sort-order="<?php echo $view_dashboard_collection_details_preview->SortField == $view_dashboard_collection_details_preview->id->Name && $view_dashboard_collection_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_preview->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details_preview->SortField == $view_dashboard_collection_details_preview->id->Name) { ?><?php if ($view_dashboard_collection_details_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_collection_details_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details_preview->createddate->Visible) { // createddate ?>
	<?php if ($view_dashboard_collection_details->SortUrl($view_dashboard_collection_details_preview->createddate) == "") { ?>
		<th class="<?php echo $view_dashboard_collection_details_preview->createddate->headerCellClass() ?>"><?php echo $view_dashboard_collection_details_preview->createddate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_collection_details_preview->createddate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_dashboard_collection_details_preview->createddate->Name) ?>" data-sort-order="<?php echo $view_dashboard_collection_details_preview->SortField == $view_dashboard_collection_details_preview->createddate->Name && $view_dashboard_collection_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_preview->createddate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details_preview->SortField == $view_dashboard_collection_details_preview->createddate->Name) { ?><?php if ($view_dashboard_collection_details_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_collection_details_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details_preview->UserName->Visible) { // UserName ?>
	<?php if ($view_dashboard_collection_details->SortUrl($view_dashboard_collection_details_preview->UserName) == "") { ?>
		<th class="<?php echo $view_dashboard_collection_details_preview->UserName->headerCellClass() ?>"><?php echo $view_dashboard_collection_details_preview->UserName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_collection_details_preview->UserName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_dashboard_collection_details_preview->UserName->Name) ?>" data-sort-order="<?php echo $view_dashboard_collection_details_preview->SortField == $view_dashboard_collection_details_preview->UserName->Name && $view_dashboard_collection_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_preview->UserName->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details_preview->SortField == $view_dashboard_collection_details_preview->UserName->Name) { ?><?php if ($view_dashboard_collection_details_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_collection_details_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details_preview->BillNumber->Visible) { // BillNumber ?>
	<?php if ($view_dashboard_collection_details->SortUrl($view_dashboard_collection_details_preview->BillNumber) == "") { ?>
		<th class="<?php echo $view_dashboard_collection_details_preview->BillNumber->headerCellClass() ?>"><?php echo $view_dashboard_collection_details_preview->BillNumber->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_collection_details_preview->BillNumber->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_dashboard_collection_details_preview->BillNumber->Name) ?>" data-sort-order="<?php echo $view_dashboard_collection_details_preview->SortField == $view_dashboard_collection_details_preview->BillNumber->Name && $view_dashboard_collection_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_preview->BillNumber->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details_preview->SortField == $view_dashboard_collection_details_preview->BillNumber->Name) { ?><?php if ($view_dashboard_collection_details_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_collection_details_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details_preview->PatientID->Visible) { // PatientID ?>
	<?php if ($view_dashboard_collection_details->SortUrl($view_dashboard_collection_details_preview->PatientID) == "") { ?>
		<th class="<?php echo $view_dashboard_collection_details_preview->PatientID->headerCellClass() ?>"><?php echo $view_dashboard_collection_details_preview->PatientID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_collection_details_preview->PatientID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_dashboard_collection_details_preview->PatientID->Name) ?>" data-sort-order="<?php echo $view_dashboard_collection_details_preview->SortField == $view_dashboard_collection_details_preview->PatientID->Name && $view_dashboard_collection_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_preview->PatientID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details_preview->SortField == $view_dashboard_collection_details_preview->PatientID->Name) { ?><?php if ($view_dashboard_collection_details_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_collection_details_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details_preview->PatientName->Visible) { // PatientName ?>
	<?php if ($view_dashboard_collection_details->SortUrl($view_dashboard_collection_details_preview->PatientName) == "") { ?>
		<th class="<?php echo $view_dashboard_collection_details_preview->PatientName->headerCellClass() ?>"><?php echo $view_dashboard_collection_details_preview->PatientName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_collection_details_preview->PatientName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_dashboard_collection_details_preview->PatientName->Name) ?>" data-sort-order="<?php echo $view_dashboard_collection_details_preview->SortField == $view_dashboard_collection_details_preview->PatientName->Name && $view_dashboard_collection_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_preview->PatientName->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details_preview->SortField == $view_dashboard_collection_details_preview->PatientName->Name) { ?><?php if ($view_dashboard_collection_details_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_collection_details_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details_preview->Mobile->Visible) { // Mobile ?>
	<?php if ($view_dashboard_collection_details->SortUrl($view_dashboard_collection_details_preview->Mobile) == "") { ?>
		<th class="<?php echo $view_dashboard_collection_details_preview->Mobile->headerCellClass() ?>"><?php echo $view_dashboard_collection_details_preview->Mobile->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_collection_details_preview->Mobile->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_dashboard_collection_details_preview->Mobile->Name) ?>" data-sort-order="<?php echo $view_dashboard_collection_details_preview->SortField == $view_dashboard_collection_details_preview->Mobile->Name && $view_dashboard_collection_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_preview->Mobile->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details_preview->SortField == $view_dashboard_collection_details_preview->Mobile->Name) { ?><?php if ($view_dashboard_collection_details_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_collection_details_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details_preview->voucher_type->Visible) { // voucher_type ?>
	<?php if ($view_dashboard_collection_details->SortUrl($view_dashboard_collection_details_preview->voucher_type) == "") { ?>
		<th class="<?php echo $view_dashboard_collection_details_preview->voucher_type->headerCellClass() ?>"><?php echo $view_dashboard_collection_details_preview->voucher_type->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_collection_details_preview->voucher_type->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_dashboard_collection_details_preview->voucher_type->Name) ?>" data-sort-order="<?php echo $view_dashboard_collection_details_preview->SortField == $view_dashboard_collection_details_preview->voucher_type->Name && $view_dashboard_collection_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_preview->voucher_type->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details_preview->SortField == $view_dashboard_collection_details_preview->voucher_type->Name) { ?><?php if ($view_dashboard_collection_details_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_collection_details_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details_preview->Details->Visible) { // Details ?>
	<?php if ($view_dashboard_collection_details->SortUrl($view_dashboard_collection_details_preview->Details) == "") { ?>
		<th class="<?php echo $view_dashboard_collection_details_preview->Details->headerCellClass() ?>"><?php echo $view_dashboard_collection_details_preview->Details->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_collection_details_preview->Details->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_dashboard_collection_details_preview->Details->Name) ?>" data-sort-order="<?php echo $view_dashboard_collection_details_preview->SortField == $view_dashboard_collection_details_preview->Details->Name && $view_dashboard_collection_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_preview->Details->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details_preview->SortField == $view_dashboard_collection_details_preview->Details->Name) { ?><?php if ($view_dashboard_collection_details_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_collection_details_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details_preview->ModeofPayment->Visible) { // ModeofPayment ?>
	<?php if ($view_dashboard_collection_details->SortUrl($view_dashboard_collection_details_preview->ModeofPayment) == "") { ?>
		<th class="<?php echo $view_dashboard_collection_details_preview->ModeofPayment->headerCellClass() ?>"><?php echo $view_dashboard_collection_details_preview->ModeofPayment->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_collection_details_preview->ModeofPayment->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_dashboard_collection_details_preview->ModeofPayment->Name) ?>" data-sort-order="<?php echo $view_dashboard_collection_details_preview->SortField == $view_dashboard_collection_details_preview->ModeofPayment->Name && $view_dashboard_collection_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_preview->ModeofPayment->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details_preview->SortField == $view_dashboard_collection_details_preview->ModeofPayment->Name) { ?><?php if ($view_dashboard_collection_details_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_collection_details_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details_preview->Amount->Visible) { // Amount ?>
	<?php if ($view_dashboard_collection_details->SortUrl($view_dashboard_collection_details_preview->Amount) == "") { ?>
		<th class="<?php echo $view_dashboard_collection_details_preview->Amount->headerCellClass() ?>"><?php echo $view_dashboard_collection_details_preview->Amount->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_collection_details_preview->Amount->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_dashboard_collection_details_preview->Amount->Name) ?>" data-sort-order="<?php echo $view_dashboard_collection_details_preview->SortField == $view_dashboard_collection_details_preview->Amount->Name && $view_dashboard_collection_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_preview->Amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details_preview->SortField == $view_dashboard_collection_details_preview->Amount->Name) { ?><?php if ($view_dashboard_collection_details_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_collection_details_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details_preview->AnyDues->Visible) { // AnyDues ?>
	<?php if ($view_dashboard_collection_details->SortUrl($view_dashboard_collection_details_preview->AnyDues) == "") { ?>
		<th class="<?php echo $view_dashboard_collection_details_preview->AnyDues->headerCellClass() ?>"><?php echo $view_dashboard_collection_details_preview->AnyDues->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_collection_details_preview->AnyDues->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_dashboard_collection_details_preview->AnyDues->Name) ?>" data-sort-order="<?php echo $view_dashboard_collection_details_preview->SortField == $view_dashboard_collection_details_preview->AnyDues->Name && $view_dashboard_collection_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_preview->AnyDues->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details_preview->SortField == $view_dashboard_collection_details_preview->AnyDues->Name) { ?><?php if ($view_dashboard_collection_details_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_collection_details_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details_preview->createdby->Visible) { // createdby ?>
	<?php if ($view_dashboard_collection_details->SortUrl($view_dashboard_collection_details_preview->createdby) == "") { ?>
		<th class="<?php echo $view_dashboard_collection_details_preview->createdby->headerCellClass() ?>"><?php echo $view_dashboard_collection_details_preview->createdby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_collection_details_preview->createdby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_dashboard_collection_details_preview->createdby->Name) ?>" data-sort-order="<?php echo $view_dashboard_collection_details_preview->SortField == $view_dashboard_collection_details_preview->createdby->Name && $view_dashboard_collection_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_preview->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details_preview->SortField == $view_dashboard_collection_details_preview->createdby->Name) { ?><?php if ($view_dashboard_collection_details_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_collection_details_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details_preview->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_dashboard_collection_details->SortUrl($view_dashboard_collection_details_preview->createddatetime) == "") { ?>
		<th class="<?php echo $view_dashboard_collection_details_preview->createddatetime->headerCellClass() ?>"><?php echo $view_dashboard_collection_details_preview->createddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_collection_details_preview->createddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_dashboard_collection_details_preview->createddatetime->Name) ?>" data-sort-order="<?php echo $view_dashboard_collection_details_preview->SortField == $view_dashboard_collection_details_preview->createddatetime->Name && $view_dashboard_collection_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_preview->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details_preview->SortField == $view_dashboard_collection_details_preview->createddatetime->Name) { ?><?php if ($view_dashboard_collection_details_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_collection_details_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details_preview->modifiedby->Visible) { // modifiedby ?>
	<?php if ($view_dashboard_collection_details->SortUrl($view_dashboard_collection_details_preview->modifiedby) == "") { ?>
		<th class="<?php echo $view_dashboard_collection_details_preview->modifiedby->headerCellClass() ?>"><?php echo $view_dashboard_collection_details_preview->modifiedby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_collection_details_preview->modifiedby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_dashboard_collection_details_preview->modifiedby->Name) ?>" data-sort-order="<?php echo $view_dashboard_collection_details_preview->SortField == $view_dashboard_collection_details_preview->modifiedby->Name && $view_dashboard_collection_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_preview->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details_preview->SortField == $view_dashboard_collection_details_preview->modifiedby->Name) { ?><?php if ($view_dashboard_collection_details_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_collection_details_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details_preview->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($view_dashboard_collection_details->SortUrl($view_dashboard_collection_details_preview->modifieddatetime) == "") { ?>
		<th class="<?php echo $view_dashboard_collection_details_preview->modifieddatetime->headerCellClass() ?>"><?php echo $view_dashboard_collection_details_preview->modifieddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_collection_details_preview->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_dashboard_collection_details_preview->modifieddatetime->Name) ?>" data-sort-order="<?php echo $view_dashboard_collection_details_preview->SortField == $view_dashboard_collection_details_preview->modifieddatetime->Name && $view_dashboard_collection_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_preview->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details_preview->SortField == $view_dashboard_collection_details_preview->modifieddatetime->Name) { ?><?php if ($view_dashboard_collection_details_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_collection_details_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details_preview->BillType->Visible) { // BillType ?>
	<?php if ($view_dashboard_collection_details->SortUrl($view_dashboard_collection_details_preview->BillType) == "") { ?>
		<th class="<?php echo $view_dashboard_collection_details_preview->BillType->headerCellClass() ?>"><?php echo $view_dashboard_collection_details_preview->BillType->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_collection_details_preview->BillType->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_dashboard_collection_details_preview->BillType->Name) ?>" data-sort-order="<?php echo $view_dashboard_collection_details_preview->SortField == $view_dashboard_collection_details_preview->BillType->Name && $view_dashboard_collection_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_preview->BillType->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details_preview->SortField == $view_dashboard_collection_details_preview->BillType->Name) { ?><?php if ($view_dashboard_collection_details_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_collection_details_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details_preview->HospID->Visible) { // HospID ?>
	<?php if ($view_dashboard_collection_details->SortUrl($view_dashboard_collection_details_preview->HospID) == "") { ?>
		<th class="<?php echo $view_dashboard_collection_details_preview->HospID->headerCellClass() ?>"><?php echo $view_dashboard_collection_details_preview->HospID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_collection_details_preview->HospID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_dashboard_collection_details_preview->HospID->Name) ?>" data-sort-order="<?php echo $view_dashboard_collection_details_preview->SortField == $view_dashboard_collection_details_preview->HospID->Name && $view_dashboard_collection_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_preview->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details_preview->SortField == $view_dashboard_collection_details_preview->HospID->Name) { ?><?php if ($view_dashboard_collection_details_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_collection_details_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
$view_dashboard_collection_details_preview->RowCount = 0;
while ($view_dashboard_collection_details_preview->Recordset && !$view_dashboard_collection_details_preview->Recordset->EOF) {

	// Init row class and style
	$view_dashboard_collection_details_preview->RecCount++;
	$view_dashboard_collection_details_preview->RowCount++;
	$view_dashboard_collection_details_preview->CssStyle = "";
	$view_dashboard_collection_details_preview->loadListRowValues($view_dashboard_collection_details_preview->Recordset);
	$view_dashboard_collection_details_preview->aggregateListRowValues(); // Aggregate row values

	// Render row
	$view_dashboard_collection_details->RowType = ROWTYPE_PREVIEW; // Preview record
	$view_dashboard_collection_details_preview->resetAttributes();
	$view_dashboard_collection_details_preview->renderListRow();

	// Render list options
	$view_dashboard_collection_details_preview->renderListOptions();
?>
	<tr <?php echo $view_dashboard_collection_details->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_dashboard_collection_details_preview->ListOptions->render("body", "left", $view_dashboard_collection_details_preview->RowCount);
?>
<?php if ($view_dashboard_collection_details_preview->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $view_dashboard_collection_details_preview->id->cellAttributes() ?>>
<span<?php echo $view_dashboard_collection_details_preview->id->viewAttributes() ?>><?php echo $view_dashboard_collection_details_preview->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_collection_details_preview->createddate->Visible) { // createddate ?>
		<!-- createddate -->
		<td<?php echo $view_dashboard_collection_details_preview->createddate->cellAttributes() ?>>
<span<?php echo $view_dashboard_collection_details_preview->createddate->viewAttributes() ?>><?php echo $view_dashboard_collection_details_preview->createddate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_collection_details_preview->UserName->Visible) { // UserName ?>
		<!-- UserName -->
		<td<?php echo $view_dashboard_collection_details_preview->UserName->cellAttributes() ?>>
<span<?php echo $view_dashboard_collection_details_preview->UserName->viewAttributes() ?>><?php echo $view_dashboard_collection_details_preview->UserName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_collection_details_preview->BillNumber->Visible) { // BillNumber ?>
		<!-- BillNumber -->
		<td<?php echo $view_dashboard_collection_details_preview->BillNumber->cellAttributes() ?>>
<span<?php echo $view_dashboard_collection_details_preview->BillNumber->viewAttributes() ?>><?php echo $view_dashboard_collection_details_preview->BillNumber->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_collection_details_preview->PatientID->Visible) { // PatientID ?>
		<!-- PatientID -->
		<td<?php echo $view_dashboard_collection_details_preview->PatientID->cellAttributes() ?>>
<span<?php echo $view_dashboard_collection_details_preview->PatientID->viewAttributes() ?>><?php echo $view_dashboard_collection_details_preview->PatientID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_collection_details_preview->PatientName->Visible) { // PatientName ?>
		<!-- PatientName -->
		<td<?php echo $view_dashboard_collection_details_preview->PatientName->cellAttributes() ?>>
<span<?php echo $view_dashboard_collection_details_preview->PatientName->viewAttributes() ?>><?php echo $view_dashboard_collection_details_preview->PatientName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_collection_details_preview->Mobile->Visible) { // Mobile ?>
		<!-- Mobile -->
		<td<?php echo $view_dashboard_collection_details_preview->Mobile->cellAttributes() ?>>
<span<?php echo $view_dashboard_collection_details_preview->Mobile->viewAttributes() ?>><?php echo $view_dashboard_collection_details_preview->Mobile->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_collection_details_preview->voucher_type->Visible) { // voucher_type ?>
		<!-- voucher_type -->
		<td<?php echo $view_dashboard_collection_details_preview->voucher_type->cellAttributes() ?>>
<span<?php echo $view_dashboard_collection_details_preview->voucher_type->viewAttributes() ?>><?php echo $view_dashboard_collection_details_preview->voucher_type->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_collection_details_preview->Details->Visible) { // Details ?>
		<!-- Details -->
		<td<?php echo $view_dashboard_collection_details_preview->Details->cellAttributes() ?>>
<span<?php echo $view_dashboard_collection_details_preview->Details->viewAttributes() ?>><?php echo $view_dashboard_collection_details_preview->Details->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_collection_details_preview->ModeofPayment->Visible) { // ModeofPayment ?>
		<!-- ModeofPayment -->
		<td<?php echo $view_dashboard_collection_details_preview->ModeofPayment->cellAttributes() ?>>
<span<?php echo $view_dashboard_collection_details_preview->ModeofPayment->viewAttributes() ?>><?php echo $view_dashboard_collection_details_preview->ModeofPayment->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_collection_details_preview->Amount->Visible) { // Amount ?>
		<!-- Amount -->
		<td<?php echo $view_dashboard_collection_details_preview->Amount->cellAttributes() ?>>
<span<?php echo $view_dashboard_collection_details_preview->Amount->viewAttributes() ?>><?php echo $view_dashboard_collection_details_preview->Amount->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_collection_details_preview->AnyDues->Visible) { // AnyDues ?>
		<!-- AnyDues -->
		<td<?php echo $view_dashboard_collection_details_preview->AnyDues->cellAttributes() ?>>
<span<?php echo $view_dashboard_collection_details_preview->AnyDues->viewAttributes() ?>><?php echo $view_dashboard_collection_details_preview->AnyDues->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_collection_details_preview->createdby->Visible) { // createdby ?>
		<!-- createdby -->
		<td<?php echo $view_dashboard_collection_details_preview->createdby->cellAttributes() ?>>
<span<?php echo $view_dashboard_collection_details_preview->createdby->viewAttributes() ?>><?php echo $view_dashboard_collection_details_preview->createdby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_collection_details_preview->createddatetime->Visible) { // createddatetime ?>
		<!-- createddatetime -->
		<td<?php echo $view_dashboard_collection_details_preview->createddatetime->cellAttributes() ?>>
<span<?php echo $view_dashboard_collection_details_preview->createddatetime->viewAttributes() ?>><?php echo $view_dashboard_collection_details_preview->createddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_collection_details_preview->modifiedby->Visible) { // modifiedby ?>
		<!-- modifiedby -->
		<td<?php echo $view_dashboard_collection_details_preview->modifiedby->cellAttributes() ?>>
<span<?php echo $view_dashboard_collection_details_preview->modifiedby->viewAttributes() ?>><?php echo $view_dashboard_collection_details_preview->modifiedby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_collection_details_preview->modifieddatetime->Visible) { // modifieddatetime ?>
		<!-- modifieddatetime -->
		<td<?php echo $view_dashboard_collection_details_preview->modifieddatetime->cellAttributes() ?>>
<span<?php echo $view_dashboard_collection_details_preview->modifieddatetime->viewAttributes() ?>><?php echo $view_dashboard_collection_details_preview->modifieddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_collection_details_preview->BillType->Visible) { // BillType ?>
		<!-- BillType -->
		<td<?php echo $view_dashboard_collection_details_preview->BillType->cellAttributes() ?>>
<span<?php echo $view_dashboard_collection_details_preview->BillType->viewAttributes() ?>><?php echo $view_dashboard_collection_details_preview->BillType->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_collection_details_preview->HospID->Visible) { // HospID ?>
		<!-- HospID -->
		<td<?php echo $view_dashboard_collection_details_preview->HospID->cellAttributes() ?>>
<span<?php echo $view_dashboard_collection_details_preview->HospID->viewAttributes() ?>><?php echo $view_dashboard_collection_details_preview->HospID->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$view_dashboard_collection_details_preview->ListOptions->render("body", "right", $view_dashboard_collection_details_preview->RowCount);
?>
	</tr>
<?php
	$view_dashboard_collection_details_preview->Recordset->MoveNext();
} // while
?>
	</tbody>
<?php

	// Render aggregate row
	$view_dashboard_collection_details->RowType = ROWTYPE_AGGREGATE; // Aggregate
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
<?php if ($view_dashboard_collection_details_preview->id->Visible) { // id ?>
		<!-- id -->
		<td class="<?php echo $view_dashboard_collection_details_preview->id->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_collection_details_preview->createddate->Visible) { // createddate ?>
		<!-- createddate -->
		<td class="<?php echo $view_dashboard_collection_details_preview->createddate->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_collection_details_preview->UserName->Visible) { // UserName ?>
		<!-- UserName -->
		<td class="<?php echo $view_dashboard_collection_details_preview->UserName->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_collection_details_preview->BillNumber->Visible) { // BillNumber ?>
		<!-- BillNumber -->
		<td class="<?php echo $view_dashboard_collection_details_preview->BillNumber->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_collection_details_preview->PatientID->Visible) { // PatientID ?>
		<!-- PatientID -->
		<td class="<?php echo $view_dashboard_collection_details_preview->PatientID->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_collection_details_preview->PatientName->Visible) { // PatientName ?>
		<!-- PatientName -->
		<td class="<?php echo $view_dashboard_collection_details_preview->PatientName->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_collection_details_preview->Mobile->Visible) { // Mobile ?>
		<!-- Mobile -->
		<td class="<?php echo $view_dashboard_collection_details_preview->Mobile->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_collection_details_preview->voucher_type->Visible) { // voucher_type ?>
		<!-- voucher_type -->
		<td class="<?php echo $view_dashboard_collection_details_preview->voucher_type->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_collection_details_preview->Details->Visible) { // Details ?>
		<!-- Details -->
		<td class="<?php echo $view_dashboard_collection_details_preview->Details->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_collection_details_preview->ModeofPayment->Visible) { // ModeofPayment ?>
		<!-- ModeofPayment -->
		<td class="<?php echo $view_dashboard_collection_details_preview->ModeofPayment->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_collection_details_preview->Amount->Visible) { // Amount ?>
		<!-- Amount -->
		<td class="<?php echo $view_dashboard_collection_details_preview->Amount->footerCellClass() ?>">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_dashboard_collection_details_preview->Amount->ViewValue ?></span>
		</td>
<?php } ?>
<?php if ($view_dashboard_collection_details_preview->AnyDues->Visible) { // AnyDues ?>
		<!-- AnyDues -->
		<td class="<?php echo $view_dashboard_collection_details_preview->AnyDues->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_collection_details_preview->createdby->Visible) { // createdby ?>
		<!-- createdby -->
		<td class="<?php echo $view_dashboard_collection_details_preview->createdby->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_collection_details_preview->createddatetime->Visible) { // createddatetime ?>
		<!-- createddatetime -->
		<td class="<?php echo $view_dashboard_collection_details_preview->createddatetime->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_collection_details_preview->modifiedby->Visible) { // modifiedby ?>
		<!-- modifiedby -->
		<td class="<?php echo $view_dashboard_collection_details_preview->modifiedby->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_collection_details_preview->modifieddatetime->Visible) { // modifieddatetime ?>
		<!-- modifieddatetime -->
		<td class="<?php echo $view_dashboard_collection_details_preview->modifieddatetime->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_collection_details_preview->BillType->Visible) { // BillType ?>
		<!-- BillType -->
		<td class="<?php echo $view_dashboard_collection_details_preview->BillType->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_dashboard_collection_details_preview->HospID->Visible) { // HospID ?>
		<!-- HospID -->
		<td class="<?php echo $view_dashboard_collection_details_preview->HospID->footerCellClass() ?>">
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
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php echo $view_dashboard_collection_details_preview->Pager->render() ?>
<?php } else { // No record ?>
<div class="card no-border">
<div class="ew-detail-count"><?php echo $Language->phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($view_dashboard_collection_details_preview->OtherOptions as $option)
		$option->render("body");
?>
</div>
<?php if ($view_dashboard_collection_details_preview->TotalRecords > 0) { ?>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
<?php } ?>
</div><!-- /.card -->
<?php
$view_dashboard_collection_details_preview->showPageFooter();
if (Config("DEBUG"))
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
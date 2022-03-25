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
$view_lab_service_sub_preview = new view_lab_service_sub_preview();

// Run the page
$view_lab_service_sub_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_lab_service_sub_preview->Page_Render();
?>
<?php $view_lab_service_sub_preview->showPageHeader(); ?>
<?php if ($view_lab_service_sub_preview->TotalRecords > 0) { ?>
<div class="card ew-grid view_lab_service_sub"><!-- .card -->
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel ew-preview-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$view_lab_service_sub_preview->renderListOptions();

// Render list options (header, left)
$view_lab_service_sub_preview->ListOptions->render("header", "left");
?>
<?php if ($view_lab_service_sub_preview->Id->Visible) { // Id ?>
	<?php if ($view_lab_service_sub->SortUrl($view_lab_service_sub_preview->Id) == "") { ?>
		<th class="<?php echo $view_lab_service_sub_preview->Id->headerCellClass() ?>"><?php echo $view_lab_service_sub_preview->Id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_service_sub_preview->Id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_lab_service_sub_preview->Id->Name) ?>" data-sort-order="<?php echo $view_lab_service_sub_preview->SortField == $view_lab_service_sub_preview->Id->Name && $view_lab_service_sub_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub_preview->Id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub_preview->SortField == $view_lab_service_sub_preview->Id->Name) { ?><?php if ($view_lab_service_sub_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_sub_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub_preview->CODE->Visible) { // CODE ?>
	<?php if ($view_lab_service_sub->SortUrl($view_lab_service_sub_preview->CODE) == "") { ?>
		<th class="<?php echo $view_lab_service_sub_preview->CODE->headerCellClass() ?>"><?php echo $view_lab_service_sub_preview->CODE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_service_sub_preview->CODE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_lab_service_sub_preview->CODE->Name) ?>" data-sort-order="<?php echo $view_lab_service_sub_preview->SortField == $view_lab_service_sub_preview->CODE->Name && $view_lab_service_sub_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub_preview->CODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub_preview->SortField == $view_lab_service_sub_preview->CODE->Name) { ?><?php if ($view_lab_service_sub_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_sub_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub_preview->SERVICE->Visible) { // SERVICE ?>
	<?php if ($view_lab_service_sub->SortUrl($view_lab_service_sub_preview->SERVICE) == "") { ?>
		<th class="<?php echo $view_lab_service_sub_preview->SERVICE->headerCellClass() ?>"><?php echo $view_lab_service_sub_preview->SERVICE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_service_sub_preview->SERVICE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_lab_service_sub_preview->SERVICE->Name) ?>" data-sort-order="<?php echo $view_lab_service_sub_preview->SortField == $view_lab_service_sub_preview->SERVICE->Name && $view_lab_service_sub_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub_preview->SERVICE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub_preview->SortField == $view_lab_service_sub_preview->SERVICE->Name) { ?><?php if ($view_lab_service_sub_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_sub_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub_preview->UNITS->Visible) { // UNITS ?>
	<?php if ($view_lab_service_sub->SortUrl($view_lab_service_sub_preview->UNITS) == "") { ?>
		<th class="<?php echo $view_lab_service_sub_preview->UNITS->headerCellClass() ?>"><?php echo $view_lab_service_sub_preview->UNITS->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_service_sub_preview->UNITS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_lab_service_sub_preview->UNITS->Name) ?>" data-sort-order="<?php echo $view_lab_service_sub_preview->SortField == $view_lab_service_sub_preview->UNITS->Name && $view_lab_service_sub_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub_preview->UNITS->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub_preview->SortField == $view_lab_service_sub_preview->UNITS->Name) { ?><?php if ($view_lab_service_sub_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_sub_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub_preview->HospID->Visible) { // HospID ?>
	<?php if ($view_lab_service_sub->SortUrl($view_lab_service_sub_preview->HospID) == "") { ?>
		<th class="<?php echo $view_lab_service_sub_preview->HospID->headerCellClass() ?>"><?php echo $view_lab_service_sub_preview->HospID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_service_sub_preview->HospID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_lab_service_sub_preview->HospID->Name) ?>" data-sort-order="<?php echo $view_lab_service_sub_preview->SortField == $view_lab_service_sub_preview->HospID->Name && $view_lab_service_sub_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub_preview->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub_preview->SortField == $view_lab_service_sub_preview->HospID->Name) { ?><?php if ($view_lab_service_sub_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_sub_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub_preview->TestSubCd->Visible) { // TestSubCd ?>
	<?php if ($view_lab_service_sub->SortUrl($view_lab_service_sub_preview->TestSubCd) == "") { ?>
		<th class="<?php echo $view_lab_service_sub_preview->TestSubCd->headerCellClass() ?>"><?php echo $view_lab_service_sub_preview->TestSubCd->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_service_sub_preview->TestSubCd->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_lab_service_sub_preview->TestSubCd->Name) ?>" data-sort-order="<?php echo $view_lab_service_sub_preview->SortField == $view_lab_service_sub_preview->TestSubCd->Name && $view_lab_service_sub_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub_preview->TestSubCd->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub_preview->SortField == $view_lab_service_sub_preview->TestSubCd->Name) { ?><?php if ($view_lab_service_sub_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_sub_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub_preview->Method->Visible) { // Method ?>
	<?php if ($view_lab_service_sub->SortUrl($view_lab_service_sub_preview->Method) == "") { ?>
		<th class="<?php echo $view_lab_service_sub_preview->Method->headerCellClass() ?>"><?php echo $view_lab_service_sub_preview->Method->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_service_sub_preview->Method->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_lab_service_sub_preview->Method->Name) ?>" data-sort-order="<?php echo $view_lab_service_sub_preview->SortField == $view_lab_service_sub_preview->Method->Name && $view_lab_service_sub_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub_preview->Method->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub_preview->SortField == $view_lab_service_sub_preview->Method->Name) { ?><?php if ($view_lab_service_sub_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_sub_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub_preview->Order->Visible) { // Order ?>
	<?php if ($view_lab_service_sub->SortUrl($view_lab_service_sub_preview->Order) == "") { ?>
		<th class="<?php echo $view_lab_service_sub_preview->Order->headerCellClass() ?>"><?php echo $view_lab_service_sub_preview->Order->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_service_sub_preview->Order->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_lab_service_sub_preview->Order->Name) ?>" data-sort-order="<?php echo $view_lab_service_sub_preview->SortField == $view_lab_service_sub_preview->Order->Name && $view_lab_service_sub_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub_preview->Order->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub_preview->SortField == $view_lab_service_sub_preview->Order->Name) { ?><?php if ($view_lab_service_sub_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_sub_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub_preview->ResType->Visible) { // ResType ?>
	<?php if ($view_lab_service_sub->SortUrl($view_lab_service_sub_preview->ResType) == "") { ?>
		<th class="<?php echo $view_lab_service_sub_preview->ResType->headerCellClass() ?>"><?php echo $view_lab_service_sub_preview->ResType->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_service_sub_preview->ResType->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_lab_service_sub_preview->ResType->Name) ?>" data-sort-order="<?php echo $view_lab_service_sub_preview->SortField == $view_lab_service_sub_preview->ResType->Name && $view_lab_service_sub_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub_preview->ResType->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub_preview->SortField == $view_lab_service_sub_preview->ResType->Name) { ?><?php if ($view_lab_service_sub_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_sub_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub_preview->UnitCD->Visible) { // UnitCD ?>
	<?php if ($view_lab_service_sub->SortUrl($view_lab_service_sub_preview->UnitCD) == "") { ?>
		<th class="<?php echo $view_lab_service_sub_preview->UnitCD->headerCellClass() ?>"><?php echo $view_lab_service_sub_preview->UnitCD->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_service_sub_preview->UnitCD->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_lab_service_sub_preview->UnitCD->Name) ?>" data-sort-order="<?php echo $view_lab_service_sub_preview->SortField == $view_lab_service_sub_preview->UnitCD->Name && $view_lab_service_sub_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub_preview->UnitCD->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub_preview->SortField == $view_lab_service_sub_preview->UnitCD->Name) { ?><?php if ($view_lab_service_sub_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_sub_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub_preview->Sample->Visible) { // Sample ?>
	<?php if ($view_lab_service_sub->SortUrl($view_lab_service_sub_preview->Sample) == "") { ?>
		<th class="<?php echo $view_lab_service_sub_preview->Sample->headerCellClass() ?>"><?php echo $view_lab_service_sub_preview->Sample->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_service_sub_preview->Sample->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_lab_service_sub_preview->Sample->Name) ?>" data-sort-order="<?php echo $view_lab_service_sub_preview->SortField == $view_lab_service_sub_preview->Sample->Name && $view_lab_service_sub_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub_preview->Sample->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub_preview->SortField == $view_lab_service_sub_preview->Sample->Name) { ?><?php if ($view_lab_service_sub_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_sub_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub_preview->NoD->Visible) { // NoD ?>
	<?php if ($view_lab_service_sub->SortUrl($view_lab_service_sub_preview->NoD) == "") { ?>
		<th class="<?php echo $view_lab_service_sub_preview->NoD->headerCellClass() ?>"><?php echo $view_lab_service_sub_preview->NoD->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_service_sub_preview->NoD->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_lab_service_sub_preview->NoD->Name) ?>" data-sort-order="<?php echo $view_lab_service_sub_preview->SortField == $view_lab_service_sub_preview->NoD->Name && $view_lab_service_sub_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub_preview->NoD->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub_preview->SortField == $view_lab_service_sub_preview->NoD->Name) { ?><?php if ($view_lab_service_sub_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_sub_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub_preview->BillOrder->Visible) { // BillOrder ?>
	<?php if ($view_lab_service_sub->SortUrl($view_lab_service_sub_preview->BillOrder) == "") { ?>
		<th class="<?php echo $view_lab_service_sub_preview->BillOrder->headerCellClass() ?>"><?php echo $view_lab_service_sub_preview->BillOrder->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_service_sub_preview->BillOrder->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_lab_service_sub_preview->BillOrder->Name) ?>" data-sort-order="<?php echo $view_lab_service_sub_preview->SortField == $view_lab_service_sub_preview->BillOrder->Name && $view_lab_service_sub_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub_preview->BillOrder->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub_preview->SortField == $view_lab_service_sub_preview->BillOrder->Name) { ?><?php if ($view_lab_service_sub_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_sub_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub_preview->Formula->Visible) { // Formula ?>
	<?php if ($view_lab_service_sub->SortUrl($view_lab_service_sub_preview->Formula) == "") { ?>
		<th class="<?php echo $view_lab_service_sub_preview->Formula->headerCellClass() ?>"><?php echo $view_lab_service_sub_preview->Formula->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_service_sub_preview->Formula->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_lab_service_sub_preview->Formula->Name) ?>" data-sort-order="<?php echo $view_lab_service_sub_preview->SortField == $view_lab_service_sub_preview->Formula->Name && $view_lab_service_sub_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub_preview->Formula->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub_preview->SortField == $view_lab_service_sub_preview->Formula->Name) { ?><?php if ($view_lab_service_sub_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_sub_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub_preview->Inactive->Visible) { // Inactive ?>
	<?php if ($view_lab_service_sub->SortUrl($view_lab_service_sub_preview->Inactive) == "") { ?>
		<th class="<?php echo $view_lab_service_sub_preview->Inactive->headerCellClass() ?>"><?php echo $view_lab_service_sub_preview->Inactive->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_service_sub_preview->Inactive->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_lab_service_sub_preview->Inactive->Name) ?>" data-sort-order="<?php echo $view_lab_service_sub_preview->SortField == $view_lab_service_sub_preview->Inactive->Name && $view_lab_service_sub_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub_preview->Inactive->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub_preview->SortField == $view_lab_service_sub_preview->Inactive->Name) { ?><?php if ($view_lab_service_sub_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_sub_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub_preview->Outsource->Visible) { // Outsource ?>
	<?php if ($view_lab_service_sub->SortUrl($view_lab_service_sub_preview->Outsource) == "") { ?>
		<th class="<?php echo $view_lab_service_sub_preview->Outsource->headerCellClass() ?>"><?php echo $view_lab_service_sub_preview->Outsource->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_service_sub_preview->Outsource->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_lab_service_sub_preview->Outsource->Name) ?>" data-sort-order="<?php echo $view_lab_service_sub_preview->SortField == $view_lab_service_sub_preview->Outsource->Name && $view_lab_service_sub_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub_preview->Outsource->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub_preview->SortField == $view_lab_service_sub_preview->Outsource->Name) { ?><?php if ($view_lab_service_sub_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_sub_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub_preview->CollSample->Visible) { // CollSample ?>
	<?php if ($view_lab_service_sub->SortUrl($view_lab_service_sub_preview->CollSample) == "") { ?>
		<th class="<?php echo $view_lab_service_sub_preview->CollSample->headerCellClass() ?>"><?php echo $view_lab_service_sub_preview->CollSample->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_service_sub_preview->CollSample->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_lab_service_sub_preview->CollSample->Name) ?>" data-sort-order="<?php echo $view_lab_service_sub_preview->SortField == $view_lab_service_sub_preview->CollSample->Name && $view_lab_service_sub_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub_preview->CollSample->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub_preview->SortField == $view_lab_service_sub_preview->CollSample->Name) { ?><?php if ($view_lab_service_sub_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_sub_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_lab_service_sub_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$view_lab_service_sub_preview->RecCount = 0;
$view_lab_service_sub_preview->RowCount = 0;
while ($view_lab_service_sub_preview->Recordset && !$view_lab_service_sub_preview->Recordset->EOF) {

	// Init row class and style
	$view_lab_service_sub_preview->RecCount++;
	$view_lab_service_sub_preview->RowCount++;
	$view_lab_service_sub_preview->CssStyle = "";
	$view_lab_service_sub_preview->loadListRowValues($view_lab_service_sub_preview->Recordset);

	// Render row
	$view_lab_service_sub->RowType = ROWTYPE_PREVIEW; // Preview record
	$view_lab_service_sub_preview->resetAttributes();
	$view_lab_service_sub_preview->renderListRow();

	// Render list options
	$view_lab_service_sub_preview->renderListOptions();
?>
	<tr <?php echo $view_lab_service_sub->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_lab_service_sub_preview->ListOptions->render("body", "left", $view_lab_service_sub_preview->RowCount);
?>
<?php if ($view_lab_service_sub_preview->Id->Visible) { // Id ?>
		<!-- Id -->
		<td<?php echo $view_lab_service_sub_preview->Id->cellAttributes() ?>>
<span<?php echo $view_lab_service_sub_preview->Id->viewAttributes() ?>><?php echo $view_lab_service_sub_preview->Id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_service_sub_preview->CODE->Visible) { // CODE ?>
		<!-- CODE -->
		<td<?php echo $view_lab_service_sub_preview->CODE->cellAttributes() ?>>
<span<?php echo $view_lab_service_sub_preview->CODE->viewAttributes() ?>><?php echo $view_lab_service_sub_preview->CODE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_service_sub_preview->SERVICE->Visible) { // SERVICE ?>
		<!-- SERVICE -->
		<td<?php echo $view_lab_service_sub_preview->SERVICE->cellAttributes() ?>>
<span<?php echo $view_lab_service_sub_preview->SERVICE->viewAttributes() ?>><?php echo $view_lab_service_sub_preview->SERVICE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_service_sub_preview->UNITS->Visible) { // UNITS ?>
		<!-- UNITS -->
		<td<?php echo $view_lab_service_sub_preview->UNITS->cellAttributes() ?>>
<span<?php echo $view_lab_service_sub_preview->UNITS->viewAttributes() ?>><?php echo $view_lab_service_sub_preview->UNITS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_service_sub_preview->HospID->Visible) { // HospID ?>
		<!-- HospID -->
		<td<?php echo $view_lab_service_sub_preview->HospID->cellAttributes() ?>>
<span<?php echo $view_lab_service_sub_preview->HospID->viewAttributes() ?>><?php echo $view_lab_service_sub_preview->HospID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_service_sub_preview->TestSubCd->Visible) { // TestSubCd ?>
		<!-- TestSubCd -->
		<td<?php echo $view_lab_service_sub_preview->TestSubCd->cellAttributes() ?>>
<span<?php echo $view_lab_service_sub_preview->TestSubCd->viewAttributes() ?>><?php echo $view_lab_service_sub_preview->TestSubCd->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_service_sub_preview->Method->Visible) { // Method ?>
		<!-- Method -->
		<td<?php echo $view_lab_service_sub_preview->Method->cellAttributes() ?>>
<span<?php echo $view_lab_service_sub_preview->Method->viewAttributes() ?>><?php echo $view_lab_service_sub_preview->Method->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_service_sub_preview->Order->Visible) { // Order ?>
		<!-- Order -->
		<td<?php echo $view_lab_service_sub_preview->Order->cellAttributes() ?>>
<span<?php echo $view_lab_service_sub_preview->Order->viewAttributes() ?>><?php echo $view_lab_service_sub_preview->Order->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_service_sub_preview->ResType->Visible) { // ResType ?>
		<!-- ResType -->
		<td<?php echo $view_lab_service_sub_preview->ResType->cellAttributes() ?>>
<span<?php echo $view_lab_service_sub_preview->ResType->viewAttributes() ?>><?php echo $view_lab_service_sub_preview->ResType->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_service_sub_preview->UnitCD->Visible) { // UnitCD ?>
		<!-- UnitCD -->
		<td<?php echo $view_lab_service_sub_preview->UnitCD->cellAttributes() ?>>
<span<?php echo $view_lab_service_sub_preview->UnitCD->viewAttributes() ?>><?php echo $view_lab_service_sub_preview->UnitCD->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_service_sub_preview->Sample->Visible) { // Sample ?>
		<!-- Sample -->
		<td<?php echo $view_lab_service_sub_preview->Sample->cellAttributes() ?>>
<span<?php echo $view_lab_service_sub_preview->Sample->viewAttributes() ?>><?php echo $view_lab_service_sub_preview->Sample->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_service_sub_preview->NoD->Visible) { // NoD ?>
		<!-- NoD -->
		<td<?php echo $view_lab_service_sub_preview->NoD->cellAttributes() ?>>
<span<?php echo $view_lab_service_sub_preview->NoD->viewAttributes() ?>><?php echo $view_lab_service_sub_preview->NoD->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_service_sub_preview->BillOrder->Visible) { // BillOrder ?>
		<!-- BillOrder -->
		<td<?php echo $view_lab_service_sub_preview->BillOrder->cellAttributes() ?>>
<span<?php echo $view_lab_service_sub_preview->BillOrder->viewAttributes() ?>><?php echo $view_lab_service_sub_preview->BillOrder->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_service_sub_preview->Formula->Visible) { // Formula ?>
		<!-- Formula -->
		<td<?php echo $view_lab_service_sub_preview->Formula->cellAttributes() ?>>
<span<?php echo $view_lab_service_sub_preview->Formula->viewAttributes() ?>><?php echo $view_lab_service_sub_preview->Formula->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_service_sub_preview->Inactive->Visible) { // Inactive ?>
		<!-- Inactive -->
		<td<?php echo $view_lab_service_sub_preview->Inactive->cellAttributes() ?>>
<span<?php echo $view_lab_service_sub_preview->Inactive->viewAttributes() ?>><?php echo $view_lab_service_sub_preview->Inactive->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_service_sub_preview->Outsource->Visible) { // Outsource ?>
		<!-- Outsource -->
		<td<?php echo $view_lab_service_sub_preview->Outsource->cellAttributes() ?>>
<span<?php echo $view_lab_service_sub_preview->Outsource->viewAttributes() ?>><?php echo $view_lab_service_sub_preview->Outsource->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_service_sub_preview->CollSample->Visible) { // CollSample ?>
		<!-- CollSample -->
		<td<?php echo $view_lab_service_sub_preview->CollSample->cellAttributes() ?>>
<span<?php echo $view_lab_service_sub_preview->CollSample->viewAttributes() ?>><?php echo $view_lab_service_sub_preview->CollSample->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$view_lab_service_sub_preview->ListOptions->render("body", "right", $view_lab_service_sub_preview->RowCount);
?>
	</tr>
<?php
	$view_lab_service_sub_preview->Recordset->MoveNext();
} // while
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php echo $view_lab_service_sub_preview->Pager->render() ?>
<?php } else { // No record ?>
<div class="card no-border">
<div class="ew-detail-count"><?php echo $Language->phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($view_lab_service_sub_preview->OtherOptions as $option)
		$option->render("body");
?>
</div>
<?php if ($view_lab_service_sub_preview->TotalRecords > 0) { ?>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
<?php } ?>
</div><!-- /.card -->
<?php
$view_lab_service_sub_preview->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php
if ($view_lab_service_sub_preview->Recordset)
	$view_lab_service_sub_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$view_lab_service_sub_preview->terminate();
?>
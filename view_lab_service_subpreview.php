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
<div class="card ew-grid view_lab_service_sub"><!-- .card -->
<?php if ($view_lab_service_sub_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$view_lab_service_sub_preview->renderListOptions();

// Render list options (header, left)
$view_lab_service_sub_preview->ListOptions->render("header", "left");
?>
<?php if ($view_lab_service_sub->Id->Visible) { // Id ?>
	<?php if ($view_lab_service_sub->SortUrl($view_lab_service_sub->Id) == "") { ?>
		<th class="<?php echo $view_lab_service_sub->Id->headerCellClass() ?>"><?php echo $view_lab_service_sub->Id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_service_sub->Id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_service_sub->Id->Name ?>" data-sort-order="<?php echo $view_lab_service_sub_preview->SortField == $view_lab_service_sub->Id->Name && $view_lab_service_sub_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_service_sub->Id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_service_sub_preview->SortField == $view_lab_service_sub->Id->Name) { ?><?php if ($view_lab_service_sub_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_service_sub_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub->CODE->Visible) { // CODE ?>
	<?php if ($view_lab_service_sub->SortUrl($view_lab_service_sub->CODE) == "") { ?>
		<th class="<?php echo $view_lab_service_sub->CODE->headerCellClass() ?>"><?php echo $view_lab_service_sub->CODE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_service_sub->CODE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_service_sub->CODE->Name ?>" data-sort-order="<?php echo $view_lab_service_sub_preview->SortField == $view_lab_service_sub->CODE->Name && $view_lab_service_sub_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_service_sub->CODE->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_service_sub_preview->SortField == $view_lab_service_sub->CODE->Name) { ?><?php if ($view_lab_service_sub_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_service_sub_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub->SERVICE->Visible) { // SERVICE ?>
	<?php if ($view_lab_service_sub->SortUrl($view_lab_service_sub->SERVICE) == "") { ?>
		<th class="<?php echo $view_lab_service_sub->SERVICE->headerCellClass() ?>"><?php echo $view_lab_service_sub->SERVICE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_service_sub->SERVICE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_service_sub->SERVICE->Name ?>" data-sort-order="<?php echo $view_lab_service_sub_preview->SortField == $view_lab_service_sub->SERVICE->Name && $view_lab_service_sub_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_service_sub->SERVICE->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_service_sub_preview->SortField == $view_lab_service_sub->SERVICE->Name) { ?><?php if ($view_lab_service_sub_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_service_sub_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub->UNITS->Visible) { // UNITS ?>
	<?php if ($view_lab_service_sub->SortUrl($view_lab_service_sub->UNITS) == "") { ?>
		<th class="<?php echo $view_lab_service_sub->UNITS->headerCellClass() ?>"><?php echo $view_lab_service_sub->UNITS->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_service_sub->UNITS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_service_sub->UNITS->Name ?>" data-sort-order="<?php echo $view_lab_service_sub_preview->SortField == $view_lab_service_sub->UNITS->Name && $view_lab_service_sub_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_service_sub->UNITS->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_service_sub_preview->SortField == $view_lab_service_sub->UNITS->Name) { ?><?php if ($view_lab_service_sub_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_service_sub_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub->HospID->Visible) { // HospID ?>
	<?php if ($view_lab_service_sub->SortUrl($view_lab_service_sub->HospID) == "") { ?>
		<th class="<?php echo $view_lab_service_sub->HospID->headerCellClass() ?>"><?php echo $view_lab_service_sub->HospID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_service_sub->HospID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_service_sub->HospID->Name ?>" data-sort-order="<?php echo $view_lab_service_sub_preview->SortField == $view_lab_service_sub->HospID->Name && $view_lab_service_sub_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_service_sub->HospID->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_service_sub_preview->SortField == $view_lab_service_sub->HospID->Name) { ?><?php if ($view_lab_service_sub_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_service_sub_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub->TestSubCd->Visible) { // TestSubCd ?>
	<?php if ($view_lab_service_sub->SortUrl($view_lab_service_sub->TestSubCd) == "") { ?>
		<th class="<?php echo $view_lab_service_sub->TestSubCd->headerCellClass() ?>"><?php echo $view_lab_service_sub->TestSubCd->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_service_sub->TestSubCd->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_service_sub->TestSubCd->Name ?>" data-sort-order="<?php echo $view_lab_service_sub_preview->SortField == $view_lab_service_sub->TestSubCd->Name && $view_lab_service_sub_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_service_sub->TestSubCd->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_service_sub_preview->SortField == $view_lab_service_sub->TestSubCd->Name) { ?><?php if ($view_lab_service_sub_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_service_sub_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub->Method->Visible) { // Method ?>
	<?php if ($view_lab_service_sub->SortUrl($view_lab_service_sub->Method) == "") { ?>
		<th class="<?php echo $view_lab_service_sub->Method->headerCellClass() ?>"><?php echo $view_lab_service_sub->Method->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_service_sub->Method->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_service_sub->Method->Name ?>" data-sort-order="<?php echo $view_lab_service_sub_preview->SortField == $view_lab_service_sub->Method->Name && $view_lab_service_sub_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_service_sub->Method->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_service_sub_preview->SortField == $view_lab_service_sub->Method->Name) { ?><?php if ($view_lab_service_sub_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_service_sub_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub->Order->Visible) { // Order ?>
	<?php if ($view_lab_service_sub->SortUrl($view_lab_service_sub->Order) == "") { ?>
		<th class="<?php echo $view_lab_service_sub->Order->headerCellClass() ?>"><?php echo $view_lab_service_sub->Order->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_service_sub->Order->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_service_sub->Order->Name ?>" data-sort-order="<?php echo $view_lab_service_sub_preview->SortField == $view_lab_service_sub->Order->Name && $view_lab_service_sub_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_service_sub->Order->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_service_sub_preview->SortField == $view_lab_service_sub->Order->Name) { ?><?php if ($view_lab_service_sub_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_service_sub_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub->ResType->Visible) { // ResType ?>
	<?php if ($view_lab_service_sub->SortUrl($view_lab_service_sub->ResType) == "") { ?>
		<th class="<?php echo $view_lab_service_sub->ResType->headerCellClass() ?>"><?php echo $view_lab_service_sub->ResType->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_service_sub->ResType->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_service_sub->ResType->Name ?>" data-sort-order="<?php echo $view_lab_service_sub_preview->SortField == $view_lab_service_sub->ResType->Name && $view_lab_service_sub_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_service_sub->ResType->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_service_sub_preview->SortField == $view_lab_service_sub->ResType->Name) { ?><?php if ($view_lab_service_sub_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_service_sub_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub->UnitCD->Visible) { // UnitCD ?>
	<?php if ($view_lab_service_sub->SortUrl($view_lab_service_sub->UnitCD) == "") { ?>
		<th class="<?php echo $view_lab_service_sub->UnitCD->headerCellClass() ?>"><?php echo $view_lab_service_sub->UnitCD->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_service_sub->UnitCD->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_service_sub->UnitCD->Name ?>" data-sort-order="<?php echo $view_lab_service_sub_preview->SortField == $view_lab_service_sub->UnitCD->Name && $view_lab_service_sub_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_service_sub->UnitCD->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_service_sub_preview->SortField == $view_lab_service_sub->UnitCD->Name) { ?><?php if ($view_lab_service_sub_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_service_sub_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub->Sample->Visible) { // Sample ?>
	<?php if ($view_lab_service_sub->SortUrl($view_lab_service_sub->Sample) == "") { ?>
		<th class="<?php echo $view_lab_service_sub->Sample->headerCellClass() ?>"><?php echo $view_lab_service_sub->Sample->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_service_sub->Sample->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_service_sub->Sample->Name ?>" data-sort-order="<?php echo $view_lab_service_sub_preview->SortField == $view_lab_service_sub->Sample->Name && $view_lab_service_sub_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_service_sub->Sample->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_service_sub_preview->SortField == $view_lab_service_sub->Sample->Name) { ?><?php if ($view_lab_service_sub_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_service_sub_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub->NoD->Visible) { // NoD ?>
	<?php if ($view_lab_service_sub->SortUrl($view_lab_service_sub->NoD) == "") { ?>
		<th class="<?php echo $view_lab_service_sub->NoD->headerCellClass() ?>"><?php echo $view_lab_service_sub->NoD->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_service_sub->NoD->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_service_sub->NoD->Name ?>" data-sort-order="<?php echo $view_lab_service_sub_preview->SortField == $view_lab_service_sub->NoD->Name && $view_lab_service_sub_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_service_sub->NoD->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_service_sub_preview->SortField == $view_lab_service_sub->NoD->Name) { ?><?php if ($view_lab_service_sub_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_service_sub_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub->BillOrder->Visible) { // BillOrder ?>
	<?php if ($view_lab_service_sub->SortUrl($view_lab_service_sub->BillOrder) == "") { ?>
		<th class="<?php echo $view_lab_service_sub->BillOrder->headerCellClass() ?>"><?php echo $view_lab_service_sub->BillOrder->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_service_sub->BillOrder->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_service_sub->BillOrder->Name ?>" data-sort-order="<?php echo $view_lab_service_sub_preview->SortField == $view_lab_service_sub->BillOrder->Name && $view_lab_service_sub_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_service_sub->BillOrder->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_service_sub_preview->SortField == $view_lab_service_sub->BillOrder->Name) { ?><?php if ($view_lab_service_sub_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_service_sub_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub->Formula->Visible) { // Formula ?>
	<?php if ($view_lab_service_sub->SortUrl($view_lab_service_sub->Formula) == "") { ?>
		<th class="<?php echo $view_lab_service_sub->Formula->headerCellClass() ?>"><?php echo $view_lab_service_sub->Formula->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_service_sub->Formula->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_service_sub->Formula->Name ?>" data-sort-order="<?php echo $view_lab_service_sub_preview->SortField == $view_lab_service_sub->Formula->Name && $view_lab_service_sub_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_service_sub->Formula->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_service_sub_preview->SortField == $view_lab_service_sub->Formula->Name) { ?><?php if ($view_lab_service_sub_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_service_sub_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub->Inactive->Visible) { // Inactive ?>
	<?php if ($view_lab_service_sub->SortUrl($view_lab_service_sub->Inactive) == "") { ?>
		<th class="<?php echo $view_lab_service_sub->Inactive->headerCellClass() ?>"><?php echo $view_lab_service_sub->Inactive->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_service_sub->Inactive->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_service_sub->Inactive->Name ?>" data-sort-order="<?php echo $view_lab_service_sub_preview->SortField == $view_lab_service_sub->Inactive->Name && $view_lab_service_sub_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_service_sub->Inactive->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_service_sub_preview->SortField == $view_lab_service_sub->Inactive->Name) { ?><?php if ($view_lab_service_sub_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_service_sub_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub->Outsource->Visible) { // Outsource ?>
	<?php if ($view_lab_service_sub->SortUrl($view_lab_service_sub->Outsource) == "") { ?>
		<th class="<?php echo $view_lab_service_sub->Outsource->headerCellClass() ?>"><?php echo $view_lab_service_sub->Outsource->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_service_sub->Outsource->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_service_sub->Outsource->Name ?>" data-sort-order="<?php echo $view_lab_service_sub_preview->SortField == $view_lab_service_sub->Outsource->Name && $view_lab_service_sub_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_service_sub->Outsource->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_service_sub_preview->SortField == $view_lab_service_sub->Outsource->Name) { ?><?php if ($view_lab_service_sub_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_service_sub_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub->CollSample->Visible) { // CollSample ?>
	<?php if ($view_lab_service_sub->SortUrl($view_lab_service_sub->CollSample) == "") { ?>
		<th class="<?php echo $view_lab_service_sub->CollSample->headerCellClass() ?>"><?php echo $view_lab_service_sub->CollSample->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_service_sub->CollSample->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_service_sub->CollSample->Name ?>" data-sort-order="<?php echo $view_lab_service_sub_preview->SortField == $view_lab_service_sub->CollSample->Name && $view_lab_service_sub_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_service_sub->CollSample->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_service_sub_preview->SortField == $view_lab_service_sub->CollSample->Name) { ?><?php if ($view_lab_service_sub_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_service_sub_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
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
$view_lab_service_sub_preview->RowCnt = 0;
while ($view_lab_service_sub_preview->Recordset && !$view_lab_service_sub_preview->Recordset->EOF) {

	// Init row class and style
	$view_lab_service_sub_preview->RecCount++;
	$view_lab_service_sub_preview->RowCnt++;
	$view_lab_service_sub_preview->CssStyle = "";
	$view_lab_service_sub_preview->loadListRowValues($view_lab_service_sub_preview->Recordset);

	// Render row
	$view_lab_service_sub_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$view_lab_service_sub_preview->resetAttributes();
	$view_lab_service_sub_preview->renderListRow();

	// Render list options
	$view_lab_service_sub_preview->renderListOptions();
?>
	<tr<?php echo $view_lab_service_sub_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_lab_service_sub_preview->ListOptions->render("body", "left", $view_lab_service_sub_preview->RowCnt);
?>
<?php if ($view_lab_service_sub->Id->Visible) { // Id ?>
		<!-- Id -->
		<td<?php echo $view_lab_service_sub->Id->cellAttributes() ?>>
<span<?php echo $view_lab_service_sub->Id->viewAttributes() ?>>
<?php echo $view_lab_service_sub->Id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_service_sub->CODE->Visible) { // CODE ?>
		<!-- CODE -->
		<td<?php echo $view_lab_service_sub->CODE->cellAttributes() ?>>
<span<?php echo $view_lab_service_sub->CODE->viewAttributes() ?>>
<?php echo $view_lab_service_sub->CODE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_service_sub->SERVICE->Visible) { // SERVICE ?>
		<!-- SERVICE -->
		<td<?php echo $view_lab_service_sub->SERVICE->cellAttributes() ?>>
<span<?php echo $view_lab_service_sub->SERVICE->viewAttributes() ?>>
<?php echo $view_lab_service_sub->SERVICE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_service_sub->UNITS->Visible) { // UNITS ?>
		<!-- UNITS -->
		<td<?php echo $view_lab_service_sub->UNITS->cellAttributes() ?>>
<span<?php echo $view_lab_service_sub->UNITS->viewAttributes() ?>>
<?php echo $view_lab_service_sub->UNITS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_service_sub->HospID->Visible) { // HospID ?>
		<!-- HospID -->
		<td<?php echo $view_lab_service_sub->HospID->cellAttributes() ?>>
<span<?php echo $view_lab_service_sub->HospID->viewAttributes() ?>>
<?php echo $view_lab_service_sub->HospID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_service_sub->TestSubCd->Visible) { // TestSubCd ?>
		<!-- TestSubCd -->
		<td<?php echo $view_lab_service_sub->TestSubCd->cellAttributes() ?>>
<span<?php echo $view_lab_service_sub->TestSubCd->viewAttributes() ?>>
<?php echo $view_lab_service_sub->TestSubCd->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_service_sub->Method->Visible) { // Method ?>
		<!-- Method -->
		<td<?php echo $view_lab_service_sub->Method->cellAttributes() ?>>
<span<?php echo $view_lab_service_sub->Method->viewAttributes() ?>>
<?php echo $view_lab_service_sub->Method->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_service_sub->Order->Visible) { // Order ?>
		<!-- Order -->
		<td<?php echo $view_lab_service_sub->Order->cellAttributes() ?>>
<span<?php echo $view_lab_service_sub->Order->viewAttributes() ?>>
<?php echo $view_lab_service_sub->Order->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_service_sub->ResType->Visible) { // ResType ?>
		<!-- ResType -->
		<td<?php echo $view_lab_service_sub->ResType->cellAttributes() ?>>
<span<?php echo $view_lab_service_sub->ResType->viewAttributes() ?>>
<?php echo $view_lab_service_sub->ResType->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_service_sub->UnitCD->Visible) { // UnitCD ?>
		<!-- UnitCD -->
		<td<?php echo $view_lab_service_sub->UnitCD->cellAttributes() ?>>
<span<?php echo $view_lab_service_sub->UnitCD->viewAttributes() ?>>
<?php echo $view_lab_service_sub->UnitCD->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_service_sub->Sample->Visible) { // Sample ?>
		<!-- Sample -->
		<td<?php echo $view_lab_service_sub->Sample->cellAttributes() ?>>
<span<?php echo $view_lab_service_sub->Sample->viewAttributes() ?>>
<?php echo $view_lab_service_sub->Sample->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_service_sub->NoD->Visible) { // NoD ?>
		<!-- NoD -->
		<td<?php echo $view_lab_service_sub->NoD->cellAttributes() ?>>
<span<?php echo $view_lab_service_sub->NoD->viewAttributes() ?>>
<?php echo $view_lab_service_sub->NoD->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_service_sub->BillOrder->Visible) { // BillOrder ?>
		<!-- BillOrder -->
		<td<?php echo $view_lab_service_sub->BillOrder->cellAttributes() ?>>
<span<?php echo $view_lab_service_sub->BillOrder->viewAttributes() ?>>
<?php echo $view_lab_service_sub->BillOrder->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_service_sub->Formula->Visible) { // Formula ?>
		<!-- Formula -->
		<td<?php echo $view_lab_service_sub->Formula->cellAttributes() ?>>
<span<?php echo $view_lab_service_sub->Formula->viewAttributes() ?>>
<?php echo $view_lab_service_sub->Formula->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_service_sub->Inactive->Visible) { // Inactive ?>
		<!-- Inactive -->
		<td<?php echo $view_lab_service_sub->Inactive->cellAttributes() ?>>
<span<?php echo $view_lab_service_sub->Inactive->viewAttributes() ?>>
<?php echo $view_lab_service_sub->Inactive->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_service_sub->Outsource->Visible) { // Outsource ?>
		<!-- Outsource -->
		<td<?php echo $view_lab_service_sub->Outsource->cellAttributes() ?>>
<span<?php echo $view_lab_service_sub->Outsource->viewAttributes() ?>>
<?php echo $view_lab_service_sub->Outsource->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_service_sub->CollSample->Visible) { // CollSample ?>
		<!-- CollSample -->
		<td<?php echo $view_lab_service_sub->CollSample->cellAttributes() ?>>
<span<?php echo $view_lab_service_sub->CollSample->viewAttributes() ?>>
<?php echo $view_lab_service_sub->CollSample->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$view_lab_service_sub_preview->ListOptions->render("body", "right", $view_lab_service_sub_preview->RowCnt);
?>
	</tr>
<?php
	$view_lab_service_sub_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($view_lab_service_sub_preview->TotalRecs > 0) { ?>
<?php if (!isset($view_lab_service_sub_preview->Pager)) $view_lab_service_sub_preview->Pager = new PrevNextPager($view_lab_service_sub_preview->StartRec, $view_lab_service_sub_preview->DisplayRecs, $view_lab_service_sub_preview->TotalRecs) ?>
<?php if ($view_lab_service_sub_preview->Pager->RecordCount > 0 && $view_lab_service_sub_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($view_lab_service_sub_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $view_lab_service_sub_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($view_lab_service_sub_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $view_lab_service_sub_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($view_lab_service_sub_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $view_lab_service_sub_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($view_lab_service_sub_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $view_lab_service_sub_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_lab_service_sub_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_lab_service_sub_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_lab_service_sub_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($view_lab_service_sub_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$view_lab_service_sub_preview->showPageFooter();
if (DEBUG_ENABLED)
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
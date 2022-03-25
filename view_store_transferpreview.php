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
$view_store_transfer_preview = new view_store_transfer_preview();

// Run the page
$view_store_transfer_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_store_transfer_preview->Page_Render();
?>
<?php $view_store_transfer_preview->showPageHeader(); ?>
<div class="card ew-grid view_store_transfer"><!-- .card -->
<?php if ($view_store_transfer_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$view_store_transfer_preview->renderListOptions();

// Render list options (header, left)
$view_store_transfer_preview->ListOptions->render("header", "left");
?>
<?php if ($view_store_transfer->ORDNO->Visible) { // ORDNO ?>
	<?php if ($view_store_transfer->SortUrl($view_store_transfer->ORDNO) == "") { ?>
		<th class="<?php echo $view_store_transfer->ORDNO->headerCellClass() ?>"><?php echo $view_store_transfer->ORDNO->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_store_transfer->ORDNO->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_store_transfer->ORDNO->Name ?>" data-sort-order="<?php echo $view_store_transfer_preview->SortField == $view_store_transfer->ORDNO->Name && $view_store_transfer_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_store_transfer->ORDNO->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_store_transfer_preview->SortField == $view_store_transfer->ORDNO->Name) { ?><?php if ($view_store_transfer_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_store_transfer_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_transfer->PRC->Visible) { // PRC ?>
	<?php if ($view_store_transfer->SortUrl($view_store_transfer->PRC) == "") { ?>
		<th class="<?php echo $view_store_transfer->PRC->headerCellClass() ?>"><?php echo $view_store_transfer->PRC->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_store_transfer->PRC->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_store_transfer->PRC->Name ?>" data-sort-order="<?php echo $view_store_transfer_preview->SortField == $view_store_transfer->PRC->Name && $view_store_transfer_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_store_transfer->PRC->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_store_transfer_preview->SortField == $view_store_transfer->PRC->Name) { ?><?php if ($view_store_transfer_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_store_transfer_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_transfer->LastMonthSale->Visible) { // LastMonthSale ?>
	<?php if ($view_store_transfer->SortUrl($view_store_transfer->LastMonthSale) == "") { ?>
		<th class="<?php echo $view_store_transfer->LastMonthSale->headerCellClass() ?>"><?php echo $view_store_transfer->LastMonthSale->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_store_transfer->LastMonthSale->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_store_transfer->LastMonthSale->Name ?>" data-sort-order="<?php echo $view_store_transfer_preview->SortField == $view_store_transfer->LastMonthSale->Name && $view_store_transfer_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_store_transfer->LastMonthSale->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_store_transfer_preview->SortField == $view_store_transfer->LastMonthSale->Name) { ?><?php if ($view_store_transfer_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_store_transfer_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_transfer->BatchNo->Visible) { // BatchNo ?>
	<?php if ($view_store_transfer->SortUrl($view_store_transfer->BatchNo) == "") { ?>
		<th class="<?php echo $view_store_transfer->BatchNo->headerCellClass() ?>"><?php echo $view_store_transfer->BatchNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_store_transfer->BatchNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_store_transfer->BatchNo->Name ?>" data-sort-order="<?php echo $view_store_transfer_preview->SortField == $view_store_transfer->BatchNo->Name && $view_store_transfer_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_store_transfer->BatchNo->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_store_transfer_preview->SortField == $view_store_transfer->BatchNo->Name) { ?><?php if ($view_store_transfer_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_store_transfer_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_transfer->ExpDate->Visible) { // ExpDate ?>
	<?php if ($view_store_transfer->SortUrl($view_store_transfer->ExpDate) == "") { ?>
		<th class="<?php echo $view_store_transfer->ExpDate->headerCellClass() ?>"><?php echo $view_store_transfer->ExpDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_store_transfer->ExpDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_store_transfer->ExpDate->Name ?>" data-sort-order="<?php echo $view_store_transfer_preview->SortField == $view_store_transfer->ExpDate->Name && $view_store_transfer_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_store_transfer->ExpDate->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_store_transfer_preview->SortField == $view_store_transfer->ExpDate->Name) { ?><?php if ($view_store_transfer_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_store_transfer_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_transfer->PrName->Visible) { // PrName ?>
	<?php if ($view_store_transfer->SortUrl($view_store_transfer->PrName) == "") { ?>
		<th class="<?php echo $view_store_transfer->PrName->headerCellClass() ?>"><?php echo $view_store_transfer->PrName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_store_transfer->PrName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_store_transfer->PrName->Name ?>" data-sort-order="<?php echo $view_store_transfer_preview->SortField == $view_store_transfer->PrName->Name && $view_store_transfer_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_store_transfer->PrName->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_store_transfer_preview->SortField == $view_store_transfer->PrName->Name) { ?><?php if ($view_store_transfer_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_store_transfer_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_transfer->Quantity->Visible) { // Quantity ?>
	<?php if ($view_store_transfer->SortUrl($view_store_transfer->Quantity) == "") { ?>
		<th class="<?php echo $view_store_transfer->Quantity->headerCellClass() ?>"><?php echo $view_store_transfer->Quantity->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_store_transfer->Quantity->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_store_transfer->Quantity->Name ?>" data-sort-order="<?php echo $view_store_transfer_preview->SortField == $view_store_transfer->Quantity->Name && $view_store_transfer_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_store_transfer->Quantity->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_store_transfer_preview->SortField == $view_store_transfer->Quantity->Name) { ?><?php if ($view_store_transfer_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_store_transfer_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_transfer->ItemValue->Visible) { // ItemValue ?>
	<?php if ($view_store_transfer->SortUrl($view_store_transfer->ItemValue) == "") { ?>
		<th class="<?php echo $view_store_transfer->ItemValue->headerCellClass() ?>"><?php echo $view_store_transfer->ItemValue->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_store_transfer->ItemValue->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_store_transfer->ItemValue->Name ?>" data-sort-order="<?php echo $view_store_transfer_preview->SortField == $view_store_transfer->ItemValue->Name && $view_store_transfer_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_store_transfer->ItemValue->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_store_transfer_preview->SortField == $view_store_transfer->ItemValue->Name) { ?><?php if ($view_store_transfer_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_store_transfer_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_transfer->MRP->Visible) { // MRP ?>
	<?php if ($view_store_transfer->SortUrl($view_store_transfer->MRP) == "") { ?>
		<th class="<?php echo $view_store_transfer->MRP->headerCellClass() ?>"><?php echo $view_store_transfer->MRP->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_store_transfer->MRP->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_store_transfer->MRP->Name ?>" data-sort-order="<?php echo $view_store_transfer_preview->SortField == $view_store_transfer->MRP->Name && $view_store_transfer_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_store_transfer->MRP->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_store_transfer_preview->SortField == $view_store_transfer->MRP->Name) { ?><?php if ($view_store_transfer_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_store_transfer_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_transfer->BRCODE->Visible) { // BRCODE ?>
	<?php if ($view_store_transfer->SortUrl($view_store_transfer->BRCODE) == "") { ?>
		<th class="<?php echo $view_store_transfer->BRCODE->headerCellClass() ?>"><?php echo $view_store_transfer->BRCODE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_store_transfer->BRCODE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_store_transfer->BRCODE->Name ?>" data-sort-order="<?php echo $view_store_transfer_preview->SortField == $view_store_transfer->BRCODE->Name && $view_store_transfer_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_store_transfer->BRCODE->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_store_transfer_preview->SortField == $view_store_transfer->BRCODE->Name) { ?><?php if ($view_store_transfer_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_store_transfer_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_transfer->strid->Visible) { // strid ?>
	<?php if ($view_store_transfer->SortUrl($view_store_transfer->strid) == "") { ?>
		<th class="<?php echo $view_store_transfer->strid->headerCellClass() ?>"><?php echo $view_store_transfer->strid->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_store_transfer->strid->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_store_transfer->strid->Name ?>" data-sort-order="<?php echo $view_store_transfer_preview->SortField == $view_store_transfer->strid->Name && $view_store_transfer_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_store_transfer->strid->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_store_transfer_preview->SortField == $view_store_transfer->strid->Name) { ?><?php if ($view_store_transfer_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_store_transfer_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_transfer->HospID->Visible) { // HospID ?>
	<?php if ($view_store_transfer->SortUrl($view_store_transfer->HospID) == "") { ?>
		<th class="<?php echo $view_store_transfer->HospID->headerCellClass() ?>"><?php echo $view_store_transfer->HospID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_store_transfer->HospID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_store_transfer->HospID->Name ?>" data-sort-order="<?php echo $view_store_transfer_preview->SortField == $view_store_transfer->HospID->Name && $view_store_transfer_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_store_transfer->HospID->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_store_transfer_preview->SortField == $view_store_transfer->HospID->Name) { ?><?php if ($view_store_transfer_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_store_transfer_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_transfer->grncreatedby->Visible) { // grncreatedby ?>
	<?php if ($view_store_transfer->SortUrl($view_store_transfer->grncreatedby) == "") { ?>
		<th class="<?php echo $view_store_transfer->grncreatedby->headerCellClass() ?>"><?php echo $view_store_transfer->grncreatedby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_store_transfer->grncreatedby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_store_transfer->grncreatedby->Name ?>" data-sort-order="<?php echo $view_store_transfer_preview->SortField == $view_store_transfer->grncreatedby->Name && $view_store_transfer_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_store_transfer->grncreatedby->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_store_transfer_preview->SortField == $view_store_transfer->grncreatedby->Name) { ?><?php if ($view_store_transfer_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_store_transfer_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_transfer->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
	<?php if ($view_store_transfer->SortUrl($view_store_transfer->grncreatedDateTime) == "") { ?>
		<th class="<?php echo $view_store_transfer->grncreatedDateTime->headerCellClass() ?>"><?php echo $view_store_transfer->grncreatedDateTime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_store_transfer->grncreatedDateTime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_store_transfer->grncreatedDateTime->Name ?>" data-sort-order="<?php echo $view_store_transfer_preview->SortField == $view_store_transfer->grncreatedDateTime->Name && $view_store_transfer_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_store_transfer->grncreatedDateTime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_store_transfer_preview->SortField == $view_store_transfer->grncreatedDateTime->Name) { ?><?php if ($view_store_transfer_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_store_transfer_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_transfer->grnModifiedby->Visible) { // grnModifiedby ?>
	<?php if ($view_store_transfer->SortUrl($view_store_transfer->grnModifiedby) == "") { ?>
		<th class="<?php echo $view_store_transfer->grnModifiedby->headerCellClass() ?>"><?php echo $view_store_transfer->grnModifiedby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_store_transfer->grnModifiedby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_store_transfer->grnModifiedby->Name ?>" data-sort-order="<?php echo $view_store_transfer_preview->SortField == $view_store_transfer->grnModifiedby->Name && $view_store_transfer_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_store_transfer->grnModifiedby->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_store_transfer_preview->SortField == $view_store_transfer->grnModifiedby->Name) { ?><?php if ($view_store_transfer_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_store_transfer_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_transfer->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
	<?php if ($view_store_transfer->SortUrl($view_store_transfer->grnModifiedDateTime) == "") { ?>
		<th class="<?php echo $view_store_transfer->grnModifiedDateTime->headerCellClass() ?>"><?php echo $view_store_transfer->grnModifiedDateTime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_store_transfer->grnModifiedDateTime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_store_transfer->grnModifiedDateTime->Name ?>" data-sort-order="<?php echo $view_store_transfer_preview->SortField == $view_store_transfer->grnModifiedDateTime->Name && $view_store_transfer_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_store_transfer->grnModifiedDateTime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_store_transfer_preview->SortField == $view_store_transfer->grnModifiedDateTime->Name) { ?><?php if ($view_store_transfer_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_store_transfer_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_transfer->BillDate->Visible) { // BillDate ?>
	<?php if ($view_store_transfer->SortUrl($view_store_transfer->BillDate) == "") { ?>
		<th class="<?php echo $view_store_transfer->BillDate->headerCellClass() ?>"><?php echo $view_store_transfer->BillDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_store_transfer->BillDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_store_transfer->BillDate->Name ?>" data-sort-order="<?php echo $view_store_transfer_preview->SortField == $view_store_transfer->BillDate->Name && $view_store_transfer_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_store_transfer->BillDate->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_store_transfer_preview->SortField == $view_store_transfer->BillDate->Name) { ?><?php if ($view_store_transfer_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_store_transfer_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_transfer->CurStock->Visible) { // CurStock ?>
	<?php if ($view_store_transfer->SortUrl($view_store_transfer->CurStock) == "") { ?>
		<th class="<?php echo $view_store_transfer->CurStock->headerCellClass() ?>"><?php echo $view_store_transfer->CurStock->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_store_transfer->CurStock->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_store_transfer->CurStock->Name ?>" data-sort-order="<?php echo $view_store_transfer_preview->SortField == $view_store_transfer->CurStock->Name && $view_store_transfer_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_store_transfer->CurStock->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_store_transfer_preview->SortField == $view_store_transfer->CurStock->Name) { ?><?php if ($view_store_transfer_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_store_transfer_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_store_transfer_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$view_store_transfer_preview->RecCount = 0;
$view_store_transfer_preview->RowCnt = 0;
while ($view_store_transfer_preview->Recordset && !$view_store_transfer_preview->Recordset->EOF) {

	// Init row class and style
	$view_store_transfer_preview->RecCount++;
	$view_store_transfer_preview->RowCnt++;
	$view_store_transfer_preview->CssStyle = "";
	$view_store_transfer_preview->loadListRowValues($view_store_transfer_preview->Recordset);

	// Render row
	$view_store_transfer_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$view_store_transfer_preview->resetAttributes();
	$view_store_transfer_preview->renderListRow();

	// Render list options
	$view_store_transfer_preview->renderListOptions();
?>
	<tr<?php echo $view_store_transfer_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_store_transfer_preview->ListOptions->render("body", "left", $view_store_transfer_preview->RowCnt);
?>
<?php if ($view_store_transfer->ORDNO->Visible) { // ORDNO ?>
		<!-- ORDNO -->
		<td<?php echo $view_store_transfer->ORDNO->cellAttributes() ?>>
<span<?php echo $view_store_transfer->ORDNO->viewAttributes() ?>>
<?php echo $view_store_transfer->ORDNO->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_store_transfer->PRC->Visible) { // PRC ?>
		<!-- PRC -->
		<td<?php echo $view_store_transfer->PRC->cellAttributes() ?>>
<span<?php echo $view_store_transfer->PRC->viewAttributes() ?>>
<?php echo $view_store_transfer->PRC->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_store_transfer->LastMonthSale->Visible) { // LastMonthSale ?>
		<!-- LastMonthSale -->
		<td<?php echo $view_store_transfer->LastMonthSale->cellAttributes() ?>>
<span<?php echo $view_store_transfer->LastMonthSale->viewAttributes() ?>>
<?php echo $view_store_transfer->LastMonthSale->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_store_transfer->BatchNo->Visible) { // BatchNo ?>
		<!-- BatchNo -->
		<td<?php echo $view_store_transfer->BatchNo->cellAttributes() ?>>
<span<?php echo $view_store_transfer->BatchNo->viewAttributes() ?>>
<?php echo $view_store_transfer->BatchNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_store_transfer->ExpDate->Visible) { // ExpDate ?>
		<!-- ExpDate -->
		<td<?php echo $view_store_transfer->ExpDate->cellAttributes() ?>>
<span<?php echo $view_store_transfer->ExpDate->viewAttributes() ?>>
<?php echo $view_store_transfer->ExpDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_store_transfer->PrName->Visible) { // PrName ?>
		<!-- PrName -->
		<td<?php echo $view_store_transfer->PrName->cellAttributes() ?>>
<span<?php echo $view_store_transfer->PrName->viewAttributes() ?>>
<?php echo $view_store_transfer->PrName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_store_transfer->Quantity->Visible) { // Quantity ?>
		<!-- Quantity -->
		<td<?php echo $view_store_transfer->Quantity->cellAttributes() ?>>
<span<?php echo $view_store_transfer->Quantity->viewAttributes() ?>>
<?php echo $view_store_transfer->Quantity->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_store_transfer->ItemValue->Visible) { // ItemValue ?>
		<!-- ItemValue -->
		<td<?php echo $view_store_transfer->ItemValue->cellAttributes() ?>>
<span<?php echo $view_store_transfer->ItemValue->viewAttributes() ?>>
<?php echo $view_store_transfer->ItemValue->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_store_transfer->MRP->Visible) { // MRP ?>
		<!-- MRP -->
		<td<?php echo $view_store_transfer->MRP->cellAttributes() ?>>
<span<?php echo $view_store_transfer->MRP->viewAttributes() ?>>
<?php echo $view_store_transfer->MRP->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_store_transfer->BRCODE->Visible) { // BRCODE ?>
		<!-- BRCODE -->
		<td<?php echo $view_store_transfer->BRCODE->cellAttributes() ?>>
<span<?php echo $view_store_transfer->BRCODE->viewAttributes() ?>>
<?php echo $view_store_transfer->BRCODE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_store_transfer->strid->Visible) { // strid ?>
		<!-- strid -->
		<td<?php echo $view_store_transfer->strid->cellAttributes() ?>>
<span<?php echo $view_store_transfer->strid->viewAttributes() ?>>
<?php echo $view_store_transfer->strid->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_store_transfer->HospID->Visible) { // HospID ?>
		<!-- HospID -->
		<td<?php echo $view_store_transfer->HospID->cellAttributes() ?>>
<span<?php echo $view_store_transfer->HospID->viewAttributes() ?>>
<?php echo $view_store_transfer->HospID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_store_transfer->grncreatedby->Visible) { // grncreatedby ?>
		<!-- grncreatedby -->
		<td<?php echo $view_store_transfer->grncreatedby->cellAttributes() ?>>
<span<?php echo $view_store_transfer->grncreatedby->viewAttributes() ?>>
<?php echo $view_store_transfer->grncreatedby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_store_transfer->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
		<!-- grncreatedDateTime -->
		<td<?php echo $view_store_transfer->grncreatedDateTime->cellAttributes() ?>>
<span<?php echo $view_store_transfer->grncreatedDateTime->viewAttributes() ?>>
<?php echo $view_store_transfer->grncreatedDateTime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_store_transfer->grnModifiedby->Visible) { // grnModifiedby ?>
		<!-- grnModifiedby -->
		<td<?php echo $view_store_transfer->grnModifiedby->cellAttributes() ?>>
<span<?php echo $view_store_transfer->grnModifiedby->viewAttributes() ?>>
<?php echo $view_store_transfer->grnModifiedby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_store_transfer->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
		<!-- grnModifiedDateTime -->
		<td<?php echo $view_store_transfer->grnModifiedDateTime->cellAttributes() ?>>
<span<?php echo $view_store_transfer->grnModifiedDateTime->viewAttributes() ?>>
<?php echo $view_store_transfer->grnModifiedDateTime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_store_transfer->BillDate->Visible) { // BillDate ?>
		<!-- BillDate -->
		<td<?php echo $view_store_transfer->BillDate->cellAttributes() ?>>
<span<?php echo $view_store_transfer->BillDate->viewAttributes() ?>>
<?php echo $view_store_transfer->BillDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_store_transfer->CurStock->Visible) { // CurStock ?>
		<!-- CurStock -->
		<td<?php echo $view_store_transfer->CurStock->cellAttributes() ?>>
<span<?php echo $view_store_transfer->CurStock->viewAttributes() ?>>
<?php echo $view_store_transfer->CurStock->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$view_store_transfer_preview->ListOptions->render("body", "right", $view_store_transfer_preview->RowCnt);
?>
	</tr>
<?php
	$view_store_transfer_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($view_store_transfer_preview->TotalRecs > 0) { ?>
<?php if (!isset($view_store_transfer_preview->Pager)) $view_store_transfer_preview->Pager = new PrevNextPager($view_store_transfer_preview->StartRec, $view_store_transfer_preview->DisplayRecs, $view_store_transfer_preview->TotalRecs) ?>
<?php if ($view_store_transfer_preview->Pager->RecordCount > 0 && $view_store_transfer_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($view_store_transfer_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $view_store_transfer_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($view_store_transfer_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $view_store_transfer_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($view_store_transfer_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $view_store_transfer_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($view_store_transfer_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $view_store_transfer_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_store_transfer_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_store_transfer_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_store_transfer_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($view_store_transfer_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$view_store_transfer_preview->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php
if ($view_store_transfer_preview->Recordset)
	$view_store_transfer_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$view_store_transfer_preview->terminate();
?>
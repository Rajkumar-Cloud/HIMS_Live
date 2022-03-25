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
$view_pharmacytransfer_preview = new view_pharmacytransfer_preview();

// Run the page
$view_pharmacytransfer_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacytransfer_preview->Page_Render();
?>
<?php $view_pharmacytransfer_preview->showPageHeader(); ?>
<div class="card ew-grid view_pharmacytransfer"><!-- .card -->
<?php if ($view_pharmacytransfer_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$view_pharmacytransfer_preview->renderListOptions();

// Render list options (header, left)
$view_pharmacytransfer_preview->ListOptions->render("header", "left");
?>
<?php if ($view_pharmacytransfer->ORDNO->Visible) { // ORDNO ?>
	<?php if ($view_pharmacytransfer->SortUrl($view_pharmacytransfer->ORDNO) == "") { ?>
		<th class="<?php echo $view_pharmacytransfer->ORDNO->headerCellClass() ?>"><?php echo $view_pharmacytransfer->ORDNO->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacytransfer->ORDNO->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacytransfer->ORDNO->Name ?>" data-sort-order="<?php echo $view_pharmacytransfer_preview->SortField == $view_pharmacytransfer->ORDNO->Name && $view_pharmacytransfer_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacytransfer->ORDNO->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacytransfer_preview->SortField == $view_pharmacytransfer->ORDNO->Name) { ?><?php if ($view_pharmacytransfer_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacytransfer_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacytransfer->BRCODE->Visible) { // BRCODE ?>
	<?php if ($view_pharmacytransfer->SortUrl($view_pharmacytransfer->BRCODE) == "") { ?>
		<th class="<?php echo $view_pharmacytransfer->BRCODE->headerCellClass() ?>"><?php echo $view_pharmacytransfer->BRCODE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacytransfer->BRCODE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacytransfer->BRCODE->Name ?>" data-sort-order="<?php echo $view_pharmacytransfer_preview->SortField == $view_pharmacytransfer->BRCODE->Name && $view_pharmacytransfer_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacytransfer->BRCODE->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacytransfer_preview->SortField == $view_pharmacytransfer->BRCODE->Name) { ?><?php if ($view_pharmacytransfer_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacytransfer_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacytransfer->PRC->Visible) { // PRC ?>
	<?php if ($view_pharmacytransfer->SortUrl($view_pharmacytransfer->PRC) == "") { ?>
		<th class="<?php echo $view_pharmacytransfer->PRC->headerCellClass() ?>"><?php echo $view_pharmacytransfer->PRC->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacytransfer->PRC->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacytransfer->PRC->Name ?>" data-sort-order="<?php echo $view_pharmacytransfer_preview->SortField == $view_pharmacytransfer->PRC->Name && $view_pharmacytransfer_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacytransfer->PRC->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacytransfer_preview->SortField == $view_pharmacytransfer->PRC->Name) { ?><?php if ($view_pharmacytransfer_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacytransfer_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacytransfer->LastMonthSale->Visible) { // LastMonthSale ?>
	<?php if ($view_pharmacytransfer->SortUrl($view_pharmacytransfer->LastMonthSale) == "") { ?>
		<th class="<?php echo $view_pharmacytransfer->LastMonthSale->headerCellClass() ?>"><?php echo $view_pharmacytransfer->LastMonthSale->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacytransfer->LastMonthSale->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacytransfer->LastMonthSale->Name ?>" data-sort-order="<?php echo $view_pharmacytransfer_preview->SortField == $view_pharmacytransfer->LastMonthSale->Name && $view_pharmacytransfer_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacytransfer->LastMonthSale->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacytransfer_preview->SortField == $view_pharmacytransfer->LastMonthSale->Name) { ?><?php if ($view_pharmacytransfer_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacytransfer_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacytransfer->PrName->Visible) { // PrName ?>
	<?php if ($view_pharmacytransfer->SortUrl($view_pharmacytransfer->PrName) == "") { ?>
		<th class="<?php echo $view_pharmacytransfer->PrName->headerCellClass() ?>"><?php echo $view_pharmacytransfer->PrName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacytransfer->PrName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacytransfer->PrName->Name ?>" data-sort-order="<?php echo $view_pharmacytransfer_preview->SortField == $view_pharmacytransfer->PrName->Name && $view_pharmacytransfer_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacytransfer->PrName->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacytransfer_preview->SortField == $view_pharmacytransfer->PrName->Name) { ?><?php if ($view_pharmacytransfer_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacytransfer_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacytransfer->Quantity->Visible) { // Quantity ?>
	<?php if ($view_pharmacytransfer->SortUrl($view_pharmacytransfer->Quantity) == "") { ?>
		<th class="<?php echo $view_pharmacytransfer->Quantity->headerCellClass() ?>"><?php echo $view_pharmacytransfer->Quantity->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacytransfer->Quantity->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacytransfer->Quantity->Name ?>" data-sort-order="<?php echo $view_pharmacytransfer_preview->SortField == $view_pharmacytransfer->Quantity->Name && $view_pharmacytransfer_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacytransfer->Quantity->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacytransfer_preview->SortField == $view_pharmacytransfer->Quantity->Name) { ?><?php if ($view_pharmacytransfer_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacytransfer_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacytransfer->BatchNo->Visible) { // BatchNo ?>
	<?php if ($view_pharmacytransfer->SortUrl($view_pharmacytransfer->BatchNo) == "") { ?>
		<th class="<?php echo $view_pharmacytransfer->BatchNo->headerCellClass() ?>"><?php echo $view_pharmacytransfer->BatchNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacytransfer->BatchNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacytransfer->BatchNo->Name ?>" data-sort-order="<?php echo $view_pharmacytransfer_preview->SortField == $view_pharmacytransfer->BatchNo->Name && $view_pharmacytransfer_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacytransfer->BatchNo->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacytransfer_preview->SortField == $view_pharmacytransfer->BatchNo->Name) { ?><?php if ($view_pharmacytransfer_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacytransfer_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacytransfer->ExpDate->Visible) { // ExpDate ?>
	<?php if ($view_pharmacytransfer->SortUrl($view_pharmacytransfer->ExpDate) == "") { ?>
		<th class="<?php echo $view_pharmacytransfer->ExpDate->headerCellClass() ?>"><?php echo $view_pharmacytransfer->ExpDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacytransfer->ExpDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacytransfer->ExpDate->Name ?>" data-sort-order="<?php echo $view_pharmacytransfer_preview->SortField == $view_pharmacytransfer->ExpDate->Name && $view_pharmacytransfer_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacytransfer->ExpDate->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacytransfer_preview->SortField == $view_pharmacytransfer->ExpDate->Name) { ?><?php if ($view_pharmacytransfer_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacytransfer_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacytransfer->MRP->Visible) { // MRP ?>
	<?php if ($view_pharmacytransfer->SortUrl($view_pharmacytransfer->MRP) == "") { ?>
		<th class="<?php echo $view_pharmacytransfer->MRP->headerCellClass() ?>"><?php echo $view_pharmacytransfer->MRP->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacytransfer->MRP->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacytransfer->MRP->Name ?>" data-sort-order="<?php echo $view_pharmacytransfer_preview->SortField == $view_pharmacytransfer->MRP->Name && $view_pharmacytransfer_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacytransfer->MRP->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacytransfer_preview->SortField == $view_pharmacytransfer->MRP->Name) { ?><?php if ($view_pharmacytransfer_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacytransfer_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacytransfer->ItemValue->Visible) { // ItemValue ?>
	<?php if ($view_pharmacytransfer->SortUrl($view_pharmacytransfer->ItemValue) == "") { ?>
		<th class="<?php echo $view_pharmacytransfer->ItemValue->headerCellClass() ?>"><?php echo $view_pharmacytransfer->ItemValue->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacytransfer->ItemValue->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacytransfer->ItemValue->Name ?>" data-sort-order="<?php echo $view_pharmacytransfer_preview->SortField == $view_pharmacytransfer->ItemValue->Name && $view_pharmacytransfer_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacytransfer->ItemValue->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacytransfer_preview->SortField == $view_pharmacytransfer->ItemValue->Name) { ?><?php if ($view_pharmacytransfer_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacytransfer_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacytransfer->trid->Visible) { // trid ?>
	<?php if ($view_pharmacytransfer->SortUrl($view_pharmacytransfer->trid) == "") { ?>
		<th class="<?php echo $view_pharmacytransfer->trid->headerCellClass() ?>"><?php echo $view_pharmacytransfer->trid->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacytransfer->trid->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacytransfer->trid->Name ?>" data-sort-order="<?php echo $view_pharmacytransfer_preview->SortField == $view_pharmacytransfer->trid->Name && $view_pharmacytransfer_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacytransfer->trid->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacytransfer_preview->SortField == $view_pharmacytransfer->trid->Name) { ?><?php if ($view_pharmacytransfer_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacytransfer_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacytransfer->HospID->Visible) { // HospID ?>
	<?php if ($view_pharmacytransfer->SortUrl($view_pharmacytransfer->HospID) == "") { ?>
		<th class="<?php echo $view_pharmacytransfer->HospID->headerCellClass() ?>"><?php echo $view_pharmacytransfer->HospID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacytransfer->HospID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacytransfer->HospID->Name ?>" data-sort-order="<?php echo $view_pharmacytransfer_preview->SortField == $view_pharmacytransfer->HospID->Name && $view_pharmacytransfer_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacytransfer->HospID->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacytransfer_preview->SortField == $view_pharmacytransfer->HospID->Name) { ?><?php if ($view_pharmacytransfer_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacytransfer_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacytransfer->grncreatedby->Visible) { // grncreatedby ?>
	<?php if ($view_pharmacytransfer->SortUrl($view_pharmacytransfer->grncreatedby) == "") { ?>
		<th class="<?php echo $view_pharmacytransfer->grncreatedby->headerCellClass() ?>"><?php echo $view_pharmacytransfer->grncreatedby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacytransfer->grncreatedby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacytransfer->grncreatedby->Name ?>" data-sort-order="<?php echo $view_pharmacytransfer_preview->SortField == $view_pharmacytransfer->grncreatedby->Name && $view_pharmacytransfer_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacytransfer->grncreatedby->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacytransfer_preview->SortField == $view_pharmacytransfer->grncreatedby->Name) { ?><?php if ($view_pharmacytransfer_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacytransfer_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacytransfer->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
	<?php if ($view_pharmacytransfer->SortUrl($view_pharmacytransfer->grncreatedDateTime) == "") { ?>
		<th class="<?php echo $view_pharmacytransfer->grncreatedDateTime->headerCellClass() ?>"><?php echo $view_pharmacytransfer->grncreatedDateTime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacytransfer->grncreatedDateTime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacytransfer->grncreatedDateTime->Name ?>" data-sort-order="<?php echo $view_pharmacytransfer_preview->SortField == $view_pharmacytransfer->grncreatedDateTime->Name && $view_pharmacytransfer_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacytransfer->grncreatedDateTime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacytransfer_preview->SortField == $view_pharmacytransfer->grncreatedDateTime->Name) { ?><?php if ($view_pharmacytransfer_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacytransfer_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacytransfer->grnModifiedby->Visible) { // grnModifiedby ?>
	<?php if ($view_pharmacytransfer->SortUrl($view_pharmacytransfer->grnModifiedby) == "") { ?>
		<th class="<?php echo $view_pharmacytransfer->grnModifiedby->headerCellClass() ?>"><?php echo $view_pharmacytransfer->grnModifiedby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacytransfer->grnModifiedby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacytransfer->grnModifiedby->Name ?>" data-sort-order="<?php echo $view_pharmacytransfer_preview->SortField == $view_pharmacytransfer->grnModifiedby->Name && $view_pharmacytransfer_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacytransfer->grnModifiedby->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacytransfer_preview->SortField == $view_pharmacytransfer->grnModifiedby->Name) { ?><?php if ($view_pharmacytransfer_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacytransfer_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacytransfer->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
	<?php if ($view_pharmacytransfer->SortUrl($view_pharmacytransfer->grnModifiedDateTime) == "") { ?>
		<th class="<?php echo $view_pharmacytransfer->grnModifiedDateTime->headerCellClass() ?>"><?php echo $view_pharmacytransfer->grnModifiedDateTime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacytransfer->grnModifiedDateTime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacytransfer->grnModifiedDateTime->Name ?>" data-sort-order="<?php echo $view_pharmacytransfer_preview->SortField == $view_pharmacytransfer->grnModifiedDateTime->Name && $view_pharmacytransfer_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacytransfer->grnModifiedDateTime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacytransfer_preview->SortField == $view_pharmacytransfer->grnModifiedDateTime->Name) { ?><?php if ($view_pharmacytransfer_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacytransfer_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacytransfer->BillDate->Visible) { // BillDate ?>
	<?php if ($view_pharmacytransfer->SortUrl($view_pharmacytransfer->BillDate) == "") { ?>
		<th class="<?php echo $view_pharmacytransfer->BillDate->headerCellClass() ?>"><?php echo $view_pharmacytransfer->BillDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacytransfer->BillDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacytransfer->BillDate->Name ?>" data-sort-order="<?php echo $view_pharmacytransfer_preview->SortField == $view_pharmacytransfer->BillDate->Name && $view_pharmacytransfer_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacytransfer->BillDate->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacytransfer_preview->SortField == $view_pharmacytransfer->BillDate->Name) { ?><?php if ($view_pharmacytransfer_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacytransfer_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacytransfer->CurStock->Visible) { // CurStock ?>
	<?php if ($view_pharmacytransfer->SortUrl($view_pharmacytransfer->CurStock) == "") { ?>
		<th class="<?php echo $view_pharmacytransfer->CurStock->headerCellClass() ?>"><?php echo $view_pharmacytransfer->CurStock->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacytransfer->CurStock->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacytransfer->CurStock->Name ?>" data-sort-order="<?php echo $view_pharmacytransfer_preview->SortField == $view_pharmacytransfer->CurStock->Name && $view_pharmacytransfer_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacytransfer->CurStock->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacytransfer_preview->SortField == $view_pharmacytransfer->CurStock->Name) { ?><?php if ($view_pharmacytransfer_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacytransfer_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_pharmacytransfer_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$view_pharmacytransfer_preview->RecCount = 0;
$view_pharmacytransfer_preview->RowCnt = 0;
while ($view_pharmacytransfer_preview->Recordset && !$view_pharmacytransfer_preview->Recordset->EOF) {

	// Init row class and style
	$view_pharmacytransfer_preview->RecCount++;
	$view_pharmacytransfer_preview->RowCnt++;
	$view_pharmacytransfer_preview->CssStyle = "";
	$view_pharmacytransfer_preview->loadListRowValues($view_pharmacytransfer_preview->Recordset);

	// Render row
	$view_pharmacytransfer_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$view_pharmacytransfer_preview->resetAttributes();
	$view_pharmacytransfer_preview->renderListRow();

	// Render list options
	$view_pharmacytransfer_preview->renderListOptions();
?>
	<tr<?php echo $view_pharmacytransfer_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_pharmacytransfer_preview->ListOptions->render("body", "left", $view_pharmacytransfer_preview->RowCnt);
?>
<?php if ($view_pharmacytransfer->ORDNO->Visible) { // ORDNO ?>
		<!-- ORDNO -->
		<td<?php echo $view_pharmacytransfer->ORDNO->cellAttributes() ?>>
<span<?php echo $view_pharmacytransfer->ORDNO->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->ORDNO->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacytransfer->BRCODE->Visible) { // BRCODE ?>
		<!-- BRCODE -->
		<td<?php echo $view_pharmacytransfer->BRCODE->cellAttributes() ?>>
<span<?php echo $view_pharmacytransfer->BRCODE->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->BRCODE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacytransfer->PRC->Visible) { // PRC ?>
		<!-- PRC -->
		<td<?php echo $view_pharmacytransfer->PRC->cellAttributes() ?>>
<span<?php echo $view_pharmacytransfer->PRC->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->PRC->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacytransfer->LastMonthSale->Visible) { // LastMonthSale ?>
		<!-- LastMonthSale -->
		<td<?php echo $view_pharmacytransfer->LastMonthSale->cellAttributes() ?>>
<span<?php echo $view_pharmacytransfer->LastMonthSale->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->LastMonthSale->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacytransfer->PrName->Visible) { // PrName ?>
		<!-- PrName -->
		<td<?php echo $view_pharmacytransfer->PrName->cellAttributes() ?>>
<span<?php echo $view_pharmacytransfer->PrName->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->PrName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacytransfer->Quantity->Visible) { // Quantity ?>
		<!-- Quantity -->
		<td<?php echo $view_pharmacytransfer->Quantity->cellAttributes() ?>>
<span<?php echo $view_pharmacytransfer->Quantity->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->Quantity->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacytransfer->BatchNo->Visible) { // BatchNo ?>
		<!-- BatchNo -->
		<td<?php echo $view_pharmacytransfer->BatchNo->cellAttributes() ?>>
<span<?php echo $view_pharmacytransfer->BatchNo->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->BatchNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacytransfer->ExpDate->Visible) { // ExpDate ?>
		<!-- ExpDate -->
		<td<?php echo $view_pharmacytransfer->ExpDate->cellAttributes() ?>>
<span<?php echo $view_pharmacytransfer->ExpDate->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->ExpDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacytransfer->MRP->Visible) { // MRP ?>
		<!-- MRP -->
		<td<?php echo $view_pharmacytransfer->MRP->cellAttributes() ?>>
<span<?php echo $view_pharmacytransfer->MRP->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->MRP->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacytransfer->ItemValue->Visible) { // ItemValue ?>
		<!-- ItemValue -->
		<td<?php echo $view_pharmacytransfer->ItemValue->cellAttributes() ?>>
<span<?php echo $view_pharmacytransfer->ItemValue->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->ItemValue->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacytransfer->trid->Visible) { // trid ?>
		<!-- trid -->
		<td<?php echo $view_pharmacytransfer->trid->cellAttributes() ?>>
<span<?php echo $view_pharmacytransfer->trid->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->trid->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacytransfer->HospID->Visible) { // HospID ?>
		<!-- HospID -->
		<td<?php echo $view_pharmacytransfer->HospID->cellAttributes() ?>>
<span<?php echo $view_pharmacytransfer->HospID->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->HospID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacytransfer->grncreatedby->Visible) { // grncreatedby ?>
		<!-- grncreatedby -->
		<td<?php echo $view_pharmacytransfer->grncreatedby->cellAttributes() ?>>
<span<?php echo $view_pharmacytransfer->grncreatedby->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->grncreatedby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacytransfer->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
		<!-- grncreatedDateTime -->
		<td<?php echo $view_pharmacytransfer->grncreatedDateTime->cellAttributes() ?>>
<span<?php echo $view_pharmacytransfer->grncreatedDateTime->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->grncreatedDateTime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacytransfer->grnModifiedby->Visible) { // grnModifiedby ?>
		<!-- grnModifiedby -->
		<td<?php echo $view_pharmacytransfer->grnModifiedby->cellAttributes() ?>>
<span<?php echo $view_pharmacytransfer->grnModifiedby->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->grnModifiedby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacytransfer->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
		<!-- grnModifiedDateTime -->
		<td<?php echo $view_pharmacytransfer->grnModifiedDateTime->cellAttributes() ?>>
<span<?php echo $view_pharmacytransfer->grnModifiedDateTime->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->grnModifiedDateTime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacytransfer->BillDate->Visible) { // BillDate ?>
		<!-- BillDate -->
		<td<?php echo $view_pharmacytransfer->BillDate->cellAttributes() ?>>
<span<?php echo $view_pharmacytransfer->BillDate->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->BillDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacytransfer->CurStock->Visible) { // CurStock ?>
		<!-- CurStock -->
		<td<?php echo $view_pharmacytransfer->CurStock->cellAttributes() ?>>
<span<?php echo $view_pharmacytransfer->CurStock->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->CurStock->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$view_pharmacytransfer_preview->ListOptions->render("body", "right", $view_pharmacytransfer_preview->RowCnt);
?>
	</tr>
<?php
	$view_pharmacytransfer_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($view_pharmacytransfer_preview->TotalRecs > 0) { ?>
<?php if (!isset($view_pharmacytransfer_preview->Pager)) $view_pharmacytransfer_preview->Pager = new PrevNextPager($view_pharmacytransfer_preview->StartRec, $view_pharmacytransfer_preview->DisplayRecs, $view_pharmacytransfer_preview->TotalRecs) ?>
<?php if ($view_pharmacytransfer_preview->Pager->RecordCount > 0 && $view_pharmacytransfer_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($view_pharmacytransfer_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $view_pharmacytransfer_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($view_pharmacytransfer_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $view_pharmacytransfer_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($view_pharmacytransfer_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $view_pharmacytransfer_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($view_pharmacytransfer_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $view_pharmacytransfer_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_pharmacytransfer_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_pharmacytransfer_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_pharmacytransfer_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($view_pharmacytransfer_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$view_pharmacytransfer_preview->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php
if ($view_pharmacytransfer_preview->Recordset)
	$view_pharmacytransfer_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$view_pharmacytransfer_preview->terminate();
?>
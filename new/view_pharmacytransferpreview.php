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
<?php if ($view_pharmacytransfer_preview->TotalRecords > 0) { ?>
<div class="card ew-grid view_pharmacytransfer"><!-- .card -->
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel ew-preview-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$view_pharmacytransfer_preview->renderListOptions();

// Render list options (header, left)
$view_pharmacytransfer_preview->ListOptions->render("header", "left");
?>
<?php if ($view_pharmacytransfer_preview->ORDNO->Visible) { // ORDNO ?>
	<?php if ($view_pharmacytransfer->SortUrl($view_pharmacytransfer_preview->ORDNO) == "") { ?>
		<th class="<?php echo $view_pharmacytransfer_preview->ORDNO->headerCellClass() ?>"><?php echo $view_pharmacytransfer_preview->ORDNO->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacytransfer_preview->ORDNO->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacytransfer_preview->ORDNO->Name) ?>" data-sort-order="<?php echo $view_pharmacytransfer_preview->SortField == $view_pharmacytransfer_preview->ORDNO->Name && $view_pharmacytransfer_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacytransfer_preview->ORDNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacytransfer_preview->SortField == $view_pharmacytransfer_preview->ORDNO->Name) { ?><?php if ($view_pharmacytransfer_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacytransfer_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacytransfer_preview->BRCODE->Visible) { // BRCODE ?>
	<?php if ($view_pharmacytransfer->SortUrl($view_pharmacytransfer_preview->BRCODE) == "") { ?>
		<th class="<?php echo $view_pharmacytransfer_preview->BRCODE->headerCellClass() ?>"><?php echo $view_pharmacytransfer_preview->BRCODE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacytransfer_preview->BRCODE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacytransfer_preview->BRCODE->Name) ?>" data-sort-order="<?php echo $view_pharmacytransfer_preview->SortField == $view_pharmacytransfer_preview->BRCODE->Name && $view_pharmacytransfer_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacytransfer_preview->BRCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacytransfer_preview->SortField == $view_pharmacytransfer_preview->BRCODE->Name) { ?><?php if ($view_pharmacytransfer_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacytransfer_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacytransfer_preview->PRC->Visible) { // PRC ?>
	<?php if ($view_pharmacytransfer->SortUrl($view_pharmacytransfer_preview->PRC) == "") { ?>
		<th class="<?php echo $view_pharmacytransfer_preview->PRC->headerCellClass() ?>"><?php echo $view_pharmacytransfer_preview->PRC->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacytransfer_preview->PRC->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacytransfer_preview->PRC->Name) ?>" data-sort-order="<?php echo $view_pharmacytransfer_preview->SortField == $view_pharmacytransfer_preview->PRC->Name && $view_pharmacytransfer_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacytransfer_preview->PRC->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacytransfer_preview->SortField == $view_pharmacytransfer_preview->PRC->Name) { ?><?php if ($view_pharmacytransfer_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacytransfer_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacytransfer_preview->LastMonthSale->Visible) { // LastMonthSale ?>
	<?php if ($view_pharmacytransfer->SortUrl($view_pharmacytransfer_preview->LastMonthSale) == "") { ?>
		<th class="<?php echo $view_pharmacytransfer_preview->LastMonthSale->headerCellClass() ?>"><?php echo $view_pharmacytransfer_preview->LastMonthSale->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacytransfer_preview->LastMonthSale->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacytransfer_preview->LastMonthSale->Name) ?>" data-sort-order="<?php echo $view_pharmacytransfer_preview->SortField == $view_pharmacytransfer_preview->LastMonthSale->Name && $view_pharmacytransfer_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacytransfer_preview->LastMonthSale->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacytransfer_preview->SortField == $view_pharmacytransfer_preview->LastMonthSale->Name) { ?><?php if ($view_pharmacytransfer_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacytransfer_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacytransfer_preview->PrName->Visible) { // PrName ?>
	<?php if ($view_pharmacytransfer->SortUrl($view_pharmacytransfer_preview->PrName) == "") { ?>
		<th class="<?php echo $view_pharmacytransfer_preview->PrName->headerCellClass() ?>"><?php echo $view_pharmacytransfer_preview->PrName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacytransfer_preview->PrName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacytransfer_preview->PrName->Name) ?>" data-sort-order="<?php echo $view_pharmacytransfer_preview->SortField == $view_pharmacytransfer_preview->PrName->Name && $view_pharmacytransfer_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacytransfer_preview->PrName->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacytransfer_preview->SortField == $view_pharmacytransfer_preview->PrName->Name) { ?><?php if ($view_pharmacytransfer_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacytransfer_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacytransfer_preview->Quantity->Visible) { // Quantity ?>
	<?php if ($view_pharmacytransfer->SortUrl($view_pharmacytransfer_preview->Quantity) == "") { ?>
		<th class="<?php echo $view_pharmacytransfer_preview->Quantity->headerCellClass() ?>"><?php echo $view_pharmacytransfer_preview->Quantity->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacytransfer_preview->Quantity->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacytransfer_preview->Quantity->Name) ?>" data-sort-order="<?php echo $view_pharmacytransfer_preview->SortField == $view_pharmacytransfer_preview->Quantity->Name && $view_pharmacytransfer_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacytransfer_preview->Quantity->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacytransfer_preview->SortField == $view_pharmacytransfer_preview->Quantity->Name) { ?><?php if ($view_pharmacytransfer_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacytransfer_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacytransfer_preview->BatchNo->Visible) { // BatchNo ?>
	<?php if ($view_pharmacytransfer->SortUrl($view_pharmacytransfer_preview->BatchNo) == "") { ?>
		<th class="<?php echo $view_pharmacytransfer_preview->BatchNo->headerCellClass() ?>"><?php echo $view_pharmacytransfer_preview->BatchNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacytransfer_preview->BatchNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacytransfer_preview->BatchNo->Name) ?>" data-sort-order="<?php echo $view_pharmacytransfer_preview->SortField == $view_pharmacytransfer_preview->BatchNo->Name && $view_pharmacytransfer_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacytransfer_preview->BatchNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacytransfer_preview->SortField == $view_pharmacytransfer_preview->BatchNo->Name) { ?><?php if ($view_pharmacytransfer_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacytransfer_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacytransfer_preview->ExpDate->Visible) { // ExpDate ?>
	<?php if ($view_pharmacytransfer->SortUrl($view_pharmacytransfer_preview->ExpDate) == "") { ?>
		<th class="<?php echo $view_pharmacytransfer_preview->ExpDate->headerCellClass() ?>"><?php echo $view_pharmacytransfer_preview->ExpDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacytransfer_preview->ExpDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacytransfer_preview->ExpDate->Name) ?>" data-sort-order="<?php echo $view_pharmacytransfer_preview->SortField == $view_pharmacytransfer_preview->ExpDate->Name && $view_pharmacytransfer_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacytransfer_preview->ExpDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacytransfer_preview->SortField == $view_pharmacytransfer_preview->ExpDate->Name) { ?><?php if ($view_pharmacytransfer_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacytransfer_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacytransfer_preview->MRP->Visible) { // MRP ?>
	<?php if ($view_pharmacytransfer->SortUrl($view_pharmacytransfer_preview->MRP) == "") { ?>
		<th class="<?php echo $view_pharmacytransfer_preview->MRP->headerCellClass() ?>"><?php echo $view_pharmacytransfer_preview->MRP->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacytransfer_preview->MRP->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacytransfer_preview->MRP->Name) ?>" data-sort-order="<?php echo $view_pharmacytransfer_preview->SortField == $view_pharmacytransfer_preview->MRP->Name && $view_pharmacytransfer_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacytransfer_preview->MRP->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacytransfer_preview->SortField == $view_pharmacytransfer_preview->MRP->Name) { ?><?php if ($view_pharmacytransfer_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacytransfer_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacytransfer_preview->ItemValue->Visible) { // ItemValue ?>
	<?php if ($view_pharmacytransfer->SortUrl($view_pharmacytransfer_preview->ItemValue) == "") { ?>
		<th class="<?php echo $view_pharmacytransfer_preview->ItemValue->headerCellClass() ?>"><?php echo $view_pharmacytransfer_preview->ItemValue->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacytransfer_preview->ItemValue->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacytransfer_preview->ItemValue->Name) ?>" data-sort-order="<?php echo $view_pharmacytransfer_preview->SortField == $view_pharmacytransfer_preview->ItemValue->Name && $view_pharmacytransfer_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacytransfer_preview->ItemValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacytransfer_preview->SortField == $view_pharmacytransfer_preview->ItemValue->Name) { ?><?php if ($view_pharmacytransfer_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacytransfer_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacytransfer_preview->trid->Visible) { // trid ?>
	<?php if ($view_pharmacytransfer->SortUrl($view_pharmacytransfer_preview->trid) == "") { ?>
		<th class="<?php echo $view_pharmacytransfer_preview->trid->headerCellClass() ?>"><?php echo $view_pharmacytransfer_preview->trid->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacytransfer_preview->trid->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacytransfer_preview->trid->Name) ?>" data-sort-order="<?php echo $view_pharmacytransfer_preview->SortField == $view_pharmacytransfer_preview->trid->Name && $view_pharmacytransfer_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacytransfer_preview->trid->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacytransfer_preview->SortField == $view_pharmacytransfer_preview->trid->Name) { ?><?php if ($view_pharmacytransfer_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacytransfer_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacytransfer_preview->HospID->Visible) { // HospID ?>
	<?php if ($view_pharmacytransfer->SortUrl($view_pharmacytransfer_preview->HospID) == "") { ?>
		<th class="<?php echo $view_pharmacytransfer_preview->HospID->headerCellClass() ?>"><?php echo $view_pharmacytransfer_preview->HospID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacytransfer_preview->HospID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacytransfer_preview->HospID->Name) ?>" data-sort-order="<?php echo $view_pharmacytransfer_preview->SortField == $view_pharmacytransfer_preview->HospID->Name && $view_pharmacytransfer_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacytransfer_preview->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacytransfer_preview->SortField == $view_pharmacytransfer_preview->HospID->Name) { ?><?php if ($view_pharmacytransfer_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacytransfer_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacytransfer_preview->grncreatedby->Visible) { // grncreatedby ?>
	<?php if ($view_pharmacytransfer->SortUrl($view_pharmacytransfer_preview->grncreatedby) == "") { ?>
		<th class="<?php echo $view_pharmacytransfer_preview->grncreatedby->headerCellClass() ?>"><?php echo $view_pharmacytransfer_preview->grncreatedby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacytransfer_preview->grncreatedby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacytransfer_preview->grncreatedby->Name) ?>" data-sort-order="<?php echo $view_pharmacytransfer_preview->SortField == $view_pharmacytransfer_preview->grncreatedby->Name && $view_pharmacytransfer_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacytransfer_preview->grncreatedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacytransfer_preview->SortField == $view_pharmacytransfer_preview->grncreatedby->Name) { ?><?php if ($view_pharmacytransfer_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacytransfer_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacytransfer_preview->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
	<?php if ($view_pharmacytransfer->SortUrl($view_pharmacytransfer_preview->grncreatedDateTime) == "") { ?>
		<th class="<?php echo $view_pharmacytransfer_preview->grncreatedDateTime->headerCellClass() ?>"><?php echo $view_pharmacytransfer_preview->grncreatedDateTime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacytransfer_preview->grncreatedDateTime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacytransfer_preview->grncreatedDateTime->Name) ?>" data-sort-order="<?php echo $view_pharmacytransfer_preview->SortField == $view_pharmacytransfer_preview->grncreatedDateTime->Name && $view_pharmacytransfer_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacytransfer_preview->grncreatedDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacytransfer_preview->SortField == $view_pharmacytransfer_preview->grncreatedDateTime->Name) { ?><?php if ($view_pharmacytransfer_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacytransfer_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacytransfer_preview->grnModifiedby->Visible) { // grnModifiedby ?>
	<?php if ($view_pharmacytransfer->SortUrl($view_pharmacytransfer_preview->grnModifiedby) == "") { ?>
		<th class="<?php echo $view_pharmacytransfer_preview->grnModifiedby->headerCellClass() ?>"><?php echo $view_pharmacytransfer_preview->grnModifiedby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacytransfer_preview->grnModifiedby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacytransfer_preview->grnModifiedby->Name) ?>" data-sort-order="<?php echo $view_pharmacytransfer_preview->SortField == $view_pharmacytransfer_preview->grnModifiedby->Name && $view_pharmacytransfer_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacytransfer_preview->grnModifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacytransfer_preview->SortField == $view_pharmacytransfer_preview->grnModifiedby->Name) { ?><?php if ($view_pharmacytransfer_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacytransfer_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacytransfer_preview->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
	<?php if ($view_pharmacytransfer->SortUrl($view_pharmacytransfer_preview->grnModifiedDateTime) == "") { ?>
		<th class="<?php echo $view_pharmacytransfer_preview->grnModifiedDateTime->headerCellClass() ?>"><?php echo $view_pharmacytransfer_preview->grnModifiedDateTime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacytransfer_preview->grnModifiedDateTime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacytransfer_preview->grnModifiedDateTime->Name) ?>" data-sort-order="<?php echo $view_pharmacytransfer_preview->SortField == $view_pharmacytransfer_preview->grnModifiedDateTime->Name && $view_pharmacytransfer_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacytransfer_preview->grnModifiedDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacytransfer_preview->SortField == $view_pharmacytransfer_preview->grnModifiedDateTime->Name) { ?><?php if ($view_pharmacytransfer_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacytransfer_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacytransfer_preview->BillDate->Visible) { // BillDate ?>
	<?php if ($view_pharmacytransfer->SortUrl($view_pharmacytransfer_preview->BillDate) == "") { ?>
		<th class="<?php echo $view_pharmacytransfer_preview->BillDate->headerCellClass() ?>"><?php echo $view_pharmacytransfer_preview->BillDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacytransfer_preview->BillDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacytransfer_preview->BillDate->Name) ?>" data-sort-order="<?php echo $view_pharmacytransfer_preview->SortField == $view_pharmacytransfer_preview->BillDate->Name && $view_pharmacytransfer_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacytransfer_preview->BillDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacytransfer_preview->SortField == $view_pharmacytransfer_preview->BillDate->Name) { ?><?php if ($view_pharmacytransfer_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacytransfer_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacytransfer_preview->CurStock->Visible) { // CurStock ?>
	<?php if ($view_pharmacytransfer->SortUrl($view_pharmacytransfer_preview->CurStock) == "") { ?>
		<th class="<?php echo $view_pharmacytransfer_preview->CurStock->headerCellClass() ?>"><?php echo $view_pharmacytransfer_preview->CurStock->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacytransfer_preview->CurStock->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacytransfer_preview->CurStock->Name) ?>" data-sort-order="<?php echo $view_pharmacytransfer_preview->SortField == $view_pharmacytransfer_preview->CurStock->Name && $view_pharmacytransfer_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacytransfer_preview->CurStock->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacytransfer_preview->SortField == $view_pharmacytransfer_preview->CurStock->Name) { ?><?php if ($view_pharmacytransfer_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacytransfer_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
$view_pharmacytransfer_preview->RowCount = 0;
while ($view_pharmacytransfer_preview->Recordset && !$view_pharmacytransfer_preview->Recordset->EOF) {

	// Init row class and style
	$view_pharmacytransfer_preview->RecCount++;
	$view_pharmacytransfer_preview->RowCount++;
	$view_pharmacytransfer_preview->CssStyle = "";
	$view_pharmacytransfer_preview->loadListRowValues($view_pharmacytransfer_preview->Recordset);

	// Render row
	$view_pharmacytransfer->RowType = ROWTYPE_PREVIEW; // Preview record
	$view_pharmacytransfer_preview->resetAttributes();
	$view_pharmacytransfer_preview->renderListRow();

	// Render list options
	$view_pharmacytransfer_preview->renderListOptions();
?>
	<tr <?php echo $view_pharmacytransfer->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_pharmacytransfer_preview->ListOptions->render("body", "left", $view_pharmacytransfer_preview->RowCount);
?>
<?php if ($view_pharmacytransfer_preview->ORDNO->Visible) { // ORDNO ?>
		<!-- ORDNO -->
		<td<?php echo $view_pharmacytransfer_preview->ORDNO->cellAttributes() ?>>
<span<?php echo $view_pharmacytransfer_preview->ORDNO->viewAttributes() ?>><?php echo $view_pharmacytransfer_preview->ORDNO->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacytransfer_preview->BRCODE->Visible) { // BRCODE ?>
		<!-- BRCODE -->
		<td<?php echo $view_pharmacytransfer_preview->BRCODE->cellAttributes() ?>>
<span<?php echo $view_pharmacytransfer_preview->BRCODE->viewAttributes() ?>><?php echo $view_pharmacytransfer_preview->BRCODE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacytransfer_preview->PRC->Visible) { // PRC ?>
		<!-- PRC -->
		<td<?php echo $view_pharmacytransfer_preview->PRC->cellAttributes() ?>>
<span<?php echo $view_pharmacytransfer_preview->PRC->viewAttributes() ?>><?php echo $view_pharmacytransfer_preview->PRC->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacytransfer_preview->LastMonthSale->Visible) { // LastMonthSale ?>
		<!-- LastMonthSale -->
		<td<?php echo $view_pharmacytransfer_preview->LastMonthSale->cellAttributes() ?>>
<span<?php echo $view_pharmacytransfer_preview->LastMonthSale->viewAttributes() ?>><?php echo $view_pharmacytransfer_preview->LastMonthSale->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacytransfer_preview->PrName->Visible) { // PrName ?>
		<!-- PrName -->
		<td<?php echo $view_pharmacytransfer_preview->PrName->cellAttributes() ?>>
<span<?php echo $view_pharmacytransfer_preview->PrName->viewAttributes() ?>><?php echo $view_pharmacytransfer_preview->PrName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacytransfer_preview->Quantity->Visible) { // Quantity ?>
		<!-- Quantity -->
		<td<?php echo $view_pharmacytransfer_preview->Quantity->cellAttributes() ?>>
<span<?php echo $view_pharmacytransfer_preview->Quantity->viewAttributes() ?>><?php echo $view_pharmacytransfer_preview->Quantity->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacytransfer_preview->BatchNo->Visible) { // BatchNo ?>
		<!-- BatchNo -->
		<td<?php echo $view_pharmacytransfer_preview->BatchNo->cellAttributes() ?>>
<span<?php echo $view_pharmacytransfer_preview->BatchNo->viewAttributes() ?>><?php echo $view_pharmacytransfer_preview->BatchNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacytransfer_preview->ExpDate->Visible) { // ExpDate ?>
		<!-- ExpDate -->
		<td<?php echo $view_pharmacytransfer_preview->ExpDate->cellAttributes() ?>>
<span<?php echo $view_pharmacytransfer_preview->ExpDate->viewAttributes() ?>><?php echo $view_pharmacytransfer_preview->ExpDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacytransfer_preview->MRP->Visible) { // MRP ?>
		<!-- MRP -->
		<td<?php echo $view_pharmacytransfer_preview->MRP->cellAttributes() ?>>
<span<?php echo $view_pharmacytransfer_preview->MRP->viewAttributes() ?>><?php echo $view_pharmacytransfer_preview->MRP->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacytransfer_preview->ItemValue->Visible) { // ItemValue ?>
		<!-- ItemValue -->
		<td<?php echo $view_pharmacytransfer_preview->ItemValue->cellAttributes() ?>>
<span<?php echo $view_pharmacytransfer_preview->ItemValue->viewAttributes() ?>><?php echo $view_pharmacytransfer_preview->ItemValue->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacytransfer_preview->trid->Visible) { // trid ?>
		<!-- trid -->
		<td<?php echo $view_pharmacytransfer_preview->trid->cellAttributes() ?>>
<span<?php echo $view_pharmacytransfer_preview->trid->viewAttributes() ?>><?php echo $view_pharmacytransfer_preview->trid->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacytransfer_preview->HospID->Visible) { // HospID ?>
		<!-- HospID -->
		<td<?php echo $view_pharmacytransfer_preview->HospID->cellAttributes() ?>>
<span<?php echo $view_pharmacytransfer_preview->HospID->viewAttributes() ?>><?php echo $view_pharmacytransfer_preview->HospID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacytransfer_preview->grncreatedby->Visible) { // grncreatedby ?>
		<!-- grncreatedby -->
		<td<?php echo $view_pharmacytransfer_preview->grncreatedby->cellAttributes() ?>>
<span<?php echo $view_pharmacytransfer_preview->grncreatedby->viewAttributes() ?>><?php echo $view_pharmacytransfer_preview->grncreatedby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacytransfer_preview->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
		<!-- grncreatedDateTime -->
		<td<?php echo $view_pharmacytransfer_preview->grncreatedDateTime->cellAttributes() ?>>
<span<?php echo $view_pharmacytransfer_preview->grncreatedDateTime->viewAttributes() ?>><?php echo $view_pharmacytransfer_preview->grncreatedDateTime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacytransfer_preview->grnModifiedby->Visible) { // grnModifiedby ?>
		<!-- grnModifiedby -->
		<td<?php echo $view_pharmacytransfer_preview->grnModifiedby->cellAttributes() ?>>
<span<?php echo $view_pharmacytransfer_preview->grnModifiedby->viewAttributes() ?>><?php echo $view_pharmacytransfer_preview->grnModifiedby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacytransfer_preview->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
		<!-- grnModifiedDateTime -->
		<td<?php echo $view_pharmacytransfer_preview->grnModifiedDateTime->cellAttributes() ?>>
<span<?php echo $view_pharmacytransfer_preview->grnModifiedDateTime->viewAttributes() ?>><?php echo $view_pharmacytransfer_preview->grnModifiedDateTime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacytransfer_preview->BillDate->Visible) { // BillDate ?>
		<!-- BillDate -->
		<td<?php echo $view_pharmacytransfer_preview->BillDate->cellAttributes() ?>>
<span<?php echo $view_pharmacytransfer_preview->BillDate->viewAttributes() ?>><?php echo $view_pharmacytransfer_preview->BillDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacytransfer_preview->CurStock->Visible) { // CurStock ?>
		<!-- CurStock -->
		<td<?php echo $view_pharmacytransfer_preview->CurStock->cellAttributes() ?>>
<span<?php echo $view_pharmacytransfer_preview->CurStock->viewAttributes() ?>><?php echo $view_pharmacytransfer_preview->CurStock->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$view_pharmacytransfer_preview->ListOptions->render("body", "right", $view_pharmacytransfer_preview->RowCount);
?>
	</tr>
<?php
	$view_pharmacytransfer_preview->Recordset->MoveNext();
} // while
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php echo $view_pharmacytransfer_preview->Pager->render() ?>
<?php } else { // No record ?>
<div class="card no-border">
<div class="ew-detail-count"><?php echo $Language->phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($view_pharmacytransfer_preview->OtherOptions as $option)
		$option->render("body");
?>
</div>
<?php if ($view_pharmacytransfer_preview->TotalRecords > 0) { ?>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
<?php } ?>
</div><!-- /.card -->
<?php
$view_pharmacytransfer_preview->showPageFooter();
if (Config("DEBUG"))
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
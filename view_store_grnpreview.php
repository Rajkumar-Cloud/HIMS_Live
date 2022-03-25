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
$view_store_grn_preview = new view_store_grn_preview();

// Run the page
$view_store_grn_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_store_grn_preview->Page_Render();
?>
<?php $view_store_grn_preview->showPageHeader(); ?>
<div class="card ew-grid view_store_grn"><!-- .card -->
<?php if ($view_store_grn_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$view_store_grn_preview->renderListOptions();

// Render list options (header, left)
$view_store_grn_preview->ListOptions->render("header", "left");
?>
<?php if ($view_store_grn->PRC->Visible) { // PRC ?>
	<?php if ($view_store_grn->SortUrl($view_store_grn->PRC) == "") { ?>
		<th class="<?php echo $view_store_grn->PRC->headerCellClass() ?>"><?php echo $view_store_grn->PRC->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_store_grn->PRC->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_store_grn->PRC->Name ?>" data-sort-order="<?php echo $view_store_grn_preview->SortField == $view_store_grn->PRC->Name && $view_store_grn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_store_grn->PRC->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_store_grn_preview->SortField == $view_store_grn->PRC->Name) { ?><?php if ($view_store_grn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_store_grn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->PrName->Visible) { // PrName ?>
	<?php if ($view_store_grn->SortUrl($view_store_grn->PrName) == "") { ?>
		<th class="<?php echo $view_store_grn->PrName->headerCellClass() ?>"><?php echo $view_store_grn->PrName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_store_grn->PrName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_store_grn->PrName->Name ?>" data-sort-order="<?php echo $view_store_grn_preview->SortField == $view_store_grn->PrName->Name && $view_store_grn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_store_grn->PrName->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_store_grn_preview->SortField == $view_store_grn->PrName->Name) { ?><?php if ($view_store_grn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_store_grn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->GrnQuantity->Visible) { // GrnQuantity ?>
	<?php if ($view_store_grn->SortUrl($view_store_grn->GrnQuantity) == "") { ?>
		<th class="<?php echo $view_store_grn->GrnQuantity->headerCellClass() ?>"><?php echo $view_store_grn->GrnQuantity->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_store_grn->GrnQuantity->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_store_grn->GrnQuantity->Name ?>" data-sort-order="<?php echo $view_store_grn_preview->SortField == $view_store_grn->GrnQuantity->Name && $view_store_grn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_store_grn->GrnQuantity->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_store_grn_preview->SortField == $view_store_grn->GrnQuantity->Name) { ?><?php if ($view_store_grn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_store_grn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->FreeQty->Visible) { // FreeQty ?>
	<?php if ($view_store_grn->SortUrl($view_store_grn->FreeQty) == "") { ?>
		<th class="<?php echo $view_store_grn->FreeQty->headerCellClass() ?>"><?php echo $view_store_grn->FreeQty->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_store_grn->FreeQty->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_store_grn->FreeQty->Name ?>" data-sort-order="<?php echo $view_store_grn_preview->SortField == $view_store_grn->FreeQty->Name && $view_store_grn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_store_grn->FreeQty->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_store_grn_preview->SortField == $view_store_grn->FreeQty->Name) { ?><?php if ($view_store_grn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_store_grn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->MFRCODE->Visible) { // MFRCODE ?>
	<?php if ($view_store_grn->SortUrl($view_store_grn->MFRCODE) == "") { ?>
		<th class="<?php echo $view_store_grn->MFRCODE->headerCellClass() ?>"><?php echo $view_store_grn->MFRCODE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_store_grn->MFRCODE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_store_grn->MFRCODE->Name ?>" data-sort-order="<?php echo $view_store_grn_preview->SortField == $view_store_grn->MFRCODE->Name && $view_store_grn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_store_grn->MFRCODE->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_store_grn_preview->SortField == $view_store_grn->MFRCODE->Name) { ?><?php if ($view_store_grn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_store_grn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->PUnit->Visible) { // PUnit ?>
	<?php if ($view_store_grn->SortUrl($view_store_grn->PUnit) == "") { ?>
		<th class="<?php echo $view_store_grn->PUnit->headerCellClass() ?>"><?php echo $view_store_grn->PUnit->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_store_grn->PUnit->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_store_grn->PUnit->Name ?>" data-sort-order="<?php echo $view_store_grn_preview->SortField == $view_store_grn->PUnit->Name && $view_store_grn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_store_grn->PUnit->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_store_grn_preview->SortField == $view_store_grn->PUnit->Name) { ?><?php if ($view_store_grn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_store_grn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->SUnit->Visible) { // SUnit ?>
	<?php if ($view_store_grn->SortUrl($view_store_grn->SUnit) == "") { ?>
		<th class="<?php echo $view_store_grn->SUnit->headerCellClass() ?>"><?php echo $view_store_grn->SUnit->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_store_grn->SUnit->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_store_grn->SUnit->Name ?>" data-sort-order="<?php echo $view_store_grn_preview->SortField == $view_store_grn->SUnit->Name && $view_store_grn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_store_grn->SUnit->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_store_grn_preview->SortField == $view_store_grn->SUnit->Name) { ?><?php if ($view_store_grn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_store_grn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->MRP->Visible) { // MRP ?>
	<?php if ($view_store_grn->SortUrl($view_store_grn->MRP) == "") { ?>
		<th class="<?php echo $view_store_grn->MRP->headerCellClass() ?>"><?php echo $view_store_grn->MRP->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_store_grn->MRP->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_store_grn->MRP->Name ?>" data-sort-order="<?php echo $view_store_grn_preview->SortField == $view_store_grn->MRP->Name && $view_store_grn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_store_grn->MRP->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_store_grn_preview->SortField == $view_store_grn->MRP->Name) { ?><?php if ($view_store_grn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_store_grn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->PurValue->Visible) { // PurValue ?>
	<?php if ($view_store_grn->SortUrl($view_store_grn->PurValue) == "") { ?>
		<th class="<?php echo $view_store_grn->PurValue->headerCellClass() ?>"><?php echo $view_store_grn->PurValue->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_store_grn->PurValue->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_store_grn->PurValue->Name ?>" data-sort-order="<?php echo $view_store_grn_preview->SortField == $view_store_grn->PurValue->Name && $view_store_grn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_store_grn->PurValue->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_store_grn_preview->SortField == $view_store_grn->PurValue->Name) { ?><?php if ($view_store_grn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_store_grn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->Disc->Visible) { // Disc ?>
	<?php if ($view_store_grn->SortUrl($view_store_grn->Disc) == "") { ?>
		<th class="<?php echo $view_store_grn->Disc->headerCellClass() ?>"><?php echo $view_store_grn->Disc->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_store_grn->Disc->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_store_grn->Disc->Name ?>" data-sort-order="<?php echo $view_store_grn_preview->SortField == $view_store_grn->Disc->Name && $view_store_grn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_store_grn->Disc->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_store_grn_preview->SortField == $view_store_grn->Disc->Name) { ?><?php if ($view_store_grn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_store_grn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->PSGST->Visible) { // PSGST ?>
	<?php if ($view_store_grn->SortUrl($view_store_grn->PSGST) == "") { ?>
		<th class="<?php echo $view_store_grn->PSGST->headerCellClass() ?>"><?php echo $view_store_grn->PSGST->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_store_grn->PSGST->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_store_grn->PSGST->Name ?>" data-sort-order="<?php echo $view_store_grn_preview->SortField == $view_store_grn->PSGST->Name && $view_store_grn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_store_grn->PSGST->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_store_grn_preview->SortField == $view_store_grn->PSGST->Name) { ?><?php if ($view_store_grn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_store_grn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->PCGST->Visible) { // PCGST ?>
	<?php if ($view_store_grn->SortUrl($view_store_grn->PCGST) == "") { ?>
		<th class="<?php echo $view_store_grn->PCGST->headerCellClass() ?>"><?php echo $view_store_grn->PCGST->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_store_grn->PCGST->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_store_grn->PCGST->Name ?>" data-sort-order="<?php echo $view_store_grn_preview->SortField == $view_store_grn->PCGST->Name && $view_store_grn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_store_grn->PCGST->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_store_grn_preview->SortField == $view_store_grn->PCGST->Name) { ?><?php if ($view_store_grn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_store_grn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->PTax->Visible) { // PTax ?>
	<?php if ($view_store_grn->SortUrl($view_store_grn->PTax) == "") { ?>
		<th class="<?php echo $view_store_grn->PTax->headerCellClass() ?>"><?php echo $view_store_grn->PTax->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_store_grn->PTax->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_store_grn->PTax->Name ?>" data-sort-order="<?php echo $view_store_grn_preview->SortField == $view_store_grn->PTax->Name && $view_store_grn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_store_grn->PTax->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_store_grn_preview->SortField == $view_store_grn->PTax->Name) { ?><?php if ($view_store_grn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_store_grn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->ItemValue->Visible) { // ItemValue ?>
	<?php if ($view_store_grn->SortUrl($view_store_grn->ItemValue) == "") { ?>
		<th class="<?php echo $view_store_grn->ItemValue->headerCellClass() ?>"><?php echo $view_store_grn->ItemValue->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_store_grn->ItemValue->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_store_grn->ItemValue->Name ?>" data-sort-order="<?php echo $view_store_grn_preview->SortField == $view_store_grn->ItemValue->Name && $view_store_grn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_store_grn->ItemValue->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_store_grn_preview->SortField == $view_store_grn->ItemValue->Name) { ?><?php if ($view_store_grn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_store_grn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->SalTax->Visible) { // SalTax ?>
	<?php if ($view_store_grn->SortUrl($view_store_grn->SalTax) == "") { ?>
		<th class="<?php echo $view_store_grn->SalTax->headerCellClass() ?>"><?php echo $view_store_grn->SalTax->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_store_grn->SalTax->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_store_grn->SalTax->Name ?>" data-sort-order="<?php echo $view_store_grn_preview->SortField == $view_store_grn->SalTax->Name && $view_store_grn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_store_grn->SalTax->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_store_grn_preview->SortField == $view_store_grn->SalTax->Name) { ?><?php if ($view_store_grn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_store_grn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->BatchNo->Visible) { // BatchNo ?>
	<?php if ($view_store_grn->SortUrl($view_store_grn->BatchNo) == "") { ?>
		<th class="<?php echo $view_store_grn->BatchNo->headerCellClass() ?>"><?php echo $view_store_grn->BatchNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_store_grn->BatchNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_store_grn->BatchNo->Name ?>" data-sort-order="<?php echo $view_store_grn_preview->SortField == $view_store_grn->BatchNo->Name && $view_store_grn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_store_grn->BatchNo->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_store_grn_preview->SortField == $view_store_grn->BatchNo->Name) { ?><?php if ($view_store_grn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_store_grn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->ExpDate->Visible) { // ExpDate ?>
	<?php if ($view_store_grn->SortUrl($view_store_grn->ExpDate) == "") { ?>
		<th class="<?php echo $view_store_grn->ExpDate->headerCellClass() ?>"><?php echo $view_store_grn->ExpDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_store_grn->ExpDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_store_grn->ExpDate->Name ?>" data-sort-order="<?php echo $view_store_grn_preview->SortField == $view_store_grn->ExpDate->Name && $view_store_grn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_store_grn->ExpDate->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_store_grn_preview->SortField == $view_store_grn->ExpDate->Name) { ?><?php if ($view_store_grn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_store_grn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->Quantity->Visible) { // Quantity ?>
	<?php if ($view_store_grn->SortUrl($view_store_grn->Quantity) == "") { ?>
		<th class="<?php echo $view_store_grn->Quantity->headerCellClass() ?>"><?php echo $view_store_grn->Quantity->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_store_grn->Quantity->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_store_grn->Quantity->Name ?>" data-sort-order="<?php echo $view_store_grn_preview->SortField == $view_store_grn->Quantity->Name && $view_store_grn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_store_grn->Quantity->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_store_grn_preview->SortField == $view_store_grn->Quantity->Name) { ?><?php if ($view_store_grn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_store_grn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->SalRate->Visible) { // SalRate ?>
	<?php if ($view_store_grn->SortUrl($view_store_grn->SalRate) == "") { ?>
		<th class="<?php echo $view_store_grn->SalRate->headerCellClass() ?>"><?php echo $view_store_grn->SalRate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_store_grn->SalRate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_store_grn->SalRate->Name ?>" data-sort-order="<?php echo $view_store_grn_preview->SortField == $view_store_grn->SalRate->Name && $view_store_grn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_store_grn->SalRate->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_store_grn_preview->SortField == $view_store_grn->SalRate->Name) { ?><?php if ($view_store_grn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_store_grn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->SSGST->Visible) { // SSGST ?>
	<?php if ($view_store_grn->SortUrl($view_store_grn->SSGST) == "") { ?>
		<th class="<?php echo $view_store_grn->SSGST->headerCellClass() ?>"><?php echo $view_store_grn->SSGST->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_store_grn->SSGST->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_store_grn->SSGST->Name ?>" data-sort-order="<?php echo $view_store_grn_preview->SortField == $view_store_grn->SSGST->Name && $view_store_grn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_store_grn->SSGST->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_store_grn_preview->SortField == $view_store_grn->SSGST->Name) { ?><?php if ($view_store_grn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_store_grn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->SCGST->Visible) { // SCGST ?>
	<?php if ($view_store_grn->SortUrl($view_store_grn->SCGST) == "") { ?>
		<th class="<?php echo $view_store_grn->SCGST->headerCellClass() ?>"><?php echo $view_store_grn->SCGST->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_store_grn->SCGST->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_store_grn->SCGST->Name ?>" data-sort-order="<?php echo $view_store_grn_preview->SortField == $view_store_grn->SCGST->Name && $view_store_grn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_store_grn->SCGST->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_store_grn_preview->SortField == $view_store_grn->SCGST->Name) { ?><?php if ($view_store_grn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_store_grn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->BRCODE->Visible) { // BRCODE ?>
	<?php if ($view_store_grn->SortUrl($view_store_grn->BRCODE) == "") { ?>
		<th class="<?php echo $view_store_grn->BRCODE->headerCellClass() ?>"><?php echo $view_store_grn->BRCODE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_store_grn->BRCODE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_store_grn->BRCODE->Name ?>" data-sort-order="<?php echo $view_store_grn_preview->SortField == $view_store_grn->BRCODE->Name && $view_store_grn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_store_grn->BRCODE->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_store_grn_preview->SortField == $view_store_grn->BRCODE->Name) { ?><?php if ($view_store_grn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_store_grn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->HSN->Visible) { // HSN ?>
	<?php if ($view_store_grn->SortUrl($view_store_grn->HSN) == "") { ?>
		<th class="<?php echo $view_store_grn->HSN->headerCellClass() ?>"><?php echo $view_store_grn->HSN->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_store_grn->HSN->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_store_grn->HSN->Name ?>" data-sort-order="<?php echo $view_store_grn_preview->SortField == $view_store_grn->HSN->Name && $view_store_grn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_store_grn->HSN->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_store_grn_preview->SortField == $view_store_grn->HSN->Name) { ?><?php if ($view_store_grn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_store_grn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->HospID->Visible) { // HospID ?>
	<?php if ($view_store_grn->SortUrl($view_store_grn->HospID) == "") { ?>
		<th class="<?php echo $view_store_grn->HospID->headerCellClass() ?>"><?php echo $view_store_grn->HospID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_store_grn->HospID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_store_grn->HospID->Name ?>" data-sort-order="<?php echo $view_store_grn_preview->SortField == $view_store_grn->HospID->Name && $view_store_grn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_store_grn->HospID->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_store_grn_preview->SortField == $view_store_grn->HospID->Name) { ?><?php if ($view_store_grn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_store_grn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->grncreatedby->Visible) { // grncreatedby ?>
	<?php if ($view_store_grn->SortUrl($view_store_grn->grncreatedby) == "") { ?>
		<th class="<?php echo $view_store_grn->grncreatedby->headerCellClass() ?>"><?php echo $view_store_grn->grncreatedby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_store_grn->grncreatedby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_store_grn->grncreatedby->Name ?>" data-sort-order="<?php echo $view_store_grn_preview->SortField == $view_store_grn->grncreatedby->Name && $view_store_grn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_store_grn->grncreatedby->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_store_grn_preview->SortField == $view_store_grn->grncreatedby->Name) { ?><?php if ($view_store_grn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_store_grn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
	<?php if ($view_store_grn->SortUrl($view_store_grn->grncreatedDateTime) == "") { ?>
		<th class="<?php echo $view_store_grn->grncreatedDateTime->headerCellClass() ?>"><?php echo $view_store_grn->grncreatedDateTime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_store_grn->grncreatedDateTime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_store_grn->grncreatedDateTime->Name ?>" data-sort-order="<?php echo $view_store_grn_preview->SortField == $view_store_grn->grncreatedDateTime->Name && $view_store_grn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_store_grn->grncreatedDateTime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_store_grn_preview->SortField == $view_store_grn->grncreatedDateTime->Name) { ?><?php if ($view_store_grn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_store_grn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->grnModifiedby->Visible) { // grnModifiedby ?>
	<?php if ($view_store_grn->SortUrl($view_store_grn->grnModifiedby) == "") { ?>
		<th class="<?php echo $view_store_grn->grnModifiedby->headerCellClass() ?>"><?php echo $view_store_grn->grnModifiedby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_store_grn->grnModifiedby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_store_grn->grnModifiedby->Name ?>" data-sort-order="<?php echo $view_store_grn_preview->SortField == $view_store_grn->grnModifiedby->Name && $view_store_grn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_store_grn->grnModifiedby->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_store_grn_preview->SortField == $view_store_grn->grnModifiedby->Name) { ?><?php if ($view_store_grn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_store_grn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
	<?php if ($view_store_grn->SortUrl($view_store_grn->grnModifiedDateTime) == "") { ?>
		<th class="<?php echo $view_store_grn->grnModifiedDateTime->headerCellClass() ?>"><?php echo $view_store_grn->grnModifiedDateTime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_store_grn->grnModifiedDateTime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_store_grn->grnModifiedDateTime->Name ?>" data-sort-order="<?php echo $view_store_grn_preview->SortField == $view_store_grn->grnModifiedDateTime->Name && $view_store_grn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_store_grn->grnModifiedDateTime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_store_grn_preview->SortField == $view_store_grn->grnModifiedDateTime->Name) { ?><?php if ($view_store_grn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_store_grn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->BillDate->Visible) { // BillDate ?>
	<?php if ($view_store_grn->SortUrl($view_store_grn->BillDate) == "") { ?>
		<th class="<?php echo $view_store_grn->BillDate->headerCellClass() ?>"><?php echo $view_store_grn->BillDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_store_grn->BillDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_store_grn->BillDate->Name ?>" data-sort-order="<?php echo $view_store_grn_preview->SortField == $view_store_grn->BillDate->Name && $view_store_grn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_store_grn->BillDate->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_store_grn_preview->SortField == $view_store_grn->BillDate->Name) { ?><?php if ($view_store_grn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_store_grn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->CurStock->Visible) { // CurStock ?>
	<?php if ($view_store_grn->SortUrl($view_store_grn->CurStock) == "") { ?>
		<th class="<?php echo $view_store_grn->CurStock->headerCellClass() ?>"><?php echo $view_store_grn->CurStock->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_store_grn->CurStock->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_store_grn->CurStock->Name ?>" data-sort-order="<?php echo $view_store_grn_preview->SortField == $view_store_grn->CurStock->Name && $view_store_grn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_store_grn->CurStock->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_store_grn_preview->SortField == $view_store_grn->CurStock->Name) { ?><?php if ($view_store_grn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_store_grn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->FreeQtyyy->Visible) { // FreeQtyyy ?>
	<?php if ($view_store_grn->SortUrl($view_store_grn->FreeQtyyy) == "") { ?>
		<th class="<?php echo $view_store_grn->FreeQtyyy->headerCellClass() ?>"><?php echo $view_store_grn->FreeQtyyy->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_store_grn->FreeQtyyy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_store_grn->FreeQtyyy->Name ?>" data-sort-order="<?php echo $view_store_grn_preview->SortField == $view_store_grn->FreeQtyyy->Name && $view_store_grn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_store_grn->FreeQtyyy->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_store_grn_preview->SortField == $view_store_grn->FreeQtyyy->Name) { ?><?php if ($view_store_grn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_store_grn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->grndate->Visible) { // grndate ?>
	<?php if ($view_store_grn->SortUrl($view_store_grn->grndate) == "") { ?>
		<th class="<?php echo $view_store_grn->grndate->headerCellClass() ?>"><?php echo $view_store_grn->grndate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_store_grn->grndate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_store_grn->grndate->Name ?>" data-sort-order="<?php echo $view_store_grn_preview->SortField == $view_store_grn->grndate->Name && $view_store_grn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_store_grn->grndate->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_store_grn_preview->SortField == $view_store_grn->grndate->Name) { ?><?php if ($view_store_grn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_store_grn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->grndatetime->Visible) { // grndatetime ?>
	<?php if ($view_store_grn->SortUrl($view_store_grn->grndatetime) == "") { ?>
		<th class="<?php echo $view_store_grn->grndatetime->headerCellClass() ?>"><?php echo $view_store_grn->grndatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_store_grn->grndatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_store_grn->grndatetime->Name ?>" data-sort-order="<?php echo $view_store_grn_preview->SortField == $view_store_grn->grndatetime->Name && $view_store_grn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_store_grn->grndatetime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_store_grn_preview->SortField == $view_store_grn->grndatetime->Name) { ?><?php if ($view_store_grn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_store_grn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->strid->Visible) { // strid ?>
	<?php if ($view_store_grn->SortUrl($view_store_grn->strid) == "") { ?>
		<th class="<?php echo $view_store_grn->strid->headerCellClass() ?>"><?php echo $view_store_grn->strid->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_store_grn->strid->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_store_grn->strid->Name ?>" data-sort-order="<?php echo $view_store_grn_preview->SortField == $view_store_grn->strid->Name && $view_store_grn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_store_grn->strid->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_store_grn_preview->SortField == $view_store_grn->strid->Name) { ?><?php if ($view_store_grn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_store_grn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->GRNPer->Visible) { // GRNPer ?>
	<?php if ($view_store_grn->SortUrl($view_store_grn->GRNPer) == "") { ?>
		<th class="<?php echo $view_store_grn->GRNPer->headerCellClass() ?>"><?php echo $view_store_grn->GRNPer->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_store_grn->GRNPer->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_store_grn->GRNPer->Name ?>" data-sort-order="<?php echo $view_store_grn_preview->SortField == $view_store_grn->GRNPer->Name && $view_store_grn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_store_grn->GRNPer->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_store_grn_preview->SortField == $view_store_grn->GRNPer->Name) { ?><?php if ($view_store_grn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_store_grn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_store_grn_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$view_store_grn_preview->RecCount = 0;
$view_store_grn_preview->RowCnt = 0;
while ($view_store_grn_preview->Recordset && !$view_store_grn_preview->Recordset->EOF) {

	// Init row class and style
	$view_store_grn_preview->RecCount++;
	$view_store_grn_preview->RowCnt++;
	$view_store_grn_preview->CssStyle = "";
	$view_store_grn_preview->loadListRowValues($view_store_grn_preview->Recordset);
	$view_store_grn_preview->aggregateListRowValues(); // Aggregate row values

	// Render row
	$view_store_grn_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$view_store_grn_preview->resetAttributes();
	$view_store_grn_preview->renderListRow();

	// Render list options
	$view_store_grn_preview->renderListOptions();
?>
	<tr<?php echo $view_store_grn_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_store_grn_preview->ListOptions->render("body", "left", $view_store_grn_preview->RowCnt);
?>
<?php if ($view_store_grn->PRC->Visible) { // PRC ?>
		<!-- PRC -->
		<td<?php echo $view_store_grn->PRC->cellAttributes() ?>>
<span<?php echo $view_store_grn->PRC->viewAttributes() ?>>
<?php echo $view_store_grn->PRC->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_store_grn->PrName->Visible) { // PrName ?>
		<!-- PrName -->
		<td<?php echo $view_store_grn->PrName->cellAttributes() ?>>
<span<?php echo $view_store_grn->PrName->viewAttributes() ?>>
<?php echo $view_store_grn->PrName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_store_grn->GrnQuantity->Visible) { // GrnQuantity ?>
		<!-- GrnQuantity -->
		<td<?php echo $view_store_grn->GrnQuantity->cellAttributes() ?>>
<span<?php echo $view_store_grn->GrnQuantity->viewAttributes() ?>>
<?php echo $view_store_grn->GrnQuantity->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_store_grn->FreeQty->Visible) { // FreeQty ?>
		<!-- FreeQty -->
		<td<?php echo $view_store_grn->FreeQty->cellAttributes() ?>>
<span<?php echo $view_store_grn->FreeQty->viewAttributes() ?>>
<?php echo $view_store_grn->FreeQty->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_store_grn->MFRCODE->Visible) { // MFRCODE ?>
		<!-- MFRCODE -->
		<td<?php echo $view_store_grn->MFRCODE->cellAttributes() ?>>
<span<?php echo $view_store_grn->MFRCODE->viewAttributes() ?>>
<?php echo $view_store_grn->MFRCODE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_store_grn->PUnit->Visible) { // PUnit ?>
		<!-- PUnit -->
		<td<?php echo $view_store_grn->PUnit->cellAttributes() ?>>
<span<?php echo $view_store_grn->PUnit->viewAttributes() ?>>
<?php echo $view_store_grn->PUnit->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_store_grn->SUnit->Visible) { // SUnit ?>
		<!-- SUnit -->
		<td<?php echo $view_store_grn->SUnit->cellAttributes() ?>>
<span<?php echo $view_store_grn->SUnit->viewAttributes() ?>>
<?php echo $view_store_grn->SUnit->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_store_grn->MRP->Visible) { // MRP ?>
		<!-- MRP -->
		<td<?php echo $view_store_grn->MRP->cellAttributes() ?>>
<span<?php echo $view_store_grn->MRP->viewAttributes() ?>>
<?php echo $view_store_grn->MRP->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_store_grn->PurValue->Visible) { // PurValue ?>
		<!-- PurValue -->
		<td<?php echo $view_store_grn->PurValue->cellAttributes() ?>>
<span<?php echo $view_store_grn->PurValue->viewAttributes() ?>>
<?php echo $view_store_grn->PurValue->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_store_grn->Disc->Visible) { // Disc ?>
		<!-- Disc -->
		<td<?php echo $view_store_grn->Disc->cellAttributes() ?>>
<span<?php echo $view_store_grn->Disc->viewAttributes() ?>>
<?php echo $view_store_grn->Disc->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_store_grn->PSGST->Visible) { // PSGST ?>
		<!-- PSGST -->
		<td<?php echo $view_store_grn->PSGST->cellAttributes() ?>>
<span<?php echo $view_store_grn->PSGST->viewAttributes() ?>>
<?php echo $view_store_grn->PSGST->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_store_grn->PCGST->Visible) { // PCGST ?>
		<!-- PCGST -->
		<td<?php echo $view_store_grn->PCGST->cellAttributes() ?>>
<span<?php echo $view_store_grn->PCGST->viewAttributes() ?>>
<?php echo $view_store_grn->PCGST->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_store_grn->PTax->Visible) { // PTax ?>
		<!-- PTax -->
		<td<?php echo $view_store_grn->PTax->cellAttributes() ?>>
<span<?php echo $view_store_grn->PTax->viewAttributes() ?>>
<?php echo $view_store_grn->PTax->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_store_grn->ItemValue->Visible) { // ItemValue ?>
		<!-- ItemValue -->
		<td<?php echo $view_store_grn->ItemValue->cellAttributes() ?>>
<span<?php echo $view_store_grn->ItemValue->viewAttributes() ?>>
<?php echo $view_store_grn->ItemValue->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_store_grn->SalTax->Visible) { // SalTax ?>
		<!-- SalTax -->
		<td<?php echo $view_store_grn->SalTax->cellAttributes() ?>>
<span<?php echo $view_store_grn->SalTax->viewAttributes() ?>>
<?php echo $view_store_grn->SalTax->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_store_grn->BatchNo->Visible) { // BatchNo ?>
		<!-- BatchNo -->
		<td<?php echo $view_store_grn->BatchNo->cellAttributes() ?>>
<span<?php echo $view_store_grn->BatchNo->viewAttributes() ?>>
<?php echo $view_store_grn->BatchNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_store_grn->ExpDate->Visible) { // ExpDate ?>
		<!-- ExpDate -->
		<td<?php echo $view_store_grn->ExpDate->cellAttributes() ?>>
<span<?php echo $view_store_grn->ExpDate->viewAttributes() ?>>
<?php echo $view_store_grn->ExpDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_store_grn->Quantity->Visible) { // Quantity ?>
		<!-- Quantity -->
		<td<?php echo $view_store_grn->Quantity->cellAttributes() ?>>
<span<?php echo $view_store_grn->Quantity->viewAttributes() ?>>
<?php echo $view_store_grn->Quantity->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_store_grn->SalRate->Visible) { // SalRate ?>
		<!-- SalRate -->
		<td<?php echo $view_store_grn->SalRate->cellAttributes() ?>>
<span<?php echo $view_store_grn->SalRate->viewAttributes() ?>>
<?php echo $view_store_grn->SalRate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_store_grn->SSGST->Visible) { // SSGST ?>
		<!-- SSGST -->
		<td<?php echo $view_store_grn->SSGST->cellAttributes() ?>>
<span<?php echo $view_store_grn->SSGST->viewAttributes() ?>>
<?php echo $view_store_grn->SSGST->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_store_grn->SCGST->Visible) { // SCGST ?>
		<!-- SCGST -->
		<td<?php echo $view_store_grn->SCGST->cellAttributes() ?>>
<span<?php echo $view_store_grn->SCGST->viewAttributes() ?>>
<?php echo $view_store_grn->SCGST->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_store_grn->BRCODE->Visible) { // BRCODE ?>
		<!-- BRCODE -->
		<td<?php echo $view_store_grn->BRCODE->cellAttributes() ?>>
<span<?php echo $view_store_grn->BRCODE->viewAttributes() ?>>
<?php echo $view_store_grn->BRCODE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_store_grn->HSN->Visible) { // HSN ?>
		<!-- HSN -->
		<td<?php echo $view_store_grn->HSN->cellAttributes() ?>>
<span<?php echo $view_store_grn->HSN->viewAttributes() ?>>
<?php echo $view_store_grn->HSN->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_store_grn->HospID->Visible) { // HospID ?>
		<!-- HospID -->
		<td<?php echo $view_store_grn->HospID->cellAttributes() ?>>
<span<?php echo $view_store_grn->HospID->viewAttributes() ?>>
<?php echo $view_store_grn->HospID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_store_grn->grncreatedby->Visible) { // grncreatedby ?>
		<!-- grncreatedby -->
		<td<?php echo $view_store_grn->grncreatedby->cellAttributes() ?>>
<span<?php echo $view_store_grn->grncreatedby->viewAttributes() ?>>
<?php echo $view_store_grn->grncreatedby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_store_grn->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
		<!-- grncreatedDateTime -->
		<td<?php echo $view_store_grn->grncreatedDateTime->cellAttributes() ?>>
<span<?php echo $view_store_grn->grncreatedDateTime->viewAttributes() ?>>
<?php echo $view_store_grn->grncreatedDateTime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_store_grn->grnModifiedby->Visible) { // grnModifiedby ?>
		<!-- grnModifiedby -->
		<td<?php echo $view_store_grn->grnModifiedby->cellAttributes() ?>>
<span<?php echo $view_store_grn->grnModifiedby->viewAttributes() ?>>
<?php echo $view_store_grn->grnModifiedby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_store_grn->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
		<!-- grnModifiedDateTime -->
		<td<?php echo $view_store_grn->grnModifiedDateTime->cellAttributes() ?>>
<span<?php echo $view_store_grn->grnModifiedDateTime->viewAttributes() ?>>
<?php echo $view_store_grn->grnModifiedDateTime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_store_grn->BillDate->Visible) { // BillDate ?>
		<!-- BillDate -->
		<td<?php echo $view_store_grn->BillDate->cellAttributes() ?>>
<span<?php echo $view_store_grn->BillDate->viewAttributes() ?>>
<?php echo $view_store_grn->BillDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_store_grn->CurStock->Visible) { // CurStock ?>
		<!-- CurStock -->
		<td<?php echo $view_store_grn->CurStock->cellAttributes() ?>>
<span<?php echo $view_store_grn->CurStock->viewAttributes() ?>>
<?php echo $view_store_grn->CurStock->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_store_grn->FreeQtyyy->Visible) { // FreeQtyyy ?>
		<!-- FreeQtyyy -->
		<td<?php echo $view_store_grn->FreeQtyyy->cellAttributes() ?>>
<span<?php echo $view_store_grn->FreeQtyyy->viewAttributes() ?>>
<?php echo $view_store_grn->FreeQtyyy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_store_grn->grndate->Visible) { // grndate ?>
		<!-- grndate -->
		<td<?php echo $view_store_grn->grndate->cellAttributes() ?>>
<span<?php echo $view_store_grn->grndate->viewAttributes() ?>>
<?php echo $view_store_grn->grndate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_store_grn->grndatetime->Visible) { // grndatetime ?>
		<!-- grndatetime -->
		<td<?php echo $view_store_grn->grndatetime->cellAttributes() ?>>
<span<?php echo $view_store_grn->grndatetime->viewAttributes() ?>>
<?php echo $view_store_grn->grndatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_store_grn->strid->Visible) { // strid ?>
		<!-- strid -->
		<td<?php echo $view_store_grn->strid->cellAttributes() ?>>
<span<?php echo $view_store_grn->strid->viewAttributes() ?>>
<?php echo $view_store_grn->strid->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_store_grn->GRNPer->Visible) { // GRNPer ?>
		<!-- GRNPer -->
		<td<?php echo $view_store_grn->GRNPer->cellAttributes() ?>>
<span<?php echo $view_store_grn->GRNPer->viewAttributes() ?>>
<?php echo $view_store_grn->GRNPer->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$view_store_grn_preview->ListOptions->render("body", "right", $view_store_grn_preview->RowCnt);
?>
	</tr>
<?php
	$view_store_grn_preview->Recordset->MoveNext();
}
?>
	</tbody>
<?php

	// Render aggregate row
	$view_store_grn_preview->aggregateListRow(); // Prepare aggregate row

	// Render list options
	$view_store_grn_preview->renderListOptions();
?>
	<tfoot><!-- Table footer -->
	<tr class="ew-table-footer">
<?php

// Render list options (footer, left)
$view_store_grn_preview->ListOptions->render("footer", "left");
?>
<?php if ($view_store_grn->PRC->Visible) { // PRC ?>
		<!-- PRC -->
		<td class="<?php echo $view_store_grn->PRC->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_store_grn->PrName->Visible) { // PrName ?>
		<!-- PrName -->
		<td class="<?php echo $view_store_grn->PrName->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_store_grn->GrnQuantity->Visible) { // GrnQuantity ?>
		<!-- GrnQuantity -->
		<td class="<?php echo $view_store_grn->GrnQuantity->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_store_grn->FreeQty->Visible) { // FreeQty ?>
		<!-- FreeQty -->
		<td class="<?php echo $view_store_grn->FreeQty->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_store_grn->MFRCODE->Visible) { // MFRCODE ?>
		<!-- MFRCODE -->
		<td class="<?php echo $view_store_grn->MFRCODE->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_store_grn->PUnit->Visible) { // PUnit ?>
		<!-- PUnit -->
		<td class="<?php echo $view_store_grn->PUnit->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_store_grn->SUnit->Visible) { // SUnit ?>
		<!-- SUnit -->
		<td class="<?php echo $view_store_grn->SUnit->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_store_grn->MRP->Visible) { // MRP ?>
		<!-- MRP -->
		<td class="<?php echo $view_store_grn->MRP->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_store_grn->PurValue->Visible) { // PurValue ?>
		<!-- PurValue -->
		<td class="<?php echo $view_store_grn->PurValue->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_store_grn->Disc->Visible) { // Disc ?>
		<!-- Disc -->
		<td class="<?php echo $view_store_grn->Disc->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_store_grn->PSGST->Visible) { // PSGST ?>
		<!-- PSGST -->
		<td class="<?php echo $view_store_grn->PSGST->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_store_grn->PCGST->Visible) { // PCGST ?>
		<!-- PCGST -->
		<td class="<?php echo $view_store_grn->PCGST->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_store_grn->PTax->Visible) { // PTax ?>
		<!-- PTax -->
		<td class="<?php echo $view_store_grn->PTax->footerCellClass() ?>">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_store_grn->PTax->ViewValue ?></span>
		</td>
<?php } ?>
<?php if ($view_store_grn->ItemValue->Visible) { // ItemValue ?>
		<!-- ItemValue -->
		<td class="<?php echo $view_store_grn->ItemValue->footerCellClass() ?>">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_store_grn->ItemValue->ViewValue ?></span>
		</td>
<?php } ?>
<?php if ($view_store_grn->SalTax->Visible) { // SalTax ?>
		<!-- SalTax -->
		<td class="<?php echo $view_store_grn->SalTax->footerCellClass() ?>">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_store_grn->SalTax->ViewValue ?></span>
		</td>
<?php } ?>
<?php if ($view_store_grn->BatchNo->Visible) { // BatchNo ?>
		<!-- BatchNo -->
		<td class="<?php echo $view_store_grn->BatchNo->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_store_grn->ExpDate->Visible) { // ExpDate ?>
		<!-- ExpDate -->
		<td class="<?php echo $view_store_grn->ExpDate->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_store_grn->Quantity->Visible) { // Quantity ?>
		<!-- Quantity -->
		<td class="<?php echo $view_store_grn->Quantity->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_store_grn->SalRate->Visible) { // SalRate ?>
		<!-- SalRate -->
		<td class="<?php echo $view_store_grn->SalRate->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_store_grn->SSGST->Visible) { // SSGST ?>
		<!-- SSGST -->
		<td class="<?php echo $view_store_grn->SSGST->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_store_grn->SCGST->Visible) { // SCGST ?>
		<!-- SCGST -->
		<td class="<?php echo $view_store_grn->SCGST->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_store_grn->BRCODE->Visible) { // BRCODE ?>
		<!-- BRCODE -->
		<td class="<?php echo $view_store_grn->BRCODE->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_store_grn->HSN->Visible) { // HSN ?>
		<!-- HSN -->
		<td class="<?php echo $view_store_grn->HSN->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_store_grn->HospID->Visible) { // HospID ?>
		<!-- HospID -->
		<td class="<?php echo $view_store_grn->HospID->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_store_grn->grncreatedby->Visible) { // grncreatedby ?>
		<!-- grncreatedby -->
		<td class="<?php echo $view_store_grn->grncreatedby->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_store_grn->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
		<!-- grncreatedDateTime -->
		<td class="<?php echo $view_store_grn->grncreatedDateTime->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_store_grn->grnModifiedby->Visible) { // grnModifiedby ?>
		<!-- grnModifiedby -->
		<td class="<?php echo $view_store_grn->grnModifiedby->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_store_grn->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
		<!-- grnModifiedDateTime -->
		<td class="<?php echo $view_store_grn->grnModifiedDateTime->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_store_grn->BillDate->Visible) { // BillDate ?>
		<!-- BillDate -->
		<td class="<?php echo $view_store_grn->BillDate->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_store_grn->CurStock->Visible) { // CurStock ?>
		<!-- CurStock -->
		<td class="<?php echo $view_store_grn->CurStock->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_store_grn->FreeQtyyy->Visible) { // FreeQtyyy ?>
		<!-- FreeQtyyy -->
		<td class="<?php echo $view_store_grn->FreeQtyyy->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_store_grn->grndate->Visible) { // grndate ?>
		<!-- grndate -->
		<td class="<?php echo $view_store_grn->grndate->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_store_grn->grndatetime->Visible) { // grndatetime ?>
		<!-- grndatetime -->
		<td class="<?php echo $view_store_grn->grndatetime->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_store_grn->strid->Visible) { // strid ?>
		<!-- strid -->
		<td class="<?php echo $view_store_grn->strid->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_store_grn->GRNPer->Visible) { // GRNPer ?>
		<!-- GRNPer -->
		<td class="<?php echo $view_store_grn->GRNPer->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php

// Render list options (footer, right)
$view_store_grn_preview->ListOptions->render("footer", "right");
?>
	</tr>
	</tfoot>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($view_store_grn_preview->TotalRecs > 0) { ?>
<?php if (!isset($view_store_grn_preview->Pager)) $view_store_grn_preview->Pager = new PrevNextPager($view_store_grn_preview->StartRec, $view_store_grn_preview->DisplayRecs, $view_store_grn_preview->TotalRecs) ?>
<?php if ($view_store_grn_preview->Pager->RecordCount > 0 && $view_store_grn_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($view_store_grn_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $view_store_grn_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($view_store_grn_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $view_store_grn_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($view_store_grn_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $view_store_grn_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($view_store_grn_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $view_store_grn_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_store_grn_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_store_grn_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_store_grn_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($view_store_grn_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$view_store_grn_preview->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php
if ($view_store_grn_preview->Recordset)
	$view_store_grn_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$view_store_grn_preview->terminate();
?>
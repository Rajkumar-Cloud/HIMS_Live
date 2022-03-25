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
$view_pharmacygrn_preview = new view_pharmacygrn_preview();

// Run the page
$view_pharmacygrn_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacygrn_preview->Page_Render();
?>
<?php $view_pharmacygrn_preview->showPageHeader(); ?>
<div class="card ew-grid view_pharmacygrn"><!-- .card -->
<?php if ($view_pharmacygrn_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$view_pharmacygrn_preview->renderListOptions();

// Render list options (header, left)
$view_pharmacygrn_preview->ListOptions->render("header", "left");
?>
<?php if ($view_pharmacygrn->PRC->Visible) { // PRC ?>
	<?php if ($view_pharmacygrn->SortUrl($view_pharmacygrn->PRC) == "") { ?>
		<th class="<?php echo $view_pharmacygrn->PRC->headerCellClass() ?>"><?php echo $view_pharmacygrn->PRC->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacygrn->PRC->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacygrn->PRC->Name ?>" data-sort-order="<?php echo $view_pharmacygrn_preview->SortField == $view_pharmacygrn->PRC->Name && $view_pharmacygrn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacygrn->PRC->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacygrn_preview->SortField == $view_pharmacygrn->PRC->Name) { ?><?php if ($view_pharmacygrn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacygrn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->PrName->Visible) { // PrName ?>
	<?php if ($view_pharmacygrn->SortUrl($view_pharmacygrn->PrName) == "") { ?>
		<th class="<?php echo $view_pharmacygrn->PrName->headerCellClass() ?>"><?php echo $view_pharmacygrn->PrName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacygrn->PrName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacygrn->PrName->Name ?>" data-sort-order="<?php echo $view_pharmacygrn_preview->SortField == $view_pharmacygrn->PrName->Name && $view_pharmacygrn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacygrn->PrName->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacygrn_preview->SortField == $view_pharmacygrn->PrName->Name) { ?><?php if ($view_pharmacygrn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacygrn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->GrnQuantity->Visible) { // GrnQuantity ?>
	<?php if ($view_pharmacygrn->SortUrl($view_pharmacygrn->GrnQuantity) == "") { ?>
		<th class="<?php echo $view_pharmacygrn->GrnQuantity->headerCellClass() ?>"><?php echo $view_pharmacygrn->GrnQuantity->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacygrn->GrnQuantity->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacygrn->GrnQuantity->Name ?>" data-sort-order="<?php echo $view_pharmacygrn_preview->SortField == $view_pharmacygrn->GrnQuantity->Name && $view_pharmacygrn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacygrn->GrnQuantity->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacygrn_preview->SortField == $view_pharmacygrn->GrnQuantity->Name) { ?><?php if ($view_pharmacygrn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacygrn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->Quantity->Visible) { // Quantity ?>
	<?php if ($view_pharmacygrn->SortUrl($view_pharmacygrn->Quantity) == "") { ?>
		<th class="<?php echo $view_pharmacygrn->Quantity->headerCellClass() ?>"><?php echo $view_pharmacygrn->Quantity->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacygrn->Quantity->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacygrn->Quantity->Name ?>" data-sort-order="<?php echo $view_pharmacygrn_preview->SortField == $view_pharmacygrn->Quantity->Name && $view_pharmacygrn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacygrn->Quantity->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacygrn_preview->SortField == $view_pharmacygrn->Quantity->Name) { ?><?php if ($view_pharmacygrn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacygrn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->FreeQty->Visible) { // FreeQty ?>
	<?php if ($view_pharmacygrn->SortUrl($view_pharmacygrn->FreeQty) == "") { ?>
		<th class="<?php echo $view_pharmacygrn->FreeQty->headerCellClass() ?>"><?php echo $view_pharmacygrn->FreeQty->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacygrn->FreeQty->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacygrn->FreeQty->Name ?>" data-sort-order="<?php echo $view_pharmacygrn_preview->SortField == $view_pharmacygrn->FreeQty->Name && $view_pharmacygrn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacygrn->FreeQty->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacygrn_preview->SortField == $view_pharmacygrn->FreeQty->Name) { ?><?php if ($view_pharmacygrn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacygrn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->FreeQtyyy->Visible) { // FreeQtyyy ?>
	<?php if ($view_pharmacygrn->SortUrl($view_pharmacygrn->FreeQtyyy) == "") { ?>
		<th class="<?php echo $view_pharmacygrn->FreeQtyyy->headerCellClass() ?>"><?php echo $view_pharmacygrn->FreeQtyyy->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacygrn->FreeQtyyy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacygrn->FreeQtyyy->Name ?>" data-sort-order="<?php echo $view_pharmacygrn_preview->SortField == $view_pharmacygrn->FreeQtyyy->Name && $view_pharmacygrn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacygrn->FreeQtyyy->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacygrn_preview->SortField == $view_pharmacygrn->FreeQtyyy->Name) { ?><?php if ($view_pharmacygrn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacygrn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->BatchNo->Visible) { // BatchNo ?>
	<?php if ($view_pharmacygrn->SortUrl($view_pharmacygrn->BatchNo) == "") { ?>
		<th class="<?php echo $view_pharmacygrn->BatchNo->headerCellClass() ?>"><?php echo $view_pharmacygrn->BatchNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacygrn->BatchNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacygrn->BatchNo->Name ?>" data-sort-order="<?php echo $view_pharmacygrn_preview->SortField == $view_pharmacygrn->BatchNo->Name && $view_pharmacygrn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacygrn->BatchNo->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacygrn_preview->SortField == $view_pharmacygrn->BatchNo->Name) { ?><?php if ($view_pharmacygrn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacygrn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->ExpDate->Visible) { // ExpDate ?>
	<?php if ($view_pharmacygrn->SortUrl($view_pharmacygrn->ExpDate) == "") { ?>
		<th class="<?php echo $view_pharmacygrn->ExpDate->headerCellClass() ?>"><?php echo $view_pharmacygrn->ExpDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacygrn->ExpDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacygrn->ExpDate->Name ?>" data-sort-order="<?php echo $view_pharmacygrn_preview->SortField == $view_pharmacygrn->ExpDate->Name && $view_pharmacygrn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacygrn->ExpDate->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacygrn_preview->SortField == $view_pharmacygrn->ExpDate->Name) { ?><?php if ($view_pharmacygrn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacygrn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->HSN->Visible) { // HSN ?>
	<?php if ($view_pharmacygrn->SortUrl($view_pharmacygrn->HSN) == "") { ?>
		<th class="<?php echo $view_pharmacygrn->HSN->headerCellClass() ?>"><?php echo $view_pharmacygrn->HSN->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacygrn->HSN->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacygrn->HSN->Name ?>" data-sort-order="<?php echo $view_pharmacygrn_preview->SortField == $view_pharmacygrn->HSN->Name && $view_pharmacygrn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacygrn->HSN->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacygrn_preview->SortField == $view_pharmacygrn->HSN->Name) { ?><?php if ($view_pharmacygrn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacygrn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->MFRCODE->Visible) { // MFRCODE ?>
	<?php if ($view_pharmacygrn->SortUrl($view_pharmacygrn->MFRCODE) == "") { ?>
		<th class="<?php echo $view_pharmacygrn->MFRCODE->headerCellClass() ?>"><?php echo $view_pharmacygrn->MFRCODE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacygrn->MFRCODE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacygrn->MFRCODE->Name ?>" data-sort-order="<?php echo $view_pharmacygrn_preview->SortField == $view_pharmacygrn->MFRCODE->Name && $view_pharmacygrn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacygrn->MFRCODE->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacygrn_preview->SortField == $view_pharmacygrn->MFRCODE->Name) { ?><?php if ($view_pharmacygrn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacygrn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->PUnit->Visible) { // PUnit ?>
	<?php if ($view_pharmacygrn->SortUrl($view_pharmacygrn->PUnit) == "") { ?>
		<th class="<?php echo $view_pharmacygrn->PUnit->headerCellClass() ?>"><?php echo $view_pharmacygrn->PUnit->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacygrn->PUnit->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacygrn->PUnit->Name ?>" data-sort-order="<?php echo $view_pharmacygrn_preview->SortField == $view_pharmacygrn->PUnit->Name && $view_pharmacygrn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacygrn->PUnit->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacygrn_preview->SortField == $view_pharmacygrn->PUnit->Name) { ?><?php if ($view_pharmacygrn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacygrn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->SUnit->Visible) { // SUnit ?>
	<?php if ($view_pharmacygrn->SortUrl($view_pharmacygrn->SUnit) == "") { ?>
		<th class="<?php echo $view_pharmacygrn->SUnit->headerCellClass() ?>"><?php echo $view_pharmacygrn->SUnit->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacygrn->SUnit->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacygrn->SUnit->Name ?>" data-sort-order="<?php echo $view_pharmacygrn_preview->SortField == $view_pharmacygrn->SUnit->Name && $view_pharmacygrn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacygrn->SUnit->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacygrn_preview->SortField == $view_pharmacygrn->SUnit->Name) { ?><?php if ($view_pharmacygrn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacygrn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->MRP->Visible) { // MRP ?>
	<?php if ($view_pharmacygrn->SortUrl($view_pharmacygrn->MRP) == "") { ?>
		<th class="<?php echo $view_pharmacygrn->MRP->headerCellClass() ?>"><?php echo $view_pharmacygrn->MRP->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacygrn->MRP->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacygrn->MRP->Name ?>" data-sort-order="<?php echo $view_pharmacygrn_preview->SortField == $view_pharmacygrn->MRP->Name && $view_pharmacygrn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacygrn->MRP->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacygrn_preview->SortField == $view_pharmacygrn->MRP->Name) { ?><?php if ($view_pharmacygrn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacygrn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->PurValue->Visible) { // PurValue ?>
	<?php if ($view_pharmacygrn->SortUrl($view_pharmacygrn->PurValue) == "") { ?>
		<th class="<?php echo $view_pharmacygrn->PurValue->headerCellClass() ?>"><?php echo $view_pharmacygrn->PurValue->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacygrn->PurValue->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacygrn->PurValue->Name ?>" data-sort-order="<?php echo $view_pharmacygrn_preview->SortField == $view_pharmacygrn->PurValue->Name && $view_pharmacygrn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacygrn->PurValue->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacygrn_preview->SortField == $view_pharmacygrn->PurValue->Name) { ?><?php if ($view_pharmacygrn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacygrn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->Disc->Visible) { // Disc ?>
	<?php if ($view_pharmacygrn->SortUrl($view_pharmacygrn->Disc) == "") { ?>
		<th class="<?php echo $view_pharmacygrn->Disc->headerCellClass() ?>"><?php echo $view_pharmacygrn->Disc->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacygrn->Disc->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacygrn->Disc->Name ?>" data-sort-order="<?php echo $view_pharmacygrn_preview->SortField == $view_pharmacygrn->Disc->Name && $view_pharmacygrn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacygrn->Disc->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacygrn_preview->SortField == $view_pharmacygrn->Disc->Name) { ?><?php if ($view_pharmacygrn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacygrn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->PSGST->Visible) { // PSGST ?>
	<?php if ($view_pharmacygrn->SortUrl($view_pharmacygrn->PSGST) == "") { ?>
		<th class="<?php echo $view_pharmacygrn->PSGST->headerCellClass() ?>"><?php echo $view_pharmacygrn->PSGST->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacygrn->PSGST->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacygrn->PSGST->Name ?>" data-sort-order="<?php echo $view_pharmacygrn_preview->SortField == $view_pharmacygrn->PSGST->Name && $view_pharmacygrn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacygrn->PSGST->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacygrn_preview->SortField == $view_pharmacygrn->PSGST->Name) { ?><?php if ($view_pharmacygrn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacygrn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->PCGST->Visible) { // PCGST ?>
	<?php if ($view_pharmacygrn->SortUrl($view_pharmacygrn->PCGST) == "") { ?>
		<th class="<?php echo $view_pharmacygrn->PCGST->headerCellClass() ?>"><?php echo $view_pharmacygrn->PCGST->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacygrn->PCGST->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacygrn->PCGST->Name ?>" data-sort-order="<?php echo $view_pharmacygrn_preview->SortField == $view_pharmacygrn->PCGST->Name && $view_pharmacygrn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacygrn->PCGST->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacygrn_preview->SortField == $view_pharmacygrn->PCGST->Name) { ?><?php if ($view_pharmacygrn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacygrn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->PTax->Visible) { // PTax ?>
	<?php if ($view_pharmacygrn->SortUrl($view_pharmacygrn->PTax) == "") { ?>
		<th class="<?php echo $view_pharmacygrn->PTax->headerCellClass() ?>"><?php echo $view_pharmacygrn->PTax->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacygrn->PTax->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacygrn->PTax->Name ?>" data-sort-order="<?php echo $view_pharmacygrn_preview->SortField == $view_pharmacygrn->PTax->Name && $view_pharmacygrn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacygrn->PTax->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacygrn_preview->SortField == $view_pharmacygrn->PTax->Name) { ?><?php if ($view_pharmacygrn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacygrn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->ItemValue->Visible) { // ItemValue ?>
	<?php if ($view_pharmacygrn->SortUrl($view_pharmacygrn->ItemValue) == "") { ?>
		<th class="<?php echo $view_pharmacygrn->ItemValue->headerCellClass() ?>"><?php echo $view_pharmacygrn->ItemValue->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacygrn->ItemValue->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacygrn->ItemValue->Name ?>" data-sort-order="<?php echo $view_pharmacygrn_preview->SortField == $view_pharmacygrn->ItemValue->Name && $view_pharmacygrn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacygrn->ItemValue->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacygrn_preview->SortField == $view_pharmacygrn->ItemValue->Name) { ?><?php if ($view_pharmacygrn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacygrn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->SalTax->Visible) { // SalTax ?>
	<?php if ($view_pharmacygrn->SortUrl($view_pharmacygrn->SalTax) == "") { ?>
		<th class="<?php echo $view_pharmacygrn->SalTax->headerCellClass() ?>"><?php echo $view_pharmacygrn->SalTax->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacygrn->SalTax->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacygrn->SalTax->Name ?>" data-sort-order="<?php echo $view_pharmacygrn_preview->SortField == $view_pharmacygrn->SalTax->Name && $view_pharmacygrn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacygrn->SalTax->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacygrn_preview->SortField == $view_pharmacygrn->SalTax->Name) { ?><?php if ($view_pharmacygrn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacygrn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->PurRate->Visible) { // PurRate ?>
	<?php if ($view_pharmacygrn->SortUrl($view_pharmacygrn->PurRate) == "") { ?>
		<th class="<?php echo $view_pharmacygrn->PurRate->headerCellClass() ?>"><?php echo $view_pharmacygrn->PurRate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacygrn->PurRate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacygrn->PurRate->Name ?>" data-sort-order="<?php echo $view_pharmacygrn_preview->SortField == $view_pharmacygrn->PurRate->Name && $view_pharmacygrn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacygrn->PurRate->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacygrn_preview->SortField == $view_pharmacygrn->PurRate->Name) { ?><?php if ($view_pharmacygrn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacygrn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->SalRate->Visible) { // SalRate ?>
	<?php if ($view_pharmacygrn->SortUrl($view_pharmacygrn->SalRate) == "") { ?>
		<th class="<?php echo $view_pharmacygrn->SalRate->headerCellClass() ?>"><?php echo $view_pharmacygrn->SalRate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacygrn->SalRate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacygrn->SalRate->Name ?>" data-sort-order="<?php echo $view_pharmacygrn_preview->SortField == $view_pharmacygrn->SalRate->Name && $view_pharmacygrn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacygrn->SalRate->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacygrn_preview->SortField == $view_pharmacygrn->SalRate->Name) { ?><?php if ($view_pharmacygrn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacygrn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->SSGST->Visible) { // SSGST ?>
	<?php if ($view_pharmacygrn->SortUrl($view_pharmacygrn->SSGST) == "") { ?>
		<th class="<?php echo $view_pharmacygrn->SSGST->headerCellClass() ?>"><?php echo $view_pharmacygrn->SSGST->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacygrn->SSGST->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacygrn->SSGST->Name ?>" data-sort-order="<?php echo $view_pharmacygrn_preview->SortField == $view_pharmacygrn->SSGST->Name && $view_pharmacygrn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacygrn->SSGST->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacygrn_preview->SortField == $view_pharmacygrn->SSGST->Name) { ?><?php if ($view_pharmacygrn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacygrn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->SCGST->Visible) { // SCGST ?>
	<?php if ($view_pharmacygrn->SortUrl($view_pharmacygrn->SCGST) == "") { ?>
		<th class="<?php echo $view_pharmacygrn->SCGST->headerCellClass() ?>"><?php echo $view_pharmacygrn->SCGST->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacygrn->SCGST->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacygrn->SCGST->Name ?>" data-sort-order="<?php echo $view_pharmacygrn_preview->SortField == $view_pharmacygrn->SCGST->Name && $view_pharmacygrn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacygrn->SCGST->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacygrn_preview->SortField == $view_pharmacygrn->SCGST->Name) { ?><?php if ($view_pharmacygrn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacygrn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->BRCODE->Visible) { // BRCODE ?>
	<?php if ($view_pharmacygrn->SortUrl($view_pharmacygrn->BRCODE) == "") { ?>
		<th class="<?php echo $view_pharmacygrn->BRCODE->headerCellClass() ?>"><?php echo $view_pharmacygrn->BRCODE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacygrn->BRCODE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacygrn->BRCODE->Name ?>" data-sort-order="<?php echo $view_pharmacygrn_preview->SortField == $view_pharmacygrn->BRCODE->Name && $view_pharmacygrn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacygrn->BRCODE->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacygrn_preview->SortField == $view_pharmacygrn->BRCODE->Name) { ?><?php if ($view_pharmacygrn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacygrn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->HospID->Visible) { // HospID ?>
	<?php if ($view_pharmacygrn->SortUrl($view_pharmacygrn->HospID) == "") { ?>
		<th class="<?php echo $view_pharmacygrn->HospID->headerCellClass() ?>"><?php echo $view_pharmacygrn->HospID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacygrn->HospID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacygrn->HospID->Name ?>" data-sort-order="<?php echo $view_pharmacygrn_preview->SortField == $view_pharmacygrn->HospID->Name && $view_pharmacygrn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacygrn->HospID->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacygrn_preview->SortField == $view_pharmacygrn->HospID->Name) { ?><?php if ($view_pharmacygrn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacygrn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->grncreatedby->Visible) { // grncreatedby ?>
	<?php if ($view_pharmacygrn->SortUrl($view_pharmacygrn->grncreatedby) == "") { ?>
		<th class="<?php echo $view_pharmacygrn->grncreatedby->headerCellClass() ?>"><?php echo $view_pharmacygrn->grncreatedby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacygrn->grncreatedby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacygrn->grncreatedby->Name ?>" data-sort-order="<?php echo $view_pharmacygrn_preview->SortField == $view_pharmacygrn->grncreatedby->Name && $view_pharmacygrn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacygrn->grncreatedby->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacygrn_preview->SortField == $view_pharmacygrn->grncreatedby->Name) { ?><?php if ($view_pharmacygrn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacygrn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
	<?php if ($view_pharmacygrn->SortUrl($view_pharmacygrn->grncreatedDateTime) == "") { ?>
		<th class="<?php echo $view_pharmacygrn->grncreatedDateTime->headerCellClass() ?>"><?php echo $view_pharmacygrn->grncreatedDateTime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacygrn->grncreatedDateTime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacygrn->grncreatedDateTime->Name ?>" data-sort-order="<?php echo $view_pharmacygrn_preview->SortField == $view_pharmacygrn->grncreatedDateTime->Name && $view_pharmacygrn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacygrn->grncreatedDateTime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacygrn_preview->SortField == $view_pharmacygrn->grncreatedDateTime->Name) { ?><?php if ($view_pharmacygrn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacygrn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->grnModifiedby->Visible) { // grnModifiedby ?>
	<?php if ($view_pharmacygrn->SortUrl($view_pharmacygrn->grnModifiedby) == "") { ?>
		<th class="<?php echo $view_pharmacygrn->grnModifiedby->headerCellClass() ?>"><?php echo $view_pharmacygrn->grnModifiedby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacygrn->grnModifiedby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacygrn->grnModifiedby->Name ?>" data-sort-order="<?php echo $view_pharmacygrn_preview->SortField == $view_pharmacygrn->grnModifiedby->Name && $view_pharmacygrn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacygrn->grnModifiedby->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacygrn_preview->SortField == $view_pharmacygrn->grnModifiedby->Name) { ?><?php if ($view_pharmacygrn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacygrn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
	<?php if ($view_pharmacygrn->SortUrl($view_pharmacygrn->grnModifiedDateTime) == "") { ?>
		<th class="<?php echo $view_pharmacygrn->grnModifiedDateTime->headerCellClass() ?>"><?php echo $view_pharmacygrn->grnModifiedDateTime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacygrn->grnModifiedDateTime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacygrn->grnModifiedDateTime->Name ?>" data-sort-order="<?php echo $view_pharmacygrn_preview->SortField == $view_pharmacygrn->grnModifiedDateTime->Name && $view_pharmacygrn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacygrn->grnModifiedDateTime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacygrn_preview->SortField == $view_pharmacygrn->grnModifiedDateTime->Name) { ?><?php if ($view_pharmacygrn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacygrn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->BillDate->Visible) { // BillDate ?>
	<?php if ($view_pharmacygrn->SortUrl($view_pharmacygrn->BillDate) == "") { ?>
		<th class="<?php echo $view_pharmacygrn->BillDate->headerCellClass() ?>"><?php echo $view_pharmacygrn->BillDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacygrn->BillDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacygrn->BillDate->Name ?>" data-sort-order="<?php echo $view_pharmacygrn_preview->SortField == $view_pharmacygrn->BillDate->Name && $view_pharmacygrn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacygrn->BillDate->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacygrn_preview->SortField == $view_pharmacygrn->BillDate->Name) { ?><?php if ($view_pharmacygrn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacygrn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->grndate->Visible) { // grndate ?>
	<?php if ($view_pharmacygrn->SortUrl($view_pharmacygrn->grndate) == "") { ?>
		<th class="<?php echo $view_pharmacygrn->grndate->headerCellClass() ?>"><?php echo $view_pharmacygrn->grndate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacygrn->grndate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacygrn->grndate->Name ?>" data-sort-order="<?php echo $view_pharmacygrn_preview->SortField == $view_pharmacygrn->grndate->Name && $view_pharmacygrn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacygrn->grndate->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacygrn_preview->SortField == $view_pharmacygrn->grndate->Name) { ?><?php if ($view_pharmacygrn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacygrn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->grndatetime->Visible) { // grndatetime ?>
	<?php if ($view_pharmacygrn->SortUrl($view_pharmacygrn->grndatetime) == "") { ?>
		<th class="<?php echo $view_pharmacygrn->grndatetime->headerCellClass() ?>"><?php echo $view_pharmacygrn->grndatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacygrn->grndatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacygrn->grndatetime->Name ?>" data-sort-order="<?php echo $view_pharmacygrn_preview->SortField == $view_pharmacygrn->grndatetime->Name && $view_pharmacygrn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacygrn->grndatetime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacygrn_preview->SortField == $view_pharmacygrn->grndatetime->Name) { ?><?php if ($view_pharmacygrn_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacygrn_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_pharmacygrn_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$view_pharmacygrn_preview->RecCount = 0;
$view_pharmacygrn_preview->RowCnt = 0;
while ($view_pharmacygrn_preview->Recordset && !$view_pharmacygrn_preview->Recordset->EOF) {

	// Init row class and style
	$view_pharmacygrn_preview->RecCount++;
	$view_pharmacygrn_preview->RowCnt++;
	$view_pharmacygrn_preview->CssStyle = "";
	$view_pharmacygrn_preview->loadListRowValues($view_pharmacygrn_preview->Recordset);
	$view_pharmacygrn_preview->aggregateListRowValues(); // Aggregate row values

	// Render row
	$view_pharmacygrn_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$view_pharmacygrn_preview->resetAttributes();
	$view_pharmacygrn_preview->renderListRow();

	// Render list options
	$view_pharmacygrn_preview->renderListOptions();
?>
	<tr<?php echo $view_pharmacygrn_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_pharmacygrn_preview->ListOptions->render("body", "left", $view_pharmacygrn_preview->RowCnt);
?>
<?php if ($view_pharmacygrn->PRC->Visible) { // PRC ?>
		<!-- PRC -->
		<td<?php echo $view_pharmacygrn->PRC->cellAttributes() ?>>
<span<?php echo $view_pharmacygrn->PRC->viewAttributes() ?>>
<?php echo $view_pharmacygrn->PRC->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacygrn->PrName->Visible) { // PrName ?>
		<!-- PrName -->
		<td<?php echo $view_pharmacygrn->PrName->cellAttributes() ?>>
<span<?php echo $view_pharmacygrn->PrName->viewAttributes() ?>>
<?php echo $view_pharmacygrn->PrName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacygrn->GrnQuantity->Visible) { // GrnQuantity ?>
		<!-- GrnQuantity -->
		<td<?php echo $view_pharmacygrn->GrnQuantity->cellAttributes() ?>>
<span<?php echo $view_pharmacygrn->GrnQuantity->viewAttributes() ?>>
<?php echo $view_pharmacygrn->GrnQuantity->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacygrn->Quantity->Visible) { // Quantity ?>
		<!-- Quantity -->
		<td<?php echo $view_pharmacygrn->Quantity->cellAttributes() ?>>
<span<?php echo $view_pharmacygrn->Quantity->viewAttributes() ?>>
<?php echo $view_pharmacygrn->Quantity->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacygrn->FreeQty->Visible) { // FreeQty ?>
		<!-- FreeQty -->
		<td<?php echo $view_pharmacygrn->FreeQty->cellAttributes() ?>>
<span<?php echo $view_pharmacygrn->FreeQty->viewAttributes() ?>>
<?php echo $view_pharmacygrn->FreeQty->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacygrn->FreeQtyyy->Visible) { // FreeQtyyy ?>
		<!-- FreeQtyyy -->
		<td<?php echo $view_pharmacygrn->FreeQtyyy->cellAttributes() ?>>
<span<?php echo $view_pharmacygrn->FreeQtyyy->viewAttributes() ?>>
<?php echo $view_pharmacygrn->FreeQtyyy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacygrn->BatchNo->Visible) { // BatchNo ?>
		<!-- BatchNo -->
		<td<?php echo $view_pharmacygrn->BatchNo->cellAttributes() ?>>
<span<?php echo $view_pharmacygrn->BatchNo->viewAttributes() ?>>
<?php echo $view_pharmacygrn->BatchNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacygrn->ExpDate->Visible) { // ExpDate ?>
		<!-- ExpDate -->
		<td<?php echo $view_pharmacygrn->ExpDate->cellAttributes() ?>>
<span<?php echo $view_pharmacygrn->ExpDate->viewAttributes() ?>>
<?php echo $view_pharmacygrn->ExpDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacygrn->HSN->Visible) { // HSN ?>
		<!-- HSN -->
		<td<?php echo $view_pharmacygrn->HSN->cellAttributes() ?>>
<span<?php echo $view_pharmacygrn->HSN->viewAttributes() ?>>
<?php echo $view_pharmacygrn->HSN->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacygrn->MFRCODE->Visible) { // MFRCODE ?>
		<!-- MFRCODE -->
		<td<?php echo $view_pharmacygrn->MFRCODE->cellAttributes() ?>>
<span<?php echo $view_pharmacygrn->MFRCODE->viewAttributes() ?>>
<?php echo $view_pharmacygrn->MFRCODE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacygrn->PUnit->Visible) { // PUnit ?>
		<!-- PUnit -->
		<td<?php echo $view_pharmacygrn->PUnit->cellAttributes() ?>>
<span<?php echo $view_pharmacygrn->PUnit->viewAttributes() ?>>
<?php echo $view_pharmacygrn->PUnit->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacygrn->SUnit->Visible) { // SUnit ?>
		<!-- SUnit -->
		<td<?php echo $view_pharmacygrn->SUnit->cellAttributes() ?>>
<span<?php echo $view_pharmacygrn->SUnit->viewAttributes() ?>>
<?php echo $view_pharmacygrn->SUnit->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacygrn->MRP->Visible) { // MRP ?>
		<!-- MRP -->
		<td<?php echo $view_pharmacygrn->MRP->cellAttributes() ?>>
<span<?php echo $view_pharmacygrn->MRP->viewAttributes() ?>>
<?php echo $view_pharmacygrn->MRP->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacygrn->PurValue->Visible) { // PurValue ?>
		<!-- PurValue -->
		<td<?php echo $view_pharmacygrn->PurValue->cellAttributes() ?>>
<span<?php echo $view_pharmacygrn->PurValue->viewAttributes() ?>>
<?php echo $view_pharmacygrn->PurValue->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacygrn->Disc->Visible) { // Disc ?>
		<!-- Disc -->
		<td<?php echo $view_pharmacygrn->Disc->cellAttributes() ?>>
<span<?php echo $view_pharmacygrn->Disc->viewAttributes() ?>>
<?php echo $view_pharmacygrn->Disc->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacygrn->PSGST->Visible) { // PSGST ?>
		<!-- PSGST -->
		<td<?php echo $view_pharmacygrn->PSGST->cellAttributes() ?>>
<span<?php echo $view_pharmacygrn->PSGST->viewAttributes() ?>>
<?php echo $view_pharmacygrn->PSGST->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacygrn->PCGST->Visible) { // PCGST ?>
		<!-- PCGST -->
		<td<?php echo $view_pharmacygrn->PCGST->cellAttributes() ?>>
<span<?php echo $view_pharmacygrn->PCGST->viewAttributes() ?>>
<?php echo $view_pharmacygrn->PCGST->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacygrn->PTax->Visible) { // PTax ?>
		<!-- PTax -->
		<td<?php echo $view_pharmacygrn->PTax->cellAttributes() ?>>
<span<?php echo $view_pharmacygrn->PTax->viewAttributes() ?>>
<?php echo $view_pharmacygrn->PTax->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacygrn->ItemValue->Visible) { // ItemValue ?>
		<!-- ItemValue -->
		<td<?php echo $view_pharmacygrn->ItemValue->cellAttributes() ?>>
<span<?php echo $view_pharmacygrn->ItemValue->viewAttributes() ?>>
<?php echo $view_pharmacygrn->ItemValue->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacygrn->SalTax->Visible) { // SalTax ?>
		<!-- SalTax -->
		<td<?php echo $view_pharmacygrn->SalTax->cellAttributes() ?>>
<span<?php echo $view_pharmacygrn->SalTax->viewAttributes() ?>>
<?php echo $view_pharmacygrn->SalTax->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacygrn->PurRate->Visible) { // PurRate ?>
		<!-- PurRate -->
		<td<?php echo $view_pharmacygrn->PurRate->cellAttributes() ?>>
<span<?php echo $view_pharmacygrn->PurRate->viewAttributes() ?>>
<?php echo $view_pharmacygrn->PurRate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacygrn->SalRate->Visible) { // SalRate ?>
		<!-- SalRate -->
		<td<?php echo $view_pharmacygrn->SalRate->cellAttributes() ?>>
<span<?php echo $view_pharmacygrn->SalRate->viewAttributes() ?>>
<?php echo $view_pharmacygrn->SalRate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacygrn->SSGST->Visible) { // SSGST ?>
		<!-- SSGST -->
		<td<?php echo $view_pharmacygrn->SSGST->cellAttributes() ?>>
<span<?php echo $view_pharmacygrn->SSGST->viewAttributes() ?>>
<?php echo $view_pharmacygrn->SSGST->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacygrn->SCGST->Visible) { // SCGST ?>
		<!-- SCGST -->
		<td<?php echo $view_pharmacygrn->SCGST->cellAttributes() ?>>
<span<?php echo $view_pharmacygrn->SCGST->viewAttributes() ?>>
<?php echo $view_pharmacygrn->SCGST->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacygrn->BRCODE->Visible) { // BRCODE ?>
		<!-- BRCODE -->
		<td<?php echo $view_pharmacygrn->BRCODE->cellAttributes() ?>>
<span<?php echo $view_pharmacygrn->BRCODE->viewAttributes() ?>>
<?php echo $view_pharmacygrn->BRCODE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacygrn->HospID->Visible) { // HospID ?>
		<!-- HospID -->
		<td<?php echo $view_pharmacygrn->HospID->cellAttributes() ?>>
<span<?php echo $view_pharmacygrn->HospID->viewAttributes() ?>>
<?php echo $view_pharmacygrn->HospID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacygrn->grncreatedby->Visible) { // grncreatedby ?>
		<!-- grncreatedby -->
		<td<?php echo $view_pharmacygrn->grncreatedby->cellAttributes() ?>>
<span<?php echo $view_pharmacygrn->grncreatedby->viewAttributes() ?>>
<?php echo $view_pharmacygrn->grncreatedby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacygrn->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
		<!-- grncreatedDateTime -->
		<td<?php echo $view_pharmacygrn->grncreatedDateTime->cellAttributes() ?>>
<span<?php echo $view_pharmacygrn->grncreatedDateTime->viewAttributes() ?>>
<?php echo $view_pharmacygrn->grncreatedDateTime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacygrn->grnModifiedby->Visible) { // grnModifiedby ?>
		<!-- grnModifiedby -->
		<td<?php echo $view_pharmacygrn->grnModifiedby->cellAttributes() ?>>
<span<?php echo $view_pharmacygrn->grnModifiedby->viewAttributes() ?>>
<?php echo $view_pharmacygrn->grnModifiedby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacygrn->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
		<!-- grnModifiedDateTime -->
		<td<?php echo $view_pharmacygrn->grnModifiedDateTime->cellAttributes() ?>>
<span<?php echo $view_pharmacygrn->grnModifiedDateTime->viewAttributes() ?>>
<?php echo $view_pharmacygrn->grnModifiedDateTime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacygrn->BillDate->Visible) { // BillDate ?>
		<!-- BillDate -->
		<td<?php echo $view_pharmacygrn->BillDate->cellAttributes() ?>>
<span<?php echo $view_pharmacygrn->BillDate->viewAttributes() ?>>
<?php echo $view_pharmacygrn->BillDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacygrn->grndate->Visible) { // grndate ?>
		<!-- grndate -->
		<td<?php echo $view_pharmacygrn->grndate->cellAttributes() ?>>
<span<?php echo $view_pharmacygrn->grndate->viewAttributes() ?>>
<?php echo $view_pharmacygrn->grndate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacygrn->grndatetime->Visible) { // grndatetime ?>
		<!-- grndatetime -->
		<td<?php echo $view_pharmacygrn->grndatetime->cellAttributes() ?>>
<span<?php echo $view_pharmacygrn->grndatetime->viewAttributes() ?>>
<?php echo $view_pharmacygrn->grndatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$view_pharmacygrn_preview->ListOptions->render("body", "right", $view_pharmacygrn_preview->RowCnt);
?>
	</tr>
<?php
	$view_pharmacygrn_preview->Recordset->MoveNext();
}
?>
	</tbody>
<?php

	// Render aggregate row
	$view_pharmacygrn_preview->aggregateListRow(); // Prepare aggregate row

	// Render list options
	$view_pharmacygrn_preview->renderListOptions();
?>
	<tfoot><!-- Table footer -->
	<tr class="ew-table-footer">
<?php

// Render list options (footer, left)
$view_pharmacygrn_preview->ListOptions->render("footer", "left");
?>
<?php if ($view_pharmacygrn->PRC->Visible) { // PRC ?>
		<!-- PRC -->
		<td class="<?php echo $view_pharmacygrn->PRC->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_pharmacygrn->PrName->Visible) { // PrName ?>
		<!-- PrName -->
		<td class="<?php echo $view_pharmacygrn->PrName->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_pharmacygrn->GrnQuantity->Visible) { // GrnQuantity ?>
		<!-- GrnQuantity -->
		<td class="<?php echo $view_pharmacygrn->GrnQuantity->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_pharmacygrn->Quantity->Visible) { // Quantity ?>
		<!-- Quantity -->
		<td class="<?php echo $view_pharmacygrn->Quantity->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_pharmacygrn->FreeQty->Visible) { // FreeQty ?>
		<!-- FreeQty -->
		<td class="<?php echo $view_pharmacygrn->FreeQty->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_pharmacygrn->FreeQtyyy->Visible) { // FreeQtyyy ?>
		<!-- FreeQtyyy -->
		<td class="<?php echo $view_pharmacygrn->FreeQtyyy->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_pharmacygrn->BatchNo->Visible) { // BatchNo ?>
		<!-- BatchNo -->
		<td class="<?php echo $view_pharmacygrn->BatchNo->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_pharmacygrn->ExpDate->Visible) { // ExpDate ?>
		<!-- ExpDate -->
		<td class="<?php echo $view_pharmacygrn->ExpDate->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_pharmacygrn->HSN->Visible) { // HSN ?>
		<!-- HSN -->
		<td class="<?php echo $view_pharmacygrn->HSN->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_pharmacygrn->MFRCODE->Visible) { // MFRCODE ?>
		<!-- MFRCODE -->
		<td class="<?php echo $view_pharmacygrn->MFRCODE->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_pharmacygrn->PUnit->Visible) { // PUnit ?>
		<!-- PUnit -->
		<td class="<?php echo $view_pharmacygrn->PUnit->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_pharmacygrn->SUnit->Visible) { // SUnit ?>
		<!-- SUnit -->
		<td class="<?php echo $view_pharmacygrn->SUnit->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_pharmacygrn->MRP->Visible) { // MRP ?>
		<!-- MRP -->
		<td class="<?php echo $view_pharmacygrn->MRP->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_pharmacygrn->PurValue->Visible) { // PurValue ?>
		<!-- PurValue -->
		<td class="<?php echo $view_pharmacygrn->PurValue->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_pharmacygrn->Disc->Visible) { // Disc ?>
		<!-- Disc -->
		<td class="<?php echo $view_pharmacygrn->Disc->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_pharmacygrn->PSGST->Visible) { // PSGST ?>
		<!-- PSGST -->
		<td class="<?php echo $view_pharmacygrn->PSGST->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_pharmacygrn->PCGST->Visible) { // PCGST ?>
		<!-- PCGST -->
		<td class="<?php echo $view_pharmacygrn->PCGST->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_pharmacygrn->PTax->Visible) { // PTax ?>
		<!-- PTax -->
		<td class="<?php echo $view_pharmacygrn->PTax->footerCellClass() ?>">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_pharmacygrn->PTax->ViewValue ?></span>
		</td>
<?php } ?>
<?php if ($view_pharmacygrn->ItemValue->Visible) { // ItemValue ?>
		<!-- ItemValue -->
		<td class="<?php echo $view_pharmacygrn->ItemValue->footerCellClass() ?>">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_pharmacygrn->ItemValue->ViewValue ?></span>
		</td>
<?php } ?>
<?php if ($view_pharmacygrn->SalTax->Visible) { // SalTax ?>
		<!-- SalTax -->
		<td class="<?php echo $view_pharmacygrn->SalTax->footerCellClass() ?>">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_pharmacygrn->SalTax->ViewValue ?></span>
		</td>
<?php } ?>
<?php if ($view_pharmacygrn->PurRate->Visible) { // PurRate ?>
		<!-- PurRate -->
		<td class="<?php echo $view_pharmacygrn->PurRate->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_pharmacygrn->SalRate->Visible) { // SalRate ?>
		<!-- SalRate -->
		<td class="<?php echo $view_pharmacygrn->SalRate->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_pharmacygrn->SSGST->Visible) { // SSGST ?>
		<!-- SSGST -->
		<td class="<?php echo $view_pharmacygrn->SSGST->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_pharmacygrn->SCGST->Visible) { // SCGST ?>
		<!-- SCGST -->
		<td class="<?php echo $view_pharmacygrn->SCGST->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_pharmacygrn->BRCODE->Visible) { // BRCODE ?>
		<!-- BRCODE -->
		<td class="<?php echo $view_pharmacygrn->BRCODE->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_pharmacygrn->HospID->Visible) { // HospID ?>
		<!-- HospID -->
		<td class="<?php echo $view_pharmacygrn->HospID->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_pharmacygrn->grncreatedby->Visible) { // grncreatedby ?>
		<!-- grncreatedby -->
		<td class="<?php echo $view_pharmacygrn->grncreatedby->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_pharmacygrn->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
		<!-- grncreatedDateTime -->
		<td class="<?php echo $view_pharmacygrn->grncreatedDateTime->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_pharmacygrn->grnModifiedby->Visible) { // grnModifiedby ?>
		<!-- grnModifiedby -->
		<td class="<?php echo $view_pharmacygrn->grnModifiedby->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_pharmacygrn->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
		<!-- grnModifiedDateTime -->
		<td class="<?php echo $view_pharmacygrn->grnModifiedDateTime->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_pharmacygrn->BillDate->Visible) { // BillDate ?>
		<!-- BillDate -->
		<td class="<?php echo $view_pharmacygrn->BillDate->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_pharmacygrn->grndate->Visible) { // grndate ?>
		<!-- grndate -->
		<td class="<?php echo $view_pharmacygrn->grndate->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_pharmacygrn->grndatetime->Visible) { // grndatetime ?>
		<!-- grndatetime -->
		<td class="<?php echo $view_pharmacygrn->grndatetime->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php

// Render list options (footer, right)
$view_pharmacygrn_preview->ListOptions->render("footer", "right");
?>
	</tr>
	</tfoot>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($view_pharmacygrn_preview->TotalRecs > 0) { ?>
<?php if (!isset($view_pharmacygrn_preview->Pager)) $view_pharmacygrn_preview->Pager = new PrevNextPager($view_pharmacygrn_preview->StartRec, $view_pharmacygrn_preview->DisplayRecs, $view_pharmacygrn_preview->TotalRecs) ?>
<?php if ($view_pharmacygrn_preview->Pager->RecordCount > 0 && $view_pharmacygrn_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($view_pharmacygrn_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $view_pharmacygrn_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($view_pharmacygrn_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $view_pharmacygrn_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($view_pharmacygrn_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $view_pharmacygrn_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($view_pharmacygrn_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $view_pharmacygrn_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_pharmacygrn_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_pharmacygrn_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_pharmacygrn_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($view_pharmacygrn_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$view_pharmacygrn_preview->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php
if ($view_pharmacygrn_preview->Recordset)
	$view_pharmacygrn_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$view_pharmacygrn_preview->terminate();
?>
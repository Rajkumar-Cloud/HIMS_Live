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
<?php if ($view_pharmacygrn_preview->TotalRecords > 0) { ?>
<div class="card ew-grid view_pharmacygrn"><!-- .card -->
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel ew-preview-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$view_pharmacygrn_preview->renderListOptions();

// Render list options (header, left)
$view_pharmacygrn_preview->ListOptions->render("header", "left");
?>
<?php if ($view_pharmacygrn_preview->PRC->Visible) { // PRC ?>
	<?php if ($view_pharmacygrn->SortUrl($view_pharmacygrn_preview->PRC) == "") { ?>
		<th class="<?php echo $view_pharmacygrn_preview->PRC->headerCellClass() ?>"><?php echo $view_pharmacygrn_preview->PRC->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacygrn_preview->PRC->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacygrn_preview->PRC->Name) ?>" data-sort-order="<?php echo $view_pharmacygrn_preview->SortField == $view_pharmacygrn_preview->PRC->Name && $view_pharmacygrn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_preview->PRC->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_preview->SortField == $view_pharmacygrn_preview->PRC->Name) { ?><?php if ($view_pharmacygrn_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_preview->PrName->Visible) { // PrName ?>
	<?php if ($view_pharmacygrn->SortUrl($view_pharmacygrn_preview->PrName) == "") { ?>
		<th class="<?php echo $view_pharmacygrn_preview->PrName->headerCellClass() ?>"><?php echo $view_pharmacygrn_preview->PrName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacygrn_preview->PrName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacygrn_preview->PrName->Name) ?>" data-sort-order="<?php echo $view_pharmacygrn_preview->SortField == $view_pharmacygrn_preview->PrName->Name && $view_pharmacygrn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_preview->PrName->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_preview->SortField == $view_pharmacygrn_preview->PrName->Name) { ?><?php if ($view_pharmacygrn_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_preview->GrnQuantity->Visible) { // GrnQuantity ?>
	<?php if ($view_pharmacygrn->SortUrl($view_pharmacygrn_preview->GrnQuantity) == "") { ?>
		<th class="<?php echo $view_pharmacygrn_preview->GrnQuantity->headerCellClass() ?>"><?php echo $view_pharmacygrn_preview->GrnQuantity->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacygrn_preview->GrnQuantity->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacygrn_preview->GrnQuantity->Name) ?>" data-sort-order="<?php echo $view_pharmacygrn_preview->SortField == $view_pharmacygrn_preview->GrnQuantity->Name && $view_pharmacygrn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_preview->GrnQuantity->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_preview->SortField == $view_pharmacygrn_preview->GrnQuantity->Name) { ?><?php if ($view_pharmacygrn_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_preview->Quantity->Visible) { // Quantity ?>
	<?php if ($view_pharmacygrn->SortUrl($view_pharmacygrn_preview->Quantity) == "") { ?>
		<th class="<?php echo $view_pharmacygrn_preview->Quantity->headerCellClass() ?>"><?php echo $view_pharmacygrn_preview->Quantity->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacygrn_preview->Quantity->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacygrn_preview->Quantity->Name) ?>" data-sort-order="<?php echo $view_pharmacygrn_preview->SortField == $view_pharmacygrn_preview->Quantity->Name && $view_pharmacygrn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_preview->Quantity->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_preview->SortField == $view_pharmacygrn_preview->Quantity->Name) { ?><?php if ($view_pharmacygrn_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_preview->FreeQty->Visible) { // FreeQty ?>
	<?php if ($view_pharmacygrn->SortUrl($view_pharmacygrn_preview->FreeQty) == "") { ?>
		<th class="<?php echo $view_pharmacygrn_preview->FreeQty->headerCellClass() ?>"><?php echo $view_pharmacygrn_preview->FreeQty->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacygrn_preview->FreeQty->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacygrn_preview->FreeQty->Name) ?>" data-sort-order="<?php echo $view_pharmacygrn_preview->SortField == $view_pharmacygrn_preview->FreeQty->Name && $view_pharmacygrn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_preview->FreeQty->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_preview->SortField == $view_pharmacygrn_preview->FreeQty->Name) { ?><?php if ($view_pharmacygrn_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_preview->BatchNo->Visible) { // BatchNo ?>
	<?php if ($view_pharmacygrn->SortUrl($view_pharmacygrn_preview->BatchNo) == "") { ?>
		<th class="<?php echo $view_pharmacygrn_preview->BatchNo->headerCellClass() ?>"><?php echo $view_pharmacygrn_preview->BatchNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacygrn_preview->BatchNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacygrn_preview->BatchNo->Name) ?>" data-sort-order="<?php echo $view_pharmacygrn_preview->SortField == $view_pharmacygrn_preview->BatchNo->Name && $view_pharmacygrn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_preview->BatchNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_preview->SortField == $view_pharmacygrn_preview->BatchNo->Name) { ?><?php if ($view_pharmacygrn_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_preview->ExpDate->Visible) { // ExpDate ?>
	<?php if ($view_pharmacygrn->SortUrl($view_pharmacygrn_preview->ExpDate) == "") { ?>
		<th class="<?php echo $view_pharmacygrn_preview->ExpDate->headerCellClass() ?>"><?php echo $view_pharmacygrn_preview->ExpDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacygrn_preview->ExpDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacygrn_preview->ExpDate->Name) ?>" data-sort-order="<?php echo $view_pharmacygrn_preview->SortField == $view_pharmacygrn_preview->ExpDate->Name && $view_pharmacygrn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_preview->ExpDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_preview->SortField == $view_pharmacygrn_preview->ExpDate->Name) { ?><?php if ($view_pharmacygrn_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_preview->HSN->Visible) { // HSN ?>
	<?php if ($view_pharmacygrn->SortUrl($view_pharmacygrn_preview->HSN) == "") { ?>
		<th class="<?php echo $view_pharmacygrn_preview->HSN->headerCellClass() ?>"><?php echo $view_pharmacygrn_preview->HSN->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacygrn_preview->HSN->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacygrn_preview->HSN->Name) ?>" data-sort-order="<?php echo $view_pharmacygrn_preview->SortField == $view_pharmacygrn_preview->HSN->Name && $view_pharmacygrn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_preview->HSN->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_preview->SortField == $view_pharmacygrn_preview->HSN->Name) { ?><?php if ($view_pharmacygrn_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_preview->MFRCODE->Visible) { // MFRCODE ?>
	<?php if ($view_pharmacygrn->SortUrl($view_pharmacygrn_preview->MFRCODE) == "") { ?>
		<th class="<?php echo $view_pharmacygrn_preview->MFRCODE->headerCellClass() ?>"><?php echo $view_pharmacygrn_preview->MFRCODE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacygrn_preview->MFRCODE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacygrn_preview->MFRCODE->Name) ?>" data-sort-order="<?php echo $view_pharmacygrn_preview->SortField == $view_pharmacygrn_preview->MFRCODE->Name && $view_pharmacygrn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_preview->MFRCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_preview->SortField == $view_pharmacygrn_preview->MFRCODE->Name) { ?><?php if ($view_pharmacygrn_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_preview->PUnit->Visible) { // PUnit ?>
	<?php if ($view_pharmacygrn->SortUrl($view_pharmacygrn_preview->PUnit) == "") { ?>
		<th class="<?php echo $view_pharmacygrn_preview->PUnit->headerCellClass() ?>"><?php echo $view_pharmacygrn_preview->PUnit->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacygrn_preview->PUnit->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacygrn_preview->PUnit->Name) ?>" data-sort-order="<?php echo $view_pharmacygrn_preview->SortField == $view_pharmacygrn_preview->PUnit->Name && $view_pharmacygrn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_preview->PUnit->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_preview->SortField == $view_pharmacygrn_preview->PUnit->Name) { ?><?php if ($view_pharmacygrn_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_preview->SUnit->Visible) { // SUnit ?>
	<?php if ($view_pharmacygrn->SortUrl($view_pharmacygrn_preview->SUnit) == "") { ?>
		<th class="<?php echo $view_pharmacygrn_preview->SUnit->headerCellClass() ?>"><?php echo $view_pharmacygrn_preview->SUnit->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacygrn_preview->SUnit->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacygrn_preview->SUnit->Name) ?>" data-sort-order="<?php echo $view_pharmacygrn_preview->SortField == $view_pharmacygrn_preview->SUnit->Name && $view_pharmacygrn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_preview->SUnit->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_preview->SortField == $view_pharmacygrn_preview->SUnit->Name) { ?><?php if ($view_pharmacygrn_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_preview->MRP->Visible) { // MRP ?>
	<?php if ($view_pharmacygrn->SortUrl($view_pharmacygrn_preview->MRP) == "") { ?>
		<th class="<?php echo $view_pharmacygrn_preview->MRP->headerCellClass() ?>"><?php echo $view_pharmacygrn_preview->MRP->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacygrn_preview->MRP->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacygrn_preview->MRP->Name) ?>" data-sort-order="<?php echo $view_pharmacygrn_preview->SortField == $view_pharmacygrn_preview->MRP->Name && $view_pharmacygrn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_preview->MRP->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_preview->SortField == $view_pharmacygrn_preview->MRP->Name) { ?><?php if ($view_pharmacygrn_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_preview->PurValue->Visible) { // PurValue ?>
	<?php if ($view_pharmacygrn->SortUrl($view_pharmacygrn_preview->PurValue) == "") { ?>
		<th class="<?php echo $view_pharmacygrn_preview->PurValue->headerCellClass() ?>"><?php echo $view_pharmacygrn_preview->PurValue->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacygrn_preview->PurValue->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacygrn_preview->PurValue->Name) ?>" data-sort-order="<?php echo $view_pharmacygrn_preview->SortField == $view_pharmacygrn_preview->PurValue->Name && $view_pharmacygrn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_preview->PurValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_preview->SortField == $view_pharmacygrn_preview->PurValue->Name) { ?><?php if ($view_pharmacygrn_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_preview->Disc->Visible) { // Disc ?>
	<?php if ($view_pharmacygrn->SortUrl($view_pharmacygrn_preview->Disc) == "") { ?>
		<th class="<?php echo $view_pharmacygrn_preview->Disc->headerCellClass() ?>"><?php echo $view_pharmacygrn_preview->Disc->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacygrn_preview->Disc->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacygrn_preview->Disc->Name) ?>" data-sort-order="<?php echo $view_pharmacygrn_preview->SortField == $view_pharmacygrn_preview->Disc->Name && $view_pharmacygrn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_preview->Disc->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_preview->SortField == $view_pharmacygrn_preview->Disc->Name) { ?><?php if ($view_pharmacygrn_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_preview->PSGST->Visible) { // PSGST ?>
	<?php if ($view_pharmacygrn->SortUrl($view_pharmacygrn_preview->PSGST) == "") { ?>
		<th class="<?php echo $view_pharmacygrn_preview->PSGST->headerCellClass() ?>"><?php echo $view_pharmacygrn_preview->PSGST->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacygrn_preview->PSGST->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacygrn_preview->PSGST->Name) ?>" data-sort-order="<?php echo $view_pharmacygrn_preview->SortField == $view_pharmacygrn_preview->PSGST->Name && $view_pharmacygrn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_preview->PSGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_preview->SortField == $view_pharmacygrn_preview->PSGST->Name) { ?><?php if ($view_pharmacygrn_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_preview->PCGST->Visible) { // PCGST ?>
	<?php if ($view_pharmacygrn->SortUrl($view_pharmacygrn_preview->PCGST) == "") { ?>
		<th class="<?php echo $view_pharmacygrn_preview->PCGST->headerCellClass() ?>"><?php echo $view_pharmacygrn_preview->PCGST->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacygrn_preview->PCGST->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacygrn_preview->PCGST->Name) ?>" data-sort-order="<?php echo $view_pharmacygrn_preview->SortField == $view_pharmacygrn_preview->PCGST->Name && $view_pharmacygrn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_preview->PCGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_preview->SortField == $view_pharmacygrn_preview->PCGST->Name) { ?><?php if ($view_pharmacygrn_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_preview->PTax->Visible) { // PTax ?>
	<?php if ($view_pharmacygrn->SortUrl($view_pharmacygrn_preview->PTax) == "") { ?>
		<th class="<?php echo $view_pharmacygrn_preview->PTax->headerCellClass() ?>"><?php echo $view_pharmacygrn_preview->PTax->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacygrn_preview->PTax->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacygrn_preview->PTax->Name) ?>" data-sort-order="<?php echo $view_pharmacygrn_preview->SortField == $view_pharmacygrn_preview->PTax->Name && $view_pharmacygrn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_preview->PTax->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_preview->SortField == $view_pharmacygrn_preview->PTax->Name) { ?><?php if ($view_pharmacygrn_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_preview->ItemValue->Visible) { // ItemValue ?>
	<?php if ($view_pharmacygrn->SortUrl($view_pharmacygrn_preview->ItemValue) == "") { ?>
		<th class="<?php echo $view_pharmacygrn_preview->ItemValue->headerCellClass() ?>"><?php echo $view_pharmacygrn_preview->ItemValue->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacygrn_preview->ItemValue->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacygrn_preview->ItemValue->Name) ?>" data-sort-order="<?php echo $view_pharmacygrn_preview->SortField == $view_pharmacygrn_preview->ItemValue->Name && $view_pharmacygrn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_preview->ItemValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_preview->SortField == $view_pharmacygrn_preview->ItemValue->Name) { ?><?php if ($view_pharmacygrn_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_preview->SalTax->Visible) { // SalTax ?>
	<?php if ($view_pharmacygrn->SortUrl($view_pharmacygrn_preview->SalTax) == "") { ?>
		<th class="<?php echo $view_pharmacygrn_preview->SalTax->headerCellClass() ?>"><?php echo $view_pharmacygrn_preview->SalTax->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacygrn_preview->SalTax->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacygrn_preview->SalTax->Name) ?>" data-sort-order="<?php echo $view_pharmacygrn_preview->SortField == $view_pharmacygrn_preview->SalTax->Name && $view_pharmacygrn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_preview->SalTax->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_preview->SortField == $view_pharmacygrn_preview->SalTax->Name) { ?><?php if ($view_pharmacygrn_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_preview->SalRate->Visible) { // SalRate ?>
	<?php if ($view_pharmacygrn->SortUrl($view_pharmacygrn_preview->SalRate) == "") { ?>
		<th class="<?php echo $view_pharmacygrn_preview->SalRate->headerCellClass() ?>"><?php echo $view_pharmacygrn_preview->SalRate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacygrn_preview->SalRate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacygrn_preview->SalRate->Name) ?>" data-sort-order="<?php echo $view_pharmacygrn_preview->SortField == $view_pharmacygrn_preview->SalRate->Name && $view_pharmacygrn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_preview->SalRate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_preview->SortField == $view_pharmacygrn_preview->SalRate->Name) { ?><?php if ($view_pharmacygrn_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_preview->SSGST->Visible) { // SSGST ?>
	<?php if ($view_pharmacygrn->SortUrl($view_pharmacygrn_preview->SSGST) == "") { ?>
		<th class="<?php echo $view_pharmacygrn_preview->SSGST->headerCellClass() ?>"><?php echo $view_pharmacygrn_preview->SSGST->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacygrn_preview->SSGST->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacygrn_preview->SSGST->Name) ?>" data-sort-order="<?php echo $view_pharmacygrn_preview->SortField == $view_pharmacygrn_preview->SSGST->Name && $view_pharmacygrn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_preview->SSGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_preview->SortField == $view_pharmacygrn_preview->SSGST->Name) { ?><?php if ($view_pharmacygrn_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_preview->SCGST->Visible) { // SCGST ?>
	<?php if ($view_pharmacygrn->SortUrl($view_pharmacygrn_preview->SCGST) == "") { ?>
		<th class="<?php echo $view_pharmacygrn_preview->SCGST->headerCellClass() ?>"><?php echo $view_pharmacygrn_preview->SCGST->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacygrn_preview->SCGST->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacygrn_preview->SCGST->Name) ?>" data-sort-order="<?php echo $view_pharmacygrn_preview->SortField == $view_pharmacygrn_preview->SCGST->Name && $view_pharmacygrn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_preview->SCGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_preview->SortField == $view_pharmacygrn_preview->SCGST->Name) { ?><?php if ($view_pharmacygrn_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_preview->BRCODE->Visible) { // BRCODE ?>
	<?php if ($view_pharmacygrn->SortUrl($view_pharmacygrn_preview->BRCODE) == "") { ?>
		<th class="<?php echo $view_pharmacygrn_preview->BRCODE->headerCellClass() ?>"><?php echo $view_pharmacygrn_preview->BRCODE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacygrn_preview->BRCODE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacygrn_preview->BRCODE->Name) ?>" data-sort-order="<?php echo $view_pharmacygrn_preview->SortField == $view_pharmacygrn_preview->BRCODE->Name && $view_pharmacygrn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_preview->BRCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_preview->SortField == $view_pharmacygrn_preview->BRCODE->Name) { ?><?php if ($view_pharmacygrn_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_preview->HospID->Visible) { // HospID ?>
	<?php if ($view_pharmacygrn->SortUrl($view_pharmacygrn_preview->HospID) == "") { ?>
		<th class="<?php echo $view_pharmacygrn_preview->HospID->headerCellClass() ?>"><?php echo $view_pharmacygrn_preview->HospID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacygrn_preview->HospID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacygrn_preview->HospID->Name) ?>" data-sort-order="<?php echo $view_pharmacygrn_preview->SortField == $view_pharmacygrn_preview->HospID->Name && $view_pharmacygrn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_preview->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_preview->SortField == $view_pharmacygrn_preview->HospID->Name) { ?><?php if ($view_pharmacygrn_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_preview->grncreatedby->Visible) { // grncreatedby ?>
	<?php if ($view_pharmacygrn->SortUrl($view_pharmacygrn_preview->grncreatedby) == "") { ?>
		<th class="<?php echo $view_pharmacygrn_preview->grncreatedby->headerCellClass() ?>"><?php echo $view_pharmacygrn_preview->grncreatedby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacygrn_preview->grncreatedby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacygrn_preview->grncreatedby->Name) ?>" data-sort-order="<?php echo $view_pharmacygrn_preview->SortField == $view_pharmacygrn_preview->grncreatedby->Name && $view_pharmacygrn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_preview->grncreatedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_preview->SortField == $view_pharmacygrn_preview->grncreatedby->Name) { ?><?php if ($view_pharmacygrn_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_preview->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
	<?php if ($view_pharmacygrn->SortUrl($view_pharmacygrn_preview->grncreatedDateTime) == "") { ?>
		<th class="<?php echo $view_pharmacygrn_preview->grncreatedDateTime->headerCellClass() ?>"><?php echo $view_pharmacygrn_preview->grncreatedDateTime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacygrn_preview->grncreatedDateTime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacygrn_preview->grncreatedDateTime->Name) ?>" data-sort-order="<?php echo $view_pharmacygrn_preview->SortField == $view_pharmacygrn_preview->grncreatedDateTime->Name && $view_pharmacygrn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_preview->grncreatedDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_preview->SortField == $view_pharmacygrn_preview->grncreatedDateTime->Name) { ?><?php if ($view_pharmacygrn_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_preview->grnModifiedby->Visible) { // grnModifiedby ?>
	<?php if ($view_pharmacygrn->SortUrl($view_pharmacygrn_preview->grnModifiedby) == "") { ?>
		<th class="<?php echo $view_pharmacygrn_preview->grnModifiedby->headerCellClass() ?>"><?php echo $view_pharmacygrn_preview->grnModifiedby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacygrn_preview->grnModifiedby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacygrn_preview->grnModifiedby->Name) ?>" data-sort-order="<?php echo $view_pharmacygrn_preview->SortField == $view_pharmacygrn_preview->grnModifiedby->Name && $view_pharmacygrn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_preview->grnModifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_preview->SortField == $view_pharmacygrn_preview->grnModifiedby->Name) { ?><?php if ($view_pharmacygrn_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_preview->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
	<?php if ($view_pharmacygrn->SortUrl($view_pharmacygrn_preview->grnModifiedDateTime) == "") { ?>
		<th class="<?php echo $view_pharmacygrn_preview->grnModifiedDateTime->headerCellClass() ?>"><?php echo $view_pharmacygrn_preview->grnModifiedDateTime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacygrn_preview->grnModifiedDateTime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacygrn_preview->grnModifiedDateTime->Name) ?>" data-sort-order="<?php echo $view_pharmacygrn_preview->SortField == $view_pharmacygrn_preview->grnModifiedDateTime->Name && $view_pharmacygrn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_preview->grnModifiedDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_preview->SortField == $view_pharmacygrn_preview->grnModifiedDateTime->Name) { ?><?php if ($view_pharmacygrn_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_preview->BillDate->Visible) { // BillDate ?>
	<?php if ($view_pharmacygrn->SortUrl($view_pharmacygrn_preview->BillDate) == "") { ?>
		<th class="<?php echo $view_pharmacygrn_preview->BillDate->headerCellClass() ?>"><?php echo $view_pharmacygrn_preview->BillDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacygrn_preview->BillDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacygrn_preview->BillDate->Name) ?>" data-sort-order="<?php echo $view_pharmacygrn_preview->SortField == $view_pharmacygrn_preview->BillDate->Name && $view_pharmacygrn_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_preview->BillDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_preview->SortField == $view_pharmacygrn_preview->BillDate->Name) { ?><?php if ($view_pharmacygrn_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
$view_pharmacygrn_preview->RowCount = 0;
while ($view_pharmacygrn_preview->Recordset && !$view_pharmacygrn_preview->Recordset->EOF) {

	// Init row class and style
	$view_pharmacygrn_preview->RecCount++;
	$view_pharmacygrn_preview->RowCount++;
	$view_pharmacygrn_preview->CssStyle = "";
	$view_pharmacygrn_preview->loadListRowValues($view_pharmacygrn_preview->Recordset);
	$view_pharmacygrn_preview->aggregateListRowValues(); // Aggregate row values

	// Render row
	$view_pharmacygrn->RowType = ROWTYPE_PREVIEW; // Preview record
	$view_pharmacygrn_preview->resetAttributes();
	$view_pharmacygrn_preview->renderListRow();

	// Render list options
	$view_pharmacygrn_preview->renderListOptions();
?>
	<tr <?php echo $view_pharmacygrn->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_pharmacygrn_preview->ListOptions->render("body", "left", $view_pharmacygrn_preview->RowCount);
?>
<?php if ($view_pharmacygrn_preview->PRC->Visible) { // PRC ?>
		<!-- PRC -->
		<td<?php echo $view_pharmacygrn_preview->PRC->cellAttributes() ?>>
<span<?php echo $view_pharmacygrn_preview->PRC->viewAttributes() ?>><?php echo $view_pharmacygrn_preview->PRC->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacygrn_preview->PrName->Visible) { // PrName ?>
		<!-- PrName -->
		<td<?php echo $view_pharmacygrn_preview->PrName->cellAttributes() ?>>
<span<?php echo $view_pharmacygrn_preview->PrName->viewAttributes() ?>><?php echo $view_pharmacygrn_preview->PrName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacygrn_preview->GrnQuantity->Visible) { // GrnQuantity ?>
		<!-- GrnQuantity -->
		<td<?php echo $view_pharmacygrn_preview->GrnQuantity->cellAttributes() ?>>
<span<?php echo $view_pharmacygrn_preview->GrnQuantity->viewAttributes() ?>><?php echo $view_pharmacygrn_preview->GrnQuantity->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacygrn_preview->Quantity->Visible) { // Quantity ?>
		<!-- Quantity -->
		<td<?php echo $view_pharmacygrn_preview->Quantity->cellAttributes() ?>>
<span<?php echo $view_pharmacygrn_preview->Quantity->viewAttributes() ?>><?php echo $view_pharmacygrn_preview->Quantity->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacygrn_preview->FreeQty->Visible) { // FreeQty ?>
		<!-- FreeQty -->
		<td<?php echo $view_pharmacygrn_preview->FreeQty->cellAttributes() ?>>
<span<?php echo $view_pharmacygrn_preview->FreeQty->viewAttributes() ?>><?php echo $view_pharmacygrn_preview->FreeQty->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacygrn_preview->BatchNo->Visible) { // BatchNo ?>
		<!-- BatchNo -->
		<td<?php echo $view_pharmacygrn_preview->BatchNo->cellAttributes() ?>>
<span<?php echo $view_pharmacygrn_preview->BatchNo->viewAttributes() ?>><?php echo $view_pharmacygrn_preview->BatchNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacygrn_preview->ExpDate->Visible) { // ExpDate ?>
		<!-- ExpDate -->
		<td<?php echo $view_pharmacygrn_preview->ExpDate->cellAttributes() ?>>
<span<?php echo $view_pharmacygrn_preview->ExpDate->viewAttributes() ?>><?php echo $view_pharmacygrn_preview->ExpDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacygrn_preview->HSN->Visible) { // HSN ?>
		<!-- HSN -->
		<td<?php echo $view_pharmacygrn_preview->HSN->cellAttributes() ?>>
<span<?php echo $view_pharmacygrn_preview->HSN->viewAttributes() ?>><?php echo $view_pharmacygrn_preview->HSN->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacygrn_preview->MFRCODE->Visible) { // MFRCODE ?>
		<!-- MFRCODE -->
		<td<?php echo $view_pharmacygrn_preview->MFRCODE->cellAttributes() ?>>
<span<?php echo $view_pharmacygrn_preview->MFRCODE->viewAttributes() ?>><?php echo $view_pharmacygrn_preview->MFRCODE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacygrn_preview->PUnit->Visible) { // PUnit ?>
		<!-- PUnit -->
		<td<?php echo $view_pharmacygrn_preview->PUnit->cellAttributes() ?>>
<span<?php echo $view_pharmacygrn_preview->PUnit->viewAttributes() ?>><?php echo $view_pharmacygrn_preview->PUnit->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacygrn_preview->SUnit->Visible) { // SUnit ?>
		<!-- SUnit -->
		<td<?php echo $view_pharmacygrn_preview->SUnit->cellAttributes() ?>>
<span<?php echo $view_pharmacygrn_preview->SUnit->viewAttributes() ?>><?php echo $view_pharmacygrn_preview->SUnit->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacygrn_preview->MRP->Visible) { // MRP ?>
		<!-- MRP -->
		<td<?php echo $view_pharmacygrn_preview->MRP->cellAttributes() ?>>
<span<?php echo $view_pharmacygrn_preview->MRP->viewAttributes() ?>><?php echo $view_pharmacygrn_preview->MRP->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacygrn_preview->PurValue->Visible) { // PurValue ?>
		<!-- PurValue -->
		<td<?php echo $view_pharmacygrn_preview->PurValue->cellAttributes() ?>>
<span<?php echo $view_pharmacygrn_preview->PurValue->viewAttributes() ?>><?php echo $view_pharmacygrn_preview->PurValue->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacygrn_preview->Disc->Visible) { // Disc ?>
		<!-- Disc -->
		<td<?php echo $view_pharmacygrn_preview->Disc->cellAttributes() ?>>
<span<?php echo $view_pharmacygrn_preview->Disc->viewAttributes() ?>><?php echo $view_pharmacygrn_preview->Disc->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacygrn_preview->PSGST->Visible) { // PSGST ?>
		<!-- PSGST -->
		<td<?php echo $view_pharmacygrn_preview->PSGST->cellAttributes() ?>>
<span<?php echo $view_pharmacygrn_preview->PSGST->viewAttributes() ?>><?php echo $view_pharmacygrn_preview->PSGST->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacygrn_preview->PCGST->Visible) { // PCGST ?>
		<!-- PCGST -->
		<td<?php echo $view_pharmacygrn_preview->PCGST->cellAttributes() ?>>
<span<?php echo $view_pharmacygrn_preview->PCGST->viewAttributes() ?>><?php echo $view_pharmacygrn_preview->PCGST->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacygrn_preview->PTax->Visible) { // PTax ?>
		<!-- PTax -->
		<td<?php echo $view_pharmacygrn_preview->PTax->cellAttributes() ?>>
<span<?php echo $view_pharmacygrn_preview->PTax->viewAttributes() ?>><?php echo $view_pharmacygrn_preview->PTax->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacygrn_preview->ItemValue->Visible) { // ItemValue ?>
		<!-- ItemValue -->
		<td<?php echo $view_pharmacygrn_preview->ItemValue->cellAttributes() ?>>
<span<?php echo $view_pharmacygrn_preview->ItemValue->viewAttributes() ?>><?php echo $view_pharmacygrn_preview->ItemValue->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacygrn_preview->SalTax->Visible) { // SalTax ?>
		<!-- SalTax -->
		<td<?php echo $view_pharmacygrn_preview->SalTax->cellAttributes() ?>>
<span<?php echo $view_pharmacygrn_preview->SalTax->viewAttributes() ?>><?php echo $view_pharmacygrn_preview->SalTax->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacygrn_preview->SalRate->Visible) { // SalRate ?>
		<!-- SalRate -->
		<td<?php echo $view_pharmacygrn_preview->SalRate->cellAttributes() ?>>
<span<?php echo $view_pharmacygrn_preview->SalRate->viewAttributes() ?>><?php echo $view_pharmacygrn_preview->SalRate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacygrn_preview->SSGST->Visible) { // SSGST ?>
		<!-- SSGST -->
		<td<?php echo $view_pharmacygrn_preview->SSGST->cellAttributes() ?>>
<span<?php echo $view_pharmacygrn_preview->SSGST->viewAttributes() ?>><?php echo $view_pharmacygrn_preview->SSGST->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacygrn_preview->SCGST->Visible) { // SCGST ?>
		<!-- SCGST -->
		<td<?php echo $view_pharmacygrn_preview->SCGST->cellAttributes() ?>>
<span<?php echo $view_pharmacygrn_preview->SCGST->viewAttributes() ?>><?php echo $view_pharmacygrn_preview->SCGST->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacygrn_preview->BRCODE->Visible) { // BRCODE ?>
		<!-- BRCODE -->
		<td<?php echo $view_pharmacygrn_preview->BRCODE->cellAttributes() ?>>
<span<?php echo $view_pharmacygrn_preview->BRCODE->viewAttributes() ?>><?php echo $view_pharmacygrn_preview->BRCODE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacygrn_preview->HospID->Visible) { // HospID ?>
		<!-- HospID -->
		<td<?php echo $view_pharmacygrn_preview->HospID->cellAttributes() ?>>
<span<?php echo $view_pharmacygrn_preview->HospID->viewAttributes() ?>><?php echo $view_pharmacygrn_preview->HospID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacygrn_preview->grncreatedby->Visible) { // grncreatedby ?>
		<!-- grncreatedby -->
		<td<?php echo $view_pharmacygrn_preview->grncreatedby->cellAttributes() ?>>
<span<?php echo $view_pharmacygrn_preview->grncreatedby->viewAttributes() ?>><?php echo $view_pharmacygrn_preview->grncreatedby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacygrn_preview->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
		<!-- grncreatedDateTime -->
		<td<?php echo $view_pharmacygrn_preview->grncreatedDateTime->cellAttributes() ?>>
<span<?php echo $view_pharmacygrn_preview->grncreatedDateTime->viewAttributes() ?>><?php echo $view_pharmacygrn_preview->grncreatedDateTime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacygrn_preview->grnModifiedby->Visible) { // grnModifiedby ?>
		<!-- grnModifiedby -->
		<td<?php echo $view_pharmacygrn_preview->grnModifiedby->cellAttributes() ?>>
<span<?php echo $view_pharmacygrn_preview->grnModifiedby->viewAttributes() ?>><?php echo $view_pharmacygrn_preview->grnModifiedby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacygrn_preview->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
		<!-- grnModifiedDateTime -->
		<td<?php echo $view_pharmacygrn_preview->grnModifiedDateTime->cellAttributes() ?>>
<span<?php echo $view_pharmacygrn_preview->grnModifiedDateTime->viewAttributes() ?>><?php echo $view_pharmacygrn_preview->grnModifiedDateTime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacygrn_preview->BillDate->Visible) { // BillDate ?>
		<!-- BillDate -->
		<td<?php echo $view_pharmacygrn_preview->BillDate->cellAttributes() ?>>
<span<?php echo $view_pharmacygrn_preview->BillDate->viewAttributes() ?>><?php echo $view_pharmacygrn_preview->BillDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$view_pharmacygrn_preview->ListOptions->render("body", "right", $view_pharmacygrn_preview->RowCount);
?>
	</tr>
<?php
	$view_pharmacygrn_preview->Recordset->MoveNext();
} // while
?>
	</tbody>
<?php

	// Render aggregate row
	$view_pharmacygrn->RowType = ROWTYPE_AGGREGATE; // Aggregate
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
<?php if ($view_pharmacygrn_preview->PRC->Visible) { // PRC ?>
		<!-- PRC -->
		<td class="<?php echo $view_pharmacygrn_preview->PRC->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_pharmacygrn_preview->PrName->Visible) { // PrName ?>
		<!-- PrName -->
		<td class="<?php echo $view_pharmacygrn_preview->PrName->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_pharmacygrn_preview->GrnQuantity->Visible) { // GrnQuantity ?>
		<!-- GrnQuantity -->
		<td class="<?php echo $view_pharmacygrn_preview->GrnQuantity->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_pharmacygrn_preview->Quantity->Visible) { // Quantity ?>
		<!-- Quantity -->
		<td class="<?php echo $view_pharmacygrn_preview->Quantity->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_pharmacygrn_preview->FreeQty->Visible) { // FreeQty ?>
		<!-- FreeQty -->
		<td class="<?php echo $view_pharmacygrn_preview->FreeQty->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_pharmacygrn_preview->BatchNo->Visible) { // BatchNo ?>
		<!-- BatchNo -->
		<td class="<?php echo $view_pharmacygrn_preview->BatchNo->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_pharmacygrn_preview->ExpDate->Visible) { // ExpDate ?>
		<!-- ExpDate -->
		<td class="<?php echo $view_pharmacygrn_preview->ExpDate->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_pharmacygrn_preview->HSN->Visible) { // HSN ?>
		<!-- HSN -->
		<td class="<?php echo $view_pharmacygrn_preview->HSN->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_pharmacygrn_preview->MFRCODE->Visible) { // MFRCODE ?>
		<!-- MFRCODE -->
		<td class="<?php echo $view_pharmacygrn_preview->MFRCODE->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_pharmacygrn_preview->PUnit->Visible) { // PUnit ?>
		<!-- PUnit -->
		<td class="<?php echo $view_pharmacygrn_preview->PUnit->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_pharmacygrn_preview->SUnit->Visible) { // SUnit ?>
		<!-- SUnit -->
		<td class="<?php echo $view_pharmacygrn_preview->SUnit->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_pharmacygrn_preview->MRP->Visible) { // MRP ?>
		<!-- MRP -->
		<td class="<?php echo $view_pharmacygrn_preview->MRP->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_pharmacygrn_preview->PurValue->Visible) { // PurValue ?>
		<!-- PurValue -->
		<td class="<?php echo $view_pharmacygrn_preview->PurValue->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_pharmacygrn_preview->Disc->Visible) { // Disc ?>
		<!-- Disc -->
		<td class="<?php echo $view_pharmacygrn_preview->Disc->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_pharmacygrn_preview->PSGST->Visible) { // PSGST ?>
		<!-- PSGST -->
		<td class="<?php echo $view_pharmacygrn_preview->PSGST->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_pharmacygrn_preview->PCGST->Visible) { // PCGST ?>
		<!-- PCGST -->
		<td class="<?php echo $view_pharmacygrn_preview->PCGST->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_pharmacygrn_preview->PTax->Visible) { // PTax ?>
		<!-- PTax -->
		<td class="<?php echo $view_pharmacygrn_preview->PTax->footerCellClass() ?>">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_pharmacygrn_preview->PTax->ViewValue ?></span>
		</td>
<?php } ?>
<?php if ($view_pharmacygrn_preview->ItemValue->Visible) { // ItemValue ?>
		<!-- ItemValue -->
		<td class="<?php echo $view_pharmacygrn_preview->ItemValue->footerCellClass() ?>">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_pharmacygrn_preview->ItemValue->ViewValue ?></span>
		</td>
<?php } ?>
<?php if ($view_pharmacygrn_preview->SalTax->Visible) { // SalTax ?>
		<!-- SalTax -->
		<td class="<?php echo $view_pharmacygrn_preview->SalTax->footerCellClass() ?>">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_pharmacygrn_preview->SalTax->ViewValue ?></span>
		</td>
<?php } ?>
<?php if ($view_pharmacygrn_preview->SalRate->Visible) { // SalRate ?>
		<!-- SalRate -->
		<td class="<?php echo $view_pharmacygrn_preview->SalRate->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_pharmacygrn_preview->SSGST->Visible) { // SSGST ?>
		<!-- SSGST -->
		<td class="<?php echo $view_pharmacygrn_preview->SSGST->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_pharmacygrn_preview->SCGST->Visible) { // SCGST ?>
		<!-- SCGST -->
		<td class="<?php echo $view_pharmacygrn_preview->SCGST->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_pharmacygrn_preview->BRCODE->Visible) { // BRCODE ?>
		<!-- BRCODE -->
		<td class="<?php echo $view_pharmacygrn_preview->BRCODE->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_pharmacygrn_preview->HospID->Visible) { // HospID ?>
		<!-- HospID -->
		<td class="<?php echo $view_pharmacygrn_preview->HospID->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_pharmacygrn_preview->grncreatedby->Visible) { // grncreatedby ?>
		<!-- grncreatedby -->
		<td class="<?php echo $view_pharmacygrn_preview->grncreatedby->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_pharmacygrn_preview->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
		<!-- grncreatedDateTime -->
		<td class="<?php echo $view_pharmacygrn_preview->grncreatedDateTime->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_pharmacygrn_preview->grnModifiedby->Visible) { // grnModifiedby ?>
		<!-- grnModifiedby -->
		<td class="<?php echo $view_pharmacygrn_preview->grnModifiedby->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_pharmacygrn_preview->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
		<!-- grnModifiedDateTime -->
		<td class="<?php echo $view_pharmacygrn_preview->grnModifiedDateTime->footerCellClass() ?>">
		&nbsp;
		</td>
<?php } ?>
<?php if ($view_pharmacygrn_preview->BillDate->Visible) { // BillDate ?>
		<!-- BillDate -->
		<td class="<?php echo $view_pharmacygrn_preview->BillDate->footerCellClass() ?>">
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
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php echo $view_pharmacygrn_preview->Pager->render() ?>
<?php } else { // No record ?>
<div class="card no-border">
<div class="ew-detail-count"><?php echo $Language->phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($view_pharmacygrn_preview->OtherOptions as $option)
		$option->render("body");
?>
</div>
<?php if ($view_pharmacygrn_preview->TotalRecords > 0) { ?>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
<?php } ?>
</div><!-- /.card -->
<?php
$view_pharmacygrn_preview->showPageFooter();
if (Config("DEBUG"))
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
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
$view_pharmacy_pharled_return_preview = new view_pharmacy_pharled_return_preview();

// Run the page
$view_pharmacy_pharled_return_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacy_pharled_return_preview->Page_Render();
?>
<?php $view_pharmacy_pharled_return_preview->showPageHeader(); ?>
<?php if ($view_pharmacy_pharled_return_preview->TotalRecords > 0) { ?>
<div class="card ew-grid view_pharmacy_pharled_return"><!-- .card -->
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel ew-preview-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$view_pharmacy_pharled_return_preview->renderListOptions();

// Render list options (header, left)
$view_pharmacy_pharled_return_preview->ListOptions->render("header", "left");
?>
<?php if ($view_pharmacy_pharled_return_preview->BRCODE->Visible) { // BRCODE ?>
	<?php if ($view_pharmacy_pharled_return->SortUrl($view_pharmacy_pharled_return_preview->BRCODE) == "") { ?>
		<th class="<?php echo $view_pharmacy_pharled_return_preview->BRCODE->headerCellClass() ?>"><?php echo $view_pharmacy_pharled_return_preview->BRCODE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_pharled_return_preview->BRCODE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacy_pharled_return_preview->BRCODE->Name) ?>" data-sort-order="<?php echo $view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return_preview->BRCODE->Name && $view_pharmacy_pharled_return_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_preview->BRCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return_preview->BRCODE->Name) { ?><?php if ($view_pharmacy_pharled_return_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_preview->PRC->Visible) { // PRC ?>
	<?php if ($view_pharmacy_pharled_return->SortUrl($view_pharmacy_pharled_return_preview->PRC) == "") { ?>
		<th class="<?php echo $view_pharmacy_pharled_return_preview->PRC->headerCellClass() ?>"><?php echo $view_pharmacy_pharled_return_preview->PRC->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_pharled_return_preview->PRC->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacy_pharled_return_preview->PRC->Name) ?>" data-sort-order="<?php echo $view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return_preview->PRC->Name && $view_pharmacy_pharled_return_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_preview->PRC->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return_preview->PRC->Name) { ?><?php if ($view_pharmacy_pharled_return_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_preview->SiNo->Visible) { // SiNo ?>
	<?php if ($view_pharmacy_pharled_return->SortUrl($view_pharmacy_pharled_return_preview->SiNo) == "") { ?>
		<th class="<?php echo $view_pharmacy_pharled_return_preview->SiNo->headerCellClass() ?>"><?php echo $view_pharmacy_pharled_return_preview->SiNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_pharled_return_preview->SiNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacy_pharled_return_preview->SiNo->Name) ?>" data-sort-order="<?php echo $view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return_preview->SiNo->Name && $view_pharmacy_pharled_return_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_preview->SiNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return_preview->SiNo->Name) { ?><?php if ($view_pharmacy_pharled_return_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_preview->Product->Visible) { // Product ?>
	<?php if ($view_pharmacy_pharled_return->SortUrl($view_pharmacy_pharled_return_preview->Product) == "") { ?>
		<th class="<?php echo $view_pharmacy_pharled_return_preview->Product->headerCellClass() ?>"><?php echo $view_pharmacy_pharled_return_preview->Product->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_pharled_return_preview->Product->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacy_pharled_return_preview->Product->Name) ?>" data-sort-order="<?php echo $view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return_preview->Product->Name && $view_pharmacy_pharled_return_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_preview->Product->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return_preview->Product->Name) { ?><?php if ($view_pharmacy_pharled_return_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_preview->RT->Visible) { // RT ?>
	<?php if ($view_pharmacy_pharled_return->SortUrl($view_pharmacy_pharled_return_preview->RT) == "") { ?>
		<th class="<?php echo $view_pharmacy_pharled_return_preview->RT->headerCellClass() ?>"><?php echo $view_pharmacy_pharled_return_preview->RT->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_pharled_return_preview->RT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacy_pharled_return_preview->RT->Name) ?>" data-sort-order="<?php echo $view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return_preview->RT->Name && $view_pharmacy_pharled_return_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_preview->RT->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return_preview->RT->Name) { ?><?php if ($view_pharmacy_pharled_return_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_preview->MRQ->Visible) { // MRQ ?>
	<?php if ($view_pharmacy_pharled_return->SortUrl($view_pharmacy_pharled_return_preview->MRQ) == "") { ?>
		<th class="<?php echo $view_pharmacy_pharled_return_preview->MRQ->headerCellClass() ?>"><?php echo $view_pharmacy_pharled_return_preview->MRQ->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_pharled_return_preview->MRQ->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacy_pharled_return_preview->MRQ->Name) ?>" data-sort-order="<?php echo $view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return_preview->MRQ->Name && $view_pharmacy_pharled_return_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_preview->MRQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return_preview->MRQ->Name) { ?><?php if ($view_pharmacy_pharled_return_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_preview->IQ->Visible) { // IQ ?>
	<?php if ($view_pharmacy_pharled_return->SortUrl($view_pharmacy_pharled_return_preview->IQ) == "") { ?>
		<th class="<?php echo $view_pharmacy_pharled_return_preview->IQ->headerCellClass() ?>"><?php echo $view_pharmacy_pharled_return_preview->IQ->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_pharled_return_preview->IQ->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacy_pharled_return_preview->IQ->Name) ?>" data-sort-order="<?php echo $view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return_preview->IQ->Name && $view_pharmacy_pharled_return_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_preview->IQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return_preview->IQ->Name) { ?><?php if ($view_pharmacy_pharled_return_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_preview->DAMT->Visible) { // DAMT ?>
	<?php if ($view_pharmacy_pharled_return->SortUrl($view_pharmacy_pharled_return_preview->DAMT) == "") { ?>
		<th class="<?php echo $view_pharmacy_pharled_return_preview->DAMT->headerCellClass() ?>"><?php echo $view_pharmacy_pharled_return_preview->DAMT->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_pharled_return_preview->DAMT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacy_pharled_return_preview->DAMT->Name) ?>" data-sort-order="<?php echo $view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return_preview->DAMT->Name && $view_pharmacy_pharled_return_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_preview->DAMT->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return_preview->DAMT->Name) { ?><?php if ($view_pharmacy_pharled_return_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_preview->BATCHNO->Visible) { // BATCHNO ?>
	<?php if ($view_pharmacy_pharled_return->SortUrl($view_pharmacy_pharled_return_preview->BATCHNO) == "") { ?>
		<th class="<?php echo $view_pharmacy_pharled_return_preview->BATCHNO->headerCellClass() ?>"><?php echo $view_pharmacy_pharled_return_preview->BATCHNO->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_pharled_return_preview->BATCHNO->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacy_pharled_return_preview->BATCHNO->Name) ?>" data-sort-order="<?php echo $view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return_preview->BATCHNO->Name && $view_pharmacy_pharled_return_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_preview->BATCHNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return_preview->BATCHNO->Name) { ?><?php if ($view_pharmacy_pharled_return_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_preview->EXPDT->Visible) { // EXPDT ?>
	<?php if ($view_pharmacy_pharled_return->SortUrl($view_pharmacy_pharled_return_preview->EXPDT) == "") { ?>
		<th class="<?php echo $view_pharmacy_pharled_return_preview->EXPDT->headerCellClass() ?>"><?php echo $view_pharmacy_pharled_return_preview->EXPDT->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_pharled_return_preview->EXPDT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacy_pharled_return_preview->EXPDT->Name) ?>" data-sort-order="<?php echo $view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return_preview->EXPDT->Name && $view_pharmacy_pharled_return_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_preview->EXPDT->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return_preview->EXPDT->Name) { ?><?php if ($view_pharmacy_pharled_return_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_preview->Mfg->Visible) { // Mfg ?>
	<?php if ($view_pharmacy_pharled_return->SortUrl($view_pharmacy_pharled_return_preview->Mfg) == "") { ?>
		<th class="<?php echo $view_pharmacy_pharled_return_preview->Mfg->headerCellClass() ?>"><?php echo $view_pharmacy_pharled_return_preview->Mfg->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_pharled_return_preview->Mfg->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacy_pharled_return_preview->Mfg->Name) ?>" data-sort-order="<?php echo $view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return_preview->Mfg->Name && $view_pharmacy_pharled_return_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_preview->Mfg->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return_preview->Mfg->Name) { ?><?php if ($view_pharmacy_pharled_return_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_preview->UR->Visible) { // UR ?>
	<?php if ($view_pharmacy_pharled_return->SortUrl($view_pharmacy_pharled_return_preview->UR) == "") { ?>
		<th class="<?php echo $view_pharmacy_pharled_return_preview->UR->headerCellClass() ?>"><?php echo $view_pharmacy_pharled_return_preview->UR->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_pharled_return_preview->UR->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacy_pharled_return_preview->UR->Name) ?>" data-sort-order="<?php echo $view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return_preview->UR->Name && $view_pharmacy_pharled_return_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_preview->UR->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return_preview->UR->Name) { ?><?php if ($view_pharmacy_pharled_return_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_preview->_USERID->Visible) { // USERID ?>
	<?php if ($view_pharmacy_pharled_return->SortUrl($view_pharmacy_pharled_return_preview->_USERID) == "") { ?>
		<th class="<?php echo $view_pharmacy_pharled_return_preview->_USERID->headerCellClass() ?>"><?php echo $view_pharmacy_pharled_return_preview->_USERID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_pharled_return_preview->_USERID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacy_pharled_return_preview->_USERID->Name) ?>" data-sort-order="<?php echo $view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return_preview->_USERID->Name && $view_pharmacy_pharled_return_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_preview->_USERID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return_preview->_USERID->Name) { ?><?php if ($view_pharmacy_pharled_return_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_preview->id->Visible) { // id ?>
	<?php if ($view_pharmacy_pharled_return->SortUrl($view_pharmacy_pharled_return_preview->id) == "") { ?>
		<th class="<?php echo $view_pharmacy_pharled_return_preview->id->headerCellClass() ?>"><?php echo $view_pharmacy_pharled_return_preview->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_pharled_return_preview->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacy_pharled_return_preview->id->Name) ?>" data-sort-order="<?php echo $view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return_preview->id->Name && $view_pharmacy_pharled_return_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_preview->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return_preview->id->Name) { ?><?php if ($view_pharmacy_pharled_return_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_preview->HosoID->Visible) { // HosoID ?>
	<?php if ($view_pharmacy_pharled_return->SortUrl($view_pharmacy_pharled_return_preview->HosoID) == "") { ?>
		<th class="<?php echo $view_pharmacy_pharled_return_preview->HosoID->headerCellClass() ?>"><?php echo $view_pharmacy_pharled_return_preview->HosoID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_pharled_return_preview->HosoID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacy_pharled_return_preview->HosoID->Name) ?>" data-sort-order="<?php echo $view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return_preview->HosoID->Name && $view_pharmacy_pharled_return_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_preview->HosoID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return_preview->HosoID->Name) { ?><?php if ($view_pharmacy_pharled_return_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_preview->createdby->Visible) { // createdby ?>
	<?php if ($view_pharmacy_pharled_return->SortUrl($view_pharmacy_pharled_return_preview->createdby) == "") { ?>
		<th class="<?php echo $view_pharmacy_pharled_return_preview->createdby->headerCellClass() ?>"><?php echo $view_pharmacy_pharled_return_preview->createdby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_pharled_return_preview->createdby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacy_pharled_return_preview->createdby->Name) ?>" data-sort-order="<?php echo $view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return_preview->createdby->Name && $view_pharmacy_pharled_return_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_preview->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return_preview->createdby->Name) { ?><?php if ($view_pharmacy_pharled_return_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_preview->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_pharmacy_pharled_return->SortUrl($view_pharmacy_pharled_return_preview->createddatetime) == "") { ?>
		<th class="<?php echo $view_pharmacy_pharled_return_preview->createddatetime->headerCellClass() ?>"><?php echo $view_pharmacy_pharled_return_preview->createddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_pharled_return_preview->createddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacy_pharled_return_preview->createddatetime->Name) ?>" data-sort-order="<?php echo $view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return_preview->createddatetime->Name && $view_pharmacy_pharled_return_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_preview->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return_preview->createddatetime->Name) { ?><?php if ($view_pharmacy_pharled_return_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_preview->modifiedby->Visible) { // modifiedby ?>
	<?php if ($view_pharmacy_pharled_return->SortUrl($view_pharmacy_pharled_return_preview->modifiedby) == "") { ?>
		<th class="<?php echo $view_pharmacy_pharled_return_preview->modifiedby->headerCellClass() ?>"><?php echo $view_pharmacy_pharled_return_preview->modifiedby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_pharled_return_preview->modifiedby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacy_pharled_return_preview->modifiedby->Name) ?>" data-sort-order="<?php echo $view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return_preview->modifiedby->Name && $view_pharmacy_pharled_return_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_preview->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return_preview->modifiedby->Name) { ?><?php if ($view_pharmacy_pharled_return_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_preview->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($view_pharmacy_pharled_return->SortUrl($view_pharmacy_pharled_return_preview->modifieddatetime) == "") { ?>
		<th class="<?php echo $view_pharmacy_pharled_return_preview->modifieddatetime->headerCellClass() ?>"><?php echo $view_pharmacy_pharled_return_preview->modifieddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_pharled_return_preview->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacy_pharled_return_preview->modifieddatetime->Name) ?>" data-sort-order="<?php echo $view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return_preview->modifieddatetime->Name && $view_pharmacy_pharled_return_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_preview->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return_preview->modifieddatetime->Name) { ?><?php if ($view_pharmacy_pharled_return_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_preview->BRNAME->Visible) { // BRNAME ?>
	<?php if ($view_pharmacy_pharled_return->SortUrl($view_pharmacy_pharled_return_preview->BRNAME) == "") { ?>
		<th class="<?php echo $view_pharmacy_pharled_return_preview->BRNAME->headerCellClass() ?>"><?php echo $view_pharmacy_pharled_return_preview->BRNAME->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_pharled_return_preview->BRNAME->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_pharmacy_pharled_return_preview->BRNAME->Name) ?>" data-sort-order="<?php echo $view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return_preview->BRNAME->Name && $view_pharmacy_pharled_return_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_preview->BRNAME->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return_preview->BRNAME->Name) { ?><?php if ($view_pharmacy_pharled_return_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_pharmacy_pharled_return_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$view_pharmacy_pharled_return_preview->RecCount = 0;
$view_pharmacy_pharled_return_preview->RowCount = 0;
while ($view_pharmacy_pharled_return_preview->Recordset && !$view_pharmacy_pharled_return_preview->Recordset->EOF) {

	// Init row class and style
	$view_pharmacy_pharled_return_preview->RecCount++;
	$view_pharmacy_pharled_return_preview->RowCount++;
	$view_pharmacy_pharled_return_preview->CssStyle = "";
	$view_pharmacy_pharled_return_preview->loadListRowValues($view_pharmacy_pharled_return_preview->Recordset);

	// Render row
	$view_pharmacy_pharled_return->RowType = ROWTYPE_PREVIEW; // Preview record
	$view_pharmacy_pharled_return_preview->resetAttributes();
	$view_pharmacy_pharled_return_preview->renderListRow();

	// Render list options
	$view_pharmacy_pharled_return_preview->renderListOptions();
?>
	<tr <?php echo $view_pharmacy_pharled_return->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_pharmacy_pharled_return_preview->ListOptions->render("body", "left", $view_pharmacy_pharled_return_preview->RowCount);
?>
<?php if ($view_pharmacy_pharled_return_preview->BRCODE->Visible) { // BRCODE ?>
		<!-- BRCODE -->
		<td<?php echo $view_pharmacy_pharled_return_preview->BRCODE->cellAttributes() ?>>
<span<?php echo $view_pharmacy_pharled_return_preview->BRCODE->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_preview->BRCODE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_preview->PRC->Visible) { // PRC ?>
		<!-- PRC -->
		<td<?php echo $view_pharmacy_pharled_return_preview->PRC->cellAttributes() ?>>
<span<?php echo $view_pharmacy_pharled_return_preview->PRC->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_preview->PRC->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_preview->SiNo->Visible) { // SiNo ?>
		<!-- SiNo -->
		<td<?php echo $view_pharmacy_pharled_return_preview->SiNo->cellAttributes() ?>>
<span<?php echo $view_pharmacy_pharled_return_preview->SiNo->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_preview->SiNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_preview->Product->Visible) { // Product ?>
		<!-- Product -->
		<td<?php echo $view_pharmacy_pharled_return_preview->Product->cellAttributes() ?>>
<span<?php echo $view_pharmacy_pharled_return_preview->Product->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_preview->Product->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_preview->RT->Visible) { // RT ?>
		<!-- RT -->
		<td<?php echo $view_pharmacy_pharled_return_preview->RT->cellAttributes() ?>>
<span<?php echo $view_pharmacy_pharled_return_preview->RT->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_preview->RT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_preview->MRQ->Visible) { // MRQ ?>
		<!-- MRQ -->
		<td<?php echo $view_pharmacy_pharled_return_preview->MRQ->cellAttributes() ?>>
<span<?php echo $view_pharmacy_pharled_return_preview->MRQ->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_preview->MRQ->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_preview->IQ->Visible) { // IQ ?>
		<!-- IQ -->
		<td<?php echo $view_pharmacy_pharled_return_preview->IQ->cellAttributes() ?>>
<span<?php echo $view_pharmacy_pharled_return_preview->IQ->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_preview->IQ->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_preview->DAMT->Visible) { // DAMT ?>
		<!-- DAMT -->
		<td<?php echo $view_pharmacy_pharled_return_preview->DAMT->cellAttributes() ?>>
<span<?php echo $view_pharmacy_pharled_return_preview->DAMT->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_preview->DAMT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_preview->BATCHNO->Visible) { // BATCHNO ?>
		<!-- BATCHNO -->
		<td<?php echo $view_pharmacy_pharled_return_preview->BATCHNO->cellAttributes() ?>>
<span<?php echo $view_pharmacy_pharled_return_preview->BATCHNO->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_preview->BATCHNO->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_preview->EXPDT->Visible) { // EXPDT ?>
		<!-- EXPDT -->
		<td<?php echo $view_pharmacy_pharled_return_preview->EXPDT->cellAttributes() ?>>
<span<?php echo $view_pharmacy_pharled_return_preview->EXPDT->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_preview->EXPDT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_preview->Mfg->Visible) { // Mfg ?>
		<!-- Mfg -->
		<td<?php echo $view_pharmacy_pharled_return_preview->Mfg->cellAttributes() ?>>
<span<?php echo $view_pharmacy_pharled_return_preview->Mfg->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_preview->Mfg->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_preview->UR->Visible) { // UR ?>
		<!-- UR -->
		<td<?php echo $view_pharmacy_pharled_return_preview->UR->cellAttributes() ?>>
<span<?php echo $view_pharmacy_pharled_return_preview->UR->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_preview->UR->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_preview->_USERID->Visible) { // USERID ?>
		<!-- USERID -->
		<td<?php echo $view_pharmacy_pharled_return_preview->_USERID->cellAttributes() ?>>
<span<?php echo $view_pharmacy_pharled_return_preview->_USERID->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_preview->_USERID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_preview->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $view_pharmacy_pharled_return_preview->id->cellAttributes() ?>>
<span<?php echo $view_pharmacy_pharled_return_preview->id->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_preview->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_preview->HosoID->Visible) { // HosoID ?>
		<!-- HosoID -->
		<td<?php echo $view_pharmacy_pharled_return_preview->HosoID->cellAttributes() ?>>
<span<?php echo $view_pharmacy_pharled_return_preview->HosoID->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_preview->HosoID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_preview->createdby->Visible) { // createdby ?>
		<!-- createdby -->
		<td<?php echo $view_pharmacy_pharled_return_preview->createdby->cellAttributes() ?>>
<span<?php echo $view_pharmacy_pharled_return_preview->createdby->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_preview->createdby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_preview->createddatetime->Visible) { // createddatetime ?>
		<!-- createddatetime -->
		<td<?php echo $view_pharmacy_pharled_return_preview->createddatetime->cellAttributes() ?>>
<span<?php echo $view_pharmacy_pharled_return_preview->createddatetime->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_preview->createddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_preview->modifiedby->Visible) { // modifiedby ?>
		<!-- modifiedby -->
		<td<?php echo $view_pharmacy_pharled_return_preview->modifiedby->cellAttributes() ?>>
<span<?php echo $view_pharmacy_pharled_return_preview->modifiedby->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_preview->modifiedby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_preview->modifieddatetime->Visible) { // modifieddatetime ?>
		<!-- modifieddatetime -->
		<td<?php echo $view_pharmacy_pharled_return_preview->modifieddatetime->cellAttributes() ?>>
<span<?php echo $view_pharmacy_pharled_return_preview->modifieddatetime->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_preview->modifieddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_preview->BRNAME->Visible) { // BRNAME ?>
		<!-- BRNAME -->
		<td<?php echo $view_pharmacy_pharled_return_preview->BRNAME->cellAttributes() ?>>
<span<?php echo $view_pharmacy_pharled_return_preview->BRNAME->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_preview->BRNAME->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$view_pharmacy_pharled_return_preview->ListOptions->render("body", "right", $view_pharmacy_pharled_return_preview->RowCount);
?>
	</tr>
<?php
	$view_pharmacy_pharled_return_preview->Recordset->MoveNext();
} // while
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php echo $view_pharmacy_pharled_return_preview->Pager->render() ?>
<?php } else { // No record ?>
<div class="card no-border">
<div class="ew-detail-count"><?php echo $Language->phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($view_pharmacy_pharled_return_preview->OtherOptions as $option)
		$option->render("body");
?>
</div>
<?php if ($view_pharmacy_pharled_return_preview->TotalRecords > 0) { ?>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
<?php } ?>
</div><!-- /.card -->
<?php
$view_pharmacy_pharled_return_preview->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php
if ($view_pharmacy_pharled_return_preview->Recordset)
	$view_pharmacy_pharled_return_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$view_pharmacy_pharled_return_preview->terminate();
?>
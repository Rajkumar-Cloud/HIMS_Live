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
<div class="card ew-grid view_pharmacy_pharled_return"><!-- .card -->
<?php if ($view_pharmacy_pharled_return_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$view_pharmacy_pharled_return_preview->renderListOptions();

// Render list options (header, left)
$view_pharmacy_pharled_return_preview->ListOptions->render("header", "left");
?>
<?php if ($view_pharmacy_pharled_return->BRCODE->Visible) { // BRCODE ?>
	<?php if ($view_pharmacy_pharled_return->SortUrl($view_pharmacy_pharled_return->BRCODE) == "") { ?>
		<th class="<?php echo $view_pharmacy_pharled_return->BRCODE->headerCellClass() ?>"><?php echo $view_pharmacy_pharled_return->BRCODE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_pharled_return->BRCODE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacy_pharled_return->BRCODE->Name ?>" data-sort-order="<?php echo $view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return->BRCODE->Name && $view_pharmacy_pharled_return_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->BRCODE->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return->BRCODE->Name) { ?><?php if ($view_pharmacy_pharled_return_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacy_pharled_return_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->PRC->Visible) { // PRC ?>
	<?php if ($view_pharmacy_pharled_return->SortUrl($view_pharmacy_pharled_return->PRC) == "") { ?>
		<th class="<?php echo $view_pharmacy_pharled_return->PRC->headerCellClass() ?>"><?php echo $view_pharmacy_pharled_return->PRC->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_pharled_return->PRC->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacy_pharled_return->PRC->Name ?>" data-sort-order="<?php echo $view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return->PRC->Name && $view_pharmacy_pharled_return_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->PRC->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return->PRC->Name) { ?><?php if ($view_pharmacy_pharled_return_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacy_pharled_return_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->SiNo->Visible) { // SiNo ?>
	<?php if ($view_pharmacy_pharled_return->SortUrl($view_pharmacy_pharled_return->SiNo) == "") { ?>
		<th class="<?php echo $view_pharmacy_pharled_return->SiNo->headerCellClass() ?>"><?php echo $view_pharmacy_pharled_return->SiNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_pharled_return->SiNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacy_pharled_return->SiNo->Name ?>" data-sort-order="<?php echo $view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return->SiNo->Name && $view_pharmacy_pharled_return_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->SiNo->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return->SiNo->Name) { ?><?php if ($view_pharmacy_pharled_return_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacy_pharled_return_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->Product->Visible) { // Product ?>
	<?php if ($view_pharmacy_pharled_return->SortUrl($view_pharmacy_pharled_return->Product) == "") { ?>
		<th class="<?php echo $view_pharmacy_pharled_return->Product->headerCellClass() ?>"><?php echo $view_pharmacy_pharled_return->Product->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_pharled_return->Product->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacy_pharled_return->Product->Name ?>" data-sort-order="<?php echo $view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return->Product->Name && $view_pharmacy_pharled_return_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->Product->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return->Product->Name) { ?><?php if ($view_pharmacy_pharled_return_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacy_pharled_return_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->SLNO->Visible) { // SLNO ?>
	<?php if ($view_pharmacy_pharled_return->SortUrl($view_pharmacy_pharled_return->SLNO) == "") { ?>
		<th class="<?php echo $view_pharmacy_pharled_return->SLNO->headerCellClass() ?>"><?php echo $view_pharmacy_pharled_return->SLNO->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_pharled_return->SLNO->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacy_pharled_return->SLNO->Name ?>" data-sort-order="<?php echo $view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return->SLNO->Name && $view_pharmacy_pharled_return_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->SLNO->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return->SLNO->Name) { ?><?php if ($view_pharmacy_pharled_return_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacy_pharled_return_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RT->Visible) { // RT ?>
	<?php if ($view_pharmacy_pharled_return->SortUrl($view_pharmacy_pharled_return->RT) == "") { ?>
		<th class="<?php echo $view_pharmacy_pharled_return->RT->headerCellClass() ?>"><?php echo $view_pharmacy_pharled_return->RT->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_pharled_return->RT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacy_pharled_return->RT->Name ?>" data-sort-order="<?php echo $view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return->RT->Name && $view_pharmacy_pharled_return_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->RT->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return->RT->Name) { ?><?php if ($view_pharmacy_pharled_return_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacy_pharled_return_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->MRQ->Visible) { // MRQ ?>
	<?php if ($view_pharmacy_pharled_return->SortUrl($view_pharmacy_pharled_return->MRQ) == "") { ?>
		<th class="<?php echo $view_pharmacy_pharled_return->MRQ->headerCellClass() ?>"><?php echo $view_pharmacy_pharled_return->MRQ->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_pharled_return->MRQ->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacy_pharled_return->MRQ->Name ?>" data-sort-order="<?php echo $view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return->MRQ->Name && $view_pharmacy_pharled_return_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->MRQ->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return->MRQ->Name) { ?><?php if ($view_pharmacy_pharled_return_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacy_pharled_return_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->IQ->Visible) { // IQ ?>
	<?php if ($view_pharmacy_pharled_return->SortUrl($view_pharmacy_pharled_return->IQ) == "") { ?>
		<th class="<?php echo $view_pharmacy_pharled_return->IQ->headerCellClass() ?>"><?php echo $view_pharmacy_pharled_return->IQ->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_pharled_return->IQ->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacy_pharled_return->IQ->Name ?>" data-sort-order="<?php echo $view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return->IQ->Name && $view_pharmacy_pharled_return_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->IQ->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return->IQ->Name) { ?><?php if ($view_pharmacy_pharled_return_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacy_pharled_return_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->DAMT->Visible) { // DAMT ?>
	<?php if ($view_pharmacy_pharled_return->SortUrl($view_pharmacy_pharled_return->DAMT) == "") { ?>
		<th class="<?php echo $view_pharmacy_pharled_return->DAMT->headerCellClass() ?>"><?php echo $view_pharmacy_pharled_return->DAMT->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_pharled_return->DAMT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacy_pharled_return->DAMT->Name ?>" data-sort-order="<?php echo $view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return->DAMT->Name && $view_pharmacy_pharled_return_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->DAMT->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return->DAMT->Name) { ?><?php if ($view_pharmacy_pharled_return_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacy_pharled_return_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->BATCHNO->Visible) { // BATCHNO ?>
	<?php if ($view_pharmacy_pharled_return->SortUrl($view_pharmacy_pharled_return->BATCHNO) == "") { ?>
		<th class="<?php echo $view_pharmacy_pharled_return->BATCHNO->headerCellClass() ?>"><?php echo $view_pharmacy_pharled_return->BATCHNO->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_pharled_return->BATCHNO->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacy_pharled_return->BATCHNO->Name ?>" data-sort-order="<?php echo $view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return->BATCHNO->Name && $view_pharmacy_pharled_return_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->BATCHNO->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return->BATCHNO->Name) { ?><?php if ($view_pharmacy_pharled_return_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacy_pharled_return_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->EXPDT->Visible) { // EXPDT ?>
	<?php if ($view_pharmacy_pharled_return->SortUrl($view_pharmacy_pharled_return->EXPDT) == "") { ?>
		<th class="<?php echo $view_pharmacy_pharled_return->EXPDT->headerCellClass() ?>"><?php echo $view_pharmacy_pharled_return->EXPDT->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_pharled_return->EXPDT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacy_pharled_return->EXPDT->Name ?>" data-sort-order="<?php echo $view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return->EXPDT->Name && $view_pharmacy_pharled_return_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->EXPDT->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return->EXPDT->Name) { ?><?php if ($view_pharmacy_pharled_return_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacy_pharled_return_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->Mfg->Visible) { // Mfg ?>
	<?php if ($view_pharmacy_pharled_return->SortUrl($view_pharmacy_pharled_return->Mfg) == "") { ?>
		<th class="<?php echo $view_pharmacy_pharled_return->Mfg->headerCellClass() ?>"><?php echo $view_pharmacy_pharled_return->Mfg->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_pharled_return->Mfg->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacy_pharled_return->Mfg->Name ?>" data-sort-order="<?php echo $view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return->Mfg->Name && $view_pharmacy_pharled_return_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->Mfg->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return->Mfg->Name) { ?><?php if ($view_pharmacy_pharled_return_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacy_pharled_return_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->UR->Visible) { // UR ?>
	<?php if ($view_pharmacy_pharled_return->SortUrl($view_pharmacy_pharled_return->UR) == "") { ?>
		<th class="<?php echo $view_pharmacy_pharled_return->UR->headerCellClass() ?>"><?php echo $view_pharmacy_pharled_return->UR->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_pharled_return->UR->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacy_pharled_return->UR->Name ?>" data-sort-order="<?php echo $view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return->UR->Name && $view_pharmacy_pharled_return_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->UR->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return->UR->Name) { ?><?php if ($view_pharmacy_pharled_return_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacy_pharled_return_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->_USERID->Visible) { // USERID ?>
	<?php if ($view_pharmacy_pharled_return->SortUrl($view_pharmacy_pharled_return->_USERID) == "") { ?>
		<th class="<?php echo $view_pharmacy_pharled_return->_USERID->headerCellClass() ?>"><?php echo $view_pharmacy_pharled_return->_USERID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_pharled_return->_USERID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacy_pharled_return->_USERID->Name ?>" data-sort-order="<?php echo $view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return->_USERID->Name && $view_pharmacy_pharled_return_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->_USERID->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return->_USERID->Name) { ?><?php if ($view_pharmacy_pharled_return_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacy_pharled_return_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->id->Visible) { // id ?>
	<?php if ($view_pharmacy_pharled_return->SortUrl($view_pharmacy_pharled_return->id) == "") { ?>
		<th class="<?php echo $view_pharmacy_pharled_return->id->headerCellClass() ?>"><?php echo $view_pharmacy_pharled_return->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_pharled_return->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacy_pharled_return->id->Name ?>" data-sort-order="<?php echo $view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return->id->Name && $view_pharmacy_pharled_return_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return->id->Name) { ?><?php if ($view_pharmacy_pharled_return_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacy_pharled_return_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->HosoID->Visible) { // HosoID ?>
	<?php if ($view_pharmacy_pharled_return->SortUrl($view_pharmacy_pharled_return->HosoID) == "") { ?>
		<th class="<?php echo $view_pharmacy_pharled_return->HosoID->headerCellClass() ?>"><?php echo $view_pharmacy_pharled_return->HosoID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_pharled_return->HosoID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacy_pharled_return->HosoID->Name ?>" data-sort-order="<?php echo $view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return->HosoID->Name && $view_pharmacy_pharled_return_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->HosoID->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return->HosoID->Name) { ?><?php if ($view_pharmacy_pharled_return_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacy_pharled_return_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->createdby->Visible) { // createdby ?>
	<?php if ($view_pharmacy_pharled_return->SortUrl($view_pharmacy_pharled_return->createdby) == "") { ?>
		<th class="<?php echo $view_pharmacy_pharled_return->createdby->headerCellClass() ?>"><?php echo $view_pharmacy_pharled_return->createdby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_pharled_return->createdby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacy_pharled_return->createdby->Name ?>" data-sort-order="<?php echo $view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return->createdby->Name && $view_pharmacy_pharled_return_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->createdby->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return->createdby->Name) { ?><?php if ($view_pharmacy_pharled_return_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacy_pharled_return_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_pharmacy_pharled_return->SortUrl($view_pharmacy_pharled_return->createddatetime) == "") { ?>
		<th class="<?php echo $view_pharmacy_pharled_return->createddatetime->headerCellClass() ?>"><?php echo $view_pharmacy_pharled_return->createddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_pharled_return->createddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacy_pharled_return->createddatetime->Name ?>" data-sort-order="<?php echo $view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return->createddatetime->Name && $view_pharmacy_pharled_return_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->createddatetime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return->createddatetime->Name) { ?><?php if ($view_pharmacy_pharled_return_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacy_pharled_return_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->modifiedby->Visible) { // modifiedby ?>
	<?php if ($view_pharmacy_pharled_return->SortUrl($view_pharmacy_pharled_return->modifiedby) == "") { ?>
		<th class="<?php echo $view_pharmacy_pharled_return->modifiedby->headerCellClass() ?>"><?php echo $view_pharmacy_pharled_return->modifiedby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_pharled_return->modifiedby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacy_pharled_return->modifiedby->Name ?>" data-sort-order="<?php echo $view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return->modifiedby->Name && $view_pharmacy_pharled_return_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->modifiedby->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return->modifiedby->Name) { ?><?php if ($view_pharmacy_pharled_return_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacy_pharled_return_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($view_pharmacy_pharled_return->SortUrl($view_pharmacy_pharled_return->modifieddatetime) == "") { ?>
		<th class="<?php echo $view_pharmacy_pharled_return->modifieddatetime->headerCellClass() ?>"><?php echo $view_pharmacy_pharled_return->modifieddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_pharled_return->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacy_pharled_return->modifieddatetime->Name ?>" data-sort-order="<?php echo $view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return->modifieddatetime->Name && $view_pharmacy_pharled_return_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->modifieddatetime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return->modifieddatetime->Name) { ?><?php if ($view_pharmacy_pharled_return_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacy_pharled_return_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->BRNAME->Visible) { // BRNAME ?>
	<?php if ($view_pharmacy_pharled_return->SortUrl($view_pharmacy_pharled_return->BRNAME) == "") { ?>
		<th class="<?php echo $view_pharmacy_pharled_return->BRNAME->headerCellClass() ?>"><?php echo $view_pharmacy_pharled_return->BRNAME->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_pharmacy_pharled_return->BRNAME->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_pharmacy_pharled_return->BRNAME->Name ?>" data-sort-order="<?php echo $view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return->BRNAME->Name && $view_pharmacy_pharled_return_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->BRNAME->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_preview->SortField == $view_pharmacy_pharled_return->BRNAME->Name) { ?><?php if ($view_pharmacy_pharled_return_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_pharmacy_pharled_return_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
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
$view_pharmacy_pharled_return_preview->RowCnt = 0;
while ($view_pharmacy_pharled_return_preview->Recordset && !$view_pharmacy_pharled_return_preview->Recordset->EOF) {

	// Init row class and style
	$view_pharmacy_pharled_return_preview->RecCount++;
	$view_pharmacy_pharled_return_preview->RowCnt++;
	$view_pharmacy_pharled_return_preview->CssStyle = "";
	$view_pharmacy_pharled_return_preview->loadListRowValues($view_pharmacy_pharled_return_preview->Recordset);

	// Render row
	$view_pharmacy_pharled_return_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$view_pharmacy_pharled_return_preview->resetAttributes();
	$view_pharmacy_pharled_return_preview->renderListRow();

	// Render list options
	$view_pharmacy_pharled_return_preview->renderListOptions();
?>
	<tr<?php echo $view_pharmacy_pharled_return_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_pharmacy_pharled_return_preview->ListOptions->render("body", "left", $view_pharmacy_pharled_return_preview->RowCnt);
?>
<?php if ($view_pharmacy_pharled_return->BRCODE->Visible) { // BRCODE ?>
		<!-- BRCODE -->
		<td<?php echo $view_pharmacy_pharled_return->BRCODE->cellAttributes() ?>>
<span<?php echo $view_pharmacy_pharled_return->BRCODE->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->BRCODE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->PRC->Visible) { // PRC ?>
		<!-- PRC -->
		<td<?php echo $view_pharmacy_pharled_return->PRC->cellAttributes() ?>>
<span<?php echo $view_pharmacy_pharled_return->PRC->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->PRC->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->SiNo->Visible) { // SiNo ?>
		<!-- SiNo -->
		<td<?php echo $view_pharmacy_pharled_return->SiNo->cellAttributes() ?>>
<span<?php echo $view_pharmacy_pharled_return->SiNo->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->SiNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->Product->Visible) { // Product ?>
		<!-- Product -->
		<td<?php echo $view_pharmacy_pharled_return->Product->cellAttributes() ?>>
<span<?php echo $view_pharmacy_pharled_return->Product->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->Product->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->SLNO->Visible) { // SLNO ?>
		<!-- SLNO -->
		<td<?php echo $view_pharmacy_pharled_return->SLNO->cellAttributes() ?>>
<span<?php echo $view_pharmacy_pharled_return->SLNO->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->SLNO->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RT->Visible) { // RT ?>
		<!-- RT -->
		<td<?php echo $view_pharmacy_pharled_return->RT->cellAttributes() ?>>
<span<?php echo $view_pharmacy_pharled_return->RT->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->RT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->MRQ->Visible) { // MRQ ?>
		<!-- MRQ -->
		<td<?php echo $view_pharmacy_pharled_return->MRQ->cellAttributes() ?>>
<span<?php echo $view_pharmacy_pharled_return->MRQ->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->MRQ->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->IQ->Visible) { // IQ ?>
		<!-- IQ -->
		<td<?php echo $view_pharmacy_pharled_return->IQ->cellAttributes() ?>>
<span<?php echo $view_pharmacy_pharled_return->IQ->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->IQ->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->DAMT->Visible) { // DAMT ?>
		<!-- DAMT -->
		<td<?php echo $view_pharmacy_pharled_return->DAMT->cellAttributes() ?>>
<span<?php echo $view_pharmacy_pharled_return->DAMT->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->DAMT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->BATCHNO->Visible) { // BATCHNO ?>
		<!-- BATCHNO -->
		<td<?php echo $view_pharmacy_pharled_return->BATCHNO->cellAttributes() ?>>
<span<?php echo $view_pharmacy_pharled_return->BATCHNO->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->BATCHNO->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->EXPDT->Visible) { // EXPDT ?>
		<!-- EXPDT -->
		<td<?php echo $view_pharmacy_pharled_return->EXPDT->cellAttributes() ?>>
<span<?php echo $view_pharmacy_pharled_return->EXPDT->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->EXPDT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->Mfg->Visible) { // Mfg ?>
		<!-- Mfg -->
		<td<?php echo $view_pharmacy_pharled_return->Mfg->cellAttributes() ?>>
<span<?php echo $view_pharmacy_pharled_return->Mfg->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->Mfg->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->UR->Visible) { // UR ?>
		<!-- UR -->
		<td<?php echo $view_pharmacy_pharled_return->UR->cellAttributes() ?>>
<span<?php echo $view_pharmacy_pharled_return->UR->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->UR->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->_USERID->Visible) { // USERID ?>
		<!-- USERID -->
		<td<?php echo $view_pharmacy_pharled_return->_USERID->cellAttributes() ?>>
<span<?php echo $view_pharmacy_pharled_return->_USERID->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->_USERID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $view_pharmacy_pharled_return->id->cellAttributes() ?>>
<span<?php echo $view_pharmacy_pharled_return->id->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->HosoID->Visible) { // HosoID ?>
		<!-- HosoID -->
		<td<?php echo $view_pharmacy_pharled_return->HosoID->cellAttributes() ?>>
<span<?php echo $view_pharmacy_pharled_return->HosoID->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->HosoID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->createdby->Visible) { // createdby ?>
		<!-- createdby -->
		<td<?php echo $view_pharmacy_pharled_return->createdby->cellAttributes() ?>>
<span<?php echo $view_pharmacy_pharled_return->createdby->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->createdby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->createddatetime->Visible) { // createddatetime ?>
		<!-- createddatetime -->
		<td<?php echo $view_pharmacy_pharled_return->createddatetime->cellAttributes() ?>>
<span<?php echo $view_pharmacy_pharled_return->createddatetime->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->createddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->modifiedby->Visible) { // modifiedby ?>
		<!-- modifiedby -->
		<td<?php echo $view_pharmacy_pharled_return->modifiedby->cellAttributes() ?>>
<span<?php echo $view_pharmacy_pharled_return->modifiedby->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->modifiedby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->modifieddatetime->Visible) { // modifieddatetime ?>
		<!-- modifieddatetime -->
		<td<?php echo $view_pharmacy_pharled_return->modifieddatetime->cellAttributes() ?>>
<span<?php echo $view_pharmacy_pharled_return->modifieddatetime->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->modifieddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->BRNAME->Visible) { // BRNAME ?>
		<!-- BRNAME -->
		<td<?php echo $view_pharmacy_pharled_return->BRNAME->cellAttributes() ?>>
<span<?php echo $view_pharmacy_pharled_return->BRNAME->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->BRNAME->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$view_pharmacy_pharled_return_preview->ListOptions->render("body", "right", $view_pharmacy_pharled_return_preview->RowCnt);
?>
	</tr>
<?php
	$view_pharmacy_pharled_return_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($view_pharmacy_pharled_return_preview->TotalRecs > 0) { ?>
<?php if (!isset($view_pharmacy_pharled_return_preview->Pager)) $view_pharmacy_pharled_return_preview->Pager = new PrevNextPager($view_pharmacy_pharled_return_preview->StartRec, $view_pharmacy_pharled_return_preview->DisplayRecs, $view_pharmacy_pharled_return_preview->TotalRecs) ?>
<?php if ($view_pharmacy_pharled_return_preview->Pager->RecordCount > 0 && $view_pharmacy_pharled_return_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($view_pharmacy_pharled_return_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $view_pharmacy_pharled_return_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($view_pharmacy_pharled_return_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $view_pharmacy_pharled_return_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($view_pharmacy_pharled_return_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $view_pharmacy_pharled_return_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($view_pharmacy_pharled_return_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $view_pharmacy_pharled_return_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_pharmacy_pharled_return_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_pharmacy_pharled_return_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_pharmacy_pharled_return_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($view_pharmacy_pharled_return_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$view_pharmacy_pharled_return_preview->showPageFooter();
if (DEBUG_ENABLED)
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
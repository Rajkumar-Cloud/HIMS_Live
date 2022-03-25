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
$pharmacy_pharled_preview = new pharmacy_pharled_preview();

// Run the page
$pharmacy_pharled_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_pharled_preview->Page_Render();
?>
<?php $pharmacy_pharled_preview->showPageHeader(); ?>
<div class="card ew-grid pharmacy_pharled"><!-- .card -->
<?php if ($pharmacy_pharled_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$pharmacy_pharled_preview->renderListOptions();

// Render list options (header, left)
$pharmacy_pharled_preview->ListOptions->render("header", "left");
?>
<?php if ($pharmacy_pharled->SiNo->Visible) { // SiNo ?>
	<?php if ($pharmacy_pharled->SortUrl($pharmacy_pharled->SiNo) == "") { ?>
		<th class="<?php echo $pharmacy_pharled->SiNo->headerCellClass() ?>"><?php echo $pharmacy_pharled->SiNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_pharled->SiNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_pharled->SiNo->Name ?>" data-sort-order="<?php echo $pharmacy_pharled_preview->SortField == $pharmacy_pharled->SiNo->Name && $pharmacy_pharled_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_pharled->SiNo->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_pharled_preview->SortField == $pharmacy_pharled->SiNo->Name) { ?><?php if ($pharmacy_pharled_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_pharled_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->SLNO->Visible) { // SLNO ?>
	<?php if ($pharmacy_pharled->SortUrl($pharmacy_pharled->SLNO) == "") { ?>
		<th class="<?php echo $pharmacy_pharled->SLNO->headerCellClass() ?>"><?php echo $pharmacy_pharled->SLNO->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_pharled->SLNO->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_pharled->SLNO->Name ?>" data-sort-order="<?php echo $pharmacy_pharled_preview->SortField == $pharmacy_pharled->SLNO->Name && $pharmacy_pharled_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_pharled->SLNO->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_pharled_preview->SortField == $pharmacy_pharled->SLNO->Name) { ?><?php if ($pharmacy_pharled_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_pharled_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->Product->Visible) { // Product ?>
	<?php if ($pharmacy_pharled->SortUrl($pharmacy_pharled->Product) == "") { ?>
		<th class="<?php echo $pharmacy_pharled->Product->headerCellClass() ?>"><?php echo $pharmacy_pharled->Product->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_pharled->Product->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_pharled->Product->Name ?>" data-sort-order="<?php echo $pharmacy_pharled_preview->SortField == $pharmacy_pharled->Product->Name && $pharmacy_pharled_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_pharled->Product->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_pharled_preview->SortField == $pharmacy_pharled->Product->Name) { ?><?php if ($pharmacy_pharled_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_pharled_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->RT->Visible) { // RT ?>
	<?php if ($pharmacy_pharled->SortUrl($pharmacy_pharled->RT) == "") { ?>
		<th class="<?php echo $pharmacy_pharled->RT->headerCellClass() ?>"><?php echo $pharmacy_pharled->RT->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_pharled->RT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_pharled->RT->Name ?>" data-sort-order="<?php echo $pharmacy_pharled_preview->SortField == $pharmacy_pharled->RT->Name && $pharmacy_pharled_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_pharled->RT->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_pharled_preview->SortField == $pharmacy_pharled->RT->Name) { ?><?php if ($pharmacy_pharled_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_pharled_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->IQ->Visible) { // IQ ?>
	<?php if ($pharmacy_pharled->SortUrl($pharmacy_pharled->IQ) == "") { ?>
		<th class="<?php echo $pharmacy_pharled->IQ->headerCellClass() ?>"><?php echo $pharmacy_pharled->IQ->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_pharled->IQ->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_pharled->IQ->Name ?>" data-sort-order="<?php echo $pharmacy_pharled_preview->SortField == $pharmacy_pharled->IQ->Name && $pharmacy_pharled_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_pharled->IQ->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_pharled_preview->SortField == $pharmacy_pharled->IQ->Name) { ?><?php if ($pharmacy_pharled_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_pharled_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->DAMT->Visible) { // DAMT ?>
	<?php if ($pharmacy_pharled->SortUrl($pharmacy_pharled->DAMT) == "") { ?>
		<th class="<?php echo $pharmacy_pharled->DAMT->headerCellClass() ?>"><?php echo $pharmacy_pharled->DAMT->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_pharled->DAMT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_pharled->DAMT->Name ?>" data-sort-order="<?php echo $pharmacy_pharled_preview->SortField == $pharmacy_pharled->DAMT->Name && $pharmacy_pharled_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_pharled->DAMT->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_pharled_preview->SortField == $pharmacy_pharled->DAMT->Name) { ?><?php if ($pharmacy_pharled_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_pharled_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->Mfg->Visible) { // Mfg ?>
	<?php if ($pharmacy_pharled->SortUrl($pharmacy_pharled->Mfg) == "") { ?>
		<th class="<?php echo $pharmacy_pharled->Mfg->headerCellClass() ?>"><?php echo $pharmacy_pharled->Mfg->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_pharled->Mfg->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_pharled->Mfg->Name ?>" data-sort-order="<?php echo $pharmacy_pharled_preview->SortField == $pharmacy_pharled->Mfg->Name && $pharmacy_pharled_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_pharled->Mfg->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_pharled_preview->SortField == $pharmacy_pharled->Mfg->Name) { ?><?php if ($pharmacy_pharled_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_pharled_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->EXPDT->Visible) { // EXPDT ?>
	<?php if ($pharmacy_pharled->SortUrl($pharmacy_pharled->EXPDT) == "") { ?>
		<th class="<?php echo $pharmacy_pharled->EXPDT->headerCellClass() ?>"><?php echo $pharmacy_pharled->EXPDT->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_pharled->EXPDT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_pharled->EXPDT->Name ?>" data-sort-order="<?php echo $pharmacy_pharled_preview->SortField == $pharmacy_pharled->EXPDT->Name && $pharmacy_pharled_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_pharled->EXPDT->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_pharled_preview->SortField == $pharmacy_pharled->EXPDT->Name) { ?><?php if ($pharmacy_pharled_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_pharled_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->BATCHNO->Visible) { // BATCHNO ?>
	<?php if ($pharmacy_pharled->SortUrl($pharmacy_pharled->BATCHNO) == "") { ?>
		<th class="<?php echo $pharmacy_pharled->BATCHNO->headerCellClass() ?>"><?php echo $pharmacy_pharled->BATCHNO->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_pharled->BATCHNO->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_pharled->BATCHNO->Name ?>" data-sort-order="<?php echo $pharmacy_pharled_preview->SortField == $pharmacy_pharled->BATCHNO->Name && $pharmacy_pharled_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_pharled->BATCHNO->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_pharled_preview->SortField == $pharmacy_pharled->BATCHNO->Name) { ?><?php if ($pharmacy_pharled_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_pharled_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->BRCODE->Visible) { // BRCODE ?>
	<?php if ($pharmacy_pharled->SortUrl($pharmacy_pharled->BRCODE) == "") { ?>
		<th class="<?php echo $pharmacy_pharled->BRCODE->headerCellClass() ?>"><?php echo $pharmacy_pharled->BRCODE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_pharled->BRCODE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_pharled->BRCODE->Name ?>" data-sort-order="<?php echo $pharmacy_pharled_preview->SortField == $pharmacy_pharled->BRCODE->Name && $pharmacy_pharled_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_pharled->BRCODE->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_pharled_preview->SortField == $pharmacy_pharled->BRCODE->Name) { ?><?php if ($pharmacy_pharled_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_pharled_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->PRC->Visible) { // PRC ?>
	<?php if ($pharmacy_pharled->SortUrl($pharmacy_pharled->PRC) == "") { ?>
		<th class="<?php echo $pharmacy_pharled->PRC->headerCellClass() ?>"><?php echo $pharmacy_pharled->PRC->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_pharled->PRC->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_pharled->PRC->Name ?>" data-sort-order="<?php echo $pharmacy_pharled_preview->SortField == $pharmacy_pharled->PRC->Name && $pharmacy_pharled_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_pharled->PRC->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_pharled_preview->SortField == $pharmacy_pharled->PRC->Name) { ?><?php if ($pharmacy_pharled_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_pharled_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->UR->Visible) { // UR ?>
	<?php if ($pharmacy_pharled->SortUrl($pharmacy_pharled->UR) == "") { ?>
		<th class="<?php echo $pharmacy_pharled->UR->headerCellClass() ?>"><?php echo $pharmacy_pharled->UR->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_pharled->UR->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_pharled->UR->Name ?>" data-sort-order="<?php echo $pharmacy_pharled_preview->SortField == $pharmacy_pharled->UR->Name && $pharmacy_pharled_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_pharled->UR->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_pharled_preview->SortField == $pharmacy_pharled->UR->Name) { ?><?php if ($pharmacy_pharled_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_pharled_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->_USERID->Visible) { // USERID ?>
	<?php if ($pharmacy_pharled->SortUrl($pharmacy_pharled->_USERID) == "") { ?>
		<th class="<?php echo $pharmacy_pharled->_USERID->headerCellClass() ?>"><?php echo $pharmacy_pharled->_USERID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_pharled->_USERID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_pharled->_USERID->Name ?>" data-sort-order="<?php echo $pharmacy_pharled_preview->SortField == $pharmacy_pharled->_USERID->Name && $pharmacy_pharled_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_pharled->_USERID->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_pharled_preview->SortField == $pharmacy_pharled->_USERID->Name) { ?><?php if ($pharmacy_pharled_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_pharled_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->id->Visible) { // id ?>
	<?php if ($pharmacy_pharled->SortUrl($pharmacy_pharled->id) == "") { ?>
		<th class="<?php echo $pharmacy_pharled->id->headerCellClass() ?>"><?php echo $pharmacy_pharled->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_pharled->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_pharled->id->Name ?>" data-sort-order="<?php echo $pharmacy_pharled_preview->SortField == $pharmacy_pharled->id->Name && $pharmacy_pharled_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_pharled->id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_pharled_preview->SortField == $pharmacy_pharled->id->Name) { ?><?php if ($pharmacy_pharled_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_pharled_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->HosoID->Visible) { // HosoID ?>
	<?php if ($pharmacy_pharled->SortUrl($pharmacy_pharled->HosoID) == "") { ?>
		<th class="<?php echo $pharmacy_pharled->HosoID->headerCellClass() ?>"><?php echo $pharmacy_pharled->HosoID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_pharled->HosoID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_pharled->HosoID->Name ?>" data-sort-order="<?php echo $pharmacy_pharled_preview->SortField == $pharmacy_pharled->HosoID->Name && $pharmacy_pharled_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_pharled->HosoID->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_pharled_preview->SortField == $pharmacy_pharled->HosoID->Name) { ?><?php if ($pharmacy_pharled_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_pharled_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->createdby->Visible) { // createdby ?>
	<?php if ($pharmacy_pharled->SortUrl($pharmacy_pharled->createdby) == "") { ?>
		<th class="<?php echo $pharmacy_pharled->createdby->headerCellClass() ?>"><?php echo $pharmacy_pharled->createdby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_pharled->createdby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_pharled->createdby->Name ?>" data-sort-order="<?php echo $pharmacy_pharled_preview->SortField == $pharmacy_pharled->createdby->Name && $pharmacy_pharled_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_pharled->createdby->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_pharled_preview->SortField == $pharmacy_pharled->createdby->Name) { ?><?php if ($pharmacy_pharled_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_pharled_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->createddatetime->Visible) { // createddatetime ?>
	<?php if ($pharmacy_pharled->SortUrl($pharmacy_pharled->createddatetime) == "") { ?>
		<th class="<?php echo $pharmacy_pharled->createddatetime->headerCellClass() ?>"><?php echo $pharmacy_pharled->createddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_pharled->createddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_pharled->createddatetime->Name ?>" data-sort-order="<?php echo $pharmacy_pharled_preview->SortField == $pharmacy_pharled->createddatetime->Name && $pharmacy_pharled_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_pharled->createddatetime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_pharled_preview->SortField == $pharmacy_pharled->createddatetime->Name) { ?><?php if ($pharmacy_pharled_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_pharled_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->modifiedby->Visible) { // modifiedby ?>
	<?php if ($pharmacy_pharled->SortUrl($pharmacy_pharled->modifiedby) == "") { ?>
		<th class="<?php echo $pharmacy_pharled->modifiedby->headerCellClass() ?>"><?php echo $pharmacy_pharled->modifiedby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_pharled->modifiedby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_pharled->modifiedby->Name ?>" data-sort-order="<?php echo $pharmacy_pharled_preview->SortField == $pharmacy_pharled->modifiedby->Name && $pharmacy_pharled_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_pharled->modifiedby->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_pharled_preview->SortField == $pharmacy_pharled->modifiedby->Name) { ?><?php if ($pharmacy_pharled_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_pharled_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($pharmacy_pharled->SortUrl($pharmacy_pharled->modifieddatetime) == "") { ?>
		<th class="<?php echo $pharmacy_pharled->modifieddatetime->headerCellClass() ?>"><?php echo $pharmacy_pharled->modifieddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_pharled->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_pharled->modifieddatetime->Name ?>" data-sort-order="<?php echo $pharmacy_pharled_preview->SortField == $pharmacy_pharled->modifieddatetime->Name && $pharmacy_pharled_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_pharled->modifieddatetime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_pharled_preview->SortField == $pharmacy_pharled->modifieddatetime->Name) { ?><?php if ($pharmacy_pharled_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_pharled_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->BRNAME->Visible) { // BRNAME ?>
	<?php if ($pharmacy_pharled->SortUrl($pharmacy_pharled->BRNAME) == "") { ?>
		<th class="<?php echo $pharmacy_pharled->BRNAME->headerCellClass() ?>"><?php echo $pharmacy_pharled->BRNAME->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_pharled->BRNAME->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_pharled->BRNAME->Name ?>" data-sort-order="<?php echo $pharmacy_pharled_preview->SortField == $pharmacy_pharled->BRNAME->Name && $pharmacy_pharled_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_pharled->BRNAME->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_pharled_preview->SortField == $pharmacy_pharled->BRNAME->Name) { ?><?php if ($pharmacy_pharled_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_pharled_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->baid->Visible) { // baid ?>
	<?php if ($pharmacy_pharled->SortUrl($pharmacy_pharled->baid) == "") { ?>
		<th class="<?php echo $pharmacy_pharled->baid->headerCellClass() ?>"><?php echo $pharmacy_pharled->baid->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_pharled->baid->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_pharled->baid->Name ?>" data-sort-order="<?php echo $pharmacy_pharled_preview->SortField == $pharmacy_pharled->baid->Name && $pharmacy_pharled_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_pharled->baid->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_pharled_preview->SortField == $pharmacy_pharled->baid->Name) { ?><?php if ($pharmacy_pharled_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_pharled_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->isdate->Visible) { // isdate ?>
	<?php if ($pharmacy_pharled->SortUrl($pharmacy_pharled->isdate) == "") { ?>
		<th class="<?php echo $pharmacy_pharled->isdate->headerCellClass() ?>"><?php echo $pharmacy_pharled->isdate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_pharled->isdate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_pharled->isdate->Name ?>" data-sort-order="<?php echo $pharmacy_pharled_preview->SortField == $pharmacy_pharled->isdate->Name && $pharmacy_pharled_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_pharled->isdate->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_pharled_preview->SortField == $pharmacy_pharled->isdate->Name) { ?><?php if ($pharmacy_pharled_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_pharled_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->PSGST->Visible) { // PSGST ?>
	<?php if ($pharmacy_pharled->SortUrl($pharmacy_pharled->PSGST) == "") { ?>
		<th class="<?php echo $pharmacy_pharled->PSGST->headerCellClass() ?>"><?php echo $pharmacy_pharled->PSGST->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_pharled->PSGST->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_pharled->PSGST->Name ?>" data-sort-order="<?php echo $pharmacy_pharled_preview->SortField == $pharmacy_pharled->PSGST->Name && $pharmacy_pharled_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_pharled->PSGST->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_pharled_preview->SortField == $pharmacy_pharled->PSGST->Name) { ?><?php if ($pharmacy_pharled_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_pharled_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->PCGST->Visible) { // PCGST ?>
	<?php if ($pharmacy_pharled->SortUrl($pharmacy_pharled->PCGST) == "") { ?>
		<th class="<?php echo $pharmacy_pharled->PCGST->headerCellClass() ?>"><?php echo $pharmacy_pharled->PCGST->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_pharled->PCGST->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_pharled->PCGST->Name ?>" data-sort-order="<?php echo $pharmacy_pharled_preview->SortField == $pharmacy_pharled->PCGST->Name && $pharmacy_pharled_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_pharled->PCGST->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_pharled_preview->SortField == $pharmacy_pharled->PCGST->Name) { ?><?php if ($pharmacy_pharled_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_pharled_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->SSGST->Visible) { // SSGST ?>
	<?php if ($pharmacy_pharled->SortUrl($pharmacy_pharled->SSGST) == "") { ?>
		<th class="<?php echo $pharmacy_pharled->SSGST->headerCellClass() ?>"><?php echo $pharmacy_pharled->SSGST->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_pharled->SSGST->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_pharled->SSGST->Name ?>" data-sort-order="<?php echo $pharmacy_pharled_preview->SortField == $pharmacy_pharled->SSGST->Name && $pharmacy_pharled_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_pharled->SSGST->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_pharled_preview->SortField == $pharmacy_pharled->SSGST->Name) { ?><?php if ($pharmacy_pharled_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_pharled_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->SCGST->Visible) { // SCGST ?>
	<?php if ($pharmacy_pharled->SortUrl($pharmacy_pharled->SCGST) == "") { ?>
		<th class="<?php echo $pharmacy_pharled->SCGST->headerCellClass() ?>"><?php echo $pharmacy_pharled->SCGST->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_pharled->SCGST->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_pharled->SCGST->Name ?>" data-sort-order="<?php echo $pharmacy_pharled_preview->SortField == $pharmacy_pharled->SCGST->Name && $pharmacy_pharled_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_pharled->SCGST->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_pharled_preview->SortField == $pharmacy_pharled->SCGST->Name) { ?><?php if ($pharmacy_pharled_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_pharled_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->PurValue->Visible) { // PurValue ?>
	<?php if ($pharmacy_pharled->SortUrl($pharmacy_pharled->PurValue) == "") { ?>
		<th class="<?php echo $pharmacy_pharled->PurValue->headerCellClass() ?>"><?php echo $pharmacy_pharled->PurValue->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_pharled->PurValue->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_pharled->PurValue->Name ?>" data-sort-order="<?php echo $pharmacy_pharled_preview->SortField == $pharmacy_pharled->PurValue->Name && $pharmacy_pharled_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_pharled->PurValue->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_pharled_preview->SortField == $pharmacy_pharled->PurValue->Name) { ?><?php if ($pharmacy_pharled_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_pharled_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->PurRate->Visible) { // PurRate ?>
	<?php if ($pharmacy_pharled->SortUrl($pharmacy_pharled->PurRate) == "") { ?>
		<th class="<?php echo $pharmacy_pharled->PurRate->headerCellClass() ?>"><?php echo $pharmacy_pharled->PurRate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_pharled->PurRate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_pharled->PurRate->Name ?>" data-sort-order="<?php echo $pharmacy_pharled_preview->SortField == $pharmacy_pharled->PurRate->Name && $pharmacy_pharled_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_pharled->PurRate->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_pharled_preview->SortField == $pharmacy_pharled->PurRate->Name) { ?><?php if ($pharmacy_pharled_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_pharled_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->PUnit->Visible) { // PUnit ?>
	<?php if ($pharmacy_pharled->SortUrl($pharmacy_pharled->PUnit) == "") { ?>
		<th class="<?php echo $pharmacy_pharled->PUnit->headerCellClass() ?>"><?php echo $pharmacy_pharled->PUnit->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_pharled->PUnit->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_pharled->PUnit->Name ?>" data-sort-order="<?php echo $pharmacy_pharled_preview->SortField == $pharmacy_pharled->PUnit->Name && $pharmacy_pharled_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_pharled->PUnit->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_pharled_preview->SortField == $pharmacy_pharled->PUnit->Name) { ?><?php if ($pharmacy_pharled_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_pharled_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->SUnit->Visible) { // SUnit ?>
	<?php if ($pharmacy_pharled->SortUrl($pharmacy_pharled->SUnit) == "") { ?>
		<th class="<?php echo $pharmacy_pharled->SUnit->headerCellClass() ?>"><?php echo $pharmacy_pharled->SUnit->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_pharled->SUnit->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_pharled->SUnit->Name ?>" data-sort-order="<?php echo $pharmacy_pharled_preview->SortField == $pharmacy_pharled->SUnit->Name && $pharmacy_pharled_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_pharled->SUnit->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_pharled_preview->SortField == $pharmacy_pharled->SUnit->Name) { ?><?php if ($pharmacy_pharled_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_pharled_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->HSNCODE->Visible) { // HSNCODE ?>
	<?php if ($pharmacy_pharled->SortUrl($pharmacy_pharled->HSNCODE) == "") { ?>
		<th class="<?php echo $pharmacy_pharled->HSNCODE->headerCellClass() ?>"><?php echo $pharmacy_pharled->HSNCODE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_pharled->HSNCODE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $pharmacy_pharled->HSNCODE->Name ?>" data-sort-order="<?php echo $pharmacy_pharled_preview->SortField == $pharmacy_pharled->HSNCODE->Name && $pharmacy_pharled_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $pharmacy_pharled->HSNCODE->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($pharmacy_pharled_preview->SortField == $pharmacy_pharled->HSNCODE->Name) { ?><?php if ($pharmacy_pharled_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($pharmacy_pharled_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pharmacy_pharled_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$pharmacy_pharled_preview->RecCount = 0;
$pharmacy_pharled_preview->RowCnt = 0;
while ($pharmacy_pharled_preview->Recordset && !$pharmacy_pharled_preview->Recordset->EOF) {

	// Init row class and style
	$pharmacy_pharled_preview->RecCount++;
	$pharmacy_pharled_preview->RowCnt++;
	$pharmacy_pharled_preview->CssStyle = "";
	$pharmacy_pharled_preview->loadListRowValues($pharmacy_pharled_preview->Recordset);

	// Render row
	$pharmacy_pharled_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$pharmacy_pharled_preview->resetAttributes();
	$pharmacy_pharled_preview->renderListRow();

	// Render list options
	$pharmacy_pharled_preview->renderListOptions();
?>
	<tr<?php echo $pharmacy_pharled_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_pharled_preview->ListOptions->render("body", "left", $pharmacy_pharled_preview->RowCnt);
?>
<?php if ($pharmacy_pharled->SiNo->Visible) { // SiNo ?>
		<!-- SiNo -->
		<td<?php echo $pharmacy_pharled->SiNo->cellAttributes() ?>>
<span<?php echo $pharmacy_pharled->SiNo->viewAttributes() ?>>
<?php echo $pharmacy_pharled->SiNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled->SLNO->Visible) { // SLNO ?>
		<!-- SLNO -->
		<td<?php echo $pharmacy_pharled->SLNO->cellAttributes() ?>>
<span<?php echo $pharmacy_pharled->SLNO->viewAttributes() ?>>
<?php echo $pharmacy_pharled->SLNO->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled->Product->Visible) { // Product ?>
		<!-- Product -->
		<td<?php echo $pharmacy_pharled->Product->cellAttributes() ?>>
<span<?php echo $pharmacy_pharled->Product->viewAttributes() ?>>
<?php echo $pharmacy_pharled->Product->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled->RT->Visible) { // RT ?>
		<!-- RT -->
		<td<?php echo $pharmacy_pharled->RT->cellAttributes() ?>>
<span<?php echo $pharmacy_pharled->RT->viewAttributes() ?>>
<?php echo $pharmacy_pharled->RT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled->IQ->Visible) { // IQ ?>
		<!-- IQ -->
		<td<?php echo $pharmacy_pharled->IQ->cellAttributes() ?>>
<span<?php echo $pharmacy_pharled->IQ->viewAttributes() ?>>
<?php echo $pharmacy_pharled->IQ->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled->DAMT->Visible) { // DAMT ?>
		<!-- DAMT -->
		<td<?php echo $pharmacy_pharled->DAMT->cellAttributes() ?>>
<span<?php echo $pharmacy_pharled->DAMT->viewAttributes() ?>>
<?php echo $pharmacy_pharled->DAMT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled->Mfg->Visible) { // Mfg ?>
		<!-- Mfg -->
		<td<?php echo $pharmacy_pharled->Mfg->cellAttributes() ?>>
<span<?php echo $pharmacy_pharled->Mfg->viewAttributes() ?>>
<?php echo $pharmacy_pharled->Mfg->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled->EXPDT->Visible) { // EXPDT ?>
		<!-- EXPDT -->
		<td<?php echo $pharmacy_pharled->EXPDT->cellAttributes() ?>>
<span<?php echo $pharmacy_pharled->EXPDT->viewAttributes() ?>>
<?php echo $pharmacy_pharled->EXPDT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled->BATCHNO->Visible) { // BATCHNO ?>
		<!-- BATCHNO -->
		<td<?php echo $pharmacy_pharled->BATCHNO->cellAttributes() ?>>
<span<?php echo $pharmacy_pharled->BATCHNO->viewAttributes() ?>>
<?php echo $pharmacy_pharled->BATCHNO->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled->BRCODE->Visible) { // BRCODE ?>
		<!-- BRCODE -->
		<td<?php echo $pharmacy_pharled->BRCODE->cellAttributes() ?>>
<span<?php echo $pharmacy_pharled->BRCODE->viewAttributes() ?>>
<?php echo $pharmacy_pharled->BRCODE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled->PRC->Visible) { // PRC ?>
		<!-- PRC -->
		<td<?php echo $pharmacy_pharled->PRC->cellAttributes() ?>>
<span<?php echo $pharmacy_pharled->PRC->viewAttributes() ?>>
<?php echo $pharmacy_pharled->PRC->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled->UR->Visible) { // UR ?>
		<!-- UR -->
		<td<?php echo $pharmacy_pharled->UR->cellAttributes() ?>>
<span<?php echo $pharmacy_pharled->UR->viewAttributes() ?>>
<?php echo $pharmacy_pharled->UR->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled->_USERID->Visible) { // USERID ?>
		<!-- USERID -->
		<td<?php echo $pharmacy_pharled->_USERID->cellAttributes() ?>>
<span<?php echo $pharmacy_pharled->_USERID->viewAttributes() ?>>
<?php echo $pharmacy_pharled->_USERID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $pharmacy_pharled->id->cellAttributes() ?>>
<span<?php echo $pharmacy_pharled->id->viewAttributes() ?>>
<?php echo $pharmacy_pharled->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled->HosoID->Visible) { // HosoID ?>
		<!-- HosoID -->
		<td<?php echo $pharmacy_pharled->HosoID->cellAttributes() ?>>
<span<?php echo $pharmacy_pharled->HosoID->viewAttributes() ?>>
<?php echo $pharmacy_pharled->HosoID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled->createdby->Visible) { // createdby ?>
		<!-- createdby -->
		<td<?php echo $pharmacy_pharled->createdby->cellAttributes() ?>>
<span<?php echo $pharmacy_pharled->createdby->viewAttributes() ?>>
<?php echo $pharmacy_pharled->createdby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled->createddatetime->Visible) { // createddatetime ?>
		<!-- createddatetime -->
		<td<?php echo $pharmacy_pharled->createddatetime->cellAttributes() ?>>
<span<?php echo $pharmacy_pharled->createddatetime->viewAttributes() ?>>
<?php echo $pharmacy_pharled->createddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled->modifiedby->Visible) { // modifiedby ?>
		<!-- modifiedby -->
		<td<?php echo $pharmacy_pharled->modifiedby->cellAttributes() ?>>
<span<?php echo $pharmacy_pharled->modifiedby->viewAttributes() ?>>
<?php echo $pharmacy_pharled->modifiedby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled->modifieddatetime->Visible) { // modifieddatetime ?>
		<!-- modifieddatetime -->
		<td<?php echo $pharmacy_pharled->modifieddatetime->cellAttributes() ?>>
<span<?php echo $pharmacy_pharled->modifieddatetime->viewAttributes() ?>>
<?php echo $pharmacy_pharled->modifieddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled->BRNAME->Visible) { // BRNAME ?>
		<!-- BRNAME -->
		<td<?php echo $pharmacy_pharled->BRNAME->cellAttributes() ?>>
<span<?php echo $pharmacy_pharled->BRNAME->viewAttributes() ?>>
<?php echo $pharmacy_pharled->BRNAME->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled->baid->Visible) { // baid ?>
		<!-- baid -->
		<td<?php echo $pharmacy_pharled->baid->cellAttributes() ?>>
<span<?php echo $pharmacy_pharled->baid->viewAttributes() ?>>
<?php echo $pharmacy_pharled->baid->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled->isdate->Visible) { // isdate ?>
		<!-- isdate -->
		<td<?php echo $pharmacy_pharled->isdate->cellAttributes() ?>>
<span<?php echo $pharmacy_pharled->isdate->viewAttributes() ?>>
<?php echo $pharmacy_pharled->isdate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled->PSGST->Visible) { // PSGST ?>
		<!-- PSGST -->
		<td<?php echo $pharmacy_pharled->PSGST->cellAttributes() ?>>
<span<?php echo $pharmacy_pharled->PSGST->viewAttributes() ?>>
<?php echo $pharmacy_pharled->PSGST->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled->PCGST->Visible) { // PCGST ?>
		<!-- PCGST -->
		<td<?php echo $pharmacy_pharled->PCGST->cellAttributes() ?>>
<span<?php echo $pharmacy_pharled->PCGST->viewAttributes() ?>>
<?php echo $pharmacy_pharled->PCGST->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled->SSGST->Visible) { // SSGST ?>
		<!-- SSGST -->
		<td<?php echo $pharmacy_pharled->SSGST->cellAttributes() ?>>
<span<?php echo $pharmacy_pharled->SSGST->viewAttributes() ?>>
<?php echo $pharmacy_pharled->SSGST->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled->SCGST->Visible) { // SCGST ?>
		<!-- SCGST -->
		<td<?php echo $pharmacy_pharled->SCGST->cellAttributes() ?>>
<span<?php echo $pharmacy_pharled->SCGST->viewAttributes() ?>>
<?php echo $pharmacy_pharled->SCGST->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled->PurValue->Visible) { // PurValue ?>
		<!-- PurValue -->
		<td<?php echo $pharmacy_pharled->PurValue->cellAttributes() ?>>
<span<?php echo $pharmacy_pharled->PurValue->viewAttributes() ?>>
<?php echo $pharmacy_pharled->PurValue->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled->PurRate->Visible) { // PurRate ?>
		<!-- PurRate -->
		<td<?php echo $pharmacy_pharled->PurRate->cellAttributes() ?>>
<span<?php echo $pharmacy_pharled->PurRate->viewAttributes() ?>>
<?php echo $pharmacy_pharled->PurRate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled->PUnit->Visible) { // PUnit ?>
		<!-- PUnit -->
		<td<?php echo $pharmacy_pharled->PUnit->cellAttributes() ?>>
<span<?php echo $pharmacy_pharled->PUnit->viewAttributes() ?>>
<?php echo $pharmacy_pharled->PUnit->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled->SUnit->Visible) { // SUnit ?>
		<!-- SUnit -->
		<td<?php echo $pharmacy_pharled->SUnit->cellAttributes() ?>>
<span<?php echo $pharmacy_pharled->SUnit->viewAttributes() ?>>
<?php echo $pharmacy_pharled->SUnit->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled->HSNCODE->Visible) { // HSNCODE ?>
		<!-- HSNCODE -->
		<td<?php echo $pharmacy_pharled->HSNCODE->cellAttributes() ?>>
<span<?php echo $pharmacy_pharled->HSNCODE->viewAttributes() ?>>
<?php echo $pharmacy_pharled->HSNCODE->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_pharled_preview->ListOptions->render("body", "right", $pharmacy_pharled_preview->RowCnt);
?>
	</tr>
<?php
	$pharmacy_pharled_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($pharmacy_pharled_preview->TotalRecs > 0) { ?>
<?php if (!isset($pharmacy_pharled_preview->Pager)) $pharmacy_pharled_preview->Pager = new PrevNextPager($pharmacy_pharled_preview->StartRec, $pharmacy_pharled_preview->DisplayRecs, $pharmacy_pharled_preview->TotalRecs) ?>
<?php if ($pharmacy_pharled_preview->Pager->RecordCount > 0 && $pharmacy_pharled_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($pharmacy_pharled_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $pharmacy_pharled_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($pharmacy_pharled_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $pharmacy_pharled_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($pharmacy_pharled_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $pharmacy_pharled_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($pharmacy_pharled_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $pharmacy_pharled_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $pharmacy_pharled_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $pharmacy_pharled_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $pharmacy_pharled_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($pharmacy_pharled_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$pharmacy_pharled_preview->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php
if ($pharmacy_pharled_preview->Recordset)
	$pharmacy_pharled_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$pharmacy_pharled_preview->terminate();
?>
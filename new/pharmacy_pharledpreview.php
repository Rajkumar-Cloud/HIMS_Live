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
<?php if ($pharmacy_pharled_preview->TotalRecords > 0) { ?>
<div class="card ew-grid pharmacy_pharled"><!-- .card -->
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel ew-preview-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$pharmacy_pharled_preview->renderListOptions();

// Render list options (header, left)
$pharmacy_pharled_preview->ListOptions->render("header", "left");
?>
<?php if ($pharmacy_pharled_preview->SiNo->Visible) { // SiNo ?>
	<?php if ($pharmacy_pharled->SortUrl($pharmacy_pharled_preview->SiNo) == "") { ?>
		<th class="<?php echo $pharmacy_pharled_preview->SiNo->headerCellClass() ?>"><?php echo $pharmacy_pharled_preview->SiNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_pharled_preview->SiNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($pharmacy_pharled_preview->SiNo->Name) ?>" data-sort-order="<?php echo $pharmacy_pharled_preview->SortField == $pharmacy_pharled_preview->SiNo->Name && $pharmacy_pharled_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled_preview->SiNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled_preview->SortField == $pharmacy_pharled_preview->SiNo->Name) { ?><?php if ($pharmacy_pharled_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_pharled_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled_preview->SLNO->Visible) { // SLNO ?>
	<?php if ($pharmacy_pharled->SortUrl($pharmacy_pharled_preview->SLNO) == "") { ?>
		<th class="<?php echo $pharmacy_pharled_preview->SLNO->headerCellClass() ?>"><?php echo $pharmacy_pharled_preview->SLNO->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_pharled_preview->SLNO->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($pharmacy_pharled_preview->SLNO->Name) ?>" data-sort-order="<?php echo $pharmacy_pharled_preview->SortField == $pharmacy_pharled_preview->SLNO->Name && $pharmacy_pharled_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled_preview->SLNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled_preview->SortField == $pharmacy_pharled_preview->SLNO->Name) { ?><?php if ($pharmacy_pharled_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_pharled_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled_preview->Product->Visible) { // Product ?>
	<?php if ($pharmacy_pharled->SortUrl($pharmacy_pharled_preview->Product) == "") { ?>
		<th class="<?php echo $pharmacy_pharled_preview->Product->headerCellClass() ?>"><?php echo $pharmacy_pharled_preview->Product->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_pharled_preview->Product->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($pharmacy_pharled_preview->Product->Name) ?>" data-sort-order="<?php echo $pharmacy_pharled_preview->SortField == $pharmacy_pharled_preview->Product->Name && $pharmacy_pharled_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled_preview->Product->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled_preview->SortField == $pharmacy_pharled_preview->Product->Name) { ?><?php if ($pharmacy_pharled_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_pharled_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled_preview->RT->Visible) { // RT ?>
	<?php if ($pharmacy_pharled->SortUrl($pharmacy_pharled_preview->RT) == "") { ?>
		<th class="<?php echo $pharmacy_pharled_preview->RT->headerCellClass() ?>"><?php echo $pharmacy_pharled_preview->RT->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_pharled_preview->RT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($pharmacy_pharled_preview->RT->Name) ?>" data-sort-order="<?php echo $pharmacy_pharled_preview->SortField == $pharmacy_pharled_preview->RT->Name && $pharmacy_pharled_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled_preview->RT->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled_preview->SortField == $pharmacy_pharled_preview->RT->Name) { ?><?php if ($pharmacy_pharled_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_pharled_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled_preview->IQ->Visible) { // IQ ?>
	<?php if ($pharmacy_pharled->SortUrl($pharmacy_pharled_preview->IQ) == "") { ?>
		<th class="<?php echo $pharmacy_pharled_preview->IQ->headerCellClass() ?>"><?php echo $pharmacy_pharled_preview->IQ->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_pharled_preview->IQ->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($pharmacy_pharled_preview->IQ->Name) ?>" data-sort-order="<?php echo $pharmacy_pharled_preview->SortField == $pharmacy_pharled_preview->IQ->Name && $pharmacy_pharled_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled_preview->IQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled_preview->SortField == $pharmacy_pharled_preview->IQ->Name) { ?><?php if ($pharmacy_pharled_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_pharled_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled_preview->DAMT->Visible) { // DAMT ?>
	<?php if ($pharmacy_pharled->SortUrl($pharmacy_pharled_preview->DAMT) == "") { ?>
		<th class="<?php echo $pharmacy_pharled_preview->DAMT->headerCellClass() ?>"><?php echo $pharmacy_pharled_preview->DAMT->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_pharled_preview->DAMT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($pharmacy_pharled_preview->DAMT->Name) ?>" data-sort-order="<?php echo $pharmacy_pharled_preview->SortField == $pharmacy_pharled_preview->DAMT->Name && $pharmacy_pharled_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled_preview->DAMT->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled_preview->SortField == $pharmacy_pharled_preview->DAMT->Name) { ?><?php if ($pharmacy_pharled_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_pharled_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled_preview->Mfg->Visible) { // Mfg ?>
	<?php if ($pharmacy_pharled->SortUrl($pharmacy_pharled_preview->Mfg) == "") { ?>
		<th class="<?php echo $pharmacy_pharled_preview->Mfg->headerCellClass() ?>"><?php echo $pharmacy_pharled_preview->Mfg->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_pharled_preview->Mfg->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($pharmacy_pharled_preview->Mfg->Name) ?>" data-sort-order="<?php echo $pharmacy_pharled_preview->SortField == $pharmacy_pharled_preview->Mfg->Name && $pharmacy_pharled_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled_preview->Mfg->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled_preview->SortField == $pharmacy_pharled_preview->Mfg->Name) { ?><?php if ($pharmacy_pharled_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_pharled_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled_preview->EXPDT->Visible) { // EXPDT ?>
	<?php if ($pharmacy_pharled->SortUrl($pharmacy_pharled_preview->EXPDT) == "") { ?>
		<th class="<?php echo $pharmacy_pharled_preview->EXPDT->headerCellClass() ?>"><?php echo $pharmacy_pharled_preview->EXPDT->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_pharled_preview->EXPDT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($pharmacy_pharled_preview->EXPDT->Name) ?>" data-sort-order="<?php echo $pharmacy_pharled_preview->SortField == $pharmacy_pharled_preview->EXPDT->Name && $pharmacy_pharled_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled_preview->EXPDT->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled_preview->SortField == $pharmacy_pharled_preview->EXPDT->Name) { ?><?php if ($pharmacy_pharled_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_pharled_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled_preview->BATCHNO->Visible) { // BATCHNO ?>
	<?php if ($pharmacy_pharled->SortUrl($pharmacy_pharled_preview->BATCHNO) == "") { ?>
		<th class="<?php echo $pharmacy_pharled_preview->BATCHNO->headerCellClass() ?>"><?php echo $pharmacy_pharled_preview->BATCHNO->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_pharled_preview->BATCHNO->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($pharmacy_pharled_preview->BATCHNO->Name) ?>" data-sort-order="<?php echo $pharmacy_pharled_preview->SortField == $pharmacy_pharled_preview->BATCHNO->Name && $pharmacy_pharled_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled_preview->BATCHNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled_preview->SortField == $pharmacy_pharled_preview->BATCHNO->Name) { ?><?php if ($pharmacy_pharled_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_pharled_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled_preview->BRCODE->Visible) { // BRCODE ?>
	<?php if ($pharmacy_pharled->SortUrl($pharmacy_pharled_preview->BRCODE) == "") { ?>
		<th class="<?php echo $pharmacy_pharled_preview->BRCODE->headerCellClass() ?>"><?php echo $pharmacy_pharled_preview->BRCODE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_pharled_preview->BRCODE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($pharmacy_pharled_preview->BRCODE->Name) ?>" data-sort-order="<?php echo $pharmacy_pharled_preview->SortField == $pharmacy_pharled_preview->BRCODE->Name && $pharmacy_pharled_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled_preview->BRCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled_preview->SortField == $pharmacy_pharled_preview->BRCODE->Name) { ?><?php if ($pharmacy_pharled_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_pharled_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled_preview->PRC->Visible) { // PRC ?>
	<?php if ($pharmacy_pharled->SortUrl($pharmacy_pharled_preview->PRC) == "") { ?>
		<th class="<?php echo $pharmacy_pharled_preview->PRC->headerCellClass() ?>"><?php echo $pharmacy_pharled_preview->PRC->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_pharled_preview->PRC->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($pharmacy_pharled_preview->PRC->Name) ?>" data-sort-order="<?php echo $pharmacy_pharled_preview->SortField == $pharmacy_pharled_preview->PRC->Name && $pharmacy_pharled_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled_preview->PRC->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled_preview->SortField == $pharmacy_pharled_preview->PRC->Name) { ?><?php if ($pharmacy_pharled_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_pharled_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled_preview->UR->Visible) { // UR ?>
	<?php if ($pharmacy_pharled->SortUrl($pharmacy_pharled_preview->UR) == "") { ?>
		<th class="<?php echo $pharmacy_pharled_preview->UR->headerCellClass() ?>"><?php echo $pharmacy_pharled_preview->UR->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_pharled_preview->UR->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($pharmacy_pharled_preview->UR->Name) ?>" data-sort-order="<?php echo $pharmacy_pharled_preview->SortField == $pharmacy_pharled_preview->UR->Name && $pharmacy_pharled_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled_preview->UR->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled_preview->SortField == $pharmacy_pharled_preview->UR->Name) { ?><?php if ($pharmacy_pharled_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_pharled_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled_preview->_USERID->Visible) { // USERID ?>
	<?php if ($pharmacy_pharled->SortUrl($pharmacy_pharled_preview->_USERID) == "") { ?>
		<th class="<?php echo $pharmacy_pharled_preview->_USERID->headerCellClass() ?>"><?php echo $pharmacy_pharled_preview->_USERID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_pharled_preview->_USERID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($pharmacy_pharled_preview->_USERID->Name) ?>" data-sort-order="<?php echo $pharmacy_pharled_preview->SortField == $pharmacy_pharled_preview->_USERID->Name && $pharmacy_pharled_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled_preview->_USERID->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled_preview->SortField == $pharmacy_pharled_preview->_USERID->Name) { ?><?php if ($pharmacy_pharled_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_pharled_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled_preview->id->Visible) { // id ?>
	<?php if ($pharmacy_pharled->SortUrl($pharmacy_pharled_preview->id) == "") { ?>
		<th class="<?php echo $pharmacy_pharled_preview->id->headerCellClass() ?>"><?php echo $pharmacy_pharled_preview->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_pharled_preview->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($pharmacy_pharled_preview->id->Name) ?>" data-sort-order="<?php echo $pharmacy_pharled_preview->SortField == $pharmacy_pharled_preview->id->Name && $pharmacy_pharled_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled_preview->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled_preview->SortField == $pharmacy_pharled_preview->id->Name) { ?><?php if ($pharmacy_pharled_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_pharled_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled_preview->HosoID->Visible) { // HosoID ?>
	<?php if ($pharmacy_pharled->SortUrl($pharmacy_pharled_preview->HosoID) == "") { ?>
		<th class="<?php echo $pharmacy_pharled_preview->HosoID->headerCellClass() ?>"><?php echo $pharmacy_pharled_preview->HosoID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_pharled_preview->HosoID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($pharmacy_pharled_preview->HosoID->Name) ?>" data-sort-order="<?php echo $pharmacy_pharled_preview->SortField == $pharmacy_pharled_preview->HosoID->Name && $pharmacy_pharled_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled_preview->HosoID->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled_preview->SortField == $pharmacy_pharled_preview->HosoID->Name) { ?><?php if ($pharmacy_pharled_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_pharled_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled_preview->createdby->Visible) { // createdby ?>
	<?php if ($pharmacy_pharled->SortUrl($pharmacy_pharled_preview->createdby) == "") { ?>
		<th class="<?php echo $pharmacy_pharled_preview->createdby->headerCellClass() ?>"><?php echo $pharmacy_pharled_preview->createdby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_pharled_preview->createdby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($pharmacy_pharled_preview->createdby->Name) ?>" data-sort-order="<?php echo $pharmacy_pharled_preview->SortField == $pharmacy_pharled_preview->createdby->Name && $pharmacy_pharled_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled_preview->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled_preview->SortField == $pharmacy_pharled_preview->createdby->Name) { ?><?php if ($pharmacy_pharled_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_pharled_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled_preview->createddatetime->Visible) { // createddatetime ?>
	<?php if ($pharmacy_pharled->SortUrl($pharmacy_pharled_preview->createddatetime) == "") { ?>
		<th class="<?php echo $pharmacy_pharled_preview->createddatetime->headerCellClass() ?>"><?php echo $pharmacy_pharled_preview->createddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_pharled_preview->createddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($pharmacy_pharled_preview->createddatetime->Name) ?>" data-sort-order="<?php echo $pharmacy_pharled_preview->SortField == $pharmacy_pharled_preview->createddatetime->Name && $pharmacy_pharled_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled_preview->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled_preview->SortField == $pharmacy_pharled_preview->createddatetime->Name) { ?><?php if ($pharmacy_pharled_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_pharled_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled_preview->modifiedby->Visible) { // modifiedby ?>
	<?php if ($pharmacy_pharled->SortUrl($pharmacy_pharled_preview->modifiedby) == "") { ?>
		<th class="<?php echo $pharmacy_pharled_preview->modifiedby->headerCellClass() ?>"><?php echo $pharmacy_pharled_preview->modifiedby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_pharled_preview->modifiedby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($pharmacy_pharled_preview->modifiedby->Name) ?>" data-sort-order="<?php echo $pharmacy_pharled_preview->SortField == $pharmacy_pharled_preview->modifiedby->Name && $pharmacy_pharled_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled_preview->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled_preview->SortField == $pharmacy_pharled_preview->modifiedby->Name) { ?><?php if ($pharmacy_pharled_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_pharled_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled_preview->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($pharmacy_pharled->SortUrl($pharmacy_pharled_preview->modifieddatetime) == "") { ?>
		<th class="<?php echo $pharmacy_pharled_preview->modifieddatetime->headerCellClass() ?>"><?php echo $pharmacy_pharled_preview->modifieddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_pharled_preview->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($pharmacy_pharled_preview->modifieddatetime->Name) ?>" data-sort-order="<?php echo $pharmacy_pharled_preview->SortField == $pharmacy_pharled_preview->modifieddatetime->Name && $pharmacy_pharled_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled_preview->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled_preview->SortField == $pharmacy_pharled_preview->modifieddatetime->Name) { ?><?php if ($pharmacy_pharled_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_pharled_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled_preview->BRNAME->Visible) { // BRNAME ?>
	<?php if ($pharmacy_pharled->SortUrl($pharmacy_pharled_preview->BRNAME) == "") { ?>
		<th class="<?php echo $pharmacy_pharled_preview->BRNAME->headerCellClass() ?>"><?php echo $pharmacy_pharled_preview->BRNAME->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $pharmacy_pharled_preview->BRNAME->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($pharmacy_pharled_preview->BRNAME->Name) ?>" data-sort-order="<?php echo $pharmacy_pharled_preview->SortField == $pharmacy_pharled_preview->BRNAME->Name && $pharmacy_pharled_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled_preview->BRNAME->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled_preview->SortField == $pharmacy_pharled_preview->BRNAME->Name) { ?><?php if ($pharmacy_pharled_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_pharled_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
$pharmacy_pharled_preview->RowCount = 0;
while ($pharmacy_pharled_preview->Recordset && !$pharmacy_pharled_preview->Recordset->EOF) {

	// Init row class and style
	$pharmacy_pharled_preview->RecCount++;
	$pharmacy_pharled_preview->RowCount++;
	$pharmacy_pharled_preview->CssStyle = "";
	$pharmacy_pharled_preview->loadListRowValues($pharmacy_pharled_preview->Recordset);

	// Render row
	$pharmacy_pharled->RowType = ROWTYPE_PREVIEW; // Preview record
	$pharmacy_pharled_preview->resetAttributes();
	$pharmacy_pharled_preview->renderListRow();

	// Render list options
	$pharmacy_pharled_preview->renderListOptions();
?>
	<tr <?php echo $pharmacy_pharled->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_pharled_preview->ListOptions->render("body", "left", $pharmacy_pharled_preview->RowCount);
?>
<?php if ($pharmacy_pharled_preview->SiNo->Visible) { // SiNo ?>
		<!-- SiNo -->
		<td<?php echo $pharmacy_pharled_preview->SiNo->cellAttributes() ?>>
<span<?php echo $pharmacy_pharled_preview->SiNo->viewAttributes() ?>><?php echo $pharmacy_pharled_preview->SiNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled_preview->SLNO->Visible) { // SLNO ?>
		<!-- SLNO -->
		<td<?php echo $pharmacy_pharled_preview->SLNO->cellAttributes() ?>>
<span<?php echo $pharmacy_pharled_preview->SLNO->viewAttributes() ?>><?php echo $pharmacy_pharled_preview->SLNO->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled_preview->Product->Visible) { // Product ?>
		<!-- Product -->
		<td<?php echo $pharmacy_pharled_preview->Product->cellAttributes() ?>>
<span<?php echo $pharmacy_pharled_preview->Product->viewAttributes() ?>><?php echo $pharmacy_pharled_preview->Product->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled_preview->RT->Visible) { // RT ?>
		<!-- RT -->
		<td<?php echo $pharmacy_pharled_preview->RT->cellAttributes() ?>>
<span<?php echo $pharmacy_pharled_preview->RT->viewAttributes() ?>><?php echo $pharmacy_pharled_preview->RT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled_preview->IQ->Visible) { // IQ ?>
		<!-- IQ -->
		<td<?php echo $pharmacy_pharled_preview->IQ->cellAttributes() ?>>
<span<?php echo $pharmacy_pharled_preview->IQ->viewAttributes() ?>><?php echo $pharmacy_pharled_preview->IQ->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled_preview->DAMT->Visible) { // DAMT ?>
		<!-- DAMT -->
		<td<?php echo $pharmacy_pharled_preview->DAMT->cellAttributes() ?>>
<span<?php echo $pharmacy_pharled_preview->DAMT->viewAttributes() ?>><?php echo $pharmacy_pharled_preview->DAMT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled_preview->Mfg->Visible) { // Mfg ?>
		<!-- Mfg -->
		<td<?php echo $pharmacy_pharled_preview->Mfg->cellAttributes() ?>>
<span<?php echo $pharmacy_pharled_preview->Mfg->viewAttributes() ?>><?php echo $pharmacy_pharled_preview->Mfg->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled_preview->EXPDT->Visible) { // EXPDT ?>
		<!-- EXPDT -->
		<td<?php echo $pharmacy_pharled_preview->EXPDT->cellAttributes() ?>>
<span<?php echo $pharmacy_pharled_preview->EXPDT->viewAttributes() ?>><?php echo $pharmacy_pharled_preview->EXPDT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled_preview->BATCHNO->Visible) { // BATCHNO ?>
		<!-- BATCHNO -->
		<td<?php echo $pharmacy_pharled_preview->BATCHNO->cellAttributes() ?>>
<span<?php echo $pharmacy_pharled_preview->BATCHNO->viewAttributes() ?>><?php echo $pharmacy_pharled_preview->BATCHNO->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled_preview->BRCODE->Visible) { // BRCODE ?>
		<!-- BRCODE -->
		<td<?php echo $pharmacy_pharled_preview->BRCODE->cellAttributes() ?>>
<span<?php echo $pharmacy_pharled_preview->BRCODE->viewAttributes() ?>><?php echo $pharmacy_pharled_preview->BRCODE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled_preview->PRC->Visible) { // PRC ?>
		<!-- PRC -->
		<td<?php echo $pharmacy_pharled_preview->PRC->cellAttributes() ?>>
<span<?php echo $pharmacy_pharled_preview->PRC->viewAttributes() ?>><?php echo $pharmacy_pharled_preview->PRC->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled_preview->UR->Visible) { // UR ?>
		<!-- UR -->
		<td<?php echo $pharmacy_pharled_preview->UR->cellAttributes() ?>>
<span<?php echo $pharmacy_pharled_preview->UR->viewAttributes() ?>><?php echo $pharmacy_pharled_preview->UR->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled_preview->_USERID->Visible) { // USERID ?>
		<!-- USERID -->
		<td<?php echo $pharmacy_pharled_preview->_USERID->cellAttributes() ?>>
<span<?php echo $pharmacy_pharled_preview->_USERID->viewAttributes() ?>><?php echo $pharmacy_pharled_preview->_USERID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled_preview->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $pharmacy_pharled_preview->id->cellAttributes() ?>>
<span<?php echo $pharmacy_pharled_preview->id->viewAttributes() ?>><?php echo $pharmacy_pharled_preview->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled_preview->HosoID->Visible) { // HosoID ?>
		<!-- HosoID -->
		<td<?php echo $pharmacy_pharled_preview->HosoID->cellAttributes() ?>>
<span<?php echo $pharmacy_pharled_preview->HosoID->viewAttributes() ?>><?php echo $pharmacy_pharled_preview->HosoID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled_preview->createdby->Visible) { // createdby ?>
		<!-- createdby -->
		<td<?php echo $pharmacy_pharled_preview->createdby->cellAttributes() ?>>
<span<?php echo $pharmacy_pharled_preview->createdby->viewAttributes() ?>><?php echo $pharmacy_pharled_preview->createdby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled_preview->createddatetime->Visible) { // createddatetime ?>
		<!-- createddatetime -->
		<td<?php echo $pharmacy_pharled_preview->createddatetime->cellAttributes() ?>>
<span<?php echo $pharmacy_pharled_preview->createddatetime->viewAttributes() ?>><?php echo $pharmacy_pharled_preview->createddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled_preview->modifiedby->Visible) { // modifiedby ?>
		<!-- modifiedby -->
		<td<?php echo $pharmacy_pharled_preview->modifiedby->cellAttributes() ?>>
<span<?php echo $pharmacy_pharled_preview->modifiedby->viewAttributes() ?>><?php echo $pharmacy_pharled_preview->modifiedby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled_preview->modifieddatetime->Visible) { // modifieddatetime ?>
		<!-- modifieddatetime -->
		<td<?php echo $pharmacy_pharled_preview->modifieddatetime->cellAttributes() ?>>
<span<?php echo $pharmacy_pharled_preview->modifieddatetime->viewAttributes() ?>><?php echo $pharmacy_pharled_preview->modifieddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled_preview->BRNAME->Visible) { // BRNAME ?>
		<!-- BRNAME -->
		<td<?php echo $pharmacy_pharled_preview->BRNAME->cellAttributes() ?>>
<span<?php echo $pharmacy_pharled_preview->BRNAME->viewAttributes() ?>><?php echo $pharmacy_pharled_preview->BRNAME->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_pharled_preview->ListOptions->render("body", "right", $pharmacy_pharled_preview->RowCount);
?>
	</tr>
<?php
	$pharmacy_pharled_preview->Recordset->MoveNext();
} // while
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php echo $pharmacy_pharled_preview->Pager->render() ?>
<?php } else { // No record ?>
<div class="card no-border">
<div class="ew-detail-count"><?php echo $Language->phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($pharmacy_pharled_preview->OtherOptions as $option)
		$option->render("body");
?>
</div>
<?php if ($pharmacy_pharled_preview->TotalRecords > 0) { ?>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
<?php } ?>
</div><!-- /.card -->
<?php
$pharmacy_pharled_preview->showPageFooter();
if (Config("DEBUG"))
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
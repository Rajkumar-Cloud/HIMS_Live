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
WriteHeader(FALSE);

// Create page object
$store_batchmas_list = new store_batchmas_list();

// Run the page
$store_batchmas_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$store_batchmas_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$store_batchmas_list->isExport()) { ?>
<script>
var fstore_batchmaslist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fstore_batchmaslist = currentForm = new ew.Form("fstore_batchmaslist", "list");
	fstore_batchmaslist.formKeyCountName = '<?php echo $store_batchmas_list->FormKeyCountName ?>';
	loadjs.done("fstore_batchmaslist");
});
var fstore_batchmaslistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fstore_batchmaslistsrch = currentSearchForm = new ew.Form("fstore_batchmaslistsrch");

	// Dynamic selection lists
	// Filters

	fstore_batchmaslistsrch.filterList = <?php echo $store_batchmas_list->getFilterList() ?>;
	loadjs.done("fstore_batchmaslistsrch");
});
</script>
<script>
ew.ready("head", "js/ewfixedheadertable.js", "fixedheadertable");
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$store_batchmas_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($store_batchmas_list->TotalRecords > 0 && $store_batchmas_list->ExportOptions->visible()) { ?>
<?php $store_batchmas_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($store_batchmas_list->ImportOptions->visible()) { ?>
<?php $store_batchmas_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($store_batchmas_list->SearchOptions->visible()) { ?>
<?php $store_batchmas_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($store_batchmas_list->FilterOptions->visible()) { ?>
<?php $store_batchmas_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$store_batchmas_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$store_batchmas_list->isExport() && !$store_batchmas->CurrentAction) { ?>
<form name="fstore_batchmaslistsrch" id="fstore_batchmaslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fstore_batchmaslistsrch-search-panel" class="<?php echo $store_batchmas_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="store_batchmas">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $store_batchmas_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($store_batchmas_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($store_batchmas_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $store_batchmas_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($store_batchmas_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($store_batchmas_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($store_batchmas_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($store_batchmas_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $store_batchmas_list->showPageHeader(); ?>
<?php
$store_batchmas_list->showMessage();
?>
<?php if ($store_batchmas_list->TotalRecords > 0 || $store_batchmas->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($store_batchmas_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> store_batchmas">
<?php if (!$store_batchmas_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$store_batchmas_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $store_batchmas_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $store_batchmas_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fstore_batchmaslist" id="fstore_batchmaslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="store_batchmas">
<div id="gmp_store_batchmas" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($store_batchmas_list->TotalRecords > 0 || $store_batchmas_list->isGridEdit()) { ?>
<table id="tbl_store_batchmaslist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$store_batchmas->RowType = ROWTYPE_HEADER;

// Render list options
$store_batchmas_list->renderListOptions();

// Render list options (header, left)
$store_batchmas_list->ListOptions->render("header", "left");
?>
<?php if ($store_batchmas_list->PRC->Visible) { // PRC ?>
	<?php if ($store_batchmas_list->SortUrl($store_batchmas_list->PRC) == "") { ?>
		<th data-name="PRC" class="<?php echo $store_batchmas_list->PRC->headerCellClass() ?>"><div id="elh_store_batchmas_PRC" class="store_batchmas_PRC"><div class="ew-table-header-caption"><?php echo $store_batchmas_list->PRC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRC" class="<?php echo $store_batchmas_list->PRC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_batchmas_list->SortUrl($store_batchmas_list->PRC) ?>', 1);"><div id="elh_store_batchmas_PRC" class="store_batchmas_PRC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_batchmas_list->PRC->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_batchmas_list->PRC->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_batchmas_list->PRC->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_batchmas_list->BATCHNO->Visible) { // BATCHNO ?>
	<?php if ($store_batchmas_list->SortUrl($store_batchmas_list->BATCHNO) == "") { ?>
		<th data-name="BATCHNO" class="<?php echo $store_batchmas_list->BATCHNO->headerCellClass() ?>"><div id="elh_store_batchmas_BATCHNO" class="store_batchmas_BATCHNO"><div class="ew-table-header-caption"><?php echo $store_batchmas_list->BATCHNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BATCHNO" class="<?php echo $store_batchmas_list->BATCHNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_batchmas_list->SortUrl($store_batchmas_list->BATCHNO) ?>', 1);"><div id="elh_store_batchmas_BATCHNO" class="store_batchmas_BATCHNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_batchmas_list->BATCHNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_batchmas_list->BATCHNO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_batchmas_list->BATCHNO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_batchmas_list->OQ->Visible) { // OQ ?>
	<?php if ($store_batchmas_list->SortUrl($store_batchmas_list->OQ) == "") { ?>
		<th data-name="OQ" class="<?php echo $store_batchmas_list->OQ->headerCellClass() ?>"><div id="elh_store_batchmas_OQ" class="store_batchmas_OQ"><div class="ew-table-header-caption"><?php echo $store_batchmas_list->OQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OQ" class="<?php echo $store_batchmas_list->OQ->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_batchmas_list->SortUrl($store_batchmas_list->OQ) ?>', 1);"><div id="elh_store_batchmas_OQ" class="store_batchmas_OQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_batchmas_list->OQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_batchmas_list->OQ->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_batchmas_list->OQ->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_batchmas_list->RQ->Visible) { // RQ ?>
	<?php if ($store_batchmas_list->SortUrl($store_batchmas_list->RQ) == "") { ?>
		<th data-name="RQ" class="<?php echo $store_batchmas_list->RQ->headerCellClass() ?>"><div id="elh_store_batchmas_RQ" class="store_batchmas_RQ"><div class="ew-table-header-caption"><?php echo $store_batchmas_list->RQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RQ" class="<?php echo $store_batchmas_list->RQ->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_batchmas_list->SortUrl($store_batchmas_list->RQ) ?>', 1);"><div id="elh_store_batchmas_RQ" class="store_batchmas_RQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_batchmas_list->RQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_batchmas_list->RQ->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_batchmas_list->RQ->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_batchmas_list->MRQ->Visible) { // MRQ ?>
	<?php if ($store_batchmas_list->SortUrl($store_batchmas_list->MRQ) == "") { ?>
		<th data-name="MRQ" class="<?php echo $store_batchmas_list->MRQ->headerCellClass() ?>"><div id="elh_store_batchmas_MRQ" class="store_batchmas_MRQ"><div class="ew-table-header-caption"><?php echo $store_batchmas_list->MRQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MRQ" class="<?php echo $store_batchmas_list->MRQ->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_batchmas_list->SortUrl($store_batchmas_list->MRQ) ?>', 1);"><div id="elh_store_batchmas_MRQ" class="store_batchmas_MRQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_batchmas_list->MRQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_batchmas_list->MRQ->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_batchmas_list->MRQ->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_batchmas_list->IQ->Visible) { // IQ ?>
	<?php if ($store_batchmas_list->SortUrl($store_batchmas_list->IQ) == "") { ?>
		<th data-name="IQ" class="<?php echo $store_batchmas_list->IQ->headerCellClass() ?>"><div id="elh_store_batchmas_IQ" class="store_batchmas_IQ"><div class="ew-table-header-caption"><?php echo $store_batchmas_list->IQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IQ" class="<?php echo $store_batchmas_list->IQ->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_batchmas_list->SortUrl($store_batchmas_list->IQ) ?>', 1);"><div id="elh_store_batchmas_IQ" class="store_batchmas_IQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_batchmas_list->IQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_batchmas_list->IQ->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_batchmas_list->IQ->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_batchmas_list->MRP->Visible) { // MRP ?>
	<?php if ($store_batchmas_list->SortUrl($store_batchmas_list->MRP) == "") { ?>
		<th data-name="MRP" class="<?php echo $store_batchmas_list->MRP->headerCellClass() ?>"><div id="elh_store_batchmas_MRP" class="store_batchmas_MRP"><div class="ew-table-header-caption"><?php echo $store_batchmas_list->MRP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MRP" class="<?php echo $store_batchmas_list->MRP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_batchmas_list->SortUrl($store_batchmas_list->MRP) ?>', 1);"><div id="elh_store_batchmas_MRP" class="store_batchmas_MRP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_batchmas_list->MRP->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_batchmas_list->MRP->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_batchmas_list->MRP->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_batchmas_list->EXPDT->Visible) { // EXPDT ?>
	<?php if ($store_batchmas_list->SortUrl($store_batchmas_list->EXPDT) == "") { ?>
		<th data-name="EXPDT" class="<?php echo $store_batchmas_list->EXPDT->headerCellClass() ?>"><div id="elh_store_batchmas_EXPDT" class="store_batchmas_EXPDT"><div class="ew-table-header-caption"><?php echo $store_batchmas_list->EXPDT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EXPDT" class="<?php echo $store_batchmas_list->EXPDT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_batchmas_list->SortUrl($store_batchmas_list->EXPDT) ?>', 1);"><div id="elh_store_batchmas_EXPDT" class="store_batchmas_EXPDT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_batchmas_list->EXPDT->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_batchmas_list->EXPDT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_batchmas_list->EXPDT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_batchmas_list->UR->Visible) { // UR ?>
	<?php if ($store_batchmas_list->SortUrl($store_batchmas_list->UR) == "") { ?>
		<th data-name="UR" class="<?php echo $store_batchmas_list->UR->headerCellClass() ?>"><div id="elh_store_batchmas_UR" class="store_batchmas_UR"><div class="ew-table-header-caption"><?php echo $store_batchmas_list->UR->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UR" class="<?php echo $store_batchmas_list->UR->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_batchmas_list->SortUrl($store_batchmas_list->UR) ?>', 1);"><div id="elh_store_batchmas_UR" class="store_batchmas_UR">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_batchmas_list->UR->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_batchmas_list->UR->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_batchmas_list->UR->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_batchmas_list->RT->Visible) { // RT ?>
	<?php if ($store_batchmas_list->SortUrl($store_batchmas_list->RT) == "") { ?>
		<th data-name="RT" class="<?php echo $store_batchmas_list->RT->headerCellClass() ?>"><div id="elh_store_batchmas_RT" class="store_batchmas_RT"><div class="ew-table-header-caption"><?php echo $store_batchmas_list->RT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RT" class="<?php echo $store_batchmas_list->RT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_batchmas_list->SortUrl($store_batchmas_list->RT) ?>', 1);"><div id="elh_store_batchmas_RT" class="store_batchmas_RT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_batchmas_list->RT->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_batchmas_list->RT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_batchmas_list->RT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_batchmas_list->PRCODE->Visible) { // PRCODE ?>
	<?php if ($store_batchmas_list->SortUrl($store_batchmas_list->PRCODE) == "") { ?>
		<th data-name="PRCODE" class="<?php echo $store_batchmas_list->PRCODE->headerCellClass() ?>"><div id="elh_store_batchmas_PRCODE" class="store_batchmas_PRCODE"><div class="ew-table-header-caption"><?php echo $store_batchmas_list->PRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRCODE" class="<?php echo $store_batchmas_list->PRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_batchmas_list->SortUrl($store_batchmas_list->PRCODE) ?>', 1);"><div id="elh_store_batchmas_PRCODE" class="store_batchmas_PRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_batchmas_list->PRCODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_batchmas_list->PRCODE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_batchmas_list->PRCODE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_batchmas_list->BATCH->Visible) { // BATCH ?>
	<?php if ($store_batchmas_list->SortUrl($store_batchmas_list->BATCH) == "") { ?>
		<th data-name="BATCH" class="<?php echo $store_batchmas_list->BATCH->headerCellClass() ?>"><div id="elh_store_batchmas_BATCH" class="store_batchmas_BATCH"><div class="ew-table-header-caption"><?php echo $store_batchmas_list->BATCH->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BATCH" class="<?php echo $store_batchmas_list->BATCH->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_batchmas_list->SortUrl($store_batchmas_list->BATCH) ?>', 1);"><div id="elh_store_batchmas_BATCH" class="store_batchmas_BATCH">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_batchmas_list->BATCH->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_batchmas_list->BATCH->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_batchmas_list->BATCH->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_batchmas_list->PC->Visible) { // PC ?>
	<?php if ($store_batchmas_list->SortUrl($store_batchmas_list->PC) == "") { ?>
		<th data-name="PC" class="<?php echo $store_batchmas_list->PC->headerCellClass() ?>"><div id="elh_store_batchmas_PC" class="store_batchmas_PC"><div class="ew-table-header-caption"><?php echo $store_batchmas_list->PC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PC" class="<?php echo $store_batchmas_list->PC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_batchmas_list->SortUrl($store_batchmas_list->PC) ?>', 1);"><div id="elh_store_batchmas_PC" class="store_batchmas_PC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_batchmas_list->PC->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_batchmas_list->PC->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_batchmas_list->PC->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_batchmas_list->OLDRT->Visible) { // OLDRT ?>
	<?php if ($store_batchmas_list->SortUrl($store_batchmas_list->OLDRT) == "") { ?>
		<th data-name="OLDRT" class="<?php echo $store_batchmas_list->OLDRT->headerCellClass() ?>"><div id="elh_store_batchmas_OLDRT" class="store_batchmas_OLDRT"><div class="ew-table-header-caption"><?php echo $store_batchmas_list->OLDRT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OLDRT" class="<?php echo $store_batchmas_list->OLDRT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_batchmas_list->SortUrl($store_batchmas_list->OLDRT) ?>', 1);"><div id="elh_store_batchmas_OLDRT" class="store_batchmas_OLDRT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_batchmas_list->OLDRT->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_batchmas_list->OLDRT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_batchmas_list->OLDRT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_batchmas_list->TEMPMRQ->Visible) { // TEMPMRQ ?>
	<?php if ($store_batchmas_list->SortUrl($store_batchmas_list->TEMPMRQ) == "") { ?>
		<th data-name="TEMPMRQ" class="<?php echo $store_batchmas_list->TEMPMRQ->headerCellClass() ?>"><div id="elh_store_batchmas_TEMPMRQ" class="store_batchmas_TEMPMRQ"><div class="ew-table-header-caption"><?php echo $store_batchmas_list->TEMPMRQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TEMPMRQ" class="<?php echo $store_batchmas_list->TEMPMRQ->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_batchmas_list->SortUrl($store_batchmas_list->TEMPMRQ) ?>', 1);"><div id="elh_store_batchmas_TEMPMRQ" class="store_batchmas_TEMPMRQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_batchmas_list->TEMPMRQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_batchmas_list->TEMPMRQ->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_batchmas_list->TEMPMRQ->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_batchmas_list->TAXP->Visible) { // TAXP ?>
	<?php if ($store_batchmas_list->SortUrl($store_batchmas_list->TAXP) == "") { ?>
		<th data-name="TAXP" class="<?php echo $store_batchmas_list->TAXP->headerCellClass() ?>"><div id="elh_store_batchmas_TAXP" class="store_batchmas_TAXP"><div class="ew-table-header-caption"><?php echo $store_batchmas_list->TAXP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TAXP" class="<?php echo $store_batchmas_list->TAXP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_batchmas_list->SortUrl($store_batchmas_list->TAXP) ?>', 1);"><div id="elh_store_batchmas_TAXP" class="store_batchmas_TAXP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_batchmas_list->TAXP->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_batchmas_list->TAXP->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_batchmas_list->TAXP->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_batchmas_list->OLDRATE->Visible) { // OLDRATE ?>
	<?php if ($store_batchmas_list->SortUrl($store_batchmas_list->OLDRATE) == "") { ?>
		<th data-name="OLDRATE" class="<?php echo $store_batchmas_list->OLDRATE->headerCellClass() ?>"><div id="elh_store_batchmas_OLDRATE" class="store_batchmas_OLDRATE"><div class="ew-table-header-caption"><?php echo $store_batchmas_list->OLDRATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OLDRATE" class="<?php echo $store_batchmas_list->OLDRATE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_batchmas_list->SortUrl($store_batchmas_list->OLDRATE) ?>', 1);"><div id="elh_store_batchmas_OLDRATE" class="store_batchmas_OLDRATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_batchmas_list->OLDRATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_batchmas_list->OLDRATE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_batchmas_list->OLDRATE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_batchmas_list->NEWRATE->Visible) { // NEWRATE ?>
	<?php if ($store_batchmas_list->SortUrl($store_batchmas_list->NEWRATE) == "") { ?>
		<th data-name="NEWRATE" class="<?php echo $store_batchmas_list->NEWRATE->headerCellClass() ?>"><div id="elh_store_batchmas_NEWRATE" class="store_batchmas_NEWRATE"><div class="ew-table-header-caption"><?php echo $store_batchmas_list->NEWRATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NEWRATE" class="<?php echo $store_batchmas_list->NEWRATE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_batchmas_list->SortUrl($store_batchmas_list->NEWRATE) ?>', 1);"><div id="elh_store_batchmas_NEWRATE" class="store_batchmas_NEWRATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_batchmas_list->NEWRATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_batchmas_list->NEWRATE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_batchmas_list->NEWRATE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_batchmas_list->OTEMPMRA->Visible) { // OTEMPMRA ?>
	<?php if ($store_batchmas_list->SortUrl($store_batchmas_list->OTEMPMRA) == "") { ?>
		<th data-name="OTEMPMRA" class="<?php echo $store_batchmas_list->OTEMPMRA->headerCellClass() ?>"><div id="elh_store_batchmas_OTEMPMRA" class="store_batchmas_OTEMPMRA"><div class="ew-table-header-caption"><?php echo $store_batchmas_list->OTEMPMRA->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OTEMPMRA" class="<?php echo $store_batchmas_list->OTEMPMRA->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_batchmas_list->SortUrl($store_batchmas_list->OTEMPMRA) ?>', 1);"><div id="elh_store_batchmas_OTEMPMRA" class="store_batchmas_OTEMPMRA">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_batchmas_list->OTEMPMRA->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_batchmas_list->OTEMPMRA->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_batchmas_list->OTEMPMRA->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_batchmas_list->ACTIVESTATUS->Visible) { // ACTIVESTATUS ?>
	<?php if ($store_batchmas_list->SortUrl($store_batchmas_list->ACTIVESTATUS) == "") { ?>
		<th data-name="ACTIVESTATUS" class="<?php echo $store_batchmas_list->ACTIVESTATUS->headerCellClass() ?>"><div id="elh_store_batchmas_ACTIVESTATUS" class="store_batchmas_ACTIVESTATUS"><div class="ew-table-header-caption"><?php echo $store_batchmas_list->ACTIVESTATUS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ACTIVESTATUS" class="<?php echo $store_batchmas_list->ACTIVESTATUS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_batchmas_list->SortUrl($store_batchmas_list->ACTIVESTATUS) ?>', 1);"><div id="elh_store_batchmas_ACTIVESTATUS" class="store_batchmas_ACTIVESTATUS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_batchmas_list->ACTIVESTATUS->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_batchmas_list->ACTIVESTATUS->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_batchmas_list->ACTIVESTATUS->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_batchmas_list->id->Visible) { // id ?>
	<?php if ($store_batchmas_list->SortUrl($store_batchmas_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $store_batchmas_list->id->headerCellClass() ?>"><div id="elh_store_batchmas_id" class="store_batchmas_id"><div class="ew-table-header-caption"><?php echo $store_batchmas_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $store_batchmas_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_batchmas_list->SortUrl($store_batchmas_list->id) ?>', 1);"><div id="elh_store_batchmas_id" class="store_batchmas_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_batchmas_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_batchmas_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_batchmas_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_batchmas_list->PrName->Visible) { // PrName ?>
	<?php if ($store_batchmas_list->SortUrl($store_batchmas_list->PrName) == "") { ?>
		<th data-name="PrName" class="<?php echo $store_batchmas_list->PrName->headerCellClass() ?>"><div id="elh_store_batchmas_PrName" class="store_batchmas_PrName"><div class="ew-table-header-caption"><?php echo $store_batchmas_list->PrName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrName" class="<?php echo $store_batchmas_list->PrName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_batchmas_list->SortUrl($store_batchmas_list->PrName) ?>', 1);"><div id="elh_store_batchmas_PrName" class="store_batchmas_PrName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_batchmas_list->PrName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_batchmas_list->PrName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_batchmas_list->PrName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_batchmas_list->PSGST->Visible) { // PSGST ?>
	<?php if ($store_batchmas_list->SortUrl($store_batchmas_list->PSGST) == "") { ?>
		<th data-name="PSGST" class="<?php echo $store_batchmas_list->PSGST->headerCellClass() ?>"><div id="elh_store_batchmas_PSGST" class="store_batchmas_PSGST"><div class="ew-table-header-caption"><?php echo $store_batchmas_list->PSGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PSGST" class="<?php echo $store_batchmas_list->PSGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_batchmas_list->SortUrl($store_batchmas_list->PSGST) ?>', 1);"><div id="elh_store_batchmas_PSGST" class="store_batchmas_PSGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_batchmas_list->PSGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_batchmas_list->PSGST->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_batchmas_list->PSGST->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_batchmas_list->PCGST->Visible) { // PCGST ?>
	<?php if ($store_batchmas_list->SortUrl($store_batchmas_list->PCGST) == "") { ?>
		<th data-name="PCGST" class="<?php echo $store_batchmas_list->PCGST->headerCellClass() ?>"><div id="elh_store_batchmas_PCGST" class="store_batchmas_PCGST"><div class="ew-table-header-caption"><?php echo $store_batchmas_list->PCGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PCGST" class="<?php echo $store_batchmas_list->PCGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_batchmas_list->SortUrl($store_batchmas_list->PCGST) ?>', 1);"><div id="elh_store_batchmas_PCGST" class="store_batchmas_PCGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_batchmas_list->PCGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_batchmas_list->PCGST->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_batchmas_list->PCGST->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_batchmas_list->SSGST->Visible) { // SSGST ?>
	<?php if ($store_batchmas_list->SortUrl($store_batchmas_list->SSGST) == "") { ?>
		<th data-name="SSGST" class="<?php echo $store_batchmas_list->SSGST->headerCellClass() ?>"><div id="elh_store_batchmas_SSGST" class="store_batchmas_SSGST"><div class="ew-table-header-caption"><?php echo $store_batchmas_list->SSGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SSGST" class="<?php echo $store_batchmas_list->SSGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_batchmas_list->SortUrl($store_batchmas_list->SSGST) ?>', 1);"><div id="elh_store_batchmas_SSGST" class="store_batchmas_SSGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_batchmas_list->SSGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_batchmas_list->SSGST->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_batchmas_list->SSGST->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_batchmas_list->SCGST->Visible) { // SCGST ?>
	<?php if ($store_batchmas_list->SortUrl($store_batchmas_list->SCGST) == "") { ?>
		<th data-name="SCGST" class="<?php echo $store_batchmas_list->SCGST->headerCellClass() ?>"><div id="elh_store_batchmas_SCGST" class="store_batchmas_SCGST"><div class="ew-table-header-caption"><?php echo $store_batchmas_list->SCGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SCGST" class="<?php echo $store_batchmas_list->SCGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_batchmas_list->SortUrl($store_batchmas_list->SCGST) ?>', 1);"><div id="elh_store_batchmas_SCGST" class="store_batchmas_SCGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_batchmas_list->SCGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_batchmas_list->SCGST->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_batchmas_list->SCGST->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_batchmas_list->MFRCODE->Visible) { // MFRCODE ?>
	<?php if ($store_batchmas_list->SortUrl($store_batchmas_list->MFRCODE) == "") { ?>
		<th data-name="MFRCODE" class="<?php echo $store_batchmas_list->MFRCODE->headerCellClass() ?>"><div id="elh_store_batchmas_MFRCODE" class="store_batchmas_MFRCODE"><div class="ew-table-header-caption"><?php echo $store_batchmas_list->MFRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MFRCODE" class="<?php echo $store_batchmas_list->MFRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_batchmas_list->SortUrl($store_batchmas_list->MFRCODE) ?>', 1);"><div id="elh_store_batchmas_MFRCODE" class="store_batchmas_MFRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_batchmas_list->MFRCODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_batchmas_list->MFRCODE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_batchmas_list->MFRCODE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_batchmas_list->BRCODE->Visible) { // BRCODE ?>
	<?php if ($store_batchmas_list->SortUrl($store_batchmas_list->BRCODE) == "") { ?>
		<th data-name="BRCODE" class="<?php echo $store_batchmas_list->BRCODE->headerCellClass() ?>"><div id="elh_store_batchmas_BRCODE" class="store_batchmas_BRCODE"><div class="ew-table-header-caption"><?php echo $store_batchmas_list->BRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BRCODE" class="<?php echo $store_batchmas_list->BRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_batchmas_list->SortUrl($store_batchmas_list->BRCODE) ?>', 1);"><div id="elh_store_batchmas_BRCODE" class="store_batchmas_BRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_batchmas_list->BRCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_batchmas_list->BRCODE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_batchmas_list->BRCODE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$store_batchmas_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($store_batchmas_list->ExportAll && $store_batchmas_list->isExport()) {
	$store_batchmas_list->StopRecord = $store_batchmas_list->TotalRecords;
} else {

	// Set the last record to display
	if ($store_batchmas_list->TotalRecords > $store_batchmas_list->StartRecord + $store_batchmas_list->DisplayRecords - 1)
		$store_batchmas_list->StopRecord = $store_batchmas_list->StartRecord + $store_batchmas_list->DisplayRecords - 1;
	else
		$store_batchmas_list->StopRecord = $store_batchmas_list->TotalRecords;
}
$store_batchmas_list->RecordCount = $store_batchmas_list->StartRecord - 1;
if ($store_batchmas_list->Recordset && !$store_batchmas_list->Recordset->EOF) {
	$store_batchmas_list->Recordset->moveFirst();
	$selectLimit = $store_batchmas_list->UseSelectLimit;
	if (!$selectLimit && $store_batchmas_list->StartRecord > 1)
		$store_batchmas_list->Recordset->move($store_batchmas_list->StartRecord - 1);
} elseif (!$store_batchmas->AllowAddDeleteRow && $store_batchmas_list->StopRecord == 0) {
	$store_batchmas_list->StopRecord = $store_batchmas->GridAddRowCount;
}

// Initialize aggregate
$store_batchmas->RowType = ROWTYPE_AGGREGATEINIT;
$store_batchmas->resetAttributes();
$store_batchmas_list->renderRow();
while ($store_batchmas_list->RecordCount < $store_batchmas_list->StopRecord) {
	$store_batchmas_list->RecordCount++;
	if ($store_batchmas_list->RecordCount >= $store_batchmas_list->StartRecord) {
		$store_batchmas_list->RowCount++;

		// Set up key count
		$store_batchmas_list->KeyCount = $store_batchmas_list->RowIndex;

		// Init row class and style
		$store_batchmas->resetAttributes();
		$store_batchmas->CssClass = "";
		if ($store_batchmas_list->isGridAdd()) {
		} else {
			$store_batchmas_list->loadRowValues($store_batchmas_list->Recordset); // Load row values
		}
		$store_batchmas->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$store_batchmas->RowAttrs->merge(["data-rowindex" => $store_batchmas_list->RowCount, "id" => "r" . $store_batchmas_list->RowCount . "_store_batchmas", "data-rowtype" => $store_batchmas->RowType]);

		// Render row
		$store_batchmas_list->renderRow();

		// Render list options
		$store_batchmas_list->renderListOptions();
?>
	<tr <?php echo $store_batchmas->rowAttributes() ?>>
<?php

// Render list options (body, left)
$store_batchmas_list->ListOptions->render("body", "left", $store_batchmas_list->RowCount);
?>
	<?php if ($store_batchmas_list->PRC->Visible) { // PRC ?>
		<td data-name="PRC" <?php echo $store_batchmas_list->PRC->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_list->RowCount ?>_store_batchmas_PRC">
<span<?php echo $store_batchmas_list->PRC->viewAttributes() ?>><?php echo $store_batchmas_list->PRC->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_batchmas_list->BATCHNO->Visible) { // BATCHNO ?>
		<td data-name="BATCHNO" <?php echo $store_batchmas_list->BATCHNO->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_list->RowCount ?>_store_batchmas_BATCHNO">
<span<?php echo $store_batchmas_list->BATCHNO->viewAttributes() ?>><?php echo $store_batchmas_list->BATCHNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_batchmas_list->OQ->Visible) { // OQ ?>
		<td data-name="OQ" <?php echo $store_batchmas_list->OQ->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_list->RowCount ?>_store_batchmas_OQ">
<span<?php echo $store_batchmas_list->OQ->viewAttributes() ?>><?php echo $store_batchmas_list->OQ->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_batchmas_list->RQ->Visible) { // RQ ?>
		<td data-name="RQ" <?php echo $store_batchmas_list->RQ->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_list->RowCount ?>_store_batchmas_RQ">
<span<?php echo $store_batchmas_list->RQ->viewAttributes() ?>><?php echo $store_batchmas_list->RQ->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_batchmas_list->MRQ->Visible) { // MRQ ?>
		<td data-name="MRQ" <?php echo $store_batchmas_list->MRQ->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_list->RowCount ?>_store_batchmas_MRQ">
<span<?php echo $store_batchmas_list->MRQ->viewAttributes() ?>><?php echo $store_batchmas_list->MRQ->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_batchmas_list->IQ->Visible) { // IQ ?>
		<td data-name="IQ" <?php echo $store_batchmas_list->IQ->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_list->RowCount ?>_store_batchmas_IQ">
<span<?php echo $store_batchmas_list->IQ->viewAttributes() ?>><?php echo $store_batchmas_list->IQ->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_batchmas_list->MRP->Visible) { // MRP ?>
		<td data-name="MRP" <?php echo $store_batchmas_list->MRP->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_list->RowCount ?>_store_batchmas_MRP">
<span<?php echo $store_batchmas_list->MRP->viewAttributes() ?>><?php echo $store_batchmas_list->MRP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_batchmas_list->EXPDT->Visible) { // EXPDT ?>
		<td data-name="EXPDT" <?php echo $store_batchmas_list->EXPDT->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_list->RowCount ?>_store_batchmas_EXPDT">
<span<?php echo $store_batchmas_list->EXPDT->viewAttributes() ?>><?php echo $store_batchmas_list->EXPDT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_batchmas_list->UR->Visible) { // UR ?>
		<td data-name="UR" <?php echo $store_batchmas_list->UR->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_list->RowCount ?>_store_batchmas_UR">
<span<?php echo $store_batchmas_list->UR->viewAttributes() ?>><?php echo $store_batchmas_list->UR->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_batchmas_list->RT->Visible) { // RT ?>
		<td data-name="RT" <?php echo $store_batchmas_list->RT->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_list->RowCount ?>_store_batchmas_RT">
<span<?php echo $store_batchmas_list->RT->viewAttributes() ?>><?php echo $store_batchmas_list->RT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_batchmas_list->PRCODE->Visible) { // PRCODE ?>
		<td data-name="PRCODE" <?php echo $store_batchmas_list->PRCODE->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_list->RowCount ?>_store_batchmas_PRCODE">
<span<?php echo $store_batchmas_list->PRCODE->viewAttributes() ?>><?php echo $store_batchmas_list->PRCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_batchmas_list->BATCH->Visible) { // BATCH ?>
		<td data-name="BATCH" <?php echo $store_batchmas_list->BATCH->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_list->RowCount ?>_store_batchmas_BATCH">
<span<?php echo $store_batchmas_list->BATCH->viewAttributes() ?>><?php echo $store_batchmas_list->BATCH->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_batchmas_list->PC->Visible) { // PC ?>
		<td data-name="PC" <?php echo $store_batchmas_list->PC->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_list->RowCount ?>_store_batchmas_PC">
<span<?php echo $store_batchmas_list->PC->viewAttributes() ?>><?php echo $store_batchmas_list->PC->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_batchmas_list->OLDRT->Visible) { // OLDRT ?>
		<td data-name="OLDRT" <?php echo $store_batchmas_list->OLDRT->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_list->RowCount ?>_store_batchmas_OLDRT">
<span<?php echo $store_batchmas_list->OLDRT->viewAttributes() ?>><?php echo $store_batchmas_list->OLDRT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_batchmas_list->TEMPMRQ->Visible) { // TEMPMRQ ?>
		<td data-name="TEMPMRQ" <?php echo $store_batchmas_list->TEMPMRQ->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_list->RowCount ?>_store_batchmas_TEMPMRQ">
<span<?php echo $store_batchmas_list->TEMPMRQ->viewAttributes() ?>><?php echo $store_batchmas_list->TEMPMRQ->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_batchmas_list->TAXP->Visible) { // TAXP ?>
		<td data-name="TAXP" <?php echo $store_batchmas_list->TAXP->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_list->RowCount ?>_store_batchmas_TAXP">
<span<?php echo $store_batchmas_list->TAXP->viewAttributes() ?>><?php echo $store_batchmas_list->TAXP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_batchmas_list->OLDRATE->Visible) { // OLDRATE ?>
		<td data-name="OLDRATE" <?php echo $store_batchmas_list->OLDRATE->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_list->RowCount ?>_store_batchmas_OLDRATE">
<span<?php echo $store_batchmas_list->OLDRATE->viewAttributes() ?>><?php echo $store_batchmas_list->OLDRATE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_batchmas_list->NEWRATE->Visible) { // NEWRATE ?>
		<td data-name="NEWRATE" <?php echo $store_batchmas_list->NEWRATE->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_list->RowCount ?>_store_batchmas_NEWRATE">
<span<?php echo $store_batchmas_list->NEWRATE->viewAttributes() ?>><?php echo $store_batchmas_list->NEWRATE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_batchmas_list->OTEMPMRA->Visible) { // OTEMPMRA ?>
		<td data-name="OTEMPMRA" <?php echo $store_batchmas_list->OTEMPMRA->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_list->RowCount ?>_store_batchmas_OTEMPMRA">
<span<?php echo $store_batchmas_list->OTEMPMRA->viewAttributes() ?>><?php echo $store_batchmas_list->OTEMPMRA->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_batchmas_list->ACTIVESTATUS->Visible) { // ACTIVESTATUS ?>
		<td data-name="ACTIVESTATUS" <?php echo $store_batchmas_list->ACTIVESTATUS->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_list->RowCount ?>_store_batchmas_ACTIVESTATUS">
<span<?php echo $store_batchmas_list->ACTIVESTATUS->viewAttributes() ?>><?php echo $store_batchmas_list->ACTIVESTATUS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_batchmas_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $store_batchmas_list->id->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_list->RowCount ?>_store_batchmas_id">
<span<?php echo $store_batchmas_list->id->viewAttributes() ?>><?php echo $store_batchmas_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_batchmas_list->PrName->Visible) { // PrName ?>
		<td data-name="PrName" <?php echo $store_batchmas_list->PrName->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_list->RowCount ?>_store_batchmas_PrName">
<span<?php echo $store_batchmas_list->PrName->viewAttributes() ?>><?php echo $store_batchmas_list->PrName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_batchmas_list->PSGST->Visible) { // PSGST ?>
		<td data-name="PSGST" <?php echo $store_batchmas_list->PSGST->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_list->RowCount ?>_store_batchmas_PSGST">
<span<?php echo $store_batchmas_list->PSGST->viewAttributes() ?>><?php echo $store_batchmas_list->PSGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_batchmas_list->PCGST->Visible) { // PCGST ?>
		<td data-name="PCGST" <?php echo $store_batchmas_list->PCGST->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_list->RowCount ?>_store_batchmas_PCGST">
<span<?php echo $store_batchmas_list->PCGST->viewAttributes() ?>><?php echo $store_batchmas_list->PCGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_batchmas_list->SSGST->Visible) { // SSGST ?>
		<td data-name="SSGST" <?php echo $store_batchmas_list->SSGST->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_list->RowCount ?>_store_batchmas_SSGST">
<span<?php echo $store_batchmas_list->SSGST->viewAttributes() ?>><?php echo $store_batchmas_list->SSGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_batchmas_list->SCGST->Visible) { // SCGST ?>
		<td data-name="SCGST" <?php echo $store_batchmas_list->SCGST->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_list->RowCount ?>_store_batchmas_SCGST">
<span<?php echo $store_batchmas_list->SCGST->viewAttributes() ?>><?php echo $store_batchmas_list->SCGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_batchmas_list->MFRCODE->Visible) { // MFRCODE ?>
		<td data-name="MFRCODE" <?php echo $store_batchmas_list->MFRCODE->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_list->RowCount ?>_store_batchmas_MFRCODE">
<span<?php echo $store_batchmas_list->MFRCODE->viewAttributes() ?>><?php echo $store_batchmas_list->MFRCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_batchmas_list->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE" <?php echo $store_batchmas_list->BRCODE->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_list->RowCount ?>_store_batchmas_BRCODE">
<span<?php echo $store_batchmas_list->BRCODE->viewAttributes() ?>><?php echo $store_batchmas_list->BRCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$store_batchmas_list->ListOptions->render("body", "right", $store_batchmas_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$store_batchmas_list->isGridAdd())
		$store_batchmas_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$store_batchmas->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($store_batchmas_list->Recordset)
	$store_batchmas_list->Recordset->Close();
?>
<?php if (!$store_batchmas_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$store_batchmas_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $store_batchmas_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $store_batchmas_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($store_batchmas_list->TotalRecords == 0 && !$store_batchmas->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $store_batchmas_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$store_batchmas_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$store_batchmas_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$store_batchmas->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_store_batchmas",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$store_batchmas_list->terminate();
?>
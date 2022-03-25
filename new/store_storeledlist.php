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
$store_storeled_list = new store_storeled_list();

// Run the page
$store_storeled_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$store_storeled_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$store_storeled_list->isExport()) { ?>
<script>
var fstore_storeledlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fstore_storeledlist = currentForm = new ew.Form("fstore_storeledlist", "list");
	fstore_storeledlist.formKeyCountName = '<?php echo $store_storeled_list->FormKeyCountName ?>';
	loadjs.done("fstore_storeledlist");
});
var fstore_storeledlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fstore_storeledlistsrch = currentSearchForm = new ew.Form("fstore_storeledlistsrch");

	// Dynamic selection lists
	// Filters

	fstore_storeledlistsrch.filterList = <?php echo $store_storeled_list->getFilterList() ?>;
	loadjs.done("fstore_storeledlistsrch");
});
</script>
<style type="text/css">
.ew-table-preview-row { /* main table preview row color */
	background-color: #FFFFFF; /* preview row color */
}
.ew-table-preview-row .ew-grid {
	display: table;
}
</style>
<div id="ew-preview" class="d-none"><!-- preview -->
	<div class="ew-nav-tabs"><!-- .ew-nav-tabs -->
		<ul class="nav nav-tabs"></ul>
		<div class="tab-content"><!-- .tab-content -->
			<div class="tab-pane fade active show"></div>
		</div><!-- /.tab-content -->
	</div><!-- /.ew-nav-tabs -->
</div><!-- /preview -->
<script>
loadjs.ready("head", function() {
	ew.PREVIEW_PLACEMENT = ew.CSS_FLIP ? "left" : "right";
	ew.PREVIEW_SINGLE_ROW = false;
	ew.PREVIEW_OVERLAY = false;
	loadjs("js/ewpreview.js", "preview");
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
<?php if (!$store_storeled_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($store_storeled_list->TotalRecords > 0 && $store_storeled_list->ExportOptions->visible()) { ?>
<?php $store_storeled_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($store_storeled_list->ImportOptions->visible()) { ?>
<?php $store_storeled_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($store_storeled_list->SearchOptions->visible()) { ?>
<?php $store_storeled_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($store_storeled_list->FilterOptions->visible()) { ?>
<?php $store_storeled_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$store_storeled_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$store_storeled_list->isExport() && !$store_storeled->CurrentAction) { ?>
<form name="fstore_storeledlistsrch" id="fstore_storeledlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fstore_storeledlistsrch-search-panel" class="<?php echo $store_storeled_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="store_storeled">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $store_storeled_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($store_storeled_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($store_storeled_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $store_storeled_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($store_storeled_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($store_storeled_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($store_storeled_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($store_storeled_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $store_storeled_list->showPageHeader(); ?>
<?php
$store_storeled_list->showMessage();
?>
<?php if ($store_storeled_list->TotalRecords > 0 || $store_storeled->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($store_storeled_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> store_storeled">
<?php if (!$store_storeled_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$store_storeled_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $store_storeled_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $store_storeled_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fstore_storeledlist" id="fstore_storeledlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="store_storeled">
<div id="gmp_store_storeled" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($store_storeled_list->TotalRecords > 0 || $store_storeled_list->isGridEdit()) { ?>
<table id="tbl_store_storeledlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$store_storeled->RowType = ROWTYPE_HEADER;

// Render list options
$store_storeled_list->renderListOptions();

// Render list options (header, left)
$store_storeled_list->ListOptions->render("header", "left");
?>
<?php if ($store_storeled_list->BRCODE->Visible) { // BRCODE ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->BRCODE) == "") { ?>
		<th data-name="BRCODE" class="<?php echo $store_storeled_list->BRCODE->headerCellClass() ?>"><div id="elh_store_storeled_BRCODE" class="store_storeled_BRCODE"><div class="ew-table-header-caption"><?php echo $store_storeled_list->BRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BRCODE" class="<?php echo $store_storeled_list->BRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->BRCODE) ?>', 1);"><div id="elh_store_storeled_BRCODE" class="store_storeled_BRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->BRCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->BRCODE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->BRCODE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->TYPE->Visible) { // TYPE ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->TYPE) == "") { ?>
		<th data-name="TYPE" class="<?php echo $store_storeled_list->TYPE->headerCellClass() ?>"><div id="elh_store_storeled_TYPE" class="store_storeled_TYPE"><div class="ew-table-header-caption"><?php echo $store_storeled_list->TYPE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TYPE" class="<?php echo $store_storeled_list->TYPE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->TYPE) ?>', 1);"><div id="elh_store_storeled_TYPE" class="store_storeled_TYPE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->TYPE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->TYPE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->TYPE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->DN->Visible) { // DN ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->DN) == "") { ?>
		<th data-name="DN" class="<?php echo $store_storeled_list->DN->headerCellClass() ?>"><div id="elh_store_storeled_DN" class="store_storeled_DN"><div class="ew-table-header-caption"><?php echo $store_storeled_list->DN->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DN" class="<?php echo $store_storeled_list->DN->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->DN) ?>', 1);"><div id="elh_store_storeled_DN" class="store_storeled_DN">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->DN->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->DN->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->DN->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->RDN->Visible) { // RDN ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->RDN) == "") { ?>
		<th data-name="RDN" class="<?php echo $store_storeled_list->RDN->headerCellClass() ?>"><div id="elh_store_storeled_RDN" class="store_storeled_RDN"><div class="ew-table-header-caption"><?php echo $store_storeled_list->RDN->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RDN" class="<?php echo $store_storeled_list->RDN->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->RDN) ?>', 1);"><div id="elh_store_storeled_RDN" class="store_storeled_RDN">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->RDN->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->RDN->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->RDN->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->DT->Visible) { // DT ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->DT) == "") { ?>
		<th data-name="DT" class="<?php echo $store_storeled_list->DT->headerCellClass() ?>"><div id="elh_store_storeled_DT" class="store_storeled_DT"><div class="ew-table-header-caption"><?php echo $store_storeled_list->DT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DT" class="<?php echo $store_storeled_list->DT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->DT) ?>', 1);"><div id="elh_store_storeled_DT" class="store_storeled_DT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->DT->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->DT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->DT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->PRC->Visible) { // PRC ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->PRC) == "") { ?>
		<th data-name="PRC" class="<?php echo $store_storeled_list->PRC->headerCellClass() ?>"><div id="elh_store_storeled_PRC" class="store_storeled_PRC"><div class="ew-table-header-caption"><?php echo $store_storeled_list->PRC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRC" class="<?php echo $store_storeled_list->PRC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->PRC) ?>', 1);"><div id="elh_store_storeled_PRC" class="store_storeled_PRC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->PRC->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->PRC->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->PRC->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->OQ->Visible) { // OQ ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->OQ) == "") { ?>
		<th data-name="OQ" class="<?php echo $store_storeled_list->OQ->headerCellClass() ?>"><div id="elh_store_storeled_OQ" class="store_storeled_OQ"><div class="ew-table-header-caption"><?php echo $store_storeled_list->OQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OQ" class="<?php echo $store_storeled_list->OQ->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->OQ) ?>', 1);"><div id="elh_store_storeled_OQ" class="store_storeled_OQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->OQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->OQ->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->OQ->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->RQ->Visible) { // RQ ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->RQ) == "") { ?>
		<th data-name="RQ" class="<?php echo $store_storeled_list->RQ->headerCellClass() ?>"><div id="elh_store_storeled_RQ" class="store_storeled_RQ"><div class="ew-table-header-caption"><?php echo $store_storeled_list->RQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RQ" class="<?php echo $store_storeled_list->RQ->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->RQ) ?>', 1);"><div id="elh_store_storeled_RQ" class="store_storeled_RQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->RQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->RQ->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->RQ->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->MRQ->Visible) { // MRQ ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->MRQ) == "") { ?>
		<th data-name="MRQ" class="<?php echo $store_storeled_list->MRQ->headerCellClass() ?>"><div id="elh_store_storeled_MRQ" class="store_storeled_MRQ"><div class="ew-table-header-caption"><?php echo $store_storeled_list->MRQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MRQ" class="<?php echo $store_storeled_list->MRQ->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->MRQ) ?>', 1);"><div id="elh_store_storeled_MRQ" class="store_storeled_MRQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->MRQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->MRQ->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->MRQ->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->IQ->Visible) { // IQ ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->IQ) == "") { ?>
		<th data-name="IQ" class="<?php echo $store_storeled_list->IQ->headerCellClass() ?>"><div id="elh_store_storeled_IQ" class="store_storeled_IQ"><div class="ew-table-header-caption"><?php echo $store_storeled_list->IQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IQ" class="<?php echo $store_storeled_list->IQ->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->IQ) ?>', 1);"><div id="elh_store_storeled_IQ" class="store_storeled_IQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->IQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->IQ->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->IQ->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->BATCHNO->Visible) { // BATCHNO ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->BATCHNO) == "") { ?>
		<th data-name="BATCHNO" class="<?php echo $store_storeled_list->BATCHNO->headerCellClass() ?>"><div id="elh_store_storeled_BATCHNO" class="store_storeled_BATCHNO"><div class="ew-table-header-caption"><?php echo $store_storeled_list->BATCHNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BATCHNO" class="<?php echo $store_storeled_list->BATCHNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->BATCHNO) ?>', 1);"><div id="elh_store_storeled_BATCHNO" class="store_storeled_BATCHNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->BATCHNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->BATCHNO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->BATCHNO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->EXPDT->Visible) { // EXPDT ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->EXPDT) == "") { ?>
		<th data-name="EXPDT" class="<?php echo $store_storeled_list->EXPDT->headerCellClass() ?>"><div id="elh_store_storeled_EXPDT" class="store_storeled_EXPDT"><div class="ew-table-header-caption"><?php echo $store_storeled_list->EXPDT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EXPDT" class="<?php echo $store_storeled_list->EXPDT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->EXPDT) ?>', 1);"><div id="elh_store_storeled_EXPDT" class="store_storeled_EXPDT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->EXPDT->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->EXPDT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->EXPDT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->BILLNO->Visible) { // BILLNO ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->BILLNO) == "") { ?>
		<th data-name="BILLNO" class="<?php echo $store_storeled_list->BILLNO->headerCellClass() ?>"><div id="elh_store_storeled_BILLNO" class="store_storeled_BILLNO"><div class="ew-table-header-caption"><?php echo $store_storeled_list->BILLNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BILLNO" class="<?php echo $store_storeled_list->BILLNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->BILLNO) ?>', 1);"><div id="elh_store_storeled_BILLNO" class="store_storeled_BILLNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->BILLNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->BILLNO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->BILLNO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->BILLDT->Visible) { // BILLDT ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->BILLDT) == "") { ?>
		<th data-name="BILLDT" class="<?php echo $store_storeled_list->BILLDT->headerCellClass() ?>"><div id="elh_store_storeled_BILLDT" class="store_storeled_BILLDT"><div class="ew-table-header-caption"><?php echo $store_storeled_list->BILLDT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BILLDT" class="<?php echo $store_storeled_list->BILLDT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->BILLDT) ?>', 1);"><div id="elh_store_storeled_BILLDT" class="store_storeled_BILLDT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->BILLDT->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->BILLDT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->BILLDT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->RT->Visible) { // RT ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->RT) == "") { ?>
		<th data-name="RT" class="<?php echo $store_storeled_list->RT->headerCellClass() ?>"><div id="elh_store_storeled_RT" class="store_storeled_RT"><div class="ew-table-header-caption"><?php echo $store_storeled_list->RT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RT" class="<?php echo $store_storeled_list->RT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->RT) ?>', 1);"><div id="elh_store_storeled_RT" class="store_storeled_RT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->RT->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->RT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->RT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->VALUE->Visible) { // VALUE ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->VALUE) == "") { ?>
		<th data-name="VALUE" class="<?php echo $store_storeled_list->VALUE->headerCellClass() ?>"><div id="elh_store_storeled_VALUE" class="store_storeled_VALUE"><div class="ew-table-header-caption"><?php echo $store_storeled_list->VALUE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="VALUE" class="<?php echo $store_storeled_list->VALUE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->VALUE) ?>', 1);"><div id="elh_store_storeled_VALUE" class="store_storeled_VALUE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->VALUE->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->VALUE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->VALUE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->DISC->Visible) { // DISC ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->DISC) == "") { ?>
		<th data-name="DISC" class="<?php echo $store_storeled_list->DISC->headerCellClass() ?>"><div id="elh_store_storeled_DISC" class="store_storeled_DISC"><div class="ew-table-header-caption"><?php echo $store_storeled_list->DISC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DISC" class="<?php echo $store_storeled_list->DISC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->DISC) ?>', 1);"><div id="elh_store_storeled_DISC" class="store_storeled_DISC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->DISC->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->DISC->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->DISC->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->TAXP->Visible) { // TAXP ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->TAXP) == "") { ?>
		<th data-name="TAXP" class="<?php echo $store_storeled_list->TAXP->headerCellClass() ?>"><div id="elh_store_storeled_TAXP" class="store_storeled_TAXP"><div class="ew-table-header-caption"><?php echo $store_storeled_list->TAXP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TAXP" class="<?php echo $store_storeled_list->TAXP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->TAXP) ?>', 1);"><div id="elh_store_storeled_TAXP" class="store_storeled_TAXP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->TAXP->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->TAXP->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->TAXP->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->TAX->Visible) { // TAX ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->TAX) == "") { ?>
		<th data-name="TAX" class="<?php echo $store_storeled_list->TAX->headerCellClass() ?>"><div id="elh_store_storeled_TAX" class="store_storeled_TAX"><div class="ew-table-header-caption"><?php echo $store_storeled_list->TAX->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TAX" class="<?php echo $store_storeled_list->TAX->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->TAX) ?>', 1);"><div id="elh_store_storeled_TAX" class="store_storeled_TAX">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->TAX->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->TAX->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->TAX->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->TAXR->Visible) { // TAXR ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->TAXR) == "") { ?>
		<th data-name="TAXR" class="<?php echo $store_storeled_list->TAXR->headerCellClass() ?>"><div id="elh_store_storeled_TAXR" class="store_storeled_TAXR"><div class="ew-table-header-caption"><?php echo $store_storeled_list->TAXR->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TAXR" class="<?php echo $store_storeled_list->TAXR->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->TAXR) ?>', 1);"><div id="elh_store_storeled_TAXR" class="store_storeled_TAXR">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->TAXR->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->TAXR->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->TAXR->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->DAMT->Visible) { // DAMT ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->DAMT) == "") { ?>
		<th data-name="DAMT" class="<?php echo $store_storeled_list->DAMT->headerCellClass() ?>"><div id="elh_store_storeled_DAMT" class="store_storeled_DAMT"><div class="ew-table-header-caption"><?php echo $store_storeled_list->DAMT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DAMT" class="<?php echo $store_storeled_list->DAMT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->DAMT) ?>', 1);"><div id="elh_store_storeled_DAMT" class="store_storeled_DAMT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->DAMT->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->DAMT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->DAMT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->EMPNO->Visible) { // EMPNO ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->EMPNO) == "") { ?>
		<th data-name="EMPNO" class="<?php echo $store_storeled_list->EMPNO->headerCellClass() ?>"><div id="elh_store_storeled_EMPNO" class="store_storeled_EMPNO"><div class="ew-table-header-caption"><?php echo $store_storeled_list->EMPNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EMPNO" class="<?php echo $store_storeled_list->EMPNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->EMPNO) ?>', 1);"><div id="elh_store_storeled_EMPNO" class="store_storeled_EMPNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->EMPNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->EMPNO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->EMPNO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->PC->Visible) { // PC ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->PC) == "") { ?>
		<th data-name="PC" class="<?php echo $store_storeled_list->PC->headerCellClass() ?>"><div id="elh_store_storeled_PC" class="store_storeled_PC"><div class="ew-table-header-caption"><?php echo $store_storeled_list->PC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PC" class="<?php echo $store_storeled_list->PC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->PC) ?>', 1);"><div id="elh_store_storeled_PC" class="store_storeled_PC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->PC->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->PC->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->PC->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->DRNAME->Visible) { // DRNAME ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->DRNAME) == "") { ?>
		<th data-name="DRNAME" class="<?php echo $store_storeled_list->DRNAME->headerCellClass() ?>"><div id="elh_store_storeled_DRNAME" class="store_storeled_DRNAME"><div class="ew-table-header-caption"><?php echo $store_storeled_list->DRNAME->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DRNAME" class="<?php echo $store_storeled_list->DRNAME->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->DRNAME) ?>', 1);"><div id="elh_store_storeled_DRNAME" class="store_storeled_DRNAME">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->DRNAME->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->DRNAME->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->DRNAME->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->BTIME->Visible) { // BTIME ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->BTIME) == "") { ?>
		<th data-name="BTIME" class="<?php echo $store_storeled_list->BTIME->headerCellClass() ?>"><div id="elh_store_storeled_BTIME" class="store_storeled_BTIME"><div class="ew-table-header-caption"><?php echo $store_storeled_list->BTIME->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BTIME" class="<?php echo $store_storeled_list->BTIME->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->BTIME) ?>', 1);"><div id="elh_store_storeled_BTIME" class="store_storeled_BTIME">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->BTIME->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->BTIME->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->BTIME->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->ONO->Visible) { // ONO ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->ONO) == "") { ?>
		<th data-name="ONO" class="<?php echo $store_storeled_list->ONO->headerCellClass() ?>"><div id="elh_store_storeled_ONO" class="store_storeled_ONO"><div class="ew-table-header-caption"><?php echo $store_storeled_list->ONO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ONO" class="<?php echo $store_storeled_list->ONO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->ONO) ?>', 1);"><div id="elh_store_storeled_ONO" class="store_storeled_ONO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->ONO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->ONO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->ONO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->ODT->Visible) { // ODT ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->ODT) == "") { ?>
		<th data-name="ODT" class="<?php echo $store_storeled_list->ODT->headerCellClass() ?>"><div id="elh_store_storeled_ODT" class="store_storeled_ODT"><div class="ew-table-header-caption"><?php echo $store_storeled_list->ODT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ODT" class="<?php echo $store_storeled_list->ODT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->ODT) ?>', 1);"><div id="elh_store_storeled_ODT" class="store_storeled_ODT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->ODT->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->ODT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->ODT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->PURRT->Visible) { // PURRT ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->PURRT) == "") { ?>
		<th data-name="PURRT" class="<?php echo $store_storeled_list->PURRT->headerCellClass() ?>"><div id="elh_store_storeled_PURRT" class="store_storeled_PURRT"><div class="ew-table-header-caption"><?php echo $store_storeled_list->PURRT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PURRT" class="<?php echo $store_storeled_list->PURRT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->PURRT) ?>', 1);"><div id="elh_store_storeled_PURRT" class="store_storeled_PURRT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->PURRT->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->PURRT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->PURRT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->GRP->Visible) { // GRP ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->GRP) == "") { ?>
		<th data-name="GRP" class="<?php echo $store_storeled_list->GRP->headerCellClass() ?>"><div id="elh_store_storeled_GRP" class="store_storeled_GRP"><div class="ew-table-header-caption"><?php echo $store_storeled_list->GRP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GRP" class="<?php echo $store_storeled_list->GRP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->GRP) ?>', 1);"><div id="elh_store_storeled_GRP" class="store_storeled_GRP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->GRP->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->GRP->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->GRP->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->IBATCH->Visible) { // IBATCH ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->IBATCH) == "") { ?>
		<th data-name="IBATCH" class="<?php echo $store_storeled_list->IBATCH->headerCellClass() ?>"><div id="elh_store_storeled_IBATCH" class="store_storeled_IBATCH"><div class="ew-table-header-caption"><?php echo $store_storeled_list->IBATCH->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IBATCH" class="<?php echo $store_storeled_list->IBATCH->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->IBATCH) ?>', 1);"><div id="elh_store_storeled_IBATCH" class="store_storeled_IBATCH">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->IBATCH->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->IBATCH->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->IBATCH->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->IPNO->Visible) { // IPNO ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->IPNO) == "") { ?>
		<th data-name="IPNO" class="<?php echo $store_storeled_list->IPNO->headerCellClass() ?>"><div id="elh_store_storeled_IPNO" class="store_storeled_IPNO"><div class="ew-table-header-caption"><?php echo $store_storeled_list->IPNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IPNO" class="<?php echo $store_storeled_list->IPNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->IPNO) ?>', 1);"><div id="elh_store_storeled_IPNO" class="store_storeled_IPNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->IPNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->IPNO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->IPNO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->OPNO->Visible) { // OPNO ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->OPNO) == "") { ?>
		<th data-name="OPNO" class="<?php echo $store_storeled_list->OPNO->headerCellClass() ?>"><div id="elh_store_storeled_OPNO" class="store_storeled_OPNO"><div class="ew-table-header-caption"><?php echo $store_storeled_list->OPNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OPNO" class="<?php echo $store_storeled_list->OPNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->OPNO) ?>', 1);"><div id="elh_store_storeled_OPNO" class="store_storeled_OPNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->OPNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->OPNO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->OPNO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->RECID->Visible) { // RECID ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->RECID) == "") { ?>
		<th data-name="RECID" class="<?php echo $store_storeled_list->RECID->headerCellClass() ?>"><div id="elh_store_storeled_RECID" class="store_storeled_RECID"><div class="ew-table-header-caption"><?php echo $store_storeled_list->RECID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RECID" class="<?php echo $store_storeled_list->RECID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->RECID) ?>', 1);"><div id="elh_store_storeled_RECID" class="store_storeled_RECID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->RECID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->RECID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->RECID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->FQTY->Visible) { // FQTY ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->FQTY) == "") { ?>
		<th data-name="FQTY" class="<?php echo $store_storeled_list->FQTY->headerCellClass() ?>"><div id="elh_store_storeled_FQTY" class="store_storeled_FQTY"><div class="ew-table-header-caption"><?php echo $store_storeled_list->FQTY->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FQTY" class="<?php echo $store_storeled_list->FQTY->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->FQTY) ?>', 1);"><div id="elh_store_storeled_FQTY" class="store_storeled_FQTY">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->FQTY->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->FQTY->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->FQTY->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->UR->Visible) { // UR ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->UR) == "") { ?>
		<th data-name="UR" class="<?php echo $store_storeled_list->UR->headerCellClass() ?>"><div id="elh_store_storeled_UR" class="store_storeled_UR"><div class="ew-table-header-caption"><?php echo $store_storeled_list->UR->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UR" class="<?php echo $store_storeled_list->UR->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->UR) ?>', 1);"><div id="elh_store_storeled_UR" class="store_storeled_UR">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->UR->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->UR->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->UR->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->DCID->Visible) { // DCID ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->DCID) == "") { ?>
		<th data-name="DCID" class="<?php echo $store_storeled_list->DCID->headerCellClass() ?>"><div id="elh_store_storeled_DCID" class="store_storeled_DCID"><div class="ew-table-header-caption"><?php echo $store_storeled_list->DCID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DCID" class="<?php echo $store_storeled_list->DCID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->DCID) ?>', 1);"><div id="elh_store_storeled_DCID" class="store_storeled_DCID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->DCID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->DCID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->DCID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->_USERID->Visible) { // USERID ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->_USERID) == "") { ?>
		<th data-name="_USERID" class="<?php echo $store_storeled_list->_USERID->headerCellClass() ?>"><div id="elh_store_storeled__USERID" class="store_storeled__USERID"><div class="ew-table-header-caption"><?php echo $store_storeled_list->_USERID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_USERID" class="<?php echo $store_storeled_list->_USERID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->_USERID) ?>', 1);"><div id="elh_store_storeled__USERID" class="store_storeled__USERID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->_USERID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->_USERID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->_USERID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->MODDT->Visible) { // MODDT ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->MODDT) == "") { ?>
		<th data-name="MODDT" class="<?php echo $store_storeled_list->MODDT->headerCellClass() ?>"><div id="elh_store_storeled_MODDT" class="store_storeled_MODDT"><div class="ew-table-header-caption"><?php echo $store_storeled_list->MODDT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MODDT" class="<?php echo $store_storeled_list->MODDT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->MODDT) ?>', 1);"><div id="elh_store_storeled_MODDT" class="store_storeled_MODDT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->MODDT->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->MODDT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->MODDT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->FYM->Visible) { // FYM ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->FYM) == "") { ?>
		<th data-name="FYM" class="<?php echo $store_storeled_list->FYM->headerCellClass() ?>"><div id="elh_store_storeled_FYM" class="store_storeled_FYM"><div class="ew-table-header-caption"><?php echo $store_storeled_list->FYM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FYM" class="<?php echo $store_storeled_list->FYM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->FYM) ?>', 1);"><div id="elh_store_storeled_FYM" class="store_storeled_FYM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->FYM->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->FYM->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->FYM->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->PRCBATCH->Visible) { // PRCBATCH ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->PRCBATCH) == "") { ?>
		<th data-name="PRCBATCH" class="<?php echo $store_storeled_list->PRCBATCH->headerCellClass() ?>"><div id="elh_store_storeled_PRCBATCH" class="store_storeled_PRCBATCH"><div class="ew-table-header-caption"><?php echo $store_storeled_list->PRCBATCH->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRCBATCH" class="<?php echo $store_storeled_list->PRCBATCH->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->PRCBATCH) ?>', 1);"><div id="elh_store_storeled_PRCBATCH" class="store_storeled_PRCBATCH">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->PRCBATCH->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->PRCBATCH->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->PRCBATCH->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->SLNO->Visible) { // SLNO ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->SLNO) == "") { ?>
		<th data-name="SLNO" class="<?php echo $store_storeled_list->SLNO->headerCellClass() ?>"><div id="elh_store_storeled_SLNO" class="store_storeled_SLNO"><div class="ew-table-header-caption"><?php echo $store_storeled_list->SLNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SLNO" class="<?php echo $store_storeled_list->SLNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->SLNO) ?>', 1);"><div id="elh_store_storeled_SLNO" class="store_storeled_SLNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->SLNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->SLNO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->SLNO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->MRP->Visible) { // MRP ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->MRP) == "") { ?>
		<th data-name="MRP" class="<?php echo $store_storeled_list->MRP->headerCellClass() ?>"><div id="elh_store_storeled_MRP" class="store_storeled_MRP"><div class="ew-table-header-caption"><?php echo $store_storeled_list->MRP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MRP" class="<?php echo $store_storeled_list->MRP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->MRP) ?>', 1);"><div id="elh_store_storeled_MRP" class="store_storeled_MRP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->MRP->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->MRP->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->MRP->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->BILLYM->Visible) { // BILLYM ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->BILLYM) == "") { ?>
		<th data-name="BILLYM" class="<?php echo $store_storeled_list->BILLYM->headerCellClass() ?>"><div id="elh_store_storeled_BILLYM" class="store_storeled_BILLYM"><div class="ew-table-header-caption"><?php echo $store_storeled_list->BILLYM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BILLYM" class="<?php echo $store_storeled_list->BILLYM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->BILLYM) ?>', 1);"><div id="elh_store_storeled_BILLYM" class="store_storeled_BILLYM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->BILLYM->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->BILLYM->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->BILLYM->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->BILLGRP->Visible) { // BILLGRP ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->BILLGRP) == "") { ?>
		<th data-name="BILLGRP" class="<?php echo $store_storeled_list->BILLGRP->headerCellClass() ?>"><div id="elh_store_storeled_BILLGRP" class="store_storeled_BILLGRP"><div class="ew-table-header-caption"><?php echo $store_storeled_list->BILLGRP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BILLGRP" class="<?php echo $store_storeled_list->BILLGRP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->BILLGRP) ?>', 1);"><div id="elh_store_storeled_BILLGRP" class="store_storeled_BILLGRP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->BILLGRP->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->BILLGRP->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->BILLGRP->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->STAFF->Visible) { // STAFF ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->STAFF) == "") { ?>
		<th data-name="STAFF" class="<?php echo $store_storeled_list->STAFF->headerCellClass() ?>"><div id="elh_store_storeled_STAFF" class="store_storeled_STAFF"><div class="ew-table-header-caption"><?php echo $store_storeled_list->STAFF->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="STAFF" class="<?php echo $store_storeled_list->STAFF->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->STAFF) ?>', 1);"><div id="elh_store_storeled_STAFF" class="store_storeled_STAFF">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->STAFF->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->STAFF->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->STAFF->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->TEMPIPNO->Visible) { // TEMPIPNO ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->TEMPIPNO) == "") { ?>
		<th data-name="TEMPIPNO" class="<?php echo $store_storeled_list->TEMPIPNO->headerCellClass() ?>"><div id="elh_store_storeled_TEMPIPNO" class="store_storeled_TEMPIPNO"><div class="ew-table-header-caption"><?php echo $store_storeled_list->TEMPIPNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TEMPIPNO" class="<?php echo $store_storeled_list->TEMPIPNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->TEMPIPNO) ?>', 1);"><div id="elh_store_storeled_TEMPIPNO" class="store_storeled_TEMPIPNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->TEMPIPNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->TEMPIPNO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->TEMPIPNO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->PRNTED->Visible) { // PRNTED ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->PRNTED) == "") { ?>
		<th data-name="PRNTED" class="<?php echo $store_storeled_list->PRNTED->headerCellClass() ?>"><div id="elh_store_storeled_PRNTED" class="store_storeled_PRNTED"><div class="ew-table-header-caption"><?php echo $store_storeled_list->PRNTED->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRNTED" class="<?php echo $store_storeled_list->PRNTED->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->PRNTED) ?>', 1);"><div id="elh_store_storeled_PRNTED" class="store_storeled_PRNTED">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->PRNTED->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->PRNTED->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->PRNTED->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->PATNAME->Visible) { // PATNAME ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->PATNAME) == "") { ?>
		<th data-name="PATNAME" class="<?php echo $store_storeled_list->PATNAME->headerCellClass() ?>"><div id="elh_store_storeled_PATNAME" class="store_storeled_PATNAME"><div class="ew-table-header-caption"><?php echo $store_storeled_list->PATNAME->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PATNAME" class="<?php echo $store_storeled_list->PATNAME->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->PATNAME) ?>', 1);"><div id="elh_store_storeled_PATNAME" class="store_storeled_PATNAME">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->PATNAME->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->PATNAME->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->PATNAME->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->PJVNO->Visible) { // PJVNO ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->PJVNO) == "") { ?>
		<th data-name="PJVNO" class="<?php echo $store_storeled_list->PJVNO->headerCellClass() ?>"><div id="elh_store_storeled_PJVNO" class="store_storeled_PJVNO"><div class="ew-table-header-caption"><?php echo $store_storeled_list->PJVNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PJVNO" class="<?php echo $store_storeled_list->PJVNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->PJVNO) ?>', 1);"><div id="elh_store_storeled_PJVNO" class="store_storeled_PJVNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->PJVNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->PJVNO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->PJVNO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->PJVSLNO->Visible) { // PJVSLNO ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->PJVSLNO) == "") { ?>
		<th data-name="PJVSLNO" class="<?php echo $store_storeled_list->PJVSLNO->headerCellClass() ?>"><div id="elh_store_storeled_PJVSLNO" class="store_storeled_PJVSLNO"><div class="ew-table-header-caption"><?php echo $store_storeled_list->PJVSLNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PJVSLNO" class="<?php echo $store_storeled_list->PJVSLNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->PJVSLNO) ?>', 1);"><div id="elh_store_storeled_PJVSLNO" class="store_storeled_PJVSLNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->PJVSLNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->PJVSLNO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->PJVSLNO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->OTHDISC->Visible) { // OTHDISC ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->OTHDISC) == "") { ?>
		<th data-name="OTHDISC" class="<?php echo $store_storeled_list->OTHDISC->headerCellClass() ?>"><div id="elh_store_storeled_OTHDISC" class="store_storeled_OTHDISC"><div class="ew-table-header-caption"><?php echo $store_storeled_list->OTHDISC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OTHDISC" class="<?php echo $store_storeled_list->OTHDISC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->OTHDISC) ?>', 1);"><div id="elh_store_storeled_OTHDISC" class="store_storeled_OTHDISC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->OTHDISC->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->OTHDISC->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->OTHDISC->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->PJVYM->Visible) { // PJVYM ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->PJVYM) == "") { ?>
		<th data-name="PJVYM" class="<?php echo $store_storeled_list->PJVYM->headerCellClass() ?>"><div id="elh_store_storeled_PJVYM" class="store_storeled_PJVYM"><div class="ew-table-header-caption"><?php echo $store_storeled_list->PJVYM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PJVYM" class="<?php echo $store_storeled_list->PJVYM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->PJVYM) ?>', 1);"><div id="elh_store_storeled_PJVYM" class="store_storeled_PJVYM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->PJVYM->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->PJVYM->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->PJVYM->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->PURDISCPER->Visible) { // PURDISCPER ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->PURDISCPER) == "") { ?>
		<th data-name="PURDISCPER" class="<?php echo $store_storeled_list->PURDISCPER->headerCellClass() ?>"><div id="elh_store_storeled_PURDISCPER" class="store_storeled_PURDISCPER"><div class="ew-table-header-caption"><?php echo $store_storeled_list->PURDISCPER->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PURDISCPER" class="<?php echo $store_storeled_list->PURDISCPER->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->PURDISCPER) ?>', 1);"><div id="elh_store_storeled_PURDISCPER" class="store_storeled_PURDISCPER">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->PURDISCPER->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->PURDISCPER->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->PURDISCPER->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->CASHIER->Visible) { // CASHIER ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->CASHIER) == "") { ?>
		<th data-name="CASHIER" class="<?php echo $store_storeled_list->CASHIER->headerCellClass() ?>"><div id="elh_store_storeled_CASHIER" class="store_storeled_CASHIER"><div class="ew-table-header-caption"><?php echo $store_storeled_list->CASHIER->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CASHIER" class="<?php echo $store_storeled_list->CASHIER->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->CASHIER) ?>', 1);"><div id="elh_store_storeled_CASHIER" class="store_storeled_CASHIER">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->CASHIER->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->CASHIER->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->CASHIER->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->CASHTIME->Visible) { // CASHTIME ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->CASHTIME) == "") { ?>
		<th data-name="CASHTIME" class="<?php echo $store_storeled_list->CASHTIME->headerCellClass() ?>"><div id="elh_store_storeled_CASHTIME" class="store_storeled_CASHTIME"><div class="ew-table-header-caption"><?php echo $store_storeled_list->CASHTIME->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CASHTIME" class="<?php echo $store_storeled_list->CASHTIME->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->CASHTIME) ?>', 1);"><div id="elh_store_storeled_CASHTIME" class="store_storeled_CASHTIME">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->CASHTIME->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->CASHTIME->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->CASHTIME->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->CASHRECD->Visible) { // CASHRECD ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->CASHRECD) == "") { ?>
		<th data-name="CASHRECD" class="<?php echo $store_storeled_list->CASHRECD->headerCellClass() ?>"><div id="elh_store_storeled_CASHRECD" class="store_storeled_CASHRECD"><div class="ew-table-header-caption"><?php echo $store_storeled_list->CASHRECD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CASHRECD" class="<?php echo $store_storeled_list->CASHRECD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->CASHRECD) ?>', 1);"><div id="elh_store_storeled_CASHRECD" class="store_storeled_CASHRECD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->CASHRECD->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->CASHRECD->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->CASHRECD->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->CASHREFNO->Visible) { // CASHREFNO ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->CASHREFNO) == "") { ?>
		<th data-name="CASHREFNO" class="<?php echo $store_storeled_list->CASHREFNO->headerCellClass() ?>"><div id="elh_store_storeled_CASHREFNO" class="store_storeled_CASHREFNO"><div class="ew-table-header-caption"><?php echo $store_storeled_list->CASHREFNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CASHREFNO" class="<?php echo $store_storeled_list->CASHREFNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->CASHREFNO) ?>', 1);"><div id="elh_store_storeled_CASHREFNO" class="store_storeled_CASHREFNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->CASHREFNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->CASHREFNO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->CASHREFNO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->CASHIERSHIFT->Visible) { // CASHIERSHIFT ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->CASHIERSHIFT) == "") { ?>
		<th data-name="CASHIERSHIFT" class="<?php echo $store_storeled_list->CASHIERSHIFT->headerCellClass() ?>"><div id="elh_store_storeled_CASHIERSHIFT" class="store_storeled_CASHIERSHIFT"><div class="ew-table-header-caption"><?php echo $store_storeled_list->CASHIERSHIFT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CASHIERSHIFT" class="<?php echo $store_storeled_list->CASHIERSHIFT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->CASHIERSHIFT) ?>', 1);"><div id="elh_store_storeled_CASHIERSHIFT" class="store_storeled_CASHIERSHIFT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->CASHIERSHIFT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->CASHIERSHIFT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->CASHIERSHIFT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->PRCODE->Visible) { // PRCODE ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->PRCODE) == "") { ?>
		<th data-name="PRCODE" class="<?php echo $store_storeled_list->PRCODE->headerCellClass() ?>"><div id="elh_store_storeled_PRCODE" class="store_storeled_PRCODE"><div class="ew-table-header-caption"><?php echo $store_storeled_list->PRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRCODE" class="<?php echo $store_storeled_list->PRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->PRCODE) ?>', 1);"><div id="elh_store_storeled_PRCODE" class="store_storeled_PRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->PRCODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->PRCODE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->PRCODE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->RELEASEBY->Visible) { // RELEASEBY ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->RELEASEBY) == "") { ?>
		<th data-name="RELEASEBY" class="<?php echo $store_storeled_list->RELEASEBY->headerCellClass() ?>"><div id="elh_store_storeled_RELEASEBY" class="store_storeled_RELEASEBY"><div class="ew-table-header-caption"><?php echo $store_storeled_list->RELEASEBY->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RELEASEBY" class="<?php echo $store_storeled_list->RELEASEBY->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->RELEASEBY) ?>', 1);"><div id="elh_store_storeled_RELEASEBY" class="store_storeled_RELEASEBY">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->RELEASEBY->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->RELEASEBY->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->RELEASEBY->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->CRAUTHOR->Visible) { // CRAUTHOR ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->CRAUTHOR) == "") { ?>
		<th data-name="CRAUTHOR" class="<?php echo $store_storeled_list->CRAUTHOR->headerCellClass() ?>"><div id="elh_store_storeled_CRAUTHOR" class="store_storeled_CRAUTHOR"><div class="ew-table-header-caption"><?php echo $store_storeled_list->CRAUTHOR->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CRAUTHOR" class="<?php echo $store_storeled_list->CRAUTHOR->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->CRAUTHOR) ?>', 1);"><div id="elh_store_storeled_CRAUTHOR" class="store_storeled_CRAUTHOR">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->CRAUTHOR->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->CRAUTHOR->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->CRAUTHOR->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->PAYMENT->Visible) { // PAYMENT ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->PAYMENT) == "") { ?>
		<th data-name="PAYMENT" class="<?php echo $store_storeled_list->PAYMENT->headerCellClass() ?>"><div id="elh_store_storeled_PAYMENT" class="store_storeled_PAYMENT"><div class="ew-table-header-caption"><?php echo $store_storeled_list->PAYMENT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PAYMENT" class="<?php echo $store_storeled_list->PAYMENT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->PAYMENT) ?>', 1);"><div id="elh_store_storeled_PAYMENT" class="store_storeled_PAYMENT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->PAYMENT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->PAYMENT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->PAYMENT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->DRID->Visible) { // DRID ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->DRID) == "") { ?>
		<th data-name="DRID" class="<?php echo $store_storeled_list->DRID->headerCellClass() ?>"><div id="elh_store_storeled_DRID" class="store_storeled_DRID"><div class="ew-table-header-caption"><?php echo $store_storeled_list->DRID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DRID" class="<?php echo $store_storeled_list->DRID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->DRID) ?>', 1);"><div id="elh_store_storeled_DRID" class="store_storeled_DRID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->DRID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->DRID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->DRID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->WARD->Visible) { // WARD ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->WARD) == "") { ?>
		<th data-name="WARD" class="<?php echo $store_storeled_list->WARD->headerCellClass() ?>"><div id="elh_store_storeled_WARD" class="store_storeled_WARD"><div class="ew-table-header-caption"><?php echo $store_storeled_list->WARD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="WARD" class="<?php echo $store_storeled_list->WARD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->WARD) ?>', 1);"><div id="elh_store_storeled_WARD" class="store_storeled_WARD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->WARD->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->WARD->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->WARD->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->STAXTYPE->Visible) { // STAXTYPE ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->STAXTYPE) == "") { ?>
		<th data-name="STAXTYPE" class="<?php echo $store_storeled_list->STAXTYPE->headerCellClass() ?>"><div id="elh_store_storeled_STAXTYPE" class="store_storeled_STAXTYPE"><div class="ew-table-header-caption"><?php echo $store_storeled_list->STAXTYPE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="STAXTYPE" class="<?php echo $store_storeled_list->STAXTYPE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->STAXTYPE) ?>', 1);"><div id="elh_store_storeled_STAXTYPE" class="store_storeled_STAXTYPE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->STAXTYPE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->STAXTYPE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->STAXTYPE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->PURDISCVAL->Visible) { // PURDISCVAL ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->PURDISCVAL) == "") { ?>
		<th data-name="PURDISCVAL" class="<?php echo $store_storeled_list->PURDISCVAL->headerCellClass() ?>"><div id="elh_store_storeled_PURDISCVAL" class="store_storeled_PURDISCVAL"><div class="ew-table-header-caption"><?php echo $store_storeled_list->PURDISCVAL->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PURDISCVAL" class="<?php echo $store_storeled_list->PURDISCVAL->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->PURDISCVAL) ?>', 1);"><div id="elh_store_storeled_PURDISCVAL" class="store_storeled_PURDISCVAL">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->PURDISCVAL->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->PURDISCVAL->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->PURDISCVAL->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->RNDOFF->Visible) { // RNDOFF ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->RNDOFF) == "") { ?>
		<th data-name="RNDOFF" class="<?php echo $store_storeled_list->RNDOFF->headerCellClass() ?>"><div id="elh_store_storeled_RNDOFF" class="store_storeled_RNDOFF"><div class="ew-table-header-caption"><?php echo $store_storeled_list->RNDOFF->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RNDOFF" class="<?php echo $store_storeled_list->RNDOFF->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->RNDOFF) ?>', 1);"><div id="elh_store_storeled_RNDOFF" class="store_storeled_RNDOFF">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->RNDOFF->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->RNDOFF->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->RNDOFF->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->DISCONMRP->Visible) { // DISCONMRP ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->DISCONMRP) == "") { ?>
		<th data-name="DISCONMRP" class="<?php echo $store_storeled_list->DISCONMRP->headerCellClass() ?>"><div id="elh_store_storeled_DISCONMRP" class="store_storeled_DISCONMRP"><div class="ew-table-header-caption"><?php echo $store_storeled_list->DISCONMRP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DISCONMRP" class="<?php echo $store_storeled_list->DISCONMRP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->DISCONMRP) ?>', 1);"><div id="elh_store_storeled_DISCONMRP" class="store_storeled_DISCONMRP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->DISCONMRP->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->DISCONMRP->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->DISCONMRP->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->DELVDT->Visible) { // DELVDT ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->DELVDT) == "") { ?>
		<th data-name="DELVDT" class="<?php echo $store_storeled_list->DELVDT->headerCellClass() ?>"><div id="elh_store_storeled_DELVDT" class="store_storeled_DELVDT"><div class="ew-table-header-caption"><?php echo $store_storeled_list->DELVDT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DELVDT" class="<?php echo $store_storeled_list->DELVDT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->DELVDT) ?>', 1);"><div id="elh_store_storeled_DELVDT" class="store_storeled_DELVDT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->DELVDT->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->DELVDT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->DELVDT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->DELVTIME->Visible) { // DELVTIME ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->DELVTIME) == "") { ?>
		<th data-name="DELVTIME" class="<?php echo $store_storeled_list->DELVTIME->headerCellClass() ?>"><div id="elh_store_storeled_DELVTIME" class="store_storeled_DELVTIME"><div class="ew-table-header-caption"><?php echo $store_storeled_list->DELVTIME->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DELVTIME" class="<?php echo $store_storeled_list->DELVTIME->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->DELVTIME) ?>', 1);"><div id="elh_store_storeled_DELVTIME" class="store_storeled_DELVTIME">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->DELVTIME->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->DELVTIME->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->DELVTIME->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->DELVBY->Visible) { // DELVBY ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->DELVBY) == "") { ?>
		<th data-name="DELVBY" class="<?php echo $store_storeled_list->DELVBY->headerCellClass() ?>"><div id="elh_store_storeled_DELVBY" class="store_storeled_DELVBY"><div class="ew-table-header-caption"><?php echo $store_storeled_list->DELVBY->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DELVBY" class="<?php echo $store_storeled_list->DELVBY->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->DELVBY) ?>', 1);"><div id="elh_store_storeled_DELVBY" class="store_storeled_DELVBY">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->DELVBY->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->DELVBY->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->DELVBY->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->HOSPNO->Visible) { // HOSPNO ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->HOSPNO) == "") { ?>
		<th data-name="HOSPNO" class="<?php echo $store_storeled_list->HOSPNO->headerCellClass() ?>"><div id="elh_store_storeled_HOSPNO" class="store_storeled_HOSPNO"><div class="ew-table-header-caption"><?php echo $store_storeled_list->HOSPNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HOSPNO" class="<?php echo $store_storeled_list->HOSPNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->HOSPNO) ?>', 1);"><div id="elh_store_storeled_HOSPNO" class="store_storeled_HOSPNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->HOSPNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->HOSPNO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->HOSPNO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->id->Visible) { // id ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $store_storeled_list->id->headerCellClass() ?>"><div id="elh_store_storeled_id" class="store_storeled_id"><div class="ew-table-header-caption"><?php echo $store_storeled_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $store_storeled_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->id) ?>', 1);"><div id="elh_store_storeled_id" class="store_storeled_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->pbv->Visible) { // pbv ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->pbv) == "") { ?>
		<th data-name="pbv" class="<?php echo $store_storeled_list->pbv->headerCellClass() ?>"><div id="elh_store_storeled_pbv" class="store_storeled_pbv"><div class="ew-table-header-caption"><?php echo $store_storeled_list->pbv->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pbv" class="<?php echo $store_storeled_list->pbv->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->pbv) ?>', 1);"><div id="elh_store_storeled_pbv" class="store_storeled_pbv">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->pbv->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->pbv->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->pbv->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->pbt->Visible) { // pbt ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->pbt) == "") { ?>
		<th data-name="pbt" class="<?php echo $store_storeled_list->pbt->headerCellClass() ?>"><div id="elh_store_storeled_pbt" class="store_storeled_pbt"><div class="ew-table-header-caption"><?php echo $store_storeled_list->pbt->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pbt" class="<?php echo $store_storeled_list->pbt->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->pbt) ?>', 1);"><div id="elh_store_storeled_pbt" class="store_storeled_pbt">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->pbt->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->pbt->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->pbt->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->SiNo->Visible) { // SiNo ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->SiNo) == "") { ?>
		<th data-name="SiNo" class="<?php echo $store_storeled_list->SiNo->headerCellClass() ?>"><div id="elh_store_storeled_SiNo" class="store_storeled_SiNo"><div class="ew-table-header-caption"><?php echo $store_storeled_list->SiNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SiNo" class="<?php echo $store_storeled_list->SiNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->SiNo) ?>', 1);"><div id="elh_store_storeled_SiNo" class="store_storeled_SiNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->SiNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->SiNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->SiNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->Product->Visible) { // Product ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->Product) == "") { ?>
		<th data-name="Product" class="<?php echo $store_storeled_list->Product->headerCellClass() ?>"><div id="elh_store_storeled_Product" class="store_storeled_Product"><div class="ew-table-header-caption"><?php echo $store_storeled_list->Product->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Product" class="<?php echo $store_storeled_list->Product->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->Product) ?>', 1);"><div id="elh_store_storeled_Product" class="store_storeled_Product">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->Product->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->Product->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->Product->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->Mfg->Visible) { // Mfg ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->Mfg) == "") { ?>
		<th data-name="Mfg" class="<?php echo $store_storeled_list->Mfg->headerCellClass() ?>"><div id="elh_store_storeled_Mfg" class="store_storeled_Mfg"><div class="ew-table-header-caption"><?php echo $store_storeled_list->Mfg->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mfg" class="<?php echo $store_storeled_list->Mfg->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->Mfg) ?>', 1);"><div id="elh_store_storeled_Mfg" class="store_storeled_Mfg">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->Mfg->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->Mfg->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->Mfg->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->HosoID->Visible) { // HosoID ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->HosoID) == "") { ?>
		<th data-name="HosoID" class="<?php echo $store_storeled_list->HosoID->headerCellClass() ?>"><div id="elh_store_storeled_HosoID" class="store_storeled_HosoID"><div class="ew-table-header-caption"><?php echo $store_storeled_list->HosoID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HosoID" class="<?php echo $store_storeled_list->HosoID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->HosoID) ?>', 1);"><div id="elh_store_storeled_HosoID" class="store_storeled_HosoID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->HosoID->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->HosoID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->HosoID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->createdby->Visible) { // createdby ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $store_storeled_list->createdby->headerCellClass() ?>"><div id="elh_store_storeled_createdby" class="store_storeled_createdby"><div class="ew-table-header-caption"><?php echo $store_storeled_list->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $store_storeled_list->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->createdby) ?>', 1);"><div id="elh_store_storeled_createdby" class="store_storeled_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->createdby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->createdby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->createdby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->createddatetime->Visible) { // createddatetime ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $store_storeled_list->createddatetime->headerCellClass() ?>"><div id="elh_store_storeled_createddatetime" class="store_storeled_createddatetime"><div class="ew-table-header-caption"><?php echo $store_storeled_list->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $store_storeled_list->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->createddatetime) ?>', 1);"><div id="elh_store_storeled_createddatetime" class="store_storeled_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->createddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->createddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->modifiedby->Visible) { // modifiedby ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $store_storeled_list->modifiedby->headerCellClass() ?>"><div id="elh_store_storeled_modifiedby" class="store_storeled_modifiedby"><div class="ew-table-header-caption"><?php echo $store_storeled_list->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $store_storeled_list->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->modifiedby) ?>', 1);"><div id="elh_store_storeled_modifiedby" class="store_storeled_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->modifiedby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->modifiedby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->modifiedby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $store_storeled_list->modifieddatetime->headerCellClass() ?>"><div id="elh_store_storeled_modifieddatetime" class="store_storeled_modifieddatetime"><div class="ew-table-header-caption"><?php echo $store_storeled_list->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $store_storeled_list->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->modifieddatetime) ?>', 1);"><div id="elh_store_storeled_modifieddatetime" class="store_storeled_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->modifieddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->modifieddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->MFRCODE->Visible) { // MFRCODE ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->MFRCODE) == "") { ?>
		<th data-name="MFRCODE" class="<?php echo $store_storeled_list->MFRCODE->headerCellClass() ?>"><div id="elh_store_storeled_MFRCODE" class="store_storeled_MFRCODE"><div class="ew-table-header-caption"><?php echo $store_storeled_list->MFRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MFRCODE" class="<?php echo $store_storeled_list->MFRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->MFRCODE) ?>', 1);"><div id="elh_store_storeled_MFRCODE" class="store_storeled_MFRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->MFRCODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->MFRCODE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->MFRCODE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->Reception->Visible) { // Reception ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->Reception) == "") { ?>
		<th data-name="Reception" class="<?php echo $store_storeled_list->Reception->headerCellClass() ?>"><div id="elh_store_storeled_Reception" class="store_storeled_Reception"><div class="ew-table-header-caption"><?php echo $store_storeled_list->Reception->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Reception" class="<?php echo $store_storeled_list->Reception->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->Reception) ?>', 1);"><div id="elh_store_storeled_Reception" class="store_storeled_Reception">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->Reception->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->Reception->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->Reception->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->PatID->Visible) { // PatID ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->PatID) == "") { ?>
		<th data-name="PatID" class="<?php echo $store_storeled_list->PatID->headerCellClass() ?>"><div id="elh_store_storeled_PatID" class="store_storeled_PatID"><div class="ew-table-header-caption"><?php echo $store_storeled_list->PatID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatID" class="<?php echo $store_storeled_list->PatID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->PatID) ?>', 1);"><div id="elh_store_storeled_PatID" class="store_storeled_PatID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->PatID->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->PatID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->PatID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->mrnno->Visible) { // mrnno ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->mrnno) == "") { ?>
		<th data-name="mrnno" class="<?php echo $store_storeled_list->mrnno->headerCellClass() ?>"><div id="elh_store_storeled_mrnno" class="store_storeled_mrnno"><div class="ew-table-header-caption"><?php echo $store_storeled_list->mrnno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnno" class="<?php echo $store_storeled_list->mrnno->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->mrnno) ?>', 1);"><div id="elh_store_storeled_mrnno" class="store_storeled_mrnno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->mrnno->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->mrnno->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->mrnno->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled_list->BRNAME->Visible) { // BRNAME ?>
	<?php if ($store_storeled_list->SortUrl($store_storeled_list->BRNAME) == "") { ?>
		<th data-name="BRNAME" class="<?php echo $store_storeled_list->BRNAME->headerCellClass() ?>"><div id="elh_store_storeled_BRNAME" class="store_storeled_BRNAME"><div class="ew-table-header-caption"><?php echo $store_storeled_list->BRNAME->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BRNAME" class="<?php echo $store_storeled_list->BRNAME->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storeled_list->SortUrl($store_storeled_list->BRNAME) ?>', 1);"><div id="elh_store_storeled_BRNAME" class="store_storeled_BRNAME">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled_list->BRNAME->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled_list->BRNAME->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storeled_list->BRNAME->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$store_storeled_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($store_storeled_list->ExportAll && $store_storeled_list->isExport()) {
	$store_storeled_list->StopRecord = $store_storeled_list->TotalRecords;
} else {

	// Set the last record to display
	if ($store_storeled_list->TotalRecords > $store_storeled_list->StartRecord + $store_storeled_list->DisplayRecords - 1)
		$store_storeled_list->StopRecord = $store_storeled_list->StartRecord + $store_storeled_list->DisplayRecords - 1;
	else
		$store_storeled_list->StopRecord = $store_storeled_list->TotalRecords;
}
$store_storeled_list->RecordCount = $store_storeled_list->StartRecord - 1;
if ($store_storeled_list->Recordset && !$store_storeled_list->Recordset->EOF) {
	$store_storeled_list->Recordset->moveFirst();
	$selectLimit = $store_storeled_list->UseSelectLimit;
	if (!$selectLimit && $store_storeled_list->StartRecord > 1)
		$store_storeled_list->Recordset->move($store_storeled_list->StartRecord - 1);
} elseif (!$store_storeled->AllowAddDeleteRow && $store_storeled_list->StopRecord == 0) {
	$store_storeled_list->StopRecord = $store_storeled->GridAddRowCount;
}

// Initialize aggregate
$store_storeled->RowType = ROWTYPE_AGGREGATEINIT;
$store_storeled->resetAttributes();
$store_storeled_list->renderRow();
while ($store_storeled_list->RecordCount < $store_storeled_list->StopRecord) {
	$store_storeled_list->RecordCount++;
	if ($store_storeled_list->RecordCount >= $store_storeled_list->StartRecord) {
		$store_storeled_list->RowCount++;

		// Set up key count
		$store_storeled_list->KeyCount = $store_storeled_list->RowIndex;

		// Init row class and style
		$store_storeled->resetAttributes();
		$store_storeled->CssClass = "";
		if ($store_storeled_list->isGridAdd()) {
		} else {
			$store_storeled_list->loadRowValues($store_storeled_list->Recordset); // Load row values
		}
		$store_storeled->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$store_storeled->RowAttrs->merge(["data-rowindex" => $store_storeled_list->RowCount, "id" => "r" . $store_storeled_list->RowCount . "_store_storeled", "data-rowtype" => $store_storeled->RowType]);

		// Render row
		$store_storeled_list->renderRow();

		// Render list options
		$store_storeled_list->renderListOptions();
?>
	<tr <?php echo $store_storeled->rowAttributes() ?>>
<?php

// Render list options (body, left)
$store_storeled_list->ListOptions->render("body", "left", $store_storeled_list->RowCount);
?>
	<?php if ($store_storeled_list->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE" <?php echo $store_storeled_list->BRCODE->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_BRCODE">
<span<?php echo $store_storeled_list->BRCODE->viewAttributes() ?>><?php echo $store_storeled_list->BRCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->TYPE->Visible) { // TYPE ?>
		<td data-name="TYPE" <?php echo $store_storeled_list->TYPE->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_TYPE">
<span<?php echo $store_storeled_list->TYPE->viewAttributes() ?>><?php echo $store_storeled_list->TYPE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->DN->Visible) { // DN ?>
		<td data-name="DN" <?php echo $store_storeled_list->DN->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_DN">
<span<?php echo $store_storeled_list->DN->viewAttributes() ?>><?php echo $store_storeled_list->DN->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->RDN->Visible) { // RDN ?>
		<td data-name="RDN" <?php echo $store_storeled_list->RDN->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_RDN">
<span<?php echo $store_storeled_list->RDN->viewAttributes() ?>><?php echo $store_storeled_list->RDN->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->DT->Visible) { // DT ?>
		<td data-name="DT" <?php echo $store_storeled_list->DT->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_DT">
<span<?php echo $store_storeled_list->DT->viewAttributes() ?>><?php echo $store_storeled_list->DT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->PRC->Visible) { // PRC ?>
		<td data-name="PRC" <?php echo $store_storeled_list->PRC->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_PRC">
<span<?php echo $store_storeled_list->PRC->viewAttributes() ?>><?php echo $store_storeled_list->PRC->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->OQ->Visible) { // OQ ?>
		<td data-name="OQ" <?php echo $store_storeled_list->OQ->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_OQ">
<span<?php echo $store_storeled_list->OQ->viewAttributes() ?>><?php echo $store_storeled_list->OQ->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->RQ->Visible) { // RQ ?>
		<td data-name="RQ" <?php echo $store_storeled_list->RQ->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_RQ">
<span<?php echo $store_storeled_list->RQ->viewAttributes() ?>><?php echo $store_storeled_list->RQ->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->MRQ->Visible) { // MRQ ?>
		<td data-name="MRQ" <?php echo $store_storeled_list->MRQ->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_MRQ">
<span<?php echo $store_storeled_list->MRQ->viewAttributes() ?>><?php echo $store_storeled_list->MRQ->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->IQ->Visible) { // IQ ?>
		<td data-name="IQ" <?php echo $store_storeled_list->IQ->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_IQ">
<span<?php echo $store_storeled_list->IQ->viewAttributes() ?>><?php echo $store_storeled_list->IQ->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->BATCHNO->Visible) { // BATCHNO ?>
		<td data-name="BATCHNO" <?php echo $store_storeled_list->BATCHNO->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_BATCHNO">
<span<?php echo $store_storeled_list->BATCHNO->viewAttributes() ?>><?php echo $store_storeled_list->BATCHNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->EXPDT->Visible) { // EXPDT ?>
		<td data-name="EXPDT" <?php echo $store_storeled_list->EXPDT->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_EXPDT">
<span<?php echo $store_storeled_list->EXPDT->viewAttributes() ?>><?php echo $store_storeled_list->EXPDT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->BILLNO->Visible) { // BILLNO ?>
		<td data-name="BILLNO" <?php echo $store_storeled_list->BILLNO->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_BILLNO">
<span<?php echo $store_storeled_list->BILLNO->viewAttributes() ?>><?php echo $store_storeled_list->BILLNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->BILLDT->Visible) { // BILLDT ?>
		<td data-name="BILLDT" <?php echo $store_storeled_list->BILLDT->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_BILLDT">
<span<?php echo $store_storeled_list->BILLDT->viewAttributes() ?>><?php echo $store_storeled_list->BILLDT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->RT->Visible) { // RT ?>
		<td data-name="RT" <?php echo $store_storeled_list->RT->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_RT">
<span<?php echo $store_storeled_list->RT->viewAttributes() ?>><?php echo $store_storeled_list->RT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->VALUE->Visible) { // VALUE ?>
		<td data-name="VALUE" <?php echo $store_storeled_list->VALUE->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_VALUE">
<span<?php echo $store_storeled_list->VALUE->viewAttributes() ?>><?php echo $store_storeled_list->VALUE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->DISC->Visible) { // DISC ?>
		<td data-name="DISC" <?php echo $store_storeled_list->DISC->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_DISC">
<span<?php echo $store_storeled_list->DISC->viewAttributes() ?>><?php echo $store_storeled_list->DISC->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->TAXP->Visible) { // TAXP ?>
		<td data-name="TAXP" <?php echo $store_storeled_list->TAXP->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_TAXP">
<span<?php echo $store_storeled_list->TAXP->viewAttributes() ?>><?php echo $store_storeled_list->TAXP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->TAX->Visible) { // TAX ?>
		<td data-name="TAX" <?php echo $store_storeled_list->TAX->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_TAX">
<span<?php echo $store_storeled_list->TAX->viewAttributes() ?>><?php echo $store_storeled_list->TAX->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->TAXR->Visible) { // TAXR ?>
		<td data-name="TAXR" <?php echo $store_storeled_list->TAXR->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_TAXR">
<span<?php echo $store_storeled_list->TAXR->viewAttributes() ?>><?php echo $store_storeled_list->TAXR->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->DAMT->Visible) { // DAMT ?>
		<td data-name="DAMT" <?php echo $store_storeled_list->DAMT->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_DAMT">
<span<?php echo $store_storeled_list->DAMT->viewAttributes() ?>><?php echo $store_storeled_list->DAMT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->EMPNO->Visible) { // EMPNO ?>
		<td data-name="EMPNO" <?php echo $store_storeled_list->EMPNO->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_EMPNO">
<span<?php echo $store_storeled_list->EMPNO->viewAttributes() ?>><?php echo $store_storeled_list->EMPNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->PC->Visible) { // PC ?>
		<td data-name="PC" <?php echo $store_storeled_list->PC->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_PC">
<span<?php echo $store_storeled_list->PC->viewAttributes() ?>><?php echo $store_storeled_list->PC->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->DRNAME->Visible) { // DRNAME ?>
		<td data-name="DRNAME" <?php echo $store_storeled_list->DRNAME->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_DRNAME">
<span<?php echo $store_storeled_list->DRNAME->viewAttributes() ?>><?php echo $store_storeled_list->DRNAME->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->BTIME->Visible) { // BTIME ?>
		<td data-name="BTIME" <?php echo $store_storeled_list->BTIME->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_BTIME">
<span<?php echo $store_storeled_list->BTIME->viewAttributes() ?>><?php echo $store_storeled_list->BTIME->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->ONO->Visible) { // ONO ?>
		<td data-name="ONO" <?php echo $store_storeled_list->ONO->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_ONO">
<span<?php echo $store_storeled_list->ONO->viewAttributes() ?>><?php echo $store_storeled_list->ONO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->ODT->Visible) { // ODT ?>
		<td data-name="ODT" <?php echo $store_storeled_list->ODT->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_ODT">
<span<?php echo $store_storeled_list->ODT->viewAttributes() ?>><?php echo $store_storeled_list->ODT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->PURRT->Visible) { // PURRT ?>
		<td data-name="PURRT" <?php echo $store_storeled_list->PURRT->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_PURRT">
<span<?php echo $store_storeled_list->PURRT->viewAttributes() ?>><?php echo $store_storeled_list->PURRT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->GRP->Visible) { // GRP ?>
		<td data-name="GRP" <?php echo $store_storeled_list->GRP->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_GRP">
<span<?php echo $store_storeled_list->GRP->viewAttributes() ?>><?php echo $store_storeled_list->GRP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->IBATCH->Visible) { // IBATCH ?>
		<td data-name="IBATCH" <?php echo $store_storeled_list->IBATCH->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_IBATCH">
<span<?php echo $store_storeled_list->IBATCH->viewAttributes() ?>><?php echo $store_storeled_list->IBATCH->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->IPNO->Visible) { // IPNO ?>
		<td data-name="IPNO" <?php echo $store_storeled_list->IPNO->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_IPNO">
<span<?php echo $store_storeled_list->IPNO->viewAttributes() ?>><?php echo $store_storeled_list->IPNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->OPNO->Visible) { // OPNO ?>
		<td data-name="OPNO" <?php echo $store_storeled_list->OPNO->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_OPNO">
<span<?php echo $store_storeled_list->OPNO->viewAttributes() ?>><?php echo $store_storeled_list->OPNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->RECID->Visible) { // RECID ?>
		<td data-name="RECID" <?php echo $store_storeled_list->RECID->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_RECID">
<span<?php echo $store_storeled_list->RECID->viewAttributes() ?>><?php echo $store_storeled_list->RECID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->FQTY->Visible) { // FQTY ?>
		<td data-name="FQTY" <?php echo $store_storeled_list->FQTY->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_FQTY">
<span<?php echo $store_storeled_list->FQTY->viewAttributes() ?>><?php echo $store_storeled_list->FQTY->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->UR->Visible) { // UR ?>
		<td data-name="UR" <?php echo $store_storeled_list->UR->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_UR">
<span<?php echo $store_storeled_list->UR->viewAttributes() ?>><?php echo $store_storeled_list->UR->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->DCID->Visible) { // DCID ?>
		<td data-name="DCID" <?php echo $store_storeled_list->DCID->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_DCID">
<span<?php echo $store_storeled_list->DCID->viewAttributes() ?>><?php echo $store_storeled_list->DCID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->_USERID->Visible) { // USERID ?>
		<td data-name="_USERID" <?php echo $store_storeled_list->_USERID->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled__USERID">
<span<?php echo $store_storeled_list->_USERID->viewAttributes() ?>><?php echo $store_storeled_list->_USERID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->MODDT->Visible) { // MODDT ?>
		<td data-name="MODDT" <?php echo $store_storeled_list->MODDT->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_MODDT">
<span<?php echo $store_storeled_list->MODDT->viewAttributes() ?>><?php echo $store_storeled_list->MODDT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->FYM->Visible) { // FYM ?>
		<td data-name="FYM" <?php echo $store_storeled_list->FYM->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_FYM">
<span<?php echo $store_storeled_list->FYM->viewAttributes() ?>><?php echo $store_storeled_list->FYM->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->PRCBATCH->Visible) { // PRCBATCH ?>
		<td data-name="PRCBATCH" <?php echo $store_storeled_list->PRCBATCH->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_PRCBATCH">
<span<?php echo $store_storeled_list->PRCBATCH->viewAttributes() ?>><?php echo $store_storeled_list->PRCBATCH->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->SLNO->Visible) { // SLNO ?>
		<td data-name="SLNO" <?php echo $store_storeled_list->SLNO->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_SLNO">
<span<?php echo $store_storeled_list->SLNO->viewAttributes() ?>><?php echo $store_storeled_list->SLNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->MRP->Visible) { // MRP ?>
		<td data-name="MRP" <?php echo $store_storeled_list->MRP->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_MRP">
<span<?php echo $store_storeled_list->MRP->viewAttributes() ?>><?php echo $store_storeled_list->MRP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->BILLYM->Visible) { // BILLYM ?>
		<td data-name="BILLYM" <?php echo $store_storeled_list->BILLYM->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_BILLYM">
<span<?php echo $store_storeled_list->BILLYM->viewAttributes() ?>><?php echo $store_storeled_list->BILLYM->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->BILLGRP->Visible) { // BILLGRP ?>
		<td data-name="BILLGRP" <?php echo $store_storeled_list->BILLGRP->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_BILLGRP">
<span<?php echo $store_storeled_list->BILLGRP->viewAttributes() ?>><?php echo $store_storeled_list->BILLGRP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->STAFF->Visible) { // STAFF ?>
		<td data-name="STAFF" <?php echo $store_storeled_list->STAFF->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_STAFF">
<span<?php echo $store_storeled_list->STAFF->viewAttributes() ?>><?php echo $store_storeled_list->STAFF->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->TEMPIPNO->Visible) { // TEMPIPNO ?>
		<td data-name="TEMPIPNO" <?php echo $store_storeled_list->TEMPIPNO->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_TEMPIPNO">
<span<?php echo $store_storeled_list->TEMPIPNO->viewAttributes() ?>><?php echo $store_storeled_list->TEMPIPNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->PRNTED->Visible) { // PRNTED ?>
		<td data-name="PRNTED" <?php echo $store_storeled_list->PRNTED->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_PRNTED">
<span<?php echo $store_storeled_list->PRNTED->viewAttributes() ?>><?php echo $store_storeled_list->PRNTED->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->PATNAME->Visible) { // PATNAME ?>
		<td data-name="PATNAME" <?php echo $store_storeled_list->PATNAME->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_PATNAME">
<span<?php echo $store_storeled_list->PATNAME->viewAttributes() ?>><?php echo $store_storeled_list->PATNAME->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->PJVNO->Visible) { // PJVNO ?>
		<td data-name="PJVNO" <?php echo $store_storeled_list->PJVNO->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_PJVNO">
<span<?php echo $store_storeled_list->PJVNO->viewAttributes() ?>><?php echo $store_storeled_list->PJVNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->PJVSLNO->Visible) { // PJVSLNO ?>
		<td data-name="PJVSLNO" <?php echo $store_storeled_list->PJVSLNO->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_PJVSLNO">
<span<?php echo $store_storeled_list->PJVSLNO->viewAttributes() ?>><?php echo $store_storeled_list->PJVSLNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->OTHDISC->Visible) { // OTHDISC ?>
		<td data-name="OTHDISC" <?php echo $store_storeled_list->OTHDISC->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_OTHDISC">
<span<?php echo $store_storeled_list->OTHDISC->viewAttributes() ?>><?php echo $store_storeled_list->OTHDISC->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->PJVYM->Visible) { // PJVYM ?>
		<td data-name="PJVYM" <?php echo $store_storeled_list->PJVYM->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_PJVYM">
<span<?php echo $store_storeled_list->PJVYM->viewAttributes() ?>><?php echo $store_storeled_list->PJVYM->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->PURDISCPER->Visible) { // PURDISCPER ?>
		<td data-name="PURDISCPER" <?php echo $store_storeled_list->PURDISCPER->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_PURDISCPER">
<span<?php echo $store_storeled_list->PURDISCPER->viewAttributes() ?>><?php echo $store_storeled_list->PURDISCPER->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->CASHIER->Visible) { // CASHIER ?>
		<td data-name="CASHIER" <?php echo $store_storeled_list->CASHIER->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_CASHIER">
<span<?php echo $store_storeled_list->CASHIER->viewAttributes() ?>><?php echo $store_storeled_list->CASHIER->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->CASHTIME->Visible) { // CASHTIME ?>
		<td data-name="CASHTIME" <?php echo $store_storeled_list->CASHTIME->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_CASHTIME">
<span<?php echo $store_storeled_list->CASHTIME->viewAttributes() ?>><?php echo $store_storeled_list->CASHTIME->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->CASHRECD->Visible) { // CASHRECD ?>
		<td data-name="CASHRECD" <?php echo $store_storeled_list->CASHRECD->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_CASHRECD">
<span<?php echo $store_storeled_list->CASHRECD->viewAttributes() ?>><?php echo $store_storeled_list->CASHRECD->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->CASHREFNO->Visible) { // CASHREFNO ?>
		<td data-name="CASHREFNO" <?php echo $store_storeled_list->CASHREFNO->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_CASHREFNO">
<span<?php echo $store_storeled_list->CASHREFNO->viewAttributes() ?>><?php echo $store_storeled_list->CASHREFNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->CASHIERSHIFT->Visible) { // CASHIERSHIFT ?>
		<td data-name="CASHIERSHIFT" <?php echo $store_storeled_list->CASHIERSHIFT->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_CASHIERSHIFT">
<span<?php echo $store_storeled_list->CASHIERSHIFT->viewAttributes() ?>><?php echo $store_storeled_list->CASHIERSHIFT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->PRCODE->Visible) { // PRCODE ?>
		<td data-name="PRCODE" <?php echo $store_storeled_list->PRCODE->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_PRCODE">
<span<?php echo $store_storeled_list->PRCODE->viewAttributes() ?>><?php echo $store_storeled_list->PRCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->RELEASEBY->Visible) { // RELEASEBY ?>
		<td data-name="RELEASEBY" <?php echo $store_storeled_list->RELEASEBY->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_RELEASEBY">
<span<?php echo $store_storeled_list->RELEASEBY->viewAttributes() ?>><?php echo $store_storeled_list->RELEASEBY->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->CRAUTHOR->Visible) { // CRAUTHOR ?>
		<td data-name="CRAUTHOR" <?php echo $store_storeled_list->CRAUTHOR->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_CRAUTHOR">
<span<?php echo $store_storeled_list->CRAUTHOR->viewAttributes() ?>><?php echo $store_storeled_list->CRAUTHOR->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->PAYMENT->Visible) { // PAYMENT ?>
		<td data-name="PAYMENT" <?php echo $store_storeled_list->PAYMENT->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_PAYMENT">
<span<?php echo $store_storeled_list->PAYMENT->viewAttributes() ?>><?php echo $store_storeled_list->PAYMENT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->DRID->Visible) { // DRID ?>
		<td data-name="DRID" <?php echo $store_storeled_list->DRID->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_DRID">
<span<?php echo $store_storeled_list->DRID->viewAttributes() ?>><?php echo $store_storeled_list->DRID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->WARD->Visible) { // WARD ?>
		<td data-name="WARD" <?php echo $store_storeled_list->WARD->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_WARD">
<span<?php echo $store_storeled_list->WARD->viewAttributes() ?>><?php echo $store_storeled_list->WARD->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->STAXTYPE->Visible) { // STAXTYPE ?>
		<td data-name="STAXTYPE" <?php echo $store_storeled_list->STAXTYPE->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_STAXTYPE">
<span<?php echo $store_storeled_list->STAXTYPE->viewAttributes() ?>><?php echo $store_storeled_list->STAXTYPE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->PURDISCVAL->Visible) { // PURDISCVAL ?>
		<td data-name="PURDISCVAL" <?php echo $store_storeled_list->PURDISCVAL->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_PURDISCVAL">
<span<?php echo $store_storeled_list->PURDISCVAL->viewAttributes() ?>><?php echo $store_storeled_list->PURDISCVAL->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->RNDOFF->Visible) { // RNDOFF ?>
		<td data-name="RNDOFF" <?php echo $store_storeled_list->RNDOFF->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_RNDOFF">
<span<?php echo $store_storeled_list->RNDOFF->viewAttributes() ?>><?php echo $store_storeled_list->RNDOFF->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->DISCONMRP->Visible) { // DISCONMRP ?>
		<td data-name="DISCONMRP" <?php echo $store_storeled_list->DISCONMRP->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_DISCONMRP">
<span<?php echo $store_storeled_list->DISCONMRP->viewAttributes() ?>><?php echo $store_storeled_list->DISCONMRP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->DELVDT->Visible) { // DELVDT ?>
		<td data-name="DELVDT" <?php echo $store_storeled_list->DELVDT->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_DELVDT">
<span<?php echo $store_storeled_list->DELVDT->viewAttributes() ?>><?php echo $store_storeled_list->DELVDT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->DELVTIME->Visible) { // DELVTIME ?>
		<td data-name="DELVTIME" <?php echo $store_storeled_list->DELVTIME->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_DELVTIME">
<span<?php echo $store_storeled_list->DELVTIME->viewAttributes() ?>><?php echo $store_storeled_list->DELVTIME->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->DELVBY->Visible) { // DELVBY ?>
		<td data-name="DELVBY" <?php echo $store_storeled_list->DELVBY->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_DELVBY">
<span<?php echo $store_storeled_list->DELVBY->viewAttributes() ?>><?php echo $store_storeled_list->DELVBY->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->HOSPNO->Visible) { // HOSPNO ?>
		<td data-name="HOSPNO" <?php echo $store_storeled_list->HOSPNO->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_HOSPNO">
<span<?php echo $store_storeled_list->HOSPNO->viewAttributes() ?>><?php echo $store_storeled_list->HOSPNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $store_storeled_list->id->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_id">
<span<?php echo $store_storeled_list->id->viewAttributes() ?>><?php echo $store_storeled_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->pbv->Visible) { // pbv ?>
		<td data-name="pbv" <?php echo $store_storeled_list->pbv->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_pbv">
<span<?php echo $store_storeled_list->pbv->viewAttributes() ?>><?php echo $store_storeled_list->pbv->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->pbt->Visible) { // pbt ?>
		<td data-name="pbt" <?php echo $store_storeled_list->pbt->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_pbt">
<span<?php echo $store_storeled_list->pbt->viewAttributes() ?>><?php echo $store_storeled_list->pbt->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->SiNo->Visible) { // SiNo ?>
		<td data-name="SiNo" <?php echo $store_storeled_list->SiNo->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_SiNo">
<span<?php echo $store_storeled_list->SiNo->viewAttributes() ?>><?php echo $store_storeled_list->SiNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->Product->Visible) { // Product ?>
		<td data-name="Product" <?php echo $store_storeled_list->Product->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_Product">
<span<?php echo $store_storeled_list->Product->viewAttributes() ?>><?php echo $store_storeled_list->Product->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->Mfg->Visible) { // Mfg ?>
		<td data-name="Mfg" <?php echo $store_storeled_list->Mfg->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_Mfg">
<span<?php echo $store_storeled_list->Mfg->viewAttributes() ?>><?php echo $store_storeled_list->Mfg->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->HosoID->Visible) { // HosoID ?>
		<td data-name="HosoID" <?php echo $store_storeled_list->HosoID->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_HosoID">
<span<?php echo $store_storeled_list->HosoID->viewAttributes() ?>><?php echo $store_storeled_list->HosoID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->createdby->Visible) { // createdby ?>
		<td data-name="createdby" <?php echo $store_storeled_list->createdby->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_createdby">
<span<?php echo $store_storeled_list->createdby->viewAttributes() ?>><?php echo $store_storeled_list->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" <?php echo $store_storeled_list->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_createddatetime">
<span<?php echo $store_storeled_list->createddatetime->viewAttributes() ?>><?php echo $store_storeled_list->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby" <?php echo $store_storeled_list->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_modifiedby">
<span<?php echo $store_storeled_list->modifiedby->viewAttributes() ?>><?php echo $store_storeled_list->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime" <?php echo $store_storeled_list->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_modifieddatetime">
<span<?php echo $store_storeled_list->modifieddatetime->viewAttributes() ?>><?php echo $store_storeled_list->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->MFRCODE->Visible) { // MFRCODE ?>
		<td data-name="MFRCODE" <?php echo $store_storeled_list->MFRCODE->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_MFRCODE">
<span<?php echo $store_storeled_list->MFRCODE->viewAttributes() ?>><?php echo $store_storeled_list->MFRCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->Reception->Visible) { // Reception ?>
		<td data-name="Reception" <?php echo $store_storeled_list->Reception->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_Reception">
<span<?php echo $store_storeled_list->Reception->viewAttributes() ?>><?php echo $store_storeled_list->Reception->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->PatID->Visible) { // PatID ?>
		<td data-name="PatID" <?php echo $store_storeled_list->PatID->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_PatID">
<span<?php echo $store_storeled_list->PatID->viewAttributes() ?>><?php echo $store_storeled_list->PatID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno" <?php echo $store_storeled_list->mrnno->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_mrnno">
<span<?php echo $store_storeled_list->mrnno->viewAttributes() ?>><?php echo $store_storeled_list->mrnno->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled_list->BRNAME->Visible) { // BRNAME ?>
		<td data-name="BRNAME" <?php echo $store_storeled_list->BRNAME->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCount ?>_store_storeled_BRNAME">
<span<?php echo $store_storeled_list->BRNAME->viewAttributes() ?>><?php echo $store_storeled_list->BRNAME->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$store_storeled_list->ListOptions->render("body", "right", $store_storeled_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$store_storeled_list->isGridAdd())
		$store_storeled_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$store_storeled->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($store_storeled_list->Recordset)
	$store_storeled_list->Recordset->Close();
?>
<?php if (!$store_storeled_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$store_storeled_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $store_storeled_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $store_storeled_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($store_storeled_list->TotalRecords == 0 && !$store_storeled->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $store_storeled_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$store_storeled_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$store_storeled_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$store_storeled->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_store_storeled",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$store_storeled_list->terminate();
?>
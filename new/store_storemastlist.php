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
$store_storemast_list = new store_storemast_list();

// Run the page
$store_storemast_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$store_storemast_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$store_storemast_list->isExport()) { ?>
<script>
var fstore_storemastlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fstore_storemastlist = currentForm = new ew.Form("fstore_storemastlist", "list");
	fstore_storemastlist.formKeyCountName = '<?php echo $store_storemast_list->FormKeyCountName ?>';
	loadjs.done("fstore_storemastlist");
});
var fstore_storemastlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fstore_storemastlistsrch = currentSearchForm = new ew.Form("fstore_storemastlistsrch");

	// Dynamic selection lists
	// Filters

	fstore_storemastlistsrch.filterList = <?php echo $store_storemast_list->getFilterList() ?>;
	loadjs.done("fstore_storemastlistsrch");
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
<?php if (!$store_storemast_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($store_storemast_list->TotalRecords > 0 && $store_storemast_list->ExportOptions->visible()) { ?>
<?php $store_storemast_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($store_storemast_list->ImportOptions->visible()) { ?>
<?php $store_storemast_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($store_storemast_list->SearchOptions->visible()) { ?>
<?php $store_storemast_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($store_storemast_list->FilterOptions->visible()) { ?>
<?php $store_storemast_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$store_storemast_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$store_storemast_list->isExport() && !$store_storemast->CurrentAction) { ?>
<form name="fstore_storemastlistsrch" id="fstore_storemastlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fstore_storemastlistsrch-search-panel" class="<?php echo $store_storemast_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="store_storemast">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $store_storemast_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($store_storemast_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($store_storemast_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $store_storemast_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($store_storemast_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($store_storemast_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($store_storemast_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($store_storemast_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $store_storemast_list->showPageHeader(); ?>
<?php
$store_storemast_list->showMessage();
?>
<?php if ($store_storemast_list->TotalRecords > 0 || $store_storemast->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($store_storemast_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> store_storemast">
<?php if (!$store_storemast_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$store_storemast_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $store_storemast_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $store_storemast_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fstore_storemastlist" id="fstore_storemastlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="store_storemast">
<div id="gmp_store_storemast" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($store_storemast_list->TotalRecords > 0 || $store_storemast_list->isGridEdit()) { ?>
<table id="tbl_store_storemastlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$store_storemast->RowType = ROWTYPE_HEADER;

// Render list options
$store_storemast_list->renderListOptions();

// Render list options (header, left)
$store_storemast_list->ListOptions->render("header", "left");
?>
<?php if ($store_storemast_list->BRCODE->Visible) { // BRCODE ?>
	<?php if ($store_storemast_list->SortUrl($store_storemast_list->BRCODE) == "") { ?>
		<th data-name="BRCODE" class="<?php echo $store_storemast_list->BRCODE->headerCellClass() ?>"><div id="elh_store_storemast_BRCODE" class="store_storemast_BRCODE"><div class="ew-table-header-caption"><?php echo $store_storemast_list->BRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BRCODE" class="<?php echo $store_storemast_list->BRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storemast_list->SortUrl($store_storemast_list->BRCODE) ?>', 1);"><div id="elh_store_storemast_BRCODE" class="store_storemast_BRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast_list->BRCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast_list->BRCODE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storemast_list->BRCODE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast_list->PRC->Visible) { // PRC ?>
	<?php if ($store_storemast_list->SortUrl($store_storemast_list->PRC) == "") { ?>
		<th data-name="PRC" class="<?php echo $store_storemast_list->PRC->headerCellClass() ?>"><div id="elh_store_storemast_PRC" class="store_storemast_PRC"><div class="ew-table-header-caption"><?php echo $store_storemast_list->PRC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRC" class="<?php echo $store_storemast_list->PRC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storemast_list->SortUrl($store_storemast_list->PRC) ?>', 1);"><div id="elh_store_storemast_PRC" class="store_storemast_PRC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast_list->PRC->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storemast_list->PRC->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storemast_list->PRC->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast_list->TYPE->Visible) { // TYPE ?>
	<?php if ($store_storemast_list->SortUrl($store_storemast_list->TYPE) == "") { ?>
		<th data-name="TYPE" class="<?php echo $store_storemast_list->TYPE->headerCellClass() ?>"><div id="elh_store_storemast_TYPE" class="store_storemast_TYPE"><div class="ew-table-header-caption"><?php echo $store_storemast_list->TYPE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TYPE" class="<?php echo $store_storemast_list->TYPE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storemast_list->SortUrl($store_storemast_list->TYPE) ?>', 1);"><div id="elh_store_storemast_TYPE" class="store_storemast_TYPE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast_list->TYPE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storemast_list->TYPE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storemast_list->TYPE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast_list->DES->Visible) { // DES ?>
	<?php if ($store_storemast_list->SortUrl($store_storemast_list->DES) == "") { ?>
		<th data-name="DES" class="<?php echo $store_storemast_list->DES->headerCellClass() ?>"><div id="elh_store_storemast_DES" class="store_storemast_DES"><div class="ew-table-header-caption"><?php echo $store_storemast_list->DES->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DES" class="<?php echo $store_storemast_list->DES->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storemast_list->SortUrl($store_storemast_list->DES) ?>', 1);"><div id="elh_store_storemast_DES" class="store_storemast_DES">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast_list->DES->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storemast_list->DES->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storemast_list->DES->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast_list->UM->Visible) { // UM ?>
	<?php if ($store_storemast_list->SortUrl($store_storemast_list->UM) == "") { ?>
		<th data-name="UM" class="<?php echo $store_storemast_list->UM->headerCellClass() ?>"><div id="elh_store_storemast_UM" class="store_storemast_UM"><div class="ew-table-header-caption"><?php echo $store_storemast_list->UM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UM" class="<?php echo $store_storemast_list->UM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storemast_list->SortUrl($store_storemast_list->UM) ?>', 1);"><div id="elh_store_storemast_UM" class="store_storemast_UM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast_list->UM->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storemast_list->UM->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storemast_list->UM->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast_list->RT->Visible) { // RT ?>
	<?php if ($store_storemast_list->SortUrl($store_storemast_list->RT) == "") { ?>
		<th data-name="RT" class="<?php echo $store_storemast_list->RT->headerCellClass() ?>"><div id="elh_store_storemast_RT" class="store_storemast_RT"><div class="ew-table-header-caption"><?php echo $store_storemast_list->RT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RT" class="<?php echo $store_storemast_list->RT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storemast_list->SortUrl($store_storemast_list->RT) ?>', 1);"><div id="elh_store_storemast_RT" class="store_storemast_RT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast_list->RT->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast_list->RT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storemast_list->RT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast_list->UR->Visible) { // UR ?>
	<?php if ($store_storemast_list->SortUrl($store_storemast_list->UR) == "") { ?>
		<th data-name="UR" class="<?php echo $store_storemast_list->UR->headerCellClass() ?>"><div id="elh_store_storemast_UR" class="store_storemast_UR"><div class="ew-table-header-caption"><?php echo $store_storemast_list->UR->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UR" class="<?php echo $store_storemast_list->UR->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storemast_list->SortUrl($store_storemast_list->UR) ?>', 1);"><div id="elh_store_storemast_UR" class="store_storemast_UR">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast_list->UR->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast_list->UR->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storemast_list->UR->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast_list->TAXP->Visible) { // TAXP ?>
	<?php if ($store_storemast_list->SortUrl($store_storemast_list->TAXP) == "") { ?>
		<th data-name="TAXP" class="<?php echo $store_storemast_list->TAXP->headerCellClass() ?>"><div id="elh_store_storemast_TAXP" class="store_storemast_TAXP"><div class="ew-table-header-caption"><?php echo $store_storemast_list->TAXP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TAXP" class="<?php echo $store_storemast_list->TAXP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storemast_list->SortUrl($store_storemast_list->TAXP) ?>', 1);"><div id="elh_store_storemast_TAXP" class="store_storemast_TAXP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast_list->TAXP->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast_list->TAXP->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storemast_list->TAXP->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast_list->BATCHNO->Visible) { // BATCHNO ?>
	<?php if ($store_storemast_list->SortUrl($store_storemast_list->BATCHNO) == "") { ?>
		<th data-name="BATCHNO" class="<?php echo $store_storemast_list->BATCHNO->headerCellClass() ?>"><div id="elh_store_storemast_BATCHNO" class="store_storemast_BATCHNO"><div class="ew-table-header-caption"><?php echo $store_storemast_list->BATCHNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BATCHNO" class="<?php echo $store_storemast_list->BATCHNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storemast_list->SortUrl($store_storemast_list->BATCHNO) ?>', 1);"><div id="elh_store_storemast_BATCHNO" class="store_storemast_BATCHNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast_list->BATCHNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storemast_list->BATCHNO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storemast_list->BATCHNO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast_list->OQ->Visible) { // OQ ?>
	<?php if ($store_storemast_list->SortUrl($store_storemast_list->OQ) == "") { ?>
		<th data-name="OQ" class="<?php echo $store_storemast_list->OQ->headerCellClass() ?>"><div id="elh_store_storemast_OQ" class="store_storemast_OQ"><div class="ew-table-header-caption"><?php echo $store_storemast_list->OQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OQ" class="<?php echo $store_storemast_list->OQ->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storemast_list->SortUrl($store_storemast_list->OQ) ?>', 1);"><div id="elh_store_storemast_OQ" class="store_storemast_OQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast_list->OQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast_list->OQ->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storemast_list->OQ->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast_list->RQ->Visible) { // RQ ?>
	<?php if ($store_storemast_list->SortUrl($store_storemast_list->RQ) == "") { ?>
		<th data-name="RQ" class="<?php echo $store_storemast_list->RQ->headerCellClass() ?>"><div id="elh_store_storemast_RQ" class="store_storemast_RQ"><div class="ew-table-header-caption"><?php echo $store_storemast_list->RQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RQ" class="<?php echo $store_storemast_list->RQ->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storemast_list->SortUrl($store_storemast_list->RQ) ?>', 1);"><div id="elh_store_storemast_RQ" class="store_storemast_RQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast_list->RQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast_list->RQ->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storemast_list->RQ->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast_list->MRQ->Visible) { // MRQ ?>
	<?php if ($store_storemast_list->SortUrl($store_storemast_list->MRQ) == "") { ?>
		<th data-name="MRQ" class="<?php echo $store_storemast_list->MRQ->headerCellClass() ?>"><div id="elh_store_storemast_MRQ" class="store_storemast_MRQ"><div class="ew-table-header-caption"><?php echo $store_storemast_list->MRQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MRQ" class="<?php echo $store_storemast_list->MRQ->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storemast_list->SortUrl($store_storemast_list->MRQ) ?>', 1);"><div id="elh_store_storemast_MRQ" class="store_storemast_MRQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast_list->MRQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast_list->MRQ->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storemast_list->MRQ->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast_list->IQ->Visible) { // IQ ?>
	<?php if ($store_storemast_list->SortUrl($store_storemast_list->IQ) == "") { ?>
		<th data-name="IQ" class="<?php echo $store_storemast_list->IQ->headerCellClass() ?>"><div id="elh_store_storemast_IQ" class="store_storemast_IQ"><div class="ew-table-header-caption"><?php echo $store_storemast_list->IQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IQ" class="<?php echo $store_storemast_list->IQ->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storemast_list->SortUrl($store_storemast_list->IQ) ?>', 1);"><div id="elh_store_storemast_IQ" class="store_storemast_IQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast_list->IQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast_list->IQ->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storemast_list->IQ->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast_list->MRP->Visible) { // MRP ?>
	<?php if ($store_storemast_list->SortUrl($store_storemast_list->MRP) == "") { ?>
		<th data-name="MRP" class="<?php echo $store_storemast_list->MRP->headerCellClass() ?>"><div id="elh_store_storemast_MRP" class="store_storemast_MRP"><div class="ew-table-header-caption"><?php echo $store_storemast_list->MRP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MRP" class="<?php echo $store_storemast_list->MRP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storemast_list->SortUrl($store_storemast_list->MRP) ?>', 1);"><div id="elh_store_storemast_MRP" class="store_storemast_MRP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast_list->MRP->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast_list->MRP->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storemast_list->MRP->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast_list->EXPDT->Visible) { // EXPDT ?>
	<?php if ($store_storemast_list->SortUrl($store_storemast_list->EXPDT) == "") { ?>
		<th data-name="EXPDT" class="<?php echo $store_storemast_list->EXPDT->headerCellClass() ?>"><div id="elh_store_storemast_EXPDT" class="store_storemast_EXPDT"><div class="ew-table-header-caption"><?php echo $store_storemast_list->EXPDT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EXPDT" class="<?php echo $store_storemast_list->EXPDT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storemast_list->SortUrl($store_storemast_list->EXPDT) ?>', 1);"><div id="elh_store_storemast_EXPDT" class="store_storemast_EXPDT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast_list->EXPDT->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast_list->EXPDT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storemast_list->EXPDT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast_list->SALQTY->Visible) { // SALQTY ?>
	<?php if ($store_storemast_list->SortUrl($store_storemast_list->SALQTY) == "") { ?>
		<th data-name="SALQTY" class="<?php echo $store_storemast_list->SALQTY->headerCellClass() ?>"><div id="elh_store_storemast_SALQTY" class="store_storemast_SALQTY"><div class="ew-table-header-caption"><?php echo $store_storemast_list->SALQTY->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SALQTY" class="<?php echo $store_storemast_list->SALQTY->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storemast_list->SortUrl($store_storemast_list->SALQTY) ?>', 1);"><div id="elh_store_storemast_SALQTY" class="store_storemast_SALQTY">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast_list->SALQTY->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast_list->SALQTY->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storemast_list->SALQTY->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast_list->LASTPURDT->Visible) { // LASTPURDT ?>
	<?php if ($store_storemast_list->SortUrl($store_storemast_list->LASTPURDT) == "") { ?>
		<th data-name="LASTPURDT" class="<?php echo $store_storemast_list->LASTPURDT->headerCellClass() ?>"><div id="elh_store_storemast_LASTPURDT" class="store_storemast_LASTPURDT"><div class="ew-table-header-caption"><?php echo $store_storemast_list->LASTPURDT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LASTPURDT" class="<?php echo $store_storemast_list->LASTPURDT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storemast_list->SortUrl($store_storemast_list->LASTPURDT) ?>', 1);"><div id="elh_store_storemast_LASTPURDT" class="store_storemast_LASTPURDT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast_list->LASTPURDT->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast_list->LASTPURDT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storemast_list->LASTPURDT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast_list->LASTSUPP->Visible) { // LASTSUPP ?>
	<?php if ($store_storemast_list->SortUrl($store_storemast_list->LASTSUPP) == "") { ?>
		<th data-name="LASTSUPP" class="<?php echo $store_storemast_list->LASTSUPP->headerCellClass() ?>"><div id="elh_store_storemast_LASTSUPP" class="store_storemast_LASTSUPP"><div class="ew-table-header-caption"><?php echo $store_storemast_list->LASTSUPP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LASTSUPP" class="<?php echo $store_storemast_list->LASTSUPP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storemast_list->SortUrl($store_storemast_list->LASTSUPP) ?>', 1);"><div id="elh_store_storemast_LASTSUPP" class="store_storemast_LASTSUPP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast_list->LASTSUPP->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storemast_list->LASTSUPP->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storemast_list->LASTSUPP->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast_list->GENNAME->Visible) { // GENNAME ?>
	<?php if ($store_storemast_list->SortUrl($store_storemast_list->GENNAME) == "") { ?>
		<th data-name="GENNAME" class="<?php echo $store_storemast_list->GENNAME->headerCellClass() ?>"><div id="elh_store_storemast_GENNAME" class="store_storemast_GENNAME"><div class="ew-table-header-caption"><?php echo $store_storemast_list->GENNAME->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GENNAME" class="<?php echo $store_storemast_list->GENNAME->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storemast_list->SortUrl($store_storemast_list->GENNAME) ?>', 1);"><div id="elh_store_storemast_GENNAME" class="store_storemast_GENNAME">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast_list->GENNAME->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storemast_list->GENNAME->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storemast_list->GENNAME->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast_list->LASTISSDT->Visible) { // LASTISSDT ?>
	<?php if ($store_storemast_list->SortUrl($store_storemast_list->LASTISSDT) == "") { ?>
		<th data-name="LASTISSDT" class="<?php echo $store_storemast_list->LASTISSDT->headerCellClass() ?>"><div id="elh_store_storemast_LASTISSDT" class="store_storemast_LASTISSDT"><div class="ew-table-header-caption"><?php echo $store_storemast_list->LASTISSDT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LASTISSDT" class="<?php echo $store_storemast_list->LASTISSDT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storemast_list->SortUrl($store_storemast_list->LASTISSDT) ?>', 1);"><div id="elh_store_storemast_LASTISSDT" class="store_storemast_LASTISSDT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast_list->LASTISSDT->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast_list->LASTISSDT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storemast_list->LASTISSDT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast_list->CREATEDDT->Visible) { // CREATEDDT ?>
	<?php if ($store_storemast_list->SortUrl($store_storemast_list->CREATEDDT) == "") { ?>
		<th data-name="CREATEDDT" class="<?php echo $store_storemast_list->CREATEDDT->headerCellClass() ?>"><div id="elh_store_storemast_CREATEDDT" class="store_storemast_CREATEDDT"><div class="ew-table-header-caption"><?php echo $store_storemast_list->CREATEDDT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CREATEDDT" class="<?php echo $store_storemast_list->CREATEDDT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storemast_list->SortUrl($store_storemast_list->CREATEDDT) ?>', 1);"><div id="elh_store_storemast_CREATEDDT" class="store_storemast_CREATEDDT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast_list->CREATEDDT->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast_list->CREATEDDT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storemast_list->CREATEDDT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast_list->OPPRC->Visible) { // OPPRC ?>
	<?php if ($store_storemast_list->SortUrl($store_storemast_list->OPPRC) == "") { ?>
		<th data-name="OPPRC" class="<?php echo $store_storemast_list->OPPRC->headerCellClass() ?>"><div id="elh_store_storemast_OPPRC" class="store_storemast_OPPRC"><div class="ew-table-header-caption"><?php echo $store_storemast_list->OPPRC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OPPRC" class="<?php echo $store_storemast_list->OPPRC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storemast_list->SortUrl($store_storemast_list->OPPRC) ?>', 1);"><div id="elh_store_storemast_OPPRC" class="store_storemast_OPPRC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast_list->OPPRC->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storemast_list->OPPRC->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storemast_list->OPPRC->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast_list->RESTRICT->Visible) { // RESTRICT ?>
	<?php if ($store_storemast_list->SortUrl($store_storemast_list->RESTRICT) == "") { ?>
		<th data-name="RESTRICT" class="<?php echo $store_storemast_list->RESTRICT->headerCellClass() ?>"><div id="elh_store_storemast_RESTRICT" class="store_storemast_RESTRICT"><div class="ew-table-header-caption"><?php echo $store_storemast_list->RESTRICT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RESTRICT" class="<?php echo $store_storemast_list->RESTRICT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storemast_list->SortUrl($store_storemast_list->RESTRICT) ?>', 1);"><div id="elh_store_storemast_RESTRICT" class="store_storemast_RESTRICT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast_list->RESTRICT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storemast_list->RESTRICT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storemast_list->RESTRICT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast_list->BAWAPRC->Visible) { // BAWAPRC ?>
	<?php if ($store_storemast_list->SortUrl($store_storemast_list->BAWAPRC) == "") { ?>
		<th data-name="BAWAPRC" class="<?php echo $store_storemast_list->BAWAPRC->headerCellClass() ?>"><div id="elh_store_storemast_BAWAPRC" class="store_storemast_BAWAPRC"><div class="ew-table-header-caption"><?php echo $store_storemast_list->BAWAPRC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BAWAPRC" class="<?php echo $store_storemast_list->BAWAPRC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storemast_list->SortUrl($store_storemast_list->BAWAPRC) ?>', 1);"><div id="elh_store_storemast_BAWAPRC" class="store_storemast_BAWAPRC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast_list->BAWAPRC->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storemast_list->BAWAPRC->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storemast_list->BAWAPRC->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast_list->STAXPER->Visible) { // STAXPER ?>
	<?php if ($store_storemast_list->SortUrl($store_storemast_list->STAXPER) == "") { ?>
		<th data-name="STAXPER" class="<?php echo $store_storemast_list->STAXPER->headerCellClass() ?>"><div id="elh_store_storemast_STAXPER" class="store_storemast_STAXPER"><div class="ew-table-header-caption"><?php echo $store_storemast_list->STAXPER->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="STAXPER" class="<?php echo $store_storemast_list->STAXPER->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storemast_list->SortUrl($store_storemast_list->STAXPER) ?>', 1);"><div id="elh_store_storemast_STAXPER" class="store_storemast_STAXPER">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast_list->STAXPER->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast_list->STAXPER->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storemast_list->STAXPER->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast_list->TAXTYPE->Visible) { // TAXTYPE ?>
	<?php if ($store_storemast_list->SortUrl($store_storemast_list->TAXTYPE) == "") { ?>
		<th data-name="TAXTYPE" class="<?php echo $store_storemast_list->TAXTYPE->headerCellClass() ?>"><div id="elh_store_storemast_TAXTYPE" class="store_storemast_TAXTYPE"><div class="ew-table-header-caption"><?php echo $store_storemast_list->TAXTYPE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TAXTYPE" class="<?php echo $store_storemast_list->TAXTYPE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storemast_list->SortUrl($store_storemast_list->TAXTYPE) ?>', 1);"><div id="elh_store_storemast_TAXTYPE" class="store_storemast_TAXTYPE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast_list->TAXTYPE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storemast_list->TAXTYPE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storemast_list->TAXTYPE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast_list->OLDTAXP->Visible) { // OLDTAXP ?>
	<?php if ($store_storemast_list->SortUrl($store_storemast_list->OLDTAXP) == "") { ?>
		<th data-name="OLDTAXP" class="<?php echo $store_storemast_list->OLDTAXP->headerCellClass() ?>"><div id="elh_store_storemast_OLDTAXP" class="store_storemast_OLDTAXP"><div class="ew-table-header-caption"><?php echo $store_storemast_list->OLDTAXP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OLDTAXP" class="<?php echo $store_storemast_list->OLDTAXP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storemast_list->SortUrl($store_storemast_list->OLDTAXP) ?>', 1);"><div id="elh_store_storemast_OLDTAXP" class="store_storemast_OLDTAXP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast_list->OLDTAXP->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast_list->OLDTAXP->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storemast_list->OLDTAXP->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast_list->TAXUPD->Visible) { // TAXUPD ?>
	<?php if ($store_storemast_list->SortUrl($store_storemast_list->TAXUPD) == "") { ?>
		<th data-name="TAXUPD" class="<?php echo $store_storemast_list->TAXUPD->headerCellClass() ?>"><div id="elh_store_storemast_TAXUPD" class="store_storemast_TAXUPD"><div class="ew-table-header-caption"><?php echo $store_storemast_list->TAXUPD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TAXUPD" class="<?php echo $store_storemast_list->TAXUPD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storemast_list->SortUrl($store_storemast_list->TAXUPD) ?>', 1);"><div id="elh_store_storemast_TAXUPD" class="store_storemast_TAXUPD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast_list->TAXUPD->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storemast_list->TAXUPD->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storemast_list->TAXUPD->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast_list->PACKAGE->Visible) { // PACKAGE ?>
	<?php if ($store_storemast_list->SortUrl($store_storemast_list->PACKAGE) == "") { ?>
		<th data-name="PACKAGE" class="<?php echo $store_storemast_list->PACKAGE->headerCellClass() ?>"><div id="elh_store_storemast_PACKAGE" class="store_storemast_PACKAGE"><div class="ew-table-header-caption"><?php echo $store_storemast_list->PACKAGE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PACKAGE" class="<?php echo $store_storemast_list->PACKAGE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storemast_list->SortUrl($store_storemast_list->PACKAGE) ?>', 1);"><div id="elh_store_storemast_PACKAGE" class="store_storemast_PACKAGE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast_list->PACKAGE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storemast_list->PACKAGE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storemast_list->PACKAGE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast_list->NEWRT->Visible) { // NEWRT ?>
	<?php if ($store_storemast_list->SortUrl($store_storemast_list->NEWRT) == "") { ?>
		<th data-name="NEWRT" class="<?php echo $store_storemast_list->NEWRT->headerCellClass() ?>"><div id="elh_store_storemast_NEWRT" class="store_storemast_NEWRT"><div class="ew-table-header-caption"><?php echo $store_storemast_list->NEWRT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NEWRT" class="<?php echo $store_storemast_list->NEWRT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storemast_list->SortUrl($store_storemast_list->NEWRT) ?>', 1);"><div id="elh_store_storemast_NEWRT" class="store_storemast_NEWRT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast_list->NEWRT->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast_list->NEWRT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storemast_list->NEWRT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast_list->NEWMRP->Visible) { // NEWMRP ?>
	<?php if ($store_storemast_list->SortUrl($store_storemast_list->NEWMRP) == "") { ?>
		<th data-name="NEWMRP" class="<?php echo $store_storemast_list->NEWMRP->headerCellClass() ?>"><div id="elh_store_storemast_NEWMRP" class="store_storemast_NEWMRP"><div class="ew-table-header-caption"><?php echo $store_storemast_list->NEWMRP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NEWMRP" class="<?php echo $store_storemast_list->NEWMRP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storemast_list->SortUrl($store_storemast_list->NEWMRP) ?>', 1);"><div id="elh_store_storemast_NEWMRP" class="store_storemast_NEWMRP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast_list->NEWMRP->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast_list->NEWMRP->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storemast_list->NEWMRP->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast_list->NEWUR->Visible) { // NEWUR ?>
	<?php if ($store_storemast_list->SortUrl($store_storemast_list->NEWUR) == "") { ?>
		<th data-name="NEWUR" class="<?php echo $store_storemast_list->NEWUR->headerCellClass() ?>"><div id="elh_store_storemast_NEWUR" class="store_storemast_NEWUR"><div class="ew-table-header-caption"><?php echo $store_storemast_list->NEWUR->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NEWUR" class="<?php echo $store_storemast_list->NEWUR->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storemast_list->SortUrl($store_storemast_list->NEWUR) ?>', 1);"><div id="elh_store_storemast_NEWUR" class="store_storemast_NEWUR">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast_list->NEWUR->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast_list->NEWUR->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storemast_list->NEWUR->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast_list->STATUS->Visible) { // STATUS ?>
	<?php if ($store_storemast_list->SortUrl($store_storemast_list->STATUS) == "") { ?>
		<th data-name="STATUS" class="<?php echo $store_storemast_list->STATUS->headerCellClass() ?>"><div id="elh_store_storemast_STATUS" class="store_storemast_STATUS"><div class="ew-table-header-caption"><?php echo $store_storemast_list->STATUS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="STATUS" class="<?php echo $store_storemast_list->STATUS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storemast_list->SortUrl($store_storemast_list->STATUS) ?>', 1);"><div id="elh_store_storemast_STATUS" class="store_storemast_STATUS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast_list->STATUS->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storemast_list->STATUS->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storemast_list->STATUS->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast_list->RETNQTY->Visible) { // RETNQTY ?>
	<?php if ($store_storemast_list->SortUrl($store_storemast_list->RETNQTY) == "") { ?>
		<th data-name="RETNQTY" class="<?php echo $store_storemast_list->RETNQTY->headerCellClass() ?>"><div id="elh_store_storemast_RETNQTY" class="store_storemast_RETNQTY"><div class="ew-table-header-caption"><?php echo $store_storemast_list->RETNQTY->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RETNQTY" class="<?php echo $store_storemast_list->RETNQTY->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storemast_list->SortUrl($store_storemast_list->RETNQTY) ?>', 1);"><div id="elh_store_storemast_RETNQTY" class="store_storemast_RETNQTY">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast_list->RETNQTY->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast_list->RETNQTY->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storemast_list->RETNQTY->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast_list->KEMODISC->Visible) { // KEMODISC ?>
	<?php if ($store_storemast_list->SortUrl($store_storemast_list->KEMODISC) == "") { ?>
		<th data-name="KEMODISC" class="<?php echo $store_storemast_list->KEMODISC->headerCellClass() ?>"><div id="elh_store_storemast_KEMODISC" class="store_storemast_KEMODISC"><div class="ew-table-header-caption"><?php echo $store_storemast_list->KEMODISC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="KEMODISC" class="<?php echo $store_storemast_list->KEMODISC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storemast_list->SortUrl($store_storemast_list->KEMODISC) ?>', 1);"><div id="elh_store_storemast_KEMODISC" class="store_storemast_KEMODISC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast_list->KEMODISC->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storemast_list->KEMODISC->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storemast_list->KEMODISC->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast_list->PATSALE->Visible) { // PATSALE ?>
	<?php if ($store_storemast_list->SortUrl($store_storemast_list->PATSALE) == "") { ?>
		<th data-name="PATSALE" class="<?php echo $store_storemast_list->PATSALE->headerCellClass() ?>"><div id="elh_store_storemast_PATSALE" class="store_storemast_PATSALE"><div class="ew-table-header-caption"><?php echo $store_storemast_list->PATSALE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PATSALE" class="<?php echo $store_storemast_list->PATSALE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storemast_list->SortUrl($store_storemast_list->PATSALE) ?>', 1);"><div id="elh_store_storemast_PATSALE" class="store_storemast_PATSALE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast_list->PATSALE->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast_list->PATSALE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storemast_list->PATSALE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast_list->ORGAN->Visible) { // ORGAN ?>
	<?php if ($store_storemast_list->SortUrl($store_storemast_list->ORGAN) == "") { ?>
		<th data-name="ORGAN" class="<?php echo $store_storemast_list->ORGAN->headerCellClass() ?>"><div id="elh_store_storemast_ORGAN" class="store_storemast_ORGAN"><div class="ew-table-header-caption"><?php echo $store_storemast_list->ORGAN->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ORGAN" class="<?php echo $store_storemast_list->ORGAN->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storemast_list->SortUrl($store_storemast_list->ORGAN) ?>', 1);"><div id="elh_store_storemast_ORGAN" class="store_storemast_ORGAN">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast_list->ORGAN->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storemast_list->ORGAN->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storemast_list->ORGAN->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast_list->OLDRQ->Visible) { // OLDRQ ?>
	<?php if ($store_storemast_list->SortUrl($store_storemast_list->OLDRQ) == "") { ?>
		<th data-name="OLDRQ" class="<?php echo $store_storemast_list->OLDRQ->headerCellClass() ?>"><div id="elh_store_storemast_OLDRQ" class="store_storemast_OLDRQ"><div class="ew-table-header-caption"><?php echo $store_storemast_list->OLDRQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OLDRQ" class="<?php echo $store_storemast_list->OLDRQ->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storemast_list->SortUrl($store_storemast_list->OLDRQ) ?>', 1);"><div id="elh_store_storemast_OLDRQ" class="store_storemast_OLDRQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast_list->OLDRQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast_list->OLDRQ->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storemast_list->OLDRQ->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast_list->DRID->Visible) { // DRID ?>
	<?php if ($store_storemast_list->SortUrl($store_storemast_list->DRID) == "") { ?>
		<th data-name="DRID" class="<?php echo $store_storemast_list->DRID->headerCellClass() ?>"><div id="elh_store_storemast_DRID" class="store_storemast_DRID"><div class="ew-table-header-caption"><?php echo $store_storemast_list->DRID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DRID" class="<?php echo $store_storemast_list->DRID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storemast_list->SortUrl($store_storemast_list->DRID) ?>', 1);"><div id="elh_store_storemast_DRID" class="store_storemast_DRID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast_list->DRID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storemast_list->DRID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storemast_list->DRID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast_list->MFRCODE->Visible) { // MFRCODE ?>
	<?php if ($store_storemast_list->SortUrl($store_storemast_list->MFRCODE) == "") { ?>
		<th data-name="MFRCODE" class="<?php echo $store_storemast_list->MFRCODE->headerCellClass() ?>"><div id="elh_store_storemast_MFRCODE" class="store_storemast_MFRCODE"><div class="ew-table-header-caption"><?php echo $store_storemast_list->MFRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MFRCODE" class="<?php echo $store_storemast_list->MFRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storemast_list->SortUrl($store_storemast_list->MFRCODE) ?>', 1);"><div id="elh_store_storemast_MFRCODE" class="store_storemast_MFRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast_list->MFRCODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storemast_list->MFRCODE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storemast_list->MFRCODE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast_list->COMBCODE->Visible) { // COMBCODE ?>
	<?php if ($store_storemast_list->SortUrl($store_storemast_list->COMBCODE) == "") { ?>
		<th data-name="COMBCODE" class="<?php echo $store_storemast_list->COMBCODE->headerCellClass() ?>"><div id="elh_store_storemast_COMBCODE" class="store_storemast_COMBCODE"><div class="ew-table-header-caption"><?php echo $store_storemast_list->COMBCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="COMBCODE" class="<?php echo $store_storemast_list->COMBCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storemast_list->SortUrl($store_storemast_list->COMBCODE) ?>', 1);"><div id="elh_store_storemast_COMBCODE" class="store_storemast_COMBCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast_list->COMBCODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storemast_list->COMBCODE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storemast_list->COMBCODE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast_list->GENCODE->Visible) { // GENCODE ?>
	<?php if ($store_storemast_list->SortUrl($store_storemast_list->GENCODE) == "") { ?>
		<th data-name="GENCODE" class="<?php echo $store_storemast_list->GENCODE->headerCellClass() ?>"><div id="elh_store_storemast_GENCODE" class="store_storemast_GENCODE"><div class="ew-table-header-caption"><?php echo $store_storemast_list->GENCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GENCODE" class="<?php echo $store_storemast_list->GENCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storemast_list->SortUrl($store_storemast_list->GENCODE) ?>', 1);"><div id="elh_store_storemast_GENCODE" class="store_storemast_GENCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast_list->GENCODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storemast_list->GENCODE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storemast_list->GENCODE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast_list->STRENGTH->Visible) { // STRENGTH ?>
	<?php if ($store_storemast_list->SortUrl($store_storemast_list->STRENGTH) == "") { ?>
		<th data-name="STRENGTH" class="<?php echo $store_storemast_list->STRENGTH->headerCellClass() ?>"><div id="elh_store_storemast_STRENGTH" class="store_storemast_STRENGTH"><div class="ew-table-header-caption"><?php echo $store_storemast_list->STRENGTH->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="STRENGTH" class="<?php echo $store_storemast_list->STRENGTH->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storemast_list->SortUrl($store_storemast_list->STRENGTH) ?>', 1);"><div id="elh_store_storemast_STRENGTH" class="store_storemast_STRENGTH">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast_list->STRENGTH->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast_list->STRENGTH->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storemast_list->STRENGTH->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast_list->UNIT->Visible) { // UNIT ?>
	<?php if ($store_storemast_list->SortUrl($store_storemast_list->UNIT) == "") { ?>
		<th data-name="UNIT" class="<?php echo $store_storemast_list->UNIT->headerCellClass() ?>"><div id="elh_store_storemast_UNIT" class="store_storemast_UNIT"><div class="ew-table-header-caption"><?php echo $store_storemast_list->UNIT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UNIT" class="<?php echo $store_storemast_list->UNIT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storemast_list->SortUrl($store_storemast_list->UNIT) ?>', 1);"><div id="elh_store_storemast_UNIT" class="store_storemast_UNIT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast_list->UNIT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storemast_list->UNIT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storemast_list->UNIT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast_list->FORMULARY->Visible) { // FORMULARY ?>
	<?php if ($store_storemast_list->SortUrl($store_storemast_list->FORMULARY) == "") { ?>
		<th data-name="FORMULARY" class="<?php echo $store_storemast_list->FORMULARY->headerCellClass() ?>"><div id="elh_store_storemast_FORMULARY" class="store_storemast_FORMULARY"><div class="ew-table-header-caption"><?php echo $store_storemast_list->FORMULARY->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FORMULARY" class="<?php echo $store_storemast_list->FORMULARY->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storemast_list->SortUrl($store_storemast_list->FORMULARY) ?>', 1);"><div id="elh_store_storemast_FORMULARY" class="store_storemast_FORMULARY">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast_list->FORMULARY->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storemast_list->FORMULARY->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storemast_list->FORMULARY->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast_list->STOCK->Visible) { // STOCK ?>
	<?php if ($store_storemast_list->SortUrl($store_storemast_list->STOCK) == "") { ?>
		<th data-name="STOCK" class="<?php echo $store_storemast_list->STOCK->headerCellClass() ?>"><div id="elh_store_storemast_STOCK" class="store_storemast_STOCK"><div class="ew-table-header-caption"><?php echo $store_storemast_list->STOCK->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="STOCK" class="<?php echo $store_storemast_list->STOCK->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storemast_list->SortUrl($store_storemast_list->STOCK) ?>', 1);"><div id="elh_store_storemast_STOCK" class="store_storemast_STOCK">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast_list->STOCK->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast_list->STOCK->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storemast_list->STOCK->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast_list->RACKNO->Visible) { // RACKNO ?>
	<?php if ($store_storemast_list->SortUrl($store_storemast_list->RACKNO) == "") { ?>
		<th data-name="RACKNO" class="<?php echo $store_storemast_list->RACKNO->headerCellClass() ?>"><div id="elh_store_storemast_RACKNO" class="store_storemast_RACKNO"><div class="ew-table-header-caption"><?php echo $store_storemast_list->RACKNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RACKNO" class="<?php echo $store_storemast_list->RACKNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storemast_list->SortUrl($store_storemast_list->RACKNO) ?>', 1);"><div id="elh_store_storemast_RACKNO" class="store_storemast_RACKNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast_list->RACKNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storemast_list->RACKNO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storemast_list->RACKNO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast_list->SUPPNAME->Visible) { // SUPPNAME ?>
	<?php if ($store_storemast_list->SortUrl($store_storemast_list->SUPPNAME) == "") { ?>
		<th data-name="SUPPNAME" class="<?php echo $store_storemast_list->SUPPNAME->headerCellClass() ?>"><div id="elh_store_storemast_SUPPNAME" class="store_storemast_SUPPNAME"><div class="ew-table-header-caption"><?php echo $store_storemast_list->SUPPNAME->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SUPPNAME" class="<?php echo $store_storemast_list->SUPPNAME->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storemast_list->SortUrl($store_storemast_list->SUPPNAME) ?>', 1);"><div id="elh_store_storemast_SUPPNAME" class="store_storemast_SUPPNAME">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast_list->SUPPNAME->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storemast_list->SUPPNAME->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storemast_list->SUPPNAME->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast_list->COMBNAME->Visible) { // COMBNAME ?>
	<?php if ($store_storemast_list->SortUrl($store_storemast_list->COMBNAME) == "") { ?>
		<th data-name="COMBNAME" class="<?php echo $store_storemast_list->COMBNAME->headerCellClass() ?>"><div id="elh_store_storemast_COMBNAME" class="store_storemast_COMBNAME"><div class="ew-table-header-caption"><?php echo $store_storemast_list->COMBNAME->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="COMBNAME" class="<?php echo $store_storemast_list->COMBNAME->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storemast_list->SortUrl($store_storemast_list->COMBNAME) ?>', 1);"><div id="elh_store_storemast_COMBNAME" class="store_storemast_COMBNAME">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast_list->COMBNAME->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storemast_list->COMBNAME->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storemast_list->COMBNAME->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast_list->GENERICNAME->Visible) { // GENERICNAME ?>
	<?php if ($store_storemast_list->SortUrl($store_storemast_list->GENERICNAME) == "") { ?>
		<th data-name="GENERICNAME" class="<?php echo $store_storemast_list->GENERICNAME->headerCellClass() ?>"><div id="elh_store_storemast_GENERICNAME" class="store_storemast_GENERICNAME"><div class="ew-table-header-caption"><?php echo $store_storemast_list->GENERICNAME->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GENERICNAME" class="<?php echo $store_storemast_list->GENERICNAME->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storemast_list->SortUrl($store_storemast_list->GENERICNAME) ?>', 1);"><div id="elh_store_storemast_GENERICNAME" class="store_storemast_GENERICNAME">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast_list->GENERICNAME->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storemast_list->GENERICNAME->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storemast_list->GENERICNAME->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast_list->REMARK->Visible) { // REMARK ?>
	<?php if ($store_storemast_list->SortUrl($store_storemast_list->REMARK) == "") { ?>
		<th data-name="REMARK" class="<?php echo $store_storemast_list->REMARK->headerCellClass() ?>"><div id="elh_store_storemast_REMARK" class="store_storemast_REMARK"><div class="ew-table-header-caption"><?php echo $store_storemast_list->REMARK->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="REMARK" class="<?php echo $store_storemast_list->REMARK->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storemast_list->SortUrl($store_storemast_list->REMARK) ?>', 1);"><div id="elh_store_storemast_REMARK" class="store_storemast_REMARK">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast_list->REMARK->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storemast_list->REMARK->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storemast_list->REMARK->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast_list->TEMP->Visible) { // TEMP ?>
	<?php if ($store_storemast_list->SortUrl($store_storemast_list->TEMP) == "") { ?>
		<th data-name="TEMP" class="<?php echo $store_storemast_list->TEMP->headerCellClass() ?>"><div id="elh_store_storemast_TEMP" class="store_storemast_TEMP"><div class="ew-table-header-caption"><?php echo $store_storemast_list->TEMP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TEMP" class="<?php echo $store_storemast_list->TEMP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storemast_list->SortUrl($store_storemast_list->TEMP) ?>', 1);"><div id="elh_store_storemast_TEMP" class="store_storemast_TEMP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast_list->TEMP->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storemast_list->TEMP->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storemast_list->TEMP->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast_list->PACKING->Visible) { // PACKING ?>
	<?php if ($store_storemast_list->SortUrl($store_storemast_list->PACKING) == "") { ?>
		<th data-name="PACKING" class="<?php echo $store_storemast_list->PACKING->headerCellClass() ?>"><div id="elh_store_storemast_PACKING" class="store_storemast_PACKING"><div class="ew-table-header-caption"><?php echo $store_storemast_list->PACKING->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PACKING" class="<?php echo $store_storemast_list->PACKING->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storemast_list->SortUrl($store_storemast_list->PACKING) ?>', 1);"><div id="elh_store_storemast_PACKING" class="store_storemast_PACKING">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast_list->PACKING->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast_list->PACKING->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storemast_list->PACKING->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast_list->PhysQty->Visible) { // PhysQty ?>
	<?php if ($store_storemast_list->SortUrl($store_storemast_list->PhysQty) == "") { ?>
		<th data-name="PhysQty" class="<?php echo $store_storemast_list->PhysQty->headerCellClass() ?>"><div id="elh_store_storemast_PhysQty" class="store_storemast_PhysQty"><div class="ew-table-header-caption"><?php echo $store_storemast_list->PhysQty->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PhysQty" class="<?php echo $store_storemast_list->PhysQty->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storemast_list->SortUrl($store_storemast_list->PhysQty) ?>', 1);"><div id="elh_store_storemast_PhysQty" class="store_storemast_PhysQty">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast_list->PhysQty->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast_list->PhysQty->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storemast_list->PhysQty->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast_list->LedQty->Visible) { // LedQty ?>
	<?php if ($store_storemast_list->SortUrl($store_storemast_list->LedQty) == "") { ?>
		<th data-name="LedQty" class="<?php echo $store_storemast_list->LedQty->headerCellClass() ?>"><div id="elh_store_storemast_LedQty" class="store_storemast_LedQty"><div class="ew-table-header-caption"><?php echo $store_storemast_list->LedQty->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LedQty" class="<?php echo $store_storemast_list->LedQty->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storemast_list->SortUrl($store_storemast_list->LedQty) ?>', 1);"><div id="elh_store_storemast_LedQty" class="store_storemast_LedQty">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast_list->LedQty->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast_list->LedQty->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storemast_list->LedQty->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast_list->id->Visible) { // id ?>
	<?php if ($store_storemast_list->SortUrl($store_storemast_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $store_storemast_list->id->headerCellClass() ?>"><div id="elh_store_storemast_id" class="store_storemast_id"><div class="ew-table-header-caption"><?php echo $store_storemast_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $store_storemast_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storemast_list->SortUrl($store_storemast_list->id) ?>', 1);"><div id="elh_store_storemast_id" class="store_storemast_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storemast_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast_list->PurValue->Visible) { // PurValue ?>
	<?php if ($store_storemast_list->SortUrl($store_storemast_list->PurValue) == "") { ?>
		<th data-name="PurValue" class="<?php echo $store_storemast_list->PurValue->headerCellClass() ?>"><div id="elh_store_storemast_PurValue" class="store_storemast_PurValue"><div class="ew-table-header-caption"><?php echo $store_storemast_list->PurValue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PurValue" class="<?php echo $store_storemast_list->PurValue->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storemast_list->SortUrl($store_storemast_list->PurValue) ?>', 1);"><div id="elh_store_storemast_PurValue" class="store_storemast_PurValue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast_list->PurValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast_list->PurValue->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storemast_list->PurValue->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast_list->PSGST->Visible) { // PSGST ?>
	<?php if ($store_storemast_list->SortUrl($store_storemast_list->PSGST) == "") { ?>
		<th data-name="PSGST" class="<?php echo $store_storemast_list->PSGST->headerCellClass() ?>"><div id="elh_store_storemast_PSGST" class="store_storemast_PSGST"><div class="ew-table-header-caption"><?php echo $store_storemast_list->PSGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PSGST" class="<?php echo $store_storemast_list->PSGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storemast_list->SortUrl($store_storemast_list->PSGST) ?>', 1);"><div id="elh_store_storemast_PSGST" class="store_storemast_PSGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast_list->PSGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast_list->PSGST->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storemast_list->PSGST->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast_list->PCGST->Visible) { // PCGST ?>
	<?php if ($store_storemast_list->SortUrl($store_storemast_list->PCGST) == "") { ?>
		<th data-name="PCGST" class="<?php echo $store_storemast_list->PCGST->headerCellClass() ?>"><div id="elh_store_storemast_PCGST" class="store_storemast_PCGST"><div class="ew-table-header-caption"><?php echo $store_storemast_list->PCGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PCGST" class="<?php echo $store_storemast_list->PCGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storemast_list->SortUrl($store_storemast_list->PCGST) ?>', 1);"><div id="elh_store_storemast_PCGST" class="store_storemast_PCGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast_list->PCGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast_list->PCGST->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storemast_list->PCGST->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast_list->SaleValue->Visible) { // SaleValue ?>
	<?php if ($store_storemast_list->SortUrl($store_storemast_list->SaleValue) == "") { ?>
		<th data-name="SaleValue" class="<?php echo $store_storemast_list->SaleValue->headerCellClass() ?>"><div id="elh_store_storemast_SaleValue" class="store_storemast_SaleValue"><div class="ew-table-header-caption"><?php echo $store_storemast_list->SaleValue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SaleValue" class="<?php echo $store_storemast_list->SaleValue->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storemast_list->SortUrl($store_storemast_list->SaleValue) ?>', 1);"><div id="elh_store_storemast_SaleValue" class="store_storemast_SaleValue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast_list->SaleValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast_list->SaleValue->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storemast_list->SaleValue->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast_list->SSGST->Visible) { // SSGST ?>
	<?php if ($store_storemast_list->SortUrl($store_storemast_list->SSGST) == "") { ?>
		<th data-name="SSGST" class="<?php echo $store_storemast_list->SSGST->headerCellClass() ?>"><div id="elh_store_storemast_SSGST" class="store_storemast_SSGST"><div class="ew-table-header-caption"><?php echo $store_storemast_list->SSGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SSGST" class="<?php echo $store_storemast_list->SSGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storemast_list->SortUrl($store_storemast_list->SSGST) ?>', 1);"><div id="elh_store_storemast_SSGST" class="store_storemast_SSGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast_list->SSGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast_list->SSGST->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storemast_list->SSGST->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast_list->SCGST->Visible) { // SCGST ?>
	<?php if ($store_storemast_list->SortUrl($store_storemast_list->SCGST) == "") { ?>
		<th data-name="SCGST" class="<?php echo $store_storemast_list->SCGST->headerCellClass() ?>"><div id="elh_store_storemast_SCGST" class="store_storemast_SCGST"><div class="ew-table-header-caption"><?php echo $store_storemast_list->SCGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SCGST" class="<?php echo $store_storemast_list->SCGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storemast_list->SortUrl($store_storemast_list->SCGST) ?>', 1);"><div id="elh_store_storemast_SCGST" class="store_storemast_SCGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast_list->SCGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast_list->SCGST->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storemast_list->SCGST->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast_list->SaleRate->Visible) { // SaleRate ?>
	<?php if ($store_storemast_list->SortUrl($store_storemast_list->SaleRate) == "") { ?>
		<th data-name="SaleRate" class="<?php echo $store_storemast_list->SaleRate->headerCellClass() ?>"><div id="elh_store_storemast_SaleRate" class="store_storemast_SaleRate"><div class="ew-table-header-caption"><?php echo $store_storemast_list->SaleRate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SaleRate" class="<?php echo $store_storemast_list->SaleRate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storemast_list->SortUrl($store_storemast_list->SaleRate) ?>', 1);"><div id="elh_store_storemast_SaleRate" class="store_storemast_SaleRate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast_list->SaleRate->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast_list->SaleRate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storemast_list->SaleRate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast_list->HospID->Visible) { // HospID ?>
	<?php if ($store_storemast_list->SortUrl($store_storemast_list->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $store_storemast_list->HospID->headerCellClass() ?>"><div id="elh_store_storemast_HospID" class="store_storemast_HospID"><div class="ew-table-header-caption"><?php echo $store_storemast_list->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $store_storemast_list->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storemast_list->SortUrl($store_storemast_list->HospID) ?>', 1);"><div id="elh_store_storemast_HospID" class="store_storemast_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast_list->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast_list->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storemast_list->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast_list->BRNAME->Visible) { // BRNAME ?>
	<?php if ($store_storemast_list->SortUrl($store_storemast_list->BRNAME) == "") { ?>
		<th data-name="BRNAME" class="<?php echo $store_storemast_list->BRNAME->headerCellClass() ?>"><div id="elh_store_storemast_BRNAME" class="store_storemast_BRNAME"><div class="ew-table-header-caption"><?php echo $store_storemast_list->BRNAME->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BRNAME" class="<?php echo $store_storemast_list->BRNAME->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_storemast_list->SortUrl($store_storemast_list->BRNAME) ?>', 1);"><div id="elh_store_storemast_BRNAME" class="store_storemast_BRNAME">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast_list->BRNAME->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storemast_list->BRNAME->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_storemast_list->BRNAME->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$store_storemast_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($store_storemast_list->ExportAll && $store_storemast_list->isExport()) {
	$store_storemast_list->StopRecord = $store_storemast_list->TotalRecords;
} else {

	// Set the last record to display
	if ($store_storemast_list->TotalRecords > $store_storemast_list->StartRecord + $store_storemast_list->DisplayRecords - 1)
		$store_storemast_list->StopRecord = $store_storemast_list->StartRecord + $store_storemast_list->DisplayRecords - 1;
	else
		$store_storemast_list->StopRecord = $store_storemast_list->TotalRecords;
}
$store_storemast_list->RecordCount = $store_storemast_list->StartRecord - 1;
if ($store_storemast_list->Recordset && !$store_storemast_list->Recordset->EOF) {
	$store_storemast_list->Recordset->moveFirst();
	$selectLimit = $store_storemast_list->UseSelectLimit;
	if (!$selectLimit && $store_storemast_list->StartRecord > 1)
		$store_storemast_list->Recordset->move($store_storemast_list->StartRecord - 1);
} elseif (!$store_storemast->AllowAddDeleteRow && $store_storemast_list->StopRecord == 0) {
	$store_storemast_list->StopRecord = $store_storemast->GridAddRowCount;
}

// Initialize aggregate
$store_storemast->RowType = ROWTYPE_AGGREGATEINIT;
$store_storemast->resetAttributes();
$store_storemast_list->renderRow();
while ($store_storemast_list->RecordCount < $store_storemast_list->StopRecord) {
	$store_storemast_list->RecordCount++;
	if ($store_storemast_list->RecordCount >= $store_storemast_list->StartRecord) {
		$store_storemast_list->RowCount++;

		// Set up key count
		$store_storemast_list->KeyCount = $store_storemast_list->RowIndex;

		// Init row class and style
		$store_storemast->resetAttributes();
		$store_storemast->CssClass = "";
		if ($store_storemast_list->isGridAdd()) {
		} else {
			$store_storemast_list->loadRowValues($store_storemast_list->Recordset); // Load row values
		}
		$store_storemast->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$store_storemast->RowAttrs->merge(["data-rowindex" => $store_storemast_list->RowCount, "id" => "r" . $store_storemast_list->RowCount . "_store_storemast", "data-rowtype" => $store_storemast->RowType]);

		// Render row
		$store_storemast_list->renderRow();

		// Render list options
		$store_storemast_list->renderListOptions();
?>
	<tr <?php echo $store_storemast->rowAttributes() ?>>
<?php

// Render list options (body, left)
$store_storemast_list->ListOptions->render("body", "left", $store_storemast_list->RowCount);
?>
	<?php if ($store_storemast_list->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE" <?php echo $store_storemast_list->BRCODE->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCount ?>_store_storemast_BRCODE">
<span<?php echo $store_storemast_list->BRCODE->viewAttributes() ?>><?php echo $store_storemast_list->BRCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast_list->PRC->Visible) { // PRC ?>
		<td data-name="PRC" <?php echo $store_storemast_list->PRC->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCount ?>_store_storemast_PRC">
<span<?php echo $store_storemast_list->PRC->viewAttributes() ?>><?php echo $store_storemast_list->PRC->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast_list->TYPE->Visible) { // TYPE ?>
		<td data-name="TYPE" <?php echo $store_storemast_list->TYPE->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCount ?>_store_storemast_TYPE">
<span<?php echo $store_storemast_list->TYPE->viewAttributes() ?>><?php echo $store_storemast_list->TYPE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast_list->DES->Visible) { // DES ?>
		<td data-name="DES" <?php echo $store_storemast_list->DES->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCount ?>_store_storemast_DES">
<span<?php echo $store_storemast_list->DES->viewAttributes() ?>><?php echo $store_storemast_list->DES->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast_list->UM->Visible) { // UM ?>
		<td data-name="UM" <?php echo $store_storemast_list->UM->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCount ?>_store_storemast_UM">
<span<?php echo $store_storemast_list->UM->viewAttributes() ?>><?php echo $store_storemast_list->UM->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast_list->RT->Visible) { // RT ?>
		<td data-name="RT" <?php echo $store_storemast_list->RT->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCount ?>_store_storemast_RT">
<span<?php echo $store_storemast_list->RT->viewAttributes() ?>><?php echo $store_storemast_list->RT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast_list->UR->Visible) { // UR ?>
		<td data-name="UR" <?php echo $store_storemast_list->UR->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCount ?>_store_storemast_UR">
<span<?php echo $store_storemast_list->UR->viewAttributes() ?>><?php echo $store_storemast_list->UR->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast_list->TAXP->Visible) { // TAXP ?>
		<td data-name="TAXP" <?php echo $store_storemast_list->TAXP->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCount ?>_store_storemast_TAXP">
<span<?php echo $store_storemast_list->TAXP->viewAttributes() ?>><?php echo $store_storemast_list->TAXP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast_list->BATCHNO->Visible) { // BATCHNO ?>
		<td data-name="BATCHNO" <?php echo $store_storemast_list->BATCHNO->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCount ?>_store_storemast_BATCHNO">
<span<?php echo $store_storemast_list->BATCHNO->viewAttributes() ?>><?php echo $store_storemast_list->BATCHNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast_list->OQ->Visible) { // OQ ?>
		<td data-name="OQ" <?php echo $store_storemast_list->OQ->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCount ?>_store_storemast_OQ">
<span<?php echo $store_storemast_list->OQ->viewAttributes() ?>><?php echo $store_storemast_list->OQ->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast_list->RQ->Visible) { // RQ ?>
		<td data-name="RQ" <?php echo $store_storemast_list->RQ->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCount ?>_store_storemast_RQ">
<span<?php echo $store_storemast_list->RQ->viewAttributes() ?>><?php echo $store_storemast_list->RQ->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast_list->MRQ->Visible) { // MRQ ?>
		<td data-name="MRQ" <?php echo $store_storemast_list->MRQ->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCount ?>_store_storemast_MRQ">
<span<?php echo $store_storemast_list->MRQ->viewAttributes() ?>><?php echo $store_storemast_list->MRQ->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast_list->IQ->Visible) { // IQ ?>
		<td data-name="IQ" <?php echo $store_storemast_list->IQ->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCount ?>_store_storemast_IQ">
<span<?php echo $store_storemast_list->IQ->viewAttributes() ?>><?php echo $store_storemast_list->IQ->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast_list->MRP->Visible) { // MRP ?>
		<td data-name="MRP" <?php echo $store_storemast_list->MRP->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCount ?>_store_storemast_MRP">
<span<?php echo $store_storemast_list->MRP->viewAttributes() ?>><?php echo $store_storemast_list->MRP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast_list->EXPDT->Visible) { // EXPDT ?>
		<td data-name="EXPDT" <?php echo $store_storemast_list->EXPDT->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCount ?>_store_storemast_EXPDT">
<span<?php echo $store_storemast_list->EXPDT->viewAttributes() ?>><?php echo $store_storemast_list->EXPDT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast_list->SALQTY->Visible) { // SALQTY ?>
		<td data-name="SALQTY" <?php echo $store_storemast_list->SALQTY->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCount ?>_store_storemast_SALQTY">
<span<?php echo $store_storemast_list->SALQTY->viewAttributes() ?>><?php echo $store_storemast_list->SALQTY->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast_list->LASTPURDT->Visible) { // LASTPURDT ?>
		<td data-name="LASTPURDT" <?php echo $store_storemast_list->LASTPURDT->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCount ?>_store_storemast_LASTPURDT">
<span<?php echo $store_storemast_list->LASTPURDT->viewAttributes() ?>><?php echo $store_storemast_list->LASTPURDT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast_list->LASTSUPP->Visible) { // LASTSUPP ?>
		<td data-name="LASTSUPP" <?php echo $store_storemast_list->LASTSUPP->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCount ?>_store_storemast_LASTSUPP">
<span<?php echo $store_storemast_list->LASTSUPP->viewAttributes() ?>><?php echo $store_storemast_list->LASTSUPP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast_list->GENNAME->Visible) { // GENNAME ?>
		<td data-name="GENNAME" <?php echo $store_storemast_list->GENNAME->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCount ?>_store_storemast_GENNAME">
<span<?php echo $store_storemast_list->GENNAME->viewAttributes() ?>><?php echo $store_storemast_list->GENNAME->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast_list->LASTISSDT->Visible) { // LASTISSDT ?>
		<td data-name="LASTISSDT" <?php echo $store_storemast_list->LASTISSDT->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCount ?>_store_storemast_LASTISSDT">
<span<?php echo $store_storemast_list->LASTISSDT->viewAttributes() ?>><?php echo $store_storemast_list->LASTISSDT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast_list->CREATEDDT->Visible) { // CREATEDDT ?>
		<td data-name="CREATEDDT" <?php echo $store_storemast_list->CREATEDDT->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCount ?>_store_storemast_CREATEDDT">
<span<?php echo $store_storemast_list->CREATEDDT->viewAttributes() ?>><?php echo $store_storemast_list->CREATEDDT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast_list->OPPRC->Visible) { // OPPRC ?>
		<td data-name="OPPRC" <?php echo $store_storemast_list->OPPRC->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCount ?>_store_storemast_OPPRC">
<span<?php echo $store_storemast_list->OPPRC->viewAttributes() ?>><?php echo $store_storemast_list->OPPRC->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast_list->RESTRICT->Visible) { // RESTRICT ?>
		<td data-name="RESTRICT" <?php echo $store_storemast_list->RESTRICT->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCount ?>_store_storemast_RESTRICT">
<span<?php echo $store_storemast_list->RESTRICT->viewAttributes() ?>><?php echo $store_storemast_list->RESTRICT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast_list->BAWAPRC->Visible) { // BAWAPRC ?>
		<td data-name="BAWAPRC" <?php echo $store_storemast_list->BAWAPRC->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCount ?>_store_storemast_BAWAPRC">
<span<?php echo $store_storemast_list->BAWAPRC->viewAttributes() ?>><?php echo $store_storemast_list->BAWAPRC->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast_list->STAXPER->Visible) { // STAXPER ?>
		<td data-name="STAXPER" <?php echo $store_storemast_list->STAXPER->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCount ?>_store_storemast_STAXPER">
<span<?php echo $store_storemast_list->STAXPER->viewAttributes() ?>><?php echo $store_storemast_list->STAXPER->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast_list->TAXTYPE->Visible) { // TAXTYPE ?>
		<td data-name="TAXTYPE" <?php echo $store_storemast_list->TAXTYPE->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCount ?>_store_storemast_TAXTYPE">
<span<?php echo $store_storemast_list->TAXTYPE->viewAttributes() ?>><?php echo $store_storemast_list->TAXTYPE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast_list->OLDTAXP->Visible) { // OLDTAXP ?>
		<td data-name="OLDTAXP" <?php echo $store_storemast_list->OLDTAXP->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCount ?>_store_storemast_OLDTAXP">
<span<?php echo $store_storemast_list->OLDTAXP->viewAttributes() ?>><?php echo $store_storemast_list->OLDTAXP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast_list->TAXUPD->Visible) { // TAXUPD ?>
		<td data-name="TAXUPD" <?php echo $store_storemast_list->TAXUPD->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCount ?>_store_storemast_TAXUPD">
<span<?php echo $store_storemast_list->TAXUPD->viewAttributes() ?>><?php echo $store_storemast_list->TAXUPD->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast_list->PACKAGE->Visible) { // PACKAGE ?>
		<td data-name="PACKAGE" <?php echo $store_storemast_list->PACKAGE->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCount ?>_store_storemast_PACKAGE">
<span<?php echo $store_storemast_list->PACKAGE->viewAttributes() ?>><?php echo $store_storemast_list->PACKAGE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast_list->NEWRT->Visible) { // NEWRT ?>
		<td data-name="NEWRT" <?php echo $store_storemast_list->NEWRT->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCount ?>_store_storemast_NEWRT">
<span<?php echo $store_storemast_list->NEWRT->viewAttributes() ?>><?php echo $store_storemast_list->NEWRT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast_list->NEWMRP->Visible) { // NEWMRP ?>
		<td data-name="NEWMRP" <?php echo $store_storemast_list->NEWMRP->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCount ?>_store_storemast_NEWMRP">
<span<?php echo $store_storemast_list->NEWMRP->viewAttributes() ?>><?php echo $store_storemast_list->NEWMRP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast_list->NEWUR->Visible) { // NEWUR ?>
		<td data-name="NEWUR" <?php echo $store_storemast_list->NEWUR->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCount ?>_store_storemast_NEWUR">
<span<?php echo $store_storemast_list->NEWUR->viewAttributes() ?>><?php echo $store_storemast_list->NEWUR->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast_list->STATUS->Visible) { // STATUS ?>
		<td data-name="STATUS" <?php echo $store_storemast_list->STATUS->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCount ?>_store_storemast_STATUS">
<span<?php echo $store_storemast_list->STATUS->viewAttributes() ?>><?php echo $store_storemast_list->STATUS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast_list->RETNQTY->Visible) { // RETNQTY ?>
		<td data-name="RETNQTY" <?php echo $store_storemast_list->RETNQTY->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCount ?>_store_storemast_RETNQTY">
<span<?php echo $store_storemast_list->RETNQTY->viewAttributes() ?>><?php echo $store_storemast_list->RETNQTY->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast_list->KEMODISC->Visible) { // KEMODISC ?>
		<td data-name="KEMODISC" <?php echo $store_storemast_list->KEMODISC->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCount ?>_store_storemast_KEMODISC">
<span<?php echo $store_storemast_list->KEMODISC->viewAttributes() ?>><?php echo $store_storemast_list->KEMODISC->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast_list->PATSALE->Visible) { // PATSALE ?>
		<td data-name="PATSALE" <?php echo $store_storemast_list->PATSALE->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCount ?>_store_storemast_PATSALE">
<span<?php echo $store_storemast_list->PATSALE->viewAttributes() ?>><?php echo $store_storemast_list->PATSALE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast_list->ORGAN->Visible) { // ORGAN ?>
		<td data-name="ORGAN" <?php echo $store_storemast_list->ORGAN->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCount ?>_store_storemast_ORGAN">
<span<?php echo $store_storemast_list->ORGAN->viewAttributes() ?>><?php echo $store_storemast_list->ORGAN->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast_list->OLDRQ->Visible) { // OLDRQ ?>
		<td data-name="OLDRQ" <?php echo $store_storemast_list->OLDRQ->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCount ?>_store_storemast_OLDRQ">
<span<?php echo $store_storemast_list->OLDRQ->viewAttributes() ?>><?php echo $store_storemast_list->OLDRQ->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast_list->DRID->Visible) { // DRID ?>
		<td data-name="DRID" <?php echo $store_storemast_list->DRID->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCount ?>_store_storemast_DRID">
<span<?php echo $store_storemast_list->DRID->viewAttributes() ?>><?php echo $store_storemast_list->DRID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast_list->MFRCODE->Visible) { // MFRCODE ?>
		<td data-name="MFRCODE" <?php echo $store_storemast_list->MFRCODE->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCount ?>_store_storemast_MFRCODE">
<span<?php echo $store_storemast_list->MFRCODE->viewAttributes() ?>><?php echo $store_storemast_list->MFRCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast_list->COMBCODE->Visible) { // COMBCODE ?>
		<td data-name="COMBCODE" <?php echo $store_storemast_list->COMBCODE->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCount ?>_store_storemast_COMBCODE">
<span<?php echo $store_storemast_list->COMBCODE->viewAttributes() ?>><?php echo $store_storemast_list->COMBCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast_list->GENCODE->Visible) { // GENCODE ?>
		<td data-name="GENCODE" <?php echo $store_storemast_list->GENCODE->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCount ?>_store_storemast_GENCODE">
<span<?php echo $store_storemast_list->GENCODE->viewAttributes() ?>><?php echo $store_storemast_list->GENCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast_list->STRENGTH->Visible) { // STRENGTH ?>
		<td data-name="STRENGTH" <?php echo $store_storemast_list->STRENGTH->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCount ?>_store_storemast_STRENGTH">
<span<?php echo $store_storemast_list->STRENGTH->viewAttributes() ?>><?php echo $store_storemast_list->STRENGTH->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast_list->UNIT->Visible) { // UNIT ?>
		<td data-name="UNIT" <?php echo $store_storemast_list->UNIT->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCount ?>_store_storemast_UNIT">
<span<?php echo $store_storemast_list->UNIT->viewAttributes() ?>><?php echo $store_storemast_list->UNIT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast_list->FORMULARY->Visible) { // FORMULARY ?>
		<td data-name="FORMULARY" <?php echo $store_storemast_list->FORMULARY->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCount ?>_store_storemast_FORMULARY">
<span<?php echo $store_storemast_list->FORMULARY->viewAttributes() ?>><?php echo $store_storemast_list->FORMULARY->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast_list->STOCK->Visible) { // STOCK ?>
		<td data-name="STOCK" <?php echo $store_storemast_list->STOCK->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCount ?>_store_storemast_STOCK">
<span<?php echo $store_storemast_list->STOCK->viewAttributes() ?>><?php echo $store_storemast_list->STOCK->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast_list->RACKNO->Visible) { // RACKNO ?>
		<td data-name="RACKNO" <?php echo $store_storemast_list->RACKNO->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCount ?>_store_storemast_RACKNO">
<span<?php echo $store_storemast_list->RACKNO->viewAttributes() ?>><?php echo $store_storemast_list->RACKNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast_list->SUPPNAME->Visible) { // SUPPNAME ?>
		<td data-name="SUPPNAME" <?php echo $store_storemast_list->SUPPNAME->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCount ?>_store_storemast_SUPPNAME">
<span<?php echo $store_storemast_list->SUPPNAME->viewAttributes() ?>><?php echo $store_storemast_list->SUPPNAME->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast_list->COMBNAME->Visible) { // COMBNAME ?>
		<td data-name="COMBNAME" <?php echo $store_storemast_list->COMBNAME->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCount ?>_store_storemast_COMBNAME">
<span<?php echo $store_storemast_list->COMBNAME->viewAttributes() ?>><?php echo $store_storemast_list->COMBNAME->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast_list->GENERICNAME->Visible) { // GENERICNAME ?>
		<td data-name="GENERICNAME" <?php echo $store_storemast_list->GENERICNAME->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCount ?>_store_storemast_GENERICNAME">
<span<?php echo $store_storemast_list->GENERICNAME->viewAttributes() ?>><?php echo $store_storemast_list->GENERICNAME->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast_list->REMARK->Visible) { // REMARK ?>
		<td data-name="REMARK" <?php echo $store_storemast_list->REMARK->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCount ?>_store_storemast_REMARK">
<span<?php echo $store_storemast_list->REMARK->viewAttributes() ?>><?php echo $store_storemast_list->REMARK->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast_list->TEMP->Visible) { // TEMP ?>
		<td data-name="TEMP" <?php echo $store_storemast_list->TEMP->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCount ?>_store_storemast_TEMP">
<span<?php echo $store_storemast_list->TEMP->viewAttributes() ?>><?php echo $store_storemast_list->TEMP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast_list->PACKING->Visible) { // PACKING ?>
		<td data-name="PACKING" <?php echo $store_storemast_list->PACKING->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCount ?>_store_storemast_PACKING">
<span<?php echo $store_storemast_list->PACKING->viewAttributes() ?>><?php echo $store_storemast_list->PACKING->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast_list->PhysQty->Visible) { // PhysQty ?>
		<td data-name="PhysQty" <?php echo $store_storemast_list->PhysQty->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCount ?>_store_storemast_PhysQty">
<span<?php echo $store_storemast_list->PhysQty->viewAttributes() ?>><?php echo $store_storemast_list->PhysQty->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast_list->LedQty->Visible) { // LedQty ?>
		<td data-name="LedQty" <?php echo $store_storemast_list->LedQty->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCount ?>_store_storemast_LedQty">
<span<?php echo $store_storemast_list->LedQty->viewAttributes() ?>><?php echo $store_storemast_list->LedQty->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $store_storemast_list->id->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCount ?>_store_storemast_id">
<span<?php echo $store_storemast_list->id->viewAttributes() ?>><?php echo $store_storemast_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast_list->PurValue->Visible) { // PurValue ?>
		<td data-name="PurValue" <?php echo $store_storemast_list->PurValue->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCount ?>_store_storemast_PurValue">
<span<?php echo $store_storemast_list->PurValue->viewAttributes() ?>><?php echo $store_storemast_list->PurValue->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast_list->PSGST->Visible) { // PSGST ?>
		<td data-name="PSGST" <?php echo $store_storemast_list->PSGST->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCount ?>_store_storemast_PSGST">
<span<?php echo $store_storemast_list->PSGST->viewAttributes() ?>><?php echo $store_storemast_list->PSGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast_list->PCGST->Visible) { // PCGST ?>
		<td data-name="PCGST" <?php echo $store_storemast_list->PCGST->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCount ?>_store_storemast_PCGST">
<span<?php echo $store_storemast_list->PCGST->viewAttributes() ?>><?php echo $store_storemast_list->PCGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast_list->SaleValue->Visible) { // SaleValue ?>
		<td data-name="SaleValue" <?php echo $store_storemast_list->SaleValue->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCount ?>_store_storemast_SaleValue">
<span<?php echo $store_storemast_list->SaleValue->viewAttributes() ?>><?php echo $store_storemast_list->SaleValue->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast_list->SSGST->Visible) { // SSGST ?>
		<td data-name="SSGST" <?php echo $store_storemast_list->SSGST->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCount ?>_store_storemast_SSGST">
<span<?php echo $store_storemast_list->SSGST->viewAttributes() ?>><?php echo $store_storemast_list->SSGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast_list->SCGST->Visible) { // SCGST ?>
		<td data-name="SCGST" <?php echo $store_storemast_list->SCGST->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCount ?>_store_storemast_SCGST">
<span<?php echo $store_storemast_list->SCGST->viewAttributes() ?>><?php echo $store_storemast_list->SCGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast_list->SaleRate->Visible) { // SaleRate ?>
		<td data-name="SaleRate" <?php echo $store_storemast_list->SaleRate->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCount ?>_store_storemast_SaleRate">
<span<?php echo $store_storemast_list->SaleRate->viewAttributes() ?>><?php echo $store_storemast_list->SaleRate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $store_storemast_list->HospID->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCount ?>_store_storemast_HospID">
<span<?php echo $store_storemast_list->HospID->viewAttributes() ?>><?php echo $store_storemast_list->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast_list->BRNAME->Visible) { // BRNAME ?>
		<td data-name="BRNAME" <?php echo $store_storemast_list->BRNAME->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCount ?>_store_storemast_BRNAME">
<span<?php echo $store_storemast_list->BRNAME->viewAttributes() ?>><?php echo $store_storemast_list->BRNAME->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$store_storemast_list->ListOptions->render("body", "right", $store_storemast_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$store_storemast_list->isGridAdd())
		$store_storemast_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$store_storemast->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($store_storemast_list->Recordset)
	$store_storemast_list->Recordset->Close();
?>
<?php if (!$store_storemast_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$store_storemast_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $store_storemast_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $store_storemast_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($store_storemast_list->TotalRecords == 0 && !$store_storemast->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $store_storemast_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$store_storemast_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$store_storemast_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$store_storemast->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_store_storemast",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$store_storemast_list->terminate();
?>
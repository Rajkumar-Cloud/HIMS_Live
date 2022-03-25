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
$view_pharmacy_search_product_new_list = new view_pharmacy_search_product_new_list();

// Run the page
$view_pharmacy_search_product_new_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacy_search_product_new_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$view_pharmacy_search_product_new_list->isExport()) { ?>
<script>
var fview_pharmacy_search_product_newlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fview_pharmacy_search_product_newlist = currentForm = new ew.Form("fview_pharmacy_search_product_newlist", "list");
	fview_pharmacy_search_product_newlist.formKeyCountName = '<?php echo $view_pharmacy_search_product_new_list->FormKeyCountName ?>';
	loadjs.done("fview_pharmacy_search_product_newlist");
});
var fview_pharmacy_search_product_newlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fview_pharmacy_search_product_newlistsrch = currentSearchForm = new ew.Form("fview_pharmacy_search_product_newlistsrch");

	// Dynamic selection lists
	// Filters

	fview_pharmacy_search_product_newlistsrch.filterList = <?php echo $view_pharmacy_search_product_new_list->getFilterList() ?>;
	loadjs.done("fview_pharmacy_search_product_newlistsrch");
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
<?php if (!$view_pharmacy_search_product_new_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_pharmacy_search_product_new_list->TotalRecords > 0 && $view_pharmacy_search_product_new_list->ExportOptions->visible()) { ?>
<?php $view_pharmacy_search_product_new_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_search_product_new_list->ImportOptions->visible()) { ?>
<?php $view_pharmacy_search_product_new_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_search_product_new_list->SearchOptions->visible()) { ?>
<?php $view_pharmacy_search_product_new_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_search_product_new_list->FilterOptions->visible()) { ?>
<?php $view_pharmacy_search_product_new_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_pharmacy_search_product_new_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_pharmacy_search_product_new_list->isExport() && !$view_pharmacy_search_product_new->CurrentAction) { ?>
<form name="fview_pharmacy_search_product_newlistsrch" id="fview_pharmacy_search_product_newlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fview_pharmacy_search_product_newlistsrch-search-panel" class="<?php echo $view_pharmacy_search_product_new_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_pharmacy_search_product_new">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $view_pharmacy_search_product_new_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($view_pharmacy_search_product_new_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($view_pharmacy_search_product_new_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_pharmacy_search_product_new_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_pharmacy_search_product_new_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_search_product_new_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_search_product_new_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_search_product_new_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $view_pharmacy_search_product_new_list->showPageHeader(); ?>
<?php
$view_pharmacy_search_product_new_list->showMessage();
?>
<?php if ($view_pharmacy_search_product_new_list->TotalRecords > 0 || $view_pharmacy_search_product_new->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_pharmacy_search_product_new_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_pharmacy_search_product_new">
<?php if (!$view_pharmacy_search_product_new_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_pharmacy_search_product_new_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_pharmacy_search_product_new_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_search_product_new_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_pharmacy_search_product_newlist" id="fview_pharmacy_search_product_newlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_search_product_new">
<div id="gmp_view_pharmacy_search_product_new" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($view_pharmacy_search_product_new_list->TotalRecords > 0 || $view_pharmacy_search_product_new_list->isGridEdit()) { ?>
<table id="tbl_view_pharmacy_search_product_newlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_pharmacy_search_product_new->RowType = ROWTYPE_HEADER;

// Render list options
$view_pharmacy_search_product_new_list->renderListOptions();

// Render list options (header, left)
$view_pharmacy_search_product_new_list->ListOptions->render("header", "left");
?>
<?php if ($view_pharmacy_search_product_new_list->id->Visible) { // id ?>
	<?php if ($view_pharmacy_search_product_new_list->SortUrl($view_pharmacy_search_product_new_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_pharmacy_search_product_new_list->id->headerCellClass() ?>"><div id="elh_view_pharmacy_search_product_new_id" class="view_pharmacy_search_product_new_id"><div class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_new_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_pharmacy_search_product_new_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_search_product_new_list->SortUrl($view_pharmacy_search_product_new_list->id) ?>', 1);"><div id="elh_view_pharmacy_search_product_new_id" class="view_pharmacy_search_product_new_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_new_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_search_product_new_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_search_product_new_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_search_product_new_list->DES->Visible) { // DES ?>
	<?php if ($view_pharmacy_search_product_new_list->SortUrl($view_pharmacy_search_product_new_list->DES) == "") { ?>
		<th data-name="DES" class="<?php echo $view_pharmacy_search_product_new_list->DES->headerCellClass() ?>"><div id="elh_view_pharmacy_search_product_new_DES" class="view_pharmacy_search_product_new_DES"><div class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_new_list->DES->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DES" class="<?php echo $view_pharmacy_search_product_new_list->DES->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_search_product_new_list->SortUrl($view_pharmacy_search_product_new_list->DES) ?>', 1);"><div id="elh_view_pharmacy_search_product_new_DES" class="view_pharmacy_search_product_new_DES">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_new_list->DES->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_search_product_new_list->DES->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_search_product_new_list->DES->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_search_product_new_list->BATCH->Visible) { // BATCH ?>
	<?php if ($view_pharmacy_search_product_new_list->SortUrl($view_pharmacy_search_product_new_list->BATCH) == "") { ?>
		<th data-name="BATCH" class="<?php echo $view_pharmacy_search_product_new_list->BATCH->headerCellClass() ?>"><div id="elh_view_pharmacy_search_product_new_BATCH" class="view_pharmacy_search_product_new_BATCH"><div class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_new_list->BATCH->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BATCH" class="<?php echo $view_pharmacy_search_product_new_list->BATCH->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_search_product_new_list->SortUrl($view_pharmacy_search_product_new_list->BATCH) ?>', 1);"><div id="elh_view_pharmacy_search_product_new_BATCH" class="view_pharmacy_search_product_new_BATCH">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_new_list->BATCH->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_search_product_new_list->BATCH->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_search_product_new_list->BATCH->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_search_product_new_list->PRC->Visible) { // PRC ?>
	<?php if ($view_pharmacy_search_product_new_list->SortUrl($view_pharmacy_search_product_new_list->PRC) == "") { ?>
		<th data-name="PRC" class="<?php echo $view_pharmacy_search_product_new_list->PRC->headerCellClass() ?>"><div id="elh_view_pharmacy_search_product_new_PRC" class="view_pharmacy_search_product_new_PRC"><div class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_new_list->PRC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRC" class="<?php echo $view_pharmacy_search_product_new_list->PRC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_search_product_new_list->SortUrl($view_pharmacy_search_product_new_list->PRC) ?>', 1);"><div id="elh_view_pharmacy_search_product_new_PRC" class="view_pharmacy_search_product_new_PRC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_new_list->PRC->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_search_product_new_list->PRC->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_search_product_new_list->PRC->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_search_product_new_list->OQ->Visible) { // OQ ?>
	<?php if ($view_pharmacy_search_product_new_list->SortUrl($view_pharmacy_search_product_new_list->OQ) == "") { ?>
		<th data-name="OQ" class="<?php echo $view_pharmacy_search_product_new_list->OQ->headerCellClass() ?>"><div id="elh_view_pharmacy_search_product_new_OQ" class="view_pharmacy_search_product_new_OQ"><div class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_new_list->OQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OQ" class="<?php echo $view_pharmacy_search_product_new_list->OQ->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_search_product_new_list->SortUrl($view_pharmacy_search_product_new_list->OQ) ?>', 1);"><div id="elh_view_pharmacy_search_product_new_OQ" class="view_pharmacy_search_product_new_OQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_new_list->OQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_search_product_new_list->OQ->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_search_product_new_list->OQ->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_search_product_new_list->Stock->Visible) { // Stock ?>
	<?php if ($view_pharmacy_search_product_new_list->SortUrl($view_pharmacy_search_product_new_list->Stock) == "") { ?>
		<th data-name="Stock" class="<?php echo $view_pharmacy_search_product_new_list->Stock->headerCellClass() ?>"><div id="elh_view_pharmacy_search_product_new_Stock" class="view_pharmacy_search_product_new_Stock"><div class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_new_list->Stock->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Stock" class="<?php echo $view_pharmacy_search_product_new_list->Stock->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_search_product_new_list->SortUrl($view_pharmacy_search_product_new_list->Stock) ?>', 1);"><div id="elh_view_pharmacy_search_product_new_Stock" class="view_pharmacy_search_product_new_Stock">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_new_list->Stock->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_search_product_new_list->Stock->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_search_product_new_list->Stock->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_search_product_new_list->EXPDT->Visible) { // EXPDT ?>
	<?php if ($view_pharmacy_search_product_new_list->SortUrl($view_pharmacy_search_product_new_list->EXPDT) == "") { ?>
		<th data-name="EXPDT" class="<?php echo $view_pharmacy_search_product_new_list->EXPDT->headerCellClass() ?>"><div id="elh_view_pharmacy_search_product_new_EXPDT" class="view_pharmacy_search_product_new_EXPDT"><div class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_new_list->EXPDT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EXPDT" class="<?php echo $view_pharmacy_search_product_new_list->EXPDT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_search_product_new_list->SortUrl($view_pharmacy_search_product_new_list->EXPDT) ?>', 1);"><div id="elh_view_pharmacy_search_product_new_EXPDT" class="view_pharmacy_search_product_new_EXPDT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_new_list->EXPDT->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_search_product_new_list->EXPDT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_search_product_new_list->EXPDT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_search_product_new_list->GENNAME->Visible) { // GENNAME ?>
	<?php if ($view_pharmacy_search_product_new_list->SortUrl($view_pharmacy_search_product_new_list->GENNAME) == "") { ?>
		<th data-name="GENNAME" class="<?php echo $view_pharmacy_search_product_new_list->GENNAME->headerCellClass() ?>"><div id="elh_view_pharmacy_search_product_new_GENNAME" class="view_pharmacy_search_product_new_GENNAME"><div class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_new_list->GENNAME->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GENNAME" class="<?php echo $view_pharmacy_search_product_new_list->GENNAME->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_search_product_new_list->SortUrl($view_pharmacy_search_product_new_list->GENNAME) ?>', 1);"><div id="elh_view_pharmacy_search_product_new_GENNAME" class="view_pharmacy_search_product_new_GENNAME">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_new_list->GENNAME->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_search_product_new_list->GENNAME->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_search_product_new_list->GENNAME->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_search_product_new_list->UNIT->Visible) { // UNIT ?>
	<?php if ($view_pharmacy_search_product_new_list->SortUrl($view_pharmacy_search_product_new_list->UNIT) == "") { ?>
		<th data-name="UNIT" class="<?php echo $view_pharmacy_search_product_new_list->UNIT->headerCellClass() ?>"><div id="elh_view_pharmacy_search_product_new_UNIT" class="view_pharmacy_search_product_new_UNIT"><div class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_new_list->UNIT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UNIT" class="<?php echo $view_pharmacy_search_product_new_list->UNIT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_search_product_new_list->SortUrl($view_pharmacy_search_product_new_list->UNIT) ?>', 1);"><div id="elh_view_pharmacy_search_product_new_UNIT" class="view_pharmacy_search_product_new_UNIT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_new_list->UNIT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_search_product_new_list->UNIT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_search_product_new_list->UNIT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_search_product_new_list->RT->Visible) { // RT ?>
	<?php if ($view_pharmacy_search_product_new_list->SortUrl($view_pharmacy_search_product_new_list->RT) == "") { ?>
		<th data-name="RT" class="<?php echo $view_pharmacy_search_product_new_list->RT->headerCellClass() ?>"><div id="elh_view_pharmacy_search_product_new_RT" class="view_pharmacy_search_product_new_RT"><div class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_new_list->RT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RT" class="<?php echo $view_pharmacy_search_product_new_list->RT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_search_product_new_list->SortUrl($view_pharmacy_search_product_new_list->RT) ?>', 1);"><div id="elh_view_pharmacy_search_product_new_RT" class="view_pharmacy_search_product_new_RT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_new_list->RT->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_search_product_new_list->RT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_search_product_new_list->RT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_search_product_new_list->SSGST->Visible) { // SSGST ?>
	<?php if ($view_pharmacy_search_product_new_list->SortUrl($view_pharmacy_search_product_new_list->SSGST) == "") { ?>
		<th data-name="SSGST" class="<?php echo $view_pharmacy_search_product_new_list->SSGST->headerCellClass() ?>"><div id="elh_view_pharmacy_search_product_new_SSGST" class="view_pharmacy_search_product_new_SSGST"><div class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_new_list->SSGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SSGST" class="<?php echo $view_pharmacy_search_product_new_list->SSGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_search_product_new_list->SortUrl($view_pharmacy_search_product_new_list->SSGST) ?>', 1);"><div id="elh_view_pharmacy_search_product_new_SSGST" class="view_pharmacy_search_product_new_SSGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_new_list->SSGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_search_product_new_list->SSGST->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_search_product_new_list->SSGST->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_search_product_new_list->SCGST->Visible) { // SCGST ?>
	<?php if ($view_pharmacy_search_product_new_list->SortUrl($view_pharmacy_search_product_new_list->SCGST) == "") { ?>
		<th data-name="SCGST" class="<?php echo $view_pharmacy_search_product_new_list->SCGST->headerCellClass() ?>"><div id="elh_view_pharmacy_search_product_new_SCGST" class="view_pharmacy_search_product_new_SCGST"><div class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_new_list->SCGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SCGST" class="<?php echo $view_pharmacy_search_product_new_list->SCGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_search_product_new_list->SortUrl($view_pharmacy_search_product_new_list->SCGST) ?>', 1);"><div id="elh_view_pharmacy_search_product_new_SCGST" class="view_pharmacy_search_product_new_SCGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_new_list->SCGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_search_product_new_list->SCGST->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_search_product_new_list->SCGST->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_search_product_new_list->MFRCODE->Visible) { // MFRCODE ?>
	<?php if ($view_pharmacy_search_product_new_list->SortUrl($view_pharmacy_search_product_new_list->MFRCODE) == "") { ?>
		<th data-name="MFRCODE" class="<?php echo $view_pharmacy_search_product_new_list->MFRCODE->headerCellClass() ?>"><div id="elh_view_pharmacy_search_product_new_MFRCODE" class="view_pharmacy_search_product_new_MFRCODE"><div class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_new_list->MFRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MFRCODE" class="<?php echo $view_pharmacy_search_product_new_list->MFRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_search_product_new_list->SortUrl($view_pharmacy_search_product_new_list->MFRCODE) ?>', 1);"><div id="elh_view_pharmacy_search_product_new_MFRCODE" class="view_pharmacy_search_product_new_MFRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_new_list->MFRCODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_search_product_new_list->MFRCODE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_search_product_new_list->MFRCODE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_search_product_new_list->BRCODE->Visible) { // BRCODE ?>
	<?php if ($view_pharmacy_search_product_new_list->SortUrl($view_pharmacy_search_product_new_list->BRCODE) == "") { ?>
		<th data-name="BRCODE" class="<?php echo $view_pharmacy_search_product_new_list->BRCODE->headerCellClass() ?>"><div id="elh_view_pharmacy_search_product_new_BRCODE" class="view_pharmacy_search_product_new_BRCODE"><div class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_new_list->BRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BRCODE" class="<?php echo $view_pharmacy_search_product_new_list->BRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_search_product_new_list->SortUrl($view_pharmacy_search_product_new_list->BRCODE) ?>', 1);"><div id="elh_view_pharmacy_search_product_new_BRCODE" class="view_pharmacy_search_product_new_BRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_new_list->BRCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_search_product_new_list->BRCODE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_search_product_new_list->BRCODE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_search_product_new_list->HospID->Visible) { // HospID ?>
	<?php if ($view_pharmacy_search_product_new_list->SortUrl($view_pharmacy_search_product_new_list->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_pharmacy_search_product_new_list->HospID->headerCellClass() ?>"><div id="elh_view_pharmacy_search_product_new_HospID" class="view_pharmacy_search_product_new_HospID"><div class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_new_list->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_pharmacy_search_product_new_list->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_search_product_new_list->SortUrl($view_pharmacy_search_product_new_list->HospID) ?>', 1);"><div id="elh_view_pharmacy_search_product_new_HospID" class="view_pharmacy_search_product_new_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_new_list->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_search_product_new_list->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_search_product_new_list->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_search_product_new_list->BILLDATE->Visible) { // BILLDATE ?>
	<?php if ($view_pharmacy_search_product_new_list->SortUrl($view_pharmacy_search_product_new_list->BILLDATE) == "") { ?>
		<th data-name="BILLDATE" class="<?php echo $view_pharmacy_search_product_new_list->BILLDATE->headerCellClass() ?>"><div id="elh_view_pharmacy_search_product_new_BILLDATE" class="view_pharmacy_search_product_new_BILLDATE"><div class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_new_list->BILLDATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BILLDATE" class="<?php echo $view_pharmacy_search_product_new_list->BILLDATE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_search_product_new_list->SortUrl($view_pharmacy_search_product_new_list->BILLDATE) ?>', 1);"><div id="elh_view_pharmacy_search_product_new_BILLDATE" class="view_pharmacy_search_product_new_BILLDATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_new_list->BILLDATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_search_product_new_list->BILLDATE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_search_product_new_list->BILLDATE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_search_product_new_list->PrName->Visible) { // PrName ?>
	<?php if ($view_pharmacy_search_product_new_list->SortUrl($view_pharmacy_search_product_new_list->PrName) == "") { ?>
		<th data-name="PrName" class="<?php echo $view_pharmacy_search_product_new_list->PrName->headerCellClass() ?>"><div id="elh_view_pharmacy_search_product_new_PrName" class="view_pharmacy_search_product_new_PrName"><div class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_new_list->PrName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrName" class="<?php echo $view_pharmacy_search_product_new_list->PrName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_search_product_new_list->SortUrl($view_pharmacy_search_product_new_list->PrName) ?>', 1);"><div id="elh_view_pharmacy_search_product_new_PrName" class="view_pharmacy_search_product_new_PrName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_new_list->PrName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_search_product_new_list->PrName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_search_product_new_list->PrName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_pharmacy_search_product_new_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_pharmacy_search_product_new_list->ExportAll && $view_pharmacy_search_product_new_list->isExport()) {
	$view_pharmacy_search_product_new_list->StopRecord = $view_pharmacy_search_product_new_list->TotalRecords;
} else {

	// Set the last record to display
	if ($view_pharmacy_search_product_new_list->TotalRecords > $view_pharmacy_search_product_new_list->StartRecord + $view_pharmacy_search_product_new_list->DisplayRecords - 1)
		$view_pharmacy_search_product_new_list->StopRecord = $view_pharmacy_search_product_new_list->StartRecord + $view_pharmacy_search_product_new_list->DisplayRecords - 1;
	else
		$view_pharmacy_search_product_new_list->StopRecord = $view_pharmacy_search_product_new_list->TotalRecords;
}
$view_pharmacy_search_product_new_list->RecordCount = $view_pharmacy_search_product_new_list->StartRecord - 1;
if ($view_pharmacy_search_product_new_list->Recordset && !$view_pharmacy_search_product_new_list->Recordset->EOF) {
	$view_pharmacy_search_product_new_list->Recordset->moveFirst();
	$selectLimit = $view_pharmacy_search_product_new_list->UseSelectLimit;
	if (!$selectLimit && $view_pharmacy_search_product_new_list->StartRecord > 1)
		$view_pharmacy_search_product_new_list->Recordset->move($view_pharmacy_search_product_new_list->StartRecord - 1);
} elseif (!$view_pharmacy_search_product_new->AllowAddDeleteRow && $view_pharmacy_search_product_new_list->StopRecord == 0) {
	$view_pharmacy_search_product_new_list->StopRecord = $view_pharmacy_search_product_new->GridAddRowCount;
}

// Initialize aggregate
$view_pharmacy_search_product_new->RowType = ROWTYPE_AGGREGATEINIT;
$view_pharmacy_search_product_new->resetAttributes();
$view_pharmacy_search_product_new_list->renderRow();
while ($view_pharmacy_search_product_new_list->RecordCount < $view_pharmacy_search_product_new_list->StopRecord) {
	$view_pharmacy_search_product_new_list->RecordCount++;
	if ($view_pharmacy_search_product_new_list->RecordCount >= $view_pharmacy_search_product_new_list->StartRecord) {
		$view_pharmacy_search_product_new_list->RowCount++;

		// Set up key count
		$view_pharmacy_search_product_new_list->KeyCount = $view_pharmacy_search_product_new_list->RowIndex;

		// Init row class and style
		$view_pharmacy_search_product_new->resetAttributes();
		$view_pharmacy_search_product_new->CssClass = "";
		if ($view_pharmacy_search_product_new_list->isGridAdd()) {
		} else {
			$view_pharmacy_search_product_new_list->loadRowValues($view_pharmacy_search_product_new_list->Recordset); // Load row values
		}
		$view_pharmacy_search_product_new->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_pharmacy_search_product_new->RowAttrs->merge(["data-rowindex" => $view_pharmacy_search_product_new_list->RowCount, "id" => "r" . $view_pharmacy_search_product_new_list->RowCount . "_view_pharmacy_search_product_new", "data-rowtype" => $view_pharmacy_search_product_new->RowType]);

		// Render row
		$view_pharmacy_search_product_new_list->renderRow();

		// Render list options
		$view_pharmacy_search_product_new_list->renderListOptions();
?>
	<tr <?php echo $view_pharmacy_search_product_new->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_pharmacy_search_product_new_list->ListOptions->render("body", "left", $view_pharmacy_search_product_new_list->RowCount);
?>
	<?php if ($view_pharmacy_search_product_new_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $view_pharmacy_search_product_new_list->id->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_search_product_new_list->RowCount ?>_view_pharmacy_search_product_new_id">
<span<?php echo $view_pharmacy_search_product_new_list->id->viewAttributes() ?>><?php echo $view_pharmacy_search_product_new_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_search_product_new_list->DES->Visible) { // DES ?>
		<td data-name="DES" <?php echo $view_pharmacy_search_product_new_list->DES->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_search_product_new_list->RowCount ?>_view_pharmacy_search_product_new_DES">
<span<?php echo $view_pharmacy_search_product_new_list->DES->viewAttributes() ?>><?php echo $view_pharmacy_search_product_new_list->DES->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_search_product_new_list->BATCH->Visible) { // BATCH ?>
		<td data-name="BATCH" <?php echo $view_pharmacy_search_product_new_list->BATCH->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_search_product_new_list->RowCount ?>_view_pharmacy_search_product_new_BATCH">
<span<?php echo $view_pharmacy_search_product_new_list->BATCH->viewAttributes() ?>><?php echo $view_pharmacy_search_product_new_list->BATCH->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_search_product_new_list->PRC->Visible) { // PRC ?>
		<td data-name="PRC" <?php echo $view_pharmacy_search_product_new_list->PRC->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_search_product_new_list->RowCount ?>_view_pharmacy_search_product_new_PRC">
<span<?php echo $view_pharmacy_search_product_new_list->PRC->viewAttributes() ?>><?php echo $view_pharmacy_search_product_new_list->PRC->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_search_product_new_list->OQ->Visible) { // OQ ?>
		<td data-name="OQ" <?php echo $view_pharmacy_search_product_new_list->OQ->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_search_product_new_list->RowCount ?>_view_pharmacy_search_product_new_OQ">
<span<?php echo $view_pharmacy_search_product_new_list->OQ->viewAttributes() ?>><?php echo $view_pharmacy_search_product_new_list->OQ->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_search_product_new_list->Stock->Visible) { // Stock ?>
		<td data-name="Stock" <?php echo $view_pharmacy_search_product_new_list->Stock->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_search_product_new_list->RowCount ?>_view_pharmacy_search_product_new_Stock">
<span<?php echo $view_pharmacy_search_product_new_list->Stock->viewAttributes() ?>><?php echo $view_pharmacy_search_product_new_list->Stock->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_search_product_new_list->EXPDT->Visible) { // EXPDT ?>
		<td data-name="EXPDT" <?php echo $view_pharmacy_search_product_new_list->EXPDT->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_search_product_new_list->RowCount ?>_view_pharmacy_search_product_new_EXPDT">
<span<?php echo $view_pharmacy_search_product_new_list->EXPDT->viewAttributes() ?>><?php echo $view_pharmacy_search_product_new_list->EXPDT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_search_product_new_list->GENNAME->Visible) { // GENNAME ?>
		<td data-name="GENNAME" <?php echo $view_pharmacy_search_product_new_list->GENNAME->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_search_product_new_list->RowCount ?>_view_pharmacy_search_product_new_GENNAME">
<span<?php echo $view_pharmacy_search_product_new_list->GENNAME->viewAttributes() ?>><?php echo $view_pharmacy_search_product_new_list->GENNAME->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_search_product_new_list->UNIT->Visible) { // UNIT ?>
		<td data-name="UNIT" <?php echo $view_pharmacy_search_product_new_list->UNIT->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_search_product_new_list->RowCount ?>_view_pharmacy_search_product_new_UNIT">
<span<?php echo $view_pharmacy_search_product_new_list->UNIT->viewAttributes() ?>><?php echo $view_pharmacy_search_product_new_list->UNIT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_search_product_new_list->RT->Visible) { // RT ?>
		<td data-name="RT" <?php echo $view_pharmacy_search_product_new_list->RT->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_search_product_new_list->RowCount ?>_view_pharmacy_search_product_new_RT">
<span<?php echo $view_pharmacy_search_product_new_list->RT->viewAttributes() ?>><?php echo $view_pharmacy_search_product_new_list->RT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_search_product_new_list->SSGST->Visible) { // SSGST ?>
		<td data-name="SSGST" <?php echo $view_pharmacy_search_product_new_list->SSGST->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_search_product_new_list->RowCount ?>_view_pharmacy_search_product_new_SSGST">
<span<?php echo $view_pharmacy_search_product_new_list->SSGST->viewAttributes() ?>><?php echo $view_pharmacy_search_product_new_list->SSGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_search_product_new_list->SCGST->Visible) { // SCGST ?>
		<td data-name="SCGST" <?php echo $view_pharmacy_search_product_new_list->SCGST->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_search_product_new_list->RowCount ?>_view_pharmacy_search_product_new_SCGST">
<span<?php echo $view_pharmacy_search_product_new_list->SCGST->viewAttributes() ?>><?php echo $view_pharmacy_search_product_new_list->SCGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_search_product_new_list->MFRCODE->Visible) { // MFRCODE ?>
		<td data-name="MFRCODE" <?php echo $view_pharmacy_search_product_new_list->MFRCODE->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_search_product_new_list->RowCount ?>_view_pharmacy_search_product_new_MFRCODE">
<span<?php echo $view_pharmacy_search_product_new_list->MFRCODE->viewAttributes() ?>><?php echo $view_pharmacy_search_product_new_list->MFRCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_search_product_new_list->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE" <?php echo $view_pharmacy_search_product_new_list->BRCODE->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_search_product_new_list->RowCount ?>_view_pharmacy_search_product_new_BRCODE">
<span<?php echo $view_pharmacy_search_product_new_list->BRCODE->viewAttributes() ?>><?php echo $view_pharmacy_search_product_new_list->BRCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_search_product_new_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $view_pharmacy_search_product_new_list->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_search_product_new_list->RowCount ?>_view_pharmacy_search_product_new_HospID">
<span<?php echo $view_pharmacy_search_product_new_list->HospID->viewAttributes() ?>><?php echo $view_pharmacy_search_product_new_list->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_search_product_new_list->BILLDATE->Visible) { // BILLDATE ?>
		<td data-name="BILLDATE" <?php echo $view_pharmacy_search_product_new_list->BILLDATE->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_search_product_new_list->RowCount ?>_view_pharmacy_search_product_new_BILLDATE">
<span<?php echo $view_pharmacy_search_product_new_list->BILLDATE->viewAttributes() ?>><?php echo $view_pharmacy_search_product_new_list->BILLDATE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_search_product_new_list->PrName->Visible) { // PrName ?>
		<td data-name="PrName" <?php echo $view_pharmacy_search_product_new_list->PrName->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_search_product_new_list->RowCount ?>_view_pharmacy_search_product_new_PrName">
<span<?php echo $view_pharmacy_search_product_new_list->PrName->viewAttributes() ?>><?php echo $view_pharmacy_search_product_new_list->PrName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_pharmacy_search_product_new_list->ListOptions->render("body", "right", $view_pharmacy_search_product_new_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$view_pharmacy_search_product_new_list->isGridAdd())
		$view_pharmacy_search_product_new_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$view_pharmacy_search_product_new->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_pharmacy_search_product_new_list->Recordset)
	$view_pharmacy_search_product_new_list->Recordset->Close();
?>
<?php if (!$view_pharmacy_search_product_new_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_pharmacy_search_product_new_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_pharmacy_search_product_new_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_search_product_new_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_pharmacy_search_product_new_list->TotalRecords == 0 && !$view_pharmacy_search_product_new->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_search_product_new_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_pharmacy_search_product_new_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_pharmacy_search_product_new_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$view_pharmacy_search_product_new->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_view_pharmacy_search_product_new",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$view_pharmacy_search_product_new_list->terminate();
?>
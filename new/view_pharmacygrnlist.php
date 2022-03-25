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
$view_pharmacygrn_list = new view_pharmacygrn_list();

// Run the page
$view_pharmacygrn_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacygrn_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$view_pharmacygrn_list->isExport()) { ?>
<script>
var fview_pharmacygrnlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fview_pharmacygrnlist = currentForm = new ew.Form("fview_pharmacygrnlist", "list");
	fview_pharmacygrnlist.formKeyCountName = '<?php echo $view_pharmacygrn_list->FormKeyCountName ?>';
	loadjs.done("fview_pharmacygrnlist");
});
var fview_pharmacygrnlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fview_pharmacygrnlistsrch = currentSearchForm = new ew.Form("fview_pharmacygrnlistsrch");

	// Dynamic selection lists
	// Filters

	fview_pharmacygrnlistsrch.filterList = <?php echo $view_pharmacygrn_list->getFilterList() ?>;
	loadjs.done("fview_pharmacygrnlistsrch");
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
<?php if (!$view_pharmacygrn_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_pharmacygrn_list->TotalRecords > 0 && $view_pharmacygrn_list->ExportOptions->visible()) { ?>
<?php $view_pharmacygrn_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacygrn_list->ImportOptions->visible()) { ?>
<?php $view_pharmacygrn_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacygrn_list->SearchOptions->visible()) { ?>
<?php $view_pharmacygrn_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacygrn_list->FilterOptions->visible()) { ?>
<?php $view_pharmacygrn_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$view_pharmacygrn_list->isExport() || Config("EXPORT_MASTER_RECORD") && $view_pharmacygrn_list->isExport("print")) { ?>
<?php
if ($view_pharmacygrn_list->DbMasterFilter != "" && $view_pharmacygrn->getCurrentMasterTable() == "pharmacy_grn") {
	if ($view_pharmacygrn_list->MasterRecordExists) {
		include_once "pharmacy_grnmaster.php";
	}
}
?>
<?php } ?>
<?php
$view_pharmacygrn_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_pharmacygrn_list->isExport() && !$view_pharmacygrn->CurrentAction) { ?>
<form name="fview_pharmacygrnlistsrch" id="fview_pharmacygrnlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fview_pharmacygrnlistsrch-search-panel" class="<?php echo $view_pharmacygrn_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_pharmacygrn">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $view_pharmacygrn_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($view_pharmacygrn_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($view_pharmacygrn_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_pharmacygrn_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_pharmacygrn_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacygrn_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacygrn_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacygrn_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $view_pharmacygrn_list->showPageHeader(); ?>
<?php
$view_pharmacygrn_list->showMessage();
?>
<?php if ($view_pharmacygrn_list->TotalRecords > 0 || $view_pharmacygrn->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_pharmacygrn_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_pharmacygrn">
<?php if (!$view_pharmacygrn_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_pharmacygrn_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_pharmacygrn_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_pharmacygrn_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_pharmacygrnlist" id="fview_pharmacygrnlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_pharmacygrn">
<?php if ($view_pharmacygrn->getCurrentMasterTable() == "pharmacy_grn" && $view_pharmacygrn->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="pharmacy_grn">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($view_pharmacygrn_list->grnid->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_view_pharmacygrn" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($view_pharmacygrn_list->TotalRecords > 0 || $view_pharmacygrn_list->isGridEdit()) { ?>
<table id="tbl_view_pharmacygrnlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_pharmacygrn->RowType = ROWTYPE_HEADER;

// Render list options
$view_pharmacygrn_list->renderListOptions();

// Render list options (header, left)
$view_pharmacygrn_list->ListOptions->render("header", "left");
?>
<?php if ($view_pharmacygrn_list->PRC->Visible) { // PRC ?>
	<?php if ($view_pharmacygrn_list->SortUrl($view_pharmacygrn_list->PRC) == "") { ?>
		<th data-name="PRC" class="<?php echo $view_pharmacygrn_list->PRC->headerCellClass() ?>"><div id="elh_view_pharmacygrn_PRC" class="view_pharmacygrn_PRC"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn_list->PRC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRC" class="<?php echo $view_pharmacygrn_list->PRC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacygrn_list->SortUrl($view_pharmacygrn_list->PRC) ?>', 1);"><div id="elh_view_pharmacygrn_PRC" class="view_pharmacygrn_PRC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_list->PRC->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_list->PRC->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_list->PRC->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_list->PrName->Visible) { // PrName ?>
	<?php if ($view_pharmacygrn_list->SortUrl($view_pharmacygrn_list->PrName) == "") { ?>
		<th data-name="PrName" class="<?php echo $view_pharmacygrn_list->PrName->headerCellClass() ?>"><div id="elh_view_pharmacygrn_PrName" class="view_pharmacygrn_PrName"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn_list->PrName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrName" class="<?php echo $view_pharmacygrn_list->PrName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacygrn_list->SortUrl($view_pharmacygrn_list->PrName) ?>', 1);"><div id="elh_view_pharmacygrn_PrName" class="view_pharmacygrn_PrName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_list->PrName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_list->PrName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_list->PrName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_list->GrnQuantity->Visible) { // GrnQuantity ?>
	<?php if ($view_pharmacygrn_list->SortUrl($view_pharmacygrn_list->GrnQuantity) == "") { ?>
		<th data-name="GrnQuantity" class="<?php echo $view_pharmacygrn_list->GrnQuantity->headerCellClass() ?>"><div id="elh_view_pharmacygrn_GrnQuantity" class="view_pharmacygrn_GrnQuantity"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn_list->GrnQuantity->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GrnQuantity" class="<?php echo $view_pharmacygrn_list->GrnQuantity->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacygrn_list->SortUrl($view_pharmacygrn_list->GrnQuantity) ?>', 1);"><div id="elh_view_pharmacygrn_GrnQuantity" class="view_pharmacygrn_GrnQuantity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_list->GrnQuantity->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_list->GrnQuantity->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_list->GrnQuantity->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_list->Quantity->Visible) { // Quantity ?>
	<?php if ($view_pharmacygrn_list->SortUrl($view_pharmacygrn_list->Quantity) == "") { ?>
		<th data-name="Quantity" class="<?php echo $view_pharmacygrn_list->Quantity->headerCellClass() ?>"><div id="elh_view_pharmacygrn_Quantity" class="view_pharmacygrn_Quantity"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn_list->Quantity->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Quantity" class="<?php echo $view_pharmacygrn_list->Quantity->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacygrn_list->SortUrl($view_pharmacygrn_list->Quantity) ?>', 1);"><div id="elh_view_pharmacygrn_Quantity" class="view_pharmacygrn_Quantity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_list->Quantity->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_list->Quantity->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_list->Quantity->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_list->FreeQty->Visible) { // FreeQty ?>
	<?php if ($view_pharmacygrn_list->SortUrl($view_pharmacygrn_list->FreeQty) == "") { ?>
		<th data-name="FreeQty" class="<?php echo $view_pharmacygrn_list->FreeQty->headerCellClass() ?>"><div id="elh_view_pharmacygrn_FreeQty" class="view_pharmacygrn_FreeQty"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn_list->FreeQty->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FreeQty" class="<?php echo $view_pharmacygrn_list->FreeQty->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacygrn_list->SortUrl($view_pharmacygrn_list->FreeQty) ?>', 1);"><div id="elh_view_pharmacygrn_FreeQty" class="view_pharmacygrn_FreeQty">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_list->FreeQty->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_list->FreeQty->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_list->FreeQty->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_list->BatchNo->Visible) { // BatchNo ?>
	<?php if ($view_pharmacygrn_list->SortUrl($view_pharmacygrn_list->BatchNo) == "") { ?>
		<th data-name="BatchNo" class="<?php echo $view_pharmacygrn_list->BatchNo->headerCellClass() ?>"><div id="elh_view_pharmacygrn_BatchNo" class="view_pharmacygrn_BatchNo"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn_list->BatchNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BatchNo" class="<?php echo $view_pharmacygrn_list->BatchNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacygrn_list->SortUrl($view_pharmacygrn_list->BatchNo) ?>', 1);"><div id="elh_view_pharmacygrn_BatchNo" class="view_pharmacygrn_BatchNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_list->BatchNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_list->BatchNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_list->BatchNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_list->ExpDate->Visible) { // ExpDate ?>
	<?php if ($view_pharmacygrn_list->SortUrl($view_pharmacygrn_list->ExpDate) == "") { ?>
		<th data-name="ExpDate" class="<?php echo $view_pharmacygrn_list->ExpDate->headerCellClass() ?>"><div id="elh_view_pharmacygrn_ExpDate" class="view_pharmacygrn_ExpDate"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn_list->ExpDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ExpDate" class="<?php echo $view_pharmacygrn_list->ExpDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacygrn_list->SortUrl($view_pharmacygrn_list->ExpDate) ?>', 1);"><div id="elh_view_pharmacygrn_ExpDate" class="view_pharmacygrn_ExpDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_list->ExpDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_list->ExpDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_list->ExpDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_list->HSN->Visible) { // HSN ?>
	<?php if ($view_pharmacygrn_list->SortUrl($view_pharmacygrn_list->HSN) == "") { ?>
		<th data-name="HSN" class="<?php echo $view_pharmacygrn_list->HSN->headerCellClass() ?>"><div id="elh_view_pharmacygrn_HSN" class="view_pharmacygrn_HSN"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn_list->HSN->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HSN" class="<?php echo $view_pharmacygrn_list->HSN->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacygrn_list->SortUrl($view_pharmacygrn_list->HSN) ?>', 1);"><div id="elh_view_pharmacygrn_HSN" class="view_pharmacygrn_HSN">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_list->HSN->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_list->HSN->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_list->HSN->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_list->MFRCODE->Visible) { // MFRCODE ?>
	<?php if ($view_pharmacygrn_list->SortUrl($view_pharmacygrn_list->MFRCODE) == "") { ?>
		<th data-name="MFRCODE" class="<?php echo $view_pharmacygrn_list->MFRCODE->headerCellClass() ?>"><div id="elh_view_pharmacygrn_MFRCODE" class="view_pharmacygrn_MFRCODE"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn_list->MFRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MFRCODE" class="<?php echo $view_pharmacygrn_list->MFRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacygrn_list->SortUrl($view_pharmacygrn_list->MFRCODE) ?>', 1);"><div id="elh_view_pharmacygrn_MFRCODE" class="view_pharmacygrn_MFRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_list->MFRCODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_list->MFRCODE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_list->MFRCODE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_list->PUnit->Visible) { // PUnit ?>
	<?php if ($view_pharmacygrn_list->SortUrl($view_pharmacygrn_list->PUnit) == "") { ?>
		<th data-name="PUnit" class="<?php echo $view_pharmacygrn_list->PUnit->headerCellClass() ?>"><div id="elh_view_pharmacygrn_PUnit" class="view_pharmacygrn_PUnit"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn_list->PUnit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PUnit" class="<?php echo $view_pharmacygrn_list->PUnit->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacygrn_list->SortUrl($view_pharmacygrn_list->PUnit) ?>', 1);"><div id="elh_view_pharmacygrn_PUnit" class="view_pharmacygrn_PUnit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_list->PUnit->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_list->PUnit->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_list->PUnit->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_list->SUnit->Visible) { // SUnit ?>
	<?php if ($view_pharmacygrn_list->SortUrl($view_pharmacygrn_list->SUnit) == "") { ?>
		<th data-name="SUnit" class="<?php echo $view_pharmacygrn_list->SUnit->headerCellClass() ?>"><div id="elh_view_pharmacygrn_SUnit" class="view_pharmacygrn_SUnit"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn_list->SUnit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SUnit" class="<?php echo $view_pharmacygrn_list->SUnit->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacygrn_list->SortUrl($view_pharmacygrn_list->SUnit) ?>', 1);"><div id="elh_view_pharmacygrn_SUnit" class="view_pharmacygrn_SUnit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_list->SUnit->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_list->SUnit->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_list->SUnit->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_list->MRP->Visible) { // MRP ?>
	<?php if ($view_pharmacygrn_list->SortUrl($view_pharmacygrn_list->MRP) == "") { ?>
		<th data-name="MRP" class="<?php echo $view_pharmacygrn_list->MRP->headerCellClass() ?>"><div id="elh_view_pharmacygrn_MRP" class="view_pharmacygrn_MRP"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn_list->MRP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MRP" class="<?php echo $view_pharmacygrn_list->MRP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacygrn_list->SortUrl($view_pharmacygrn_list->MRP) ?>', 1);"><div id="elh_view_pharmacygrn_MRP" class="view_pharmacygrn_MRP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_list->MRP->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_list->MRP->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_list->MRP->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_list->PurValue->Visible) { // PurValue ?>
	<?php if ($view_pharmacygrn_list->SortUrl($view_pharmacygrn_list->PurValue) == "") { ?>
		<th data-name="PurValue" class="<?php echo $view_pharmacygrn_list->PurValue->headerCellClass() ?>"><div id="elh_view_pharmacygrn_PurValue" class="view_pharmacygrn_PurValue"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn_list->PurValue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PurValue" class="<?php echo $view_pharmacygrn_list->PurValue->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacygrn_list->SortUrl($view_pharmacygrn_list->PurValue) ?>', 1);"><div id="elh_view_pharmacygrn_PurValue" class="view_pharmacygrn_PurValue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_list->PurValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_list->PurValue->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_list->PurValue->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_list->Disc->Visible) { // Disc ?>
	<?php if ($view_pharmacygrn_list->SortUrl($view_pharmacygrn_list->Disc) == "") { ?>
		<th data-name="Disc" class="<?php echo $view_pharmacygrn_list->Disc->headerCellClass() ?>"><div id="elh_view_pharmacygrn_Disc" class="view_pharmacygrn_Disc"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn_list->Disc->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Disc" class="<?php echo $view_pharmacygrn_list->Disc->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacygrn_list->SortUrl($view_pharmacygrn_list->Disc) ?>', 1);"><div id="elh_view_pharmacygrn_Disc" class="view_pharmacygrn_Disc">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_list->Disc->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_list->Disc->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_list->Disc->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_list->PSGST->Visible) { // PSGST ?>
	<?php if ($view_pharmacygrn_list->SortUrl($view_pharmacygrn_list->PSGST) == "") { ?>
		<th data-name="PSGST" class="<?php echo $view_pharmacygrn_list->PSGST->headerCellClass() ?>"><div id="elh_view_pharmacygrn_PSGST" class="view_pharmacygrn_PSGST"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn_list->PSGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PSGST" class="<?php echo $view_pharmacygrn_list->PSGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacygrn_list->SortUrl($view_pharmacygrn_list->PSGST) ?>', 1);"><div id="elh_view_pharmacygrn_PSGST" class="view_pharmacygrn_PSGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_list->PSGST->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_list->PSGST->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_list->PSGST->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_list->PCGST->Visible) { // PCGST ?>
	<?php if ($view_pharmacygrn_list->SortUrl($view_pharmacygrn_list->PCGST) == "") { ?>
		<th data-name="PCGST" class="<?php echo $view_pharmacygrn_list->PCGST->headerCellClass() ?>"><div id="elh_view_pharmacygrn_PCGST" class="view_pharmacygrn_PCGST"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn_list->PCGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PCGST" class="<?php echo $view_pharmacygrn_list->PCGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacygrn_list->SortUrl($view_pharmacygrn_list->PCGST) ?>', 1);"><div id="elh_view_pharmacygrn_PCGST" class="view_pharmacygrn_PCGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_list->PCGST->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_list->PCGST->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_list->PCGST->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_list->PTax->Visible) { // PTax ?>
	<?php if ($view_pharmacygrn_list->SortUrl($view_pharmacygrn_list->PTax) == "") { ?>
		<th data-name="PTax" class="<?php echo $view_pharmacygrn_list->PTax->headerCellClass() ?>"><div id="elh_view_pharmacygrn_PTax" class="view_pharmacygrn_PTax"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn_list->PTax->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PTax" class="<?php echo $view_pharmacygrn_list->PTax->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacygrn_list->SortUrl($view_pharmacygrn_list->PTax) ?>', 1);"><div id="elh_view_pharmacygrn_PTax" class="view_pharmacygrn_PTax">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_list->PTax->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_list->PTax->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_list->PTax->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_list->ItemValue->Visible) { // ItemValue ?>
	<?php if ($view_pharmacygrn_list->SortUrl($view_pharmacygrn_list->ItemValue) == "") { ?>
		<th data-name="ItemValue" class="<?php echo $view_pharmacygrn_list->ItemValue->headerCellClass() ?>"><div id="elh_view_pharmacygrn_ItemValue" class="view_pharmacygrn_ItemValue"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn_list->ItemValue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ItemValue" class="<?php echo $view_pharmacygrn_list->ItemValue->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacygrn_list->SortUrl($view_pharmacygrn_list->ItemValue) ?>', 1);"><div id="elh_view_pharmacygrn_ItemValue" class="view_pharmacygrn_ItemValue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_list->ItemValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_list->ItemValue->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_list->ItemValue->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_list->SalTax->Visible) { // SalTax ?>
	<?php if ($view_pharmacygrn_list->SortUrl($view_pharmacygrn_list->SalTax) == "") { ?>
		<th data-name="SalTax" class="<?php echo $view_pharmacygrn_list->SalTax->headerCellClass() ?>"><div id="elh_view_pharmacygrn_SalTax" class="view_pharmacygrn_SalTax"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn_list->SalTax->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SalTax" class="<?php echo $view_pharmacygrn_list->SalTax->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacygrn_list->SortUrl($view_pharmacygrn_list->SalTax) ?>', 1);"><div id="elh_view_pharmacygrn_SalTax" class="view_pharmacygrn_SalTax">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_list->SalTax->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_list->SalTax->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_list->SalTax->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_list->SalRate->Visible) { // SalRate ?>
	<?php if ($view_pharmacygrn_list->SortUrl($view_pharmacygrn_list->SalRate) == "") { ?>
		<th data-name="SalRate" class="<?php echo $view_pharmacygrn_list->SalRate->headerCellClass() ?>"><div id="elh_view_pharmacygrn_SalRate" class="view_pharmacygrn_SalRate"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn_list->SalRate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SalRate" class="<?php echo $view_pharmacygrn_list->SalRate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacygrn_list->SortUrl($view_pharmacygrn_list->SalRate) ?>', 1);"><div id="elh_view_pharmacygrn_SalRate" class="view_pharmacygrn_SalRate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_list->SalRate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_list->SalRate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_list->SalRate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_list->SSGST->Visible) { // SSGST ?>
	<?php if ($view_pharmacygrn_list->SortUrl($view_pharmacygrn_list->SSGST) == "") { ?>
		<th data-name="SSGST" class="<?php echo $view_pharmacygrn_list->SSGST->headerCellClass() ?>"><div id="elh_view_pharmacygrn_SSGST" class="view_pharmacygrn_SSGST"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn_list->SSGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SSGST" class="<?php echo $view_pharmacygrn_list->SSGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacygrn_list->SortUrl($view_pharmacygrn_list->SSGST) ?>', 1);"><div id="elh_view_pharmacygrn_SSGST" class="view_pharmacygrn_SSGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_list->SSGST->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_list->SSGST->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_list->SSGST->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_list->SCGST->Visible) { // SCGST ?>
	<?php if ($view_pharmacygrn_list->SortUrl($view_pharmacygrn_list->SCGST) == "") { ?>
		<th data-name="SCGST" class="<?php echo $view_pharmacygrn_list->SCGST->headerCellClass() ?>"><div id="elh_view_pharmacygrn_SCGST" class="view_pharmacygrn_SCGST"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn_list->SCGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SCGST" class="<?php echo $view_pharmacygrn_list->SCGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacygrn_list->SortUrl($view_pharmacygrn_list->SCGST) ?>', 1);"><div id="elh_view_pharmacygrn_SCGST" class="view_pharmacygrn_SCGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_list->SCGST->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_list->SCGST->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_list->SCGST->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_list->BRCODE->Visible) { // BRCODE ?>
	<?php if ($view_pharmacygrn_list->SortUrl($view_pharmacygrn_list->BRCODE) == "") { ?>
		<th data-name="BRCODE" class="<?php echo $view_pharmacygrn_list->BRCODE->headerCellClass() ?>"><div id="elh_view_pharmacygrn_BRCODE" class="view_pharmacygrn_BRCODE"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn_list->BRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BRCODE" class="<?php echo $view_pharmacygrn_list->BRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacygrn_list->SortUrl($view_pharmacygrn_list->BRCODE) ?>', 1);"><div id="elh_view_pharmacygrn_BRCODE" class="view_pharmacygrn_BRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_list->BRCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_list->BRCODE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_list->BRCODE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_list->HospID->Visible) { // HospID ?>
	<?php if ($view_pharmacygrn_list->SortUrl($view_pharmacygrn_list->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_pharmacygrn_list->HospID->headerCellClass() ?>"><div id="elh_view_pharmacygrn_HospID" class="view_pharmacygrn_HospID"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn_list->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_pharmacygrn_list->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacygrn_list->SortUrl($view_pharmacygrn_list->HospID) ?>', 1);"><div id="elh_view_pharmacygrn_HospID" class="view_pharmacygrn_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_list->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_list->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_list->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_list->grncreatedby->Visible) { // grncreatedby ?>
	<?php if ($view_pharmacygrn_list->SortUrl($view_pharmacygrn_list->grncreatedby) == "") { ?>
		<th data-name="grncreatedby" class="<?php echo $view_pharmacygrn_list->grncreatedby->headerCellClass() ?>"><div id="elh_view_pharmacygrn_grncreatedby" class="view_pharmacygrn_grncreatedby"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn_list->grncreatedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="grncreatedby" class="<?php echo $view_pharmacygrn_list->grncreatedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacygrn_list->SortUrl($view_pharmacygrn_list->grncreatedby) ?>', 1);"><div id="elh_view_pharmacygrn_grncreatedby" class="view_pharmacygrn_grncreatedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_list->grncreatedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_list->grncreatedby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_list->grncreatedby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_list->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
	<?php if ($view_pharmacygrn_list->SortUrl($view_pharmacygrn_list->grncreatedDateTime) == "") { ?>
		<th data-name="grncreatedDateTime" class="<?php echo $view_pharmacygrn_list->grncreatedDateTime->headerCellClass() ?>"><div id="elh_view_pharmacygrn_grncreatedDateTime" class="view_pharmacygrn_grncreatedDateTime"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn_list->grncreatedDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="grncreatedDateTime" class="<?php echo $view_pharmacygrn_list->grncreatedDateTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacygrn_list->SortUrl($view_pharmacygrn_list->grncreatedDateTime) ?>', 1);"><div id="elh_view_pharmacygrn_grncreatedDateTime" class="view_pharmacygrn_grncreatedDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_list->grncreatedDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_list->grncreatedDateTime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_list->grncreatedDateTime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_list->grnModifiedby->Visible) { // grnModifiedby ?>
	<?php if ($view_pharmacygrn_list->SortUrl($view_pharmacygrn_list->grnModifiedby) == "") { ?>
		<th data-name="grnModifiedby" class="<?php echo $view_pharmacygrn_list->grnModifiedby->headerCellClass() ?>"><div id="elh_view_pharmacygrn_grnModifiedby" class="view_pharmacygrn_grnModifiedby"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn_list->grnModifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="grnModifiedby" class="<?php echo $view_pharmacygrn_list->grnModifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacygrn_list->SortUrl($view_pharmacygrn_list->grnModifiedby) ?>', 1);"><div id="elh_view_pharmacygrn_grnModifiedby" class="view_pharmacygrn_grnModifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_list->grnModifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_list->grnModifiedby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_list->grnModifiedby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_list->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
	<?php if ($view_pharmacygrn_list->SortUrl($view_pharmacygrn_list->grnModifiedDateTime) == "") { ?>
		<th data-name="grnModifiedDateTime" class="<?php echo $view_pharmacygrn_list->grnModifiedDateTime->headerCellClass() ?>"><div id="elh_view_pharmacygrn_grnModifiedDateTime" class="view_pharmacygrn_grnModifiedDateTime"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn_list->grnModifiedDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="grnModifiedDateTime" class="<?php echo $view_pharmacygrn_list->grnModifiedDateTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacygrn_list->SortUrl($view_pharmacygrn_list->grnModifiedDateTime) ?>', 1);"><div id="elh_view_pharmacygrn_grnModifiedDateTime" class="view_pharmacygrn_grnModifiedDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_list->grnModifiedDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_list->grnModifiedDateTime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_list->grnModifiedDateTime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_list->BillDate->Visible) { // BillDate ?>
	<?php if ($view_pharmacygrn_list->SortUrl($view_pharmacygrn_list->BillDate) == "") { ?>
		<th data-name="BillDate" class="<?php echo $view_pharmacygrn_list->BillDate->headerCellClass() ?>"><div id="elh_view_pharmacygrn_BillDate" class="view_pharmacygrn_BillDate"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn_list->BillDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillDate" class="<?php echo $view_pharmacygrn_list->BillDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacygrn_list->SortUrl($view_pharmacygrn_list->BillDate) ?>', 1);"><div id="elh_view_pharmacygrn_BillDate" class="view_pharmacygrn_BillDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_list->BillDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_list->BillDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_list->BillDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_pharmacygrn_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_pharmacygrn_list->ExportAll && $view_pharmacygrn_list->isExport()) {
	$view_pharmacygrn_list->StopRecord = $view_pharmacygrn_list->TotalRecords;
} else {

	// Set the last record to display
	if ($view_pharmacygrn_list->TotalRecords > $view_pharmacygrn_list->StartRecord + $view_pharmacygrn_list->DisplayRecords - 1)
		$view_pharmacygrn_list->StopRecord = $view_pharmacygrn_list->StartRecord + $view_pharmacygrn_list->DisplayRecords - 1;
	else
		$view_pharmacygrn_list->StopRecord = $view_pharmacygrn_list->TotalRecords;
}
$view_pharmacygrn_list->RecordCount = $view_pharmacygrn_list->StartRecord - 1;
if ($view_pharmacygrn_list->Recordset && !$view_pharmacygrn_list->Recordset->EOF) {
	$view_pharmacygrn_list->Recordset->moveFirst();
	$selectLimit = $view_pharmacygrn_list->UseSelectLimit;
	if (!$selectLimit && $view_pharmacygrn_list->StartRecord > 1)
		$view_pharmacygrn_list->Recordset->move($view_pharmacygrn_list->StartRecord - 1);
} elseif (!$view_pharmacygrn->AllowAddDeleteRow && $view_pharmacygrn_list->StopRecord == 0) {
	$view_pharmacygrn_list->StopRecord = $view_pharmacygrn->GridAddRowCount;
}

// Initialize aggregate
$view_pharmacygrn->RowType = ROWTYPE_AGGREGATEINIT;
$view_pharmacygrn->resetAttributes();
$view_pharmacygrn_list->renderRow();
while ($view_pharmacygrn_list->RecordCount < $view_pharmacygrn_list->StopRecord) {
	$view_pharmacygrn_list->RecordCount++;
	if ($view_pharmacygrn_list->RecordCount >= $view_pharmacygrn_list->StartRecord) {
		$view_pharmacygrn_list->RowCount++;

		// Set up key count
		$view_pharmacygrn_list->KeyCount = $view_pharmacygrn_list->RowIndex;

		// Init row class and style
		$view_pharmacygrn->resetAttributes();
		$view_pharmacygrn->CssClass = "";
		if ($view_pharmacygrn_list->isGridAdd()) {
		} else {
			$view_pharmacygrn_list->loadRowValues($view_pharmacygrn_list->Recordset); // Load row values
		}
		$view_pharmacygrn->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_pharmacygrn->RowAttrs->merge(["data-rowindex" => $view_pharmacygrn_list->RowCount, "id" => "r" . $view_pharmacygrn_list->RowCount . "_view_pharmacygrn", "data-rowtype" => $view_pharmacygrn->RowType]);

		// Render row
		$view_pharmacygrn_list->renderRow();

		// Render list options
		$view_pharmacygrn_list->renderListOptions();
?>
	<tr <?php echo $view_pharmacygrn->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_pharmacygrn_list->ListOptions->render("body", "left", $view_pharmacygrn_list->RowCount);
?>
	<?php if ($view_pharmacygrn_list->PRC->Visible) { // PRC ?>
		<td data-name="PRC" <?php echo $view_pharmacygrn_list->PRC->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacygrn_list->RowCount ?>_view_pharmacygrn_PRC">
<span<?php echo $view_pharmacygrn_list->PRC->viewAttributes() ?>><?php echo $view_pharmacygrn_list->PRC->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_list->PrName->Visible) { // PrName ?>
		<td data-name="PrName" <?php echo $view_pharmacygrn_list->PrName->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacygrn_list->RowCount ?>_view_pharmacygrn_PrName">
<span<?php echo $view_pharmacygrn_list->PrName->viewAttributes() ?>><?php echo $view_pharmacygrn_list->PrName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_list->GrnQuantity->Visible) { // GrnQuantity ?>
		<td data-name="GrnQuantity" <?php echo $view_pharmacygrn_list->GrnQuantity->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacygrn_list->RowCount ?>_view_pharmacygrn_GrnQuantity">
<span<?php echo $view_pharmacygrn_list->GrnQuantity->viewAttributes() ?>><?php echo $view_pharmacygrn_list->GrnQuantity->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_list->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity" <?php echo $view_pharmacygrn_list->Quantity->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacygrn_list->RowCount ?>_view_pharmacygrn_Quantity">
<span<?php echo $view_pharmacygrn_list->Quantity->viewAttributes() ?>><?php echo $view_pharmacygrn_list->Quantity->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_list->FreeQty->Visible) { // FreeQty ?>
		<td data-name="FreeQty" <?php echo $view_pharmacygrn_list->FreeQty->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacygrn_list->RowCount ?>_view_pharmacygrn_FreeQty">
<span<?php echo $view_pharmacygrn_list->FreeQty->viewAttributes() ?>><?php echo $view_pharmacygrn_list->FreeQty->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_list->BatchNo->Visible) { // BatchNo ?>
		<td data-name="BatchNo" <?php echo $view_pharmacygrn_list->BatchNo->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacygrn_list->RowCount ?>_view_pharmacygrn_BatchNo">
<span<?php echo $view_pharmacygrn_list->BatchNo->viewAttributes() ?>><?php echo $view_pharmacygrn_list->BatchNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_list->ExpDate->Visible) { // ExpDate ?>
		<td data-name="ExpDate" <?php echo $view_pharmacygrn_list->ExpDate->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacygrn_list->RowCount ?>_view_pharmacygrn_ExpDate">
<span<?php echo $view_pharmacygrn_list->ExpDate->viewAttributes() ?>><?php echo $view_pharmacygrn_list->ExpDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_list->HSN->Visible) { // HSN ?>
		<td data-name="HSN" <?php echo $view_pharmacygrn_list->HSN->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacygrn_list->RowCount ?>_view_pharmacygrn_HSN">
<span<?php echo $view_pharmacygrn_list->HSN->viewAttributes() ?>><?php echo $view_pharmacygrn_list->HSN->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_list->MFRCODE->Visible) { // MFRCODE ?>
		<td data-name="MFRCODE" <?php echo $view_pharmacygrn_list->MFRCODE->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacygrn_list->RowCount ?>_view_pharmacygrn_MFRCODE">
<span<?php echo $view_pharmacygrn_list->MFRCODE->viewAttributes() ?>><?php echo $view_pharmacygrn_list->MFRCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_list->PUnit->Visible) { // PUnit ?>
		<td data-name="PUnit" <?php echo $view_pharmacygrn_list->PUnit->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacygrn_list->RowCount ?>_view_pharmacygrn_PUnit">
<span<?php echo $view_pharmacygrn_list->PUnit->viewAttributes() ?>><?php echo $view_pharmacygrn_list->PUnit->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_list->SUnit->Visible) { // SUnit ?>
		<td data-name="SUnit" <?php echo $view_pharmacygrn_list->SUnit->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacygrn_list->RowCount ?>_view_pharmacygrn_SUnit">
<span<?php echo $view_pharmacygrn_list->SUnit->viewAttributes() ?>><?php echo $view_pharmacygrn_list->SUnit->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_list->MRP->Visible) { // MRP ?>
		<td data-name="MRP" <?php echo $view_pharmacygrn_list->MRP->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacygrn_list->RowCount ?>_view_pharmacygrn_MRP">
<span<?php echo $view_pharmacygrn_list->MRP->viewAttributes() ?>><?php echo $view_pharmacygrn_list->MRP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_list->PurValue->Visible) { // PurValue ?>
		<td data-name="PurValue" <?php echo $view_pharmacygrn_list->PurValue->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacygrn_list->RowCount ?>_view_pharmacygrn_PurValue">
<span<?php echo $view_pharmacygrn_list->PurValue->viewAttributes() ?>><?php echo $view_pharmacygrn_list->PurValue->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_list->Disc->Visible) { // Disc ?>
		<td data-name="Disc" <?php echo $view_pharmacygrn_list->Disc->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacygrn_list->RowCount ?>_view_pharmacygrn_Disc">
<span<?php echo $view_pharmacygrn_list->Disc->viewAttributes() ?>><?php echo $view_pharmacygrn_list->Disc->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_list->PSGST->Visible) { // PSGST ?>
		<td data-name="PSGST" <?php echo $view_pharmacygrn_list->PSGST->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacygrn_list->RowCount ?>_view_pharmacygrn_PSGST">
<span<?php echo $view_pharmacygrn_list->PSGST->viewAttributes() ?>><?php echo $view_pharmacygrn_list->PSGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_list->PCGST->Visible) { // PCGST ?>
		<td data-name="PCGST" <?php echo $view_pharmacygrn_list->PCGST->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacygrn_list->RowCount ?>_view_pharmacygrn_PCGST">
<span<?php echo $view_pharmacygrn_list->PCGST->viewAttributes() ?>><?php echo $view_pharmacygrn_list->PCGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_list->PTax->Visible) { // PTax ?>
		<td data-name="PTax" <?php echo $view_pharmacygrn_list->PTax->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacygrn_list->RowCount ?>_view_pharmacygrn_PTax">
<span<?php echo $view_pharmacygrn_list->PTax->viewAttributes() ?>><?php echo $view_pharmacygrn_list->PTax->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_list->ItemValue->Visible) { // ItemValue ?>
		<td data-name="ItemValue" <?php echo $view_pharmacygrn_list->ItemValue->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacygrn_list->RowCount ?>_view_pharmacygrn_ItemValue">
<span<?php echo $view_pharmacygrn_list->ItemValue->viewAttributes() ?>><?php echo $view_pharmacygrn_list->ItemValue->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_list->SalTax->Visible) { // SalTax ?>
		<td data-name="SalTax" <?php echo $view_pharmacygrn_list->SalTax->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacygrn_list->RowCount ?>_view_pharmacygrn_SalTax">
<span<?php echo $view_pharmacygrn_list->SalTax->viewAttributes() ?>><?php echo $view_pharmacygrn_list->SalTax->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_list->SalRate->Visible) { // SalRate ?>
		<td data-name="SalRate" <?php echo $view_pharmacygrn_list->SalRate->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacygrn_list->RowCount ?>_view_pharmacygrn_SalRate">
<span<?php echo $view_pharmacygrn_list->SalRate->viewAttributes() ?>><?php echo $view_pharmacygrn_list->SalRate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_list->SSGST->Visible) { // SSGST ?>
		<td data-name="SSGST" <?php echo $view_pharmacygrn_list->SSGST->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacygrn_list->RowCount ?>_view_pharmacygrn_SSGST">
<span<?php echo $view_pharmacygrn_list->SSGST->viewAttributes() ?>><?php echo $view_pharmacygrn_list->SSGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_list->SCGST->Visible) { // SCGST ?>
		<td data-name="SCGST" <?php echo $view_pharmacygrn_list->SCGST->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacygrn_list->RowCount ?>_view_pharmacygrn_SCGST">
<span<?php echo $view_pharmacygrn_list->SCGST->viewAttributes() ?>><?php echo $view_pharmacygrn_list->SCGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_list->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE" <?php echo $view_pharmacygrn_list->BRCODE->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacygrn_list->RowCount ?>_view_pharmacygrn_BRCODE">
<span<?php echo $view_pharmacygrn_list->BRCODE->viewAttributes() ?>><?php echo $view_pharmacygrn_list->BRCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $view_pharmacygrn_list->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacygrn_list->RowCount ?>_view_pharmacygrn_HospID">
<span<?php echo $view_pharmacygrn_list->HospID->viewAttributes() ?>><?php echo $view_pharmacygrn_list->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_list->grncreatedby->Visible) { // grncreatedby ?>
		<td data-name="grncreatedby" <?php echo $view_pharmacygrn_list->grncreatedby->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacygrn_list->RowCount ?>_view_pharmacygrn_grncreatedby">
<span<?php echo $view_pharmacygrn_list->grncreatedby->viewAttributes() ?>><?php echo $view_pharmacygrn_list->grncreatedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_list->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
		<td data-name="grncreatedDateTime" <?php echo $view_pharmacygrn_list->grncreatedDateTime->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacygrn_list->RowCount ?>_view_pharmacygrn_grncreatedDateTime">
<span<?php echo $view_pharmacygrn_list->grncreatedDateTime->viewAttributes() ?>><?php echo $view_pharmacygrn_list->grncreatedDateTime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_list->grnModifiedby->Visible) { // grnModifiedby ?>
		<td data-name="grnModifiedby" <?php echo $view_pharmacygrn_list->grnModifiedby->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacygrn_list->RowCount ?>_view_pharmacygrn_grnModifiedby">
<span<?php echo $view_pharmacygrn_list->grnModifiedby->viewAttributes() ?>><?php echo $view_pharmacygrn_list->grnModifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_list->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
		<td data-name="grnModifiedDateTime" <?php echo $view_pharmacygrn_list->grnModifiedDateTime->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacygrn_list->RowCount ?>_view_pharmacygrn_grnModifiedDateTime">
<span<?php echo $view_pharmacygrn_list->grnModifiedDateTime->viewAttributes() ?>><?php echo $view_pharmacygrn_list->grnModifiedDateTime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_list->BillDate->Visible) { // BillDate ?>
		<td data-name="BillDate" <?php echo $view_pharmacygrn_list->BillDate->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacygrn_list->RowCount ?>_view_pharmacygrn_BillDate">
<span<?php echo $view_pharmacygrn_list->BillDate->viewAttributes() ?>><?php echo $view_pharmacygrn_list->BillDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_pharmacygrn_list->ListOptions->render("body", "right", $view_pharmacygrn_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$view_pharmacygrn_list->isGridAdd())
		$view_pharmacygrn_list->Recordset->moveNext();
}
?>
</tbody>
<?php

// Render aggregate row
$view_pharmacygrn->RowType = ROWTYPE_AGGREGATE;
$view_pharmacygrn->resetAttributes();
$view_pharmacygrn_list->renderRow();
?>
<?php if ($view_pharmacygrn_list->TotalRecords > 0 && !$view_pharmacygrn_list->isGridAdd() && !$view_pharmacygrn_list->isGridEdit()) { ?>
<tfoot><!-- Table footer -->
	<tr class="ew-table-footer">
<?php

// Render list options
$view_pharmacygrn_list->renderListOptions();

// Render list options (footer, left)
$view_pharmacygrn_list->ListOptions->render("footer", "left");
?>
	<?php if ($view_pharmacygrn_list->PRC->Visible) { // PRC ?>
		<td data-name="PRC" class="<?php echo $view_pharmacygrn_list->PRC->footerCellClass() ?>"><span id="elf_view_pharmacygrn_PRC" class="view_pharmacygrn_PRC">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn_list->PrName->Visible) { // PrName ?>
		<td data-name="PrName" class="<?php echo $view_pharmacygrn_list->PrName->footerCellClass() ?>"><span id="elf_view_pharmacygrn_PrName" class="view_pharmacygrn_PrName">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn_list->GrnQuantity->Visible) { // GrnQuantity ?>
		<td data-name="GrnQuantity" class="<?php echo $view_pharmacygrn_list->GrnQuantity->footerCellClass() ?>"><span id="elf_view_pharmacygrn_GrnQuantity" class="view_pharmacygrn_GrnQuantity">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn_list->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity" class="<?php echo $view_pharmacygrn_list->Quantity->footerCellClass() ?>"><span id="elf_view_pharmacygrn_Quantity" class="view_pharmacygrn_Quantity">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn_list->FreeQty->Visible) { // FreeQty ?>
		<td data-name="FreeQty" class="<?php echo $view_pharmacygrn_list->FreeQty->footerCellClass() ?>"><span id="elf_view_pharmacygrn_FreeQty" class="view_pharmacygrn_FreeQty">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn_list->BatchNo->Visible) { // BatchNo ?>
		<td data-name="BatchNo" class="<?php echo $view_pharmacygrn_list->BatchNo->footerCellClass() ?>"><span id="elf_view_pharmacygrn_BatchNo" class="view_pharmacygrn_BatchNo">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn_list->ExpDate->Visible) { // ExpDate ?>
		<td data-name="ExpDate" class="<?php echo $view_pharmacygrn_list->ExpDate->footerCellClass() ?>"><span id="elf_view_pharmacygrn_ExpDate" class="view_pharmacygrn_ExpDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn_list->HSN->Visible) { // HSN ?>
		<td data-name="HSN" class="<?php echo $view_pharmacygrn_list->HSN->footerCellClass() ?>"><span id="elf_view_pharmacygrn_HSN" class="view_pharmacygrn_HSN">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn_list->MFRCODE->Visible) { // MFRCODE ?>
		<td data-name="MFRCODE" class="<?php echo $view_pharmacygrn_list->MFRCODE->footerCellClass() ?>"><span id="elf_view_pharmacygrn_MFRCODE" class="view_pharmacygrn_MFRCODE">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn_list->PUnit->Visible) { // PUnit ?>
		<td data-name="PUnit" class="<?php echo $view_pharmacygrn_list->PUnit->footerCellClass() ?>"><span id="elf_view_pharmacygrn_PUnit" class="view_pharmacygrn_PUnit">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn_list->SUnit->Visible) { // SUnit ?>
		<td data-name="SUnit" class="<?php echo $view_pharmacygrn_list->SUnit->footerCellClass() ?>"><span id="elf_view_pharmacygrn_SUnit" class="view_pharmacygrn_SUnit">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn_list->MRP->Visible) { // MRP ?>
		<td data-name="MRP" class="<?php echo $view_pharmacygrn_list->MRP->footerCellClass() ?>"><span id="elf_view_pharmacygrn_MRP" class="view_pharmacygrn_MRP">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn_list->PurValue->Visible) { // PurValue ?>
		<td data-name="PurValue" class="<?php echo $view_pharmacygrn_list->PurValue->footerCellClass() ?>"><span id="elf_view_pharmacygrn_PurValue" class="view_pharmacygrn_PurValue">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn_list->Disc->Visible) { // Disc ?>
		<td data-name="Disc" class="<?php echo $view_pharmacygrn_list->Disc->footerCellClass() ?>"><span id="elf_view_pharmacygrn_Disc" class="view_pharmacygrn_Disc">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn_list->PSGST->Visible) { // PSGST ?>
		<td data-name="PSGST" class="<?php echo $view_pharmacygrn_list->PSGST->footerCellClass() ?>"><span id="elf_view_pharmacygrn_PSGST" class="view_pharmacygrn_PSGST">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn_list->PCGST->Visible) { // PCGST ?>
		<td data-name="PCGST" class="<?php echo $view_pharmacygrn_list->PCGST->footerCellClass() ?>"><span id="elf_view_pharmacygrn_PCGST" class="view_pharmacygrn_PCGST">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn_list->PTax->Visible) { // PTax ?>
		<td data-name="PTax" class="<?php echo $view_pharmacygrn_list->PTax->footerCellClass() ?>"><span id="elf_view_pharmacygrn_PTax" class="view_pharmacygrn_PTax">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_pharmacygrn_list->PTax->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn_list->ItemValue->Visible) { // ItemValue ?>
		<td data-name="ItemValue" class="<?php echo $view_pharmacygrn_list->ItemValue->footerCellClass() ?>"><span id="elf_view_pharmacygrn_ItemValue" class="view_pharmacygrn_ItemValue">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_pharmacygrn_list->ItemValue->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn_list->SalTax->Visible) { // SalTax ?>
		<td data-name="SalTax" class="<?php echo $view_pharmacygrn_list->SalTax->footerCellClass() ?>"><span id="elf_view_pharmacygrn_SalTax" class="view_pharmacygrn_SalTax">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_pharmacygrn_list->SalTax->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn_list->SalRate->Visible) { // SalRate ?>
		<td data-name="SalRate" class="<?php echo $view_pharmacygrn_list->SalRate->footerCellClass() ?>"><span id="elf_view_pharmacygrn_SalRate" class="view_pharmacygrn_SalRate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn_list->SSGST->Visible) { // SSGST ?>
		<td data-name="SSGST" class="<?php echo $view_pharmacygrn_list->SSGST->footerCellClass() ?>"><span id="elf_view_pharmacygrn_SSGST" class="view_pharmacygrn_SSGST">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn_list->SCGST->Visible) { // SCGST ?>
		<td data-name="SCGST" class="<?php echo $view_pharmacygrn_list->SCGST->footerCellClass() ?>"><span id="elf_view_pharmacygrn_SCGST" class="view_pharmacygrn_SCGST">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn_list->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE" class="<?php echo $view_pharmacygrn_list->BRCODE->footerCellClass() ?>"><span id="elf_view_pharmacygrn_BRCODE" class="view_pharmacygrn_BRCODE">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" class="<?php echo $view_pharmacygrn_list->HospID->footerCellClass() ?>"><span id="elf_view_pharmacygrn_HospID" class="view_pharmacygrn_HospID">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn_list->grncreatedby->Visible) { // grncreatedby ?>
		<td data-name="grncreatedby" class="<?php echo $view_pharmacygrn_list->grncreatedby->footerCellClass() ?>"><span id="elf_view_pharmacygrn_grncreatedby" class="view_pharmacygrn_grncreatedby">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn_list->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
		<td data-name="grncreatedDateTime" class="<?php echo $view_pharmacygrn_list->grncreatedDateTime->footerCellClass() ?>"><span id="elf_view_pharmacygrn_grncreatedDateTime" class="view_pharmacygrn_grncreatedDateTime">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn_list->grnModifiedby->Visible) { // grnModifiedby ?>
		<td data-name="grnModifiedby" class="<?php echo $view_pharmacygrn_list->grnModifiedby->footerCellClass() ?>"><span id="elf_view_pharmacygrn_grnModifiedby" class="view_pharmacygrn_grnModifiedby">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn_list->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
		<td data-name="grnModifiedDateTime" class="<?php echo $view_pharmacygrn_list->grnModifiedDateTime->footerCellClass() ?>"><span id="elf_view_pharmacygrn_grnModifiedDateTime" class="view_pharmacygrn_grnModifiedDateTime">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn_list->BillDate->Visible) { // BillDate ?>
		<td data-name="BillDate" class="<?php echo $view_pharmacygrn_list->BillDate->footerCellClass() ?>"><span id="elf_view_pharmacygrn_BillDate" class="view_pharmacygrn_BillDate">
		&nbsp;
		</span></td>
	<?php } ?>
<?php

// Render list options (footer, right)
$view_pharmacygrn_list->ListOptions->render("footer", "right");
?>
	</tr>
</tfoot>
<?php } ?>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$view_pharmacygrn->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_pharmacygrn_list->Recordset)
	$view_pharmacygrn_list->Recordset->Close();
?>
<?php if (!$view_pharmacygrn_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_pharmacygrn_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_pharmacygrn_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_pharmacygrn_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_pharmacygrn_list->TotalRecords == 0 && !$view_pharmacygrn->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_pharmacygrn_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_pharmacygrn_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_pharmacygrn_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	$("[data-name='Quantity']").hide();
});
</script>
<?php if (!$view_pharmacygrn->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_view_pharmacygrn",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$view_pharmacygrn_list->terminate();
?>
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
$view_labreport_print_list = new view_labreport_print_list();

// Run the page
$view_labreport_print_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_labreport_print_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$view_labreport_print_list->isExport()) { ?>
<script>
var fview_labreport_printlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fview_labreport_printlist = currentForm = new ew.Form("fview_labreport_printlist", "list");
	fview_labreport_printlist.formKeyCountName = '<?php echo $view_labreport_print_list->FormKeyCountName ?>';
	loadjs.done("fview_labreport_printlist");
});
var fview_labreport_printlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fview_labreport_printlistsrch = currentSearchForm = new ew.Form("fview_labreport_printlistsrch");

	// Dynamic selection lists
	// Filters

	fview_labreport_printlistsrch.filterList = <?php echo $view_labreport_print_list->getFilterList() ?>;
	loadjs.done("fview_labreport_printlistsrch");
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
<?php if (!$view_labreport_print_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_labreport_print_list->TotalRecords > 0 && $view_labreport_print_list->ExportOptions->visible()) { ?>
<?php $view_labreport_print_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_labreport_print_list->ImportOptions->visible()) { ?>
<?php $view_labreport_print_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_labreport_print_list->SearchOptions->visible()) { ?>
<?php $view_labreport_print_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_labreport_print_list->FilterOptions->visible()) { ?>
<?php $view_labreport_print_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_labreport_print_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_labreport_print_list->isExport() && !$view_labreport_print->CurrentAction) { ?>
<form name="fview_labreport_printlistsrch" id="fview_labreport_printlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fview_labreport_printlistsrch-search-panel" class="<?php echo $view_labreport_print_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_labreport_print">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $view_labreport_print_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($view_labreport_print_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($view_labreport_print_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_labreport_print_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_labreport_print_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_labreport_print_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_labreport_print_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_labreport_print_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $view_labreport_print_list->showPageHeader(); ?>
<?php
$view_labreport_print_list->showMessage();
?>
<?php if ($view_labreport_print_list->TotalRecords > 0 || $view_labreport_print->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_labreport_print_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_labreport_print">
<?php if (!$view_labreport_print_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_labreport_print_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_labreport_print_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_labreport_print_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_labreport_printlist" id="fview_labreport_printlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_labreport_print">
<div id="gmp_view_labreport_print" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($view_labreport_print_list->TotalRecords > 0 || $view_labreport_print_list->isGridEdit()) { ?>
<table id="tbl_view_labreport_printlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_labreport_print->RowType = ROWTYPE_HEADER;

// Render list options
$view_labreport_print_list->renderListOptions();

// Render list options (header, left)
$view_labreport_print_list->ListOptions->render("header", "left");
?>
<?php if ($view_labreport_print_list->id->Visible) { // id ?>
	<?php if ($view_labreport_print_list->SortUrl($view_labreport_print_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_labreport_print_list->id->headerCellClass() ?>"><div id="elh_view_labreport_print_id" class="view_labreport_print_id"><div class="ew-table-header-caption"><?php echo $view_labreport_print_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_labreport_print_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_labreport_print_list->SortUrl($view_labreport_print_list->id) ?>', 1);"><div id="elh_view_labreport_print_id" class="view_labreport_print_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_labreport_print_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print_list->PatID->Visible) { // PatID ?>
	<?php if ($view_labreport_print_list->SortUrl($view_labreport_print_list->PatID) == "") { ?>
		<th data-name="PatID" class="<?php echo $view_labreport_print_list->PatID->headerCellClass() ?>"><div id="elh_view_labreport_print_PatID" class="view_labreport_print_PatID"><div class="ew-table-header-caption"><?php echo $view_labreport_print_list->PatID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatID" class="<?php echo $view_labreport_print_list->PatID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_labreport_print_list->SortUrl($view_labreport_print_list->PatID) ?>', 1);"><div id="elh_view_labreport_print_PatID" class="view_labreport_print_PatID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print_list->PatID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print_list->PatID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_labreport_print_list->PatID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print_list->PatientName->Visible) { // PatientName ?>
	<?php if ($view_labreport_print_list->SortUrl($view_labreport_print_list->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $view_labreport_print_list->PatientName->headerCellClass() ?>"><div id="elh_view_labreport_print_PatientName" class="view_labreport_print_PatientName"><div class="ew-table-header-caption"><?php echo $view_labreport_print_list->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $view_labreport_print_list->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_labreport_print_list->SortUrl($view_labreport_print_list->PatientName) ?>', 1);"><div id="elh_view_labreport_print_PatientName" class="view_labreport_print_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print_list->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print_list->PatientName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_labreport_print_list->PatientName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print_list->Age->Visible) { // Age ?>
	<?php if ($view_labreport_print_list->SortUrl($view_labreport_print_list->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $view_labreport_print_list->Age->headerCellClass() ?>"><div id="elh_view_labreport_print_Age" class="view_labreport_print_Age"><div class="ew-table-header-caption"><?php echo $view_labreport_print_list->Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $view_labreport_print_list->Age->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_labreport_print_list->SortUrl($view_labreport_print_list->Age) ?>', 1);"><div id="elh_view_labreport_print_Age" class="view_labreport_print_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print_list->Age->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print_list->Age->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_labreport_print_list->Age->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print_list->Gender->Visible) { // Gender ?>
	<?php if ($view_labreport_print_list->SortUrl($view_labreport_print_list->Gender) == "") { ?>
		<th data-name="Gender" class="<?php echo $view_labreport_print_list->Gender->headerCellClass() ?>"><div id="elh_view_labreport_print_Gender" class="view_labreport_print_Gender"><div class="ew-table-header-caption"><?php echo $view_labreport_print_list->Gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gender" class="<?php echo $view_labreport_print_list->Gender->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_labreport_print_list->SortUrl($view_labreport_print_list->Gender) ?>', 1);"><div id="elh_view_labreport_print_Gender" class="view_labreport_print_Gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print_list->Gender->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print_list->Gender->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_labreport_print_list->Gender->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print_list->sid->Visible) { // sid ?>
	<?php if ($view_labreport_print_list->SortUrl($view_labreport_print_list->sid) == "") { ?>
		<th data-name="sid" class="<?php echo $view_labreport_print_list->sid->headerCellClass() ?>"><div id="elh_view_labreport_print_sid" class="view_labreport_print_sid"><div class="ew-table-header-caption"><?php echo $view_labreport_print_list->sid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sid" class="<?php echo $view_labreport_print_list->sid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_labreport_print_list->SortUrl($view_labreport_print_list->sid) ?>', 1);"><div id="elh_view_labreport_print_sid" class="view_labreport_print_sid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print_list->sid->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print_list->sid->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_labreport_print_list->sid->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print_list->ItemCode->Visible) { // ItemCode ?>
	<?php if ($view_labreport_print_list->SortUrl($view_labreport_print_list->ItemCode) == "") { ?>
		<th data-name="ItemCode" class="<?php echo $view_labreport_print_list->ItemCode->headerCellClass() ?>"><div id="elh_view_labreport_print_ItemCode" class="view_labreport_print_ItemCode"><div class="ew-table-header-caption"><?php echo $view_labreport_print_list->ItemCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ItemCode" class="<?php echo $view_labreport_print_list->ItemCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_labreport_print_list->SortUrl($view_labreport_print_list->ItemCode) ?>', 1);"><div id="elh_view_labreport_print_ItemCode" class="view_labreport_print_ItemCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print_list->ItemCode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print_list->ItemCode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_labreport_print_list->ItemCode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print_list->DEptCd->Visible) { // DEptCd ?>
	<?php if ($view_labreport_print_list->SortUrl($view_labreport_print_list->DEptCd) == "") { ?>
		<th data-name="DEptCd" class="<?php echo $view_labreport_print_list->DEptCd->headerCellClass() ?>"><div id="elh_view_labreport_print_DEptCd" class="view_labreport_print_DEptCd"><div class="ew-table-header-caption"><?php echo $view_labreport_print_list->DEptCd->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DEptCd" class="<?php echo $view_labreport_print_list->DEptCd->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_labreport_print_list->SortUrl($view_labreport_print_list->DEptCd) ?>', 1);"><div id="elh_view_labreport_print_DEptCd" class="view_labreport_print_DEptCd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print_list->DEptCd->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print_list->DEptCd->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_labreport_print_list->DEptCd->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print_list->Resulted->Visible) { // Resulted ?>
	<?php if ($view_labreport_print_list->SortUrl($view_labreport_print_list->Resulted) == "") { ?>
		<th data-name="Resulted" class="<?php echo $view_labreport_print_list->Resulted->headerCellClass() ?>"><div id="elh_view_labreport_print_Resulted" class="view_labreport_print_Resulted"><div class="ew-table-header-caption"><?php echo $view_labreport_print_list->Resulted->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Resulted" class="<?php echo $view_labreport_print_list->Resulted->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_labreport_print_list->SortUrl($view_labreport_print_list->Resulted) ?>', 1);"><div id="elh_view_labreport_print_Resulted" class="view_labreport_print_Resulted">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print_list->Resulted->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print_list->Resulted->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_labreport_print_list->Resulted->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print_list->Services->Visible) { // Services ?>
	<?php if ($view_labreport_print_list->SortUrl($view_labreport_print_list->Services) == "") { ?>
		<th data-name="Services" class="<?php echo $view_labreport_print_list->Services->headerCellClass() ?>"><div id="elh_view_labreport_print_Services" class="view_labreport_print_Services"><div class="ew-table-header-caption"><?php echo $view_labreport_print_list->Services->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Services" class="<?php echo $view_labreport_print_list->Services->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_labreport_print_list->SortUrl($view_labreport_print_list->Services) ?>', 1);"><div id="elh_view_labreport_print_Services" class="view_labreport_print_Services">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print_list->Services->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print_list->Services->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_labreport_print_list->Services->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print_list->Pic1->Visible) { // Pic1 ?>
	<?php if ($view_labreport_print_list->SortUrl($view_labreport_print_list->Pic1) == "") { ?>
		<th data-name="Pic1" class="<?php echo $view_labreport_print_list->Pic1->headerCellClass() ?>"><div id="elh_view_labreport_print_Pic1" class="view_labreport_print_Pic1"><div class="ew-table-header-caption"><?php echo $view_labreport_print_list->Pic1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pic1" class="<?php echo $view_labreport_print_list->Pic1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_labreport_print_list->SortUrl($view_labreport_print_list->Pic1) ?>', 1);"><div id="elh_view_labreport_print_Pic1" class="view_labreport_print_Pic1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print_list->Pic1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print_list->Pic1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_labreport_print_list->Pic1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print_list->Pic2->Visible) { // Pic2 ?>
	<?php if ($view_labreport_print_list->SortUrl($view_labreport_print_list->Pic2) == "") { ?>
		<th data-name="Pic2" class="<?php echo $view_labreport_print_list->Pic2->headerCellClass() ?>"><div id="elh_view_labreport_print_Pic2" class="view_labreport_print_Pic2"><div class="ew-table-header-caption"><?php echo $view_labreport_print_list->Pic2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pic2" class="<?php echo $view_labreport_print_list->Pic2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_labreport_print_list->SortUrl($view_labreport_print_list->Pic2) ?>', 1);"><div id="elh_view_labreport_print_Pic2" class="view_labreport_print_Pic2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print_list->Pic2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print_list->Pic2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_labreport_print_list->Pic2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print_list->TestUnit->Visible) { // TestUnit ?>
	<?php if ($view_labreport_print_list->SortUrl($view_labreport_print_list->TestUnit) == "") { ?>
		<th data-name="TestUnit" class="<?php echo $view_labreport_print_list->TestUnit->headerCellClass() ?>"><div id="elh_view_labreport_print_TestUnit" class="view_labreport_print_TestUnit"><div class="ew-table-header-caption"><?php echo $view_labreport_print_list->TestUnit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestUnit" class="<?php echo $view_labreport_print_list->TestUnit->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_labreport_print_list->SortUrl($view_labreport_print_list->TestUnit) ?>', 1);"><div id="elh_view_labreport_print_TestUnit" class="view_labreport_print_TestUnit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print_list->TestUnit->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print_list->TestUnit->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_labreport_print_list->TestUnit->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print_list->Order->Visible) { // Order ?>
	<?php if ($view_labreport_print_list->SortUrl($view_labreport_print_list->Order) == "") { ?>
		<th data-name="Order" class="<?php echo $view_labreport_print_list->Order->headerCellClass() ?>"><div id="elh_view_labreport_print_Order" class="view_labreport_print_Order"><div class="ew-table-header-caption"><?php echo $view_labreport_print_list->Order->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Order" class="<?php echo $view_labreport_print_list->Order->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_labreport_print_list->SortUrl($view_labreport_print_list->Order) ?>', 1);"><div id="elh_view_labreport_print_Order" class="view_labreport_print_Order">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print_list->Order->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print_list->Order->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_labreport_print_list->Order->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print_list->Repeated->Visible) { // Repeated ?>
	<?php if ($view_labreport_print_list->SortUrl($view_labreport_print_list->Repeated) == "") { ?>
		<th data-name="Repeated" class="<?php echo $view_labreport_print_list->Repeated->headerCellClass() ?>"><div id="elh_view_labreport_print_Repeated" class="view_labreport_print_Repeated"><div class="ew-table-header-caption"><?php echo $view_labreport_print_list->Repeated->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Repeated" class="<?php echo $view_labreport_print_list->Repeated->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_labreport_print_list->SortUrl($view_labreport_print_list->Repeated) ?>', 1);"><div id="elh_view_labreport_print_Repeated" class="view_labreport_print_Repeated">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print_list->Repeated->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print_list->Repeated->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_labreport_print_list->Repeated->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print_list->Vid->Visible) { // Vid ?>
	<?php if ($view_labreport_print_list->SortUrl($view_labreport_print_list->Vid) == "") { ?>
		<th data-name="Vid" class="<?php echo $view_labreport_print_list->Vid->headerCellClass() ?>"><div id="elh_view_labreport_print_Vid" class="view_labreport_print_Vid"><div class="ew-table-header-caption"><?php echo $view_labreport_print_list->Vid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Vid" class="<?php echo $view_labreport_print_list->Vid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_labreport_print_list->SortUrl($view_labreport_print_list->Vid) ?>', 1);"><div id="elh_view_labreport_print_Vid" class="view_labreport_print_Vid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print_list->Vid->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print_list->Vid->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_labreport_print_list->Vid->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print_list->invoiceId->Visible) { // invoiceId ?>
	<?php if ($view_labreport_print_list->SortUrl($view_labreport_print_list->invoiceId) == "") { ?>
		<th data-name="invoiceId" class="<?php echo $view_labreport_print_list->invoiceId->headerCellClass() ?>"><div id="elh_view_labreport_print_invoiceId" class="view_labreport_print_invoiceId"><div class="ew-table-header-caption"><?php echo $view_labreport_print_list->invoiceId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="invoiceId" class="<?php echo $view_labreport_print_list->invoiceId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_labreport_print_list->SortUrl($view_labreport_print_list->invoiceId) ?>', 1);"><div id="elh_view_labreport_print_invoiceId" class="view_labreport_print_invoiceId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print_list->invoiceId->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print_list->invoiceId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_labreport_print_list->invoiceId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print_list->DrID->Visible) { // DrID ?>
	<?php if ($view_labreport_print_list->SortUrl($view_labreport_print_list->DrID) == "") { ?>
		<th data-name="DrID" class="<?php echo $view_labreport_print_list->DrID->headerCellClass() ?>"><div id="elh_view_labreport_print_DrID" class="view_labreport_print_DrID"><div class="ew-table-header-caption"><?php echo $view_labreport_print_list->DrID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrID" class="<?php echo $view_labreport_print_list->DrID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_labreport_print_list->SortUrl($view_labreport_print_list->DrID) ?>', 1);"><div id="elh_view_labreport_print_DrID" class="view_labreport_print_DrID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print_list->DrID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print_list->DrID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_labreport_print_list->DrID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print_list->DrCODE->Visible) { // DrCODE ?>
	<?php if ($view_labreport_print_list->SortUrl($view_labreport_print_list->DrCODE) == "") { ?>
		<th data-name="DrCODE" class="<?php echo $view_labreport_print_list->DrCODE->headerCellClass() ?>"><div id="elh_view_labreport_print_DrCODE" class="view_labreport_print_DrCODE"><div class="ew-table-header-caption"><?php echo $view_labreport_print_list->DrCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrCODE" class="<?php echo $view_labreport_print_list->DrCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_labreport_print_list->SortUrl($view_labreport_print_list->DrCODE) ?>', 1);"><div id="elh_view_labreport_print_DrCODE" class="view_labreport_print_DrCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print_list->DrCODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print_list->DrCODE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_labreport_print_list->DrCODE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print_list->DrName->Visible) { // DrName ?>
	<?php if ($view_labreport_print_list->SortUrl($view_labreport_print_list->DrName) == "") { ?>
		<th data-name="DrName" class="<?php echo $view_labreport_print_list->DrName->headerCellClass() ?>"><div id="elh_view_labreport_print_DrName" class="view_labreport_print_DrName"><div class="ew-table-header-caption"><?php echo $view_labreport_print_list->DrName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrName" class="<?php echo $view_labreport_print_list->DrName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_labreport_print_list->SortUrl($view_labreport_print_list->DrName) ?>', 1);"><div id="elh_view_labreport_print_DrName" class="view_labreport_print_DrName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print_list->DrName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print_list->DrName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_labreport_print_list->DrName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print_list->Department->Visible) { // Department ?>
	<?php if ($view_labreport_print_list->SortUrl($view_labreport_print_list->Department) == "") { ?>
		<th data-name="Department" class="<?php echo $view_labreport_print_list->Department->headerCellClass() ?>"><div id="elh_view_labreport_print_Department" class="view_labreport_print_Department"><div class="ew-table-header-caption"><?php echo $view_labreport_print_list->Department->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Department" class="<?php echo $view_labreport_print_list->Department->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_labreport_print_list->SortUrl($view_labreport_print_list->Department) ?>', 1);"><div id="elh_view_labreport_print_Department" class="view_labreport_print_Department">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print_list->Department->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print_list->Department->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_labreport_print_list->Department->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print_list->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_labreport_print_list->SortUrl($view_labreport_print_list->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_labreport_print_list->createddatetime->headerCellClass() ?>"><div id="elh_view_labreport_print_createddatetime" class="view_labreport_print_createddatetime"><div class="ew-table-header-caption"><?php echo $view_labreport_print_list->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_labreport_print_list->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_labreport_print_list->SortUrl($view_labreport_print_list->createddatetime) ?>', 1);"><div id="elh_view_labreport_print_createddatetime" class="view_labreport_print_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print_list->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print_list->createddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_labreport_print_list->createddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print_list->status->Visible) { // status ?>
	<?php if ($view_labreport_print_list->SortUrl($view_labreport_print_list->status) == "") { ?>
		<th data-name="status" class="<?php echo $view_labreport_print_list->status->headerCellClass() ?>"><div id="elh_view_labreport_print_status" class="view_labreport_print_status"><div class="ew-table-header-caption"><?php echo $view_labreport_print_list->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $view_labreport_print_list->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_labreport_print_list->SortUrl($view_labreport_print_list->status) ?>', 1);"><div id="elh_view_labreport_print_status" class="view_labreport_print_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print_list->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print_list->status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_labreport_print_list->status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print_list->TestType->Visible) { // TestType ?>
	<?php if ($view_labreport_print_list->SortUrl($view_labreport_print_list->TestType) == "") { ?>
		<th data-name="TestType" class="<?php echo $view_labreport_print_list->TestType->headerCellClass() ?>"><div id="elh_view_labreport_print_TestType" class="view_labreport_print_TestType"><div class="ew-table-header-caption"><?php echo $view_labreport_print_list->TestType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestType" class="<?php echo $view_labreport_print_list->TestType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_labreport_print_list->SortUrl($view_labreport_print_list->TestType) ?>', 1);"><div id="elh_view_labreport_print_TestType" class="view_labreport_print_TestType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print_list->TestType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print_list->TestType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_labreport_print_list->TestType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print_list->ResultDate->Visible) { // ResultDate ?>
	<?php if ($view_labreport_print_list->SortUrl($view_labreport_print_list->ResultDate) == "") { ?>
		<th data-name="ResultDate" class="<?php echo $view_labreport_print_list->ResultDate->headerCellClass() ?>"><div id="elh_view_labreport_print_ResultDate" class="view_labreport_print_ResultDate"><div class="ew-table-header-caption"><?php echo $view_labreport_print_list->ResultDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ResultDate" class="<?php echo $view_labreport_print_list->ResultDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_labreport_print_list->SortUrl($view_labreport_print_list->ResultDate) ?>', 1);"><div id="elh_view_labreport_print_ResultDate" class="view_labreport_print_ResultDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print_list->ResultDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print_list->ResultDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_labreport_print_list->ResultDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print_list->ResultedBy->Visible) { // ResultedBy ?>
	<?php if ($view_labreport_print_list->SortUrl($view_labreport_print_list->ResultedBy) == "") { ?>
		<th data-name="ResultedBy" class="<?php echo $view_labreport_print_list->ResultedBy->headerCellClass() ?>"><div id="elh_view_labreport_print_ResultedBy" class="view_labreport_print_ResultedBy"><div class="ew-table-header-caption"><?php echo $view_labreport_print_list->ResultedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ResultedBy" class="<?php echo $view_labreport_print_list->ResultedBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_labreport_print_list->SortUrl($view_labreport_print_list->ResultedBy) ?>', 1);"><div id="elh_view_labreport_print_ResultedBy" class="view_labreport_print_ResultedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print_list->ResultedBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print_list->ResultedBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_labreport_print_list->ResultedBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print_list->Printed->Visible) { // Printed ?>
	<?php if ($view_labreport_print_list->SortUrl($view_labreport_print_list->Printed) == "") { ?>
		<th data-name="Printed" class="<?php echo $view_labreport_print_list->Printed->headerCellClass() ?>"><div id="elh_view_labreport_print_Printed" class="view_labreport_print_Printed"><div class="ew-table-header-caption"><?php echo $view_labreport_print_list->Printed->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Printed" class="<?php echo $view_labreport_print_list->Printed->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_labreport_print_list->SortUrl($view_labreport_print_list->Printed) ?>', 1);"><div id="elh_view_labreport_print_Printed" class="view_labreport_print_Printed">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print_list->Printed->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print_list->Printed->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_labreport_print_list->Printed->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print_list->PrintBy->Visible) { // PrintBy ?>
	<?php if ($view_labreport_print_list->SortUrl($view_labreport_print_list->PrintBy) == "") { ?>
		<th data-name="PrintBy" class="<?php echo $view_labreport_print_list->PrintBy->headerCellClass() ?>"><div id="elh_view_labreport_print_PrintBy" class="view_labreport_print_PrintBy"><div class="ew-table-header-caption"><?php echo $view_labreport_print_list->PrintBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrintBy" class="<?php echo $view_labreport_print_list->PrintBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_labreport_print_list->SortUrl($view_labreport_print_list->PrintBy) ?>', 1);"><div id="elh_view_labreport_print_PrintBy" class="view_labreport_print_PrintBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print_list->PrintBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print_list->PrintBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_labreport_print_list->PrintBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print_list->PrintDate->Visible) { // PrintDate ?>
	<?php if ($view_labreport_print_list->SortUrl($view_labreport_print_list->PrintDate) == "") { ?>
		<th data-name="PrintDate" class="<?php echo $view_labreport_print_list->PrintDate->headerCellClass() ?>"><div id="elh_view_labreport_print_PrintDate" class="view_labreport_print_PrintDate"><div class="ew-table-header-caption"><?php echo $view_labreport_print_list->PrintDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrintDate" class="<?php echo $view_labreport_print_list->PrintDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_labreport_print_list->SortUrl($view_labreport_print_list->PrintDate) ?>', 1);"><div id="elh_view_labreport_print_PrintDate" class="view_labreport_print_PrintDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print_list->PrintDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print_list->PrintDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_labreport_print_list->PrintDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_labreport_print_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_labreport_print_list->ExportAll && $view_labreport_print_list->isExport()) {
	$view_labreport_print_list->StopRecord = $view_labreport_print_list->TotalRecords;
} else {

	// Set the last record to display
	if ($view_labreport_print_list->TotalRecords > $view_labreport_print_list->StartRecord + $view_labreport_print_list->DisplayRecords - 1)
		$view_labreport_print_list->StopRecord = $view_labreport_print_list->StartRecord + $view_labreport_print_list->DisplayRecords - 1;
	else
		$view_labreport_print_list->StopRecord = $view_labreport_print_list->TotalRecords;
}
$view_labreport_print_list->RecordCount = $view_labreport_print_list->StartRecord - 1;
if ($view_labreport_print_list->Recordset && !$view_labreport_print_list->Recordset->EOF) {
	$view_labreport_print_list->Recordset->moveFirst();
	$selectLimit = $view_labreport_print_list->UseSelectLimit;
	if (!$selectLimit && $view_labreport_print_list->StartRecord > 1)
		$view_labreport_print_list->Recordset->move($view_labreport_print_list->StartRecord - 1);
} elseif (!$view_labreport_print->AllowAddDeleteRow && $view_labreport_print_list->StopRecord == 0) {
	$view_labreport_print_list->StopRecord = $view_labreport_print->GridAddRowCount;
}

// Initialize aggregate
$view_labreport_print->RowType = ROWTYPE_AGGREGATEINIT;
$view_labreport_print->resetAttributes();
$view_labreport_print_list->renderRow();
while ($view_labreport_print_list->RecordCount < $view_labreport_print_list->StopRecord) {
	$view_labreport_print_list->RecordCount++;
	if ($view_labreport_print_list->RecordCount >= $view_labreport_print_list->StartRecord) {
		$view_labreport_print_list->RowCount++;

		// Set up key count
		$view_labreport_print_list->KeyCount = $view_labreport_print_list->RowIndex;

		// Init row class and style
		$view_labreport_print->resetAttributes();
		$view_labreport_print->CssClass = "";
		if ($view_labreport_print_list->isGridAdd()) {
		} else {
			$view_labreport_print_list->loadRowValues($view_labreport_print_list->Recordset); // Load row values
		}
		$view_labreport_print->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_labreport_print->RowAttrs->merge(["data-rowindex" => $view_labreport_print_list->RowCount, "id" => "r" . $view_labreport_print_list->RowCount . "_view_labreport_print", "data-rowtype" => $view_labreport_print->RowType]);

		// Render row
		$view_labreport_print_list->renderRow();

		// Render list options
		$view_labreport_print_list->renderListOptions();
?>
	<tr <?php echo $view_labreport_print->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_labreport_print_list->ListOptions->render("body", "left", $view_labreport_print_list->RowCount);
?>
	<?php if ($view_labreport_print_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $view_labreport_print_list->id->cellAttributes() ?>>
<span id="el<?php echo $view_labreport_print_list->RowCount ?>_view_labreport_print_id">
<span<?php echo $view_labreport_print_list->id->viewAttributes() ?>><?php echo $view_labreport_print_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_labreport_print_list->PatID->Visible) { // PatID ?>
		<td data-name="PatID" <?php echo $view_labreport_print_list->PatID->cellAttributes() ?>>
<span id="el<?php echo $view_labreport_print_list->RowCount ?>_view_labreport_print_PatID">
<span<?php echo $view_labreport_print_list->PatID->viewAttributes() ?>><?php echo $view_labreport_print_list->PatID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_labreport_print_list->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName" <?php echo $view_labreport_print_list->PatientName->cellAttributes() ?>>
<span id="el<?php echo $view_labreport_print_list->RowCount ?>_view_labreport_print_PatientName">
<span<?php echo $view_labreport_print_list->PatientName->viewAttributes() ?>><?php echo $view_labreport_print_list->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_labreport_print_list->Age->Visible) { // Age ?>
		<td data-name="Age" <?php echo $view_labreport_print_list->Age->cellAttributes() ?>>
<span id="el<?php echo $view_labreport_print_list->RowCount ?>_view_labreport_print_Age">
<span<?php echo $view_labreport_print_list->Age->viewAttributes() ?>><?php echo $view_labreport_print_list->Age->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_labreport_print_list->Gender->Visible) { // Gender ?>
		<td data-name="Gender" <?php echo $view_labreport_print_list->Gender->cellAttributes() ?>>
<span id="el<?php echo $view_labreport_print_list->RowCount ?>_view_labreport_print_Gender">
<span<?php echo $view_labreport_print_list->Gender->viewAttributes() ?>><?php echo $view_labreport_print_list->Gender->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_labreport_print_list->sid->Visible) { // sid ?>
		<td data-name="sid" <?php echo $view_labreport_print_list->sid->cellAttributes() ?>>
<span id="el<?php echo $view_labreport_print_list->RowCount ?>_view_labreport_print_sid">
<span<?php echo $view_labreport_print_list->sid->viewAttributes() ?>><?php echo $view_labreport_print_list->sid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_labreport_print_list->ItemCode->Visible) { // ItemCode ?>
		<td data-name="ItemCode" <?php echo $view_labreport_print_list->ItemCode->cellAttributes() ?>>
<span id="el<?php echo $view_labreport_print_list->RowCount ?>_view_labreport_print_ItemCode">
<span<?php echo $view_labreport_print_list->ItemCode->viewAttributes() ?>><?php echo $view_labreport_print_list->ItemCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_labreport_print_list->DEptCd->Visible) { // DEptCd ?>
		<td data-name="DEptCd" <?php echo $view_labreport_print_list->DEptCd->cellAttributes() ?>>
<span id="el<?php echo $view_labreport_print_list->RowCount ?>_view_labreport_print_DEptCd">
<span<?php echo $view_labreport_print_list->DEptCd->viewAttributes() ?>><?php echo $view_labreport_print_list->DEptCd->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_labreport_print_list->Resulted->Visible) { // Resulted ?>
		<td data-name="Resulted" <?php echo $view_labreport_print_list->Resulted->cellAttributes() ?>>
<span id="el<?php echo $view_labreport_print_list->RowCount ?>_view_labreport_print_Resulted">
<span<?php echo $view_labreport_print_list->Resulted->viewAttributes() ?>><?php echo $view_labreport_print_list->Resulted->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_labreport_print_list->Services->Visible) { // Services ?>
		<td data-name="Services" <?php echo $view_labreport_print_list->Services->cellAttributes() ?>>
<span id="el<?php echo $view_labreport_print_list->RowCount ?>_view_labreport_print_Services">
<span<?php echo $view_labreport_print_list->Services->viewAttributes() ?>><?php echo $view_labreport_print_list->Services->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_labreport_print_list->Pic1->Visible) { // Pic1 ?>
		<td data-name="Pic1" <?php echo $view_labreport_print_list->Pic1->cellAttributes() ?>>
<span id="el<?php echo $view_labreport_print_list->RowCount ?>_view_labreport_print_Pic1">
<span<?php echo $view_labreport_print_list->Pic1->viewAttributes() ?>><?php echo $view_labreport_print_list->Pic1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_labreport_print_list->Pic2->Visible) { // Pic2 ?>
		<td data-name="Pic2" <?php echo $view_labreport_print_list->Pic2->cellAttributes() ?>>
<span id="el<?php echo $view_labreport_print_list->RowCount ?>_view_labreport_print_Pic2">
<span<?php echo $view_labreport_print_list->Pic2->viewAttributes() ?>><?php echo $view_labreport_print_list->Pic2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_labreport_print_list->TestUnit->Visible) { // TestUnit ?>
		<td data-name="TestUnit" <?php echo $view_labreport_print_list->TestUnit->cellAttributes() ?>>
<span id="el<?php echo $view_labreport_print_list->RowCount ?>_view_labreport_print_TestUnit">
<span<?php echo $view_labreport_print_list->TestUnit->viewAttributes() ?>><?php echo $view_labreport_print_list->TestUnit->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_labreport_print_list->Order->Visible) { // Order ?>
		<td data-name="Order" <?php echo $view_labreport_print_list->Order->cellAttributes() ?>>
<span id="el<?php echo $view_labreport_print_list->RowCount ?>_view_labreport_print_Order">
<span<?php echo $view_labreport_print_list->Order->viewAttributes() ?>><?php echo $view_labreport_print_list->Order->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_labreport_print_list->Repeated->Visible) { // Repeated ?>
		<td data-name="Repeated" <?php echo $view_labreport_print_list->Repeated->cellAttributes() ?>>
<span id="el<?php echo $view_labreport_print_list->RowCount ?>_view_labreport_print_Repeated">
<span<?php echo $view_labreport_print_list->Repeated->viewAttributes() ?>><?php echo $view_labreport_print_list->Repeated->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_labreport_print_list->Vid->Visible) { // Vid ?>
		<td data-name="Vid" <?php echo $view_labreport_print_list->Vid->cellAttributes() ?>>
<span id="el<?php echo $view_labreport_print_list->RowCount ?>_view_labreport_print_Vid">
<span<?php echo $view_labreport_print_list->Vid->viewAttributes() ?>><?php echo $view_labreport_print_list->Vid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_labreport_print_list->invoiceId->Visible) { // invoiceId ?>
		<td data-name="invoiceId" <?php echo $view_labreport_print_list->invoiceId->cellAttributes() ?>>
<span id="el<?php echo $view_labreport_print_list->RowCount ?>_view_labreport_print_invoiceId">
<span<?php echo $view_labreport_print_list->invoiceId->viewAttributes() ?>><?php echo $view_labreport_print_list->invoiceId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_labreport_print_list->DrID->Visible) { // DrID ?>
		<td data-name="DrID" <?php echo $view_labreport_print_list->DrID->cellAttributes() ?>>
<span id="el<?php echo $view_labreport_print_list->RowCount ?>_view_labreport_print_DrID">
<span<?php echo $view_labreport_print_list->DrID->viewAttributes() ?>><?php echo $view_labreport_print_list->DrID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_labreport_print_list->DrCODE->Visible) { // DrCODE ?>
		<td data-name="DrCODE" <?php echo $view_labreport_print_list->DrCODE->cellAttributes() ?>>
<span id="el<?php echo $view_labreport_print_list->RowCount ?>_view_labreport_print_DrCODE">
<span<?php echo $view_labreport_print_list->DrCODE->viewAttributes() ?>><?php echo $view_labreport_print_list->DrCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_labreport_print_list->DrName->Visible) { // DrName ?>
		<td data-name="DrName" <?php echo $view_labreport_print_list->DrName->cellAttributes() ?>>
<span id="el<?php echo $view_labreport_print_list->RowCount ?>_view_labreport_print_DrName">
<span<?php echo $view_labreport_print_list->DrName->viewAttributes() ?>><?php echo $view_labreport_print_list->DrName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_labreport_print_list->Department->Visible) { // Department ?>
		<td data-name="Department" <?php echo $view_labreport_print_list->Department->cellAttributes() ?>>
<span id="el<?php echo $view_labreport_print_list->RowCount ?>_view_labreport_print_Department">
<span<?php echo $view_labreport_print_list->Department->viewAttributes() ?>><?php echo $view_labreport_print_list->Department->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_labreport_print_list->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" <?php echo $view_labreport_print_list->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_labreport_print_list->RowCount ?>_view_labreport_print_createddatetime">
<span<?php echo $view_labreport_print_list->createddatetime->viewAttributes() ?>><?php echo $view_labreport_print_list->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_labreport_print_list->status->Visible) { // status ?>
		<td data-name="status" <?php echo $view_labreport_print_list->status->cellAttributes() ?>>
<span id="el<?php echo $view_labreport_print_list->RowCount ?>_view_labreport_print_status">
<span<?php echo $view_labreport_print_list->status->viewAttributes() ?>><?php echo $view_labreport_print_list->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_labreport_print_list->TestType->Visible) { // TestType ?>
		<td data-name="TestType" <?php echo $view_labreport_print_list->TestType->cellAttributes() ?>>
<span id="el<?php echo $view_labreport_print_list->RowCount ?>_view_labreport_print_TestType">
<span<?php echo $view_labreport_print_list->TestType->viewAttributes() ?>><?php echo $view_labreport_print_list->TestType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_labreport_print_list->ResultDate->Visible) { // ResultDate ?>
		<td data-name="ResultDate" <?php echo $view_labreport_print_list->ResultDate->cellAttributes() ?>>
<span id="el<?php echo $view_labreport_print_list->RowCount ?>_view_labreport_print_ResultDate">
<span<?php echo $view_labreport_print_list->ResultDate->viewAttributes() ?>><?php echo $view_labreport_print_list->ResultDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_labreport_print_list->ResultedBy->Visible) { // ResultedBy ?>
		<td data-name="ResultedBy" <?php echo $view_labreport_print_list->ResultedBy->cellAttributes() ?>>
<span id="el<?php echo $view_labreport_print_list->RowCount ?>_view_labreport_print_ResultedBy">
<span<?php echo $view_labreport_print_list->ResultedBy->viewAttributes() ?>><?php echo $view_labreport_print_list->ResultedBy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_labreport_print_list->Printed->Visible) { // Printed ?>
		<td data-name="Printed" <?php echo $view_labreport_print_list->Printed->cellAttributes() ?>>
<span id="el<?php echo $view_labreport_print_list->RowCount ?>_view_labreport_print_Printed">
<span<?php echo $view_labreport_print_list->Printed->viewAttributes() ?>><?php echo $view_labreport_print_list->Printed->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_labreport_print_list->PrintBy->Visible) { // PrintBy ?>
		<td data-name="PrintBy" <?php echo $view_labreport_print_list->PrintBy->cellAttributes() ?>>
<span id="el<?php echo $view_labreport_print_list->RowCount ?>_view_labreport_print_PrintBy">
<span<?php echo $view_labreport_print_list->PrintBy->viewAttributes() ?>><?php echo $view_labreport_print_list->PrintBy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_labreport_print_list->PrintDate->Visible) { // PrintDate ?>
		<td data-name="PrintDate" <?php echo $view_labreport_print_list->PrintDate->cellAttributes() ?>>
<span id="el<?php echo $view_labreport_print_list->RowCount ?>_view_labreport_print_PrintDate">
<span<?php echo $view_labreport_print_list->PrintDate->viewAttributes() ?>><?php echo $view_labreport_print_list->PrintDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_labreport_print_list->ListOptions->render("body", "right", $view_labreport_print_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$view_labreport_print_list->isGridAdd())
		$view_labreport_print_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$view_labreport_print->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_labreport_print_list->Recordset)
	$view_labreport_print_list->Recordset->Close();
?>
<?php if (!$view_labreport_print_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_labreport_print_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_labreport_print_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_labreport_print_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_labreport_print_list->TotalRecords == 0 && !$view_labreport_print->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_labreport_print_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_labreport_print_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_labreport_print_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$view_labreport_print->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_view_labreport_print",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$view_labreport_print_list->terminate();
?>
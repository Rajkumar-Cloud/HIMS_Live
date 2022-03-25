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
$view_donor_ivf_list = new view_donor_ivf_list();

// Run the page
$view_donor_ivf_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_donor_ivf_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$view_donor_ivf_list->isExport()) { ?>
<script>
var fview_donor_ivflist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fview_donor_ivflist = currentForm = new ew.Form("fview_donor_ivflist", "list");
	fview_donor_ivflist.formKeyCountName = '<?php echo $view_donor_ivf_list->FormKeyCountName ?>';
	loadjs.done("fview_donor_ivflist");
});
var fview_donor_ivflistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fview_donor_ivflistsrch = currentSearchForm = new ew.Form("fview_donor_ivflistsrch");

	// Dynamic selection lists
	// Filters

	fview_donor_ivflistsrch.filterList = <?php echo $view_donor_ivf_list->getFilterList() ?>;
	loadjs.done("fview_donor_ivflistsrch");
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
<?php if (!$view_donor_ivf_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_donor_ivf_list->TotalRecords > 0 && $view_donor_ivf_list->ExportOptions->visible()) { ?>
<?php $view_donor_ivf_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_donor_ivf_list->ImportOptions->visible()) { ?>
<?php $view_donor_ivf_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_donor_ivf_list->SearchOptions->visible()) { ?>
<?php $view_donor_ivf_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_donor_ivf_list->FilterOptions->visible()) { ?>
<?php $view_donor_ivf_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_donor_ivf_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_donor_ivf_list->isExport() && !$view_donor_ivf->CurrentAction) { ?>
<form name="fview_donor_ivflistsrch" id="fview_donor_ivflistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fview_donor_ivflistsrch-search-panel" class="<?php echo $view_donor_ivf_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_donor_ivf">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $view_donor_ivf_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($view_donor_ivf_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($view_donor_ivf_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_donor_ivf_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_donor_ivf_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_donor_ivf_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_donor_ivf_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_donor_ivf_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $view_donor_ivf_list->showPageHeader(); ?>
<?php
$view_donor_ivf_list->showMessage();
?>
<?php if ($view_donor_ivf_list->TotalRecords > 0 || $view_donor_ivf->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_donor_ivf_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_donor_ivf">
<?php if (!$view_donor_ivf_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_donor_ivf_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_donor_ivf_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_donor_ivf_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_donor_ivflist" id="fview_donor_ivflist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_donor_ivf">
<div id="gmp_view_donor_ivf" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($view_donor_ivf_list->TotalRecords > 0 || $view_donor_ivf_list->isGridEdit()) { ?>
<table id="tbl_view_donor_ivflist" class="table ew-table d-none"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_donor_ivf->RowType = ROWTYPE_HEADER;

// Render list options
$view_donor_ivf_list->renderListOptions();

// Render list options (header, left)
$view_donor_ivf_list->ListOptions->render("header", "left", "", "block", $view_donor_ivf->TableVar, "view_donor_ivflist");
?>
<?php if ($view_donor_ivf_list->id->Visible) { // id ?>
	<?php if ($view_donor_ivf_list->SortUrl($view_donor_ivf_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_donor_ivf_list->id->headerCellClass() ?>"><div id="elh_view_donor_ivf_id" class="view_donor_ivf_id"><div class="ew-table-header-caption"><script id="tpc_view_donor_ivf_id" type="text/html"><?php echo $view_donor_ivf_list->id->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_donor_ivf_list->id->headerCellClass() ?>"><script id="tpc_view_donor_ivf_id" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_donor_ivf_list->SortUrl($view_donor_ivf_list->id) ?>', 1);"><div id="elh_view_donor_ivf_id" class="view_donor_ivf_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_ivf_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_donor_ivf_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_donor_ivf_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_donor_ivf_list->Male->Visible) { // Male ?>
	<?php if ($view_donor_ivf_list->SortUrl($view_donor_ivf_list->Male) == "") { ?>
		<th data-name="Male" class="<?php echo $view_donor_ivf_list->Male->headerCellClass() ?>"><div id="elh_view_donor_ivf_Male" class="view_donor_ivf_Male"><div class="ew-table-header-caption"><script id="tpc_view_donor_ivf_Male" type="text/html"><?php echo $view_donor_ivf_list->Male->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="Male" class="<?php echo $view_donor_ivf_list->Male->headerCellClass() ?>"><script id="tpc_view_donor_ivf_Male" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_donor_ivf_list->SortUrl($view_donor_ivf_list->Male) ?>', 1);"><div id="elh_view_donor_ivf_Male" class="view_donor_ivf_Male">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_ivf_list->Male->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_donor_ivf_list->Male->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_donor_ivf_list->Male->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_donor_ivf_list->Female->Visible) { // Female ?>
	<?php if ($view_donor_ivf_list->SortUrl($view_donor_ivf_list->Female) == "") { ?>
		<th data-name="Female" class="<?php echo $view_donor_ivf_list->Female->headerCellClass() ?>"><div id="elh_view_donor_ivf_Female" class="view_donor_ivf_Female"><div class="ew-table-header-caption"><script id="tpc_view_donor_ivf_Female" type="text/html"><?php echo $view_donor_ivf_list->Female->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="Female" class="<?php echo $view_donor_ivf_list->Female->headerCellClass() ?>"><script id="tpc_view_donor_ivf_Female" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_donor_ivf_list->SortUrl($view_donor_ivf_list->Female) ?>', 1);"><div id="elh_view_donor_ivf_Female" class="view_donor_ivf_Female">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_ivf_list->Female->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_donor_ivf_list->Female->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_donor_ivf_list->Female->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_donor_ivf_list->status->Visible) { // status ?>
	<?php if ($view_donor_ivf_list->SortUrl($view_donor_ivf_list->status) == "") { ?>
		<th data-name="status" class="<?php echo $view_donor_ivf_list->status->headerCellClass() ?>"><div id="elh_view_donor_ivf_status" class="view_donor_ivf_status"><div class="ew-table-header-caption"><script id="tpc_view_donor_ivf_status" type="text/html"><?php echo $view_donor_ivf_list->status->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $view_donor_ivf_list->status->headerCellClass() ?>"><script id="tpc_view_donor_ivf_status" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_donor_ivf_list->SortUrl($view_donor_ivf_list->status) ?>', 1);"><div id="elh_view_donor_ivf_status" class="view_donor_ivf_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_ivf_list->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_donor_ivf_list->status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_donor_ivf_list->status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_donor_ivf_list->createdby->Visible) { // createdby ?>
	<?php if ($view_donor_ivf_list->SortUrl($view_donor_ivf_list->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $view_donor_ivf_list->createdby->headerCellClass() ?>"><div id="elh_view_donor_ivf_createdby" class="view_donor_ivf_createdby"><div class="ew-table-header-caption"><script id="tpc_view_donor_ivf_createdby" type="text/html"><?php echo $view_donor_ivf_list->createdby->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $view_donor_ivf_list->createdby->headerCellClass() ?>"><script id="tpc_view_donor_ivf_createdby" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_donor_ivf_list->SortUrl($view_donor_ivf_list->createdby) ?>', 1);"><div id="elh_view_donor_ivf_createdby" class="view_donor_ivf_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_ivf_list->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_donor_ivf_list->createdby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_donor_ivf_list->createdby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_donor_ivf_list->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_donor_ivf_list->SortUrl($view_donor_ivf_list->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_donor_ivf_list->createddatetime->headerCellClass() ?>"><div id="elh_view_donor_ivf_createddatetime" class="view_donor_ivf_createddatetime"><div class="ew-table-header-caption"><script id="tpc_view_donor_ivf_createddatetime" type="text/html"><?php echo $view_donor_ivf_list->createddatetime->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_donor_ivf_list->createddatetime->headerCellClass() ?>"><script id="tpc_view_donor_ivf_createddatetime" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_donor_ivf_list->SortUrl($view_donor_ivf_list->createddatetime) ?>', 1);"><div id="elh_view_donor_ivf_createddatetime" class="view_donor_ivf_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_ivf_list->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_donor_ivf_list->createddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_donor_ivf_list->createddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_donor_ivf_list->modifiedby->Visible) { // modifiedby ?>
	<?php if ($view_donor_ivf_list->SortUrl($view_donor_ivf_list->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $view_donor_ivf_list->modifiedby->headerCellClass() ?>"><div id="elh_view_donor_ivf_modifiedby" class="view_donor_ivf_modifiedby"><div class="ew-table-header-caption"><script id="tpc_view_donor_ivf_modifiedby" type="text/html"><?php echo $view_donor_ivf_list->modifiedby->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $view_donor_ivf_list->modifiedby->headerCellClass() ?>"><script id="tpc_view_donor_ivf_modifiedby" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_donor_ivf_list->SortUrl($view_donor_ivf_list->modifiedby) ?>', 1);"><div id="elh_view_donor_ivf_modifiedby" class="view_donor_ivf_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_ivf_list->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_donor_ivf_list->modifiedby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_donor_ivf_list->modifiedby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_donor_ivf_list->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($view_donor_ivf_list->SortUrl($view_donor_ivf_list->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_donor_ivf_list->modifieddatetime->headerCellClass() ?>"><div id="elh_view_donor_ivf_modifieddatetime" class="view_donor_ivf_modifieddatetime"><div class="ew-table-header-caption"><script id="tpc_view_donor_ivf_modifieddatetime" type="text/html"><?php echo $view_donor_ivf_list->modifieddatetime->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_donor_ivf_list->modifieddatetime->headerCellClass() ?>"><script id="tpc_view_donor_ivf_modifieddatetime" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_donor_ivf_list->SortUrl($view_donor_ivf_list->modifieddatetime) ?>', 1);"><div id="elh_view_donor_ivf_modifieddatetime" class="view_donor_ivf_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_ivf_list->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_donor_ivf_list->modifieddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_donor_ivf_list->modifieddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_donor_ivf_list->malepropic->Visible) { // malepropic ?>
	<?php if ($view_donor_ivf_list->SortUrl($view_donor_ivf_list->malepropic) == "") { ?>
		<th data-name="malepropic" class="<?php echo $view_donor_ivf_list->malepropic->headerCellClass() ?>"><div id="elh_view_donor_ivf_malepropic" class="view_donor_ivf_malepropic"><div class="ew-table-header-caption"><script id="tpc_view_donor_ivf_malepropic" type="text/html"><?php echo $view_donor_ivf_list->malepropic->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="malepropic" class="<?php echo $view_donor_ivf_list->malepropic->headerCellClass() ?>"><script id="tpc_view_donor_ivf_malepropic" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_donor_ivf_list->SortUrl($view_donor_ivf_list->malepropic) ?>', 1);"><div id="elh_view_donor_ivf_malepropic" class="view_donor_ivf_malepropic">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_ivf_list->malepropic->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_donor_ivf_list->malepropic->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_donor_ivf_list->malepropic->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_donor_ivf_list->femalepropic->Visible) { // femalepropic ?>
	<?php if ($view_donor_ivf_list->SortUrl($view_donor_ivf_list->femalepropic) == "") { ?>
		<th data-name="femalepropic" class="<?php echo $view_donor_ivf_list->femalepropic->headerCellClass() ?>"><div id="elh_view_donor_ivf_femalepropic" class="view_donor_ivf_femalepropic"><div class="ew-table-header-caption"><script id="tpc_view_donor_ivf_femalepropic" type="text/html"><?php echo $view_donor_ivf_list->femalepropic->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="femalepropic" class="<?php echo $view_donor_ivf_list->femalepropic->headerCellClass() ?>"><script id="tpc_view_donor_ivf_femalepropic" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_donor_ivf_list->SortUrl($view_donor_ivf_list->femalepropic) ?>', 1);"><div id="elh_view_donor_ivf_femalepropic" class="view_donor_ivf_femalepropic">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_ivf_list->femalepropic->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_donor_ivf_list->femalepropic->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_donor_ivf_list->femalepropic->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_donor_ivf_list->HusbandEducation->Visible) { // HusbandEducation ?>
	<?php if ($view_donor_ivf_list->SortUrl($view_donor_ivf_list->HusbandEducation) == "") { ?>
		<th data-name="HusbandEducation" class="<?php echo $view_donor_ivf_list->HusbandEducation->headerCellClass() ?>"><div id="elh_view_donor_ivf_HusbandEducation" class="view_donor_ivf_HusbandEducation"><div class="ew-table-header-caption"><script id="tpc_view_donor_ivf_HusbandEducation" type="text/html"><?php echo $view_donor_ivf_list->HusbandEducation->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="HusbandEducation" class="<?php echo $view_donor_ivf_list->HusbandEducation->headerCellClass() ?>"><script id="tpc_view_donor_ivf_HusbandEducation" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_donor_ivf_list->SortUrl($view_donor_ivf_list->HusbandEducation) ?>', 1);"><div id="elh_view_donor_ivf_HusbandEducation" class="view_donor_ivf_HusbandEducation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_ivf_list->HusbandEducation->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_donor_ivf_list->HusbandEducation->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_donor_ivf_list->HusbandEducation->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_donor_ivf_list->WifeEducation->Visible) { // WifeEducation ?>
	<?php if ($view_donor_ivf_list->SortUrl($view_donor_ivf_list->WifeEducation) == "") { ?>
		<th data-name="WifeEducation" class="<?php echo $view_donor_ivf_list->WifeEducation->headerCellClass() ?>"><div id="elh_view_donor_ivf_WifeEducation" class="view_donor_ivf_WifeEducation"><div class="ew-table-header-caption"><script id="tpc_view_donor_ivf_WifeEducation" type="text/html"><?php echo $view_donor_ivf_list->WifeEducation->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="WifeEducation" class="<?php echo $view_donor_ivf_list->WifeEducation->headerCellClass() ?>"><script id="tpc_view_donor_ivf_WifeEducation" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_donor_ivf_list->SortUrl($view_donor_ivf_list->WifeEducation) ?>', 1);"><div id="elh_view_donor_ivf_WifeEducation" class="view_donor_ivf_WifeEducation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_ivf_list->WifeEducation->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_donor_ivf_list->WifeEducation->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_donor_ivf_list->WifeEducation->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_donor_ivf_list->HusbandWorkHours->Visible) { // HusbandWorkHours ?>
	<?php if ($view_donor_ivf_list->SortUrl($view_donor_ivf_list->HusbandWorkHours) == "") { ?>
		<th data-name="HusbandWorkHours" class="<?php echo $view_donor_ivf_list->HusbandWorkHours->headerCellClass() ?>"><div id="elh_view_donor_ivf_HusbandWorkHours" class="view_donor_ivf_HusbandWorkHours"><div class="ew-table-header-caption"><script id="tpc_view_donor_ivf_HusbandWorkHours" type="text/html"><?php echo $view_donor_ivf_list->HusbandWorkHours->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="HusbandWorkHours" class="<?php echo $view_donor_ivf_list->HusbandWorkHours->headerCellClass() ?>"><script id="tpc_view_donor_ivf_HusbandWorkHours" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_donor_ivf_list->SortUrl($view_donor_ivf_list->HusbandWorkHours) ?>', 1);"><div id="elh_view_donor_ivf_HusbandWorkHours" class="view_donor_ivf_HusbandWorkHours">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_ivf_list->HusbandWorkHours->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_donor_ivf_list->HusbandWorkHours->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_donor_ivf_list->HusbandWorkHours->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_donor_ivf_list->WifeWorkHours->Visible) { // WifeWorkHours ?>
	<?php if ($view_donor_ivf_list->SortUrl($view_donor_ivf_list->WifeWorkHours) == "") { ?>
		<th data-name="WifeWorkHours" class="<?php echo $view_donor_ivf_list->WifeWorkHours->headerCellClass() ?>"><div id="elh_view_donor_ivf_WifeWorkHours" class="view_donor_ivf_WifeWorkHours"><div class="ew-table-header-caption"><script id="tpc_view_donor_ivf_WifeWorkHours" type="text/html"><?php echo $view_donor_ivf_list->WifeWorkHours->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="WifeWorkHours" class="<?php echo $view_donor_ivf_list->WifeWorkHours->headerCellClass() ?>"><script id="tpc_view_donor_ivf_WifeWorkHours" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_donor_ivf_list->SortUrl($view_donor_ivf_list->WifeWorkHours) ?>', 1);"><div id="elh_view_donor_ivf_WifeWorkHours" class="view_donor_ivf_WifeWorkHours">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_ivf_list->WifeWorkHours->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_donor_ivf_list->WifeWorkHours->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_donor_ivf_list->WifeWorkHours->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_donor_ivf_list->PatientLanguage->Visible) { // PatientLanguage ?>
	<?php if ($view_donor_ivf_list->SortUrl($view_donor_ivf_list->PatientLanguage) == "") { ?>
		<th data-name="PatientLanguage" class="<?php echo $view_donor_ivf_list->PatientLanguage->headerCellClass() ?>"><div id="elh_view_donor_ivf_PatientLanguage" class="view_donor_ivf_PatientLanguage"><div class="ew-table-header-caption"><script id="tpc_view_donor_ivf_PatientLanguage" type="text/html"><?php echo $view_donor_ivf_list->PatientLanguage->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="PatientLanguage" class="<?php echo $view_donor_ivf_list->PatientLanguage->headerCellClass() ?>"><script id="tpc_view_donor_ivf_PatientLanguage" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_donor_ivf_list->SortUrl($view_donor_ivf_list->PatientLanguage) ?>', 1);"><div id="elh_view_donor_ivf_PatientLanguage" class="view_donor_ivf_PatientLanguage">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_ivf_list->PatientLanguage->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_donor_ivf_list->PatientLanguage->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_donor_ivf_list->PatientLanguage->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_donor_ivf_list->ReferedBy->Visible) { // ReferedBy ?>
	<?php if ($view_donor_ivf_list->SortUrl($view_donor_ivf_list->ReferedBy) == "") { ?>
		<th data-name="ReferedBy" class="<?php echo $view_donor_ivf_list->ReferedBy->headerCellClass() ?>"><div id="elh_view_donor_ivf_ReferedBy" class="view_donor_ivf_ReferedBy"><div class="ew-table-header-caption"><script id="tpc_view_donor_ivf_ReferedBy" type="text/html"><?php echo $view_donor_ivf_list->ReferedBy->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="ReferedBy" class="<?php echo $view_donor_ivf_list->ReferedBy->headerCellClass() ?>"><script id="tpc_view_donor_ivf_ReferedBy" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_donor_ivf_list->SortUrl($view_donor_ivf_list->ReferedBy) ?>', 1);"><div id="elh_view_donor_ivf_ReferedBy" class="view_donor_ivf_ReferedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_ivf_list->ReferedBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_donor_ivf_list->ReferedBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_donor_ivf_list->ReferedBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_donor_ivf_list->ReferPhNo->Visible) { // ReferPhNo ?>
	<?php if ($view_donor_ivf_list->SortUrl($view_donor_ivf_list->ReferPhNo) == "") { ?>
		<th data-name="ReferPhNo" class="<?php echo $view_donor_ivf_list->ReferPhNo->headerCellClass() ?>"><div id="elh_view_donor_ivf_ReferPhNo" class="view_donor_ivf_ReferPhNo"><div class="ew-table-header-caption"><script id="tpc_view_donor_ivf_ReferPhNo" type="text/html"><?php echo $view_donor_ivf_list->ReferPhNo->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="ReferPhNo" class="<?php echo $view_donor_ivf_list->ReferPhNo->headerCellClass() ?>"><script id="tpc_view_donor_ivf_ReferPhNo" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_donor_ivf_list->SortUrl($view_donor_ivf_list->ReferPhNo) ?>', 1);"><div id="elh_view_donor_ivf_ReferPhNo" class="view_donor_ivf_ReferPhNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_ivf_list->ReferPhNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_donor_ivf_list->ReferPhNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_donor_ivf_list->ReferPhNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_donor_ivf_list->WifeCell->Visible) { // WifeCell ?>
	<?php if ($view_donor_ivf_list->SortUrl($view_donor_ivf_list->WifeCell) == "") { ?>
		<th data-name="WifeCell" class="<?php echo $view_donor_ivf_list->WifeCell->headerCellClass() ?>"><div id="elh_view_donor_ivf_WifeCell" class="view_donor_ivf_WifeCell"><div class="ew-table-header-caption"><script id="tpc_view_donor_ivf_WifeCell" type="text/html"><?php echo $view_donor_ivf_list->WifeCell->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="WifeCell" class="<?php echo $view_donor_ivf_list->WifeCell->headerCellClass() ?>"><script id="tpc_view_donor_ivf_WifeCell" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_donor_ivf_list->SortUrl($view_donor_ivf_list->WifeCell) ?>', 1);"><div id="elh_view_donor_ivf_WifeCell" class="view_donor_ivf_WifeCell">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_ivf_list->WifeCell->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_donor_ivf_list->WifeCell->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_donor_ivf_list->WifeCell->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_donor_ivf_list->HusbandCell->Visible) { // HusbandCell ?>
	<?php if ($view_donor_ivf_list->SortUrl($view_donor_ivf_list->HusbandCell) == "") { ?>
		<th data-name="HusbandCell" class="<?php echo $view_donor_ivf_list->HusbandCell->headerCellClass() ?>"><div id="elh_view_donor_ivf_HusbandCell" class="view_donor_ivf_HusbandCell"><div class="ew-table-header-caption"><script id="tpc_view_donor_ivf_HusbandCell" type="text/html"><?php echo $view_donor_ivf_list->HusbandCell->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="HusbandCell" class="<?php echo $view_donor_ivf_list->HusbandCell->headerCellClass() ?>"><script id="tpc_view_donor_ivf_HusbandCell" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_donor_ivf_list->SortUrl($view_donor_ivf_list->HusbandCell) ?>', 1);"><div id="elh_view_donor_ivf_HusbandCell" class="view_donor_ivf_HusbandCell">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_ivf_list->HusbandCell->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_donor_ivf_list->HusbandCell->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_donor_ivf_list->HusbandCell->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_donor_ivf_list->WifeEmail->Visible) { // WifeEmail ?>
	<?php if ($view_donor_ivf_list->SortUrl($view_donor_ivf_list->WifeEmail) == "") { ?>
		<th data-name="WifeEmail" class="<?php echo $view_donor_ivf_list->WifeEmail->headerCellClass() ?>"><div id="elh_view_donor_ivf_WifeEmail" class="view_donor_ivf_WifeEmail"><div class="ew-table-header-caption"><script id="tpc_view_donor_ivf_WifeEmail" type="text/html"><?php echo $view_donor_ivf_list->WifeEmail->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="WifeEmail" class="<?php echo $view_donor_ivf_list->WifeEmail->headerCellClass() ?>"><script id="tpc_view_donor_ivf_WifeEmail" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_donor_ivf_list->SortUrl($view_donor_ivf_list->WifeEmail) ?>', 1);"><div id="elh_view_donor_ivf_WifeEmail" class="view_donor_ivf_WifeEmail">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_ivf_list->WifeEmail->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_donor_ivf_list->WifeEmail->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_donor_ivf_list->WifeEmail->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_donor_ivf_list->HusbandEmail->Visible) { // HusbandEmail ?>
	<?php if ($view_donor_ivf_list->SortUrl($view_donor_ivf_list->HusbandEmail) == "") { ?>
		<th data-name="HusbandEmail" class="<?php echo $view_donor_ivf_list->HusbandEmail->headerCellClass() ?>"><div id="elh_view_donor_ivf_HusbandEmail" class="view_donor_ivf_HusbandEmail"><div class="ew-table-header-caption"><script id="tpc_view_donor_ivf_HusbandEmail" type="text/html"><?php echo $view_donor_ivf_list->HusbandEmail->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="HusbandEmail" class="<?php echo $view_donor_ivf_list->HusbandEmail->headerCellClass() ?>"><script id="tpc_view_donor_ivf_HusbandEmail" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_donor_ivf_list->SortUrl($view_donor_ivf_list->HusbandEmail) ?>', 1);"><div id="elh_view_donor_ivf_HusbandEmail" class="view_donor_ivf_HusbandEmail">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_ivf_list->HusbandEmail->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_donor_ivf_list->HusbandEmail->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_donor_ivf_list->HusbandEmail->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_donor_ivf_list->ARTCYCLE->Visible) { // ARTCYCLE ?>
	<?php if ($view_donor_ivf_list->SortUrl($view_donor_ivf_list->ARTCYCLE) == "") { ?>
		<th data-name="ARTCYCLE" class="<?php echo $view_donor_ivf_list->ARTCYCLE->headerCellClass() ?>"><div id="elh_view_donor_ivf_ARTCYCLE" class="view_donor_ivf_ARTCYCLE"><div class="ew-table-header-caption"><script id="tpc_view_donor_ivf_ARTCYCLE" type="text/html"><?php echo $view_donor_ivf_list->ARTCYCLE->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="ARTCYCLE" class="<?php echo $view_donor_ivf_list->ARTCYCLE->headerCellClass() ?>"><script id="tpc_view_donor_ivf_ARTCYCLE" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_donor_ivf_list->SortUrl($view_donor_ivf_list->ARTCYCLE) ?>', 1);"><div id="elh_view_donor_ivf_ARTCYCLE" class="view_donor_ivf_ARTCYCLE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_ivf_list->ARTCYCLE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_donor_ivf_list->ARTCYCLE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_donor_ivf_list->ARTCYCLE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_donor_ivf_list->RESULT->Visible) { // RESULT ?>
	<?php if ($view_donor_ivf_list->SortUrl($view_donor_ivf_list->RESULT) == "") { ?>
		<th data-name="RESULT" class="<?php echo $view_donor_ivf_list->RESULT->headerCellClass() ?>"><div id="elh_view_donor_ivf_RESULT" class="view_donor_ivf_RESULT"><div class="ew-table-header-caption"><script id="tpc_view_donor_ivf_RESULT" type="text/html"><?php echo $view_donor_ivf_list->RESULT->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="RESULT" class="<?php echo $view_donor_ivf_list->RESULT->headerCellClass() ?>"><script id="tpc_view_donor_ivf_RESULT" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_donor_ivf_list->SortUrl($view_donor_ivf_list->RESULT) ?>', 1);"><div id="elh_view_donor_ivf_RESULT" class="view_donor_ivf_RESULT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_ivf_list->RESULT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_donor_ivf_list->RESULT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_donor_ivf_list->RESULT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_donor_ivf_list->CoupleID->Visible) { // CoupleID ?>
	<?php if ($view_donor_ivf_list->SortUrl($view_donor_ivf_list->CoupleID) == "") { ?>
		<th data-name="CoupleID" class="<?php echo $view_donor_ivf_list->CoupleID->headerCellClass() ?>"><div id="elh_view_donor_ivf_CoupleID" class="view_donor_ivf_CoupleID"><div class="ew-table-header-caption"><script id="tpc_view_donor_ivf_CoupleID" type="text/html"><?php echo $view_donor_ivf_list->CoupleID->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="CoupleID" class="<?php echo $view_donor_ivf_list->CoupleID->headerCellClass() ?>"><script id="tpc_view_donor_ivf_CoupleID" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_donor_ivf_list->SortUrl($view_donor_ivf_list->CoupleID) ?>', 1);"><div id="elh_view_donor_ivf_CoupleID" class="view_donor_ivf_CoupleID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_ivf_list->CoupleID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_donor_ivf_list->CoupleID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_donor_ivf_list->CoupleID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_donor_ivf_list->HospID->Visible) { // HospID ?>
	<?php if ($view_donor_ivf_list->SortUrl($view_donor_ivf_list->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_donor_ivf_list->HospID->headerCellClass() ?>"><div id="elh_view_donor_ivf_HospID" class="view_donor_ivf_HospID"><div class="ew-table-header-caption"><script id="tpc_view_donor_ivf_HospID" type="text/html"><?php echo $view_donor_ivf_list->HospID->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_donor_ivf_list->HospID->headerCellClass() ?>"><script id="tpc_view_donor_ivf_HospID" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_donor_ivf_list->SortUrl($view_donor_ivf_list->HospID) ?>', 1);"><div id="elh_view_donor_ivf_HospID" class="view_donor_ivf_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_ivf_list->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_donor_ivf_list->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_donor_ivf_list->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_donor_ivf_list->PatientName->Visible) { // PatientName ?>
	<?php if ($view_donor_ivf_list->SortUrl($view_donor_ivf_list->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $view_donor_ivf_list->PatientName->headerCellClass() ?>"><div id="elh_view_donor_ivf_PatientName" class="view_donor_ivf_PatientName"><div class="ew-table-header-caption"><script id="tpc_view_donor_ivf_PatientName" type="text/html"><?php echo $view_donor_ivf_list->PatientName->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $view_donor_ivf_list->PatientName->headerCellClass() ?>"><script id="tpc_view_donor_ivf_PatientName" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_donor_ivf_list->SortUrl($view_donor_ivf_list->PatientName) ?>', 1);"><div id="elh_view_donor_ivf_PatientName" class="view_donor_ivf_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_ivf_list->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_donor_ivf_list->PatientName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_donor_ivf_list->PatientName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_donor_ivf_list->PatientID->Visible) { // PatientID ?>
	<?php if ($view_donor_ivf_list->SortUrl($view_donor_ivf_list->PatientID) == "") { ?>
		<th data-name="PatientID" class="<?php echo $view_donor_ivf_list->PatientID->headerCellClass() ?>"><div id="elh_view_donor_ivf_PatientID" class="view_donor_ivf_PatientID"><div class="ew-table-header-caption"><script id="tpc_view_donor_ivf_PatientID" type="text/html"><?php echo $view_donor_ivf_list->PatientID->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="PatientID" class="<?php echo $view_donor_ivf_list->PatientID->headerCellClass() ?>"><script id="tpc_view_donor_ivf_PatientID" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_donor_ivf_list->SortUrl($view_donor_ivf_list->PatientID) ?>', 1);"><div id="elh_view_donor_ivf_PatientID" class="view_donor_ivf_PatientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_ivf_list->PatientID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_donor_ivf_list->PatientID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_donor_ivf_list->PatientID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_donor_ivf_list->PartnerName->Visible) { // PartnerName ?>
	<?php if ($view_donor_ivf_list->SortUrl($view_donor_ivf_list->PartnerName) == "") { ?>
		<th data-name="PartnerName" class="<?php echo $view_donor_ivf_list->PartnerName->headerCellClass() ?>"><div id="elh_view_donor_ivf_PartnerName" class="view_donor_ivf_PartnerName"><div class="ew-table-header-caption"><script id="tpc_view_donor_ivf_PartnerName" type="text/html"><?php echo $view_donor_ivf_list->PartnerName->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerName" class="<?php echo $view_donor_ivf_list->PartnerName->headerCellClass() ?>"><script id="tpc_view_donor_ivf_PartnerName" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_donor_ivf_list->SortUrl($view_donor_ivf_list->PartnerName) ?>', 1);"><div id="elh_view_donor_ivf_PartnerName" class="view_donor_ivf_PartnerName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_ivf_list->PartnerName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_donor_ivf_list->PartnerName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_donor_ivf_list->PartnerName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_donor_ivf_list->PartnerID->Visible) { // PartnerID ?>
	<?php if ($view_donor_ivf_list->SortUrl($view_donor_ivf_list->PartnerID) == "") { ?>
		<th data-name="PartnerID" class="<?php echo $view_donor_ivf_list->PartnerID->headerCellClass() ?>"><div id="elh_view_donor_ivf_PartnerID" class="view_donor_ivf_PartnerID"><div class="ew-table-header-caption"><script id="tpc_view_donor_ivf_PartnerID" type="text/html"><?php echo $view_donor_ivf_list->PartnerID->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerID" class="<?php echo $view_donor_ivf_list->PartnerID->headerCellClass() ?>"><script id="tpc_view_donor_ivf_PartnerID" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_donor_ivf_list->SortUrl($view_donor_ivf_list->PartnerID) ?>', 1);"><div id="elh_view_donor_ivf_PartnerID" class="view_donor_ivf_PartnerID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_ivf_list->PartnerID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_donor_ivf_list->PartnerID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_donor_ivf_list->PartnerID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_donor_ivf_list->DrID->Visible) { // DrID ?>
	<?php if ($view_donor_ivf_list->SortUrl($view_donor_ivf_list->DrID) == "") { ?>
		<th data-name="DrID" class="<?php echo $view_donor_ivf_list->DrID->headerCellClass() ?>"><div id="elh_view_donor_ivf_DrID" class="view_donor_ivf_DrID"><div class="ew-table-header-caption"><script id="tpc_view_donor_ivf_DrID" type="text/html"><?php echo $view_donor_ivf_list->DrID->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="DrID" class="<?php echo $view_donor_ivf_list->DrID->headerCellClass() ?>"><script id="tpc_view_donor_ivf_DrID" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_donor_ivf_list->SortUrl($view_donor_ivf_list->DrID) ?>', 1);"><div id="elh_view_donor_ivf_DrID" class="view_donor_ivf_DrID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_ivf_list->DrID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_donor_ivf_list->DrID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_donor_ivf_list->DrID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_donor_ivf_list->DrDepartment->Visible) { // DrDepartment ?>
	<?php if ($view_donor_ivf_list->SortUrl($view_donor_ivf_list->DrDepartment) == "") { ?>
		<th data-name="DrDepartment" class="<?php echo $view_donor_ivf_list->DrDepartment->headerCellClass() ?>"><div id="elh_view_donor_ivf_DrDepartment" class="view_donor_ivf_DrDepartment"><div class="ew-table-header-caption"><script id="tpc_view_donor_ivf_DrDepartment" type="text/html"><?php echo $view_donor_ivf_list->DrDepartment->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="DrDepartment" class="<?php echo $view_donor_ivf_list->DrDepartment->headerCellClass() ?>"><script id="tpc_view_donor_ivf_DrDepartment" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_donor_ivf_list->SortUrl($view_donor_ivf_list->DrDepartment) ?>', 1);"><div id="elh_view_donor_ivf_DrDepartment" class="view_donor_ivf_DrDepartment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_ivf_list->DrDepartment->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_donor_ivf_list->DrDepartment->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_donor_ivf_list->DrDepartment->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_donor_ivf_list->Doctor->Visible) { // Doctor ?>
	<?php if ($view_donor_ivf_list->SortUrl($view_donor_ivf_list->Doctor) == "") { ?>
		<th data-name="Doctor" class="<?php echo $view_donor_ivf_list->Doctor->headerCellClass() ?>"><div id="elh_view_donor_ivf_Doctor" class="view_donor_ivf_Doctor"><div class="ew-table-header-caption"><script id="tpc_view_donor_ivf_Doctor" type="text/html"><?php echo $view_donor_ivf_list->Doctor->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="Doctor" class="<?php echo $view_donor_ivf_list->Doctor->headerCellClass() ?>"><script id="tpc_view_donor_ivf_Doctor" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_donor_ivf_list->SortUrl($view_donor_ivf_list->Doctor) ?>', 1);"><div id="elh_view_donor_ivf_Doctor" class="view_donor_ivf_Doctor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_ivf_list->Doctor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_donor_ivf_list->Doctor->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_donor_ivf_list->Doctor->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_donor_ivf_list->ListOptions->render("header", "right", "", "block", $view_donor_ivf->TableVar, "view_donor_ivflist");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_donor_ivf_list->ExportAll && $view_donor_ivf_list->isExport()) {
	$view_donor_ivf_list->StopRecord = $view_donor_ivf_list->TotalRecords;
} else {

	// Set the last record to display
	if ($view_donor_ivf_list->TotalRecords > $view_donor_ivf_list->StartRecord + $view_donor_ivf_list->DisplayRecords - 1)
		$view_donor_ivf_list->StopRecord = $view_donor_ivf_list->StartRecord + $view_donor_ivf_list->DisplayRecords - 1;
	else
		$view_donor_ivf_list->StopRecord = $view_donor_ivf_list->TotalRecords;
}
$view_donor_ivf_list->RecordCount = $view_donor_ivf_list->StartRecord - 1;
if ($view_donor_ivf_list->Recordset && !$view_donor_ivf_list->Recordset->EOF) {
	$view_donor_ivf_list->Recordset->moveFirst();
	$selectLimit = $view_donor_ivf_list->UseSelectLimit;
	if (!$selectLimit && $view_donor_ivf_list->StartRecord > 1)
		$view_donor_ivf_list->Recordset->move($view_donor_ivf_list->StartRecord - 1);
} elseif (!$view_donor_ivf->AllowAddDeleteRow && $view_donor_ivf_list->StopRecord == 0) {
	$view_donor_ivf_list->StopRecord = $view_donor_ivf->GridAddRowCount;
}

// Initialize aggregate
$view_donor_ivf->RowType = ROWTYPE_AGGREGATEINIT;
$view_donor_ivf->resetAttributes();
$view_donor_ivf_list->renderRow();
while ($view_donor_ivf_list->RecordCount < $view_donor_ivf_list->StopRecord) {
	$view_donor_ivf_list->RecordCount++;
	if ($view_donor_ivf_list->RecordCount >= $view_donor_ivf_list->StartRecord) {
		$view_donor_ivf_list->RowCount++;

		// Set up key count
		$view_donor_ivf_list->KeyCount = $view_donor_ivf_list->RowIndex;

		// Init row class and style
		$view_donor_ivf->resetAttributes();
		$view_donor_ivf->CssClass = "";
		if ($view_donor_ivf_list->isGridAdd()) {
		} else {
			$view_donor_ivf_list->loadRowValues($view_donor_ivf_list->Recordset); // Load row values
		}
		$view_donor_ivf->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_donor_ivf->RowAttrs->merge(["data-rowindex" => $view_donor_ivf_list->RowCount, "id" => "r" . $view_donor_ivf_list->RowCount . "_view_donor_ivf", "data-rowtype" => $view_donor_ivf->RowType]);

		// Render row
		$view_donor_ivf_list->renderRow();

		// Render list options
		$view_donor_ivf_list->renderListOptions();

		// Save row and cell attributes
		$view_donor_ivf_list->Attrs[$view_donor_ivf_list->RowCount] = ["row_attrs" => $view_donor_ivf->rowAttributes(), "cell_attrs" => []];
		$view_donor_ivf_list->Attrs[$view_donor_ivf_list->RowCount]["cell_attrs"] = $view_donor_ivf->fieldCellAttributes();
?>
	<tr <?php echo $view_donor_ivf->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_donor_ivf_list->ListOptions->render("body", "left", $view_donor_ivf_list->RowCount, "block", $view_donor_ivf->TableVar, "view_donor_ivflist");
?>
	<?php if ($view_donor_ivf_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $view_donor_ivf_list->id->cellAttributes() ?>>
<script id="tpx<?php echo $view_donor_ivf_list->RowCount ?>_view_donor_ivf_id" type="text/html"><span id="el<?php echo $view_donor_ivf_list->RowCount ?>_view_donor_ivf_id">
<span<?php echo $view_donor_ivf_list->id->viewAttributes() ?>><?php echo $view_donor_ivf_list->id->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_donor_ivf_list->Male->Visible) { // Male ?>
		<td data-name="Male" <?php echo $view_donor_ivf_list->Male->cellAttributes() ?>>
<script id="tpx<?php echo $view_donor_ivf_list->RowCount ?>_view_donor_ivf_Male" type="text/html"><span id="el<?php echo $view_donor_ivf_list->RowCount ?>_view_donor_ivf_Male">
<span<?php echo $view_donor_ivf_list->Male->viewAttributes() ?>><?php echo $view_donor_ivf_list->Male->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_donor_ivf_list->Female->Visible) { // Female ?>
		<td data-name="Female" <?php echo $view_donor_ivf_list->Female->cellAttributes() ?>>
<script id="tpx<?php echo $view_donor_ivf_list->RowCount ?>_view_donor_ivf_Female" type="text/html"><span id="el<?php echo $view_donor_ivf_list->RowCount ?>_view_donor_ivf_Female">
<span<?php echo $view_donor_ivf_list->Female->viewAttributes() ?>><?php echo $view_donor_ivf_list->Female->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_donor_ivf_list->status->Visible) { // status ?>
		<td data-name="status" <?php echo $view_donor_ivf_list->status->cellAttributes() ?>>
<script id="tpx<?php echo $view_donor_ivf_list->RowCount ?>_view_donor_ivf_status" type="text/html"><span id="el<?php echo $view_donor_ivf_list->RowCount ?>_view_donor_ivf_status">
<span<?php echo $view_donor_ivf_list->status->viewAttributes() ?>><?php echo $view_donor_ivf_list->status->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_donor_ivf_list->createdby->Visible) { // createdby ?>
		<td data-name="createdby" <?php echo $view_donor_ivf_list->createdby->cellAttributes() ?>>
<script id="tpx<?php echo $view_donor_ivf_list->RowCount ?>_view_donor_ivf_createdby" type="text/html"><span id="el<?php echo $view_donor_ivf_list->RowCount ?>_view_donor_ivf_createdby">
<span<?php echo $view_donor_ivf_list->createdby->viewAttributes() ?>><?php echo $view_donor_ivf_list->createdby->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_donor_ivf_list->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" <?php echo $view_donor_ivf_list->createddatetime->cellAttributes() ?>>
<script id="tpx<?php echo $view_donor_ivf_list->RowCount ?>_view_donor_ivf_createddatetime" type="text/html"><span id="el<?php echo $view_donor_ivf_list->RowCount ?>_view_donor_ivf_createddatetime">
<span<?php echo $view_donor_ivf_list->createddatetime->viewAttributes() ?>><?php echo $view_donor_ivf_list->createddatetime->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_donor_ivf_list->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby" <?php echo $view_donor_ivf_list->modifiedby->cellAttributes() ?>>
<script id="tpx<?php echo $view_donor_ivf_list->RowCount ?>_view_donor_ivf_modifiedby" type="text/html"><span id="el<?php echo $view_donor_ivf_list->RowCount ?>_view_donor_ivf_modifiedby">
<span<?php echo $view_donor_ivf_list->modifiedby->viewAttributes() ?>><?php echo $view_donor_ivf_list->modifiedby->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_donor_ivf_list->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime" <?php echo $view_donor_ivf_list->modifieddatetime->cellAttributes() ?>>
<script id="tpx<?php echo $view_donor_ivf_list->RowCount ?>_view_donor_ivf_modifieddatetime" type="text/html"><span id="el<?php echo $view_donor_ivf_list->RowCount ?>_view_donor_ivf_modifieddatetime">
<span<?php echo $view_donor_ivf_list->modifieddatetime->viewAttributes() ?>><?php echo $view_donor_ivf_list->modifieddatetime->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_donor_ivf_list->malepropic->Visible) { // malepropic ?>
		<td data-name="malepropic" <?php echo $view_donor_ivf_list->malepropic->cellAttributes() ?>>
<script id="tpx<?php echo $view_donor_ivf_list->RowCount ?>_view_donor_ivf_malepropic" type="text/html"><span id="el<?php echo $view_donor_ivf_list->RowCount ?>_view_donor_ivf_malepropic">
<span><?php echo GetFileViewTag($view_donor_ivf_list->malepropic, $view_donor_ivf_list->malepropic->getViewValue(), FALSE) ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_donor_ivf_list->femalepropic->Visible) { // femalepropic ?>
		<td data-name="femalepropic" <?php echo $view_donor_ivf_list->femalepropic->cellAttributes() ?>>
<script id="tpx<?php echo $view_donor_ivf_list->RowCount ?>_view_donor_ivf_femalepropic" type="text/html"><span id="el<?php echo $view_donor_ivf_list->RowCount ?>_view_donor_ivf_femalepropic">
<span><?php echo GetFileViewTag($view_donor_ivf_list->femalepropic, $view_donor_ivf_list->femalepropic->getViewValue(), FALSE) ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_donor_ivf_list->HusbandEducation->Visible) { // HusbandEducation ?>
		<td data-name="HusbandEducation" <?php echo $view_donor_ivf_list->HusbandEducation->cellAttributes() ?>>
<script id="tpx<?php echo $view_donor_ivf_list->RowCount ?>_view_donor_ivf_HusbandEducation" type="text/html"><span id="el<?php echo $view_donor_ivf_list->RowCount ?>_view_donor_ivf_HusbandEducation">
<span<?php echo $view_donor_ivf_list->HusbandEducation->viewAttributes() ?>><?php echo $view_donor_ivf_list->HusbandEducation->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_donor_ivf_list->WifeEducation->Visible) { // WifeEducation ?>
		<td data-name="WifeEducation" <?php echo $view_donor_ivf_list->WifeEducation->cellAttributes() ?>>
<script id="tpx<?php echo $view_donor_ivf_list->RowCount ?>_view_donor_ivf_WifeEducation" type="text/html"><span id="el<?php echo $view_donor_ivf_list->RowCount ?>_view_donor_ivf_WifeEducation">
<span<?php echo $view_donor_ivf_list->WifeEducation->viewAttributes() ?>><?php echo $view_donor_ivf_list->WifeEducation->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_donor_ivf_list->HusbandWorkHours->Visible) { // HusbandWorkHours ?>
		<td data-name="HusbandWorkHours" <?php echo $view_donor_ivf_list->HusbandWorkHours->cellAttributes() ?>>
<script id="tpx<?php echo $view_donor_ivf_list->RowCount ?>_view_donor_ivf_HusbandWorkHours" type="text/html"><span id="el<?php echo $view_donor_ivf_list->RowCount ?>_view_donor_ivf_HusbandWorkHours">
<span<?php echo $view_donor_ivf_list->HusbandWorkHours->viewAttributes() ?>><?php echo $view_donor_ivf_list->HusbandWorkHours->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_donor_ivf_list->WifeWorkHours->Visible) { // WifeWorkHours ?>
		<td data-name="WifeWorkHours" <?php echo $view_donor_ivf_list->WifeWorkHours->cellAttributes() ?>>
<script id="tpx<?php echo $view_donor_ivf_list->RowCount ?>_view_donor_ivf_WifeWorkHours" type="text/html"><span id="el<?php echo $view_donor_ivf_list->RowCount ?>_view_donor_ivf_WifeWorkHours">
<span<?php echo $view_donor_ivf_list->WifeWorkHours->viewAttributes() ?>><?php echo $view_donor_ivf_list->WifeWorkHours->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_donor_ivf_list->PatientLanguage->Visible) { // PatientLanguage ?>
		<td data-name="PatientLanguage" <?php echo $view_donor_ivf_list->PatientLanguage->cellAttributes() ?>>
<script id="tpx<?php echo $view_donor_ivf_list->RowCount ?>_view_donor_ivf_PatientLanguage" type="text/html"><span id="el<?php echo $view_donor_ivf_list->RowCount ?>_view_donor_ivf_PatientLanguage">
<span<?php echo $view_donor_ivf_list->PatientLanguage->viewAttributes() ?>><?php echo $view_donor_ivf_list->PatientLanguage->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_donor_ivf_list->ReferedBy->Visible) { // ReferedBy ?>
		<td data-name="ReferedBy" <?php echo $view_donor_ivf_list->ReferedBy->cellAttributes() ?>>
<script id="tpx<?php echo $view_donor_ivf_list->RowCount ?>_view_donor_ivf_ReferedBy" type="text/html"><span id="el<?php echo $view_donor_ivf_list->RowCount ?>_view_donor_ivf_ReferedBy">
<span<?php echo $view_donor_ivf_list->ReferedBy->viewAttributes() ?>><?php echo $view_donor_ivf_list->ReferedBy->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_donor_ivf_list->ReferPhNo->Visible) { // ReferPhNo ?>
		<td data-name="ReferPhNo" <?php echo $view_donor_ivf_list->ReferPhNo->cellAttributes() ?>>
<script id="tpx<?php echo $view_donor_ivf_list->RowCount ?>_view_donor_ivf_ReferPhNo" type="text/html"><span id="el<?php echo $view_donor_ivf_list->RowCount ?>_view_donor_ivf_ReferPhNo">
<span<?php echo $view_donor_ivf_list->ReferPhNo->viewAttributes() ?>><?php echo $view_donor_ivf_list->ReferPhNo->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_donor_ivf_list->WifeCell->Visible) { // WifeCell ?>
		<td data-name="WifeCell" <?php echo $view_donor_ivf_list->WifeCell->cellAttributes() ?>>
<script id="tpx<?php echo $view_donor_ivf_list->RowCount ?>_view_donor_ivf_WifeCell" type="text/html"><span id="el<?php echo $view_donor_ivf_list->RowCount ?>_view_donor_ivf_WifeCell">
<span<?php echo $view_donor_ivf_list->WifeCell->viewAttributes() ?>><?php echo $view_donor_ivf_list->WifeCell->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_donor_ivf_list->HusbandCell->Visible) { // HusbandCell ?>
		<td data-name="HusbandCell" <?php echo $view_donor_ivf_list->HusbandCell->cellAttributes() ?>>
<script id="tpx<?php echo $view_donor_ivf_list->RowCount ?>_view_donor_ivf_HusbandCell" type="text/html"><span id="el<?php echo $view_donor_ivf_list->RowCount ?>_view_donor_ivf_HusbandCell">
<span<?php echo $view_donor_ivf_list->HusbandCell->viewAttributes() ?>><?php echo $view_donor_ivf_list->HusbandCell->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_donor_ivf_list->WifeEmail->Visible) { // WifeEmail ?>
		<td data-name="WifeEmail" <?php echo $view_donor_ivf_list->WifeEmail->cellAttributes() ?>>
<script id="tpx<?php echo $view_donor_ivf_list->RowCount ?>_view_donor_ivf_WifeEmail" type="text/html"><span id="el<?php echo $view_donor_ivf_list->RowCount ?>_view_donor_ivf_WifeEmail">
<span<?php echo $view_donor_ivf_list->WifeEmail->viewAttributes() ?>><?php echo $view_donor_ivf_list->WifeEmail->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_donor_ivf_list->HusbandEmail->Visible) { // HusbandEmail ?>
		<td data-name="HusbandEmail" <?php echo $view_donor_ivf_list->HusbandEmail->cellAttributes() ?>>
<script id="tpx<?php echo $view_donor_ivf_list->RowCount ?>_view_donor_ivf_HusbandEmail" type="text/html"><span id="el<?php echo $view_donor_ivf_list->RowCount ?>_view_donor_ivf_HusbandEmail">
<span<?php echo $view_donor_ivf_list->HusbandEmail->viewAttributes() ?>><?php echo $view_donor_ivf_list->HusbandEmail->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_donor_ivf_list->ARTCYCLE->Visible) { // ARTCYCLE ?>
		<td data-name="ARTCYCLE" <?php echo $view_donor_ivf_list->ARTCYCLE->cellAttributes() ?>>
<script id="tpx<?php echo $view_donor_ivf_list->RowCount ?>_view_donor_ivf_ARTCYCLE" type="text/html"><span id="el<?php echo $view_donor_ivf_list->RowCount ?>_view_donor_ivf_ARTCYCLE">
<span<?php echo $view_donor_ivf_list->ARTCYCLE->viewAttributes() ?>><?php echo $view_donor_ivf_list->ARTCYCLE->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_donor_ivf_list->RESULT->Visible) { // RESULT ?>
		<td data-name="RESULT" <?php echo $view_donor_ivf_list->RESULT->cellAttributes() ?>>
<script id="tpx<?php echo $view_donor_ivf_list->RowCount ?>_view_donor_ivf_RESULT" type="text/html"><span id="el<?php echo $view_donor_ivf_list->RowCount ?>_view_donor_ivf_RESULT">
<span<?php echo $view_donor_ivf_list->RESULT->viewAttributes() ?>><?php echo $view_donor_ivf_list->RESULT->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_donor_ivf_list->CoupleID->Visible) { // CoupleID ?>
		<td data-name="CoupleID" <?php echo $view_donor_ivf_list->CoupleID->cellAttributes() ?>>
<script id="tpx<?php echo $view_donor_ivf_list->RowCount ?>_view_donor_ivf_CoupleID" type="text/html"><span id="el<?php echo $view_donor_ivf_list->RowCount ?>_view_donor_ivf_CoupleID">
<span<?php echo $view_donor_ivf_list->CoupleID->viewAttributes() ?>><?php echo $view_donor_ivf_list->CoupleID->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_donor_ivf_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $view_donor_ivf_list->HospID->cellAttributes() ?>>
<script id="tpx<?php echo $view_donor_ivf_list->RowCount ?>_view_donor_ivf_HospID" type="text/html"><span id="el<?php echo $view_donor_ivf_list->RowCount ?>_view_donor_ivf_HospID">
<span<?php echo $view_donor_ivf_list->HospID->viewAttributes() ?>><?php echo $view_donor_ivf_list->HospID->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_donor_ivf_list->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName" <?php echo $view_donor_ivf_list->PatientName->cellAttributes() ?>>
<script id="tpx<?php echo $view_donor_ivf_list->RowCount ?>_view_donor_ivf_PatientName" type="text/html"><span id="el<?php echo $view_donor_ivf_list->RowCount ?>_view_donor_ivf_PatientName">
<span<?php echo $view_donor_ivf_list->PatientName->viewAttributes() ?>><?php echo $view_donor_ivf_list->PatientName->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_donor_ivf_list->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID" <?php echo $view_donor_ivf_list->PatientID->cellAttributes() ?>>
<script id="tpx<?php echo $view_donor_ivf_list->RowCount ?>_view_donor_ivf_PatientID" type="text/html"><span id="el<?php echo $view_donor_ivf_list->RowCount ?>_view_donor_ivf_PatientID">
<span<?php echo $view_donor_ivf_list->PatientID->viewAttributes() ?>><?php echo $view_donor_ivf_list->PatientID->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_donor_ivf_list->PartnerName->Visible) { // PartnerName ?>
		<td data-name="PartnerName" <?php echo $view_donor_ivf_list->PartnerName->cellAttributes() ?>>
<script id="tpx<?php echo $view_donor_ivf_list->RowCount ?>_view_donor_ivf_PartnerName" type="text/html"><span id="el<?php echo $view_donor_ivf_list->RowCount ?>_view_donor_ivf_PartnerName">
<span<?php echo $view_donor_ivf_list->PartnerName->viewAttributes() ?>><?php echo $view_donor_ivf_list->PartnerName->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_donor_ivf_list->PartnerID->Visible) { // PartnerID ?>
		<td data-name="PartnerID" <?php echo $view_donor_ivf_list->PartnerID->cellAttributes() ?>>
<script id="tpx<?php echo $view_donor_ivf_list->RowCount ?>_view_donor_ivf_PartnerID" type="text/html"><span id="el<?php echo $view_donor_ivf_list->RowCount ?>_view_donor_ivf_PartnerID">
<span<?php echo $view_donor_ivf_list->PartnerID->viewAttributes() ?>><?php echo $view_donor_ivf_list->PartnerID->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_donor_ivf_list->DrID->Visible) { // DrID ?>
		<td data-name="DrID" <?php echo $view_donor_ivf_list->DrID->cellAttributes() ?>>
<script id="tpx<?php echo $view_donor_ivf_list->RowCount ?>_view_donor_ivf_DrID" type="text/html"><span id="el<?php echo $view_donor_ivf_list->RowCount ?>_view_donor_ivf_DrID">
<span<?php echo $view_donor_ivf_list->DrID->viewAttributes() ?>><?php echo $view_donor_ivf_list->DrID->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_donor_ivf_list->DrDepartment->Visible) { // DrDepartment ?>
		<td data-name="DrDepartment" <?php echo $view_donor_ivf_list->DrDepartment->cellAttributes() ?>>
<script id="tpx<?php echo $view_donor_ivf_list->RowCount ?>_view_donor_ivf_DrDepartment" type="text/html"><span id="el<?php echo $view_donor_ivf_list->RowCount ?>_view_donor_ivf_DrDepartment">
<span<?php echo $view_donor_ivf_list->DrDepartment->viewAttributes() ?>><?php echo $view_donor_ivf_list->DrDepartment->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_donor_ivf_list->Doctor->Visible) { // Doctor ?>
		<td data-name="Doctor" <?php echo $view_donor_ivf_list->Doctor->cellAttributes() ?>>
<script id="tpx<?php echo $view_donor_ivf_list->RowCount ?>_view_donor_ivf_Doctor" type="text/html"><span id="el<?php echo $view_donor_ivf_list->RowCount ?>_view_donor_ivf_Doctor">
<span<?php echo $view_donor_ivf_list->Doctor->viewAttributes() ?>><?php echo $view_donor_ivf_list->Doctor->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_donor_ivf_list->ListOptions->render("body", "right", $view_donor_ivf_list->RowCount, "block", $view_donor_ivf->TableVar, "view_donor_ivflist");
?>
	</tr>
<?php
	}
	if (!$view_donor_ivf_list->isGridAdd())
		$view_donor_ivf_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<div id="tpd_view_donor_ivflist" class="ew-custom-template"></div>
<script id="tpm_view_donor_ivflist" type="text/html">
<div id="ct_view_donor_ivf_list"><?php if ($view_donor_ivf_list->RowCount > 0) { ?>
<table cellspacing="0" class="ew-table ew-table-separate">
	<thead>
	<tr class="ew-table-header">
	{{include tmpl=~getTemplate("#tpoh_view_donor_ivf")/}}
	<td rowspan="2">Home</td>
	<td rowspan="2">{{include tmpl=~getTemplate("#tpc_view_donor_ivf_CoupleID")/}}</td>
		<td rowspan="2">{{include tmpl=~getTemplate("#tpc_view_donor_ivf_femalepropic")/}}</td>
	<td rowspan="2">{{include tmpl=~getTemplate("#tpc_view_donor_ivf_Female")/}}</td>
				<td>{{include tmpl=~getTemplate("#tpc_view_donor_ivf_ARTCYCLE")/}}</td>
					<td>{{include tmpl=~getTemplate("#tpc_view_donor_ivf_status")/}}</td>
	</tr>
	<tr class="ew-table-header">
				<td>{{include tmpl=~getTemplate("#tpc_view_donor_ivf_RESULT")/}}</td>
					<td>{{include tmpl=~getTemplate("#tpc_view_donor_ivf_ReferedBy")/}}</td>
	</tr>    
	</thead>          
	<tbody>  
<?php for ($i = $view_donor_ivf_list->StartRowCount; $i <= $view_donor_ivf_list->RowCount; $i++) { ?>
<tr<?php echo @$view_donor_ivf_list->Attrs[$i]['row_attrs'] ?>> 
	{{include tmpl=~getTemplate("#tpob<?php echo $i ?>_view_donor_ivf")/}}
	<td rowspan="2">
				<a class="btn btn-app" href="donorivf.php?id={{: ~root.rows[<?php echo $i - 1 ?>].id }}">
				  <i class="fas fa-user-md"></i> Start
				</a>
	</td>
	<td rowspan="2">{{include tmpl=~getTemplate("#tpx<?php echo $i ?>_view_donor_ivf_CoupleID")/}}</td>
		<td rowspan="2">{{include tmpl=~getTemplate("#tpx<?php echo $i ?>_view_donor_ivf_femalepropic")/}}</td>
	<td rowspan="2">{{include tmpl=~getTemplate("#tpx<?php echo $i ?>_view_donor_ivf_Female")/}}</td>
				<td>{{include tmpl=~getTemplate("#tpx<?php echo $i ?>_view_donor_ivf_ARTCYCLE")/}}</td>
					<td>{{include tmpl=~getTemplate("#tpx<?php echo $i ?>_view_donor_ivf_status")/}}</td>
</tr>
<tr<?php echo @$view_donor_ivf_list->Attrs[$i]['row_attrs'] ?>>
				<td>{{include tmpl=~getTemplate("#tpx<?php echo $i ?>_view_donor_ivf_RESULT")/}}</td>
					<td>{{include tmpl=~getTemplate("#tpx<?php echo $i ?>_view_donor_ivf_ReferedBy")/}}</td>
</tr>

<?php } ?>
	</tbody>
	<!-- <?php if ($view_donor_ivf_list->TotalRecords > 0 && !$view_donor_ivf->isGridAdd() && !$view_donor_ivf->isGridEdit()) { ?>
<tfoot><tr class="ew-table-footer">{{include tmpl=~getTemplate("#tpof_view_donor_ivf")/}}<td>{{include tmpl=~getTemplate("#tpg_MyField1")/}}</td><td>&nbsp;</td></tr></tfoot>
<?php } ?> -->
</table>
<?php } ?>
</div>
</script>

</div><!-- /.ew-grid-middle-panel -->
<?php if (!$view_donor_ivf->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_donor_ivf_list->Recordset)
	$view_donor_ivf_list->Recordset->Close();
?>
<?php if (!$view_donor_ivf_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_donor_ivf_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_donor_ivf_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_donor_ivf_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_donor_ivf_list->TotalRecords == 0 && !$view_donor_ivf->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_donor_ivf_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($view_donor_ivf->Rows) ?> };
	ew.applyTemplate("tpd_view_donor_ivflist", "tpm_view_donor_ivflist", "view_donor_ivflist", "<?php echo $view_donor_ivf->CustomExport ?>", ew.templateData);
	$("#tpd_view_donor_ivflist th.ew-list-option-header").each(function() {
		this.rowSpan = 2;
	});
	$("#tpd_view_donor_ivflist td.ew-list-option-body").each(function() {
		this.rowSpan = 2;
	});
	$("script.view_donor_ivflist_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$view_donor_ivf_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_donor_ivf_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$view_donor_ivf->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_view_donor_ivf",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$view_donor_ivf_list->terminate();
?>
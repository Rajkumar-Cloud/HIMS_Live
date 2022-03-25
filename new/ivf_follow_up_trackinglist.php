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
$ivf_follow_up_tracking_list = new ivf_follow_up_tracking_list();

// Run the page
$ivf_follow_up_tracking_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_follow_up_tracking_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$ivf_follow_up_tracking_list->isExport()) { ?>
<script>
var fivf_follow_up_trackinglist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fivf_follow_up_trackinglist = currentForm = new ew.Form("fivf_follow_up_trackinglist", "list");
	fivf_follow_up_trackinglist.formKeyCountName = '<?php echo $ivf_follow_up_tracking_list->FormKeyCountName ?>';
	loadjs.done("fivf_follow_up_trackinglist");
});
var fivf_follow_up_trackinglistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fivf_follow_up_trackinglistsrch = currentSearchForm = new ew.Form("fivf_follow_up_trackinglistsrch");

	// Dynamic selection lists
	// Filters

	fivf_follow_up_trackinglistsrch.filterList = <?php echo $ivf_follow_up_tracking_list->getFilterList() ?>;
	loadjs.done("fivf_follow_up_trackinglistsrch");
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
<?php if (!$ivf_follow_up_tracking_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($ivf_follow_up_tracking_list->TotalRecords > 0 && $ivf_follow_up_tracking_list->ExportOptions->visible()) { ?>
<?php $ivf_follow_up_tracking_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_follow_up_tracking_list->ImportOptions->visible()) { ?>
<?php $ivf_follow_up_tracking_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_follow_up_tracking_list->SearchOptions->visible()) { ?>
<?php $ivf_follow_up_tracking_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_follow_up_tracking_list->FilterOptions->visible()) { ?>
<?php $ivf_follow_up_tracking_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$ivf_follow_up_tracking_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$ivf_follow_up_tracking_list->isExport() && !$ivf_follow_up_tracking->CurrentAction) { ?>
<form name="fivf_follow_up_trackinglistsrch" id="fivf_follow_up_trackinglistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fivf_follow_up_trackinglistsrch-search-panel" class="<?php echo $ivf_follow_up_tracking_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="ivf_follow_up_tracking">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $ivf_follow_up_tracking_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($ivf_follow_up_tracking_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($ivf_follow_up_tracking_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $ivf_follow_up_tracking_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($ivf_follow_up_tracking_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($ivf_follow_up_tracking_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($ivf_follow_up_tracking_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($ivf_follow_up_tracking_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $ivf_follow_up_tracking_list->showPageHeader(); ?>
<?php
$ivf_follow_up_tracking_list->showMessage();
?>
<?php if ($ivf_follow_up_tracking_list->TotalRecords > 0 || $ivf_follow_up_tracking->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($ivf_follow_up_tracking_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf_follow_up_tracking">
<?php if (!$ivf_follow_up_tracking_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$ivf_follow_up_tracking_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $ivf_follow_up_tracking_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ivf_follow_up_tracking_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fivf_follow_up_trackinglist" id="fivf_follow_up_trackinglist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_follow_up_tracking">
<div id="gmp_ivf_follow_up_tracking" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($ivf_follow_up_tracking_list->TotalRecords > 0 || $ivf_follow_up_tracking_list->isGridEdit()) { ?>
<table id="tbl_ivf_follow_up_trackinglist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$ivf_follow_up_tracking->RowType = ROWTYPE_HEADER;

// Render list options
$ivf_follow_up_tracking_list->renderListOptions();

// Render list options (header, left)
$ivf_follow_up_tracking_list->ListOptions->render("header", "left");
?>
<?php if ($ivf_follow_up_tracking_list->id->Visible) { // id ?>
	<?php if ($ivf_follow_up_tracking_list->SortUrl($ivf_follow_up_tracking_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $ivf_follow_up_tracking_list->id->headerCellClass() ?>"><div id="elh_ivf_follow_up_tracking_id" class="ivf_follow_up_tracking_id"><div class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $ivf_follow_up_tracking_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_follow_up_tracking_list->SortUrl($ivf_follow_up_tracking_list->id) ?>', 1);"><div id="elh_ivf_follow_up_tracking_id" class="ivf_follow_up_tracking_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_follow_up_tracking_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_follow_up_tracking_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_follow_up_tracking_list->RIDNO->Visible) { // RIDNO ?>
	<?php if ($ivf_follow_up_tracking_list->SortUrl($ivf_follow_up_tracking_list->RIDNO) == "") { ?>
		<th data-name="RIDNO" class="<?php echo $ivf_follow_up_tracking_list->RIDNO->headerCellClass() ?>"><div id="elh_ivf_follow_up_tracking_RIDNO" class="ivf_follow_up_tracking_RIDNO"><div class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking_list->RIDNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RIDNO" class="<?php echo $ivf_follow_up_tracking_list->RIDNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_follow_up_tracking_list->SortUrl($ivf_follow_up_tracking_list->RIDNO) ?>', 1);"><div id="elh_ivf_follow_up_tracking_RIDNO" class="ivf_follow_up_tracking_RIDNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking_list->RIDNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_follow_up_tracking_list->RIDNO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_follow_up_tracking_list->RIDNO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_follow_up_tracking_list->Name->Visible) { // Name ?>
	<?php if ($ivf_follow_up_tracking_list->SortUrl($ivf_follow_up_tracking_list->Name) == "") { ?>
		<th data-name="Name" class="<?php echo $ivf_follow_up_tracking_list->Name->headerCellClass() ?>"><div id="elh_ivf_follow_up_tracking_Name" class="ivf_follow_up_tracking_Name"><div class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking_list->Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Name" class="<?php echo $ivf_follow_up_tracking_list->Name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_follow_up_tracking_list->SortUrl($ivf_follow_up_tracking_list->Name) ?>', 1);"><div id="elh_ivf_follow_up_tracking_Name" class="ivf_follow_up_tracking_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking_list->Name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_follow_up_tracking_list->Name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_follow_up_tracking_list->Name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_follow_up_tracking_list->Age->Visible) { // Age ?>
	<?php if ($ivf_follow_up_tracking_list->SortUrl($ivf_follow_up_tracking_list->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $ivf_follow_up_tracking_list->Age->headerCellClass() ?>"><div id="elh_ivf_follow_up_tracking_Age" class="ivf_follow_up_tracking_Age"><div class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking_list->Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $ivf_follow_up_tracking_list->Age->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_follow_up_tracking_list->SortUrl($ivf_follow_up_tracking_list->Age) ?>', 1);"><div id="elh_ivf_follow_up_tracking_Age" class="ivf_follow_up_tracking_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking_list->Age->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_follow_up_tracking_list->Age->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_follow_up_tracking_list->Age->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_follow_up_tracking_list->MReadMore->Visible) { // MReadMore ?>
	<?php if ($ivf_follow_up_tracking_list->SortUrl($ivf_follow_up_tracking_list->MReadMore) == "") { ?>
		<th data-name="MReadMore" class="<?php echo $ivf_follow_up_tracking_list->MReadMore->headerCellClass() ?>"><div id="elh_ivf_follow_up_tracking_MReadMore" class="ivf_follow_up_tracking_MReadMore"><div class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking_list->MReadMore->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MReadMore" class="<?php echo $ivf_follow_up_tracking_list->MReadMore->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_follow_up_tracking_list->SortUrl($ivf_follow_up_tracking_list->MReadMore) ?>', 1);"><div id="elh_ivf_follow_up_tracking_MReadMore" class="ivf_follow_up_tracking_MReadMore">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking_list->MReadMore->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_follow_up_tracking_list->MReadMore->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_follow_up_tracking_list->MReadMore->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_follow_up_tracking_list->status->Visible) { // status ?>
	<?php if ($ivf_follow_up_tracking_list->SortUrl($ivf_follow_up_tracking_list->status) == "") { ?>
		<th data-name="status" class="<?php echo $ivf_follow_up_tracking_list->status->headerCellClass() ?>"><div id="elh_ivf_follow_up_tracking_status" class="ivf_follow_up_tracking_status"><div class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking_list->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $ivf_follow_up_tracking_list->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_follow_up_tracking_list->SortUrl($ivf_follow_up_tracking_list->status) ?>', 1);"><div id="elh_ivf_follow_up_tracking_status" class="ivf_follow_up_tracking_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking_list->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_follow_up_tracking_list->status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_follow_up_tracking_list->status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_follow_up_tracking_list->createdby->Visible) { // createdby ?>
	<?php if ($ivf_follow_up_tracking_list->SortUrl($ivf_follow_up_tracking_list->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $ivf_follow_up_tracking_list->createdby->headerCellClass() ?>"><div id="elh_ivf_follow_up_tracking_createdby" class="ivf_follow_up_tracking_createdby"><div class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking_list->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $ivf_follow_up_tracking_list->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_follow_up_tracking_list->SortUrl($ivf_follow_up_tracking_list->createdby) ?>', 1);"><div id="elh_ivf_follow_up_tracking_createdby" class="ivf_follow_up_tracking_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking_list->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_follow_up_tracking_list->createdby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_follow_up_tracking_list->createdby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_follow_up_tracking_list->createddatetime->Visible) { // createddatetime ?>
	<?php if ($ivf_follow_up_tracking_list->SortUrl($ivf_follow_up_tracking_list->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $ivf_follow_up_tracking_list->createddatetime->headerCellClass() ?>"><div id="elh_ivf_follow_up_tracking_createddatetime" class="ivf_follow_up_tracking_createddatetime"><div class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking_list->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $ivf_follow_up_tracking_list->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_follow_up_tracking_list->SortUrl($ivf_follow_up_tracking_list->createddatetime) ?>', 1);"><div id="elh_ivf_follow_up_tracking_createddatetime" class="ivf_follow_up_tracking_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking_list->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_follow_up_tracking_list->createddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_follow_up_tracking_list->createddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_follow_up_tracking_list->modifiedby->Visible) { // modifiedby ?>
	<?php if ($ivf_follow_up_tracking_list->SortUrl($ivf_follow_up_tracking_list->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $ivf_follow_up_tracking_list->modifiedby->headerCellClass() ?>"><div id="elh_ivf_follow_up_tracking_modifiedby" class="ivf_follow_up_tracking_modifiedby"><div class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking_list->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $ivf_follow_up_tracking_list->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_follow_up_tracking_list->SortUrl($ivf_follow_up_tracking_list->modifiedby) ?>', 1);"><div id="elh_ivf_follow_up_tracking_modifiedby" class="ivf_follow_up_tracking_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking_list->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_follow_up_tracking_list->modifiedby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_follow_up_tracking_list->modifiedby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_follow_up_tracking_list->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($ivf_follow_up_tracking_list->SortUrl($ivf_follow_up_tracking_list->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $ivf_follow_up_tracking_list->modifieddatetime->headerCellClass() ?>"><div id="elh_ivf_follow_up_tracking_modifieddatetime" class="ivf_follow_up_tracking_modifieddatetime"><div class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking_list->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $ivf_follow_up_tracking_list->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_follow_up_tracking_list->SortUrl($ivf_follow_up_tracking_list->modifieddatetime) ?>', 1);"><div id="elh_ivf_follow_up_tracking_modifieddatetime" class="ivf_follow_up_tracking_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking_list->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_follow_up_tracking_list->modifieddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_follow_up_tracking_list->modifieddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_follow_up_tracking_list->TidNo->Visible) { // TidNo ?>
	<?php if ($ivf_follow_up_tracking_list->SortUrl($ivf_follow_up_tracking_list->TidNo) == "") { ?>
		<th data-name="TidNo" class="<?php echo $ivf_follow_up_tracking_list->TidNo->headerCellClass() ?>"><div id="elh_ivf_follow_up_tracking_TidNo" class="ivf_follow_up_tracking_TidNo"><div class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking_list->TidNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TidNo" class="<?php echo $ivf_follow_up_tracking_list->TidNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_follow_up_tracking_list->SortUrl($ivf_follow_up_tracking_list->TidNo) ?>', 1);"><div id="elh_ivf_follow_up_tracking_TidNo" class="ivf_follow_up_tracking_TidNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking_list->TidNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_follow_up_tracking_list->TidNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_follow_up_tracking_list->TidNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_follow_up_tracking_list->createdUserName->Visible) { // createdUserName ?>
	<?php if ($ivf_follow_up_tracking_list->SortUrl($ivf_follow_up_tracking_list->createdUserName) == "") { ?>
		<th data-name="createdUserName" class="<?php echo $ivf_follow_up_tracking_list->createdUserName->headerCellClass() ?>"><div id="elh_ivf_follow_up_tracking_createdUserName" class="ivf_follow_up_tracking_createdUserName"><div class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking_list->createdUserName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdUserName" class="<?php echo $ivf_follow_up_tracking_list->createdUserName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_follow_up_tracking_list->SortUrl($ivf_follow_up_tracking_list->createdUserName) ?>', 1);"><div id="elh_ivf_follow_up_tracking_createdUserName" class="ivf_follow_up_tracking_createdUserName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking_list->createdUserName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_follow_up_tracking_list->createdUserName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_follow_up_tracking_list->createdUserName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_follow_up_tracking_list->FollowUpDate->Visible) { // FollowUpDate ?>
	<?php if ($ivf_follow_up_tracking_list->SortUrl($ivf_follow_up_tracking_list->FollowUpDate) == "") { ?>
		<th data-name="FollowUpDate" class="<?php echo $ivf_follow_up_tracking_list->FollowUpDate->headerCellClass() ?>"><div id="elh_ivf_follow_up_tracking_FollowUpDate" class="ivf_follow_up_tracking_FollowUpDate"><div class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking_list->FollowUpDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FollowUpDate" class="<?php echo $ivf_follow_up_tracking_list->FollowUpDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_follow_up_tracking_list->SortUrl($ivf_follow_up_tracking_list->FollowUpDate) ?>', 1);"><div id="elh_ivf_follow_up_tracking_FollowUpDate" class="ivf_follow_up_tracking_FollowUpDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking_list->FollowUpDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_follow_up_tracking_list->FollowUpDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_follow_up_tracking_list->FollowUpDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_follow_up_tracking_list->NextVistDate->Visible) { // NextVistDate ?>
	<?php if ($ivf_follow_up_tracking_list->SortUrl($ivf_follow_up_tracking_list->NextVistDate) == "") { ?>
		<th data-name="NextVistDate" class="<?php echo $ivf_follow_up_tracking_list->NextVistDate->headerCellClass() ?>"><div id="elh_ivf_follow_up_tracking_NextVistDate" class="ivf_follow_up_tracking_NextVistDate"><div class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking_list->NextVistDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NextVistDate" class="<?php echo $ivf_follow_up_tracking_list->NextVistDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_follow_up_tracking_list->SortUrl($ivf_follow_up_tracking_list->NextVistDate) ?>', 1);"><div id="elh_ivf_follow_up_tracking_NextVistDate" class="ivf_follow_up_tracking_NextVistDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking_list->NextVistDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_follow_up_tracking_list->NextVistDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_follow_up_tracking_list->NextVistDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_follow_up_tracking_list->HospID->Visible) { // HospID ?>
	<?php if ($ivf_follow_up_tracking_list->SortUrl($ivf_follow_up_tracking_list->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $ivf_follow_up_tracking_list->HospID->headerCellClass() ?>"><div id="elh_ivf_follow_up_tracking_HospID" class="ivf_follow_up_tracking_HospID"><div class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking_list->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $ivf_follow_up_tracking_list->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_follow_up_tracking_list->SortUrl($ivf_follow_up_tracking_list->HospID) ?>', 1);"><div id="elh_ivf_follow_up_tracking_HospID" class="ivf_follow_up_tracking_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking_list->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_follow_up_tracking_list->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_follow_up_tracking_list->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$ivf_follow_up_tracking_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($ivf_follow_up_tracking_list->ExportAll && $ivf_follow_up_tracking_list->isExport()) {
	$ivf_follow_up_tracking_list->StopRecord = $ivf_follow_up_tracking_list->TotalRecords;
} else {

	// Set the last record to display
	if ($ivf_follow_up_tracking_list->TotalRecords > $ivf_follow_up_tracking_list->StartRecord + $ivf_follow_up_tracking_list->DisplayRecords - 1)
		$ivf_follow_up_tracking_list->StopRecord = $ivf_follow_up_tracking_list->StartRecord + $ivf_follow_up_tracking_list->DisplayRecords - 1;
	else
		$ivf_follow_up_tracking_list->StopRecord = $ivf_follow_up_tracking_list->TotalRecords;
}
$ivf_follow_up_tracking_list->RecordCount = $ivf_follow_up_tracking_list->StartRecord - 1;
if ($ivf_follow_up_tracking_list->Recordset && !$ivf_follow_up_tracking_list->Recordset->EOF) {
	$ivf_follow_up_tracking_list->Recordset->moveFirst();
	$selectLimit = $ivf_follow_up_tracking_list->UseSelectLimit;
	if (!$selectLimit && $ivf_follow_up_tracking_list->StartRecord > 1)
		$ivf_follow_up_tracking_list->Recordset->move($ivf_follow_up_tracking_list->StartRecord - 1);
} elseif (!$ivf_follow_up_tracking->AllowAddDeleteRow && $ivf_follow_up_tracking_list->StopRecord == 0) {
	$ivf_follow_up_tracking_list->StopRecord = $ivf_follow_up_tracking->GridAddRowCount;
}

// Initialize aggregate
$ivf_follow_up_tracking->RowType = ROWTYPE_AGGREGATEINIT;
$ivf_follow_up_tracking->resetAttributes();
$ivf_follow_up_tracking_list->renderRow();
while ($ivf_follow_up_tracking_list->RecordCount < $ivf_follow_up_tracking_list->StopRecord) {
	$ivf_follow_up_tracking_list->RecordCount++;
	if ($ivf_follow_up_tracking_list->RecordCount >= $ivf_follow_up_tracking_list->StartRecord) {
		$ivf_follow_up_tracking_list->RowCount++;

		// Set up key count
		$ivf_follow_up_tracking_list->KeyCount = $ivf_follow_up_tracking_list->RowIndex;

		// Init row class and style
		$ivf_follow_up_tracking->resetAttributes();
		$ivf_follow_up_tracking->CssClass = "";
		if ($ivf_follow_up_tracking_list->isGridAdd()) {
		} else {
			$ivf_follow_up_tracking_list->loadRowValues($ivf_follow_up_tracking_list->Recordset); // Load row values
		}
		$ivf_follow_up_tracking->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$ivf_follow_up_tracking->RowAttrs->merge(["data-rowindex" => $ivf_follow_up_tracking_list->RowCount, "id" => "r" . $ivf_follow_up_tracking_list->RowCount . "_ivf_follow_up_tracking", "data-rowtype" => $ivf_follow_up_tracking->RowType]);

		// Render row
		$ivf_follow_up_tracking_list->renderRow();

		// Render list options
		$ivf_follow_up_tracking_list->renderListOptions();
?>
	<tr <?php echo $ivf_follow_up_tracking->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_follow_up_tracking_list->ListOptions->render("body", "left", $ivf_follow_up_tracking_list->RowCount);
?>
	<?php if ($ivf_follow_up_tracking_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $ivf_follow_up_tracking_list->id->cellAttributes() ?>>
<span id="el<?php echo $ivf_follow_up_tracking_list->RowCount ?>_ivf_follow_up_tracking_id">
<span<?php echo $ivf_follow_up_tracking_list->id->viewAttributes() ?>><?php echo $ivf_follow_up_tracking_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_follow_up_tracking_list->RIDNO->Visible) { // RIDNO ?>
		<td data-name="RIDNO" <?php echo $ivf_follow_up_tracking_list->RIDNO->cellAttributes() ?>>
<span id="el<?php echo $ivf_follow_up_tracking_list->RowCount ?>_ivf_follow_up_tracking_RIDNO">
<span<?php echo $ivf_follow_up_tracking_list->RIDNO->viewAttributes() ?>><?php echo $ivf_follow_up_tracking_list->RIDNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_follow_up_tracking_list->Name->Visible) { // Name ?>
		<td data-name="Name" <?php echo $ivf_follow_up_tracking_list->Name->cellAttributes() ?>>
<span id="el<?php echo $ivf_follow_up_tracking_list->RowCount ?>_ivf_follow_up_tracking_Name">
<span<?php echo $ivf_follow_up_tracking_list->Name->viewAttributes() ?>><?php echo $ivf_follow_up_tracking_list->Name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_follow_up_tracking_list->Age->Visible) { // Age ?>
		<td data-name="Age" <?php echo $ivf_follow_up_tracking_list->Age->cellAttributes() ?>>
<span id="el<?php echo $ivf_follow_up_tracking_list->RowCount ?>_ivf_follow_up_tracking_Age">
<span<?php echo $ivf_follow_up_tracking_list->Age->viewAttributes() ?>><?php echo $ivf_follow_up_tracking_list->Age->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_follow_up_tracking_list->MReadMore->Visible) { // MReadMore ?>
		<td data-name="MReadMore" <?php echo $ivf_follow_up_tracking_list->MReadMore->cellAttributes() ?>>
<span id="el<?php echo $ivf_follow_up_tracking_list->RowCount ?>_ivf_follow_up_tracking_MReadMore">
<span<?php echo $ivf_follow_up_tracking_list->MReadMore->viewAttributes() ?>><?php echo $ivf_follow_up_tracking_list->MReadMore->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_follow_up_tracking_list->status->Visible) { // status ?>
		<td data-name="status" <?php echo $ivf_follow_up_tracking_list->status->cellAttributes() ?>>
<span id="el<?php echo $ivf_follow_up_tracking_list->RowCount ?>_ivf_follow_up_tracking_status">
<span<?php echo $ivf_follow_up_tracking_list->status->viewAttributes() ?>><?php echo $ivf_follow_up_tracking_list->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_follow_up_tracking_list->createdby->Visible) { // createdby ?>
		<td data-name="createdby" <?php echo $ivf_follow_up_tracking_list->createdby->cellAttributes() ?>>
<span id="el<?php echo $ivf_follow_up_tracking_list->RowCount ?>_ivf_follow_up_tracking_createdby">
<span<?php echo $ivf_follow_up_tracking_list->createdby->viewAttributes() ?>><?php echo $ivf_follow_up_tracking_list->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_follow_up_tracking_list->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" <?php echo $ivf_follow_up_tracking_list->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $ivf_follow_up_tracking_list->RowCount ?>_ivf_follow_up_tracking_createddatetime">
<span<?php echo $ivf_follow_up_tracking_list->createddatetime->viewAttributes() ?>><?php echo $ivf_follow_up_tracking_list->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_follow_up_tracking_list->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby" <?php echo $ivf_follow_up_tracking_list->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $ivf_follow_up_tracking_list->RowCount ?>_ivf_follow_up_tracking_modifiedby">
<span<?php echo $ivf_follow_up_tracking_list->modifiedby->viewAttributes() ?>><?php echo $ivf_follow_up_tracking_list->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_follow_up_tracking_list->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime" <?php echo $ivf_follow_up_tracking_list->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $ivf_follow_up_tracking_list->RowCount ?>_ivf_follow_up_tracking_modifieddatetime">
<span<?php echo $ivf_follow_up_tracking_list->modifieddatetime->viewAttributes() ?>><?php echo $ivf_follow_up_tracking_list->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_follow_up_tracking_list->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo" <?php echo $ivf_follow_up_tracking_list->TidNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_follow_up_tracking_list->RowCount ?>_ivf_follow_up_tracking_TidNo">
<span<?php echo $ivf_follow_up_tracking_list->TidNo->viewAttributes() ?>><?php echo $ivf_follow_up_tracking_list->TidNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_follow_up_tracking_list->createdUserName->Visible) { // createdUserName ?>
		<td data-name="createdUserName" <?php echo $ivf_follow_up_tracking_list->createdUserName->cellAttributes() ?>>
<span id="el<?php echo $ivf_follow_up_tracking_list->RowCount ?>_ivf_follow_up_tracking_createdUserName">
<span<?php echo $ivf_follow_up_tracking_list->createdUserName->viewAttributes() ?>><?php echo $ivf_follow_up_tracking_list->createdUserName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_follow_up_tracking_list->FollowUpDate->Visible) { // FollowUpDate ?>
		<td data-name="FollowUpDate" <?php echo $ivf_follow_up_tracking_list->FollowUpDate->cellAttributes() ?>>
<span id="el<?php echo $ivf_follow_up_tracking_list->RowCount ?>_ivf_follow_up_tracking_FollowUpDate">
<span<?php echo $ivf_follow_up_tracking_list->FollowUpDate->viewAttributes() ?>><?php echo $ivf_follow_up_tracking_list->FollowUpDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_follow_up_tracking_list->NextVistDate->Visible) { // NextVistDate ?>
		<td data-name="NextVistDate" <?php echo $ivf_follow_up_tracking_list->NextVistDate->cellAttributes() ?>>
<span id="el<?php echo $ivf_follow_up_tracking_list->RowCount ?>_ivf_follow_up_tracking_NextVistDate">
<span<?php echo $ivf_follow_up_tracking_list->NextVistDate->viewAttributes() ?>><?php echo $ivf_follow_up_tracking_list->NextVistDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_follow_up_tracking_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $ivf_follow_up_tracking_list->HospID->cellAttributes() ?>>
<span id="el<?php echo $ivf_follow_up_tracking_list->RowCount ?>_ivf_follow_up_tracking_HospID">
<span<?php echo $ivf_follow_up_tracking_list->HospID->viewAttributes() ?>><?php echo $ivf_follow_up_tracking_list->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_follow_up_tracking_list->ListOptions->render("body", "right", $ivf_follow_up_tracking_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$ivf_follow_up_tracking_list->isGridAdd())
		$ivf_follow_up_tracking_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$ivf_follow_up_tracking->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($ivf_follow_up_tracking_list->Recordset)
	$ivf_follow_up_tracking_list->Recordset->Close();
?>
<?php if (!$ivf_follow_up_tracking_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$ivf_follow_up_tracking_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $ivf_follow_up_tracking_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ivf_follow_up_tracking_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($ivf_follow_up_tracking_list->TotalRecords == 0 && !$ivf_follow_up_tracking->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $ivf_follow_up_tracking_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$ivf_follow_up_tracking_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$ivf_follow_up_tracking_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$ivf_follow_up_tracking->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_ivf_follow_up_tracking",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$ivf_follow_up_tracking_list->terminate();
?>
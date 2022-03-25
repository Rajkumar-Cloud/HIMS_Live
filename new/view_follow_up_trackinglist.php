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
$view_follow_up_tracking_list = new view_follow_up_tracking_list();

// Run the page
$view_follow_up_tracking_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_follow_up_tracking_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$view_follow_up_tracking_list->isExport()) { ?>
<script>
var fview_follow_up_trackinglist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fview_follow_up_trackinglist = currentForm = new ew.Form("fview_follow_up_trackinglist", "list");
	fview_follow_up_trackinglist.formKeyCountName = '<?php echo $view_follow_up_tracking_list->FormKeyCountName ?>';
	loadjs.done("fview_follow_up_trackinglist");
});
var fview_follow_up_trackinglistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fview_follow_up_trackinglistsrch = currentSearchForm = new ew.Form("fview_follow_up_trackinglistsrch");

	// Dynamic selection lists
	// Filters

	fview_follow_up_trackinglistsrch.filterList = <?php echo $view_follow_up_tracking_list->getFilterList() ?>;
	loadjs.done("fview_follow_up_trackinglistsrch");
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
<?php if (!$view_follow_up_tracking_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_follow_up_tracking_list->TotalRecords > 0 && $view_follow_up_tracking_list->ExportOptions->visible()) { ?>
<?php $view_follow_up_tracking_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_follow_up_tracking_list->ImportOptions->visible()) { ?>
<?php $view_follow_up_tracking_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_follow_up_tracking_list->SearchOptions->visible()) { ?>
<?php $view_follow_up_tracking_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_follow_up_tracking_list->FilterOptions->visible()) { ?>
<?php $view_follow_up_tracking_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_follow_up_tracking_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_follow_up_tracking_list->isExport() && !$view_follow_up_tracking->CurrentAction) { ?>
<form name="fview_follow_up_trackinglistsrch" id="fview_follow_up_trackinglistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fview_follow_up_trackinglistsrch-search-panel" class="<?php echo $view_follow_up_tracking_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_follow_up_tracking">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $view_follow_up_tracking_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($view_follow_up_tracking_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($view_follow_up_tracking_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_follow_up_tracking_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_follow_up_tracking_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_follow_up_tracking_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_follow_up_tracking_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_follow_up_tracking_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $view_follow_up_tracking_list->showPageHeader(); ?>
<?php
$view_follow_up_tracking_list->showMessage();
?>
<?php if ($view_follow_up_tracking_list->TotalRecords > 0 || $view_follow_up_tracking->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_follow_up_tracking_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_follow_up_tracking">
<?php if (!$view_follow_up_tracking_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_follow_up_tracking_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_follow_up_tracking_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_follow_up_tracking_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_follow_up_trackinglist" id="fview_follow_up_trackinglist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_follow_up_tracking">
<div id="gmp_view_follow_up_tracking" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($view_follow_up_tracking_list->TotalRecords > 0 || $view_follow_up_tracking_list->isGridEdit()) { ?>
<table id="tbl_view_follow_up_trackinglist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_follow_up_tracking->RowType = ROWTYPE_HEADER;

// Render list options
$view_follow_up_tracking_list->renderListOptions();

// Render list options (header, left)
$view_follow_up_tracking_list->ListOptions->render("header", "left");
?>
<?php if ($view_follow_up_tracking_list->id->Visible) { // id ?>
	<?php if ($view_follow_up_tracking_list->SortUrl($view_follow_up_tracking_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_follow_up_tracking_list->id->headerCellClass() ?>"><div id="elh_view_follow_up_tracking_id" class="view_follow_up_tracking_id"><div class="ew-table-header-caption"><?php echo $view_follow_up_tracking_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_follow_up_tracking_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_follow_up_tracking_list->SortUrl($view_follow_up_tracking_list->id) ?>', 1);"><div id="elh_view_follow_up_tracking_id" class="view_follow_up_tracking_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_follow_up_tracking_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_follow_up_tracking_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_follow_up_tracking_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_follow_up_tracking_list->Reception->Visible) { // Reception ?>
	<?php if ($view_follow_up_tracking_list->SortUrl($view_follow_up_tracking_list->Reception) == "") { ?>
		<th data-name="Reception" class="<?php echo $view_follow_up_tracking_list->Reception->headerCellClass() ?>"><div id="elh_view_follow_up_tracking_Reception" class="view_follow_up_tracking_Reception"><div class="ew-table-header-caption"><?php echo $view_follow_up_tracking_list->Reception->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Reception" class="<?php echo $view_follow_up_tracking_list->Reception->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_follow_up_tracking_list->SortUrl($view_follow_up_tracking_list->Reception) ?>', 1);"><div id="elh_view_follow_up_tracking_Reception" class="view_follow_up_tracking_Reception">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_follow_up_tracking_list->Reception->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_follow_up_tracking_list->Reception->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_follow_up_tracking_list->Reception->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_follow_up_tracking_list->PatientId->Visible) { // PatientId ?>
	<?php if ($view_follow_up_tracking_list->SortUrl($view_follow_up_tracking_list->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $view_follow_up_tracking_list->PatientId->headerCellClass() ?>"><div id="elh_view_follow_up_tracking_PatientId" class="view_follow_up_tracking_PatientId"><div class="ew-table-header-caption"><?php echo $view_follow_up_tracking_list->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $view_follow_up_tracking_list->PatientId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_follow_up_tracking_list->SortUrl($view_follow_up_tracking_list->PatientId) ?>', 1);"><div id="elh_view_follow_up_tracking_PatientId" class="view_follow_up_tracking_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_follow_up_tracking_list->PatientId->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_follow_up_tracking_list->PatientId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_follow_up_tracking_list->PatientId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_follow_up_tracking_list->Age->Visible) { // Age ?>
	<?php if ($view_follow_up_tracking_list->SortUrl($view_follow_up_tracking_list->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $view_follow_up_tracking_list->Age->headerCellClass() ?>"><div id="elh_view_follow_up_tracking_Age" class="view_follow_up_tracking_Age"><div class="ew-table-header-caption"><?php echo $view_follow_up_tracking_list->Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $view_follow_up_tracking_list->Age->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_follow_up_tracking_list->SortUrl($view_follow_up_tracking_list->Age) ?>', 1);"><div id="elh_view_follow_up_tracking_Age" class="view_follow_up_tracking_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_follow_up_tracking_list->Age->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_follow_up_tracking_list->Age->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_follow_up_tracking_list->Age->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_follow_up_tracking_list->status->Visible) { // status ?>
	<?php if ($view_follow_up_tracking_list->SortUrl($view_follow_up_tracking_list->status) == "") { ?>
		<th data-name="status" class="<?php echo $view_follow_up_tracking_list->status->headerCellClass() ?>"><div id="elh_view_follow_up_tracking_status" class="view_follow_up_tracking_status"><div class="ew-table-header-caption"><?php echo $view_follow_up_tracking_list->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $view_follow_up_tracking_list->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_follow_up_tracking_list->SortUrl($view_follow_up_tracking_list->status) ?>', 1);"><div id="elh_view_follow_up_tracking_status" class="view_follow_up_tracking_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_follow_up_tracking_list->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_follow_up_tracking_list->status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_follow_up_tracking_list->status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_follow_up_tracking_list->createdby->Visible) { // createdby ?>
	<?php if ($view_follow_up_tracking_list->SortUrl($view_follow_up_tracking_list->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $view_follow_up_tracking_list->createdby->headerCellClass() ?>"><div id="elh_view_follow_up_tracking_createdby" class="view_follow_up_tracking_createdby"><div class="ew-table-header-caption"><?php echo $view_follow_up_tracking_list->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $view_follow_up_tracking_list->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_follow_up_tracking_list->SortUrl($view_follow_up_tracking_list->createdby) ?>', 1);"><div id="elh_view_follow_up_tracking_createdby" class="view_follow_up_tracking_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_follow_up_tracking_list->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_follow_up_tracking_list->createdby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_follow_up_tracking_list->createdby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_follow_up_tracking_list->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_follow_up_tracking_list->SortUrl($view_follow_up_tracking_list->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_follow_up_tracking_list->createddatetime->headerCellClass() ?>"><div id="elh_view_follow_up_tracking_createddatetime" class="view_follow_up_tracking_createddatetime"><div class="ew-table-header-caption"><?php echo $view_follow_up_tracking_list->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_follow_up_tracking_list->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_follow_up_tracking_list->SortUrl($view_follow_up_tracking_list->createddatetime) ?>', 1);"><div id="elh_view_follow_up_tracking_createddatetime" class="view_follow_up_tracking_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_follow_up_tracking_list->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_follow_up_tracking_list->createddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_follow_up_tracking_list->createddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_follow_up_tracking_list->modifiedby->Visible) { // modifiedby ?>
	<?php if ($view_follow_up_tracking_list->SortUrl($view_follow_up_tracking_list->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $view_follow_up_tracking_list->modifiedby->headerCellClass() ?>"><div id="elh_view_follow_up_tracking_modifiedby" class="view_follow_up_tracking_modifiedby"><div class="ew-table-header-caption"><?php echo $view_follow_up_tracking_list->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $view_follow_up_tracking_list->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_follow_up_tracking_list->SortUrl($view_follow_up_tracking_list->modifiedby) ?>', 1);"><div id="elh_view_follow_up_tracking_modifiedby" class="view_follow_up_tracking_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_follow_up_tracking_list->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_follow_up_tracking_list->modifiedby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_follow_up_tracking_list->modifiedby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_follow_up_tracking_list->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($view_follow_up_tracking_list->SortUrl($view_follow_up_tracking_list->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_follow_up_tracking_list->modifieddatetime->headerCellClass() ?>"><div id="elh_view_follow_up_tracking_modifieddatetime" class="view_follow_up_tracking_modifieddatetime"><div class="ew-table-header-caption"><?php echo $view_follow_up_tracking_list->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_follow_up_tracking_list->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_follow_up_tracking_list->SortUrl($view_follow_up_tracking_list->modifieddatetime) ?>', 1);"><div id="elh_view_follow_up_tracking_modifieddatetime" class="view_follow_up_tracking_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_follow_up_tracking_list->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_follow_up_tracking_list->modifieddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_follow_up_tracking_list->modifieddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_follow_up_tracking_list->createdUserName->Visible) { // createdUserName ?>
	<?php if ($view_follow_up_tracking_list->SortUrl($view_follow_up_tracking_list->createdUserName) == "") { ?>
		<th data-name="createdUserName" class="<?php echo $view_follow_up_tracking_list->createdUserName->headerCellClass() ?>"><div id="elh_view_follow_up_tracking_createdUserName" class="view_follow_up_tracking_createdUserName"><div class="ew-table-header-caption"><?php echo $view_follow_up_tracking_list->createdUserName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdUserName" class="<?php echo $view_follow_up_tracking_list->createdUserName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_follow_up_tracking_list->SortUrl($view_follow_up_tracking_list->createdUserName) ?>', 1);"><div id="elh_view_follow_up_tracking_createdUserName" class="view_follow_up_tracking_createdUserName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_follow_up_tracking_list->createdUserName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_follow_up_tracking_list->createdUserName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_follow_up_tracking_list->createdUserName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_follow_up_tracking_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_follow_up_tracking_list->ExportAll && $view_follow_up_tracking_list->isExport()) {
	$view_follow_up_tracking_list->StopRecord = $view_follow_up_tracking_list->TotalRecords;
} else {

	// Set the last record to display
	if ($view_follow_up_tracking_list->TotalRecords > $view_follow_up_tracking_list->StartRecord + $view_follow_up_tracking_list->DisplayRecords - 1)
		$view_follow_up_tracking_list->StopRecord = $view_follow_up_tracking_list->StartRecord + $view_follow_up_tracking_list->DisplayRecords - 1;
	else
		$view_follow_up_tracking_list->StopRecord = $view_follow_up_tracking_list->TotalRecords;
}
$view_follow_up_tracking_list->RecordCount = $view_follow_up_tracking_list->StartRecord - 1;
if ($view_follow_up_tracking_list->Recordset && !$view_follow_up_tracking_list->Recordset->EOF) {
	$view_follow_up_tracking_list->Recordset->moveFirst();
	$selectLimit = $view_follow_up_tracking_list->UseSelectLimit;
	if (!$selectLimit && $view_follow_up_tracking_list->StartRecord > 1)
		$view_follow_up_tracking_list->Recordset->move($view_follow_up_tracking_list->StartRecord - 1);
} elseif (!$view_follow_up_tracking->AllowAddDeleteRow && $view_follow_up_tracking_list->StopRecord == 0) {
	$view_follow_up_tracking_list->StopRecord = $view_follow_up_tracking->GridAddRowCount;
}

// Initialize aggregate
$view_follow_up_tracking->RowType = ROWTYPE_AGGREGATEINIT;
$view_follow_up_tracking->resetAttributes();
$view_follow_up_tracking_list->renderRow();
while ($view_follow_up_tracking_list->RecordCount < $view_follow_up_tracking_list->StopRecord) {
	$view_follow_up_tracking_list->RecordCount++;
	if ($view_follow_up_tracking_list->RecordCount >= $view_follow_up_tracking_list->StartRecord) {
		$view_follow_up_tracking_list->RowCount++;

		// Set up key count
		$view_follow_up_tracking_list->KeyCount = $view_follow_up_tracking_list->RowIndex;

		// Init row class and style
		$view_follow_up_tracking->resetAttributes();
		$view_follow_up_tracking->CssClass = "";
		if ($view_follow_up_tracking_list->isGridAdd()) {
		} else {
			$view_follow_up_tracking_list->loadRowValues($view_follow_up_tracking_list->Recordset); // Load row values
		}
		$view_follow_up_tracking->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_follow_up_tracking->RowAttrs->merge(["data-rowindex" => $view_follow_up_tracking_list->RowCount, "id" => "r" . $view_follow_up_tracking_list->RowCount . "_view_follow_up_tracking", "data-rowtype" => $view_follow_up_tracking->RowType]);

		// Render row
		$view_follow_up_tracking_list->renderRow();

		// Render list options
		$view_follow_up_tracking_list->renderListOptions();
?>
	<tr <?php echo $view_follow_up_tracking->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_follow_up_tracking_list->ListOptions->render("body", "left", $view_follow_up_tracking_list->RowCount);
?>
	<?php if ($view_follow_up_tracking_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $view_follow_up_tracking_list->id->cellAttributes() ?>>
<span id="el<?php echo $view_follow_up_tracking_list->RowCount ?>_view_follow_up_tracking_id">
<span<?php echo $view_follow_up_tracking_list->id->viewAttributes() ?>><?php echo $view_follow_up_tracking_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_follow_up_tracking_list->Reception->Visible) { // Reception ?>
		<td data-name="Reception" <?php echo $view_follow_up_tracking_list->Reception->cellAttributes() ?>>
<span id="el<?php echo $view_follow_up_tracking_list->RowCount ?>_view_follow_up_tracking_Reception">
<span<?php echo $view_follow_up_tracking_list->Reception->viewAttributes() ?>><?php echo $view_follow_up_tracking_list->Reception->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_follow_up_tracking_list->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId" <?php echo $view_follow_up_tracking_list->PatientId->cellAttributes() ?>>
<span id="el<?php echo $view_follow_up_tracking_list->RowCount ?>_view_follow_up_tracking_PatientId">
<span<?php echo $view_follow_up_tracking_list->PatientId->viewAttributes() ?>><?php echo $view_follow_up_tracking_list->PatientId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_follow_up_tracking_list->Age->Visible) { // Age ?>
		<td data-name="Age" <?php echo $view_follow_up_tracking_list->Age->cellAttributes() ?>>
<span id="el<?php echo $view_follow_up_tracking_list->RowCount ?>_view_follow_up_tracking_Age">
<span<?php echo $view_follow_up_tracking_list->Age->viewAttributes() ?>><?php echo $view_follow_up_tracking_list->Age->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_follow_up_tracking_list->status->Visible) { // status ?>
		<td data-name="status" <?php echo $view_follow_up_tracking_list->status->cellAttributes() ?>>
<span id="el<?php echo $view_follow_up_tracking_list->RowCount ?>_view_follow_up_tracking_status">
<span<?php echo $view_follow_up_tracking_list->status->viewAttributes() ?>><?php echo $view_follow_up_tracking_list->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_follow_up_tracking_list->createdby->Visible) { // createdby ?>
		<td data-name="createdby" <?php echo $view_follow_up_tracking_list->createdby->cellAttributes() ?>>
<span id="el<?php echo $view_follow_up_tracking_list->RowCount ?>_view_follow_up_tracking_createdby">
<span<?php echo $view_follow_up_tracking_list->createdby->viewAttributes() ?>><?php echo $view_follow_up_tracking_list->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_follow_up_tracking_list->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" <?php echo $view_follow_up_tracking_list->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_follow_up_tracking_list->RowCount ?>_view_follow_up_tracking_createddatetime">
<span<?php echo $view_follow_up_tracking_list->createddatetime->viewAttributes() ?>><?php echo $view_follow_up_tracking_list->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_follow_up_tracking_list->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby" <?php echo $view_follow_up_tracking_list->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $view_follow_up_tracking_list->RowCount ?>_view_follow_up_tracking_modifiedby">
<span<?php echo $view_follow_up_tracking_list->modifiedby->viewAttributes() ?>><?php echo $view_follow_up_tracking_list->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_follow_up_tracking_list->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime" <?php echo $view_follow_up_tracking_list->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_follow_up_tracking_list->RowCount ?>_view_follow_up_tracking_modifieddatetime">
<span<?php echo $view_follow_up_tracking_list->modifieddatetime->viewAttributes() ?>><?php echo $view_follow_up_tracking_list->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_follow_up_tracking_list->createdUserName->Visible) { // createdUserName ?>
		<td data-name="createdUserName" <?php echo $view_follow_up_tracking_list->createdUserName->cellAttributes() ?>>
<span id="el<?php echo $view_follow_up_tracking_list->RowCount ?>_view_follow_up_tracking_createdUserName">
<span<?php echo $view_follow_up_tracking_list->createdUserName->viewAttributes() ?>><?php echo $view_follow_up_tracking_list->createdUserName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_follow_up_tracking_list->ListOptions->render("body", "right", $view_follow_up_tracking_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$view_follow_up_tracking_list->isGridAdd())
		$view_follow_up_tracking_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$view_follow_up_tracking->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_follow_up_tracking_list->Recordset)
	$view_follow_up_tracking_list->Recordset->Close();
?>
<?php if (!$view_follow_up_tracking_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_follow_up_tracking_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_follow_up_tracking_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_follow_up_tracking_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_follow_up_tracking_list->TotalRecords == 0 && !$view_follow_up_tracking->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_follow_up_tracking_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_follow_up_tracking_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_follow_up_tracking_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$view_follow_up_tracking->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_view_follow_up_tracking",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$view_follow_up_tracking_list->terminate();
?>
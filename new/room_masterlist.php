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
$room_master_list = new room_master_list();

// Run the page
$room_master_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$room_master_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$room_master_list->isExport()) { ?>
<script>
var froom_masterlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	froom_masterlist = currentForm = new ew.Form("froom_masterlist", "list");
	froom_masterlist.formKeyCountName = '<?php echo $room_master_list->FormKeyCountName ?>';
	loadjs.done("froom_masterlist");
});
var froom_masterlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	froom_masterlistsrch = currentSearchForm = new ew.Form("froom_masterlistsrch");

	// Dynamic selection lists
	// Filters

	froom_masterlistsrch.filterList = <?php echo $room_master_list->getFilterList() ?>;
	loadjs.done("froom_masterlistsrch");
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
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$room_master_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($room_master_list->TotalRecords > 0 && $room_master_list->ExportOptions->visible()) { ?>
<?php $room_master_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($room_master_list->ImportOptions->visible()) { ?>
<?php $room_master_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($room_master_list->SearchOptions->visible()) { ?>
<?php $room_master_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($room_master_list->FilterOptions->visible()) { ?>
<?php $room_master_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$room_master_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$room_master_list->isExport() && !$room_master->CurrentAction) { ?>
<form name="froom_masterlistsrch" id="froom_masterlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="froom_masterlistsrch-search-panel" class="<?php echo $room_master_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="room_master">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $room_master_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($room_master_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($room_master_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $room_master_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($room_master_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($room_master_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($room_master_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($room_master_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $room_master_list->showPageHeader(); ?>
<?php
$room_master_list->showMessage();
?>
<?php if ($room_master_list->TotalRecords > 0 || $room_master->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($room_master_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> room_master">
<?php if (!$room_master_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$room_master_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $room_master_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $room_master_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="froom_masterlist" id="froom_masterlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="room_master">
<div id="gmp_room_master" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($room_master_list->TotalRecords > 0 || $room_master_list->isGridEdit()) { ?>
<table id="tbl_room_masterlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$room_master->RowType = ROWTYPE_HEADER;

// Render list options
$room_master_list->renderListOptions();

// Render list options (header, left)
$room_master_list->ListOptions->render("header", "left");
?>
<?php if ($room_master_list->id->Visible) { // id ?>
	<?php if ($room_master_list->SortUrl($room_master_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $room_master_list->id->headerCellClass() ?>"><div id="elh_room_master_id" class="room_master_id"><div class="ew-table-header-caption"><?php echo $room_master_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $room_master_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $room_master_list->SortUrl($room_master_list->id) ?>', 1);"><div id="elh_room_master_id" class="room_master_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $room_master_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($room_master_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($room_master_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($room_master_list->RoomNo->Visible) { // RoomNo ?>
	<?php if ($room_master_list->SortUrl($room_master_list->RoomNo) == "") { ?>
		<th data-name="RoomNo" class="<?php echo $room_master_list->RoomNo->headerCellClass() ?>"><div id="elh_room_master_RoomNo" class="room_master_RoomNo"><div class="ew-table-header-caption"><?php echo $room_master_list->RoomNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RoomNo" class="<?php echo $room_master_list->RoomNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $room_master_list->SortUrl($room_master_list->RoomNo) ?>', 1);"><div id="elh_room_master_RoomNo" class="room_master_RoomNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $room_master_list->RoomNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($room_master_list->RoomNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($room_master_list->RoomNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($room_master_list->RoomType->Visible) { // RoomType ?>
	<?php if ($room_master_list->SortUrl($room_master_list->RoomType) == "") { ?>
		<th data-name="RoomType" class="<?php echo $room_master_list->RoomType->headerCellClass() ?>"><div id="elh_room_master_RoomType" class="room_master_RoomType"><div class="ew-table-header-caption"><?php echo $room_master_list->RoomType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RoomType" class="<?php echo $room_master_list->RoomType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $room_master_list->SortUrl($room_master_list->RoomType) ?>', 1);"><div id="elh_room_master_RoomType" class="room_master_RoomType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $room_master_list->RoomType->caption() ?></span><span class="ew-table-header-sort"><?php if ($room_master_list->RoomType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($room_master_list->RoomType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($room_master_list->SharingRoom->Visible) { // SharingRoom ?>
	<?php if ($room_master_list->SortUrl($room_master_list->SharingRoom) == "") { ?>
		<th data-name="SharingRoom" class="<?php echo $room_master_list->SharingRoom->headerCellClass() ?>"><div id="elh_room_master_SharingRoom" class="room_master_SharingRoom"><div class="ew-table-header-caption"><?php echo $room_master_list->SharingRoom->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SharingRoom" class="<?php echo $room_master_list->SharingRoom->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $room_master_list->SortUrl($room_master_list->SharingRoom) ?>', 1);"><div id="elh_room_master_SharingRoom" class="room_master_SharingRoom">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $room_master_list->SharingRoom->caption() ?></span><span class="ew-table-header-sort"><?php if ($room_master_list->SharingRoom->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($room_master_list->SharingRoom->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($room_master_list->Amount->Visible) { // Amount ?>
	<?php if ($room_master_list->SortUrl($room_master_list->Amount) == "") { ?>
		<th data-name="Amount" class="<?php echo $room_master_list->Amount->headerCellClass() ?>"><div id="elh_room_master_Amount" class="room_master_Amount"><div class="ew-table-header-caption"><?php echo $room_master_list->Amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Amount" class="<?php echo $room_master_list->Amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $room_master_list->SortUrl($room_master_list->Amount) ?>', 1);"><div id="elh_room_master_Amount" class="room_master_Amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $room_master_list->Amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($room_master_list->Amount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($room_master_list->Amount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($room_master_list->Status->Visible) { // Status ?>
	<?php if ($room_master_list->SortUrl($room_master_list->Status) == "") { ?>
		<th data-name="Status" class="<?php echo $room_master_list->Status->headerCellClass() ?>"><div id="elh_room_master_Status" class="room_master_Status"><div class="ew-table-header-caption"><?php echo $room_master_list->Status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Status" class="<?php echo $room_master_list->Status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $room_master_list->SortUrl($room_master_list->Status) ?>', 1);"><div id="elh_room_master_Status" class="room_master_Status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $room_master_list->Status->caption() ?></span><span class="ew-table-header-sort"><?php if ($room_master_list->Status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($room_master_list->Status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$room_master_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($room_master_list->ExportAll && $room_master_list->isExport()) {
	$room_master_list->StopRecord = $room_master_list->TotalRecords;
} else {

	// Set the last record to display
	if ($room_master_list->TotalRecords > $room_master_list->StartRecord + $room_master_list->DisplayRecords - 1)
		$room_master_list->StopRecord = $room_master_list->StartRecord + $room_master_list->DisplayRecords - 1;
	else
		$room_master_list->StopRecord = $room_master_list->TotalRecords;
}
$room_master_list->RecordCount = $room_master_list->StartRecord - 1;
if ($room_master_list->Recordset && !$room_master_list->Recordset->EOF) {
	$room_master_list->Recordset->moveFirst();
	$selectLimit = $room_master_list->UseSelectLimit;
	if (!$selectLimit && $room_master_list->StartRecord > 1)
		$room_master_list->Recordset->move($room_master_list->StartRecord - 1);
} elseif (!$room_master->AllowAddDeleteRow && $room_master_list->StopRecord == 0) {
	$room_master_list->StopRecord = $room_master->GridAddRowCount;
}

// Initialize aggregate
$room_master->RowType = ROWTYPE_AGGREGATEINIT;
$room_master->resetAttributes();
$room_master_list->renderRow();
while ($room_master_list->RecordCount < $room_master_list->StopRecord) {
	$room_master_list->RecordCount++;
	if ($room_master_list->RecordCount >= $room_master_list->StartRecord) {
		$room_master_list->RowCount++;

		// Set up key count
		$room_master_list->KeyCount = $room_master_list->RowIndex;

		// Init row class and style
		$room_master->resetAttributes();
		$room_master->CssClass = "";
		if ($room_master_list->isGridAdd()) {
		} else {
			$room_master_list->loadRowValues($room_master_list->Recordset); // Load row values
		}
		$room_master->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$room_master->RowAttrs->merge(["data-rowindex" => $room_master_list->RowCount, "id" => "r" . $room_master_list->RowCount . "_room_master", "data-rowtype" => $room_master->RowType]);

		// Render row
		$room_master_list->renderRow();

		// Render list options
		$room_master_list->renderListOptions();
?>
	<tr <?php echo $room_master->rowAttributes() ?>>
<?php

// Render list options (body, left)
$room_master_list->ListOptions->render("body", "left", $room_master_list->RowCount);
?>
	<?php if ($room_master_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $room_master_list->id->cellAttributes() ?>>
<span id="el<?php echo $room_master_list->RowCount ?>_room_master_id">
<span<?php echo $room_master_list->id->viewAttributes() ?>><?php echo $room_master_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($room_master_list->RoomNo->Visible) { // RoomNo ?>
		<td data-name="RoomNo" <?php echo $room_master_list->RoomNo->cellAttributes() ?>>
<span id="el<?php echo $room_master_list->RowCount ?>_room_master_RoomNo">
<span<?php echo $room_master_list->RoomNo->viewAttributes() ?>><?php echo $room_master_list->RoomNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($room_master_list->RoomType->Visible) { // RoomType ?>
		<td data-name="RoomType" <?php echo $room_master_list->RoomType->cellAttributes() ?>>
<span id="el<?php echo $room_master_list->RowCount ?>_room_master_RoomType">
<span<?php echo $room_master_list->RoomType->viewAttributes() ?>><?php echo $room_master_list->RoomType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($room_master_list->SharingRoom->Visible) { // SharingRoom ?>
		<td data-name="SharingRoom" <?php echo $room_master_list->SharingRoom->cellAttributes() ?>>
<span id="el<?php echo $room_master_list->RowCount ?>_room_master_SharingRoom">
<span<?php echo $room_master_list->SharingRoom->viewAttributes() ?>><?php echo $room_master_list->SharingRoom->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($room_master_list->Amount->Visible) { // Amount ?>
		<td data-name="Amount" <?php echo $room_master_list->Amount->cellAttributes() ?>>
<span id="el<?php echo $room_master_list->RowCount ?>_room_master_Amount">
<span<?php echo $room_master_list->Amount->viewAttributes() ?>><?php echo $room_master_list->Amount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($room_master_list->Status->Visible) { // Status ?>
		<td data-name="Status" <?php echo $room_master_list->Status->cellAttributes() ?>>
<span id="el<?php echo $room_master_list->RowCount ?>_room_master_Status">
<span<?php echo $room_master_list->Status->viewAttributes() ?>><?php echo $room_master_list->Status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$room_master_list->ListOptions->render("body", "right", $room_master_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$room_master_list->isGridAdd())
		$room_master_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$room_master->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($room_master_list->Recordset)
	$room_master_list->Recordset->Close();
?>
<?php if (!$room_master_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$room_master_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $room_master_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $room_master_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($room_master_list->TotalRecords == 0 && !$room_master->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $room_master_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$room_master_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$room_master_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$room_master_list->terminate();
?>
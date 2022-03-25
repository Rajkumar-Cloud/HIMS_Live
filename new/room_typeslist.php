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
$room_types_list = new room_types_list();

// Run the page
$room_types_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$room_types_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$room_types_list->isExport()) { ?>
<script>
var froom_typeslist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	froom_typeslist = currentForm = new ew.Form("froom_typeslist", "list");
	froom_typeslist.formKeyCountName = '<?php echo $room_types_list->FormKeyCountName ?>';
	loadjs.done("froom_typeslist");
});
var froom_typeslistsrch;
loadjs.ready("head", function() {

	// Form object for search
	froom_typeslistsrch = currentSearchForm = new ew.Form("froom_typeslistsrch");

	// Dynamic selection lists
	// Filters

	froom_typeslistsrch.filterList = <?php echo $room_types_list->getFilterList() ?>;
	loadjs.done("froom_typeslistsrch");
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
<?php if (!$room_types_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($room_types_list->TotalRecords > 0 && $room_types_list->ExportOptions->visible()) { ?>
<?php $room_types_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($room_types_list->ImportOptions->visible()) { ?>
<?php $room_types_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($room_types_list->SearchOptions->visible()) { ?>
<?php $room_types_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($room_types_list->FilterOptions->visible()) { ?>
<?php $room_types_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$room_types_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$room_types_list->isExport() && !$room_types->CurrentAction) { ?>
<form name="froom_typeslistsrch" id="froom_typeslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="froom_typeslistsrch-search-panel" class="<?php echo $room_types_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="room_types">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $room_types_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($room_types_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($room_types_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $room_types_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($room_types_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($room_types_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($room_types_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($room_types_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $room_types_list->showPageHeader(); ?>
<?php
$room_types_list->showMessage();
?>
<?php if ($room_types_list->TotalRecords > 0 || $room_types->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($room_types_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> room_types">
<?php if (!$room_types_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$room_types_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $room_types_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $room_types_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="froom_typeslist" id="froom_typeslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="room_types">
<div id="gmp_room_types" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($room_types_list->TotalRecords > 0 || $room_types_list->isGridEdit()) { ?>
<table id="tbl_room_typeslist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$room_types->RowType = ROWTYPE_HEADER;

// Render list options
$room_types_list->renderListOptions();

// Render list options (header, left)
$room_types_list->ListOptions->render("header", "left");
?>
<?php if ($room_types_list->Id->Visible) { // Id ?>
	<?php if ($room_types_list->SortUrl($room_types_list->Id) == "") { ?>
		<th data-name="Id" class="<?php echo $room_types_list->Id->headerCellClass() ?>"><div id="elh_room_types_Id" class="room_types_Id"><div class="ew-table-header-caption"><?php echo $room_types_list->Id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Id" class="<?php echo $room_types_list->Id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $room_types_list->SortUrl($room_types_list->Id) ?>', 1);"><div id="elh_room_types_Id" class="room_types_Id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $room_types_list->Id->caption() ?></span><span class="ew-table-header-sort"><?php if ($room_types_list->Id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($room_types_list->Id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($room_types_list->Types->Visible) { // Types ?>
	<?php if ($room_types_list->SortUrl($room_types_list->Types) == "") { ?>
		<th data-name="Types" class="<?php echo $room_types_list->Types->headerCellClass() ?>"><div id="elh_room_types_Types" class="room_types_Types"><div class="ew-table-header-caption"><?php echo $room_types_list->Types->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Types" class="<?php echo $room_types_list->Types->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $room_types_list->SortUrl($room_types_list->Types) ?>', 1);"><div id="elh_room_types_Types" class="room_types_Types">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $room_types_list->Types->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($room_types_list->Types->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($room_types_list->Types->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$room_types_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($room_types_list->ExportAll && $room_types_list->isExport()) {
	$room_types_list->StopRecord = $room_types_list->TotalRecords;
} else {

	// Set the last record to display
	if ($room_types_list->TotalRecords > $room_types_list->StartRecord + $room_types_list->DisplayRecords - 1)
		$room_types_list->StopRecord = $room_types_list->StartRecord + $room_types_list->DisplayRecords - 1;
	else
		$room_types_list->StopRecord = $room_types_list->TotalRecords;
}
$room_types_list->RecordCount = $room_types_list->StartRecord - 1;
if ($room_types_list->Recordset && !$room_types_list->Recordset->EOF) {
	$room_types_list->Recordset->moveFirst();
	$selectLimit = $room_types_list->UseSelectLimit;
	if (!$selectLimit && $room_types_list->StartRecord > 1)
		$room_types_list->Recordset->move($room_types_list->StartRecord - 1);
} elseif (!$room_types->AllowAddDeleteRow && $room_types_list->StopRecord == 0) {
	$room_types_list->StopRecord = $room_types->GridAddRowCount;
}

// Initialize aggregate
$room_types->RowType = ROWTYPE_AGGREGATEINIT;
$room_types->resetAttributes();
$room_types_list->renderRow();
while ($room_types_list->RecordCount < $room_types_list->StopRecord) {
	$room_types_list->RecordCount++;
	if ($room_types_list->RecordCount >= $room_types_list->StartRecord) {
		$room_types_list->RowCount++;

		// Set up key count
		$room_types_list->KeyCount = $room_types_list->RowIndex;

		// Init row class and style
		$room_types->resetAttributes();
		$room_types->CssClass = "";
		if ($room_types_list->isGridAdd()) {
		} else {
			$room_types_list->loadRowValues($room_types_list->Recordset); // Load row values
		}
		$room_types->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$room_types->RowAttrs->merge(["data-rowindex" => $room_types_list->RowCount, "id" => "r" . $room_types_list->RowCount . "_room_types", "data-rowtype" => $room_types->RowType]);

		// Render row
		$room_types_list->renderRow();

		// Render list options
		$room_types_list->renderListOptions();
?>
	<tr <?php echo $room_types->rowAttributes() ?>>
<?php

// Render list options (body, left)
$room_types_list->ListOptions->render("body", "left", $room_types_list->RowCount);
?>
	<?php if ($room_types_list->Id->Visible) { // Id ?>
		<td data-name="Id" <?php echo $room_types_list->Id->cellAttributes() ?>>
<span id="el<?php echo $room_types_list->RowCount ?>_room_types_Id">
<span<?php echo $room_types_list->Id->viewAttributes() ?>><?php echo $room_types_list->Id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($room_types_list->Types->Visible) { // Types ?>
		<td data-name="Types" <?php echo $room_types_list->Types->cellAttributes() ?>>
<span id="el<?php echo $room_types_list->RowCount ?>_room_types_Types">
<span<?php echo $room_types_list->Types->viewAttributes() ?>><?php echo $room_types_list->Types->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$room_types_list->ListOptions->render("body", "right", $room_types_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$room_types_list->isGridAdd())
		$room_types_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$room_types->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($room_types_list->Recordset)
	$room_types_list->Recordset->Close();
?>
<?php if (!$room_types_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$room_types_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $room_types_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $room_types_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($room_types_list->TotalRecords == 0 && !$room_types->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $room_types_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$room_types_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$room_types_list->isExport()) { ?>
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
$room_types_list->terminate();
?>
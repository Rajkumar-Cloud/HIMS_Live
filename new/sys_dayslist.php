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
$sys_days_list = new sys_days_list();

// Run the page
$sys_days_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sys_days_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$sys_days_list->isExport()) { ?>
<script>
var fsys_dayslist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fsys_dayslist = currentForm = new ew.Form("fsys_dayslist", "list");
	fsys_dayslist.formKeyCountName = '<?php echo $sys_days_list->FormKeyCountName ?>';
	loadjs.done("fsys_dayslist");
});
var fsys_dayslistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fsys_dayslistsrch = currentSearchForm = new ew.Form("fsys_dayslistsrch");

	// Dynamic selection lists
	// Filters

	fsys_dayslistsrch.filterList = <?php echo $sys_days_list->getFilterList() ?>;
	loadjs.done("fsys_dayslistsrch");
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
<?php if (!$sys_days_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($sys_days_list->TotalRecords > 0 && $sys_days_list->ExportOptions->visible()) { ?>
<?php $sys_days_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($sys_days_list->ImportOptions->visible()) { ?>
<?php $sys_days_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($sys_days_list->SearchOptions->visible()) { ?>
<?php $sys_days_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($sys_days_list->FilterOptions->visible()) { ?>
<?php $sys_days_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$sys_days_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$sys_days_list->isExport() && !$sys_days->CurrentAction) { ?>
<form name="fsys_dayslistsrch" id="fsys_dayslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fsys_dayslistsrch-search-panel" class="<?php echo $sys_days_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="sys_days">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $sys_days_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($sys_days_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($sys_days_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $sys_days_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($sys_days_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($sys_days_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($sys_days_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($sys_days_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $sys_days_list->showPageHeader(); ?>
<?php
$sys_days_list->showMessage();
?>
<?php if ($sys_days_list->TotalRecords > 0 || $sys_days->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($sys_days_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> sys_days">
<?php if (!$sys_days_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$sys_days_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $sys_days_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $sys_days_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fsys_dayslist" id="fsys_dayslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sys_days">
<div id="gmp_sys_days" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($sys_days_list->TotalRecords > 0 || $sys_days_list->isGridEdit()) { ?>
<table id="tbl_sys_dayslist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$sys_days->RowType = ROWTYPE_HEADER;

// Render list options
$sys_days_list->renderListOptions();

// Render list options (header, left)
$sys_days_list->ListOptions->render("header", "left");
?>
<?php if ($sys_days_list->id->Visible) { // id ?>
	<?php if ($sys_days_list->SortUrl($sys_days_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $sys_days_list->id->headerCellClass() ?>"><div id="elh_sys_days_id" class="sys_days_id"><div class="ew-table-header-caption"><?php echo $sys_days_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $sys_days_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $sys_days_list->SortUrl($sys_days_list->id) ?>', 1);"><div id="elh_sys_days_id" class="sys_days_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sys_days_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($sys_days_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($sys_days_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sys_days_list->Days->Visible) { // Days ?>
	<?php if ($sys_days_list->SortUrl($sys_days_list->Days) == "") { ?>
		<th data-name="Days" class="<?php echo $sys_days_list->Days->headerCellClass() ?>"><div id="elh_sys_days_Days" class="sys_days_Days"><div class="ew-table-header-caption"><?php echo $sys_days_list->Days->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Days" class="<?php echo $sys_days_list->Days->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $sys_days_list->SortUrl($sys_days_list->Days) ?>', 1);"><div id="elh_sys_days_Days" class="sys_days_Days">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sys_days_list->Days->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($sys_days_list->Days->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($sys_days_list->Days->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$sys_days_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($sys_days_list->ExportAll && $sys_days_list->isExport()) {
	$sys_days_list->StopRecord = $sys_days_list->TotalRecords;
} else {

	// Set the last record to display
	if ($sys_days_list->TotalRecords > $sys_days_list->StartRecord + $sys_days_list->DisplayRecords - 1)
		$sys_days_list->StopRecord = $sys_days_list->StartRecord + $sys_days_list->DisplayRecords - 1;
	else
		$sys_days_list->StopRecord = $sys_days_list->TotalRecords;
}
$sys_days_list->RecordCount = $sys_days_list->StartRecord - 1;
if ($sys_days_list->Recordset && !$sys_days_list->Recordset->EOF) {
	$sys_days_list->Recordset->moveFirst();
	$selectLimit = $sys_days_list->UseSelectLimit;
	if (!$selectLimit && $sys_days_list->StartRecord > 1)
		$sys_days_list->Recordset->move($sys_days_list->StartRecord - 1);
} elseif (!$sys_days->AllowAddDeleteRow && $sys_days_list->StopRecord == 0) {
	$sys_days_list->StopRecord = $sys_days->GridAddRowCount;
}

// Initialize aggregate
$sys_days->RowType = ROWTYPE_AGGREGATEINIT;
$sys_days->resetAttributes();
$sys_days_list->renderRow();
while ($sys_days_list->RecordCount < $sys_days_list->StopRecord) {
	$sys_days_list->RecordCount++;
	if ($sys_days_list->RecordCount >= $sys_days_list->StartRecord) {
		$sys_days_list->RowCount++;

		// Set up key count
		$sys_days_list->KeyCount = $sys_days_list->RowIndex;

		// Init row class and style
		$sys_days->resetAttributes();
		$sys_days->CssClass = "";
		if ($sys_days_list->isGridAdd()) {
		} else {
			$sys_days_list->loadRowValues($sys_days_list->Recordset); // Load row values
		}
		$sys_days->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$sys_days->RowAttrs->merge(["data-rowindex" => $sys_days_list->RowCount, "id" => "r" . $sys_days_list->RowCount . "_sys_days", "data-rowtype" => $sys_days->RowType]);

		// Render row
		$sys_days_list->renderRow();

		// Render list options
		$sys_days_list->renderListOptions();
?>
	<tr <?php echo $sys_days->rowAttributes() ?>>
<?php

// Render list options (body, left)
$sys_days_list->ListOptions->render("body", "left", $sys_days_list->RowCount);
?>
	<?php if ($sys_days_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $sys_days_list->id->cellAttributes() ?>>
<span id="el<?php echo $sys_days_list->RowCount ?>_sys_days_id">
<span<?php echo $sys_days_list->id->viewAttributes() ?>><?php echo $sys_days_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sys_days_list->Days->Visible) { // Days ?>
		<td data-name="Days" <?php echo $sys_days_list->Days->cellAttributes() ?>>
<span id="el<?php echo $sys_days_list->RowCount ?>_sys_days_Days">
<span<?php echo $sys_days_list->Days->viewAttributes() ?>><?php echo $sys_days_list->Days->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$sys_days_list->ListOptions->render("body", "right", $sys_days_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$sys_days_list->isGridAdd())
		$sys_days_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$sys_days->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($sys_days_list->Recordset)
	$sys_days_list->Recordset->Close();
?>
<?php if (!$sys_days_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$sys_days_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $sys_days_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $sys_days_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($sys_days_list->TotalRecords == 0 && !$sys_days->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $sys_days_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$sys_days_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$sys_days_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$sys_days->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_sys_days",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$sys_days_list->terminate();
?>
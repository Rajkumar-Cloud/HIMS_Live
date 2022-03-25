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
$pres_routes_list = new pres_routes_list();

// Run the page
$pres_routes_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_routes_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$pres_routes_list->isExport()) { ?>
<script>
var fpres_routeslist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fpres_routeslist = currentForm = new ew.Form("fpres_routeslist", "list");
	fpres_routeslist.formKeyCountName = '<?php echo $pres_routes_list->FormKeyCountName ?>';
	loadjs.done("fpres_routeslist");
});
var fpres_routeslistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fpres_routeslistsrch = currentSearchForm = new ew.Form("fpres_routeslistsrch");

	// Dynamic selection lists
	// Filters

	fpres_routeslistsrch.filterList = <?php echo $pres_routes_list->getFilterList() ?>;
	loadjs.done("fpres_routeslistsrch");
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
<?php if (!$pres_routes_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($pres_routes_list->TotalRecords > 0 && $pres_routes_list->ExportOptions->visible()) { ?>
<?php $pres_routes_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($pres_routes_list->ImportOptions->visible()) { ?>
<?php $pres_routes_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($pres_routes_list->SearchOptions->visible()) { ?>
<?php $pres_routes_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($pres_routes_list->FilterOptions->visible()) { ?>
<?php $pres_routes_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$pres_routes_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$pres_routes_list->isExport() && !$pres_routes->CurrentAction) { ?>
<form name="fpres_routeslistsrch" id="fpres_routeslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fpres_routeslistsrch-search-panel" class="<?php echo $pres_routes_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pres_routes">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $pres_routes_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($pres_routes_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($pres_routes_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $pres_routes_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($pres_routes_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($pres_routes_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($pres_routes_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($pres_routes_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $pres_routes_list->showPageHeader(); ?>
<?php
$pres_routes_list->showMessage();
?>
<?php if ($pres_routes_list->TotalRecords > 0 || $pres_routes->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pres_routes_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pres_routes">
<?php if (!$pres_routes_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$pres_routes_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $pres_routes_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pres_routes_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpres_routeslist" id="fpres_routeslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_routes">
<div id="gmp_pres_routes" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($pres_routes_list->TotalRecords > 0 || $pres_routes_list->isGridEdit()) { ?>
<table id="tbl_pres_routeslist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pres_routes->RowType = ROWTYPE_HEADER;

// Render list options
$pres_routes_list->renderListOptions();

// Render list options (header, left)
$pres_routes_list->ListOptions->render("header", "left");
?>
<?php if ($pres_routes_list->S_No->Visible) { // S.No ?>
	<?php if ($pres_routes_list->SortUrl($pres_routes_list->S_No) == "") { ?>
		<th data-name="S_No" class="<?php echo $pres_routes_list->S_No->headerCellClass() ?>"><div id="elh_pres_routes_S_No" class="pres_routes_S_No"><div class="ew-table-header-caption"><?php echo $pres_routes_list->S_No->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="S_No" class="<?php echo $pres_routes_list->S_No->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_routes_list->SortUrl($pres_routes_list->S_No) ?>', 1);"><div id="elh_pres_routes_S_No" class="pres_routes_S_No">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_routes_list->S_No->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_routes_list->S_No->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_routes_list->S_No->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_routes_list->_Route->Visible) { // Route ?>
	<?php if ($pres_routes_list->SortUrl($pres_routes_list->_Route) == "") { ?>
		<th data-name="_Route" class="<?php echo $pres_routes_list->_Route->headerCellClass() ?>"><div id="elh_pres_routes__Route" class="pres_routes__Route"><div class="ew-table-header-caption"><?php echo $pres_routes_list->_Route->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_Route" class="<?php echo $pres_routes_list->_Route->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_routes_list->SortUrl($pres_routes_list->_Route) ?>', 1);"><div id="elh_pres_routes__Route" class="pres_routes__Route">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_routes_list->_Route->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_routes_list->_Route->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_routes_list->_Route->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pres_routes_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($pres_routes_list->ExportAll && $pres_routes_list->isExport()) {
	$pres_routes_list->StopRecord = $pres_routes_list->TotalRecords;
} else {

	// Set the last record to display
	if ($pres_routes_list->TotalRecords > $pres_routes_list->StartRecord + $pres_routes_list->DisplayRecords - 1)
		$pres_routes_list->StopRecord = $pres_routes_list->StartRecord + $pres_routes_list->DisplayRecords - 1;
	else
		$pres_routes_list->StopRecord = $pres_routes_list->TotalRecords;
}
$pres_routes_list->RecordCount = $pres_routes_list->StartRecord - 1;
if ($pres_routes_list->Recordset && !$pres_routes_list->Recordset->EOF) {
	$pres_routes_list->Recordset->moveFirst();
	$selectLimit = $pres_routes_list->UseSelectLimit;
	if (!$selectLimit && $pres_routes_list->StartRecord > 1)
		$pres_routes_list->Recordset->move($pres_routes_list->StartRecord - 1);
} elseif (!$pres_routes->AllowAddDeleteRow && $pres_routes_list->StopRecord == 0) {
	$pres_routes_list->StopRecord = $pres_routes->GridAddRowCount;
}

// Initialize aggregate
$pres_routes->RowType = ROWTYPE_AGGREGATEINIT;
$pres_routes->resetAttributes();
$pres_routes_list->renderRow();
while ($pres_routes_list->RecordCount < $pres_routes_list->StopRecord) {
	$pres_routes_list->RecordCount++;
	if ($pres_routes_list->RecordCount >= $pres_routes_list->StartRecord) {
		$pres_routes_list->RowCount++;

		// Set up key count
		$pres_routes_list->KeyCount = $pres_routes_list->RowIndex;

		// Init row class and style
		$pres_routes->resetAttributes();
		$pres_routes->CssClass = "";
		if ($pres_routes_list->isGridAdd()) {
		} else {
			$pres_routes_list->loadRowValues($pres_routes_list->Recordset); // Load row values
		}
		$pres_routes->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$pres_routes->RowAttrs->merge(["data-rowindex" => $pres_routes_list->RowCount, "id" => "r" . $pres_routes_list->RowCount . "_pres_routes", "data-rowtype" => $pres_routes->RowType]);

		// Render row
		$pres_routes_list->renderRow();

		// Render list options
		$pres_routes_list->renderListOptions();
?>
	<tr <?php echo $pres_routes->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pres_routes_list->ListOptions->render("body", "left", $pres_routes_list->RowCount);
?>
	<?php if ($pres_routes_list->S_No->Visible) { // S.No ?>
		<td data-name="S_No" <?php echo $pres_routes_list->S_No->cellAttributes() ?>>
<span id="el<?php echo $pres_routes_list->RowCount ?>_pres_routes_S_No">
<span<?php echo $pres_routes_list->S_No->viewAttributes() ?>><?php echo $pres_routes_list->S_No->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_routes_list->_Route->Visible) { // Route ?>
		<td data-name="_Route" <?php echo $pres_routes_list->_Route->cellAttributes() ?>>
<span id="el<?php echo $pres_routes_list->RowCount ?>_pres_routes__Route">
<span<?php echo $pres_routes_list->_Route->viewAttributes() ?>><?php echo $pres_routes_list->_Route->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pres_routes_list->ListOptions->render("body", "right", $pres_routes_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$pres_routes_list->isGridAdd())
		$pres_routes_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$pres_routes->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pres_routes_list->Recordset)
	$pres_routes_list->Recordset->Close();
?>
<?php if (!$pres_routes_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$pres_routes_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $pres_routes_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pres_routes_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pres_routes_list->TotalRecords == 0 && !$pres_routes->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pres_routes_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$pres_routes_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$pres_routes_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$pres_routes->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_pres_routes",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$pres_routes_list->terminate();
?>
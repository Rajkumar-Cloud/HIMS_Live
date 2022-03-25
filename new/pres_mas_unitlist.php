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
$pres_mas_unit_list = new pres_mas_unit_list();

// Run the page
$pres_mas_unit_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_mas_unit_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$pres_mas_unit_list->isExport()) { ?>
<script>
var fpres_mas_unitlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fpres_mas_unitlist = currentForm = new ew.Form("fpres_mas_unitlist", "list");
	fpres_mas_unitlist.formKeyCountName = '<?php echo $pres_mas_unit_list->FormKeyCountName ?>';
	loadjs.done("fpres_mas_unitlist");
});
var fpres_mas_unitlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fpres_mas_unitlistsrch = currentSearchForm = new ew.Form("fpres_mas_unitlistsrch");

	// Dynamic selection lists
	// Filters

	fpres_mas_unitlistsrch.filterList = <?php echo $pres_mas_unit_list->getFilterList() ?>;
	loadjs.done("fpres_mas_unitlistsrch");
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
<?php if (!$pres_mas_unit_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($pres_mas_unit_list->TotalRecords > 0 && $pres_mas_unit_list->ExportOptions->visible()) { ?>
<?php $pres_mas_unit_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($pres_mas_unit_list->ImportOptions->visible()) { ?>
<?php $pres_mas_unit_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($pres_mas_unit_list->SearchOptions->visible()) { ?>
<?php $pres_mas_unit_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($pres_mas_unit_list->FilterOptions->visible()) { ?>
<?php $pres_mas_unit_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$pres_mas_unit_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$pres_mas_unit_list->isExport() && !$pres_mas_unit->CurrentAction) { ?>
<form name="fpres_mas_unitlistsrch" id="fpres_mas_unitlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fpres_mas_unitlistsrch-search-panel" class="<?php echo $pres_mas_unit_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pres_mas_unit">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $pres_mas_unit_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($pres_mas_unit_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($pres_mas_unit_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $pres_mas_unit_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($pres_mas_unit_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($pres_mas_unit_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($pres_mas_unit_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($pres_mas_unit_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $pres_mas_unit_list->showPageHeader(); ?>
<?php
$pres_mas_unit_list->showMessage();
?>
<?php if ($pres_mas_unit_list->TotalRecords > 0 || $pres_mas_unit->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pres_mas_unit_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pres_mas_unit">
<?php if (!$pres_mas_unit_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$pres_mas_unit_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $pres_mas_unit_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pres_mas_unit_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpres_mas_unitlist" id="fpres_mas_unitlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_mas_unit">
<div id="gmp_pres_mas_unit" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($pres_mas_unit_list->TotalRecords > 0 || $pres_mas_unit_list->isGridEdit()) { ?>
<table id="tbl_pres_mas_unitlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pres_mas_unit->RowType = ROWTYPE_HEADER;

// Render list options
$pres_mas_unit_list->renderListOptions();

// Render list options (header, left)
$pres_mas_unit_list->ListOptions->render("header", "left");
?>
<?php if ($pres_mas_unit_list->id->Visible) { // id ?>
	<?php if ($pres_mas_unit_list->SortUrl($pres_mas_unit_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $pres_mas_unit_list->id->headerCellClass() ?>"><div id="elh_pres_mas_unit_id" class="pres_mas_unit_id"><div class="ew-table-header-caption"><?php echo $pres_mas_unit_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $pres_mas_unit_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_mas_unit_list->SortUrl($pres_mas_unit_list->id) ?>', 1);"><div id="elh_pres_mas_unit_id" class="pres_mas_unit_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_mas_unit_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_mas_unit_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_mas_unit_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_mas_unit_list->Units->Visible) { // Units ?>
	<?php if ($pres_mas_unit_list->SortUrl($pres_mas_unit_list->Units) == "") { ?>
		<th data-name="Units" class="<?php echo $pres_mas_unit_list->Units->headerCellClass() ?>"><div id="elh_pres_mas_unit_Units" class="pres_mas_unit_Units"><div class="ew-table-header-caption"><?php echo $pres_mas_unit_list->Units->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Units" class="<?php echo $pres_mas_unit_list->Units->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_mas_unit_list->SortUrl($pres_mas_unit_list->Units) ?>', 1);"><div id="elh_pres_mas_unit_Units" class="pres_mas_unit_Units">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_mas_unit_list->Units->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_mas_unit_list->Units->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_mas_unit_list->Units->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pres_mas_unit_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($pres_mas_unit_list->ExportAll && $pres_mas_unit_list->isExport()) {
	$pres_mas_unit_list->StopRecord = $pres_mas_unit_list->TotalRecords;
} else {

	// Set the last record to display
	if ($pres_mas_unit_list->TotalRecords > $pres_mas_unit_list->StartRecord + $pres_mas_unit_list->DisplayRecords - 1)
		$pres_mas_unit_list->StopRecord = $pres_mas_unit_list->StartRecord + $pres_mas_unit_list->DisplayRecords - 1;
	else
		$pres_mas_unit_list->StopRecord = $pres_mas_unit_list->TotalRecords;
}
$pres_mas_unit_list->RecordCount = $pres_mas_unit_list->StartRecord - 1;
if ($pres_mas_unit_list->Recordset && !$pres_mas_unit_list->Recordset->EOF) {
	$pres_mas_unit_list->Recordset->moveFirst();
	$selectLimit = $pres_mas_unit_list->UseSelectLimit;
	if (!$selectLimit && $pres_mas_unit_list->StartRecord > 1)
		$pres_mas_unit_list->Recordset->move($pres_mas_unit_list->StartRecord - 1);
} elseif (!$pres_mas_unit->AllowAddDeleteRow && $pres_mas_unit_list->StopRecord == 0) {
	$pres_mas_unit_list->StopRecord = $pres_mas_unit->GridAddRowCount;
}

// Initialize aggregate
$pres_mas_unit->RowType = ROWTYPE_AGGREGATEINIT;
$pres_mas_unit->resetAttributes();
$pres_mas_unit_list->renderRow();
while ($pres_mas_unit_list->RecordCount < $pres_mas_unit_list->StopRecord) {
	$pres_mas_unit_list->RecordCount++;
	if ($pres_mas_unit_list->RecordCount >= $pres_mas_unit_list->StartRecord) {
		$pres_mas_unit_list->RowCount++;

		// Set up key count
		$pres_mas_unit_list->KeyCount = $pres_mas_unit_list->RowIndex;

		// Init row class and style
		$pres_mas_unit->resetAttributes();
		$pres_mas_unit->CssClass = "";
		if ($pres_mas_unit_list->isGridAdd()) {
		} else {
			$pres_mas_unit_list->loadRowValues($pres_mas_unit_list->Recordset); // Load row values
		}
		$pres_mas_unit->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$pres_mas_unit->RowAttrs->merge(["data-rowindex" => $pres_mas_unit_list->RowCount, "id" => "r" . $pres_mas_unit_list->RowCount . "_pres_mas_unit", "data-rowtype" => $pres_mas_unit->RowType]);

		// Render row
		$pres_mas_unit_list->renderRow();

		// Render list options
		$pres_mas_unit_list->renderListOptions();
?>
	<tr <?php echo $pres_mas_unit->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pres_mas_unit_list->ListOptions->render("body", "left", $pres_mas_unit_list->RowCount);
?>
	<?php if ($pres_mas_unit_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $pres_mas_unit_list->id->cellAttributes() ?>>
<span id="el<?php echo $pres_mas_unit_list->RowCount ?>_pres_mas_unit_id">
<span<?php echo $pres_mas_unit_list->id->viewAttributes() ?>><?php echo $pres_mas_unit_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_mas_unit_list->Units->Visible) { // Units ?>
		<td data-name="Units" <?php echo $pres_mas_unit_list->Units->cellAttributes() ?>>
<span id="el<?php echo $pres_mas_unit_list->RowCount ?>_pres_mas_unit_Units">
<span<?php echo $pres_mas_unit_list->Units->viewAttributes() ?>><?php echo $pres_mas_unit_list->Units->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pres_mas_unit_list->ListOptions->render("body", "right", $pres_mas_unit_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$pres_mas_unit_list->isGridAdd())
		$pres_mas_unit_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$pres_mas_unit->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pres_mas_unit_list->Recordset)
	$pres_mas_unit_list->Recordset->Close();
?>
<?php if (!$pres_mas_unit_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$pres_mas_unit_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $pres_mas_unit_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pres_mas_unit_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pres_mas_unit_list->TotalRecords == 0 && !$pres_mas_unit->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pres_mas_unit_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$pres_mas_unit_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$pres_mas_unit_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$pres_mas_unit->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_pres_mas_unit",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$pres_mas_unit_list->terminate();
?>
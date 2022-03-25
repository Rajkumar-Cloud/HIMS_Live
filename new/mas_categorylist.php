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
$mas_category_list = new mas_category_list();

// Run the page
$mas_category_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_category_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$mas_category_list->isExport()) { ?>
<script>
var fmas_categorylist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fmas_categorylist = currentForm = new ew.Form("fmas_categorylist", "list");
	fmas_categorylist.formKeyCountName = '<?php echo $mas_category_list->FormKeyCountName ?>';
	loadjs.done("fmas_categorylist");
});
var fmas_categorylistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fmas_categorylistsrch = currentSearchForm = new ew.Form("fmas_categorylistsrch");

	// Dynamic selection lists
	// Filters

	fmas_categorylistsrch.filterList = <?php echo $mas_category_list->getFilterList() ?>;
	loadjs.done("fmas_categorylistsrch");
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
<?php if (!$mas_category_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($mas_category_list->TotalRecords > 0 && $mas_category_list->ExportOptions->visible()) { ?>
<?php $mas_category_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($mas_category_list->ImportOptions->visible()) { ?>
<?php $mas_category_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($mas_category_list->SearchOptions->visible()) { ?>
<?php $mas_category_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($mas_category_list->FilterOptions->visible()) { ?>
<?php $mas_category_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$mas_category_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$mas_category_list->isExport() && !$mas_category->CurrentAction) { ?>
<form name="fmas_categorylistsrch" id="fmas_categorylistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fmas_categorylistsrch-search-panel" class="<?php echo $mas_category_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="mas_category">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $mas_category_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($mas_category_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($mas_category_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $mas_category_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($mas_category_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($mas_category_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($mas_category_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($mas_category_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $mas_category_list->showPageHeader(); ?>
<?php
$mas_category_list->showMessage();
?>
<?php if ($mas_category_list->TotalRecords > 0 || $mas_category->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($mas_category_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> mas_category">
<?php if (!$mas_category_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$mas_category_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $mas_category_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $mas_category_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fmas_categorylist" id="fmas_categorylist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_category">
<div id="gmp_mas_category" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($mas_category_list->TotalRecords > 0 || $mas_category_list->isGridEdit()) { ?>
<table id="tbl_mas_categorylist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$mas_category->RowType = ROWTYPE_HEADER;

// Render list options
$mas_category_list->renderListOptions();

// Render list options (header, left)
$mas_category_list->ListOptions->render("header", "left");
?>
<?php if ($mas_category_list->id->Visible) { // id ?>
	<?php if ($mas_category_list->SortUrl($mas_category_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $mas_category_list->id->headerCellClass() ?>"><div id="elh_mas_category_id" class="mas_category_id"><div class="ew-table-header-caption"><?php echo $mas_category_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $mas_category_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mas_category_list->SortUrl($mas_category_list->id) ?>', 1);"><div id="elh_mas_category_id" class="mas_category_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_category_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_category_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mas_category_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_category_list->CATEGORY->Visible) { // CATEGORY ?>
	<?php if ($mas_category_list->SortUrl($mas_category_list->CATEGORY) == "") { ?>
		<th data-name="CATEGORY" class="<?php echo $mas_category_list->CATEGORY->headerCellClass() ?>"><div id="elh_mas_category_CATEGORY" class="mas_category_CATEGORY"><div class="ew-table-header-caption"><?php echo $mas_category_list->CATEGORY->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CATEGORY" class="<?php echo $mas_category_list->CATEGORY->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mas_category_list->SortUrl($mas_category_list->CATEGORY) ?>', 1);"><div id="elh_mas_category_CATEGORY" class="mas_category_CATEGORY">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_category_list->CATEGORY->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_category_list->CATEGORY->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mas_category_list->CATEGORY->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$mas_category_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($mas_category_list->ExportAll && $mas_category_list->isExport()) {
	$mas_category_list->StopRecord = $mas_category_list->TotalRecords;
} else {

	// Set the last record to display
	if ($mas_category_list->TotalRecords > $mas_category_list->StartRecord + $mas_category_list->DisplayRecords - 1)
		$mas_category_list->StopRecord = $mas_category_list->StartRecord + $mas_category_list->DisplayRecords - 1;
	else
		$mas_category_list->StopRecord = $mas_category_list->TotalRecords;
}
$mas_category_list->RecordCount = $mas_category_list->StartRecord - 1;
if ($mas_category_list->Recordset && !$mas_category_list->Recordset->EOF) {
	$mas_category_list->Recordset->moveFirst();
	$selectLimit = $mas_category_list->UseSelectLimit;
	if (!$selectLimit && $mas_category_list->StartRecord > 1)
		$mas_category_list->Recordset->move($mas_category_list->StartRecord - 1);
} elseif (!$mas_category->AllowAddDeleteRow && $mas_category_list->StopRecord == 0) {
	$mas_category_list->StopRecord = $mas_category->GridAddRowCount;
}

// Initialize aggregate
$mas_category->RowType = ROWTYPE_AGGREGATEINIT;
$mas_category->resetAttributes();
$mas_category_list->renderRow();
while ($mas_category_list->RecordCount < $mas_category_list->StopRecord) {
	$mas_category_list->RecordCount++;
	if ($mas_category_list->RecordCount >= $mas_category_list->StartRecord) {
		$mas_category_list->RowCount++;

		// Set up key count
		$mas_category_list->KeyCount = $mas_category_list->RowIndex;

		// Init row class and style
		$mas_category->resetAttributes();
		$mas_category->CssClass = "";
		if ($mas_category_list->isGridAdd()) {
		} else {
			$mas_category_list->loadRowValues($mas_category_list->Recordset); // Load row values
		}
		$mas_category->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$mas_category->RowAttrs->merge(["data-rowindex" => $mas_category_list->RowCount, "id" => "r" . $mas_category_list->RowCount . "_mas_category", "data-rowtype" => $mas_category->RowType]);

		// Render row
		$mas_category_list->renderRow();

		// Render list options
		$mas_category_list->renderListOptions();
?>
	<tr <?php echo $mas_category->rowAttributes() ?>>
<?php

// Render list options (body, left)
$mas_category_list->ListOptions->render("body", "left", $mas_category_list->RowCount);
?>
	<?php if ($mas_category_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $mas_category_list->id->cellAttributes() ?>>
<span id="el<?php echo $mas_category_list->RowCount ?>_mas_category_id">
<span<?php echo $mas_category_list->id->viewAttributes() ?>><?php echo $mas_category_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($mas_category_list->CATEGORY->Visible) { // CATEGORY ?>
		<td data-name="CATEGORY" <?php echo $mas_category_list->CATEGORY->cellAttributes() ?>>
<span id="el<?php echo $mas_category_list->RowCount ?>_mas_category_CATEGORY">
<span<?php echo $mas_category_list->CATEGORY->viewAttributes() ?>><?php echo $mas_category_list->CATEGORY->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$mas_category_list->ListOptions->render("body", "right", $mas_category_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$mas_category_list->isGridAdd())
		$mas_category_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$mas_category->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($mas_category_list->Recordset)
	$mas_category_list->Recordset->Close();
?>
<?php if (!$mas_category_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$mas_category_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $mas_category_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $mas_category_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($mas_category_list->TotalRecords == 0 && !$mas_category->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $mas_category_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$mas_category_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$mas_category_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$mas_category->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_mas_category",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$mas_category_list->terminate();
?>
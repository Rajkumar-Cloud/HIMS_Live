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
$mas_paymentcategory_list = new mas_paymentcategory_list();

// Run the page
$mas_paymentcategory_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_paymentcategory_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$mas_paymentcategory_list->isExport()) { ?>
<script>
var fmas_paymentcategorylist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fmas_paymentcategorylist = currentForm = new ew.Form("fmas_paymentcategorylist", "list");
	fmas_paymentcategorylist.formKeyCountName = '<?php echo $mas_paymentcategory_list->FormKeyCountName ?>';
	loadjs.done("fmas_paymentcategorylist");
});
var fmas_paymentcategorylistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fmas_paymentcategorylistsrch = currentSearchForm = new ew.Form("fmas_paymentcategorylistsrch");

	// Dynamic selection lists
	// Filters

	fmas_paymentcategorylistsrch.filterList = <?php echo $mas_paymentcategory_list->getFilterList() ?>;
	loadjs.done("fmas_paymentcategorylistsrch");
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
<?php if (!$mas_paymentcategory_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($mas_paymentcategory_list->TotalRecords > 0 && $mas_paymentcategory_list->ExportOptions->visible()) { ?>
<?php $mas_paymentcategory_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($mas_paymentcategory_list->ImportOptions->visible()) { ?>
<?php $mas_paymentcategory_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($mas_paymentcategory_list->SearchOptions->visible()) { ?>
<?php $mas_paymentcategory_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($mas_paymentcategory_list->FilterOptions->visible()) { ?>
<?php $mas_paymentcategory_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$mas_paymentcategory_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$mas_paymentcategory_list->isExport() && !$mas_paymentcategory->CurrentAction) { ?>
<form name="fmas_paymentcategorylistsrch" id="fmas_paymentcategorylistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fmas_paymentcategorylistsrch-search-panel" class="<?php echo $mas_paymentcategory_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="mas_paymentcategory">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $mas_paymentcategory_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($mas_paymentcategory_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($mas_paymentcategory_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $mas_paymentcategory_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($mas_paymentcategory_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($mas_paymentcategory_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($mas_paymentcategory_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($mas_paymentcategory_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $mas_paymentcategory_list->showPageHeader(); ?>
<?php
$mas_paymentcategory_list->showMessage();
?>
<?php if ($mas_paymentcategory_list->TotalRecords > 0 || $mas_paymentcategory->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($mas_paymentcategory_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> mas_paymentcategory">
<?php if (!$mas_paymentcategory_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$mas_paymentcategory_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $mas_paymentcategory_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $mas_paymentcategory_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fmas_paymentcategorylist" id="fmas_paymentcategorylist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_paymentcategory">
<div id="gmp_mas_paymentcategory" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($mas_paymentcategory_list->TotalRecords > 0 || $mas_paymentcategory_list->isGridEdit()) { ?>
<table id="tbl_mas_paymentcategorylist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$mas_paymentcategory->RowType = ROWTYPE_HEADER;

// Render list options
$mas_paymentcategory_list->renderListOptions();

// Render list options (header, left)
$mas_paymentcategory_list->ListOptions->render("header", "left");
?>
<?php if ($mas_paymentcategory_list->id->Visible) { // id ?>
	<?php if ($mas_paymentcategory_list->SortUrl($mas_paymentcategory_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $mas_paymentcategory_list->id->headerCellClass() ?>"><div id="elh_mas_paymentcategory_id" class="mas_paymentcategory_id"><div class="ew-table-header-caption"><?php echo $mas_paymentcategory_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $mas_paymentcategory_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mas_paymentcategory_list->SortUrl($mas_paymentcategory_list->id) ?>', 1);"><div id="elh_mas_paymentcategory_id" class="mas_paymentcategory_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_paymentcategory_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_paymentcategory_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mas_paymentcategory_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_paymentcategory_list->Category->Visible) { // Category ?>
	<?php if ($mas_paymentcategory_list->SortUrl($mas_paymentcategory_list->Category) == "") { ?>
		<th data-name="Category" class="<?php echo $mas_paymentcategory_list->Category->headerCellClass() ?>"><div id="elh_mas_paymentcategory_Category" class="mas_paymentcategory_Category"><div class="ew-table-header-caption"><?php echo $mas_paymentcategory_list->Category->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Category" class="<?php echo $mas_paymentcategory_list->Category->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mas_paymentcategory_list->SortUrl($mas_paymentcategory_list->Category) ?>', 1);"><div id="elh_mas_paymentcategory_Category" class="mas_paymentcategory_Category">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_paymentcategory_list->Category->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_paymentcategory_list->Category->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mas_paymentcategory_list->Category->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$mas_paymentcategory_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($mas_paymentcategory_list->ExportAll && $mas_paymentcategory_list->isExport()) {
	$mas_paymentcategory_list->StopRecord = $mas_paymentcategory_list->TotalRecords;
} else {

	// Set the last record to display
	if ($mas_paymentcategory_list->TotalRecords > $mas_paymentcategory_list->StartRecord + $mas_paymentcategory_list->DisplayRecords - 1)
		$mas_paymentcategory_list->StopRecord = $mas_paymentcategory_list->StartRecord + $mas_paymentcategory_list->DisplayRecords - 1;
	else
		$mas_paymentcategory_list->StopRecord = $mas_paymentcategory_list->TotalRecords;
}
$mas_paymentcategory_list->RecordCount = $mas_paymentcategory_list->StartRecord - 1;
if ($mas_paymentcategory_list->Recordset && !$mas_paymentcategory_list->Recordset->EOF) {
	$mas_paymentcategory_list->Recordset->moveFirst();
	$selectLimit = $mas_paymentcategory_list->UseSelectLimit;
	if (!$selectLimit && $mas_paymentcategory_list->StartRecord > 1)
		$mas_paymentcategory_list->Recordset->move($mas_paymentcategory_list->StartRecord - 1);
} elseif (!$mas_paymentcategory->AllowAddDeleteRow && $mas_paymentcategory_list->StopRecord == 0) {
	$mas_paymentcategory_list->StopRecord = $mas_paymentcategory->GridAddRowCount;
}

// Initialize aggregate
$mas_paymentcategory->RowType = ROWTYPE_AGGREGATEINIT;
$mas_paymentcategory->resetAttributes();
$mas_paymentcategory_list->renderRow();
while ($mas_paymentcategory_list->RecordCount < $mas_paymentcategory_list->StopRecord) {
	$mas_paymentcategory_list->RecordCount++;
	if ($mas_paymentcategory_list->RecordCount >= $mas_paymentcategory_list->StartRecord) {
		$mas_paymentcategory_list->RowCount++;

		// Set up key count
		$mas_paymentcategory_list->KeyCount = $mas_paymentcategory_list->RowIndex;

		// Init row class and style
		$mas_paymentcategory->resetAttributes();
		$mas_paymentcategory->CssClass = "";
		if ($mas_paymentcategory_list->isGridAdd()) {
		} else {
			$mas_paymentcategory_list->loadRowValues($mas_paymentcategory_list->Recordset); // Load row values
		}
		$mas_paymentcategory->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$mas_paymentcategory->RowAttrs->merge(["data-rowindex" => $mas_paymentcategory_list->RowCount, "id" => "r" . $mas_paymentcategory_list->RowCount . "_mas_paymentcategory", "data-rowtype" => $mas_paymentcategory->RowType]);

		// Render row
		$mas_paymentcategory_list->renderRow();

		// Render list options
		$mas_paymentcategory_list->renderListOptions();
?>
	<tr <?php echo $mas_paymentcategory->rowAttributes() ?>>
<?php

// Render list options (body, left)
$mas_paymentcategory_list->ListOptions->render("body", "left", $mas_paymentcategory_list->RowCount);
?>
	<?php if ($mas_paymentcategory_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $mas_paymentcategory_list->id->cellAttributes() ?>>
<span id="el<?php echo $mas_paymentcategory_list->RowCount ?>_mas_paymentcategory_id">
<span<?php echo $mas_paymentcategory_list->id->viewAttributes() ?>><?php echo $mas_paymentcategory_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($mas_paymentcategory_list->Category->Visible) { // Category ?>
		<td data-name="Category" <?php echo $mas_paymentcategory_list->Category->cellAttributes() ?>>
<span id="el<?php echo $mas_paymentcategory_list->RowCount ?>_mas_paymentcategory_Category">
<span<?php echo $mas_paymentcategory_list->Category->viewAttributes() ?>><?php echo $mas_paymentcategory_list->Category->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$mas_paymentcategory_list->ListOptions->render("body", "right", $mas_paymentcategory_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$mas_paymentcategory_list->isGridAdd())
		$mas_paymentcategory_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$mas_paymentcategory->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($mas_paymentcategory_list->Recordset)
	$mas_paymentcategory_list->Recordset->Close();
?>
<?php if (!$mas_paymentcategory_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$mas_paymentcategory_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $mas_paymentcategory_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $mas_paymentcategory_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($mas_paymentcategory_list->TotalRecords == 0 && !$mas_paymentcategory->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $mas_paymentcategory_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$mas_paymentcategory_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$mas_paymentcategory_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$mas_paymentcategory->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_mas_paymentcategory",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$mas_paymentcategory_list->terminate();
?>
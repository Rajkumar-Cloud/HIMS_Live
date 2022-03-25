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
$pres_categoryallergy_list = new pres_categoryallergy_list();

// Run the page
$pres_categoryallergy_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_categoryallergy_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$pres_categoryallergy_list->isExport()) { ?>
<script>
var fpres_categoryallergylist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fpres_categoryallergylist = currentForm = new ew.Form("fpres_categoryallergylist", "list");
	fpres_categoryallergylist.formKeyCountName = '<?php echo $pres_categoryallergy_list->FormKeyCountName ?>';
	loadjs.done("fpres_categoryallergylist");
});
var fpres_categoryallergylistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fpres_categoryallergylistsrch = currentSearchForm = new ew.Form("fpres_categoryallergylistsrch");

	// Dynamic selection lists
	// Filters

	fpres_categoryallergylistsrch.filterList = <?php echo $pres_categoryallergy_list->getFilterList() ?>;
	loadjs.done("fpres_categoryallergylistsrch");
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
<?php if (!$pres_categoryallergy_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($pres_categoryallergy_list->TotalRecords > 0 && $pres_categoryallergy_list->ExportOptions->visible()) { ?>
<?php $pres_categoryallergy_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($pres_categoryallergy_list->ImportOptions->visible()) { ?>
<?php $pres_categoryallergy_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($pres_categoryallergy_list->SearchOptions->visible()) { ?>
<?php $pres_categoryallergy_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($pres_categoryallergy_list->FilterOptions->visible()) { ?>
<?php $pres_categoryallergy_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$pres_categoryallergy_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$pres_categoryallergy_list->isExport() && !$pres_categoryallergy->CurrentAction) { ?>
<form name="fpres_categoryallergylistsrch" id="fpres_categoryallergylistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fpres_categoryallergylistsrch-search-panel" class="<?php echo $pres_categoryallergy_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pres_categoryallergy">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $pres_categoryallergy_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($pres_categoryallergy_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($pres_categoryallergy_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $pres_categoryallergy_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($pres_categoryallergy_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($pres_categoryallergy_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($pres_categoryallergy_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($pres_categoryallergy_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $pres_categoryallergy_list->showPageHeader(); ?>
<?php
$pres_categoryallergy_list->showMessage();
?>
<?php if ($pres_categoryallergy_list->TotalRecords > 0 || $pres_categoryallergy->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pres_categoryallergy_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pres_categoryallergy">
<?php if (!$pres_categoryallergy_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$pres_categoryallergy_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $pres_categoryallergy_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pres_categoryallergy_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpres_categoryallergylist" id="fpres_categoryallergylist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_categoryallergy">
<div id="gmp_pres_categoryallergy" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($pres_categoryallergy_list->TotalRecords > 0 || $pres_categoryallergy_list->isGridEdit()) { ?>
<table id="tbl_pres_categoryallergylist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pres_categoryallergy->RowType = ROWTYPE_HEADER;

// Render list options
$pres_categoryallergy_list->renderListOptions();

// Render list options (header, left)
$pres_categoryallergy_list->ListOptions->render("header", "left");
?>
<?php if ($pres_categoryallergy_list->id->Visible) { // id ?>
	<?php if ($pres_categoryallergy_list->SortUrl($pres_categoryallergy_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $pres_categoryallergy_list->id->headerCellClass() ?>"><div id="elh_pres_categoryallergy_id" class="pres_categoryallergy_id"><div class="ew-table-header-caption"><?php echo $pres_categoryallergy_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $pres_categoryallergy_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_categoryallergy_list->SortUrl($pres_categoryallergy_list->id) ?>', 1);"><div id="elh_pres_categoryallergy_id" class="pres_categoryallergy_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_categoryallergy_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_categoryallergy_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_categoryallergy_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_categoryallergy_list->Genericname->Visible) { // Genericname ?>
	<?php if ($pres_categoryallergy_list->SortUrl($pres_categoryallergy_list->Genericname) == "") { ?>
		<th data-name="Genericname" class="<?php echo $pres_categoryallergy_list->Genericname->headerCellClass() ?>"><div id="elh_pres_categoryallergy_Genericname" class="pres_categoryallergy_Genericname"><div class="ew-table-header-caption"><?php echo $pres_categoryallergy_list->Genericname->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Genericname" class="<?php echo $pres_categoryallergy_list->Genericname->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_categoryallergy_list->SortUrl($pres_categoryallergy_list->Genericname) ?>', 1);"><div id="elh_pres_categoryallergy_Genericname" class="pres_categoryallergy_Genericname">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_categoryallergy_list->Genericname->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_categoryallergy_list->Genericname->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_categoryallergy_list->Genericname->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_categoryallergy_list->CategoryDrug->Visible) { // CategoryDrug ?>
	<?php if ($pres_categoryallergy_list->SortUrl($pres_categoryallergy_list->CategoryDrug) == "") { ?>
		<th data-name="CategoryDrug" class="<?php echo $pres_categoryallergy_list->CategoryDrug->headerCellClass() ?>"><div id="elh_pres_categoryallergy_CategoryDrug" class="pres_categoryallergy_CategoryDrug"><div class="ew-table-header-caption"><?php echo $pres_categoryallergy_list->CategoryDrug->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CategoryDrug" class="<?php echo $pres_categoryallergy_list->CategoryDrug->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_categoryallergy_list->SortUrl($pres_categoryallergy_list->CategoryDrug) ?>', 1);"><div id="elh_pres_categoryallergy_CategoryDrug" class="pres_categoryallergy_CategoryDrug">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_categoryallergy_list->CategoryDrug->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_categoryallergy_list->CategoryDrug->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_categoryallergy_list->CategoryDrug->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pres_categoryallergy_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($pres_categoryallergy_list->ExportAll && $pres_categoryallergy_list->isExport()) {
	$pres_categoryallergy_list->StopRecord = $pres_categoryallergy_list->TotalRecords;
} else {

	// Set the last record to display
	if ($pres_categoryallergy_list->TotalRecords > $pres_categoryallergy_list->StartRecord + $pres_categoryallergy_list->DisplayRecords - 1)
		$pres_categoryallergy_list->StopRecord = $pres_categoryallergy_list->StartRecord + $pres_categoryallergy_list->DisplayRecords - 1;
	else
		$pres_categoryallergy_list->StopRecord = $pres_categoryallergy_list->TotalRecords;
}
$pres_categoryallergy_list->RecordCount = $pres_categoryallergy_list->StartRecord - 1;
if ($pres_categoryallergy_list->Recordset && !$pres_categoryallergy_list->Recordset->EOF) {
	$pres_categoryallergy_list->Recordset->moveFirst();
	$selectLimit = $pres_categoryallergy_list->UseSelectLimit;
	if (!$selectLimit && $pres_categoryallergy_list->StartRecord > 1)
		$pres_categoryallergy_list->Recordset->move($pres_categoryallergy_list->StartRecord - 1);
} elseif (!$pres_categoryallergy->AllowAddDeleteRow && $pres_categoryallergy_list->StopRecord == 0) {
	$pres_categoryallergy_list->StopRecord = $pres_categoryallergy->GridAddRowCount;
}

// Initialize aggregate
$pres_categoryallergy->RowType = ROWTYPE_AGGREGATEINIT;
$pres_categoryallergy->resetAttributes();
$pres_categoryallergy_list->renderRow();
while ($pres_categoryallergy_list->RecordCount < $pres_categoryallergy_list->StopRecord) {
	$pres_categoryallergy_list->RecordCount++;
	if ($pres_categoryallergy_list->RecordCount >= $pres_categoryallergy_list->StartRecord) {
		$pres_categoryallergy_list->RowCount++;

		// Set up key count
		$pres_categoryallergy_list->KeyCount = $pres_categoryallergy_list->RowIndex;

		// Init row class and style
		$pres_categoryallergy->resetAttributes();
		$pres_categoryallergy->CssClass = "";
		if ($pres_categoryallergy_list->isGridAdd()) {
		} else {
			$pres_categoryallergy_list->loadRowValues($pres_categoryallergy_list->Recordset); // Load row values
		}
		$pres_categoryallergy->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$pres_categoryallergy->RowAttrs->merge(["data-rowindex" => $pres_categoryallergy_list->RowCount, "id" => "r" . $pres_categoryallergy_list->RowCount . "_pres_categoryallergy", "data-rowtype" => $pres_categoryallergy->RowType]);

		// Render row
		$pres_categoryallergy_list->renderRow();

		// Render list options
		$pres_categoryallergy_list->renderListOptions();
?>
	<tr <?php echo $pres_categoryallergy->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pres_categoryallergy_list->ListOptions->render("body", "left", $pres_categoryallergy_list->RowCount);
?>
	<?php if ($pres_categoryallergy_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $pres_categoryallergy_list->id->cellAttributes() ?>>
<span id="el<?php echo $pres_categoryallergy_list->RowCount ?>_pres_categoryallergy_id">
<span<?php echo $pres_categoryallergy_list->id->viewAttributes() ?>><?php echo $pres_categoryallergy_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_categoryallergy_list->Genericname->Visible) { // Genericname ?>
		<td data-name="Genericname" <?php echo $pres_categoryallergy_list->Genericname->cellAttributes() ?>>
<span id="el<?php echo $pres_categoryallergy_list->RowCount ?>_pres_categoryallergy_Genericname">
<span<?php echo $pres_categoryallergy_list->Genericname->viewAttributes() ?>><?php echo $pres_categoryallergy_list->Genericname->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_categoryallergy_list->CategoryDrug->Visible) { // CategoryDrug ?>
		<td data-name="CategoryDrug" <?php echo $pres_categoryallergy_list->CategoryDrug->cellAttributes() ?>>
<span id="el<?php echo $pres_categoryallergy_list->RowCount ?>_pres_categoryallergy_CategoryDrug">
<span<?php echo $pres_categoryallergy_list->CategoryDrug->viewAttributes() ?>><?php echo $pres_categoryallergy_list->CategoryDrug->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pres_categoryallergy_list->ListOptions->render("body", "right", $pres_categoryallergy_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$pres_categoryallergy_list->isGridAdd())
		$pres_categoryallergy_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$pres_categoryallergy->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pres_categoryallergy_list->Recordset)
	$pres_categoryallergy_list->Recordset->Close();
?>
<?php if (!$pres_categoryallergy_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$pres_categoryallergy_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $pres_categoryallergy_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pres_categoryallergy_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pres_categoryallergy_list->TotalRecords == 0 && !$pres_categoryallergy->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pres_categoryallergy_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$pres_categoryallergy_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$pres_categoryallergy_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$pres_categoryallergy->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_pres_categoryallergy",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$pres_categoryallergy_list->terminate();
?>
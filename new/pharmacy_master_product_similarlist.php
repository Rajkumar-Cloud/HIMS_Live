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
$pharmacy_master_product_similar_list = new pharmacy_master_product_similar_list();

// Run the page
$pharmacy_master_product_similar_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_master_product_similar_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$pharmacy_master_product_similar_list->isExport()) { ?>
<script>
var fpharmacy_master_product_similarlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fpharmacy_master_product_similarlist = currentForm = new ew.Form("fpharmacy_master_product_similarlist", "list");
	fpharmacy_master_product_similarlist.formKeyCountName = '<?php echo $pharmacy_master_product_similar_list->FormKeyCountName ?>';
	loadjs.done("fpharmacy_master_product_similarlist");
});
var fpharmacy_master_product_similarlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fpharmacy_master_product_similarlistsrch = currentSearchForm = new ew.Form("fpharmacy_master_product_similarlistsrch");

	// Dynamic selection lists
	// Filters

	fpharmacy_master_product_similarlistsrch.filterList = <?php echo $pharmacy_master_product_similar_list->getFilterList() ?>;
	loadjs.done("fpharmacy_master_product_similarlistsrch");
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
<?php if (!$pharmacy_master_product_similar_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($pharmacy_master_product_similar_list->TotalRecords > 0 && $pharmacy_master_product_similar_list->ExportOptions->visible()) { ?>
<?php $pharmacy_master_product_similar_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_master_product_similar_list->ImportOptions->visible()) { ?>
<?php $pharmacy_master_product_similar_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_master_product_similar_list->SearchOptions->visible()) { ?>
<?php $pharmacy_master_product_similar_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_master_product_similar_list->FilterOptions->visible()) { ?>
<?php $pharmacy_master_product_similar_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$pharmacy_master_product_similar_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$pharmacy_master_product_similar_list->isExport() && !$pharmacy_master_product_similar->CurrentAction) { ?>
<form name="fpharmacy_master_product_similarlistsrch" id="fpharmacy_master_product_similarlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fpharmacy_master_product_similarlistsrch-search-panel" class="<?php echo $pharmacy_master_product_similar_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pharmacy_master_product_similar">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $pharmacy_master_product_similar_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($pharmacy_master_product_similar_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($pharmacy_master_product_similar_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $pharmacy_master_product_similar_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($pharmacy_master_product_similar_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_master_product_similar_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_master_product_similar_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_master_product_similar_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $pharmacy_master_product_similar_list->showPageHeader(); ?>
<?php
$pharmacy_master_product_similar_list->showMessage();
?>
<?php if ($pharmacy_master_product_similar_list->TotalRecords > 0 || $pharmacy_master_product_similar->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pharmacy_master_product_similar_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pharmacy_master_product_similar">
<?php if (!$pharmacy_master_product_similar_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$pharmacy_master_product_similar_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $pharmacy_master_product_similar_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_master_product_similar_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpharmacy_master_product_similarlist" id="fpharmacy_master_product_similarlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_master_product_similar">
<div id="gmp_pharmacy_master_product_similar" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($pharmacy_master_product_similar_list->TotalRecords > 0 || $pharmacy_master_product_similar_list->isGridEdit()) { ?>
<table id="tbl_pharmacy_master_product_similarlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pharmacy_master_product_similar->RowType = ROWTYPE_HEADER;

// Render list options
$pharmacy_master_product_similar_list->renderListOptions();

// Render list options (header, left)
$pharmacy_master_product_similar_list->ListOptions->render("header", "left");
?>
<?php if ($pharmacy_master_product_similar_list->PRC->Visible) { // PRC ?>
	<?php if ($pharmacy_master_product_similar_list->SortUrl($pharmacy_master_product_similar_list->PRC) == "") { ?>
		<th data-name="PRC" class="<?php echo $pharmacy_master_product_similar_list->PRC->headerCellClass() ?>"><div id="elh_pharmacy_master_product_similar_PRC" class="pharmacy_master_product_similar_PRC"><div class="ew-table-header-caption"><?php echo $pharmacy_master_product_similar_list->PRC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRC" class="<?php echo $pharmacy_master_product_similar_list->PRC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_master_product_similar_list->SortUrl($pharmacy_master_product_similar_list->PRC) ?>', 1);"><div id="elh_pharmacy_master_product_similar_PRC" class="pharmacy_master_product_similar_PRC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_master_product_similar_list->PRC->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_master_product_similar_list->PRC->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_master_product_similar_list->PRC->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_master_product_similar_list->MAINPRC->Visible) { // MAINPRC ?>
	<?php if ($pharmacy_master_product_similar_list->SortUrl($pharmacy_master_product_similar_list->MAINPRC) == "") { ?>
		<th data-name="MAINPRC" class="<?php echo $pharmacy_master_product_similar_list->MAINPRC->headerCellClass() ?>"><div id="elh_pharmacy_master_product_similar_MAINPRC" class="pharmacy_master_product_similar_MAINPRC"><div class="ew-table-header-caption"><?php echo $pharmacy_master_product_similar_list->MAINPRC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MAINPRC" class="<?php echo $pharmacy_master_product_similar_list->MAINPRC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_master_product_similar_list->SortUrl($pharmacy_master_product_similar_list->MAINPRC) ?>', 1);"><div id="elh_pharmacy_master_product_similar_MAINPRC" class="pharmacy_master_product_similar_MAINPRC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_master_product_similar_list->MAINPRC->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_master_product_similar_list->MAINPRC->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_master_product_similar_list->MAINPRC->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_master_product_similar_list->PRTYPE->Visible) { // PRTYPE ?>
	<?php if ($pharmacy_master_product_similar_list->SortUrl($pharmacy_master_product_similar_list->PRTYPE) == "") { ?>
		<th data-name="PRTYPE" class="<?php echo $pharmacy_master_product_similar_list->PRTYPE->headerCellClass() ?>"><div id="elh_pharmacy_master_product_similar_PRTYPE" class="pharmacy_master_product_similar_PRTYPE"><div class="ew-table-header-caption"><?php echo $pharmacy_master_product_similar_list->PRTYPE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRTYPE" class="<?php echo $pharmacy_master_product_similar_list->PRTYPE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_master_product_similar_list->SortUrl($pharmacy_master_product_similar_list->PRTYPE) ?>', 1);"><div id="elh_pharmacy_master_product_similar_PRTYPE" class="pharmacy_master_product_similar_PRTYPE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_master_product_similar_list->PRTYPE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_master_product_similar_list->PRTYPE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_master_product_similar_list->PRTYPE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_master_product_similar_list->id->Visible) { // id ?>
	<?php if ($pharmacy_master_product_similar_list->SortUrl($pharmacy_master_product_similar_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $pharmacy_master_product_similar_list->id->headerCellClass() ?>"><div id="elh_pharmacy_master_product_similar_id" class="pharmacy_master_product_similar_id"><div class="ew-table-header-caption"><?php echo $pharmacy_master_product_similar_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $pharmacy_master_product_similar_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_master_product_similar_list->SortUrl($pharmacy_master_product_similar_list->id) ?>', 1);"><div id="elh_pharmacy_master_product_similar_id" class="pharmacy_master_product_similar_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_master_product_similar_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_master_product_similar_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_master_product_similar_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pharmacy_master_product_similar_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($pharmacy_master_product_similar_list->ExportAll && $pharmacy_master_product_similar_list->isExport()) {
	$pharmacy_master_product_similar_list->StopRecord = $pharmacy_master_product_similar_list->TotalRecords;
} else {

	// Set the last record to display
	if ($pharmacy_master_product_similar_list->TotalRecords > $pharmacy_master_product_similar_list->StartRecord + $pharmacy_master_product_similar_list->DisplayRecords - 1)
		$pharmacy_master_product_similar_list->StopRecord = $pharmacy_master_product_similar_list->StartRecord + $pharmacy_master_product_similar_list->DisplayRecords - 1;
	else
		$pharmacy_master_product_similar_list->StopRecord = $pharmacy_master_product_similar_list->TotalRecords;
}
$pharmacy_master_product_similar_list->RecordCount = $pharmacy_master_product_similar_list->StartRecord - 1;
if ($pharmacy_master_product_similar_list->Recordset && !$pharmacy_master_product_similar_list->Recordset->EOF) {
	$pharmacy_master_product_similar_list->Recordset->moveFirst();
	$selectLimit = $pharmacy_master_product_similar_list->UseSelectLimit;
	if (!$selectLimit && $pharmacy_master_product_similar_list->StartRecord > 1)
		$pharmacy_master_product_similar_list->Recordset->move($pharmacy_master_product_similar_list->StartRecord - 1);
} elseif (!$pharmacy_master_product_similar->AllowAddDeleteRow && $pharmacy_master_product_similar_list->StopRecord == 0) {
	$pharmacy_master_product_similar_list->StopRecord = $pharmacy_master_product_similar->GridAddRowCount;
}

// Initialize aggregate
$pharmacy_master_product_similar->RowType = ROWTYPE_AGGREGATEINIT;
$pharmacy_master_product_similar->resetAttributes();
$pharmacy_master_product_similar_list->renderRow();
while ($pharmacy_master_product_similar_list->RecordCount < $pharmacy_master_product_similar_list->StopRecord) {
	$pharmacy_master_product_similar_list->RecordCount++;
	if ($pharmacy_master_product_similar_list->RecordCount >= $pharmacy_master_product_similar_list->StartRecord) {
		$pharmacy_master_product_similar_list->RowCount++;

		// Set up key count
		$pharmacy_master_product_similar_list->KeyCount = $pharmacy_master_product_similar_list->RowIndex;

		// Init row class and style
		$pharmacy_master_product_similar->resetAttributes();
		$pharmacy_master_product_similar->CssClass = "";
		if ($pharmacy_master_product_similar_list->isGridAdd()) {
		} else {
			$pharmacy_master_product_similar_list->loadRowValues($pharmacy_master_product_similar_list->Recordset); // Load row values
		}
		$pharmacy_master_product_similar->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$pharmacy_master_product_similar->RowAttrs->merge(["data-rowindex" => $pharmacy_master_product_similar_list->RowCount, "id" => "r" . $pharmacy_master_product_similar_list->RowCount . "_pharmacy_master_product_similar", "data-rowtype" => $pharmacy_master_product_similar->RowType]);

		// Render row
		$pharmacy_master_product_similar_list->renderRow();

		// Render list options
		$pharmacy_master_product_similar_list->renderListOptions();
?>
	<tr <?php echo $pharmacy_master_product_similar->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_master_product_similar_list->ListOptions->render("body", "left", $pharmacy_master_product_similar_list->RowCount);
?>
	<?php if ($pharmacy_master_product_similar_list->PRC->Visible) { // PRC ?>
		<td data-name="PRC" <?php echo $pharmacy_master_product_similar_list->PRC->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_master_product_similar_list->RowCount ?>_pharmacy_master_product_similar_PRC">
<span<?php echo $pharmacy_master_product_similar_list->PRC->viewAttributes() ?>><?php echo $pharmacy_master_product_similar_list->PRC->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_master_product_similar_list->MAINPRC->Visible) { // MAINPRC ?>
		<td data-name="MAINPRC" <?php echo $pharmacy_master_product_similar_list->MAINPRC->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_master_product_similar_list->RowCount ?>_pharmacy_master_product_similar_MAINPRC">
<span<?php echo $pharmacy_master_product_similar_list->MAINPRC->viewAttributes() ?>><?php echo $pharmacy_master_product_similar_list->MAINPRC->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_master_product_similar_list->PRTYPE->Visible) { // PRTYPE ?>
		<td data-name="PRTYPE" <?php echo $pharmacy_master_product_similar_list->PRTYPE->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_master_product_similar_list->RowCount ?>_pharmacy_master_product_similar_PRTYPE">
<span<?php echo $pharmacy_master_product_similar_list->PRTYPE->viewAttributes() ?>><?php echo $pharmacy_master_product_similar_list->PRTYPE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_master_product_similar_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $pharmacy_master_product_similar_list->id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_master_product_similar_list->RowCount ?>_pharmacy_master_product_similar_id">
<span<?php echo $pharmacy_master_product_similar_list->id->viewAttributes() ?>><?php echo $pharmacy_master_product_similar_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_master_product_similar_list->ListOptions->render("body", "right", $pharmacy_master_product_similar_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$pharmacy_master_product_similar_list->isGridAdd())
		$pharmacy_master_product_similar_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$pharmacy_master_product_similar->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pharmacy_master_product_similar_list->Recordset)
	$pharmacy_master_product_similar_list->Recordset->Close();
?>
<?php if (!$pharmacy_master_product_similar_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$pharmacy_master_product_similar_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $pharmacy_master_product_similar_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_master_product_similar_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pharmacy_master_product_similar_list->TotalRecords == 0 && !$pharmacy_master_product_similar->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pharmacy_master_product_similar_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$pharmacy_master_product_similar_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_master_product_similar_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$pharmacy_master_product_similar->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_pharmacy_master_product_similar",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$pharmacy_master_product_similar_list->terminate();
?>
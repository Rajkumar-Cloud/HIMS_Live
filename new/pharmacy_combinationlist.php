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
$pharmacy_combination_list = new pharmacy_combination_list();

// Run the page
$pharmacy_combination_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_combination_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$pharmacy_combination_list->isExport()) { ?>
<script>
var fpharmacy_combinationlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fpharmacy_combinationlist = currentForm = new ew.Form("fpharmacy_combinationlist", "list");
	fpharmacy_combinationlist.formKeyCountName = '<?php echo $pharmacy_combination_list->FormKeyCountName ?>';
	loadjs.done("fpharmacy_combinationlist");
});
var fpharmacy_combinationlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fpharmacy_combinationlistsrch = currentSearchForm = new ew.Form("fpharmacy_combinationlistsrch");

	// Dynamic selection lists
	// Filters

	fpharmacy_combinationlistsrch.filterList = <?php echo $pharmacy_combination_list->getFilterList() ?>;
	loadjs.done("fpharmacy_combinationlistsrch");
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
<?php if (!$pharmacy_combination_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($pharmacy_combination_list->TotalRecords > 0 && $pharmacy_combination_list->ExportOptions->visible()) { ?>
<?php $pharmacy_combination_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_combination_list->ImportOptions->visible()) { ?>
<?php $pharmacy_combination_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_combination_list->SearchOptions->visible()) { ?>
<?php $pharmacy_combination_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_combination_list->FilterOptions->visible()) { ?>
<?php $pharmacy_combination_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$pharmacy_combination_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$pharmacy_combination_list->isExport() && !$pharmacy_combination->CurrentAction) { ?>
<form name="fpharmacy_combinationlistsrch" id="fpharmacy_combinationlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fpharmacy_combinationlistsrch-search-panel" class="<?php echo $pharmacy_combination_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pharmacy_combination">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $pharmacy_combination_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($pharmacy_combination_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($pharmacy_combination_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $pharmacy_combination_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($pharmacy_combination_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_combination_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_combination_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_combination_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $pharmacy_combination_list->showPageHeader(); ?>
<?php
$pharmacy_combination_list->showMessage();
?>
<?php if ($pharmacy_combination_list->TotalRecords > 0 || $pharmacy_combination->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pharmacy_combination_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pharmacy_combination">
<?php if (!$pharmacy_combination_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$pharmacy_combination_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $pharmacy_combination_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_combination_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpharmacy_combinationlist" id="fpharmacy_combinationlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_combination">
<div id="gmp_pharmacy_combination" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($pharmacy_combination_list->TotalRecords > 0 || $pharmacy_combination_list->isGridEdit()) { ?>
<table id="tbl_pharmacy_combinationlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pharmacy_combination->RowType = ROWTYPE_HEADER;

// Render list options
$pharmacy_combination_list->renderListOptions();

// Render list options (header, left)
$pharmacy_combination_list->ListOptions->render("header", "left");
?>
<?php if ($pharmacy_combination_list->GENCODE->Visible) { // GENCODE ?>
	<?php if ($pharmacy_combination_list->SortUrl($pharmacy_combination_list->GENCODE) == "") { ?>
		<th data-name="GENCODE" class="<?php echo $pharmacy_combination_list->GENCODE->headerCellClass() ?>"><div id="elh_pharmacy_combination_GENCODE" class="pharmacy_combination_GENCODE"><div class="ew-table-header-caption"><?php echo $pharmacy_combination_list->GENCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GENCODE" class="<?php echo $pharmacy_combination_list->GENCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_combination_list->SortUrl($pharmacy_combination_list->GENCODE) ?>', 1);"><div id="elh_pharmacy_combination_GENCODE" class="pharmacy_combination_GENCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_combination_list->GENCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_combination_list->GENCODE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_combination_list->GENCODE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_combination_list->COMBCODE->Visible) { // COMBCODE ?>
	<?php if ($pharmacy_combination_list->SortUrl($pharmacy_combination_list->COMBCODE) == "") { ?>
		<th data-name="COMBCODE" class="<?php echo $pharmacy_combination_list->COMBCODE->headerCellClass() ?>"><div id="elh_pharmacy_combination_COMBCODE" class="pharmacy_combination_COMBCODE"><div class="ew-table-header-caption"><?php echo $pharmacy_combination_list->COMBCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="COMBCODE" class="<?php echo $pharmacy_combination_list->COMBCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_combination_list->SortUrl($pharmacy_combination_list->COMBCODE) ?>', 1);"><div id="elh_pharmacy_combination_COMBCODE" class="pharmacy_combination_COMBCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_combination_list->COMBCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_combination_list->COMBCODE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_combination_list->COMBCODE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_combination_list->STRENGTH->Visible) { // STRENGTH ?>
	<?php if ($pharmacy_combination_list->SortUrl($pharmacy_combination_list->STRENGTH) == "") { ?>
		<th data-name="STRENGTH" class="<?php echo $pharmacy_combination_list->STRENGTH->headerCellClass() ?>"><div id="elh_pharmacy_combination_STRENGTH" class="pharmacy_combination_STRENGTH"><div class="ew-table-header-caption"><?php echo $pharmacy_combination_list->STRENGTH->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="STRENGTH" class="<?php echo $pharmacy_combination_list->STRENGTH->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_combination_list->SortUrl($pharmacy_combination_list->STRENGTH) ?>', 1);"><div id="elh_pharmacy_combination_STRENGTH" class="pharmacy_combination_STRENGTH">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_combination_list->STRENGTH->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_combination_list->STRENGTH->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_combination_list->STRENGTH->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_combination_list->SLNO->Visible) { // SLNO ?>
	<?php if ($pharmacy_combination_list->SortUrl($pharmacy_combination_list->SLNO) == "") { ?>
		<th data-name="SLNO" class="<?php echo $pharmacy_combination_list->SLNO->headerCellClass() ?>"><div id="elh_pharmacy_combination_SLNO" class="pharmacy_combination_SLNO"><div class="ew-table-header-caption"><?php echo $pharmacy_combination_list->SLNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SLNO" class="<?php echo $pharmacy_combination_list->SLNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_combination_list->SortUrl($pharmacy_combination_list->SLNO) ?>', 1);"><div id="elh_pharmacy_combination_SLNO" class="pharmacy_combination_SLNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_combination_list->SLNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_combination_list->SLNO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_combination_list->SLNO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_combination_list->id->Visible) { // id ?>
	<?php if ($pharmacy_combination_list->SortUrl($pharmacy_combination_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $pharmacy_combination_list->id->headerCellClass() ?>"><div id="elh_pharmacy_combination_id" class="pharmacy_combination_id"><div class="ew-table-header-caption"><?php echo $pharmacy_combination_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $pharmacy_combination_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_combination_list->SortUrl($pharmacy_combination_list->id) ?>', 1);"><div id="elh_pharmacy_combination_id" class="pharmacy_combination_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_combination_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_combination_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_combination_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pharmacy_combination_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($pharmacy_combination_list->ExportAll && $pharmacy_combination_list->isExport()) {
	$pharmacy_combination_list->StopRecord = $pharmacy_combination_list->TotalRecords;
} else {

	// Set the last record to display
	if ($pharmacy_combination_list->TotalRecords > $pharmacy_combination_list->StartRecord + $pharmacy_combination_list->DisplayRecords - 1)
		$pharmacy_combination_list->StopRecord = $pharmacy_combination_list->StartRecord + $pharmacy_combination_list->DisplayRecords - 1;
	else
		$pharmacy_combination_list->StopRecord = $pharmacy_combination_list->TotalRecords;
}
$pharmacy_combination_list->RecordCount = $pharmacy_combination_list->StartRecord - 1;
if ($pharmacy_combination_list->Recordset && !$pharmacy_combination_list->Recordset->EOF) {
	$pharmacy_combination_list->Recordset->moveFirst();
	$selectLimit = $pharmacy_combination_list->UseSelectLimit;
	if (!$selectLimit && $pharmacy_combination_list->StartRecord > 1)
		$pharmacy_combination_list->Recordset->move($pharmacy_combination_list->StartRecord - 1);
} elseif (!$pharmacy_combination->AllowAddDeleteRow && $pharmacy_combination_list->StopRecord == 0) {
	$pharmacy_combination_list->StopRecord = $pharmacy_combination->GridAddRowCount;
}

// Initialize aggregate
$pharmacy_combination->RowType = ROWTYPE_AGGREGATEINIT;
$pharmacy_combination->resetAttributes();
$pharmacy_combination_list->renderRow();
while ($pharmacy_combination_list->RecordCount < $pharmacy_combination_list->StopRecord) {
	$pharmacy_combination_list->RecordCount++;
	if ($pharmacy_combination_list->RecordCount >= $pharmacy_combination_list->StartRecord) {
		$pharmacy_combination_list->RowCount++;

		// Set up key count
		$pharmacy_combination_list->KeyCount = $pharmacy_combination_list->RowIndex;

		// Init row class and style
		$pharmacy_combination->resetAttributes();
		$pharmacy_combination->CssClass = "";
		if ($pharmacy_combination_list->isGridAdd()) {
		} else {
			$pharmacy_combination_list->loadRowValues($pharmacy_combination_list->Recordset); // Load row values
		}
		$pharmacy_combination->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$pharmacy_combination->RowAttrs->merge(["data-rowindex" => $pharmacy_combination_list->RowCount, "id" => "r" . $pharmacy_combination_list->RowCount . "_pharmacy_combination", "data-rowtype" => $pharmacy_combination->RowType]);

		// Render row
		$pharmacy_combination_list->renderRow();

		// Render list options
		$pharmacy_combination_list->renderListOptions();
?>
	<tr <?php echo $pharmacy_combination->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_combination_list->ListOptions->render("body", "left", $pharmacy_combination_list->RowCount);
?>
	<?php if ($pharmacy_combination_list->GENCODE->Visible) { // GENCODE ?>
		<td data-name="GENCODE" <?php echo $pharmacy_combination_list->GENCODE->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_combination_list->RowCount ?>_pharmacy_combination_GENCODE">
<span<?php echo $pharmacy_combination_list->GENCODE->viewAttributes() ?>><?php echo $pharmacy_combination_list->GENCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_combination_list->COMBCODE->Visible) { // COMBCODE ?>
		<td data-name="COMBCODE" <?php echo $pharmacy_combination_list->COMBCODE->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_combination_list->RowCount ?>_pharmacy_combination_COMBCODE">
<span<?php echo $pharmacy_combination_list->COMBCODE->viewAttributes() ?>><?php echo $pharmacy_combination_list->COMBCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_combination_list->STRENGTH->Visible) { // STRENGTH ?>
		<td data-name="STRENGTH" <?php echo $pharmacy_combination_list->STRENGTH->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_combination_list->RowCount ?>_pharmacy_combination_STRENGTH">
<span<?php echo $pharmacy_combination_list->STRENGTH->viewAttributes() ?>><?php echo $pharmacy_combination_list->STRENGTH->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_combination_list->SLNO->Visible) { // SLNO ?>
		<td data-name="SLNO" <?php echo $pharmacy_combination_list->SLNO->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_combination_list->RowCount ?>_pharmacy_combination_SLNO">
<span<?php echo $pharmacy_combination_list->SLNO->viewAttributes() ?>><?php echo $pharmacy_combination_list->SLNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_combination_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $pharmacy_combination_list->id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_combination_list->RowCount ?>_pharmacy_combination_id">
<span<?php echo $pharmacy_combination_list->id->viewAttributes() ?>><?php echo $pharmacy_combination_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_combination_list->ListOptions->render("body", "right", $pharmacy_combination_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$pharmacy_combination_list->isGridAdd())
		$pharmacy_combination_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$pharmacy_combination->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pharmacy_combination_list->Recordset)
	$pharmacy_combination_list->Recordset->Close();
?>
<?php if (!$pharmacy_combination_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$pharmacy_combination_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $pharmacy_combination_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_combination_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pharmacy_combination_list->TotalRecords == 0 && !$pharmacy_combination->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pharmacy_combination_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$pharmacy_combination_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_combination_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$pharmacy_combination->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_pharmacy_combination",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$pharmacy_combination_list->terminate();
?>
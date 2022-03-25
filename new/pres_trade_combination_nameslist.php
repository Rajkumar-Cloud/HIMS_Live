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
$pres_trade_combination_names_list = new pres_trade_combination_names_list();

// Run the page
$pres_trade_combination_names_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_trade_combination_names_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$pres_trade_combination_names_list->isExport()) { ?>
<script>
var fpres_trade_combination_nameslist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fpres_trade_combination_nameslist = currentForm = new ew.Form("fpres_trade_combination_nameslist", "list");
	fpres_trade_combination_nameslist.formKeyCountName = '<?php echo $pres_trade_combination_names_list->FormKeyCountName ?>';
	loadjs.done("fpres_trade_combination_nameslist");
});
var fpres_trade_combination_nameslistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fpres_trade_combination_nameslistsrch = currentSearchForm = new ew.Form("fpres_trade_combination_nameslistsrch");

	// Dynamic selection lists
	// Filters

	fpres_trade_combination_nameslistsrch.filterList = <?php echo $pres_trade_combination_names_list->getFilterList() ?>;
	loadjs.done("fpres_trade_combination_nameslistsrch");
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
<?php if (!$pres_trade_combination_names_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($pres_trade_combination_names_list->TotalRecords > 0 && $pres_trade_combination_names_list->ExportOptions->visible()) { ?>
<?php $pres_trade_combination_names_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($pres_trade_combination_names_list->ImportOptions->visible()) { ?>
<?php $pres_trade_combination_names_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($pres_trade_combination_names_list->SearchOptions->visible()) { ?>
<?php $pres_trade_combination_names_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($pres_trade_combination_names_list->FilterOptions->visible()) { ?>
<?php $pres_trade_combination_names_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$pres_trade_combination_names_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$pres_trade_combination_names_list->isExport() && !$pres_trade_combination_names->CurrentAction) { ?>
<form name="fpres_trade_combination_nameslistsrch" id="fpres_trade_combination_nameslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fpres_trade_combination_nameslistsrch-search-panel" class="<?php echo $pres_trade_combination_names_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pres_trade_combination_names">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $pres_trade_combination_names_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($pres_trade_combination_names_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($pres_trade_combination_names_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $pres_trade_combination_names_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($pres_trade_combination_names_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($pres_trade_combination_names_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($pres_trade_combination_names_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($pres_trade_combination_names_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $pres_trade_combination_names_list->showPageHeader(); ?>
<?php
$pres_trade_combination_names_list->showMessage();
?>
<?php if ($pres_trade_combination_names_list->TotalRecords > 0 || $pres_trade_combination_names->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pres_trade_combination_names_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pres_trade_combination_names">
<?php if (!$pres_trade_combination_names_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$pres_trade_combination_names_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $pres_trade_combination_names_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pres_trade_combination_names_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpres_trade_combination_nameslist" id="fpres_trade_combination_nameslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_trade_combination_names">
<div id="gmp_pres_trade_combination_names" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($pres_trade_combination_names_list->TotalRecords > 0 || $pres_trade_combination_names_list->isGridEdit()) { ?>
<table id="tbl_pres_trade_combination_nameslist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pres_trade_combination_names->RowType = ROWTYPE_HEADER;

// Render list options
$pres_trade_combination_names_list->renderListOptions();

// Render list options (header, left)
$pres_trade_combination_names_list->ListOptions->render("header", "left");
?>
<?php if ($pres_trade_combination_names_list->id->Visible) { // id ?>
	<?php if ($pres_trade_combination_names_list->SortUrl($pres_trade_combination_names_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $pres_trade_combination_names_list->id->headerCellClass() ?>"><div id="elh_pres_trade_combination_names_id" class="pres_trade_combination_names_id"><div class="ew-table-header-caption"><?php echo $pres_trade_combination_names_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $pres_trade_combination_names_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_trade_combination_names_list->SortUrl($pres_trade_combination_names_list->id) ?>', 1);"><div id="elh_pres_trade_combination_names_id" class="pres_trade_combination_names_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_trade_combination_names_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_trade_combination_names_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_trade_combination_names_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_trade_combination_names_list->tradenames_id->Visible) { // tradenames_id ?>
	<?php if ($pres_trade_combination_names_list->SortUrl($pres_trade_combination_names_list->tradenames_id) == "") { ?>
		<th data-name="tradenames_id" class="<?php echo $pres_trade_combination_names_list->tradenames_id->headerCellClass() ?>"><div id="elh_pres_trade_combination_names_tradenames_id" class="pres_trade_combination_names_tradenames_id"><div class="ew-table-header-caption"><?php echo $pres_trade_combination_names_list->tradenames_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tradenames_id" class="<?php echo $pres_trade_combination_names_list->tradenames_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_trade_combination_names_list->SortUrl($pres_trade_combination_names_list->tradenames_id) ?>', 1);"><div id="elh_pres_trade_combination_names_tradenames_id" class="pres_trade_combination_names_tradenames_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_trade_combination_names_list->tradenames_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_trade_combination_names_list->tradenames_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_trade_combination_names_list->tradenames_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_trade_combination_names_list->PR_CODE->Visible) { // PR_CODE ?>
	<?php if ($pres_trade_combination_names_list->SortUrl($pres_trade_combination_names_list->PR_CODE) == "") { ?>
		<th data-name="PR_CODE" class="<?php echo $pres_trade_combination_names_list->PR_CODE->headerCellClass() ?>"><div id="elh_pres_trade_combination_names_PR_CODE" class="pres_trade_combination_names_PR_CODE"><div class="ew-table-header-caption"><?php echo $pres_trade_combination_names_list->PR_CODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PR_CODE" class="<?php echo $pres_trade_combination_names_list->PR_CODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_trade_combination_names_list->SortUrl($pres_trade_combination_names_list->PR_CODE) ?>', 1);"><div id="elh_pres_trade_combination_names_PR_CODE" class="pres_trade_combination_names_PR_CODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_trade_combination_names_list->PR_CODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_trade_combination_names_list->PR_CODE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_trade_combination_names_list->PR_CODE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_trade_combination_names_list->CONTAINER_TYPE->Visible) { // CONTAINER_TYPE ?>
	<?php if ($pres_trade_combination_names_list->SortUrl($pres_trade_combination_names_list->CONTAINER_TYPE) == "") { ?>
		<th data-name="CONTAINER_TYPE" class="<?php echo $pres_trade_combination_names_list->CONTAINER_TYPE->headerCellClass() ?>"><div id="elh_pres_trade_combination_names_CONTAINER_TYPE" class="pres_trade_combination_names_CONTAINER_TYPE"><div class="ew-table-header-caption"><?php echo $pres_trade_combination_names_list->CONTAINER_TYPE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CONTAINER_TYPE" class="<?php echo $pres_trade_combination_names_list->CONTAINER_TYPE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_trade_combination_names_list->SortUrl($pres_trade_combination_names_list->CONTAINER_TYPE) ?>', 1);"><div id="elh_pres_trade_combination_names_CONTAINER_TYPE" class="pres_trade_combination_names_CONTAINER_TYPE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_trade_combination_names_list->CONTAINER_TYPE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_trade_combination_names_list->CONTAINER_TYPE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_trade_combination_names_list->CONTAINER_TYPE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_trade_combination_names_list->STRENGTH->Visible) { // STRENGTH ?>
	<?php if ($pres_trade_combination_names_list->SortUrl($pres_trade_combination_names_list->STRENGTH) == "") { ?>
		<th data-name="STRENGTH" class="<?php echo $pres_trade_combination_names_list->STRENGTH->headerCellClass() ?>"><div id="elh_pres_trade_combination_names_STRENGTH" class="pres_trade_combination_names_STRENGTH"><div class="ew-table-header-caption"><?php echo $pres_trade_combination_names_list->STRENGTH->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="STRENGTH" class="<?php echo $pres_trade_combination_names_list->STRENGTH->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_trade_combination_names_list->SortUrl($pres_trade_combination_names_list->STRENGTH) ?>', 1);"><div id="elh_pres_trade_combination_names_STRENGTH" class="pres_trade_combination_names_STRENGTH">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_trade_combination_names_list->STRENGTH->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_trade_combination_names_list->STRENGTH->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_trade_combination_names_list->STRENGTH->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pres_trade_combination_names_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($pres_trade_combination_names_list->ExportAll && $pres_trade_combination_names_list->isExport()) {
	$pres_trade_combination_names_list->StopRecord = $pres_trade_combination_names_list->TotalRecords;
} else {

	// Set the last record to display
	if ($pres_trade_combination_names_list->TotalRecords > $pres_trade_combination_names_list->StartRecord + $pres_trade_combination_names_list->DisplayRecords - 1)
		$pres_trade_combination_names_list->StopRecord = $pres_trade_combination_names_list->StartRecord + $pres_trade_combination_names_list->DisplayRecords - 1;
	else
		$pres_trade_combination_names_list->StopRecord = $pres_trade_combination_names_list->TotalRecords;
}
$pres_trade_combination_names_list->RecordCount = $pres_trade_combination_names_list->StartRecord - 1;
if ($pres_trade_combination_names_list->Recordset && !$pres_trade_combination_names_list->Recordset->EOF) {
	$pres_trade_combination_names_list->Recordset->moveFirst();
	$selectLimit = $pres_trade_combination_names_list->UseSelectLimit;
	if (!$selectLimit && $pres_trade_combination_names_list->StartRecord > 1)
		$pres_trade_combination_names_list->Recordset->move($pres_trade_combination_names_list->StartRecord - 1);
} elseif (!$pres_trade_combination_names->AllowAddDeleteRow && $pres_trade_combination_names_list->StopRecord == 0) {
	$pres_trade_combination_names_list->StopRecord = $pres_trade_combination_names->GridAddRowCount;
}

// Initialize aggregate
$pres_trade_combination_names->RowType = ROWTYPE_AGGREGATEINIT;
$pres_trade_combination_names->resetAttributes();
$pres_trade_combination_names_list->renderRow();
while ($pres_trade_combination_names_list->RecordCount < $pres_trade_combination_names_list->StopRecord) {
	$pres_trade_combination_names_list->RecordCount++;
	if ($pres_trade_combination_names_list->RecordCount >= $pres_trade_combination_names_list->StartRecord) {
		$pres_trade_combination_names_list->RowCount++;

		// Set up key count
		$pres_trade_combination_names_list->KeyCount = $pres_trade_combination_names_list->RowIndex;

		// Init row class and style
		$pres_trade_combination_names->resetAttributes();
		$pres_trade_combination_names->CssClass = "";
		if ($pres_trade_combination_names_list->isGridAdd()) {
		} else {
			$pres_trade_combination_names_list->loadRowValues($pres_trade_combination_names_list->Recordset); // Load row values
		}
		$pres_trade_combination_names->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$pres_trade_combination_names->RowAttrs->merge(["data-rowindex" => $pres_trade_combination_names_list->RowCount, "id" => "r" . $pres_trade_combination_names_list->RowCount . "_pres_trade_combination_names", "data-rowtype" => $pres_trade_combination_names->RowType]);

		// Render row
		$pres_trade_combination_names_list->renderRow();

		// Render list options
		$pres_trade_combination_names_list->renderListOptions();
?>
	<tr <?php echo $pres_trade_combination_names->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pres_trade_combination_names_list->ListOptions->render("body", "left", $pres_trade_combination_names_list->RowCount);
?>
	<?php if ($pres_trade_combination_names_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $pres_trade_combination_names_list->id->cellAttributes() ?>>
<span id="el<?php echo $pres_trade_combination_names_list->RowCount ?>_pres_trade_combination_names_id">
<span<?php echo $pres_trade_combination_names_list->id->viewAttributes() ?>><?php echo $pres_trade_combination_names_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_trade_combination_names_list->tradenames_id->Visible) { // tradenames_id ?>
		<td data-name="tradenames_id" <?php echo $pres_trade_combination_names_list->tradenames_id->cellAttributes() ?>>
<span id="el<?php echo $pres_trade_combination_names_list->RowCount ?>_pres_trade_combination_names_tradenames_id">
<span<?php echo $pres_trade_combination_names_list->tradenames_id->viewAttributes() ?>><?php echo $pres_trade_combination_names_list->tradenames_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_trade_combination_names_list->PR_CODE->Visible) { // PR_CODE ?>
		<td data-name="PR_CODE" <?php echo $pres_trade_combination_names_list->PR_CODE->cellAttributes() ?>>
<span id="el<?php echo $pres_trade_combination_names_list->RowCount ?>_pres_trade_combination_names_PR_CODE">
<span<?php echo $pres_trade_combination_names_list->PR_CODE->viewAttributes() ?>><?php echo $pres_trade_combination_names_list->PR_CODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_trade_combination_names_list->CONTAINER_TYPE->Visible) { // CONTAINER_TYPE ?>
		<td data-name="CONTAINER_TYPE" <?php echo $pres_trade_combination_names_list->CONTAINER_TYPE->cellAttributes() ?>>
<span id="el<?php echo $pres_trade_combination_names_list->RowCount ?>_pres_trade_combination_names_CONTAINER_TYPE">
<span<?php echo $pres_trade_combination_names_list->CONTAINER_TYPE->viewAttributes() ?>><?php echo $pres_trade_combination_names_list->CONTAINER_TYPE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_trade_combination_names_list->STRENGTH->Visible) { // STRENGTH ?>
		<td data-name="STRENGTH" <?php echo $pres_trade_combination_names_list->STRENGTH->cellAttributes() ?>>
<span id="el<?php echo $pres_trade_combination_names_list->RowCount ?>_pres_trade_combination_names_STRENGTH">
<span<?php echo $pres_trade_combination_names_list->STRENGTH->viewAttributes() ?>><?php echo $pres_trade_combination_names_list->STRENGTH->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pres_trade_combination_names_list->ListOptions->render("body", "right", $pres_trade_combination_names_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$pres_trade_combination_names_list->isGridAdd())
		$pres_trade_combination_names_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$pres_trade_combination_names->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pres_trade_combination_names_list->Recordset)
	$pres_trade_combination_names_list->Recordset->Close();
?>
<?php if (!$pres_trade_combination_names_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$pres_trade_combination_names_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $pres_trade_combination_names_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pres_trade_combination_names_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pres_trade_combination_names_list->TotalRecords == 0 && !$pres_trade_combination_names->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pres_trade_combination_names_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$pres_trade_combination_names_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$pres_trade_combination_names_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$pres_trade_combination_names->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_pres_trade_combination_names",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$pres_trade_combination_names_list->terminate();
?>
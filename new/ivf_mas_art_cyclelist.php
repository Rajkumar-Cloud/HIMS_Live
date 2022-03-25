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
$ivf_mas_art_cycle_list = new ivf_mas_art_cycle_list();

// Run the page
$ivf_mas_art_cycle_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_mas_art_cycle_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$ivf_mas_art_cycle_list->isExport()) { ?>
<script>
var fivf_mas_art_cyclelist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fivf_mas_art_cyclelist = currentForm = new ew.Form("fivf_mas_art_cyclelist", "list");
	fivf_mas_art_cyclelist.formKeyCountName = '<?php echo $ivf_mas_art_cycle_list->FormKeyCountName ?>';
	loadjs.done("fivf_mas_art_cyclelist");
});
var fivf_mas_art_cyclelistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fivf_mas_art_cyclelistsrch = currentSearchForm = new ew.Form("fivf_mas_art_cyclelistsrch");

	// Dynamic selection lists
	// Filters

	fivf_mas_art_cyclelistsrch.filterList = <?php echo $ivf_mas_art_cycle_list->getFilterList() ?>;
	loadjs.done("fivf_mas_art_cyclelistsrch");
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
<?php if (!$ivf_mas_art_cycle_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($ivf_mas_art_cycle_list->TotalRecords > 0 && $ivf_mas_art_cycle_list->ExportOptions->visible()) { ?>
<?php $ivf_mas_art_cycle_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_mas_art_cycle_list->ImportOptions->visible()) { ?>
<?php $ivf_mas_art_cycle_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_mas_art_cycle_list->SearchOptions->visible()) { ?>
<?php $ivf_mas_art_cycle_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_mas_art_cycle_list->FilterOptions->visible()) { ?>
<?php $ivf_mas_art_cycle_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$ivf_mas_art_cycle_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$ivf_mas_art_cycle_list->isExport() && !$ivf_mas_art_cycle->CurrentAction) { ?>
<form name="fivf_mas_art_cyclelistsrch" id="fivf_mas_art_cyclelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fivf_mas_art_cyclelistsrch-search-panel" class="<?php echo $ivf_mas_art_cycle_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="ivf_mas_art_cycle">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $ivf_mas_art_cycle_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($ivf_mas_art_cycle_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($ivf_mas_art_cycle_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $ivf_mas_art_cycle_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($ivf_mas_art_cycle_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($ivf_mas_art_cycle_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($ivf_mas_art_cycle_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($ivf_mas_art_cycle_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $ivf_mas_art_cycle_list->showPageHeader(); ?>
<?php
$ivf_mas_art_cycle_list->showMessage();
?>
<?php if ($ivf_mas_art_cycle_list->TotalRecords > 0 || $ivf_mas_art_cycle->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($ivf_mas_art_cycle_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf_mas_art_cycle">
<?php if (!$ivf_mas_art_cycle_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$ivf_mas_art_cycle_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $ivf_mas_art_cycle_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ivf_mas_art_cycle_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fivf_mas_art_cyclelist" id="fivf_mas_art_cyclelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_mas_art_cycle">
<div id="gmp_ivf_mas_art_cycle" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($ivf_mas_art_cycle_list->TotalRecords > 0 || $ivf_mas_art_cycle_list->isGridEdit()) { ?>
<table id="tbl_ivf_mas_art_cyclelist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$ivf_mas_art_cycle->RowType = ROWTYPE_HEADER;

// Render list options
$ivf_mas_art_cycle_list->renderListOptions();

// Render list options (header, left)
$ivf_mas_art_cycle_list->ListOptions->render("header", "left");
?>
<?php if ($ivf_mas_art_cycle_list->id->Visible) { // id ?>
	<?php if ($ivf_mas_art_cycle_list->SortUrl($ivf_mas_art_cycle_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $ivf_mas_art_cycle_list->id->headerCellClass() ?>"><div id="elh_ivf_mas_art_cycle_id" class="ivf_mas_art_cycle_id"><div class="ew-table-header-caption"><?php echo $ivf_mas_art_cycle_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $ivf_mas_art_cycle_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_mas_art_cycle_list->SortUrl($ivf_mas_art_cycle_list->id) ?>', 1);"><div id="elh_ivf_mas_art_cycle_id" class="ivf_mas_art_cycle_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_mas_art_cycle_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_mas_art_cycle_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_mas_art_cycle_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_mas_art_cycle_list->ARTCYCLE->Visible) { // ARTCYCLE ?>
	<?php if ($ivf_mas_art_cycle_list->SortUrl($ivf_mas_art_cycle_list->ARTCYCLE) == "") { ?>
		<th data-name="ARTCYCLE" class="<?php echo $ivf_mas_art_cycle_list->ARTCYCLE->headerCellClass() ?>"><div id="elh_ivf_mas_art_cycle_ARTCYCLE" class="ivf_mas_art_cycle_ARTCYCLE"><div class="ew-table-header-caption"><?php echo $ivf_mas_art_cycle_list->ARTCYCLE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ARTCYCLE" class="<?php echo $ivf_mas_art_cycle_list->ARTCYCLE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_mas_art_cycle_list->SortUrl($ivf_mas_art_cycle_list->ARTCYCLE) ?>', 1);"><div id="elh_ivf_mas_art_cycle_ARTCYCLE" class="ivf_mas_art_cycle_ARTCYCLE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_mas_art_cycle_list->ARTCYCLE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_mas_art_cycle_list->ARTCYCLE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_mas_art_cycle_list->ARTCYCLE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$ivf_mas_art_cycle_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($ivf_mas_art_cycle_list->ExportAll && $ivf_mas_art_cycle_list->isExport()) {
	$ivf_mas_art_cycle_list->StopRecord = $ivf_mas_art_cycle_list->TotalRecords;
} else {

	// Set the last record to display
	if ($ivf_mas_art_cycle_list->TotalRecords > $ivf_mas_art_cycle_list->StartRecord + $ivf_mas_art_cycle_list->DisplayRecords - 1)
		$ivf_mas_art_cycle_list->StopRecord = $ivf_mas_art_cycle_list->StartRecord + $ivf_mas_art_cycle_list->DisplayRecords - 1;
	else
		$ivf_mas_art_cycle_list->StopRecord = $ivf_mas_art_cycle_list->TotalRecords;
}
$ivf_mas_art_cycle_list->RecordCount = $ivf_mas_art_cycle_list->StartRecord - 1;
if ($ivf_mas_art_cycle_list->Recordset && !$ivf_mas_art_cycle_list->Recordset->EOF) {
	$ivf_mas_art_cycle_list->Recordset->moveFirst();
	$selectLimit = $ivf_mas_art_cycle_list->UseSelectLimit;
	if (!$selectLimit && $ivf_mas_art_cycle_list->StartRecord > 1)
		$ivf_mas_art_cycle_list->Recordset->move($ivf_mas_art_cycle_list->StartRecord - 1);
} elseif (!$ivf_mas_art_cycle->AllowAddDeleteRow && $ivf_mas_art_cycle_list->StopRecord == 0) {
	$ivf_mas_art_cycle_list->StopRecord = $ivf_mas_art_cycle->GridAddRowCount;
}

// Initialize aggregate
$ivf_mas_art_cycle->RowType = ROWTYPE_AGGREGATEINIT;
$ivf_mas_art_cycle->resetAttributes();
$ivf_mas_art_cycle_list->renderRow();
while ($ivf_mas_art_cycle_list->RecordCount < $ivf_mas_art_cycle_list->StopRecord) {
	$ivf_mas_art_cycle_list->RecordCount++;
	if ($ivf_mas_art_cycle_list->RecordCount >= $ivf_mas_art_cycle_list->StartRecord) {
		$ivf_mas_art_cycle_list->RowCount++;

		// Set up key count
		$ivf_mas_art_cycle_list->KeyCount = $ivf_mas_art_cycle_list->RowIndex;

		// Init row class and style
		$ivf_mas_art_cycle->resetAttributes();
		$ivf_mas_art_cycle->CssClass = "";
		if ($ivf_mas_art_cycle_list->isGridAdd()) {
		} else {
			$ivf_mas_art_cycle_list->loadRowValues($ivf_mas_art_cycle_list->Recordset); // Load row values
		}
		$ivf_mas_art_cycle->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$ivf_mas_art_cycle->RowAttrs->merge(["data-rowindex" => $ivf_mas_art_cycle_list->RowCount, "id" => "r" . $ivf_mas_art_cycle_list->RowCount . "_ivf_mas_art_cycle", "data-rowtype" => $ivf_mas_art_cycle->RowType]);

		// Render row
		$ivf_mas_art_cycle_list->renderRow();

		// Render list options
		$ivf_mas_art_cycle_list->renderListOptions();
?>
	<tr <?php echo $ivf_mas_art_cycle->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_mas_art_cycle_list->ListOptions->render("body", "left", $ivf_mas_art_cycle_list->RowCount);
?>
	<?php if ($ivf_mas_art_cycle_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $ivf_mas_art_cycle_list->id->cellAttributes() ?>>
<span id="el<?php echo $ivf_mas_art_cycle_list->RowCount ?>_ivf_mas_art_cycle_id">
<span<?php echo $ivf_mas_art_cycle_list->id->viewAttributes() ?>><?php echo $ivf_mas_art_cycle_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_mas_art_cycle_list->ARTCYCLE->Visible) { // ARTCYCLE ?>
		<td data-name="ARTCYCLE" <?php echo $ivf_mas_art_cycle_list->ARTCYCLE->cellAttributes() ?>>
<span id="el<?php echo $ivf_mas_art_cycle_list->RowCount ?>_ivf_mas_art_cycle_ARTCYCLE">
<span<?php echo $ivf_mas_art_cycle_list->ARTCYCLE->viewAttributes() ?>><?php echo $ivf_mas_art_cycle_list->ARTCYCLE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_mas_art_cycle_list->ListOptions->render("body", "right", $ivf_mas_art_cycle_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$ivf_mas_art_cycle_list->isGridAdd())
		$ivf_mas_art_cycle_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$ivf_mas_art_cycle->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($ivf_mas_art_cycle_list->Recordset)
	$ivf_mas_art_cycle_list->Recordset->Close();
?>
<?php if (!$ivf_mas_art_cycle_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$ivf_mas_art_cycle_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $ivf_mas_art_cycle_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ivf_mas_art_cycle_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($ivf_mas_art_cycle_list->TotalRecords == 0 && !$ivf_mas_art_cycle->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $ivf_mas_art_cycle_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$ivf_mas_art_cycle_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$ivf_mas_art_cycle_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$ivf_mas_art_cycle->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_ivf_mas_art_cycle",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$ivf_mas_art_cycle_list->terminate();
?>
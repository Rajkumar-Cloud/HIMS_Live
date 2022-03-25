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
$pres_tradenames_list = new pres_tradenames_list();

// Run the page
$pres_tradenames_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_tradenames_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$pres_tradenames_list->isExport()) { ?>
<script>
var fpres_tradenameslist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fpres_tradenameslist = currentForm = new ew.Form("fpres_tradenameslist", "list");
	fpres_tradenameslist.formKeyCountName = '<?php echo $pres_tradenames_list->FormKeyCountName ?>';
	loadjs.done("fpres_tradenameslist");
});
var fpres_tradenameslistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fpres_tradenameslistsrch = currentSearchForm = new ew.Form("fpres_tradenameslistsrch");

	// Dynamic selection lists
	// Filters

	fpres_tradenameslistsrch.filterList = <?php echo $pres_tradenames_list->getFilterList() ?>;
	loadjs.done("fpres_tradenameslistsrch");
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
<?php if (!$pres_tradenames_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($pres_tradenames_list->TotalRecords > 0 && $pres_tradenames_list->ExportOptions->visible()) { ?>
<?php $pres_tradenames_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($pres_tradenames_list->ImportOptions->visible()) { ?>
<?php $pres_tradenames_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($pres_tradenames_list->SearchOptions->visible()) { ?>
<?php $pres_tradenames_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($pres_tradenames_list->FilterOptions->visible()) { ?>
<?php $pres_tradenames_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$pres_tradenames_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$pres_tradenames_list->isExport() && !$pres_tradenames->CurrentAction) { ?>
<form name="fpres_tradenameslistsrch" id="fpres_tradenameslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fpres_tradenameslistsrch-search-panel" class="<?php echo $pres_tradenames_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pres_tradenames">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $pres_tradenames_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($pres_tradenames_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($pres_tradenames_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $pres_tradenames_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($pres_tradenames_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($pres_tradenames_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($pres_tradenames_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($pres_tradenames_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $pres_tradenames_list->showPageHeader(); ?>
<?php
$pres_tradenames_list->showMessage();
?>
<?php if ($pres_tradenames_list->TotalRecords > 0 || $pres_tradenames->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pres_tradenames_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pres_tradenames">
<?php if (!$pres_tradenames_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$pres_tradenames_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $pres_tradenames_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pres_tradenames_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpres_tradenameslist" id="fpres_tradenameslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_tradenames">
<div id="gmp_pres_tradenames" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($pres_tradenames_list->TotalRecords > 0 || $pres_tradenames_list->isGridEdit()) { ?>
<table id="tbl_pres_tradenameslist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pres_tradenames->RowType = ROWTYPE_HEADER;

// Render list options
$pres_tradenames_list->renderListOptions();

// Render list options (header, left)
$pres_tradenames_list->ListOptions->render("header", "left");
?>
<?php if ($pres_tradenames_list->id->Visible) { // id ?>
	<?php if ($pres_tradenames_list->SortUrl($pres_tradenames_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $pres_tradenames_list->id->headerCellClass() ?>"><div id="elh_pres_tradenames_id" class="pres_tradenames_id"><div class="ew-table-header-caption"><?php echo $pres_tradenames_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $pres_tradenames_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_tradenames_list->SortUrl($pres_tradenames_list->id) ?>', 1);"><div id="elh_pres_tradenames_id" class="pres_tradenames_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_tradenames_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_tradenames_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_tradenames_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_tradenames_list->PR_CODE->Visible) { // PR_CODE ?>
	<?php if ($pres_tradenames_list->SortUrl($pres_tradenames_list->PR_CODE) == "") { ?>
		<th data-name="PR_CODE" class="<?php echo $pres_tradenames_list->PR_CODE->headerCellClass() ?>"><div id="elh_pres_tradenames_PR_CODE" class="pres_tradenames_PR_CODE"><div class="ew-table-header-caption"><?php echo $pres_tradenames_list->PR_CODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PR_CODE" class="<?php echo $pres_tradenames_list->PR_CODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_tradenames_list->SortUrl($pres_tradenames_list->PR_CODE) ?>', 1);"><div id="elh_pres_tradenames_PR_CODE" class="pres_tradenames_PR_CODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_tradenames_list->PR_CODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_tradenames_list->PR_CODE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_tradenames_list->PR_CODE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_tradenames_list->CONTAINER_TYPE->Visible) { // CONTAINER_TYPE ?>
	<?php if ($pres_tradenames_list->SortUrl($pres_tradenames_list->CONTAINER_TYPE) == "") { ?>
		<th data-name="CONTAINER_TYPE" class="<?php echo $pres_tradenames_list->CONTAINER_TYPE->headerCellClass() ?>"><div id="elh_pres_tradenames_CONTAINER_TYPE" class="pres_tradenames_CONTAINER_TYPE"><div class="ew-table-header-caption"><?php echo $pres_tradenames_list->CONTAINER_TYPE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CONTAINER_TYPE" class="<?php echo $pres_tradenames_list->CONTAINER_TYPE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_tradenames_list->SortUrl($pres_tradenames_list->CONTAINER_TYPE) ?>', 1);"><div id="elh_pres_tradenames_CONTAINER_TYPE" class="pres_tradenames_CONTAINER_TYPE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_tradenames_list->CONTAINER_TYPE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_tradenames_list->CONTAINER_TYPE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_tradenames_list->CONTAINER_TYPE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_tradenames_list->STRENGTH->Visible) { // STRENGTH ?>
	<?php if ($pres_tradenames_list->SortUrl($pres_tradenames_list->STRENGTH) == "") { ?>
		<th data-name="STRENGTH" class="<?php echo $pres_tradenames_list->STRENGTH->headerCellClass() ?>"><div id="elh_pres_tradenames_STRENGTH" class="pres_tradenames_STRENGTH"><div class="ew-table-header-caption"><?php echo $pres_tradenames_list->STRENGTH->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="STRENGTH" class="<?php echo $pres_tradenames_list->STRENGTH->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_tradenames_list->SortUrl($pres_tradenames_list->STRENGTH) ?>', 1);"><div id="elh_pres_tradenames_STRENGTH" class="pres_tradenames_STRENGTH">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_tradenames_list->STRENGTH->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_tradenames_list->STRENGTH->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_tradenames_list->STRENGTH->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pres_tradenames_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($pres_tradenames_list->ExportAll && $pres_tradenames_list->isExport()) {
	$pres_tradenames_list->StopRecord = $pres_tradenames_list->TotalRecords;
} else {

	// Set the last record to display
	if ($pres_tradenames_list->TotalRecords > $pres_tradenames_list->StartRecord + $pres_tradenames_list->DisplayRecords - 1)
		$pres_tradenames_list->StopRecord = $pres_tradenames_list->StartRecord + $pres_tradenames_list->DisplayRecords - 1;
	else
		$pres_tradenames_list->StopRecord = $pres_tradenames_list->TotalRecords;
}
$pres_tradenames_list->RecordCount = $pres_tradenames_list->StartRecord - 1;
if ($pres_tradenames_list->Recordset && !$pres_tradenames_list->Recordset->EOF) {
	$pres_tradenames_list->Recordset->moveFirst();
	$selectLimit = $pres_tradenames_list->UseSelectLimit;
	if (!$selectLimit && $pres_tradenames_list->StartRecord > 1)
		$pres_tradenames_list->Recordset->move($pres_tradenames_list->StartRecord - 1);
} elseif (!$pres_tradenames->AllowAddDeleteRow && $pres_tradenames_list->StopRecord == 0) {
	$pres_tradenames_list->StopRecord = $pres_tradenames->GridAddRowCount;
}

// Initialize aggregate
$pres_tradenames->RowType = ROWTYPE_AGGREGATEINIT;
$pres_tradenames->resetAttributes();
$pres_tradenames_list->renderRow();
while ($pres_tradenames_list->RecordCount < $pres_tradenames_list->StopRecord) {
	$pres_tradenames_list->RecordCount++;
	if ($pres_tradenames_list->RecordCount >= $pres_tradenames_list->StartRecord) {
		$pres_tradenames_list->RowCount++;

		// Set up key count
		$pres_tradenames_list->KeyCount = $pres_tradenames_list->RowIndex;

		// Init row class and style
		$pres_tradenames->resetAttributes();
		$pres_tradenames->CssClass = "";
		if ($pres_tradenames_list->isGridAdd()) {
		} else {
			$pres_tradenames_list->loadRowValues($pres_tradenames_list->Recordset); // Load row values
		}
		$pres_tradenames->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$pres_tradenames->RowAttrs->merge(["data-rowindex" => $pres_tradenames_list->RowCount, "id" => "r" . $pres_tradenames_list->RowCount . "_pres_tradenames", "data-rowtype" => $pres_tradenames->RowType]);

		// Render row
		$pres_tradenames_list->renderRow();

		// Render list options
		$pres_tradenames_list->renderListOptions();
?>
	<tr <?php echo $pres_tradenames->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pres_tradenames_list->ListOptions->render("body", "left", $pres_tradenames_list->RowCount);
?>
	<?php if ($pres_tradenames_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $pres_tradenames_list->id->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_list->RowCount ?>_pres_tradenames_id">
<span<?php echo $pres_tradenames_list->id->viewAttributes() ?>><?php echo $pres_tradenames_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_tradenames_list->PR_CODE->Visible) { // PR_CODE ?>
		<td data-name="PR_CODE" <?php echo $pres_tradenames_list->PR_CODE->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_list->RowCount ?>_pres_tradenames_PR_CODE">
<span<?php echo $pres_tradenames_list->PR_CODE->viewAttributes() ?>><?php echo $pres_tradenames_list->PR_CODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_tradenames_list->CONTAINER_TYPE->Visible) { // CONTAINER_TYPE ?>
		<td data-name="CONTAINER_TYPE" <?php echo $pres_tradenames_list->CONTAINER_TYPE->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_list->RowCount ?>_pres_tradenames_CONTAINER_TYPE">
<span<?php echo $pres_tradenames_list->CONTAINER_TYPE->viewAttributes() ?>><?php echo $pres_tradenames_list->CONTAINER_TYPE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_tradenames_list->STRENGTH->Visible) { // STRENGTH ?>
		<td data-name="STRENGTH" <?php echo $pres_tradenames_list->STRENGTH->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_list->RowCount ?>_pres_tradenames_STRENGTH">
<span<?php echo $pres_tradenames_list->STRENGTH->viewAttributes() ?>><?php echo $pres_tradenames_list->STRENGTH->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pres_tradenames_list->ListOptions->render("body", "right", $pres_tradenames_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$pres_tradenames_list->isGridAdd())
		$pres_tradenames_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$pres_tradenames->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pres_tradenames_list->Recordset)
	$pres_tradenames_list->Recordset->Close();
?>
<?php if (!$pres_tradenames_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$pres_tradenames_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $pres_tradenames_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pres_tradenames_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pres_tradenames_list->TotalRecords == 0 && !$pres_tradenames->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pres_tradenames_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$pres_tradenames_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$pres_tradenames_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$pres_tradenames->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_pres_tradenames",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$pres_tradenames_list->terminate();
?>
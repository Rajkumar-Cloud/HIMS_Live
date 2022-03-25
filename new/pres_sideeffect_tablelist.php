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
$pres_sideeffect_table_list = new pres_sideeffect_table_list();

// Run the page
$pres_sideeffect_table_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_sideeffect_table_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$pres_sideeffect_table_list->isExport()) { ?>
<script>
var fpres_sideeffect_tablelist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fpres_sideeffect_tablelist = currentForm = new ew.Form("fpres_sideeffect_tablelist", "list");
	fpres_sideeffect_tablelist.formKeyCountName = '<?php echo $pres_sideeffect_table_list->FormKeyCountName ?>';
	loadjs.done("fpres_sideeffect_tablelist");
});
var fpres_sideeffect_tablelistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fpres_sideeffect_tablelistsrch = currentSearchForm = new ew.Form("fpres_sideeffect_tablelistsrch");

	// Dynamic selection lists
	// Filters

	fpres_sideeffect_tablelistsrch.filterList = <?php echo $pres_sideeffect_table_list->getFilterList() ?>;
	loadjs.done("fpres_sideeffect_tablelistsrch");
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
<?php if (!$pres_sideeffect_table_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($pres_sideeffect_table_list->TotalRecords > 0 && $pres_sideeffect_table_list->ExportOptions->visible()) { ?>
<?php $pres_sideeffect_table_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($pres_sideeffect_table_list->ImportOptions->visible()) { ?>
<?php $pres_sideeffect_table_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($pres_sideeffect_table_list->SearchOptions->visible()) { ?>
<?php $pres_sideeffect_table_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($pres_sideeffect_table_list->FilterOptions->visible()) { ?>
<?php $pres_sideeffect_table_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$pres_sideeffect_table_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$pres_sideeffect_table_list->isExport() && !$pres_sideeffect_table->CurrentAction) { ?>
<form name="fpres_sideeffect_tablelistsrch" id="fpres_sideeffect_tablelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fpres_sideeffect_tablelistsrch-search-panel" class="<?php echo $pres_sideeffect_table_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pres_sideeffect_table">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $pres_sideeffect_table_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($pres_sideeffect_table_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($pres_sideeffect_table_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $pres_sideeffect_table_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($pres_sideeffect_table_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($pres_sideeffect_table_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($pres_sideeffect_table_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($pres_sideeffect_table_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $pres_sideeffect_table_list->showPageHeader(); ?>
<?php
$pres_sideeffect_table_list->showMessage();
?>
<?php if ($pres_sideeffect_table_list->TotalRecords > 0 || $pres_sideeffect_table->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pres_sideeffect_table_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pres_sideeffect_table">
<?php if (!$pres_sideeffect_table_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$pres_sideeffect_table_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $pres_sideeffect_table_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pres_sideeffect_table_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpres_sideeffect_tablelist" id="fpres_sideeffect_tablelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_sideeffect_table">
<div id="gmp_pres_sideeffect_table" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($pres_sideeffect_table_list->TotalRecords > 0 || $pres_sideeffect_table_list->isGridEdit()) { ?>
<table id="tbl_pres_sideeffect_tablelist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pres_sideeffect_table->RowType = ROWTYPE_HEADER;

// Render list options
$pres_sideeffect_table_list->renderListOptions();

// Render list options (header, left)
$pres_sideeffect_table_list->ListOptions->render("header", "left");
?>
<?php if ($pres_sideeffect_table_list->id->Visible) { // id ?>
	<?php if ($pres_sideeffect_table_list->SortUrl($pres_sideeffect_table_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $pres_sideeffect_table_list->id->headerCellClass() ?>"><div id="elh_pres_sideeffect_table_id" class="pres_sideeffect_table_id"><div class="ew-table-header-caption"><?php echo $pres_sideeffect_table_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $pres_sideeffect_table_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_sideeffect_table_list->SortUrl($pres_sideeffect_table_list->id) ?>', 1);"><div id="elh_pres_sideeffect_table_id" class="pres_sideeffect_table_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_sideeffect_table_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_sideeffect_table_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_sideeffect_table_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_sideeffect_table_list->Genericname->Visible) { // Genericname ?>
	<?php if ($pres_sideeffect_table_list->SortUrl($pres_sideeffect_table_list->Genericname) == "") { ?>
		<th data-name="Genericname" class="<?php echo $pres_sideeffect_table_list->Genericname->headerCellClass() ?>"><div id="elh_pres_sideeffect_table_Genericname" class="pres_sideeffect_table_Genericname"><div class="ew-table-header-caption"><?php echo $pres_sideeffect_table_list->Genericname->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Genericname" class="<?php echo $pres_sideeffect_table_list->Genericname->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_sideeffect_table_list->SortUrl($pres_sideeffect_table_list->Genericname) ?>', 1);"><div id="elh_pres_sideeffect_table_Genericname" class="pres_sideeffect_table_Genericname">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_sideeffect_table_list->Genericname->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_sideeffect_table_list->Genericname->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_sideeffect_table_list->Genericname->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_sideeffect_table_list->SideEffects->Visible) { // SideEffects ?>
	<?php if ($pres_sideeffect_table_list->SortUrl($pres_sideeffect_table_list->SideEffects) == "") { ?>
		<th data-name="SideEffects" class="<?php echo $pres_sideeffect_table_list->SideEffects->headerCellClass() ?>"><div id="elh_pres_sideeffect_table_SideEffects" class="pres_sideeffect_table_SideEffects"><div class="ew-table-header-caption"><?php echo $pres_sideeffect_table_list->SideEffects->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SideEffects" class="<?php echo $pres_sideeffect_table_list->SideEffects->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_sideeffect_table_list->SortUrl($pres_sideeffect_table_list->SideEffects) ?>', 1);"><div id="elh_pres_sideeffect_table_SideEffects" class="pres_sideeffect_table_SideEffects">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_sideeffect_table_list->SideEffects->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_sideeffect_table_list->SideEffects->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_sideeffect_table_list->SideEffects->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_sideeffect_table_list->Contraindications->Visible) { // Contraindications ?>
	<?php if ($pres_sideeffect_table_list->SortUrl($pres_sideeffect_table_list->Contraindications) == "") { ?>
		<th data-name="Contraindications" class="<?php echo $pres_sideeffect_table_list->Contraindications->headerCellClass() ?>"><div id="elh_pres_sideeffect_table_Contraindications" class="pres_sideeffect_table_Contraindications"><div class="ew-table-header-caption"><?php echo $pres_sideeffect_table_list->Contraindications->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Contraindications" class="<?php echo $pres_sideeffect_table_list->Contraindications->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_sideeffect_table_list->SortUrl($pres_sideeffect_table_list->Contraindications) ?>', 1);"><div id="elh_pres_sideeffect_table_Contraindications" class="pres_sideeffect_table_Contraindications">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_sideeffect_table_list->Contraindications->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_sideeffect_table_list->Contraindications->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_sideeffect_table_list->Contraindications->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pres_sideeffect_table_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($pres_sideeffect_table_list->ExportAll && $pres_sideeffect_table_list->isExport()) {
	$pres_sideeffect_table_list->StopRecord = $pres_sideeffect_table_list->TotalRecords;
} else {

	// Set the last record to display
	if ($pres_sideeffect_table_list->TotalRecords > $pres_sideeffect_table_list->StartRecord + $pres_sideeffect_table_list->DisplayRecords - 1)
		$pres_sideeffect_table_list->StopRecord = $pres_sideeffect_table_list->StartRecord + $pres_sideeffect_table_list->DisplayRecords - 1;
	else
		$pres_sideeffect_table_list->StopRecord = $pres_sideeffect_table_list->TotalRecords;
}
$pres_sideeffect_table_list->RecordCount = $pres_sideeffect_table_list->StartRecord - 1;
if ($pres_sideeffect_table_list->Recordset && !$pres_sideeffect_table_list->Recordset->EOF) {
	$pres_sideeffect_table_list->Recordset->moveFirst();
	$selectLimit = $pres_sideeffect_table_list->UseSelectLimit;
	if (!$selectLimit && $pres_sideeffect_table_list->StartRecord > 1)
		$pres_sideeffect_table_list->Recordset->move($pres_sideeffect_table_list->StartRecord - 1);
} elseif (!$pres_sideeffect_table->AllowAddDeleteRow && $pres_sideeffect_table_list->StopRecord == 0) {
	$pres_sideeffect_table_list->StopRecord = $pres_sideeffect_table->GridAddRowCount;
}

// Initialize aggregate
$pres_sideeffect_table->RowType = ROWTYPE_AGGREGATEINIT;
$pres_sideeffect_table->resetAttributes();
$pres_sideeffect_table_list->renderRow();
while ($pres_sideeffect_table_list->RecordCount < $pres_sideeffect_table_list->StopRecord) {
	$pres_sideeffect_table_list->RecordCount++;
	if ($pres_sideeffect_table_list->RecordCount >= $pres_sideeffect_table_list->StartRecord) {
		$pres_sideeffect_table_list->RowCount++;

		// Set up key count
		$pres_sideeffect_table_list->KeyCount = $pres_sideeffect_table_list->RowIndex;

		// Init row class and style
		$pres_sideeffect_table->resetAttributes();
		$pres_sideeffect_table->CssClass = "";
		if ($pres_sideeffect_table_list->isGridAdd()) {
		} else {
			$pres_sideeffect_table_list->loadRowValues($pres_sideeffect_table_list->Recordset); // Load row values
		}
		$pres_sideeffect_table->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$pres_sideeffect_table->RowAttrs->merge(["data-rowindex" => $pres_sideeffect_table_list->RowCount, "id" => "r" . $pres_sideeffect_table_list->RowCount . "_pres_sideeffect_table", "data-rowtype" => $pres_sideeffect_table->RowType]);

		// Render row
		$pres_sideeffect_table_list->renderRow();

		// Render list options
		$pres_sideeffect_table_list->renderListOptions();
?>
	<tr <?php echo $pres_sideeffect_table->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pres_sideeffect_table_list->ListOptions->render("body", "left", $pres_sideeffect_table_list->RowCount);
?>
	<?php if ($pres_sideeffect_table_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $pres_sideeffect_table_list->id->cellAttributes() ?>>
<span id="el<?php echo $pres_sideeffect_table_list->RowCount ?>_pres_sideeffect_table_id">
<span<?php echo $pres_sideeffect_table_list->id->viewAttributes() ?>><?php echo $pres_sideeffect_table_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_sideeffect_table_list->Genericname->Visible) { // Genericname ?>
		<td data-name="Genericname" <?php echo $pres_sideeffect_table_list->Genericname->cellAttributes() ?>>
<span id="el<?php echo $pres_sideeffect_table_list->RowCount ?>_pres_sideeffect_table_Genericname">
<span<?php echo $pres_sideeffect_table_list->Genericname->viewAttributes() ?>><?php echo $pres_sideeffect_table_list->Genericname->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_sideeffect_table_list->SideEffects->Visible) { // SideEffects ?>
		<td data-name="SideEffects" <?php echo $pres_sideeffect_table_list->SideEffects->cellAttributes() ?>>
<span id="el<?php echo $pres_sideeffect_table_list->RowCount ?>_pres_sideeffect_table_SideEffects">
<span<?php echo $pres_sideeffect_table_list->SideEffects->viewAttributes() ?>><?php echo $pres_sideeffect_table_list->SideEffects->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_sideeffect_table_list->Contraindications->Visible) { // Contraindications ?>
		<td data-name="Contraindications" <?php echo $pres_sideeffect_table_list->Contraindications->cellAttributes() ?>>
<span id="el<?php echo $pres_sideeffect_table_list->RowCount ?>_pres_sideeffect_table_Contraindications">
<span<?php echo $pres_sideeffect_table_list->Contraindications->viewAttributes() ?>><?php echo $pres_sideeffect_table_list->Contraindications->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pres_sideeffect_table_list->ListOptions->render("body", "right", $pres_sideeffect_table_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$pres_sideeffect_table_list->isGridAdd())
		$pres_sideeffect_table_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$pres_sideeffect_table->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pres_sideeffect_table_list->Recordset)
	$pres_sideeffect_table_list->Recordset->Close();
?>
<?php if (!$pres_sideeffect_table_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$pres_sideeffect_table_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $pres_sideeffect_table_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pres_sideeffect_table_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pres_sideeffect_table_list->TotalRecords == 0 && !$pres_sideeffect_table->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pres_sideeffect_table_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$pres_sideeffect_table_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$pres_sideeffect_table_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$pres_sideeffect_table->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_pres_sideeffect_table",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$pres_sideeffect_table_list->terminate();
?>
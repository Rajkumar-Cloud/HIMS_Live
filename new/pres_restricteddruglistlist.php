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
$pres_restricteddruglist_list = new pres_restricteddruglist_list();

// Run the page
$pres_restricteddruglist_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_restricteddruglist_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$pres_restricteddruglist_list->isExport()) { ?>
<script>
var fpres_restricteddruglistlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fpres_restricteddruglistlist = currentForm = new ew.Form("fpres_restricteddruglistlist", "list");
	fpres_restricteddruglistlist.formKeyCountName = '<?php echo $pres_restricteddruglist_list->FormKeyCountName ?>';
	loadjs.done("fpres_restricteddruglistlist");
});
var fpres_restricteddruglistlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fpres_restricteddruglistlistsrch = currentSearchForm = new ew.Form("fpres_restricteddruglistlistsrch");

	// Dynamic selection lists
	// Filters

	fpres_restricteddruglistlistsrch.filterList = <?php echo $pres_restricteddruglist_list->getFilterList() ?>;
	loadjs.done("fpres_restricteddruglistlistsrch");
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
<?php if (!$pres_restricteddruglist_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($pres_restricteddruglist_list->TotalRecords > 0 && $pres_restricteddruglist_list->ExportOptions->visible()) { ?>
<?php $pres_restricteddruglist_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($pres_restricteddruglist_list->ImportOptions->visible()) { ?>
<?php $pres_restricteddruglist_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($pres_restricteddruglist_list->SearchOptions->visible()) { ?>
<?php $pres_restricteddruglist_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($pres_restricteddruglist_list->FilterOptions->visible()) { ?>
<?php $pres_restricteddruglist_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$pres_restricteddruglist_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$pres_restricteddruglist_list->isExport() && !$pres_restricteddruglist->CurrentAction) { ?>
<form name="fpres_restricteddruglistlistsrch" id="fpres_restricteddruglistlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fpres_restricteddruglistlistsrch-search-panel" class="<?php echo $pres_restricteddruglist_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pres_restricteddruglist">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $pres_restricteddruglist_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($pres_restricteddruglist_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($pres_restricteddruglist_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $pres_restricteddruglist_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($pres_restricteddruglist_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($pres_restricteddruglist_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($pres_restricteddruglist_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($pres_restricteddruglist_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $pres_restricteddruglist_list->showPageHeader(); ?>
<?php
$pres_restricteddruglist_list->showMessage();
?>
<?php if ($pres_restricteddruglist_list->TotalRecords > 0 || $pres_restricteddruglist->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pres_restricteddruglist_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pres_restricteddruglist">
<?php if (!$pres_restricteddruglist_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$pres_restricteddruglist_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $pres_restricteddruglist_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pres_restricteddruglist_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpres_restricteddruglistlist" id="fpres_restricteddruglistlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_restricteddruglist">
<div id="gmp_pres_restricteddruglist" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($pres_restricteddruglist_list->TotalRecords > 0 || $pres_restricteddruglist_list->isGridEdit()) { ?>
<table id="tbl_pres_restricteddruglistlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pres_restricteddruglist->RowType = ROWTYPE_HEADER;

// Render list options
$pres_restricteddruglist_list->renderListOptions();

// Render list options (header, left)
$pres_restricteddruglist_list->ListOptions->render("header", "left");
?>
<?php if ($pres_restricteddruglist_list->id->Visible) { // id ?>
	<?php if ($pres_restricteddruglist_list->SortUrl($pres_restricteddruglist_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $pres_restricteddruglist_list->id->headerCellClass() ?>"><div id="elh_pres_restricteddruglist_id" class="pres_restricteddruglist_id"><div class="ew-table-header-caption"><?php echo $pres_restricteddruglist_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $pres_restricteddruglist_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_restricteddruglist_list->SortUrl($pres_restricteddruglist_list->id) ?>', 1);"><div id="elh_pres_restricteddruglist_id" class="pres_restricteddruglist_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_restricteddruglist_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_restricteddruglist_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_restricteddruglist_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_restricteddruglist_list->Genericname->Visible) { // Genericname ?>
	<?php if ($pres_restricteddruglist_list->SortUrl($pres_restricteddruglist_list->Genericname) == "") { ?>
		<th data-name="Genericname" class="<?php echo $pres_restricteddruglist_list->Genericname->headerCellClass() ?>"><div id="elh_pres_restricteddruglist_Genericname" class="pres_restricteddruglist_Genericname"><div class="ew-table-header-caption"><?php echo $pres_restricteddruglist_list->Genericname->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Genericname" class="<?php echo $pres_restricteddruglist_list->Genericname->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_restricteddruglist_list->SortUrl($pres_restricteddruglist_list->Genericname) ?>', 1);"><div id="elh_pres_restricteddruglist_Genericname" class="pres_restricteddruglist_Genericname">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_restricteddruglist_list->Genericname->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_restricteddruglist_list->Genericname->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_restricteddruglist_list->Genericname->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pres_restricteddruglist_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($pres_restricteddruglist_list->ExportAll && $pres_restricteddruglist_list->isExport()) {
	$pres_restricteddruglist_list->StopRecord = $pres_restricteddruglist_list->TotalRecords;
} else {

	// Set the last record to display
	if ($pres_restricteddruglist_list->TotalRecords > $pres_restricteddruglist_list->StartRecord + $pres_restricteddruglist_list->DisplayRecords - 1)
		$pres_restricteddruglist_list->StopRecord = $pres_restricteddruglist_list->StartRecord + $pres_restricteddruglist_list->DisplayRecords - 1;
	else
		$pres_restricteddruglist_list->StopRecord = $pres_restricteddruglist_list->TotalRecords;
}
$pres_restricteddruglist_list->RecordCount = $pres_restricteddruglist_list->StartRecord - 1;
if ($pres_restricteddruglist_list->Recordset && !$pres_restricteddruglist_list->Recordset->EOF) {
	$pres_restricteddruglist_list->Recordset->moveFirst();
	$selectLimit = $pres_restricteddruglist_list->UseSelectLimit;
	if (!$selectLimit && $pres_restricteddruglist_list->StartRecord > 1)
		$pres_restricteddruglist_list->Recordset->move($pres_restricteddruglist_list->StartRecord - 1);
} elseif (!$pres_restricteddruglist->AllowAddDeleteRow && $pres_restricteddruglist_list->StopRecord == 0) {
	$pres_restricteddruglist_list->StopRecord = $pres_restricteddruglist->GridAddRowCount;
}

// Initialize aggregate
$pres_restricteddruglist->RowType = ROWTYPE_AGGREGATEINIT;
$pres_restricteddruglist->resetAttributes();
$pres_restricteddruglist_list->renderRow();
while ($pres_restricteddruglist_list->RecordCount < $pres_restricteddruglist_list->StopRecord) {
	$pres_restricteddruglist_list->RecordCount++;
	if ($pres_restricteddruglist_list->RecordCount >= $pres_restricteddruglist_list->StartRecord) {
		$pres_restricteddruglist_list->RowCount++;

		// Set up key count
		$pres_restricteddruglist_list->KeyCount = $pres_restricteddruglist_list->RowIndex;

		// Init row class and style
		$pres_restricteddruglist->resetAttributes();
		$pres_restricteddruglist->CssClass = "";
		if ($pres_restricteddruglist_list->isGridAdd()) {
		} else {
			$pres_restricteddruglist_list->loadRowValues($pres_restricteddruglist_list->Recordset); // Load row values
		}
		$pres_restricteddruglist->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$pres_restricteddruglist->RowAttrs->merge(["data-rowindex" => $pres_restricteddruglist_list->RowCount, "id" => "r" . $pres_restricteddruglist_list->RowCount . "_pres_restricteddruglist", "data-rowtype" => $pres_restricteddruglist->RowType]);

		// Render row
		$pres_restricteddruglist_list->renderRow();

		// Render list options
		$pres_restricteddruglist_list->renderListOptions();
?>
	<tr <?php echo $pres_restricteddruglist->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pres_restricteddruglist_list->ListOptions->render("body", "left", $pres_restricteddruglist_list->RowCount);
?>
	<?php if ($pres_restricteddruglist_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $pres_restricteddruglist_list->id->cellAttributes() ?>>
<span id="el<?php echo $pres_restricteddruglist_list->RowCount ?>_pres_restricteddruglist_id">
<span<?php echo $pres_restricteddruglist_list->id->viewAttributes() ?>><?php echo $pres_restricteddruglist_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_restricteddruglist_list->Genericname->Visible) { // Genericname ?>
		<td data-name="Genericname" <?php echo $pres_restricteddruglist_list->Genericname->cellAttributes() ?>>
<span id="el<?php echo $pres_restricteddruglist_list->RowCount ?>_pres_restricteddruglist_Genericname">
<span<?php echo $pres_restricteddruglist_list->Genericname->viewAttributes() ?>><?php echo $pres_restricteddruglist_list->Genericname->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pres_restricteddruglist_list->ListOptions->render("body", "right", $pres_restricteddruglist_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$pres_restricteddruglist_list->isGridAdd())
		$pres_restricteddruglist_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$pres_restricteddruglist->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pres_restricteddruglist_list->Recordset)
	$pres_restricteddruglist_list->Recordset->Close();
?>
<?php if (!$pres_restricteddruglist_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$pres_restricteddruglist_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $pres_restricteddruglist_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pres_restricteddruglist_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pres_restricteddruglist_list->TotalRecords == 0 && !$pres_restricteddruglist->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pres_restricteddruglist_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$pres_restricteddruglist_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$pres_restricteddruglist_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$pres_restricteddruglist->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_pres_restricteddruglist",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$pres_restricteddruglist_list->terminate();
?>
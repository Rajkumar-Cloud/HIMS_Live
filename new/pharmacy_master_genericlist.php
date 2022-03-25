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
$pharmacy_master_generic_list = new pharmacy_master_generic_list();

// Run the page
$pharmacy_master_generic_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_master_generic_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$pharmacy_master_generic_list->isExport()) { ?>
<script>
var fpharmacy_master_genericlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fpharmacy_master_genericlist = currentForm = new ew.Form("fpharmacy_master_genericlist", "list");
	fpharmacy_master_genericlist.formKeyCountName = '<?php echo $pharmacy_master_generic_list->FormKeyCountName ?>';
	loadjs.done("fpharmacy_master_genericlist");
});
var fpharmacy_master_genericlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fpharmacy_master_genericlistsrch = currentSearchForm = new ew.Form("fpharmacy_master_genericlistsrch");

	// Dynamic selection lists
	// Filters

	fpharmacy_master_genericlistsrch.filterList = <?php echo $pharmacy_master_generic_list->getFilterList() ?>;
	loadjs.done("fpharmacy_master_genericlistsrch");
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
<?php if (!$pharmacy_master_generic_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($pharmacy_master_generic_list->TotalRecords > 0 && $pharmacy_master_generic_list->ExportOptions->visible()) { ?>
<?php $pharmacy_master_generic_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_master_generic_list->ImportOptions->visible()) { ?>
<?php $pharmacy_master_generic_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_master_generic_list->SearchOptions->visible()) { ?>
<?php $pharmacy_master_generic_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_master_generic_list->FilterOptions->visible()) { ?>
<?php $pharmacy_master_generic_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$pharmacy_master_generic_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$pharmacy_master_generic_list->isExport() && !$pharmacy_master_generic->CurrentAction) { ?>
<form name="fpharmacy_master_genericlistsrch" id="fpharmacy_master_genericlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fpharmacy_master_genericlistsrch-search-panel" class="<?php echo $pharmacy_master_generic_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pharmacy_master_generic">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $pharmacy_master_generic_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($pharmacy_master_generic_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($pharmacy_master_generic_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $pharmacy_master_generic_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($pharmacy_master_generic_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_master_generic_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_master_generic_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_master_generic_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $pharmacy_master_generic_list->showPageHeader(); ?>
<?php
$pharmacy_master_generic_list->showMessage();
?>
<?php if ($pharmacy_master_generic_list->TotalRecords > 0 || $pharmacy_master_generic->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pharmacy_master_generic_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pharmacy_master_generic">
<?php if (!$pharmacy_master_generic_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$pharmacy_master_generic_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $pharmacy_master_generic_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_master_generic_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpharmacy_master_genericlist" id="fpharmacy_master_genericlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_master_generic">
<div id="gmp_pharmacy_master_generic" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($pharmacy_master_generic_list->TotalRecords > 0 || $pharmacy_master_generic_list->isGridEdit()) { ?>
<table id="tbl_pharmacy_master_genericlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pharmacy_master_generic->RowType = ROWTYPE_HEADER;

// Render list options
$pharmacy_master_generic_list->renderListOptions();

// Render list options (header, left)
$pharmacy_master_generic_list->ListOptions->render("header", "left");
?>
<?php if ($pharmacy_master_generic_list->GENNAME->Visible) { // GENNAME ?>
	<?php if ($pharmacy_master_generic_list->SortUrl($pharmacy_master_generic_list->GENNAME) == "") { ?>
		<th data-name="GENNAME" class="<?php echo $pharmacy_master_generic_list->GENNAME->headerCellClass() ?>"><div id="elh_pharmacy_master_generic_GENNAME" class="pharmacy_master_generic_GENNAME"><div class="ew-table-header-caption"><?php echo $pharmacy_master_generic_list->GENNAME->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GENNAME" class="<?php echo $pharmacy_master_generic_list->GENNAME->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_master_generic_list->SortUrl($pharmacy_master_generic_list->GENNAME) ?>', 1);"><div id="elh_pharmacy_master_generic_GENNAME" class="pharmacy_master_generic_GENNAME">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_master_generic_list->GENNAME->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_master_generic_list->GENNAME->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_master_generic_list->GENNAME->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_master_generic_list->CODE->Visible) { // CODE ?>
	<?php if ($pharmacy_master_generic_list->SortUrl($pharmacy_master_generic_list->CODE) == "") { ?>
		<th data-name="CODE" class="<?php echo $pharmacy_master_generic_list->CODE->headerCellClass() ?>"><div id="elh_pharmacy_master_generic_CODE" class="pharmacy_master_generic_CODE"><div class="ew-table-header-caption"><?php echo $pharmacy_master_generic_list->CODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CODE" class="<?php echo $pharmacy_master_generic_list->CODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_master_generic_list->SortUrl($pharmacy_master_generic_list->CODE) ?>', 1);"><div id="elh_pharmacy_master_generic_CODE" class="pharmacy_master_generic_CODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_master_generic_list->CODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_master_generic_list->CODE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_master_generic_list->CODE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_master_generic_list->GRPCODE->Visible) { // GRPCODE ?>
	<?php if ($pharmacy_master_generic_list->SortUrl($pharmacy_master_generic_list->GRPCODE) == "") { ?>
		<th data-name="GRPCODE" class="<?php echo $pharmacy_master_generic_list->GRPCODE->headerCellClass() ?>"><div id="elh_pharmacy_master_generic_GRPCODE" class="pharmacy_master_generic_GRPCODE"><div class="ew-table-header-caption"><?php echo $pharmacy_master_generic_list->GRPCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GRPCODE" class="<?php echo $pharmacy_master_generic_list->GRPCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_master_generic_list->SortUrl($pharmacy_master_generic_list->GRPCODE) ?>', 1);"><div id="elh_pharmacy_master_generic_GRPCODE" class="pharmacy_master_generic_GRPCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_master_generic_list->GRPCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_master_generic_list->GRPCODE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_master_generic_list->GRPCODE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_master_generic_list->id->Visible) { // id ?>
	<?php if ($pharmacy_master_generic_list->SortUrl($pharmacy_master_generic_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $pharmacy_master_generic_list->id->headerCellClass() ?>"><div id="elh_pharmacy_master_generic_id" class="pharmacy_master_generic_id"><div class="ew-table-header-caption"><?php echo $pharmacy_master_generic_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $pharmacy_master_generic_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_master_generic_list->SortUrl($pharmacy_master_generic_list->id) ?>', 1);"><div id="elh_pharmacy_master_generic_id" class="pharmacy_master_generic_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_master_generic_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_master_generic_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_master_generic_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pharmacy_master_generic_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($pharmacy_master_generic_list->ExportAll && $pharmacy_master_generic_list->isExport()) {
	$pharmacy_master_generic_list->StopRecord = $pharmacy_master_generic_list->TotalRecords;
} else {

	// Set the last record to display
	if ($pharmacy_master_generic_list->TotalRecords > $pharmacy_master_generic_list->StartRecord + $pharmacy_master_generic_list->DisplayRecords - 1)
		$pharmacy_master_generic_list->StopRecord = $pharmacy_master_generic_list->StartRecord + $pharmacy_master_generic_list->DisplayRecords - 1;
	else
		$pharmacy_master_generic_list->StopRecord = $pharmacy_master_generic_list->TotalRecords;
}
$pharmacy_master_generic_list->RecordCount = $pharmacy_master_generic_list->StartRecord - 1;
if ($pharmacy_master_generic_list->Recordset && !$pharmacy_master_generic_list->Recordset->EOF) {
	$pharmacy_master_generic_list->Recordset->moveFirst();
	$selectLimit = $pharmacy_master_generic_list->UseSelectLimit;
	if (!$selectLimit && $pharmacy_master_generic_list->StartRecord > 1)
		$pharmacy_master_generic_list->Recordset->move($pharmacy_master_generic_list->StartRecord - 1);
} elseif (!$pharmacy_master_generic->AllowAddDeleteRow && $pharmacy_master_generic_list->StopRecord == 0) {
	$pharmacy_master_generic_list->StopRecord = $pharmacy_master_generic->GridAddRowCount;
}

// Initialize aggregate
$pharmacy_master_generic->RowType = ROWTYPE_AGGREGATEINIT;
$pharmacy_master_generic->resetAttributes();
$pharmacy_master_generic_list->renderRow();
while ($pharmacy_master_generic_list->RecordCount < $pharmacy_master_generic_list->StopRecord) {
	$pharmacy_master_generic_list->RecordCount++;
	if ($pharmacy_master_generic_list->RecordCount >= $pharmacy_master_generic_list->StartRecord) {
		$pharmacy_master_generic_list->RowCount++;

		// Set up key count
		$pharmacy_master_generic_list->KeyCount = $pharmacy_master_generic_list->RowIndex;

		// Init row class and style
		$pharmacy_master_generic->resetAttributes();
		$pharmacy_master_generic->CssClass = "";
		if ($pharmacy_master_generic_list->isGridAdd()) {
		} else {
			$pharmacy_master_generic_list->loadRowValues($pharmacy_master_generic_list->Recordset); // Load row values
		}
		$pharmacy_master_generic->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$pharmacy_master_generic->RowAttrs->merge(["data-rowindex" => $pharmacy_master_generic_list->RowCount, "id" => "r" . $pharmacy_master_generic_list->RowCount . "_pharmacy_master_generic", "data-rowtype" => $pharmacy_master_generic->RowType]);

		// Render row
		$pharmacy_master_generic_list->renderRow();

		// Render list options
		$pharmacy_master_generic_list->renderListOptions();
?>
	<tr <?php echo $pharmacy_master_generic->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_master_generic_list->ListOptions->render("body", "left", $pharmacy_master_generic_list->RowCount);
?>
	<?php if ($pharmacy_master_generic_list->GENNAME->Visible) { // GENNAME ?>
		<td data-name="GENNAME" <?php echo $pharmacy_master_generic_list->GENNAME->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_master_generic_list->RowCount ?>_pharmacy_master_generic_GENNAME">
<span<?php echo $pharmacy_master_generic_list->GENNAME->viewAttributes() ?>><?php echo $pharmacy_master_generic_list->GENNAME->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_master_generic_list->CODE->Visible) { // CODE ?>
		<td data-name="CODE" <?php echo $pharmacy_master_generic_list->CODE->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_master_generic_list->RowCount ?>_pharmacy_master_generic_CODE">
<span<?php echo $pharmacy_master_generic_list->CODE->viewAttributes() ?>><?php echo $pharmacy_master_generic_list->CODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_master_generic_list->GRPCODE->Visible) { // GRPCODE ?>
		<td data-name="GRPCODE" <?php echo $pharmacy_master_generic_list->GRPCODE->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_master_generic_list->RowCount ?>_pharmacy_master_generic_GRPCODE">
<span<?php echo $pharmacy_master_generic_list->GRPCODE->viewAttributes() ?>><?php echo $pharmacy_master_generic_list->GRPCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_master_generic_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $pharmacy_master_generic_list->id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_master_generic_list->RowCount ?>_pharmacy_master_generic_id">
<span<?php echo $pharmacy_master_generic_list->id->viewAttributes() ?>><?php echo $pharmacy_master_generic_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_master_generic_list->ListOptions->render("body", "right", $pharmacy_master_generic_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$pharmacy_master_generic_list->isGridAdd())
		$pharmacy_master_generic_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$pharmacy_master_generic->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pharmacy_master_generic_list->Recordset)
	$pharmacy_master_generic_list->Recordset->Close();
?>
<?php if (!$pharmacy_master_generic_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$pharmacy_master_generic_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $pharmacy_master_generic_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_master_generic_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pharmacy_master_generic_list->TotalRecords == 0 && !$pharmacy_master_generic->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pharmacy_master_generic_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$pharmacy_master_generic_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_master_generic_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$pharmacy_master_generic->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_pharmacy_master_generic",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$pharmacy_master_generic_list->terminate();
?>
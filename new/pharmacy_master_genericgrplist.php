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
$pharmacy_master_genericgrp_list = new pharmacy_master_genericgrp_list();

// Run the page
$pharmacy_master_genericgrp_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_master_genericgrp_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$pharmacy_master_genericgrp_list->isExport()) { ?>
<script>
var fpharmacy_master_genericgrplist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fpharmacy_master_genericgrplist = currentForm = new ew.Form("fpharmacy_master_genericgrplist", "list");
	fpharmacy_master_genericgrplist.formKeyCountName = '<?php echo $pharmacy_master_genericgrp_list->FormKeyCountName ?>';
	loadjs.done("fpharmacy_master_genericgrplist");
});
var fpharmacy_master_genericgrplistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fpharmacy_master_genericgrplistsrch = currentSearchForm = new ew.Form("fpharmacy_master_genericgrplistsrch");

	// Dynamic selection lists
	// Filters

	fpharmacy_master_genericgrplistsrch.filterList = <?php echo $pharmacy_master_genericgrp_list->getFilterList() ?>;
	loadjs.done("fpharmacy_master_genericgrplistsrch");
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
<?php if (!$pharmacy_master_genericgrp_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($pharmacy_master_genericgrp_list->TotalRecords > 0 && $pharmacy_master_genericgrp_list->ExportOptions->visible()) { ?>
<?php $pharmacy_master_genericgrp_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_master_genericgrp_list->ImportOptions->visible()) { ?>
<?php $pharmacy_master_genericgrp_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_master_genericgrp_list->SearchOptions->visible()) { ?>
<?php $pharmacy_master_genericgrp_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_master_genericgrp_list->FilterOptions->visible()) { ?>
<?php $pharmacy_master_genericgrp_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$pharmacy_master_genericgrp_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$pharmacy_master_genericgrp_list->isExport() && !$pharmacy_master_genericgrp->CurrentAction) { ?>
<form name="fpharmacy_master_genericgrplistsrch" id="fpharmacy_master_genericgrplistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fpharmacy_master_genericgrplistsrch-search-panel" class="<?php echo $pharmacy_master_genericgrp_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pharmacy_master_genericgrp">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $pharmacy_master_genericgrp_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($pharmacy_master_genericgrp_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($pharmacy_master_genericgrp_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $pharmacy_master_genericgrp_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($pharmacy_master_genericgrp_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_master_genericgrp_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_master_genericgrp_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_master_genericgrp_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $pharmacy_master_genericgrp_list->showPageHeader(); ?>
<?php
$pharmacy_master_genericgrp_list->showMessage();
?>
<?php if ($pharmacy_master_genericgrp_list->TotalRecords > 0 || $pharmacy_master_genericgrp->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pharmacy_master_genericgrp_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pharmacy_master_genericgrp">
<?php if (!$pharmacy_master_genericgrp_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$pharmacy_master_genericgrp_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $pharmacy_master_genericgrp_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_master_genericgrp_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpharmacy_master_genericgrplist" id="fpharmacy_master_genericgrplist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_master_genericgrp">
<div id="gmp_pharmacy_master_genericgrp" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($pharmacy_master_genericgrp_list->TotalRecords > 0 || $pharmacy_master_genericgrp_list->isGridEdit()) { ?>
<table id="tbl_pharmacy_master_genericgrplist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pharmacy_master_genericgrp->RowType = ROWTYPE_HEADER;

// Render list options
$pharmacy_master_genericgrp_list->renderListOptions();

// Render list options (header, left)
$pharmacy_master_genericgrp_list->ListOptions->render("header", "left");
?>
<?php if ($pharmacy_master_genericgrp_list->GENNAME->Visible) { // GENNAME ?>
	<?php if ($pharmacy_master_genericgrp_list->SortUrl($pharmacy_master_genericgrp_list->GENNAME) == "") { ?>
		<th data-name="GENNAME" class="<?php echo $pharmacy_master_genericgrp_list->GENNAME->headerCellClass() ?>"><div id="elh_pharmacy_master_genericgrp_GENNAME" class="pharmacy_master_genericgrp_GENNAME"><div class="ew-table-header-caption"><?php echo $pharmacy_master_genericgrp_list->GENNAME->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GENNAME" class="<?php echo $pharmacy_master_genericgrp_list->GENNAME->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_master_genericgrp_list->SortUrl($pharmacy_master_genericgrp_list->GENNAME) ?>', 1);"><div id="elh_pharmacy_master_genericgrp_GENNAME" class="pharmacy_master_genericgrp_GENNAME">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_master_genericgrp_list->GENNAME->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_master_genericgrp_list->GENNAME->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_master_genericgrp_list->GENNAME->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_master_genericgrp_list->CODE->Visible) { // CODE ?>
	<?php if ($pharmacy_master_genericgrp_list->SortUrl($pharmacy_master_genericgrp_list->CODE) == "") { ?>
		<th data-name="CODE" class="<?php echo $pharmacy_master_genericgrp_list->CODE->headerCellClass() ?>"><div id="elh_pharmacy_master_genericgrp_CODE" class="pharmacy_master_genericgrp_CODE"><div class="ew-table-header-caption"><?php echo $pharmacy_master_genericgrp_list->CODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CODE" class="<?php echo $pharmacy_master_genericgrp_list->CODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_master_genericgrp_list->SortUrl($pharmacy_master_genericgrp_list->CODE) ?>', 1);"><div id="elh_pharmacy_master_genericgrp_CODE" class="pharmacy_master_genericgrp_CODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_master_genericgrp_list->CODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_master_genericgrp_list->CODE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_master_genericgrp_list->CODE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_master_genericgrp_list->id->Visible) { // id ?>
	<?php if ($pharmacy_master_genericgrp_list->SortUrl($pharmacy_master_genericgrp_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $pharmacy_master_genericgrp_list->id->headerCellClass() ?>"><div id="elh_pharmacy_master_genericgrp_id" class="pharmacy_master_genericgrp_id"><div class="ew-table-header-caption"><?php echo $pharmacy_master_genericgrp_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $pharmacy_master_genericgrp_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_master_genericgrp_list->SortUrl($pharmacy_master_genericgrp_list->id) ?>', 1);"><div id="elh_pharmacy_master_genericgrp_id" class="pharmacy_master_genericgrp_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_master_genericgrp_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_master_genericgrp_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_master_genericgrp_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pharmacy_master_genericgrp_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($pharmacy_master_genericgrp_list->ExportAll && $pharmacy_master_genericgrp_list->isExport()) {
	$pharmacy_master_genericgrp_list->StopRecord = $pharmacy_master_genericgrp_list->TotalRecords;
} else {

	// Set the last record to display
	if ($pharmacy_master_genericgrp_list->TotalRecords > $pharmacy_master_genericgrp_list->StartRecord + $pharmacy_master_genericgrp_list->DisplayRecords - 1)
		$pharmacy_master_genericgrp_list->StopRecord = $pharmacy_master_genericgrp_list->StartRecord + $pharmacy_master_genericgrp_list->DisplayRecords - 1;
	else
		$pharmacy_master_genericgrp_list->StopRecord = $pharmacy_master_genericgrp_list->TotalRecords;
}
$pharmacy_master_genericgrp_list->RecordCount = $pharmacy_master_genericgrp_list->StartRecord - 1;
if ($pharmacy_master_genericgrp_list->Recordset && !$pharmacy_master_genericgrp_list->Recordset->EOF) {
	$pharmacy_master_genericgrp_list->Recordset->moveFirst();
	$selectLimit = $pharmacy_master_genericgrp_list->UseSelectLimit;
	if (!$selectLimit && $pharmacy_master_genericgrp_list->StartRecord > 1)
		$pharmacy_master_genericgrp_list->Recordset->move($pharmacy_master_genericgrp_list->StartRecord - 1);
} elseif (!$pharmacy_master_genericgrp->AllowAddDeleteRow && $pharmacy_master_genericgrp_list->StopRecord == 0) {
	$pharmacy_master_genericgrp_list->StopRecord = $pharmacy_master_genericgrp->GridAddRowCount;
}

// Initialize aggregate
$pharmacy_master_genericgrp->RowType = ROWTYPE_AGGREGATEINIT;
$pharmacy_master_genericgrp->resetAttributes();
$pharmacy_master_genericgrp_list->renderRow();
while ($pharmacy_master_genericgrp_list->RecordCount < $pharmacy_master_genericgrp_list->StopRecord) {
	$pharmacy_master_genericgrp_list->RecordCount++;
	if ($pharmacy_master_genericgrp_list->RecordCount >= $pharmacy_master_genericgrp_list->StartRecord) {
		$pharmacy_master_genericgrp_list->RowCount++;

		// Set up key count
		$pharmacy_master_genericgrp_list->KeyCount = $pharmacy_master_genericgrp_list->RowIndex;

		// Init row class and style
		$pharmacy_master_genericgrp->resetAttributes();
		$pharmacy_master_genericgrp->CssClass = "";
		if ($pharmacy_master_genericgrp_list->isGridAdd()) {
		} else {
			$pharmacy_master_genericgrp_list->loadRowValues($pharmacy_master_genericgrp_list->Recordset); // Load row values
		}
		$pharmacy_master_genericgrp->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$pharmacy_master_genericgrp->RowAttrs->merge(["data-rowindex" => $pharmacy_master_genericgrp_list->RowCount, "id" => "r" . $pharmacy_master_genericgrp_list->RowCount . "_pharmacy_master_genericgrp", "data-rowtype" => $pharmacy_master_genericgrp->RowType]);

		// Render row
		$pharmacy_master_genericgrp_list->renderRow();

		// Render list options
		$pharmacy_master_genericgrp_list->renderListOptions();
?>
	<tr <?php echo $pharmacy_master_genericgrp->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_master_genericgrp_list->ListOptions->render("body", "left", $pharmacy_master_genericgrp_list->RowCount);
?>
	<?php if ($pharmacy_master_genericgrp_list->GENNAME->Visible) { // GENNAME ?>
		<td data-name="GENNAME" <?php echo $pharmacy_master_genericgrp_list->GENNAME->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_master_genericgrp_list->RowCount ?>_pharmacy_master_genericgrp_GENNAME">
<span<?php echo $pharmacy_master_genericgrp_list->GENNAME->viewAttributes() ?>><?php echo $pharmacy_master_genericgrp_list->GENNAME->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_master_genericgrp_list->CODE->Visible) { // CODE ?>
		<td data-name="CODE" <?php echo $pharmacy_master_genericgrp_list->CODE->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_master_genericgrp_list->RowCount ?>_pharmacy_master_genericgrp_CODE">
<span<?php echo $pharmacy_master_genericgrp_list->CODE->viewAttributes() ?>><?php echo $pharmacy_master_genericgrp_list->CODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_master_genericgrp_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $pharmacy_master_genericgrp_list->id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_master_genericgrp_list->RowCount ?>_pharmacy_master_genericgrp_id">
<span<?php echo $pharmacy_master_genericgrp_list->id->viewAttributes() ?>><?php echo $pharmacy_master_genericgrp_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_master_genericgrp_list->ListOptions->render("body", "right", $pharmacy_master_genericgrp_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$pharmacy_master_genericgrp_list->isGridAdd())
		$pharmacy_master_genericgrp_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$pharmacy_master_genericgrp->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pharmacy_master_genericgrp_list->Recordset)
	$pharmacy_master_genericgrp_list->Recordset->Close();
?>
<?php if (!$pharmacy_master_genericgrp_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$pharmacy_master_genericgrp_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $pharmacy_master_genericgrp_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_master_genericgrp_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pharmacy_master_genericgrp_list->TotalRecords == 0 && !$pharmacy_master_genericgrp->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pharmacy_master_genericgrp_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$pharmacy_master_genericgrp_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_master_genericgrp_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$pharmacy_master_genericgrp->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_pharmacy_master_genericgrp",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$pharmacy_master_genericgrp_list->terminate();
?>
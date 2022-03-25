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
$pres_genericinteractions_list = new pres_genericinteractions_list();

// Run the page
$pres_genericinteractions_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_genericinteractions_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$pres_genericinteractions_list->isExport()) { ?>
<script>
var fpres_genericinteractionslist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fpres_genericinteractionslist = currentForm = new ew.Form("fpres_genericinteractionslist", "list");
	fpres_genericinteractionslist.formKeyCountName = '<?php echo $pres_genericinteractions_list->FormKeyCountName ?>';
	loadjs.done("fpres_genericinteractionslist");
});
var fpres_genericinteractionslistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fpres_genericinteractionslistsrch = currentSearchForm = new ew.Form("fpres_genericinteractionslistsrch");

	// Dynamic selection lists
	// Filters

	fpres_genericinteractionslistsrch.filterList = <?php echo $pres_genericinteractions_list->getFilterList() ?>;
	loadjs.done("fpres_genericinteractionslistsrch");
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
<?php if (!$pres_genericinteractions_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($pres_genericinteractions_list->TotalRecords > 0 && $pres_genericinteractions_list->ExportOptions->visible()) { ?>
<?php $pres_genericinteractions_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($pres_genericinteractions_list->ImportOptions->visible()) { ?>
<?php $pres_genericinteractions_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($pres_genericinteractions_list->SearchOptions->visible()) { ?>
<?php $pres_genericinteractions_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($pres_genericinteractions_list->FilterOptions->visible()) { ?>
<?php $pres_genericinteractions_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$pres_genericinteractions_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$pres_genericinteractions_list->isExport() && !$pres_genericinteractions->CurrentAction) { ?>
<form name="fpres_genericinteractionslistsrch" id="fpres_genericinteractionslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fpres_genericinteractionslistsrch-search-panel" class="<?php echo $pres_genericinteractions_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pres_genericinteractions">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $pres_genericinteractions_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($pres_genericinteractions_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($pres_genericinteractions_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $pres_genericinteractions_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($pres_genericinteractions_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($pres_genericinteractions_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($pres_genericinteractions_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($pres_genericinteractions_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $pres_genericinteractions_list->showPageHeader(); ?>
<?php
$pres_genericinteractions_list->showMessage();
?>
<?php if ($pres_genericinteractions_list->TotalRecords > 0 || $pres_genericinteractions->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pres_genericinteractions_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pres_genericinteractions">
<?php if (!$pres_genericinteractions_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$pres_genericinteractions_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $pres_genericinteractions_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pres_genericinteractions_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpres_genericinteractionslist" id="fpres_genericinteractionslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_genericinteractions">
<div id="gmp_pres_genericinteractions" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($pres_genericinteractions_list->TotalRecords > 0 || $pres_genericinteractions_list->isGridEdit()) { ?>
<table id="tbl_pres_genericinteractionslist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pres_genericinteractions->RowType = ROWTYPE_HEADER;

// Render list options
$pres_genericinteractions_list->renderListOptions();

// Render list options (header, left)
$pres_genericinteractions_list->ListOptions->render("header", "left");
?>
<?php if ($pres_genericinteractions_list->id->Visible) { // id ?>
	<?php if ($pres_genericinteractions_list->SortUrl($pres_genericinteractions_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $pres_genericinteractions_list->id->headerCellClass() ?>"><div id="elh_pres_genericinteractions_id" class="pres_genericinteractions_id"><div class="ew-table-header-caption"><?php echo $pres_genericinteractions_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $pres_genericinteractions_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_genericinteractions_list->SortUrl($pres_genericinteractions_list->id) ?>', 1);"><div id="elh_pres_genericinteractions_id" class="pres_genericinteractions_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_genericinteractions_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_genericinteractions_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_genericinteractions_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_genericinteractions_list->Genericname->Visible) { // Genericname ?>
	<?php if ($pres_genericinteractions_list->SortUrl($pres_genericinteractions_list->Genericname) == "") { ?>
		<th data-name="Genericname" class="<?php echo $pres_genericinteractions_list->Genericname->headerCellClass() ?>"><div id="elh_pres_genericinteractions_Genericname" class="pres_genericinteractions_Genericname"><div class="ew-table-header-caption"><?php echo $pres_genericinteractions_list->Genericname->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Genericname" class="<?php echo $pres_genericinteractions_list->Genericname->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_genericinteractions_list->SortUrl($pres_genericinteractions_list->Genericname) ?>', 1);"><div id="elh_pres_genericinteractions_Genericname" class="pres_genericinteractions_Genericname">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_genericinteractions_list->Genericname->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_genericinteractions_list->Genericname->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_genericinteractions_list->Genericname->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_genericinteractions_list->Interactions->Visible) { // Interactions ?>
	<?php if ($pres_genericinteractions_list->SortUrl($pres_genericinteractions_list->Interactions) == "") { ?>
		<th data-name="Interactions" class="<?php echo $pres_genericinteractions_list->Interactions->headerCellClass() ?>"><div id="elh_pres_genericinteractions_Interactions" class="pres_genericinteractions_Interactions"><div class="ew-table-header-caption"><?php echo $pres_genericinteractions_list->Interactions->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Interactions" class="<?php echo $pres_genericinteractions_list->Interactions->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_genericinteractions_list->SortUrl($pres_genericinteractions_list->Interactions) ?>', 1);"><div id="elh_pres_genericinteractions_Interactions" class="pres_genericinteractions_Interactions">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_genericinteractions_list->Interactions->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_genericinteractions_list->Interactions->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_genericinteractions_list->Interactions->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_genericinteractions_list->Remarks->Visible) { // Remarks ?>
	<?php if ($pres_genericinteractions_list->SortUrl($pres_genericinteractions_list->Remarks) == "") { ?>
		<th data-name="Remarks" class="<?php echo $pres_genericinteractions_list->Remarks->headerCellClass() ?>"><div id="elh_pres_genericinteractions_Remarks" class="pres_genericinteractions_Remarks"><div class="ew-table-header-caption"><?php echo $pres_genericinteractions_list->Remarks->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Remarks" class="<?php echo $pres_genericinteractions_list->Remarks->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_genericinteractions_list->SortUrl($pres_genericinteractions_list->Remarks) ?>', 1);"><div id="elh_pres_genericinteractions_Remarks" class="pres_genericinteractions_Remarks">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_genericinteractions_list->Remarks->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_genericinteractions_list->Remarks->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_genericinteractions_list->Remarks->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pres_genericinteractions_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($pres_genericinteractions_list->ExportAll && $pres_genericinteractions_list->isExport()) {
	$pres_genericinteractions_list->StopRecord = $pres_genericinteractions_list->TotalRecords;
} else {

	// Set the last record to display
	if ($pres_genericinteractions_list->TotalRecords > $pres_genericinteractions_list->StartRecord + $pres_genericinteractions_list->DisplayRecords - 1)
		$pres_genericinteractions_list->StopRecord = $pres_genericinteractions_list->StartRecord + $pres_genericinteractions_list->DisplayRecords - 1;
	else
		$pres_genericinteractions_list->StopRecord = $pres_genericinteractions_list->TotalRecords;
}
$pres_genericinteractions_list->RecordCount = $pres_genericinteractions_list->StartRecord - 1;
if ($pres_genericinteractions_list->Recordset && !$pres_genericinteractions_list->Recordset->EOF) {
	$pres_genericinteractions_list->Recordset->moveFirst();
	$selectLimit = $pres_genericinteractions_list->UseSelectLimit;
	if (!$selectLimit && $pres_genericinteractions_list->StartRecord > 1)
		$pres_genericinteractions_list->Recordset->move($pres_genericinteractions_list->StartRecord - 1);
} elseif (!$pres_genericinteractions->AllowAddDeleteRow && $pres_genericinteractions_list->StopRecord == 0) {
	$pres_genericinteractions_list->StopRecord = $pres_genericinteractions->GridAddRowCount;
}

// Initialize aggregate
$pres_genericinteractions->RowType = ROWTYPE_AGGREGATEINIT;
$pres_genericinteractions->resetAttributes();
$pres_genericinteractions_list->renderRow();
while ($pres_genericinteractions_list->RecordCount < $pres_genericinteractions_list->StopRecord) {
	$pres_genericinteractions_list->RecordCount++;
	if ($pres_genericinteractions_list->RecordCount >= $pres_genericinteractions_list->StartRecord) {
		$pres_genericinteractions_list->RowCount++;

		// Set up key count
		$pres_genericinteractions_list->KeyCount = $pres_genericinteractions_list->RowIndex;

		// Init row class and style
		$pres_genericinteractions->resetAttributes();
		$pres_genericinteractions->CssClass = "";
		if ($pres_genericinteractions_list->isGridAdd()) {
		} else {
			$pres_genericinteractions_list->loadRowValues($pres_genericinteractions_list->Recordset); // Load row values
		}
		$pres_genericinteractions->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$pres_genericinteractions->RowAttrs->merge(["data-rowindex" => $pres_genericinteractions_list->RowCount, "id" => "r" . $pres_genericinteractions_list->RowCount . "_pres_genericinteractions", "data-rowtype" => $pres_genericinteractions->RowType]);

		// Render row
		$pres_genericinteractions_list->renderRow();

		// Render list options
		$pres_genericinteractions_list->renderListOptions();
?>
	<tr <?php echo $pres_genericinteractions->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pres_genericinteractions_list->ListOptions->render("body", "left", $pres_genericinteractions_list->RowCount);
?>
	<?php if ($pres_genericinteractions_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $pres_genericinteractions_list->id->cellAttributes() ?>>
<span id="el<?php echo $pres_genericinteractions_list->RowCount ?>_pres_genericinteractions_id">
<span<?php echo $pres_genericinteractions_list->id->viewAttributes() ?>><?php echo $pres_genericinteractions_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_genericinteractions_list->Genericname->Visible) { // Genericname ?>
		<td data-name="Genericname" <?php echo $pres_genericinteractions_list->Genericname->cellAttributes() ?>>
<span id="el<?php echo $pres_genericinteractions_list->RowCount ?>_pres_genericinteractions_Genericname">
<span<?php echo $pres_genericinteractions_list->Genericname->viewAttributes() ?>><?php echo $pres_genericinteractions_list->Genericname->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_genericinteractions_list->Interactions->Visible) { // Interactions ?>
		<td data-name="Interactions" <?php echo $pres_genericinteractions_list->Interactions->cellAttributes() ?>>
<span id="el<?php echo $pres_genericinteractions_list->RowCount ?>_pres_genericinteractions_Interactions">
<span<?php echo $pres_genericinteractions_list->Interactions->viewAttributes() ?>><?php echo $pres_genericinteractions_list->Interactions->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_genericinteractions_list->Remarks->Visible) { // Remarks ?>
		<td data-name="Remarks" <?php echo $pres_genericinteractions_list->Remarks->cellAttributes() ?>>
<span id="el<?php echo $pres_genericinteractions_list->RowCount ?>_pres_genericinteractions_Remarks">
<span<?php echo $pres_genericinteractions_list->Remarks->viewAttributes() ?>><?php echo $pres_genericinteractions_list->Remarks->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pres_genericinteractions_list->ListOptions->render("body", "right", $pres_genericinteractions_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$pres_genericinteractions_list->isGridAdd())
		$pres_genericinteractions_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$pres_genericinteractions->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pres_genericinteractions_list->Recordset)
	$pres_genericinteractions_list->Recordset->Close();
?>
<?php if (!$pres_genericinteractions_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$pres_genericinteractions_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $pres_genericinteractions_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pres_genericinteractions_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pres_genericinteractions_list->TotalRecords == 0 && !$pres_genericinteractions->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pres_genericinteractions_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$pres_genericinteractions_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$pres_genericinteractions_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$pres_genericinteractions->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_pres_genericinteractions",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$pres_genericinteractions_list->terminate();
?>
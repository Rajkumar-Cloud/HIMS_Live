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
$deposit_account_head_list = new deposit_account_head_list();

// Run the page
$deposit_account_head_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$deposit_account_head_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$deposit_account_head_list->isExport()) { ?>
<script>
var fdeposit_account_headlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fdeposit_account_headlist = currentForm = new ew.Form("fdeposit_account_headlist", "list");
	fdeposit_account_headlist.formKeyCountName = '<?php echo $deposit_account_head_list->FormKeyCountName ?>';
	loadjs.done("fdeposit_account_headlist");
});
var fdeposit_account_headlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fdeposit_account_headlistsrch = currentSearchForm = new ew.Form("fdeposit_account_headlistsrch");

	// Dynamic selection lists
	// Filters

	fdeposit_account_headlistsrch.filterList = <?php echo $deposit_account_head_list->getFilterList() ?>;
	loadjs.done("fdeposit_account_headlistsrch");
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
<?php if (!$deposit_account_head_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($deposit_account_head_list->TotalRecords > 0 && $deposit_account_head_list->ExportOptions->visible()) { ?>
<?php $deposit_account_head_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($deposit_account_head_list->ImportOptions->visible()) { ?>
<?php $deposit_account_head_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($deposit_account_head_list->SearchOptions->visible()) { ?>
<?php $deposit_account_head_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($deposit_account_head_list->FilterOptions->visible()) { ?>
<?php $deposit_account_head_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$deposit_account_head_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$deposit_account_head_list->isExport() && !$deposit_account_head->CurrentAction) { ?>
<form name="fdeposit_account_headlistsrch" id="fdeposit_account_headlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fdeposit_account_headlistsrch-search-panel" class="<?php echo $deposit_account_head_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="deposit_account_head">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $deposit_account_head_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($deposit_account_head_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($deposit_account_head_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $deposit_account_head_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($deposit_account_head_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($deposit_account_head_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($deposit_account_head_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($deposit_account_head_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $deposit_account_head_list->showPageHeader(); ?>
<?php
$deposit_account_head_list->showMessage();
?>
<?php if ($deposit_account_head_list->TotalRecords > 0 || $deposit_account_head->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($deposit_account_head_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> deposit_account_head">
<?php if (!$deposit_account_head_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$deposit_account_head_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $deposit_account_head_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $deposit_account_head_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fdeposit_account_headlist" id="fdeposit_account_headlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="deposit_account_head">
<div id="gmp_deposit_account_head" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($deposit_account_head_list->TotalRecords > 0 || $deposit_account_head_list->isGridEdit()) { ?>
<table id="tbl_deposit_account_headlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$deposit_account_head->RowType = ROWTYPE_HEADER;

// Render list options
$deposit_account_head_list->renderListOptions();

// Render list options (header, left)
$deposit_account_head_list->ListOptions->render("header", "left");
?>
<?php if ($deposit_account_head_list->id->Visible) { // id ?>
	<?php if ($deposit_account_head_list->SortUrl($deposit_account_head_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $deposit_account_head_list->id->headerCellClass() ?>"><div id="elh_deposit_account_head_id" class="deposit_account_head_id"><div class="ew-table-header-caption"><?php echo $deposit_account_head_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $deposit_account_head_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $deposit_account_head_list->SortUrl($deposit_account_head_list->id) ?>', 1);"><div id="elh_deposit_account_head_id" class="deposit_account_head_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $deposit_account_head_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($deposit_account_head_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($deposit_account_head_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($deposit_account_head_list->Name->Visible) { // Name ?>
	<?php if ($deposit_account_head_list->SortUrl($deposit_account_head_list->Name) == "") { ?>
		<th data-name="Name" class="<?php echo $deposit_account_head_list->Name->headerCellClass() ?>"><div id="elh_deposit_account_head_Name" class="deposit_account_head_Name"><div class="ew-table-header-caption"><?php echo $deposit_account_head_list->Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Name" class="<?php echo $deposit_account_head_list->Name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $deposit_account_head_list->SortUrl($deposit_account_head_list->Name) ?>', 1);"><div id="elh_deposit_account_head_Name" class="deposit_account_head_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $deposit_account_head_list->Name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($deposit_account_head_list->Name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($deposit_account_head_list->Name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$deposit_account_head_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($deposit_account_head_list->ExportAll && $deposit_account_head_list->isExport()) {
	$deposit_account_head_list->StopRecord = $deposit_account_head_list->TotalRecords;
} else {

	// Set the last record to display
	if ($deposit_account_head_list->TotalRecords > $deposit_account_head_list->StartRecord + $deposit_account_head_list->DisplayRecords - 1)
		$deposit_account_head_list->StopRecord = $deposit_account_head_list->StartRecord + $deposit_account_head_list->DisplayRecords - 1;
	else
		$deposit_account_head_list->StopRecord = $deposit_account_head_list->TotalRecords;
}
$deposit_account_head_list->RecordCount = $deposit_account_head_list->StartRecord - 1;
if ($deposit_account_head_list->Recordset && !$deposit_account_head_list->Recordset->EOF) {
	$deposit_account_head_list->Recordset->moveFirst();
	$selectLimit = $deposit_account_head_list->UseSelectLimit;
	if (!$selectLimit && $deposit_account_head_list->StartRecord > 1)
		$deposit_account_head_list->Recordset->move($deposit_account_head_list->StartRecord - 1);
} elseif (!$deposit_account_head->AllowAddDeleteRow && $deposit_account_head_list->StopRecord == 0) {
	$deposit_account_head_list->StopRecord = $deposit_account_head->GridAddRowCount;
}

// Initialize aggregate
$deposit_account_head->RowType = ROWTYPE_AGGREGATEINIT;
$deposit_account_head->resetAttributes();
$deposit_account_head_list->renderRow();
while ($deposit_account_head_list->RecordCount < $deposit_account_head_list->StopRecord) {
	$deposit_account_head_list->RecordCount++;
	if ($deposit_account_head_list->RecordCount >= $deposit_account_head_list->StartRecord) {
		$deposit_account_head_list->RowCount++;

		// Set up key count
		$deposit_account_head_list->KeyCount = $deposit_account_head_list->RowIndex;

		// Init row class and style
		$deposit_account_head->resetAttributes();
		$deposit_account_head->CssClass = "";
		if ($deposit_account_head_list->isGridAdd()) {
		} else {
			$deposit_account_head_list->loadRowValues($deposit_account_head_list->Recordset); // Load row values
		}
		$deposit_account_head->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$deposit_account_head->RowAttrs->merge(["data-rowindex" => $deposit_account_head_list->RowCount, "id" => "r" . $deposit_account_head_list->RowCount . "_deposit_account_head", "data-rowtype" => $deposit_account_head->RowType]);

		// Render row
		$deposit_account_head_list->renderRow();

		// Render list options
		$deposit_account_head_list->renderListOptions();
?>
	<tr <?php echo $deposit_account_head->rowAttributes() ?>>
<?php

// Render list options (body, left)
$deposit_account_head_list->ListOptions->render("body", "left", $deposit_account_head_list->RowCount);
?>
	<?php if ($deposit_account_head_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $deposit_account_head_list->id->cellAttributes() ?>>
<span id="el<?php echo $deposit_account_head_list->RowCount ?>_deposit_account_head_id">
<span<?php echo $deposit_account_head_list->id->viewAttributes() ?>><?php echo $deposit_account_head_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($deposit_account_head_list->Name->Visible) { // Name ?>
		<td data-name="Name" <?php echo $deposit_account_head_list->Name->cellAttributes() ?>>
<span id="el<?php echo $deposit_account_head_list->RowCount ?>_deposit_account_head_Name">
<span<?php echo $deposit_account_head_list->Name->viewAttributes() ?>><?php echo $deposit_account_head_list->Name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$deposit_account_head_list->ListOptions->render("body", "right", $deposit_account_head_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$deposit_account_head_list->isGridAdd())
		$deposit_account_head_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$deposit_account_head->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($deposit_account_head_list->Recordset)
	$deposit_account_head_list->Recordset->Close();
?>
<?php if (!$deposit_account_head_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$deposit_account_head_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $deposit_account_head_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $deposit_account_head_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($deposit_account_head_list->TotalRecords == 0 && !$deposit_account_head->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $deposit_account_head_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$deposit_account_head_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$deposit_account_head_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$deposit_account_head->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_deposit_account_head",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$deposit_account_head_list->terminate();
?>
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
$mas_pharmacy_list = new mas_pharmacy_list();

// Run the page
$mas_pharmacy_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_pharmacy_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$mas_pharmacy_list->isExport()) { ?>
<script>
var fmas_pharmacylist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fmas_pharmacylist = currentForm = new ew.Form("fmas_pharmacylist", "list");
	fmas_pharmacylist.formKeyCountName = '<?php echo $mas_pharmacy_list->FormKeyCountName ?>';
	loadjs.done("fmas_pharmacylist");
});
var fmas_pharmacylistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fmas_pharmacylistsrch = currentSearchForm = new ew.Form("fmas_pharmacylistsrch");

	// Dynamic selection lists
	// Filters

	fmas_pharmacylistsrch.filterList = <?php echo $mas_pharmacy_list->getFilterList() ?>;
	loadjs.done("fmas_pharmacylistsrch");
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
<?php if (!$mas_pharmacy_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($mas_pharmacy_list->TotalRecords > 0 && $mas_pharmacy_list->ExportOptions->visible()) { ?>
<?php $mas_pharmacy_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($mas_pharmacy_list->ImportOptions->visible()) { ?>
<?php $mas_pharmacy_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($mas_pharmacy_list->SearchOptions->visible()) { ?>
<?php $mas_pharmacy_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($mas_pharmacy_list->FilterOptions->visible()) { ?>
<?php $mas_pharmacy_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$mas_pharmacy_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$mas_pharmacy_list->isExport() && !$mas_pharmacy->CurrentAction) { ?>
<form name="fmas_pharmacylistsrch" id="fmas_pharmacylistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fmas_pharmacylistsrch-search-panel" class="<?php echo $mas_pharmacy_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="mas_pharmacy">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $mas_pharmacy_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($mas_pharmacy_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($mas_pharmacy_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $mas_pharmacy_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($mas_pharmacy_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($mas_pharmacy_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($mas_pharmacy_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($mas_pharmacy_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $mas_pharmacy_list->showPageHeader(); ?>
<?php
$mas_pharmacy_list->showMessage();
?>
<?php if ($mas_pharmacy_list->TotalRecords > 0 || $mas_pharmacy->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($mas_pharmacy_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> mas_pharmacy">
<?php if (!$mas_pharmacy_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$mas_pharmacy_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $mas_pharmacy_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $mas_pharmacy_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fmas_pharmacylist" id="fmas_pharmacylist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_pharmacy">
<div id="gmp_mas_pharmacy" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($mas_pharmacy_list->TotalRecords > 0 || $mas_pharmacy_list->isGridEdit()) { ?>
<table id="tbl_mas_pharmacylist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$mas_pharmacy->RowType = ROWTYPE_HEADER;

// Render list options
$mas_pharmacy_list->renderListOptions();

// Render list options (header, left)
$mas_pharmacy_list->ListOptions->render("header", "left");
?>
<?php if ($mas_pharmacy_list->id->Visible) { // id ?>
	<?php if ($mas_pharmacy_list->SortUrl($mas_pharmacy_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $mas_pharmacy_list->id->headerCellClass() ?>"><div id="elh_mas_pharmacy_id" class="mas_pharmacy_id"><div class="ew-table-header-caption"><?php echo $mas_pharmacy_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $mas_pharmacy_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mas_pharmacy_list->SortUrl($mas_pharmacy_list->id) ?>', 1);"><div id="elh_mas_pharmacy_id" class="mas_pharmacy_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_pharmacy_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_pharmacy_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mas_pharmacy_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_pharmacy_list->name->Visible) { // name ?>
	<?php if ($mas_pharmacy_list->SortUrl($mas_pharmacy_list->name) == "") { ?>
		<th data-name="name" class="<?php echo $mas_pharmacy_list->name->headerCellClass() ?>"><div id="elh_mas_pharmacy_name" class="mas_pharmacy_name"><div class="ew-table-header-caption"><?php echo $mas_pharmacy_list->name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="name" class="<?php echo $mas_pharmacy_list->name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mas_pharmacy_list->SortUrl($mas_pharmacy_list->name) ?>', 1);"><div id="elh_mas_pharmacy_name" class="mas_pharmacy_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_pharmacy_list->name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_pharmacy_list->name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mas_pharmacy_list->name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_pharmacy_list->amount->Visible) { // amount ?>
	<?php if ($mas_pharmacy_list->SortUrl($mas_pharmacy_list->amount) == "") { ?>
		<th data-name="amount" class="<?php echo $mas_pharmacy_list->amount->headerCellClass() ?>"><div id="elh_mas_pharmacy_amount" class="mas_pharmacy_amount"><div class="ew-table-header-caption"><?php echo $mas_pharmacy_list->amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="amount" class="<?php echo $mas_pharmacy_list->amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mas_pharmacy_list->SortUrl($mas_pharmacy_list->amount) ?>', 1);"><div id="elh_mas_pharmacy_amount" class="mas_pharmacy_amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_pharmacy_list->amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_pharmacy_list->amount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mas_pharmacy_list->amount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_pharmacy_list->charged_date->Visible) { // charged_date ?>
	<?php if ($mas_pharmacy_list->SortUrl($mas_pharmacy_list->charged_date) == "") { ?>
		<th data-name="charged_date" class="<?php echo $mas_pharmacy_list->charged_date->headerCellClass() ?>"><div id="elh_mas_pharmacy_charged_date" class="mas_pharmacy_charged_date"><div class="ew-table-header-caption"><?php echo $mas_pharmacy_list->charged_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="charged_date" class="<?php echo $mas_pharmacy_list->charged_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mas_pharmacy_list->SortUrl($mas_pharmacy_list->charged_date) ?>', 1);"><div id="elh_mas_pharmacy_charged_date" class="mas_pharmacy_charged_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_pharmacy_list->charged_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_pharmacy_list->charged_date->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mas_pharmacy_list->charged_date->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_pharmacy_list->status->Visible) { // status ?>
	<?php if ($mas_pharmacy_list->SortUrl($mas_pharmacy_list->status) == "") { ?>
		<th data-name="status" class="<?php echo $mas_pharmacy_list->status->headerCellClass() ?>"><div id="elh_mas_pharmacy_status" class="mas_pharmacy_status"><div class="ew-table-header-caption"><?php echo $mas_pharmacy_list->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $mas_pharmacy_list->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mas_pharmacy_list->SortUrl($mas_pharmacy_list->status) ?>', 1);"><div id="elh_mas_pharmacy_status" class="mas_pharmacy_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_pharmacy_list->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_pharmacy_list->status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mas_pharmacy_list->status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$mas_pharmacy_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($mas_pharmacy_list->ExportAll && $mas_pharmacy_list->isExport()) {
	$mas_pharmacy_list->StopRecord = $mas_pharmacy_list->TotalRecords;
} else {

	// Set the last record to display
	if ($mas_pharmacy_list->TotalRecords > $mas_pharmacy_list->StartRecord + $mas_pharmacy_list->DisplayRecords - 1)
		$mas_pharmacy_list->StopRecord = $mas_pharmacy_list->StartRecord + $mas_pharmacy_list->DisplayRecords - 1;
	else
		$mas_pharmacy_list->StopRecord = $mas_pharmacy_list->TotalRecords;
}
$mas_pharmacy_list->RecordCount = $mas_pharmacy_list->StartRecord - 1;
if ($mas_pharmacy_list->Recordset && !$mas_pharmacy_list->Recordset->EOF) {
	$mas_pharmacy_list->Recordset->moveFirst();
	$selectLimit = $mas_pharmacy_list->UseSelectLimit;
	if (!$selectLimit && $mas_pharmacy_list->StartRecord > 1)
		$mas_pharmacy_list->Recordset->move($mas_pharmacy_list->StartRecord - 1);
} elseif (!$mas_pharmacy->AllowAddDeleteRow && $mas_pharmacy_list->StopRecord == 0) {
	$mas_pharmacy_list->StopRecord = $mas_pharmacy->GridAddRowCount;
}

// Initialize aggregate
$mas_pharmacy->RowType = ROWTYPE_AGGREGATEINIT;
$mas_pharmacy->resetAttributes();
$mas_pharmacy_list->renderRow();
while ($mas_pharmacy_list->RecordCount < $mas_pharmacy_list->StopRecord) {
	$mas_pharmacy_list->RecordCount++;
	if ($mas_pharmacy_list->RecordCount >= $mas_pharmacy_list->StartRecord) {
		$mas_pharmacy_list->RowCount++;

		// Set up key count
		$mas_pharmacy_list->KeyCount = $mas_pharmacy_list->RowIndex;

		// Init row class and style
		$mas_pharmacy->resetAttributes();
		$mas_pharmacy->CssClass = "";
		if ($mas_pharmacy_list->isGridAdd()) {
		} else {
			$mas_pharmacy_list->loadRowValues($mas_pharmacy_list->Recordset); // Load row values
		}
		$mas_pharmacy->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$mas_pharmacy->RowAttrs->merge(["data-rowindex" => $mas_pharmacy_list->RowCount, "id" => "r" . $mas_pharmacy_list->RowCount . "_mas_pharmacy", "data-rowtype" => $mas_pharmacy->RowType]);

		// Render row
		$mas_pharmacy_list->renderRow();

		// Render list options
		$mas_pharmacy_list->renderListOptions();
?>
	<tr <?php echo $mas_pharmacy->rowAttributes() ?>>
<?php

// Render list options (body, left)
$mas_pharmacy_list->ListOptions->render("body", "left", $mas_pharmacy_list->RowCount);
?>
	<?php if ($mas_pharmacy_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $mas_pharmacy_list->id->cellAttributes() ?>>
<span id="el<?php echo $mas_pharmacy_list->RowCount ?>_mas_pharmacy_id">
<span<?php echo $mas_pharmacy_list->id->viewAttributes() ?>><?php echo $mas_pharmacy_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($mas_pharmacy_list->name->Visible) { // name ?>
		<td data-name="name" <?php echo $mas_pharmacy_list->name->cellAttributes() ?>>
<span id="el<?php echo $mas_pharmacy_list->RowCount ?>_mas_pharmacy_name">
<span<?php echo $mas_pharmacy_list->name->viewAttributes() ?>><?php echo $mas_pharmacy_list->name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($mas_pharmacy_list->amount->Visible) { // amount ?>
		<td data-name="amount" <?php echo $mas_pharmacy_list->amount->cellAttributes() ?>>
<span id="el<?php echo $mas_pharmacy_list->RowCount ?>_mas_pharmacy_amount">
<span<?php echo $mas_pharmacy_list->amount->viewAttributes() ?>><?php echo $mas_pharmacy_list->amount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($mas_pharmacy_list->charged_date->Visible) { // charged_date ?>
		<td data-name="charged_date" <?php echo $mas_pharmacy_list->charged_date->cellAttributes() ?>>
<span id="el<?php echo $mas_pharmacy_list->RowCount ?>_mas_pharmacy_charged_date">
<span<?php echo $mas_pharmacy_list->charged_date->viewAttributes() ?>><?php echo $mas_pharmacy_list->charged_date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($mas_pharmacy_list->status->Visible) { // status ?>
		<td data-name="status" <?php echo $mas_pharmacy_list->status->cellAttributes() ?>>
<span id="el<?php echo $mas_pharmacy_list->RowCount ?>_mas_pharmacy_status">
<span<?php echo $mas_pharmacy_list->status->viewAttributes() ?>><?php echo $mas_pharmacy_list->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$mas_pharmacy_list->ListOptions->render("body", "right", $mas_pharmacy_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$mas_pharmacy_list->isGridAdd())
		$mas_pharmacy_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$mas_pharmacy->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($mas_pharmacy_list->Recordset)
	$mas_pharmacy_list->Recordset->Close();
?>
<?php if (!$mas_pharmacy_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$mas_pharmacy_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $mas_pharmacy_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $mas_pharmacy_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($mas_pharmacy_list->TotalRecords == 0 && !$mas_pharmacy->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $mas_pharmacy_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$mas_pharmacy_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$mas_pharmacy_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$mas_pharmacy->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_mas_pharmacy",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$mas_pharmacy_list->terminate();
?>
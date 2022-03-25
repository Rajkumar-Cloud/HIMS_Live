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
$mas_billing_department_list = new mas_billing_department_list();

// Run the page
$mas_billing_department_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_billing_department_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$mas_billing_department_list->isExport()) { ?>
<script>
var fmas_billing_departmentlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fmas_billing_departmentlist = currentForm = new ew.Form("fmas_billing_departmentlist", "list");
	fmas_billing_departmentlist.formKeyCountName = '<?php echo $mas_billing_department_list->FormKeyCountName ?>';
	loadjs.done("fmas_billing_departmentlist");
});
var fmas_billing_departmentlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fmas_billing_departmentlistsrch = currentSearchForm = new ew.Form("fmas_billing_departmentlistsrch");

	// Dynamic selection lists
	// Filters

	fmas_billing_departmentlistsrch.filterList = <?php echo $mas_billing_department_list->getFilterList() ?>;
	loadjs.done("fmas_billing_departmentlistsrch");
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
<?php if (!$mas_billing_department_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($mas_billing_department_list->TotalRecords > 0 && $mas_billing_department_list->ExportOptions->visible()) { ?>
<?php $mas_billing_department_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($mas_billing_department_list->ImportOptions->visible()) { ?>
<?php $mas_billing_department_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($mas_billing_department_list->SearchOptions->visible()) { ?>
<?php $mas_billing_department_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($mas_billing_department_list->FilterOptions->visible()) { ?>
<?php $mas_billing_department_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$mas_billing_department_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$mas_billing_department_list->isExport() && !$mas_billing_department->CurrentAction) { ?>
<form name="fmas_billing_departmentlistsrch" id="fmas_billing_departmentlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fmas_billing_departmentlistsrch-search-panel" class="<?php echo $mas_billing_department_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="mas_billing_department">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $mas_billing_department_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($mas_billing_department_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($mas_billing_department_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $mas_billing_department_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($mas_billing_department_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($mas_billing_department_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($mas_billing_department_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($mas_billing_department_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $mas_billing_department_list->showPageHeader(); ?>
<?php
$mas_billing_department_list->showMessage();
?>
<?php if ($mas_billing_department_list->TotalRecords > 0 || $mas_billing_department->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($mas_billing_department_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> mas_billing_department">
<?php if (!$mas_billing_department_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$mas_billing_department_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $mas_billing_department_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $mas_billing_department_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fmas_billing_departmentlist" id="fmas_billing_departmentlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_billing_department">
<div id="gmp_mas_billing_department" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($mas_billing_department_list->TotalRecords > 0 || $mas_billing_department_list->isGridEdit()) { ?>
<table id="tbl_mas_billing_departmentlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$mas_billing_department->RowType = ROWTYPE_HEADER;

// Render list options
$mas_billing_department_list->renderListOptions();

// Render list options (header, left)
$mas_billing_department_list->ListOptions->render("header", "left");
?>
<?php if ($mas_billing_department_list->id->Visible) { // id ?>
	<?php if ($mas_billing_department_list->SortUrl($mas_billing_department_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $mas_billing_department_list->id->headerCellClass() ?>"><div id="elh_mas_billing_department_id" class="mas_billing_department_id"><div class="ew-table-header-caption"><?php echo $mas_billing_department_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $mas_billing_department_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mas_billing_department_list->SortUrl($mas_billing_department_list->id) ?>', 1);"><div id="elh_mas_billing_department_id" class="mas_billing_department_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_billing_department_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_billing_department_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mas_billing_department_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_billing_department_list->department->Visible) { // department ?>
	<?php if ($mas_billing_department_list->SortUrl($mas_billing_department_list->department) == "") { ?>
		<th data-name="department" class="<?php echo $mas_billing_department_list->department->headerCellClass() ?>"><div id="elh_mas_billing_department_department" class="mas_billing_department_department"><div class="ew-table-header-caption"><?php echo $mas_billing_department_list->department->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="department" class="<?php echo $mas_billing_department_list->department->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mas_billing_department_list->SortUrl($mas_billing_department_list->department) ?>', 1);"><div id="elh_mas_billing_department_department" class="mas_billing_department_department">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_billing_department_list->department->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_billing_department_list->department->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mas_billing_department_list->department->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$mas_billing_department_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($mas_billing_department_list->ExportAll && $mas_billing_department_list->isExport()) {
	$mas_billing_department_list->StopRecord = $mas_billing_department_list->TotalRecords;
} else {

	// Set the last record to display
	if ($mas_billing_department_list->TotalRecords > $mas_billing_department_list->StartRecord + $mas_billing_department_list->DisplayRecords - 1)
		$mas_billing_department_list->StopRecord = $mas_billing_department_list->StartRecord + $mas_billing_department_list->DisplayRecords - 1;
	else
		$mas_billing_department_list->StopRecord = $mas_billing_department_list->TotalRecords;
}
$mas_billing_department_list->RecordCount = $mas_billing_department_list->StartRecord - 1;
if ($mas_billing_department_list->Recordset && !$mas_billing_department_list->Recordset->EOF) {
	$mas_billing_department_list->Recordset->moveFirst();
	$selectLimit = $mas_billing_department_list->UseSelectLimit;
	if (!$selectLimit && $mas_billing_department_list->StartRecord > 1)
		$mas_billing_department_list->Recordset->move($mas_billing_department_list->StartRecord - 1);
} elseif (!$mas_billing_department->AllowAddDeleteRow && $mas_billing_department_list->StopRecord == 0) {
	$mas_billing_department_list->StopRecord = $mas_billing_department->GridAddRowCount;
}

// Initialize aggregate
$mas_billing_department->RowType = ROWTYPE_AGGREGATEINIT;
$mas_billing_department->resetAttributes();
$mas_billing_department_list->renderRow();
while ($mas_billing_department_list->RecordCount < $mas_billing_department_list->StopRecord) {
	$mas_billing_department_list->RecordCount++;
	if ($mas_billing_department_list->RecordCount >= $mas_billing_department_list->StartRecord) {
		$mas_billing_department_list->RowCount++;

		// Set up key count
		$mas_billing_department_list->KeyCount = $mas_billing_department_list->RowIndex;

		// Init row class and style
		$mas_billing_department->resetAttributes();
		$mas_billing_department->CssClass = "";
		if ($mas_billing_department_list->isGridAdd()) {
		} else {
			$mas_billing_department_list->loadRowValues($mas_billing_department_list->Recordset); // Load row values
		}
		$mas_billing_department->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$mas_billing_department->RowAttrs->merge(["data-rowindex" => $mas_billing_department_list->RowCount, "id" => "r" . $mas_billing_department_list->RowCount . "_mas_billing_department", "data-rowtype" => $mas_billing_department->RowType]);

		// Render row
		$mas_billing_department_list->renderRow();

		// Render list options
		$mas_billing_department_list->renderListOptions();
?>
	<tr <?php echo $mas_billing_department->rowAttributes() ?>>
<?php

// Render list options (body, left)
$mas_billing_department_list->ListOptions->render("body", "left", $mas_billing_department_list->RowCount);
?>
	<?php if ($mas_billing_department_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $mas_billing_department_list->id->cellAttributes() ?>>
<span id="el<?php echo $mas_billing_department_list->RowCount ?>_mas_billing_department_id">
<span<?php echo $mas_billing_department_list->id->viewAttributes() ?>><?php echo $mas_billing_department_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($mas_billing_department_list->department->Visible) { // department ?>
		<td data-name="department" <?php echo $mas_billing_department_list->department->cellAttributes() ?>>
<span id="el<?php echo $mas_billing_department_list->RowCount ?>_mas_billing_department_department">
<span<?php echo $mas_billing_department_list->department->viewAttributes() ?>><?php echo $mas_billing_department_list->department->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$mas_billing_department_list->ListOptions->render("body", "right", $mas_billing_department_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$mas_billing_department_list->isGridAdd())
		$mas_billing_department_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$mas_billing_department->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($mas_billing_department_list->Recordset)
	$mas_billing_department_list->Recordset->Close();
?>
<?php if (!$mas_billing_department_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$mas_billing_department_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $mas_billing_department_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $mas_billing_department_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($mas_billing_department_list->TotalRecords == 0 && !$mas_billing_department->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $mas_billing_department_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$mas_billing_department_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$mas_billing_department_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$mas_billing_department->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_mas_billing_department",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$mas_billing_department_list->terminate();
?>
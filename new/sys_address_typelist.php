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
$sys_address_type_list = new sys_address_type_list();

// Run the page
$sys_address_type_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sys_address_type_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$sys_address_type_list->isExport()) { ?>
<script>
var fsys_address_typelist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fsys_address_typelist = currentForm = new ew.Form("fsys_address_typelist", "list");
	fsys_address_typelist.formKeyCountName = '<?php echo $sys_address_type_list->FormKeyCountName ?>';
	loadjs.done("fsys_address_typelist");
});
var fsys_address_typelistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fsys_address_typelistsrch = currentSearchForm = new ew.Form("fsys_address_typelistsrch");

	// Dynamic selection lists
	// Filters

	fsys_address_typelistsrch.filterList = <?php echo $sys_address_type_list->getFilterList() ?>;
	loadjs.done("fsys_address_typelistsrch");
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
<?php if (!$sys_address_type_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($sys_address_type_list->TotalRecords > 0 && $sys_address_type_list->ExportOptions->visible()) { ?>
<?php $sys_address_type_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($sys_address_type_list->ImportOptions->visible()) { ?>
<?php $sys_address_type_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($sys_address_type_list->SearchOptions->visible()) { ?>
<?php $sys_address_type_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($sys_address_type_list->FilterOptions->visible()) { ?>
<?php $sys_address_type_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$sys_address_type_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$sys_address_type_list->isExport() && !$sys_address_type->CurrentAction) { ?>
<form name="fsys_address_typelistsrch" id="fsys_address_typelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fsys_address_typelistsrch-search-panel" class="<?php echo $sys_address_type_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="sys_address_type">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $sys_address_type_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($sys_address_type_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($sys_address_type_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $sys_address_type_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($sys_address_type_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($sys_address_type_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($sys_address_type_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($sys_address_type_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $sys_address_type_list->showPageHeader(); ?>
<?php
$sys_address_type_list->showMessage();
?>
<?php if ($sys_address_type_list->TotalRecords > 0 || $sys_address_type->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($sys_address_type_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> sys_address_type">
<?php if (!$sys_address_type_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$sys_address_type_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $sys_address_type_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $sys_address_type_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fsys_address_typelist" id="fsys_address_typelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sys_address_type">
<div id="gmp_sys_address_type" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($sys_address_type_list->TotalRecords > 0 || $sys_address_type_list->isGridEdit()) { ?>
<table id="tbl_sys_address_typelist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$sys_address_type->RowType = ROWTYPE_HEADER;

// Render list options
$sys_address_type_list->renderListOptions();

// Render list options (header, left)
$sys_address_type_list->ListOptions->render("header", "left");
?>
<?php if ($sys_address_type_list->id->Visible) { // id ?>
	<?php if ($sys_address_type_list->SortUrl($sys_address_type_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $sys_address_type_list->id->headerCellClass() ?>"><div id="elh_sys_address_type_id" class="sys_address_type_id"><div class="ew-table-header-caption"><?php echo $sys_address_type_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $sys_address_type_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $sys_address_type_list->SortUrl($sys_address_type_list->id) ?>', 1);"><div id="elh_sys_address_type_id" class="sys_address_type_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sys_address_type_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($sys_address_type_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($sys_address_type_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sys_address_type_list->Name->Visible) { // Name ?>
	<?php if ($sys_address_type_list->SortUrl($sys_address_type_list->Name) == "") { ?>
		<th data-name="Name" class="<?php echo $sys_address_type_list->Name->headerCellClass() ?>"><div id="elh_sys_address_type_Name" class="sys_address_type_Name"><div class="ew-table-header-caption"><?php echo $sys_address_type_list->Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Name" class="<?php echo $sys_address_type_list->Name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $sys_address_type_list->SortUrl($sys_address_type_list->Name) ?>', 1);"><div id="elh_sys_address_type_Name" class="sys_address_type_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sys_address_type_list->Name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($sys_address_type_list->Name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($sys_address_type_list->Name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$sys_address_type_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($sys_address_type_list->ExportAll && $sys_address_type_list->isExport()) {
	$sys_address_type_list->StopRecord = $sys_address_type_list->TotalRecords;
} else {

	// Set the last record to display
	if ($sys_address_type_list->TotalRecords > $sys_address_type_list->StartRecord + $sys_address_type_list->DisplayRecords - 1)
		$sys_address_type_list->StopRecord = $sys_address_type_list->StartRecord + $sys_address_type_list->DisplayRecords - 1;
	else
		$sys_address_type_list->StopRecord = $sys_address_type_list->TotalRecords;
}
$sys_address_type_list->RecordCount = $sys_address_type_list->StartRecord - 1;
if ($sys_address_type_list->Recordset && !$sys_address_type_list->Recordset->EOF) {
	$sys_address_type_list->Recordset->moveFirst();
	$selectLimit = $sys_address_type_list->UseSelectLimit;
	if (!$selectLimit && $sys_address_type_list->StartRecord > 1)
		$sys_address_type_list->Recordset->move($sys_address_type_list->StartRecord - 1);
} elseif (!$sys_address_type->AllowAddDeleteRow && $sys_address_type_list->StopRecord == 0) {
	$sys_address_type_list->StopRecord = $sys_address_type->GridAddRowCount;
}

// Initialize aggregate
$sys_address_type->RowType = ROWTYPE_AGGREGATEINIT;
$sys_address_type->resetAttributes();
$sys_address_type_list->renderRow();
while ($sys_address_type_list->RecordCount < $sys_address_type_list->StopRecord) {
	$sys_address_type_list->RecordCount++;
	if ($sys_address_type_list->RecordCount >= $sys_address_type_list->StartRecord) {
		$sys_address_type_list->RowCount++;

		// Set up key count
		$sys_address_type_list->KeyCount = $sys_address_type_list->RowIndex;

		// Init row class and style
		$sys_address_type->resetAttributes();
		$sys_address_type->CssClass = "";
		if ($sys_address_type_list->isGridAdd()) {
		} else {
			$sys_address_type_list->loadRowValues($sys_address_type_list->Recordset); // Load row values
		}
		$sys_address_type->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$sys_address_type->RowAttrs->merge(["data-rowindex" => $sys_address_type_list->RowCount, "id" => "r" . $sys_address_type_list->RowCount . "_sys_address_type", "data-rowtype" => $sys_address_type->RowType]);

		// Render row
		$sys_address_type_list->renderRow();

		// Render list options
		$sys_address_type_list->renderListOptions();
?>
	<tr <?php echo $sys_address_type->rowAttributes() ?>>
<?php

// Render list options (body, left)
$sys_address_type_list->ListOptions->render("body", "left", $sys_address_type_list->RowCount);
?>
	<?php if ($sys_address_type_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $sys_address_type_list->id->cellAttributes() ?>>
<span id="el<?php echo $sys_address_type_list->RowCount ?>_sys_address_type_id">
<span<?php echo $sys_address_type_list->id->viewAttributes() ?>><?php echo $sys_address_type_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sys_address_type_list->Name->Visible) { // Name ?>
		<td data-name="Name" <?php echo $sys_address_type_list->Name->cellAttributes() ?>>
<span id="el<?php echo $sys_address_type_list->RowCount ?>_sys_address_type_Name">
<span<?php echo $sys_address_type_list->Name->viewAttributes() ?>><?php echo $sys_address_type_list->Name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$sys_address_type_list->ListOptions->render("body", "right", $sys_address_type_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$sys_address_type_list->isGridAdd())
		$sys_address_type_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$sys_address_type->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($sys_address_type_list->Recordset)
	$sys_address_type_list->Recordset->Close();
?>
<?php if (!$sys_address_type_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$sys_address_type_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $sys_address_type_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $sys_address_type_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($sys_address_type_list->TotalRecords == 0 && !$sys_address_type->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $sys_address_type_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$sys_address_type_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$sys_address_type_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$sys_address_type->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_sys_address_type",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$sys_address_type_list->terminate();
?>
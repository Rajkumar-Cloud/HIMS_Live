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
$mas_reference_type_list = new mas_reference_type_list();

// Run the page
$mas_reference_type_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_reference_type_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$mas_reference_type_list->isExport()) { ?>
<script>
var fmas_reference_typelist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fmas_reference_typelist = currentForm = new ew.Form("fmas_reference_typelist", "list");
	fmas_reference_typelist.formKeyCountName = '<?php echo $mas_reference_type_list->FormKeyCountName ?>';
	loadjs.done("fmas_reference_typelist");
});
var fmas_reference_typelistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fmas_reference_typelistsrch = currentSearchForm = new ew.Form("fmas_reference_typelistsrch");

	// Dynamic selection lists
	// Filters

	fmas_reference_typelistsrch.filterList = <?php echo $mas_reference_type_list->getFilterList() ?>;
	loadjs.done("fmas_reference_typelistsrch");
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
<?php if (!$mas_reference_type_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($mas_reference_type_list->TotalRecords > 0 && $mas_reference_type_list->ExportOptions->visible()) { ?>
<?php $mas_reference_type_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($mas_reference_type_list->ImportOptions->visible()) { ?>
<?php $mas_reference_type_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($mas_reference_type_list->SearchOptions->visible()) { ?>
<?php $mas_reference_type_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($mas_reference_type_list->FilterOptions->visible()) { ?>
<?php $mas_reference_type_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$mas_reference_type_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$mas_reference_type_list->isExport() && !$mas_reference_type->CurrentAction) { ?>
<form name="fmas_reference_typelistsrch" id="fmas_reference_typelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fmas_reference_typelistsrch-search-panel" class="<?php echo $mas_reference_type_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="mas_reference_type">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $mas_reference_type_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($mas_reference_type_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($mas_reference_type_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $mas_reference_type_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($mas_reference_type_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($mas_reference_type_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($mas_reference_type_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($mas_reference_type_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $mas_reference_type_list->showPageHeader(); ?>
<?php
$mas_reference_type_list->showMessage();
?>
<?php if ($mas_reference_type_list->TotalRecords > 0 || $mas_reference_type->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($mas_reference_type_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> mas_reference_type">
<?php if (!$mas_reference_type_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$mas_reference_type_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $mas_reference_type_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $mas_reference_type_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fmas_reference_typelist" id="fmas_reference_typelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_reference_type">
<div id="gmp_mas_reference_type" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($mas_reference_type_list->TotalRecords > 0 || $mas_reference_type_list->isGridEdit()) { ?>
<table id="tbl_mas_reference_typelist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$mas_reference_type->RowType = ROWTYPE_HEADER;

// Render list options
$mas_reference_type_list->renderListOptions();

// Render list options (header, left)
$mas_reference_type_list->ListOptions->render("header", "left");
?>
<?php if ($mas_reference_type_list->id->Visible) { // id ?>
	<?php if ($mas_reference_type_list->SortUrl($mas_reference_type_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $mas_reference_type_list->id->headerCellClass() ?>"><div id="elh_mas_reference_type_id" class="mas_reference_type_id"><div class="ew-table-header-caption"><?php echo $mas_reference_type_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $mas_reference_type_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mas_reference_type_list->SortUrl($mas_reference_type_list->id) ?>', 1);"><div id="elh_mas_reference_type_id" class="mas_reference_type_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_reference_type_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_reference_type_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mas_reference_type_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_reference_type_list->reference->Visible) { // reference ?>
	<?php if ($mas_reference_type_list->SortUrl($mas_reference_type_list->reference) == "") { ?>
		<th data-name="reference" class="<?php echo $mas_reference_type_list->reference->headerCellClass() ?>"><div id="elh_mas_reference_type_reference" class="mas_reference_type_reference"><div class="ew-table-header-caption"><?php echo $mas_reference_type_list->reference->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="reference" class="<?php echo $mas_reference_type_list->reference->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mas_reference_type_list->SortUrl($mas_reference_type_list->reference) ?>', 1);"><div id="elh_mas_reference_type_reference" class="mas_reference_type_reference">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_reference_type_list->reference->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_reference_type_list->reference->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mas_reference_type_list->reference->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_reference_type_list->ReferMobileNo->Visible) { // ReferMobileNo ?>
	<?php if ($mas_reference_type_list->SortUrl($mas_reference_type_list->ReferMobileNo) == "") { ?>
		<th data-name="ReferMobileNo" class="<?php echo $mas_reference_type_list->ReferMobileNo->headerCellClass() ?>"><div id="elh_mas_reference_type_ReferMobileNo" class="mas_reference_type_ReferMobileNo"><div class="ew-table-header-caption"><?php echo $mas_reference_type_list->ReferMobileNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReferMobileNo" class="<?php echo $mas_reference_type_list->ReferMobileNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mas_reference_type_list->SortUrl($mas_reference_type_list->ReferMobileNo) ?>', 1);"><div id="elh_mas_reference_type_ReferMobileNo" class="mas_reference_type_ReferMobileNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_reference_type_list->ReferMobileNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_reference_type_list->ReferMobileNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mas_reference_type_list->ReferMobileNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_reference_type_list->ReferClinicname->Visible) { // ReferClinicname ?>
	<?php if ($mas_reference_type_list->SortUrl($mas_reference_type_list->ReferClinicname) == "") { ?>
		<th data-name="ReferClinicname" class="<?php echo $mas_reference_type_list->ReferClinicname->headerCellClass() ?>"><div id="elh_mas_reference_type_ReferClinicname" class="mas_reference_type_ReferClinicname"><div class="ew-table-header-caption"><?php echo $mas_reference_type_list->ReferClinicname->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReferClinicname" class="<?php echo $mas_reference_type_list->ReferClinicname->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mas_reference_type_list->SortUrl($mas_reference_type_list->ReferClinicname) ?>', 1);"><div id="elh_mas_reference_type_ReferClinicname" class="mas_reference_type_ReferClinicname">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_reference_type_list->ReferClinicname->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_reference_type_list->ReferClinicname->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mas_reference_type_list->ReferClinicname->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_reference_type_list->ReferCity->Visible) { // ReferCity ?>
	<?php if ($mas_reference_type_list->SortUrl($mas_reference_type_list->ReferCity) == "") { ?>
		<th data-name="ReferCity" class="<?php echo $mas_reference_type_list->ReferCity->headerCellClass() ?>"><div id="elh_mas_reference_type_ReferCity" class="mas_reference_type_ReferCity"><div class="ew-table-header-caption"><?php echo $mas_reference_type_list->ReferCity->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReferCity" class="<?php echo $mas_reference_type_list->ReferCity->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mas_reference_type_list->SortUrl($mas_reference_type_list->ReferCity) ?>', 1);"><div id="elh_mas_reference_type_ReferCity" class="mas_reference_type_ReferCity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_reference_type_list->ReferCity->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_reference_type_list->ReferCity->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mas_reference_type_list->ReferCity->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$mas_reference_type_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($mas_reference_type_list->ExportAll && $mas_reference_type_list->isExport()) {
	$mas_reference_type_list->StopRecord = $mas_reference_type_list->TotalRecords;
} else {

	// Set the last record to display
	if ($mas_reference_type_list->TotalRecords > $mas_reference_type_list->StartRecord + $mas_reference_type_list->DisplayRecords - 1)
		$mas_reference_type_list->StopRecord = $mas_reference_type_list->StartRecord + $mas_reference_type_list->DisplayRecords - 1;
	else
		$mas_reference_type_list->StopRecord = $mas_reference_type_list->TotalRecords;
}
$mas_reference_type_list->RecordCount = $mas_reference_type_list->StartRecord - 1;
if ($mas_reference_type_list->Recordset && !$mas_reference_type_list->Recordset->EOF) {
	$mas_reference_type_list->Recordset->moveFirst();
	$selectLimit = $mas_reference_type_list->UseSelectLimit;
	if (!$selectLimit && $mas_reference_type_list->StartRecord > 1)
		$mas_reference_type_list->Recordset->move($mas_reference_type_list->StartRecord - 1);
} elseif (!$mas_reference_type->AllowAddDeleteRow && $mas_reference_type_list->StopRecord == 0) {
	$mas_reference_type_list->StopRecord = $mas_reference_type->GridAddRowCount;
}

// Initialize aggregate
$mas_reference_type->RowType = ROWTYPE_AGGREGATEINIT;
$mas_reference_type->resetAttributes();
$mas_reference_type_list->renderRow();
while ($mas_reference_type_list->RecordCount < $mas_reference_type_list->StopRecord) {
	$mas_reference_type_list->RecordCount++;
	if ($mas_reference_type_list->RecordCount >= $mas_reference_type_list->StartRecord) {
		$mas_reference_type_list->RowCount++;

		// Set up key count
		$mas_reference_type_list->KeyCount = $mas_reference_type_list->RowIndex;

		// Init row class and style
		$mas_reference_type->resetAttributes();
		$mas_reference_type->CssClass = "";
		if ($mas_reference_type_list->isGridAdd()) {
		} else {
			$mas_reference_type_list->loadRowValues($mas_reference_type_list->Recordset); // Load row values
		}
		$mas_reference_type->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$mas_reference_type->RowAttrs->merge(["data-rowindex" => $mas_reference_type_list->RowCount, "id" => "r" . $mas_reference_type_list->RowCount . "_mas_reference_type", "data-rowtype" => $mas_reference_type->RowType]);

		// Render row
		$mas_reference_type_list->renderRow();

		// Render list options
		$mas_reference_type_list->renderListOptions();
?>
	<tr <?php echo $mas_reference_type->rowAttributes() ?>>
<?php

// Render list options (body, left)
$mas_reference_type_list->ListOptions->render("body", "left", $mas_reference_type_list->RowCount);
?>
	<?php if ($mas_reference_type_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $mas_reference_type_list->id->cellAttributes() ?>>
<span id="el<?php echo $mas_reference_type_list->RowCount ?>_mas_reference_type_id">
<span<?php echo $mas_reference_type_list->id->viewAttributes() ?>><?php echo $mas_reference_type_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($mas_reference_type_list->reference->Visible) { // reference ?>
		<td data-name="reference" <?php echo $mas_reference_type_list->reference->cellAttributes() ?>>
<span id="el<?php echo $mas_reference_type_list->RowCount ?>_mas_reference_type_reference">
<span<?php echo $mas_reference_type_list->reference->viewAttributes() ?>><?php echo $mas_reference_type_list->reference->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($mas_reference_type_list->ReferMobileNo->Visible) { // ReferMobileNo ?>
		<td data-name="ReferMobileNo" <?php echo $mas_reference_type_list->ReferMobileNo->cellAttributes() ?>>
<span id="el<?php echo $mas_reference_type_list->RowCount ?>_mas_reference_type_ReferMobileNo">
<span<?php echo $mas_reference_type_list->ReferMobileNo->viewAttributes() ?>><?php echo $mas_reference_type_list->ReferMobileNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($mas_reference_type_list->ReferClinicname->Visible) { // ReferClinicname ?>
		<td data-name="ReferClinicname" <?php echo $mas_reference_type_list->ReferClinicname->cellAttributes() ?>>
<span id="el<?php echo $mas_reference_type_list->RowCount ?>_mas_reference_type_ReferClinicname">
<span<?php echo $mas_reference_type_list->ReferClinicname->viewAttributes() ?>><?php echo $mas_reference_type_list->ReferClinicname->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($mas_reference_type_list->ReferCity->Visible) { // ReferCity ?>
		<td data-name="ReferCity" <?php echo $mas_reference_type_list->ReferCity->cellAttributes() ?>>
<span id="el<?php echo $mas_reference_type_list->RowCount ?>_mas_reference_type_ReferCity">
<span<?php echo $mas_reference_type_list->ReferCity->viewAttributes() ?>><?php echo $mas_reference_type_list->ReferCity->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$mas_reference_type_list->ListOptions->render("body", "right", $mas_reference_type_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$mas_reference_type_list->isGridAdd())
		$mas_reference_type_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$mas_reference_type->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($mas_reference_type_list->Recordset)
	$mas_reference_type_list->Recordset->Close();
?>
<?php if (!$mas_reference_type_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$mas_reference_type_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $mas_reference_type_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $mas_reference_type_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($mas_reference_type_list->TotalRecords == 0 && !$mas_reference_type->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $mas_reference_type_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$mas_reference_type_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$mas_reference_type_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$mas_reference_type->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_mas_reference_type",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$mas_reference_type_list->terminate();
?>
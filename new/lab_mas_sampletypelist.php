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
$lab_mas_sampletype_list = new lab_mas_sampletype_list();

// Run the page
$lab_mas_sampletype_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_mas_sampletype_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$lab_mas_sampletype_list->isExport()) { ?>
<script>
var flab_mas_sampletypelist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	flab_mas_sampletypelist = currentForm = new ew.Form("flab_mas_sampletypelist", "list");
	flab_mas_sampletypelist.formKeyCountName = '<?php echo $lab_mas_sampletype_list->FormKeyCountName ?>';
	loadjs.done("flab_mas_sampletypelist");
});
var flab_mas_sampletypelistsrch;
loadjs.ready("head", function() {

	// Form object for search
	flab_mas_sampletypelistsrch = currentSearchForm = new ew.Form("flab_mas_sampletypelistsrch");

	// Dynamic selection lists
	// Filters

	flab_mas_sampletypelistsrch.filterList = <?php echo $lab_mas_sampletype_list->getFilterList() ?>;
	loadjs.done("flab_mas_sampletypelistsrch");
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
<?php if (!$lab_mas_sampletype_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($lab_mas_sampletype_list->TotalRecords > 0 && $lab_mas_sampletype_list->ExportOptions->visible()) { ?>
<?php $lab_mas_sampletype_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($lab_mas_sampletype_list->ImportOptions->visible()) { ?>
<?php $lab_mas_sampletype_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($lab_mas_sampletype_list->SearchOptions->visible()) { ?>
<?php $lab_mas_sampletype_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($lab_mas_sampletype_list->FilterOptions->visible()) { ?>
<?php $lab_mas_sampletype_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$lab_mas_sampletype_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$lab_mas_sampletype_list->isExport() && !$lab_mas_sampletype->CurrentAction) { ?>
<form name="flab_mas_sampletypelistsrch" id="flab_mas_sampletypelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="flab_mas_sampletypelistsrch-search-panel" class="<?php echo $lab_mas_sampletype_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="lab_mas_sampletype">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $lab_mas_sampletype_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($lab_mas_sampletype_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($lab_mas_sampletype_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $lab_mas_sampletype_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($lab_mas_sampletype_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($lab_mas_sampletype_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($lab_mas_sampletype_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($lab_mas_sampletype_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $lab_mas_sampletype_list->showPageHeader(); ?>
<?php
$lab_mas_sampletype_list->showMessage();
?>
<?php if ($lab_mas_sampletype_list->TotalRecords > 0 || $lab_mas_sampletype->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($lab_mas_sampletype_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> lab_mas_sampletype">
<?php if (!$lab_mas_sampletype_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$lab_mas_sampletype_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $lab_mas_sampletype_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $lab_mas_sampletype_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="flab_mas_sampletypelist" id="flab_mas_sampletypelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_mas_sampletype">
<div id="gmp_lab_mas_sampletype" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($lab_mas_sampletype_list->TotalRecords > 0 || $lab_mas_sampletype_list->isGridEdit()) { ?>
<table id="tbl_lab_mas_sampletypelist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$lab_mas_sampletype->RowType = ROWTYPE_HEADER;

// Render list options
$lab_mas_sampletype_list->renderListOptions();

// Render list options (header, left)
$lab_mas_sampletype_list->ListOptions->render("header", "left");
?>
<?php if ($lab_mas_sampletype_list->id->Visible) { // id ?>
	<?php if ($lab_mas_sampletype_list->SortUrl($lab_mas_sampletype_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $lab_mas_sampletype_list->id->headerCellClass() ?>"><div id="elh_lab_mas_sampletype_id" class="lab_mas_sampletype_id"><div class="ew-table-header-caption"><?php echo $lab_mas_sampletype_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $lab_mas_sampletype_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_mas_sampletype_list->SortUrl($lab_mas_sampletype_list->id) ?>', 1);"><div id="elh_lab_mas_sampletype_id" class="lab_mas_sampletype_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_mas_sampletype_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_mas_sampletype_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_mas_sampletype_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_mas_sampletype_list->CATEGORY->Visible) { // CATEGORY ?>
	<?php if ($lab_mas_sampletype_list->SortUrl($lab_mas_sampletype_list->CATEGORY) == "") { ?>
		<th data-name="CATEGORY" class="<?php echo $lab_mas_sampletype_list->CATEGORY->headerCellClass() ?>"><div id="elh_lab_mas_sampletype_CATEGORY" class="lab_mas_sampletype_CATEGORY"><div class="ew-table-header-caption"><?php echo $lab_mas_sampletype_list->CATEGORY->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CATEGORY" class="<?php echo $lab_mas_sampletype_list->CATEGORY->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_mas_sampletype_list->SortUrl($lab_mas_sampletype_list->CATEGORY) ?>', 1);"><div id="elh_lab_mas_sampletype_CATEGORY" class="lab_mas_sampletype_CATEGORY">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_mas_sampletype_list->CATEGORY->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_mas_sampletype_list->CATEGORY->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_mas_sampletype_list->CATEGORY->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$lab_mas_sampletype_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($lab_mas_sampletype_list->ExportAll && $lab_mas_sampletype_list->isExport()) {
	$lab_mas_sampletype_list->StopRecord = $lab_mas_sampletype_list->TotalRecords;
} else {

	// Set the last record to display
	if ($lab_mas_sampletype_list->TotalRecords > $lab_mas_sampletype_list->StartRecord + $lab_mas_sampletype_list->DisplayRecords - 1)
		$lab_mas_sampletype_list->StopRecord = $lab_mas_sampletype_list->StartRecord + $lab_mas_sampletype_list->DisplayRecords - 1;
	else
		$lab_mas_sampletype_list->StopRecord = $lab_mas_sampletype_list->TotalRecords;
}
$lab_mas_sampletype_list->RecordCount = $lab_mas_sampletype_list->StartRecord - 1;
if ($lab_mas_sampletype_list->Recordset && !$lab_mas_sampletype_list->Recordset->EOF) {
	$lab_mas_sampletype_list->Recordset->moveFirst();
	$selectLimit = $lab_mas_sampletype_list->UseSelectLimit;
	if (!$selectLimit && $lab_mas_sampletype_list->StartRecord > 1)
		$lab_mas_sampletype_list->Recordset->move($lab_mas_sampletype_list->StartRecord - 1);
} elseif (!$lab_mas_sampletype->AllowAddDeleteRow && $lab_mas_sampletype_list->StopRecord == 0) {
	$lab_mas_sampletype_list->StopRecord = $lab_mas_sampletype->GridAddRowCount;
}

// Initialize aggregate
$lab_mas_sampletype->RowType = ROWTYPE_AGGREGATEINIT;
$lab_mas_sampletype->resetAttributes();
$lab_mas_sampletype_list->renderRow();
while ($lab_mas_sampletype_list->RecordCount < $lab_mas_sampletype_list->StopRecord) {
	$lab_mas_sampletype_list->RecordCount++;
	if ($lab_mas_sampletype_list->RecordCount >= $lab_mas_sampletype_list->StartRecord) {
		$lab_mas_sampletype_list->RowCount++;

		// Set up key count
		$lab_mas_sampletype_list->KeyCount = $lab_mas_sampletype_list->RowIndex;

		// Init row class and style
		$lab_mas_sampletype->resetAttributes();
		$lab_mas_sampletype->CssClass = "";
		if ($lab_mas_sampletype_list->isGridAdd()) {
		} else {
			$lab_mas_sampletype_list->loadRowValues($lab_mas_sampletype_list->Recordset); // Load row values
		}
		$lab_mas_sampletype->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$lab_mas_sampletype->RowAttrs->merge(["data-rowindex" => $lab_mas_sampletype_list->RowCount, "id" => "r" . $lab_mas_sampletype_list->RowCount . "_lab_mas_sampletype", "data-rowtype" => $lab_mas_sampletype->RowType]);

		// Render row
		$lab_mas_sampletype_list->renderRow();

		// Render list options
		$lab_mas_sampletype_list->renderListOptions();
?>
	<tr <?php echo $lab_mas_sampletype->rowAttributes() ?>>
<?php

// Render list options (body, left)
$lab_mas_sampletype_list->ListOptions->render("body", "left", $lab_mas_sampletype_list->RowCount);
?>
	<?php if ($lab_mas_sampletype_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $lab_mas_sampletype_list->id->cellAttributes() ?>>
<span id="el<?php echo $lab_mas_sampletype_list->RowCount ?>_lab_mas_sampletype_id">
<span<?php echo $lab_mas_sampletype_list->id->viewAttributes() ?>><?php echo $lab_mas_sampletype_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_mas_sampletype_list->CATEGORY->Visible) { // CATEGORY ?>
		<td data-name="CATEGORY" <?php echo $lab_mas_sampletype_list->CATEGORY->cellAttributes() ?>>
<span id="el<?php echo $lab_mas_sampletype_list->RowCount ?>_lab_mas_sampletype_CATEGORY">
<span<?php echo $lab_mas_sampletype_list->CATEGORY->viewAttributes() ?>><?php echo $lab_mas_sampletype_list->CATEGORY->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$lab_mas_sampletype_list->ListOptions->render("body", "right", $lab_mas_sampletype_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$lab_mas_sampletype_list->isGridAdd())
		$lab_mas_sampletype_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$lab_mas_sampletype->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($lab_mas_sampletype_list->Recordset)
	$lab_mas_sampletype_list->Recordset->Close();
?>
<?php if (!$lab_mas_sampletype_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$lab_mas_sampletype_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $lab_mas_sampletype_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $lab_mas_sampletype_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($lab_mas_sampletype_list->TotalRecords == 0 && !$lab_mas_sampletype->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $lab_mas_sampletype_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$lab_mas_sampletype_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$lab_mas_sampletype_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$lab_mas_sampletype->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_lab_mas_sampletype",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$lab_mas_sampletype_list->terminate();
?>
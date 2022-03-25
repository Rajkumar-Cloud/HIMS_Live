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
$mas_procedure_list = new mas_procedure_list();

// Run the page
$mas_procedure_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_procedure_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$mas_procedure_list->isExport()) { ?>
<script>
var fmas_procedurelist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fmas_procedurelist = currentForm = new ew.Form("fmas_procedurelist", "list");
	fmas_procedurelist.formKeyCountName = '<?php echo $mas_procedure_list->FormKeyCountName ?>';
	loadjs.done("fmas_procedurelist");
});
var fmas_procedurelistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fmas_procedurelistsrch = currentSearchForm = new ew.Form("fmas_procedurelistsrch");

	// Dynamic selection lists
	// Filters

	fmas_procedurelistsrch.filterList = <?php echo $mas_procedure_list->getFilterList() ?>;
	loadjs.done("fmas_procedurelistsrch");
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
<?php if (!$mas_procedure_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($mas_procedure_list->TotalRecords > 0 && $mas_procedure_list->ExportOptions->visible()) { ?>
<?php $mas_procedure_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($mas_procedure_list->ImportOptions->visible()) { ?>
<?php $mas_procedure_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($mas_procedure_list->SearchOptions->visible()) { ?>
<?php $mas_procedure_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($mas_procedure_list->FilterOptions->visible()) { ?>
<?php $mas_procedure_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$mas_procedure_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$mas_procedure_list->isExport() && !$mas_procedure->CurrentAction) { ?>
<form name="fmas_procedurelistsrch" id="fmas_procedurelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fmas_procedurelistsrch-search-panel" class="<?php echo $mas_procedure_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="mas_procedure">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $mas_procedure_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($mas_procedure_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($mas_procedure_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $mas_procedure_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($mas_procedure_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($mas_procedure_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($mas_procedure_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($mas_procedure_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $mas_procedure_list->showPageHeader(); ?>
<?php
$mas_procedure_list->showMessage();
?>
<?php if ($mas_procedure_list->TotalRecords > 0 || $mas_procedure->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($mas_procedure_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> mas_procedure">
<?php if (!$mas_procedure_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$mas_procedure_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $mas_procedure_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $mas_procedure_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fmas_procedurelist" id="fmas_procedurelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_procedure">
<div id="gmp_mas_procedure" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($mas_procedure_list->TotalRecords > 0 || $mas_procedure_list->isGridEdit()) { ?>
<table id="tbl_mas_procedurelist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$mas_procedure->RowType = ROWTYPE_HEADER;

// Render list options
$mas_procedure_list->renderListOptions();

// Render list options (header, left)
$mas_procedure_list->ListOptions->render("header", "left");
?>
<?php if ($mas_procedure_list->id->Visible) { // id ?>
	<?php if ($mas_procedure_list->SortUrl($mas_procedure_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $mas_procedure_list->id->headerCellClass() ?>"><div id="elh_mas_procedure_id" class="mas_procedure_id"><div class="ew-table-header-caption"><?php echo $mas_procedure_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $mas_procedure_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mas_procedure_list->SortUrl($mas_procedure_list->id) ?>', 1);"><div id="elh_mas_procedure_id" class="mas_procedure_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_procedure_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_procedure_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mas_procedure_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_procedure_list->PROCEDURE->Visible) { // PROCEDURE ?>
	<?php if ($mas_procedure_list->SortUrl($mas_procedure_list->PROCEDURE) == "") { ?>
		<th data-name="PROCEDURE" class="<?php echo $mas_procedure_list->PROCEDURE->headerCellClass() ?>"><div id="elh_mas_procedure_PROCEDURE" class="mas_procedure_PROCEDURE"><div class="ew-table-header-caption"><?php echo $mas_procedure_list->PROCEDURE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PROCEDURE" class="<?php echo $mas_procedure_list->PROCEDURE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mas_procedure_list->SortUrl($mas_procedure_list->PROCEDURE) ?>', 1);"><div id="elh_mas_procedure_PROCEDURE" class="mas_procedure_PROCEDURE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_procedure_list->PROCEDURE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_procedure_list->PROCEDURE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mas_procedure_list->PROCEDURE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$mas_procedure_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($mas_procedure_list->ExportAll && $mas_procedure_list->isExport()) {
	$mas_procedure_list->StopRecord = $mas_procedure_list->TotalRecords;
} else {

	// Set the last record to display
	if ($mas_procedure_list->TotalRecords > $mas_procedure_list->StartRecord + $mas_procedure_list->DisplayRecords - 1)
		$mas_procedure_list->StopRecord = $mas_procedure_list->StartRecord + $mas_procedure_list->DisplayRecords - 1;
	else
		$mas_procedure_list->StopRecord = $mas_procedure_list->TotalRecords;
}
$mas_procedure_list->RecordCount = $mas_procedure_list->StartRecord - 1;
if ($mas_procedure_list->Recordset && !$mas_procedure_list->Recordset->EOF) {
	$mas_procedure_list->Recordset->moveFirst();
	$selectLimit = $mas_procedure_list->UseSelectLimit;
	if (!$selectLimit && $mas_procedure_list->StartRecord > 1)
		$mas_procedure_list->Recordset->move($mas_procedure_list->StartRecord - 1);
} elseif (!$mas_procedure->AllowAddDeleteRow && $mas_procedure_list->StopRecord == 0) {
	$mas_procedure_list->StopRecord = $mas_procedure->GridAddRowCount;
}

// Initialize aggregate
$mas_procedure->RowType = ROWTYPE_AGGREGATEINIT;
$mas_procedure->resetAttributes();
$mas_procedure_list->renderRow();
while ($mas_procedure_list->RecordCount < $mas_procedure_list->StopRecord) {
	$mas_procedure_list->RecordCount++;
	if ($mas_procedure_list->RecordCount >= $mas_procedure_list->StartRecord) {
		$mas_procedure_list->RowCount++;

		// Set up key count
		$mas_procedure_list->KeyCount = $mas_procedure_list->RowIndex;

		// Init row class and style
		$mas_procedure->resetAttributes();
		$mas_procedure->CssClass = "";
		if ($mas_procedure_list->isGridAdd()) {
		} else {
			$mas_procedure_list->loadRowValues($mas_procedure_list->Recordset); // Load row values
		}
		$mas_procedure->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$mas_procedure->RowAttrs->merge(["data-rowindex" => $mas_procedure_list->RowCount, "id" => "r" . $mas_procedure_list->RowCount . "_mas_procedure", "data-rowtype" => $mas_procedure->RowType]);

		// Render row
		$mas_procedure_list->renderRow();

		// Render list options
		$mas_procedure_list->renderListOptions();
?>
	<tr <?php echo $mas_procedure->rowAttributes() ?>>
<?php

// Render list options (body, left)
$mas_procedure_list->ListOptions->render("body", "left", $mas_procedure_list->RowCount);
?>
	<?php if ($mas_procedure_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $mas_procedure_list->id->cellAttributes() ?>>
<span id="el<?php echo $mas_procedure_list->RowCount ?>_mas_procedure_id">
<span<?php echo $mas_procedure_list->id->viewAttributes() ?>><?php echo $mas_procedure_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($mas_procedure_list->PROCEDURE->Visible) { // PROCEDURE ?>
		<td data-name="PROCEDURE" <?php echo $mas_procedure_list->PROCEDURE->cellAttributes() ?>>
<span id="el<?php echo $mas_procedure_list->RowCount ?>_mas_procedure_PROCEDURE">
<span<?php echo $mas_procedure_list->PROCEDURE->viewAttributes() ?>><?php echo $mas_procedure_list->PROCEDURE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$mas_procedure_list->ListOptions->render("body", "right", $mas_procedure_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$mas_procedure_list->isGridAdd())
		$mas_procedure_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$mas_procedure->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($mas_procedure_list->Recordset)
	$mas_procedure_list->Recordset->Close();
?>
<?php if (!$mas_procedure_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$mas_procedure_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $mas_procedure_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $mas_procedure_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($mas_procedure_list->TotalRecords == 0 && !$mas_procedure->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $mas_procedure_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$mas_procedure_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$mas_procedure_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$mas_procedure->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_mas_procedure",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$mas_procedure_list->terminate();
?>
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
$lab_sepcimen_mast_list = new lab_sepcimen_mast_list();

// Run the page
$lab_sepcimen_mast_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_sepcimen_mast_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$lab_sepcimen_mast_list->isExport()) { ?>
<script>
var flab_sepcimen_mastlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	flab_sepcimen_mastlist = currentForm = new ew.Form("flab_sepcimen_mastlist", "list");
	flab_sepcimen_mastlist.formKeyCountName = '<?php echo $lab_sepcimen_mast_list->FormKeyCountName ?>';
	loadjs.done("flab_sepcimen_mastlist");
});
var flab_sepcimen_mastlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	flab_sepcimen_mastlistsrch = currentSearchForm = new ew.Form("flab_sepcimen_mastlistsrch");

	// Dynamic selection lists
	// Filters

	flab_sepcimen_mastlistsrch.filterList = <?php echo $lab_sepcimen_mast_list->getFilterList() ?>;
	loadjs.done("flab_sepcimen_mastlistsrch");
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
<?php if (!$lab_sepcimen_mast_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($lab_sepcimen_mast_list->TotalRecords > 0 && $lab_sepcimen_mast_list->ExportOptions->visible()) { ?>
<?php $lab_sepcimen_mast_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($lab_sepcimen_mast_list->ImportOptions->visible()) { ?>
<?php $lab_sepcimen_mast_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($lab_sepcimen_mast_list->SearchOptions->visible()) { ?>
<?php $lab_sepcimen_mast_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($lab_sepcimen_mast_list->FilterOptions->visible()) { ?>
<?php $lab_sepcimen_mast_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$lab_sepcimen_mast_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$lab_sepcimen_mast_list->isExport() && !$lab_sepcimen_mast->CurrentAction) { ?>
<form name="flab_sepcimen_mastlistsrch" id="flab_sepcimen_mastlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="flab_sepcimen_mastlistsrch-search-panel" class="<?php echo $lab_sepcimen_mast_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="lab_sepcimen_mast">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $lab_sepcimen_mast_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($lab_sepcimen_mast_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($lab_sepcimen_mast_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $lab_sepcimen_mast_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($lab_sepcimen_mast_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($lab_sepcimen_mast_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($lab_sepcimen_mast_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($lab_sepcimen_mast_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $lab_sepcimen_mast_list->showPageHeader(); ?>
<?php
$lab_sepcimen_mast_list->showMessage();
?>
<?php if ($lab_sepcimen_mast_list->TotalRecords > 0 || $lab_sepcimen_mast->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($lab_sepcimen_mast_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> lab_sepcimen_mast">
<?php if (!$lab_sepcimen_mast_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$lab_sepcimen_mast_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $lab_sepcimen_mast_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $lab_sepcimen_mast_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="flab_sepcimen_mastlist" id="flab_sepcimen_mastlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_sepcimen_mast">
<div id="gmp_lab_sepcimen_mast" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($lab_sepcimen_mast_list->TotalRecords > 0 || $lab_sepcimen_mast_list->isGridEdit()) { ?>
<table id="tbl_lab_sepcimen_mastlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$lab_sepcimen_mast->RowType = ROWTYPE_HEADER;

// Render list options
$lab_sepcimen_mast_list->renderListOptions();

// Render list options (header, left)
$lab_sepcimen_mast_list->ListOptions->render("header", "left");
?>
<?php if ($lab_sepcimen_mast_list->SpecimenCD->Visible) { // SpecimenCD ?>
	<?php if ($lab_sepcimen_mast_list->SortUrl($lab_sepcimen_mast_list->SpecimenCD) == "") { ?>
		<th data-name="SpecimenCD" class="<?php echo $lab_sepcimen_mast_list->SpecimenCD->headerCellClass() ?>"><div id="elh_lab_sepcimen_mast_SpecimenCD" class="lab_sepcimen_mast_SpecimenCD"><div class="ew-table-header-caption"><?php echo $lab_sepcimen_mast_list->SpecimenCD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SpecimenCD" class="<?php echo $lab_sepcimen_mast_list->SpecimenCD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_sepcimen_mast_list->SortUrl($lab_sepcimen_mast_list->SpecimenCD) ?>', 1);"><div id="elh_lab_sepcimen_mast_SpecimenCD" class="lab_sepcimen_mast_SpecimenCD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_sepcimen_mast_list->SpecimenCD->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_sepcimen_mast_list->SpecimenCD->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_sepcimen_mast_list->SpecimenCD->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_sepcimen_mast_list->SpecimenDesc->Visible) { // SpecimenDesc ?>
	<?php if ($lab_sepcimen_mast_list->SortUrl($lab_sepcimen_mast_list->SpecimenDesc) == "") { ?>
		<th data-name="SpecimenDesc" class="<?php echo $lab_sepcimen_mast_list->SpecimenDesc->headerCellClass() ?>"><div id="elh_lab_sepcimen_mast_SpecimenDesc" class="lab_sepcimen_mast_SpecimenDesc"><div class="ew-table-header-caption"><?php echo $lab_sepcimen_mast_list->SpecimenDesc->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SpecimenDesc" class="<?php echo $lab_sepcimen_mast_list->SpecimenDesc->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_sepcimen_mast_list->SortUrl($lab_sepcimen_mast_list->SpecimenDesc) ?>', 1);"><div id="elh_lab_sepcimen_mast_SpecimenDesc" class="lab_sepcimen_mast_SpecimenDesc">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_sepcimen_mast_list->SpecimenDesc->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_sepcimen_mast_list->SpecimenDesc->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_sepcimen_mast_list->SpecimenDesc->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_sepcimen_mast_list->id->Visible) { // id ?>
	<?php if ($lab_sepcimen_mast_list->SortUrl($lab_sepcimen_mast_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $lab_sepcimen_mast_list->id->headerCellClass() ?>"><div id="elh_lab_sepcimen_mast_id" class="lab_sepcimen_mast_id"><div class="ew-table-header-caption"><?php echo $lab_sepcimen_mast_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $lab_sepcimen_mast_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_sepcimen_mast_list->SortUrl($lab_sepcimen_mast_list->id) ?>', 1);"><div id="elh_lab_sepcimen_mast_id" class="lab_sepcimen_mast_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_sepcimen_mast_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_sepcimen_mast_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_sepcimen_mast_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$lab_sepcimen_mast_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($lab_sepcimen_mast_list->ExportAll && $lab_sepcimen_mast_list->isExport()) {
	$lab_sepcimen_mast_list->StopRecord = $lab_sepcimen_mast_list->TotalRecords;
} else {

	// Set the last record to display
	if ($lab_sepcimen_mast_list->TotalRecords > $lab_sepcimen_mast_list->StartRecord + $lab_sepcimen_mast_list->DisplayRecords - 1)
		$lab_sepcimen_mast_list->StopRecord = $lab_sepcimen_mast_list->StartRecord + $lab_sepcimen_mast_list->DisplayRecords - 1;
	else
		$lab_sepcimen_mast_list->StopRecord = $lab_sepcimen_mast_list->TotalRecords;
}
$lab_sepcimen_mast_list->RecordCount = $lab_sepcimen_mast_list->StartRecord - 1;
if ($lab_sepcimen_mast_list->Recordset && !$lab_sepcimen_mast_list->Recordset->EOF) {
	$lab_sepcimen_mast_list->Recordset->moveFirst();
	$selectLimit = $lab_sepcimen_mast_list->UseSelectLimit;
	if (!$selectLimit && $lab_sepcimen_mast_list->StartRecord > 1)
		$lab_sepcimen_mast_list->Recordset->move($lab_sepcimen_mast_list->StartRecord - 1);
} elseif (!$lab_sepcimen_mast->AllowAddDeleteRow && $lab_sepcimen_mast_list->StopRecord == 0) {
	$lab_sepcimen_mast_list->StopRecord = $lab_sepcimen_mast->GridAddRowCount;
}

// Initialize aggregate
$lab_sepcimen_mast->RowType = ROWTYPE_AGGREGATEINIT;
$lab_sepcimen_mast->resetAttributes();
$lab_sepcimen_mast_list->renderRow();
while ($lab_sepcimen_mast_list->RecordCount < $lab_sepcimen_mast_list->StopRecord) {
	$lab_sepcimen_mast_list->RecordCount++;
	if ($lab_sepcimen_mast_list->RecordCount >= $lab_sepcimen_mast_list->StartRecord) {
		$lab_sepcimen_mast_list->RowCount++;

		// Set up key count
		$lab_sepcimen_mast_list->KeyCount = $lab_sepcimen_mast_list->RowIndex;

		// Init row class and style
		$lab_sepcimen_mast->resetAttributes();
		$lab_sepcimen_mast->CssClass = "";
		if ($lab_sepcimen_mast_list->isGridAdd()) {
		} else {
			$lab_sepcimen_mast_list->loadRowValues($lab_sepcimen_mast_list->Recordset); // Load row values
		}
		$lab_sepcimen_mast->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$lab_sepcimen_mast->RowAttrs->merge(["data-rowindex" => $lab_sepcimen_mast_list->RowCount, "id" => "r" . $lab_sepcimen_mast_list->RowCount . "_lab_sepcimen_mast", "data-rowtype" => $lab_sepcimen_mast->RowType]);

		// Render row
		$lab_sepcimen_mast_list->renderRow();

		// Render list options
		$lab_sepcimen_mast_list->renderListOptions();
?>
	<tr <?php echo $lab_sepcimen_mast->rowAttributes() ?>>
<?php

// Render list options (body, left)
$lab_sepcimen_mast_list->ListOptions->render("body", "left", $lab_sepcimen_mast_list->RowCount);
?>
	<?php if ($lab_sepcimen_mast_list->SpecimenCD->Visible) { // SpecimenCD ?>
		<td data-name="SpecimenCD" <?php echo $lab_sepcimen_mast_list->SpecimenCD->cellAttributes() ?>>
<span id="el<?php echo $lab_sepcimen_mast_list->RowCount ?>_lab_sepcimen_mast_SpecimenCD">
<span<?php echo $lab_sepcimen_mast_list->SpecimenCD->viewAttributes() ?>><?php echo $lab_sepcimen_mast_list->SpecimenCD->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_sepcimen_mast_list->SpecimenDesc->Visible) { // SpecimenDesc ?>
		<td data-name="SpecimenDesc" <?php echo $lab_sepcimen_mast_list->SpecimenDesc->cellAttributes() ?>>
<span id="el<?php echo $lab_sepcimen_mast_list->RowCount ?>_lab_sepcimen_mast_SpecimenDesc">
<span<?php echo $lab_sepcimen_mast_list->SpecimenDesc->viewAttributes() ?>><?php echo $lab_sepcimen_mast_list->SpecimenDesc->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_sepcimen_mast_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $lab_sepcimen_mast_list->id->cellAttributes() ?>>
<span id="el<?php echo $lab_sepcimen_mast_list->RowCount ?>_lab_sepcimen_mast_id">
<span<?php echo $lab_sepcimen_mast_list->id->viewAttributes() ?>><?php echo $lab_sepcimen_mast_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$lab_sepcimen_mast_list->ListOptions->render("body", "right", $lab_sepcimen_mast_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$lab_sepcimen_mast_list->isGridAdd())
		$lab_sepcimen_mast_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$lab_sepcimen_mast->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($lab_sepcimen_mast_list->Recordset)
	$lab_sepcimen_mast_list->Recordset->Close();
?>
<?php if (!$lab_sepcimen_mast_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$lab_sepcimen_mast_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $lab_sepcimen_mast_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $lab_sepcimen_mast_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($lab_sepcimen_mast_list->TotalRecords == 0 && !$lab_sepcimen_mast->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $lab_sepcimen_mast_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$lab_sepcimen_mast_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$lab_sepcimen_mast_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$lab_sepcimen_mast->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_lab_sepcimen_mast",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$lab_sepcimen_mast_list->terminate();
?>
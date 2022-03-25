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
$ivf_agency_list = new ivf_agency_list();

// Run the page
$ivf_agency_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_agency_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$ivf_agency_list->isExport()) { ?>
<script>
var fivf_agencylist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fivf_agencylist = currentForm = new ew.Form("fivf_agencylist", "list");
	fivf_agencylist.formKeyCountName = '<?php echo $ivf_agency_list->FormKeyCountName ?>';
	loadjs.done("fivf_agencylist");
});
var fivf_agencylistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fivf_agencylistsrch = currentSearchForm = new ew.Form("fivf_agencylistsrch");

	// Dynamic selection lists
	// Filters

	fivf_agencylistsrch.filterList = <?php echo $ivf_agency_list->getFilterList() ?>;
	loadjs.done("fivf_agencylistsrch");
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
<?php if (!$ivf_agency_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($ivf_agency_list->TotalRecords > 0 && $ivf_agency_list->ExportOptions->visible()) { ?>
<?php $ivf_agency_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_agency_list->ImportOptions->visible()) { ?>
<?php $ivf_agency_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_agency_list->SearchOptions->visible()) { ?>
<?php $ivf_agency_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_agency_list->FilterOptions->visible()) { ?>
<?php $ivf_agency_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$ivf_agency_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$ivf_agency_list->isExport() && !$ivf_agency->CurrentAction) { ?>
<form name="fivf_agencylistsrch" id="fivf_agencylistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fivf_agencylistsrch-search-panel" class="<?php echo $ivf_agency_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="ivf_agency">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $ivf_agency_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($ivf_agency_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($ivf_agency_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $ivf_agency_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($ivf_agency_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($ivf_agency_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($ivf_agency_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($ivf_agency_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $ivf_agency_list->showPageHeader(); ?>
<?php
$ivf_agency_list->showMessage();
?>
<?php if ($ivf_agency_list->TotalRecords > 0 || $ivf_agency->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($ivf_agency_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf_agency">
<?php if (!$ivf_agency_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$ivf_agency_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $ivf_agency_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ivf_agency_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fivf_agencylist" id="fivf_agencylist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_agency">
<div id="gmp_ivf_agency" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($ivf_agency_list->TotalRecords > 0 || $ivf_agency_list->isGridEdit()) { ?>
<table id="tbl_ivf_agencylist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$ivf_agency->RowType = ROWTYPE_HEADER;

// Render list options
$ivf_agency_list->renderListOptions();

// Render list options (header, left)
$ivf_agency_list->ListOptions->render("header", "left");
?>
<?php if ($ivf_agency_list->id->Visible) { // id ?>
	<?php if ($ivf_agency_list->SortUrl($ivf_agency_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $ivf_agency_list->id->headerCellClass() ?>"><div id="elh_ivf_agency_id" class="ivf_agency_id"><div class="ew-table-header-caption"><?php echo $ivf_agency_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $ivf_agency_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_agency_list->SortUrl($ivf_agency_list->id) ?>', 1);"><div id="elh_ivf_agency_id" class="ivf_agency_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_agency_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_agency_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_agency_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_agency_list->Name->Visible) { // Name ?>
	<?php if ($ivf_agency_list->SortUrl($ivf_agency_list->Name) == "") { ?>
		<th data-name="Name" class="<?php echo $ivf_agency_list->Name->headerCellClass() ?>"><div id="elh_ivf_agency_Name" class="ivf_agency_Name"><div class="ew-table-header-caption"><?php echo $ivf_agency_list->Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Name" class="<?php echo $ivf_agency_list->Name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_agency_list->SortUrl($ivf_agency_list->Name) ?>', 1);"><div id="elh_ivf_agency_Name" class="ivf_agency_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_agency_list->Name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_agency_list->Name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_agency_list->Name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_agency_list->Street->Visible) { // Street ?>
	<?php if ($ivf_agency_list->SortUrl($ivf_agency_list->Street) == "") { ?>
		<th data-name="Street" class="<?php echo $ivf_agency_list->Street->headerCellClass() ?>"><div id="elh_ivf_agency_Street" class="ivf_agency_Street"><div class="ew-table-header-caption"><?php echo $ivf_agency_list->Street->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Street" class="<?php echo $ivf_agency_list->Street->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_agency_list->SortUrl($ivf_agency_list->Street) ?>', 1);"><div id="elh_ivf_agency_Street" class="ivf_agency_Street">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_agency_list->Street->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_agency_list->Street->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_agency_list->Street->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_agency_list->Town->Visible) { // Town ?>
	<?php if ($ivf_agency_list->SortUrl($ivf_agency_list->Town) == "") { ?>
		<th data-name="Town" class="<?php echo $ivf_agency_list->Town->headerCellClass() ?>"><div id="elh_ivf_agency_Town" class="ivf_agency_Town"><div class="ew-table-header-caption"><?php echo $ivf_agency_list->Town->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Town" class="<?php echo $ivf_agency_list->Town->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_agency_list->SortUrl($ivf_agency_list->Town) ?>', 1);"><div id="elh_ivf_agency_Town" class="ivf_agency_Town">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_agency_list->Town->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_agency_list->Town->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_agency_list->Town->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_agency_list->State->Visible) { // State ?>
	<?php if ($ivf_agency_list->SortUrl($ivf_agency_list->State) == "") { ?>
		<th data-name="State" class="<?php echo $ivf_agency_list->State->headerCellClass() ?>"><div id="elh_ivf_agency_State" class="ivf_agency_State"><div class="ew-table-header-caption"><?php echo $ivf_agency_list->State->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="State" class="<?php echo $ivf_agency_list->State->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_agency_list->SortUrl($ivf_agency_list->State) ?>', 1);"><div id="elh_ivf_agency_State" class="ivf_agency_State">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_agency_list->State->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_agency_list->State->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_agency_list->State->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_agency_list->Pin->Visible) { // Pin ?>
	<?php if ($ivf_agency_list->SortUrl($ivf_agency_list->Pin) == "") { ?>
		<th data-name="Pin" class="<?php echo $ivf_agency_list->Pin->headerCellClass() ?>"><div id="elh_ivf_agency_Pin" class="ivf_agency_Pin"><div class="ew-table-header-caption"><?php echo $ivf_agency_list->Pin->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pin" class="<?php echo $ivf_agency_list->Pin->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_agency_list->SortUrl($ivf_agency_list->Pin) ?>', 1);"><div id="elh_ivf_agency_Pin" class="ivf_agency_Pin">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_agency_list->Pin->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_agency_list->Pin->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_agency_list->Pin->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$ivf_agency_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($ivf_agency_list->ExportAll && $ivf_agency_list->isExport()) {
	$ivf_agency_list->StopRecord = $ivf_agency_list->TotalRecords;
} else {

	// Set the last record to display
	if ($ivf_agency_list->TotalRecords > $ivf_agency_list->StartRecord + $ivf_agency_list->DisplayRecords - 1)
		$ivf_agency_list->StopRecord = $ivf_agency_list->StartRecord + $ivf_agency_list->DisplayRecords - 1;
	else
		$ivf_agency_list->StopRecord = $ivf_agency_list->TotalRecords;
}
$ivf_agency_list->RecordCount = $ivf_agency_list->StartRecord - 1;
if ($ivf_agency_list->Recordset && !$ivf_agency_list->Recordset->EOF) {
	$ivf_agency_list->Recordset->moveFirst();
	$selectLimit = $ivf_agency_list->UseSelectLimit;
	if (!$selectLimit && $ivf_agency_list->StartRecord > 1)
		$ivf_agency_list->Recordset->move($ivf_agency_list->StartRecord - 1);
} elseif (!$ivf_agency->AllowAddDeleteRow && $ivf_agency_list->StopRecord == 0) {
	$ivf_agency_list->StopRecord = $ivf_agency->GridAddRowCount;
}

// Initialize aggregate
$ivf_agency->RowType = ROWTYPE_AGGREGATEINIT;
$ivf_agency->resetAttributes();
$ivf_agency_list->renderRow();
while ($ivf_agency_list->RecordCount < $ivf_agency_list->StopRecord) {
	$ivf_agency_list->RecordCount++;
	if ($ivf_agency_list->RecordCount >= $ivf_agency_list->StartRecord) {
		$ivf_agency_list->RowCount++;

		// Set up key count
		$ivf_agency_list->KeyCount = $ivf_agency_list->RowIndex;

		// Init row class and style
		$ivf_agency->resetAttributes();
		$ivf_agency->CssClass = "";
		if ($ivf_agency_list->isGridAdd()) {
		} else {
			$ivf_agency_list->loadRowValues($ivf_agency_list->Recordset); // Load row values
		}
		$ivf_agency->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$ivf_agency->RowAttrs->merge(["data-rowindex" => $ivf_agency_list->RowCount, "id" => "r" . $ivf_agency_list->RowCount . "_ivf_agency", "data-rowtype" => $ivf_agency->RowType]);

		// Render row
		$ivf_agency_list->renderRow();

		// Render list options
		$ivf_agency_list->renderListOptions();
?>
	<tr <?php echo $ivf_agency->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_agency_list->ListOptions->render("body", "left", $ivf_agency_list->RowCount);
?>
	<?php if ($ivf_agency_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $ivf_agency_list->id->cellAttributes() ?>>
<span id="el<?php echo $ivf_agency_list->RowCount ?>_ivf_agency_id">
<span<?php echo $ivf_agency_list->id->viewAttributes() ?>><?php echo $ivf_agency_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_agency_list->Name->Visible) { // Name ?>
		<td data-name="Name" <?php echo $ivf_agency_list->Name->cellAttributes() ?>>
<span id="el<?php echo $ivf_agency_list->RowCount ?>_ivf_agency_Name">
<span<?php echo $ivf_agency_list->Name->viewAttributes() ?>><?php echo $ivf_agency_list->Name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_agency_list->Street->Visible) { // Street ?>
		<td data-name="Street" <?php echo $ivf_agency_list->Street->cellAttributes() ?>>
<span id="el<?php echo $ivf_agency_list->RowCount ?>_ivf_agency_Street">
<span<?php echo $ivf_agency_list->Street->viewAttributes() ?>><?php echo $ivf_agency_list->Street->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_agency_list->Town->Visible) { // Town ?>
		<td data-name="Town" <?php echo $ivf_agency_list->Town->cellAttributes() ?>>
<span id="el<?php echo $ivf_agency_list->RowCount ?>_ivf_agency_Town">
<span<?php echo $ivf_agency_list->Town->viewAttributes() ?>><?php echo $ivf_agency_list->Town->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_agency_list->State->Visible) { // State ?>
		<td data-name="State" <?php echo $ivf_agency_list->State->cellAttributes() ?>>
<span id="el<?php echo $ivf_agency_list->RowCount ?>_ivf_agency_State">
<span<?php echo $ivf_agency_list->State->viewAttributes() ?>><?php echo $ivf_agency_list->State->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_agency_list->Pin->Visible) { // Pin ?>
		<td data-name="Pin" <?php echo $ivf_agency_list->Pin->cellAttributes() ?>>
<span id="el<?php echo $ivf_agency_list->RowCount ?>_ivf_agency_Pin">
<span<?php echo $ivf_agency_list->Pin->viewAttributes() ?>><?php echo $ivf_agency_list->Pin->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_agency_list->ListOptions->render("body", "right", $ivf_agency_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$ivf_agency_list->isGridAdd())
		$ivf_agency_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$ivf_agency->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($ivf_agency_list->Recordset)
	$ivf_agency_list->Recordset->Close();
?>
<?php if (!$ivf_agency_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$ivf_agency_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $ivf_agency_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ivf_agency_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($ivf_agency_list->TotalRecords == 0 && !$ivf_agency->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $ivf_agency_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$ivf_agency_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$ivf_agency_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$ivf_agency->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_ivf_agency",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$ivf_agency_list->terminate();
?>
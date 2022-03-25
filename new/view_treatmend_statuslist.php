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
$view_treatmend_status_list = new view_treatmend_status_list();

// Run the page
$view_treatmend_status_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_treatmend_status_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$view_treatmend_status_list->isExport()) { ?>
<script>
var fview_treatmend_statuslist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fview_treatmend_statuslist = currentForm = new ew.Form("fview_treatmend_statuslist", "list");
	fview_treatmend_statuslist.formKeyCountName = '<?php echo $view_treatmend_status_list->FormKeyCountName ?>';
	loadjs.done("fview_treatmend_statuslist");
});
var fview_treatmend_statuslistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fview_treatmend_statuslistsrch = currentSearchForm = new ew.Form("fview_treatmend_statuslistsrch");

	// Dynamic selection lists
	// Filters

	fview_treatmend_statuslistsrch.filterList = <?php echo $view_treatmend_status_list->getFilterList() ?>;
	loadjs.done("fview_treatmend_statuslistsrch");
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
<?php if (!$view_treatmend_status_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_treatmend_status_list->TotalRecords > 0 && $view_treatmend_status_list->ExportOptions->visible()) { ?>
<?php $view_treatmend_status_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_treatmend_status_list->ImportOptions->visible()) { ?>
<?php $view_treatmend_status_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_treatmend_status_list->SearchOptions->visible()) { ?>
<?php $view_treatmend_status_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_treatmend_status_list->FilterOptions->visible()) { ?>
<?php $view_treatmend_status_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_treatmend_status_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_treatmend_status_list->isExport() && !$view_treatmend_status->CurrentAction) { ?>
<form name="fview_treatmend_statuslistsrch" id="fview_treatmend_statuslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fview_treatmend_statuslistsrch-search-panel" class="<?php echo $view_treatmend_status_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_treatmend_status">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $view_treatmend_status_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($view_treatmend_status_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($view_treatmend_status_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_treatmend_status_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_treatmend_status_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_treatmend_status_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_treatmend_status_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_treatmend_status_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $view_treatmend_status_list->showPageHeader(); ?>
<?php
$view_treatmend_status_list->showMessage();
?>
<?php if ($view_treatmend_status_list->TotalRecords > 0 || $view_treatmend_status->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_treatmend_status_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_treatmend_status">
<?php if (!$view_treatmend_status_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_treatmend_status_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_treatmend_status_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_treatmend_status_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_treatmend_statuslist" id="fview_treatmend_statuslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_treatmend_status">
<div id="gmp_view_treatmend_status" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($view_treatmend_status_list->TotalRecords > 0 || $view_treatmend_status_list->isGridEdit()) { ?>
<table id="tbl_view_treatmend_statuslist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_treatmend_status->RowType = ROWTYPE_HEADER;

// Render list options
$view_treatmend_status_list->renderListOptions();

// Render list options (header, left)
$view_treatmend_status_list->ListOptions->render("header", "left");
?>
<?php if ($view_treatmend_status_list->id->Visible) { // id ?>
	<?php if ($view_treatmend_status_list->SortUrl($view_treatmend_status_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_treatmend_status_list->id->headerCellClass() ?>"><div id="elh_view_treatmend_status_id" class="view_treatmend_status_id"><div class="ew-table-header-caption"><?php echo $view_treatmend_status_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_treatmend_status_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_treatmend_status_list->SortUrl($view_treatmend_status_list->id) ?>', 1);"><div id="elh_view_treatmend_status_id" class="view_treatmend_status_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_treatmend_status_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_treatmend_status_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_treatmend_status_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_treatmend_status_list->PatientID->Visible) { // PatientID ?>
	<?php if ($view_treatmend_status_list->SortUrl($view_treatmend_status_list->PatientID) == "") { ?>
		<th data-name="PatientID" class="<?php echo $view_treatmend_status_list->PatientID->headerCellClass() ?>"><div id="elh_view_treatmend_status_PatientID" class="view_treatmend_status_PatientID"><div class="ew-table-header-caption"><?php echo $view_treatmend_status_list->PatientID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientID" class="<?php echo $view_treatmend_status_list->PatientID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_treatmend_status_list->SortUrl($view_treatmend_status_list->PatientID) ?>', 1);"><div id="elh_view_treatmend_status_PatientID" class="view_treatmend_status_PatientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_treatmend_status_list->PatientID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_treatmend_status_list->PatientID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_treatmend_status_list->PatientID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_treatmend_status_list->first_name->Visible) { // first_name ?>
	<?php if ($view_treatmend_status_list->SortUrl($view_treatmend_status_list->first_name) == "") { ?>
		<th data-name="first_name" class="<?php echo $view_treatmend_status_list->first_name->headerCellClass() ?>"><div id="elh_view_treatmend_status_first_name" class="view_treatmend_status_first_name"><div class="ew-table-header-caption"><?php echo $view_treatmend_status_list->first_name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="first_name" class="<?php echo $view_treatmend_status_list->first_name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_treatmend_status_list->SortUrl($view_treatmend_status_list->first_name) ?>', 1);"><div id="elh_view_treatmend_status_first_name" class="view_treatmend_status_first_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_treatmend_status_list->first_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_treatmend_status_list->first_name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_treatmend_status_list->first_name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_treatmend_status_list->mobile_no->Visible) { // mobile_no ?>
	<?php if ($view_treatmend_status_list->SortUrl($view_treatmend_status_list->mobile_no) == "") { ?>
		<th data-name="mobile_no" class="<?php echo $view_treatmend_status_list->mobile_no->headerCellClass() ?>"><div id="elh_view_treatmend_status_mobile_no" class="view_treatmend_status_mobile_no"><div class="ew-table-header-caption"><?php echo $view_treatmend_status_list->mobile_no->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mobile_no" class="<?php echo $view_treatmend_status_list->mobile_no->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_treatmend_status_list->SortUrl($view_treatmend_status_list->mobile_no) ?>', 1);"><div id="elh_view_treatmend_status_mobile_no" class="view_treatmend_status_mobile_no">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_treatmend_status_list->mobile_no->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_treatmend_status_list->mobile_no->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_treatmend_status_list->mobile_no->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_treatmend_status_list->Treatment->Visible) { // Treatment ?>
	<?php if ($view_treatmend_status_list->SortUrl($view_treatmend_status_list->Treatment) == "") { ?>
		<th data-name="Treatment" class="<?php echo $view_treatmend_status_list->Treatment->headerCellClass() ?>"><div id="elh_view_treatmend_status_Treatment" class="view_treatmend_status_Treatment"><div class="ew-table-header-caption"><?php echo $view_treatmend_status_list->Treatment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Treatment" class="<?php echo $view_treatmend_status_list->Treatment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_treatmend_status_list->SortUrl($view_treatmend_status_list->Treatment) ?>', 1);"><div id="elh_view_treatmend_status_Treatment" class="view_treatmend_status_Treatment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_treatmend_status_list->Treatment->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_treatmend_status_list->Treatment->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_treatmend_status_list->Treatment->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_treatmend_status_list->Status->Visible) { // Status ?>
	<?php if ($view_treatmend_status_list->SortUrl($view_treatmend_status_list->Status) == "") { ?>
		<th data-name="Status" class="<?php echo $view_treatmend_status_list->Status->headerCellClass() ?>"><div id="elh_view_treatmend_status_Status" class="view_treatmend_status_Status"><div class="ew-table-header-caption"><?php echo $view_treatmend_status_list->Status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Status" class="<?php echo $view_treatmend_status_list->Status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_treatmend_status_list->SortUrl($view_treatmend_status_list->Status) ?>', 1);"><div id="elh_view_treatmend_status_Status" class="view_treatmend_status_Status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_treatmend_status_list->Status->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_treatmend_status_list->Status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_treatmend_status_list->Status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_treatmend_status_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_treatmend_status_list->ExportAll && $view_treatmend_status_list->isExport()) {
	$view_treatmend_status_list->StopRecord = $view_treatmend_status_list->TotalRecords;
} else {

	// Set the last record to display
	if ($view_treatmend_status_list->TotalRecords > $view_treatmend_status_list->StartRecord + $view_treatmend_status_list->DisplayRecords - 1)
		$view_treatmend_status_list->StopRecord = $view_treatmend_status_list->StartRecord + $view_treatmend_status_list->DisplayRecords - 1;
	else
		$view_treatmend_status_list->StopRecord = $view_treatmend_status_list->TotalRecords;
}
$view_treatmend_status_list->RecordCount = $view_treatmend_status_list->StartRecord - 1;
if ($view_treatmend_status_list->Recordset && !$view_treatmend_status_list->Recordset->EOF) {
	$view_treatmend_status_list->Recordset->moveFirst();
	$selectLimit = $view_treatmend_status_list->UseSelectLimit;
	if (!$selectLimit && $view_treatmend_status_list->StartRecord > 1)
		$view_treatmend_status_list->Recordset->move($view_treatmend_status_list->StartRecord - 1);
} elseif (!$view_treatmend_status->AllowAddDeleteRow && $view_treatmend_status_list->StopRecord == 0) {
	$view_treatmend_status_list->StopRecord = $view_treatmend_status->GridAddRowCount;
}

// Initialize aggregate
$view_treatmend_status->RowType = ROWTYPE_AGGREGATEINIT;
$view_treatmend_status->resetAttributes();
$view_treatmend_status_list->renderRow();
while ($view_treatmend_status_list->RecordCount < $view_treatmend_status_list->StopRecord) {
	$view_treatmend_status_list->RecordCount++;
	if ($view_treatmend_status_list->RecordCount >= $view_treatmend_status_list->StartRecord) {
		$view_treatmend_status_list->RowCount++;

		// Set up key count
		$view_treatmend_status_list->KeyCount = $view_treatmend_status_list->RowIndex;

		// Init row class and style
		$view_treatmend_status->resetAttributes();
		$view_treatmend_status->CssClass = "";
		if ($view_treatmend_status_list->isGridAdd()) {
		} else {
			$view_treatmend_status_list->loadRowValues($view_treatmend_status_list->Recordset); // Load row values
		}
		$view_treatmend_status->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_treatmend_status->RowAttrs->merge(["data-rowindex" => $view_treatmend_status_list->RowCount, "id" => "r" . $view_treatmend_status_list->RowCount . "_view_treatmend_status", "data-rowtype" => $view_treatmend_status->RowType]);

		// Render row
		$view_treatmend_status_list->renderRow();

		// Render list options
		$view_treatmend_status_list->renderListOptions();
?>
	<tr <?php echo $view_treatmend_status->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_treatmend_status_list->ListOptions->render("body", "left", $view_treatmend_status_list->RowCount);
?>
	<?php if ($view_treatmend_status_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $view_treatmend_status_list->id->cellAttributes() ?>>
<span id="el<?php echo $view_treatmend_status_list->RowCount ?>_view_treatmend_status_id">
<span<?php echo $view_treatmend_status_list->id->viewAttributes() ?>><?php echo $view_treatmend_status_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_treatmend_status_list->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID" <?php echo $view_treatmend_status_list->PatientID->cellAttributes() ?>>
<span id="el<?php echo $view_treatmend_status_list->RowCount ?>_view_treatmend_status_PatientID">
<span<?php echo $view_treatmend_status_list->PatientID->viewAttributes() ?>><?php echo $view_treatmend_status_list->PatientID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_treatmend_status_list->first_name->Visible) { // first_name ?>
		<td data-name="first_name" <?php echo $view_treatmend_status_list->first_name->cellAttributes() ?>>
<span id="el<?php echo $view_treatmend_status_list->RowCount ?>_view_treatmend_status_first_name">
<span<?php echo $view_treatmend_status_list->first_name->viewAttributes() ?>><?php echo $view_treatmend_status_list->first_name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_treatmend_status_list->mobile_no->Visible) { // mobile_no ?>
		<td data-name="mobile_no" <?php echo $view_treatmend_status_list->mobile_no->cellAttributes() ?>>
<span id="el<?php echo $view_treatmend_status_list->RowCount ?>_view_treatmend_status_mobile_no">
<span<?php echo $view_treatmend_status_list->mobile_no->viewAttributes() ?>><?php echo $view_treatmend_status_list->mobile_no->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_treatmend_status_list->Treatment->Visible) { // Treatment ?>
		<td data-name="Treatment" <?php echo $view_treatmend_status_list->Treatment->cellAttributes() ?>>
<span id="el<?php echo $view_treatmend_status_list->RowCount ?>_view_treatmend_status_Treatment">
<span<?php echo $view_treatmend_status_list->Treatment->viewAttributes() ?>><?php echo $view_treatmend_status_list->Treatment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_treatmend_status_list->Status->Visible) { // Status ?>
		<td data-name="Status" <?php echo $view_treatmend_status_list->Status->cellAttributes() ?>>
<span id="el<?php echo $view_treatmend_status_list->RowCount ?>_view_treatmend_status_Status">
<span<?php echo $view_treatmend_status_list->Status->viewAttributes() ?>><?php echo $view_treatmend_status_list->Status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_treatmend_status_list->ListOptions->render("body", "right", $view_treatmend_status_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$view_treatmend_status_list->isGridAdd())
		$view_treatmend_status_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$view_treatmend_status->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_treatmend_status_list->Recordset)
	$view_treatmend_status_list->Recordset->Close();
?>
<?php if (!$view_treatmend_status_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_treatmend_status_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_treatmend_status_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_treatmend_status_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_treatmend_status_list->TotalRecords == 0 && !$view_treatmend_status->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_treatmend_status_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_treatmend_status_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_treatmend_status_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$view_treatmend_status->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_view_treatmend_status",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$view_treatmend_status_list->terminate();
?>
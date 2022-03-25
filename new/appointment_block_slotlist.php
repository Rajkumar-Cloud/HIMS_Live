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
$appointment_block_slot_list = new appointment_block_slot_list();

// Run the page
$appointment_block_slot_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$appointment_block_slot_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$appointment_block_slot_list->isExport()) { ?>
<script>
var fappointment_block_slotlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fappointment_block_slotlist = currentForm = new ew.Form("fappointment_block_slotlist", "list");
	fappointment_block_slotlist.formKeyCountName = '<?php echo $appointment_block_slot_list->FormKeyCountName ?>';
	loadjs.done("fappointment_block_slotlist");
});
var fappointment_block_slotlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fappointment_block_slotlistsrch = currentSearchForm = new ew.Form("fappointment_block_slotlistsrch");

	// Dynamic selection lists
	// Filters

	fappointment_block_slotlistsrch.filterList = <?php echo $appointment_block_slot_list->getFilterList() ?>;
	loadjs.done("fappointment_block_slotlistsrch");
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
<?php if (!$appointment_block_slot_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($appointment_block_slot_list->TotalRecords > 0 && $appointment_block_slot_list->ExportOptions->visible()) { ?>
<?php $appointment_block_slot_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($appointment_block_slot_list->ImportOptions->visible()) { ?>
<?php $appointment_block_slot_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($appointment_block_slot_list->SearchOptions->visible()) { ?>
<?php $appointment_block_slot_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($appointment_block_slot_list->FilterOptions->visible()) { ?>
<?php $appointment_block_slot_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$appointment_block_slot_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$appointment_block_slot_list->isExport() && !$appointment_block_slot->CurrentAction) { ?>
<form name="fappointment_block_slotlistsrch" id="fappointment_block_slotlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fappointment_block_slotlistsrch-search-panel" class="<?php echo $appointment_block_slot_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="appointment_block_slot">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $appointment_block_slot_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($appointment_block_slot_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($appointment_block_slot_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $appointment_block_slot_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($appointment_block_slot_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($appointment_block_slot_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($appointment_block_slot_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($appointment_block_slot_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $appointment_block_slot_list->showPageHeader(); ?>
<?php
$appointment_block_slot_list->showMessage();
?>
<?php if ($appointment_block_slot_list->TotalRecords > 0 || $appointment_block_slot->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($appointment_block_slot_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> appointment_block_slot">
<?php if (!$appointment_block_slot_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$appointment_block_slot_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $appointment_block_slot_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $appointment_block_slot_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fappointment_block_slotlist" id="fappointment_block_slotlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="appointment_block_slot">
<div id="gmp_appointment_block_slot" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($appointment_block_slot_list->TotalRecords > 0 || $appointment_block_slot_list->isGridEdit()) { ?>
<table id="tbl_appointment_block_slotlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$appointment_block_slot->RowType = ROWTYPE_HEADER;

// Render list options
$appointment_block_slot_list->renderListOptions();

// Render list options (header, left)
$appointment_block_slot_list->ListOptions->render("header", "left");
?>
<?php if ($appointment_block_slot_list->id->Visible) { // id ?>
	<?php if ($appointment_block_slot_list->SortUrl($appointment_block_slot_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $appointment_block_slot_list->id->headerCellClass() ?>"><div id="elh_appointment_block_slot_id" class="appointment_block_slot_id"><div class="ew-table-header-caption"><?php echo $appointment_block_slot_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $appointment_block_slot_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $appointment_block_slot_list->SortUrl($appointment_block_slot_list->id) ?>', 1);"><div id="elh_appointment_block_slot_id" class="appointment_block_slot_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_block_slot_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($appointment_block_slot_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_block_slot_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_block_slot_list->Drid->Visible) { // Drid ?>
	<?php if ($appointment_block_slot_list->SortUrl($appointment_block_slot_list->Drid) == "") { ?>
		<th data-name="Drid" class="<?php echo $appointment_block_slot_list->Drid->headerCellClass() ?>"><div id="elh_appointment_block_slot_Drid" class="appointment_block_slot_Drid"><div class="ew-table-header-caption"><?php echo $appointment_block_slot_list->Drid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Drid" class="<?php echo $appointment_block_slot_list->Drid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $appointment_block_slot_list->SortUrl($appointment_block_slot_list->Drid) ?>', 1);"><div id="elh_appointment_block_slot_Drid" class="appointment_block_slot_Drid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_block_slot_list->Drid->caption() ?></span><span class="ew-table-header-sort"><?php if ($appointment_block_slot_list->Drid->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_block_slot_list->Drid->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_block_slot_list->DrName->Visible) { // DrName ?>
	<?php if ($appointment_block_slot_list->SortUrl($appointment_block_slot_list->DrName) == "") { ?>
		<th data-name="DrName" class="<?php echo $appointment_block_slot_list->DrName->headerCellClass() ?>"><div id="elh_appointment_block_slot_DrName" class="appointment_block_slot_DrName"><div class="ew-table-header-caption"><?php echo $appointment_block_slot_list->DrName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrName" class="<?php echo $appointment_block_slot_list->DrName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $appointment_block_slot_list->SortUrl($appointment_block_slot_list->DrName) ?>', 1);"><div id="elh_appointment_block_slot_DrName" class="appointment_block_slot_DrName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_block_slot_list->DrName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($appointment_block_slot_list->DrName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_block_slot_list->DrName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_block_slot_list->Details->Visible) { // Details ?>
	<?php if ($appointment_block_slot_list->SortUrl($appointment_block_slot_list->Details) == "") { ?>
		<th data-name="Details" class="<?php echo $appointment_block_slot_list->Details->headerCellClass() ?>"><div id="elh_appointment_block_slot_Details" class="appointment_block_slot_Details"><div class="ew-table-header-caption"><?php echo $appointment_block_slot_list->Details->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Details" class="<?php echo $appointment_block_slot_list->Details->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $appointment_block_slot_list->SortUrl($appointment_block_slot_list->Details) ?>', 1);"><div id="elh_appointment_block_slot_Details" class="appointment_block_slot_Details">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_block_slot_list->Details->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($appointment_block_slot_list->Details->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_block_slot_list->Details->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_block_slot_list->BlockType->Visible) { // BlockType ?>
	<?php if ($appointment_block_slot_list->SortUrl($appointment_block_slot_list->BlockType) == "") { ?>
		<th data-name="BlockType" class="<?php echo $appointment_block_slot_list->BlockType->headerCellClass() ?>"><div id="elh_appointment_block_slot_BlockType" class="appointment_block_slot_BlockType"><div class="ew-table-header-caption"><?php echo $appointment_block_slot_list->BlockType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BlockType" class="<?php echo $appointment_block_slot_list->BlockType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $appointment_block_slot_list->SortUrl($appointment_block_slot_list->BlockType) ?>', 1);"><div id="elh_appointment_block_slot_BlockType" class="appointment_block_slot_BlockType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_block_slot_list->BlockType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($appointment_block_slot_list->BlockType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_block_slot_list->BlockType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_block_slot_list->FromDate->Visible) { // FromDate ?>
	<?php if ($appointment_block_slot_list->SortUrl($appointment_block_slot_list->FromDate) == "") { ?>
		<th data-name="FromDate" class="<?php echo $appointment_block_slot_list->FromDate->headerCellClass() ?>"><div id="elh_appointment_block_slot_FromDate" class="appointment_block_slot_FromDate"><div class="ew-table-header-caption"><?php echo $appointment_block_slot_list->FromDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FromDate" class="<?php echo $appointment_block_slot_list->FromDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $appointment_block_slot_list->SortUrl($appointment_block_slot_list->FromDate) ?>', 1);"><div id="elh_appointment_block_slot_FromDate" class="appointment_block_slot_FromDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_block_slot_list->FromDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($appointment_block_slot_list->FromDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_block_slot_list->FromDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_block_slot_list->ToDate->Visible) { // ToDate ?>
	<?php if ($appointment_block_slot_list->SortUrl($appointment_block_slot_list->ToDate) == "") { ?>
		<th data-name="ToDate" class="<?php echo $appointment_block_slot_list->ToDate->headerCellClass() ?>"><div id="elh_appointment_block_slot_ToDate" class="appointment_block_slot_ToDate"><div class="ew-table-header-caption"><?php echo $appointment_block_slot_list->ToDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ToDate" class="<?php echo $appointment_block_slot_list->ToDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $appointment_block_slot_list->SortUrl($appointment_block_slot_list->ToDate) ?>', 1);"><div id="elh_appointment_block_slot_ToDate" class="appointment_block_slot_ToDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_block_slot_list->ToDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($appointment_block_slot_list->ToDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_block_slot_list->ToDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_block_slot_list->FromTime->Visible) { // FromTime ?>
	<?php if ($appointment_block_slot_list->SortUrl($appointment_block_slot_list->FromTime) == "") { ?>
		<th data-name="FromTime" class="<?php echo $appointment_block_slot_list->FromTime->headerCellClass() ?>"><div id="elh_appointment_block_slot_FromTime" class="appointment_block_slot_FromTime"><div class="ew-table-header-caption"><?php echo $appointment_block_slot_list->FromTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FromTime" class="<?php echo $appointment_block_slot_list->FromTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $appointment_block_slot_list->SortUrl($appointment_block_slot_list->FromTime) ?>', 1);"><div id="elh_appointment_block_slot_FromTime" class="appointment_block_slot_FromTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_block_slot_list->FromTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($appointment_block_slot_list->FromTime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_block_slot_list->FromTime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_block_slot_list->ToTime->Visible) { // ToTime ?>
	<?php if ($appointment_block_slot_list->SortUrl($appointment_block_slot_list->ToTime) == "") { ?>
		<th data-name="ToTime" class="<?php echo $appointment_block_slot_list->ToTime->headerCellClass() ?>"><div id="elh_appointment_block_slot_ToTime" class="appointment_block_slot_ToTime"><div class="ew-table-header-caption"><?php echo $appointment_block_slot_list->ToTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ToTime" class="<?php echo $appointment_block_slot_list->ToTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $appointment_block_slot_list->SortUrl($appointment_block_slot_list->ToTime) ?>', 1);"><div id="elh_appointment_block_slot_ToTime" class="appointment_block_slot_ToTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_block_slot_list->ToTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($appointment_block_slot_list->ToTime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_block_slot_list->ToTime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$appointment_block_slot_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($appointment_block_slot_list->ExportAll && $appointment_block_slot_list->isExport()) {
	$appointment_block_slot_list->StopRecord = $appointment_block_slot_list->TotalRecords;
} else {

	// Set the last record to display
	if ($appointment_block_slot_list->TotalRecords > $appointment_block_slot_list->StartRecord + $appointment_block_slot_list->DisplayRecords - 1)
		$appointment_block_slot_list->StopRecord = $appointment_block_slot_list->StartRecord + $appointment_block_slot_list->DisplayRecords - 1;
	else
		$appointment_block_slot_list->StopRecord = $appointment_block_slot_list->TotalRecords;
}
$appointment_block_slot_list->RecordCount = $appointment_block_slot_list->StartRecord - 1;
if ($appointment_block_slot_list->Recordset && !$appointment_block_slot_list->Recordset->EOF) {
	$appointment_block_slot_list->Recordset->moveFirst();
	$selectLimit = $appointment_block_slot_list->UseSelectLimit;
	if (!$selectLimit && $appointment_block_slot_list->StartRecord > 1)
		$appointment_block_slot_list->Recordset->move($appointment_block_slot_list->StartRecord - 1);
} elseif (!$appointment_block_slot->AllowAddDeleteRow && $appointment_block_slot_list->StopRecord == 0) {
	$appointment_block_slot_list->StopRecord = $appointment_block_slot->GridAddRowCount;
}

// Initialize aggregate
$appointment_block_slot->RowType = ROWTYPE_AGGREGATEINIT;
$appointment_block_slot->resetAttributes();
$appointment_block_slot_list->renderRow();
while ($appointment_block_slot_list->RecordCount < $appointment_block_slot_list->StopRecord) {
	$appointment_block_slot_list->RecordCount++;
	if ($appointment_block_slot_list->RecordCount >= $appointment_block_slot_list->StartRecord) {
		$appointment_block_slot_list->RowCount++;

		// Set up key count
		$appointment_block_slot_list->KeyCount = $appointment_block_slot_list->RowIndex;

		// Init row class and style
		$appointment_block_slot->resetAttributes();
		$appointment_block_slot->CssClass = "";
		if ($appointment_block_slot_list->isGridAdd()) {
		} else {
			$appointment_block_slot_list->loadRowValues($appointment_block_slot_list->Recordset); // Load row values
		}
		$appointment_block_slot->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$appointment_block_slot->RowAttrs->merge(["data-rowindex" => $appointment_block_slot_list->RowCount, "id" => "r" . $appointment_block_slot_list->RowCount . "_appointment_block_slot", "data-rowtype" => $appointment_block_slot->RowType]);

		// Render row
		$appointment_block_slot_list->renderRow();

		// Render list options
		$appointment_block_slot_list->renderListOptions();
?>
	<tr <?php echo $appointment_block_slot->rowAttributes() ?>>
<?php

// Render list options (body, left)
$appointment_block_slot_list->ListOptions->render("body", "left", $appointment_block_slot_list->RowCount);
?>
	<?php if ($appointment_block_slot_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $appointment_block_slot_list->id->cellAttributes() ?>>
<span id="el<?php echo $appointment_block_slot_list->RowCount ?>_appointment_block_slot_id">
<span<?php echo $appointment_block_slot_list->id->viewAttributes() ?>><?php echo $appointment_block_slot_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($appointment_block_slot_list->Drid->Visible) { // Drid ?>
		<td data-name="Drid" <?php echo $appointment_block_slot_list->Drid->cellAttributes() ?>>
<span id="el<?php echo $appointment_block_slot_list->RowCount ?>_appointment_block_slot_Drid">
<span<?php echo $appointment_block_slot_list->Drid->viewAttributes() ?>><?php echo $appointment_block_slot_list->Drid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($appointment_block_slot_list->DrName->Visible) { // DrName ?>
		<td data-name="DrName" <?php echo $appointment_block_slot_list->DrName->cellAttributes() ?>>
<span id="el<?php echo $appointment_block_slot_list->RowCount ?>_appointment_block_slot_DrName">
<span<?php echo $appointment_block_slot_list->DrName->viewAttributes() ?>><?php echo $appointment_block_slot_list->DrName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($appointment_block_slot_list->Details->Visible) { // Details ?>
		<td data-name="Details" <?php echo $appointment_block_slot_list->Details->cellAttributes() ?>>
<span id="el<?php echo $appointment_block_slot_list->RowCount ?>_appointment_block_slot_Details">
<span<?php echo $appointment_block_slot_list->Details->viewAttributes() ?>><?php echo $appointment_block_slot_list->Details->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($appointment_block_slot_list->BlockType->Visible) { // BlockType ?>
		<td data-name="BlockType" <?php echo $appointment_block_slot_list->BlockType->cellAttributes() ?>>
<span id="el<?php echo $appointment_block_slot_list->RowCount ?>_appointment_block_slot_BlockType">
<span<?php echo $appointment_block_slot_list->BlockType->viewAttributes() ?>><?php echo $appointment_block_slot_list->BlockType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($appointment_block_slot_list->FromDate->Visible) { // FromDate ?>
		<td data-name="FromDate" <?php echo $appointment_block_slot_list->FromDate->cellAttributes() ?>>
<span id="el<?php echo $appointment_block_slot_list->RowCount ?>_appointment_block_slot_FromDate">
<span<?php echo $appointment_block_slot_list->FromDate->viewAttributes() ?>><?php echo $appointment_block_slot_list->FromDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($appointment_block_slot_list->ToDate->Visible) { // ToDate ?>
		<td data-name="ToDate" <?php echo $appointment_block_slot_list->ToDate->cellAttributes() ?>>
<span id="el<?php echo $appointment_block_slot_list->RowCount ?>_appointment_block_slot_ToDate">
<span<?php echo $appointment_block_slot_list->ToDate->viewAttributes() ?>><?php echo $appointment_block_slot_list->ToDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($appointment_block_slot_list->FromTime->Visible) { // FromTime ?>
		<td data-name="FromTime" <?php echo $appointment_block_slot_list->FromTime->cellAttributes() ?>>
<span id="el<?php echo $appointment_block_slot_list->RowCount ?>_appointment_block_slot_FromTime">
<span<?php echo $appointment_block_slot_list->FromTime->viewAttributes() ?>><?php echo $appointment_block_slot_list->FromTime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($appointment_block_slot_list->ToTime->Visible) { // ToTime ?>
		<td data-name="ToTime" <?php echo $appointment_block_slot_list->ToTime->cellAttributes() ?>>
<span id="el<?php echo $appointment_block_slot_list->RowCount ?>_appointment_block_slot_ToTime">
<span<?php echo $appointment_block_slot_list->ToTime->viewAttributes() ?>><?php echo $appointment_block_slot_list->ToTime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$appointment_block_slot_list->ListOptions->render("body", "right", $appointment_block_slot_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$appointment_block_slot_list->isGridAdd())
		$appointment_block_slot_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$appointment_block_slot->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($appointment_block_slot_list->Recordset)
	$appointment_block_slot_list->Recordset->Close();
?>
<?php if (!$appointment_block_slot_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$appointment_block_slot_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $appointment_block_slot_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $appointment_block_slot_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($appointment_block_slot_list->TotalRecords == 0 && !$appointment_block_slot->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $appointment_block_slot_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$appointment_block_slot_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$appointment_block_slot_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$appointment_block_slot->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_appointment_block_slot",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$appointment_block_slot_list->terminate();
?>
<?php
namespace PHPMaker2019\HIMS;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start(); 

// Autoload
include_once "autoload.php";
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$room_master_list = new room_master_list();

// Run the page
$room_master_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$room_master_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$room_master->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var froom_masterlist = currentForm = new ew.Form("froom_masterlist", "list");
froom_masterlist.formKeyCountName = '<?php echo $room_master_list->FormKeyCountName ?>';

// Form_CustomValidate event
froom_masterlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
froom_masterlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
froom_masterlist.lists["x_RoomType"] = <?php echo $room_master_list->RoomType->Lookup->toClientList() ?>;
froom_masterlist.lists["x_RoomType"].options = <?php echo JsonEncode($room_master_list->RoomType->lookupOptions()) ?>;
froom_masterlist.lists["x_SharingRoom"] = <?php echo $room_master_list->SharingRoom->Lookup->toClientList() ?>;
froom_masterlist.lists["x_SharingRoom"].options = <?php echo JsonEncode($room_master_list->SharingRoom->options(FALSE, TRUE)) ?>;
froom_masterlist.lists["x_Status"] = <?php echo $room_master_list->Status->Lookup->toClientList() ?>;
froom_masterlist.lists["x_Status"].options = <?php echo JsonEncode($room_master_list->Status->options(FALSE, TRUE)) ?>;

// Form object for search
var froom_masterlistsrch = currentSearchForm = new ew.Form("froom_masterlistsrch");

// Filters
froom_masterlistsrch.filterList = <?php echo $room_master_list->getFilterList() ?>;
</script>
<script src="phpjs/ewscrolltable.js"></script>
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
<script src="phpjs/ewpreview.js"></script>
<script>
ew.PREVIEW_PLACEMENT = ew.CSS_FLIP ? "left" : "right";
ew.PREVIEW_SINGLE_ROW = false;
ew.PREVIEW_OVERLAY = false;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$room_master->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($room_master_list->TotalRecs > 0 && $room_master_list->ExportOptions->visible()) { ?>
<?php $room_master_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($room_master_list->ImportOptions->visible()) { ?>
<?php $room_master_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($room_master_list->SearchOptions->visible()) { ?>
<?php $room_master_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($room_master_list->FilterOptions->visible()) { ?>
<?php $room_master_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$room_master_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$room_master->isExport() && !$room_master->CurrentAction) { ?>
<form name="froom_masterlistsrch" id="froom_masterlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($room_master_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="froom_masterlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="room_master">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($room_master_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($room_master_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $room_master_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($room_master_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($room_master_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($room_master_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($room_master_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $room_master_list->showPageHeader(); ?>
<?php
$room_master_list->showMessage();
?>
<?php if ($room_master_list->TotalRecs > 0 || $room_master->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($room_master_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> room_master">
<?php if (!$room_master->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$room_master->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($room_master_list->Pager)) $room_master_list->Pager = new NumericPager($room_master_list->StartRec, $room_master_list->DisplayRecs, $room_master_list->TotalRecs, $room_master_list->RecRange, $room_master_list->AutoHidePager) ?>
<?php if ($room_master_list->Pager->RecordCount > 0 && $room_master_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($room_master_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $room_master_list->pageUrl() ?>start=<?php echo $room_master_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($room_master_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $room_master_list->pageUrl() ?>start=<?php echo $room_master_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($room_master_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $room_master_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($room_master_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $room_master_list->pageUrl() ?>start=<?php echo $room_master_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($room_master_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $room_master_list->pageUrl() ?>start=<?php echo $room_master_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($room_master_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $room_master_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $room_master_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $room_master_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($room_master_list->TotalRecs > 0 && (!$room_master_list->AutoHidePageSizeSelector || $room_master_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="room_master">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($room_master_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($room_master_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($room_master_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($room_master_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($room_master_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($room_master_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($room_master->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $room_master_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="froom_masterlist" id="froom_masterlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($room_master_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $room_master_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="room_master">
<div id="gmp_room_master" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($room_master_list->TotalRecs > 0 || $room_master->isGridEdit()) { ?>
<table id="tbl_room_masterlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$room_master_list->RowType = ROWTYPE_HEADER;

// Render list options
$room_master_list->renderListOptions();

// Render list options (header, left)
$room_master_list->ListOptions->render("header", "left");
?>
<?php if ($room_master->id->Visible) { // id ?>
	<?php if ($room_master->sortUrl($room_master->id) == "") { ?>
		<th data-name="id" class="<?php echo $room_master->id->headerCellClass() ?>"><div id="elh_room_master_id" class="room_master_id"><div class="ew-table-header-caption"><?php echo $room_master->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $room_master->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $room_master->SortUrl($room_master->id) ?>',1);"><div id="elh_room_master_id" class="room_master_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $room_master->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($room_master->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($room_master->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($room_master->RoomNo->Visible) { // RoomNo ?>
	<?php if ($room_master->sortUrl($room_master->RoomNo) == "") { ?>
		<th data-name="RoomNo" class="<?php echo $room_master->RoomNo->headerCellClass() ?>"><div id="elh_room_master_RoomNo" class="room_master_RoomNo"><div class="ew-table-header-caption"><?php echo $room_master->RoomNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RoomNo" class="<?php echo $room_master->RoomNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $room_master->SortUrl($room_master->RoomNo) ?>',1);"><div id="elh_room_master_RoomNo" class="room_master_RoomNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $room_master->RoomNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($room_master->RoomNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($room_master->RoomNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($room_master->RoomType->Visible) { // RoomType ?>
	<?php if ($room_master->sortUrl($room_master->RoomType) == "") { ?>
		<th data-name="RoomType" class="<?php echo $room_master->RoomType->headerCellClass() ?>"><div id="elh_room_master_RoomType" class="room_master_RoomType"><div class="ew-table-header-caption"><?php echo $room_master->RoomType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RoomType" class="<?php echo $room_master->RoomType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $room_master->SortUrl($room_master->RoomType) ?>',1);"><div id="elh_room_master_RoomType" class="room_master_RoomType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $room_master->RoomType->caption() ?></span><span class="ew-table-header-sort"><?php if ($room_master->RoomType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($room_master->RoomType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($room_master->SharingRoom->Visible) { // SharingRoom ?>
	<?php if ($room_master->sortUrl($room_master->SharingRoom) == "") { ?>
		<th data-name="SharingRoom" class="<?php echo $room_master->SharingRoom->headerCellClass() ?>"><div id="elh_room_master_SharingRoom" class="room_master_SharingRoom"><div class="ew-table-header-caption"><?php echo $room_master->SharingRoom->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SharingRoom" class="<?php echo $room_master->SharingRoom->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $room_master->SortUrl($room_master->SharingRoom) ?>',1);"><div id="elh_room_master_SharingRoom" class="room_master_SharingRoom">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $room_master->SharingRoom->caption() ?></span><span class="ew-table-header-sort"><?php if ($room_master->SharingRoom->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($room_master->SharingRoom->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($room_master->Amount->Visible) { // Amount ?>
	<?php if ($room_master->sortUrl($room_master->Amount) == "") { ?>
		<th data-name="Amount" class="<?php echo $room_master->Amount->headerCellClass() ?>"><div id="elh_room_master_Amount" class="room_master_Amount"><div class="ew-table-header-caption"><?php echo $room_master->Amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Amount" class="<?php echo $room_master->Amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $room_master->SortUrl($room_master->Amount) ?>',1);"><div id="elh_room_master_Amount" class="room_master_Amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $room_master->Amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($room_master->Amount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($room_master->Amount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($room_master->Status->Visible) { // Status ?>
	<?php if ($room_master->sortUrl($room_master->Status) == "") { ?>
		<th data-name="Status" class="<?php echo $room_master->Status->headerCellClass() ?>"><div id="elh_room_master_Status" class="room_master_Status"><div class="ew-table-header-caption"><?php echo $room_master->Status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Status" class="<?php echo $room_master->Status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $room_master->SortUrl($room_master->Status) ?>',1);"><div id="elh_room_master_Status" class="room_master_Status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $room_master->Status->caption() ?></span><span class="ew-table-header-sort"><?php if ($room_master->Status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($room_master->Status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$room_master_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($room_master->ExportAll && $room_master->isExport()) {
	$room_master_list->StopRec = $room_master_list->TotalRecs;
} else {

	// Set the last record to display
	if ($room_master_list->TotalRecs > $room_master_list->StartRec + $room_master_list->DisplayRecs - 1)
		$room_master_list->StopRec = $room_master_list->StartRec + $room_master_list->DisplayRecs - 1;
	else
		$room_master_list->StopRec = $room_master_list->TotalRecs;
}
$room_master_list->RecCnt = $room_master_list->StartRec - 1;
if ($room_master_list->Recordset && !$room_master_list->Recordset->EOF) {
	$room_master_list->Recordset->moveFirst();
	$selectLimit = $room_master_list->UseSelectLimit;
	if (!$selectLimit && $room_master_list->StartRec > 1)
		$room_master_list->Recordset->move($room_master_list->StartRec - 1);
} elseif (!$room_master->AllowAddDeleteRow && $room_master_list->StopRec == 0) {
	$room_master_list->StopRec = $room_master->GridAddRowCount;
}

// Initialize aggregate
$room_master->RowType = ROWTYPE_AGGREGATEINIT;
$room_master->resetAttributes();
$room_master_list->renderRow();
while ($room_master_list->RecCnt < $room_master_list->StopRec) {
	$room_master_list->RecCnt++;
	if ($room_master_list->RecCnt >= $room_master_list->StartRec) {
		$room_master_list->RowCnt++;

		// Set up key count
		$room_master_list->KeyCount = $room_master_list->RowIndex;

		// Init row class and style
		$room_master->resetAttributes();
		$room_master->CssClass = "";
		if ($room_master->isGridAdd()) {
		} else {
			$room_master_list->loadRowValues($room_master_list->Recordset); // Load row values
		}
		$room_master->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$room_master->RowAttrs = array_merge($room_master->RowAttrs, array('data-rowindex'=>$room_master_list->RowCnt, 'id'=>'r' . $room_master_list->RowCnt . '_room_master', 'data-rowtype'=>$room_master->RowType));

		// Render row
		$room_master_list->renderRow();

		// Render list options
		$room_master_list->renderListOptions();
?>
	<tr<?php echo $room_master->rowAttributes() ?>>
<?php

// Render list options (body, left)
$room_master_list->ListOptions->render("body", "left", $room_master_list->RowCnt);
?>
	<?php if ($room_master->id->Visible) { // id ?>
		<td data-name="id"<?php echo $room_master->id->cellAttributes() ?>>
<span id="el<?php echo $room_master_list->RowCnt ?>_room_master_id" class="room_master_id">
<span<?php echo $room_master->id->viewAttributes() ?>>
<?php echo $room_master->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($room_master->RoomNo->Visible) { // RoomNo ?>
		<td data-name="RoomNo"<?php echo $room_master->RoomNo->cellAttributes() ?>>
<span id="el<?php echo $room_master_list->RowCnt ?>_room_master_RoomNo" class="room_master_RoomNo">
<span<?php echo $room_master->RoomNo->viewAttributes() ?>>
<?php echo $room_master->RoomNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($room_master->RoomType->Visible) { // RoomType ?>
		<td data-name="RoomType"<?php echo $room_master->RoomType->cellAttributes() ?>>
<span id="el<?php echo $room_master_list->RowCnt ?>_room_master_RoomType" class="room_master_RoomType">
<span<?php echo $room_master->RoomType->viewAttributes() ?>>
<?php echo $room_master->RoomType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($room_master->SharingRoom->Visible) { // SharingRoom ?>
		<td data-name="SharingRoom"<?php echo $room_master->SharingRoom->cellAttributes() ?>>
<span id="el<?php echo $room_master_list->RowCnt ?>_room_master_SharingRoom" class="room_master_SharingRoom">
<span<?php echo $room_master->SharingRoom->viewAttributes() ?>>
<?php echo $room_master->SharingRoom->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($room_master->Amount->Visible) { // Amount ?>
		<td data-name="Amount"<?php echo $room_master->Amount->cellAttributes() ?>>
<span id="el<?php echo $room_master_list->RowCnt ?>_room_master_Amount" class="room_master_Amount">
<span<?php echo $room_master->Amount->viewAttributes() ?>>
<?php echo $room_master->Amount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($room_master->Status->Visible) { // Status ?>
		<td data-name="Status"<?php echo $room_master->Status->cellAttributes() ?>>
<span id="el<?php echo $room_master_list->RowCnt ?>_room_master_Status" class="room_master_Status">
<span<?php echo $room_master->Status->viewAttributes() ?>>
<?php echo $room_master->Status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$room_master_list->ListOptions->render("body", "right", $room_master_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$room_master->isGridAdd())
		$room_master_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$room_master->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($room_master_list->Recordset)
	$room_master_list->Recordset->Close();
?>
<?php if (!$room_master->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$room_master->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($room_master_list->Pager)) $room_master_list->Pager = new NumericPager($room_master_list->StartRec, $room_master_list->DisplayRecs, $room_master_list->TotalRecs, $room_master_list->RecRange, $room_master_list->AutoHidePager) ?>
<?php if ($room_master_list->Pager->RecordCount > 0 && $room_master_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($room_master_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $room_master_list->pageUrl() ?>start=<?php echo $room_master_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($room_master_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $room_master_list->pageUrl() ?>start=<?php echo $room_master_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($room_master_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $room_master_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($room_master_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $room_master_list->pageUrl() ?>start=<?php echo $room_master_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($room_master_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $room_master_list->pageUrl() ?>start=<?php echo $room_master_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($room_master_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $room_master_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $room_master_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $room_master_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($room_master_list->TotalRecs > 0 && (!$room_master_list->AutoHidePageSizeSelector || $room_master_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="room_master">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($room_master_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($room_master_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($room_master_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($room_master_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($room_master_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($room_master_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($room_master->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $room_master_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($room_master_list->TotalRecs == 0 && !$room_master->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $room_master_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$room_master_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$room_master->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$room_master->isExport()) { ?>
<script>
ew.scrollableTable("gmp_room_master", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$room_master_list->terminate();
?>
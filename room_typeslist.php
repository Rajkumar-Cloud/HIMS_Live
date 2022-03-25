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
$room_types_list = new room_types_list();

// Run the page
$room_types_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$room_types_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$room_types->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var froom_typeslist = currentForm = new ew.Form("froom_typeslist", "list");
froom_typeslist.formKeyCountName = '<?php echo $room_types_list->FormKeyCountName ?>';

// Form_CustomValidate event
froom_typeslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
froom_typeslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var froom_typeslistsrch = currentSearchForm = new ew.Form("froom_typeslistsrch");

// Filters
froom_typeslistsrch.filterList = <?php echo $room_types_list->getFilterList() ?>;
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
<?php if (!$room_types->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($room_types_list->TotalRecs > 0 && $room_types_list->ExportOptions->visible()) { ?>
<?php $room_types_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($room_types_list->ImportOptions->visible()) { ?>
<?php $room_types_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($room_types_list->SearchOptions->visible()) { ?>
<?php $room_types_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($room_types_list->FilterOptions->visible()) { ?>
<?php $room_types_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$room_types_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$room_types->isExport() && !$room_types->CurrentAction) { ?>
<form name="froom_typeslistsrch" id="froom_typeslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($room_types_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="froom_typeslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="room_types">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($room_types_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($room_types_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $room_types_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($room_types_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($room_types_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($room_types_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($room_types_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $room_types_list->showPageHeader(); ?>
<?php
$room_types_list->showMessage();
?>
<?php if ($room_types_list->TotalRecs > 0 || $room_types->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($room_types_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> room_types">
<?php if (!$room_types->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$room_types->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($room_types_list->Pager)) $room_types_list->Pager = new NumericPager($room_types_list->StartRec, $room_types_list->DisplayRecs, $room_types_list->TotalRecs, $room_types_list->RecRange, $room_types_list->AutoHidePager) ?>
<?php if ($room_types_list->Pager->RecordCount > 0 && $room_types_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($room_types_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $room_types_list->pageUrl() ?>start=<?php echo $room_types_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($room_types_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $room_types_list->pageUrl() ?>start=<?php echo $room_types_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($room_types_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $room_types_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($room_types_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $room_types_list->pageUrl() ?>start=<?php echo $room_types_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($room_types_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $room_types_list->pageUrl() ?>start=<?php echo $room_types_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($room_types_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $room_types_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $room_types_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $room_types_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($room_types_list->TotalRecs > 0 && (!$room_types_list->AutoHidePageSizeSelector || $room_types_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="room_types">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($room_types_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($room_types_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($room_types_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($room_types_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($room_types_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($room_types_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($room_types->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $room_types_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="froom_typeslist" id="froom_typeslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($room_types_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $room_types_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="room_types">
<div id="gmp_room_types" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($room_types_list->TotalRecs > 0 || $room_types->isGridEdit()) { ?>
<table id="tbl_room_typeslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$room_types_list->RowType = ROWTYPE_HEADER;

// Render list options
$room_types_list->renderListOptions();

// Render list options (header, left)
$room_types_list->ListOptions->render("header", "left");
?>
<?php if ($room_types->Id->Visible) { // Id ?>
	<?php if ($room_types->sortUrl($room_types->Id) == "") { ?>
		<th data-name="Id" class="<?php echo $room_types->Id->headerCellClass() ?>"><div id="elh_room_types_Id" class="room_types_Id"><div class="ew-table-header-caption"><?php echo $room_types->Id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Id" class="<?php echo $room_types->Id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $room_types->SortUrl($room_types->Id) ?>',1);"><div id="elh_room_types_Id" class="room_types_Id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $room_types->Id->caption() ?></span><span class="ew-table-header-sort"><?php if ($room_types->Id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($room_types->Id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($room_types->Types->Visible) { // Types ?>
	<?php if ($room_types->sortUrl($room_types->Types) == "") { ?>
		<th data-name="Types" class="<?php echo $room_types->Types->headerCellClass() ?>"><div id="elh_room_types_Types" class="room_types_Types"><div class="ew-table-header-caption"><?php echo $room_types->Types->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Types" class="<?php echo $room_types->Types->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $room_types->SortUrl($room_types->Types) ?>',1);"><div id="elh_room_types_Types" class="room_types_Types">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $room_types->Types->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($room_types->Types->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($room_types->Types->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$room_types_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($room_types->ExportAll && $room_types->isExport()) {
	$room_types_list->StopRec = $room_types_list->TotalRecs;
} else {

	// Set the last record to display
	if ($room_types_list->TotalRecs > $room_types_list->StartRec + $room_types_list->DisplayRecs - 1)
		$room_types_list->StopRec = $room_types_list->StartRec + $room_types_list->DisplayRecs - 1;
	else
		$room_types_list->StopRec = $room_types_list->TotalRecs;
}
$room_types_list->RecCnt = $room_types_list->StartRec - 1;
if ($room_types_list->Recordset && !$room_types_list->Recordset->EOF) {
	$room_types_list->Recordset->moveFirst();
	$selectLimit = $room_types_list->UseSelectLimit;
	if (!$selectLimit && $room_types_list->StartRec > 1)
		$room_types_list->Recordset->move($room_types_list->StartRec - 1);
} elseif (!$room_types->AllowAddDeleteRow && $room_types_list->StopRec == 0) {
	$room_types_list->StopRec = $room_types->GridAddRowCount;
}

// Initialize aggregate
$room_types->RowType = ROWTYPE_AGGREGATEINIT;
$room_types->resetAttributes();
$room_types_list->renderRow();
while ($room_types_list->RecCnt < $room_types_list->StopRec) {
	$room_types_list->RecCnt++;
	if ($room_types_list->RecCnt >= $room_types_list->StartRec) {
		$room_types_list->RowCnt++;

		// Set up key count
		$room_types_list->KeyCount = $room_types_list->RowIndex;

		// Init row class and style
		$room_types->resetAttributes();
		$room_types->CssClass = "";
		if ($room_types->isGridAdd()) {
		} else {
			$room_types_list->loadRowValues($room_types_list->Recordset); // Load row values
		}
		$room_types->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$room_types->RowAttrs = array_merge($room_types->RowAttrs, array('data-rowindex'=>$room_types_list->RowCnt, 'id'=>'r' . $room_types_list->RowCnt . '_room_types', 'data-rowtype'=>$room_types->RowType));

		// Render row
		$room_types_list->renderRow();

		// Render list options
		$room_types_list->renderListOptions();
?>
	<tr<?php echo $room_types->rowAttributes() ?>>
<?php

// Render list options (body, left)
$room_types_list->ListOptions->render("body", "left", $room_types_list->RowCnt);
?>
	<?php if ($room_types->Id->Visible) { // Id ?>
		<td data-name="Id"<?php echo $room_types->Id->cellAttributes() ?>>
<span id="el<?php echo $room_types_list->RowCnt ?>_room_types_Id" class="room_types_Id">
<span<?php echo $room_types->Id->viewAttributes() ?>>
<?php echo $room_types->Id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($room_types->Types->Visible) { // Types ?>
		<td data-name="Types"<?php echo $room_types->Types->cellAttributes() ?>>
<span id="el<?php echo $room_types_list->RowCnt ?>_room_types_Types" class="room_types_Types">
<span<?php echo $room_types->Types->viewAttributes() ?>>
<?php echo $room_types->Types->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$room_types_list->ListOptions->render("body", "right", $room_types_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$room_types->isGridAdd())
		$room_types_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$room_types->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($room_types_list->Recordset)
	$room_types_list->Recordset->Close();
?>
<?php if (!$room_types->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$room_types->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($room_types_list->Pager)) $room_types_list->Pager = new NumericPager($room_types_list->StartRec, $room_types_list->DisplayRecs, $room_types_list->TotalRecs, $room_types_list->RecRange, $room_types_list->AutoHidePager) ?>
<?php if ($room_types_list->Pager->RecordCount > 0 && $room_types_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($room_types_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $room_types_list->pageUrl() ?>start=<?php echo $room_types_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($room_types_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $room_types_list->pageUrl() ?>start=<?php echo $room_types_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($room_types_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $room_types_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($room_types_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $room_types_list->pageUrl() ?>start=<?php echo $room_types_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($room_types_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $room_types_list->pageUrl() ?>start=<?php echo $room_types_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($room_types_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $room_types_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $room_types_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $room_types_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($room_types_list->TotalRecs > 0 && (!$room_types_list->AutoHidePageSizeSelector || $room_types_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="room_types">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($room_types_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($room_types_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($room_types_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($room_types_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($room_types_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($room_types_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($room_types->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $room_types_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($room_types_list->TotalRecs == 0 && !$room_types->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $room_types_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$room_types_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$room_types->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$room_types->isExport()) { ?>
<script>
ew.scrollableTable("gmp_room_types", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$room_types_list->terminate();
?>
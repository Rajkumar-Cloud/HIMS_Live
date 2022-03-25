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
$sys_days_list = new sys_days_list();

// Run the page
$sys_days_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sys_days_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$sys_days->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fsys_dayslist = currentForm = new ew.Form("fsys_dayslist", "list");
fsys_dayslist.formKeyCountName = '<?php echo $sys_days_list->FormKeyCountName ?>';

// Form_CustomValidate event
fsys_dayslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fsys_dayslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fsys_dayslistsrch = currentSearchForm = new ew.Form("fsys_dayslistsrch");

// Filters
fsys_dayslistsrch.filterList = <?php echo $sys_days_list->getFilterList() ?>;
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
<?php if (!$sys_days->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($sys_days_list->TotalRecs > 0 && $sys_days_list->ExportOptions->visible()) { ?>
<?php $sys_days_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($sys_days_list->ImportOptions->visible()) { ?>
<?php $sys_days_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($sys_days_list->SearchOptions->visible()) { ?>
<?php $sys_days_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($sys_days_list->FilterOptions->visible()) { ?>
<?php $sys_days_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$sys_days_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$sys_days->isExport() && !$sys_days->CurrentAction) { ?>
<form name="fsys_dayslistsrch" id="fsys_dayslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($sys_days_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fsys_dayslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="sys_days">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($sys_days_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($sys_days_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $sys_days_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($sys_days_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($sys_days_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($sys_days_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($sys_days_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $sys_days_list->showPageHeader(); ?>
<?php
$sys_days_list->showMessage();
?>
<?php if ($sys_days_list->TotalRecs > 0 || $sys_days->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($sys_days_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> sys_days">
<?php if (!$sys_days->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$sys_days->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($sys_days_list->Pager)) $sys_days_list->Pager = new NumericPager($sys_days_list->StartRec, $sys_days_list->DisplayRecs, $sys_days_list->TotalRecs, $sys_days_list->RecRange, $sys_days_list->AutoHidePager) ?>
<?php if ($sys_days_list->Pager->RecordCount > 0 && $sys_days_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($sys_days_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $sys_days_list->pageUrl() ?>start=<?php echo $sys_days_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($sys_days_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $sys_days_list->pageUrl() ?>start=<?php echo $sys_days_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($sys_days_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $sys_days_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($sys_days_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $sys_days_list->pageUrl() ?>start=<?php echo $sys_days_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($sys_days_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $sys_days_list->pageUrl() ?>start=<?php echo $sys_days_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($sys_days_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $sys_days_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $sys_days_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $sys_days_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($sys_days_list->TotalRecs > 0 && (!$sys_days_list->AutoHidePageSizeSelector || $sys_days_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="sys_days">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($sys_days_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($sys_days_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($sys_days_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($sys_days_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($sys_days_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($sys_days_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($sys_days->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $sys_days_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fsys_dayslist" id="fsys_dayslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($sys_days_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $sys_days_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sys_days">
<div id="gmp_sys_days" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($sys_days_list->TotalRecs > 0 || $sys_days->isGridEdit()) { ?>
<table id="tbl_sys_dayslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$sys_days_list->RowType = ROWTYPE_HEADER;

// Render list options
$sys_days_list->renderListOptions();

// Render list options (header, left)
$sys_days_list->ListOptions->render("header", "left");
?>
<?php if ($sys_days->id->Visible) { // id ?>
	<?php if ($sys_days->sortUrl($sys_days->id) == "") { ?>
		<th data-name="id" class="<?php echo $sys_days->id->headerCellClass() ?>"><div id="elh_sys_days_id" class="sys_days_id"><div class="ew-table-header-caption"><?php echo $sys_days->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $sys_days->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $sys_days->SortUrl($sys_days->id) ?>',1);"><div id="elh_sys_days_id" class="sys_days_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sys_days->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($sys_days->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($sys_days->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sys_days->Days->Visible) { // Days ?>
	<?php if ($sys_days->sortUrl($sys_days->Days) == "") { ?>
		<th data-name="Days" class="<?php echo $sys_days->Days->headerCellClass() ?>"><div id="elh_sys_days_Days" class="sys_days_Days"><div class="ew-table-header-caption"><?php echo $sys_days->Days->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Days" class="<?php echo $sys_days->Days->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $sys_days->SortUrl($sys_days->Days) ?>',1);"><div id="elh_sys_days_Days" class="sys_days_Days">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sys_days->Days->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($sys_days->Days->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($sys_days->Days->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$sys_days_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($sys_days->ExportAll && $sys_days->isExport()) {
	$sys_days_list->StopRec = $sys_days_list->TotalRecs;
} else {

	// Set the last record to display
	if ($sys_days_list->TotalRecs > $sys_days_list->StartRec + $sys_days_list->DisplayRecs - 1)
		$sys_days_list->StopRec = $sys_days_list->StartRec + $sys_days_list->DisplayRecs - 1;
	else
		$sys_days_list->StopRec = $sys_days_list->TotalRecs;
}
$sys_days_list->RecCnt = $sys_days_list->StartRec - 1;
if ($sys_days_list->Recordset && !$sys_days_list->Recordset->EOF) {
	$sys_days_list->Recordset->moveFirst();
	$selectLimit = $sys_days_list->UseSelectLimit;
	if (!$selectLimit && $sys_days_list->StartRec > 1)
		$sys_days_list->Recordset->move($sys_days_list->StartRec - 1);
} elseif (!$sys_days->AllowAddDeleteRow && $sys_days_list->StopRec == 0) {
	$sys_days_list->StopRec = $sys_days->GridAddRowCount;
}

// Initialize aggregate
$sys_days->RowType = ROWTYPE_AGGREGATEINIT;
$sys_days->resetAttributes();
$sys_days_list->renderRow();
while ($sys_days_list->RecCnt < $sys_days_list->StopRec) {
	$sys_days_list->RecCnt++;
	if ($sys_days_list->RecCnt >= $sys_days_list->StartRec) {
		$sys_days_list->RowCnt++;

		// Set up key count
		$sys_days_list->KeyCount = $sys_days_list->RowIndex;

		// Init row class and style
		$sys_days->resetAttributes();
		$sys_days->CssClass = "";
		if ($sys_days->isGridAdd()) {
		} else {
			$sys_days_list->loadRowValues($sys_days_list->Recordset); // Load row values
		}
		$sys_days->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$sys_days->RowAttrs = array_merge($sys_days->RowAttrs, array('data-rowindex'=>$sys_days_list->RowCnt, 'id'=>'r' . $sys_days_list->RowCnt . '_sys_days', 'data-rowtype'=>$sys_days->RowType));

		// Render row
		$sys_days_list->renderRow();

		// Render list options
		$sys_days_list->renderListOptions();
?>
	<tr<?php echo $sys_days->rowAttributes() ?>>
<?php

// Render list options (body, left)
$sys_days_list->ListOptions->render("body", "left", $sys_days_list->RowCnt);
?>
	<?php if ($sys_days->id->Visible) { // id ?>
		<td data-name="id"<?php echo $sys_days->id->cellAttributes() ?>>
<span id="el<?php echo $sys_days_list->RowCnt ?>_sys_days_id" class="sys_days_id">
<span<?php echo $sys_days->id->viewAttributes() ?>>
<?php echo $sys_days->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sys_days->Days->Visible) { // Days ?>
		<td data-name="Days"<?php echo $sys_days->Days->cellAttributes() ?>>
<span id="el<?php echo $sys_days_list->RowCnt ?>_sys_days_Days" class="sys_days_Days">
<span<?php echo $sys_days->Days->viewAttributes() ?>>
<?php echo $sys_days->Days->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$sys_days_list->ListOptions->render("body", "right", $sys_days_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$sys_days->isGridAdd())
		$sys_days_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$sys_days->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($sys_days_list->Recordset)
	$sys_days_list->Recordset->Close();
?>
<?php if (!$sys_days->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$sys_days->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($sys_days_list->Pager)) $sys_days_list->Pager = new NumericPager($sys_days_list->StartRec, $sys_days_list->DisplayRecs, $sys_days_list->TotalRecs, $sys_days_list->RecRange, $sys_days_list->AutoHidePager) ?>
<?php if ($sys_days_list->Pager->RecordCount > 0 && $sys_days_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($sys_days_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $sys_days_list->pageUrl() ?>start=<?php echo $sys_days_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($sys_days_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $sys_days_list->pageUrl() ?>start=<?php echo $sys_days_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($sys_days_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $sys_days_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($sys_days_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $sys_days_list->pageUrl() ?>start=<?php echo $sys_days_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($sys_days_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $sys_days_list->pageUrl() ?>start=<?php echo $sys_days_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($sys_days_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $sys_days_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $sys_days_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $sys_days_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($sys_days_list->TotalRecs > 0 && (!$sys_days_list->AutoHidePageSizeSelector || $sys_days_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="sys_days">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($sys_days_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($sys_days_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($sys_days_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($sys_days_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($sys_days_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($sys_days_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($sys_days->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $sys_days_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($sys_days_list->TotalRecs == 0 && !$sys_days->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $sys_days_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$sys_days_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$sys_days->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$sys_days->isExport()) { ?>
<script>
ew.scrollableTable("gmp_sys_days", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$sys_days_list->terminate();
?>
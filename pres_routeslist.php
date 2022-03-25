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
$pres_routes_list = new pres_routes_list();

// Run the page
$pres_routes_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_routes_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$pres_routes->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fpres_routeslist = currentForm = new ew.Form("fpres_routeslist", "list");
fpres_routeslist.formKeyCountName = '<?php echo $pres_routes_list->FormKeyCountName ?>';

// Form_CustomValidate event
fpres_routeslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpres_routeslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fpres_routeslistsrch = currentSearchForm = new ew.Form("fpres_routeslistsrch");

// Filters
fpres_routeslistsrch.filterList = <?php echo $pres_routes_list->getFilterList() ?>;
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
<?php if (!$pres_routes->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($pres_routes_list->TotalRecs > 0 && $pres_routes_list->ExportOptions->visible()) { ?>
<?php $pres_routes_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($pres_routes_list->ImportOptions->visible()) { ?>
<?php $pres_routes_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($pres_routes_list->SearchOptions->visible()) { ?>
<?php $pres_routes_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($pres_routes_list->FilterOptions->visible()) { ?>
<?php $pres_routes_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$pres_routes_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$pres_routes->isExport() && !$pres_routes->CurrentAction) { ?>
<form name="fpres_routeslistsrch" id="fpres_routeslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($pres_routes_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fpres_routeslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pres_routes">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($pres_routes_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($pres_routes_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $pres_routes_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($pres_routes_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($pres_routes_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($pres_routes_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($pres_routes_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $pres_routes_list->showPageHeader(); ?>
<?php
$pres_routes_list->showMessage();
?>
<?php if ($pres_routes_list->TotalRecs > 0 || $pres_routes->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pres_routes_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pres_routes">
<?php if (!$pres_routes->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$pres_routes->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($pres_routes_list->Pager)) $pres_routes_list->Pager = new NumericPager($pres_routes_list->StartRec, $pres_routes_list->DisplayRecs, $pres_routes_list->TotalRecs, $pres_routes_list->RecRange, $pres_routes_list->AutoHidePager) ?>
<?php if ($pres_routes_list->Pager->RecordCount > 0 && $pres_routes_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($pres_routes_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_routes_list->pageUrl() ?>start=<?php echo $pres_routes_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($pres_routes_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_routes_list->pageUrl() ?>start=<?php echo $pres_routes_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($pres_routes_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $pres_routes_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($pres_routes_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_routes_list->pageUrl() ?>start=<?php echo $pres_routes_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($pres_routes_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_routes_list->pageUrl() ?>start=<?php echo $pres_routes_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($pres_routes_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $pres_routes_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $pres_routes_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $pres_routes_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($pres_routes_list->TotalRecs > 0 && (!$pres_routes_list->AutoHidePageSizeSelector || $pres_routes_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="pres_routes">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($pres_routes_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($pres_routes_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($pres_routes_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($pres_routes_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($pres_routes_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($pres_routes_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($pres_routes->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pres_routes_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpres_routeslist" id="fpres_routeslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pres_routes_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pres_routes_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_routes">
<div id="gmp_pres_routes" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($pres_routes_list->TotalRecs > 0 || $pres_routes->isGridEdit()) { ?>
<table id="tbl_pres_routeslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pres_routes_list->RowType = ROWTYPE_HEADER;

// Render list options
$pres_routes_list->renderListOptions();

// Render list options (header, left)
$pres_routes_list->ListOptions->render("header", "left");
?>
<?php if ($pres_routes->S_No->Visible) { // S.No ?>
	<?php if ($pres_routes->sortUrl($pres_routes->S_No) == "") { ?>
		<th data-name="S_No" class="<?php echo $pres_routes->S_No->headerCellClass() ?>"><div id="elh_pres_routes_S_No" class="pres_routes_S_No"><div class="ew-table-header-caption"><?php echo $pres_routes->S_No->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="S_No" class="<?php echo $pres_routes->S_No->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_routes->SortUrl($pres_routes->S_No) ?>',1);"><div id="elh_pres_routes_S_No" class="pres_routes_S_No">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_routes->S_No->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_routes->S_No->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_routes->S_No->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_routes->_Route->Visible) { // Route ?>
	<?php if ($pres_routes->sortUrl($pres_routes->_Route) == "") { ?>
		<th data-name="_Route" class="<?php echo $pres_routes->_Route->headerCellClass() ?>"><div id="elh_pres_routes__Route" class="pres_routes__Route"><div class="ew-table-header-caption"><?php echo $pres_routes->_Route->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_Route" class="<?php echo $pres_routes->_Route->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_routes->SortUrl($pres_routes->_Route) ?>',1);"><div id="elh_pres_routes__Route" class="pres_routes__Route">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_routes->_Route->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_routes->_Route->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_routes->_Route->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pres_routes_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($pres_routes->ExportAll && $pres_routes->isExport()) {
	$pres_routes_list->StopRec = $pres_routes_list->TotalRecs;
} else {

	// Set the last record to display
	if ($pres_routes_list->TotalRecs > $pres_routes_list->StartRec + $pres_routes_list->DisplayRecs - 1)
		$pres_routes_list->StopRec = $pres_routes_list->StartRec + $pres_routes_list->DisplayRecs - 1;
	else
		$pres_routes_list->StopRec = $pres_routes_list->TotalRecs;
}
$pres_routes_list->RecCnt = $pres_routes_list->StartRec - 1;
if ($pres_routes_list->Recordset && !$pres_routes_list->Recordset->EOF) {
	$pres_routes_list->Recordset->moveFirst();
	$selectLimit = $pres_routes_list->UseSelectLimit;
	if (!$selectLimit && $pres_routes_list->StartRec > 1)
		$pres_routes_list->Recordset->move($pres_routes_list->StartRec - 1);
} elseif (!$pres_routes->AllowAddDeleteRow && $pres_routes_list->StopRec == 0) {
	$pres_routes_list->StopRec = $pres_routes->GridAddRowCount;
}

// Initialize aggregate
$pres_routes->RowType = ROWTYPE_AGGREGATEINIT;
$pres_routes->resetAttributes();
$pres_routes_list->renderRow();
while ($pres_routes_list->RecCnt < $pres_routes_list->StopRec) {
	$pres_routes_list->RecCnt++;
	if ($pres_routes_list->RecCnt >= $pres_routes_list->StartRec) {
		$pres_routes_list->RowCnt++;

		// Set up key count
		$pres_routes_list->KeyCount = $pres_routes_list->RowIndex;

		// Init row class and style
		$pres_routes->resetAttributes();
		$pres_routes->CssClass = "";
		if ($pres_routes->isGridAdd()) {
		} else {
			$pres_routes_list->loadRowValues($pres_routes_list->Recordset); // Load row values
		}
		$pres_routes->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$pres_routes->RowAttrs = array_merge($pres_routes->RowAttrs, array('data-rowindex'=>$pres_routes_list->RowCnt, 'id'=>'r' . $pres_routes_list->RowCnt . '_pres_routes', 'data-rowtype'=>$pres_routes->RowType));

		// Render row
		$pres_routes_list->renderRow();

		// Render list options
		$pres_routes_list->renderListOptions();
?>
	<tr<?php echo $pres_routes->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pres_routes_list->ListOptions->render("body", "left", $pres_routes_list->RowCnt);
?>
	<?php if ($pres_routes->S_No->Visible) { // S.No ?>
		<td data-name="S_No"<?php echo $pres_routes->S_No->cellAttributes() ?>>
<span id="el<?php echo $pres_routes_list->RowCnt ?>_pres_routes_S_No" class="pres_routes_S_No">
<span<?php echo $pres_routes->S_No->viewAttributes() ?>>
<?php echo $pres_routes->S_No->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_routes->_Route->Visible) { // Route ?>
		<td data-name="_Route"<?php echo $pres_routes->_Route->cellAttributes() ?>>
<span id="el<?php echo $pres_routes_list->RowCnt ?>_pres_routes__Route" class="pres_routes__Route">
<span<?php echo $pres_routes->_Route->viewAttributes() ?>>
<?php echo $pres_routes->_Route->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pres_routes_list->ListOptions->render("body", "right", $pres_routes_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$pres_routes->isGridAdd())
		$pres_routes_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$pres_routes->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pres_routes_list->Recordset)
	$pres_routes_list->Recordset->Close();
?>
<?php if (!$pres_routes->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$pres_routes->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($pres_routes_list->Pager)) $pres_routes_list->Pager = new NumericPager($pres_routes_list->StartRec, $pres_routes_list->DisplayRecs, $pres_routes_list->TotalRecs, $pres_routes_list->RecRange, $pres_routes_list->AutoHidePager) ?>
<?php if ($pres_routes_list->Pager->RecordCount > 0 && $pres_routes_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($pres_routes_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_routes_list->pageUrl() ?>start=<?php echo $pres_routes_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($pres_routes_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_routes_list->pageUrl() ?>start=<?php echo $pres_routes_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($pres_routes_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $pres_routes_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($pres_routes_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_routes_list->pageUrl() ?>start=<?php echo $pres_routes_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($pres_routes_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_routes_list->pageUrl() ?>start=<?php echo $pres_routes_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($pres_routes_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $pres_routes_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $pres_routes_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $pres_routes_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($pres_routes_list->TotalRecs > 0 && (!$pres_routes_list->AutoHidePageSizeSelector || $pres_routes_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="pres_routes">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($pres_routes_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($pres_routes_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($pres_routes_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($pres_routes_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($pres_routes_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($pres_routes_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($pres_routes->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pres_routes_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pres_routes_list->TotalRecs == 0 && !$pres_routes->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pres_routes_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$pres_routes_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$pres_routes->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$pres_routes->isExport()) { ?>
<script>
ew.scrollableTable("gmp_pres_routes", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$pres_routes_list->terminate();
?>
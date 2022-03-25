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
$mas_category_list = new mas_category_list();

// Run the page
$mas_category_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_category_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$mas_category->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fmas_categorylist = currentForm = new ew.Form("fmas_categorylist", "list");
fmas_categorylist.formKeyCountName = '<?php echo $mas_category_list->FormKeyCountName ?>';

// Form_CustomValidate event
fmas_categorylist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fmas_categorylist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fmas_categorylistsrch = currentSearchForm = new ew.Form("fmas_categorylistsrch");

// Filters
fmas_categorylistsrch.filterList = <?php echo $mas_category_list->getFilterList() ?>;
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
<?php if (!$mas_category->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($mas_category_list->TotalRecs > 0 && $mas_category_list->ExportOptions->visible()) { ?>
<?php $mas_category_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($mas_category_list->ImportOptions->visible()) { ?>
<?php $mas_category_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($mas_category_list->SearchOptions->visible()) { ?>
<?php $mas_category_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($mas_category_list->FilterOptions->visible()) { ?>
<?php $mas_category_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$mas_category_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$mas_category->isExport() && !$mas_category->CurrentAction) { ?>
<form name="fmas_categorylistsrch" id="fmas_categorylistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($mas_category_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fmas_categorylistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="mas_category">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($mas_category_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($mas_category_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $mas_category_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($mas_category_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($mas_category_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($mas_category_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($mas_category_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $mas_category_list->showPageHeader(); ?>
<?php
$mas_category_list->showMessage();
?>
<?php if ($mas_category_list->TotalRecs > 0 || $mas_category->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($mas_category_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> mas_category">
<?php if (!$mas_category->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$mas_category->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($mas_category_list->Pager)) $mas_category_list->Pager = new NumericPager($mas_category_list->StartRec, $mas_category_list->DisplayRecs, $mas_category_list->TotalRecs, $mas_category_list->RecRange, $mas_category_list->AutoHidePager) ?>
<?php if ($mas_category_list->Pager->RecordCount > 0 && $mas_category_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($mas_category_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_category_list->pageUrl() ?>start=<?php echo $mas_category_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($mas_category_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_category_list->pageUrl() ?>start=<?php echo $mas_category_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($mas_category_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $mas_category_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($mas_category_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_category_list->pageUrl() ?>start=<?php echo $mas_category_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($mas_category_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_category_list->pageUrl() ?>start=<?php echo $mas_category_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($mas_category_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $mas_category_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $mas_category_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $mas_category_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($mas_category_list->TotalRecs > 0 && (!$mas_category_list->AutoHidePageSizeSelector || $mas_category_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="mas_category">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($mas_category_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($mas_category_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($mas_category_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($mas_category_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($mas_category_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($mas_category_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($mas_category->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $mas_category_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fmas_categorylist" id="fmas_categorylist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($mas_category_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $mas_category_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_category">
<div id="gmp_mas_category" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($mas_category_list->TotalRecs > 0 || $mas_category->isGridEdit()) { ?>
<table id="tbl_mas_categorylist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$mas_category_list->RowType = ROWTYPE_HEADER;

// Render list options
$mas_category_list->renderListOptions();

// Render list options (header, left)
$mas_category_list->ListOptions->render("header", "left");
?>
<?php if ($mas_category->id->Visible) { // id ?>
	<?php if ($mas_category->sortUrl($mas_category->id) == "") { ?>
		<th data-name="id" class="<?php echo $mas_category->id->headerCellClass() ?>"><div id="elh_mas_category_id" class="mas_category_id"><div class="ew-table-header-caption"><?php echo $mas_category->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $mas_category->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_category->SortUrl($mas_category->id) ?>',1);"><div id="elh_mas_category_id" class="mas_category_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_category->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_category->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_category->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_category->CATEGORY->Visible) { // CATEGORY ?>
	<?php if ($mas_category->sortUrl($mas_category->CATEGORY) == "") { ?>
		<th data-name="CATEGORY" class="<?php echo $mas_category->CATEGORY->headerCellClass() ?>"><div id="elh_mas_category_CATEGORY" class="mas_category_CATEGORY"><div class="ew-table-header-caption"><?php echo $mas_category->CATEGORY->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CATEGORY" class="<?php echo $mas_category->CATEGORY->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_category->SortUrl($mas_category->CATEGORY) ?>',1);"><div id="elh_mas_category_CATEGORY" class="mas_category_CATEGORY">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_category->CATEGORY->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_category->CATEGORY->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_category->CATEGORY->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$mas_category_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($mas_category->ExportAll && $mas_category->isExport()) {
	$mas_category_list->StopRec = $mas_category_list->TotalRecs;
} else {

	// Set the last record to display
	if ($mas_category_list->TotalRecs > $mas_category_list->StartRec + $mas_category_list->DisplayRecs - 1)
		$mas_category_list->StopRec = $mas_category_list->StartRec + $mas_category_list->DisplayRecs - 1;
	else
		$mas_category_list->StopRec = $mas_category_list->TotalRecs;
}
$mas_category_list->RecCnt = $mas_category_list->StartRec - 1;
if ($mas_category_list->Recordset && !$mas_category_list->Recordset->EOF) {
	$mas_category_list->Recordset->moveFirst();
	$selectLimit = $mas_category_list->UseSelectLimit;
	if (!$selectLimit && $mas_category_list->StartRec > 1)
		$mas_category_list->Recordset->move($mas_category_list->StartRec - 1);
} elseif (!$mas_category->AllowAddDeleteRow && $mas_category_list->StopRec == 0) {
	$mas_category_list->StopRec = $mas_category->GridAddRowCount;
}

// Initialize aggregate
$mas_category->RowType = ROWTYPE_AGGREGATEINIT;
$mas_category->resetAttributes();
$mas_category_list->renderRow();
while ($mas_category_list->RecCnt < $mas_category_list->StopRec) {
	$mas_category_list->RecCnt++;
	if ($mas_category_list->RecCnt >= $mas_category_list->StartRec) {
		$mas_category_list->RowCnt++;

		// Set up key count
		$mas_category_list->KeyCount = $mas_category_list->RowIndex;

		// Init row class and style
		$mas_category->resetAttributes();
		$mas_category->CssClass = "";
		if ($mas_category->isGridAdd()) {
		} else {
			$mas_category_list->loadRowValues($mas_category_list->Recordset); // Load row values
		}
		$mas_category->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$mas_category->RowAttrs = array_merge($mas_category->RowAttrs, array('data-rowindex'=>$mas_category_list->RowCnt, 'id'=>'r' . $mas_category_list->RowCnt . '_mas_category', 'data-rowtype'=>$mas_category->RowType));

		// Render row
		$mas_category_list->renderRow();

		// Render list options
		$mas_category_list->renderListOptions();
?>
	<tr<?php echo $mas_category->rowAttributes() ?>>
<?php

// Render list options (body, left)
$mas_category_list->ListOptions->render("body", "left", $mas_category_list->RowCnt);
?>
	<?php if ($mas_category->id->Visible) { // id ?>
		<td data-name="id"<?php echo $mas_category->id->cellAttributes() ?>>
<span id="el<?php echo $mas_category_list->RowCnt ?>_mas_category_id" class="mas_category_id">
<span<?php echo $mas_category->id->viewAttributes() ?>>
<?php echo $mas_category->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($mas_category->CATEGORY->Visible) { // CATEGORY ?>
		<td data-name="CATEGORY"<?php echo $mas_category->CATEGORY->cellAttributes() ?>>
<span id="el<?php echo $mas_category_list->RowCnt ?>_mas_category_CATEGORY" class="mas_category_CATEGORY">
<span<?php echo $mas_category->CATEGORY->viewAttributes() ?>>
<?php echo $mas_category->CATEGORY->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$mas_category_list->ListOptions->render("body", "right", $mas_category_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$mas_category->isGridAdd())
		$mas_category_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$mas_category->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($mas_category_list->Recordset)
	$mas_category_list->Recordset->Close();
?>
<?php if (!$mas_category->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$mas_category->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($mas_category_list->Pager)) $mas_category_list->Pager = new NumericPager($mas_category_list->StartRec, $mas_category_list->DisplayRecs, $mas_category_list->TotalRecs, $mas_category_list->RecRange, $mas_category_list->AutoHidePager) ?>
<?php if ($mas_category_list->Pager->RecordCount > 0 && $mas_category_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($mas_category_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_category_list->pageUrl() ?>start=<?php echo $mas_category_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($mas_category_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_category_list->pageUrl() ?>start=<?php echo $mas_category_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($mas_category_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $mas_category_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($mas_category_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_category_list->pageUrl() ?>start=<?php echo $mas_category_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($mas_category_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_category_list->pageUrl() ?>start=<?php echo $mas_category_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($mas_category_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $mas_category_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $mas_category_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $mas_category_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($mas_category_list->TotalRecs > 0 && (!$mas_category_list->AutoHidePageSizeSelector || $mas_category_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="mas_category">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($mas_category_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($mas_category_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($mas_category_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($mas_category_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($mas_category_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($mas_category_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($mas_category->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $mas_category_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($mas_category_list->TotalRecs == 0 && !$mas_category->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $mas_category_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$mas_category_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$mas_category->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$mas_category->isExport()) { ?>
<script>
ew.scrollableTable("gmp_mas_category", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$mas_category_list->terminate();
?>
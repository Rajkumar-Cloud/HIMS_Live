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
$lab_mas_department_list = new lab_mas_department_list();

// Run the page
$lab_mas_department_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_mas_department_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$lab_mas_department->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var flab_mas_departmentlist = currentForm = new ew.Form("flab_mas_departmentlist", "list");
flab_mas_departmentlist.formKeyCountName = '<?php echo $lab_mas_department_list->FormKeyCountName ?>';

// Form_CustomValidate event
flab_mas_departmentlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
flab_mas_departmentlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var flab_mas_departmentlistsrch = currentSearchForm = new ew.Form("flab_mas_departmentlistsrch");

// Filters
flab_mas_departmentlistsrch.filterList = <?php echo $lab_mas_department_list->getFilterList() ?>;
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
<?php if (!$lab_mas_department->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($lab_mas_department_list->TotalRecs > 0 && $lab_mas_department_list->ExportOptions->visible()) { ?>
<?php $lab_mas_department_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($lab_mas_department_list->ImportOptions->visible()) { ?>
<?php $lab_mas_department_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($lab_mas_department_list->SearchOptions->visible()) { ?>
<?php $lab_mas_department_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($lab_mas_department_list->FilterOptions->visible()) { ?>
<?php $lab_mas_department_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$lab_mas_department_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$lab_mas_department->isExport() && !$lab_mas_department->CurrentAction) { ?>
<form name="flab_mas_departmentlistsrch" id="flab_mas_departmentlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($lab_mas_department_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="flab_mas_departmentlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="lab_mas_department">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($lab_mas_department_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($lab_mas_department_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $lab_mas_department_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($lab_mas_department_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($lab_mas_department_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($lab_mas_department_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($lab_mas_department_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $lab_mas_department_list->showPageHeader(); ?>
<?php
$lab_mas_department_list->showMessage();
?>
<?php if ($lab_mas_department_list->TotalRecs > 0 || $lab_mas_department->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($lab_mas_department_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> lab_mas_department">
<?php if (!$lab_mas_department->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$lab_mas_department->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($lab_mas_department_list->Pager)) $lab_mas_department_list->Pager = new NumericPager($lab_mas_department_list->StartRec, $lab_mas_department_list->DisplayRecs, $lab_mas_department_list->TotalRecs, $lab_mas_department_list->RecRange, $lab_mas_department_list->AutoHidePager) ?>
<?php if ($lab_mas_department_list->Pager->RecordCount > 0 && $lab_mas_department_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($lab_mas_department_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_mas_department_list->pageUrl() ?>start=<?php echo $lab_mas_department_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($lab_mas_department_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_mas_department_list->pageUrl() ?>start=<?php echo $lab_mas_department_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($lab_mas_department_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $lab_mas_department_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($lab_mas_department_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_mas_department_list->pageUrl() ?>start=<?php echo $lab_mas_department_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($lab_mas_department_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_mas_department_list->pageUrl() ?>start=<?php echo $lab_mas_department_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($lab_mas_department_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $lab_mas_department_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $lab_mas_department_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $lab_mas_department_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($lab_mas_department_list->TotalRecs > 0 && (!$lab_mas_department_list->AutoHidePageSizeSelector || $lab_mas_department_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="lab_mas_department">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($lab_mas_department_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($lab_mas_department_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($lab_mas_department_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($lab_mas_department_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($lab_mas_department_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($lab_mas_department_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($lab_mas_department->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $lab_mas_department_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="flab_mas_departmentlist" id="flab_mas_departmentlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($lab_mas_department_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $lab_mas_department_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_mas_department">
<div id="gmp_lab_mas_department" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($lab_mas_department_list->TotalRecs > 0 || $lab_mas_department->isGridEdit()) { ?>
<table id="tbl_lab_mas_departmentlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$lab_mas_department_list->RowType = ROWTYPE_HEADER;

// Render list options
$lab_mas_department_list->renderListOptions();

// Render list options (header, left)
$lab_mas_department_list->ListOptions->render("header", "left");
?>
<?php if ($lab_mas_department->id->Visible) { // id ?>
	<?php if ($lab_mas_department->sortUrl($lab_mas_department->id) == "") { ?>
		<th data-name="id" class="<?php echo $lab_mas_department->id->headerCellClass() ?>"><div id="elh_lab_mas_department_id" class="lab_mas_department_id"><div class="ew-table-header-caption"><?php echo $lab_mas_department->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $lab_mas_department->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_mas_department->SortUrl($lab_mas_department->id) ?>',1);"><div id="elh_lab_mas_department_id" class="lab_mas_department_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_mas_department->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_mas_department->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_mas_department->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_mas_department->Department->Visible) { // Department ?>
	<?php if ($lab_mas_department->sortUrl($lab_mas_department->Department) == "") { ?>
		<th data-name="Department" class="<?php echo $lab_mas_department->Department->headerCellClass() ?>"><div id="elh_lab_mas_department_Department" class="lab_mas_department_Department"><div class="ew-table-header-caption"><?php echo $lab_mas_department->Department->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Department" class="<?php echo $lab_mas_department->Department->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_mas_department->SortUrl($lab_mas_department->Department) ?>',1);"><div id="elh_lab_mas_department_Department" class="lab_mas_department_Department">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_mas_department->Department->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_mas_department->Department->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_mas_department->Department->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$lab_mas_department_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($lab_mas_department->ExportAll && $lab_mas_department->isExport()) {
	$lab_mas_department_list->StopRec = $lab_mas_department_list->TotalRecs;
} else {

	// Set the last record to display
	if ($lab_mas_department_list->TotalRecs > $lab_mas_department_list->StartRec + $lab_mas_department_list->DisplayRecs - 1)
		$lab_mas_department_list->StopRec = $lab_mas_department_list->StartRec + $lab_mas_department_list->DisplayRecs - 1;
	else
		$lab_mas_department_list->StopRec = $lab_mas_department_list->TotalRecs;
}
$lab_mas_department_list->RecCnt = $lab_mas_department_list->StartRec - 1;
if ($lab_mas_department_list->Recordset && !$lab_mas_department_list->Recordset->EOF) {
	$lab_mas_department_list->Recordset->moveFirst();
	$selectLimit = $lab_mas_department_list->UseSelectLimit;
	if (!$selectLimit && $lab_mas_department_list->StartRec > 1)
		$lab_mas_department_list->Recordset->move($lab_mas_department_list->StartRec - 1);
} elseif (!$lab_mas_department->AllowAddDeleteRow && $lab_mas_department_list->StopRec == 0) {
	$lab_mas_department_list->StopRec = $lab_mas_department->GridAddRowCount;
}

// Initialize aggregate
$lab_mas_department->RowType = ROWTYPE_AGGREGATEINIT;
$lab_mas_department->resetAttributes();
$lab_mas_department_list->renderRow();
while ($lab_mas_department_list->RecCnt < $lab_mas_department_list->StopRec) {
	$lab_mas_department_list->RecCnt++;
	if ($lab_mas_department_list->RecCnt >= $lab_mas_department_list->StartRec) {
		$lab_mas_department_list->RowCnt++;

		// Set up key count
		$lab_mas_department_list->KeyCount = $lab_mas_department_list->RowIndex;

		// Init row class and style
		$lab_mas_department->resetAttributes();
		$lab_mas_department->CssClass = "";
		if ($lab_mas_department->isGridAdd()) {
		} else {
			$lab_mas_department_list->loadRowValues($lab_mas_department_list->Recordset); // Load row values
		}
		$lab_mas_department->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$lab_mas_department->RowAttrs = array_merge($lab_mas_department->RowAttrs, array('data-rowindex'=>$lab_mas_department_list->RowCnt, 'id'=>'r' . $lab_mas_department_list->RowCnt . '_lab_mas_department', 'data-rowtype'=>$lab_mas_department->RowType));

		// Render row
		$lab_mas_department_list->renderRow();

		// Render list options
		$lab_mas_department_list->renderListOptions();
?>
	<tr<?php echo $lab_mas_department->rowAttributes() ?>>
<?php

// Render list options (body, left)
$lab_mas_department_list->ListOptions->render("body", "left", $lab_mas_department_list->RowCnt);
?>
	<?php if ($lab_mas_department->id->Visible) { // id ?>
		<td data-name="id"<?php echo $lab_mas_department->id->cellAttributes() ?>>
<span id="el<?php echo $lab_mas_department_list->RowCnt ?>_lab_mas_department_id" class="lab_mas_department_id">
<span<?php echo $lab_mas_department->id->viewAttributes() ?>>
<?php echo $lab_mas_department->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_mas_department->Department->Visible) { // Department ?>
		<td data-name="Department"<?php echo $lab_mas_department->Department->cellAttributes() ?>>
<span id="el<?php echo $lab_mas_department_list->RowCnt ?>_lab_mas_department_Department" class="lab_mas_department_Department">
<span<?php echo $lab_mas_department->Department->viewAttributes() ?>>
<?php echo $lab_mas_department->Department->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$lab_mas_department_list->ListOptions->render("body", "right", $lab_mas_department_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$lab_mas_department->isGridAdd())
		$lab_mas_department_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$lab_mas_department->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($lab_mas_department_list->Recordset)
	$lab_mas_department_list->Recordset->Close();
?>
<?php if (!$lab_mas_department->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$lab_mas_department->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($lab_mas_department_list->Pager)) $lab_mas_department_list->Pager = new NumericPager($lab_mas_department_list->StartRec, $lab_mas_department_list->DisplayRecs, $lab_mas_department_list->TotalRecs, $lab_mas_department_list->RecRange, $lab_mas_department_list->AutoHidePager) ?>
<?php if ($lab_mas_department_list->Pager->RecordCount > 0 && $lab_mas_department_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($lab_mas_department_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_mas_department_list->pageUrl() ?>start=<?php echo $lab_mas_department_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($lab_mas_department_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_mas_department_list->pageUrl() ?>start=<?php echo $lab_mas_department_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($lab_mas_department_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $lab_mas_department_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($lab_mas_department_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_mas_department_list->pageUrl() ?>start=<?php echo $lab_mas_department_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($lab_mas_department_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_mas_department_list->pageUrl() ?>start=<?php echo $lab_mas_department_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($lab_mas_department_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $lab_mas_department_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $lab_mas_department_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $lab_mas_department_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($lab_mas_department_list->TotalRecs > 0 && (!$lab_mas_department_list->AutoHidePageSizeSelector || $lab_mas_department_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="lab_mas_department">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($lab_mas_department_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($lab_mas_department_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($lab_mas_department_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($lab_mas_department_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($lab_mas_department_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($lab_mas_department_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($lab_mas_department->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $lab_mas_department_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($lab_mas_department_list->TotalRecs == 0 && !$lab_mas_department->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $lab_mas_department_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$lab_mas_department_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$lab_mas_department->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$lab_mas_department->isExport()) { ?>
<script>
ew.scrollableTable("gmp_lab_mas_department", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$lab_mas_department_list->terminate();
?>
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
$mas_degree_list = new mas_degree_list();

// Run the page
$mas_degree_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_degree_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$mas_degree->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fmas_degreelist = currentForm = new ew.Form("fmas_degreelist", "list");
fmas_degreelist.formKeyCountName = '<?php echo $mas_degree_list->FormKeyCountName ?>';

// Form_CustomValidate event
fmas_degreelist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fmas_degreelist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fmas_degreelistsrch = currentSearchForm = new ew.Form("fmas_degreelistsrch");

// Filters
fmas_degreelistsrch.filterList = <?php echo $mas_degree_list->getFilterList() ?>;
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
<?php if (!$mas_degree->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($mas_degree_list->TotalRecs > 0 && $mas_degree_list->ExportOptions->visible()) { ?>
<?php $mas_degree_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($mas_degree_list->ImportOptions->visible()) { ?>
<?php $mas_degree_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($mas_degree_list->SearchOptions->visible()) { ?>
<?php $mas_degree_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($mas_degree_list->FilterOptions->visible()) { ?>
<?php $mas_degree_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$mas_degree_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$mas_degree->isExport() && !$mas_degree->CurrentAction) { ?>
<form name="fmas_degreelistsrch" id="fmas_degreelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($mas_degree_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fmas_degreelistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="mas_degree">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($mas_degree_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($mas_degree_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $mas_degree_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($mas_degree_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($mas_degree_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($mas_degree_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($mas_degree_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $mas_degree_list->showPageHeader(); ?>
<?php
$mas_degree_list->showMessage();
?>
<?php if ($mas_degree_list->TotalRecs > 0 || $mas_degree->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($mas_degree_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> mas_degree">
<?php if (!$mas_degree->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$mas_degree->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($mas_degree_list->Pager)) $mas_degree_list->Pager = new NumericPager($mas_degree_list->StartRec, $mas_degree_list->DisplayRecs, $mas_degree_list->TotalRecs, $mas_degree_list->RecRange, $mas_degree_list->AutoHidePager) ?>
<?php if ($mas_degree_list->Pager->RecordCount > 0 && $mas_degree_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($mas_degree_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_degree_list->pageUrl() ?>start=<?php echo $mas_degree_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($mas_degree_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_degree_list->pageUrl() ?>start=<?php echo $mas_degree_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($mas_degree_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $mas_degree_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($mas_degree_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_degree_list->pageUrl() ?>start=<?php echo $mas_degree_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($mas_degree_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_degree_list->pageUrl() ?>start=<?php echo $mas_degree_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($mas_degree_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $mas_degree_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $mas_degree_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $mas_degree_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($mas_degree_list->TotalRecs > 0 && (!$mas_degree_list->AutoHidePageSizeSelector || $mas_degree_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="mas_degree">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($mas_degree_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($mas_degree_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($mas_degree_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($mas_degree_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($mas_degree_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($mas_degree_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($mas_degree->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $mas_degree_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fmas_degreelist" id="fmas_degreelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($mas_degree_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $mas_degree_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_degree">
<div id="gmp_mas_degree" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($mas_degree_list->TotalRecs > 0 || $mas_degree->isGridEdit()) { ?>
<table id="tbl_mas_degreelist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$mas_degree_list->RowType = ROWTYPE_HEADER;

// Render list options
$mas_degree_list->renderListOptions();

// Render list options (header, left)
$mas_degree_list->ListOptions->render("header", "left");
?>
<?php if ($mas_degree->id->Visible) { // id ?>
	<?php if ($mas_degree->sortUrl($mas_degree->id) == "") { ?>
		<th data-name="id" class="<?php echo $mas_degree->id->headerCellClass() ?>"><div id="elh_mas_degree_id" class="mas_degree_id"><div class="ew-table-header-caption"><?php echo $mas_degree->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $mas_degree->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_degree->SortUrl($mas_degree->id) ?>',1);"><div id="elh_mas_degree_id" class="mas_degree_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_degree->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_degree->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_degree->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_degree->Name->Visible) { // Name ?>
	<?php if ($mas_degree->sortUrl($mas_degree->Name) == "") { ?>
		<th data-name="Name" class="<?php echo $mas_degree->Name->headerCellClass() ?>"><div id="elh_mas_degree_Name" class="mas_degree_Name"><div class="ew-table-header-caption"><?php echo $mas_degree->Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Name" class="<?php echo $mas_degree->Name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_degree->SortUrl($mas_degree->Name) ?>',1);"><div id="elh_mas_degree_Name" class="mas_degree_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_degree->Name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_degree->Name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_degree->Name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$mas_degree_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($mas_degree->ExportAll && $mas_degree->isExport()) {
	$mas_degree_list->StopRec = $mas_degree_list->TotalRecs;
} else {

	// Set the last record to display
	if ($mas_degree_list->TotalRecs > $mas_degree_list->StartRec + $mas_degree_list->DisplayRecs - 1)
		$mas_degree_list->StopRec = $mas_degree_list->StartRec + $mas_degree_list->DisplayRecs - 1;
	else
		$mas_degree_list->StopRec = $mas_degree_list->TotalRecs;
}
$mas_degree_list->RecCnt = $mas_degree_list->StartRec - 1;
if ($mas_degree_list->Recordset && !$mas_degree_list->Recordset->EOF) {
	$mas_degree_list->Recordset->moveFirst();
	$selectLimit = $mas_degree_list->UseSelectLimit;
	if (!$selectLimit && $mas_degree_list->StartRec > 1)
		$mas_degree_list->Recordset->move($mas_degree_list->StartRec - 1);
} elseif (!$mas_degree->AllowAddDeleteRow && $mas_degree_list->StopRec == 0) {
	$mas_degree_list->StopRec = $mas_degree->GridAddRowCount;
}

// Initialize aggregate
$mas_degree->RowType = ROWTYPE_AGGREGATEINIT;
$mas_degree->resetAttributes();
$mas_degree_list->renderRow();
while ($mas_degree_list->RecCnt < $mas_degree_list->StopRec) {
	$mas_degree_list->RecCnt++;
	if ($mas_degree_list->RecCnt >= $mas_degree_list->StartRec) {
		$mas_degree_list->RowCnt++;

		// Set up key count
		$mas_degree_list->KeyCount = $mas_degree_list->RowIndex;

		// Init row class and style
		$mas_degree->resetAttributes();
		$mas_degree->CssClass = "";
		if ($mas_degree->isGridAdd()) {
		} else {
			$mas_degree_list->loadRowValues($mas_degree_list->Recordset); // Load row values
		}
		$mas_degree->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$mas_degree->RowAttrs = array_merge($mas_degree->RowAttrs, array('data-rowindex'=>$mas_degree_list->RowCnt, 'id'=>'r' . $mas_degree_list->RowCnt . '_mas_degree', 'data-rowtype'=>$mas_degree->RowType));

		// Render row
		$mas_degree_list->renderRow();

		// Render list options
		$mas_degree_list->renderListOptions();
?>
	<tr<?php echo $mas_degree->rowAttributes() ?>>
<?php

// Render list options (body, left)
$mas_degree_list->ListOptions->render("body", "left", $mas_degree_list->RowCnt);
?>
	<?php if ($mas_degree->id->Visible) { // id ?>
		<td data-name="id"<?php echo $mas_degree->id->cellAttributes() ?>>
<span id="el<?php echo $mas_degree_list->RowCnt ?>_mas_degree_id" class="mas_degree_id">
<span<?php echo $mas_degree->id->viewAttributes() ?>>
<?php echo $mas_degree->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($mas_degree->Name->Visible) { // Name ?>
		<td data-name="Name"<?php echo $mas_degree->Name->cellAttributes() ?>>
<span id="el<?php echo $mas_degree_list->RowCnt ?>_mas_degree_Name" class="mas_degree_Name">
<span<?php echo $mas_degree->Name->viewAttributes() ?>>
<?php echo $mas_degree->Name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$mas_degree_list->ListOptions->render("body", "right", $mas_degree_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$mas_degree->isGridAdd())
		$mas_degree_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$mas_degree->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($mas_degree_list->Recordset)
	$mas_degree_list->Recordset->Close();
?>
<?php if (!$mas_degree->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$mas_degree->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($mas_degree_list->Pager)) $mas_degree_list->Pager = new NumericPager($mas_degree_list->StartRec, $mas_degree_list->DisplayRecs, $mas_degree_list->TotalRecs, $mas_degree_list->RecRange, $mas_degree_list->AutoHidePager) ?>
<?php if ($mas_degree_list->Pager->RecordCount > 0 && $mas_degree_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($mas_degree_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_degree_list->pageUrl() ?>start=<?php echo $mas_degree_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($mas_degree_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_degree_list->pageUrl() ?>start=<?php echo $mas_degree_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($mas_degree_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $mas_degree_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($mas_degree_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_degree_list->pageUrl() ?>start=<?php echo $mas_degree_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($mas_degree_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_degree_list->pageUrl() ?>start=<?php echo $mas_degree_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($mas_degree_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $mas_degree_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $mas_degree_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $mas_degree_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($mas_degree_list->TotalRecs > 0 && (!$mas_degree_list->AutoHidePageSizeSelector || $mas_degree_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="mas_degree">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($mas_degree_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($mas_degree_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($mas_degree_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($mas_degree_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($mas_degree_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($mas_degree_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($mas_degree->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $mas_degree_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($mas_degree_list->TotalRecs == 0 && !$mas_degree->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $mas_degree_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$mas_degree_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$mas_degree->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$mas_degree->isExport()) { ?>
<script>
ew.scrollableTable("gmp_mas_degree", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$mas_degree_list->terminate();
?>
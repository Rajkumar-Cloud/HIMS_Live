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
$mas_document_list = new mas_document_list();

// Run the page
$mas_document_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_document_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$mas_document->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fmas_documentlist = currentForm = new ew.Form("fmas_documentlist", "list");
fmas_documentlist.formKeyCountName = '<?php echo $mas_document_list->FormKeyCountName ?>';

// Form_CustomValidate event
fmas_documentlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fmas_documentlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fmas_documentlistsrch = currentSearchForm = new ew.Form("fmas_documentlistsrch");

// Filters
fmas_documentlistsrch.filterList = <?php echo $mas_document_list->getFilterList() ?>;
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
<?php if (!$mas_document->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($mas_document_list->TotalRecs > 0 && $mas_document_list->ExportOptions->visible()) { ?>
<?php $mas_document_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($mas_document_list->ImportOptions->visible()) { ?>
<?php $mas_document_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($mas_document_list->SearchOptions->visible()) { ?>
<?php $mas_document_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($mas_document_list->FilterOptions->visible()) { ?>
<?php $mas_document_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$mas_document_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$mas_document->isExport() && !$mas_document->CurrentAction) { ?>
<form name="fmas_documentlistsrch" id="fmas_documentlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($mas_document_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fmas_documentlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="mas_document">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($mas_document_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($mas_document_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $mas_document_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($mas_document_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($mas_document_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($mas_document_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($mas_document_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $mas_document_list->showPageHeader(); ?>
<?php
$mas_document_list->showMessage();
?>
<?php if ($mas_document_list->TotalRecs > 0 || $mas_document->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($mas_document_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> mas_document">
<?php if (!$mas_document->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$mas_document->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($mas_document_list->Pager)) $mas_document_list->Pager = new NumericPager($mas_document_list->StartRec, $mas_document_list->DisplayRecs, $mas_document_list->TotalRecs, $mas_document_list->RecRange, $mas_document_list->AutoHidePager) ?>
<?php if ($mas_document_list->Pager->RecordCount > 0 && $mas_document_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($mas_document_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_document_list->pageUrl() ?>start=<?php echo $mas_document_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($mas_document_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_document_list->pageUrl() ?>start=<?php echo $mas_document_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($mas_document_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $mas_document_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($mas_document_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_document_list->pageUrl() ?>start=<?php echo $mas_document_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($mas_document_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_document_list->pageUrl() ?>start=<?php echo $mas_document_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($mas_document_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $mas_document_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $mas_document_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $mas_document_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($mas_document_list->TotalRecs > 0 && (!$mas_document_list->AutoHidePageSizeSelector || $mas_document_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="mas_document">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($mas_document_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($mas_document_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($mas_document_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($mas_document_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($mas_document_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($mas_document_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($mas_document->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $mas_document_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fmas_documentlist" id="fmas_documentlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($mas_document_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $mas_document_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_document">
<div id="gmp_mas_document" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($mas_document_list->TotalRecs > 0 || $mas_document->isGridEdit()) { ?>
<table id="tbl_mas_documentlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$mas_document_list->RowType = ROWTYPE_HEADER;

// Render list options
$mas_document_list->renderListOptions();

// Render list options (header, left)
$mas_document_list->ListOptions->render("header", "left");
?>
<?php if ($mas_document->id->Visible) { // id ?>
	<?php if ($mas_document->sortUrl($mas_document->id) == "") { ?>
		<th data-name="id" class="<?php echo $mas_document->id->headerCellClass() ?>"><div id="elh_mas_document_id" class="mas_document_id"><div class="ew-table-header-caption"><?php echo $mas_document->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $mas_document->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_document->SortUrl($mas_document->id) ?>',1);"><div id="elh_mas_document_id" class="mas_document_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_document->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_document->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_document->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_document->Name->Visible) { // Name ?>
	<?php if ($mas_document->sortUrl($mas_document->Name) == "") { ?>
		<th data-name="Name" class="<?php echo $mas_document->Name->headerCellClass() ?>"><div id="elh_mas_document_Name" class="mas_document_Name"><div class="ew-table-header-caption"><?php echo $mas_document->Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Name" class="<?php echo $mas_document->Name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_document->SortUrl($mas_document->Name) ?>',1);"><div id="elh_mas_document_Name" class="mas_document_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_document->Name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_document->Name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_document->Name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$mas_document_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($mas_document->ExportAll && $mas_document->isExport()) {
	$mas_document_list->StopRec = $mas_document_list->TotalRecs;
} else {

	// Set the last record to display
	if ($mas_document_list->TotalRecs > $mas_document_list->StartRec + $mas_document_list->DisplayRecs - 1)
		$mas_document_list->StopRec = $mas_document_list->StartRec + $mas_document_list->DisplayRecs - 1;
	else
		$mas_document_list->StopRec = $mas_document_list->TotalRecs;
}
$mas_document_list->RecCnt = $mas_document_list->StartRec - 1;
if ($mas_document_list->Recordset && !$mas_document_list->Recordset->EOF) {
	$mas_document_list->Recordset->moveFirst();
	$selectLimit = $mas_document_list->UseSelectLimit;
	if (!$selectLimit && $mas_document_list->StartRec > 1)
		$mas_document_list->Recordset->move($mas_document_list->StartRec - 1);
} elseif (!$mas_document->AllowAddDeleteRow && $mas_document_list->StopRec == 0) {
	$mas_document_list->StopRec = $mas_document->GridAddRowCount;
}

// Initialize aggregate
$mas_document->RowType = ROWTYPE_AGGREGATEINIT;
$mas_document->resetAttributes();
$mas_document_list->renderRow();
while ($mas_document_list->RecCnt < $mas_document_list->StopRec) {
	$mas_document_list->RecCnt++;
	if ($mas_document_list->RecCnt >= $mas_document_list->StartRec) {
		$mas_document_list->RowCnt++;

		// Set up key count
		$mas_document_list->KeyCount = $mas_document_list->RowIndex;

		// Init row class and style
		$mas_document->resetAttributes();
		$mas_document->CssClass = "";
		if ($mas_document->isGridAdd()) {
		} else {
			$mas_document_list->loadRowValues($mas_document_list->Recordset); // Load row values
		}
		$mas_document->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$mas_document->RowAttrs = array_merge($mas_document->RowAttrs, array('data-rowindex'=>$mas_document_list->RowCnt, 'id'=>'r' . $mas_document_list->RowCnt . '_mas_document', 'data-rowtype'=>$mas_document->RowType));

		// Render row
		$mas_document_list->renderRow();

		// Render list options
		$mas_document_list->renderListOptions();
?>
	<tr<?php echo $mas_document->rowAttributes() ?>>
<?php

// Render list options (body, left)
$mas_document_list->ListOptions->render("body", "left", $mas_document_list->RowCnt);
?>
	<?php if ($mas_document->id->Visible) { // id ?>
		<td data-name="id"<?php echo $mas_document->id->cellAttributes() ?>>
<span id="el<?php echo $mas_document_list->RowCnt ?>_mas_document_id" class="mas_document_id">
<span<?php echo $mas_document->id->viewAttributes() ?>>
<?php echo $mas_document->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($mas_document->Name->Visible) { // Name ?>
		<td data-name="Name"<?php echo $mas_document->Name->cellAttributes() ?>>
<span id="el<?php echo $mas_document_list->RowCnt ?>_mas_document_Name" class="mas_document_Name">
<span<?php echo $mas_document->Name->viewAttributes() ?>>
<?php echo $mas_document->Name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$mas_document_list->ListOptions->render("body", "right", $mas_document_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$mas_document->isGridAdd())
		$mas_document_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$mas_document->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($mas_document_list->Recordset)
	$mas_document_list->Recordset->Close();
?>
<?php if (!$mas_document->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$mas_document->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($mas_document_list->Pager)) $mas_document_list->Pager = new NumericPager($mas_document_list->StartRec, $mas_document_list->DisplayRecs, $mas_document_list->TotalRecs, $mas_document_list->RecRange, $mas_document_list->AutoHidePager) ?>
<?php if ($mas_document_list->Pager->RecordCount > 0 && $mas_document_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($mas_document_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_document_list->pageUrl() ?>start=<?php echo $mas_document_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($mas_document_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_document_list->pageUrl() ?>start=<?php echo $mas_document_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($mas_document_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $mas_document_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($mas_document_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_document_list->pageUrl() ?>start=<?php echo $mas_document_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($mas_document_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_document_list->pageUrl() ?>start=<?php echo $mas_document_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($mas_document_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $mas_document_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $mas_document_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $mas_document_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($mas_document_list->TotalRecs > 0 && (!$mas_document_list->AutoHidePageSizeSelector || $mas_document_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="mas_document">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($mas_document_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($mas_document_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($mas_document_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($mas_document_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($mas_document_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($mas_document_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($mas_document->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $mas_document_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($mas_document_list->TotalRecs == 0 && !$mas_document->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $mas_document_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$mas_document_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$mas_document->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$mas_document->isExport()) { ?>
<script>
ew.scrollableTable("gmp_mas_document", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$mas_document_list->terminate();
?>
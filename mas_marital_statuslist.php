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
$mas_marital_status_list = new mas_marital_status_list();

// Run the page
$mas_marital_status_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_marital_status_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$mas_marital_status->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fmas_marital_statuslist = currentForm = new ew.Form("fmas_marital_statuslist", "list");
fmas_marital_statuslist.formKeyCountName = '<?php echo $mas_marital_status_list->FormKeyCountName ?>';

// Form_CustomValidate event
fmas_marital_statuslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fmas_marital_statuslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fmas_marital_statuslistsrch = currentSearchForm = new ew.Form("fmas_marital_statuslistsrch");

// Filters
fmas_marital_statuslistsrch.filterList = <?php echo $mas_marital_status_list->getFilterList() ?>;
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
<?php if (!$mas_marital_status->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($mas_marital_status_list->TotalRecs > 0 && $mas_marital_status_list->ExportOptions->visible()) { ?>
<?php $mas_marital_status_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($mas_marital_status_list->ImportOptions->visible()) { ?>
<?php $mas_marital_status_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($mas_marital_status_list->SearchOptions->visible()) { ?>
<?php $mas_marital_status_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($mas_marital_status_list->FilterOptions->visible()) { ?>
<?php $mas_marital_status_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$mas_marital_status_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$mas_marital_status->isExport() && !$mas_marital_status->CurrentAction) { ?>
<form name="fmas_marital_statuslistsrch" id="fmas_marital_statuslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($mas_marital_status_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fmas_marital_statuslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="mas_marital_status">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($mas_marital_status_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($mas_marital_status_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $mas_marital_status_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($mas_marital_status_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($mas_marital_status_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($mas_marital_status_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($mas_marital_status_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $mas_marital_status_list->showPageHeader(); ?>
<?php
$mas_marital_status_list->showMessage();
?>
<?php if ($mas_marital_status_list->TotalRecs > 0 || $mas_marital_status->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($mas_marital_status_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> mas_marital_status">
<?php if (!$mas_marital_status->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$mas_marital_status->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($mas_marital_status_list->Pager)) $mas_marital_status_list->Pager = new NumericPager($mas_marital_status_list->StartRec, $mas_marital_status_list->DisplayRecs, $mas_marital_status_list->TotalRecs, $mas_marital_status_list->RecRange, $mas_marital_status_list->AutoHidePager) ?>
<?php if ($mas_marital_status_list->Pager->RecordCount > 0 && $mas_marital_status_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($mas_marital_status_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_marital_status_list->pageUrl() ?>start=<?php echo $mas_marital_status_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($mas_marital_status_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_marital_status_list->pageUrl() ?>start=<?php echo $mas_marital_status_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($mas_marital_status_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $mas_marital_status_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($mas_marital_status_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_marital_status_list->pageUrl() ?>start=<?php echo $mas_marital_status_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($mas_marital_status_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_marital_status_list->pageUrl() ?>start=<?php echo $mas_marital_status_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($mas_marital_status_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $mas_marital_status_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $mas_marital_status_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $mas_marital_status_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($mas_marital_status_list->TotalRecs > 0 && (!$mas_marital_status_list->AutoHidePageSizeSelector || $mas_marital_status_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="mas_marital_status">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($mas_marital_status_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($mas_marital_status_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($mas_marital_status_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($mas_marital_status_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($mas_marital_status_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($mas_marital_status_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($mas_marital_status->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $mas_marital_status_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fmas_marital_statuslist" id="fmas_marital_statuslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($mas_marital_status_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $mas_marital_status_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_marital_status">
<div id="gmp_mas_marital_status" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($mas_marital_status_list->TotalRecs > 0 || $mas_marital_status->isGridEdit()) { ?>
<table id="tbl_mas_marital_statuslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$mas_marital_status_list->RowType = ROWTYPE_HEADER;

// Render list options
$mas_marital_status_list->renderListOptions();

// Render list options (header, left)
$mas_marital_status_list->ListOptions->render("header", "left");
?>
<?php if ($mas_marital_status->id->Visible) { // id ?>
	<?php if ($mas_marital_status->sortUrl($mas_marital_status->id) == "") { ?>
		<th data-name="id" class="<?php echo $mas_marital_status->id->headerCellClass() ?>"><div id="elh_mas_marital_status_id" class="mas_marital_status_id"><div class="ew-table-header-caption"><?php echo $mas_marital_status->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $mas_marital_status->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_marital_status->SortUrl($mas_marital_status->id) ?>',1);"><div id="elh_mas_marital_status_id" class="mas_marital_status_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_marital_status->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_marital_status->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_marital_status->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_marital_status->MaritalStatus->Visible) { // MaritalStatus ?>
	<?php if ($mas_marital_status->sortUrl($mas_marital_status->MaritalStatus) == "") { ?>
		<th data-name="MaritalStatus" class="<?php echo $mas_marital_status->MaritalStatus->headerCellClass() ?>"><div id="elh_mas_marital_status_MaritalStatus" class="mas_marital_status_MaritalStatus"><div class="ew-table-header-caption"><?php echo $mas_marital_status->MaritalStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MaritalStatus" class="<?php echo $mas_marital_status->MaritalStatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_marital_status->SortUrl($mas_marital_status->MaritalStatus) ?>',1);"><div id="elh_mas_marital_status_MaritalStatus" class="mas_marital_status_MaritalStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_marital_status->MaritalStatus->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_marital_status->MaritalStatus->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_marital_status->MaritalStatus->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$mas_marital_status_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($mas_marital_status->ExportAll && $mas_marital_status->isExport()) {
	$mas_marital_status_list->StopRec = $mas_marital_status_list->TotalRecs;
} else {

	// Set the last record to display
	if ($mas_marital_status_list->TotalRecs > $mas_marital_status_list->StartRec + $mas_marital_status_list->DisplayRecs - 1)
		$mas_marital_status_list->StopRec = $mas_marital_status_list->StartRec + $mas_marital_status_list->DisplayRecs - 1;
	else
		$mas_marital_status_list->StopRec = $mas_marital_status_list->TotalRecs;
}
$mas_marital_status_list->RecCnt = $mas_marital_status_list->StartRec - 1;
if ($mas_marital_status_list->Recordset && !$mas_marital_status_list->Recordset->EOF) {
	$mas_marital_status_list->Recordset->moveFirst();
	$selectLimit = $mas_marital_status_list->UseSelectLimit;
	if (!$selectLimit && $mas_marital_status_list->StartRec > 1)
		$mas_marital_status_list->Recordset->move($mas_marital_status_list->StartRec - 1);
} elseif (!$mas_marital_status->AllowAddDeleteRow && $mas_marital_status_list->StopRec == 0) {
	$mas_marital_status_list->StopRec = $mas_marital_status->GridAddRowCount;
}

// Initialize aggregate
$mas_marital_status->RowType = ROWTYPE_AGGREGATEINIT;
$mas_marital_status->resetAttributes();
$mas_marital_status_list->renderRow();
while ($mas_marital_status_list->RecCnt < $mas_marital_status_list->StopRec) {
	$mas_marital_status_list->RecCnt++;
	if ($mas_marital_status_list->RecCnt >= $mas_marital_status_list->StartRec) {
		$mas_marital_status_list->RowCnt++;

		// Set up key count
		$mas_marital_status_list->KeyCount = $mas_marital_status_list->RowIndex;

		// Init row class and style
		$mas_marital_status->resetAttributes();
		$mas_marital_status->CssClass = "";
		if ($mas_marital_status->isGridAdd()) {
		} else {
			$mas_marital_status_list->loadRowValues($mas_marital_status_list->Recordset); // Load row values
		}
		$mas_marital_status->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$mas_marital_status->RowAttrs = array_merge($mas_marital_status->RowAttrs, array('data-rowindex'=>$mas_marital_status_list->RowCnt, 'id'=>'r' . $mas_marital_status_list->RowCnt . '_mas_marital_status', 'data-rowtype'=>$mas_marital_status->RowType));

		// Render row
		$mas_marital_status_list->renderRow();

		// Render list options
		$mas_marital_status_list->renderListOptions();
?>
	<tr<?php echo $mas_marital_status->rowAttributes() ?>>
<?php

// Render list options (body, left)
$mas_marital_status_list->ListOptions->render("body", "left", $mas_marital_status_list->RowCnt);
?>
	<?php if ($mas_marital_status->id->Visible) { // id ?>
		<td data-name="id"<?php echo $mas_marital_status->id->cellAttributes() ?>>
<span id="el<?php echo $mas_marital_status_list->RowCnt ?>_mas_marital_status_id" class="mas_marital_status_id">
<span<?php echo $mas_marital_status->id->viewAttributes() ?>>
<?php echo $mas_marital_status->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($mas_marital_status->MaritalStatus->Visible) { // MaritalStatus ?>
		<td data-name="MaritalStatus"<?php echo $mas_marital_status->MaritalStatus->cellAttributes() ?>>
<span id="el<?php echo $mas_marital_status_list->RowCnt ?>_mas_marital_status_MaritalStatus" class="mas_marital_status_MaritalStatus">
<span<?php echo $mas_marital_status->MaritalStatus->viewAttributes() ?>>
<?php echo $mas_marital_status->MaritalStatus->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$mas_marital_status_list->ListOptions->render("body", "right", $mas_marital_status_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$mas_marital_status->isGridAdd())
		$mas_marital_status_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$mas_marital_status->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($mas_marital_status_list->Recordset)
	$mas_marital_status_list->Recordset->Close();
?>
<?php if (!$mas_marital_status->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$mas_marital_status->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($mas_marital_status_list->Pager)) $mas_marital_status_list->Pager = new NumericPager($mas_marital_status_list->StartRec, $mas_marital_status_list->DisplayRecs, $mas_marital_status_list->TotalRecs, $mas_marital_status_list->RecRange, $mas_marital_status_list->AutoHidePager) ?>
<?php if ($mas_marital_status_list->Pager->RecordCount > 0 && $mas_marital_status_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($mas_marital_status_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_marital_status_list->pageUrl() ?>start=<?php echo $mas_marital_status_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($mas_marital_status_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_marital_status_list->pageUrl() ?>start=<?php echo $mas_marital_status_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($mas_marital_status_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $mas_marital_status_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($mas_marital_status_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_marital_status_list->pageUrl() ?>start=<?php echo $mas_marital_status_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($mas_marital_status_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_marital_status_list->pageUrl() ?>start=<?php echo $mas_marital_status_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($mas_marital_status_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $mas_marital_status_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $mas_marital_status_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $mas_marital_status_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($mas_marital_status_list->TotalRecs > 0 && (!$mas_marital_status_list->AutoHidePageSizeSelector || $mas_marital_status_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="mas_marital_status">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($mas_marital_status_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($mas_marital_status_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($mas_marital_status_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($mas_marital_status_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($mas_marital_status_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($mas_marital_status_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($mas_marital_status->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $mas_marital_status_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($mas_marital_status_list->TotalRecs == 0 && !$mas_marital_status->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $mas_marital_status_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$mas_marital_status_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$mas_marital_status->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$mas_marital_status->isExport()) { ?>
<script>
ew.scrollableTable("gmp_mas_marital_status", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$mas_marital_status_list->terminate();
?>
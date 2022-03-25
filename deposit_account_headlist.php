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
$deposit_account_head_list = new deposit_account_head_list();

// Run the page
$deposit_account_head_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$deposit_account_head_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$deposit_account_head->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fdeposit_account_headlist = currentForm = new ew.Form("fdeposit_account_headlist", "list");
fdeposit_account_headlist.formKeyCountName = '<?php echo $deposit_account_head_list->FormKeyCountName ?>';

// Form_CustomValidate event
fdeposit_account_headlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fdeposit_account_headlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fdeposit_account_headlistsrch = currentSearchForm = new ew.Form("fdeposit_account_headlistsrch");

// Filters
fdeposit_account_headlistsrch.filterList = <?php echo $deposit_account_head_list->getFilterList() ?>;
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
<?php if (!$deposit_account_head->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($deposit_account_head_list->TotalRecs > 0 && $deposit_account_head_list->ExportOptions->visible()) { ?>
<?php $deposit_account_head_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($deposit_account_head_list->ImportOptions->visible()) { ?>
<?php $deposit_account_head_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($deposit_account_head_list->SearchOptions->visible()) { ?>
<?php $deposit_account_head_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($deposit_account_head_list->FilterOptions->visible()) { ?>
<?php $deposit_account_head_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$deposit_account_head_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$deposit_account_head->isExport() && !$deposit_account_head->CurrentAction) { ?>
<form name="fdeposit_account_headlistsrch" id="fdeposit_account_headlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($deposit_account_head_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fdeposit_account_headlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="deposit_account_head">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($deposit_account_head_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($deposit_account_head_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $deposit_account_head_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($deposit_account_head_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($deposit_account_head_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($deposit_account_head_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($deposit_account_head_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $deposit_account_head_list->showPageHeader(); ?>
<?php
$deposit_account_head_list->showMessage();
?>
<?php if ($deposit_account_head_list->TotalRecs > 0 || $deposit_account_head->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($deposit_account_head_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> deposit_account_head">
<?php if (!$deposit_account_head->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$deposit_account_head->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($deposit_account_head_list->Pager)) $deposit_account_head_list->Pager = new NumericPager($deposit_account_head_list->StartRec, $deposit_account_head_list->DisplayRecs, $deposit_account_head_list->TotalRecs, $deposit_account_head_list->RecRange, $deposit_account_head_list->AutoHidePager) ?>
<?php if ($deposit_account_head_list->Pager->RecordCount > 0 && $deposit_account_head_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($deposit_account_head_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $deposit_account_head_list->pageUrl() ?>start=<?php echo $deposit_account_head_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($deposit_account_head_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $deposit_account_head_list->pageUrl() ?>start=<?php echo $deposit_account_head_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($deposit_account_head_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $deposit_account_head_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($deposit_account_head_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $deposit_account_head_list->pageUrl() ?>start=<?php echo $deposit_account_head_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($deposit_account_head_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $deposit_account_head_list->pageUrl() ?>start=<?php echo $deposit_account_head_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($deposit_account_head_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $deposit_account_head_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $deposit_account_head_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $deposit_account_head_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($deposit_account_head_list->TotalRecs > 0 && (!$deposit_account_head_list->AutoHidePageSizeSelector || $deposit_account_head_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="deposit_account_head">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($deposit_account_head_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($deposit_account_head_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($deposit_account_head_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($deposit_account_head_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($deposit_account_head_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($deposit_account_head_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($deposit_account_head->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $deposit_account_head_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fdeposit_account_headlist" id="fdeposit_account_headlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($deposit_account_head_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $deposit_account_head_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="deposit_account_head">
<div id="gmp_deposit_account_head" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($deposit_account_head_list->TotalRecs > 0 || $deposit_account_head->isGridEdit()) { ?>
<table id="tbl_deposit_account_headlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$deposit_account_head_list->RowType = ROWTYPE_HEADER;

// Render list options
$deposit_account_head_list->renderListOptions();

// Render list options (header, left)
$deposit_account_head_list->ListOptions->render("header", "left");
?>
<?php if ($deposit_account_head->id->Visible) { // id ?>
	<?php if ($deposit_account_head->sortUrl($deposit_account_head->id) == "") { ?>
		<th data-name="id" class="<?php echo $deposit_account_head->id->headerCellClass() ?>"><div id="elh_deposit_account_head_id" class="deposit_account_head_id"><div class="ew-table-header-caption"><?php echo $deposit_account_head->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $deposit_account_head->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $deposit_account_head->SortUrl($deposit_account_head->id) ?>',1);"><div id="elh_deposit_account_head_id" class="deposit_account_head_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $deposit_account_head->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($deposit_account_head->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($deposit_account_head->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($deposit_account_head->Name->Visible) { // Name ?>
	<?php if ($deposit_account_head->sortUrl($deposit_account_head->Name) == "") { ?>
		<th data-name="Name" class="<?php echo $deposit_account_head->Name->headerCellClass() ?>"><div id="elh_deposit_account_head_Name" class="deposit_account_head_Name"><div class="ew-table-header-caption"><?php echo $deposit_account_head->Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Name" class="<?php echo $deposit_account_head->Name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $deposit_account_head->SortUrl($deposit_account_head->Name) ?>',1);"><div id="elh_deposit_account_head_Name" class="deposit_account_head_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $deposit_account_head->Name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($deposit_account_head->Name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($deposit_account_head->Name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$deposit_account_head_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($deposit_account_head->ExportAll && $deposit_account_head->isExport()) {
	$deposit_account_head_list->StopRec = $deposit_account_head_list->TotalRecs;
} else {

	// Set the last record to display
	if ($deposit_account_head_list->TotalRecs > $deposit_account_head_list->StartRec + $deposit_account_head_list->DisplayRecs - 1)
		$deposit_account_head_list->StopRec = $deposit_account_head_list->StartRec + $deposit_account_head_list->DisplayRecs - 1;
	else
		$deposit_account_head_list->StopRec = $deposit_account_head_list->TotalRecs;
}
$deposit_account_head_list->RecCnt = $deposit_account_head_list->StartRec - 1;
if ($deposit_account_head_list->Recordset && !$deposit_account_head_list->Recordset->EOF) {
	$deposit_account_head_list->Recordset->moveFirst();
	$selectLimit = $deposit_account_head_list->UseSelectLimit;
	if (!$selectLimit && $deposit_account_head_list->StartRec > 1)
		$deposit_account_head_list->Recordset->move($deposit_account_head_list->StartRec - 1);
} elseif (!$deposit_account_head->AllowAddDeleteRow && $deposit_account_head_list->StopRec == 0) {
	$deposit_account_head_list->StopRec = $deposit_account_head->GridAddRowCount;
}

// Initialize aggregate
$deposit_account_head->RowType = ROWTYPE_AGGREGATEINIT;
$deposit_account_head->resetAttributes();
$deposit_account_head_list->renderRow();
while ($deposit_account_head_list->RecCnt < $deposit_account_head_list->StopRec) {
	$deposit_account_head_list->RecCnt++;
	if ($deposit_account_head_list->RecCnt >= $deposit_account_head_list->StartRec) {
		$deposit_account_head_list->RowCnt++;

		// Set up key count
		$deposit_account_head_list->KeyCount = $deposit_account_head_list->RowIndex;

		// Init row class and style
		$deposit_account_head->resetAttributes();
		$deposit_account_head->CssClass = "";
		if ($deposit_account_head->isGridAdd()) {
		} else {
			$deposit_account_head_list->loadRowValues($deposit_account_head_list->Recordset); // Load row values
		}
		$deposit_account_head->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$deposit_account_head->RowAttrs = array_merge($deposit_account_head->RowAttrs, array('data-rowindex'=>$deposit_account_head_list->RowCnt, 'id'=>'r' . $deposit_account_head_list->RowCnt . '_deposit_account_head', 'data-rowtype'=>$deposit_account_head->RowType));

		// Render row
		$deposit_account_head_list->renderRow();

		// Render list options
		$deposit_account_head_list->renderListOptions();
?>
	<tr<?php echo $deposit_account_head->rowAttributes() ?>>
<?php

// Render list options (body, left)
$deposit_account_head_list->ListOptions->render("body", "left", $deposit_account_head_list->RowCnt);
?>
	<?php if ($deposit_account_head->id->Visible) { // id ?>
		<td data-name="id"<?php echo $deposit_account_head->id->cellAttributes() ?>>
<span id="el<?php echo $deposit_account_head_list->RowCnt ?>_deposit_account_head_id" class="deposit_account_head_id">
<span<?php echo $deposit_account_head->id->viewAttributes() ?>>
<?php echo $deposit_account_head->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($deposit_account_head->Name->Visible) { // Name ?>
		<td data-name="Name"<?php echo $deposit_account_head->Name->cellAttributes() ?>>
<span id="el<?php echo $deposit_account_head_list->RowCnt ?>_deposit_account_head_Name" class="deposit_account_head_Name">
<span<?php echo $deposit_account_head->Name->viewAttributes() ?>>
<?php echo $deposit_account_head->Name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$deposit_account_head_list->ListOptions->render("body", "right", $deposit_account_head_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$deposit_account_head->isGridAdd())
		$deposit_account_head_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$deposit_account_head->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($deposit_account_head_list->Recordset)
	$deposit_account_head_list->Recordset->Close();
?>
<?php if (!$deposit_account_head->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$deposit_account_head->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($deposit_account_head_list->Pager)) $deposit_account_head_list->Pager = new NumericPager($deposit_account_head_list->StartRec, $deposit_account_head_list->DisplayRecs, $deposit_account_head_list->TotalRecs, $deposit_account_head_list->RecRange, $deposit_account_head_list->AutoHidePager) ?>
<?php if ($deposit_account_head_list->Pager->RecordCount > 0 && $deposit_account_head_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($deposit_account_head_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $deposit_account_head_list->pageUrl() ?>start=<?php echo $deposit_account_head_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($deposit_account_head_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $deposit_account_head_list->pageUrl() ?>start=<?php echo $deposit_account_head_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($deposit_account_head_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $deposit_account_head_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($deposit_account_head_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $deposit_account_head_list->pageUrl() ?>start=<?php echo $deposit_account_head_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($deposit_account_head_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $deposit_account_head_list->pageUrl() ?>start=<?php echo $deposit_account_head_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($deposit_account_head_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $deposit_account_head_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $deposit_account_head_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $deposit_account_head_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($deposit_account_head_list->TotalRecs > 0 && (!$deposit_account_head_list->AutoHidePageSizeSelector || $deposit_account_head_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="deposit_account_head">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($deposit_account_head_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($deposit_account_head_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($deposit_account_head_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($deposit_account_head_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($deposit_account_head_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($deposit_account_head_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($deposit_account_head->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $deposit_account_head_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($deposit_account_head_list->TotalRecs == 0 && !$deposit_account_head->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $deposit_account_head_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$deposit_account_head_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$deposit_account_head->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$deposit_account_head->isExport()) { ?>
<script>
ew.scrollableTable("gmp_deposit_account_head", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$deposit_account_head_list->terminate();
?>
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
$sys_gender_list = new sys_gender_list();

// Run the page
$sys_gender_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sys_gender_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$sys_gender->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fsys_genderlist = currentForm = new ew.Form("fsys_genderlist", "list");
fsys_genderlist.formKeyCountName = '<?php echo $sys_gender_list->FormKeyCountName ?>';

// Form_CustomValidate event
fsys_genderlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fsys_genderlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fsys_genderlistsrch = currentSearchForm = new ew.Form("fsys_genderlistsrch");

// Filters
fsys_genderlistsrch.filterList = <?php echo $sys_gender_list->getFilterList() ?>;
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
<?php if (!$sys_gender->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($sys_gender_list->TotalRecs > 0 && $sys_gender_list->ExportOptions->visible()) { ?>
<?php $sys_gender_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($sys_gender_list->ImportOptions->visible()) { ?>
<?php $sys_gender_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($sys_gender_list->SearchOptions->visible()) { ?>
<?php $sys_gender_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($sys_gender_list->FilterOptions->visible()) { ?>
<?php $sys_gender_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$sys_gender_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$sys_gender->isExport() && !$sys_gender->CurrentAction) { ?>
<form name="fsys_genderlistsrch" id="fsys_genderlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($sys_gender_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fsys_genderlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="sys_gender">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($sys_gender_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($sys_gender_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $sys_gender_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($sys_gender_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($sys_gender_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($sys_gender_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($sys_gender_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $sys_gender_list->showPageHeader(); ?>
<?php
$sys_gender_list->showMessage();
?>
<?php if ($sys_gender_list->TotalRecs > 0 || $sys_gender->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($sys_gender_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> sys_gender">
<?php if (!$sys_gender->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$sys_gender->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($sys_gender_list->Pager)) $sys_gender_list->Pager = new NumericPager($sys_gender_list->StartRec, $sys_gender_list->DisplayRecs, $sys_gender_list->TotalRecs, $sys_gender_list->RecRange, $sys_gender_list->AutoHidePager) ?>
<?php if ($sys_gender_list->Pager->RecordCount > 0 && $sys_gender_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($sys_gender_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $sys_gender_list->pageUrl() ?>start=<?php echo $sys_gender_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($sys_gender_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $sys_gender_list->pageUrl() ?>start=<?php echo $sys_gender_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($sys_gender_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $sys_gender_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($sys_gender_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $sys_gender_list->pageUrl() ?>start=<?php echo $sys_gender_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($sys_gender_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $sys_gender_list->pageUrl() ?>start=<?php echo $sys_gender_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($sys_gender_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $sys_gender_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $sys_gender_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $sys_gender_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($sys_gender_list->TotalRecs > 0 && (!$sys_gender_list->AutoHidePageSizeSelector || $sys_gender_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="sys_gender">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($sys_gender_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($sys_gender_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($sys_gender_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($sys_gender_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($sys_gender_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($sys_gender_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($sys_gender->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $sys_gender_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fsys_genderlist" id="fsys_genderlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($sys_gender_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $sys_gender_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sys_gender">
<div id="gmp_sys_gender" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($sys_gender_list->TotalRecs > 0 || $sys_gender->isGridEdit()) { ?>
<table id="tbl_sys_genderlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$sys_gender_list->RowType = ROWTYPE_HEADER;

// Render list options
$sys_gender_list->renderListOptions();

// Render list options (header, left)
$sys_gender_list->ListOptions->render("header", "left");
?>
<?php if ($sys_gender->id->Visible) { // id ?>
	<?php if ($sys_gender->sortUrl($sys_gender->id) == "") { ?>
		<th data-name="id" class="<?php echo $sys_gender->id->headerCellClass() ?>"><div id="elh_sys_gender_id" class="sys_gender_id"><div class="ew-table-header-caption"><?php echo $sys_gender->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $sys_gender->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $sys_gender->SortUrl($sys_gender->id) ?>',1);"><div id="elh_sys_gender_id" class="sys_gender_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sys_gender->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($sys_gender->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($sys_gender->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sys_gender->Name->Visible) { // Name ?>
	<?php if ($sys_gender->sortUrl($sys_gender->Name) == "") { ?>
		<th data-name="Name" class="<?php echo $sys_gender->Name->headerCellClass() ?>"><div id="elh_sys_gender_Name" class="sys_gender_Name"><div class="ew-table-header-caption"><?php echo $sys_gender->Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Name" class="<?php echo $sys_gender->Name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $sys_gender->SortUrl($sys_gender->Name) ?>',1);"><div id="elh_sys_gender_Name" class="sys_gender_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sys_gender->Name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($sys_gender->Name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($sys_gender->Name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$sys_gender_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($sys_gender->ExportAll && $sys_gender->isExport()) {
	$sys_gender_list->StopRec = $sys_gender_list->TotalRecs;
} else {

	// Set the last record to display
	if ($sys_gender_list->TotalRecs > $sys_gender_list->StartRec + $sys_gender_list->DisplayRecs - 1)
		$sys_gender_list->StopRec = $sys_gender_list->StartRec + $sys_gender_list->DisplayRecs - 1;
	else
		$sys_gender_list->StopRec = $sys_gender_list->TotalRecs;
}
$sys_gender_list->RecCnt = $sys_gender_list->StartRec - 1;
if ($sys_gender_list->Recordset && !$sys_gender_list->Recordset->EOF) {
	$sys_gender_list->Recordset->moveFirst();
	$selectLimit = $sys_gender_list->UseSelectLimit;
	if (!$selectLimit && $sys_gender_list->StartRec > 1)
		$sys_gender_list->Recordset->move($sys_gender_list->StartRec - 1);
} elseif (!$sys_gender->AllowAddDeleteRow && $sys_gender_list->StopRec == 0) {
	$sys_gender_list->StopRec = $sys_gender->GridAddRowCount;
}

// Initialize aggregate
$sys_gender->RowType = ROWTYPE_AGGREGATEINIT;
$sys_gender->resetAttributes();
$sys_gender_list->renderRow();
while ($sys_gender_list->RecCnt < $sys_gender_list->StopRec) {
	$sys_gender_list->RecCnt++;
	if ($sys_gender_list->RecCnt >= $sys_gender_list->StartRec) {
		$sys_gender_list->RowCnt++;

		// Set up key count
		$sys_gender_list->KeyCount = $sys_gender_list->RowIndex;

		// Init row class and style
		$sys_gender->resetAttributes();
		$sys_gender->CssClass = "";
		if ($sys_gender->isGridAdd()) {
		} else {
			$sys_gender_list->loadRowValues($sys_gender_list->Recordset); // Load row values
		}
		$sys_gender->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$sys_gender->RowAttrs = array_merge($sys_gender->RowAttrs, array('data-rowindex'=>$sys_gender_list->RowCnt, 'id'=>'r' . $sys_gender_list->RowCnt . '_sys_gender', 'data-rowtype'=>$sys_gender->RowType));

		// Render row
		$sys_gender_list->renderRow();

		// Render list options
		$sys_gender_list->renderListOptions();
?>
	<tr<?php echo $sys_gender->rowAttributes() ?>>
<?php

// Render list options (body, left)
$sys_gender_list->ListOptions->render("body", "left", $sys_gender_list->RowCnt);
?>
	<?php if ($sys_gender->id->Visible) { // id ?>
		<td data-name="id"<?php echo $sys_gender->id->cellAttributes() ?>>
<span id="el<?php echo $sys_gender_list->RowCnt ?>_sys_gender_id" class="sys_gender_id">
<span<?php echo $sys_gender->id->viewAttributes() ?>>
<?php echo $sys_gender->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sys_gender->Name->Visible) { // Name ?>
		<td data-name="Name"<?php echo $sys_gender->Name->cellAttributes() ?>>
<span id="el<?php echo $sys_gender_list->RowCnt ?>_sys_gender_Name" class="sys_gender_Name">
<span<?php echo $sys_gender->Name->viewAttributes() ?>>
<?php echo $sys_gender->Name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$sys_gender_list->ListOptions->render("body", "right", $sys_gender_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$sys_gender->isGridAdd())
		$sys_gender_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$sys_gender->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($sys_gender_list->Recordset)
	$sys_gender_list->Recordset->Close();
?>
<?php if (!$sys_gender->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$sys_gender->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($sys_gender_list->Pager)) $sys_gender_list->Pager = new NumericPager($sys_gender_list->StartRec, $sys_gender_list->DisplayRecs, $sys_gender_list->TotalRecs, $sys_gender_list->RecRange, $sys_gender_list->AutoHidePager) ?>
<?php if ($sys_gender_list->Pager->RecordCount > 0 && $sys_gender_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($sys_gender_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $sys_gender_list->pageUrl() ?>start=<?php echo $sys_gender_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($sys_gender_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $sys_gender_list->pageUrl() ?>start=<?php echo $sys_gender_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($sys_gender_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $sys_gender_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($sys_gender_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $sys_gender_list->pageUrl() ?>start=<?php echo $sys_gender_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($sys_gender_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $sys_gender_list->pageUrl() ?>start=<?php echo $sys_gender_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($sys_gender_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $sys_gender_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $sys_gender_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $sys_gender_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($sys_gender_list->TotalRecs > 0 && (!$sys_gender_list->AutoHidePageSizeSelector || $sys_gender_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="sys_gender">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($sys_gender_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($sys_gender_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($sys_gender_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($sys_gender_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($sys_gender_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($sys_gender_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($sys_gender->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $sys_gender_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($sys_gender_list->TotalRecs == 0 && !$sys_gender->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $sys_gender_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$sys_gender_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$sys_gender->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$sys_gender->isExport()) { ?>
<script>
ew.scrollableTable("gmp_sys_gender", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$sys_gender_list->terminate();
?>
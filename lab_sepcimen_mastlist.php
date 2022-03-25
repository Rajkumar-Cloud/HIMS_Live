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
$lab_sepcimen_mast_list = new lab_sepcimen_mast_list();

// Run the page
$lab_sepcimen_mast_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_sepcimen_mast_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$lab_sepcimen_mast->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var flab_sepcimen_mastlist = currentForm = new ew.Form("flab_sepcimen_mastlist", "list");
flab_sepcimen_mastlist.formKeyCountName = '<?php echo $lab_sepcimen_mast_list->FormKeyCountName ?>';

// Form_CustomValidate event
flab_sepcimen_mastlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
flab_sepcimen_mastlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var flab_sepcimen_mastlistsrch = currentSearchForm = new ew.Form("flab_sepcimen_mastlistsrch");

// Filters
flab_sepcimen_mastlistsrch.filterList = <?php echo $lab_sepcimen_mast_list->getFilterList() ?>;
</script>
<script src="phpjs/ewscrolltable.js"></script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$lab_sepcimen_mast->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($lab_sepcimen_mast_list->TotalRecs > 0 && $lab_sepcimen_mast_list->ExportOptions->visible()) { ?>
<?php $lab_sepcimen_mast_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($lab_sepcimen_mast_list->ImportOptions->visible()) { ?>
<?php $lab_sepcimen_mast_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($lab_sepcimen_mast_list->SearchOptions->visible()) { ?>
<?php $lab_sepcimen_mast_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($lab_sepcimen_mast_list->FilterOptions->visible()) { ?>
<?php $lab_sepcimen_mast_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$lab_sepcimen_mast_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$lab_sepcimen_mast->isExport() && !$lab_sepcimen_mast->CurrentAction) { ?>
<form name="flab_sepcimen_mastlistsrch" id="flab_sepcimen_mastlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($lab_sepcimen_mast_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="flab_sepcimen_mastlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="lab_sepcimen_mast">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($lab_sepcimen_mast_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($lab_sepcimen_mast_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $lab_sepcimen_mast_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($lab_sepcimen_mast_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($lab_sepcimen_mast_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($lab_sepcimen_mast_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($lab_sepcimen_mast_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $lab_sepcimen_mast_list->showPageHeader(); ?>
<?php
$lab_sepcimen_mast_list->showMessage();
?>
<?php if ($lab_sepcimen_mast_list->TotalRecs > 0 || $lab_sepcimen_mast->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($lab_sepcimen_mast_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> lab_sepcimen_mast">
<?php if (!$lab_sepcimen_mast->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$lab_sepcimen_mast->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($lab_sepcimen_mast_list->Pager)) $lab_sepcimen_mast_list->Pager = new NumericPager($lab_sepcimen_mast_list->StartRec, $lab_sepcimen_mast_list->DisplayRecs, $lab_sepcimen_mast_list->TotalRecs, $lab_sepcimen_mast_list->RecRange, $lab_sepcimen_mast_list->AutoHidePager) ?>
<?php if ($lab_sepcimen_mast_list->Pager->RecordCount > 0 && $lab_sepcimen_mast_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($lab_sepcimen_mast_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_sepcimen_mast_list->pageUrl() ?>start=<?php echo $lab_sepcimen_mast_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($lab_sepcimen_mast_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_sepcimen_mast_list->pageUrl() ?>start=<?php echo $lab_sepcimen_mast_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($lab_sepcimen_mast_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $lab_sepcimen_mast_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($lab_sepcimen_mast_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_sepcimen_mast_list->pageUrl() ?>start=<?php echo $lab_sepcimen_mast_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($lab_sepcimen_mast_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_sepcimen_mast_list->pageUrl() ?>start=<?php echo $lab_sepcimen_mast_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($lab_sepcimen_mast_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $lab_sepcimen_mast_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $lab_sepcimen_mast_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $lab_sepcimen_mast_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($lab_sepcimen_mast_list->TotalRecs > 0 && (!$lab_sepcimen_mast_list->AutoHidePageSizeSelector || $lab_sepcimen_mast_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="lab_sepcimen_mast">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($lab_sepcimen_mast_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($lab_sepcimen_mast_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($lab_sepcimen_mast_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($lab_sepcimen_mast_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($lab_sepcimen_mast_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($lab_sepcimen_mast_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($lab_sepcimen_mast->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $lab_sepcimen_mast_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="flab_sepcimen_mastlist" id="flab_sepcimen_mastlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($lab_sepcimen_mast_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $lab_sepcimen_mast_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_sepcimen_mast">
<div id="gmp_lab_sepcimen_mast" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($lab_sepcimen_mast_list->TotalRecs > 0 || $lab_sepcimen_mast->isGridEdit()) { ?>
<table id="tbl_lab_sepcimen_mastlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$lab_sepcimen_mast_list->RowType = ROWTYPE_HEADER;

// Render list options
$lab_sepcimen_mast_list->renderListOptions();

// Render list options (header, left)
$lab_sepcimen_mast_list->ListOptions->render("header", "left");
?>
<?php if ($lab_sepcimen_mast->SpecimenCD->Visible) { // SpecimenCD ?>
	<?php if ($lab_sepcimen_mast->sortUrl($lab_sepcimen_mast->SpecimenCD) == "") { ?>
		<th data-name="SpecimenCD" class="<?php echo $lab_sepcimen_mast->SpecimenCD->headerCellClass() ?>"><div id="elh_lab_sepcimen_mast_SpecimenCD" class="lab_sepcimen_mast_SpecimenCD"><div class="ew-table-header-caption"><?php echo $lab_sepcimen_mast->SpecimenCD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SpecimenCD" class="<?php echo $lab_sepcimen_mast->SpecimenCD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_sepcimen_mast->SortUrl($lab_sepcimen_mast->SpecimenCD) ?>',1);"><div id="elh_lab_sepcimen_mast_SpecimenCD" class="lab_sepcimen_mast_SpecimenCD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_sepcimen_mast->SpecimenCD->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_sepcimen_mast->SpecimenCD->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_sepcimen_mast->SpecimenCD->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_sepcimen_mast->SpecimenDesc->Visible) { // SpecimenDesc ?>
	<?php if ($lab_sepcimen_mast->sortUrl($lab_sepcimen_mast->SpecimenDesc) == "") { ?>
		<th data-name="SpecimenDesc" class="<?php echo $lab_sepcimen_mast->SpecimenDesc->headerCellClass() ?>"><div id="elh_lab_sepcimen_mast_SpecimenDesc" class="lab_sepcimen_mast_SpecimenDesc"><div class="ew-table-header-caption"><?php echo $lab_sepcimen_mast->SpecimenDesc->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SpecimenDesc" class="<?php echo $lab_sepcimen_mast->SpecimenDesc->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_sepcimen_mast->SortUrl($lab_sepcimen_mast->SpecimenDesc) ?>',1);"><div id="elh_lab_sepcimen_mast_SpecimenDesc" class="lab_sepcimen_mast_SpecimenDesc">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_sepcimen_mast->SpecimenDesc->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_sepcimen_mast->SpecimenDesc->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_sepcimen_mast->SpecimenDesc->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_sepcimen_mast->id->Visible) { // id ?>
	<?php if ($lab_sepcimen_mast->sortUrl($lab_sepcimen_mast->id) == "") { ?>
		<th data-name="id" class="<?php echo $lab_sepcimen_mast->id->headerCellClass() ?>"><div id="elh_lab_sepcimen_mast_id" class="lab_sepcimen_mast_id"><div class="ew-table-header-caption"><?php echo $lab_sepcimen_mast->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $lab_sepcimen_mast->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_sepcimen_mast->SortUrl($lab_sepcimen_mast->id) ?>',1);"><div id="elh_lab_sepcimen_mast_id" class="lab_sepcimen_mast_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_sepcimen_mast->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_sepcimen_mast->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_sepcimen_mast->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$lab_sepcimen_mast_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($lab_sepcimen_mast->ExportAll && $lab_sepcimen_mast->isExport()) {
	$lab_sepcimen_mast_list->StopRec = $lab_sepcimen_mast_list->TotalRecs;
} else {

	// Set the last record to display
	if ($lab_sepcimen_mast_list->TotalRecs > $lab_sepcimen_mast_list->StartRec + $lab_sepcimen_mast_list->DisplayRecs - 1)
		$lab_sepcimen_mast_list->StopRec = $lab_sepcimen_mast_list->StartRec + $lab_sepcimen_mast_list->DisplayRecs - 1;
	else
		$lab_sepcimen_mast_list->StopRec = $lab_sepcimen_mast_list->TotalRecs;
}
$lab_sepcimen_mast_list->RecCnt = $lab_sepcimen_mast_list->StartRec - 1;
if ($lab_sepcimen_mast_list->Recordset && !$lab_sepcimen_mast_list->Recordset->EOF) {
	$lab_sepcimen_mast_list->Recordset->moveFirst();
	$selectLimit = $lab_sepcimen_mast_list->UseSelectLimit;
	if (!$selectLimit && $lab_sepcimen_mast_list->StartRec > 1)
		$lab_sepcimen_mast_list->Recordset->move($lab_sepcimen_mast_list->StartRec - 1);
} elseif (!$lab_sepcimen_mast->AllowAddDeleteRow && $lab_sepcimen_mast_list->StopRec == 0) {
	$lab_sepcimen_mast_list->StopRec = $lab_sepcimen_mast->GridAddRowCount;
}

// Initialize aggregate
$lab_sepcimen_mast->RowType = ROWTYPE_AGGREGATEINIT;
$lab_sepcimen_mast->resetAttributes();
$lab_sepcimen_mast_list->renderRow();
while ($lab_sepcimen_mast_list->RecCnt < $lab_sepcimen_mast_list->StopRec) {
	$lab_sepcimen_mast_list->RecCnt++;
	if ($lab_sepcimen_mast_list->RecCnt >= $lab_sepcimen_mast_list->StartRec) {
		$lab_sepcimen_mast_list->RowCnt++;

		// Set up key count
		$lab_sepcimen_mast_list->KeyCount = $lab_sepcimen_mast_list->RowIndex;

		// Init row class and style
		$lab_sepcimen_mast->resetAttributes();
		$lab_sepcimen_mast->CssClass = "";
		if ($lab_sepcimen_mast->isGridAdd()) {
		} else {
			$lab_sepcimen_mast_list->loadRowValues($lab_sepcimen_mast_list->Recordset); // Load row values
		}
		$lab_sepcimen_mast->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$lab_sepcimen_mast->RowAttrs = array_merge($lab_sepcimen_mast->RowAttrs, array('data-rowindex'=>$lab_sepcimen_mast_list->RowCnt, 'id'=>'r' . $lab_sepcimen_mast_list->RowCnt . '_lab_sepcimen_mast', 'data-rowtype'=>$lab_sepcimen_mast->RowType));

		// Render row
		$lab_sepcimen_mast_list->renderRow();

		// Render list options
		$lab_sepcimen_mast_list->renderListOptions();
?>
	<tr<?php echo $lab_sepcimen_mast->rowAttributes() ?>>
<?php

// Render list options (body, left)
$lab_sepcimen_mast_list->ListOptions->render("body", "left", $lab_sepcimen_mast_list->RowCnt);
?>
	<?php if ($lab_sepcimen_mast->SpecimenCD->Visible) { // SpecimenCD ?>
		<td data-name="SpecimenCD"<?php echo $lab_sepcimen_mast->SpecimenCD->cellAttributes() ?>>
<span id="el<?php echo $lab_sepcimen_mast_list->RowCnt ?>_lab_sepcimen_mast_SpecimenCD" class="lab_sepcimen_mast_SpecimenCD">
<span<?php echo $lab_sepcimen_mast->SpecimenCD->viewAttributes() ?>>
<?php echo $lab_sepcimen_mast->SpecimenCD->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_sepcimen_mast->SpecimenDesc->Visible) { // SpecimenDesc ?>
		<td data-name="SpecimenDesc"<?php echo $lab_sepcimen_mast->SpecimenDesc->cellAttributes() ?>>
<span id="el<?php echo $lab_sepcimen_mast_list->RowCnt ?>_lab_sepcimen_mast_SpecimenDesc" class="lab_sepcimen_mast_SpecimenDesc">
<span<?php echo $lab_sepcimen_mast->SpecimenDesc->viewAttributes() ?>>
<?php echo $lab_sepcimen_mast->SpecimenDesc->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_sepcimen_mast->id->Visible) { // id ?>
		<td data-name="id"<?php echo $lab_sepcimen_mast->id->cellAttributes() ?>>
<span id="el<?php echo $lab_sepcimen_mast_list->RowCnt ?>_lab_sepcimen_mast_id" class="lab_sepcimen_mast_id">
<span<?php echo $lab_sepcimen_mast->id->viewAttributes() ?>>
<?php echo $lab_sepcimen_mast->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$lab_sepcimen_mast_list->ListOptions->render("body", "right", $lab_sepcimen_mast_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$lab_sepcimen_mast->isGridAdd())
		$lab_sepcimen_mast_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$lab_sepcimen_mast->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($lab_sepcimen_mast_list->Recordset)
	$lab_sepcimen_mast_list->Recordset->Close();
?>
<?php if (!$lab_sepcimen_mast->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$lab_sepcimen_mast->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($lab_sepcimen_mast_list->Pager)) $lab_sepcimen_mast_list->Pager = new NumericPager($lab_sepcimen_mast_list->StartRec, $lab_sepcimen_mast_list->DisplayRecs, $lab_sepcimen_mast_list->TotalRecs, $lab_sepcimen_mast_list->RecRange, $lab_sepcimen_mast_list->AutoHidePager) ?>
<?php if ($lab_sepcimen_mast_list->Pager->RecordCount > 0 && $lab_sepcimen_mast_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($lab_sepcimen_mast_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_sepcimen_mast_list->pageUrl() ?>start=<?php echo $lab_sepcimen_mast_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($lab_sepcimen_mast_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_sepcimen_mast_list->pageUrl() ?>start=<?php echo $lab_sepcimen_mast_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($lab_sepcimen_mast_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $lab_sepcimen_mast_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($lab_sepcimen_mast_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_sepcimen_mast_list->pageUrl() ?>start=<?php echo $lab_sepcimen_mast_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($lab_sepcimen_mast_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_sepcimen_mast_list->pageUrl() ?>start=<?php echo $lab_sepcimen_mast_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($lab_sepcimen_mast_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $lab_sepcimen_mast_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $lab_sepcimen_mast_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $lab_sepcimen_mast_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($lab_sepcimen_mast_list->TotalRecs > 0 && (!$lab_sepcimen_mast_list->AutoHidePageSizeSelector || $lab_sepcimen_mast_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="lab_sepcimen_mast">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($lab_sepcimen_mast_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($lab_sepcimen_mast_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($lab_sepcimen_mast_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($lab_sepcimen_mast_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($lab_sepcimen_mast_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($lab_sepcimen_mast_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($lab_sepcimen_mast->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $lab_sepcimen_mast_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($lab_sepcimen_mast_list->TotalRecs == 0 && !$lab_sepcimen_mast->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $lab_sepcimen_mast_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$lab_sepcimen_mast_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$lab_sepcimen_mast->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$lab_sepcimen_mast->isExport()) { ?>
<script>
ew.scrollableTable("gmp_lab_sepcimen_mast", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$lab_sepcimen_mast_list->terminate();
?>
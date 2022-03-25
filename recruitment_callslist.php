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
$recruitment_calls_list = new recruitment_calls_list();

// Run the page
$recruitment_calls_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$recruitment_calls_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$recruitment_calls->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var frecruitment_callslist = currentForm = new ew.Form("frecruitment_callslist", "list");
frecruitment_callslist.formKeyCountName = '<?php echo $recruitment_calls_list->FormKeyCountName ?>';

// Form_CustomValidate event
frecruitment_callslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
frecruitment_callslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var frecruitment_callslistsrch = currentSearchForm = new ew.Form("frecruitment_callslistsrch");

// Filters
frecruitment_callslistsrch.filterList = <?php echo $recruitment_calls_list->getFilterList() ?>;
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
<?php if (!$recruitment_calls->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($recruitment_calls_list->TotalRecs > 0 && $recruitment_calls_list->ExportOptions->visible()) { ?>
<?php $recruitment_calls_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($recruitment_calls_list->ImportOptions->visible()) { ?>
<?php $recruitment_calls_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($recruitment_calls_list->SearchOptions->visible()) { ?>
<?php $recruitment_calls_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($recruitment_calls_list->FilterOptions->visible()) { ?>
<?php $recruitment_calls_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$recruitment_calls_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$recruitment_calls->isExport() && !$recruitment_calls->CurrentAction) { ?>
<form name="frecruitment_callslistsrch" id="frecruitment_callslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($recruitment_calls_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="frecruitment_callslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="recruitment_calls">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($recruitment_calls_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($recruitment_calls_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $recruitment_calls_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($recruitment_calls_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($recruitment_calls_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($recruitment_calls_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($recruitment_calls_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $recruitment_calls_list->showPageHeader(); ?>
<?php
$recruitment_calls_list->showMessage();
?>
<?php if ($recruitment_calls_list->TotalRecs > 0 || $recruitment_calls->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($recruitment_calls_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> recruitment_calls">
<?php if (!$recruitment_calls->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$recruitment_calls->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($recruitment_calls_list->Pager)) $recruitment_calls_list->Pager = new NumericPager($recruitment_calls_list->StartRec, $recruitment_calls_list->DisplayRecs, $recruitment_calls_list->TotalRecs, $recruitment_calls_list->RecRange, $recruitment_calls_list->AutoHidePager) ?>
<?php if ($recruitment_calls_list->Pager->RecordCount > 0 && $recruitment_calls_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($recruitment_calls_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $recruitment_calls_list->pageUrl() ?>start=<?php echo $recruitment_calls_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($recruitment_calls_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $recruitment_calls_list->pageUrl() ?>start=<?php echo $recruitment_calls_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($recruitment_calls_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $recruitment_calls_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($recruitment_calls_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $recruitment_calls_list->pageUrl() ?>start=<?php echo $recruitment_calls_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($recruitment_calls_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $recruitment_calls_list->pageUrl() ?>start=<?php echo $recruitment_calls_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($recruitment_calls_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $recruitment_calls_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $recruitment_calls_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $recruitment_calls_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($recruitment_calls_list->TotalRecs > 0 && (!$recruitment_calls_list->AutoHidePageSizeSelector || $recruitment_calls_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="recruitment_calls">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($recruitment_calls_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($recruitment_calls_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($recruitment_calls_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($recruitment_calls_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($recruitment_calls_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($recruitment_calls_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($recruitment_calls->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $recruitment_calls_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="frecruitment_callslist" id="frecruitment_callslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($recruitment_calls_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $recruitment_calls_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="recruitment_calls">
<div id="gmp_recruitment_calls" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($recruitment_calls_list->TotalRecs > 0 || $recruitment_calls->isGridEdit()) { ?>
<table id="tbl_recruitment_callslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$recruitment_calls_list->RowType = ROWTYPE_HEADER;

// Render list options
$recruitment_calls_list->renderListOptions();

// Render list options (header, left)
$recruitment_calls_list->ListOptions->render("header", "left");
?>
<?php if ($recruitment_calls->id->Visible) { // id ?>
	<?php if ($recruitment_calls->sortUrl($recruitment_calls->id) == "") { ?>
		<th data-name="id" class="<?php echo $recruitment_calls->id->headerCellClass() ?>"><div id="elh_recruitment_calls_id" class="recruitment_calls_id"><div class="ew-table-header-caption"><?php echo $recruitment_calls->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $recruitment_calls->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_calls->SortUrl($recruitment_calls->id) ?>',1);"><div id="elh_recruitment_calls_id" class="recruitment_calls_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_calls->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($recruitment_calls->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_calls->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recruitment_calls->job->Visible) { // job ?>
	<?php if ($recruitment_calls->sortUrl($recruitment_calls->job) == "") { ?>
		<th data-name="job" class="<?php echo $recruitment_calls->job->headerCellClass() ?>"><div id="elh_recruitment_calls_job" class="recruitment_calls_job"><div class="ew-table-header-caption"><?php echo $recruitment_calls->job->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="job" class="<?php echo $recruitment_calls->job->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_calls->SortUrl($recruitment_calls->job) ?>',1);"><div id="elh_recruitment_calls_job" class="recruitment_calls_job">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_calls->job->caption() ?></span><span class="ew-table-header-sort"><?php if ($recruitment_calls->job->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_calls->job->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recruitment_calls->candidate->Visible) { // candidate ?>
	<?php if ($recruitment_calls->sortUrl($recruitment_calls->candidate) == "") { ?>
		<th data-name="candidate" class="<?php echo $recruitment_calls->candidate->headerCellClass() ?>"><div id="elh_recruitment_calls_candidate" class="recruitment_calls_candidate"><div class="ew-table-header-caption"><?php echo $recruitment_calls->candidate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="candidate" class="<?php echo $recruitment_calls->candidate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_calls->SortUrl($recruitment_calls->candidate) ?>',1);"><div id="elh_recruitment_calls_candidate" class="recruitment_calls_candidate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_calls->candidate->caption() ?></span><span class="ew-table-header-sort"><?php if ($recruitment_calls->candidate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_calls->candidate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recruitment_calls->phone->Visible) { // phone ?>
	<?php if ($recruitment_calls->sortUrl($recruitment_calls->phone) == "") { ?>
		<th data-name="phone" class="<?php echo $recruitment_calls->phone->headerCellClass() ?>"><div id="elh_recruitment_calls_phone" class="recruitment_calls_phone"><div class="ew-table-header-caption"><?php echo $recruitment_calls->phone->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="phone" class="<?php echo $recruitment_calls->phone->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_calls->SortUrl($recruitment_calls->phone) ?>',1);"><div id="elh_recruitment_calls_phone" class="recruitment_calls_phone">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_calls->phone->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($recruitment_calls->phone->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_calls->phone->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recruitment_calls->created->Visible) { // created ?>
	<?php if ($recruitment_calls->sortUrl($recruitment_calls->created) == "") { ?>
		<th data-name="created" class="<?php echo $recruitment_calls->created->headerCellClass() ?>"><div id="elh_recruitment_calls_created" class="recruitment_calls_created"><div class="ew-table-header-caption"><?php echo $recruitment_calls->created->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="created" class="<?php echo $recruitment_calls->created->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_calls->SortUrl($recruitment_calls->created) ?>',1);"><div id="elh_recruitment_calls_created" class="recruitment_calls_created">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_calls->created->caption() ?></span><span class="ew-table-header-sort"><?php if ($recruitment_calls->created->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_calls->created->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recruitment_calls->updated->Visible) { // updated ?>
	<?php if ($recruitment_calls->sortUrl($recruitment_calls->updated) == "") { ?>
		<th data-name="updated" class="<?php echo $recruitment_calls->updated->headerCellClass() ?>"><div id="elh_recruitment_calls_updated" class="recruitment_calls_updated"><div class="ew-table-header-caption"><?php echo $recruitment_calls->updated->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="updated" class="<?php echo $recruitment_calls->updated->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_calls->SortUrl($recruitment_calls->updated) ?>',1);"><div id="elh_recruitment_calls_updated" class="recruitment_calls_updated">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_calls->updated->caption() ?></span><span class="ew-table-header-sort"><?php if ($recruitment_calls->updated->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_calls->updated->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recruitment_calls->status->Visible) { // status ?>
	<?php if ($recruitment_calls->sortUrl($recruitment_calls->status) == "") { ?>
		<th data-name="status" class="<?php echo $recruitment_calls->status->headerCellClass() ?>"><div id="elh_recruitment_calls_status" class="recruitment_calls_status"><div class="ew-table-header-caption"><?php echo $recruitment_calls->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $recruitment_calls->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_calls->SortUrl($recruitment_calls->status) ?>',1);"><div id="elh_recruitment_calls_status" class="recruitment_calls_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_calls->status->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($recruitment_calls->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_calls->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$recruitment_calls_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($recruitment_calls->ExportAll && $recruitment_calls->isExport()) {
	$recruitment_calls_list->StopRec = $recruitment_calls_list->TotalRecs;
} else {

	// Set the last record to display
	if ($recruitment_calls_list->TotalRecs > $recruitment_calls_list->StartRec + $recruitment_calls_list->DisplayRecs - 1)
		$recruitment_calls_list->StopRec = $recruitment_calls_list->StartRec + $recruitment_calls_list->DisplayRecs - 1;
	else
		$recruitment_calls_list->StopRec = $recruitment_calls_list->TotalRecs;
}
$recruitment_calls_list->RecCnt = $recruitment_calls_list->StartRec - 1;
if ($recruitment_calls_list->Recordset && !$recruitment_calls_list->Recordset->EOF) {
	$recruitment_calls_list->Recordset->moveFirst();
	$selectLimit = $recruitment_calls_list->UseSelectLimit;
	if (!$selectLimit && $recruitment_calls_list->StartRec > 1)
		$recruitment_calls_list->Recordset->move($recruitment_calls_list->StartRec - 1);
} elseif (!$recruitment_calls->AllowAddDeleteRow && $recruitment_calls_list->StopRec == 0) {
	$recruitment_calls_list->StopRec = $recruitment_calls->GridAddRowCount;
}

// Initialize aggregate
$recruitment_calls->RowType = ROWTYPE_AGGREGATEINIT;
$recruitment_calls->resetAttributes();
$recruitment_calls_list->renderRow();
while ($recruitment_calls_list->RecCnt < $recruitment_calls_list->StopRec) {
	$recruitment_calls_list->RecCnt++;
	if ($recruitment_calls_list->RecCnt >= $recruitment_calls_list->StartRec) {
		$recruitment_calls_list->RowCnt++;

		// Set up key count
		$recruitment_calls_list->KeyCount = $recruitment_calls_list->RowIndex;

		// Init row class and style
		$recruitment_calls->resetAttributes();
		$recruitment_calls->CssClass = "";
		if ($recruitment_calls->isGridAdd()) {
		} else {
			$recruitment_calls_list->loadRowValues($recruitment_calls_list->Recordset); // Load row values
		}
		$recruitment_calls->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$recruitment_calls->RowAttrs = array_merge($recruitment_calls->RowAttrs, array('data-rowindex'=>$recruitment_calls_list->RowCnt, 'id'=>'r' . $recruitment_calls_list->RowCnt . '_recruitment_calls', 'data-rowtype'=>$recruitment_calls->RowType));

		// Render row
		$recruitment_calls_list->renderRow();

		// Render list options
		$recruitment_calls_list->renderListOptions();
?>
	<tr<?php echo $recruitment_calls->rowAttributes() ?>>
<?php

// Render list options (body, left)
$recruitment_calls_list->ListOptions->render("body", "left", $recruitment_calls_list->RowCnt);
?>
	<?php if ($recruitment_calls->id->Visible) { // id ?>
		<td data-name="id"<?php echo $recruitment_calls->id->cellAttributes() ?>>
<span id="el<?php echo $recruitment_calls_list->RowCnt ?>_recruitment_calls_id" class="recruitment_calls_id">
<span<?php echo $recruitment_calls->id->viewAttributes() ?>>
<?php echo $recruitment_calls->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recruitment_calls->job->Visible) { // job ?>
		<td data-name="job"<?php echo $recruitment_calls->job->cellAttributes() ?>>
<span id="el<?php echo $recruitment_calls_list->RowCnt ?>_recruitment_calls_job" class="recruitment_calls_job">
<span<?php echo $recruitment_calls->job->viewAttributes() ?>>
<?php echo $recruitment_calls->job->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recruitment_calls->candidate->Visible) { // candidate ?>
		<td data-name="candidate"<?php echo $recruitment_calls->candidate->cellAttributes() ?>>
<span id="el<?php echo $recruitment_calls_list->RowCnt ?>_recruitment_calls_candidate" class="recruitment_calls_candidate">
<span<?php echo $recruitment_calls->candidate->viewAttributes() ?>>
<?php echo $recruitment_calls->candidate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recruitment_calls->phone->Visible) { // phone ?>
		<td data-name="phone"<?php echo $recruitment_calls->phone->cellAttributes() ?>>
<span id="el<?php echo $recruitment_calls_list->RowCnt ?>_recruitment_calls_phone" class="recruitment_calls_phone">
<span<?php echo $recruitment_calls->phone->viewAttributes() ?>>
<?php echo $recruitment_calls->phone->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recruitment_calls->created->Visible) { // created ?>
		<td data-name="created"<?php echo $recruitment_calls->created->cellAttributes() ?>>
<span id="el<?php echo $recruitment_calls_list->RowCnt ?>_recruitment_calls_created" class="recruitment_calls_created">
<span<?php echo $recruitment_calls->created->viewAttributes() ?>>
<?php echo $recruitment_calls->created->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recruitment_calls->updated->Visible) { // updated ?>
		<td data-name="updated"<?php echo $recruitment_calls->updated->cellAttributes() ?>>
<span id="el<?php echo $recruitment_calls_list->RowCnt ?>_recruitment_calls_updated" class="recruitment_calls_updated">
<span<?php echo $recruitment_calls->updated->viewAttributes() ?>>
<?php echo $recruitment_calls->updated->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recruitment_calls->status->Visible) { // status ?>
		<td data-name="status"<?php echo $recruitment_calls->status->cellAttributes() ?>>
<span id="el<?php echo $recruitment_calls_list->RowCnt ?>_recruitment_calls_status" class="recruitment_calls_status">
<span<?php echo $recruitment_calls->status->viewAttributes() ?>>
<?php echo $recruitment_calls->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$recruitment_calls_list->ListOptions->render("body", "right", $recruitment_calls_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$recruitment_calls->isGridAdd())
		$recruitment_calls_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$recruitment_calls->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($recruitment_calls_list->Recordset)
	$recruitment_calls_list->Recordset->Close();
?>
<?php if (!$recruitment_calls->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$recruitment_calls->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($recruitment_calls_list->Pager)) $recruitment_calls_list->Pager = new NumericPager($recruitment_calls_list->StartRec, $recruitment_calls_list->DisplayRecs, $recruitment_calls_list->TotalRecs, $recruitment_calls_list->RecRange, $recruitment_calls_list->AutoHidePager) ?>
<?php if ($recruitment_calls_list->Pager->RecordCount > 0 && $recruitment_calls_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($recruitment_calls_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $recruitment_calls_list->pageUrl() ?>start=<?php echo $recruitment_calls_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($recruitment_calls_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $recruitment_calls_list->pageUrl() ?>start=<?php echo $recruitment_calls_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($recruitment_calls_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $recruitment_calls_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($recruitment_calls_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $recruitment_calls_list->pageUrl() ?>start=<?php echo $recruitment_calls_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($recruitment_calls_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $recruitment_calls_list->pageUrl() ?>start=<?php echo $recruitment_calls_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($recruitment_calls_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $recruitment_calls_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $recruitment_calls_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $recruitment_calls_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($recruitment_calls_list->TotalRecs > 0 && (!$recruitment_calls_list->AutoHidePageSizeSelector || $recruitment_calls_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="recruitment_calls">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($recruitment_calls_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($recruitment_calls_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($recruitment_calls_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($recruitment_calls_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($recruitment_calls_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($recruitment_calls_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($recruitment_calls->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $recruitment_calls_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($recruitment_calls_list->TotalRecs == 0 && !$recruitment_calls->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $recruitment_calls_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$recruitment_calls_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$recruitment_calls->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$recruitment_calls->isExport()) { ?>
<script>
ew.scrollableTable("gmp_recruitment_calls", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$recruitment_calls_list->terminate();
?>
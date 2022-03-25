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
$recruitment_interviews_list = new recruitment_interviews_list();

// Run the page
$recruitment_interviews_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$recruitment_interviews_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$recruitment_interviews->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var frecruitment_interviewslist = currentForm = new ew.Form("frecruitment_interviewslist", "list");
frecruitment_interviewslist.formKeyCountName = '<?php echo $recruitment_interviews_list->FormKeyCountName ?>';

// Form_CustomValidate event
frecruitment_interviewslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
frecruitment_interviewslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var frecruitment_interviewslistsrch = currentSearchForm = new ew.Form("frecruitment_interviewslistsrch");

// Filters
frecruitment_interviewslistsrch.filterList = <?php echo $recruitment_interviews_list->getFilterList() ?>;
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
<?php if (!$recruitment_interviews->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($recruitment_interviews_list->TotalRecs > 0 && $recruitment_interviews_list->ExportOptions->visible()) { ?>
<?php $recruitment_interviews_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($recruitment_interviews_list->ImportOptions->visible()) { ?>
<?php $recruitment_interviews_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($recruitment_interviews_list->SearchOptions->visible()) { ?>
<?php $recruitment_interviews_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($recruitment_interviews_list->FilterOptions->visible()) { ?>
<?php $recruitment_interviews_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$recruitment_interviews_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$recruitment_interviews->isExport() && !$recruitment_interviews->CurrentAction) { ?>
<form name="frecruitment_interviewslistsrch" id="frecruitment_interviewslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($recruitment_interviews_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="frecruitment_interviewslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="recruitment_interviews">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($recruitment_interviews_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($recruitment_interviews_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $recruitment_interviews_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($recruitment_interviews_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($recruitment_interviews_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($recruitment_interviews_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($recruitment_interviews_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $recruitment_interviews_list->showPageHeader(); ?>
<?php
$recruitment_interviews_list->showMessage();
?>
<?php if ($recruitment_interviews_list->TotalRecs > 0 || $recruitment_interviews->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($recruitment_interviews_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> recruitment_interviews">
<?php if (!$recruitment_interviews->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$recruitment_interviews->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($recruitment_interviews_list->Pager)) $recruitment_interviews_list->Pager = new NumericPager($recruitment_interviews_list->StartRec, $recruitment_interviews_list->DisplayRecs, $recruitment_interviews_list->TotalRecs, $recruitment_interviews_list->RecRange, $recruitment_interviews_list->AutoHidePager) ?>
<?php if ($recruitment_interviews_list->Pager->RecordCount > 0 && $recruitment_interviews_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($recruitment_interviews_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $recruitment_interviews_list->pageUrl() ?>start=<?php echo $recruitment_interviews_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($recruitment_interviews_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $recruitment_interviews_list->pageUrl() ?>start=<?php echo $recruitment_interviews_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($recruitment_interviews_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $recruitment_interviews_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($recruitment_interviews_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $recruitment_interviews_list->pageUrl() ?>start=<?php echo $recruitment_interviews_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($recruitment_interviews_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $recruitment_interviews_list->pageUrl() ?>start=<?php echo $recruitment_interviews_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($recruitment_interviews_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $recruitment_interviews_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $recruitment_interviews_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $recruitment_interviews_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($recruitment_interviews_list->TotalRecs > 0 && (!$recruitment_interviews_list->AutoHidePageSizeSelector || $recruitment_interviews_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="recruitment_interviews">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($recruitment_interviews_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($recruitment_interviews_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($recruitment_interviews_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($recruitment_interviews_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($recruitment_interviews_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($recruitment_interviews_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($recruitment_interviews->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $recruitment_interviews_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="frecruitment_interviewslist" id="frecruitment_interviewslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($recruitment_interviews_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $recruitment_interviews_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="recruitment_interviews">
<div id="gmp_recruitment_interviews" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($recruitment_interviews_list->TotalRecs > 0 || $recruitment_interviews->isGridEdit()) { ?>
<table id="tbl_recruitment_interviewslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$recruitment_interviews_list->RowType = ROWTYPE_HEADER;

// Render list options
$recruitment_interviews_list->renderListOptions();

// Render list options (header, left)
$recruitment_interviews_list->ListOptions->render("header", "left");
?>
<?php if ($recruitment_interviews->id->Visible) { // id ?>
	<?php if ($recruitment_interviews->sortUrl($recruitment_interviews->id) == "") { ?>
		<th data-name="id" class="<?php echo $recruitment_interviews->id->headerCellClass() ?>"><div id="elh_recruitment_interviews_id" class="recruitment_interviews_id"><div class="ew-table-header-caption"><?php echo $recruitment_interviews->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $recruitment_interviews->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_interviews->SortUrl($recruitment_interviews->id) ?>',1);"><div id="elh_recruitment_interviews_id" class="recruitment_interviews_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_interviews->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($recruitment_interviews->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_interviews->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recruitment_interviews->job->Visible) { // job ?>
	<?php if ($recruitment_interviews->sortUrl($recruitment_interviews->job) == "") { ?>
		<th data-name="job" class="<?php echo $recruitment_interviews->job->headerCellClass() ?>"><div id="elh_recruitment_interviews_job" class="recruitment_interviews_job"><div class="ew-table-header-caption"><?php echo $recruitment_interviews->job->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="job" class="<?php echo $recruitment_interviews->job->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_interviews->SortUrl($recruitment_interviews->job) ?>',1);"><div id="elh_recruitment_interviews_job" class="recruitment_interviews_job">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_interviews->job->caption() ?></span><span class="ew-table-header-sort"><?php if ($recruitment_interviews->job->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_interviews->job->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recruitment_interviews->candidate->Visible) { // candidate ?>
	<?php if ($recruitment_interviews->sortUrl($recruitment_interviews->candidate) == "") { ?>
		<th data-name="candidate" class="<?php echo $recruitment_interviews->candidate->headerCellClass() ?>"><div id="elh_recruitment_interviews_candidate" class="recruitment_interviews_candidate"><div class="ew-table-header-caption"><?php echo $recruitment_interviews->candidate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="candidate" class="<?php echo $recruitment_interviews->candidate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_interviews->SortUrl($recruitment_interviews->candidate) ?>',1);"><div id="elh_recruitment_interviews_candidate" class="recruitment_interviews_candidate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_interviews->candidate->caption() ?></span><span class="ew-table-header-sort"><?php if ($recruitment_interviews->candidate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_interviews->candidate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recruitment_interviews->level->Visible) { // level ?>
	<?php if ($recruitment_interviews->sortUrl($recruitment_interviews->level) == "") { ?>
		<th data-name="level" class="<?php echo $recruitment_interviews->level->headerCellClass() ?>"><div id="elh_recruitment_interviews_level" class="recruitment_interviews_level"><div class="ew-table-header-caption"><?php echo $recruitment_interviews->level->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="level" class="<?php echo $recruitment_interviews->level->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_interviews->SortUrl($recruitment_interviews->level) ?>',1);"><div id="elh_recruitment_interviews_level" class="recruitment_interviews_level">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_interviews->level->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($recruitment_interviews->level->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_interviews->level->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recruitment_interviews->created->Visible) { // created ?>
	<?php if ($recruitment_interviews->sortUrl($recruitment_interviews->created) == "") { ?>
		<th data-name="created" class="<?php echo $recruitment_interviews->created->headerCellClass() ?>"><div id="elh_recruitment_interviews_created" class="recruitment_interviews_created"><div class="ew-table-header-caption"><?php echo $recruitment_interviews->created->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="created" class="<?php echo $recruitment_interviews->created->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_interviews->SortUrl($recruitment_interviews->created) ?>',1);"><div id="elh_recruitment_interviews_created" class="recruitment_interviews_created">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_interviews->created->caption() ?></span><span class="ew-table-header-sort"><?php if ($recruitment_interviews->created->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_interviews->created->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recruitment_interviews->updated->Visible) { // updated ?>
	<?php if ($recruitment_interviews->sortUrl($recruitment_interviews->updated) == "") { ?>
		<th data-name="updated" class="<?php echo $recruitment_interviews->updated->headerCellClass() ?>"><div id="elh_recruitment_interviews_updated" class="recruitment_interviews_updated"><div class="ew-table-header-caption"><?php echo $recruitment_interviews->updated->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="updated" class="<?php echo $recruitment_interviews->updated->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_interviews->SortUrl($recruitment_interviews->updated) ?>',1);"><div id="elh_recruitment_interviews_updated" class="recruitment_interviews_updated">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_interviews->updated->caption() ?></span><span class="ew-table-header-sort"><?php if ($recruitment_interviews->updated->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_interviews->updated->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recruitment_interviews->scheduled->Visible) { // scheduled ?>
	<?php if ($recruitment_interviews->sortUrl($recruitment_interviews->scheduled) == "") { ?>
		<th data-name="scheduled" class="<?php echo $recruitment_interviews->scheduled->headerCellClass() ?>"><div id="elh_recruitment_interviews_scheduled" class="recruitment_interviews_scheduled"><div class="ew-table-header-caption"><?php echo $recruitment_interviews->scheduled->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="scheduled" class="<?php echo $recruitment_interviews->scheduled->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_interviews->SortUrl($recruitment_interviews->scheduled) ?>',1);"><div id="elh_recruitment_interviews_scheduled" class="recruitment_interviews_scheduled">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_interviews->scheduled->caption() ?></span><span class="ew-table-header-sort"><?php if ($recruitment_interviews->scheduled->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_interviews->scheduled->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recruitment_interviews->mapId->Visible) { // mapId ?>
	<?php if ($recruitment_interviews->sortUrl($recruitment_interviews->mapId) == "") { ?>
		<th data-name="mapId" class="<?php echo $recruitment_interviews->mapId->headerCellClass() ?>"><div id="elh_recruitment_interviews_mapId" class="recruitment_interviews_mapId"><div class="ew-table-header-caption"><?php echo $recruitment_interviews->mapId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mapId" class="<?php echo $recruitment_interviews->mapId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_interviews->SortUrl($recruitment_interviews->mapId) ?>',1);"><div id="elh_recruitment_interviews_mapId" class="recruitment_interviews_mapId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_interviews->mapId->caption() ?></span><span class="ew-table-header-sort"><?php if ($recruitment_interviews->mapId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_interviews->mapId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recruitment_interviews->status->Visible) { // status ?>
	<?php if ($recruitment_interviews->sortUrl($recruitment_interviews->status) == "") { ?>
		<th data-name="status" class="<?php echo $recruitment_interviews->status->headerCellClass() ?>"><div id="elh_recruitment_interviews_status" class="recruitment_interviews_status"><div class="ew-table-header-caption"><?php echo $recruitment_interviews->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $recruitment_interviews->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_interviews->SortUrl($recruitment_interviews->status) ?>',1);"><div id="elh_recruitment_interviews_status" class="recruitment_interviews_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_interviews->status->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($recruitment_interviews->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_interviews->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$recruitment_interviews_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($recruitment_interviews->ExportAll && $recruitment_interviews->isExport()) {
	$recruitment_interviews_list->StopRec = $recruitment_interviews_list->TotalRecs;
} else {

	// Set the last record to display
	if ($recruitment_interviews_list->TotalRecs > $recruitment_interviews_list->StartRec + $recruitment_interviews_list->DisplayRecs - 1)
		$recruitment_interviews_list->StopRec = $recruitment_interviews_list->StartRec + $recruitment_interviews_list->DisplayRecs - 1;
	else
		$recruitment_interviews_list->StopRec = $recruitment_interviews_list->TotalRecs;
}
$recruitment_interviews_list->RecCnt = $recruitment_interviews_list->StartRec - 1;
if ($recruitment_interviews_list->Recordset && !$recruitment_interviews_list->Recordset->EOF) {
	$recruitment_interviews_list->Recordset->moveFirst();
	$selectLimit = $recruitment_interviews_list->UseSelectLimit;
	if (!$selectLimit && $recruitment_interviews_list->StartRec > 1)
		$recruitment_interviews_list->Recordset->move($recruitment_interviews_list->StartRec - 1);
} elseif (!$recruitment_interviews->AllowAddDeleteRow && $recruitment_interviews_list->StopRec == 0) {
	$recruitment_interviews_list->StopRec = $recruitment_interviews->GridAddRowCount;
}

// Initialize aggregate
$recruitment_interviews->RowType = ROWTYPE_AGGREGATEINIT;
$recruitment_interviews->resetAttributes();
$recruitment_interviews_list->renderRow();
while ($recruitment_interviews_list->RecCnt < $recruitment_interviews_list->StopRec) {
	$recruitment_interviews_list->RecCnt++;
	if ($recruitment_interviews_list->RecCnt >= $recruitment_interviews_list->StartRec) {
		$recruitment_interviews_list->RowCnt++;

		// Set up key count
		$recruitment_interviews_list->KeyCount = $recruitment_interviews_list->RowIndex;

		// Init row class and style
		$recruitment_interviews->resetAttributes();
		$recruitment_interviews->CssClass = "";
		if ($recruitment_interviews->isGridAdd()) {
		} else {
			$recruitment_interviews_list->loadRowValues($recruitment_interviews_list->Recordset); // Load row values
		}
		$recruitment_interviews->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$recruitment_interviews->RowAttrs = array_merge($recruitment_interviews->RowAttrs, array('data-rowindex'=>$recruitment_interviews_list->RowCnt, 'id'=>'r' . $recruitment_interviews_list->RowCnt . '_recruitment_interviews', 'data-rowtype'=>$recruitment_interviews->RowType));

		// Render row
		$recruitment_interviews_list->renderRow();

		// Render list options
		$recruitment_interviews_list->renderListOptions();
?>
	<tr<?php echo $recruitment_interviews->rowAttributes() ?>>
<?php

// Render list options (body, left)
$recruitment_interviews_list->ListOptions->render("body", "left", $recruitment_interviews_list->RowCnt);
?>
	<?php if ($recruitment_interviews->id->Visible) { // id ?>
		<td data-name="id"<?php echo $recruitment_interviews->id->cellAttributes() ?>>
<span id="el<?php echo $recruitment_interviews_list->RowCnt ?>_recruitment_interviews_id" class="recruitment_interviews_id">
<span<?php echo $recruitment_interviews->id->viewAttributes() ?>>
<?php echo $recruitment_interviews->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recruitment_interviews->job->Visible) { // job ?>
		<td data-name="job"<?php echo $recruitment_interviews->job->cellAttributes() ?>>
<span id="el<?php echo $recruitment_interviews_list->RowCnt ?>_recruitment_interviews_job" class="recruitment_interviews_job">
<span<?php echo $recruitment_interviews->job->viewAttributes() ?>>
<?php echo $recruitment_interviews->job->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recruitment_interviews->candidate->Visible) { // candidate ?>
		<td data-name="candidate"<?php echo $recruitment_interviews->candidate->cellAttributes() ?>>
<span id="el<?php echo $recruitment_interviews_list->RowCnt ?>_recruitment_interviews_candidate" class="recruitment_interviews_candidate">
<span<?php echo $recruitment_interviews->candidate->viewAttributes() ?>>
<?php echo $recruitment_interviews->candidate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recruitment_interviews->level->Visible) { // level ?>
		<td data-name="level"<?php echo $recruitment_interviews->level->cellAttributes() ?>>
<span id="el<?php echo $recruitment_interviews_list->RowCnt ?>_recruitment_interviews_level" class="recruitment_interviews_level">
<span<?php echo $recruitment_interviews->level->viewAttributes() ?>>
<?php echo $recruitment_interviews->level->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recruitment_interviews->created->Visible) { // created ?>
		<td data-name="created"<?php echo $recruitment_interviews->created->cellAttributes() ?>>
<span id="el<?php echo $recruitment_interviews_list->RowCnt ?>_recruitment_interviews_created" class="recruitment_interviews_created">
<span<?php echo $recruitment_interviews->created->viewAttributes() ?>>
<?php echo $recruitment_interviews->created->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recruitment_interviews->updated->Visible) { // updated ?>
		<td data-name="updated"<?php echo $recruitment_interviews->updated->cellAttributes() ?>>
<span id="el<?php echo $recruitment_interviews_list->RowCnt ?>_recruitment_interviews_updated" class="recruitment_interviews_updated">
<span<?php echo $recruitment_interviews->updated->viewAttributes() ?>>
<?php echo $recruitment_interviews->updated->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recruitment_interviews->scheduled->Visible) { // scheduled ?>
		<td data-name="scheduled"<?php echo $recruitment_interviews->scheduled->cellAttributes() ?>>
<span id="el<?php echo $recruitment_interviews_list->RowCnt ?>_recruitment_interviews_scheduled" class="recruitment_interviews_scheduled">
<span<?php echo $recruitment_interviews->scheduled->viewAttributes() ?>>
<?php echo $recruitment_interviews->scheduled->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recruitment_interviews->mapId->Visible) { // mapId ?>
		<td data-name="mapId"<?php echo $recruitment_interviews->mapId->cellAttributes() ?>>
<span id="el<?php echo $recruitment_interviews_list->RowCnt ?>_recruitment_interviews_mapId" class="recruitment_interviews_mapId">
<span<?php echo $recruitment_interviews->mapId->viewAttributes() ?>>
<?php echo $recruitment_interviews->mapId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recruitment_interviews->status->Visible) { // status ?>
		<td data-name="status"<?php echo $recruitment_interviews->status->cellAttributes() ?>>
<span id="el<?php echo $recruitment_interviews_list->RowCnt ?>_recruitment_interviews_status" class="recruitment_interviews_status">
<span<?php echo $recruitment_interviews->status->viewAttributes() ?>>
<?php echo $recruitment_interviews->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$recruitment_interviews_list->ListOptions->render("body", "right", $recruitment_interviews_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$recruitment_interviews->isGridAdd())
		$recruitment_interviews_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$recruitment_interviews->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($recruitment_interviews_list->Recordset)
	$recruitment_interviews_list->Recordset->Close();
?>
<?php if (!$recruitment_interviews->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$recruitment_interviews->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($recruitment_interviews_list->Pager)) $recruitment_interviews_list->Pager = new NumericPager($recruitment_interviews_list->StartRec, $recruitment_interviews_list->DisplayRecs, $recruitment_interviews_list->TotalRecs, $recruitment_interviews_list->RecRange, $recruitment_interviews_list->AutoHidePager) ?>
<?php if ($recruitment_interviews_list->Pager->RecordCount > 0 && $recruitment_interviews_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($recruitment_interviews_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $recruitment_interviews_list->pageUrl() ?>start=<?php echo $recruitment_interviews_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($recruitment_interviews_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $recruitment_interviews_list->pageUrl() ?>start=<?php echo $recruitment_interviews_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($recruitment_interviews_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $recruitment_interviews_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($recruitment_interviews_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $recruitment_interviews_list->pageUrl() ?>start=<?php echo $recruitment_interviews_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($recruitment_interviews_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $recruitment_interviews_list->pageUrl() ?>start=<?php echo $recruitment_interviews_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($recruitment_interviews_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $recruitment_interviews_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $recruitment_interviews_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $recruitment_interviews_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($recruitment_interviews_list->TotalRecs > 0 && (!$recruitment_interviews_list->AutoHidePageSizeSelector || $recruitment_interviews_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="recruitment_interviews">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($recruitment_interviews_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($recruitment_interviews_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($recruitment_interviews_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($recruitment_interviews_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($recruitment_interviews_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($recruitment_interviews_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($recruitment_interviews->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $recruitment_interviews_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($recruitment_interviews_list->TotalRecs == 0 && !$recruitment_interviews->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $recruitment_interviews_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$recruitment_interviews_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$recruitment_interviews->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$recruitment_interviews->isExport()) { ?>
<script>
ew.scrollableTable("gmp_recruitment_interviews", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$recruitment_interviews_list->terminate();
?>
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
$recruitment_applications_list = new recruitment_applications_list();

// Run the page
$recruitment_applications_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$recruitment_applications_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$recruitment_applications->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var frecruitment_applicationslist = currentForm = new ew.Form("frecruitment_applicationslist", "list");
frecruitment_applicationslist.formKeyCountName = '<?php echo $recruitment_applications_list->FormKeyCountName ?>';

// Form_CustomValidate event
frecruitment_applicationslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
frecruitment_applicationslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var frecruitment_applicationslistsrch = currentSearchForm = new ew.Form("frecruitment_applicationslistsrch");

// Filters
frecruitment_applicationslistsrch.filterList = <?php echo $recruitment_applications_list->getFilterList() ?>;
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
<?php if (!$recruitment_applications->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($recruitment_applications_list->TotalRecs > 0 && $recruitment_applications_list->ExportOptions->visible()) { ?>
<?php $recruitment_applications_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($recruitment_applications_list->ImportOptions->visible()) { ?>
<?php $recruitment_applications_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($recruitment_applications_list->SearchOptions->visible()) { ?>
<?php $recruitment_applications_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($recruitment_applications_list->FilterOptions->visible()) { ?>
<?php $recruitment_applications_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$recruitment_applications_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$recruitment_applications->isExport() && !$recruitment_applications->CurrentAction) { ?>
<form name="frecruitment_applicationslistsrch" id="frecruitment_applicationslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($recruitment_applications_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="frecruitment_applicationslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="recruitment_applications">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($recruitment_applications_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($recruitment_applications_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $recruitment_applications_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($recruitment_applications_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($recruitment_applications_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($recruitment_applications_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($recruitment_applications_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $recruitment_applications_list->showPageHeader(); ?>
<?php
$recruitment_applications_list->showMessage();
?>
<?php if ($recruitment_applications_list->TotalRecs > 0 || $recruitment_applications->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($recruitment_applications_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> recruitment_applications">
<?php if (!$recruitment_applications->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$recruitment_applications->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($recruitment_applications_list->Pager)) $recruitment_applications_list->Pager = new NumericPager($recruitment_applications_list->StartRec, $recruitment_applications_list->DisplayRecs, $recruitment_applications_list->TotalRecs, $recruitment_applications_list->RecRange, $recruitment_applications_list->AutoHidePager) ?>
<?php if ($recruitment_applications_list->Pager->RecordCount > 0 && $recruitment_applications_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($recruitment_applications_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $recruitment_applications_list->pageUrl() ?>start=<?php echo $recruitment_applications_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($recruitment_applications_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $recruitment_applications_list->pageUrl() ?>start=<?php echo $recruitment_applications_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($recruitment_applications_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $recruitment_applications_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($recruitment_applications_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $recruitment_applications_list->pageUrl() ?>start=<?php echo $recruitment_applications_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($recruitment_applications_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $recruitment_applications_list->pageUrl() ?>start=<?php echo $recruitment_applications_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($recruitment_applications_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $recruitment_applications_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $recruitment_applications_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $recruitment_applications_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($recruitment_applications_list->TotalRecs > 0 && (!$recruitment_applications_list->AutoHidePageSizeSelector || $recruitment_applications_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="recruitment_applications">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($recruitment_applications_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($recruitment_applications_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($recruitment_applications_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($recruitment_applications_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($recruitment_applications_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($recruitment_applications_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($recruitment_applications->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $recruitment_applications_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="frecruitment_applicationslist" id="frecruitment_applicationslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($recruitment_applications_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $recruitment_applications_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="recruitment_applications">
<div id="gmp_recruitment_applications" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($recruitment_applications_list->TotalRecs > 0 || $recruitment_applications->isGridEdit()) { ?>
<table id="tbl_recruitment_applicationslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$recruitment_applications_list->RowType = ROWTYPE_HEADER;

// Render list options
$recruitment_applications_list->renderListOptions();

// Render list options (header, left)
$recruitment_applications_list->ListOptions->render("header", "left");
?>
<?php if ($recruitment_applications->id->Visible) { // id ?>
	<?php if ($recruitment_applications->sortUrl($recruitment_applications->id) == "") { ?>
		<th data-name="id" class="<?php echo $recruitment_applications->id->headerCellClass() ?>"><div id="elh_recruitment_applications_id" class="recruitment_applications_id"><div class="ew-table-header-caption"><?php echo $recruitment_applications->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $recruitment_applications->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_applications->SortUrl($recruitment_applications->id) ?>',1);"><div id="elh_recruitment_applications_id" class="recruitment_applications_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_applications->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($recruitment_applications->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_applications->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recruitment_applications->job->Visible) { // job ?>
	<?php if ($recruitment_applications->sortUrl($recruitment_applications->job) == "") { ?>
		<th data-name="job" class="<?php echo $recruitment_applications->job->headerCellClass() ?>"><div id="elh_recruitment_applications_job" class="recruitment_applications_job"><div class="ew-table-header-caption"><?php echo $recruitment_applications->job->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="job" class="<?php echo $recruitment_applications->job->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_applications->SortUrl($recruitment_applications->job) ?>',1);"><div id="elh_recruitment_applications_job" class="recruitment_applications_job">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_applications->job->caption() ?></span><span class="ew-table-header-sort"><?php if ($recruitment_applications->job->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_applications->job->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recruitment_applications->candidate->Visible) { // candidate ?>
	<?php if ($recruitment_applications->sortUrl($recruitment_applications->candidate) == "") { ?>
		<th data-name="candidate" class="<?php echo $recruitment_applications->candidate->headerCellClass() ?>"><div id="elh_recruitment_applications_candidate" class="recruitment_applications_candidate"><div class="ew-table-header-caption"><?php echo $recruitment_applications->candidate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="candidate" class="<?php echo $recruitment_applications->candidate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_applications->SortUrl($recruitment_applications->candidate) ?>',1);"><div id="elh_recruitment_applications_candidate" class="recruitment_applications_candidate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_applications->candidate->caption() ?></span><span class="ew-table-header-sort"><?php if ($recruitment_applications->candidate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_applications->candidate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recruitment_applications->created->Visible) { // created ?>
	<?php if ($recruitment_applications->sortUrl($recruitment_applications->created) == "") { ?>
		<th data-name="created" class="<?php echo $recruitment_applications->created->headerCellClass() ?>"><div id="elh_recruitment_applications_created" class="recruitment_applications_created"><div class="ew-table-header-caption"><?php echo $recruitment_applications->created->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="created" class="<?php echo $recruitment_applications->created->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_applications->SortUrl($recruitment_applications->created) ?>',1);"><div id="elh_recruitment_applications_created" class="recruitment_applications_created">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_applications->created->caption() ?></span><span class="ew-table-header-sort"><?php if ($recruitment_applications->created->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_applications->created->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recruitment_applications->referredByEmail->Visible) { // referredByEmail ?>
	<?php if ($recruitment_applications->sortUrl($recruitment_applications->referredByEmail) == "") { ?>
		<th data-name="referredByEmail" class="<?php echo $recruitment_applications->referredByEmail->headerCellClass() ?>"><div id="elh_recruitment_applications_referredByEmail" class="recruitment_applications_referredByEmail"><div class="ew-table-header-caption"><?php echo $recruitment_applications->referredByEmail->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="referredByEmail" class="<?php echo $recruitment_applications->referredByEmail->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_applications->SortUrl($recruitment_applications->referredByEmail) ?>',1);"><div id="elh_recruitment_applications_referredByEmail" class="recruitment_applications_referredByEmail">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_applications->referredByEmail->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($recruitment_applications->referredByEmail->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_applications->referredByEmail->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$recruitment_applications_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($recruitment_applications->ExportAll && $recruitment_applications->isExport()) {
	$recruitment_applications_list->StopRec = $recruitment_applications_list->TotalRecs;
} else {

	// Set the last record to display
	if ($recruitment_applications_list->TotalRecs > $recruitment_applications_list->StartRec + $recruitment_applications_list->DisplayRecs - 1)
		$recruitment_applications_list->StopRec = $recruitment_applications_list->StartRec + $recruitment_applications_list->DisplayRecs - 1;
	else
		$recruitment_applications_list->StopRec = $recruitment_applications_list->TotalRecs;
}
$recruitment_applications_list->RecCnt = $recruitment_applications_list->StartRec - 1;
if ($recruitment_applications_list->Recordset && !$recruitment_applications_list->Recordset->EOF) {
	$recruitment_applications_list->Recordset->moveFirst();
	$selectLimit = $recruitment_applications_list->UseSelectLimit;
	if (!$selectLimit && $recruitment_applications_list->StartRec > 1)
		$recruitment_applications_list->Recordset->move($recruitment_applications_list->StartRec - 1);
} elseif (!$recruitment_applications->AllowAddDeleteRow && $recruitment_applications_list->StopRec == 0) {
	$recruitment_applications_list->StopRec = $recruitment_applications->GridAddRowCount;
}

// Initialize aggregate
$recruitment_applications->RowType = ROWTYPE_AGGREGATEINIT;
$recruitment_applications->resetAttributes();
$recruitment_applications_list->renderRow();
while ($recruitment_applications_list->RecCnt < $recruitment_applications_list->StopRec) {
	$recruitment_applications_list->RecCnt++;
	if ($recruitment_applications_list->RecCnt >= $recruitment_applications_list->StartRec) {
		$recruitment_applications_list->RowCnt++;

		// Set up key count
		$recruitment_applications_list->KeyCount = $recruitment_applications_list->RowIndex;

		// Init row class and style
		$recruitment_applications->resetAttributes();
		$recruitment_applications->CssClass = "";
		if ($recruitment_applications->isGridAdd()) {
		} else {
			$recruitment_applications_list->loadRowValues($recruitment_applications_list->Recordset); // Load row values
		}
		$recruitment_applications->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$recruitment_applications->RowAttrs = array_merge($recruitment_applications->RowAttrs, array('data-rowindex'=>$recruitment_applications_list->RowCnt, 'id'=>'r' . $recruitment_applications_list->RowCnt . '_recruitment_applications', 'data-rowtype'=>$recruitment_applications->RowType));

		// Render row
		$recruitment_applications_list->renderRow();

		// Render list options
		$recruitment_applications_list->renderListOptions();
?>
	<tr<?php echo $recruitment_applications->rowAttributes() ?>>
<?php

// Render list options (body, left)
$recruitment_applications_list->ListOptions->render("body", "left", $recruitment_applications_list->RowCnt);
?>
	<?php if ($recruitment_applications->id->Visible) { // id ?>
		<td data-name="id"<?php echo $recruitment_applications->id->cellAttributes() ?>>
<span id="el<?php echo $recruitment_applications_list->RowCnt ?>_recruitment_applications_id" class="recruitment_applications_id">
<span<?php echo $recruitment_applications->id->viewAttributes() ?>>
<?php echo $recruitment_applications->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recruitment_applications->job->Visible) { // job ?>
		<td data-name="job"<?php echo $recruitment_applications->job->cellAttributes() ?>>
<span id="el<?php echo $recruitment_applications_list->RowCnt ?>_recruitment_applications_job" class="recruitment_applications_job">
<span<?php echo $recruitment_applications->job->viewAttributes() ?>>
<?php echo $recruitment_applications->job->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recruitment_applications->candidate->Visible) { // candidate ?>
		<td data-name="candidate"<?php echo $recruitment_applications->candidate->cellAttributes() ?>>
<span id="el<?php echo $recruitment_applications_list->RowCnt ?>_recruitment_applications_candidate" class="recruitment_applications_candidate">
<span<?php echo $recruitment_applications->candidate->viewAttributes() ?>>
<?php echo $recruitment_applications->candidate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recruitment_applications->created->Visible) { // created ?>
		<td data-name="created"<?php echo $recruitment_applications->created->cellAttributes() ?>>
<span id="el<?php echo $recruitment_applications_list->RowCnt ?>_recruitment_applications_created" class="recruitment_applications_created">
<span<?php echo $recruitment_applications->created->viewAttributes() ?>>
<?php echo $recruitment_applications->created->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recruitment_applications->referredByEmail->Visible) { // referredByEmail ?>
		<td data-name="referredByEmail"<?php echo $recruitment_applications->referredByEmail->cellAttributes() ?>>
<span id="el<?php echo $recruitment_applications_list->RowCnt ?>_recruitment_applications_referredByEmail" class="recruitment_applications_referredByEmail">
<span<?php echo $recruitment_applications->referredByEmail->viewAttributes() ?>>
<?php echo $recruitment_applications->referredByEmail->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$recruitment_applications_list->ListOptions->render("body", "right", $recruitment_applications_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$recruitment_applications->isGridAdd())
		$recruitment_applications_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$recruitment_applications->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($recruitment_applications_list->Recordset)
	$recruitment_applications_list->Recordset->Close();
?>
<?php if (!$recruitment_applications->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$recruitment_applications->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($recruitment_applications_list->Pager)) $recruitment_applications_list->Pager = new NumericPager($recruitment_applications_list->StartRec, $recruitment_applications_list->DisplayRecs, $recruitment_applications_list->TotalRecs, $recruitment_applications_list->RecRange, $recruitment_applications_list->AutoHidePager) ?>
<?php if ($recruitment_applications_list->Pager->RecordCount > 0 && $recruitment_applications_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($recruitment_applications_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $recruitment_applications_list->pageUrl() ?>start=<?php echo $recruitment_applications_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($recruitment_applications_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $recruitment_applications_list->pageUrl() ?>start=<?php echo $recruitment_applications_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($recruitment_applications_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $recruitment_applications_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($recruitment_applications_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $recruitment_applications_list->pageUrl() ?>start=<?php echo $recruitment_applications_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($recruitment_applications_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $recruitment_applications_list->pageUrl() ?>start=<?php echo $recruitment_applications_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($recruitment_applications_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $recruitment_applications_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $recruitment_applications_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $recruitment_applications_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($recruitment_applications_list->TotalRecs > 0 && (!$recruitment_applications_list->AutoHidePageSizeSelector || $recruitment_applications_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="recruitment_applications">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($recruitment_applications_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($recruitment_applications_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($recruitment_applications_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($recruitment_applications_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($recruitment_applications_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($recruitment_applications_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($recruitment_applications->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $recruitment_applications_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($recruitment_applications_list->TotalRecs == 0 && !$recruitment_applications->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $recruitment_applications_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$recruitment_applications_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$recruitment_applications->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$recruitment_applications->isExport()) { ?>
<script>
ew.scrollableTable("gmp_recruitment_applications", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$recruitment_applications_list->terminate();
?>
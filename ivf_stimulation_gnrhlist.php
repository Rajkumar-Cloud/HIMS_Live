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
$ivf_stimulation_gnrh_list = new ivf_stimulation_gnrh_list();

// Run the page
$ivf_stimulation_gnrh_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_stimulation_gnrh_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$ivf_stimulation_gnrh->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fivf_stimulation_gnrhlist = currentForm = new ew.Form("fivf_stimulation_gnrhlist", "list");
fivf_stimulation_gnrhlist.formKeyCountName = '<?php echo $ivf_stimulation_gnrh_list->FormKeyCountName ?>';

// Form_CustomValidate event
fivf_stimulation_gnrhlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_stimulation_gnrhlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fivf_stimulation_gnrhlistsrch = currentSearchForm = new ew.Form("fivf_stimulation_gnrhlistsrch");

// Filters
fivf_stimulation_gnrhlistsrch.filterList = <?php echo $ivf_stimulation_gnrh_list->getFilterList() ?>;
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
<?php if (!$ivf_stimulation_gnrh->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($ivf_stimulation_gnrh_list->TotalRecs > 0 && $ivf_stimulation_gnrh_list->ExportOptions->visible()) { ?>
<?php $ivf_stimulation_gnrh_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_stimulation_gnrh_list->ImportOptions->visible()) { ?>
<?php $ivf_stimulation_gnrh_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_stimulation_gnrh_list->SearchOptions->visible()) { ?>
<?php $ivf_stimulation_gnrh_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_stimulation_gnrh_list->FilterOptions->visible()) { ?>
<?php $ivf_stimulation_gnrh_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$ivf_stimulation_gnrh_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$ivf_stimulation_gnrh->isExport() && !$ivf_stimulation_gnrh->CurrentAction) { ?>
<form name="fivf_stimulation_gnrhlistsrch" id="fivf_stimulation_gnrhlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($ivf_stimulation_gnrh_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fivf_stimulation_gnrhlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="ivf_stimulation_gnrh">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($ivf_stimulation_gnrh_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($ivf_stimulation_gnrh_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $ivf_stimulation_gnrh_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($ivf_stimulation_gnrh_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($ivf_stimulation_gnrh_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($ivf_stimulation_gnrh_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($ivf_stimulation_gnrh_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $ivf_stimulation_gnrh_list->showPageHeader(); ?>
<?php
$ivf_stimulation_gnrh_list->showMessage();
?>
<?php if ($ivf_stimulation_gnrh_list->TotalRecs > 0 || $ivf_stimulation_gnrh->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($ivf_stimulation_gnrh_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf_stimulation_gnrh">
<?php if (!$ivf_stimulation_gnrh->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$ivf_stimulation_gnrh->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($ivf_stimulation_gnrh_list->Pager)) $ivf_stimulation_gnrh_list->Pager = new NumericPager($ivf_stimulation_gnrh_list->StartRec, $ivf_stimulation_gnrh_list->DisplayRecs, $ivf_stimulation_gnrh_list->TotalRecs, $ivf_stimulation_gnrh_list->RecRange, $ivf_stimulation_gnrh_list->AutoHidePager) ?>
<?php if ($ivf_stimulation_gnrh_list->Pager->RecordCount > 0 && $ivf_stimulation_gnrh_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($ivf_stimulation_gnrh_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_stimulation_gnrh_list->pageUrl() ?>start=<?php echo $ivf_stimulation_gnrh_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($ivf_stimulation_gnrh_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_stimulation_gnrh_list->pageUrl() ?>start=<?php echo $ivf_stimulation_gnrh_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($ivf_stimulation_gnrh_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $ivf_stimulation_gnrh_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($ivf_stimulation_gnrh_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_stimulation_gnrh_list->pageUrl() ?>start=<?php echo $ivf_stimulation_gnrh_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($ivf_stimulation_gnrh_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_stimulation_gnrh_list->pageUrl() ?>start=<?php echo $ivf_stimulation_gnrh_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($ivf_stimulation_gnrh_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $ivf_stimulation_gnrh_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $ivf_stimulation_gnrh_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $ivf_stimulation_gnrh_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($ivf_stimulation_gnrh_list->TotalRecs > 0 && (!$ivf_stimulation_gnrh_list->AutoHidePageSizeSelector || $ivf_stimulation_gnrh_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="ivf_stimulation_gnrh">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($ivf_stimulation_gnrh_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($ivf_stimulation_gnrh_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($ivf_stimulation_gnrh_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($ivf_stimulation_gnrh_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($ivf_stimulation_gnrh_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($ivf_stimulation_gnrh_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($ivf_stimulation_gnrh->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ivf_stimulation_gnrh_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fivf_stimulation_gnrhlist" id="fivf_stimulation_gnrhlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ivf_stimulation_gnrh_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_stimulation_gnrh_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_stimulation_gnrh">
<div id="gmp_ivf_stimulation_gnrh" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($ivf_stimulation_gnrh_list->TotalRecs > 0 || $ivf_stimulation_gnrh->isGridEdit()) { ?>
<table id="tbl_ivf_stimulation_gnrhlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$ivf_stimulation_gnrh_list->RowType = ROWTYPE_HEADER;

// Render list options
$ivf_stimulation_gnrh_list->renderListOptions();

// Render list options (header, left)
$ivf_stimulation_gnrh_list->ListOptions->render("header", "left");
?>
<?php if ($ivf_stimulation_gnrh->id->Visible) { // id ?>
	<?php if ($ivf_stimulation_gnrh->sortUrl($ivf_stimulation_gnrh->id) == "") { ?>
		<th data-name="id" class="<?php echo $ivf_stimulation_gnrh->id->headerCellClass() ?>"><div id="elh_ivf_stimulation_gnrh_id" class="ivf_stimulation_gnrh_id"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_gnrh->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $ivf_stimulation_gnrh->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_gnrh->SortUrl($ivf_stimulation_gnrh->id) ?>',1);"><div id="elh_ivf_stimulation_gnrh_id" class="ivf_stimulation_gnrh_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_gnrh->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_gnrh->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_gnrh->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_stimulation_gnrh->Name->Visible) { // Name ?>
	<?php if ($ivf_stimulation_gnrh->sortUrl($ivf_stimulation_gnrh->Name) == "") { ?>
		<th data-name="Name" class="<?php echo $ivf_stimulation_gnrh->Name->headerCellClass() ?>"><div id="elh_ivf_stimulation_gnrh_Name" class="ivf_stimulation_gnrh_Name"><div class="ew-table-header-caption"><?php echo $ivf_stimulation_gnrh->Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Name" class="<?php echo $ivf_stimulation_gnrh->Name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_stimulation_gnrh->SortUrl($ivf_stimulation_gnrh->Name) ?>',1);"><div id="elh_ivf_stimulation_gnrh_Name" class="ivf_stimulation_gnrh_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_stimulation_gnrh->Name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_stimulation_gnrh->Name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_stimulation_gnrh->Name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$ivf_stimulation_gnrh_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($ivf_stimulation_gnrh->ExportAll && $ivf_stimulation_gnrh->isExport()) {
	$ivf_stimulation_gnrh_list->StopRec = $ivf_stimulation_gnrh_list->TotalRecs;
} else {

	// Set the last record to display
	if ($ivf_stimulation_gnrh_list->TotalRecs > $ivf_stimulation_gnrh_list->StartRec + $ivf_stimulation_gnrh_list->DisplayRecs - 1)
		$ivf_stimulation_gnrh_list->StopRec = $ivf_stimulation_gnrh_list->StartRec + $ivf_stimulation_gnrh_list->DisplayRecs - 1;
	else
		$ivf_stimulation_gnrh_list->StopRec = $ivf_stimulation_gnrh_list->TotalRecs;
}
$ivf_stimulation_gnrh_list->RecCnt = $ivf_stimulation_gnrh_list->StartRec - 1;
if ($ivf_stimulation_gnrh_list->Recordset && !$ivf_stimulation_gnrh_list->Recordset->EOF) {
	$ivf_stimulation_gnrh_list->Recordset->moveFirst();
	$selectLimit = $ivf_stimulation_gnrh_list->UseSelectLimit;
	if (!$selectLimit && $ivf_stimulation_gnrh_list->StartRec > 1)
		$ivf_stimulation_gnrh_list->Recordset->move($ivf_stimulation_gnrh_list->StartRec - 1);
} elseif (!$ivf_stimulation_gnrh->AllowAddDeleteRow && $ivf_stimulation_gnrh_list->StopRec == 0) {
	$ivf_stimulation_gnrh_list->StopRec = $ivf_stimulation_gnrh->GridAddRowCount;
}

// Initialize aggregate
$ivf_stimulation_gnrh->RowType = ROWTYPE_AGGREGATEINIT;
$ivf_stimulation_gnrh->resetAttributes();
$ivf_stimulation_gnrh_list->renderRow();
while ($ivf_stimulation_gnrh_list->RecCnt < $ivf_stimulation_gnrh_list->StopRec) {
	$ivf_stimulation_gnrh_list->RecCnt++;
	if ($ivf_stimulation_gnrh_list->RecCnt >= $ivf_stimulation_gnrh_list->StartRec) {
		$ivf_stimulation_gnrh_list->RowCnt++;

		// Set up key count
		$ivf_stimulation_gnrh_list->KeyCount = $ivf_stimulation_gnrh_list->RowIndex;

		// Init row class and style
		$ivf_stimulation_gnrh->resetAttributes();
		$ivf_stimulation_gnrh->CssClass = "";
		if ($ivf_stimulation_gnrh->isGridAdd()) {
		} else {
			$ivf_stimulation_gnrh_list->loadRowValues($ivf_stimulation_gnrh_list->Recordset); // Load row values
		}
		$ivf_stimulation_gnrh->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$ivf_stimulation_gnrh->RowAttrs = array_merge($ivf_stimulation_gnrh->RowAttrs, array('data-rowindex'=>$ivf_stimulation_gnrh_list->RowCnt, 'id'=>'r' . $ivf_stimulation_gnrh_list->RowCnt . '_ivf_stimulation_gnrh', 'data-rowtype'=>$ivf_stimulation_gnrh->RowType));

		// Render row
		$ivf_stimulation_gnrh_list->renderRow();

		// Render list options
		$ivf_stimulation_gnrh_list->renderListOptions();
?>
	<tr<?php echo $ivf_stimulation_gnrh->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_stimulation_gnrh_list->ListOptions->render("body", "left", $ivf_stimulation_gnrh_list->RowCnt);
?>
	<?php if ($ivf_stimulation_gnrh->id->Visible) { // id ?>
		<td data-name="id"<?php echo $ivf_stimulation_gnrh->id->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_gnrh_list->RowCnt ?>_ivf_stimulation_gnrh_id" class="ivf_stimulation_gnrh_id">
<span<?php echo $ivf_stimulation_gnrh->id->viewAttributes() ?>>
<?php echo $ivf_stimulation_gnrh->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_stimulation_gnrh->Name->Visible) { // Name ?>
		<td data-name="Name"<?php echo $ivf_stimulation_gnrh->Name->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_gnrh_list->RowCnt ?>_ivf_stimulation_gnrh_Name" class="ivf_stimulation_gnrh_Name">
<span<?php echo $ivf_stimulation_gnrh->Name->viewAttributes() ?>>
<?php echo $ivf_stimulation_gnrh->Name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_stimulation_gnrh_list->ListOptions->render("body", "right", $ivf_stimulation_gnrh_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$ivf_stimulation_gnrh->isGridAdd())
		$ivf_stimulation_gnrh_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$ivf_stimulation_gnrh->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($ivf_stimulation_gnrh_list->Recordset)
	$ivf_stimulation_gnrh_list->Recordset->Close();
?>
<?php if (!$ivf_stimulation_gnrh->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$ivf_stimulation_gnrh->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($ivf_stimulation_gnrh_list->Pager)) $ivf_stimulation_gnrh_list->Pager = new NumericPager($ivf_stimulation_gnrh_list->StartRec, $ivf_stimulation_gnrh_list->DisplayRecs, $ivf_stimulation_gnrh_list->TotalRecs, $ivf_stimulation_gnrh_list->RecRange, $ivf_stimulation_gnrh_list->AutoHidePager) ?>
<?php if ($ivf_stimulation_gnrh_list->Pager->RecordCount > 0 && $ivf_stimulation_gnrh_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($ivf_stimulation_gnrh_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_stimulation_gnrh_list->pageUrl() ?>start=<?php echo $ivf_stimulation_gnrh_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($ivf_stimulation_gnrh_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_stimulation_gnrh_list->pageUrl() ?>start=<?php echo $ivf_stimulation_gnrh_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($ivf_stimulation_gnrh_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $ivf_stimulation_gnrh_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($ivf_stimulation_gnrh_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_stimulation_gnrh_list->pageUrl() ?>start=<?php echo $ivf_stimulation_gnrh_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($ivf_stimulation_gnrh_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_stimulation_gnrh_list->pageUrl() ?>start=<?php echo $ivf_stimulation_gnrh_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($ivf_stimulation_gnrh_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $ivf_stimulation_gnrh_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $ivf_stimulation_gnrh_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $ivf_stimulation_gnrh_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($ivf_stimulation_gnrh_list->TotalRecs > 0 && (!$ivf_stimulation_gnrh_list->AutoHidePageSizeSelector || $ivf_stimulation_gnrh_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="ivf_stimulation_gnrh">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($ivf_stimulation_gnrh_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($ivf_stimulation_gnrh_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($ivf_stimulation_gnrh_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($ivf_stimulation_gnrh_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($ivf_stimulation_gnrh_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($ivf_stimulation_gnrh_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($ivf_stimulation_gnrh->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ivf_stimulation_gnrh_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($ivf_stimulation_gnrh_list->TotalRecs == 0 && !$ivf_stimulation_gnrh->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $ivf_stimulation_gnrh_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$ivf_stimulation_gnrh_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$ivf_stimulation_gnrh->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$ivf_stimulation_gnrh->isExport()) { ?>
<script>
ew.scrollableTable("gmp_ivf_stimulation_gnrh", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$ivf_stimulation_gnrh_list->terminate();
?>
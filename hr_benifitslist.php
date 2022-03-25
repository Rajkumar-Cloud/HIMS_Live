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
$hr_benifits_list = new hr_benifits_list();

// Run the page
$hr_benifits_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_benifits_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$hr_benifits->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fhr_benifitslist = currentForm = new ew.Form("fhr_benifitslist", "list");
fhr_benifitslist.formKeyCountName = '<?php echo $hr_benifits_list->FormKeyCountName ?>';

// Form_CustomValidate event
fhr_benifitslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_benifitslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fhr_benifitslistsrch = currentSearchForm = new ew.Form("fhr_benifitslistsrch");

// Filters
fhr_benifitslistsrch.filterList = <?php echo $hr_benifits_list->getFilterList() ?>;
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
<?php if (!$hr_benifits->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($hr_benifits_list->TotalRecs > 0 && $hr_benifits_list->ExportOptions->visible()) { ?>
<?php $hr_benifits_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($hr_benifits_list->ImportOptions->visible()) { ?>
<?php $hr_benifits_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($hr_benifits_list->SearchOptions->visible()) { ?>
<?php $hr_benifits_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($hr_benifits_list->FilterOptions->visible()) { ?>
<?php $hr_benifits_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$hr_benifits_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$hr_benifits->isExport() && !$hr_benifits->CurrentAction) { ?>
<form name="fhr_benifitslistsrch" id="fhr_benifitslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($hr_benifits_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fhr_benifitslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="hr_benifits">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($hr_benifits_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($hr_benifits_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $hr_benifits_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($hr_benifits_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($hr_benifits_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($hr_benifits_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($hr_benifits_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $hr_benifits_list->showPageHeader(); ?>
<?php
$hr_benifits_list->showMessage();
?>
<?php if ($hr_benifits_list->TotalRecs > 0 || $hr_benifits->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($hr_benifits_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> hr_benifits">
<?php if (!$hr_benifits->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$hr_benifits->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($hr_benifits_list->Pager)) $hr_benifits_list->Pager = new NumericPager($hr_benifits_list->StartRec, $hr_benifits_list->DisplayRecs, $hr_benifits_list->TotalRecs, $hr_benifits_list->RecRange, $hr_benifits_list->AutoHidePager) ?>
<?php if ($hr_benifits_list->Pager->RecordCount > 0 && $hr_benifits_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($hr_benifits_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_benifits_list->pageUrl() ?>start=<?php echo $hr_benifits_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($hr_benifits_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_benifits_list->pageUrl() ?>start=<?php echo $hr_benifits_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($hr_benifits_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $hr_benifits_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($hr_benifits_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_benifits_list->pageUrl() ?>start=<?php echo $hr_benifits_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($hr_benifits_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_benifits_list->pageUrl() ?>start=<?php echo $hr_benifits_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($hr_benifits_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $hr_benifits_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $hr_benifits_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $hr_benifits_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($hr_benifits_list->TotalRecs > 0 && (!$hr_benifits_list->AutoHidePageSizeSelector || $hr_benifits_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="hr_benifits">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($hr_benifits_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($hr_benifits_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($hr_benifits_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($hr_benifits_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($hr_benifits_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($hr_benifits_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($hr_benifits->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $hr_benifits_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fhr_benifitslist" id="fhr_benifitslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_benifits_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_benifits_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_benifits">
<div id="gmp_hr_benifits" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($hr_benifits_list->TotalRecs > 0 || $hr_benifits->isGridEdit()) { ?>
<table id="tbl_hr_benifitslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$hr_benifits_list->RowType = ROWTYPE_HEADER;

// Render list options
$hr_benifits_list->renderListOptions();

// Render list options (header, left)
$hr_benifits_list->ListOptions->render("header", "left");
?>
<?php if ($hr_benifits->id->Visible) { // id ?>
	<?php if ($hr_benifits->sortUrl($hr_benifits->id) == "") { ?>
		<th data-name="id" class="<?php echo $hr_benifits->id->headerCellClass() ?>"><div id="elh_hr_benifits_id" class="hr_benifits_id"><div class="ew-table-header-caption"><?php echo $hr_benifits->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $hr_benifits->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_benifits->SortUrl($hr_benifits->id) ?>',1);"><div id="elh_hr_benifits_id" class="hr_benifits_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_benifits->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_benifits->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_benifits->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_benifits->name->Visible) { // name ?>
	<?php if ($hr_benifits->sortUrl($hr_benifits->name) == "") { ?>
		<th data-name="name" class="<?php echo $hr_benifits->name->headerCellClass() ?>"><div id="elh_hr_benifits_name" class="hr_benifits_name"><div class="ew-table-header-caption"><?php echo $hr_benifits->name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="name" class="<?php echo $hr_benifits->name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_benifits->SortUrl($hr_benifits->name) ?>',1);"><div id="elh_hr_benifits_name" class="hr_benifits_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_benifits->name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hr_benifits->name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_benifits->name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_benifits->HospID->Visible) { // HospID ?>
	<?php if ($hr_benifits->sortUrl($hr_benifits->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $hr_benifits->HospID->headerCellClass() ?>"><div id="elh_hr_benifits_HospID" class="hr_benifits_HospID"><div class="ew-table-header-caption"><?php echo $hr_benifits->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $hr_benifits->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_benifits->SortUrl($hr_benifits->HospID) ?>',1);"><div id="elh_hr_benifits_HospID" class="hr_benifits_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_benifits->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_benifits->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_benifits->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$hr_benifits_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($hr_benifits->ExportAll && $hr_benifits->isExport()) {
	$hr_benifits_list->StopRec = $hr_benifits_list->TotalRecs;
} else {

	// Set the last record to display
	if ($hr_benifits_list->TotalRecs > $hr_benifits_list->StartRec + $hr_benifits_list->DisplayRecs - 1)
		$hr_benifits_list->StopRec = $hr_benifits_list->StartRec + $hr_benifits_list->DisplayRecs - 1;
	else
		$hr_benifits_list->StopRec = $hr_benifits_list->TotalRecs;
}
$hr_benifits_list->RecCnt = $hr_benifits_list->StartRec - 1;
if ($hr_benifits_list->Recordset && !$hr_benifits_list->Recordset->EOF) {
	$hr_benifits_list->Recordset->moveFirst();
	$selectLimit = $hr_benifits_list->UseSelectLimit;
	if (!$selectLimit && $hr_benifits_list->StartRec > 1)
		$hr_benifits_list->Recordset->move($hr_benifits_list->StartRec - 1);
} elseif (!$hr_benifits->AllowAddDeleteRow && $hr_benifits_list->StopRec == 0) {
	$hr_benifits_list->StopRec = $hr_benifits->GridAddRowCount;
}

// Initialize aggregate
$hr_benifits->RowType = ROWTYPE_AGGREGATEINIT;
$hr_benifits->resetAttributes();
$hr_benifits_list->renderRow();
while ($hr_benifits_list->RecCnt < $hr_benifits_list->StopRec) {
	$hr_benifits_list->RecCnt++;
	if ($hr_benifits_list->RecCnt >= $hr_benifits_list->StartRec) {
		$hr_benifits_list->RowCnt++;

		// Set up key count
		$hr_benifits_list->KeyCount = $hr_benifits_list->RowIndex;

		// Init row class and style
		$hr_benifits->resetAttributes();
		$hr_benifits->CssClass = "";
		if ($hr_benifits->isGridAdd()) {
		} else {
			$hr_benifits_list->loadRowValues($hr_benifits_list->Recordset); // Load row values
		}
		$hr_benifits->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$hr_benifits->RowAttrs = array_merge($hr_benifits->RowAttrs, array('data-rowindex'=>$hr_benifits_list->RowCnt, 'id'=>'r' . $hr_benifits_list->RowCnt . '_hr_benifits', 'data-rowtype'=>$hr_benifits->RowType));

		// Render row
		$hr_benifits_list->renderRow();

		// Render list options
		$hr_benifits_list->renderListOptions();
?>
	<tr<?php echo $hr_benifits->rowAttributes() ?>>
<?php

// Render list options (body, left)
$hr_benifits_list->ListOptions->render("body", "left", $hr_benifits_list->RowCnt);
?>
	<?php if ($hr_benifits->id->Visible) { // id ?>
		<td data-name="id"<?php echo $hr_benifits->id->cellAttributes() ?>>
<span id="el<?php echo $hr_benifits_list->RowCnt ?>_hr_benifits_id" class="hr_benifits_id">
<span<?php echo $hr_benifits->id->viewAttributes() ?>>
<?php echo $hr_benifits->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_benifits->name->Visible) { // name ?>
		<td data-name="name"<?php echo $hr_benifits->name->cellAttributes() ?>>
<span id="el<?php echo $hr_benifits_list->RowCnt ?>_hr_benifits_name" class="hr_benifits_name">
<span<?php echo $hr_benifits->name->viewAttributes() ?>>
<?php echo $hr_benifits->name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_benifits->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $hr_benifits->HospID->cellAttributes() ?>>
<span id="el<?php echo $hr_benifits_list->RowCnt ?>_hr_benifits_HospID" class="hr_benifits_HospID">
<span<?php echo $hr_benifits->HospID->viewAttributes() ?>>
<?php echo $hr_benifits->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$hr_benifits_list->ListOptions->render("body", "right", $hr_benifits_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$hr_benifits->isGridAdd())
		$hr_benifits_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$hr_benifits->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($hr_benifits_list->Recordset)
	$hr_benifits_list->Recordset->Close();
?>
<?php if (!$hr_benifits->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$hr_benifits->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($hr_benifits_list->Pager)) $hr_benifits_list->Pager = new NumericPager($hr_benifits_list->StartRec, $hr_benifits_list->DisplayRecs, $hr_benifits_list->TotalRecs, $hr_benifits_list->RecRange, $hr_benifits_list->AutoHidePager) ?>
<?php if ($hr_benifits_list->Pager->RecordCount > 0 && $hr_benifits_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($hr_benifits_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_benifits_list->pageUrl() ?>start=<?php echo $hr_benifits_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($hr_benifits_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_benifits_list->pageUrl() ?>start=<?php echo $hr_benifits_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($hr_benifits_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $hr_benifits_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($hr_benifits_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_benifits_list->pageUrl() ?>start=<?php echo $hr_benifits_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($hr_benifits_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_benifits_list->pageUrl() ?>start=<?php echo $hr_benifits_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($hr_benifits_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $hr_benifits_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $hr_benifits_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $hr_benifits_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($hr_benifits_list->TotalRecs > 0 && (!$hr_benifits_list->AutoHidePageSizeSelector || $hr_benifits_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="hr_benifits">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($hr_benifits_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($hr_benifits_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($hr_benifits_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($hr_benifits_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($hr_benifits_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($hr_benifits_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($hr_benifits->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $hr_benifits_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($hr_benifits_list->TotalRecs == 0 && !$hr_benifits->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $hr_benifits_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$hr_benifits_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$hr_benifits->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$hr_benifits->isExport()) { ?>
<script>
ew.scrollableTable("gmp_hr_benifits", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$hr_benifits_list->terminate();
?>
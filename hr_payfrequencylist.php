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
$hr_payfrequency_list = new hr_payfrequency_list();

// Run the page
$hr_payfrequency_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_payfrequency_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$hr_payfrequency->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fhr_payfrequencylist = currentForm = new ew.Form("fhr_payfrequencylist", "list");
fhr_payfrequencylist.formKeyCountName = '<?php echo $hr_payfrequency_list->FormKeyCountName ?>';

// Form_CustomValidate event
fhr_payfrequencylist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_payfrequencylist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fhr_payfrequencylistsrch = currentSearchForm = new ew.Form("fhr_payfrequencylistsrch");

// Filters
fhr_payfrequencylistsrch.filterList = <?php echo $hr_payfrequency_list->getFilterList() ?>;
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
<?php if (!$hr_payfrequency->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($hr_payfrequency_list->TotalRecs > 0 && $hr_payfrequency_list->ExportOptions->visible()) { ?>
<?php $hr_payfrequency_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($hr_payfrequency_list->ImportOptions->visible()) { ?>
<?php $hr_payfrequency_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($hr_payfrequency_list->SearchOptions->visible()) { ?>
<?php $hr_payfrequency_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($hr_payfrequency_list->FilterOptions->visible()) { ?>
<?php $hr_payfrequency_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$hr_payfrequency_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$hr_payfrequency->isExport() && !$hr_payfrequency->CurrentAction) { ?>
<form name="fhr_payfrequencylistsrch" id="fhr_payfrequencylistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($hr_payfrequency_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fhr_payfrequencylistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="hr_payfrequency">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($hr_payfrequency_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($hr_payfrequency_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $hr_payfrequency_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($hr_payfrequency_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($hr_payfrequency_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($hr_payfrequency_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($hr_payfrequency_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $hr_payfrequency_list->showPageHeader(); ?>
<?php
$hr_payfrequency_list->showMessage();
?>
<?php if ($hr_payfrequency_list->TotalRecs > 0 || $hr_payfrequency->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($hr_payfrequency_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> hr_payfrequency">
<?php if (!$hr_payfrequency->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$hr_payfrequency->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($hr_payfrequency_list->Pager)) $hr_payfrequency_list->Pager = new NumericPager($hr_payfrequency_list->StartRec, $hr_payfrequency_list->DisplayRecs, $hr_payfrequency_list->TotalRecs, $hr_payfrequency_list->RecRange, $hr_payfrequency_list->AutoHidePager) ?>
<?php if ($hr_payfrequency_list->Pager->RecordCount > 0 && $hr_payfrequency_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($hr_payfrequency_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_payfrequency_list->pageUrl() ?>start=<?php echo $hr_payfrequency_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($hr_payfrequency_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_payfrequency_list->pageUrl() ?>start=<?php echo $hr_payfrequency_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($hr_payfrequency_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $hr_payfrequency_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($hr_payfrequency_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_payfrequency_list->pageUrl() ?>start=<?php echo $hr_payfrequency_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($hr_payfrequency_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_payfrequency_list->pageUrl() ?>start=<?php echo $hr_payfrequency_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($hr_payfrequency_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $hr_payfrequency_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $hr_payfrequency_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $hr_payfrequency_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($hr_payfrequency_list->TotalRecs > 0 && (!$hr_payfrequency_list->AutoHidePageSizeSelector || $hr_payfrequency_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="hr_payfrequency">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($hr_payfrequency_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($hr_payfrequency_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($hr_payfrequency_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($hr_payfrequency_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($hr_payfrequency_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($hr_payfrequency_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($hr_payfrequency->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $hr_payfrequency_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fhr_payfrequencylist" id="fhr_payfrequencylist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_payfrequency_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_payfrequency_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_payfrequency">
<div id="gmp_hr_payfrequency" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($hr_payfrequency_list->TotalRecs > 0 || $hr_payfrequency->isGridEdit()) { ?>
<table id="tbl_hr_payfrequencylist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$hr_payfrequency_list->RowType = ROWTYPE_HEADER;

// Render list options
$hr_payfrequency_list->renderListOptions();

// Render list options (header, left)
$hr_payfrequency_list->ListOptions->render("header", "left");
?>
<?php if ($hr_payfrequency->id->Visible) { // id ?>
	<?php if ($hr_payfrequency->sortUrl($hr_payfrequency->id) == "") { ?>
		<th data-name="id" class="<?php echo $hr_payfrequency->id->headerCellClass() ?>"><div id="elh_hr_payfrequency_id" class="hr_payfrequency_id"><div class="ew-table-header-caption"><?php echo $hr_payfrequency->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $hr_payfrequency->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_payfrequency->SortUrl($hr_payfrequency->id) ?>',1);"><div id="elh_hr_payfrequency_id" class="hr_payfrequency_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_payfrequency->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_payfrequency->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_payfrequency->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_payfrequency->name->Visible) { // name ?>
	<?php if ($hr_payfrequency->sortUrl($hr_payfrequency->name) == "") { ?>
		<th data-name="name" class="<?php echo $hr_payfrequency->name->headerCellClass() ?>"><div id="elh_hr_payfrequency_name" class="hr_payfrequency_name"><div class="ew-table-header-caption"><?php echo $hr_payfrequency->name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="name" class="<?php echo $hr_payfrequency->name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_payfrequency->SortUrl($hr_payfrequency->name) ?>',1);"><div id="elh_hr_payfrequency_name" class="hr_payfrequency_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_payfrequency->name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hr_payfrequency->name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_payfrequency->name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_payfrequency->HospID->Visible) { // HospID ?>
	<?php if ($hr_payfrequency->sortUrl($hr_payfrequency->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $hr_payfrequency->HospID->headerCellClass() ?>"><div id="elh_hr_payfrequency_HospID" class="hr_payfrequency_HospID"><div class="ew-table-header-caption"><?php echo $hr_payfrequency->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $hr_payfrequency->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_payfrequency->SortUrl($hr_payfrequency->HospID) ?>',1);"><div id="elh_hr_payfrequency_HospID" class="hr_payfrequency_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_payfrequency->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_payfrequency->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_payfrequency->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$hr_payfrequency_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($hr_payfrequency->ExportAll && $hr_payfrequency->isExport()) {
	$hr_payfrequency_list->StopRec = $hr_payfrequency_list->TotalRecs;
} else {

	// Set the last record to display
	if ($hr_payfrequency_list->TotalRecs > $hr_payfrequency_list->StartRec + $hr_payfrequency_list->DisplayRecs - 1)
		$hr_payfrequency_list->StopRec = $hr_payfrequency_list->StartRec + $hr_payfrequency_list->DisplayRecs - 1;
	else
		$hr_payfrequency_list->StopRec = $hr_payfrequency_list->TotalRecs;
}
$hr_payfrequency_list->RecCnt = $hr_payfrequency_list->StartRec - 1;
if ($hr_payfrequency_list->Recordset && !$hr_payfrequency_list->Recordset->EOF) {
	$hr_payfrequency_list->Recordset->moveFirst();
	$selectLimit = $hr_payfrequency_list->UseSelectLimit;
	if (!$selectLimit && $hr_payfrequency_list->StartRec > 1)
		$hr_payfrequency_list->Recordset->move($hr_payfrequency_list->StartRec - 1);
} elseif (!$hr_payfrequency->AllowAddDeleteRow && $hr_payfrequency_list->StopRec == 0) {
	$hr_payfrequency_list->StopRec = $hr_payfrequency->GridAddRowCount;
}

// Initialize aggregate
$hr_payfrequency->RowType = ROWTYPE_AGGREGATEINIT;
$hr_payfrequency->resetAttributes();
$hr_payfrequency_list->renderRow();
while ($hr_payfrequency_list->RecCnt < $hr_payfrequency_list->StopRec) {
	$hr_payfrequency_list->RecCnt++;
	if ($hr_payfrequency_list->RecCnt >= $hr_payfrequency_list->StartRec) {
		$hr_payfrequency_list->RowCnt++;

		// Set up key count
		$hr_payfrequency_list->KeyCount = $hr_payfrequency_list->RowIndex;

		// Init row class and style
		$hr_payfrequency->resetAttributes();
		$hr_payfrequency->CssClass = "";
		if ($hr_payfrequency->isGridAdd()) {
		} else {
			$hr_payfrequency_list->loadRowValues($hr_payfrequency_list->Recordset); // Load row values
		}
		$hr_payfrequency->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$hr_payfrequency->RowAttrs = array_merge($hr_payfrequency->RowAttrs, array('data-rowindex'=>$hr_payfrequency_list->RowCnt, 'id'=>'r' . $hr_payfrequency_list->RowCnt . '_hr_payfrequency', 'data-rowtype'=>$hr_payfrequency->RowType));

		// Render row
		$hr_payfrequency_list->renderRow();

		// Render list options
		$hr_payfrequency_list->renderListOptions();
?>
	<tr<?php echo $hr_payfrequency->rowAttributes() ?>>
<?php

// Render list options (body, left)
$hr_payfrequency_list->ListOptions->render("body", "left", $hr_payfrequency_list->RowCnt);
?>
	<?php if ($hr_payfrequency->id->Visible) { // id ?>
		<td data-name="id"<?php echo $hr_payfrequency->id->cellAttributes() ?>>
<span id="el<?php echo $hr_payfrequency_list->RowCnt ?>_hr_payfrequency_id" class="hr_payfrequency_id">
<span<?php echo $hr_payfrequency->id->viewAttributes() ?>>
<?php echo $hr_payfrequency->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_payfrequency->name->Visible) { // name ?>
		<td data-name="name"<?php echo $hr_payfrequency->name->cellAttributes() ?>>
<span id="el<?php echo $hr_payfrequency_list->RowCnt ?>_hr_payfrequency_name" class="hr_payfrequency_name">
<span<?php echo $hr_payfrequency->name->viewAttributes() ?>>
<?php echo $hr_payfrequency->name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_payfrequency->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $hr_payfrequency->HospID->cellAttributes() ?>>
<span id="el<?php echo $hr_payfrequency_list->RowCnt ?>_hr_payfrequency_HospID" class="hr_payfrequency_HospID">
<span<?php echo $hr_payfrequency->HospID->viewAttributes() ?>>
<?php echo $hr_payfrequency->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$hr_payfrequency_list->ListOptions->render("body", "right", $hr_payfrequency_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$hr_payfrequency->isGridAdd())
		$hr_payfrequency_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$hr_payfrequency->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($hr_payfrequency_list->Recordset)
	$hr_payfrequency_list->Recordset->Close();
?>
<?php if (!$hr_payfrequency->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$hr_payfrequency->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($hr_payfrequency_list->Pager)) $hr_payfrequency_list->Pager = new NumericPager($hr_payfrequency_list->StartRec, $hr_payfrequency_list->DisplayRecs, $hr_payfrequency_list->TotalRecs, $hr_payfrequency_list->RecRange, $hr_payfrequency_list->AutoHidePager) ?>
<?php if ($hr_payfrequency_list->Pager->RecordCount > 0 && $hr_payfrequency_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($hr_payfrequency_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_payfrequency_list->pageUrl() ?>start=<?php echo $hr_payfrequency_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($hr_payfrequency_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_payfrequency_list->pageUrl() ?>start=<?php echo $hr_payfrequency_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($hr_payfrequency_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $hr_payfrequency_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($hr_payfrequency_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_payfrequency_list->pageUrl() ?>start=<?php echo $hr_payfrequency_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($hr_payfrequency_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_payfrequency_list->pageUrl() ?>start=<?php echo $hr_payfrequency_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($hr_payfrequency_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $hr_payfrequency_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $hr_payfrequency_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $hr_payfrequency_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($hr_payfrequency_list->TotalRecs > 0 && (!$hr_payfrequency_list->AutoHidePageSizeSelector || $hr_payfrequency_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="hr_payfrequency">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($hr_payfrequency_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($hr_payfrequency_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($hr_payfrequency_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($hr_payfrequency_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($hr_payfrequency_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($hr_payfrequency_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($hr_payfrequency->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $hr_payfrequency_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($hr_payfrequency_list->TotalRecs == 0 && !$hr_payfrequency->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $hr_payfrequency_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$hr_payfrequency_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$hr_payfrequency->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$hr_payfrequency->isExport()) { ?>
<script>
ew.scrollableTable("gmp_hr_payfrequency", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$hr_payfrequency_list->terminate();
?>
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
$hr_paygrades_list = new hr_paygrades_list();

// Run the page
$hr_paygrades_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_paygrades_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$hr_paygrades->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fhr_paygradeslist = currentForm = new ew.Form("fhr_paygradeslist", "list");
fhr_paygradeslist.formKeyCountName = '<?php echo $hr_paygrades_list->FormKeyCountName ?>';

// Form_CustomValidate event
fhr_paygradeslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_paygradeslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fhr_paygradeslistsrch = currentSearchForm = new ew.Form("fhr_paygradeslistsrch");

// Filters
fhr_paygradeslistsrch.filterList = <?php echo $hr_paygrades_list->getFilterList() ?>;
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
<?php if (!$hr_paygrades->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($hr_paygrades_list->TotalRecs > 0 && $hr_paygrades_list->ExportOptions->visible()) { ?>
<?php $hr_paygrades_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($hr_paygrades_list->ImportOptions->visible()) { ?>
<?php $hr_paygrades_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($hr_paygrades_list->SearchOptions->visible()) { ?>
<?php $hr_paygrades_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($hr_paygrades_list->FilterOptions->visible()) { ?>
<?php $hr_paygrades_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$hr_paygrades_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$hr_paygrades->isExport() && !$hr_paygrades->CurrentAction) { ?>
<form name="fhr_paygradeslistsrch" id="fhr_paygradeslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($hr_paygrades_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fhr_paygradeslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="hr_paygrades">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($hr_paygrades_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($hr_paygrades_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $hr_paygrades_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($hr_paygrades_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($hr_paygrades_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($hr_paygrades_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($hr_paygrades_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $hr_paygrades_list->showPageHeader(); ?>
<?php
$hr_paygrades_list->showMessage();
?>
<?php if ($hr_paygrades_list->TotalRecs > 0 || $hr_paygrades->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($hr_paygrades_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> hr_paygrades">
<?php if (!$hr_paygrades->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$hr_paygrades->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($hr_paygrades_list->Pager)) $hr_paygrades_list->Pager = new NumericPager($hr_paygrades_list->StartRec, $hr_paygrades_list->DisplayRecs, $hr_paygrades_list->TotalRecs, $hr_paygrades_list->RecRange, $hr_paygrades_list->AutoHidePager) ?>
<?php if ($hr_paygrades_list->Pager->RecordCount > 0 && $hr_paygrades_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($hr_paygrades_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_paygrades_list->pageUrl() ?>start=<?php echo $hr_paygrades_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($hr_paygrades_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_paygrades_list->pageUrl() ?>start=<?php echo $hr_paygrades_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($hr_paygrades_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $hr_paygrades_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($hr_paygrades_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_paygrades_list->pageUrl() ?>start=<?php echo $hr_paygrades_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($hr_paygrades_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_paygrades_list->pageUrl() ?>start=<?php echo $hr_paygrades_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($hr_paygrades_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $hr_paygrades_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $hr_paygrades_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $hr_paygrades_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($hr_paygrades_list->TotalRecs > 0 && (!$hr_paygrades_list->AutoHidePageSizeSelector || $hr_paygrades_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="hr_paygrades">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($hr_paygrades_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($hr_paygrades_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($hr_paygrades_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($hr_paygrades_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($hr_paygrades_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($hr_paygrades_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($hr_paygrades->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $hr_paygrades_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fhr_paygradeslist" id="fhr_paygradeslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_paygrades_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_paygrades_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_paygrades">
<div id="gmp_hr_paygrades" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($hr_paygrades_list->TotalRecs > 0 || $hr_paygrades->isGridEdit()) { ?>
<table id="tbl_hr_paygradeslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$hr_paygrades_list->RowType = ROWTYPE_HEADER;

// Render list options
$hr_paygrades_list->renderListOptions();

// Render list options (header, left)
$hr_paygrades_list->ListOptions->render("header", "left");
?>
<?php if ($hr_paygrades->id->Visible) { // id ?>
	<?php if ($hr_paygrades->sortUrl($hr_paygrades->id) == "") { ?>
		<th data-name="id" class="<?php echo $hr_paygrades->id->headerCellClass() ?>"><div id="elh_hr_paygrades_id" class="hr_paygrades_id"><div class="ew-table-header-caption"><?php echo $hr_paygrades->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $hr_paygrades->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_paygrades->SortUrl($hr_paygrades->id) ?>',1);"><div id="elh_hr_paygrades_id" class="hr_paygrades_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_paygrades->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_paygrades->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_paygrades->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_paygrades->name->Visible) { // name ?>
	<?php if ($hr_paygrades->sortUrl($hr_paygrades->name) == "") { ?>
		<th data-name="name" class="<?php echo $hr_paygrades->name->headerCellClass() ?>"><div id="elh_hr_paygrades_name" class="hr_paygrades_name"><div class="ew-table-header-caption"><?php echo $hr_paygrades->name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="name" class="<?php echo $hr_paygrades->name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_paygrades->SortUrl($hr_paygrades->name) ?>',1);"><div id="elh_hr_paygrades_name" class="hr_paygrades_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_paygrades->name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hr_paygrades->name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_paygrades->name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_paygrades->currency->Visible) { // currency ?>
	<?php if ($hr_paygrades->sortUrl($hr_paygrades->currency) == "") { ?>
		<th data-name="currency" class="<?php echo $hr_paygrades->currency->headerCellClass() ?>"><div id="elh_hr_paygrades_currency" class="hr_paygrades_currency"><div class="ew-table-header-caption"><?php echo $hr_paygrades->currency->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="currency" class="<?php echo $hr_paygrades->currency->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_paygrades->SortUrl($hr_paygrades->currency) ?>',1);"><div id="elh_hr_paygrades_currency" class="hr_paygrades_currency">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_paygrades->currency->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hr_paygrades->currency->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_paygrades->currency->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_paygrades->min_salary->Visible) { // min_salary ?>
	<?php if ($hr_paygrades->sortUrl($hr_paygrades->min_salary) == "") { ?>
		<th data-name="min_salary" class="<?php echo $hr_paygrades->min_salary->headerCellClass() ?>"><div id="elh_hr_paygrades_min_salary" class="hr_paygrades_min_salary"><div class="ew-table-header-caption"><?php echo $hr_paygrades->min_salary->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="min_salary" class="<?php echo $hr_paygrades->min_salary->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_paygrades->SortUrl($hr_paygrades->min_salary) ?>',1);"><div id="elh_hr_paygrades_min_salary" class="hr_paygrades_min_salary">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_paygrades->min_salary->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_paygrades->min_salary->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_paygrades->min_salary->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_paygrades->max_salary->Visible) { // max_salary ?>
	<?php if ($hr_paygrades->sortUrl($hr_paygrades->max_salary) == "") { ?>
		<th data-name="max_salary" class="<?php echo $hr_paygrades->max_salary->headerCellClass() ?>"><div id="elh_hr_paygrades_max_salary" class="hr_paygrades_max_salary"><div class="ew-table-header-caption"><?php echo $hr_paygrades->max_salary->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="max_salary" class="<?php echo $hr_paygrades->max_salary->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_paygrades->SortUrl($hr_paygrades->max_salary) ?>',1);"><div id="elh_hr_paygrades_max_salary" class="hr_paygrades_max_salary">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_paygrades->max_salary->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_paygrades->max_salary->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_paygrades->max_salary->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_paygrades->HospID->Visible) { // HospID ?>
	<?php if ($hr_paygrades->sortUrl($hr_paygrades->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $hr_paygrades->HospID->headerCellClass() ?>"><div id="elh_hr_paygrades_HospID" class="hr_paygrades_HospID"><div class="ew-table-header-caption"><?php echo $hr_paygrades->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $hr_paygrades->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_paygrades->SortUrl($hr_paygrades->HospID) ?>',1);"><div id="elh_hr_paygrades_HospID" class="hr_paygrades_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_paygrades->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_paygrades->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_paygrades->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$hr_paygrades_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($hr_paygrades->ExportAll && $hr_paygrades->isExport()) {
	$hr_paygrades_list->StopRec = $hr_paygrades_list->TotalRecs;
} else {

	// Set the last record to display
	if ($hr_paygrades_list->TotalRecs > $hr_paygrades_list->StartRec + $hr_paygrades_list->DisplayRecs - 1)
		$hr_paygrades_list->StopRec = $hr_paygrades_list->StartRec + $hr_paygrades_list->DisplayRecs - 1;
	else
		$hr_paygrades_list->StopRec = $hr_paygrades_list->TotalRecs;
}
$hr_paygrades_list->RecCnt = $hr_paygrades_list->StartRec - 1;
if ($hr_paygrades_list->Recordset && !$hr_paygrades_list->Recordset->EOF) {
	$hr_paygrades_list->Recordset->moveFirst();
	$selectLimit = $hr_paygrades_list->UseSelectLimit;
	if (!$selectLimit && $hr_paygrades_list->StartRec > 1)
		$hr_paygrades_list->Recordset->move($hr_paygrades_list->StartRec - 1);
} elseif (!$hr_paygrades->AllowAddDeleteRow && $hr_paygrades_list->StopRec == 0) {
	$hr_paygrades_list->StopRec = $hr_paygrades->GridAddRowCount;
}

// Initialize aggregate
$hr_paygrades->RowType = ROWTYPE_AGGREGATEINIT;
$hr_paygrades->resetAttributes();
$hr_paygrades_list->renderRow();
while ($hr_paygrades_list->RecCnt < $hr_paygrades_list->StopRec) {
	$hr_paygrades_list->RecCnt++;
	if ($hr_paygrades_list->RecCnt >= $hr_paygrades_list->StartRec) {
		$hr_paygrades_list->RowCnt++;

		// Set up key count
		$hr_paygrades_list->KeyCount = $hr_paygrades_list->RowIndex;

		// Init row class and style
		$hr_paygrades->resetAttributes();
		$hr_paygrades->CssClass = "";
		if ($hr_paygrades->isGridAdd()) {
		} else {
			$hr_paygrades_list->loadRowValues($hr_paygrades_list->Recordset); // Load row values
		}
		$hr_paygrades->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$hr_paygrades->RowAttrs = array_merge($hr_paygrades->RowAttrs, array('data-rowindex'=>$hr_paygrades_list->RowCnt, 'id'=>'r' . $hr_paygrades_list->RowCnt . '_hr_paygrades', 'data-rowtype'=>$hr_paygrades->RowType));

		// Render row
		$hr_paygrades_list->renderRow();

		// Render list options
		$hr_paygrades_list->renderListOptions();
?>
	<tr<?php echo $hr_paygrades->rowAttributes() ?>>
<?php

// Render list options (body, left)
$hr_paygrades_list->ListOptions->render("body", "left", $hr_paygrades_list->RowCnt);
?>
	<?php if ($hr_paygrades->id->Visible) { // id ?>
		<td data-name="id"<?php echo $hr_paygrades->id->cellAttributes() ?>>
<span id="el<?php echo $hr_paygrades_list->RowCnt ?>_hr_paygrades_id" class="hr_paygrades_id">
<span<?php echo $hr_paygrades->id->viewAttributes() ?>>
<?php echo $hr_paygrades->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_paygrades->name->Visible) { // name ?>
		<td data-name="name"<?php echo $hr_paygrades->name->cellAttributes() ?>>
<span id="el<?php echo $hr_paygrades_list->RowCnt ?>_hr_paygrades_name" class="hr_paygrades_name">
<span<?php echo $hr_paygrades->name->viewAttributes() ?>>
<?php echo $hr_paygrades->name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_paygrades->currency->Visible) { // currency ?>
		<td data-name="currency"<?php echo $hr_paygrades->currency->cellAttributes() ?>>
<span id="el<?php echo $hr_paygrades_list->RowCnt ?>_hr_paygrades_currency" class="hr_paygrades_currency">
<span<?php echo $hr_paygrades->currency->viewAttributes() ?>>
<?php echo $hr_paygrades->currency->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_paygrades->min_salary->Visible) { // min_salary ?>
		<td data-name="min_salary"<?php echo $hr_paygrades->min_salary->cellAttributes() ?>>
<span id="el<?php echo $hr_paygrades_list->RowCnt ?>_hr_paygrades_min_salary" class="hr_paygrades_min_salary">
<span<?php echo $hr_paygrades->min_salary->viewAttributes() ?>>
<?php echo $hr_paygrades->min_salary->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_paygrades->max_salary->Visible) { // max_salary ?>
		<td data-name="max_salary"<?php echo $hr_paygrades->max_salary->cellAttributes() ?>>
<span id="el<?php echo $hr_paygrades_list->RowCnt ?>_hr_paygrades_max_salary" class="hr_paygrades_max_salary">
<span<?php echo $hr_paygrades->max_salary->viewAttributes() ?>>
<?php echo $hr_paygrades->max_salary->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_paygrades->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $hr_paygrades->HospID->cellAttributes() ?>>
<span id="el<?php echo $hr_paygrades_list->RowCnt ?>_hr_paygrades_HospID" class="hr_paygrades_HospID">
<span<?php echo $hr_paygrades->HospID->viewAttributes() ?>>
<?php echo $hr_paygrades->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$hr_paygrades_list->ListOptions->render("body", "right", $hr_paygrades_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$hr_paygrades->isGridAdd())
		$hr_paygrades_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$hr_paygrades->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($hr_paygrades_list->Recordset)
	$hr_paygrades_list->Recordset->Close();
?>
<?php if (!$hr_paygrades->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$hr_paygrades->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($hr_paygrades_list->Pager)) $hr_paygrades_list->Pager = new NumericPager($hr_paygrades_list->StartRec, $hr_paygrades_list->DisplayRecs, $hr_paygrades_list->TotalRecs, $hr_paygrades_list->RecRange, $hr_paygrades_list->AutoHidePager) ?>
<?php if ($hr_paygrades_list->Pager->RecordCount > 0 && $hr_paygrades_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($hr_paygrades_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_paygrades_list->pageUrl() ?>start=<?php echo $hr_paygrades_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($hr_paygrades_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_paygrades_list->pageUrl() ?>start=<?php echo $hr_paygrades_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($hr_paygrades_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $hr_paygrades_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($hr_paygrades_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_paygrades_list->pageUrl() ?>start=<?php echo $hr_paygrades_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($hr_paygrades_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_paygrades_list->pageUrl() ?>start=<?php echo $hr_paygrades_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($hr_paygrades_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $hr_paygrades_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $hr_paygrades_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $hr_paygrades_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($hr_paygrades_list->TotalRecs > 0 && (!$hr_paygrades_list->AutoHidePageSizeSelector || $hr_paygrades_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="hr_paygrades">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($hr_paygrades_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($hr_paygrades_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($hr_paygrades_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($hr_paygrades_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($hr_paygrades_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($hr_paygrades_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($hr_paygrades->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $hr_paygrades_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($hr_paygrades_list->TotalRecs == 0 && !$hr_paygrades->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $hr_paygrades_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$hr_paygrades_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$hr_paygrades->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$hr_paygrades->isExport()) { ?>
<script>
ew.scrollableTable("gmp_hr_paygrades", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$hr_paygrades_list->terminate();
?>
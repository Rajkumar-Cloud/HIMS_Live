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
$pres_trade_combination_names_list = new pres_trade_combination_names_list();

// Run the page
$pres_trade_combination_names_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_trade_combination_names_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$pres_trade_combination_names->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fpres_trade_combination_nameslist = currentForm = new ew.Form("fpres_trade_combination_nameslist", "list");
fpres_trade_combination_nameslist.formKeyCountName = '<?php echo $pres_trade_combination_names_list->FormKeyCountName ?>';

// Form_CustomValidate event
fpres_trade_combination_nameslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpres_trade_combination_nameslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fpres_trade_combination_nameslistsrch = currentSearchForm = new ew.Form("fpres_trade_combination_nameslistsrch");

// Filters
fpres_trade_combination_nameslistsrch.filterList = <?php echo $pres_trade_combination_names_list->getFilterList() ?>;
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
<?php if (!$pres_trade_combination_names->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($pres_trade_combination_names_list->TotalRecs > 0 && $pres_trade_combination_names_list->ExportOptions->visible()) { ?>
<?php $pres_trade_combination_names_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($pres_trade_combination_names_list->ImportOptions->visible()) { ?>
<?php $pres_trade_combination_names_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($pres_trade_combination_names_list->SearchOptions->visible()) { ?>
<?php $pres_trade_combination_names_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($pres_trade_combination_names_list->FilterOptions->visible()) { ?>
<?php $pres_trade_combination_names_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$pres_trade_combination_names_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$pres_trade_combination_names->isExport() && !$pres_trade_combination_names->CurrentAction) { ?>
<form name="fpres_trade_combination_nameslistsrch" id="fpres_trade_combination_nameslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($pres_trade_combination_names_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fpres_trade_combination_nameslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pres_trade_combination_names">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($pres_trade_combination_names_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($pres_trade_combination_names_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $pres_trade_combination_names_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($pres_trade_combination_names_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($pres_trade_combination_names_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($pres_trade_combination_names_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($pres_trade_combination_names_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $pres_trade_combination_names_list->showPageHeader(); ?>
<?php
$pres_trade_combination_names_list->showMessage();
?>
<?php if ($pres_trade_combination_names_list->TotalRecs > 0 || $pres_trade_combination_names->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pres_trade_combination_names_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pres_trade_combination_names">
<?php if (!$pres_trade_combination_names->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$pres_trade_combination_names->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($pres_trade_combination_names_list->Pager)) $pres_trade_combination_names_list->Pager = new NumericPager($pres_trade_combination_names_list->StartRec, $pres_trade_combination_names_list->DisplayRecs, $pres_trade_combination_names_list->TotalRecs, $pres_trade_combination_names_list->RecRange, $pres_trade_combination_names_list->AutoHidePager) ?>
<?php if ($pres_trade_combination_names_list->Pager->RecordCount > 0 && $pres_trade_combination_names_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($pres_trade_combination_names_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_trade_combination_names_list->pageUrl() ?>start=<?php echo $pres_trade_combination_names_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($pres_trade_combination_names_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_trade_combination_names_list->pageUrl() ?>start=<?php echo $pres_trade_combination_names_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($pres_trade_combination_names_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $pres_trade_combination_names_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($pres_trade_combination_names_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_trade_combination_names_list->pageUrl() ?>start=<?php echo $pres_trade_combination_names_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($pres_trade_combination_names_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_trade_combination_names_list->pageUrl() ?>start=<?php echo $pres_trade_combination_names_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($pres_trade_combination_names_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $pres_trade_combination_names_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $pres_trade_combination_names_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $pres_trade_combination_names_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($pres_trade_combination_names_list->TotalRecs > 0 && (!$pres_trade_combination_names_list->AutoHidePageSizeSelector || $pres_trade_combination_names_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="pres_trade_combination_names">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($pres_trade_combination_names_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($pres_trade_combination_names_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($pres_trade_combination_names_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($pres_trade_combination_names_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($pres_trade_combination_names_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($pres_trade_combination_names_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($pres_trade_combination_names->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pres_trade_combination_names_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpres_trade_combination_nameslist" id="fpres_trade_combination_nameslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pres_trade_combination_names_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pres_trade_combination_names_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_trade_combination_names">
<div id="gmp_pres_trade_combination_names" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($pres_trade_combination_names_list->TotalRecs > 0 || $pres_trade_combination_names->isGridEdit()) { ?>
<table id="tbl_pres_trade_combination_nameslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pres_trade_combination_names_list->RowType = ROWTYPE_HEADER;

// Render list options
$pres_trade_combination_names_list->renderListOptions();

// Render list options (header, left)
$pres_trade_combination_names_list->ListOptions->render("header", "left");
?>
<?php if ($pres_trade_combination_names->id->Visible) { // id ?>
	<?php if ($pres_trade_combination_names->sortUrl($pres_trade_combination_names->id) == "") { ?>
		<th data-name="id" class="<?php echo $pres_trade_combination_names->id->headerCellClass() ?>"><div id="elh_pres_trade_combination_names_id" class="pres_trade_combination_names_id"><div class="ew-table-header-caption"><?php echo $pres_trade_combination_names->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $pres_trade_combination_names->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_trade_combination_names->SortUrl($pres_trade_combination_names->id) ?>',1);"><div id="elh_pres_trade_combination_names_id" class="pres_trade_combination_names_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_trade_combination_names->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_trade_combination_names->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_trade_combination_names->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_trade_combination_names->tradenames_id->Visible) { // tradenames_id ?>
	<?php if ($pres_trade_combination_names->sortUrl($pres_trade_combination_names->tradenames_id) == "") { ?>
		<th data-name="tradenames_id" class="<?php echo $pres_trade_combination_names->tradenames_id->headerCellClass() ?>"><div id="elh_pres_trade_combination_names_tradenames_id" class="pres_trade_combination_names_tradenames_id"><div class="ew-table-header-caption"><?php echo $pres_trade_combination_names->tradenames_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tradenames_id" class="<?php echo $pres_trade_combination_names->tradenames_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_trade_combination_names->SortUrl($pres_trade_combination_names->tradenames_id) ?>',1);"><div id="elh_pres_trade_combination_names_tradenames_id" class="pres_trade_combination_names_tradenames_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_trade_combination_names->tradenames_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_trade_combination_names->tradenames_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_trade_combination_names->tradenames_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_trade_combination_names->PR_CODE->Visible) { // PR_CODE ?>
	<?php if ($pres_trade_combination_names->sortUrl($pres_trade_combination_names->PR_CODE) == "") { ?>
		<th data-name="PR_CODE" class="<?php echo $pres_trade_combination_names->PR_CODE->headerCellClass() ?>"><div id="elh_pres_trade_combination_names_PR_CODE" class="pres_trade_combination_names_PR_CODE"><div class="ew-table-header-caption"><?php echo $pres_trade_combination_names->PR_CODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PR_CODE" class="<?php echo $pres_trade_combination_names->PR_CODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_trade_combination_names->SortUrl($pres_trade_combination_names->PR_CODE) ?>',1);"><div id="elh_pres_trade_combination_names_PR_CODE" class="pres_trade_combination_names_PR_CODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_trade_combination_names->PR_CODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_trade_combination_names->PR_CODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_trade_combination_names->PR_CODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_trade_combination_names->CONTAINER_TYPE->Visible) { // CONTAINER_TYPE ?>
	<?php if ($pres_trade_combination_names->sortUrl($pres_trade_combination_names->CONTAINER_TYPE) == "") { ?>
		<th data-name="CONTAINER_TYPE" class="<?php echo $pres_trade_combination_names->CONTAINER_TYPE->headerCellClass() ?>"><div id="elh_pres_trade_combination_names_CONTAINER_TYPE" class="pres_trade_combination_names_CONTAINER_TYPE"><div class="ew-table-header-caption"><?php echo $pres_trade_combination_names->CONTAINER_TYPE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CONTAINER_TYPE" class="<?php echo $pres_trade_combination_names->CONTAINER_TYPE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_trade_combination_names->SortUrl($pres_trade_combination_names->CONTAINER_TYPE) ?>',1);"><div id="elh_pres_trade_combination_names_CONTAINER_TYPE" class="pres_trade_combination_names_CONTAINER_TYPE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_trade_combination_names->CONTAINER_TYPE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_trade_combination_names->CONTAINER_TYPE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_trade_combination_names->CONTAINER_TYPE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_trade_combination_names->STRENGTH->Visible) { // STRENGTH ?>
	<?php if ($pres_trade_combination_names->sortUrl($pres_trade_combination_names->STRENGTH) == "") { ?>
		<th data-name="STRENGTH" class="<?php echo $pres_trade_combination_names->STRENGTH->headerCellClass() ?>"><div id="elh_pres_trade_combination_names_STRENGTH" class="pres_trade_combination_names_STRENGTH"><div class="ew-table-header-caption"><?php echo $pres_trade_combination_names->STRENGTH->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="STRENGTH" class="<?php echo $pres_trade_combination_names->STRENGTH->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_trade_combination_names->SortUrl($pres_trade_combination_names->STRENGTH) ?>',1);"><div id="elh_pres_trade_combination_names_STRENGTH" class="pres_trade_combination_names_STRENGTH">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_trade_combination_names->STRENGTH->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_trade_combination_names->STRENGTH->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_trade_combination_names->STRENGTH->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pres_trade_combination_names_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($pres_trade_combination_names->ExportAll && $pres_trade_combination_names->isExport()) {
	$pres_trade_combination_names_list->StopRec = $pres_trade_combination_names_list->TotalRecs;
} else {

	// Set the last record to display
	if ($pres_trade_combination_names_list->TotalRecs > $pres_trade_combination_names_list->StartRec + $pres_trade_combination_names_list->DisplayRecs - 1)
		$pres_trade_combination_names_list->StopRec = $pres_trade_combination_names_list->StartRec + $pres_trade_combination_names_list->DisplayRecs - 1;
	else
		$pres_trade_combination_names_list->StopRec = $pres_trade_combination_names_list->TotalRecs;
}
$pres_trade_combination_names_list->RecCnt = $pres_trade_combination_names_list->StartRec - 1;
if ($pres_trade_combination_names_list->Recordset && !$pres_trade_combination_names_list->Recordset->EOF) {
	$pres_trade_combination_names_list->Recordset->moveFirst();
	$selectLimit = $pres_trade_combination_names_list->UseSelectLimit;
	if (!$selectLimit && $pres_trade_combination_names_list->StartRec > 1)
		$pres_trade_combination_names_list->Recordset->move($pres_trade_combination_names_list->StartRec - 1);
} elseif (!$pres_trade_combination_names->AllowAddDeleteRow && $pres_trade_combination_names_list->StopRec == 0) {
	$pres_trade_combination_names_list->StopRec = $pres_trade_combination_names->GridAddRowCount;
}

// Initialize aggregate
$pres_trade_combination_names->RowType = ROWTYPE_AGGREGATEINIT;
$pres_trade_combination_names->resetAttributes();
$pres_trade_combination_names_list->renderRow();
while ($pres_trade_combination_names_list->RecCnt < $pres_trade_combination_names_list->StopRec) {
	$pres_trade_combination_names_list->RecCnt++;
	if ($pres_trade_combination_names_list->RecCnt >= $pres_trade_combination_names_list->StartRec) {
		$pres_trade_combination_names_list->RowCnt++;

		// Set up key count
		$pres_trade_combination_names_list->KeyCount = $pres_trade_combination_names_list->RowIndex;

		// Init row class and style
		$pres_trade_combination_names->resetAttributes();
		$pres_trade_combination_names->CssClass = "";
		if ($pres_trade_combination_names->isGridAdd()) {
		} else {
			$pres_trade_combination_names_list->loadRowValues($pres_trade_combination_names_list->Recordset); // Load row values
		}
		$pres_trade_combination_names->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$pres_trade_combination_names->RowAttrs = array_merge($pres_trade_combination_names->RowAttrs, array('data-rowindex'=>$pres_trade_combination_names_list->RowCnt, 'id'=>'r' . $pres_trade_combination_names_list->RowCnt . '_pres_trade_combination_names', 'data-rowtype'=>$pres_trade_combination_names->RowType));

		// Render row
		$pres_trade_combination_names_list->renderRow();

		// Render list options
		$pres_trade_combination_names_list->renderListOptions();
?>
	<tr<?php echo $pres_trade_combination_names->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pres_trade_combination_names_list->ListOptions->render("body", "left", $pres_trade_combination_names_list->RowCnt);
?>
	<?php if ($pres_trade_combination_names->id->Visible) { // id ?>
		<td data-name="id"<?php echo $pres_trade_combination_names->id->cellAttributes() ?>>
<span id="el<?php echo $pres_trade_combination_names_list->RowCnt ?>_pres_trade_combination_names_id" class="pres_trade_combination_names_id">
<span<?php echo $pres_trade_combination_names->id->viewAttributes() ?>>
<?php echo $pres_trade_combination_names->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_trade_combination_names->tradenames_id->Visible) { // tradenames_id ?>
		<td data-name="tradenames_id"<?php echo $pres_trade_combination_names->tradenames_id->cellAttributes() ?>>
<span id="el<?php echo $pres_trade_combination_names_list->RowCnt ?>_pres_trade_combination_names_tradenames_id" class="pres_trade_combination_names_tradenames_id">
<span<?php echo $pres_trade_combination_names->tradenames_id->viewAttributes() ?>>
<?php echo $pres_trade_combination_names->tradenames_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_trade_combination_names->PR_CODE->Visible) { // PR_CODE ?>
		<td data-name="PR_CODE"<?php echo $pres_trade_combination_names->PR_CODE->cellAttributes() ?>>
<span id="el<?php echo $pres_trade_combination_names_list->RowCnt ?>_pres_trade_combination_names_PR_CODE" class="pres_trade_combination_names_PR_CODE">
<span<?php echo $pres_trade_combination_names->PR_CODE->viewAttributes() ?>>
<?php echo $pres_trade_combination_names->PR_CODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_trade_combination_names->CONTAINER_TYPE->Visible) { // CONTAINER_TYPE ?>
		<td data-name="CONTAINER_TYPE"<?php echo $pres_trade_combination_names->CONTAINER_TYPE->cellAttributes() ?>>
<span id="el<?php echo $pres_trade_combination_names_list->RowCnt ?>_pres_trade_combination_names_CONTAINER_TYPE" class="pres_trade_combination_names_CONTAINER_TYPE">
<span<?php echo $pres_trade_combination_names->CONTAINER_TYPE->viewAttributes() ?>>
<?php echo $pres_trade_combination_names->CONTAINER_TYPE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_trade_combination_names->STRENGTH->Visible) { // STRENGTH ?>
		<td data-name="STRENGTH"<?php echo $pres_trade_combination_names->STRENGTH->cellAttributes() ?>>
<span id="el<?php echo $pres_trade_combination_names_list->RowCnt ?>_pres_trade_combination_names_STRENGTH" class="pres_trade_combination_names_STRENGTH">
<span<?php echo $pres_trade_combination_names->STRENGTH->viewAttributes() ?>>
<?php echo $pres_trade_combination_names->STRENGTH->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pres_trade_combination_names_list->ListOptions->render("body", "right", $pres_trade_combination_names_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$pres_trade_combination_names->isGridAdd())
		$pres_trade_combination_names_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$pres_trade_combination_names->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pres_trade_combination_names_list->Recordset)
	$pres_trade_combination_names_list->Recordset->Close();
?>
<?php if (!$pres_trade_combination_names->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$pres_trade_combination_names->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($pres_trade_combination_names_list->Pager)) $pres_trade_combination_names_list->Pager = new NumericPager($pres_trade_combination_names_list->StartRec, $pres_trade_combination_names_list->DisplayRecs, $pres_trade_combination_names_list->TotalRecs, $pres_trade_combination_names_list->RecRange, $pres_trade_combination_names_list->AutoHidePager) ?>
<?php if ($pres_trade_combination_names_list->Pager->RecordCount > 0 && $pres_trade_combination_names_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($pres_trade_combination_names_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_trade_combination_names_list->pageUrl() ?>start=<?php echo $pres_trade_combination_names_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($pres_trade_combination_names_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_trade_combination_names_list->pageUrl() ?>start=<?php echo $pres_trade_combination_names_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($pres_trade_combination_names_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $pres_trade_combination_names_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($pres_trade_combination_names_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_trade_combination_names_list->pageUrl() ?>start=<?php echo $pres_trade_combination_names_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($pres_trade_combination_names_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_trade_combination_names_list->pageUrl() ?>start=<?php echo $pres_trade_combination_names_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($pres_trade_combination_names_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $pres_trade_combination_names_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $pres_trade_combination_names_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $pres_trade_combination_names_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($pres_trade_combination_names_list->TotalRecs > 0 && (!$pres_trade_combination_names_list->AutoHidePageSizeSelector || $pres_trade_combination_names_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="pres_trade_combination_names">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($pres_trade_combination_names_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($pres_trade_combination_names_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($pres_trade_combination_names_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($pres_trade_combination_names_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($pres_trade_combination_names_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($pres_trade_combination_names_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($pres_trade_combination_names->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pres_trade_combination_names_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pres_trade_combination_names_list->TotalRecs == 0 && !$pres_trade_combination_names->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pres_trade_combination_names_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$pres_trade_combination_names_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$pres_trade_combination_names->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$pres_trade_combination_names->isExport()) { ?>
<script>
ew.scrollableTable("gmp_pres_trade_combination_names", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$pres_trade_combination_names_list->terminate();
?>
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
$view1_list = new view1_list();

// Run the page
$view1_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view1_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view1->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview1list = currentForm = new ew.Form("fview1list", "list");
fview1list.formKeyCountName = '<?php echo $view1_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview1list.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview1list.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fview1listsrch = currentSearchForm = new ew.Form("fview1listsrch");

// Filters
fview1listsrch.filterList = <?php echo $view1_list->getFilterList() ?>;
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
<?php if (!$view1->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view1_list->TotalRecs > 0 && $view1_list->ExportOptions->visible()) { ?>
<?php $view1_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view1_list->ImportOptions->visible()) { ?>
<?php $view1_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view1_list->SearchOptions->visible()) { ?>
<?php $view1_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view1_list->FilterOptions->visible()) { ?>
<?php $view1_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view1_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view1->isExport() && !$view1->CurrentAction) { ?>
<form name="fview1listsrch" id="fview1listsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view1_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview1listsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view1">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view1_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view1_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view1_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view1_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view1_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view1_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view1_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view1_list->showPageHeader(); ?>
<?php
$view1_list->showMessage();
?>
<?php if ($view1_list->TotalRecs > 0 || $view1->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view1_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view1">
<?php if (!$view1->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view1->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view1_list->Pager)) $view1_list->Pager = new NumericPager($view1_list->StartRec, $view1_list->DisplayRecs, $view1_list->TotalRecs, $view1_list->RecRange, $view1_list->AutoHidePager) ?>
<?php if ($view1_list->Pager->RecordCount > 0 && $view1_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view1_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view1_list->pageUrl() ?>start=<?php echo $view1_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view1_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view1_list->pageUrl() ?>start=<?php echo $view1_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view1_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view1_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view1_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view1_list->pageUrl() ?>start=<?php echo $view1_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view1_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view1_list->pageUrl() ?>start=<?php echo $view1_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view1_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view1_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view1_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view1_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view1_list->TotalRecs > 0 && (!$view1_list->AutoHidePageSizeSelector || $view1_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view1">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view1_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view1_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view1_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view1_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view1_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view1_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view1->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view1_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview1list" id="fview1list" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view1_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view1_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view1">
<div id="gmp_view1" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view1_list->TotalRecs > 0 || $view1->isGridEdit()) { ?>
<table id="tbl_view1list" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view1_list->RowType = ROWTYPE_HEADER;

// Render list options
$view1_list->renderListOptions();

// Render list options (header, left)
$view1_list->ListOptions->render("header", "left");
?>
<?php if ($view1->prc->Visible) { // prc ?>
	<?php if ($view1->sortUrl($view1->prc) == "") { ?>
		<th data-name="prc" class="<?php echo $view1->prc->headerCellClass() ?>"><div id="elh_view1_prc" class="view1_prc"><div class="ew-table-header-caption"><?php echo $view1->prc->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="prc" class="<?php echo $view1->prc->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view1->SortUrl($view1->prc) ?>',1);"><div id="elh_view1_prc" class="view1_prc">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view1->prc->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view1->prc->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view1->prc->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view1->Product->Visible) { // Product ?>
	<?php if ($view1->sortUrl($view1->Product) == "") { ?>
		<th data-name="Product" class="<?php echo $view1->Product->headerCellClass() ?>"><div id="elh_view1_Product" class="view1_Product"><div class="ew-table-header-caption"><?php echo $view1->Product->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Product" class="<?php echo $view1->Product->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view1->SortUrl($view1->Product) ?>',1);"><div id="elh_view1_Product" class="view1_Product">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view1->Product->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view1->Product->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view1->Product->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view1->BATCHNO->Visible) { // BATCHNO ?>
	<?php if ($view1->sortUrl($view1->BATCHNO) == "") { ?>
		<th data-name="BATCHNO" class="<?php echo $view1->BATCHNO->headerCellClass() ?>"><div id="elh_view1_BATCHNO" class="view1_BATCHNO"><div class="ew-table-header-caption"><?php echo $view1->BATCHNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BATCHNO" class="<?php echo $view1->BATCHNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view1->SortUrl($view1->BATCHNO) ?>',1);"><div id="elh_view1_BATCHNO" class="view1_BATCHNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view1->BATCHNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view1->BATCHNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view1->BATCHNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view1->BRCODE->Visible) { // BRCODE ?>
	<?php if ($view1->sortUrl($view1->BRCODE) == "") { ?>
		<th data-name="BRCODE" class="<?php echo $view1->BRCODE->headerCellClass() ?>"><div id="elh_view1_BRCODE" class="view1_BRCODE"><div class="ew-table-header-caption"><?php echo $view1->BRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BRCODE" class="<?php echo $view1->BRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view1->SortUrl($view1->BRCODE) ?>',1);"><div id="elh_view1_BRCODE" class="view1_BRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view1->BRCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view1->BRCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view1->BRCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view1->HospID->Visible) { // HospID ?>
	<?php if ($view1->sortUrl($view1->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view1->HospID->headerCellClass() ?>"><div id="elh_view1_HospID" class="view1_HospID"><div class="ew-table-header-caption"><?php echo $view1->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view1->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view1->SortUrl($view1->HospID) ?>',1);"><div id="elh_view1_HospID" class="view1_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view1->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view1->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view1->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view1->sum28view_stock_movement_IQ29->Visible) { // sum(view_stock_movement.IQ) ?>
	<?php if ($view1->sortUrl($view1->sum28view_stock_movement_IQ29) == "") { ?>
		<th data-name="sum28view_stock_movement_IQ29" class="<?php echo $view1->sum28view_stock_movement_IQ29->headerCellClass() ?>"><div id="elh_view1_sum28view_stock_movement_IQ29" class="view1_sum28view_stock_movement_IQ29"><div class="ew-table-header-caption"><?php echo $view1->sum28view_stock_movement_IQ29->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sum28view_stock_movement_IQ29" class="<?php echo $view1->sum28view_stock_movement_IQ29->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view1->SortUrl($view1->sum28view_stock_movement_IQ29) ?>',1);"><div id="elh_view1_sum28view_stock_movement_IQ29" class="view1_sum28view_stock_movement_IQ29">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view1->sum28view_stock_movement_IQ29->caption() ?></span><span class="ew-table-header-sort"><?php if ($view1->sum28view_stock_movement_IQ29->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view1->sum28view_stock_movement_IQ29->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view1->sum28view_stock_movement_GrnQuantity29->Visible) { // sum(view_stock_movement.GrnQuantity) ?>
	<?php if ($view1->sortUrl($view1->sum28view_stock_movement_GrnQuantity29) == "") { ?>
		<th data-name="sum28view_stock_movement_GrnQuantity29" class="<?php echo $view1->sum28view_stock_movement_GrnQuantity29->headerCellClass() ?>"><div id="elh_view1_sum28view_stock_movement_GrnQuantity29" class="view1_sum28view_stock_movement_GrnQuantity29"><div class="ew-table-header-caption"><?php echo $view1->sum28view_stock_movement_GrnQuantity29->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sum28view_stock_movement_GrnQuantity29" class="<?php echo $view1->sum28view_stock_movement_GrnQuantity29->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view1->SortUrl($view1->sum28view_stock_movement_GrnQuantity29) ?>',1);"><div id="elh_view1_sum28view_stock_movement_GrnQuantity29" class="view1_sum28view_stock_movement_GrnQuantity29">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view1->sum28view_stock_movement_GrnQuantity29->caption() ?></span><span class="ew-table-header-sort"><?php if ($view1->sum28view_stock_movement_GrnQuantity29->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view1->sum28view_stock_movement_GrnQuantity29->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view1->sum28view_stock_movement_FreeQty29->Visible) { // sum(view_stock_movement.FreeQty) ?>
	<?php if ($view1->sortUrl($view1->sum28view_stock_movement_FreeQty29) == "") { ?>
		<th data-name="sum28view_stock_movement_FreeQty29" class="<?php echo $view1->sum28view_stock_movement_FreeQty29->headerCellClass() ?>"><div id="elh_view1_sum28view_stock_movement_FreeQty29" class="view1_sum28view_stock_movement_FreeQty29"><div class="ew-table-header-caption"><?php echo $view1->sum28view_stock_movement_FreeQty29->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sum28view_stock_movement_FreeQty29" class="<?php echo $view1->sum28view_stock_movement_FreeQty29->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view1->SortUrl($view1->sum28view_stock_movement_FreeQty29) ?>',1);"><div id="elh_view1_sum28view_stock_movement_FreeQty29" class="view1_sum28view_stock_movement_FreeQty29">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view1->sum28view_stock_movement_FreeQty29->caption() ?></span><span class="ew-table-header-sort"><?php if ($view1->sum28view_stock_movement_FreeQty29->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view1->sum28view_stock_movement_FreeQty29->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view1_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view1->ExportAll && $view1->isExport()) {
	$view1_list->StopRec = $view1_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view1_list->TotalRecs > $view1_list->StartRec + $view1_list->DisplayRecs - 1)
		$view1_list->StopRec = $view1_list->StartRec + $view1_list->DisplayRecs - 1;
	else
		$view1_list->StopRec = $view1_list->TotalRecs;
}
$view1_list->RecCnt = $view1_list->StartRec - 1;
if ($view1_list->Recordset && !$view1_list->Recordset->EOF) {
	$view1_list->Recordset->moveFirst();
	$selectLimit = $view1_list->UseSelectLimit;
	if (!$selectLimit && $view1_list->StartRec > 1)
		$view1_list->Recordset->move($view1_list->StartRec - 1);
} elseif (!$view1->AllowAddDeleteRow && $view1_list->StopRec == 0) {
	$view1_list->StopRec = $view1->GridAddRowCount;
}

// Initialize aggregate
$view1->RowType = ROWTYPE_AGGREGATEINIT;
$view1->resetAttributes();
$view1_list->renderRow();
while ($view1_list->RecCnt < $view1_list->StopRec) {
	$view1_list->RecCnt++;
	if ($view1_list->RecCnt >= $view1_list->StartRec) {
		$view1_list->RowCnt++;

		// Set up key count
		$view1_list->KeyCount = $view1_list->RowIndex;

		// Init row class and style
		$view1->resetAttributes();
		$view1->CssClass = "";
		if ($view1->isGridAdd()) {
		} else {
			$view1_list->loadRowValues($view1_list->Recordset); // Load row values
		}
		$view1->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view1->RowAttrs = array_merge($view1->RowAttrs, array('data-rowindex'=>$view1_list->RowCnt, 'id'=>'r' . $view1_list->RowCnt . '_view1', 'data-rowtype'=>$view1->RowType));

		// Render row
		$view1_list->renderRow();

		// Render list options
		$view1_list->renderListOptions();
?>
	<tr<?php echo $view1->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view1_list->ListOptions->render("body", "left", $view1_list->RowCnt);
?>
	<?php if ($view1->prc->Visible) { // prc ?>
		<td data-name="prc"<?php echo $view1->prc->cellAttributes() ?>>
<span id="el<?php echo $view1_list->RowCnt ?>_view1_prc" class="view1_prc">
<span<?php echo $view1->prc->viewAttributes() ?>>
<?php echo $view1->prc->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view1->Product->Visible) { // Product ?>
		<td data-name="Product"<?php echo $view1->Product->cellAttributes() ?>>
<span id="el<?php echo $view1_list->RowCnt ?>_view1_Product" class="view1_Product">
<span<?php echo $view1->Product->viewAttributes() ?>>
<?php echo $view1->Product->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view1->BATCHNO->Visible) { // BATCHNO ?>
		<td data-name="BATCHNO"<?php echo $view1->BATCHNO->cellAttributes() ?>>
<span id="el<?php echo $view1_list->RowCnt ?>_view1_BATCHNO" class="view1_BATCHNO">
<span<?php echo $view1->BATCHNO->viewAttributes() ?>>
<?php echo $view1->BATCHNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view1->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE"<?php echo $view1->BRCODE->cellAttributes() ?>>
<span id="el<?php echo $view1_list->RowCnt ?>_view1_BRCODE" class="view1_BRCODE">
<span<?php echo $view1->BRCODE->viewAttributes() ?>>
<?php echo $view1->BRCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view1->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view1->HospID->cellAttributes() ?>>
<span id="el<?php echo $view1_list->RowCnt ?>_view1_HospID" class="view1_HospID">
<span<?php echo $view1->HospID->viewAttributes() ?>>
<?php echo $view1->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view1->sum28view_stock_movement_IQ29->Visible) { // sum(view_stock_movement.IQ) ?>
		<td data-name="sum28view_stock_movement_IQ29"<?php echo $view1->sum28view_stock_movement_IQ29->cellAttributes() ?>>
<span id="el<?php echo $view1_list->RowCnt ?>_view1_sum28view_stock_movement_IQ29" class="view1_sum28view_stock_movement_IQ29">
<span<?php echo $view1->sum28view_stock_movement_IQ29->viewAttributes() ?>>
<?php echo $view1->sum28view_stock_movement_IQ29->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view1->sum28view_stock_movement_GrnQuantity29->Visible) { // sum(view_stock_movement.GrnQuantity) ?>
		<td data-name="sum28view_stock_movement_GrnQuantity29"<?php echo $view1->sum28view_stock_movement_GrnQuantity29->cellAttributes() ?>>
<span id="el<?php echo $view1_list->RowCnt ?>_view1_sum28view_stock_movement_GrnQuantity29" class="view1_sum28view_stock_movement_GrnQuantity29">
<span<?php echo $view1->sum28view_stock_movement_GrnQuantity29->viewAttributes() ?>>
<?php echo $view1->sum28view_stock_movement_GrnQuantity29->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view1->sum28view_stock_movement_FreeQty29->Visible) { // sum(view_stock_movement.FreeQty) ?>
		<td data-name="sum28view_stock_movement_FreeQty29"<?php echo $view1->sum28view_stock_movement_FreeQty29->cellAttributes() ?>>
<span id="el<?php echo $view1_list->RowCnt ?>_view1_sum28view_stock_movement_FreeQty29" class="view1_sum28view_stock_movement_FreeQty29">
<span<?php echo $view1->sum28view_stock_movement_FreeQty29->viewAttributes() ?>>
<?php echo $view1->sum28view_stock_movement_FreeQty29->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view1_list->ListOptions->render("body", "right", $view1_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view1->isGridAdd())
		$view1_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view1->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view1_list->Recordset)
	$view1_list->Recordset->Close();
?>
<?php if (!$view1->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view1->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view1_list->Pager)) $view1_list->Pager = new NumericPager($view1_list->StartRec, $view1_list->DisplayRecs, $view1_list->TotalRecs, $view1_list->RecRange, $view1_list->AutoHidePager) ?>
<?php if ($view1_list->Pager->RecordCount > 0 && $view1_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view1_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view1_list->pageUrl() ?>start=<?php echo $view1_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view1_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view1_list->pageUrl() ?>start=<?php echo $view1_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view1_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view1_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view1_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view1_list->pageUrl() ?>start=<?php echo $view1_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view1_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view1_list->pageUrl() ?>start=<?php echo $view1_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view1_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view1_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view1_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view1_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view1_list->TotalRecs > 0 && (!$view1_list->AutoHidePageSizeSelector || $view1_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view1">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view1_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view1_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view1_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view1_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view1_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view1_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view1->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view1_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view1_list->TotalRecs == 0 && !$view1->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view1_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view1_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view1->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view1->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view1", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view1_list->terminate();
?>
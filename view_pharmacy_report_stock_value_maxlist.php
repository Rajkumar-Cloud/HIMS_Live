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
$view_pharmacy_report_stock_value_max_list = new view_pharmacy_report_stock_value_max_list();

// Run the page
$view_pharmacy_report_stock_value_max_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacy_report_stock_value_max_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_pharmacy_report_stock_value_max->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_pharmacy_report_stock_value_maxlist = currentForm = new ew.Form("fview_pharmacy_report_stock_value_maxlist", "list");
fview_pharmacy_report_stock_value_maxlist.formKeyCountName = '<?php echo $view_pharmacy_report_stock_value_max_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_pharmacy_report_stock_value_maxlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_pharmacy_report_stock_value_maxlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fview_pharmacy_report_stock_value_maxlistsrch = currentSearchForm = new ew.Form("fview_pharmacy_report_stock_value_maxlistsrch");

// Filters
fview_pharmacy_report_stock_value_maxlistsrch.filterList = <?php echo $view_pharmacy_report_stock_value_max_list->getFilterList() ?>;
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
<?php if (!$view_pharmacy_report_stock_value_max->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_pharmacy_report_stock_value_max_list->TotalRecs > 0 && $view_pharmacy_report_stock_value_max_list->ExportOptions->visible()) { ?>
<?php $view_pharmacy_report_stock_value_max_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_report_stock_value_max_list->ImportOptions->visible()) { ?>
<?php $view_pharmacy_report_stock_value_max_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_report_stock_value_max_list->SearchOptions->visible()) { ?>
<?php $view_pharmacy_report_stock_value_max_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_report_stock_value_max_list->FilterOptions->visible()) { ?>
<?php $view_pharmacy_report_stock_value_max_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_pharmacy_report_stock_value_max_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_pharmacy_report_stock_value_max->isExport() && !$view_pharmacy_report_stock_value_max->CurrentAction) { ?>
<form name="fview_pharmacy_report_stock_value_maxlistsrch" id="fview_pharmacy_report_stock_value_maxlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_pharmacy_report_stock_value_max_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_pharmacy_report_stock_value_maxlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_pharmacy_report_stock_value_max">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_pharmacy_report_stock_value_max_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_pharmacy_report_stock_value_max_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_pharmacy_report_stock_value_max_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_pharmacy_report_stock_value_max_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_report_stock_value_max_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_report_stock_value_max_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_report_stock_value_max_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_pharmacy_report_stock_value_max_list->showPageHeader(); ?>
<?php
$view_pharmacy_report_stock_value_max_list->showMessage();
?>
<?php if ($view_pharmacy_report_stock_value_max_list->TotalRecs > 0 || $view_pharmacy_report_stock_value_max->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_pharmacy_report_stock_value_max_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_pharmacy_report_stock_value_max">
<?php if (!$view_pharmacy_report_stock_value_max->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_pharmacy_report_stock_value_max->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_pharmacy_report_stock_value_max_list->Pager)) $view_pharmacy_report_stock_value_max_list->Pager = new NumericPager($view_pharmacy_report_stock_value_max_list->StartRec, $view_pharmacy_report_stock_value_max_list->DisplayRecs, $view_pharmacy_report_stock_value_max_list->TotalRecs, $view_pharmacy_report_stock_value_max_list->RecRange, $view_pharmacy_report_stock_value_max_list->AutoHidePager) ?>
<?php if ($view_pharmacy_report_stock_value_max_list->Pager->RecordCount > 0 && $view_pharmacy_report_stock_value_max_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_pharmacy_report_stock_value_max_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_report_stock_value_max_list->pageUrl() ?>start=<?php echo $view_pharmacy_report_stock_value_max_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_report_stock_value_max_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_report_stock_value_max_list->pageUrl() ?>start=<?php echo $view_pharmacy_report_stock_value_max_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_pharmacy_report_stock_value_max_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_pharmacy_report_stock_value_max_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_report_stock_value_max_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_report_stock_value_max_list->pageUrl() ?>start=<?php echo $view_pharmacy_report_stock_value_max_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_report_stock_value_max_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_report_stock_value_max_list->pageUrl() ?>start=<?php echo $view_pharmacy_report_stock_value_max_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_pharmacy_report_stock_value_max_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_pharmacy_report_stock_value_max_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_pharmacy_report_stock_value_max_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_pharmacy_report_stock_value_max_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_pharmacy_report_stock_value_max_list->TotalRecs > 0 && (!$view_pharmacy_report_stock_value_max_list->AutoHidePageSizeSelector || $view_pharmacy_report_stock_value_max_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_pharmacy_report_stock_value_max">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_pharmacy_report_stock_value_max_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_pharmacy_report_stock_value_max_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_pharmacy_report_stock_value_max_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_pharmacy_report_stock_value_max_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_pharmacy_report_stock_value_max_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_pharmacy_report_stock_value_max_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_pharmacy_report_stock_value_max->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_report_stock_value_max_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_pharmacy_report_stock_value_maxlist" id="fview_pharmacy_report_stock_value_maxlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_pharmacy_report_stock_value_max_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_pharmacy_report_stock_value_max_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_report_stock_value_max">
<div id="gmp_view_pharmacy_report_stock_value_max" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_pharmacy_report_stock_value_max_list->TotalRecs > 0 || $view_pharmacy_report_stock_value_max->isGridEdit()) { ?>
<table id="tbl_view_pharmacy_report_stock_value_maxlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_pharmacy_report_stock_value_max_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_pharmacy_report_stock_value_max_list->renderListOptions();

// Render list options (header, left)
$view_pharmacy_report_stock_value_max_list->ListOptions->render("header", "left");
?>
<?php if ($view_pharmacy_report_stock_value_max->prc->Visible) { // prc ?>
	<?php if ($view_pharmacy_report_stock_value_max->sortUrl($view_pharmacy_report_stock_value_max->prc) == "") { ?>
		<th data-name="prc" class="<?php echo $view_pharmacy_report_stock_value_max->prc->headerCellClass() ?>"><div id="elh_view_pharmacy_report_stock_value_max_prc" class="view_pharmacy_report_stock_value_max_prc"><div class="ew-table-header-caption"><?php echo $view_pharmacy_report_stock_value_max->prc->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="prc" class="<?php echo $view_pharmacy_report_stock_value_max->prc->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_report_stock_value_max->SortUrl($view_pharmacy_report_stock_value_max->prc) ?>',1);"><div id="elh_view_pharmacy_report_stock_value_max_prc" class="view_pharmacy_report_stock_value_max_prc">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_report_stock_value_max->prc->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_report_stock_value_max->prc->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_report_stock_value_max->prc->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_report_stock_value_max->batchno->Visible) { // batchno ?>
	<?php if ($view_pharmacy_report_stock_value_max->sortUrl($view_pharmacy_report_stock_value_max->batchno) == "") { ?>
		<th data-name="batchno" class="<?php echo $view_pharmacy_report_stock_value_max->batchno->headerCellClass() ?>"><div id="elh_view_pharmacy_report_stock_value_max_batchno" class="view_pharmacy_report_stock_value_max_batchno"><div class="ew-table-header-caption"><?php echo $view_pharmacy_report_stock_value_max->batchno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="batchno" class="<?php echo $view_pharmacy_report_stock_value_max->batchno->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_report_stock_value_max->SortUrl($view_pharmacy_report_stock_value_max->batchno) ?>',1);"><div id="elh_view_pharmacy_report_stock_value_max_batchno" class="view_pharmacy_report_stock_value_max_batchno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_report_stock_value_max->batchno->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_report_stock_value_max->batchno->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_report_stock_value_max->batchno->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_report_stock_value_max->mrp->Visible) { // mrp ?>
	<?php if ($view_pharmacy_report_stock_value_max->sortUrl($view_pharmacy_report_stock_value_max->mrp) == "") { ?>
		<th data-name="mrp" class="<?php echo $view_pharmacy_report_stock_value_max->mrp->headerCellClass() ?>"><div id="elh_view_pharmacy_report_stock_value_max_mrp" class="view_pharmacy_report_stock_value_max_mrp"><div class="ew-table-header-caption"><?php echo $view_pharmacy_report_stock_value_max->mrp->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrp" class="<?php echo $view_pharmacy_report_stock_value_max->mrp->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_report_stock_value_max->SortUrl($view_pharmacy_report_stock_value_max->mrp) ?>',1);"><div id="elh_view_pharmacy_report_stock_value_max_mrp" class="view_pharmacy_report_stock_value_max_mrp">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_report_stock_value_max->mrp->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_report_stock_value_max->mrp->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_report_stock_value_max->mrp->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_report_stock_value_max->purvalue->Visible) { // purvalue ?>
	<?php if ($view_pharmacy_report_stock_value_max->sortUrl($view_pharmacy_report_stock_value_max->purvalue) == "") { ?>
		<th data-name="purvalue" class="<?php echo $view_pharmacy_report_stock_value_max->purvalue->headerCellClass() ?>"><div id="elh_view_pharmacy_report_stock_value_max_purvalue" class="view_pharmacy_report_stock_value_max_purvalue"><div class="ew-table-header-caption"><?php echo $view_pharmacy_report_stock_value_max->purvalue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="purvalue" class="<?php echo $view_pharmacy_report_stock_value_max->purvalue->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_report_stock_value_max->SortUrl($view_pharmacy_report_stock_value_max->purvalue) ?>',1);"><div id="elh_view_pharmacy_report_stock_value_max_purvalue" class="view_pharmacy_report_stock_value_max_purvalue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_report_stock_value_max->purvalue->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_report_stock_value_max->purvalue->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_report_stock_value_max->purvalue->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_report_stock_value_max->hospid->Visible) { // hospid ?>
	<?php if ($view_pharmacy_report_stock_value_max->sortUrl($view_pharmacy_report_stock_value_max->hospid) == "") { ?>
		<th data-name="hospid" class="<?php echo $view_pharmacy_report_stock_value_max->hospid->headerCellClass() ?>"><div id="elh_view_pharmacy_report_stock_value_max_hospid" class="view_pharmacy_report_stock_value_max_hospid"><div class="ew-table-header-caption"><?php echo $view_pharmacy_report_stock_value_max->hospid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="hospid" class="<?php echo $view_pharmacy_report_stock_value_max->hospid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_report_stock_value_max->SortUrl($view_pharmacy_report_stock_value_max->hospid) ?>',1);"><div id="elh_view_pharmacy_report_stock_value_max_hospid" class="view_pharmacy_report_stock_value_max_hospid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_report_stock_value_max->hospid->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_report_stock_value_max->hospid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_report_stock_value_max->hospid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_report_stock_value_max->punit->Visible) { // punit ?>
	<?php if ($view_pharmacy_report_stock_value_max->sortUrl($view_pharmacy_report_stock_value_max->punit) == "") { ?>
		<th data-name="punit" class="<?php echo $view_pharmacy_report_stock_value_max->punit->headerCellClass() ?>"><div id="elh_view_pharmacy_report_stock_value_max_punit" class="view_pharmacy_report_stock_value_max_punit"><div class="ew-table-header-caption"><?php echo $view_pharmacy_report_stock_value_max->punit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="punit" class="<?php echo $view_pharmacy_report_stock_value_max->punit->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_report_stock_value_max->SortUrl($view_pharmacy_report_stock_value_max->punit) ?>',1);"><div id="elh_view_pharmacy_report_stock_value_max_punit" class="view_pharmacy_report_stock_value_max_punit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_report_stock_value_max->punit->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_report_stock_value_max->punit->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_report_stock_value_max->punit->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_report_stock_value_max->brcode->Visible) { // brcode ?>
	<?php if ($view_pharmacy_report_stock_value_max->sortUrl($view_pharmacy_report_stock_value_max->brcode) == "") { ?>
		<th data-name="brcode" class="<?php echo $view_pharmacy_report_stock_value_max->brcode->headerCellClass() ?>"><div id="elh_view_pharmacy_report_stock_value_max_brcode" class="view_pharmacy_report_stock_value_max_brcode"><div class="ew-table-header-caption"><?php echo $view_pharmacy_report_stock_value_max->brcode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="brcode" class="<?php echo $view_pharmacy_report_stock_value_max->brcode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_report_stock_value_max->SortUrl($view_pharmacy_report_stock_value_max->brcode) ?>',1);"><div id="elh_view_pharmacy_report_stock_value_max_brcode" class="view_pharmacy_report_stock_value_max_brcode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_report_stock_value_max->brcode->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_report_stock_value_max->brcode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_report_stock_value_max->brcode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_pharmacy_report_stock_value_max_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_pharmacy_report_stock_value_max->ExportAll && $view_pharmacy_report_stock_value_max->isExport()) {
	$view_pharmacy_report_stock_value_max_list->StopRec = $view_pharmacy_report_stock_value_max_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_pharmacy_report_stock_value_max_list->TotalRecs > $view_pharmacy_report_stock_value_max_list->StartRec + $view_pharmacy_report_stock_value_max_list->DisplayRecs - 1)
		$view_pharmacy_report_stock_value_max_list->StopRec = $view_pharmacy_report_stock_value_max_list->StartRec + $view_pharmacy_report_stock_value_max_list->DisplayRecs - 1;
	else
		$view_pharmacy_report_stock_value_max_list->StopRec = $view_pharmacy_report_stock_value_max_list->TotalRecs;
}
$view_pharmacy_report_stock_value_max_list->RecCnt = $view_pharmacy_report_stock_value_max_list->StartRec - 1;
if ($view_pharmacy_report_stock_value_max_list->Recordset && !$view_pharmacy_report_stock_value_max_list->Recordset->EOF) {
	$view_pharmacy_report_stock_value_max_list->Recordset->moveFirst();
	$selectLimit = $view_pharmacy_report_stock_value_max_list->UseSelectLimit;
	if (!$selectLimit && $view_pharmacy_report_stock_value_max_list->StartRec > 1)
		$view_pharmacy_report_stock_value_max_list->Recordset->move($view_pharmacy_report_stock_value_max_list->StartRec - 1);
} elseif (!$view_pharmacy_report_stock_value_max->AllowAddDeleteRow && $view_pharmacy_report_stock_value_max_list->StopRec == 0) {
	$view_pharmacy_report_stock_value_max_list->StopRec = $view_pharmacy_report_stock_value_max->GridAddRowCount;
}

// Initialize aggregate
$view_pharmacy_report_stock_value_max->RowType = ROWTYPE_AGGREGATEINIT;
$view_pharmacy_report_stock_value_max->resetAttributes();
$view_pharmacy_report_stock_value_max_list->renderRow();
while ($view_pharmacy_report_stock_value_max_list->RecCnt < $view_pharmacy_report_stock_value_max_list->StopRec) {
	$view_pharmacy_report_stock_value_max_list->RecCnt++;
	if ($view_pharmacy_report_stock_value_max_list->RecCnt >= $view_pharmacy_report_stock_value_max_list->StartRec) {
		$view_pharmacy_report_stock_value_max_list->RowCnt++;

		// Set up key count
		$view_pharmacy_report_stock_value_max_list->KeyCount = $view_pharmacy_report_stock_value_max_list->RowIndex;

		// Init row class and style
		$view_pharmacy_report_stock_value_max->resetAttributes();
		$view_pharmacy_report_stock_value_max->CssClass = "";
		if ($view_pharmacy_report_stock_value_max->isGridAdd()) {
		} else {
			$view_pharmacy_report_stock_value_max_list->loadRowValues($view_pharmacy_report_stock_value_max_list->Recordset); // Load row values
		}
		$view_pharmacy_report_stock_value_max->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_pharmacy_report_stock_value_max->RowAttrs = array_merge($view_pharmacy_report_stock_value_max->RowAttrs, array('data-rowindex'=>$view_pharmacy_report_stock_value_max_list->RowCnt, 'id'=>'r' . $view_pharmacy_report_stock_value_max_list->RowCnt . '_view_pharmacy_report_stock_value_max', 'data-rowtype'=>$view_pharmacy_report_stock_value_max->RowType));

		// Render row
		$view_pharmacy_report_stock_value_max_list->renderRow();

		// Render list options
		$view_pharmacy_report_stock_value_max_list->renderListOptions();
?>
	<tr<?php echo $view_pharmacy_report_stock_value_max->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_pharmacy_report_stock_value_max_list->ListOptions->render("body", "left", $view_pharmacy_report_stock_value_max_list->RowCnt);
?>
	<?php if ($view_pharmacy_report_stock_value_max->prc->Visible) { // prc ?>
		<td data-name="prc"<?php echo $view_pharmacy_report_stock_value_max->prc->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_report_stock_value_max_list->RowCnt ?>_view_pharmacy_report_stock_value_max_prc" class="view_pharmacy_report_stock_value_max_prc">
<span<?php echo $view_pharmacy_report_stock_value_max->prc->viewAttributes() ?>>
<?php echo $view_pharmacy_report_stock_value_max->prc->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_report_stock_value_max->batchno->Visible) { // batchno ?>
		<td data-name="batchno"<?php echo $view_pharmacy_report_stock_value_max->batchno->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_report_stock_value_max_list->RowCnt ?>_view_pharmacy_report_stock_value_max_batchno" class="view_pharmacy_report_stock_value_max_batchno">
<span<?php echo $view_pharmacy_report_stock_value_max->batchno->viewAttributes() ?>>
<?php echo $view_pharmacy_report_stock_value_max->batchno->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_report_stock_value_max->mrp->Visible) { // mrp ?>
		<td data-name="mrp"<?php echo $view_pharmacy_report_stock_value_max->mrp->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_report_stock_value_max_list->RowCnt ?>_view_pharmacy_report_stock_value_max_mrp" class="view_pharmacy_report_stock_value_max_mrp">
<span<?php echo $view_pharmacy_report_stock_value_max->mrp->viewAttributes() ?>>
<?php echo $view_pharmacy_report_stock_value_max->mrp->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_report_stock_value_max->purvalue->Visible) { // purvalue ?>
		<td data-name="purvalue"<?php echo $view_pharmacy_report_stock_value_max->purvalue->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_report_stock_value_max_list->RowCnt ?>_view_pharmacy_report_stock_value_max_purvalue" class="view_pharmacy_report_stock_value_max_purvalue">
<span<?php echo $view_pharmacy_report_stock_value_max->purvalue->viewAttributes() ?>>
<?php echo $view_pharmacy_report_stock_value_max->purvalue->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_report_stock_value_max->hospid->Visible) { // hospid ?>
		<td data-name="hospid"<?php echo $view_pharmacy_report_stock_value_max->hospid->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_report_stock_value_max_list->RowCnt ?>_view_pharmacy_report_stock_value_max_hospid" class="view_pharmacy_report_stock_value_max_hospid">
<span<?php echo $view_pharmacy_report_stock_value_max->hospid->viewAttributes() ?>>
<?php echo $view_pharmacy_report_stock_value_max->hospid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_report_stock_value_max->punit->Visible) { // punit ?>
		<td data-name="punit"<?php echo $view_pharmacy_report_stock_value_max->punit->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_report_stock_value_max_list->RowCnt ?>_view_pharmacy_report_stock_value_max_punit" class="view_pharmacy_report_stock_value_max_punit">
<span<?php echo $view_pharmacy_report_stock_value_max->punit->viewAttributes() ?>>
<?php echo $view_pharmacy_report_stock_value_max->punit->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_report_stock_value_max->brcode->Visible) { // brcode ?>
		<td data-name="brcode"<?php echo $view_pharmacy_report_stock_value_max->brcode->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_report_stock_value_max_list->RowCnt ?>_view_pharmacy_report_stock_value_max_brcode" class="view_pharmacy_report_stock_value_max_brcode">
<span<?php echo $view_pharmacy_report_stock_value_max->brcode->viewAttributes() ?>>
<?php echo $view_pharmacy_report_stock_value_max->brcode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_pharmacy_report_stock_value_max_list->ListOptions->render("body", "right", $view_pharmacy_report_stock_value_max_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_pharmacy_report_stock_value_max->isGridAdd())
		$view_pharmacy_report_stock_value_max_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_pharmacy_report_stock_value_max->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_pharmacy_report_stock_value_max_list->Recordset)
	$view_pharmacy_report_stock_value_max_list->Recordset->Close();
?>
<?php if (!$view_pharmacy_report_stock_value_max->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_pharmacy_report_stock_value_max->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_pharmacy_report_stock_value_max_list->Pager)) $view_pharmacy_report_stock_value_max_list->Pager = new NumericPager($view_pharmacy_report_stock_value_max_list->StartRec, $view_pharmacy_report_stock_value_max_list->DisplayRecs, $view_pharmacy_report_stock_value_max_list->TotalRecs, $view_pharmacy_report_stock_value_max_list->RecRange, $view_pharmacy_report_stock_value_max_list->AutoHidePager) ?>
<?php if ($view_pharmacy_report_stock_value_max_list->Pager->RecordCount > 0 && $view_pharmacy_report_stock_value_max_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_pharmacy_report_stock_value_max_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_report_stock_value_max_list->pageUrl() ?>start=<?php echo $view_pharmacy_report_stock_value_max_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_report_stock_value_max_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_report_stock_value_max_list->pageUrl() ?>start=<?php echo $view_pharmacy_report_stock_value_max_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_pharmacy_report_stock_value_max_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_pharmacy_report_stock_value_max_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_report_stock_value_max_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_report_stock_value_max_list->pageUrl() ?>start=<?php echo $view_pharmacy_report_stock_value_max_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_report_stock_value_max_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_report_stock_value_max_list->pageUrl() ?>start=<?php echo $view_pharmacy_report_stock_value_max_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_pharmacy_report_stock_value_max_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_pharmacy_report_stock_value_max_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_pharmacy_report_stock_value_max_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_pharmacy_report_stock_value_max_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_pharmacy_report_stock_value_max_list->TotalRecs > 0 && (!$view_pharmacy_report_stock_value_max_list->AutoHidePageSizeSelector || $view_pharmacy_report_stock_value_max_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_pharmacy_report_stock_value_max">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_pharmacy_report_stock_value_max_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_pharmacy_report_stock_value_max_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_pharmacy_report_stock_value_max_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_pharmacy_report_stock_value_max_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_pharmacy_report_stock_value_max_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_pharmacy_report_stock_value_max_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_pharmacy_report_stock_value_max->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_report_stock_value_max_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_pharmacy_report_stock_value_max_list->TotalRecs == 0 && !$view_pharmacy_report_stock_value_max->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_report_stock_value_max_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_pharmacy_report_stock_value_max_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_pharmacy_report_stock_value_max->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_pharmacy_report_stock_value_max->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_pharmacy_report_stock_value_max", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_pharmacy_report_stock_value_max_list->terminate();
?>
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
$view_pharmacy_report_purchase_value_list = new view_pharmacy_report_purchase_value_list();

// Run the page
$view_pharmacy_report_purchase_value_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacy_report_purchase_value_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_pharmacy_report_purchase_value->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_pharmacy_report_purchase_valuelist = currentForm = new ew.Form("fview_pharmacy_report_purchase_valuelist", "list");
fview_pharmacy_report_purchase_valuelist.formKeyCountName = '<?php echo $view_pharmacy_report_purchase_value_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_pharmacy_report_purchase_valuelist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_pharmacy_report_purchase_valuelist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fview_pharmacy_report_purchase_valuelistsrch = currentSearchForm = new ew.Form("fview_pharmacy_report_purchase_valuelistsrch");

// Filters
fview_pharmacy_report_purchase_valuelistsrch.filterList = <?php echo $view_pharmacy_report_purchase_value_list->getFilterList() ?>;
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
<?php if (!$view_pharmacy_report_purchase_value->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_pharmacy_report_purchase_value_list->TotalRecs > 0 && $view_pharmacy_report_purchase_value_list->ExportOptions->visible()) { ?>
<?php $view_pharmacy_report_purchase_value_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_report_purchase_value_list->ImportOptions->visible()) { ?>
<?php $view_pharmacy_report_purchase_value_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_report_purchase_value_list->SearchOptions->visible()) { ?>
<?php $view_pharmacy_report_purchase_value_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_report_purchase_value_list->FilterOptions->visible()) { ?>
<?php $view_pharmacy_report_purchase_value_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_pharmacy_report_purchase_value_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_pharmacy_report_purchase_value->isExport() && !$view_pharmacy_report_purchase_value->CurrentAction) { ?>
<form name="fview_pharmacy_report_purchase_valuelistsrch" id="fview_pharmacy_report_purchase_valuelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_pharmacy_report_purchase_value_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_pharmacy_report_purchase_valuelistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_pharmacy_report_purchase_value">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_pharmacy_report_purchase_value_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_pharmacy_report_purchase_value_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_pharmacy_report_purchase_value_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_pharmacy_report_purchase_value_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_report_purchase_value_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_report_purchase_value_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_report_purchase_value_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_pharmacy_report_purchase_value_list->showPageHeader(); ?>
<?php
$view_pharmacy_report_purchase_value_list->showMessage();
?>
<?php if ($view_pharmacy_report_purchase_value_list->TotalRecs > 0 || $view_pharmacy_report_purchase_value->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_pharmacy_report_purchase_value_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_pharmacy_report_purchase_value">
<?php if (!$view_pharmacy_report_purchase_value->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_pharmacy_report_purchase_value->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_pharmacy_report_purchase_value_list->Pager)) $view_pharmacy_report_purchase_value_list->Pager = new NumericPager($view_pharmacy_report_purchase_value_list->StartRec, $view_pharmacy_report_purchase_value_list->DisplayRecs, $view_pharmacy_report_purchase_value_list->TotalRecs, $view_pharmacy_report_purchase_value_list->RecRange, $view_pharmacy_report_purchase_value_list->AutoHidePager) ?>
<?php if ($view_pharmacy_report_purchase_value_list->Pager->RecordCount > 0 && $view_pharmacy_report_purchase_value_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_pharmacy_report_purchase_value_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_report_purchase_value_list->pageUrl() ?>start=<?php echo $view_pharmacy_report_purchase_value_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_report_purchase_value_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_report_purchase_value_list->pageUrl() ?>start=<?php echo $view_pharmacy_report_purchase_value_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_pharmacy_report_purchase_value_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_pharmacy_report_purchase_value_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_report_purchase_value_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_report_purchase_value_list->pageUrl() ?>start=<?php echo $view_pharmacy_report_purchase_value_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_report_purchase_value_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_report_purchase_value_list->pageUrl() ?>start=<?php echo $view_pharmacy_report_purchase_value_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_pharmacy_report_purchase_value_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_pharmacy_report_purchase_value_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_pharmacy_report_purchase_value_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_pharmacy_report_purchase_value_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_pharmacy_report_purchase_value_list->TotalRecs > 0 && (!$view_pharmacy_report_purchase_value_list->AutoHidePageSizeSelector || $view_pharmacy_report_purchase_value_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_pharmacy_report_purchase_value">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_pharmacy_report_purchase_value_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_pharmacy_report_purchase_value_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_pharmacy_report_purchase_value_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_pharmacy_report_purchase_value_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_pharmacy_report_purchase_value_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_pharmacy_report_purchase_value_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_pharmacy_report_purchase_value->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_report_purchase_value_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_pharmacy_report_purchase_valuelist" id="fview_pharmacy_report_purchase_valuelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_pharmacy_report_purchase_value_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_pharmacy_report_purchase_value_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_report_purchase_value">
<div id="gmp_view_pharmacy_report_purchase_value" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_pharmacy_report_purchase_value_list->TotalRecs > 0 || $view_pharmacy_report_purchase_value->isGridEdit()) { ?>
<table id="tbl_view_pharmacy_report_purchase_valuelist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_pharmacy_report_purchase_value_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_pharmacy_report_purchase_value_list->renderListOptions();

// Render list options (header, left)
$view_pharmacy_report_purchase_value_list->ListOptions->render("header", "left");
?>
<?php if ($view_pharmacy_report_purchase_value->PRC->Visible) { // PRC ?>
	<?php if ($view_pharmacy_report_purchase_value->sortUrl($view_pharmacy_report_purchase_value->PRC) == "") { ?>
		<th data-name="PRC" class="<?php echo $view_pharmacy_report_purchase_value->PRC->headerCellClass() ?>"><div id="elh_view_pharmacy_report_purchase_value_PRC" class="view_pharmacy_report_purchase_value_PRC"><div class="ew-table-header-caption"><?php echo $view_pharmacy_report_purchase_value->PRC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRC" class="<?php echo $view_pharmacy_report_purchase_value->PRC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_report_purchase_value->SortUrl($view_pharmacy_report_purchase_value->PRC) ?>',1);"><div id="elh_view_pharmacy_report_purchase_value_PRC" class="view_pharmacy_report_purchase_value_PRC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_report_purchase_value->PRC->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_report_purchase_value->PRC->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_report_purchase_value->PRC->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_report_purchase_value->BatchNo->Visible) { // BatchNo ?>
	<?php if ($view_pharmacy_report_purchase_value->sortUrl($view_pharmacy_report_purchase_value->BatchNo) == "") { ?>
		<th data-name="BatchNo" class="<?php echo $view_pharmacy_report_purchase_value->BatchNo->headerCellClass() ?>"><div id="elh_view_pharmacy_report_purchase_value_BatchNo" class="view_pharmacy_report_purchase_value_BatchNo"><div class="ew-table-header-caption"><?php echo $view_pharmacy_report_purchase_value->BatchNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BatchNo" class="<?php echo $view_pharmacy_report_purchase_value->BatchNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_report_purchase_value->SortUrl($view_pharmacy_report_purchase_value->BatchNo) ?>',1);"><div id="elh_view_pharmacy_report_purchase_value_BatchNo" class="view_pharmacy_report_purchase_value_BatchNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_report_purchase_value->BatchNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_report_purchase_value->BatchNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_report_purchase_value->BatchNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_report_purchase_value->MRP->Visible) { // MRP ?>
	<?php if ($view_pharmacy_report_purchase_value->sortUrl($view_pharmacy_report_purchase_value->MRP) == "") { ?>
		<th data-name="MRP" class="<?php echo $view_pharmacy_report_purchase_value->MRP->headerCellClass() ?>"><div id="elh_view_pharmacy_report_purchase_value_MRP" class="view_pharmacy_report_purchase_value_MRP"><div class="ew-table-header-caption"><?php echo $view_pharmacy_report_purchase_value->MRP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MRP" class="<?php echo $view_pharmacy_report_purchase_value->MRP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_report_purchase_value->SortUrl($view_pharmacy_report_purchase_value->MRP) ?>',1);"><div id="elh_view_pharmacy_report_purchase_value_MRP" class="view_pharmacy_report_purchase_value_MRP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_report_purchase_value->MRP->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_report_purchase_value->MRP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_report_purchase_value->MRP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_report_purchase_value->PurValue->Visible) { // PurValue ?>
	<?php if ($view_pharmacy_report_purchase_value->sortUrl($view_pharmacy_report_purchase_value->PurValue) == "") { ?>
		<th data-name="PurValue" class="<?php echo $view_pharmacy_report_purchase_value->PurValue->headerCellClass() ?>"><div id="elh_view_pharmacy_report_purchase_value_PurValue" class="view_pharmacy_report_purchase_value_PurValue"><div class="ew-table-header-caption"><?php echo $view_pharmacy_report_purchase_value->PurValue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PurValue" class="<?php echo $view_pharmacy_report_purchase_value->PurValue->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_report_purchase_value->SortUrl($view_pharmacy_report_purchase_value->PurValue) ?>',1);"><div id="elh_view_pharmacy_report_purchase_value_PurValue" class="view_pharmacy_report_purchase_value_PurValue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_report_purchase_value->PurValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_report_purchase_value->PurValue->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_report_purchase_value->PurValue->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_report_purchase_value->HospID->Visible) { // HospID ?>
	<?php if ($view_pharmacy_report_purchase_value->sortUrl($view_pharmacy_report_purchase_value->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_pharmacy_report_purchase_value->HospID->headerCellClass() ?>"><div id="elh_view_pharmacy_report_purchase_value_HospID" class="view_pharmacy_report_purchase_value_HospID"><div class="ew-table-header-caption"><?php echo $view_pharmacy_report_purchase_value->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_pharmacy_report_purchase_value->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_report_purchase_value->SortUrl($view_pharmacy_report_purchase_value->HospID) ?>',1);"><div id="elh_view_pharmacy_report_purchase_value_HospID" class="view_pharmacy_report_purchase_value_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_report_purchase_value->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_report_purchase_value->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_report_purchase_value->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_report_purchase_value->PUnit->Visible) { // PUnit ?>
	<?php if ($view_pharmacy_report_purchase_value->sortUrl($view_pharmacy_report_purchase_value->PUnit) == "") { ?>
		<th data-name="PUnit" class="<?php echo $view_pharmacy_report_purchase_value->PUnit->headerCellClass() ?>"><div id="elh_view_pharmacy_report_purchase_value_PUnit" class="view_pharmacy_report_purchase_value_PUnit"><div class="ew-table-header-caption"><?php echo $view_pharmacy_report_purchase_value->PUnit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PUnit" class="<?php echo $view_pharmacy_report_purchase_value->PUnit->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_report_purchase_value->SortUrl($view_pharmacy_report_purchase_value->PUnit) ?>',1);"><div id="elh_view_pharmacy_report_purchase_value_PUnit" class="view_pharmacy_report_purchase_value_PUnit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_report_purchase_value->PUnit->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_report_purchase_value->PUnit->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_report_purchase_value->PUnit->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_report_purchase_value->BRCODE->Visible) { // BRCODE ?>
	<?php if ($view_pharmacy_report_purchase_value->sortUrl($view_pharmacy_report_purchase_value->BRCODE) == "") { ?>
		<th data-name="BRCODE" class="<?php echo $view_pharmacy_report_purchase_value->BRCODE->headerCellClass() ?>"><div id="elh_view_pharmacy_report_purchase_value_BRCODE" class="view_pharmacy_report_purchase_value_BRCODE"><div class="ew-table-header-caption"><?php echo $view_pharmacy_report_purchase_value->BRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BRCODE" class="<?php echo $view_pharmacy_report_purchase_value->BRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_report_purchase_value->SortUrl($view_pharmacy_report_purchase_value->BRCODE) ?>',1);"><div id="elh_view_pharmacy_report_purchase_value_BRCODE" class="view_pharmacy_report_purchase_value_BRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_report_purchase_value->BRCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_report_purchase_value->BRCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_report_purchase_value->BRCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_pharmacy_report_purchase_value_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_pharmacy_report_purchase_value->ExportAll && $view_pharmacy_report_purchase_value->isExport()) {
	$view_pharmacy_report_purchase_value_list->StopRec = $view_pharmacy_report_purchase_value_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_pharmacy_report_purchase_value_list->TotalRecs > $view_pharmacy_report_purchase_value_list->StartRec + $view_pharmacy_report_purchase_value_list->DisplayRecs - 1)
		$view_pharmacy_report_purchase_value_list->StopRec = $view_pharmacy_report_purchase_value_list->StartRec + $view_pharmacy_report_purchase_value_list->DisplayRecs - 1;
	else
		$view_pharmacy_report_purchase_value_list->StopRec = $view_pharmacy_report_purchase_value_list->TotalRecs;
}
$view_pharmacy_report_purchase_value_list->RecCnt = $view_pharmacy_report_purchase_value_list->StartRec - 1;
if ($view_pharmacy_report_purchase_value_list->Recordset && !$view_pharmacy_report_purchase_value_list->Recordset->EOF) {
	$view_pharmacy_report_purchase_value_list->Recordset->moveFirst();
	$selectLimit = $view_pharmacy_report_purchase_value_list->UseSelectLimit;
	if (!$selectLimit && $view_pharmacy_report_purchase_value_list->StartRec > 1)
		$view_pharmacy_report_purchase_value_list->Recordset->move($view_pharmacy_report_purchase_value_list->StartRec - 1);
} elseif (!$view_pharmacy_report_purchase_value->AllowAddDeleteRow && $view_pharmacy_report_purchase_value_list->StopRec == 0) {
	$view_pharmacy_report_purchase_value_list->StopRec = $view_pharmacy_report_purchase_value->GridAddRowCount;
}

// Initialize aggregate
$view_pharmacy_report_purchase_value->RowType = ROWTYPE_AGGREGATEINIT;
$view_pharmacy_report_purchase_value->resetAttributes();
$view_pharmacy_report_purchase_value_list->renderRow();
while ($view_pharmacy_report_purchase_value_list->RecCnt < $view_pharmacy_report_purchase_value_list->StopRec) {
	$view_pharmacy_report_purchase_value_list->RecCnt++;
	if ($view_pharmacy_report_purchase_value_list->RecCnt >= $view_pharmacy_report_purchase_value_list->StartRec) {
		$view_pharmacy_report_purchase_value_list->RowCnt++;

		// Set up key count
		$view_pharmacy_report_purchase_value_list->KeyCount = $view_pharmacy_report_purchase_value_list->RowIndex;

		// Init row class and style
		$view_pharmacy_report_purchase_value->resetAttributes();
		$view_pharmacy_report_purchase_value->CssClass = "";
		if ($view_pharmacy_report_purchase_value->isGridAdd()) {
		} else {
			$view_pharmacy_report_purchase_value_list->loadRowValues($view_pharmacy_report_purchase_value_list->Recordset); // Load row values
		}
		$view_pharmacy_report_purchase_value->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_pharmacy_report_purchase_value->RowAttrs = array_merge($view_pharmacy_report_purchase_value->RowAttrs, array('data-rowindex'=>$view_pharmacy_report_purchase_value_list->RowCnt, 'id'=>'r' . $view_pharmacy_report_purchase_value_list->RowCnt . '_view_pharmacy_report_purchase_value', 'data-rowtype'=>$view_pharmacy_report_purchase_value->RowType));

		// Render row
		$view_pharmacy_report_purchase_value_list->renderRow();

		// Render list options
		$view_pharmacy_report_purchase_value_list->renderListOptions();
?>
	<tr<?php echo $view_pharmacy_report_purchase_value->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_pharmacy_report_purchase_value_list->ListOptions->render("body", "left", $view_pharmacy_report_purchase_value_list->RowCnt);
?>
	<?php if ($view_pharmacy_report_purchase_value->PRC->Visible) { // PRC ?>
		<td data-name="PRC"<?php echo $view_pharmacy_report_purchase_value->PRC->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_report_purchase_value_list->RowCnt ?>_view_pharmacy_report_purchase_value_PRC" class="view_pharmacy_report_purchase_value_PRC">
<span<?php echo $view_pharmacy_report_purchase_value->PRC->viewAttributes() ?>>
<?php echo $view_pharmacy_report_purchase_value->PRC->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_report_purchase_value->BatchNo->Visible) { // BatchNo ?>
		<td data-name="BatchNo"<?php echo $view_pharmacy_report_purchase_value->BatchNo->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_report_purchase_value_list->RowCnt ?>_view_pharmacy_report_purchase_value_BatchNo" class="view_pharmacy_report_purchase_value_BatchNo">
<span<?php echo $view_pharmacy_report_purchase_value->BatchNo->viewAttributes() ?>>
<?php echo $view_pharmacy_report_purchase_value->BatchNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_report_purchase_value->MRP->Visible) { // MRP ?>
		<td data-name="MRP"<?php echo $view_pharmacy_report_purchase_value->MRP->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_report_purchase_value_list->RowCnt ?>_view_pharmacy_report_purchase_value_MRP" class="view_pharmacy_report_purchase_value_MRP">
<span<?php echo $view_pharmacy_report_purchase_value->MRP->viewAttributes() ?>>
<?php echo $view_pharmacy_report_purchase_value->MRP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_report_purchase_value->PurValue->Visible) { // PurValue ?>
		<td data-name="PurValue"<?php echo $view_pharmacy_report_purchase_value->PurValue->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_report_purchase_value_list->RowCnt ?>_view_pharmacy_report_purchase_value_PurValue" class="view_pharmacy_report_purchase_value_PurValue">
<span<?php echo $view_pharmacy_report_purchase_value->PurValue->viewAttributes() ?>>
<?php echo $view_pharmacy_report_purchase_value->PurValue->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_report_purchase_value->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_pharmacy_report_purchase_value->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_report_purchase_value_list->RowCnt ?>_view_pharmacy_report_purchase_value_HospID" class="view_pharmacy_report_purchase_value_HospID">
<span<?php echo $view_pharmacy_report_purchase_value->HospID->viewAttributes() ?>>
<?php echo $view_pharmacy_report_purchase_value->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_report_purchase_value->PUnit->Visible) { // PUnit ?>
		<td data-name="PUnit"<?php echo $view_pharmacy_report_purchase_value->PUnit->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_report_purchase_value_list->RowCnt ?>_view_pharmacy_report_purchase_value_PUnit" class="view_pharmacy_report_purchase_value_PUnit">
<span<?php echo $view_pharmacy_report_purchase_value->PUnit->viewAttributes() ?>>
<?php echo $view_pharmacy_report_purchase_value->PUnit->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_report_purchase_value->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE"<?php echo $view_pharmacy_report_purchase_value->BRCODE->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_report_purchase_value_list->RowCnt ?>_view_pharmacy_report_purchase_value_BRCODE" class="view_pharmacy_report_purchase_value_BRCODE">
<span<?php echo $view_pharmacy_report_purchase_value->BRCODE->viewAttributes() ?>>
<?php echo $view_pharmacy_report_purchase_value->BRCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_pharmacy_report_purchase_value_list->ListOptions->render("body", "right", $view_pharmacy_report_purchase_value_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_pharmacy_report_purchase_value->isGridAdd())
		$view_pharmacy_report_purchase_value_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_pharmacy_report_purchase_value->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_pharmacy_report_purchase_value_list->Recordset)
	$view_pharmacy_report_purchase_value_list->Recordset->Close();
?>
<?php if (!$view_pharmacy_report_purchase_value->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_pharmacy_report_purchase_value->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_pharmacy_report_purchase_value_list->Pager)) $view_pharmacy_report_purchase_value_list->Pager = new NumericPager($view_pharmacy_report_purchase_value_list->StartRec, $view_pharmacy_report_purchase_value_list->DisplayRecs, $view_pharmacy_report_purchase_value_list->TotalRecs, $view_pharmacy_report_purchase_value_list->RecRange, $view_pharmacy_report_purchase_value_list->AutoHidePager) ?>
<?php if ($view_pharmacy_report_purchase_value_list->Pager->RecordCount > 0 && $view_pharmacy_report_purchase_value_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_pharmacy_report_purchase_value_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_report_purchase_value_list->pageUrl() ?>start=<?php echo $view_pharmacy_report_purchase_value_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_report_purchase_value_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_report_purchase_value_list->pageUrl() ?>start=<?php echo $view_pharmacy_report_purchase_value_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_pharmacy_report_purchase_value_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_pharmacy_report_purchase_value_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_report_purchase_value_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_report_purchase_value_list->pageUrl() ?>start=<?php echo $view_pharmacy_report_purchase_value_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_report_purchase_value_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_report_purchase_value_list->pageUrl() ?>start=<?php echo $view_pharmacy_report_purchase_value_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_pharmacy_report_purchase_value_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_pharmacy_report_purchase_value_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_pharmacy_report_purchase_value_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_pharmacy_report_purchase_value_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_pharmacy_report_purchase_value_list->TotalRecs > 0 && (!$view_pharmacy_report_purchase_value_list->AutoHidePageSizeSelector || $view_pharmacy_report_purchase_value_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_pharmacy_report_purchase_value">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_pharmacy_report_purchase_value_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_pharmacy_report_purchase_value_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_pharmacy_report_purchase_value_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_pharmacy_report_purchase_value_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_pharmacy_report_purchase_value_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_pharmacy_report_purchase_value_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_pharmacy_report_purchase_value->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_report_purchase_value_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_pharmacy_report_purchase_value_list->TotalRecs == 0 && !$view_pharmacy_report_purchase_value->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_report_purchase_value_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_pharmacy_report_purchase_value_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_pharmacy_report_purchase_value->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_pharmacy_report_purchase_value->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_pharmacy_report_purchase_value", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_pharmacy_report_purchase_value_list->terminate();
?>
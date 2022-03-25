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
$view_pharmacy_search_product_new_list = new view_pharmacy_search_product_new_list();

// Run the page
$view_pharmacy_search_product_new_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacy_search_product_new_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_pharmacy_search_product_new->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_pharmacy_search_product_newlist = currentForm = new ew.Form("fview_pharmacy_search_product_newlist", "list");
fview_pharmacy_search_product_newlist.formKeyCountName = '<?php echo $view_pharmacy_search_product_new_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_pharmacy_search_product_newlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_pharmacy_search_product_newlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fview_pharmacy_search_product_newlistsrch = currentSearchForm = new ew.Form("fview_pharmacy_search_product_newlistsrch");

// Filters
fview_pharmacy_search_product_newlistsrch.filterList = <?php echo $view_pharmacy_search_product_new_list->getFilterList() ?>;
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
<?php if (!$view_pharmacy_search_product_new->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_pharmacy_search_product_new_list->TotalRecs > 0 && $view_pharmacy_search_product_new_list->ExportOptions->visible()) { ?>
<?php $view_pharmacy_search_product_new_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_search_product_new_list->ImportOptions->visible()) { ?>
<?php $view_pharmacy_search_product_new_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_search_product_new_list->SearchOptions->visible()) { ?>
<?php $view_pharmacy_search_product_new_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_search_product_new_list->FilterOptions->visible()) { ?>
<?php $view_pharmacy_search_product_new_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_pharmacy_search_product_new_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_pharmacy_search_product_new->isExport() && !$view_pharmacy_search_product_new->CurrentAction) { ?>
<form name="fview_pharmacy_search_product_newlistsrch" id="fview_pharmacy_search_product_newlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_pharmacy_search_product_new_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_pharmacy_search_product_newlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_pharmacy_search_product_new">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_pharmacy_search_product_new_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_pharmacy_search_product_new_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_pharmacy_search_product_new_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_pharmacy_search_product_new_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_search_product_new_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_search_product_new_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_search_product_new_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_pharmacy_search_product_new_list->showPageHeader(); ?>
<?php
$view_pharmacy_search_product_new_list->showMessage();
?>
<?php if ($view_pharmacy_search_product_new_list->TotalRecs > 0 || $view_pharmacy_search_product_new->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_pharmacy_search_product_new_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_pharmacy_search_product_new">
<?php if (!$view_pharmacy_search_product_new->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_pharmacy_search_product_new->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_pharmacy_search_product_new_list->Pager)) $view_pharmacy_search_product_new_list->Pager = new NumericPager($view_pharmacy_search_product_new_list->StartRec, $view_pharmacy_search_product_new_list->DisplayRecs, $view_pharmacy_search_product_new_list->TotalRecs, $view_pharmacy_search_product_new_list->RecRange, $view_pharmacy_search_product_new_list->AutoHidePager) ?>
<?php if ($view_pharmacy_search_product_new_list->Pager->RecordCount > 0 && $view_pharmacy_search_product_new_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_pharmacy_search_product_new_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_search_product_new_list->pageUrl() ?>start=<?php echo $view_pharmacy_search_product_new_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_search_product_new_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_search_product_new_list->pageUrl() ?>start=<?php echo $view_pharmacy_search_product_new_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_pharmacy_search_product_new_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_pharmacy_search_product_new_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_search_product_new_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_search_product_new_list->pageUrl() ?>start=<?php echo $view_pharmacy_search_product_new_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_search_product_new_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_search_product_new_list->pageUrl() ?>start=<?php echo $view_pharmacy_search_product_new_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_pharmacy_search_product_new_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_pharmacy_search_product_new_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_pharmacy_search_product_new_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_pharmacy_search_product_new_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_pharmacy_search_product_new_list->TotalRecs > 0 && (!$view_pharmacy_search_product_new_list->AutoHidePageSizeSelector || $view_pharmacy_search_product_new_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_pharmacy_search_product_new">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_pharmacy_search_product_new_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_pharmacy_search_product_new_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_pharmacy_search_product_new_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_pharmacy_search_product_new_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_pharmacy_search_product_new_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_pharmacy_search_product_new_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_pharmacy_search_product_new->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_search_product_new_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_pharmacy_search_product_newlist" id="fview_pharmacy_search_product_newlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_pharmacy_search_product_new_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_pharmacy_search_product_new_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_search_product_new">
<div id="gmp_view_pharmacy_search_product_new" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_pharmacy_search_product_new_list->TotalRecs > 0 || $view_pharmacy_search_product_new->isGridEdit()) { ?>
<table id="tbl_view_pharmacy_search_product_newlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_pharmacy_search_product_new_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_pharmacy_search_product_new_list->renderListOptions();

// Render list options (header, left)
$view_pharmacy_search_product_new_list->ListOptions->render("header", "left");
?>
<?php if ($view_pharmacy_search_product_new->id->Visible) { // id ?>
	<?php if ($view_pharmacy_search_product_new->sortUrl($view_pharmacy_search_product_new->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_pharmacy_search_product_new->id->headerCellClass() ?>"><div id="elh_view_pharmacy_search_product_new_id" class="view_pharmacy_search_product_new_id"><div class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_new->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_pharmacy_search_product_new->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_search_product_new->SortUrl($view_pharmacy_search_product_new->id) ?>',1);"><div id="elh_view_pharmacy_search_product_new_id" class="view_pharmacy_search_product_new_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_new->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_search_product_new->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_search_product_new->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_search_product_new->DES->Visible) { // DES ?>
	<?php if ($view_pharmacy_search_product_new->sortUrl($view_pharmacy_search_product_new->DES) == "") { ?>
		<th data-name="DES" class="<?php echo $view_pharmacy_search_product_new->DES->headerCellClass() ?>"><div id="elh_view_pharmacy_search_product_new_DES" class="view_pharmacy_search_product_new_DES"><div class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_new->DES->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DES" class="<?php echo $view_pharmacy_search_product_new->DES->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_search_product_new->SortUrl($view_pharmacy_search_product_new->DES) ?>',1);"><div id="elh_view_pharmacy_search_product_new_DES" class="view_pharmacy_search_product_new_DES">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_new->DES->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_search_product_new->DES->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_search_product_new->DES->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_search_product_new->BATCH->Visible) { // BATCH ?>
	<?php if ($view_pharmacy_search_product_new->sortUrl($view_pharmacy_search_product_new->BATCH) == "") { ?>
		<th data-name="BATCH" class="<?php echo $view_pharmacy_search_product_new->BATCH->headerCellClass() ?>"><div id="elh_view_pharmacy_search_product_new_BATCH" class="view_pharmacy_search_product_new_BATCH"><div class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_new->BATCH->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BATCH" class="<?php echo $view_pharmacy_search_product_new->BATCH->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_search_product_new->SortUrl($view_pharmacy_search_product_new->BATCH) ?>',1);"><div id="elh_view_pharmacy_search_product_new_BATCH" class="view_pharmacy_search_product_new_BATCH">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_new->BATCH->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_search_product_new->BATCH->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_search_product_new->BATCH->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_search_product_new->PRC->Visible) { // PRC ?>
	<?php if ($view_pharmacy_search_product_new->sortUrl($view_pharmacy_search_product_new->PRC) == "") { ?>
		<th data-name="PRC" class="<?php echo $view_pharmacy_search_product_new->PRC->headerCellClass() ?>"><div id="elh_view_pharmacy_search_product_new_PRC" class="view_pharmacy_search_product_new_PRC"><div class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_new->PRC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRC" class="<?php echo $view_pharmacy_search_product_new->PRC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_search_product_new->SortUrl($view_pharmacy_search_product_new->PRC) ?>',1);"><div id="elh_view_pharmacy_search_product_new_PRC" class="view_pharmacy_search_product_new_PRC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_new->PRC->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_search_product_new->PRC->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_search_product_new->PRC->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_search_product_new->OQ->Visible) { // OQ ?>
	<?php if ($view_pharmacy_search_product_new->sortUrl($view_pharmacy_search_product_new->OQ) == "") { ?>
		<th data-name="OQ" class="<?php echo $view_pharmacy_search_product_new->OQ->headerCellClass() ?>"><div id="elh_view_pharmacy_search_product_new_OQ" class="view_pharmacy_search_product_new_OQ"><div class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_new->OQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OQ" class="<?php echo $view_pharmacy_search_product_new->OQ->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_search_product_new->SortUrl($view_pharmacy_search_product_new->OQ) ?>',1);"><div id="elh_view_pharmacy_search_product_new_OQ" class="view_pharmacy_search_product_new_OQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_new->OQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_search_product_new->OQ->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_search_product_new->OQ->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_search_product_new->Stock->Visible) { // Stock ?>
	<?php if ($view_pharmacy_search_product_new->sortUrl($view_pharmacy_search_product_new->Stock) == "") { ?>
		<th data-name="Stock" class="<?php echo $view_pharmacy_search_product_new->Stock->headerCellClass() ?>"><div id="elh_view_pharmacy_search_product_new_Stock" class="view_pharmacy_search_product_new_Stock"><div class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_new->Stock->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Stock" class="<?php echo $view_pharmacy_search_product_new->Stock->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_search_product_new->SortUrl($view_pharmacy_search_product_new->Stock) ?>',1);"><div id="elh_view_pharmacy_search_product_new_Stock" class="view_pharmacy_search_product_new_Stock">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_new->Stock->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_search_product_new->Stock->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_search_product_new->Stock->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_search_product_new->EXPDT->Visible) { // EXPDT ?>
	<?php if ($view_pharmacy_search_product_new->sortUrl($view_pharmacy_search_product_new->EXPDT) == "") { ?>
		<th data-name="EXPDT" class="<?php echo $view_pharmacy_search_product_new->EXPDT->headerCellClass() ?>"><div id="elh_view_pharmacy_search_product_new_EXPDT" class="view_pharmacy_search_product_new_EXPDT"><div class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_new->EXPDT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EXPDT" class="<?php echo $view_pharmacy_search_product_new->EXPDT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_search_product_new->SortUrl($view_pharmacy_search_product_new->EXPDT) ?>',1);"><div id="elh_view_pharmacy_search_product_new_EXPDT" class="view_pharmacy_search_product_new_EXPDT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_new->EXPDT->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_search_product_new->EXPDT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_search_product_new->EXPDT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_search_product_new->GENNAME->Visible) { // GENNAME ?>
	<?php if ($view_pharmacy_search_product_new->sortUrl($view_pharmacy_search_product_new->GENNAME) == "") { ?>
		<th data-name="GENNAME" class="<?php echo $view_pharmacy_search_product_new->GENNAME->headerCellClass() ?>"><div id="elh_view_pharmacy_search_product_new_GENNAME" class="view_pharmacy_search_product_new_GENNAME"><div class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_new->GENNAME->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GENNAME" class="<?php echo $view_pharmacy_search_product_new->GENNAME->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_search_product_new->SortUrl($view_pharmacy_search_product_new->GENNAME) ?>',1);"><div id="elh_view_pharmacy_search_product_new_GENNAME" class="view_pharmacy_search_product_new_GENNAME">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_new->GENNAME->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_search_product_new->GENNAME->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_search_product_new->GENNAME->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_search_product_new->UNIT->Visible) { // UNIT ?>
	<?php if ($view_pharmacy_search_product_new->sortUrl($view_pharmacy_search_product_new->UNIT) == "") { ?>
		<th data-name="UNIT" class="<?php echo $view_pharmacy_search_product_new->UNIT->headerCellClass() ?>"><div id="elh_view_pharmacy_search_product_new_UNIT" class="view_pharmacy_search_product_new_UNIT"><div class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_new->UNIT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UNIT" class="<?php echo $view_pharmacy_search_product_new->UNIT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_search_product_new->SortUrl($view_pharmacy_search_product_new->UNIT) ?>',1);"><div id="elh_view_pharmacy_search_product_new_UNIT" class="view_pharmacy_search_product_new_UNIT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_new->UNIT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_search_product_new->UNIT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_search_product_new->UNIT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_search_product_new->RT->Visible) { // RT ?>
	<?php if ($view_pharmacy_search_product_new->sortUrl($view_pharmacy_search_product_new->RT) == "") { ?>
		<th data-name="RT" class="<?php echo $view_pharmacy_search_product_new->RT->headerCellClass() ?>"><div id="elh_view_pharmacy_search_product_new_RT" class="view_pharmacy_search_product_new_RT"><div class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_new->RT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RT" class="<?php echo $view_pharmacy_search_product_new->RT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_search_product_new->SortUrl($view_pharmacy_search_product_new->RT) ?>',1);"><div id="elh_view_pharmacy_search_product_new_RT" class="view_pharmacy_search_product_new_RT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_new->RT->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_search_product_new->RT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_search_product_new->RT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_search_product_new->SSGST->Visible) { // SSGST ?>
	<?php if ($view_pharmacy_search_product_new->sortUrl($view_pharmacy_search_product_new->SSGST) == "") { ?>
		<th data-name="SSGST" class="<?php echo $view_pharmacy_search_product_new->SSGST->headerCellClass() ?>"><div id="elh_view_pharmacy_search_product_new_SSGST" class="view_pharmacy_search_product_new_SSGST"><div class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_new->SSGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SSGST" class="<?php echo $view_pharmacy_search_product_new->SSGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_search_product_new->SortUrl($view_pharmacy_search_product_new->SSGST) ?>',1);"><div id="elh_view_pharmacy_search_product_new_SSGST" class="view_pharmacy_search_product_new_SSGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_new->SSGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_search_product_new->SSGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_search_product_new->SSGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_search_product_new->SCGST->Visible) { // SCGST ?>
	<?php if ($view_pharmacy_search_product_new->sortUrl($view_pharmacy_search_product_new->SCGST) == "") { ?>
		<th data-name="SCGST" class="<?php echo $view_pharmacy_search_product_new->SCGST->headerCellClass() ?>"><div id="elh_view_pharmacy_search_product_new_SCGST" class="view_pharmacy_search_product_new_SCGST"><div class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_new->SCGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SCGST" class="<?php echo $view_pharmacy_search_product_new->SCGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_search_product_new->SortUrl($view_pharmacy_search_product_new->SCGST) ?>',1);"><div id="elh_view_pharmacy_search_product_new_SCGST" class="view_pharmacy_search_product_new_SCGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_new->SCGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_search_product_new->SCGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_search_product_new->SCGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_search_product_new->MFRCODE->Visible) { // MFRCODE ?>
	<?php if ($view_pharmacy_search_product_new->sortUrl($view_pharmacy_search_product_new->MFRCODE) == "") { ?>
		<th data-name="MFRCODE" class="<?php echo $view_pharmacy_search_product_new->MFRCODE->headerCellClass() ?>"><div id="elh_view_pharmacy_search_product_new_MFRCODE" class="view_pharmacy_search_product_new_MFRCODE"><div class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_new->MFRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MFRCODE" class="<?php echo $view_pharmacy_search_product_new->MFRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_search_product_new->SortUrl($view_pharmacy_search_product_new->MFRCODE) ?>',1);"><div id="elh_view_pharmacy_search_product_new_MFRCODE" class="view_pharmacy_search_product_new_MFRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_new->MFRCODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_search_product_new->MFRCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_search_product_new->MFRCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_search_product_new->BRCODE->Visible) { // BRCODE ?>
	<?php if ($view_pharmacy_search_product_new->sortUrl($view_pharmacy_search_product_new->BRCODE) == "") { ?>
		<th data-name="BRCODE" class="<?php echo $view_pharmacy_search_product_new->BRCODE->headerCellClass() ?>"><div id="elh_view_pharmacy_search_product_new_BRCODE" class="view_pharmacy_search_product_new_BRCODE"><div class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_new->BRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BRCODE" class="<?php echo $view_pharmacy_search_product_new->BRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_search_product_new->SortUrl($view_pharmacy_search_product_new->BRCODE) ?>',1);"><div id="elh_view_pharmacy_search_product_new_BRCODE" class="view_pharmacy_search_product_new_BRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_new->BRCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_search_product_new->BRCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_search_product_new->BRCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_search_product_new->HospID->Visible) { // HospID ?>
	<?php if ($view_pharmacy_search_product_new->sortUrl($view_pharmacy_search_product_new->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_pharmacy_search_product_new->HospID->headerCellClass() ?>"><div id="elh_view_pharmacy_search_product_new_HospID" class="view_pharmacy_search_product_new_HospID"><div class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_new->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_pharmacy_search_product_new->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_search_product_new->SortUrl($view_pharmacy_search_product_new->HospID) ?>',1);"><div id="elh_view_pharmacy_search_product_new_HospID" class="view_pharmacy_search_product_new_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_new->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_search_product_new->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_search_product_new->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_search_product_new->BILLDATE->Visible) { // BILLDATE ?>
	<?php if ($view_pharmacy_search_product_new->sortUrl($view_pharmacy_search_product_new->BILLDATE) == "") { ?>
		<th data-name="BILLDATE" class="<?php echo $view_pharmacy_search_product_new->BILLDATE->headerCellClass() ?>"><div id="elh_view_pharmacy_search_product_new_BILLDATE" class="view_pharmacy_search_product_new_BILLDATE"><div class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_new->BILLDATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BILLDATE" class="<?php echo $view_pharmacy_search_product_new->BILLDATE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_search_product_new->SortUrl($view_pharmacy_search_product_new->BILLDATE) ?>',1);"><div id="elh_view_pharmacy_search_product_new_BILLDATE" class="view_pharmacy_search_product_new_BILLDATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_new->BILLDATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_search_product_new->BILLDATE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_search_product_new->BILLDATE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_search_product_new->PrName->Visible) { // PrName ?>
	<?php if ($view_pharmacy_search_product_new->sortUrl($view_pharmacy_search_product_new->PrName) == "") { ?>
		<th data-name="PrName" class="<?php echo $view_pharmacy_search_product_new->PrName->headerCellClass() ?>"><div id="elh_view_pharmacy_search_product_new_PrName" class="view_pharmacy_search_product_new_PrName"><div class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_new->PrName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrName" class="<?php echo $view_pharmacy_search_product_new->PrName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_search_product_new->SortUrl($view_pharmacy_search_product_new->PrName) ?>',1);"><div id="elh_view_pharmacy_search_product_new_PrName" class="view_pharmacy_search_product_new_PrName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_new->PrName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_search_product_new->PrName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_search_product_new->PrName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_pharmacy_search_product_new_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_pharmacy_search_product_new->ExportAll && $view_pharmacy_search_product_new->isExport()) {
	$view_pharmacy_search_product_new_list->StopRec = $view_pharmacy_search_product_new_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_pharmacy_search_product_new_list->TotalRecs > $view_pharmacy_search_product_new_list->StartRec + $view_pharmacy_search_product_new_list->DisplayRecs - 1)
		$view_pharmacy_search_product_new_list->StopRec = $view_pharmacy_search_product_new_list->StartRec + $view_pharmacy_search_product_new_list->DisplayRecs - 1;
	else
		$view_pharmacy_search_product_new_list->StopRec = $view_pharmacy_search_product_new_list->TotalRecs;
}
$view_pharmacy_search_product_new_list->RecCnt = $view_pharmacy_search_product_new_list->StartRec - 1;
if ($view_pharmacy_search_product_new_list->Recordset && !$view_pharmacy_search_product_new_list->Recordset->EOF) {
	$view_pharmacy_search_product_new_list->Recordset->moveFirst();
	$selectLimit = $view_pharmacy_search_product_new_list->UseSelectLimit;
	if (!$selectLimit && $view_pharmacy_search_product_new_list->StartRec > 1)
		$view_pharmacy_search_product_new_list->Recordset->move($view_pharmacy_search_product_new_list->StartRec - 1);
} elseif (!$view_pharmacy_search_product_new->AllowAddDeleteRow && $view_pharmacy_search_product_new_list->StopRec == 0) {
	$view_pharmacy_search_product_new_list->StopRec = $view_pharmacy_search_product_new->GridAddRowCount;
}

// Initialize aggregate
$view_pharmacy_search_product_new->RowType = ROWTYPE_AGGREGATEINIT;
$view_pharmacy_search_product_new->resetAttributes();
$view_pharmacy_search_product_new_list->renderRow();
while ($view_pharmacy_search_product_new_list->RecCnt < $view_pharmacy_search_product_new_list->StopRec) {
	$view_pharmacy_search_product_new_list->RecCnt++;
	if ($view_pharmacy_search_product_new_list->RecCnt >= $view_pharmacy_search_product_new_list->StartRec) {
		$view_pharmacy_search_product_new_list->RowCnt++;

		// Set up key count
		$view_pharmacy_search_product_new_list->KeyCount = $view_pharmacy_search_product_new_list->RowIndex;

		// Init row class and style
		$view_pharmacy_search_product_new->resetAttributes();
		$view_pharmacy_search_product_new->CssClass = "";
		if ($view_pharmacy_search_product_new->isGridAdd()) {
		} else {
			$view_pharmacy_search_product_new_list->loadRowValues($view_pharmacy_search_product_new_list->Recordset); // Load row values
		}
		$view_pharmacy_search_product_new->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_pharmacy_search_product_new->RowAttrs = array_merge($view_pharmacy_search_product_new->RowAttrs, array('data-rowindex'=>$view_pharmacy_search_product_new_list->RowCnt, 'id'=>'r' . $view_pharmacy_search_product_new_list->RowCnt . '_view_pharmacy_search_product_new', 'data-rowtype'=>$view_pharmacy_search_product_new->RowType));

		// Render row
		$view_pharmacy_search_product_new_list->renderRow();

		// Render list options
		$view_pharmacy_search_product_new_list->renderListOptions();
?>
	<tr<?php echo $view_pharmacy_search_product_new->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_pharmacy_search_product_new_list->ListOptions->render("body", "left", $view_pharmacy_search_product_new_list->RowCnt);
?>
	<?php if ($view_pharmacy_search_product_new->id->Visible) { // id ?>
		<td data-name="id"<?php echo $view_pharmacy_search_product_new->id->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_search_product_new_list->RowCnt ?>_view_pharmacy_search_product_new_id" class="view_pharmacy_search_product_new_id">
<span<?php echo $view_pharmacy_search_product_new->id->viewAttributes() ?>>
<?php echo $view_pharmacy_search_product_new->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_search_product_new->DES->Visible) { // DES ?>
		<td data-name="DES"<?php echo $view_pharmacy_search_product_new->DES->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_search_product_new_list->RowCnt ?>_view_pharmacy_search_product_new_DES" class="view_pharmacy_search_product_new_DES">
<span<?php echo $view_pharmacy_search_product_new->DES->viewAttributes() ?>>
<?php echo $view_pharmacy_search_product_new->DES->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_search_product_new->BATCH->Visible) { // BATCH ?>
		<td data-name="BATCH"<?php echo $view_pharmacy_search_product_new->BATCH->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_search_product_new_list->RowCnt ?>_view_pharmacy_search_product_new_BATCH" class="view_pharmacy_search_product_new_BATCH">
<span<?php echo $view_pharmacy_search_product_new->BATCH->viewAttributes() ?>>
<?php echo $view_pharmacy_search_product_new->BATCH->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_search_product_new->PRC->Visible) { // PRC ?>
		<td data-name="PRC"<?php echo $view_pharmacy_search_product_new->PRC->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_search_product_new_list->RowCnt ?>_view_pharmacy_search_product_new_PRC" class="view_pharmacy_search_product_new_PRC">
<span<?php echo $view_pharmacy_search_product_new->PRC->viewAttributes() ?>>
<?php echo $view_pharmacy_search_product_new->PRC->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_search_product_new->OQ->Visible) { // OQ ?>
		<td data-name="OQ"<?php echo $view_pharmacy_search_product_new->OQ->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_search_product_new_list->RowCnt ?>_view_pharmacy_search_product_new_OQ" class="view_pharmacy_search_product_new_OQ">
<span<?php echo $view_pharmacy_search_product_new->OQ->viewAttributes() ?>>
<?php echo $view_pharmacy_search_product_new->OQ->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_search_product_new->Stock->Visible) { // Stock ?>
		<td data-name="Stock"<?php echo $view_pharmacy_search_product_new->Stock->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_search_product_new_list->RowCnt ?>_view_pharmacy_search_product_new_Stock" class="view_pharmacy_search_product_new_Stock">
<span<?php echo $view_pharmacy_search_product_new->Stock->viewAttributes() ?>>
<?php echo $view_pharmacy_search_product_new->Stock->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_search_product_new->EXPDT->Visible) { // EXPDT ?>
		<td data-name="EXPDT"<?php echo $view_pharmacy_search_product_new->EXPDT->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_search_product_new_list->RowCnt ?>_view_pharmacy_search_product_new_EXPDT" class="view_pharmacy_search_product_new_EXPDT">
<span<?php echo $view_pharmacy_search_product_new->EXPDT->viewAttributes() ?>>
<?php echo $view_pharmacy_search_product_new->EXPDT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_search_product_new->GENNAME->Visible) { // GENNAME ?>
		<td data-name="GENNAME"<?php echo $view_pharmacy_search_product_new->GENNAME->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_search_product_new_list->RowCnt ?>_view_pharmacy_search_product_new_GENNAME" class="view_pharmacy_search_product_new_GENNAME">
<span<?php echo $view_pharmacy_search_product_new->GENNAME->viewAttributes() ?>>
<?php echo $view_pharmacy_search_product_new->GENNAME->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_search_product_new->UNIT->Visible) { // UNIT ?>
		<td data-name="UNIT"<?php echo $view_pharmacy_search_product_new->UNIT->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_search_product_new_list->RowCnt ?>_view_pharmacy_search_product_new_UNIT" class="view_pharmacy_search_product_new_UNIT">
<span<?php echo $view_pharmacy_search_product_new->UNIT->viewAttributes() ?>>
<?php echo $view_pharmacy_search_product_new->UNIT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_search_product_new->RT->Visible) { // RT ?>
		<td data-name="RT"<?php echo $view_pharmacy_search_product_new->RT->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_search_product_new_list->RowCnt ?>_view_pharmacy_search_product_new_RT" class="view_pharmacy_search_product_new_RT">
<span<?php echo $view_pharmacy_search_product_new->RT->viewAttributes() ?>>
<?php echo $view_pharmacy_search_product_new->RT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_search_product_new->SSGST->Visible) { // SSGST ?>
		<td data-name="SSGST"<?php echo $view_pharmacy_search_product_new->SSGST->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_search_product_new_list->RowCnt ?>_view_pharmacy_search_product_new_SSGST" class="view_pharmacy_search_product_new_SSGST">
<span<?php echo $view_pharmacy_search_product_new->SSGST->viewAttributes() ?>>
<?php echo $view_pharmacy_search_product_new->SSGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_search_product_new->SCGST->Visible) { // SCGST ?>
		<td data-name="SCGST"<?php echo $view_pharmacy_search_product_new->SCGST->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_search_product_new_list->RowCnt ?>_view_pharmacy_search_product_new_SCGST" class="view_pharmacy_search_product_new_SCGST">
<span<?php echo $view_pharmacy_search_product_new->SCGST->viewAttributes() ?>>
<?php echo $view_pharmacy_search_product_new->SCGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_search_product_new->MFRCODE->Visible) { // MFRCODE ?>
		<td data-name="MFRCODE"<?php echo $view_pharmacy_search_product_new->MFRCODE->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_search_product_new_list->RowCnt ?>_view_pharmacy_search_product_new_MFRCODE" class="view_pharmacy_search_product_new_MFRCODE">
<span<?php echo $view_pharmacy_search_product_new->MFRCODE->viewAttributes() ?>>
<?php echo $view_pharmacy_search_product_new->MFRCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_search_product_new->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE"<?php echo $view_pharmacy_search_product_new->BRCODE->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_search_product_new_list->RowCnt ?>_view_pharmacy_search_product_new_BRCODE" class="view_pharmacy_search_product_new_BRCODE">
<span<?php echo $view_pharmacy_search_product_new->BRCODE->viewAttributes() ?>>
<?php echo $view_pharmacy_search_product_new->BRCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_search_product_new->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_pharmacy_search_product_new->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_search_product_new_list->RowCnt ?>_view_pharmacy_search_product_new_HospID" class="view_pharmacy_search_product_new_HospID">
<span<?php echo $view_pharmacy_search_product_new->HospID->viewAttributes() ?>>
<?php echo $view_pharmacy_search_product_new->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_search_product_new->BILLDATE->Visible) { // BILLDATE ?>
		<td data-name="BILLDATE"<?php echo $view_pharmacy_search_product_new->BILLDATE->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_search_product_new_list->RowCnt ?>_view_pharmacy_search_product_new_BILLDATE" class="view_pharmacy_search_product_new_BILLDATE">
<span<?php echo $view_pharmacy_search_product_new->BILLDATE->viewAttributes() ?>>
<?php echo $view_pharmacy_search_product_new->BILLDATE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_search_product_new->PrName->Visible) { // PrName ?>
		<td data-name="PrName"<?php echo $view_pharmacy_search_product_new->PrName->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_search_product_new_list->RowCnt ?>_view_pharmacy_search_product_new_PrName" class="view_pharmacy_search_product_new_PrName">
<span<?php echo $view_pharmacy_search_product_new->PrName->viewAttributes() ?>>
<?php echo $view_pharmacy_search_product_new->PrName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_pharmacy_search_product_new_list->ListOptions->render("body", "right", $view_pharmacy_search_product_new_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_pharmacy_search_product_new->isGridAdd())
		$view_pharmacy_search_product_new_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_pharmacy_search_product_new->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_pharmacy_search_product_new_list->Recordset)
	$view_pharmacy_search_product_new_list->Recordset->Close();
?>
<?php if (!$view_pharmacy_search_product_new->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_pharmacy_search_product_new->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_pharmacy_search_product_new_list->Pager)) $view_pharmacy_search_product_new_list->Pager = new NumericPager($view_pharmacy_search_product_new_list->StartRec, $view_pharmacy_search_product_new_list->DisplayRecs, $view_pharmacy_search_product_new_list->TotalRecs, $view_pharmacy_search_product_new_list->RecRange, $view_pharmacy_search_product_new_list->AutoHidePager) ?>
<?php if ($view_pharmacy_search_product_new_list->Pager->RecordCount > 0 && $view_pharmacy_search_product_new_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_pharmacy_search_product_new_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_search_product_new_list->pageUrl() ?>start=<?php echo $view_pharmacy_search_product_new_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_search_product_new_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_search_product_new_list->pageUrl() ?>start=<?php echo $view_pharmacy_search_product_new_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_pharmacy_search_product_new_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_pharmacy_search_product_new_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_search_product_new_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_search_product_new_list->pageUrl() ?>start=<?php echo $view_pharmacy_search_product_new_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_search_product_new_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_search_product_new_list->pageUrl() ?>start=<?php echo $view_pharmacy_search_product_new_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_pharmacy_search_product_new_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_pharmacy_search_product_new_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_pharmacy_search_product_new_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_pharmacy_search_product_new_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_pharmacy_search_product_new_list->TotalRecs > 0 && (!$view_pharmacy_search_product_new_list->AutoHidePageSizeSelector || $view_pharmacy_search_product_new_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_pharmacy_search_product_new">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_pharmacy_search_product_new_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_pharmacy_search_product_new_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_pharmacy_search_product_new_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_pharmacy_search_product_new_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_pharmacy_search_product_new_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_pharmacy_search_product_new_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_pharmacy_search_product_new->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_search_product_new_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_pharmacy_search_product_new_list->TotalRecs == 0 && !$view_pharmacy_search_product_new->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_search_product_new_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_pharmacy_search_product_new_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_pharmacy_search_product_new->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_pharmacy_search_product_new->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_pharmacy_search_product_new", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_pharmacy_search_product_new_list->terminate();
?>
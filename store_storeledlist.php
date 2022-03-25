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
$store_storeled_list = new store_storeled_list();

// Run the page
$store_storeled_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$store_storeled_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$store_storeled->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fstore_storeledlist = currentForm = new ew.Form("fstore_storeledlist", "list");
fstore_storeledlist.formKeyCountName = '<?php echo $store_storeled_list->FormKeyCountName ?>';

// Form_CustomValidate event
fstore_storeledlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fstore_storeledlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fstore_storeledlistsrch = currentSearchForm = new ew.Form("fstore_storeledlistsrch");

// Filters
fstore_storeledlistsrch.filterList = <?php echo $store_storeled_list->getFilterList() ?>;
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
<?php if (!$store_storeled->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($store_storeled_list->TotalRecs > 0 && $store_storeled_list->ExportOptions->visible()) { ?>
<?php $store_storeled_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($store_storeled_list->ImportOptions->visible()) { ?>
<?php $store_storeled_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($store_storeled_list->SearchOptions->visible()) { ?>
<?php $store_storeled_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($store_storeled_list->FilterOptions->visible()) { ?>
<?php $store_storeled_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$store_storeled_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$store_storeled->isExport() && !$store_storeled->CurrentAction) { ?>
<form name="fstore_storeledlistsrch" id="fstore_storeledlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($store_storeled_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fstore_storeledlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="store_storeled">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($store_storeled_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($store_storeled_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $store_storeled_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($store_storeled_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($store_storeled_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($store_storeled_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($store_storeled_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $store_storeled_list->showPageHeader(); ?>
<?php
$store_storeled_list->showMessage();
?>
<?php if ($store_storeled_list->TotalRecs > 0 || $store_storeled->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($store_storeled_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> store_storeled">
<?php if (!$store_storeled->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$store_storeled->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($store_storeled_list->Pager)) $store_storeled_list->Pager = new NumericPager($store_storeled_list->StartRec, $store_storeled_list->DisplayRecs, $store_storeled_list->TotalRecs, $store_storeled_list->RecRange, $store_storeled_list->AutoHidePager) ?>
<?php if ($store_storeled_list->Pager->RecordCount > 0 && $store_storeled_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($store_storeled_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $store_storeled_list->pageUrl() ?>start=<?php echo $store_storeled_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($store_storeled_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $store_storeled_list->pageUrl() ?>start=<?php echo $store_storeled_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($store_storeled_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $store_storeled_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($store_storeled_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $store_storeled_list->pageUrl() ?>start=<?php echo $store_storeled_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($store_storeled_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $store_storeled_list->pageUrl() ?>start=<?php echo $store_storeled_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($store_storeled_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $store_storeled_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $store_storeled_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $store_storeled_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($store_storeled_list->TotalRecs > 0 && (!$store_storeled_list->AutoHidePageSizeSelector || $store_storeled_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="store_storeled">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($store_storeled_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($store_storeled_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($store_storeled_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($store_storeled_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($store_storeled_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($store_storeled_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($store_storeled->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $store_storeled_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fstore_storeledlist" id="fstore_storeledlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($store_storeled_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $store_storeled_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="store_storeled">
<div id="gmp_store_storeled" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($store_storeled_list->TotalRecs > 0 || $store_storeled->isGridEdit()) { ?>
<table id="tbl_store_storeledlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$store_storeled_list->RowType = ROWTYPE_HEADER;

// Render list options
$store_storeled_list->renderListOptions();

// Render list options (header, left)
$store_storeled_list->ListOptions->render("header", "left");
?>
<?php if ($store_storeled->BRCODE->Visible) { // BRCODE ?>
	<?php if ($store_storeled->sortUrl($store_storeled->BRCODE) == "") { ?>
		<th data-name="BRCODE" class="<?php echo $store_storeled->BRCODE->headerCellClass() ?>"><div id="elh_store_storeled_BRCODE" class="store_storeled_BRCODE"><div class="ew-table-header-caption"><?php echo $store_storeled->BRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BRCODE" class="<?php echo $store_storeled->BRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->BRCODE) ?>',1);"><div id="elh_store_storeled_BRCODE" class="store_storeled_BRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->BRCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->BRCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->BRCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->TYPE->Visible) { // TYPE ?>
	<?php if ($store_storeled->sortUrl($store_storeled->TYPE) == "") { ?>
		<th data-name="TYPE" class="<?php echo $store_storeled->TYPE->headerCellClass() ?>"><div id="elh_store_storeled_TYPE" class="store_storeled_TYPE"><div class="ew-table-header-caption"><?php echo $store_storeled->TYPE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TYPE" class="<?php echo $store_storeled->TYPE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->TYPE) ?>',1);"><div id="elh_store_storeled_TYPE" class="store_storeled_TYPE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->TYPE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->TYPE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->TYPE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->DN->Visible) { // DN ?>
	<?php if ($store_storeled->sortUrl($store_storeled->DN) == "") { ?>
		<th data-name="DN" class="<?php echo $store_storeled->DN->headerCellClass() ?>"><div id="elh_store_storeled_DN" class="store_storeled_DN"><div class="ew-table-header-caption"><?php echo $store_storeled->DN->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DN" class="<?php echo $store_storeled->DN->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->DN) ?>',1);"><div id="elh_store_storeled_DN" class="store_storeled_DN">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->DN->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->DN->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->DN->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->RDN->Visible) { // RDN ?>
	<?php if ($store_storeled->sortUrl($store_storeled->RDN) == "") { ?>
		<th data-name="RDN" class="<?php echo $store_storeled->RDN->headerCellClass() ?>"><div id="elh_store_storeled_RDN" class="store_storeled_RDN"><div class="ew-table-header-caption"><?php echo $store_storeled->RDN->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RDN" class="<?php echo $store_storeled->RDN->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->RDN) ?>',1);"><div id="elh_store_storeled_RDN" class="store_storeled_RDN">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->RDN->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->RDN->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->RDN->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->DT->Visible) { // DT ?>
	<?php if ($store_storeled->sortUrl($store_storeled->DT) == "") { ?>
		<th data-name="DT" class="<?php echo $store_storeled->DT->headerCellClass() ?>"><div id="elh_store_storeled_DT" class="store_storeled_DT"><div class="ew-table-header-caption"><?php echo $store_storeled->DT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DT" class="<?php echo $store_storeled->DT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->DT) ?>',1);"><div id="elh_store_storeled_DT" class="store_storeled_DT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->DT->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->DT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->DT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->PRC->Visible) { // PRC ?>
	<?php if ($store_storeled->sortUrl($store_storeled->PRC) == "") { ?>
		<th data-name="PRC" class="<?php echo $store_storeled->PRC->headerCellClass() ?>"><div id="elh_store_storeled_PRC" class="store_storeled_PRC"><div class="ew-table-header-caption"><?php echo $store_storeled->PRC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRC" class="<?php echo $store_storeled->PRC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->PRC) ?>',1);"><div id="elh_store_storeled_PRC" class="store_storeled_PRC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->PRC->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->PRC->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->PRC->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->OQ->Visible) { // OQ ?>
	<?php if ($store_storeled->sortUrl($store_storeled->OQ) == "") { ?>
		<th data-name="OQ" class="<?php echo $store_storeled->OQ->headerCellClass() ?>"><div id="elh_store_storeled_OQ" class="store_storeled_OQ"><div class="ew-table-header-caption"><?php echo $store_storeled->OQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OQ" class="<?php echo $store_storeled->OQ->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->OQ) ?>',1);"><div id="elh_store_storeled_OQ" class="store_storeled_OQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->OQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->OQ->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->OQ->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->RQ->Visible) { // RQ ?>
	<?php if ($store_storeled->sortUrl($store_storeled->RQ) == "") { ?>
		<th data-name="RQ" class="<?php echo $store_storeled->RQ->headerCellClass() ?>"><div id="elh_store_storeled_RQ" class="store_storeled_RQ"><div class="ew-table-header-caption"><?php echo $store_storeled->RQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RQ" class="<?php echo $store_storeled->RQ->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->RQ) ?>',1);"><div id="elh_store_storeled_RQ" class="store_storeled_RQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->RQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->RQ->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->RQ->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->MRQ->Visible) { // MRQ ?>
	<?php if ($store_storeled->sortUrl($store_storeled->MRQ) == "") { ?>
		<th data-name="MRQ" class="<?php echo $store_storeled->MRQ->headerCellClass() ?>"><div id="elh_store_storeled_MRQ" class="store_storeled_MRQ"><div class="ew-table-header-caption"><?php echo $store_storeled->MRQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MRQ" class="<?php echo $store_storeled->MRQ->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->MRQ) ?>',1);"><div id="elh_store_storeled_MRQ" class="store_storeled_MRQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->MRQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->MRQ->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->MRQ->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->IQ->Visible) { // IQ ?>
	<?php if ($store_storeled->sortUrl($store_storeled->IQ) == "") { ?>
		<th data-name="IQ" class="<?php echo $store_storeled->IQ->headerCellClass() ?>"><div id="elh_store_storeled_IQ" class="store_storeled_IQ"><div class="ew-table-header-caption"><?php echo $store_storeled->IQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IQ" class="<?php echo $store_storeled->IQ->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->IQ) ?>',1);"><div id="elh_store_storeled_IQ" class="store_storeled_IQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->IQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->IQ->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->IQ->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->BATCHNO->Visible) { // BATCHNO ?>
	<?php if ($store_storeled->sortUrl($store_storeled->BATCHNO) == "") { ?>
		<th data-name="BATCHNO" class="<?php echo $store_storeled->BATCHNO->headerCellClass() ?>"><div id="elh_store_storeled_BATCHNO" class="store_storeled_BATCHNO"><div class="ew-table-header-caption"><?php echo $store_storeled->BATCHNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BATCHNO" class="<?php echo $store_storeled->BATCHNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->BATCHNO) ?>',1);"><div id="elh_store_storeled_BATCHNO" class="store_storeled_BATCHNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->BATCHNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->BATCHNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->BATCHNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->EXPDT->Visible) { // EXPDT ?>
	<?php if ($store_storeled->sortUrl($store_storeled->EXPDT) == "") { ?>
		<th data-name="EXPDT" class="<?php echo $store_storeled->EXPDT->headerCellClass() ?>"><div id="elh_store_storeled_EXPDT" class="store_storeled_EXPDT"><div class="ew-table-header-caption"><?php echo $store_storeled->EXPDT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EXPDT" class="<?php echo $store_storeled->EXPDT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->EXPDT) ?>',1);"><div id="elh_store_storeled_EXPDT" class="store_storeled_EXPDT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->EXPDT->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->EXPDT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->EXPDT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->BILLNO->Visible) { // BILLNO ?>
	<?php if ($store_storeled->sortUrl($store_storeled->BILLNO) == "") { ?>
		<th data-name="BILLNO" class="<?php echo $store_storeled->BILLNO->headerCellClass() ?>"><div id="elh_store_storeled_BILLNO" class="store_storeled_BILLNO"><div class="ew-table-header-caption"><?php echo $store_storeled->BILLNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BILLNO" class="<?php echo $store_storeled->BILLNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->BILLNO) ?>',1);"><div id="elh_store_storeled_BILLNO" class="store_storeled_BILLNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->BILLNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->BILLNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->BILLNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->BILLDT->Visible) { // BILLDT ?>
	<?php if ($store_storeled->sortUrl($store_storeled->BILLDT) == "") { ?>
		<th data-name="BILLDT" class="<?php echo $store_storeled->BILLDT->headerCellClass() ?>"><div id="elh_store_storeled_BILLDT" class="store_storeled_BILLDT"><div class="ew-table-header-caption"><?php echo $store_storeled->BILLDT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BILLDT" class="<?php echo $store_storeled->BILLDT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->BILLDT) ?>',1);"><div id="elh_store_storeled_BILLDT" class="store_storeled_BILLDT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->BILLDT->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->BILLDT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->BILLDT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->RT->Visible) { // RT ?>
	<?php if ($store_storeled->sortUrl($store_storeled->RT) == "") { ?>
		<th data-name="RT" class="<?php echo $store_storeled->RT->headerCellClass() ?>"><div id="elh_store_storeled_RT" class="store_storeled_RT"><div class="ew-table-header-caption"><?php echo $store_storeled->RT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RT" class="<?php echo $store_storeled->RT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->RT) ?>',1);"><div id="elh_store_storeled_RT" class="store_storeled_RT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->RT->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->RT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->RT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->VALUE->Visible) { // VALUE ?>
	<?php if ($store_storeled->sortUrl($store_storeled->VALUE) == "") { ?>
		<th data-name="VALUE" class="<?php echo $store_storeled->VALUE->headerCellClass() ?>"><div id="elh_store_storeled_VALUE" class="store_storeled_VALUE"><div class="ew-table-header-caption"><?php echo $store_storeled->VALUE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="VALUE" class="<?php echo $store_storeled->VALUE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->VALUE) ?>',1);"><div id="elh_store_storeled_VALUE" class="store_storeled_VALUE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->VALUE->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->VALUE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->VALUE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->DISC->Visible) { // DISC ?>
	<?php if ($store_storeled->sortUrl($store_storeled->DISC) == "") { ?>
		<th data-name="DISC" class="<?php echo $store_storeled->DISC->headerCellClass() ?>"><div id="elh_store_storeled_DISC" class="store_storeled_DISC"><div class="ew-table-header-caption"><?php echo $store_storeled->DISC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DISC" class="<?php echo $store_storeled->DISC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->DISC) ?>',1);"><div id="elh_store_storeled_DISC" class="store_storeled_DISC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->DISC->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->DISC->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->DISC->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->TAXP->Visible) { // TAXP ?>
	<?php if ($store_storeled->sortUrl($store_storeled->TAXP) == "") { ?>
		<th data-name="TAXP" class="<?php echo $store_storeled->TAXP->headerCellClass() ?>"><div id="elh_store_storeled_TAXP" class="store_storeled_TAXP"><div class="ew-table-header-caption"><?php echo $store_storeled->TAXP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TAXP" class="<?php echo $store_storeled->TAXP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->TAXP) ?>',1);"><div id="elh_store_storeled_TAXP" class="store_storeled_TAXP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->TAXP->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->TAXP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->TAXP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->TAX->Visible) { // TAX ?>
	<?php if ($store_storeled->sortUrl($store_storeled->TAX) == "") { ?>
		<th data-name="TAX" class="<?php echo $store_storeled->TAX->headerCellClass() ?>"><div id="elh_store_storeled_TAX" class="store_storeled_TAX"><div class="ew-table-header-caption"><?php echo $store_storeled->TAX->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TAX" class="<?php echo $store_storeled->TAX->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->TAX) ?>',1);"><div id="elh_store_storeled_TAX" class="store_storeled_TAX">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->TAX->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->TAX->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->TAX->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->TAXR->Visible) { // TAXR ?>
	<?php if ($store_storeled->sortUrl($store_storeled->TAXR) == "") { ?>
		<th data-name="TAXR" class="<?php echo $store_storeled->TAXR->headerCellClass() ?>"><div id="elh_store_storeled_TAXR" class="store_storeled_TAXR"><div class="ew-table-header-caption"><?php echo $store_storeled->TAXR->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TAXR" class="<?php echo $store_storeled->TAXR->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->TAXR) ?>',1);"><div id="elh_store_storeled_TAXR" class="store_storeled_TAXR">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->TAXR->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->TAXR->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->TAXR->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->DAMT->Visible) { // DAMT ?>
	<?php if ($store_storeled->sortUrl($store_storeled->DAMT) == "") { ?>
		<th data-name="DAMT" class="<?php echo $store_storeled->DAMT->headerCellClass() ?>"><div id="elh_store_storeled_DAMT" class="store_storeled_DAMT"><div class="ew-table-header-caption"><?php echo $store_storeled->DAMT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DAMT" class="<?php echo $store_storeled->DAMT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->DAMT) ?>',1);"><div id="elh_store_storeled_DAMT" class="store_storeled_DAMT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->DAMT->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->DAMT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->DAMT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->EMPNO->Visible) { // EMPNO ?>
	<?php if ($store_storeled->sortUrl($store_storeled->EMPNO) == "") { ?>
		<th data-name="EMPNO" class="<?php echo $store_storeled->EMPNO->headerCellClass() ?>"><div id="elh_store_storeled_EMPNO" class="store_storeled_EMPNO"><div class="ew-table-header-caption"><?php echo $store_storeled->EMPNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EMPNO" class="<?php echo $store_storeled->EMPNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->EMPNO) ?>',1);"><div id="elh_store_storeled_EMPNO" class="store_storeled_EMPNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->EMPNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->EMPNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->EMPNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->PC->Visible) { // PC ?>
	<?php if ($store_storeled->sortUrl($store_storeled->PC) == "") { ?>
		<th data-name="PC" class="<?php echo $store_storeled->PC->headerCellClass() ?>"><div id="elh_store_storeled_PC" class="store_storeled_PC"><div class="ew-table-header-caption"><?php echo $store_storeled->PC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PC" class="<?php echo $store_storeled->PC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->PC) ?>',1);"><div id="elh_store_storeled_PC" class="store_storeled_PC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->PC->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->PC->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->PC->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->DRNAME->Visible) { // DRNAME ?>
	<?php if ($store_storeled->sortUrl($store_storeled->DRNAME) == "") { ?>
		<th data-name="DRNAME" class="<?php echo $store_storeled->DRNAME->headerCellClass() ?>"><div id="elh_store_storeled_DRNAME" class="store_storeled_DRNAME"><div class="ew-table-header-caption"><?php echo $store_storeled->DRNAME->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DRNAME" class="<?php echo $store_storeled->DRNAME->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->DRNAME) ?>',1);"><div id="elh_store_storeled_DRNAME" class="store_storeled_DRNAME">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->DRNAME->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->DRNAME->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->DRNAME->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->BTIME->Visible) { // BTIME ?>
	<?php if ($store_storeled->sortUrl($store_storeled->BTIME) == "") { ?>
		<th data-name="BTIME" class="<?php echo $store_storeled->BTIME->headerCellClass() ?>"><div id="elh_store_storeled_BTIME" class="store_storeled_BTIME"><div class="ew-table-header-caption"><?php echo $store_storeled->BTIME->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BTIME" class="<?php echo $store_storeled->BTIME->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->BTIME) ?>',1);"><div id="elh_store_storeled_BTIME" class="store_storeled_BTIME">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->BTIME->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->BTIME->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->BTIME->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->ONO->Visible) { // ONO ?>
	<?php if ($store_storeled->sortUrl($store_storeled->ONO) == "") { ?>
		<th data-name="ONO" class="<?php echo $store_storeled->ONO->headerCellClass() ?>"><div id="elh_store_storeled_ONO" class="store_storeled_ONO"><div class="ew-table-header-caption"><?php echo $store_storeled->ONO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ONO" class="<?php echo $store_storeled->ONO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->ONO) ?>',1);"><div id="elh_store_storeled_ONO" class="store_storeled_ONO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->ONO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->ONO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->ONO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->ODT->Visible) { // ODT ?>
	<?php if ($store_storeled->sortUrl($store_storeled->ODT) == "") { ?>
		<th data-name="ODT" class="<?php echo $store_storeled->ODT->headerCellClass() ?>"><div id="elh_store_storeled_ODT" class="store_storeled_ODT"><div class="ew-table-header-caption"><?php echo $store_storeled->ODT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ODT" class="<?php echo $store_storeled->ODT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->ODT) ?>',1);"><div id="elh_store_storeled_ODT" class="store_storeled_ODT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->ODT->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->ODT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->ODT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->PURRT->Visible) { // PURRT ?>
	<?php if ($store_storeled->sortUrl($store_storeled->PURRT) == "") { ?>
		<th data-name="PURRT" class="<?php echo $store_storeled->PURRT->headerCellClass() ?>"><div id="elh_store_storeled_PURRT" class="store_storeled_PURRT"><div class="ew-table-header-caption"><?php echo $store_storeled->PURRT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PURRT" class="<?php echo $store_storeled->PURRT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->PURRT) ?>',1);"><div id="elh_store_storeled_PURRT" class="store_storeled_PURRT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->PURRT->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->PURRT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->PURRT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->GRP->Visible) { // GRP ?>
	<?php if ($store_storeled->sortUrl($store_storeled->GRP) == "") { ?>
		<th data-name="GRP" class="<?php echo $store_storeled->GRP->headerCellClass() ?>"><div id="elh_store_storeled_GRP" class="store_storeled_GRP"><div class="ew-table-header-caption"><?php echo $store_storeled->GRP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GRP" class="<?php echo $store_storeled->GRP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->GRP) ?>',1);"><div id="elh_store_storeled_GRP" class="store_storeled_GRP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->GRP->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->GRP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->GRP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->IBATCH->Visible) { // IBATCH ?>
	<?php if ($store_storeled->sortUrl($store_storeled->IBATCH) == "") { ?>
		<th data-name="IBATCH" class="<?php echo $store_storeled->IBATCH->headerCellClass() ?>"><div id="elh_store_storeled_IBATCH" class="store_storeled_IBATCH"><div class="ew-table-header-caption"><?php echo $store_storeled->IBATCH->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IBATCH" class="<?php echo $store_storeled->IBATCH->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->IBATCH) ?>',1);"><div id="elh_store_storeled_IBATCH" class="store_storeled_IBATCH">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->IBATCH->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->IBATCH->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->IBATCH->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->IPNO->Visible) { // IPNO ?>
	<?php if ($store_storeled->sortUrl($store_storeled->IPNO) == "") { ?>
		<th data-name="IPNO" class="<?php echo $store_storeled->IPNO->headerCellClass() ?>"><div id="elh_store_storeled_IPNO" class="store_storeled_IPNO"><div class="ew-table-header-caption"><?php echo $store_storeled->IPNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IPNO" class="<?php echo $store_storeled->IPNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->IPNO) ?>',1);"><div id="elh_store_storeled_IPNO" class="store_storeled_IPNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->IPNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->IPNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->IPNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->OPNO->Visible) { // OPNO ?>
	<?php if ($store_storeled->sortUrl($store_storeled->OPNO) == "") { ?>
		<th data-name="OPNO" class="<?php echo $store_storeled->OPNO->headerCellClass() ?>"><div id="elh_store_storeled_OPNO" class="store_storeled_OPNO"><div class="ew-table-header-caption"><?php echo $store_storeled->OPNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OPNO" class="<?php echo $store_storeled->OPNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->OPNO) ?>',1);"><div id="elh_store_storeled_OPNO" class="store_storeled_OPNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->OPNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->OPNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->OPNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->RECID->Visible) { // RECID ?>
	<?php if ($store_storeled->sortUrl($store_storeled->RECID) == "") { ?>
		<th data-name="RECID" class="<?php echo $store_storeled->RECID->headerCellClass() ?>"><div id="elh_store_storeled_RECID" class="store_storeled_RECID"><div class="ew-table-header-caption"><?php echo $store_storeled->RECID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RECID" class="<?php echo $store_storeled->RECID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->RECID) ?>',1);"><div id="elh_store_storeled_RECID" class="store_storeled_RECID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->RECID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->RECID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->RECID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->FQTY->Visible) { // FQTY ?>
	<?php if ($store_storeled->sortUrl($store_storeled->FQTY) == "") { ?>
		<th data-name="FQTY" class="<?php echo $store_storeled->FQTY->headerCellClass() ?>"><div id="elh_store_storeled_FQTY" class="store_storeled_FQTY"><div class="ew-table-header-caption"><?php echo $store_storeled->FQTY->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FQTY" class="<?php echo $store_storeled->FQTY->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->FQTY) ?>',1);"><div id="elh_store_storeled_FQTY" class="store_storeled_FQTY">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->FQTY->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->FQTY->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->FQTY->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->UR->Visible) { // UR ?>
	<?php if ($store_storeled->sortUrl($store_storeled->UR) == "") { ?>
		<th data-name="UR" class="<?php echo $store_storeled->UR->headerCellClass() ?>"><div id="elh_store_storeled_UR" class="store_storeled_UR"><div class="ew-table-header-caption"><?php echo $store_storeled->UR->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UR" class="<?php echo $store_storeled->UR->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->UR) ?>',1);"><div id="elh_store_storeled_UR" class="store_storeled_UR">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->UR->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->UR->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->UR->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->DCID->Visible) { // DCID ?>
	<?php if ($store_storeled->sortUrl($store_storeled->DCID) == "") { ?>
		<th data-name="DCID" class="<?php echo $store_storeled->DCID->headerCellClass() ?>"><div id="elh_store_storeled_DCID" class="store_storeled_DCID"><div class="ew-table-header-caption"><?php echo $store_storeled->DCID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DCID" class="<?php echo $store_storeled->DCID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->DCID) ?>',1);"><div id="elh_store_storeled_DCID" class="store_storeled_DCID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->DCID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->DCID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->DCID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->_USERID->Visible) { // USERID ?>
	<?php if ($store_storeled->sortUrl($store_storeled->_USERID) == "") { ?>
		<th data-name="_USERID" class="<?php echo $store_storeled->_USERID->headerCellClass() ?>"><div id="elh_store_storeled__USERID" class="store_storeled__USERID"><div class="ew-table-header-caption"><?php echo $store_storeled->_USERID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_USERID" class="<?php echo $store_storeled->_USERID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->_USERID) ?>',1);"><div id="elh_store_storeled__USERID" class="store_storeled__USERID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->_USERID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->_USERID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->_USERID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->MODDT->Visible) { // MODDT ?>
	<?php if ($store_storeled->sortUrl($store_storeled->MODDT) == "") { ?>
		<th data-name="MODDT" class="<?php echo $store_storeled->MODDT->headerCellClass() ?>"><div id="elh_store_storeled_MODDT" class="store_storeled_MODDT"><div class="ew-table-header-caption"><?php echo $store_storeled->MODDT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MODDT" class="<?php echo $store_storeled->MODDT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->MODDT) ?>',1);"><div id="elh_store_storeled_MODDT" class="store_storeled_MODDT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->MODDT->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->MODDT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->MODDT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->FYM->Visible) { // FYM ?>
	<?php if ($store_storeled->sortUrl($store_storeled->FYM) == "") { ?>
		<th data-name="FYM" class="<?php echo $store_storeled->FYM->headerCellClass() ?>"><div id="elh_store_storeled_FYM" class="store_storeled_FYM"><div class="ew-table-header-caption"><?php echo $store_storeled->FYM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FYM" class="<?php echo $store_storeled->FYM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->FYM) ?>',1);"><div id="elh_store_storeled_FYM" class="store_storeled_FYM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->FYM->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->FYM->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->FYM->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->PRCBATCH->Visible) { // PRCBATCH ?>
	<?php if ($store_storeled->sortUrl($store_storeled->PRCBATCH) == "") { ?>
		<th data-name="PRCBATCH" class="<?php echo $store_storeled->PRCBATCH->headerCellClass() ?>"><div id="elh_store_storeled_PRCBATCH" class="store_storeled_PRCBATCH"><div class="ew-table-header-caption"><?php echo $store_storeled->PRCBATCH->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRCBATCH" class="<?php echo $store_storeled->PRCBATCH->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->PRCBATCH) ?>',1);"><div id="elh_store_storeled_PRCBATCH" class="store_storeled_PRCBATCH">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->PRCBATCH->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->PRCBATCH->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->PRCBATCH->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->SLNO->Visible) { // SLNO ?>
	<?php if ($store_storeled->sortUrl($store_storeled->SLNO) == "") { ?>
		<th data-name="SLNO" class="<?php echo $store_storeled->SLNO->headerCellClass() ?>"><div id="elh_store_storeled_SLNO" class="store_storeled_SLNO"><div class="ew-table-header-caption"><?php echo $store_storeled->SLNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SLNO" class="<?php echo $store_storeled->SLNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->SLNO) ?>',1);"><div id="elh_store_storeled_SLNO" class="store_storeled_SLNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->SLNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->SLNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->SLNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->MRP->Visible) { // MRP ?>
	<?php if ($store_storeled->sortUrl($store_storeled->MRP) == "") { ?>
		<th data-name="MRP" class="<?php echo $store_storeled->MRP->headerCellClass() ?>"><div id="elh_store_storeled_MRP" class="store_storeled_MRP"><div class="ew-table-header-caption"><?php echo $store_storeled->MRP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MRP" class="<?php echo $store_storeled->MRP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->MRP) ?>',1);"><div id="elh_store_storeled_MRP" class="store_storeled_MRP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->MRP->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->MRP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->MRP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->BILLYM->Visible) { // BILLYM ?>
	<?php if ($store_storeled->sortUrl($store_storeled->BILLYM) == "") { ?>
		<th data-name="BILLYM" class="<?php echo $store_storeled->BILLYM->headerCellClass() ?>"><div id="elh_store_storeled_BILLYM" class="store_storeled_BILLYM"><div class="ew-table-header-caption"><?php echo $store_storeled->BILLYM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BILLYM" class="<?php echo $store_storeled->BILLYM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->BILLYM) ?>',1);"><div id="elh_store_storeled_BILLYM" class="store_storeled_BILLYM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->BILLYM->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->BILLYM->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->BILLYM->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->BILLGRP->Visible) { // BILLGRP ?>
	<?php if ($store_storeled->sortUrl($store_storeled->BILLGRP) == "") { ?>
		<th data-name="BILLGRP" class="<?php echo $store_storeled->BILLGRP->headerCellClass() ?>"><div id="elh_store_storeled_BILLGRP" class="store_storeled_BILLGRP"><div class="ew-table-header-caption"><?php echo $store_storeled->BILLGRP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BILLGRP" class="<?php echo $store_storeled->BILLGRP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->BILLGRP) ?>',1);"><div id="elh_store_storeled_BILLGRP" class="store_storeled_BILLGRP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->BILLGRP->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->BILLGRP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->BILLGRP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->STAFF->Visible) { // STAFF ?>
	<?php if ($store_storeled->sortUrl($store_storeled->STAFF) == "") { ?>
		<th data-name="STAFF" class="<?php echo $store_storeled->STAFF->headerCellClass() ?>"><div id="elh_store_storeled_STAFF" class="store_storeled_STAFF"><div class="ew-table-header-caption"><?php echo $store_storeled->STAFF->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="STAFF" class="<?php echo $store_storeled->STAFF->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->STAFF) ?>',1);"><div id="elh_store_storeled_STAFF" class="store_storeled_STAFF">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->STAFF->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->STAFF->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->STAFF->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->TEMPIPNO->Visible) { // TEMPIPNO ?>
	<?php if ($store_storeled->sortUrl($store_storeled->TEMPIPNO) == "") { ?>
		<th data-name="TEMPIPNO" class="<?php echo $store_storeled->TEMPIPNO->headerCellClass() ?>"><div id="elh_store_storeled_TEMPIPNO" class="store_storeled_TEMPIPNO"><div class="ew-table-header-caption"><?php echo $store_storeled->TEMPIPNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TEMPIPNO" class="<?php echo $store_storeled->TEMPIPNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->TEMPIPNO) ?>',1);"><div id="elh_store_storeled_TEMPIPNO" class="store_storeled_TEMPIPNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->TEMPIPNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->TEMPIPNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->TEMPIPNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->PRNTED->Visible) { // PRNTED ?>
	<?php if ($store_storeled->sortUrl($store_storeled->PRNTED) == "") { ?>
		<th data-name="PRNTED" class="<?php echo $store_storeled->PRNTED->headerCellClass() ?>"><div id="elh_store_storeled_PRNTED" class="store_storeled_PRNTED"><div class="ew-table-header-caption"><?php echo $store_storeled->PRNTED->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRNTED" class="<?php echo $store_storeled->PRNTED->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->PRNTED) ?>',1);"><div id="elh_store_storeled_PRNTED" class="store_storeled_PRNTED">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->PRNTED->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->PRNTED->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->PRNTED->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->PATNAME->Visible) { // PATNAME ?>
	<?php if ($store_storeled->sortUrl($store_storeled->PATNAME) == "") { ?>
		<th data-name="PATNAME" class="<?php echo $store_storeled->PATNAME->headerCellClass() ?>"><div id="elh_store_storeled_PATNAME" class="store_storeled_PATNAME"><div class="ew-table-header-caption"><?php echo $store_storeled->PATNAME->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PATNAME" class="<?php echo $store_storeled->PATNAME->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->PATNAME) ?>',1);"><div id="elh_store_storeled_PATNAME" class="store_storeled_PATNAME">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->PATNAME->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->PATNAME->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->PATNAME->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->PJVNO->Visible) { // PJVNO ?>
	<?php if ($store_storeled->sortUrl($store_storeled->PJVNO) == "") { ?>
		<th data-name="PJVNO" class="<?php echo $store_storeled->PJVNO->headerCellClass() ?>"><div id="elh_store_storeled_PJVNO" class="store_storeled_PJVNO"><div class="ew-table-header-caption"><?php echo $store_storeled->PJVNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PJVNO" class="<?php echo $store_storeled->PJVNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->PJVNO) ?>',1);"><div id="elh_store_storeled_PJVNO" class="store_storeled_PJVNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->PJVNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->PJVNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->PJVNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->PJVSLNO->Visible) { // PJVSLNO ?>
	<?php if ($store_storeled->sortUrl($store_storeled->PJVSLNO) == "") { ?>
		<th data-name="PJVSLNO" class="<?php echo $store_storeled->PJVSLNO->headerCellClass() ?>"><div id="elh_store_storeled_PJVSLNO" class="store_storeled_PJVSLNO"><div class="ew-table-header-caption"><?php echo $store_storeled->PJVSLNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PJVSLNO" class="<?php echo $store_storeled->PJVSLNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->PJVSLNO) ?>',1);"><div id="elh_store_storeled_PJVSLNO" class="store_storeled_PJVSLNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->PJVSLNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->PJVSLNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->PJVSLNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->OTHDISC->Visible) { // OTHDISC ?>
	<?php if ($store_storeled->sortUrl($store_storeled->OTHDISC) == "") { ?>
		<th data-name="OTHDISC" class="<?php echo $store_storeled->OTHDISC->headerCellClass() ?>"><div id="elh_store_storeled_OTHDISC" class="store_storeled_OTHDISC"><div class="ew-table-header-caption"><?php echo $store_storeled->OTHDISC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OTHDISC" class="<?php echo $store_storeled->OTHDISC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->OTHDISC) ?>',1);"><div id="elh_store_storeled_OTHDISC" class="store_storeled_OTHDISC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->OTHDISC->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->OTHDISC->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->OTHDISC->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->PJVYM->Visible) { // PJVYM ?>
	<?php if ($store_storeled->sortUrl($store_storeled->PJVYM) == "") { ?>
		<th data-name="PJVYM" class="<?php echo $store_storeled->PJVYM->headerCellClass() ?>"><div id="elh_store_storeled_PJVYM" class="store_storeled_PJVYM"><div class="ew-table-header-caption"><?php echo $store_storeled->PJVYM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PJVYM" class="<?php echo $store_storeled->PJVYM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->PJVYM) ?>',1);"><div id="elh_store_storeled_PJVYM" class="store_storeled_PJVYM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->PJVYM->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->PJVYM->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->PJVYM->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->PURDISCPER->Visible) { // PURDISCPER ?>
	<?php if ($store_storeled->sortUrl($store_storeled->PURDISCPER) == "") { ?>
		<th data-name="PURDISCPER" class="<?php echo $store_storeled->PURDISCPER->headerCellClass() ?>"><div id="elh_store_storeled_PURDISCPER" class="store_storeled_PURDISCPER"><div class="ew-table-header-caption"><?php echo $store_storeled->PURDISCPER->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PURDISCPER" class="<?php echo $store_storeled->PURDISCPER->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->PURDISCPER) ?>',1);"><div id="elh_store_storeled_PURDISCPER" class="store_storeled_PURDISCPER">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->PURDISCPER->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->PURDISCPER->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->PURDISCPER->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->CASHIER->Visible) { // CASHIER ?>
	<?php if ($store_storeled->sortUrl($store_storeled->CASHIER) == "") { ?>
		<th data-name="CASHIER" class="<?php echo $store_storeled->CASHIER->headerCellClass() ?>"><div id="elh_store_storeled_CASHIER" class="store_storeled_CASHIER"><div class="ew-table-header-caption"><?php echo $store_storeled->CASHIER->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CASHIER" class="<?php echo $store_storeled->CASHIER->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->CASHIER) ?>',1);"><div id="elh_store_storeled_CASHIER" class="store_storeled_CASHIER">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->CASHIER->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->CASHIER->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->CASHIER->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->CASHTIME->Visible) { // CASHTIME ?>
	<?php if ($store_storeled->sortUrl($store_storeled->CASHTIME) == "") { ?>
		<th data-name="CASHTIME" class="<?php echo $store_storeled->CASHTIME->headerCellClass() ?>"><div id="elh_store_storeled_CASHTIME" class="store_storeled_CASHTIME"><div class="ew-table-header-caption"><?php echo $store_storeled->CASHTIME->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CASHTIME" class="<?php echo $store_storeled->CASHTIME->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->CASHTIME) ?>',1);"><div id="elh_store_storeled_CASHTIME" class="store_storeled_CASHTIME">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->CASHTIME->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->CASHTIME->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->CASHTIME->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->CASHRECD->Visible) { // CASHRECD ?>
	<?php if ($store_storeled->sortUrl($store_storeled->CASHRECD) == "") { ?>
		<th data-name="CASHRECD" class="<?php echo $store_storeled->CASHRECD->headerCellClass() ?>"><div id="elh_store_storeled_CASHRECD" class="store_storeled_CASHRECD"><div class="ew-table-header-caption"><?php echo $store_storeled->CASHRECD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CASHRECD" class="<?php echo $store_storeled->CASHRECD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->CASHRECD) ?>',1);"><div id="elh_store_storeled_CASHRECD" class="store_storeled_CASHRECD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->CASHRECD->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->CASHRECD->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->CASHRECD->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->CASHREFNO->Visible) { // CASHREFNO ?>
	<?php if ($store_storeled->sortUrl($store_storeled->CASHREFNO) == "") { ?>
		<th data-name="CASHREFNO" class="<?php echo $store_storeled->CASHREFNO->headerCellClass() ?>"><div id="elh_store_storeled_CASHREFNO" class="store_storeled_CASHREFNO"><div class="ew-table-header-caption"><?php echo $store_storeled->CASHREFNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CASHREFNO" class="<?php echo $store_storeled->CASHREFNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->CASHREFNO) ?>',1);"><div id="elh_store_storeled_CASHREFNO" class="store_storeled_CASHREFNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->CASHREFNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->CASHREFNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->CASHREFNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->CASHIERSHIFT->Visible) { // CASHIERSHIFT ?>
	<?php if ($store_storeled->sortUrl($store_storeled->CASHIERSHIFT) == "") { ?>
		<th data-name="CASHIERSHIFT" class="<?php echo $store_storeled->CASHIERSHIFT->headerCellClass() ?>"><div id="elh_store_storeled_CASHIERSHIFT" class="store_storeled_CASHIERSHIFT"><div class="ew-table-header-caption"><?php echo $store_storeled->CASHIERSHIFT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CASHIERSHIFT" class="<?php echo $store_storeled->CASHIERSHIFT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->CASHIERSHIFT) ?>',1);"><div id="elh_store_storeled_CASHIERSHIFT" class="store_storeled_CASHIERSHIFT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->CASHIERSHIFT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->CASHIERSHIFT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->CASHIERSHIFT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->PRCODE->Visible) { // PRCODE ?>
	<?php if ($store_storeled->sortUrl($store_storeled->PRCODE) == "") { ?>
		<th data-name="PRCODE" class="<?php echo $store_storeled->PRCODE->headerCellClass() ?>"><div id="elh_store_storeled_PRCODE" class="store_storeled_PRCODE"><div class="ew-table-header-caption"><?php echo $store_storeled->PRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRCODE" class="<?php echo $store_storeled->PRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->PRCODE) ?>',1);"><div id="elh_store_storeled_PRCODE" class="store_storeled_PRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->PRCODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->PRCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->PRCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->RELEASEBY->Visible) { // RELEASEBY ?>
	<?php if ($store_storeled->sortUrl($store_storeled->RELEASEBY) == "") { ?>
		<th data-name="RELEASEBY" class="<?php echo $store_storeled->RELEASEBY->headerCellClass() ?>"><div id="elh_store_storeled_RELEASEBY" class="store_storeled_RELEASEBY"><div class="ew-table-header-caption"><?php echo $store_storeled->RELEASEBY->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RELEASEBY" class="<?php echo $store_storeled->RELEASEBY->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->RELEASEBY) ?>',1);"><div id="elh_store_storeled_RELEASEBY" class="store_storeled_RELEASEBY">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->RELEASEBY->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->RELEASEBY->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->RELEASEBY->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->CRAUTHOR->Visible) { // CRAUTHOR ?>
	<?php if ($store_storeled->sortUrl($store_storeled->CRAUTHOR) == "") { ?>
		<th data-name="CRAUTHOR" class="<?php echo $store_storeled->CRAUTHOR->headerCellClass() ?>"><div id="elh_store_storeled_CRAUTHOR" class="store_storeled_CRAUTHOR"><div class="ew-table-header-caption"><?php echo $store_storeled->CRAUTHOR->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CRAUTHOR" class="<?php echo $store_storeled->CRAUTHOR->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->CRAUTHOR) ?>',1);"><div id="elh_store_storeled_CRAUTHOR" class="store_storeled_CRAUTHOR">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->CRAUTHOR->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->CRAUTHOR->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->CRAUTHOR->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->PAYMENT->Visible) { // PAYMENT ?>
	<?php if ($store_storeled->sortUrl($store_storeled->PAYMENT) == "") { ?>
		<th data-name="PAYMENT" class="<?php echo $store_storeled->PAYMENT->headerCellClass() ?>"><div id="elh_store_storeled_PAYMENT" class="store_storeled_PAYMENT"><div class="ew-table-header-caption"><?php echo $store_storeled->PAYMENT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PAYMENT" class="<?php echo $store_storeled->PAYMENT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->PAYMENT) ?>',1);"><div id="elh_store_storeled_PAYMENT" class="store_storeled_PAYMENT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->PAYMENT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->PAYMENT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->PAYMENT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->DRID->Visible) { // DRID ?>
	<?php if ($store_storeled->sortUrl($store_storeled->DRID) == "") { ?>
		<th data-name="DRID" class="<?php echo $store_storeled->DRID->headerCellClass() ?>"><div id="elh_store_storeled_DRID" class="store_storeled_DRID"><div class="ew-table-header-caption"><?php echo $store_storeled->DRID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DRID" class="<?php echo $store_storeled->DRID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->DRID) ?>',1);"><div id="elh_store_storeled_DRID" class="store_storeled_DRID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->DRID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->DRID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->DRID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->WARD->Visible) { // WARD ?>
	<?php if ($store_storeled->sortUrl($store_storeled->WARD) == "") { ?>
		<th data-name="WARD" class="<?php echo $store_storeled->WARD->headerCellClass() ?>"><div id="elh_store_storeled_WARD" class="store_storeled_WARD"><div class="ew-table-header-caption"><?php echo $store_storeled->WARD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="WARD" class="<?php echo $store_storeled->WARD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->WARD) ?>',1);"><div id="elh_store_storeled_WARD" class="store_storeled_WARD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->WARD->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->WARD->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->WARD->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->STAXTYPE->Visible) { // STAXTYPE ?>
	<?php if ($store_storeled->sortUrl($store_storeled->STAXTYPE) == "") { ?>
		<th data-name="STAXTYPE" class="<?php echo $store_storeled->STAXTYPE->headerCellClass() ?>"><div id="elh_store_storeled_STAXTYPE" class="store_storeled_STAXTYPE"><div class="ew-table-header-caption"><?php echo $store_storeled->STAXTYPE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="STAXTYPE" class="<?php echo $store_storeled->STAXTYPE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->STAXTYPE) ?>',1);"><div id="elh_store_storeled_STAXTYPE" class="store_storeled_STAXTYPE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->STAXTYPE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->STAXTYPE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->STAXTYPE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->PURDISCVAL->Visible) { // PURDISCVAL ?>
	<?php if ($store_storeled->sortUrl($store_storeled->PURDISCVAL) == "") { ?>
		<th data-name="PURDISCVAL" class="<?php echo $store_storeled->PURDISCVAL->headerCellClass() ?>"><div id="elh_store_storeled_PURDISCVAL" class="store_storeled_PURDISCVAL"><div class="ew-table-header-caption"><?php echo $store_storeled->PURDISCVAL->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PURDISCVAL" class="<?php echo $store_storeled->PURDISCVAL->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->PURDISCVAL) ?>',1);"><div id="elh_store_storeled_PURDISCVAL" class="store_storeled_PURDISCVAL">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->PURDISCVAL->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->PURDISCVAL->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->PURDISCVAL->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->RNDOFF->Visible) { // RNDOFF ?>
	<?php if ($store_storeled->sortUrl($store_storeled->RNDOFF) == "") { ?>
		<th data-name="RNDOFF" class="<?php echo $store_storeled->RNDOFF->headerCellClass() ?>"><div id="elh_store_storeled_RNDOFF" class="store_storeled_RNDOFF"><div class="ew-table-header-caption"><?php echo $store_storeled->RNDOFF->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RNDOFF" class="<?php echo $store_storeled->RNDOFF->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->RNDOFF) ?>',1);"><div id="elh_store_storeled_RNDOFF" class="store_storeled_RNDOFF">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->RNDOFF->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->RNDOFF->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->RNDOFF->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->DISCONMRP->Visible) { // DISCONMRP ?>
	<?php if ($store_storeled->sortUrl($store_storeled->DISCONMRP) == "") { ?>
		<th data-name="DISCONMRP" class="<?php echo $store_storeled->DISCONMRP->headerCellClass() ?>"><div id="elh_store_storeled_DISCONMRP" class="store_storeled_DISCONMRP"><div class="ew-table-header-caption"><?php echo $store_storeled->DISCONMRP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DISCONMRP" class="<?php echo $store_storeled->DISCONMRP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->DISCONMRP) ?>',1);"><div id="elh_store_storeled_DISCONMRP" class="store_storeled_DISCONMRP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->DISCONMRP->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->DISCONMRP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->DISCONMRP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->DELVDT->Visible) { // DELVDT ?>
	<?php if ($store_storeled->sortUrl($store_storeled->DELVDT) == "") { ?>
		<th data-name="DELVDT" class="<?php echo $store_storeled->DELVDT->headerCellClass() ?>"><div id="elh_store_storeled_DELVDT" class="store_storeled_DELVDT"><div class="ew-table-header-caption"><?php echo $store_storeled->DELVDT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DELVDT" class="<?php echo $store_storeled->DELVDT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->DELVDT) ?>',1);"><div id="elh_store_storeled_DELVDT" class="store_storeled_DELVDT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->DELVDT->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->DELVDT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->DELVDT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->DELVTIME->Visible) { // DELVTIME ?>
	<?php if ($store_storeled->sortUrl($store_storeled->DELVTIME) == "") { ?>
		<th data-name="DELVTIME" class="<?php echo $store_storeled->DELVTIME->headerCellClass() ?>"><div id="elh_store_storeled_DELVTIME" class="store_storeled_DELVTIME"><div class="ew-table-header-caption"><?php echo $store_storeled->DELVTIME->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DELVTIME" class="<?php echo $store_storeled->DELVTIME->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->DELVTIME) ?>',1);"><div id="elh_store_storeled_DELVTIME" class="store_storeled_DELVTIME">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->DELVTIME->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->DELVTIME->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->DELVTIME->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->DELVBY->Visible) { // DELVBY ?>
	<?php if ($store_storeled->sortUrl($store_storeled->DELVBY) == "") { ?>
		<th data-name="DELVBY" class="<?php echo $store_storeled->DELVBY->headerCellClass() ?>"><div id="elh_store_storeled_DELVBY" class="store_storeled_DELVBY"><div class="ew-table-header-caption"><?php echo $store_storeled->DELVBY->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DELVBY" class="<?php echo $store_storeled->DELVBY->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->DELVBY) ?>',1);"><div id="elh_store_storeled_DELVBY" class="store_storeled_DELVBY">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->DELVBY->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->DELVBY->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->DELVBY->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->HOSPNO->Visible) { // HOSPNO ?>
	<?php if ($store_storeled->sortUrl($store_storeled->HOSPNO) == "") { ?>
		<th data-name="HOSPNO" class="<?php echo $store_storeled->HOSPNO->headerCellClass() ?>"><div id="elh_store_storeled_HOSPNO" class="store_storeled_HOSPNO"><div class="ew-table-header-caption"><?php echo $store_storeled->HOSPNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HOSPNO" class="<?php echo $store_storeled->HOSPNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->HOSPNO) ?>',1);"><div id="elh_store_storeled_HOSPNO" class="store_storeled_HOSPNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->HOSPNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->HOSPNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->HOSPNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->id->Visible) { // id ?>
	<?php if ($store_storeled->sortUrl($store_storeled->id) == "") { ?>
		<th data-name="id" class="<?php echo $store_storeled->id->headerCellClass() ?>"><div id="elh_store_storeled_id" class="store_storeled_id"><div class="ew-table-header-caption"><?php echo $store_storeled->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $store_storeled->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->id) ?>',1);"><div id="elh_store_storeled_id" class="store_storeled_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->pbv->Visible) { // pbv ?>
	<?php if ($store_storeled->sortUrl($store_storeled->pbv) == "") { ?>
		<th data-name="pbv" class="<?php echo $store_storeled->pbv->headerCellClass() ?>"><div id="elh_store_storeled_pbv" class="store_storeled_pbv"><div class="ew-table-header-caption"><?php echo $store_storeled->pbv->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pbv" class="<?php echo $store_storeled->pbv->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->pbv) ?>',1);"><div id="elh_store_storeled_pbv" class="store_storeled_pbv">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->pbv->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->pbv->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->pbv->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->pbt->Visible) { // pbt ?>
	<?php if ($store_storeled->sortUrl($store_storeled->pbt) == "") { ?>
		<th data-name="pbt" class="<?php echo $store_storeled->pbt->headerCellClass() ?>"><div id="elh_store_storeled_pbt" class="store_storeled_pbt"><div class="ew-table-header-caption"><?php echo $store_storeled->pbt->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pbt" class="<?php echo $store_storeled->pbt->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->pbt) ?>',1);"><div id="elh_store_storeled_pbt" class="store_storeled_pbt">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->pbt->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->pbt->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->pbt->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->SiNo->Visible) { // SiNo ?>
	<?php if ($store_storeled->sortUrl($store_storeled->SiNo) == "") { ?>
		<th data-name="SiNo" class="<?php echo $store_storeled->SiNo->headerCellClass() ?>"><div id="elh_store_storeled_SiNo" class="store_storeled_SiNo"><div class="ew-table-header-caption"><?php echo $store_storeled->SiNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SiNo" class="<?php echo $store_storeled->SiNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->SiNo) ?>',1);"><div id="elh_store_storeled_SiNo" class="store_storeled_SiNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->SiNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->SiNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->SiNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->Product->Visible) { // Product ?>
	<?php if ($store_storeled->sortUrl($store_storeled->Product) == "") { ?>
		<th data-name="Product" class="<?php echo $store_storeled->Product->headerCellClass() ?>"><div id="elh_store_storeled_Product" class="store_storeled_Product"><div class="ew-table-header-caption"><?php echo $store_storeled->Product->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Product" class="<?php echo $store_storeled->Product->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->Product) ?>',1);"><div id="elh_store_storeled_Product" class="store_storeled_Product">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->Product->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->Product->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->Product->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->Mfg->Visible) { // Mfg ?>
	<?php if ($store_storeled->sortUrl($store_storeled->Mfg) == "") { ?>
		<th data-name="Mfg" class="<?php echo $store_storeled->Mfg->headerCellClass() ?>"><div id="elh_store_storeled_Mfg" class="store_storeled_Mfg"><div class="ew-table-header-caption"><?php echo $store_storeled->Mfg->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mfg" class="<?php echo $store_storeled->Mfg->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->Mfg) ?>',1);"><div id="elh_store_storeled_Mfg" class="store_storeled_Mfg">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->Mfg->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->Mfg->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->Mfg->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->HosoID->Visible) { // HosoID ?>
	<?php if ($store_storeled->sortUrl($store_storeled->HosoID) == "") { ?>
		<th data-name="HosoID" class="<?php echo $store_storeled->HosoID->headerCellClass() ?>"><div id="elh_store_storeled_HosoID" class="store_storeled_HosoID"><div class="ew-table-header-caption"><?php echo $store_storeled->HosoID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HosoID" class="<?php echo $store_storeled->HosoID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->HosoID) ?>',1);"><div id="elh_store_storeled_HosoID" class="store_storeled_HosoID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->HosoID->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->HosoID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->HosoID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->createdby->Visible) { // createdby ?>
	<?php if ($store_storeled->sortUrl($store_storeled->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $store_storeled->createdby->headerCellClass() ?>"><div id="elh_store_storeled_createdby" class="store_storeled_createdby"><div class="ew-table-header-caption"><?php echo $store_storeled->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $store_storeled->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->createdby) ?>',1);"><div id="elh_store_storeled_createdby" class="store_storeled_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->createdby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->createddatetime->Visible) { // createddatetime ?>
	<?php if ($store_storeled->sortUrl($store_storeled->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $store_storeled->createddatetime->headerCellClass() ?>"><div id="elh_store_storeled_createddatetime" class="store_storeled_createddatetime"><div class="ew-table-header-caption"><?php echo $store_storeled->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $store_storeled->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->createddatetime) ?>',1);"><div id="elh_store_storeled_createddatetime" class="store_storeled_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->modifiedby->Visible) { // modifiedby ?>
	<?php if ($store_storeled->sortUrl($store_storeled->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $store_storeled->modifiedby->headerCellClass() ?>"><div id="elh_store_storeled_modifiedby" class="store_storeled_modifiedby"><div class="ew-table-header-caption"><?php echo $store_storeled->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $store_storeled->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->modifiedby) ?>',1);"><div id="elh_store_storeled_modifiedby" class="store_storeled_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->modifiedby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($store_storeled->sortUrl($store_storeled->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $store_storeled->modifieddatetime->headerCellClass() ?>"><div id="elh_store_storeled_modifieddatetime" class="store_storeled_modifieddatetime"><div class="ew-table-header-caption"><?php echo $store_storeled->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $store_storeled->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->modifieddatetime) ?>',1);"><div id="elh_store_storeled_modifieddatetime" class="store_storeled_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->MFRCODE->Visible) { // MFRCODE ?>
	<?php if ($store_storeled->sortUrl($store_storeled->MFRCODE) == "") { ?>
		<th data-name="MFRCODE" class="<?php echo $store_storeled->MFRCODE->headerCellClass() ?>"><div id="elh_store_storeled_MFRCODE" class="store_storeled_MFRCODE"><div class="ew-table-header-caption"><?php echo $store_storeled->MFRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MFRCODE" class="<?php echo $store_storeled->MFRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->MFRCODE) ?>',1);"><div id="elh_store_storeled_MFRCODE" class="store_storeled_MFRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->MFRCODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->MFRCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->MFRCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->Reception->Visible) { // Reception ?>
	<?php if ($store_storeled->sortUrl($store_storeled->Reception) == "") { ?>
		<th data-name="Reception" class="<?php echo $store_storeled->Reception->headerCellClass() ?>"><div id="elh_store_storeled_Reception" class="store_storeled_Reception"><div class="ew-table-header-caption"><?php echo $store_storeled->Reception->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Reception" class="<?php echo $store_storeled->Reception->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->Reception) ?>',1);"><div id="elh_store_storeled_Reception" class="store_storeled_Reception">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->Reception->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->Reception->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->Reception->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->PatID->Visible) { // PatID ?>
	<?php if ($store_storeled->sortUrl($store_storeled->PatID) == "") { ?>
		<th data-name="PatID" class="<?php echo $store_storeled->PatID->headerCellClass() ?>"><div id="elh_store_storeled_PatID" class="store_storeled_PatID"><div class="ew-table-header-caption"><?php echo $store_storeled->PatID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatID" class="<?php echo $store_storeled->PatID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->PatID) ?>',1);"><div id="elh_store_storeled_PatID" class="store_storeled_PatID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->PatID->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->PatID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->PatID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->mrnno->Visible) { // mrnno ?>
	<?php if ($store_storeled->sortUrl($store_storeled->mrnno) == "") { ?>
		<th data-name="mrnno" class="<?php echo $store_storeled->mrnno->headerCellClass() ?>"><div id="elh_store_storeled_mrnno" class="store_storeled_mrnno"><div class="ew-table-header-caption"><?php echo $store_storeled->mrnno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnno" class="<?php echo $store_storeled->mrnno->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->mrnno) ?>',1);"><div id="elh_store_storeled_mrnno" class="store_storeled_mrnno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->mrnno->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->mrnno->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->mrnno->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->BRNAME->Visible) { // BRNAME ?>
	<?php if ($store_storeled->sortUrl($store_storeled->BRNAME) == "") { ?>
		<th data-name="BRNAME" class="<?php echo $store_storeled->BRNAME->headerCellClass() ?>"><div id="elh_store_storeled_BRNAME" class="store_storeled_BRNAME"><div class="ew-table-header-caption"><?php echo $store_storeled->BRNAME->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BRNAME" class="<?php echo $store_storeled->BRNAME->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->BRNAME) ?>',1);"><div id="elh_store_storeled_BRNAME" class="store_storeled_BRNAME">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->BRNAME->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->BRNAME->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->BRNAME->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storeled->StoreID->Visible) { // StoreID ?>
	<?php if ($store_storeled->sortUrl($store_storeled->StoreID) == "") { ?>
		<th data-name="StoreID" class="<?php echo $store_storeled->StoreID->headerCellClass() ?>"><div id="elh_store_storeled_StoreID" class="store_storeled_StoreID"><div class="ew-table-header-caption"><?php echo $store_storeled->StoreID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StoreID" class="<?php echo $store_storeled->StoreID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storeled->SortUrl($store_storeled->StoreID) ?>',1);"><div id="elh_store_storeled_StoreID" class="store_storeled_StoreID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storeled->StoreID->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storeled->StoreID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storeled->StoreID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$store_storeled_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($store_storeled->ExportAll && $store_storeled->isExport()) {
	$store_storeled_list->StopRec = $store_storeled_list->TotalRecs;
} else {

	// Set the last record to display
	if ($store_storeled_list->TotalRecs > $store_storeled_list->StartRec + $store_storeled_list->DisplayRecs - 1)
		$store_storeled_list->StopRec = $store_storeled_list->StartRec + $store_storeled_list->DisplayRecs - 1;
	else
		$store_storeled_list->StopRec = $store_storeled_list->TotalRecs;
}
$store_storeled_list->RecCnt = $store_storeled_list->StartRec - 1;
if ($store_storeled_list->Recordset && !$store_storeled_list->Recordset->EOF) {
	$store_storeled_list->Recordset->moveFirst();
	$selectLimit = $store_storeled_list->UseSelectLimit;
	if (!$selectLimit && $store_storeled_list->StartRec > 1)
		$store_storeled_list->Recordset->move($store_storeled_list->StartRec - 1);
} elseif (!$store_storeled->AllowAddDeleteRow && $store_storeled_list->StopRec == 0) {
	$store_storeled_list->StopRec = $store_storeled->GridAddRowCount;
}

// Initialize aggregate
$store_storeled->RowType = ROWTYPE_AGGREGATEINIT;
$store_storeled->resetAttributes();
$store_storeled_list->renderRow();
while ($store_storeled_list->RecCnt < $store_storeled_list->StopRec) {
	$store_storeled_list->RecCnt++;
	if ($store_storeled_list->RecCnt >= $store_storeled_list->StartRec) {
		$store_storeled_list->RowCnt++;

		// Set up key count
		$store_storeled_list->KeyCount = $store_storeled_list->RowIndex;

		// Init row class and style
		$store_storeled->resetAttributes();
		$store_storeled->CssClass = "";
		if ($store_storeled->isGridAdd()) {
		} else {
			$store_storeled_list->loadRowValues($store_storeled_list->Recordset); // Load row values
		}
		$store_storeled->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$store_storeled->RowAttrs = array_merge($store_storeled->RowAttrs, array('data-rowindex'=>$store_storeled_list->RowCnt, 'id'=>'r' . $store_storeled_list->RowCnt . '_store_storeled', 'data-rowtype'=>$store_storeled->RowType));

		// Render row
		$store_storeled_list->renderRow();

		// Render list options
		$store_storeled_list->renderListOptions();
?>
	<tr<?php echo $store_storeled->rowAttributes() ?>>
<?php

// Render list options (body, left)
$store_storeled_list->ListOptions->render("body", "left", $store_storeled_list->RowCnt);
?>
	<?php if ($store_storeled->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE"<?php echo $store_storeled->BRCODE->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_BRCODE" class="store_storeled_BRCODE">
<span<?php echo $store_storeled->BRCODE->viewAttributes() ?>>
<?php echo $store_storeled->BRCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->TYPE->Visible) { // TYPE ?>
		<td data-name="TYPE"<?php echo $store_storeled->TYPE->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_TYPE" class="store_storeled_TYPE">
<span<?php echo $store_storeled->TYPE->viewAttributes() ?>>
<?php echo $store_storeled->TYPE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->DN->Visible) { // DN ?>
		<td data-name="DN"<?php echo $store_storeled->DN->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_DN" class="store_storeled_DN">
<span<?php echo $store_storeled->DN->viewAttributes() ?>>
<?php echo $store_storeled->DN->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->RDN->Visible) { // RDN ?>
		<td data-name="RDN"<?php echo $store_storeled->RDN->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_RDN" class="store_storeled_RDN">
<span<?php echo $store_storeled->RDN->viewAttributes() ?>>
<?php echo $store_storeled->RDN->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->DT->Visible) { // DT ?>
		<td data-name="DT"<?php echo $store_storeled->DT->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_DT" class="store_storeled_DT">
<span<?php echo $store_storeled->DT->viewAttributes() ?>>
<?php echo $store_storeled->DT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->PRC->Visible) { // PRC ?>
		<td data-name="PRC"<?php echo $store_storeled->PRC->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_PRC" class="store_storeled_PRC">
<span<?php echo $store_storeled->PRC->viewAttributes() ?>>
<?php echo $store_storeled->PRC->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->OQ->Visible) { // OQ ?>
		<td data-name="OQ"<?php echo $store_storeled->OQ->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_OQ" class="store_storeled_OQ">
<span<?php echo $store_storeled->OQ->viewAttributes() ?>>
<?php echo $store_storeled->OQ->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->RQ->Visible) { // RQ ?>
		<td data-name="RQ"<?php echo $store_storeled->RQ->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_RQ" class="store_storeled_RQ">
<span<?php echo $store_storeled->RQ->viewAttributes() ?>>
<?php echo $store_storeled->RQ->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->MRQ->Visible) { // MRQ ?>
		<td data-name="MRQ"<?php echo $store_storeled->MRQ->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_MRQ" class="store_storeled_MRQ">
<span<?php echo $store_storeled->MRQ->viewAttributes() ?>>
<?php echo $store_storeled->MRQ->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->IQ->Visible) { // IQ ?>
		<td data-name="IQ"<?php echo $store_storeled->IQ->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_IQ" class="store_storeled_IQ">
<span<?php echo $store_storeled->IQ->viewAttributes() ?>>
<?php echo $store_storeled->IQ->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->BATCHNO->Visible) { // BATCHNO ?>
		<td data-name="BATCHNO"<?php echo $store_storeled->BATCHNO->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_BATCHNO" class="store_storeled_BATCHNO">
<span<?php echo $store_storeled->BATCHNO->viewAttributes() ?>>
<?php echo $store_storeled->BATCHNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->EXPDT->Visible) { // EXPDT ?>
		<td data-name="EXPDT"<?php echo $store_storeled->EXPDT->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_EXPDT" class="store_storeled_EXPDT">
<span<?php echo $store_storeled->EXPDT->viewAttributes() ?>>
<?php echo $store_storeled->EXPDT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->BILLNO->Visible) { // BILLNO ?>
		<td data-name="BILLNO"<?php echo $store_storeled->BILLNO->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_BILLNO" class="store_storeled_BILLNO">
<span<?php echo $store_storeled->BILLNO->viewAttributes() ?>>
<?php echo $store_storeled->BILLNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->BILLDT->Visible) { // BILLDT ?>
		<td data-name="BILLDT"<?php echo $store_storeled->BILLDT->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_BILLDT" class="store_storeled_BILLDT">
<span<?php echo $store_storeled->BILLDT->viewAttributes() ?>>
<?php echo $store_storeled->BILLDT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->RT->Visible) { // RT ?>
		<td data-name="RT"<?php echo $store_storeled->RT->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_RT" class="store_storeled_RT">
<span<?php echo $store_storeled->RT->viewAttributes() ?>>
<?php echo $store_storeled->RT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->VALUE->Visible) { // VALUE ?>
		<td data-name="VALUE"<?php echo $store_storeled->VALUE->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_VALUE" class="store_storeled_VALUE">
<span<?php echo $store_storeled->VALUE->viewAttributes() ?>>
<?php echo $store_storeled->VALUE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->DISC->Visible) { // DISC ?>
		<td data-name="DISC"<?php echo $store_storeled->DISC->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_DISC" class="store_storeled_DISC">
<span<?php echo $store_storeled->DISC->viewAttributes() ?>>
<?php echo $store_storeled->DISC->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->TAXP->Visible) { // TAXP ?>
		<td data-name="TAXP"<?php echo $store_storeled->TAXP->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_TAXP" class="store_storeled_TAXP">
<span<?php echo $store_storeled->TAXP->viewAttributes() ?>>
<?php echo $store_storeled->TAXP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->TAX->Visible) { // TAX ?>
		<td data-name="TAX"<?php echo $store_storeled->TAX->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_TAX" class="store_storeled_TAX">
<span<?php echo $store_storeled->TAX->viewAttributes() ?>>
<?php echo $store_storeled->TAX->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->TAXR->Visible) { // TAXR ?>
		<td data-name="TAXR"<?php echo $store_storeled->TAXR->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_TAXR" class="store_storeled_TAXR">
<span<?php echo $store_storeled->TAXR->viewAttributes() ?>>
<?php echo $store_storeled->TAXR->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->DAMT->Visible) { // DAMT ?>
		<td data-name="DAMT"<?php echo $store_storeled->DAMT->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_DAMT" class="store_storeled_DAMT">
<span<?php echo $store_storeled->DAMT->viewAttributes() ?>>
<?php echo $store_storeled->DAMT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->EMPNO->Visible) { // EMPNO ?>
		<td data-name="EMPNO"<?php echo $store_storeled->EMPNO->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_EMPNO" class="store_storeled_EMPNO">
<span<?php echo $store_storeled->EMPNO->viewAttributes() ?>>
<?php echo $store_storeled->EMPNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->PC->Visible) { // PC ?>
		<td data-name="PC"<?php echo $store_storeled->PC->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_PC" class="store_storeled_PC">
<span<?php echo $store_storeled->PC->viewAttributes() ?>>
<?php echo $store_storeled->PC->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->DRNAME->Visible) { // DRNAME ?>
		<td data-name="DRNAME"<?php echo $store_storeled->DRNAME->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_DRNAME" class="store_storeled_DRNAME">
<span<?php echo $store_storeled->DRNAME->viewAttributes() ?>>
<?php echo $store_storeled->DRNAME->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->BTIME->Visible) { // BTIME ?>
		<td data-name="BTIME"<?php echo $store_storeled->BTIME->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_BTIME" class="store_storeled_BTIME">
<span<?php echo $store_storeled->BTIME->viewAttributes() ?>>
<?php echo $store_storeled->BTIME->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->ONO->Visible) { // ONO ?>
		<td data-name="ONO"<?php echo $store_storeled->ONO->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_ONO" class="store_storeled_ONO">
<span<?php echo $store_storeled->ONO->viewAttributes() ?>>
<?php echo $store_storeled->ONO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->ODT->Visible) { // ODT ?>
		<td data-name="ODT"<?php echo $store_storeled->ODT->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_ODT" class="store_storeled_ODT">
<span<?php echo $store_storeled->ODT->viewAttributes() ?>>
<?php echo $store_storeled->ODT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->PURRT->Visible) { // PURRT ?>
		<td data-name="PURRT"<?php echo $store_storeled->PURRT->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_PURRT" class="store_storeled_PURRT">
<span<?php echo $store_storeled->PURRT->viewAttributes() ?>>
<?php echo $store_storeled->PURRT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->GRP->Visible) { // GRP ?>
		<td data-name="GRP"<?php echo $store_storeled->GRP->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_GRP" class="store_storeled_GRP">
<span<?php echo $store_storeled->GRP->viewAttributes() ?>>
<?php echo $store_storeled->GRP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->IBATCH->Visible) { // IBATCH ?>
		<td data-name="IBATCH"<?php echo $store_storeled->IBATCH->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_IBATCH" class="store_storeled_IBATCH">
<span<?php echo $store_storeled->IBATCH->viewAttributes() ?>>
<?php echo $store_storeled->IBATCH->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->IPNO->Visible) { // IPNO ?>
		<td data-name="IPNO"<?php echo $store_storeled->IPNO->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_IPNO" class="store_storeled_IPNO">
<span<?php echo $store_storeled->IPNO->viewAttributes() ?>>
<?php echo $store_storeled->IPNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->OPNO->Visible) { // OPNO ?>
		<td data-name="OPNO"<?php echo $store_storeled->OPNO->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_OPNO" class="store_storeled_OPNO">
<span<?php echo $store_storeled->OPNO->viewAttributes() ?>>
<?php echo $store_storeled->OPNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->RECID->Visible) { // RECID ?>
		<td data-name="RECID"<?php echo $store_storeled->RECID->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_RECID" class="store_storeled_RECID">
<span<?php echo $store_storeled->RECID->viewAttributes() ?>>
<?php echo $store_storeled->RECID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->FQTY->Visible) { // FQTY ?>
		<td data-name="FQTY"<?php echo $store_storeled->FQTY->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_FQTY" class="store_storeled_FQTY">
<span<?php echo $store_storeled->FQTY->viewAttributes() ?>>
<?php echo $store_storeled->FQTY->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->UR->Visible) { // UR ?>
		<td data-name="UR"<?php echo $store_storeled->UR->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_UR" class="store_storeled_UR">
<span<?php echo $store_storeled->UR->viewAttributes() ?>>
<?php echo $store_storeled->UR->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->DCID->Visible) { // DCID ?>
		<td data-name="DCID"<?php echo $store_storeled->DCID->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_DCID" class="store_storeled_DCID">
<span<?php echo $store_storeled->DCID->viewAttributes() ?>>
<?php echo $store_storeled->DCID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->_USERID->Visible) { // USERID ?>
		<td data-name="_USERID"<?php echo $store_storeled->_USERID->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled__USERID" class="store_storeled__USERID">
<span<?php echo $store_storeled->_USERID->viewAttributes() ?>>
<?php echo $store_storeled->_USERID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->MODDT->Visible) { // MODDT ?>
		<td data-name="MODDT"<?php echo $store_storeled->MODDT->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_MODDT" class="store_storeled_MODDT">
<span<?php echo $store_storeled->MODDT->viewAttributes() ?>>
<?php echo $store_storeled->MODDT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->FYM->Visible) { // FYM ?>
		<td data-name="FYM"<?php echo $store_storeled->FYM->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_FYM" class="store_storeled_FYM">
<span<?php echo $store_storeled->FYM->viewAttributes() ?>>
<?php echo $store_storeled->FYM->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->PRCBATCH->Visible) { // PRCBATCH ?>
		<td data-name="PRCBATCH"<?php echo $store_storeled->PRCBATCH->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_PRCBATCH" class="store_storeled_PRCBATCH">
<span<?php echo $store_storeled->PRCBATCH->viewAttributes() ?>>
<?php echo $store_storeled->PRCBATCH->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->SLNO->Visible) { // SLNO ?>
		<td data-name="SLNO"<?php echo $store_storeled->SLNO->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_SLNO" class="store_storeled_SLNO">
<span<?php echo $store_storeled->SLNO->viewAttributes() ?>>
<?php echo $store_storeled->SLNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->MRP->Visible) { // MRP ?>
		<td data-name="MRP"<?php echo $store_storeled->MRP->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_MRP" class="store_storeled_MRP">
<span<?php echo $store_storeled->MRP->viewAttributes() ?>>
<?php echo $store_storeled->MRP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->BILLYM->Visible) { // BILLYM ?>
		<td data-name="BILLYM"<?php echo $store_storeled->BILLYM->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_BILLYM" class="store_storeled_BILLYM">
<span<?php echo $store_storeled->BILLYM->viewAttributes() ?>>
<?php echo $store_storeled->BILLYM->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->BILLGRP->Visible) { // BILLGRP ?>
		<td data-name="BILLGRP"<?php echo $store_storeled->BILLGRP->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_BILLGRP" class="store_storeled_BILLGRP">
<span<?php echo $store_storeled->BILLGRP->viewAttributes() ?>>
<?php echo $store_storeled->BILLGRP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->STAFF->Visible) { // STAFF ?>
		<td data-name="STAFF"<?php echo $store_storeled->STAFF->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_STAFF" class="store_storeled_STAFF">
<span<?php echo $store_storeled->STAFF->viewAttributes() ?>>
<?php echo $store_storeled->STAFF->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->TEMPIPNO->Visible) { // TEMPIPNO ?>
		<td data-name="TEMPIPNO"<?php echo $store_storeled->TEMPIPNO->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_TEMPIPNO" class="store_storeled_TEMPIPNO">
<span<?php echo $store_storeled->TEMPIPNO->viewAttributes() ?>>
<?php echo $store_storeled->TEMPIPNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->PRNTED->Visible) { // PRNTED ?>
		<td data-name="PRNTED"<?php echo $store_storeled->PRNTED->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_PRNTED" class="store_storeled_PRNTED">
<span<?php echo $store_storeled->PRNTED->viewAttributes() ?>>
<?php echo $store_storeled->PRNTED->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->PATNAME->Visible) { // PATNAME ?>
		<td data-name="PATNAME"<?php echo $store_storeled->PATNAME->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_PATNAME" class="store_storeled_PATNAME">
<span<?php echo $store_storeled->PATNAME->viewAttributes() ?>>
<?php echo $store_storeled->PATNAME->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->PJVNO->Visible) { // PJVNO ?>
		<td data-name="PJVNO"<?php echo $store_storeled->PJVNO->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_PJVNO" class="store_storeled_PJVNO">
<span<?php echo $store_storeled->PJVNO->viewAttributes() ?>>
<?php echo $store_storeled->PJVNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->PJVSLNO->Visible) { // PJVSLNO ?>
		<td data-name="PJVSLNO"<?php echo $store_storeled->PJVSLNO->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_PJVSLNO" class="store_storeled_PJVSLNO">
<span<?php echo $store_storeled->PJVSLNO->viewAttributes() ?>>
<?php echo $store_storeled->PJVSLNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->OTHDISC->Visible) { // OTHDISC ?>
		<td data-name="OTHDISC"<?php echo $store_storeled->OTHDISC->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_OTHDISC" class="store_storeled_OTHDISC">
<span<?php echo $store_storeled->OTHDISC->viewAttributes() ?>>
<?php echo $store_storeled->OTHDISC->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->PJVYM->Visible) { // PJVYM ?>
		<td data-name="PJVYM"<?php echo $store_storeled->PJVYM->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_PJVYM" class="store_storeled_PJVYM">
<span<?php echo $store_storeled->PJVYM->viewAttributes() ?>>
<?php echo $store_storeled->PJVYM->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->PURDISCPER->Visible) { // PURDISCPER ?>
		<td data-name="PURDISCPER"<?php echo $store_storeled->PURDISCPER->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_PURDISCPER" class="store_storeled_PURDISCPER">
<span<?php echo $store_storeled->PURDISCPER->viewAttributes() ?>>
<?php echo $store_storeled->PURDISCPER->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->CASHIER->Visible) { // CASHIER ?>
		<td data-name="CASHIER"<?php echo $store_storeled->CASHIER->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_CASHIER" class="store_storeled_CASHIER">
<span<?php echo $store_storeled->CASHIER->viewAttributes() ?>>
<?php echo $store_storeled->CASHIER->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->CASHTIME->Visible) { // CASHTIME ?>
		<td data-name="CASHTIME"<?php echo $store_storeled->CASHTIME->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_CASHTIME" class="store_storeled_CASHTIME">
<span<?php echo $store_storeled->CASHTIME->viewAttributes() ?>>
<?php echo $store_storeled->CASHTIME->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->CASHRECD->Visible) { // CASHRECD ?>
		<td data-name="CASHRECD"<?php echo $store_storeled->CASHRECD->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_CASHRECD" class="store_storeled_CASHRECD">
<span<?php echo $store_storeled->CASHRECD->viewAttributes() ?>>
<?php echo $store_storeled->CASHRECD->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->CASHREFNO->Visible) { // CASHREFNO ?>
		<td data-name="CASHREFNO"<?php echo $store_storeled->CASHREFNO->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_CASHREFNO" class="store_storeled_CASHREFNO">
<span<?php echo $store_storeled->CASHREFNO->viewAttributes() ?>>
<?php echo $store_storeled->CASHREFNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->CASHIERSHIFT->Visible) { // CASHIERSHIFT ?>
		<td data-name="CASHIERSHIFT"<?php echo $store_storeled->CASHIERSHIFT->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_CASHIERSHIFT" class="store_storeled_CASHIERSHIFT">
<span<?php echo $store_storeled->CASHIERSHIFT->viewAttributes() ?>>
<?php echo $store_storeled->CASHIERSHIFT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->PRCODE->Visible) { // PRCODE ?>
		<td data-name="PRCODE"<?php echo $store_storeled->PRCODE->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_PRCODE" class="store_storeled_PRCODE">
<span<?php echo $store_storeled->PRCODE->viewAttributes() ?>>
<?php echo $store_storeled->PRCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->RELEASEBY->Visible) { // RELEASEBY ?>
		<td data-name="RELEASEBY"<?php echo $store_storeled->RELEASEBY->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_RELEASEBY" class="store_storeled_RELEASEBY">
<span<?php echo $store_storeled->RELEASEBY->viewAttributes() ?>>
<?php echo $store_storeled->RELEASEBY->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->CRAUTHOR->Visible) { // CRAUTHOR ?>
		<td data-name="CRAUTHOR"<?php echo $store_storeled->CRAUTHOR->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_CRAUTHOR" class="store_storeled_CRAUTHOR">
<span<?php echo $store_storeled->CRAUTHOR->viewAttributes() ?>>
<?php echo $store_storeled->CRAUTHOR->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->PAYMENT->Visible) { // PAYMENT ?>
		<td data-name="PAYMENT"<?php echo $store_storeled->PAYMENT->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_PAYMENT" class="store_storeled_PAYMENT">
<span<?php echo $store_storeled->PAYMENT->viewAttributes() ?>>
<?php echo $store_storeled->PAYMENT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->DRID->Visible) { // DRID ?>
		<td data-name="DRID"<?php echo $store_storeled->DRID->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_DRID" class="store_storeled_DRID">
<span<?php echo $store_storeled->DRID->viewAttributes() ?>>
<?php echo $store_storeled->DRID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->WARD->Visible) { // WARD ?>
		<td data-name="WARD"<?php echo $store_storeled->WARD->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_WARD" class="store_storeled_WARD">
<span<?php echo $store_storeled->WARD->viewAttributes() ?>>
<?php echo $store_storeled->WARD->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->STAXTYPE->Visible) { // STAXTYPE ?>
		<td data-name="STAXTYPE"<?php echo $store_storeled->STAXTYPE->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_STAXTYPE" class="store_storeled_STAXTYPE">
<span<?php echo $store_storeled->STAXTYPE->viewAttributes() ?>>
<?php echo $store_storeled->STAXTYPE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->PURDISCVAL->Visible) { // PURDISCVAL ?>
		<td data-name="PURDISCVAL"<?php echo $store_storeled->PURDISCVAL->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_PURDISCVAL" class="store_storeled_PURDISCVAL">
<span<?php echo $store_storeled->PURDISCVAL->viewAttributes() ?>>
<?php echo $store_storeled->PURDISCVAL->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->RNDOFF->Visible) { // RNDOFF ?>
		<td data-name="RNDOFF"<?php echo $store_storeled->RNDOFF->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_RNDOFF" class="store_storeled_RNDOFF">
<span<?php echo $store_storeled->RNDOFF->viewAttributes() ?>>
<?php echo $store_storeled->RNDOFF->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->DISCONMRP->Visible) { // DISCONMRP ?>
		<td data-name="DISCONMRP"<?php echo $store_storeled->DISCONMRP->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_DISCONMRP" class="store_storeled_DISCONMRP">
<span<?php echo $store_storeled->DISCONMRP->viewAttributes() ?>>
<?php echo $store_storeled->DISCONMRP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->DELVDT->Visible) { // DELVDT ?>
		<td data-name="DELVDT"<?php echo $store_storeled->DELVDT->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_DELVDT" class="store_storeled_DELVDT">
<span<?php echo $store_storeled->DELVDT->viewAttributes() ?>>
<?php echo $store_storeled->DELVDT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->DELVTIME->Visible) { // DELVTIME ?>
		<td data-name="DELVTIME"<?php echo $store_storeled->DELVTIME->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_DELVTIME" class="store_storeled_DELVTIME">
<span<?php echo $store_storeled->DELVTIME->viewAttributes() ?>>
<?php echo $store_storeled->DELVTIME->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->DELVBY->Visible) { // DELVBY ?>
		<td data-name="DELVBY"<?php echo $store_storeled->DELVBY->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_DELVBY" class="store_storeled_DELVBY">
<span<?php echo $store_storeled->DELVBY->viewAttributes() ?>>
<?php echo $store_storeled->DELVBY->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->HOSPNO->Visible) { // HOSPNO ?>
		<td data-name="HOSPNO"<?php echo $store_storeled->HOSPNO->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_HOSPNO" class="store_storeled_HOSPNO">
<span<?php echo $store_storeled->HOSPNO->viewAttributes() ?>>
<?php echo $store_storeled->HOSPNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->id->Visible) { // id ?>
		<td data-name="id"<?php echo $store_storeled->id->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_id" class="store_storeled_id">
<span<?php echo $store_storeled->id->viewAttributes() ?>>
<?php echo $store_storeled->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->pbv->Visible) { // pbv ?>
		<td data-name="pbv"<?php echo $store_storeled->pbv->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_pbv" class="store_storeled_pbv">
<span<?php echo $store_storeled->pbv->viewAttributes() ?>>
<?php echo $store_storeled->pbv->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->pbt->Visible) { // pbt ?>
		<td data-name="pbt"<?php echo $store_storeled->pbt->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_pbt" class="store_storeled_pbt">
<span<?php echo $store_storeled->pbt->viewAttributes() ?>>
<?php echo $store_storeled->pbt->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->SiNo->Visible) { // SiNo ?>
		<td data-name="SiNo"<?php echo $store_storeled->SiNo->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_SiNo" class="store_storeled_SiNo">
<span<?php echo $store_storeled->SiNo->viewAttributes() ?>>
<?php echo $store_storeled->SiNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->Product->Visible) { // Product ?>
		<td data-name="Product"<?php echo $store_storeled->Product->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_Product" class="store_storeled_Product">
<span<?php echo $store_storeled->Product->viewAttributes() ?>>
<?php echo $store_storeled->Product->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->Mfg->Visible) { // Mfg ?>
		<td data-name="Mfg"<?php echo $store_storeled->Mfg->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_Mfg" class="store_storeled_Mfg">
<span<?php echo $store_storeled->Mfg->viewAttributes() ?>>
<?php echo $store_storeled->Mfg->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->HosoID->Visible) { // HosoID ?>
		<td data-name="HosoID"<?php echo $store_storeled->HosoID->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_HosoID" class="store_storeled_HosoID">
<span<?php echo $store_storeled->HosoID->viewAttributes() ?>>
<?php echo $store_storeled->HosoID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $store_storeled->createdby->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_createdby" class="store_storeled_createdby">
<span<?php echo $store_storeled->createdby->viewAttributes() ?>>
<?php echo $store_storeled->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $store_storeled->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_createddatetime" class="store_storeled_createddatetime">
<span<?php echo $store_storeled->createddatetime->viewAttributes() ?>>
<?php echo $store_storeled->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $store_storeled->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_modifiedby" class="store_storeled_modifiedby">
<span<?php echo $store_storeled->modifiedby->viewAttributes() ?>>
<?php echo $store_storeled->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $store_storeled->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_modifieddatetime" class="store_storeled_modifieddatetime">
<span<?php echo $store_storeled->modifieddatetime->viewAttributes() ?>>
<?php echo $store_storeled->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->MFRCODE->Visible) { // MFRCODE ?>
		<td data-name="MFRCODE"<?php echo $store_storeled->MFRCODE->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_MFRCODE" class="store_storeled_MFRCODE">
<span<?php echo $store_storeled->MFRCODE->viewAttributes() ?>>
<?php echo $store_storeled->MFRCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->Reception->Visible) { // Reception ?>
		<td data-name="Reception"<?php echo $store_storeled->Reception->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_Reception" class="store_storeled_Reception">
<span<?php echo $store_storeled->Reception->viewAttributes() ?>>
<?php echo $store_storeled->Reception->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->PatID->Visible) { // PatID ?>
		<td data-name="PatID"<?php echo $store_storeled->PatID->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_PatID" class="store_storeled_PatID">
<span<?php echo $store_storeled->PatID->viewAttributes() ?>>
<?php echo $store_storeled->PatID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno"<?php echo $store_storeled->mrnno->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_mrnno" class="store_storeled_mrnno">
<span<?php echo $store_storeled->mrnno->viewAttributes() ?>>
<?php echo $store_storeled->mrnno->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->BRNAME->Visible) { // BRNAME ?>
		<td data-name="BRNAME"<?php echo $store_storeled->BRNAME->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_BRNAME" class="store_storeled_BRNAME">
<span<?php echo $store_storeled->BRNAME->viewAttributes() ?>>
<?php echo $store_storeled->BRNAME->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storeled->StoreID->Visible) { // StoreID ?>
		<td data-name="StoreID"<?php echo $store_storeled->StoreID->cellAttributes() ?>>
<span id="el<?php echo $store_storeled_list->RowCnt ?>_store_storeled_StoreID" class="store_storeled_StoreID">
<span<?php echo $store_storeled->StoreID->viewAttributes() ?>>
<?php echo $store_storeled->StoreID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$store_storeled_list->ListOptions->render("body", "right", $store_storeled_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$store_storeled->isGridAdd())
		$store_storeled_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$store_storeled->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($store_storeled_list->Recordset)
	$store_storeled_list->Recordset->Close();
?>
<?php if (!$store_storeled->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$store_storeled->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($store_storeled_list->Pager)) $store_storeled_list->Pager = new NumericPager($store_storeled_list->StartRec, $store_storeled_list->DisplayRecs, $store_storeled_list->TotalRecs, $store_storeled_list->RecRange, $store_storeled_list->AutoHidePager) ?>
<?php if ($store_storeled_list->Pager->RecordCount > 0 && $store_storeled_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($store_storeled_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $store_storeled_list->pageUrl() ?>start=<?php echo $store_storeled_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($store_storeled_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $store_storeled_list->pageUrl() ?>start=<?php echo $store_storeled_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($store_storeled_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $store_storeled_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($store_storeled_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $store_storeled_list->pageUrl() ?>start=<?php echo $store_storeled_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($store_storeled_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $store_storeled_list->pageUrl() ?>start=<?php echo $store_storeled_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($store_storeled_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $store_storeled_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $store_storeled_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $store_storeled_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($store_storeled_list->TotalRecs > 0 && (!$store_storeled_list->AutoHidePageSizeSelector || $store_storeled_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="store_storeled">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($store_storeled_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($store_storeled_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($store_storeled_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($store_storeled_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($store_storeled_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($store_storeled_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($store_storeled->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $store_storeled_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($store_storeled_list->TotalRecs == 0 && !$store_storeled->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $store_storeled_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$store_storeled_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$store_storeled->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$store_storeled->isExport()) { ?>
<script>
ew.scrollableTable("gmp_store_storeled", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$store_storeled_list->terminate();
?>
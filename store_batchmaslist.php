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
$store_batchmas_list = new store_batchmas_list();

// Run the page
$store_batchmas_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$store_batchmas_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$store_batchmas->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fstore_batchmaslist = currentForm = new ew.Form("fstore_batchmaslist", "list");
fstore_batchmaslist.formKeyCountName = '<?php echo $store_batchmas_list->FormKeyCountName ?>';

// Form_CustomValidate event
fstore_batchmaslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fstore_batchmaslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fstore_batchmaslistsrch = currentSearchForm = new ew.Form("fstore_batchmaslistsrch");

// Filters
fstore_batchmaslistsrch.filterList = <?php echo $store_batchmas_list->getFilterList() ?>;
</script>
<script src="phpjs/ewscrolltable.js"></script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$store_batchmas->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($store_batchmas_list->TotalRecs > 0 && $store_batchmas_list->ExportOptions->visible()) { ?>
<?php $store_batchmas_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($store_batchmas_list->ImportOptions->visible()) { ?>
<?php $store_batchmas_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($store_batchmas_list->SearchOptions->visible()) { ?>
<?php $store_batchmas_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($store_batchmas_list->FilterOptions->visible()) { ?>
<?php $store_batchmas_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$store_batchmas_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$store_batchmas->isExport() && !$store_batchmas->CurrentAction) { ?>
<form name="fstore_batchmaslistsrch" id="fstore_batchmaslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($store_batchmas_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fstore_batchmaslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="store_batchmas">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($store_batchmas_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($store_batchmas_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $store_batchmas_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($store_batchmas_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($store_batchmas_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($store_batchmas_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($store_batchmas_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $store_batchmas_list->showPageHeader(); ?>
<?php
$store_batchmas_list->showMessage();
?>
<?php if ($store_batchmas_list->TotalRecs > 0 || $store_batchmas->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($store_batchmas_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> store_batchmas">
<?php if (!$store_batchmas->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$store_batchmas->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($store_batchmas_list->Pager)) $store_batchmas_list->Pager = new NumericPager($store_batchmas_list->StartRec, $store_batchmas_list->DisplayRecs, $store_batchmas_list->TotalRecs, $store_batchmas_list->RecRange, $store_batchmas_list->AutoHidePager) ?>
<?php if ($store_batchmas_list->Pager->RecordCount > 0 && $store_batchmas_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($store_batchmas_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $store_batchmas_list->pageUrl() ?>start=<?php echo $store_batchmas_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($store_batchmas_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $store_batchmas_list->pageUrl() ?>start=<?php echo $store_batchmas_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($store_batchmas_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $store_batchmas_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($store_batchmas_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $store_batchmas_list->pageUrl() ?>start=<?php echo $store_batchmas_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($store_batchmas_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $store_batchmas_list->pageUrl() ?>start=<?php echo $store_batchmas_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($store_batchmas_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $store_batchmas_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $store_batchmas_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $store_batchmas_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($store_batchmas_list->TotalRecs > 0 && (!$store_batchmas_list->AutoHidePageSizeSelector || $store_batchmas_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="store_batchmas">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($store_batchmas_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($store_batchmas_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($store_batchmas_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($store_batchmas_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($store_batchmas_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($store_batchmas_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($store_batchmas->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $store_batchmas_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fstore_batchmaslist" id="fstore_batchmaslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($store_batchmas_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $store_batchmas_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="store_batchmas">
<div id="gmp_store_batchmas" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($store_batchmas_list->TotalRecs > 0 || $store_batchmas->isGridEdit()) { ?>
<table id="tbl_store_batchmaslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$store_batchmas_list->RowType = ROWTYPE_HEADER;

// Render list options
$store_batchmas_list->renderListOptions();

// Render list options (header, left)
$store_batchmas_list->ListOptions->render("header", "left");
?>
<?php if ($store_batchmas->PRC->Visible) { // PRC ?>
	<?php if ($store_batchmas->sortUrl($store_batchmas->PRC) == "") { ?>
		<th data-name="PRC" class="<?php echo $store_batchmas->PRC->headerCellClass() ?>"><div id="elh_store_batchmas_PRC" class="store_batchmas_PRC"><div class="ew-table-header-caption"><?php echo $store_batchmas->PRC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRC" class="<?php echo $store_batchmas->PRC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_batchmas->SortUrl($store_batchmas->PRC) ?>',1);"><div id="elh_store_batchmas_PRC" class="store_batchmas_PRC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_batchmas->PRC->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_batchmas->PRC->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_batchmas->PRC->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_batchmas->BATCHNO->Visible) { // BATCHNO ?>
	<?php if ($store_batchmas->sortUrl($store_batchmas->BATCHNO) == "") { ?>
		<th data-name="BATCHNO" class="<?php echo $store_batchmas->BATCHNO->headerCellClass() ?>"><div id="elh_store_batchmas_BATCHNO" class="store_batchmas_BATCHNO"><div class="ew-table-header-caption"><?php echo $store_batchmas->BATCHNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BATCHNO" class="<?php echo $store_batchmas->BATCHNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_batchmas->SortUrl($store_batchmas->BATCHNO) ?>',1);"><div id="elh_store_batchmas_BATCHNO" class="store_batchmas_BATCHNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_batchmas->BATCHNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_batchmas->BATCHNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_batchmas->BATCHNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_batchmas->OQ->Visible) { // OQ ?>
	<?php if ($store_batchmas->sortUrl($store_batchmas->OQ) == "") { ?>
		<th data-name="OQ" class="<?php echo $store_batchmas->OQ->headerCellClass() ?>"><div id="elh_store_batchmas_OQ" class="store_batchmas_OQ"><div class="ew-table-header-caption"><?php echo $store_batchmas->OQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OQ" class="<?php echo $store_batchmas->OQ->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_batchmas->SortUrl($store_batchmas->OQ) ?>',1);"><div id="elh_store_batchmas_OQ" class="store_batchmas_OQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_batchmas->OQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_batchmas->OQ->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_batchmas->OQ->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_batchmas->RQ->Visible) { // RQ ?>
	<?php if ($store_batchmas->sortUrl($store_batchmas->RQ) == "") { ?>
		<th data-name="RQ" class="<?php echo $store_batchmas->RQ->headerCellClass() ?>"><div id="elh_store_batchmas_RQ" class="store_batchmas_RQ"><div class="ew-table-header-caption"><?php echo $store_batchmas->RQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RQ" class="<?php echo $store_batchmas->RQ->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_batchmas->SortUrl($store_batchmas->RQ) ?>',1);"><div id="elh_store_batchmas_RQ" class="store_batchmas_RQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_batchmas->RQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_batchmas->RQ->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_batchmas->RQ->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_batchmas->MRQ->Visible) { // MRQ ?>
	<?php if ($store_batchmas->sortUrl($store_batchmas->MRQ) == "") { ?>
		<th data-name="MRQ" class="<?php echo $store_batchmas->MRQ->headerCellClass() ?>"><div id="elh_store_batchmas_MRQ" class="store_batchmas_MRQ"><div class="ew-table-header-caption"><?php echo $store_batchmas->MRQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MRQ" class="<?php echo $store_batchmas->MRQ->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_batchmas->SortUrl($store_batchmas->MRQ) ?>',1);"><div id="elh_store_batchmas_MRQ" class="store_batchmas_MRQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_batchmas->MRQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_batchmas->MRQ->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_batchmas->MRQ->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_batchmas->IQ->Visible) { // IQ ?>
	<?php if ($store_batchmas->sortUrl($store_batchmas->IQ) == "") { ?>
		<th data-name="IQ" class="<?php echo $store_batchmas->IQ->headerCellClass() ?>"><div id="elh_store_batchmas_IQ" class="store_batchmas_IQ"><div class="ew-table-header-caption"><?php echo $store_batchmas->IQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IQ" class="<?php echo $store_batchmas->IQ->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_batchmas->SortUrl($store_batchmas->IQ) ?>',1);"><div id="elh_store_batchmas_IQ" class="store_batchmas_IQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_batchmas->IQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_batchmas->IQ->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_batchmas->IQ->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_batchmas->MRP->Visible) { // MRP ?>
	<?php if ($store_batchmas->sortUrl($store_batchmas->MRP) == "") { ?>
		<th data-name="MRP" class="<?php echo $store_batchmas->MRP->headerCellClass() ?>"><div id="elh_store_batchmas_MRP" class="store_batchmas_MRP"><div class="ew-table-header-caption"><?php echo $store_batchmas->MRP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MRP" class="<?php echo $store_batchmas->MRP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_batchmas->SortUrl($store_batchmas->MRP) ?>',1);"><div id="elh_store_batchmas_MRP" class="store_batchmas_MRP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_batchmas->MRP->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_batchmas->MRP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_batchmas->MRP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_batchmas->EXPDT->Visible) { // EXPDT ?>
	<?php if ($store_batchmas->sortUrl($store_batchmas->EXPDT) == "") { ?>
		<th data-name="EXPDT" class="<?php echo $store_batchmas->EXPDT->headerCellClass() ?>"><div id="elh_store_batchmas_EXPDT" class="store_batchmas_EXPDT"><div class="ew-table-header-caption"><?php echo $store_batchmas->EXPDT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EXPDT" class="<?php echo $store_batchmas->EXPDT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_batchmas->SortUrl($store_batchmas->EXPDT) ?>',1);"><div id="elh_store_batchmas_EXPDT" class="store_batchmas_EXPDT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_batchmas->EXPDT->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_batchmas->EXPDT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_batchmas->EXPDT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_batchmas->UR->Visible) { // UR ?>
	<?php if ($store_batchmas->sortUrl($store_batchmas->UR) == "") { ?>
		<th data-name="UR" class="<?php echo $store_batchmas->UR->headerCellClass() ?>"><div id="elh_store_batchmas_UR" class="store_batchmas_UR"><div class="ew-table-header-caption"><?php echo $store_batchmas->UR->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UR" class="<?php echo $store_batchmas->UR->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_batchmas->SortUrl($store_batchmas->UR) ?>',1);"><div id="elh_store_batchmas_UR" class="store_batchmas_UR">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_batchmas->UR->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_batchmas->UR->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_batchmas->UR->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_batchmas->RT->Visible) { // RT ?>
	<?php if ($store_batchmas->sortUrl($store_batchmas->RT) == "") { ?>
		<th data-name="RT" class="<?php echo $store_batchmas->RT->headerCellClass() ?>"><div id="elh_store_batchmas_RT" class="store_batchmas_RT"><div class="ew-table-header-caption"><?php echo $store_batchmas->RT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RT" class="<?php echo $store_batchmas->RT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_batchmas->SortUrl($store_batchmas->RT) ?>',1);"><div id="elh_store_batchmas_RT" class="store_batchmas_RT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_batchmas->RT->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_batchmas->RT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_batchmas->RT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_batchmas->PRCODE->Visible) { // PRCODE ?>
	<?php if ($store_batchmas->sortUrl($store_batchmas->PRCODE) == "") { ?>
		<th data-name="PRCODE" class="<?php echo $store_batchmas->PRCODE->headerCellClass() ?>"><div id="elh_store_batchmas_PRCODE" class="store_batchmas_PRCODE"><div class="ew-table-header-caption"><?php echo $store_batchmas->PRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRCODE" class="<?php echo $store_batchmas->PRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_batchmas->SortUrl($store_batchmas->PRCODE) ?>',1);"><div id="elh_store_batchmas_PRCODE" class="store_batchmas_PRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_batchmas->PRCODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_batchmas->PRCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_batchmas->PRCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_batchmas->BATCH->Visible) { // BATCH ?>
	<?php if ($store_batchmas->sortUrl($store_batchmas->BATCH) == "") { ?>
		<th data-name="BATCH" class="<?php echo $store_batchmas->BATCH->headerCellClass() ?>"><div id="elh_store_batchmas_BATCH" class="store_batchmas_BATCH"><div class="ew-table-header-caption"><?php echo $store_batchmas->BATCH->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BATCH" class="<?php echo $store_batchmas->BATCH->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_batchmas->SortUrl($store_batchmas->BATCH) ?>',1);"><div id="elh_store_batchmas_BATCH" class="store_batchmas_BATCH">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_batchmas->BATCH->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_batchmas->BATCH->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_batchmas->BATCH->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_batchmas->PC->Visible) { // PC ?>
	<?php if ($store_batchmas->sortUrl($store_batchmas->PC) == "") { ?>
		<th data-name="PC" class="<?php echo $store_batchmas->PC->headerCellClass() ?>"><div id="elh_store_batchmas_PC" class="store_batchmas_PC"><div class="ew-table-header-caption"><?php echo $store_batchmas->PC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PC" class="<?php echo $store_batchmas->PC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_batchmas->SortUrl($store_batchmas->PC) ?>',1);"><div id="elh_store_batchmas_PC" class="store_batchmas_PC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_batchmas->PC->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_batchmas->PC->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_batchmas->PC->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_batchmas->OLDRT->Visible) { // OLDRT ?>
	<?php if ($store_batchmas->sortUrl($store_batchmas->OLDRT) == "") { ?>
		<th data-name="OLDRT" class="<?php echo $store_batchmas->OLDRT->headerCellClass() ?>"><div id="elh_store_batchmas_OLDRT" class="store_batchmas_OLDRT"><div class="ew-table-header-caption"><?php echo $store_batchmas->OLDRT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OLDRT" class="<?php echo $store_batchmas->OLDRT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_batchmas->SortUrl($store_batchmas->OLDRT) ?>',1);"><div id="elh_store_batchmas_OLDRT" class="store_batchmas_OLDRT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_batchmas->OLDRT->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_batchmas->OLDRT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_batchmas->OLDRT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_batchmas->TEMPMRQ->Visible) { // TEMPMRQ ?>
	<?php if ($store_batchmas->sortUrl($store_batchmas->TEMPMRQ) == "") { ?>
		<th data-name="TEMPMRQ" class="<?php echo $store_batchmas->TEMPMRQ->headerCellClass() ?>"><div id="elh_store_batchmas_TEMPMRQ" class="store_batchmas_TEMPMRQ"><div class="ew-table-header-caption"><?php echo $store_batchmas->TEMPMRQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TEMPMRQ" class="<?php echo $store_batchmas->TEMPMRQ->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_batchmas->SortUrl($store_batchmas->TEMPMRQ) ?>',1);"><div id="elh_store_batchmas_TEMPMRQ" class="store_batchmas_TEMPMRQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_batchmas->TEMPMRQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_batchmas->TEMPMRQ->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_batchmas->TEMPMRQ->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_batchmas->TAXP->Visible) { // TAXP ?>
	<?php if ($store_batchmas->sortUrl($store_batchmas->TAXP) == "") { ?>
		<th data-name="TAXP" class="<?php echo $store_batchmas->TAXP->headerCellClass() ?>"><div id="elh_store_batchmas_TAXP" class="store_batchmas_TAXP"><div class="ew-table-header-caption"><?php echo $store_batchmas->TAXP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TAXP" class="<?php echo $store_batchmas->TAXP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_batchmas->SortUrl($store_batchmas->TAXP) ?>',1);"><div id="elh_store_batchmas_TAXP" class="store_batchmas_TAXP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_batchmas->TAXP->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_batchmas->TAXP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_batchmas->TAXP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_batchmas->OLDRATE->Visible) { // OLDRATE ?>
	<?php if ($store_batchmas->sortUrl($store_batchmas->OLDRATE) == "") { ?>
		<th data-name="OLDRATE" class="<?php echo $store_batchmas->OLDRATE->headerCellClass() ?>"><div id="elh_store_batchmas_OLDRATE" class="store_batchmas_OLDRATE"><div class="ew-table-header-caption"><?php echo $store_batchmas->OLDRATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OLDRATE" class="<?php echo $store_batchmas->OLDRATE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_batchmas->SortUrl($store_batchmas->OLDRATE) ?>',1);"><div id="elh_store_batchmas_OLDRATE" class="store_batchmas_OLDRATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_batchmas->OLDRATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_batchmas->OLDRATE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_batchmas->OLDRATE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_batchmas->NEWRATE->Visible) { // NEWRATE ?>
	<?php if ($store_batchmas->sortUrl($store_batchmas->NEWRATE) == "") { ?>
		<th data-name="NEWRATE" class="<?php echo $store_batchmas->NEWRATE->headerCellClass() ?>"><div id="elh_store_batchmas_NEWRATE" class="store_batchmas_NEWRATE"><div class="ew-table-header-caption"><?php echo $store_batchmas->NEWRATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NEWRATE" class="<?php echo $store_batchmas->NEWRATE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_batchmas->SortUrl($store_batchmas->NEWRATE) ?>',1);"><div id="elh_store_batchmas_NEWRATE" class="store_batchmas_NEWRATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_batchmas->NEWRATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_batchmas->NEWRATE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_batchmas->NEWRATE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_batchmas->OTEMPMRA->Visible) { // OTEMPMRA ?>
	<?php if ($store_batchmas->sortUrl($store_batchmas->OTEMPMRA) == "") { ?>
		<th data-name="OTEMPMRA" class="<?php echo $store_batchmas->OTEMPMRA->headerCellClass() ?>"><div id="elh_store_batchmas_OTEMPMRA" class="store_batchmas_OTEMPMRA"><div class="ew-table-header-caption"><?php echo $store_batchmas->OTEMPMRA->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OTEMPMRA" class="<?php echo $store_batchmas->OTEMPMRA->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_batchmas->SortUrl($store_batchmas->OTEMPMRA) ?>',1);"><div id="elh_store_batchmas_OTEMPMRA" class="store_batchmas_OTEMPMRA">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_batchmas->OTEMPMRA->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_batchmas->OTEMPMRA->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_batchmas->OTEMPMRA->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_batchmas->ACTIVESTATUS->Visible) { // ACTIVESTATUS ?>
	<?php if ($store_batchmas->sortUrl($store_batchmas->ACTIVESTATUS) == "") { ?>
		<th data-name="ACTIVESTATUS" class="<?php echo $store_batchmas->ACTIVESTATUS->headerCellClass() ?>"><div id="elh_store_batchmas_ACTIVESTATUS" class="store_batchmas_ACTIVESTATUS"><div class="ew-table-header-caption"><?php echo $store_batchmas->ACTIVESTATUS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ACTIVESTATUS" class="<?php echo $store_batchmas->ACTIVESTATUS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_batchmas->SortUrl($store_batchmas->ACTIVESTATUS) ?>',1);"><div id="elh_store_batchmas_ACTIVESTATUS" class="store_batchmas_ACTIVESTATUS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_batchmas->ACTIVESTATUS->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_batchmas->ACTIVESTATUS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_batchmas->ACTIVESTATUS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_batchmas->id->Visible) { // id ?>
	<?php if ($store_batchmas->sortUrl($store_batchmas->id) == "") { ?>
		<th data-name="id" class="<?php echo $store_batchmas->id->headerCellClass() ?>"><div id="elh_store_batchmas_id" class="store_batchmas_id"><div class="ew-table-header-caption"><?php echo $store_batchmas->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $store_batchmas->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_batchmas->SortUrl($store_batchmas->id) ?>',1);"><div id="elh_store_batchmas_id" class="store_batchmas_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_batchmas->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_batchmas->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_batchmas->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_batchmas->PrName->Visible) { // PrName ?>
	<?php if ($store_batchmas->sortUrl($store_batchmas->PrName) == "") { ?>
		<th data-name="PrName" class="<?php echo $store_batchmas->PrName->headerCellClass() ?>"><div id="elh_store_batchmas_PrName" class="store_batchmas_PrName"><div class="ew-table-header-caption"><?php echo $store_batchmas->PrName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrName" class="<?php echo $store_batchmas->PrName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_batchmas->SortUrl($store_batchmas->PrName) ?>',1);"><div id="elh_store_batchmas_PrName" class="store_batchmas_PrName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_batchmas->PrName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_batchmas->PrName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_batchmas->PrName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_batchmas->PSGST->Visible) { // PSGST ?>
	<?php if ($store_batchmas->sortUrl($store_batchmas->PSGST) == "") { ?>
		<th data-name="PSGST" class="<?php echo $store_batchmas->PSGST->headerCellClass() ?>"><div id="elh_store_batchmas_PSGST" class="store_batchmas_PSGST"><div class="ew-table-header-caption"><?php echo $store_batchmas->PSGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PSGST" class="<?php echo $store_batchmas->PSGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_batchmas->SortUrl($store_batchmas->PSGST) ?>',1);"><div id="elh_store_batchmas_PSGST" class="store_batchmas_PSGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_batchmas->PSGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_batchmas->PSGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_batchmas->PSGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_batchmas->PCGST->Visible) { // PCGST ?>
	<?php if ($store_batchmas->sortUrl($store_batchmas->PCGST) == "") { ?>
		<th data-name="PCGST" class="<?php echo $store_batchmas->PCGST->headerCellClass() ?>"><div id="elh_store_batchmas_PCGST" class="store_batchmas_PCGST"><div class="ew-table-header-caption"><?php echo $store_batchmas->PCGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PCGST" class="<?php echo $store_batchmas->PCGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_batchmas->SortUrl($store_batchmas->PCGST) ?>',1);"><div id="elh_store_batchmas_PCGST" class="store_batchmas_PCGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_batchmas->PCGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_batchmas->PCGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_batchmas->PCGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_batchmas->SSGST->Visible) { // SSGST ?>
	<?php if ($store_batchmas->sortUrl($store_batchmas->SSGST) == "") { ?>
		<th data-name="SSGST" class="<?php echo $store_batchmas->SSGST->headerCellClass() ?>"><div id="elh_store_batchmas_SSGST" class="store_batchmas_SSGST"><div class="ew-table-header-caption"><?php echo $store_batchmas->SSGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SSGST" class="<?php echo $store_batchmas->SSGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_batchmas->SortUrl($store_batchmas->SSGST) ?>',1);"><div id="elh_store_batchmas_SSGST" class="store_batchmas_SSGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_batchmas->SSGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_batchmas->SSGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_batchmas->SSGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_batchmas->SCGST->Visible) { // SCGST ?>
	<?php if ($store_batchmas->sortUrl($store_batchmas->SCGST) == "") { ?>
		<th data-name="SCGST" class="<?php echo $store_batchmas->SCGST->headerCellClass() ?>"><div id="elh_store_batchmas_SCGST" class="store_batchmas_SCGST"><div class="ew-table-header-caption"><?php echo $store_batchmas->SCGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SCGST" class="<?php echo $store_batchmas->SCGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_batchmas->SortUrl($store_batchmas->SCGST) ?>',1);"><div id="elh_store_batchmas_SCGST" class="store_batchmas_SCGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_batchmas->SCGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_batchmas->SCGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_batchmas->SCGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_batchmas->MFRCODE->Visible) { // MFRCODE ?>
	<?php if ($store_batchmas->sortUrl($store_batchmas->MFRCODE) == "") { ?>
		<th data-name="MFRCODE" class="<?php echo $store_batchmas->MFRCODE->headerCellClass() ?>"><div id="elh_store_batchmas_MFRCODE" class="store_batchmas_MFRCODE"><div class="ew-table-header-caption"><?php echo $store_batchmas->MFRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MFRCODE" class="<?php echo $store_batchmas->MFRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_batchmas->SortUrl($store_batchmas->MFRCODE) ?>',1);"><div id="elh_store_batchmas_MFRCODE" class="store_batchmas_MFRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_batchmas->MFRCODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_batchmas->MFRCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_batchmas->MFRCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_batchmas->BRCODE->Visible) { // BRCODE ?>
	<?php if ($store_batchmas->sortUrl($store_batchmas->BRCODE) == "") { ?>
		<th data-name="BRCODE" class="<?php echo $store_batchmas->BRCODE->headerCellClass() ?>"><div id="elh_store_batchmas_BRCODE" class="store_batchmas_BRCODE"><div class="ew-table-header-caption"><?php echo $store_batchmas->BRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BRCODE" class="<?php echo $store_batchmas->BRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_batchmas->SortUrl($store_batchmas->BRCODE) ?>',1);"><div id="elh_store_batchmas_BRCODE" class="store_batchmas_BRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_batchmas->BRCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_batchmas->BRCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_batchmas->BRCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_batchmas->FRQ->Visible) { // FRQ ?>
	<?php if ($store_batchmas->sortUrl($store_batchmas->FRQ) == "") { ?>
		<th data-name="FRQ" class="<?php echo $store_batchmas->FRQ->headerCellClass() ?>"><div id="elh_store_batchmas_FRQ" class="store_batchmas_FRQ"><div class="ew-table-header-caption"><?php echo $store_batchmas->FRQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FRQ" class="<?php echo $store_batchmas->FRQ->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_batchmas->SortUrl($store_batchmas->FRQ) ?>',1);"><div id="elh_store_batchmas_FRQ" class="store_batchmas_FRQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_batchmas->FRQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_batchmas->FRQ->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_batchmas->FRQ->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_batchmas->HospID->Visible) { // HospID ?>
	<?php if ($store_batchmas->sortUrl($store_batchmas->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $store_batchmas->HospID->headerCellClass() ?>"><div id="elh_store_batchmas_HospID" class="store_batchmas_HospID"><div class="ew-table-header-caption"><?php echo $store_batchmas->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $store_batchmas->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_batchmas->SortUrl($store_batchmas->HospID) ?>',1);"><div id="elh_store_batchmas_HospID" class="store_batchmas_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_batchmas->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_batchmas->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_batchmas->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_batchmas->UM->Visible) { // UM ?>
	<?php if ($store_batchmas->sortUrl($store_batchmas->UM) == "") { ?>
		<th data-name="UM" class="<?php echo $store_batchmas->UM->headerCellClass() ?>"><div id="elh_store_batchmas_UM" class="store_batchmas_UM"><div class="ew-table-header-caption"><?php echo $store_batchmas->UM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UM" class="<?php echo $store_batchmas->UM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_batchmas->SortUrl($store_batchmas->UM) ?>',1);"><div id="elh_store_batchmas_UM" class="store_batchmas_UM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_batchmas->UM->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_batchmas->UM->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_batchmas->UM->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_batchmas->GENNAME->Visible) { // GENNAME ?>
	<?php if ($store_batchmas->sortUrl($store_batchmas->GENNAME) == "") { ?>
		<th data-name="GENNAME" class="<?php echo $store_batchmas->GENNAME->headerCellClass() ?>"><div id="elh_store_batchmas_GENNAME" class="store_batchmas_GENNAME"><div class="ew-table-header-caption"><?php echo $store_batchmas->GENNAME->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GENNAME" class="<?php echo $store_batchmas->GENNAME->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_batchmas->SortUrl($store_batchmas->GENNAME) ?>',1);"><div id="elh_store_batchmas_GENNAME" class="store_batchmas_GENNAME">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_batchmas->GENNAME->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_batchmas->GENNAME->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_batchmas->GENNAME->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_batchmas->BILLDATE->Visible) { // BILLDATE ?>
	<?php if ($store_batchmas->sortUrl($store_batchmas->BILLDATE) == "") { ?>
		<th data-name="BILLDATE" class="<?php echo $store_batchmas->BILLDATE->headerCellClass() ?>"><div id="elh_store_batchmas_BILLDATE" class="store_batchmas_BILLDATE"><div class="ew-table-header-caption"><?php echo $store_batchmas->BILLDATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BILLDATE" class="<?php echo $store_batchmas->BILLDATE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_batchmas->SortUrl($store_batchmas->BILLDATE) ?>',1);"><div id="elh_store_batchmas_BILLDATE" class="store_batchmas_BILLDATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_batchmas->BILLDATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_batchmas->BILLDATE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_batchmas->BILLDATE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_batchmas->PUnit->Visible) { // PUnit ?>
	<?php if ($store_batchmas->sortUrl($store_batchmas->PUnit) == "") { ?>
		<th data-name="PUnit" class="<?php echo $store_batchmas->PUnit->headerCellClass() ?>"><div id="elh_store_batchmas_PUnit" class="store_batchmas_PUnit"><div class="ew-table-header-caption"><?php echo $store_batchmas->PUnit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PUnit" class="<?php echo $store_batchmas->PUnit->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_batchmas->SortUrl($store_batchmas->PUnit) ?>',1);"><div id="elh_store_batchmas_PUnit" class="store_batchmas_PUnit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_batchmas->PUnit->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_batchmas->PUnit->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_batchmas->PUnit->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_batchmas->SUnit->Visible) { // SUnit ?>
	<?php if ($store_batchmas->sortUrl($store_batchmas->SUnit) == "") { ?>
		<th data-name="SUnit" class="<?php echo $store_batchmas->SUnit->headerCellClass() ?>"><div id="elh_store_batchmas_SUnit" class="store_batchmas_SUnit"><div class="ew-table-header-caption"><?php echo $store_batchmas->SUnit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SUnit" class="<?php echo $store_batchmas->SUnit->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_batchmas->SortUrl($store_batchmas->SUnit) ?>',1);"><div id="elh_store_batchmas_SUnit" class="store_batchmas_SUnit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_batchmas->SUnit->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_batchmas->SUnit->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_batchmas->SUnit->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_batchmas->PurValue->Visible) { // PurValue ?>
	<?php if ($store_batchmas->sortUrl($store_batchmas->PurValue) == "") { ?>
		<th data-name="PurValue" class="<?php echo $store_batchmas->PurValue->headerCellClass() ?>"><div id="elh_store_batchmas_PurValue" class="store_batchmas_PurValue"><div class="ew-table-header-caption"><?php echo $store_batchmas->PurValue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PurValue" class="<?php echo $store_batchmas->PurValue->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_batchmas->SortUrl($store_batchmas->PurValue) ?>',1);"><div id="elh_store_batchmas_PurValue" class="store_batchmas_PurValue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_batchmas->PurValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_batchmas->PurValue->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_batchmas->PurValue->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_batchmas->PurRate->Visible) { // PurRate ?>
	<?php if ($store_batchmas->sortUrl($store_batchmas->PurRate) == "") { ?>
		<th data-name="PurRate" class="<?php echo $store_batchmas->PurRate->headerCellClass() ?>"><div id="elh_store_batchmas_PurRate" class="store_batchmas_PurRate"><div class="ew-table-header-caption"><?php echo $store_batchmas->PurRate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PurRate" class="<?php echo $store_batchmas->PurRate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_batchmas->SortUrl($store_batchmas->PurRate) ?>',1);"><div id="elh_store_batchmas_PurRate" class="store_batchmas_PurRate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_batchmas->PurRate->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_batchmas->PurRate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_batchmas->PurRate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_batchmas->StoreID->Visible) { // StoreID ?>
	<?php if ($store_batchmas->sortUrl($store_batchmas->StoreID) == "") { ?>
		<th data-name="StoreID" class="<?php echo $store_batchmas->StoreID->headerCellClass() ?>"><div id="elh_store_batchmas_StoreID" class="store_batchmas_StoreID"><div class="ew-table-header-caption"><?php echo $store_batchmas->StoreID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StoreID" class="<?php echo $store_batchmas->StoreID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_batchmas->SortUrl($store_batchmas->StoreID) ?>',1);"><div id="elh_store_batchmas_StoreID" class="store_batchmas_StoreID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_batchmas->StoreID->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_batchmas->StoreID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_batchmas->StoreID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$store_batchmas_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($store_batchmas->ExportAll && $store_batchmas->isExport()) {
	$store_batchmas_list->StopRec = $store_batchmas_list->TotalRecs;
} else {

	// Set the last record to display
	if ($store_batchmas_list->TotalRecs > $store_batchmas_list->StartRec + $store_batchmas_list->DisplayRecs - 1)
		$store_batchmas_list->StopRec = $store_batchmas_list->StartRec + $store_batchmas_list->DisplayRecs - 1;
	else
		$store_batchmas_list->StopRec = $store_batchmas_list->TotalRecs;
}
$store_batchmas_list->RecCnt = $store_batchmas_list->StartRec - 1;
if ($store_batchmas_list->Recordset && !$store_batchmas_list->Recordset->EOF) {
	$store_batchmas_list->Recordset->moveFirst();
	$selectLimit = $store_batchmas_list->UseSelectLimit;
	if (!$selectLimit && $store_batchmas_list->StartRec > 1)
		$store_batchmas_list->Recordset->move($store_batchmas_list->StartRec - 1);
} elseif (!$store_batchmas->AllowAddDeleteRow && $store_batchmas_list->StopRec == 0) {
	$store_batchmas_list->StopRec = $store_batchmas->GridAddRowCount;
}

// Initialize aggregate
$store_batchmas->RowType = ROWTYPE_AGGREGATEINIT;
$store_batchmas->resetAttributes();
$store_batchmas_list->renderRow();
while ($store_batchmas_list->RecCnt < $store_batchmas_list->StopRec) {
	$store_batchmas_list->RecCnt++;
	if ($store_batchmas_list->RecCnt >= $store_batchmas_list->StartRec) {
		$store_batchmas_list->RowCnt++;

		// Set up key count
		$store_batchmas_list->KeyCount = $store_batchmas_list->RowIndex;

		// Init row class and style
		$store_batchmas->resetAttributes();
		$store_batchmas->CssClass = "";
		if ($store_batchmas->isGridAdd()) {
		} else {
			$store_batchmas_list->loadRowValues($store_batchmas_list->Recordset); // Load row values
		}
		$store_batchmas->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$store_batchmas->RowAttrs = array_merge($store_batchmas->RowAttrs, array('data-rowindex'=>$store_batchmas_list->RowCnt, 'id'=>'r' . $store_batchmas_list->RowCnt . '_store_batchmas', 'data-rowtype'=>$store_batchmas->RowType));

		// Render row
		$store_batchmas_list->renderRow();

		// Render list options
		$store_batchmas_list->renderListOptions();
?>
	<tr<?php echo $store_batchmas->rowAttributes() ?>>
<?php

// Render list options (body, left)
$store_batchmas_list->ListOptions->render("body", "left", $store_batchmas_list->RowCnt);
?>
	<?php if ($store_batchmas->PRC->Visible) { // PRC ?>
		<td data-name="PRC"<?php echo $store_batchmas->PRC->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_list->RowCnt ?>_store_batchmas_PRC" class="store_batchmas_PRC">
<span<?php echo $store_batchmas->PRC->viewAttributes() ?>>
<?php echo $store_batchmas->PRC->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_batchmas->BATCHNO->Visible) { // BATCHNO ?>
		<td data-name="BATCHNO"<?php echo $store_batchmas->BATCHNO->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_list->RowCnt ?>_store_batchmas_BATCHNO" class="store_batchmas_BATCHNO">
<span<?php echo $store_batchmas->BATCHNO->viewAttributes() ?>>
<?php echo $store_batchmas->BATCHNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_batchmas->OQ->Visible) { // OQ ?>
		<td data-name="OQ"<?php echo $store_batchmas->OQ->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_list->RowCnt ?>_store_batchmas_OQ" class="store_batchmas_OQ">
<span<?php echo $store_batchmas->OQ->viewAttributes() ?>>
<?php echo $store_batchmas->OQ->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_batchmas->RQ->Visible) { // RQ ?>
		<td data-name="RQ"<?php echo $store_batchmas->RQ->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_list->RowCnt ?>_store_batchmas_RQ" class="store_batchmas_RQ">
<span<?php echo $store_batchmas->RQ->viewAttributes() ?>>
<?php echo $store_batchmas->RQ->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_batchmas->MRQ->Visible) { // MRQ ?>
		<td data-name="MRQ"<?php echo $store_batchmas->MRQ->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_list->RowCnt ?>_store_batchmas_MRQ" class="store_batchmas_MRQ">
<span<?php echo $store_batchmas->MRQ->viewAttributes() ?>>
<?php echo $store_batchmas->MRQ->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_batchmas->IQ->Visible) { // IQ ?>
		<td data-name="IQ"<?php echo $store_batchmas->IQ->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_list->RowCnt ?>_store_batchmas_IQ" class="store_batchmas_IQ">
<span<?php echo $store_batchmas->IQ->viewAttributes() ?>>
<?php echo $store_batchmas->IQ->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_batchmas->MRP->Visible) { // MRP ?>
		<td data-name="MRP"<?php echo $store_batchmas->MRP->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_list->RowCnt ?>_store_batchmas_MRP" class="store_batchmas_MRP">
<span<?php echo $store_batchmas->MRP->viewAttributes() ?>>
<?php echo $store_batchmas->MRP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_batchmas->EXPDT->Visible) { // EXPDT ?>
		<td data-name="EXPDT"<?php echo $store_batchmas->EXPDT->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_list->RowCnt ?>_store_batchmas_EXPDT" class="store_batchmas_EXPDT">
<span<?php echo $store_batchmas->EXPDT->viewAttributes() ?>>
<?php echo $store_batchmas->EXPDT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_batchmas->UR->Visible) { // UR ?>
		<td data-name="UR"<?php echo $store_batchmas->UR->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_list->RowCnt ?>_store_batchmas_UR" class="store_batchmas_UR">
<span<?php echo $store_batchmas->UR->viewAttributes() ?>>
<?php echo $store_batchmas->UR->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_batchmas->RT->Visible) { // RT ?>
		<td data-name="RT"<?php echo $store_batchmas->RT->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_list->RowCnt ?>_store_batchmas_RT" class="store_batchmas_RT">
<span<?php echo $store_batchmas->RT->viewAttributes() ?>>
<?php echo $store_batchmas->RT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_batchmas->PRCODE->Visible) { // PRCODE ?>
		<td data-name="PRCODE"<?php echo $store_batchmas->PRCODE->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_list->RowCnt ?>_store_batchmas_PRCODE" class="store_batchmas_PRCODE">
<span<?php echo $store_batchmas->PRCODE->viewAttributes() ?>>
<?php echo $store_batchmas->PRCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_batchmas->BATCH->Visible) { // BATCH ?>
		<td data-name="BATCH"<?php echo $store_batchmas->BATCH->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_list->RowCnt ?>_store_batchmas_BATCH" class="store_batchmas_BATCH">
<span<?php echo $store_batchmas->BATCH->viewAttributes() ?>>
<?php echo $store_batchmas->BATCH->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_batchmas->PC->Visible) { // PC ?>
		<td data-name="PC"<?php echo $store_batchmas->PC->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_list->RowCnt ?>_store_batchmas_PC" class="store_batchmas_PC">
<span<?php echo $store_batchmas->PC->viewAttributes() ?>>
<?php echo $store_batchmas->PC->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_batchmas->OLDRT->Visible) { // OLDRT ?>
		<td data-name="OLDRT"<?php echo $store_batchmas->OLDRT->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_list->RowCnt ?>_store_batchmas_OLDRT" class="store_batchmas_OLDRT">
<span<?php echo $store_batchmas->OLDRT->viewAttributes() ?>>
<?php echo $store_batchmas->OLDRT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_batchmas->TEMPMRQ->Visible) { // TEMPMRQ ?>
		<td data-name="TEMPMRQ"<?php echo $store_batchmas->TEMPMRQ->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_list->RowCnt ?>_store_batchmas_TEMPMRQ" class="store_batchmas_TEMPMRQ">
<span<?php echo $store_batchmas->TEMPMRQ->viewAttributes() ?>>
<?php echo $store_batchmas->TEMPMRQ->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_batchmas->TAXP->Visible) { // TAXP ?>
		<td data-name="TAXP"<?php echo $store_batchmas->TAXP->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_list->RowCnt ?>_store_batchmas_TAXP" class="store_batchmas_TAXP">
<span<?php echo $store_batchmas->TAXP->viewAttributes() ?>>
<?php echo $store_batchmas->TAXP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_batchmas->OLDRATE->Visible) { // OLDRATE ?>
		<td data-name="OLDRATE"<?php echo $store_batchmas->OLDRATE->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_list->RowCnt ?>_store_batchmas_OLDRATE" class="store_batchmas_OLDRATE">
<span<?php echo $store_batchmas->OLDRATE->viewAttributes() ?>>
<?php echo $store_batchmas->OLDRATE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_batchmas->NEWRATE->Visible) { // NEWRATE ?>
		<td data-name="NEWRATE"<?php echo $store_batchmas->NEWRATE->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_list->RowCnt ?>_store_batchmas_NEWRATE" class="store_batchmas_NEWRATE">
<span<?php echo $store_batchmas->NEWRATE->viewAttributes() ?>>
<?php echo $store_batchmas->NEWRATE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_batchmas->OTEMPMRA->Visible) { // OTEMPMRA ?>
		<td data-name="OTEMPMRA"<?php echo $store_batchmas->OTEMPMRA->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_list->RowCnt ?>_store_batchmas_OTEMPMRA" class="store_batchmas_OTEMPMRA">
<span<?php echo $store_batchmas->OTEMPMRA->viewAttributes() ?>>
<?php echo $store_batchmas->OTEMPMRA->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_batchmas->ACTIVESTATUS->Visible) { // ACTIVESTATUS ?>
		<td data-name="ACTIVESTATUS"<?php echo $store_batchmas->ACTIVESTATUS->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_list->RowCnt ?>_store_batchmas_ACTIVESTATUS" class="store_batchmas_ACTIVESTATUS">
<span<?php echo $store_batchmas->ACTIVESTATUS->viewAttributes() ?>>
<?php echo $store_batchmas->ACTIVESTATUS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_batchmas->id->Visible) { // id ?>
		<td data-name="id"<?php echo $store_batchmas->id->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_list->RowCnt ?>_store_batchmas_id" class="store_batchmas_id">
<span<?php echo $store_batchmas->id->viewAttributes() ?>>
<?php echo $store_batchmas->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_batchmas->PrName->Visible) { // PrName ?>
		<td data-name="PrName"<?php echo $store_batchmas->PrName->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_list->RowCnt ?>_store_batchmas_PrName" class="store_batchmas_PrName">
<span<?php echo $store_batchmas->PrName->viewAttributes() ?>>
<?php echo $store_batchmas->PrName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_batchmas->PSGST->Visible) { // PSGST ?>
		<td data-name="PSGST"<?php echo $store_batchmas->PSGST->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_list->RowCnt ?>_store_batchmas_PSGST" class="store_batchmas_PSGST">
<span<?php echo $store_batchmas->PSGST->viewAttributes() ?>>
<?php echo $store_batchmas->PSGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_batchmas->PCGST->Visible) { // PCGST ?>
		<td data-name="PCGST"<?php echo $store_batchmas->PCGST->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_list->RowCnt ?>_store_batchmas_PCGST" class="store_batchmas_PCGST">
<span<?php echo $store_batchmas->PCGST->viewAttributes() ?>>
<?php echo $store_batchmas->PCGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_batchmas->SSGST->Visible) { // SSGST ?>
		<td data-name="SSGST"<?php echo $store_batchmas->SSGST->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_list->RowCnt ?>_store_batchmas_SSGST" class="store_batchmas_SSGST">
<span<?php echo $store_batchmas->SSGST->viewAttributes() ?>>
<?php echo $store_batchmas->SSGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_batchmas->SCGST->Visible) { // SCGST ?>
		<td data-name="SCGST"<?php echo $store_batchmas->SCGST->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_list->RowCnt ?>_store_batchmas_SCGST" class="store_batchmas_SCGST">
<span<?php echo $store_batchmas->SCGST->viewAttributes() ?>>
<?php echo $store_batchmas->SCGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_batchmas->MFRCODE->Visible) { // MFRCODE ?>
		<td data-name="MFRCODE"<?php echo $store_batchmas->MFRCODE->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_list->RowCnt ?>_store_batchmas_MFRCODE" class="store_batchmas_MFRCODE">
<span<?php echo $store_batchmas->MFRCODE->viewAttributes() ?>>
<?php echo $store_batchmas->MFRCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_batchmas->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE"<?php echo $store_batchmas->BRCODE->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_list->RowCnt ?>_store_batchmas_BRCODE" class="store_batchmas_BRCODE">
<span<?php echo $store_batchmas->BRCODE->viewAttributes() ?>>
<?php echo $store_batchmas->BRCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_batchmas->FRQ->Visible) { // FRQ ?>
		<td data-name="FRQ"<?php echo $store_batchmas->FRQ->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_list->RowCnt ?>_store_batchmas_FRQ" class="store_batchmas_FRQ">
<span<?php echo $store_batchmas->FRQ->viewAttributes() ?>>
<?php echo $store_batchmas->FRQ->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_batchmas->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $store_batchmas->HospID->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_list->RowCnt ?>_store_batchmas_HospID" class="store_batchmas_HospID">
<span<?php echo $store_batchmas->HospID->viewAttributes() ?>>
<?php echo $store_batchmas->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_batchmas->UM->Visible) { // UM ?>
		<td data-name="UM"<?php echo $store_batchmas->UM->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_list->RowCnt ?>_store_batchmas_UM" class="store_batchmas_UM">
<span<?php echo $store_batchmas->UM->viewAttributes() ?>>
<?php echo $store_batchmas->UM->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_batchmas->GENNAME->Visible) { // GENNAME ?>
		<td data-name="GENNAME"<?php echo $store_batchmas->GENNAME->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_list->RowCnt ?>_store_batchmas_GENNAME" class="store_batchmas_GENNAME">
<span<?php echo $store_batchmas->GENNAME->viewAttributes() ?>>
<?php echo $store_batchmas->GENNAME->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_batchmas->BILLDATE->Visible) { // BILLDATE ?>
		<td data-name="BILLDATE"<?php echo $store_batchmas->BILLDATE->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_list->RowCnt ?>_store_batchmas_BILLDATE" class="store_batchmas_BILLDATE">
<span<?php echo $store_batchmas->BILLDATE->viewAttributes() ?>>
<?php echo $store_batchmas->BILLDATE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_batchmas->PUnit->Visible) { // PUnit ?>
		<td data-name="PUnit"<?php echo $store_batchmas->PUnit->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_list->RowCnt ?>_store_batchmas_PUnit" class="store_batchmas_PUnit">
<span<?php echo $store_batchmas->PUnit->viewAttributes() ?>>
<?php echo $store_batchmas->PUnit->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_batchmas->SUnit->Visible) { // SUnit ?>
		<td data-name="SUnit"<?php echo $store_batchmas->SUnit->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_list->RowCnt ?>_store_batchmas_SUnit" class="store_batchmas_SUnit">
<span<?php echo $store_batchmas->SUnit->viewAttributes() ?>>
<?php echo $store_batchmas->SUnit->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_batchmas->PurValue->Visible) { // PurValue ?>
		<td data-name="PurValue"<?php echo $store_batchmas->PurValue->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_list->RowCnt ?>_store_batchmas_PurValue" class="store_batchmas_PurValue">
<span<?php echo $store_batchmas->PurValue->viewAttributes() ?>>
<?php echo $store_batchmas->PurValue->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_batchmas->PurRate->Visible) { // PurRate ?>
		<td data-name="PurRate"<?php echo $store_batchmas->PurRate->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_list->RowCnt ?>_store_batchmas_PurRate" class="store_batchmas_PurRate">
<span<?php echo $store_batchmas->PurRate->viewAttributes() ?>>
<?php echo $store_batchmas->PurRate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_batchmas->StoreID->Visible) { // StoreID ?>
		<td data-name="StoreID"<?php echo $store_batchmas->StoreID->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_list->RowCnt ?>_store_batchmas_StoreID" class="store_batchmas_StoreID">
<span<?php echo $store_batchmas->StoreID->viewAttributes() ?>>
<?php echo $store_batchmas->StoreID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$store_batchmas_list->ListOptions->render("body", "right", $store_batchmas_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$store_batchmas->isGridAdd())
		$store_batchmas_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$store_batchmas->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($store_batchmas_list->Recordset)
	$store_batchmas_list->Recordset->Close();
?>
<?php if (!$store_batchmas->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$store_batchmas->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($store_batchmas_list->Pager)) $store_batchmas_list->Pager = new NumericPager($store_batchmas_list->StartRec, $store_batchmas_list->DisplayRecs, $store_batchmas_list->TotalRecs, $store_batchmas_list->RecRange, $store_batchmas_list->AutoHidePager) ?>
<?php if ($store_batchmas_list->Pager->RecordCount > 0 && $store_batchmas_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($store_batchmas_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $store_batchmas_list->pageUrl() ?>start=<?php echo $store_batchmas_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($store_batchmas_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $store_batchmas_list->pageUrl() ?>start=<?php echo $store_batchmas_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($store_batchmas_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $store_batchmas_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($store_batchmas_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $store_batchmas_list->pageUrl() ?>start=<?php echo $store_batchmas_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($store_batchmas_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $store_batchmas_list->pageUrl() ?>start=<?php echo $store_batchmas_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($store_batchmas_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $store_batchmas_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $store_batchmas_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $store_batchmas_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($store_batchmas_list->TotalRecs > 0 && (!$store_batchmas_list->AutoHidePageSizeSelector || $store_batchmas_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="store_batchmas">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($store_batchmas_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($store_batchmas_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($store_batchmas_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($store_batchmas_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($store_batchmas_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($store_batchmas_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($store_batchmas->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $store_batchmas_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($store_batchmas_list->TotalRecs == 0 && !$store_batchmas->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $store_batchmas_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$store_batchmas_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$store_batchmas->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$store_batchmas->isExport()) { ?>
<script>
ew.scrollableTable("gmp_store_batchmas", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$store_batchmas_list->terminate();
?>
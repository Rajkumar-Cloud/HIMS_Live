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
$store_purchaseorder_list = new store_purchaseorder_list();

// Run the page
$store_purchaseorder_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$store_purchaseorder_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$store_purchaseorder->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fstore_purchaseorderlist = currentForm = new ew.Form("fstore_purchaseorderlist", "list");
fstore_purchaseorderlist.formKeyCountName = '<?php echo $store_purchaseorder_list->FormKeyCountName ?>';

// Form_CustomValidate event
fstore_purchaseorderlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fstore_purchaseorderlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fstore_purchaseorderlistsrch = currentSearchForm = new ew.Form("fstore_purchaseorderlistsrch");

// Filters
fstore_purchaseorderlistsrch.filterList = <?php echo $store_purchaseorder_list->getFilterList() ?>;
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
<?php if (!$store_purchaseorder->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($store_purchaseorder_list->TotalRecs > 0 && $store_purchaseorder_list->ExportOptions->visible()) { ?>
<?php $store_purchaseorder_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($store_purchaseorder_list->ImportOptions->visible()) { ?>
<?php $store_purchaseorder_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($store_purchaseorder_list->SearchOptions->visible()) { ?>
<?php $store_purchaseorder_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($store_purchaseorder_list->FilterOptions->visible()) { ?>
<?php $store_purchaseorder_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$store_purchaseorder_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$store_purchaseorder->isExport() && !$store_purchaseorder->CurrentAction) { ?>
<form name="fstore_purchaseorderlistsrch" id="fstore_purchaseorderlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($store_purchaseorder_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fstore_purchaseorderlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="store_purchaseorder">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($store_purchaseorder_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($store_purchaseorder_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $store_purchaseorder_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($store_purchaseorder_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($store_purchaseorder_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($store_purchaseorder_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($store_purchaseorder_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $store_purchaseorder_list->showPageHeader(); ?>
<?php
$store_purchaseorder_list->showMessage();
?>
<?php if ($store_purchaseorder_list->TotalRecs > 0 || $store_purchaseorder->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($store_purchaseorder_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> store_purchaseorder">
<?php if (!$store_purchaseorder->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$store_purchaseorder->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($store_purchaseorder_list->Pager)) $store_purchaseorder_list->Pager = new NumericPager($store_purchaseorder_list->StartRec, $store_purchaseorder_list->DisplayRecs, $store_purchaseorder_list->TotalRecs, $store_purchaseorder_list->RecRange, $store_purchaseorder_list->AutoHidePager) ?>
<?php if ($store_purchaseorder_list->Pager->RecordCount > 0 && $store_purchaseorder_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($store_purchaseorder_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $store_purchaseorder_list->pageUrl() ?>start=<?php echo $store_purchaseorder_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($store_purchaseorder_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $store_purchaseorder_list->pageUrl() ?>start=<?php echo $store_purchaseorder_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($store_purchaseorder_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $store_purchaseorder_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($store_purchaseorder_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $store_purchaseorder_list->pageUrl() ?>start=<?php echo $store_purchaseorder_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($store_purchaseorder_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $store_purchaseorder_list->pageUrl() ?>start=<?php echo $store_purchaseorder_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($store_purchaseorder_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $store_purchaseorder_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $store_purchaseorder_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $store_purchaseorder_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($store_purchaseorder_list->TotalRecs > 0 && (!$store_purchaseorder_list->AutoHidePageSizeSelector || $store_purchaseorder_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="store_purchaseorder">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($store_purchaseorder_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($store_purchaseorder_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($store_purchaseorder_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($store_purchaseorder_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($store_purchaseorder_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($store_purchaseorder_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($store_purchaseorder->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $store_purchaseorder_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fstore_purchaseorderlist" id="fstore_purchaseorderlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($store_purchaseorder_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $store_purchaseorder_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="store_purchaseorder">
<div id="gmp_store_purchaseorder" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($store_purchaseorder_list->TotalRecs > 0 || $store_purchaseorder->isGridEdit()) { ?>
<table id="tbl_store_purchaseorderlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$store_purchaseorder_list->RowType = ROWTYPE_HEADER;

// Render list options
$store_purchaseorder_list->renderListOptions();

// Render list options (header, left)
$store_purchaseorder_list->ListOptions->render("header", "left");
?>
<?php if ($store_purchaseorder->ORDNO->Visible) { // ORDNO ?>
	<?php if ($store_purchaseorder->sortUrl($store_purchaseorder->ORDNO) == "") { ?>
		<th data-name="ORDNO" class="<?php echo $store_purchaseorder->ORDNO->headerCellClass() ?>"><div id="elh_store_purchaseorder_ORDNO" class="store_purchaseorder_ORDNO"><div class="ew-table-header-caption"><?php echo $store_purchaseorder->ORDNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ORDNO" class="<?php echo $store_purchaseorder->ORDNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_purchaseorder->SortUrl($store_purchaseorder->ORDNO) ?>',1);"><div id="elh_store_purchaseorder_ORDNO" class="store_purchaseorder_ORDNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_purchaseorder->ORDNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_purchaseorder->ORDNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_purchaseorder->ORDNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_purchaseorder->PRC->Visible) { // PRC ?>
	<?php if ($store_purchaseorder->sortUrl($store_purchaseorder->PRC) == "") { ?>
		<th data-name="PRC" class="<?php echo $store_purchaseorder->PRC->headerCellClass() ?>"><div id="elh_store_purchaseorder_PRC" class="store_purchaseorder_PRC"><div class="ew-table-header-caption"><?php echo $store_purchaseorder->PRC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRC" class="<?php echo $store_purchaseorder->PRC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_purchaseorder->SortUrl($store_purchaseorder->PRC) ?>',1);"><div id="elh_store_purchaseorder_PRC" class="store_purchaseorder_PRC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_purchaseorder->PRC->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_purchaseorder->PRC->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_purchaseorder->PRC->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_purchaseorder->QTY->Visible) { // QTY ?>
	<?php if ($store_purchaseorder->sortUrl($store_purchaseorder->QTY) == "") { ?>
		<th data-name="QTY" class="<?php echo $store_purchaseorder->QTY->headerCellClass() ?>"><div id="elh_store_purchaseorder_QTY" class="store_purchaseorder_QTY"><div class="ew-table-header-caption"><?php echo $store_purchaseorder->QTY->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="QTY" class="<?php echo $store_purchaseorder->QTY->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_purchaseorder->SortUrl($store_purchaseorder->QTY) ?>',1);"><div id="elh_store_purchaseorder_QTY" class="store_purchaseorder_QTY">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_purchaseorder->QTY->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_purchaseorder->QTY->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_purchaseorder->QTY->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_purchaseorder->DT->Visible) { // DT ?>
	<?php if ($store_purchaseorder->sortUrl($store_purchaseorder->DT) == "") { ?>
		<th data-name="DT" class="<?php echo $store_purchaseorder->DT->headerCellClass() ?>"><div id="elh_store_purchaseorder_DT" class="store_purchaseorder_DT"><div class="ew-table-header-caption"><?php echo $store_purchaseorder->DT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DT" class="<?php echo $store_purchaseorder->DT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_purchaseorder->SortUrl($store_purchaseorder->DT) ?>',1);"><div id="elh_store_purchaseorder_DT" class="store_purchaseorder_DT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_purchaseorder->DT->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_purchaseorder->DT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_purchaseorder->DT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_purchaseorder->PC->Visible) { // PC ?>
	<?php if ($store_purchaseorder->sortUrl($store_purchaseorder->PC) == "") { ?>
		<th data-name="PC" class="<?php echo $store_purchaseorder->PC->headerCellClass() ?>"><div id="elh_store_purchaseorder_PC" class="store_purchaseorder_PC"><div class="ew-table-header-caption"><?php echo $store_purchaseorder->PC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PC" class="<?php echo $store_purchaseorder->PC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_purchaseorder->SortUrl($store_purchaseorder->PC) ?>',1);"><div id="elh_store_purchaseorder_PC" class="store_purchaseorder_PC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_purchaseorder->PC->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_purchaseorder->PC->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_purchaseorder->PC->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_purchaseorder->YM->Visible) { // YM ?>
	<?php if ($store_purchaseorder->sortUrl($store_purchaseorder->YM) == "") { ?>
		<th data-name="YM" class="<?php echo $store_purchaseorder->YM->headerCellClass() ?>"><div id="elh_store_purchaseorder_YM" class="store_purchaseorder_YM"><div class="ew-table-header-caption"><?php echo $store_purchaseorder->YM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="YM" class="<?php echo $store_purchaseorder->YM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_purchaseorder->SortUrl($store_purchaseorder->YM) ?>',1);"><div id="elh_store_purchaseorder_YM" class="store_purchaseorder_YM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_purchaseorder->YM->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_purchaseorder->YM->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_purchaseorder->YM->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_purchaseorder->MFRCODE->Visible) { // MFRCODE ?>
	<?php if ($store_purchaseorder->sortUrl($store_purchaseorder->MFRCODE) == "") { ?>
		<th data-name="MFRCODE" class="<?php echo $store_purchaseorder->MFRCODE->headerCellClass() ?>"><div id="elh_store_purchaseorder_MFRCODE" class="store_purchaseorder_MFRCODE"><div class="ew-table-header-caption"><?php echo $store_purchaseorder->MFRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MFRCODE" class="<?php echo $store_purchaseorder->MFRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_purchaseorder->SortUrl($store_purchaseorder->MFRCODE) ?>',1);"><div id="elh_store_purchaseorder_MFRCODE" class="store_purchaseorder_MFRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_purchaseorder->MFRCODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_purchaseorder->MFRCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_purchaseorder->MFRCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_purchaseorder->Stock->Visible) { // Stock ?>
	<?php if ($store_purchaseorder->sortUrl($store_purchaseorder->Stock) == "") { ?>
		<th data-name="Stock" class="<?php echo $store_purchaseorder->Stock->headerCellClass() ?>"><div id="elh_store_purchaseorder_Stock" class="store_purchaseorder_Stock"><div class="ew-table-header-caption"><?php echo $store_purchaseorder->Stock->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Stock" class="<?php echo $store_purchaseorder->Stock->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_purchaseorder->SortUrl($store_purchaseorder->Stock) ?>',1);"><div id="elh_store_purchaseorder_Stock" class="store_purchaseorder_Stock">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_purchaseorder->Stock->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_purchaseorder->Stock->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_purchaseorder->Stock->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_purchaseorder->LastMonthSale->Visible) { // LastMonthSale ?>
	<?php if ($store_purchaseorder->sortUrl($store_purchaseorder->LastMonthSale) == "") { ?>
		<th data-name="LastMonthSale" class="<?php echo $store_purchaseorder->LastMonthSale->headerCellClass() ?>"><div id="elh_store_purchaseorder_LastMonthSale" class="store_purchaseorder_LastMonthSale"><div class="ew-table-header-caption"><?php echo $store_purchaseorder->LastMonthSale->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LastMonthSale" class="<?php echo $store_purchaseorder->LastMonthSale->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_purchaseorder->SortUrl($store_purchaseorder->LastMonthSale) ?>',1);"><div id="elh_store_purchaseorder_LastMonthSale" class="store_purchaseorder_LastMonthSale">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_purchaseorder->LastMonthSale->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_purchaseorder->LastMonthSale->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_purchaseorder->LastMonthSale->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_purchaseorder->Printcheck->Visible) { // Printcheck ?>
	<?php if ($store_purchaseorder->sortUrl($store_purchaseorder->Printcheck) == "") { ?>
		<th data-name="Printcheck" class="<?php echo $store_purchaseorder->Printcheck->headerCellClass() ?>"><div id="elh_store_purchaseorder_Printcheck" class="store_purchaseorder_Printcheck"><div class="ew-table-header-caption"><?php echo $store_purchaseorder->Printcheck->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Printcheck" class="<?php echo $store_purchaseorder->Printcheck->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_purchaseorder->SortUrl($store_purchaseorder->Printcheck) ?>',1);"><div id="elh_store_purchaseorder_Printcheck" class="store_purchaseorder_Printcheck">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_purchaseorder->Printcheck->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_purchaseorder->Printcheck->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_purchaseorder->Printcheck->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_purchaseorder->id->Visible) { // id ?>
	<?php if ($store_purchaseorder->sortUrl($store_purchaseorder->id) == "") { ?>
		<th data-name="id" class="<?php echo $store_purchaseorder->id->headerCellClass() ?>"><div id="elh_store_purchaseorder_id" class="store_purchaseorder_id"><div class="ew-table-header-caption"><?php echo $store_purchaseorder->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $store_purchaseorder->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_purchaseorder->SortUrl($store_purchaseorder->id) ?>',1);"><div id="elh_store_purchaseorder_id" class="store_purchaseorder_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_purchaseorder->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_purchaseorder->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_purchaseorder->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_purchaseorder->poid->Visible) { // poid ?>
	<?php if ($store_purchaseorder->sortUrl($store_purchaseorder->poid) == "") { ?>
		<th data-name="poid" class="<?php echo $store_purchaseorder->poid->headerCellClass() ?>"><div id="elh_store_purchaseorder_poid" class="store_purchaseorder_poid"><div class="ew-table-header-caption"><?php echo $store_purchaseorder->poid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="poid" class="<?php echo $store_purchaseorder->poid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_purchaseorder->SortUrl($store_purchaseorder->poid) ?>',1);"><div id="elh_store_purchaseorder_poid" class="store_purchaseorder_poid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_purchaseorder->poid->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_purchaseorder->poid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_purchaseorder->poid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_purchaseorder->grnid->Visible) { // grnid ?>
	<?php if ($store_purchaseorder->sortUrl($store_purchaseorder->grnid) == "") { ?>
		<th data-name="grnid" class="<?php echo $store_purchaseorder->grnid->headerCellClass() ?>"><div id="elh_store_purchaseorder_grnid" class="store_purchaseorder_grnid"><div class="ew-table-header-caption"><?php echo $store_purchaseorder->grnid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="grnid" class="<?php echo $store_purchaseorder->grnid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_purchaseorder->SortUrl($store_purchaseorder->grnid) ?>',1);"><div id="elh_store_purchaseorder_grnid" class="store_purchaseorder_grnid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_purchaseorder->grnid->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_purchaseorder->grnid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_purchaseorder->grnid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_purchaseorder->BatchNo->Visible) { // BatchNo ?>
	<?php if ($store_purchaseorder->sortUrl($store_purchaseorder->BatchNo) == "") { ?>
		<th data-name="BatchNo" class="<?php echo $store_purchaseorder->BatchNo->headerCellClass() ?>"><div id="elh_store_purchaseorder_BatchNo" class="store_purchaseorder_BatchNo"><div class="ew-table-header-caption"><?php echo $store_purchaseorder->BatchNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BatchNo" class="<?php echo $store_purchaseorder->BatchNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_purchaseorder->SortUrl($store_purchaseorder->BatchNo) ?>',1);"><div id="elh_store_purchaseorder_BatchNo" class="store_purchaseorder_BatchNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_purchaseorder->BatchNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_purchaseorder->BatchNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_purchaseorder->BatchNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_purchaseorder->ExpDate->Visible) { // ExpDate ?>
	<?php if ($store_purchaseorder->sortUrl($store_purchaseorder->ExpDate) == "") { ?>
		<th data-name="ExpDate" class="<?php echo $store_purchaseorder->ExpDate->headerCellClass() ?>"><div id="elh_store_purchaseorder_ExpDate" class="store_purchaseorder_ExpDate"><div class="ew-table-header-caption"><?php echo $store_purchaseorder->ExpDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ExpDate" class="<?php echo $store_purchaseorder->ExpDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_purchaseorder->SortUrl($store_purchaseorder->ExpDate) ?>',1);"><div id="elh_store_purchaseorder_ExpDate" class="store_purchaseorder_ExpDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_purchaseorder->ExpDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_purchaseorder->ExpDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_purchaseorder->ExpDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_purchaseorder->PrName->Visible) { // PrName ?>
	<?php if ($store_purchaseorder->sortUrl($store_purchaseorder->PrName) == "") { ?>
		<th data-name="PrName" class="<?php echo $store_purchaseorder->PrName->headerCellClass() ?>"><div id="elh_store_purchaseorder_PrName" class="store_purchaseorder_PrName"><div class="ew-table-header-caption"><?php echo $store_purchaseorder->PrName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrName" class="<?php echo $store_purchaseorder->PrName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_purchaseorder->SortUrl($store_purchaseorder->PrName) ?>',1);"><div id="elh_store_purchaseorder_PrName" class="store_purchaseorder_PrName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_purchaseorder->PrName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_purchaseorder->PrName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_purchaseorder->PrName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_purchaseorder->Quantity->Visible) { // Quantity ?>
	<?php if ($store_purchaseorder->sortUrl($store_purchaseorder->Quantity) == "") { ?>
		<th data-name="Quantity" class="<?php echo $store_purchaseorder->Quantity->headerCellClass() ?>"><div id="elh_store_purchaseorder_Quantity" class="store_purchaseorder_Quantity"><div class="ew-table-header-caption"><?php echo $store_purchaseorder->Quantity->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Quantity" class="<?php echo $store_purchaseorder->Quantity->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_purchaseorder->SortUrl($store_purchaseorder->Quantity) ?>',1);"><div id="elh_store_purchaseorder_Quantity" class="store_purchaseorder_Quantity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_purchaseorder->Quantity->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_purchaseorder->Quantity->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_purchaseorder->Quantity->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_purchaseorder->FreeQty->Visible) { // FreeQty ?>
	<?php if ($store_purchaseorder->sortUrl($store_purchaseorder->FreeQty) == "") { ?>
		<th data-name="FreeQty" class="<?php echo $store_purchaseorder->FreeQty->headerCellClass() ?>"><div id="elh_store_purchaseorder_FreeQty" class="store_purchaseorder_FreeQty"><div class="ew-table-header-caption"><?php echo $store_purchaseorder->FreeQty->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FreeQty" class="<?php echo $store_purchaseorder->FreeQty->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_purchaseorder->SortUrl($store_purchaseorder->FreeQty) ?>',1);"><div id="elh_store_purchaseorder_FreeQty" class="store_purchaseorder_FreeQty">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_purchaseorder->FreeQty->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_purchaseorder->FreeQty->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_purchaseorder->FreeQty->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_purchaseorder->ItemValue->Visible) { // ItemValue ?>
	<?php if ($store_purchaseorder->sortUrl($store_purchaseorder->ItemValue) == "") { ?>
		<th data-name="ItemValue" class="<?php echo $store_purchaseorder->ItemValue->headerCellClass() ?>"><div id="elh_store_purchaseorder_ItemValue" class="store_purchaseorder_ItemValue"><div class="ew-table-header-caption"><?php echo $store_purchaseorder->ItemValue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ItemValue" class="<?php echo $store_purchaseorder->ItemValue->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_purchaseorder->SortUrl($store_purchaseorder->ItemValue) ?>',1);"><div id="elh_store_purchaseorder_ItemValue" class="store_purchaseorder_ItemValue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_purchaseorder->ItemValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_purchaseorder->ItemValue->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_purchaseorder->ItemValue->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_purchaseorder->Disc->Visible) { // Disc ?>
	<?php if ($store_purchaseorder->sortUrl($store_purchaseorder->Disc) == "") { ?>
		<th data-name="Disc" class="<?php echo $store_purchaseorder->Disc->headerCellClass() ?>"><div id="elh_store_purchaseorder_Disc" class="store_purchaseorder_Disc"><div class="ew-table-header-caption"><?php echo $store_purchaseorder->Disc->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Disc" class="<?php echo $store_purchaseorder->Disc->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_purchaseorder->SortUrl($store_purchaseorder->Disc) ?>',1);"><div id="elh_store_purchaseorder_Disc" class="store_purchaseorder_Disc">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_purchaseorder->Disc->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_purchaseorder->Disc->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_purchaseorder->Disc->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_purchaseorder->PTax->Visible) { // PTax ?>
	<?php if ($store_purchaseorder->sortUrl($store_purchaseorder->PTax) == "") { ?>
		<th data-name="PTax" class="<?php echo $store_purchaseorder->PTax->headerCellClass() ?>"><div id="elh_store_purchaseorder_PTax" class="store_purchaseorder_PTax"><div class="ew-table-header-caption"><?php echo $store_purchaseorder->PTax->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PTax" class="<?php echo $store_purchaseorder->PTax->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_purchaseorder->SortUrl($store_purchaseorder->PTax) ?>',1);"><div id="elh_store_purchaseorder_PTax" class="store_purchaseorder_PTax">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_purchaseorder->PTax->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_purchaseorder->PTax->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_purchaseorder->PTax->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_purchaseorder->MRP->Visible) { // MRP ?>
	<?php if ($store_purchaseorder->sortUrl($store_purchaseorder->MRP) == "") { ?>
		<th data-name="MRP" class="<?php echo $store_purchaseorder->MRP->headerCellClass() ?>"><div id="elh_store_purchaseorder_MRP" class="store_purchaseorder_MRP"><div class="ew-table-header-caption"><?php echo $store_purchaseorder->MRP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MRP" class="<?php echo $store_purchaseorder->MRP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_purchaseorder->SortUrl($store_purchaseorder->MRP) ?>',1);"><div id="elh_store_purchaseorder_MRP" class="store_purchaseorder_MRP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_purchaseorder->MRP->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_purchaseorder->MRP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_purchaseorder->MRP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_purchaseorder->SalTax->Visible) { // SalTax ?>
	<?php if ($store_purchaseorder->sortUrl($store_purchaseorder->SalTax) == "") { ?>
		<th data-name="SalTax" class="<?php echo $store_purchaseorder->SalTax->headerCellClass() ?>"><div id="elh_store_purchaseorder_SalTax" class="store_purchaseorder_SalTax"><div class="ew-table-header-caption"><?php echo $store_purchaseorder->SalTax->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SalTax" class="<?php echo $store_purchaseorder->SalTax->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_purchaseorder->SortUrl($store_purchaseorder->SalTax) ?>',1);"><div id="elh_store_purchaseorder_SalTax" class="store_purchaseorder_SalTax">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_purchaseorder->SalTax->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_purchaseorder->SalTax->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_purchaseorder->SalTax->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_purchaseorder->PurValue->Visible) { // PurValue ?>
	<?php if ($store_purchaseorder->sortUrl($store_purchaseorder->PurValue) == "") { ?>
		<th data-name="PurValue" class="<?php echo $store_purchaseorder->PurValue->headerCellClass() ?>"><div id="elh_store_purchaseorder_PurValue" class="store_purchaseorder_PurValue"><div class="ew-table-header-caption"><?php echo $store_purchaseorder->PurValue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PurValue" class="<?php echo $store_purchaseorder->PurValue->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_purchaseorder->SortUrl($store_purchaseorder->PurValue) ?>',1);"><div id="elh_store_purchaseorder_PurValue" class="store_purchaseorder_PurValue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_purchaseorder->PurValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_purchaseorder->PurValue->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_purchaseorder->PurValue->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_purchaseorder->PurRate->Visible) { // PurRate ?>
	<?php if ($store_purchaseorder->sortUrl($store_purchaseorder->PurRate) == "") { ?>
		<th data-name="PurRate" class="<?php echo $store_purchaseorder->PurRate->headerCellClass() ?>"><div id="elh_store_purchaseorder_PurRate" class="store_purchaseorder_PurRate"><div class="ew-table-header-caption"><?php echo $store_purchaseorder->PurRate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PurRate" class="<?php echo $store_purchaseorder->PurRate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_purchaseorder->SortUrl($store_purchaseorder->PurRate) ?>',1);"><div id="elh_store_purchaseorder_PurRate" class="store_purchaseorder_PurRate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_purchaseorder->PurRate->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_purchaseorder->PurRate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_purchaseorder->PurRate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_purchaseorder->SalRate->Visible) { // SalRate ?>
	<?php if ($store_purchaseorder->sortUrl($store_purchaseorder->SalRate) == "") { ?>
		<th data-name="SalRate" class="<?php echo $store_purchaseorder->SalRate->headerCellClass() ?>"><div id="elh_store_purchaseorder_SalRate" class="store_purchaseorder_SalRate"><div class="ew-table-header-caption"><?php echo $store_purchaseorder->SalRate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SalRate" class="<?php echo $store_purchaseorder->SalRate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_purchaseorder->SortUrl($store_purchaseorder->SalRate) ?>',1);"><div id="elh_store_purchaseorder_SalRate" class="store_purchaseorder_SalRate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_purchaseorder->SalRate->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_purchaseorder->SalRate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_purchaseorder->SalRate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_purchaseorder->Discount->Visible) { // Discount ?>
	<?php if ($store_purchaseorder->sortUrl($store_purchaseorder->Discount) == "") { ?>
		<th data-name="Discount" class="<?php echo $store_purchaseorder->Discount->headerCellClass() ?>"><div id="elh_store_purchaseorder_Discount" class="store_purchaseorder_Discount"><div class="ew-table-header-caption"><?php echo $store_purchaseorder->Discount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Discount" class="<?php echo $store_purchaseorder->Discount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_purchaseorder->SortUrl($store_purchaseorder->Discount) ?>',1);"><div id="elh_store_purchaseorder_Discount" class="store_purchaseorder_Discount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_purchaseorder->Discount->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_purchaseorder->Discount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_purchaseorder->Discount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_purchaseorder->PSGST->Visible) { // PSGST ?>
	<?php if ($store_purchaseorder->sortUrl($store_purchaseorder->PSGST) == "") { ?>
		<th data-name="PSGST" class="<?php echo $store_purchaseorder->PSGST->headerCellClass() ?>"><div id="elh_store_purchaseorder_PSGST" class="store_purchaseorder_PSGST"><div class="ew-table-header-caption"><?php echo $store_purchaseorder->PSGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PSGST" class="<?php echo $store_purchaseorder->PSGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_purchaseorder->SortUrl($store_purchaseorder->PSGST) ?>',1);"><div id="elh_store_purchaseorder_PSGST" class="store_purchaseorder_PSGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_purchaseorder->PSGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_purchaseorder->PSGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_purchaseorder->PSGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_purchaseorder->PCGST->Visible) { // PCGST ?>
	<?php if ($store_purchaseorder->sortUrl($store_purchaseorder->PCGST) == "") { ?>
		<th data-name="PCGST" class="<?php echo $store_purchaseorder->PCGST->headerCellClass() ?>"><div id="elh_store_purchaseorder_PCGST" class="store_purchaseorder_PCGST"><div class="ew-table-header-caption"><?php echo $store_purchaseorder->PCGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PCGST" class="<?php echo $store_purchaseorder->PCGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_purchaseorder->SortUrl($store_purchaseorder->PCGST) ?>',1);"><div id="elh_store_purchaseorder_PCGST" class="store_purchaseorder_PCGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_purchaseorder->PCGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_purchaseorder->PCGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_purchaseorder->PCGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_purchaseorder->SSGST->Visible) { // SSGST ?>
	<?php if ($store_purchaseorder->sortUrl($store_purchaseorder->SSGST) == "") { ?>
		<th data-name="SSGST" class="<?php echo $store_purchaseorder->SSGST->headerCellClass() ?>"><div id="elh_store_purchaseorder_SSGST" class="store_purchaseorder_SSGST"><div class="ew-table-header-caption"><?php echo $store_purchaseorder->SSGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SSGST" class="<?php echo $store_purchaseorder->SSGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_purchaseorder->SortUrl($store_purchaseorder->SSGST) ?>',1);"><div id="elh_store_purchaseorder_SSGST" class="store_purchaseorder_SSGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_purchaseorder->SSGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_purchaseorder->SSGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_purchaseorder->SSGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_purchaseorder->SCGST->Visible) { // SCGST ?>
	<?php if ($store_purchaseorder->sortUrl($store_purchaseorder->SCGST) == "") { ?>
		<th data-name="SCGST" class="<?php echo $store_purchaseorder->SCGST->headerCellClass() ?>"><div id="elh_store_purchaseorder_SCGST" class="store_purchaseorder_SCGST"><div class="ew-table-header-caption"><?php echo $store_purchaseorder->SCGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SCGST" class="<?php echo $store_purchaseorder->SCGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_purchaseorder->SortUrl($store_purchaseorder->SCGST) ?>',1);"><div id="elh_store_purchaseorder_SCGST" class="store_purchaseorder_SCGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_purchaseorder->SCGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_purchaseorder->SCGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_purchaseorder->SCGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_purchaseorder->BRCODE->Visible) { // BRCODE ?>
	<?php if ($store_purchaseorder->sortUrl($store_purchaseorder->BRCODE) == "") { ?>
		<th data-name="BRCODE" class="<?php echo $store_purchaseorder->BRCODE->headerCellClass() ?>"><div id="elh_store_purchaseorder_BRCODE" class="store_purchaseorder_BRCODE"><div class="ew-table-header-caption"><?php echo $store_purchaseorder->BRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BRCODE" class="<?php echo $store_purchaseorder->BRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_purchaseorder->SortUrl($store_purchaseorder->BRCODE) ?>',1);"><div id="elh_store_purchaseorder_BRCODE" class="store_purchaseorder_BRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_purchaseorder->BRCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_purchaseorder->BRCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_purchaseorder->BRCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_purchaseorder->HSN->Visible) { // HSN ?>
	<?php if ($store_purchaseorder->sortUrl($store_purchaseorder->HSN) == "") { ?>
		<th data-name="HSN" class="<?php echo $store_purchaseorder->HSN->headerCellClass() ?>"><div id="elh_store_purchaseorder_HSN" class="store_purchaseorder_HSN"><div class="ew-table-header-caption"><?php echo $store_purchaseorder->HSN->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HSN" class="<?php echo $store_purchaseorder->HSN->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_purchaseorder->SortUrl($store_purchaseorder->HSN) ?>',1);"><div id="elh_store_purchaseorder_HSN" class="store_purchaseorder_HSN">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_purchaseorder->HSN->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_purchaseorder->HSN->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_purchaseorder->HSN->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_purchaseorder->Pack->Visible) { // Pack ?>
	<?php if ($store_purchaseorder->sortUrl($store_purchaseorder->Pack) == "") { ?>
		<th data-name="Pack" class="<?php echo $store_purchaseorder->Pack->headerCellClass() ?>"><div id="elh_store_purchaseorder_Pack" class="store_purchaseorder_Pack"><div class="ew-table-header-caption"><?php echo $store_purchaseorder->Pack->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pack" class="<?php echo $store_purchaseorder->Pack->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_purchaseorder->SortUrl($store_purchaseorder->Pack) ?>',1);"><div id="elh_store_purchaseorder_Pack" class="store_purchaseorder_Pack">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_purchaseorder->Pack->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_purchaseorder->Pack->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_purchaseorder->Pack->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_purchaseorder->PUnit->Visible) { // PUnit ?>
	<?php if ($store_purchaseorder->sortUrl($store_purchaseorder->PUnit) == "") { ?>
		<th data-name="PUnit" class="<?php echo $store_purchaseorder->PUnit->headerCellClass() ?>"><div id="elh_store_purchaseorder_PUnit" class="store_purchaseorder_PUnit"><div class="ew-table-header-caption"><?php echo $store_purchaseorder->PUnit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PUnit" class="<?php echo $store_purchaseorder->PUnit->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_purchaseorder->SortUrl($store_purchaseorder->PUnit) ?>',1);"><div id="elh_store_purchaseorder_PUnit" class="store_purchaseorder_PUnit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_purchaseorder->PUnit->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_purchaseorder->PUnit->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_purchaseorder->PUnit->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_purchaseorder->SUnit->Visible) { // SUnit ?>
	<?php if ($store_purchaseorder->sortUrl($store_purchaseorder->SUnit) == "") { ?>
		<th data-name="SUnit" class="<?php echo $store_purchaseorder->SUnit->headerCellClass() ?>"><div id="elh_store_purchaseorder_SUnit" class="store_purchaseorder_SUnit"><div class="ew-table-header-caption"><?php echo $store_purchaseorder->SUnit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SUnit" class="<?php echo $store_purchaseorder->SUnit->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_purchaseorder->SortUrl($store_purchaseorder->SUnit) ?>',1);"><div id="elh_store_purchaseorder_SUnit" class="store_purchaseorder_SUnit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_purchaseorder->SUnit->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_purchaseorder->SUnit->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_purchaseorder->SUnit->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_purchaseorder->GrnQuantity->Visible) { // GrnQuantity ?>
	<?php if ($store_purchaseorder->sortUrl($store_purchaseorder->GrnQuantity) == "") { ?>
		<th data-name="GrnQuantity" class="<?php echo $store_purchaseorder->GrnQuantity->headerCellClass() ?>"><div id="elh_store_purchaseorder_GrnQuantity" class="store_purchaseorder_GrnQuantity"><div class="ew-table-header-caption"><?php echo $store_purchaseorder->GrnQuantity->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GrnQuantity" class="<?php echo $store_purchaseorder->GrnQuantity->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_purchaseorder->SortUrl($store_purchaseorder->GrnQuantity) ?>',1);"><div id="elh_store_purchaseorder_GrnQuantity" class="store_purchaseorder_GrnQuantity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_purchaseorder->GrnQuantity->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_purchaseorder->GrnQuantity->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_purchaseorder->GrnQuantity->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_purchaseorder->GrnMRP->Visible) { // GrnMRP ?>
	<?php if ($store_purchaseorder->sortUrl($store_purchaseorder->GrnMRP) == "") { ?>
		<th data-name="GrnMRP" class="<?php echo $store_purchaseorder->GrnMRP->headerCellClass() ?>"><div id="elh_store_purchaseorder_GrnMRP" class="store_purchaseorder_GrnMRP"><div class="ew-table-header-caption"><?php echo $store_purchaseorder->GrnMRP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GrnMRP" class="<?php echo $store_purchaseorder->GrnMRP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_purchaseorder->SortUrl($store_purchaseorder->GrnMRP) ?>',1);"><div id="elh_store_purchaseorder_GrnMRP" class="store_purchaseorder_GrnMRP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_purchaseorder->GrnMRP->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_purchaseorder->GrnMRP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_purchaseorder->GrnMRP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_purchaseorder->trid->Visible) { // trid ?>
	<?php if ($store_purchaseorder->sortUrl($store_purchaseorder->trid) == "") { ?>
		<th data-name="trid" class="<?php echo $store_purchaseorder->trid->headerCellClass() ?>"><div id="elh_store_purchaseorder_trid" class="store_purchaseorder_trid"><div class="ew-table-header-caption"><?php echo $store_purchaseorder->trid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="trid" class="<?php echo $store_purchaseorder->trid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_purchaseorder->SortUrl($store_purchaseorder->trid) ?>',1);"><div id="elh_store_purchaseorder_trid" class="store_purchaseorder_trid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_purchaseorder->trid->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_purchaseorder->trid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_purchaseorder->trid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_purchaseorder->HospID->Visible) { // HospID ?>
	<?php if ($store_purchaseorder->sortUrl($store_purchaseorder->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $store_purchaseorder->HospID->headerCellClass() ?>"><div id="elh_store_purchaseorder_HospID" class="store_purchaseorder_HospID"><div class="ew-table-header-caption"><?php echo $store_purchaseorder->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $store_purchaseorder->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_purchaseorder->SortUrl($store_purchaseorder->HospID) ?>',1);"><div id="elh_store_purchaseorder_HospID" class="store_purchaseorder_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_purchaseorder->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_purchaseorder->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_purchaseorder->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_purchaseorder->CreatedBy->Visible) { // CreatedBy ?>
	<?php if ($store_purchaseorder->sortUrl($store_purchaseorder->CreatedBy) == "") { ?>
		<th data-name="CreatedBy" class="<?php echo $store_purchaseorder->CreatedBy->headerCellClass() ?>"><div id="elh_store_purchaseorder_CreatedBy" class="store_purchaseorder_CreatedBy"><div class="ew-table-header-caption"><?php echo $store_purchaseorder->CreatedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CreatedBy" class="<?php echo $store_purchaseorder->CreatedBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_purchaseorder->SortUrl($store_purchaseorder->CreatedBy) ?>',1);"><div id="elh_store_purchaseorder_CreatedBy" class="store_purchaseorder_CreatedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_purchaseorder->CreatedBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_purchaseorder->CreatedBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_purchaseorder->CreatedBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_purchaseorder->CreatedDateTime->Visible) { // CreatedDateTime ?>
	<?php if ($store_purchaseorder->sortUrl($store_purchaseorder->CreatedDateTime) == "") { ?>
		<th data-name="CreatedDateTime" class="<?php echo $store_purchaseorder->CreatedDateTime->headerCellClass() ?>"><div id="elh_store_purchaseorder_CreatedDateTime" class="store_purchaseorder_CreatedDateTime"><div class="ew-table-header-caption"><?php echo $store_purchaseorder->CreatedDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CreatedDateTime" class="<?php echo $store_purchaseorder->CreatedDateTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_purchaseorder->SortUrl($store_purchaseorder->CreatedDateTime) ?>',1);"><div id="elh_store_purchaseorder_CreatedDateTime" class="store_purchaseorder_CreatedDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_purchaseorder->CreatedDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_purchaseorder->CreatedDateTime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_purchaseorder->CreatedDateTime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_purchaseorder->ModifiedBy->Visible) { // ModifiedBy ?>
	<?php if ($store_purchaseorder->sortUrl($store_purchaseorder->ModifiedBy) == "") { ?>
		<th data-name="ModifiedBy" class="<?php echo $store_purchaseorder->ModifiedBy->headerCellClass() ?>"><div id="elh_store_purchaseorder_ModifiedBy" class="store_purchaseorder_ModifiedBy"><div class="ew-table-header-caption"><?php echo $store_purchaseorder->ModifiedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModifiedBy" class="<?php echo $store_purchaseorder->ModifiedBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_purchaseorder->SortUrl($store_purchaseorder->ModifiedBy) ?>',1);"><div id="elh_store_purchaseorder_ModifiedBy" class="store_purchaseorder_ModifiedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_purchaseorder->ModifiedBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_purchaseorder->ModifiedBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_purchaseorder->ModifiedBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_purchaseorder->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
	<?php if ($store_purchaseorder->sortUrl($store_purchaseorder->ModifiedDateTime) == "") { ?>
		<th data-name="ModifiedDateTime" class="<?php echo $store_purchaseorder->ModifiedDateTime->headerCellClass() ?>"><div id="elh_store_purchaseorder_ModifiedDateTime" class="store_purchaseorder_ModifiedDateTime"><div class="ew-table-header-caption"><?php echo $store_purchaseorder->ModifiedDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModifiedDateTime" class="<?php echo $store_purchaseorder->ModifiedDateTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_purchaseorder->SortUrl($store_purchaseorder->ModifiedDateTime) ?>',1);"><div id="elh_store_purchaseorder_ModifiedDateTime" class="store_purchaseorder_ModifiedDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_purchaseorder->ModifiedDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_purchaseorder->ModifiedDateTime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_purchaseorder->ModifiedDateTime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_purchaseorder->grncreatedby->Visible) { // grncreatedby ?>
	<?php if ($store_purchaseorder->sortUrl($store_purchaseorder->grncreatedby) == "") { ?>
		<th data-name="grncreatedby" class="<?php echo $store_purchaseorder->grncreatedby->headerCellClass() ?>"><div id="elh_store_purchaseorder_grncreatedby" class="store_purchaseorder_grncreatedby"><div class="ew-table-header-caption"><?php echo $store_purchaseorder->grncreatedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="grncreatedby" class="<?php echo $store_purchaseorder->grncreatedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_purchaseorder->SortUrl($store_purchaseorder->grncreatedby) ?>',1);"><div id="elh_store_purchaseorder_grncreatedby" class="store_purchaseorder_grncreatedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_purchaseorder->grncreatedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_purchaseorder->grncreatedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_purchaseorder->grncreatedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_purchaseorder->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
	<?php if ($store_purchaseorder->sortUrl($store_purchaseorder->grncreatedDateTime) == "") { ?>
		<th data-name="grncreatedDateTime" class="<?php echo $store_purchaseorder->grncreatedDateTime->headerCellClass() ?>"><div id="elh_store_purchaseorder_grncreatedDateTime" class="store_purchaseorder_grncreatedDateTime"><div class="ew-table-header-caption"><?php echo $store_purchaseorder->grncreatedDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="grncreatedDateTime" class="<?php echo $store_purchaseorder->grncreatedDateTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_purchaseorder->SortUrl($store_purchaseorder->grncreatedDateTime) ?>',1);"><div id="elh_store_purchaseorder_grncreatedDateTime" class="store_purchaseorder_grncreatedDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_purchaseorder->grncreatedDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_purchaseorder->grncreatedDateTime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_purchaseorder->grncreatedDateTime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_purchaseorder->grnModifiedby->Visible) { // grnModifiedby ?>
	<?php if ($store_purchaseorder->sortUrl($store_purchaseorder->grnModifiedby) == "") { ?>
		<th data-name="grnModifiedby" class="<?php echo $store_purchaseorder->grnModifiedby->headerCellClass() ?>"><div id="elh_store_purchaseorder_grnModifiedby" class="store_purchaseorder_grnModifiedby"><div class="ew-table-header-caption"><?php echo $store_purchaseorder->grnModifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="grnModifiedby" class="<?php echo $store_purchaseorder->grnModifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_purchaseorder->SortUrl($store_purchaseorder->grnModifiedby) ?>',1);"><div id="elh_store_purchaseorder_grnModifiedby" class="store_purchaseorder_grnModifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_purchaseorder->grnModifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_purchaseorder->grnModifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_purchaseorder->grnModifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_purchaseorder->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
	<?php if ($store_purchaseorder->sortUrl($store_purchaseorder->grnModifiedDateTime) == "") { ?>
		<th data-name="grnModifiedDateTime" class="<?php echo $store_purchaseorder->grnModifiedDateTime->headerCellClass() ?>"><div id="elh_store_purchaseorder_grnModifiedDateTime" class="store_purchaseorder_grnModifiedDateTime"><div class="ew-table-header-caption"><?php echo $store_purchaseorder->grnModifiedDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="grnModifiedDateTime" class="<?php echo $store_purchaseorder->grnModifiedDateTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_purchaseorder->SortUrl($store_purchaseorder->grnModifiedDateTime) ?>',1);"><div id="elh_store_purchaseorder_grnModifiedDateTime" class="store_purchaseorder_grnModifiedDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_purchaseorder->grnModifiedDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_purchaseorder->grnModifiedDateTime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_purchaseorder->grnModifiedDateTime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_purchaseorder->Received->Visible) { // Received ?>
	<?php if ($store_purchaseorder->sortUrl($store_purchaseorder->Received) == "") { ?>
		<th data-name="Received" class="<?php echo $store_purchaseorder->Received->headerCellClass() ?>"><div id="elh_store_purchaseorder_Received" class="store_purchaseorder_Received"><div class="ew-table-header-caption"><?php echo $store_purchaseorder->Received->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Received" class="<?php echo $store_purchaseorder->Received->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_purchaseorder->SortUrl($store_purchaseorder->Received) ?>',1);"><div id="elh_store_purchaseorder_Received" class="store_purchaseorder_Received">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_purchaseorder->Received->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_purchaseorder->Received->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_purchaseorder->Received->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_purchaseorder->BillDate->Visible) { // BillDate ?>
	<?php if ($store_purchaseorder->sortUrl($store_purchaseorder->BillDate) == "") { ?>
		<th data-name="BillDate" class="<?php echo $store_purchaseorder->BillDate->headerCellClass() ?>"><div id="elh_store_purchaseorder_BillDate" class="store_purchaseorder_BillDate"><div class="ew-table-header-caption"><?php echo $store_purchaseorder->BillDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillDate" class="<?php echo $store_purchaseorder->BillDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_purchaseorder->SortUrl($store_purchaseorder->BillDate) ?>',1);"><div id="elh_store_purchaseorder_BillDate" class="store_purchaseorder_BillDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_purchaseorder->BillDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_purchaseorder->BillDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_purchaseorder->BillDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_purchaseorder->CurStock->Visible) { // CurStock ?>
	<?php if ($store_purchaseorder->sortUrl($store_purchaseorder->CurStock) == "") { ?>
		<th data-name="CurStock" class="<?php echo $store_purchaseorder->CurStock->headerCellClass() ?>"><div id="elh_store_purchaseorder_CurStock" class="store_purchaseorder_CurStock"><div class="ew-table-header-caption"><?php echo $store_purchaseorder->CurStock->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CurStock" class="<?php echo $store_purchaseorder->CurStock->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_purchaseorder->SortUrl($store_purchaseorder->CurStock) ?>',1);"><div id="elh_store_purchaseorder_CurStock" class="store_purchaseorder_CurStock">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_purchaseorder->CurStock->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_purchaseorder->CurStock->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_purchaseorder->CurStock->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_purchaseorder->FreeQtyyy->Visible) { // FreeQtyyy ?>
	<?php if ($store_purchaseorder->sortUrl($store_purchaseorder->FreeQtyyy) == "") { ?>
		<th data-name="FreeQtyyy" class="<?php echo $store_purchaseorder->FreeQtyyy->headerCellClass() ?>"><div id="elh_store_purchaseorder_FreeQtyyy" class="store_purchaseorder_FreeQtyyy"><div class="ew-table-header-caption"><?php echo $store_purchaseorder->FreeQtyyy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FreeQtyyy" class="<?php echo $store_purchaseorder->FreeQtyyy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_purchaseorder->SortUrl($store_purchaseorder->FreeQtyyy) ?>',1);"><div id="elh_store_purchaseorder_FreeQtyyy" class="store_purchaseorder_FreeQtyyy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_purchaseorder->FreeQtyyy->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_purchaseorder->FreeQtyyy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_purchaseorder->FreeQtyyy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_purchaseorder->grndate->Visible) { // grndate ?>
	<?php if ($store_purchaseorder->sortUrl($store_purchaseorder->grndate) == "") { ?>
		<th data-name="grndate" class="<?php echo $store_purchaseorder->grndate->headerCellClass() ?>"><div id="elh_store_purchaseorder_grndate" class="store_purchaseorder_grndate"><div class="ew-table-header-caption"><?php echo $store_purchaseorder->grndate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="grndate" class="<?php echo $store_purchaseorder->grndate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_purchaseorder->SortUrl($store_purchaseorder->grndate) ?>',1);"><div id="elh_store_purchaseorder_grndate" class="store_purchaseorder_grndate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_purchaseorder->grndate->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_purchaseorder->grndate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_purchaseorder->grndate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_purchaseorder->grndatetime->Visible) { // grndatetime ?>
	<?php if ($store_purchaseorder->sortUrl($store_purchaseorder->grndatetime) == "") { ?>
		<th data-name="grndatetime" class="<?php echo $store_purchaseorder->grndatetime->headerCellClass() ?>"><div id="elh_store_purchaseorder_grndatetime" class="store_purchaseorder_grndatetime"><div class="ew-table-header-caption"><?php echo $store_purchaseorder->grndatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="grndatetime" class="<?php echo $store_purchaseorder->grndatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_purchaseorder->SortUrl($store_purchaseorder->grndatetime) ?>',1);"><div id="elh_store_purchaseorder_grndatetime" class="store_purchaseorder_grndatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_purchaseorder->grndatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_purchaseorder->grndatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_purchaseorder->grndatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_purchaseorder->strid->Visible) { // strid ?>
	<?php if ($store_purchaseorder->sortUrl($store_purchaseorder->strid) == "") { ?>
		<th data-name="strid" class="<?php echo $store_purchaseorder->strid->headerCellClass() ?>"><div id="elh_store_purchaseorder_strid" class="store_purchaseorder_strid"><div class="ew-table-header-caption"><?php echo $store_purchaseorder->strid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="strid" class="<?php echo $store_purchaseorder->strid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_purchaseorder->SortUrl($store_purchaseorder->strid) ?>',1);"><div id="elh_store_purchaseorder_strid" class="store_purchaseorder_strid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_purchaseorder->strid->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_purchaseorder->strid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_purchaseorder->strid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_purchaseorder->GRNPer->Visible) { // GRNPer ?>
	<?php if ($store_purchaseorder->sortUrl($store_purchaseorder->GRNPer) == "") { ?>
		<th data-name="GRNPer" class="<?php echo $store_purchaseorder->GRNPer->headerCellClass() ?>"><div id="elh_store_purchaseorder_GRNPer" class="store_purchaseorder_GRNPer"><div class="ew-table-header-caption"><?php echo $store_purchaseorder->GRNPer->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GRNPer" class="<?php echo $store_purchaseorder->GRNPer->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_purchaseorder->SortUrl($store_purchaseorder->GRNPer) ?>',1);"><div id="elh_store_purchaseorder_GRNPer" class="store_purchaseorder_GRNPer">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_purchaseorder->GRNPer->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_purchaseorder->GRNPer->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_purchaseorder->GRNPer->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_purchaseorder->StoreID->Visible) { // StoreID ?>
	<?php if ($store_purchaseorder->sortUrl($store_purchaseorder->StoreID) == "") { ?>
		<th data-name="StoreID" class="<?php echo $store_purchaseorder->StoreID->headerCellClass() ?>"><div id="elh_store_purchaseorder_StoreID" class="store_purchaseorder_StoreID"><div class="ew-table-header-caption"><?php echo $store_purchaseorder->StoreID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StoreID" class="<?php echo $store_purchaseorder->StoreID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_purchaseorder->SortUrl($store_purchaseorder->StoreID) ?>',1);"><div id="elh_store_purchaseorder_StoreID" class="store_purchaseorder_StoreID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_purchaseorder->StoreID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_purchaseorder->StoreID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_purchaseorder->StoreID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$store_purchaseorder_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($store_purchaseorder->ExportAll && $store_purchaseorder->isExport()) {
	$store_purchaseorder_list->StopRec = $store_purchaseorder_list->TotalRecs;
} else {

	// Set the last record to display
	if ($store_purchaseorder_list->TotalRecs > $store_purchaseorder_list->StartRec + $store_purchaseorder_list->DisplayRecs - 1)
		$store_purchaseorder_list->StopRec = $store_purchaseorder_list->StartRec + $store_purchaseorder_list->DisplayRecs - 1;
	else
		$store_purchaseorder_list->StopRec = $store_purchaseorder_list->TotalRecs;
}
$store_purchaseorder_list->RecCnt = $store_purchaseorder_list->StartRec - 1;
if ($store_purchaseorder_list->Recordset && !$store_purchaseorder_list->Recordset->EOF) {
	$store_purchaseorder_list->Recordset->moveFirst();
	$selectLimit = $store_purchaseorder_list->UseSelectLimit;
	if (!$selectLimit && $store_purchaseorder_list->StartRec > 1)
		$store_purchaseorder_list->Recordset->move($store_purchaseorder_list->StartRec - 1);
} elseif (!$store_purchaseorder->AllowAddDeleteRow && $store_purchaseorder_list->StopRec == 0) {
	$store_purchaseorder_list->StopRec = $store_purchaseorder->GridAddRowCount;
}

// Initialize aggregate
$store_purchaseorder->RowType = ROWTYPE_AGGREGATEINIT;
$store_purchaseorder->resetAttributes();
$store_purchaseorder_list->renderRow();
while ($store_purchaseorder_list->RecCnt < $store_purchaseorder_list->StopRec) {
	$store_purchaseorder_list->RecCnt++;
	if ($store_purchaseorder_list->RecCnt >= $store_purchaseorder_list->StartRec) {
		$store_purchaseorder_list->RowCnt++;

		// Set up key count
		$store_purchaseorder_list->KeyCount = $store_purchaseorder_list->RowIndex;

		// Init row class and style
		$store_purchaseorder->resetAttributes();
		$store_purchaseorder->CssClass = "";
		if ($store_purchaseorder->isGridAdd()) {
		} else {
			$store_purchaseorder_list->loadRowValues($store_purchaseorder_list->Recordset); // Load row values
		}
		$store_purchaseorder->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$store_purchaseorder->RowAttrs = array_merge($store_purchaseorder->RowAttrs, array('data-rowindex'=>$store_purchaseorder_list->RowCnt, 'id'=>'r' . $store_purchaseorder_list->RowCnt . '_store_purchaseorder', 'data-rowtype'=>$store_purchaseorder->RowType));

		// Render row
		$store_purchaseorder_list->renderRow();

		// Render list options
		$store_purchaseorder_list->renderListOptions();
?>
	<tr<?php echo $store_purchaseorder->rowAttributes() ?>>
<?php

// Render list options (body, left)
$store_purchaseorder_list->ListOptions->render("body", "left", $store_purchaseorder_list->RowCnt);
?>
	<?php if ($store_purchaseorder->ORDNO->Visible) { // ORDNO ?>
		<td data-name="ORDNO"<?php echo $store_purchaseorder->ORDNO->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_list->RowCnt ?>_store_purchaseorder_ORDNO" class="store_purchaseorder_ORDNO">
<span<?php echo $store_purchaseorder->ORDNO->viewAttributes() ?>>
<?php echo $store_purchaseorder->ORDNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_purchaseorder->PRC->Visible) { // PRC ?>
		<td data-name="PRC"<?php echo $store_purchaseorder->PRC->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_list->RowCnt ?>_store_purchaseorder_PRC" class="store_purchaseorder_PRC">
<span<?php echo $store_purchaseorder->PRC->viewAttributes() ?>>
<?php echo $store_purchaseorder->PRC->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_purchaseorder->QTY->Visible) { // QTY ?>
		<td data-name="QTY"<?php echo $store_purchaseorder->QTY->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_list->RowCnt ?>_store_purchaseorder_QTY" class="store_purchaseorder_QTY">
<span<?php echo $store_purchaseorder->QTY->viewAttributes() ?>>
<?php echo $store_purchaseorder->QTY->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_purchaseorder->DT->Visible) { // DT ?>
		<td data-name="DT"<?php echo $store_purchaseorder->DT->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_list->RowCnt ?>_store_purchaseorder_DT" class="store_purchaseorder_DT">
<span<?php echo $store_purchaseorder->DT->viewAttributes() ?>>
<?php echo $store_purchaseorder->DT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_purchaseorder->PC->Visible) { // PC ?>
		<td data-name="PC"<?php echo $store_purchaseorder->PC->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_list->RowCnt ?>_store_purchaseorder_PC" class="store_purchaseorder_PC">
<span<?php echo $store_purchaseorder->PC->viewAttributes() ?>>
<?php echo $store_purchaseorder->PC->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_purchaseorder->YM->Visible) { // YM ?>
		<td data-name="YM"<?php echo $store_purchaseorder->YM->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_list->RowCnt ?>_store_purchaseorder_YM" class="store_purchaseorder_YM">
<span<?php echo $store_purchaseorder->YM->viewAttributes() ?>>
<?php echo $store_purchaseorder->YM->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_purchaseorder->MFRCODE->Visible) { // MFRCODE ?>
		<td data-name="MFRCODE"<?php echo $store_purchaseorder->MFRCODE->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_list->RowCnt ?>_store_purchaseorder_MFRCODE" class="store_purchaseorder_MFRCODE">
<span<?php echo $store_purchaseorder->MFRCODE->viewAttributes() ?>>
<?php echo $store_purchaseorder->MFRCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_purchaseorder->Stock->Visible) { // Stock ?>
		<td data-name="Stock"<?php echo $store_purchaseorder->Stock->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_list->RowCnt ?>_store_purchaseorder_Stock" class="store_purchaseorder_Stock">
<span<?php echo $store_purchaseorder->Stock->viewAttributes() ?>>
<?php echo $store_purchaseorder->Stock->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_purchaseorder->LastMonthSale->Visible) { // LastMonthSale ?>
		<td data-name="LastMonthSale"<?php echo $store_purchaseorder->LastMonthSale->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_list->RowCnt ?>_store_purchaseorder_LastMonthSale" class="store_purchaseorder_LastMonthSale">
<span<?php echo $store_purchaseorder->LastMonthSale->viewAttributes() ?>>
<?php echo $store_purchaseorder->LastMonthSale->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_purchaseorder->Printcheck->Visible) { // Printcheck ?>
		<td data-name="Printcheck"<?php echo $store_purchaseorder->Printcheck->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_list->RowCnt ?>_store_purchaseorder_Printcheck" class="store_purchaseorder_Printcheck">
<span<?php echo $store_purchaseorder->Printcheck->viewAttributes() ?>>
<?php echo $store_purchaseorder->Printcheck->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_purchaseorder->id->Visible) { // id ?>
		<td data-name="id"<?php echo $store_purchaseorder->id->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_list->RowCnt ?>_store_purchaseorder_id" class="store_purchaseorder_id">
<span<?php echo $store_purchaseorder->id->viewAttributes() ?>>
<?php echo $store_purchaseorder->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_purchaseorder->poid->Visible) { // poid ?>
		<td data-name="poid"<?php echo $store_purchaseorder->poid->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_list->RowCnt ?>_store_purchaseorder_poid" class="store_purchaseorder_poid">
<span<?php echo $store_purchaseorder->poid->viewAttributes() ?>>
<?php echo $store_purchaseorder->poid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_purchaseorder->grnid->Visible) { // grnid ?>
		<td data-name="grnid"<?php echo $store_purchaseorder->grnid->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_list->RowCnt ?>_store_purchaseorder_grnid" class="store_purchaseorder_grnid">
<span<?php echo $store_purchaseorder->grnid->viewAttributes() ?>>
<?php echo $store_purchaseorder->grnid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_purchaseorder->BatchNo->Visible) { // BatchNo ?>
		<td data-name="BatchNo"<?php echo $store_purchaseorder->BatchNo->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_list->RowCnt ?>_store_purchaseorder_BatchNo" class="store_purchaseorder_BatchNo">
<span<?php echo $store_purchaseorder->BatchNo->viewAttributes() ?>>
<?php echo $store_purchaseorder->BatchNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_purchaseorder->ExpDate->Visible) { // ExpDate ?>
		<td data-name="ExpDate"<?php echo $store_purchaseorder->ExpDate->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_list->RowCnt ?>_store_purchaseorder_ExpDate" class="store_purchaseorder_ExpDate">
<span<?php echo $store_purchaseorder->ExpDate->viewAttributes() ?>>
<?php echo $store_purchaseorder->ExpDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_purchaseorder->PrName->Visible) { // PrName ?>
		<td data-name="PrName"<?php echo $store_purchaseorder->PrName->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_list->RowCnt ?>_store_purchaseorder_PrName" class="store_purchaseorder_PrName">
<span<?php echo $store_purchaseorder->PrName->viewAttributes() ?>>
<?php echo $store_purchaseorder->PrName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_purchaseorder->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity"<?php echo $store_purchaseorder->Quantity->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_list->RowCnt ?>_store_purchaseorder_Quantity" class="store_purchaseorder_Quantity">
<span<?php echo $store_purchaseorder->Quantity->viewAttributes() ?>>
<?php echo $store_purchaseorder->Quantity->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_purchaseorder->FreeQty->Visible) { // FreeQty ?>
		<td data-name="FreeQty"<?php echo $store_purchaseorder->FreeQty->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_list->RowCnt ?>_store_purchaseorder_FreeQty" class="store_purchaseorder_FreeQty">
<span<?php echo $store_purchaseorder->FreeQty->viewAttributes() ?>>
<?php echo $store_purchaseorder->FreeQty->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_purchaseorder->ItemValue->Visible) { // ItemValue ?>
		<td data-name="ItemValue"<?php echo $store_purchaseorder->ItemValue->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_list->RowCnt ?>_store_purchaseorder_ItemValue" class="store_purchaseorder_ItemValue">
<span<?php echo $store_purchaseorder->ItemValue->viewAttributes() ?>>
<?php echo $store_purchaseorder->ItemValue->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_purchaseorder->Disc->Visible) { // Disc ?>
		<td data-name="Disc"<?php echo $store_purchaseorder->Disc->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_list->RowCnt ?>_store_purchaseorder_Disc" class="store_purchaseorder_Disc">
<span<?php echo $store_purchaseorder->Disc->viewAttributes() ?>>
<?php echo $store_purchaseorder->Disc->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_purchaseorder->PTax->Visible) { // PTax ?>
		<td data-name="PTax"<?php echo $store_purchaseorder->PTax->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_list->RowCnt ?>_store_purchaseorder_PTax" class="store_purchaseorder_PTax">
<span<?php echo $store_purchaseorder->PTax->viewAttributes() ?>>
<?php echo $store_purchaseorder->PTax->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_purchaseorder->MRP->Visible) { // MRP ?>
		<td data-name="MRP"<?php echo $store_purchaseorder->MRP->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_list->RowCnt ?>_store_purchaseorder_MRP" class="store_purchaseorder_MRP">
<span<?php echo $store_purchaseorder->MRP->viewAttributes() ?>>
<?php echo $store_purchaseorder->MRP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_purchaseorder->SalTax->Visible) { // SalTax ?>
		<td data-name="SalTax"<?php echo $store_purchaseorder->SalTax->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_list->RowCnt ?>_store_purchaseorder_SalTax" class="store_purchaseorder_SalTax">
<span<?php echo $store_purchaseorder->SalTax->viewAttributes() ?>>
<?php echo $store_purchaseorder->SalTax->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_purchaseorder->PurValue->Visible) { // PurValue ?>
		<td data-name="PurValue"<?php echo $store_purchaseorder->PurValue->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_list->RowCnt ?>_store_purchaseorder_PurValue" class="store_purchaseorder_PurValue">
<span<?php echo $store_purchaseorder->PurValue->viewAttributes() ?>>
<?php echo $store_purchaseorder->PurValue->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_purchaseorder->PurRate->Visible) { // PurRate ?>
		<td data-name="PurRate"<?php echo $store_purchaseorder->PurRate->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_list->RowCnt ?>_store_purchaseorder_PurRate" class="store_purchaseorder_PurRate">
<span<?php echo $store_purchaseorder->PurRate->viewAttributes() ?>>
<?php echo $store_purchaseorder->PurRate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_purchaseorder->SalRate->Visible) { // SalRate ?>
		<td data-name="SalRate"<?php echo $store_purchaseorder->SalRate->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_list->RowCnt ?>_store_purchaseorder_SalRate" class="store_purchaseorder_SalRate">
<span<?php echo $store_purchaseorder->SalRate->viewAttributes() ?>>
<?php echo $store_purchaseorder->SalRate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_purchaseorder->Discount->Visible) { // Discount ?>
		<td data-name="Discount"<?php echo $store_purchaseorder->Discount->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_list->RowCnt ?>_store_purchaseorder_Discount" class="store_purchaseorder_Discount">
<span<?php echo $store_purchaseorder->Discount->viewAttributes() ?>>
<?php echo $store_purchaseorder->Discount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_purchaseorder->PSGST->Visible) { // PSGST ?>
		<td data-name="PSGST"<?php echo $store_purchaseorder->PSGST->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_list->RowCnt ?>_store_purchaseorder_PSGST" class="store_purchaseorder_PSGST">
<span<?php echo $store_purchaseorder->PSGST->viewAttributes() ?>>
<?php echo $store_purchaseorder->PSGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_purchaseorder->PCGST->Visible) { // PCGST ?>
		<td data-name="PCGST"<?php echo $store_purchaseorder->PCGST->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_list->RowCnt ?>_store_purchaseorder_PCGST" class="store_purchaseorder_PCGST">
<span<?php echo $store_purchaseorder->PCGST->viewAttributes() ?>>
<?php echo $store_purchaseorder->PCGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_purchaseorder->SSGST->Visible) { // SSGST ?>
		<td data-name="SSGST"<?php echo $store_purchaseorder->SSGST->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_list->RowCnt ?>_store_purchaseorder_SSGST" class="store_purchaseorder_SSGST">
<span<?php echo $store_purchaseorder->SSGST->viewAttributes() ?>>
<?php echo $store_purchaseorder->SSGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_purchaseorder->SCGST->Visible) { // SCGST ?>
		<td data-name="SCGST"<?php echo $store_purchaseorder->SCGST->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_list->RowCnt ?>_store_purchaseorder_SCGST" class="store_purchaseorder_SCGST">
<span<?php echo $store_purchaseorder->SCGST->viewAttributes() ?>>
<?php echo $store_purchaseorder->SCGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_purchaseorder->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE"<?php echo $store_purchaseorder->BRCODE->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_list->RowCnt ?>_store_purchaseorder_BRCODE" class="store_purchaseorder_BRCODE">
<span<?php echo $store_purchaseorder->BRCODE->viewAttributes() ?>>
<?php echo $store_purchaseorder->BRCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_purchaseorder->HSN->Visible) { // HSN ?>
		<td data-name="HSN"<?php echo $store_purchaseorder->HSN->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_list->RowCnt ?>_store_purchaseorder_HSN" class="store_purchaseorder_HSN">
<span<?php echo $store_purchaseorder->HSN->viewAttributes() ?>>
<?php echo $store_purchaseorder->HSN->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_purchaseorder->Pack->Visible) { // Pack ?>
		<td data-name="Pack"<?php echo $store_purchaseorder->Pack->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_list->RowCnt ?>_store_purchaseorder_Pack" class="store_purchaseorder_Pack">
<span<?php echo $store_purchaseorder->Pack->viewAttributes() ?>>
<?php echo $store_purchaseorder->Pack->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_purchaseorder->PUnit->Visible) { // PUnit ?>
		<td data-name="PUnit"<?php echo $store_purchaseorder->PUnit->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_list->RowCnt ?>_store_purchaseorder_PUnit" class="store_purchaseorder_PUnit">
<span<?php echo $store_purchaseorder->PUnit->viewAttributes() ?>>
<?php echo $store_purchaseorder->PUnit->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_purchaseorder->SUnit->Visible) { // SUnit ?>
		<td data-name="SUnit"<?php echo $store_purchaseorder->SUnit->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_list->RowCnt ?>_store_purchaseorder_SUnit" class="store_purchaseorder_SUnit">
<span<?php echo $store_purchaseorder->SUnit->viewAttributes() ?>>
<?php echo $store_purchaseorder->SUnit->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_purchaseorder->GrnQuantity->Visible) { // GrnQuantity ?>
		<td data-name="GrnQuantity"<?php echo $store_purchaseorder->GrnQuantity->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_list->RowCnt ?>_store_purchaseorder_GrnQuantity" class="store_purchaseorder_GrnQuantity">
<span<?php echo $store_purchaseorder->GrnQuantity->viewAttributes() ?>>
<?php echo $store_purchaseorder->GrnQuantity->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_purchaseorder->GrnMRP->Visible) { // GrnMRP ?>
		<td data-name="GrnMRP"<?php echo $store_purchaseorder->GrnMRP->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_list->RowCnt ?>_store_purchaseorder_GrnMRP" class="store_purchaseorder_GrnMRP">
<span<?php echo $store_purchaseorder->GrnMRP->viewAttributes() ?>>
<?php echo $store_purchaseorder->GrnMRP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_purchaseorder->trid->Visible) { // trid ?>
		<td data-name="trid"<?php echo $store_purchaseorder->trid->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_list->RowCnt ?>_store_purchaseorder_trid" class="store_purchaseorder_trid">
<span<?php echo $store_purchaseorder->trid->viewAttributes() ?>>
<?php echo $store_purchaseorder->trid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_purchaseorder->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $store_purchaseorder->HospID->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_list->RowCnt ?>_store_purchaseorder_HospID" class="store_purchaseorder_HospID">
<span<?php echo $store_purchaseorder->HospID->viewAttributes() ?>>
<?php echo $store_purchaseorder->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_purchaseorder->CreatedBy->Visible) { // CreatedBy ?>
		<td data-name="CreatedBy"<?php echo $store_purchaseorder->CreatedBy->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_list->RowCnt ?>_store_purchaseorder_CreatedBy" class="store_purchaseorder_CreatedBy">
<span<?php echo $store_purchaseorder->CreatedBy->viewAttributes() ?>>
<?php echo $store_purchaseorder->CreatedBy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_purchaseorder->CreatedDateTime->Visible) { // CreatedDateTime ?>
		<td data-name="CreatedDateTime"<?php echo $store_purchaseorder->CreatedDateTime->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_list->RowCnt ?>_store_purchaseorder_CreatedDateTime" class="store_purchaseorder_CreatedDateTime">
<span<?php echo $store_purchaseorder->CreatedDateTime->viewAttributes() ?>>
<?php echo $store_purchaseorder->CreatedDateTime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_purchaseorder->ModifiedBy->Visible) { // ModifiedBy ?>
		<td data-name="ModifiedBy"<?php echo $store_purchaseorder->ModifiedBy->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_list->RowCnt ?>_store_purchaseorder_ModifiedBy" class="store_purchaseorder_ModifiedBy">
<span<?php echo $store_purchaseorder->ModifiedBy->viewAttributes() ?>>
<?php echo $store_purchaseorder->ModifiedBy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_purchaseorder->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
		<td data-name="ModifiedDateTime"<?php echo $store_purchaseorder->ModifiedDateTime->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_list->RowCnt ?>_store_purchaseorder_ModifiedDateTime" class="store_purchaseorder_ModifiedDateTime">
<span<?php echo $store_purchaseorder->ModifiedDateTime->viewAttributes() ?>>
<?php echo $store_purchaseorder->ModifiedDateTime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_purchaseorder->grncreatedby->Visible) { // grncreatedby ?>
		<td data-name="grncreatedby"<?php echo $store_purchaseorder->grncreatedby->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_list->RowCnt ?>_store_purchaseorder_grncreatedby" class="store_purchaseorder_grncreatedby">
<span<?php echo $store_purchaseorder->grncreatedby->viewAttributes() ?>>
<?php echo $store_purchaseorder->grncreatedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_purchaseorder->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
		<td data-name="grncreatedDateTime"<?php echo $store_purchaseorder->grncreatedDateTime->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_list->RowCnt ?>_store_purchaseorder_grncreatedDateTime" class="store_purchaseorder_grncreatedDateTime">
<span<?php echo $store_purchaseorder->grncreatedDateTime->viewAttributes() ?>>
<?php echo $store_purchaseorder->grncreatedDateTime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_purchaseorder->grnModifiedby->Visible) { // grnModifiedby ?>
		<td data-name="grnModifiedby"<?php echo $store_purchaseorder->grnModifiedby->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_list->RowCnt ?>_store_purchaseorder_grnModifiedby" class="store_purchaseorder_grnModifiedby">
<span<?php echo $store_purchaseorder->grnModifiedby->viewAttributes() ?>>
<?php echo $store_purchaseorder->grnModifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_purchaseorder->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
		<td data-name="grnModifiedDateTime"<?php echo $store_purchaseorder->grnModifiedDateTime->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_list->RowCnt ?>_store_purchaseorder_grnModifiedDateTime" class="store_purchaseorder_grnModifiedDateTime">
<span<?php echo $store_purchaseorder->grnModifiedDateTime->viewAttributes() ?>>
<?php echo $store_purchaseorder->grnModifiedDateTime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_purchaseorder->Received->Visible) { // Received ?>
		<td data-name="Received"<?php echo $store_purchaseorder->Received->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_list->RowCnt ?>_store_purchaseorder_Received" class="store_purchaseorder_Received">
<span<?php echo $store_purchaseorder->Received->viewAttributes() ?>>
<?php echo $store_purchaseorder->Received->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_purchaseorder->BillDate->Visible) { // BillDate ?>
		<td data-name="BillDate"<?php echo $store_purchaseorder->BillDate->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_list->RowCnt ?>_store_purchaseorder_BillDate" class="store_purchaseorder_BillDate">
<span<?php echo $store_purchaseorder->BillDate->viewAttributes() ?>>
<?php echo $store_purchaseorder->BillDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_purchaseorder->CurStock->Visible) { // CurStock ?>
		<td data-name="CurStock"<?php echo $store_purchaseorder->CurStock->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_list->RowCnt ?>_store_purchaseorder_CurStock" class="store_purchaseorder_CurStock">
<span<?php echo $store_purchaseorder->CurStock->viewAttributes() ?>>
<?php echo $store_purchaseorder->CurStock->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_purchaseorder->FreeQtyyy->Visible) { // FreeQtyyy ?>
		<td data-name="FreeQtyyy"<?php echo $store_purchaseorder->FreeQtyyy->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_list->RowCnt ?>_store_purchaseorder_FreeQtyyy" class="store_purchaseorder_FreeQtyyy">
<span<?php echo $store_purchaseorder->FreeQtyyy->viewAttributes() ?>>
<?php echo $store_purchaseorder->FreeQtyyy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_purchaseorder->grndate->Visible) { // grndate ?>
		<td data-name="grndate"<?php echo $store_purchaseorder->grndate->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_list->RowCnt ?>_store_purchaseorder_grndate" class="store_purchaseorder_grndate">
<span<?php echo $store_purchaseorder->grndate->viewAttributes() ?>>
<?php echo $store_purchaseorder->grndate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_purchaseorder->grndatetime->Visible) { // grndatetime ?>
		<td data-name="grndatetime"<?php echo $store_purchaseorder->grndatetime->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_list->RowCnt ?>_store_purchaseorder_grndatetime" class="store_purchaseorder_grndatetime">
<span<?php echo $store_purchaseorder->grndatetime->viewAttributes() ?>>
<?php echo $store_purchaseorder->grndatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_purchaseorder->strid->Visible) { // strid ?>
		<td data-name="strid"<?php echo $store_purchaseorder->strid->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_list->RowCnt ?>_store_purchaseorder_strid" class="store_purchaseorder_strid">
<span<?php echo $store_purchaseorder->strid->viewAttributes() ?>>
<?php echo $store_purchaseorder->strid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_purchaseorder->GRNPer->Visible) { // GRNPer ?>
		<td data-name="GRNPer"<?php echo $store_purchaseorder->GRNPer->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_list->RowCnt ?>_store_purchaseorder_GRNPer" class="store_purchaseorder_GRNPer">
<span<?php echo $store_purchaseorder->GRNPer->viewAttributes() ?>>
<?php echo $store_purchaseorder->GRNPer->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_purchaseorder->StoreID->Visible) { // StoreID ?>
		<td data-name="StoreID"<?php echo $store_purchaseorder->StoreID->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_list->RowCnt ?>_store_purchaseorder_StoreID" class="store_purchaseorder_StoreID">
<span<?php echo $store_purchaseorder->StoreID->viewAttributes() ?>>
<?php echo $store_purchaseorder->StoreID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$store_purchaseorder_list->ListOptions->render("body", "right", $store_purchaseorder_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$store_purchaseorder->isGridAdd())
		$store_purchaseorder_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$store_purchaseorder->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($store_purchaseorder_list->Recordset)
	$store_purchaseorder_list->Recordset->Close();
?>
<?php if (!$store_purchaseorder->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$store_purchaseorder->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($store_purchaseorder_list->Pager)) $store_purchaseorder_list->Pager = new NumericPager($store_purchaseorder_list->StartRec, $store_purchaseorder_list->DisplayRecs, $store_purchaseorder_list->TotalRecs, $store_purchaseorder_list->RecRange, $store_purchaseorder_list->AutoHidePager) ?>
<?php if ($store_purchaseorder_list->Pager->RecordCount > 0 && $store_purchaseorder_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($store_purchaseorder_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $store_purchaseorder_list->pageUrl() ?>start=<?php echo $store_purchaseorder_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($store_purchaseorder_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $store_purchaseorder_list->pageUrl() ?>start=<?php echo $store_purchaseorder_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($store_purchaseorder_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $store_purchaseorder_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($store_purchaseorder_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $store_purchaseorder_list->pageUrl() ?>start=<?php echo $store_purchaseorder_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($store_purchaseorder_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $store_purchaseorder_list->pageUrl() ?>start=<?php echo $store_purchaseorder_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($store_purchaseorder_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $store_purchaseorder_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $store_purchaseorder_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $store_purchaseorder_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($store_purchaseorder_list->TotalRecs > 0 && (!$store_purchaseorder_list->AutoHidePageSizeSelector || $store_purchaseorder_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="store_purchaseorder">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($store_purchaseorder_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($store_purchaseorder_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($store_purchaseorder_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($store_purchaseorder_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($store_purchaseorder_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($store_purchaseorder_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($store_purchaseorder->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $store_purchaseorder_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($store_purchaseorder_list->TotalRecs == 0 && !$store_purchaseorder->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $store_purchaseorder_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$store_purchaseorder_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$store_purchaseorder->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$store_purchaseorder->isExport()) { ?>
<script>
ew.scrollableTable("gmp_store_purchaseorder", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$store_purchaseorder_list->terminate();
?>
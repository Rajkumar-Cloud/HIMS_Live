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
$store_storemast_list = new store_storemast_list();

// Run the page
$store_storemast_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$store_storemast_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$store_storemast->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fstore_storemastlist = currentForm = new ew.Form("fstore_storemastlist", "list");
fstore_storemastlist.formKeyCountName = '<?php echo $store_storemast_list->FormKeyCountName ?>';

// Form_CustomValidate event
fstore_storemastlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fstore_storemastlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fstore_storemastlistsrch = currentSearchForm = new ew.Form("fstore_storemastlistsrch");

// Filters
fstore_storemastlistsrch.filterList = <?php echo $store_storemast_list->getFilterList() ?>;
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
<?php if (!$store_storemast->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($store_storemast_list->TotalRecs > 0 && $store_storemast_list->ExportOptions->visible()) { ?>
<?php $store_storemast_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($store_storemast_list->ImportOptions->visible()) { ?>
<?php $store_storemast_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($store_storemast_list->SearchOptions->visible()) { ?>
<?php $store_storemast_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($store_storemast_list->FilterOptions->visible()) { ?>
<?php $store_storemast_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$store_storemast_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$store_storemast->isExport() && !$store_storemast->CurrentAction) { ?>
<form name="fstore_storemastlistsrch" id="fstore_storemastlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($store_storemast_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fstore_storemastlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="store_storemast">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($store_storemast_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($store_storemast_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $store_storemast_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($store_storemast_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($store_storemast_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($store_storemast_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($store_storemast_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $store_storemast_list->showPageHeader(); ?>
<?php
$store_storemast_list->showMessage();
?>
<?php if ($store_storemast_list->TotalRecs > 0 || $store_storemast->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($store_storemast_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> store_storemast">
<?php if (!$store_storemast->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$store_storemast->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($store_storemast_list->Pager)) $store_storemast_list->Pager = new NumericPager($store_storemast_list->StartRec, $store_storemast_list->DisplayRecs, $store_storemast_list->TotalRecs, $store_storemast_list->RecRange, $store_storemast_list->AutoHidePager) ?>
<?php if ($store_storemast_list->Pager->RecordCount > 0 && $store_storemast_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($store_storemast_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $store_storemast_list->pageUrl() ?>start=<?php echo $store_storemast_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($store_storemast_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $store_storemast_list->pageUrl() ?>start=<?php echo $store_storemast_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($store_storemast_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $store_storemast_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($store_storemast_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $store_storemast_list->pageUrl() ?>start=<?php echo $store_storemast_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($store_storemast_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $store_storemast_list->pageUrl() ?>start=<?php echo $store_storemast_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($store_storemast_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $store_storemast_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $store_storemast_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $store_storemast_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($store_storemast_list->TotalRecs > 0 && (!$store_storemast_list->AutoHidePageSizeSelector || $store_storemast_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="store_storemast">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($store_storemast_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($store_storemast_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($store_storemast_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($store_storemast_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($store_storemast_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($store_storemast_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($store_storemast->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $store_storemast_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fstore_storemastlist" id="fstore_storemastlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($store_storemast_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $store_storemast_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="store_storemast">
<div id="gmp_store_storemast" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($store_storemast_list->TotalRecs > 0 || $store_storemast->isGridEdit()) { ?>
<table id="tbl_store_storemastlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$store_storemast_list->RowType = ROWTYPE_HEADER;

// Render list options
$store_storemast_list->renderListOptions();

// Render list options (header, left)
$store_storemast_list->ListOptions->render("header", "left");
?>
<?php if ($store_storemast->BRCODE->Visible) { // BRCODE ?>
	<?php if ($store_storemast->sortUrl($store_storemast->BRCODE) == "") { ?>
		<th data-name="BRCODE" class="<?php echo $store_storemast->BRCODE->headerCellClass() ?>"><div id="elh_store_storemast_BRCODE" class="store_storemast_BRCODE"><div class="ew-table-header-caption"><?php echo $store_storemast->BRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BRCODE" class="<?php echo $store_storemast->BRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->BRCODE) ?>',1);"><div id="elh_store_storemast_BRCODE" class="store_storemast_BRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->BRCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->BRCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->BRCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->PRC->Visible) { // PRC ?>
	<?php if ($store_storemast->sortUrl($store_storemast->PRC) == "") { ?>
		<th data-name="PRC" class="<?php echo $store_storemast->PRC->headerCellClass() ?>"><div id="elh_store_storemast_PRC" class="store_storemast_PRC"><div class="ew-table-header-caption"><?php echo $store_storemast->PRC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRC" class="<?php echo $store_storemast->PRC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->PRC) ?>',1);"><div id="elh_store_storemast_PRC" class="store_storemast_PRC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->PRC->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->PRC->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->PRC->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->TYPE->Visible) { // TYPE ?>
	<?php if ($store_storemast->sortUrl($store_storemast->TYPE) == "") { ?>
		<th data-name="TYPE" class="<?php echo $store_storemast->TYPE->headerCellClass() ?>"><div id="elh_store_storemast_TYPE" class="store_storemast_TYPE"><div class="ew-table-header-caption"><?php echo $store_storemast->TYPE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TYPE" class="<?php echo $store_storemast->TYPE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->TYPE) ?>',1);"><div id="elh_store_storemast_TYPE" class="store_storemast_TYPE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->TYPE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->TYPE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->TYPE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->DES->Visible) { // DES ?>
	<?php if ($store_storemast->sortUrl($store_storemast->DES) == "") { ?>
		<th data-name="DES" class="<?php echo $store_storemast->DES->headerCellClass() ?>"><div id="elh_store_storemast_DES" class="store_storemast_DES"><div class="ew-table-header-caption"><?php echo $store_storemast->DES->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DES" class="<?php echo $store_storemast->DES->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->DES) ?>',1);"><div id="elh_store_storemast_DES" class="store_storemast_DES">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->DES->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->DES->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->DES->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->UM->Visible) { // UM ?>
	<?php if ($store_storemast->sortUrl($store_storemast->UM) == "") { ?>
		<th data-name="UM" class="<?php echo $store_storemast->UM->headerCellClass() ?>"><div id="elh_store_storemast_UM" class="store_storemast_UM"><div class="ew-table-header-caption"><?php echo $store_storemast->UM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UM" class="<?php echo $store_storemast->UM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->UM) ?>',1);"><div id="elh_store_storemast_UM" class="store_storemast_UM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->UM->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->UM->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->UM->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->RT->Visible) { // RT ?>
	<?php if ($store_storemast->sortUrl($store_storemast->RT) == "") { ?>
		<th data-name="RT" class="<?php echo $store_storemast->RT->headerCellClass() ?>"><div id="elh_store_storemast_RT" class="store_storemast_RT"><div class="ew-table-header-caption"><?php echo $store_storemast->RT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RT" class="<?php echo $store_storemast->RT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->RT) ?>',1);"><div id="elh_store_storemast_RT" class="store_storemast_RT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->RT->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->RT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->RT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->UR->Visible) { // UR ?>
	<?php if ($store_storemast->sortUrl($store_storemast->UR) == "") { ?>
		<th data-name="UR" class="<?php echo $store_storemast->UR->headerCellClass() ?>"><div id="elh_store_storemast_UR" class="store_storemast_UR"><div class="ew-table-header-caption"><?php echo $store_storemast->UR->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UR" class="<?php echo $store_storemast->UR->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->UR) ?>',1);"><div id="elh_store_storemast_UR" class="store_storemast_UR">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->UR->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->UR->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->UR->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->TAXP->Visible) { // TAXP ?>
	<?php if ($store_storemast->sortUrl($store_storemast->TAXP) == "") { ?>
		<th data-name="TAXP" class="<?php echo $store_storemast->TAXP->headerCellClass() ?>"><div id="elh_store_storemast_TAXP" class="store_storemast_TAXP"><div class="ew-table-header-caption"><?php echo $store_storemast->TAXP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TAXP" class="<?php echo $store_storemast->TAXP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->TAXP) ?>',1);"><div id="elh_store_storemast_TAXP" class="store_storemast_TAXP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->TAXP->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->TAXP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->TAXP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->BATCHNO->Visible) { // BATCHNO ?>
	<?php if ($store_storemast->sortUrl($store_storemast->BATCHNO) == "") { ?>
		<th data-name="BATCHNO" class="<?php echo $store_storemast->BATCHNO->headerCellClass() ?>"><div id="elh_store_storemast_BATCHNO" class="store_storemast_BATCHNO"><div class="ew-table-header-caption"><?php echo $store_storemast->BATCHNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BATCHNO" class="<?php echo $store_storemast->BATCHNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->BATCHNO) ?>',1);"><div id="elh_store_storemast_BATCHNO" class="store_storemast_BATCHNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->BATCHNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->BATCHNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->BATCHNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->OQ->Visible) { // OQ ?>
	<?php if ($store_storemast->sortUrl($store_storemast->OQ) == "") { ?>
		<th data-name="OQ" class="<?php echo $store_storemast->OQ->headerCellClass() ?>"><div id="elh_store_storemast_OQ" class="store_storemast_OQ"><div class="ew-table-header-caption"><?php echo $store_storemast->OQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OQ" class="<?php echo $store_storemast->OQ->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->OQ) ?>',1);"><div id="elh_store_storemast_OQ" class="store_storemast_OQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->OQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->OQ->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->OQ->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->RQ->Visible) { // RQ ?>
	<?php if ($store_storemast->sortUrl($store_storemast->RQ) == "") { ?>
		<th data-name="RQ" class="<?php echo $store_storemast->RQ->headerCellClass() ?>"><div id="elh_store_storemast_RQ" class="store_storemast_RQ"><div class="ew-table-header-caption"><?php echo $store_storemast->RQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RQ" class="<?php echo $store_storemast->RQ->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->RQ) ?>',1);"><div id="elh_store_storemast_RQ" class="store_storemast_RQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->RQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->RQ->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->RQ->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->MRQ->Visible) { // MRQ ?>
	<?php if ($store_storemast->sortUrl($store_storemast->MRQ) == "") { ?>
		<th data-name="MRQ" class="<?php echo $store_storemast->MRQ->headerCellClass() ?>"><div id="elh_store_storemast_MRQ" class="store_storemast_MRQ"><div class="ew-table-header-caption"><?php echo $store_storemast->MRQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MRQ" class="<?php echo $store_storemast->MRQ->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->MRQ) ?>',1);"><div id="elh_store_storemast_MRQ" class="store_storemast_MRQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->MRQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->MRQ->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->MRQ->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->IQ->Visible) { // IQ ?>
	<?php if ($store_storemast->sortUrl($store_storemast->IQ) == "") { ?>
		<th data-name="IQ" class="<?php echo $store_storemast->IQ->headerCellClass() ?>"><div id="elh_store_storemast_IQ" class="store_storemast_IQ"><div class="ew-table-header-caption"><?php echo $store_storemast->IQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IQ" class="<?php echo $store_storemast->IQ->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->IQ) ?>',1);"><div id="elh_store_storemast_IQ" class="store_storemast_IQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->IQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->IQ->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->IQ->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->MRP->Visible) { // MRP ?>
	<?php if ($store_storemast->sortUrl($store_storemast->MRP) == "") { ?>
		<th data-name="MRP" class="<?php echo $store_storemast->MRP->headerCellClass() ?>"><div id="elh_store_storemast_MRP" class="store_storemast_MRP"><div class="ew-table-header-caption"><?php echo $store_storemast->MRP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MRP" class="<?php echo $store_storemast->MRP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->MRP) ?>',1);"><div id="elh_store_storemast_MRP" class="store_storemast_MRP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->MRP->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->MRP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->MRP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->EXPDT->Visible) { // EXPDT ?>
	<?php if ($store_storemast->sortUrl($store_storemast->EXPDT) == "") { ?>
		<th data-name="EXPDT" class="<?php echo $store_storemast->EXPDT->headerCellClass() ?>"><div id="elh_store_storemast_EXPDT" class="store_storemast_EXPDT"><div class="ew-table-header-caption"><?php echo $store_storemast->EXPDT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EXPDT" class="<?php echo $store_storemast->EXPDT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->EXPDT) ?>',1);"><div id="elh_store_storemast_EXPDT" class="store_storemast_EXPDT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->EXPDT->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->EXPDT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->EXPDT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->SALQTY->Visible) { // SALQTY ?>
	<?php if ($store_storemast->sortUrl($store_storemast->SALQTY) == "") { ?>
		<th data-name="SALQTY" class="<?php echo $store_storemast->SALQTY->headerCellClass() ?>"><div id="elh_store_storemast_SALQTY" class="store_storemast_SALQTY"><div class="ew-table-header-caption"><?php echo $store_storemast->SALQTY->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SALQTY" class="<?php echo $store_storemast->SALQTY->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->SALQTY) ?>',1);"><div id="elh_store_storemast_SALQTY" class="store_storemast_SALQTY">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->SALQTY->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->SALQTY->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->SALQTY->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->LASTPURDT->Visible) { // LASTPURDT ?>
	<?php if ($store_storemast->sortUrl($store_storemast->LASTPURDT) == "") { ?>
		<th data-name="LASTPURDT" class="<?php echo $store_storemast->LASTPURDT->headerCellClass() ?>"><div id="elh_store_storemast_LASTPURDT" class="store_storemast_LASTPURDT"><div class="ew-table-header-caption"><?php echo $store_storemast->LASTPURDT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LASTPURDT" class="<?php echo $store_storemast->LASTPURDT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->LASTPURDT) ?>',1);"><div id="elh_store_storemast_LASTPURDT" class="store_storemast_LASTPURDT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->LASTPURDT->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->LASTPURDT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->LASTPURDT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->LASTSUPP->Visible) { // LASTSUPP ?>
	<?php if ($store_storemast->sortUrl($store_storemast->LASTSUPP) == "") { ?>
		<th data-name="LASTSUPP" class="<?php echo $store_storemast->LASTSUPP->headerCellClass() ?>"><div id="elh_store_storemast_LASTSUPP" class="store_storemast_LASTSUPP"><div class="ew-table-header-caption"><?php echo $store_storemast->LASTSUPP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LASTSUPP" class="<?php echo $store_storemast->LASTSUPP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->LASTSUPP) ?>',1);"><div id="elh_store_storemast_LASTSUPP" class="store_storemast_LASTSUPP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->LASTSUPP->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->LASTSUPP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->LASTSUPP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->GENNAME->Visible) { // GENNAME ?>
	<?php if ($store_storemast->sortUrl($store_storemast->GENNAME) == "") { ?>
		<th data-name="GENNAME" class="<?php echo $store_storemast->GENNAME->headerCellClass() ?>"><div id="elh_store_storemast_GENNAME" class="store_storemast_GENNAME"><div class="ew-table-header-caption"><?php echo $store_storemast->GENNAME->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GENNAME" class="<?php echo $store_storemast->GENNAME->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->GENNAME) ?>',1);"><div id="elh_store_storemast_GENNAME" class="store_storemast_GENNAME">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->GENNAME->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->GENNAME->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->GENNAME->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->LASTISSDT->Visible) { // LASTISSDT ?>
	<?php if ($store_storemast->sortUrl($store_storemast->LASTISSDT) == "") { ?>
		<th data-name="LASTISSDT" class="<?php echo $store_storemast->LASTISSDT->headerCellClass() ?>"><div id="elh_store_storemast_LASTISSDT" class="store_storemast_LASTISSDT"><div class="ew-table-header-caption"><?php echo $store_storemast->LASTISSDT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LASTISSDT" class="<?php echo $store_storemast->LASTISSDT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->LASTISSDT) ?>',1);"><div id="elh_store_storemast_LASTISSDT" class="store_storemast_LASTISSDT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->LASTISSDT->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->LASTISSDT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->LASTISSDT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->CREATEDDT->Visible) { // CREATEDDT ?>
	<?php if ($store_storemast->sortUrl($store_storemast->CREATEDDT) == "") { ?>
		<th data-name="CREATEDDT" class="<?php echo $store_storemast->CREATEDDT->headerCellClass() ?>"><div id="elh_store_storemast_CREATEDDT" class="store_storemast_CREATEDDT"><div class="ew-table-header-caption"><?php echo $store_storemast->CREATEDDT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CREATEDDT" class="<?php echo $store_storemast->CREATEDDT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->CREATEDDT) ?>',1);"><div id="elh_store_storemast_CREATEDDT" class="store_storemast_CREATEDDT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->CREATEDDT->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->CREATEDDT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->CREATEDDT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->OPPRC->Visible) { // OPPRC ?>
	<?php if ($store_storemast->sortUrl($store_storemast->OPPRC) == "") { ?>
		<th data-name="OPPRC" class="<?php echo $store_storemast->OPPRC->headerCellClass() ?>"><div id="elh_store_storemast_OPPRC" class="store_storemast_OPPRC"><div class="ew-table-header-caption"><?php echo $store_storemast->OPPRC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OPPRC" class="<?php echo $store_storemast->OPPRC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->OPPRC) ?>',1);"><div id="elh_store_storemast_OPPRC" class="store_storemast_OPPRC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->OPPRC->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->OPPRC->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->OPPRC->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->RESTRICT->Visible) { // RESTRICT ?>
	<?php if ($store_storemast->sortUrl($store_storemast->RESTRICT) == "") { ?>
		<th data-name="RESTRICT" class="<?php echo $store_storemast->RESTRICT->headerCellClass() ?>"><div id="elh_store_storemast_RESTRICT" class="store_storemast_RESTRICT"><div class="ew-table-header-caption"><?php echo $store_storemast->RESTRICT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RESTRICT" class="<?php echo $store_storemast->RESTRICT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->RESTRICT) ?>',1);"><div id="elh_store_storemast_RESTRICT" class="store_storemast_RESTRICT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->RESTRICT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->RESTRICT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->RESTRICT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->BAWAPRC->Visible) { // BAWAPRC ?>
	<?php if ($store_storemast->sortUrl($store_storemast->BAWAPRC) == "") { ?>
		<th data-name="BAWAPRC" class="<?php echo $store_storemast->BAWAPRC->headerCellClass() ?>"><div id="elh_store_storemast_BAWAPRC" class="store_storemast_BAWAPRC"><div class="ew-table-header-caption"><?php echo $store_storemast->BAWAPRC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BAWAPRC" class="<?php echo $store_storemast->BAWAPRC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->BAWAPRC) ?>',1);"><div id="elh_store_storemast_BAWAPRC" class="store_storemast_BAWAPRC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->BAWAPRC->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->BAWAPRC->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->BAWAPRC->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->STAXPER->Visible) { // STAXPER ?>
	<?php if ($store_storemast->sortUrl($store_storemast->STAXPER) == "") { ?>
		<th data-name="STAXPER" class="<?php echo $store_storemast->STAXPER->headerCellClass() ?>"><div id="elh_store_storemast_STAXPER" class="store_storemast_STAXPER"><div class="ew-table-header-caption"><?php echo $store_storemast->STAXPER->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="STAXPER" class="<?php echo $store_storemast->STAXPER->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->STAXPER) ?>',1);"><div id="elh_store_storemast_STAXPER" class="store_storemast_STAXPER">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->STAXPER->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->STAXPER->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->STAXPER->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->TAXTYPE->Visible) { // TAXTYPE ?>
	<?php if ($store_storemast->sortUrl($store_storemast->TAXTYPE) == "") { ?>
		<th data-name="TAXTYPE" class="<?php echo $store_storemast->TAXTYPE->headerCellClass() ?>"><div id="elh_store_storemast_TAXTYPE" class="store_storemast_TAXTYPE"><div class="ew-table-header-caption"><?php echo $store_storemast->TAXTYPE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TAXTYPE" class="<?php echo $store_storemast->TAXTYPE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->TAXTYPE) ?>',1);"><div id="elh_store_storemast_TAXTYPE" class="store_storemast_TAXTYPE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->TAXTYPE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->TAXTYPE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->TAXTYPE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->OLDTAXP->Visible) { // OLDTAXP ?>
	<?php if ($store_storemast->sortUrl($store_storemast->OLDTAXP) == "") { ?>
		<th data-name="OLDTAXP" class="<?php echo $store_storemast->OLDTAXP->headerCellClass() ?>"><div id="elh_store_storemast_OLDTAXP" class="store_storemast_OLDTAXP"><div class="ew-table-header-caption"><?php echo $store_storemast->OLDTAXP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OLDTAXP" class="<?php echo $store_storemast->OLDTAXP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->OLDTAXP) ?>',1);"><div id="elh_store_storemast_OLDTAXP" class="store_storemast_OLDTAXP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->OLDTAXP->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->OLDTAXP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->OLDTAXP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->TAXUPD->Visible) { // TAXUPD ?>
	<?php if ($store_storemast->sortUrl($store_storemast->TAXUPD) == "") { ?>
		<th data-name="TAXUPD" class="<?php echo $store_storemast->TAXUPD->headerCellClass() ?>"><div id="elh_store_storemast_TAXUPD" class="store_storemast_TAXUPD"><div class="ew-table-header-caption"><?php echo $store_storemast->TAXUPD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TAXUPD" class="<?php echo $store_storemast->TAXUPD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->TAXUPD) ?>',1);"><div id="elh_store_storemast_TAXUPD" class="store_storemast_TAXUPD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->TAXUPD->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->TAXUPD->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->TAXUPD->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->PACKAGE->Visible) { // PACKAGE ?>
	<?php if ($store_storemast->sortUrl($store_storemast->PACKAGE) == "") { ?>
		<th data-name="PACKAGE" class="<?php echo $store_storemast->PACKAGE->headerCellClass() ?>"><div id="elh_store_storemast_PACKAGE" class="store_storemast_PACKAGE"><div class="ew-table-header-caption"><?php echo $store_storemast->PACKAGE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PACKAGE" class="<?php echo $store_storemast->PACKAGE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->PACKAGE) ?>',1);"><div id="elh_store_storemast_PACKAGE" class="store_storemast_PACKAGE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->PACKAGE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->PACKAGE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->PACKAGE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->NEWRT->Visible) { // NEWRT ?>
	<?php if ($store_storemast->sortUrl($store_storemast->NEWRT) == "") { ?>
		<th data-name="NEWRT" class="<?php echo $store_storemast->NEWRT->headerCellClass() ?>"><div id="elh_store_storemast_NEWRT" class="store_storemast_NEWRT"><div class="ew-table-header-caption"><?php echo $store_storemast->NEWRT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NEWRT" class="<?php echo $store_storemast->NEWRT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->NEWRT) ?>',1);"><div id="elh_store_storemast_NEWRT" class="store_storemast_NEWRT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->NEWRT->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->NEWRT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->NEWRT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->NEWMRP->Visible) { // NEWMRP ?>
	<?php if ($store_storemast->sortUrl($store_storemast->NEWMRP) == "") { ?>
		<th data-name="NEWMRP" class="<?php echo $store_storemast->NEWMRP->headerCellClass() ?>"><div id="elh_store_storemast_NEWMRP" class="store_storemast_NEWMRP"><div class="ew-table-header-caption"><?php echo $store_storemast->NEWMRP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NEWMRP" class="<?php echo $store_storemast->NEWMRP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->NEWMRP) ?>',1);"><div id="elh_store_storemast_NEWMRP" class="store_storemast_NEWMRP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->NEWMRP->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->NEWMRP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->NEWMRP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->NEWUR->Visible) { // NEWUR ?>
	<?php if ($store_storemast->sortUrl($store_storemast->NEWUR) == "") { ?>
		<th data-name="NEWUR" class="<?php echo $store_storemast->NEWUR->headerCellClass() ?>"><div id="elh_store_storemast_NEWUR" class="store_storemast_NEWUR"><div class="ew-table-header-caption"><?php echo $store_storemast->NEWUR->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NEWUR" class="<?php echo $store_storemast->NEWUR->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->NEWUR) ?>',1);"><div id="elh_store_storemast_NEWUR" class="store_storemast_NEWUR">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->NEWUR->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->NEWUR->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->NEWUR->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->STATUS->Visible) { // STATUS ?>
	<?php if ($store_storemast->sortUrl($store_storemast->STATUS) == "") { ?>
		<th data-name="STATUS" class="<?php echo $store_storemast->STATUS->headerCellClass() ?>"><div id="elh_store_storemast_STATUS" class="store_storemast_STATUS"><div class="ew-table-header-caption"><?php echo $store_storemast->STATUS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="STATUS" class="<?php echo $store_storemast->STATUS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->STATUS) ?>',1);"><div id="elh_store_storemast_STATUS" class="store_storemast_STATUS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->STATUS->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->STATUS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->STATUS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->RETNQTY->Visible) { // RETNQTY ?>
	<?php if ($store_storemast->sortUrl($store_storemast->RETNQTY) == "") { ?>
		<th data-name="RETNQTY" class="<?php echo $store_storemast->RETNQTY->headerCellClass() ?>"><div id="elh_store_storemast_RETNQTY" class="store_storemast_RETNQTY"><div class="ew-table-header-caption"><?php echo $store_storemast->RETNQTY->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RETNQTY" class="<?php echo $store_storemast->RETNQTY->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->RETNQTY) ?>',1);"><div id="elh_store_storemast_RETNQTY" class="store_storemast_RETNQTY">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->RETNQTY->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->RETNQTY->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->RETNQTY->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->KEMODISC->Visible) { // KEMODISC ?>
	<?php if ($store_storemast->sortUrl($store_storemast->KEMODISC) == "") { ?>
		<th data-name="KEMODISC" class="<?php echo $store_storemast->KEMODISC->headerCellClass() ?>"><div id="elh_store_storemast_KEMODISC" class="store_storemast_KEMODISC"><div class="ew-table-header-caption"><?php echo $store_storemast->KEMODISC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="KEMODISC" class="<?php echo $store_storemast->KEMODISC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->KEMODISC) ?>',1);"><div id="elh_store_storemast_KEMODISC" class="store_storemast_KEMODISC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->KEMODISC->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->KEMODISC->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->KEMODISC->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->PATSALE->Visible) { // PATSALE ?>
	<?php if ($store_storemast->sortUrl($store_storemast->PATSALE) == "") { ?>
		<th data-name="PATSALE" class="<?php echo $store_storemast->PATSALE->headerCellClass() ?>"><div id="elh_store_storemast_PATSALE" class="store_storemast_PATSALE"><div class="ew-table-header-caption"><?php echo $store_storemast->PATSALE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PATSALE" class="<?php echo $store_storemast->PATSALE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->PATSALE) ?>',1);"><div id="elh_store_storemast_PATSALE" class="store_storemast_PATSALE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->PATSALE->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->PATSALE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->PATSALE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->ORGAN->Visible) { // ORGAN ?>
	<?php if ($store_storemast->sortUrl($store_storemast->ORGAN) == "") { ?>
		<th data-name="ORGAN" class="<?php echo $store_storemast->ORGAN->headerCellClass() ?>"><div id="elh_store_storemast_ORGAN" class="store_storemast_ORGAN"><div class="ew-table-header-caption"><?php echo $store_storemast->ORGAN->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ORGAN" class="<?php echo $store_storemast->ORGAN->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->ORGAN) ?>',1);"><div id="elh_store_storemast_ORGAN" class="store_storemast_ORGAN">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->ORGAN->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->ORGAN->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->ORGAN->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->OLDRQ->Visible) { // OLDRQ ?>
	<?php if ($store_storemast->sortUrl($store_storemast->OLDRQ) == "") { ?>
		<th data-name="OLDRQ" class="<?php echo $store_storemast->OLDRQ->headerCellClass() ?>"><div id="elh_store_storemast_OLDRQ" class="store_storemast_OLDRQ"><div class="ew-table-header-caption"><?php echo $store_storemast->OLDRQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OLDRQ" class="<?php echo $store_storemast->OLDRQ->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->OLDRQ) ?>',1);"><div id="elh_store_storemast_OLDRQ" class="store_storemast_OLDRQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->OLDRQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->OLDRQ->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->OLDRQ->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->DRID->Visible) { // DRID ?>
	<?php if ($store_storemast->sortUrl($store_storemast->DRID) == "") { ?>
		<th data-name="DRID" class="<?php echo $store_storemast->DRID->headerCellClass() ?>"><div id="elh_store_storemast_DRID" class="store_storemast_DRID"><div class="ew-table-header-caption"><?php echo $store_storemast->DRID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DRID" class="<?php echo $store_storemast->DRID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->DRID) ?>',1);"><div id="elh_store_storemast_DRID" class="store_storemast_DRID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->DRID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->DRID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->DRID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->MFRCODE->Visible) { // MFRCODE ?>
	<?php if ($store_storemast->sortUrl($store_storemast->MFRCODE) == "") { ?>
		<th data-name="MFRCODE" class="<?php echo $store_storemast->MFRCODE->headerCellClass() ?>"><div id="elh_store_storemast_MFRCODE" class="store_storemast_MFRCODE"><div class="ew-table-header-caption"><?php echo $store_storemast->MFRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MFRCODE" class="<?php echo $store_storemast->MFRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->MFRCODE) ?>',1);"><div id="elh_store_storemast_MFRCODE" class="store_storemast_MFRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->MFRCODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->MFRCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->MFRCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->COMBCODE->Visible) { // COMBCODE ?>
	<?php if ($store_storemast->sortUrl($store_storemast->COMBCODE) == "") { ?>
		<th data-name="COMBCODE" class="<?php echo $store_storemast->COMBCODE->headerCellClass() ?>"><div id="elh_store_storemast_COMBCODE" class="store_storemast_COMBCODE"><div class="ew-table-header-caption"><?php echo $store_storemast->COMBCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="COMBCODE" class="<?php echo $store_storemast->COMBCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->COMBCODE) ?>',1);"><div id="elh_store_storemast_COMBCODE" class="store_storemast_COMBCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->COMBCODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->COMBCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->COMBCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->GENCODE->Visible) { // GENCODE ?>
	<?php if ($store_storemast->sortUrl($store_storemast->GENCODE) == "") { ?>
		<th data-name="GENCODE" class="<?php echo $store_storemast->GENCODE->headerCellClass() ?>"><div id="elh_store_storemast_GENCODE" class="store_storemast_GENCODE"><div class="ew-table-header-caption"><?php echo $store_storemast->GENCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GENCODE" class="<?php echo $store_storemast->GENCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->GENCODE) ?>',1);"><div id="elh_store_storemast_GENCODE" class="store_storemast_GENCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->GENCODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->GENCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->GENCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->STRENGTH->Visible) { // STRENGTH ?>
	<?php if ($store_storemast->sortUrl($store_storemast->STRENGTH) == "") { ?>
		<th data-name="STRENGTH" class="<?php echo $store_storemast->STRENGTH->headerCellClass() ?>"><div id="elh_store_storemast_STRENGTH" class="store_storemast_STRENGTH"><div class="ew-table-header-caption"><?php echo $store_storemast->STRENGTH->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="STRENGTH" class="<?php echo $store_storemast->STRENGTH->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->STRENGTH) ?>',1);"><div id="elh_store_storemast_STRENGTH" class="store_storemast_STRENGTH">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->STRENGTH->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->STRENGTH->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->STRENGTH->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->UNIT->Visible) { // UNIT ?>
	<?php if ($store_storemast->sortUrl($store_storemast->UNIT) == "") { ?>
		<th data-name="UNIT" class="<?php echo $store_storemast->UNIT->headerCellClass() ?>"><div id="elh_store_storemast_UNIT" class="store_storemast_UNIT"><div class="ew-table-header-caption"><?php echo $store_storemast->UNIT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UNIT" class="<?php echo $store_storemast->UNIT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->UNIT) ?>',1);"><div id="elh_store_storemast_UNIT" class="store_storemast_UNIT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->UNIT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->UNIT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->UNIT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->FORMULARY->Visible) { // FORMULARY ?>
	<?php if ($store_storemast->sortUrl($store_storemast->FORMULARY) == "") { ?>
		<th data-name="FORMULARY" class="<?php echo $store_storemast->FORMULARY->headerCellClass() ?>"><div id="elh_store_storemast_FORMULARY" class="store_storemast_FORMULARY"><div class="ew-table-header-caption"><?php echo $store_storemast->FORMULARY->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FORMULARY" class="<?php echo $store_storemast->FORMULARY->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->FORMULARY) ?>',1);"><div id="elh_store_storemast_FORMULARY" class="store_storemast_FORMULARY">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->FORMULARY->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->FORMULARY->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->FORMULARY->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->STOCK->Visible) { // STOCK ?>
	<?php if ($store_storemast->sortUrl($store_storemast->STOCK) == "") { ?>
		<th data-name="STOCK" class="<?php echo $store_storemast->STOCK->headerCellClass() ?>"><div id="elh_store_storemast_STOCK" class="store_storemast_STOCK"><div class="ew-table-header-caption"><?php echo $store_storemast->STOCK->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="STOCK" class="<?php echo $store_storemast->STOCK->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->STOCK) ?>',1);"><div id="elh_store_storemast_STOCK" class="store_storemast_STOCK">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->STOCK->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->STOCK->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->STOCK->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->RACKNO->Visible) { // RACKNO ?>
	<?php if ($store_storemast->sortUrl($store_storemast->RACKNO) == "") { ?>
		<th data-name="RACKNO" class="<?php echo $store_storemast->RACKNO->headerCellClass() ?>"><div id="elh_store_storemast_RACKNO" class="store_storemast_RACKNO"><div class="ew-table-header-caption"><?php echo $store_storemast->RACKNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RACKNO" class="<?php echo $store_storemast->RACKNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->RACKNO) ?>',1);"><div id="elh_store_storemast_RACKNO" class="store_storemast_RACKNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->RACKNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->RACKNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->RACKNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->SUPPNAME->Visible) { // SUPPNAME ?>
	<?php if ($store_storemast->sortUrl($store_storemast->SUPPNAME) == "") { ?>
		<th data-name="SUPPNAME" class="<?php echo $store_storemast->SUPPNAME->headerCellClass() ?>"><div id="elh_store_storemast_SUPPNAME" class="store_storemast_SUPPNAME"><div class="ew-table-header-caption"><?php echo $store_storemast->SUPPNAME->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SUPPNAME" class="<?php echo $store_storemast->SUPPNAME->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->SUPPNAME) ?>',1);"><div id="elh_store_storemast_SUPPNAME" class="store_storemast_SUPPNAME">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->SUPPNAME->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->SUPPNAME->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->SUPPNAME->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->COMBNAME->Visible) { // COMBNAME ?>
	<?php if ($store_storemast->sortUrl($store_storemast->COMBNAME) == "") { ?>
		<th data-name="COMBNAME" class="<?php echo $store_storemast->COMBNAME->headerCellClass() ?>"><div id="elh_store_storemast_COMBNAME" class="store_storemast_COMBNAME"><div class="ew-table-header-caption"><?php echo $store_storemast->COMBNAME->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="COMBNAME" class="<?php echo $store_storemast->COMBNAME->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->COMBNAME) ?>',1);"><div id="elh_store_storemast_COMBNAME" class="store_storemast_COMBNAME">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->COMBNAME->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->COMBNAME->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->COMBNAME->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->GENERICNAME->Visible) { // GENERICNAME ?>
	<?php if ($store_storemast->sortUrl($store_storemast->GENERICNAME) == "") { ?>
		<th data-name="GENERICNAME" class="<?php echo $store_storemast->GENERICNAME->headerCellClass() ?>"><div id="elh_store_storemast_GENERICNAME" class="store_storemast_GENERICNAME"><div class="ew-table-header-caption"><?php echo $store_storemast->GENERICNAME->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GENERICNAME" class="<?php echo $store_storemast->GENERICNAME->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->GENERICNAME) ?>',1);"><div id="elh_store_storemast_GENERICNAME" class="store_storemast_GENERICNAME">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->GENERICNAME->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->GENERICNAME->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->GENERICNAME->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->REMARK->Visible) { // REMARK ?>
	<?php if ($store_storemast->sortUrl($store_storemast->REMARK) == "") { ?>
		<th data-name="REMARK" class="<?php echo $store_storemast->REMARK->headerCellClass() ?>"><div id="elh_store_storemast_REMARK" class="store_storemast_REMARK"><div class="ew-table-header-caption"><?php echo $store_storemast->REMARK->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="REMARK" class="<?php echo $store_storemast->REMARK->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->REMARK) ?>',1);"><div id="elh_store_storemast_REMARK" class="store_storemast_REMARK">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->REMARK->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->REMARK->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->REMARK->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->TEMP->Visible) { // TEMP ?>
	<?php if ($store_storemast->sortUrl($store_storemast->TEMP) == "") { ?>
		<th data-name="TEMP" class="<?php echo $store_storemast->TEMP->headerCellClass() ?>"><div id="elh_store_storemast_TEMP" class="store_storemast_TEMP"><div class="ew-table-header-caption"><?php echo $store_storemast->TEMP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TEMP" class="<?php echo $store_storemast->TEMP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->TEMP) ?>',1);"><div id="elh_store_storemast_TEMP" class="store_storemast_TEMP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->TEMP->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->TEMP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->TEMP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->PACKING->Visible) { // PACKING ?>
	<?php if ($store_storemast->sortUrl($store_storemast->PACKING) == "") { ?>
		<th data-name="PACKING" class="<?php echo $store_storemast->PACKING->headerCellClass() ?>"><div id="elh_store_storemast_PACKING" class="store_storemast_PACKING"><div class="ew-table-header-caption"><?php echo $store_storemast->PACKING->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PACKING" class="<?php echo $store_storemast->PACKING->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->PACKING) ?>',1);"><div id="elh_store_storemast_PACKING" class="store_storemast_PACKING">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->PACKING->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->PACKING->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->PACKING->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->PhysQty->Visible) { // PhysQty ?>
	<?php if ($store_storemast->sortUrl($store_storemast->PhysQty) == "") { ?>
		<th data-name="PhysQty" class="<?php echo $store_storemast->PhysQty->headerCellClass() ?>"><div id="elh_store_storemast_PhysQty" class="store_storemast_PhysQty"><div class="ew-table-header-caption"><?php echo $store_storemast->PhysQty->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PhysQty" class="<?php echo $store_storemast->PhysQty->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->PhysQty) ?>',1);"><div id="elh_store_storemast_PhysQty" class="store_storemast_PhysQty">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->PhysQty->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->PhysQty->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->PhysQty->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->LedQty->Visible) { // LedQty ?>
	<?php if ($store_storemast->sortUrl($store_storemast->LedQty) == "") { ?>
		<th data-name="LedQty" class="<?php echo $store_storemast->LedQty->headerCellClass() ?>"><div id="elh_store_storemast_LedQty" class="store_storemast_LedQty"><div class="ew-table-header-caption"><?php echo $store_storemast->LedQty->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LedQty" class="<?php echo $store_storemast->LedQty->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->LedQty) ?>',1);"><div id="elh_store_storemast_LedQty" class="store_storemast_LedQty">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->LedQty->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->LedQty->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->LedQty->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->id->Visible) { // id ?>
	<?php if ($store_storemast->sortUrl($store_storemast->id) == "") { ?>
		<th data-name="id" class="<?php echo $store_storemast->id->headerCellClass() ?>"><div id="elh_store_storemast_id" class="store_storemast_id"><div class="ew-table-header-caption"><?php echo $store_storemast->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $store_storemast->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->id) ?>',1);"><div id="elh_store_storemast_id" class="store_storemast_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->PurValue->Visible) { // PurValue ?>
	<?php if ($store_storemast->sortUrl($store_storemast->PurValue) == "") { ?>
		<th data-name="PurValue" class="<?php echo $store_storemast->PurValue->headerCellClass() ?>"><div id="elh_store_storemast_PurValue" class="store_storemast_PurValue"><div class="ew-table-header-caption"><?php echo $store_storemast->PurValue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PurValue" class="<?php echo $store_storemast->PurValue->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->PurValue) ?>',1);"><div id="elh_store_storemast_PurValue" class="store_storemast_PurValue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->PurValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->PurValue->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->PurValue->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->PSGST->Visible) { // PSGST ?>
	<?php if ($store_storemast->sortUrl($store_storemast->PSGST) == "") { ?>
		<th data-name="PSGST" class="<?php echo $store_storemast->PSGST->headerCellClass() ?>"><div id="elh_store_storemast_PSGST" class="store_storemast_PSGST"><div class="ew-table-header-caption"><?php echo $store_storemast->PSGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PSGST" class="<?php echo $store_storemast->PSGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->PSGST) ?>',1);"><div id="elh_store_storemast_PSGST" class="store_storemast_PSGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->PSGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->PSGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->PSGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->PCGST->Visible) { // PCGST ?>
	<?php if ($store_storemast->sortUrl($store_storemast->PCGST) == "") { ?>
		<th data-name="PCGST" class="<?php echo $store_storemast->PCGST->headerCellClass() ?>"><div id="elh_store_storemast_PCGST" class="store_storemast_PCGST"><div class="ew-table-header-caption"><?php echo $store_storemast->PCGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PCGST" class="<?php echo $store_storemast->PCGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->PCGST) ?>',1);"><div id="elh_store_storemast_PCGST" class="store_storemast_PCGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->PCGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->PCGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->PCGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->SaleValue->Visible) { // SaleValue ?>
	<?php if ($store_storemast->sortUrl($store_storemast->SaleValue) == "") { ?>
		<th data-name="SaleValue" class="<?php echo $store_storemast->SaleValue->headerCellClass() ?>"><div id="elh_store_storemast_SaleValue" class="store_storemast_SaleValue"><div class="ew-table-header-caption"><?php echo $store_storemast->SaleValue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SaleValue" class="<?php echo $store_storemast->SaleValue->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->SaleValue) ?>',1);"><div id="elh_store_storemast_SaleValue" class="store_storemast_SaleValue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->SaleValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->SaleValue->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->SaleValue->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->SSGST->Visible) { // SSGST ?>
	<?php if ($store_storemast->sortUrl($store_storemast->SSGST) == "") { ?>
		<th data-name="SSGST" class="<?php echo $store_storemast->SSGST->headerCellClass() ?>"><div id="elh_store_storemast_SSGST" class="store_storemast_SSGST"><div class="ew-table-header-caption"><?php echo $store_storemast->SSGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SSGST" class="<?php echo $store_storemast->SSGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->SSGST) ?>',1);"><div id="elh_store_storemast_SSGST" class="store_storemast_SSGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->SSGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->SSGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->SSGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->SCGST->Visible) { // SCGST ?>
	<?php if ($store_storemast->sortUrl($store_storemast->SCGST) == "") { ?>
		<th data-name="SCGST" class="<?php echo $store_storemast->SCGST->headerCellClass() ?>"><div id="elh_store_storemast_SCGST" class="store_storemast_SCGST"><div class="ew-table-header-caption"><?php echo $store_storemast->SCGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SCGST" class="<?php echo $store_storemast->SCGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->SCGST) ?>',1);"><div id="elh_store_storemast_SCGST" class="store_storemast_SCGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->SCGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->SCGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->SCGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->SaleRate->Visible) { // SaleRate ?>
	<?php if ($store_storemast->sortUrl($store_storemast->SaleRate) == "") { ?>
		<th data-name="SaleRate" class="<?php echo $store_storemast->SaleRate->headerCellClass() ?>"><div id="elh_store_storemast_SaleRate" class="store_storemast_SaleRate"><div class="ew-table-header-caption"><?php echo $store_storemast->SaleRate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SaleRate" class="<?php echo $store_storemast->SaleRate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->SaleRate) ?>',1);"><div id="elh_store_storemast_SaleRate" class="store_storemast_SaleRate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->SaleRate->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->SaleRate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->SaleRate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->HospID->Visible) { // HospID ?>
	<?php if ($store_storemast->sortUrl($store_storemast->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $store_storemast->HospID->headerCellClass() ?>"><div id="elh_store_storemast_HospID" class="store_storemast_HospID"><div class="ew-table-header-caption"><?php echo $store_storemast->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $store_storemast->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->HospID) ?>',1);"><div id="elh_store_storemast_HospID" class="store_storemast_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->BRNAME->Visible) { // BRNAME ?>
	<?php if ($store_storemast->sortUrl($store_storemast->BRNAME) == "") { ?>
		<th data-name="BRNAME" class="<?php echo $store_storemast->BRNAME->headerCellClass() ?>"><div id="elh_store_storemast_BRNAME" class="store_storemast_BRNAME"><div class="ew-table-header-caption"><?php echo $store_storemast->BRNAME->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BRNAME" class="<?php echo $store_storemast->BRNAME->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->BRNAME) ?>',1);"><div id="elh_store_storemast_BRNAME" class="store_storemast_BRNAME">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->BRNAME->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->BRNAME->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->BRNAME->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->OV->Visible) { // OV ?>
	<?php if ($store_storemast->sortUrl($store_storemast->OV) == "") { ?>
		<th data-name="OV" class="<?php echo $store_storemast->OV->headerCellClass() ?>"><div id="elh_store_storemast_OV" class="store_storemast_OV"><div class="ew-table-header-caption"><?php echo $store_storemast->OV->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OV" class="<?php echo $store_storemast->OV->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->OV) ?>',1);"><div id="elh_store_storemast_OV" class="store_storemast_OV">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->OV->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->OV->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->OV->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->LATESTOV->Visible) { // LATESTOV ?>
	<?php if ($store_storemast->sortUrl($store_storemast->LATESTOV) == "") { ?>
		<th data-name="LATESTOV" class="<?php echo $store_storemast->LATESTOV->headerCellClass() ?>"><div id="elh_store_storemast_LATESTOV" class="store_storemast_LATESTOV"><div class="ew-table-header-caption"><?php echo $store_storemast->LATESTOV->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LATESTOV" class="<?php echo $store_storemast->LATESTOV->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->LATESTOV) ?>',1);"><div id="elh_store_storemast_LATESTOV" class="store_storemast_LATESTOV">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->LATESTOV->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->LATESTOV->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->LATESTOV->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->ITEMTYPE->Visible) { // ITEMTYPE ?>
	<?php if ($store_storemast->sortUrl($store_storemast->ITEMTYPE) == "") { ?>
		<th data-name="ITEMTYPE" class="<?php echo $store_storemast->ITEMTYPE->headerCellClass() ?>"><div id="elh_store_storemast_ITEMTYPE" class="store_storemast_ITEMTYPE"><div class="ew-table-header-caption"><?php echo $store_storemast->ITEMTYPE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ITEMTYPE" class="<?php echo $store_storemast->ITEMTYPE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->ITEMTYPE) ?>',1);"><div id="elh_store_storemast_ITEMTYPE" class="store_storemast_ITEMTYPE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->ITEMTYPE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->ITEMTYPE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->ITEMTYPE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->ROWID->Visible) { // ROWID ?>
	<?php if ($store_storemast->sortUrl($store_storemast->ROWID) == "") { ?>
		<th data-name="ROWID" class="<?php echo $store_storemast->ROWID->headerCellClass() ?>"><div id="elh_store_storemast_ROWID" class="store_storemast_ROWID"><div class="ew-table-header-caption"><?php echo $store_storemast->ROWID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ROWID" class="<?php echo $store_storemast->ROWID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->ROWID) ?>',1);"><div id="elh_store_storemast_ROWID" class="store_storemast_ROWID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->ROWID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->ROWID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->ROWID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->MOVED->Visible) { // MOVED ?>
	<?php if ($store_storemast->sortUrl($store_storemast->MOVED) == "") { ?>
		<th data-name="MOVED" class="<?php echo $store_storemast->MOVED->headerCellClass() ?>"><div id="elh_store_storemast_MOVED" class="store_storemast_MOVED"><div class="ew-table-header-caption"><?php echo $store_storemast->MOVED->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MOVED" class="<?php echo $store_storemast->MOVED->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->MOVED) ?>',1);"><div id="elh_store_storemast_MOVED" class="store_storemast_MOVED">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->MOVED->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->MOVED->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->MOVED->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->NEWTAX->Visible) { // NEWTAX ?>
	<?php if ($store_storemast->sortUrl($store_storemast->NEWTAX) == "") { ?>
		<th data-name="NEWTAX" class="<?php echo $store_storemast->NEWTAX->headerCellClass() ?>"><div id="elh_store_storemast_NEWTAX" class="store_storemast_NEWTAX"><div class="ew-table-header-caption"><?php echo $store_storemast->NEWTAX->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NEWTAX" class="<?php echo $store_storemast->NEWTAX->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->NEWTAX) ?>',1);"><div id="elh_store_storemast_NEWTAX" class="store_storemast_NEWTAX">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->NEWTAX->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->NEWTAX->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->NEWTAX->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->HSNCODE->Visible) { // HSNCODE ?>
	<?php if ($store_storemast->sortUrl($store_storemast->HSNCODE) == "") { ?>
		<th data-name="HSNCODE" class="<?php echo $store_storemast->HSNCODE->headerCellClass() ?>"><div id="elh_store_storemast_HSNCODE" class="store_storemast_HSNCODE"><div class="ew-table-header-caption"><?php echo $store_storemast->HSNCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HSNCODE" class="<?php echo $store_storemast->HSNCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->HSNCODE) ?>',1);"><div id="elh_store_storemast_HSNCODE" class="store_storemast_HSNCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->HSNCODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->HSNCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->HSNCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->OLDTAX->Visible) { // OLDTAX ?>
	<?php if ($store_storemast->sortUrl($store_storemast->OLDTAX) == "") { ?>
		<th data-name="OLDTAX" class="<?php echo $store_storemast->OLDTAX->headerCellClass() ?>"><div id="elh_store_storemast_OLDTAX" class="store_storemast_OLDTAX"><div class="ew-table-header-caption"><?php echo $store_storemast->OLDTAX->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OLDTAX" class="<?php echo $store_storemast->OLDTAX->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->OLDTAX) ?>',1);"><div id="elh_store_storemast_OLDTAX" class="store_storemast_OLDTAX">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->OLDTAX->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->OLDTAX->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->OLDTAX->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_storemast->StoreID->Visible) { // StoreID ?>
	<?php if ($store_storemast->sortUrl($store_storemast->StoreID) == "") { ?>
		<th data-name="StoreID" class="<?php echo $store_storemast->StoreID->headerCellClass() ?>"><div id="elh_store_storemast_StoreID" class="store_storemast_StoreID"><div class="ew-table-header-caption"><?php echo $store_storemast->StoreID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StoreID" class="<?php echo $store_storemast->StoreID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_storemast->SortUrl($store_storemast->StoreID) ?>',1);"><div id="elh_store_storemast_StoreID" class="store_storemast_StoreID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_storemast->StoreID->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_storemast->StoreID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_storemast->StoreID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$store_storemast_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($store_storemast->ExportAll && $store_storemast->isExport()) {
	$store_storemast_list->StopRec = $store_storemast_list->TotalRecs;
} else {

	// Set the last record to display
	if ($store_storemast_list->TotalRecs > $store_storemast_list->StartRec + $store_storemast_list->DisplayRecs - 1)
		$store_storemast_list->StopRec = $store_storemast_list->StartRec + $store_storemast_list->DisplayRecs - 1;
	else
		$store_storemast_list->StopRec = $store_storemast_list->TotalRecs;
}
$store_storemast_list->RecCnt = $store_storemast_list->StartRec - 1;
if ($store_storemast_list->Recordset && !$store_storemast_list->Recordset->EOF) {
	$store_storemast_list->Recordset->moveFirst();
	$selectLimit = $store_storemast_list->UseSelectLimit;
	if (!$selectLimit && $store_storemast_list->StartRec > 1)
		$store_storemast_list->Recordset->move($store_storemast_list->StartRec - 1);
} elseif (!$store_storemast->AllowAddDeleteRow && $store_storemast_list->StopRec == 0) {
	$store_storemast_list->StopRec = $store_storemast->GridAddRowCount;
}

// Initialize aggregate
$store_storemast->RowType = ROWTYPE_AGGREGATEINIT;
$store_storemast->resetAttributes();
$store_storemast_list->renderRow();
while ($store_storemast_list->RecCnt < $store_storemast_list->StopRec) {
	$store_storemast_list->RecCnt++;
	if ($store_storemast_list->RecCnt >= $store_storemast_list->StartRec) {
		$store_storemast_list->RowCnt++;

		// Set up key count
		$store_storemast_list->KeyCount = $store_storemast_list->RowIndex;

		// Init row class and style
		$store_storemast->resetAttributes();
		$store_storemast->CssClass = "";
		if ($store_storemast->isGridAdd()) {
		} else {
			$store_storemast_list->loadRowValues($store_storemast_list->Recordset); // Load row values
		}
		$store_storemast->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$store_storemast->RowAttrs = array_merge($store_storemast->RowAttrs, array('data-rowindex'=>$store_storemast_list->RowCnt, 'id'=>'r' . $store_storemast_list->RowCnt . '_store_storemast', 'data-rowtype'=>$store_storemast->RowType));

		// Render row
		$store_storemast_list->renderRow();

		// Render list options
		$store_storemast_list->renderListOptions();
?>
	<tr<?php echo $store_storemast->rowAttributes() ?>>
<?php

// Render list options (body, left)
$store_storemast_list->ListOptions->render("body", "left", $store_storemast_list->RowCnt);
?>
	<?php if ($store_storemast->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE"<?php echo $store_storemast->BRCODE->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_BRCODE" class="store_storemast_BRCODE">
<span<?php echo $store_storemast->BRCODE->viewAttributes() ?>>
<?php echo $store_storemast->BRCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->PRC->Visible) { // PRC ?>
		<td data-name="PRC"<?php echo $store_storemast->PRC->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_PRC" class="store_storemast_PRC">
<span<?php echo $store_storemast->PRC->viewAttributes() ?>>
<?php echo $store_storemast->PRC->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->TYPE->Visible) { // TYPE ?>
		<td data-name="TYPE"<?php echo $store_storemast->TYPE->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_TYPE" class="store_storemast_TYPE">
<span<?php echo $store_storemast->TYPE->viewAttributes() ?>>
<?php echo $store_storemast->TYPE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->DES->Visible) { // DES ?>
		<td data-name="DES"<?php echo $store_storemast->DES->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_DES" class="store_storemast_DES">
<span<?php echo $store_storemast->DES->viewAttributes() ?>>
<?php echo $store_storemast->DES->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->UM->Visible) { // UM ?>
		<td data-name="UM"<?php echo $store_storemast->UM->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_UM" class="store_storemast_UM">
<span<?php echo $store_storemast->UM->viewAttributes() ?>>
<?php echo $store_storemast->UM->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->RT->Visible) { // RT ?>
		<td data-name="RT"<?php echo $store_storemast->RT->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_RT" class="store_storemast_RT">
<span<?php echo $store_storemast->RT->viewAttributes() ?>>
<?php echo $store_storemast->RT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->UR->Visible) { // UR ?>
		<td data-name="UR"<?php echo $store_storemast->UR->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_UR" class="store_storemast_UR">
<span<?php echo $store_storemast->UR->viewAttributes() ?>>
<?php echo $store_storemast->UR->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->TAXP->Visible) { // TAXP ?>
		<td data-name="TAXP"<?php echo $store_storemast->TAXP->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_TAXP" class="store_storemast_TAXP">
<span<?php echo $store_storemast->TAXP->viewAttributes() ?>>
<?php echo $store_storemast->TAXP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->BATCHNO->Visible) { // BATCHNO ?>
		<td data-name="BATCHNO"<?php echo $store_storemast->BATCHNO->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_BATCHNO" class="store_storemast_BATCHNO">
<span<?php echo $store_storemast->BATCHNO->viewAttributes() ?>>
<?php echo $store_storemast->BATCHNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->OQ->Visible) { // OQ ?>
		<td data-name="OQ"<?php echo $store_storemast->OQ->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_OQ" class="store_storemast_OQ">
<span<?php echo $store_storemast->OQ->viewAttributes() ?>>
<?php echo $store_storemast->OQ->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->RQ->Visible) { // RQ ?>
		<td data-name="RQ"<?php echo $store_storemast->RQ->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_RQ" class="store_storemast_RQ">
<span<?php echo $store_storemast->RQ->viewAttributes() ?>>
<?php echo $store_storemast->RQ->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->MRQ->Visible) { // MRQ ?>
		<td data-name="MRQ"<?php echo $store_storemast->MRQ->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_MRQ" class="store_storemast_MRQ">
<span<?php echo $store_storemast->MRQ->viewAttributes() ?>>
<?php echo $store_storemast->MRQ->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->IQ->Visible) { // IQ ?>
		<td data-name="IQ"<?php echo $store_storemast->IQ->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_IQ" class="store_storemast_IQ">
<span<?php echo $store_storemast->IQ->viewAttributes() ?>>
<?php echo $store_storemast->IQ->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->MRP->Visible) { // MRP ?>
		<td data-name="MRP"<?php echo $store_storemast->MRP->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_MRP" class="store_storemast_MRP">
<span<?php echo $store_storemast->MRP->viewAttributes() ?>>
<?php echo $store_storemast->MRP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->EXPDT->Visible) { // EXPDT ?>
		<td data-name="EXPDT"<?php echo $store_storemast->EXPDT->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_EXPDT" class="store_storemast_EXPDT">
<span<?php echo $store_storemast->EXPDT->viewAttributes() ?>>
<?php echo $store_storemast->EXPDT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->SALQTY->Visible) { // SALQTY ?>
		<td data-name="SALQTY"<?php echo $store_storemast->SALQTY->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_SALQTY" class="store_storemast_SALQTY">
<span<?php echo $store_storemast->SALQTY->viewAttributes() ?>>
<?php echo $store_storemast->SALQTY->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->LASTPURDT->Visible) { // LASTPURDT ?>
		<td data-name="LASTPURDT"<?php echo $store_storemast->LASTPURDT->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_LASTPURDT" class="store_storemast_LASTPURDT">
<span<?php echo $store_storemast->LASTPURDT->viewAttributes() ?>>
<?php echo $store_storemast->LASTPURDT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->LASTSUPP->Visible) { // LASTSUPP ?>
		<td data-name="LASTSUPP"<?php echo $store_storemast->LASTSUPP->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_LASTSUPP" class="store_storemast_LASTSUPP">
<span<?php echo $store_storemast->LASTSUPP->viewAttributes() ?>>
<?php echo $store_storemast->LASTSUPP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->GENNAME->Visible) { // GENNAME ?>
		<td data-name="GENNAME"<?php echo $store_storemast->GENNAME->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_GENNAME" class="store_storemast_GENNAME">
<span<?php echo $store_storemast->GENNAME->viewAttributes() ?>>
<?php echo $store_storemast->GENNAME->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->LASTISSDT->Visible) { // LASTISSDT ?>
		<td data-name="LASTISSDT"<?php echo $store_storemast->LASTISSDT->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_LASTISSDT" class="store_storemast_LASTISSDT">
<span<?php echo $store_storemast->LASTISSDT->viewAttributes() ?>>
<?php echo $store_storemast->LASTISSDT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->CREATEDDT->Visible) { // CREATEDDT ?>
		<td data-name="CREATEDDT"<?php echo $store_storemast->CREATEDDT->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_CREATEDDT" class="store_storemast_CREATEDDT">
<span<?php echo $store_storemast->CREATEDDT->viewAttributes() ?>>
<?php echo $store_storemast->CREATEDDT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->OPPRC->Visible) { // OPPRC ?>
		<td data-name="OPPRC"<?php echo $store_storemast->OPPRC->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_OPPRC" class="store_storemast_OPPRC">
<span<?php echo $store_storemast->OPPRC->viewAttributes() ?>>
<?php echo $store_storemast->OPPRC->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->RESTRICT->Visible) { // RESTRICT ?>
		<td data-name="RESTRICT"<?php echo $store_storemast->RESTRICT->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_RESTRICT" class="store_storemast_RESTRICT">
<span<?php echo $store_storemast->RESTRICT->viewAttributes() ?>>
<?php echo $store_storemast->RESTRICT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->BAWAPRC->Visible) { // BAWAPRC ?>
		<td data-name="BAWAPRC"<?php echo $store_storemast->BAWAPRC->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_BAWAPRC" class="store_storemast_BAWAPRC">
<span<?php echo $store_storemast->BAWAPRC->viewAttributes() ?>>
<?php echo $store_storemast->BAWAPRC->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->STAXPER->Visible) { // STAXPER ?>
		<td data-name="STAXPER"<?php echo $store_storemast->STAXPER->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_STAXPER" class="store_storemast_STAXPER">
<span<?php echo $store_storemast->STAXPER->viewAttributes() ?>>
<?php echo $store_storemast->STAXPER->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->TAXTYPE->Visible) { // TAXTYPE ?>
		<td data-name="TAXTYPE"<?php echo $store_storemast->TAXTYPE->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_TAXTYPE" class="store_storemast_TAXTYPE">
<span<?php echo $store_storemast->TAXTYPE->viewAttributes() ?>>
<?php echo $store_storemast->TAXTYPE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->OLDTAXP->Visible) { // OLDTAXP ?>
		<td data-name="OLDTAXP"<?php echo $store_storemast->OLDTAXP->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_OLDTAXP" class="store_storemast_OLDTAXP">
<span<?php echo $store_storemast->OLDTAXP->viewAttributes() ?>>
<?php echo $store_storemast->OLDTAXP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->TAXUPD->Visible) { // TAXUPD ?>
		<td data-name="TAXUPD"<?php echo $store_storemast->TAXUPD->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_TAXUPD" class="store_storemast_TAXUPD">
<span<?php echo $store_storemast->TAXUPD->viewAttributes() ?>>
<?php echo $store_storemast->TAXUPD->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->PACKAGE->Visible) { // PACKAGE ?>
		<td data-name="PACKAGE"<?php echo $store_storemast->PACKAGE->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_PACKAGE" class="store_storemast_PACKAGE">
<span<?php echo $store_storemast->PACKAGE->viewAttributes() ?>>
<?php echo $store_storemast->PACKAGE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->NEWRT->Visible) { // NEWRT ?>
		<td data-name="NEWRT"<?php echo $store_storemast->NEWRT->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_NEWRT" class="store_storemast_NEWRT">
<span<?php echo $store_storemast->NEWRT->viewAttributes() ?>>
<?php echo $store_storemast->NEWRT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->NEWMRP->Visible) { // NEWMRP ?>
		<td data-name="NEWMRP"<?php echo $store_storemast->NEWMRP->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_NEWMRP" class="store_storemast_NEWMRP">
<span<?php echo $store_storemast->NEWMRP->viewAttributes() ?>>
<?php echo $store_storemast->NEWMRP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->NEWUR->Visible) { // NEWUR ?>
		<td data-name="NEWUR"<?php echo $store_storemast->NEWUR->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_NEWUR" class="store_storemast_NEWUR">
<span<?php echo $store_storemast->NEWUR->viewAttributes() ?>>
<?php echo $store_storemast->NEWUR->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->STATUS->Visible) { // STATUS ?>
		<td data-name="STATUS"<?php echo $store_storemast->STATUS->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_STATUS" class="store_storemast_STATUS">
<span<?php echo $store_storemast->STATUS->viewAttributes() ?>>
<?php echo $store_storemast->STATUS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->RETNQTY->Visible) { // RETNQTY ?>
		<td data-name="RETNQTY"<?php echo $store_storemast->RETNQTY->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_RETNQTY" class="store_storemast_RETNQTY">
<span<?php echo $store_storemast->RETNQTY->viewAttributes() ?>>
<?php echo $store_storemast->RETNQTY->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->KEMODISC->Visible) { // KEMODISC ?>
		<td data-name="KEMODISC"<?php echo $store_storemast->KEMODISC->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_KEMODISC" class="store_storemast_KEMODISC">
<span<?php echo $store_storemast->KEMODISC->viewAttributes() ?>>
<?php echo $store_storemast->KEMODISC->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->PATSALE->Visible) { // PATSALE ?>
		<td data-name="PATSALE"<?php echo $store_storemast->PATSALE->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_PATSALE" class="store_storemast_PATSALE">
<span<?php echo $store_storemast->PATSALE->viewAttributes() ?>>
<?php echo $store_storemast->PATSALE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->ORGAN->Visible) { // ORGAN ?>
		<td data-name="ORGAN"<?php echo $store_storemast->ORGAN->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_ORGAN" class="store_storemast_ORGAN">
<span<?php echo $store_storemast->ORGAN->viewAttributes() ?>>
<?php echo $store_storemast->ORGAN->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->OLDRQ->Visible) { // OLDRQ ?>
		<td data-name="OLDRQ"<?php echo $store_storemast->OLDRQ->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_OLDRQ" class="store_storemast_OLDRQ">
<span<?php echo $store_storemast->OLDRQ->viewAttributes() ?>>
<?php echo $store_storemast->OLDRQ->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->DRID->Visible) { // DRID ?>
		<td data-name="DRID"<?php echo $store_storemast->DRID->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_DRID" class="store_storemast_DRID">
<span<?php echo $store_storemast->DRID->viewAttributes() ?>>
<?php echo $store_storemast->DRID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->MFRCODE->Visible) { // MFRCODE ?>
		<td data-name="MFRCODE"<?php echo $store_storemast->MFRCODE->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_MFRCODE" class="store_storemast_MFRCODE">
<span<?php echo $store_storemast->MFRCODE->viewAttributes() ?>>
<?php echo $store_storemast->MFRCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->COMBCODE->Visible) { // COMBCODE ?>
		<td data-name="COMBCODE"<?php echo $store_storemast->COMBCODE->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_COMBCODE" class="store_storemast_COMBCODE">
<span<?php echo $store_storemast->COMBCODE->viewAttributes() ?>>
<?php echo $store_storemast->COMBCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->GENCODE->Visible) { // GENCODE ?>
		<td data-name="GENCODE"<?php echo $store_storemast->GENCODE->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_GENCODE" class="store_storemast_GENCODE">
<span<?php echo $store_storemast->GENCODE->viewAttributes() ?>>
<?php echo $store_storemast->GENCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->STRENGTH->Visible) { // STRENGTH ?>
		<td data-name="STRENGTH"<?php echo $store_storemast->STRENGTH->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_STRENGTH" class="store_storemast_STRENGTH">
<span<?php echo $store_storemast->STRENGTH->viewAttributes() ?>>
<?php echo $store_storemast->STRENGTH->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->UNIT->Visible) { // UNIT ?>
		<td data-name="UNIT"<?php echo $store_storemast->UNIT->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_UNIT" class="store_storemast_UNIT">
<span<?php echo $store_storemast->UNIT->viewAttributes() ?>>
<?php echo $store_storemast->UNIT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->FORMULARY->Visible) { // FORMULARY ?>
		<td data-name="FORMULARY"<?php echo $store_storemast->FORMULARY->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_FORMULARY" class="store_storemast_FORMULARY">
<span<?php echo $store_storemast->FORMULARY->viewAttributes() ?>>
<?php echo $store_storemast->FORMULARY->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->STOCK->Visible) { // STOCK ?>
		<td data-name="STOCK"<?php echo $store_storemast->STOCK->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_STOCK" class="store_storemast_STOCK">
<span<?php echo $store_storemast->STOCK->viewAttributes() ?>>
<?php echo $store_storemast->STOCK->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->RACKNO->Visible) { // RACKNO ?>
		<td data-name="RACKNO"<?php echo $store_storemast->RACKNO->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_RACKNO" class="store_storemast_RACKNO">
<span<?php echo $store_storemast->RACKNO->viewAttributes() ?>>
<?php echo $store_storemast->RACKNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->SUPPNAME->Visible) { // SUPPNAME ?>
		<td data-name="SUPPNAME"<?php echo $store_storemast->SUPPNAME->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_SUPPNAME" class="store_storemast_SUPPNAME">
<span<?php echo $store_storemast->SUPPNAME->viewAttributes() ?>>
<?php echo $store_storemast->SUPPNAME->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->COMBNAME->Visible) { // COMBNAME ?>
		<td data-name="COMBNAME"<?php echo $store_storemast->COMBNAME->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_COMBNAME" class="store_storemast_COMBNAME">
<span<?php echo $store_storemast->COMBNAME->viewAttributes() ?>>
<?php echo $store_storemast->COMBNAME->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->GENERICNAME->Visible) { // GENERICNAME ?>
		<td data-name="GENERICNAME"<?php echo $store_storemast->GENERICNAME->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_GENERICNAME" class="store_storemast_GENERICNAME">
<span<?php echo $store_storemast->GENERICNAME->viewAttributes() ?>>
<?php echo $store_storemast->GENERICNAME->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->REMARK->Visible) { // REMARK ?>
		<td data-name="REMARK"<?php echo $store_storemast->REMARK->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_REMARK" class="store_storemast_REMARK">
<span<?php echo $store_storemast->REMARK->viewAttributes() ?>>
<?php echo $store_storemast->REMARK->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->TEMP->Visible) { // TEMP ?>
		<td data-name="TEMP"<?php echo $store_storemast->TEMP->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_TEMP" class="store_storemast_TEMP">
<span<?php echo $store_storemast->TEMP->viewAttributes() ?>>
<?php echo $store_storemast->TEMP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->PACKING->Visible) { // PACKING ?>
		<td data-name="PACKING"<?php echo $store_storemast->PACKING->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_PACKING" class="store_storemast_PACKING">
<span<?php echo $store_storemast->PACKING->viewAttributes() ?>>
<?php echo $store_storemast->PACKING->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->PhysQty->Visible) { // PhysQty ?>
		<td data-name="PhysQty"<?php echo $store_storemast->PhysQty->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_PhysQty" class="store_storemast_PhysQty">
<span<?php echo $store_storemast->PhysQty->viewAttributes() ?>>
<?php echo $store_storemast->PhysQty->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->LedQty->Visible) { // LedQty ?>
		<td data-name="LedQty"<?php echo $store_storemast->LedQty->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_LedQty" class="store_storemast_LedQty">
<span<?php echo $store_storemast->LedQty->viewAttributes() ?>>
<?php echo $store_storemast->LedQty->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->id->Visible) { // id ?>
		<td data-name="id"<?php echo $store_storemast->id->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_id" class="store_storemast_id">
<span<?php echo $store_storemast->id->viewAttributes() ?>>
<?php echo $store_storemast->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->PurValue->Visible) { // PurValue ?>
		<td data-name="PurValue"<?php echo $store_storemast->PurValue->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_PurValue" class="store_storemast_PurValue">
<span<?php echo $store_storemast->PurValue->viewAttributes() ?>>
<?php echo $store_storemast->PurValue->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->PSGST->Visible) { // PSGST ?>
		<td data-name="PSGST"<?php echo $store_storemast->PSGST->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_PSGST" class="store_storemast_PSGST">
<span<?php echo $store_storemast->PSGST->viewAttributes() ?>>
<?php echo $store_storemast->PSGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->PCGST->Visible) { // PCGST ?>
		<td data-name="PCGST"<?php echo $store_storemast->PCGST->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_PCGST" class="store_storemast_PCGST">
<span<?php echo $store_storemast->PCGST->viewAttributes() ?>>
<?php echo $store_storemast->PCGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->SaleValue->Visible) { // SaleValue ?>
		<td data-name="SaleValue"<?php echo $store_storemast->SaleValue->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_SaleValue" class="store_storemast_SaleValue">
<span<?php echo $store_storemast->SaleValue->viewAttributes() ?>>
<?php echo $store_storemast->SaleValue->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->SSGST->Visible) { // SSGST ?>
		<td data-name="SSGST"<?php echo $store_storemast->SSGST->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_SSGST" class="store_storemast_SSGST">
<span<?php echo $store_storemast->SSGST->viewAttributes() ?>>
<?php echo $store_storemast->SSGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->SCGST->Visible) { // SCGST ?>
		<td data-name="SCGST"<?php echo $store_storemast->SCGST->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_SCGST" class="store_storemast_SCGST">
<span<?php echo $store_storemast->SCGST->viewAttributes() ?>>
<?php echo $store_storemast->SCGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->SaleRate->Visible) { // SaleRate ?>
		<td data-name="SaleRate"<?php echo $store_storemast->SaleRate->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_SaleRate" class="store_storemast_SaleRate">
<span<?php echo $store_storemast->SaleRate->viewAttributes() ?>>
<?php echo $store_storemast->SaleRate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $store_storemast->HospID->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_HospID" class="store_storemast_HospID">
<span<?php echo $store_storemast->HospID->viewAttributes() ?>>
<?php echo $store_storemast->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->BRNAME->Visible) { // BRNAME ?>
		<td data-name="BRNAME"<?php echo $store_storemast->BRNAME->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_BRNAME" class="store_storemast_BRNAME">
<span<?php echo $store_storemast->BRNAME->viewAttributes() ?>>
<?php echo $store_storemast->BRNAME->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->OV->Visible) { // OV ?>
		<td data-name="OV"<?php echo $store_storemast->OV->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_OV" class="store_storemast_OV">
<span<?php echo $store_storemast->OV->viewAttributes() ?>>
<?php echo $store_storemast->OV->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->LATESTOV->Visible) { // LATESTOV ?>
		<td data-name="LATESTOV"<?php echo $store_storemast->LATESTOV->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_LATESTOV" class="store_storemast_LATESTOV">
<span<?php echo $store_storemast->LATESTOV->viewAttributes() ?>>
<?php echo $store_storemast->LATESTOV->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->ITEMTYPE->Visible) { // ITEMTYPE ?>
		<td data-name="ITEMTYPE"<?php echo $store_storemast->ITEMTYPE->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_ITEMTYPE" class="store_storemast_ITEMTYPE">
<span<?php echo $store_storemast->ITEMTYPE->viewAttributes() ?>>
<?php echo $store_storemast->ITEMTYPE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->ROWID->Visible) { // ROWID ?>
		<td data-name="ROWID"<?php echo $store_storemast->ROWID->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_ROWID" class="store_storemast_ROWID">
<span<?php echo $store_storemast->ROWID->viewAttributes() ?>>
<?php echo $store_storemast->ROWID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->MOVED->Visible) { // MOVED ?>
		<td data-name="MOVED"<?php echo $store_storemast->MOVED->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_MOVED" class="store_storemast_MOVED">
<span<?php echo $store_storemast->MOVED->viewAttributes() ?>>
<?php echo $store_storemast->MOVED->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->NEWTAX->Visible) { // NEWTAX ?>
		<td data-name="NEWTAX"<?php echo $store_storemast->NEWTAX->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_NEWTAX" class="store_storemast_NEWTAX">
<span<?php echo $store_storemast->NEWTAX->viewAttributes() ?>>
<?php echo $store_storemast->NEWTAX->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->HSNCODE->Visible) { // HSNCODE ?>
		<td data-name="HSNCODE"<?php echo $store_storemast->HSNCODE->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_HSNCODE" class="store_storemast_HSNCODE">
<span<?php echo $store_storemast->HSNCODE->viewAttributes() ?>>
<?php echo $store_storemast->HSNCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->OLDTAX->Visible) { // OLDTAX ?>
		<td data-name="OLDTAX"<?php echo $store_storemast->OLDTAX->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_OLDTAX" class="store_storemast_OLDTAX">
<span<?php echo $store_storemast->OLDTAX->viewAttributes() ?>>
<?php echo $store_storemast->OLDTAX->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_storemast->StoreID->Visible) { // StoreID ?>
		<td data-name="StoreID"<?php echo $store_storemast->StoreID->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_list->RowCnt ?>_store_storemast_StoreID" class="store_storemast_StoreID">
<span<?php echo $store_storemast->StoreID->viewAttributes() ?>>
<?php echo $store_storemast->StoreID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$store_storemast_list->ListOptions->render("body", "right", $store_storemast_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$store_storemast->isGridAdd())
		$store_storemast_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$store_storemast->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($store_storemast_list->Recordset)
	$store_storemast_list->Recordset->Close();
?>
<?php if (!$store_storemast->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$store_storemast->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($store_storemast_list->Pager)) $store_storemast_list->Pager = new NumericPager($store_storemast_list->StartRec, $store_storemast_list->DisplayRecs, $store_storemast_list->TotalRecs, $store_storemast_list->RecRange, $store_storemast_list->AutoHidePager) ?>
<?php if ($store_storemast_list->Pager->RecordCount > 0 && $store_storemast_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($store_storemast_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $store_storemast_list->pageUrl() ?>start=<?php echo $store_storemast_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($store_storemast_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $store_storemast_list->pageUrl() ?>start=<?php echo $store_storemast_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($store_storemast_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $store_storemast_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($store_storemast_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $store_storemast_list->pageUrl() ?>start=<?php echo $store_storemast_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($store_storemast_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $store_storemast_list->pageUrl() ?>start=<?php echo $store_storemast_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($store_storemast_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $store_storemast_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $store_storemast_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $store_storemast_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($store_storemast_list->TotalRecs > 0 && (!$store_storemast_list->AutoHidePageSizeSelector || $store_storemast_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="store_storemast">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($store_storemast_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($store_storemast_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($store_storemast_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($store_storemast_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($store_storemast_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($store_storemast_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($store_storemast->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $store_storemast_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($store_storemast_list->TotalRecs == 0 && !$store_storemast->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $store_storemast_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$store_storemast_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$store_storemast->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$store_storemast->isExport()) { ?>
<script>
ew.scrollableTable("gmp_store_storemast", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$store_storemast_list->terminate();
?>